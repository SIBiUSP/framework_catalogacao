<html>

<head>
  <title>Framework de Catalogação SIBiUSP</title>

  <?php
  include "inc/meta_header.php";
  include "inc/config.php";
?>

</head>
<body>
<?php
  include "inc/header.php";
?>

<h3 class="ui center aligned header">Device Column Width</h3>
<div class="ui grid">
  <div class="six wide column">
    <div class="ui segment">Content</div>
  </div>
  <div class="ten wide computer three wide tablet six wide mobile column">
    <div class="ui segment">
      <h1>Pesquisar</h1>
      <form class="ui form" action="results.php" method="get">
        <div class="field">
          <label for="inputAll">Todos os campos</label>
          <input type="text" class="form-control" name="full_text" id="inputAll" placeholder="Insira o título para a pesquisa">
          <button type="submit" class="btn btn-default">Buscar ou enviar arquivo</button>
        </div>
      </form>
      <form class="ui form" action="results.php" method="get">
        <div class="field">
          <label for="inputISBN">ISBN</label>
          <input type="text" class="form-control" name="ISBN" id="ISBN" placeholder="Insira os ISBNs para a pesquisa">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>

      <form class="ui form" action="results.php" method="get">
        <div class="field">
          <label for="inputTitulo">Título</label>
          <input type="text" class="form-control" id="inputTitulo" placeholder="Insira o título para a pesquisa">
        </div>
        <div class="field">
          <label for="inputAutores">Autores</label>
          <input type="text" class="form-control" id="inputAutores" placeholder="Insira os autores para a pesquisa">
        </div>
        <div class="field">
          <label for="inputDOI">DOI</label>
          <input type="text" class="form-control" id="inputDOI" placeholder="Insira os DOIs para a pesquisa">
        </div>
        <div class="field">
          <label for="exampleInputFile">Enviar um arquivo MARC</label>
          <input type="file" id="exampleInputFile">
          <p class="help-block">Aceita arquivos .mrc e MARCXML.</p>
        </div>
        <button type="submit" class="btn btn-default">Buscar ou enviar arquivo</button>
      </form>
    </div>
    </div>
  </div>

</div>

      <a href="results.php">results.php</a>
      <a href="catalog_framework.php">catalog_framework.php</a>


</body>

</html>
