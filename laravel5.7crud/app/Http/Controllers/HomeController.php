<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $books = $user->books()->get();

        return view('home',compact('books'));
    }

        /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lido($id){
        $user = Auth::user();
        $repetido = false;

        foreach ($user->books()->get() as $book) {
            if ($book->id == $id) {
                $repetido = true;
            }
        }

        if($repetido == false){
            $user->books()->attach($id);
            $user->save();            
        }

        return redirect('/home');

    }

}
