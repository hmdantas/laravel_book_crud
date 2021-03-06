<!-- create.blade.php -->

<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <title>Cadastro de Livros  </title>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  

  </head>

  <div class="container"> 
  <h2>Cadastro de Autores:</h2><br/>
    <form method="post" action="{{url('autores')}}" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <label for="nome">CPF:</label>
          <input type="text" class="form-control" name="cpf">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <label for="Autor">Nome:</label>
          <input type="text" class="form-control" name="nome">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <strong>Data de nascimento: </strong>  
          <input class="date form-control" type="text" id="datepicker" name="data">   
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4" style="margin-top:60px">
          <button type="submit" class="btn btn-success">Adicionar</button>
        </div>
      </div>
    </form>
  </div>
  <script type="text/javascript">  
    $('#datepicker').datepicker({ 
        autoclose: true,   
        format: 'dd-mm-yyyy'  
     });  
  </script>



</html>