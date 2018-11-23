<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autores=\App\Autor::all();
        return view('autores',compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastra_autor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $autor= new \App\Autor;
        $autor->cpf=$request->get('cpf');
        $autor->nome=$request->get('nome');
        
        $data=date_create($request->get('data'));
        $format = date_format($data,"d-m-Y");
        $autor->data = strtotime($format);

        $autor->save();
        
        return redirect('autores')->with('Sucesso!', 'A informação foi salva!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $autor = \App\Autor::find($id);
        $autor->data = gmdate("d-m-Y", $autor->data);        

        return view('edita_autor',compact('autor','id'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $autor = \App\Autor::find($id);

        $autor->cpf=$request->get('cpf');
        $autor->nome=$request->get('nome');

        $data=date_create($request->get('data'));
        $format = date_format($data,"d-m-Y");
        $autor->data = strtotime($format);

        $autor->save();

        return redirect('autores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $autor = \App\Autor::find($id);
        $autor->delete();
        return redirect('autores')->with('Sucesso!','O livro foi deletado!');

    }
}
