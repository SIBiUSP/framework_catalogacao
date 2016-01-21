<html>
<head>
<title>Framework de Catalogação do SIBiUSP</title>

<!-- Jquery -->
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>
<body>
  <div class="container">

    <?php
      include "inc/header.php";
    ?>

    <div class="row">
      <div class="col-md-4">.col-md-4</div>
      <div class="col-md-8">
        <h1>Pesquisar</h1>
        <form>
          <div class="form-group">
            <label for="inputTitulo">Título</label>
            <input type="text" class="form-control" id="inputTitulo" placeholder="Insira o título para a pesquisa">
          </div>
          <div class="form-group">
            <label for="inputAutores">Autores</label>
            <input type="text" class="form-control" id="inputAutores" placeholder="Insira os autores para a pesquisa">
          </div>
          <div class="form-group">
            <label for="inputAutores">Autores</label>
            <input type="text" class="form-control" id="inputAutores" placeholder="Insira os autores para a pesquisa">
          </div>
          <div class="form-group">
            <label for="inputISBN">ISBN</label>
            <input type="text" class="form-control" id="inputISBN" placeholder="Insira os ISBNs para a pesquisa">
          </div>
          <div class="form-group">
            <label for="inputDOI">DOI</label>
            <input type="text" class="form-control" id="inputDOI" placeholder="Insira os DOIs para a pesquisa">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Enviar um arquivo MARC</label>
            <input type="file" id="exampleInputFile">
            <p class="help-block">Example block-level help text here.</p>
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
    </div>


  </div>
</body>
</html>
