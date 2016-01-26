<html>
<head>
<title>Framework de Catalogação SIBiUSP</title>

<?php
  include "inc/meta_header.php";
?>

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
            <p class="help-block">Aceita arquivos .mrc e MARCXML.</p>
          </div>
          <button type="submit" class="btn btn-default">Buscar ou enviar arquivo</button>
        </form>
      </div>
    </div>

<a href="results.php">results.php</a>
<a href="catalog_framework.php">catalog_framework.php</a>

  </div>
</body>
</html>
