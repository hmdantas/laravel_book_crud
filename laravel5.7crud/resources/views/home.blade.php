@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <br>
                    <a href="{{action('BookController@index')}}">Ver Lista Geral de Livros</a>
                    <br>
                    <a href="{{action('AutorController@index')}}">Ver Lista Geral de Autores</a>
                </div>
            </div>
        </div>
    </div>

    Livros lidos:
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Autor</th>
        <th>Publicação</th>
        <th>Editora</th>
        <th></th>
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
        <td>
            <form action="{{action('HomeController@removelido', $book['id'])}}" method="post">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="POST">
                <button class="glyphicon glyphicon-remove" style="color:red" type="submit"></button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <br>

  Lista de desejos:
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Autor</th>
        <th>Publicação</th>
        <th>Editora</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($wishs as $wish)
      @php
        $date=date('d-m-Y', $wish['publicacao']);
        @endphp
      <tr>
        <td>{{$wish['id']}}</td>
        <td>{{$wish['nome']}}</td>
        <td>{{$wish['autor']}}</td>
        <td>{{$date}}</td>
        <td>{{$wish['editora']}}</td>
        <td>
            <form action="{{action('HomeController@removewish', $wish['id'])}}" method="post">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="POST">
                <button class="glyphicon glyphicon-remove" style="color:red" type="submit"></button>
            </form>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>


</div>
@endsection
