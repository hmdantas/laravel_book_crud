<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Autores</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>CPF</th>
        <th>Nome</th>
        <th>Data de Nascimento</th>
        <th>Livros associados:</th>
        <th colspan="2">Ação</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($autores as $autor)
      @php
        $data=date('Y-m-d', $autor['data']);
        @endphp
      <tr>
        <td>{{$autor['cpf']}}</td>
        <td>{{$autor['nome']}}</td>
        <td>{{$data}}</td>
        <td>
          @foreach($autor->books as $book)
          {{$book->nome}}
          <br>
          @endforeach
        </td>
        <td><a href="{{action('AutorController@edit', $autor['id'])}}" class="btn btn-warning">Editar</a></td>
        <td>
          <form action="{{action('AutorController@destroy', $autor['id'])}}" method="post">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="row"><a href="{{action('AutorController@create')}}" 
  class="btn btn-primary">Adicionar Autor</a></div>
  <br>
  <div class="row"><a href="{{action('HomeController@index')}}" 
  class="btn btn-primary">Home</a></div>
  </div>
  </body>
</html>