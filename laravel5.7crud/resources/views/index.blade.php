<!-- index.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
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
        <th>ID</th>
        <th>Nome</th>
        <th>Autor</th>
        <th>Publicação</th>
        <th>Editora</th>
        <th colspan="2">Ação</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($books as $book)
      @php
        $date=date('d-m-Y', $book['publicacao']);
        @endphp
      <tr>
        <td>{{$book['id']}}</td>
        <td>{{$book['nome']}}</td>
        <td>{{$book['autor']}}</td>
        <td>{{$date}}</td>
        <td>{{$book['editora']}}</td>

        <td><a href="{{action('BookController@edit', $book['id'])}}" class="btn btn-warning">Editar</a></td>
        @if (Auth::check())
          <td><a href="{{action('HomeController@lido', $book['id'])}}" class="btn btn-primary">Marcar Lido</a></td>
          <td><a href="{{action('HomeController@wish', $book['id'])}}" class="btn btn-primary">Wishlist</a></td>
        @endif
        <td>
          <form action="{{action('BookController@destroy', $book['id'])}}" method="post">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Deletar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @if (Auth::check())
    <div class="row"><a href="{{action('BookController@create')}}" 
    class="btn btn-primary">Adicionar Livro</a></div> 
  @endif
  <br>
  <div class="row"><a href="{{action('HomeController@index')}}" 
  class="btn btn-primary">Home</a></div>
  </div>
  </body>
</html>