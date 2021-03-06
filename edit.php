<?php
  include ('inc/config.php');
  include ('inc/meta_header.php');
?>
<title>Framework de catalogação do SIBiUSP</title>
</head>
<body>
<div class="container-fluid">
  <?php
    include "inc/header.php";


error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);


if (!empty($_GET["_id"])) {
$_id = ''.$_GET['_id'].'';
}
elseif (!empty($_POST["_id"])) {
$_id = ''.$_POST['_id'].'';
}
else{

}

/* Update */
if (!empty($_POST)) {

$query =  array('_id' => ''.$_POST['_id'].'');

$c->update(array('_id'=>$_id),
           array('$set'=>array(
             'title'=>$_POST["title"],
             'subtitle'=>$_POST["subtitle"],
             'authors'=>$_POST["authors"],
             'local_de_publicacao'=>$_POST["local_de_publicacao"],
             'editora'=>$_POST["editora"],
             'data_de_publicacao'=>$_POST["data_de_publicacao"]
           )));

echo '
<div class="alert alert-success" role="alert">
  <strong>Sucesso!</strong> Registro alterado com sucesso.
  <a href="single.php?_id='.$_id.'">Ver registro</a>
</div>
';

}
else{
$query =  array('_id' => ''.$_GET['_id'].'');
}
$cursor = $c->findOne($query);

$title=$cursor["title"];
if (!empty($cursor["subtitle"])) {
  $subtitle= $cursor["subtitle"];
}
else {
  $subtitle="";
}
$local_de_publicacao=$cursor["local_de_publicacao"];
$editora=$cursor["editora"];
$data_de_publicacao=$cursor["data_de_publicacao"];


$count_authors = count($cursor["authors"]);
?>

<div class="row">
  <div class="col-md-4"><h3>Exportar</h3></div>
  <div class="col-md-8">

<h3>Detalhes do registro</h3>

<a href="single.php?_id=<?php echo "$_id"; ?>">Ver registro</a>

<form action="edit.php" method="POST">
  <div class="form-group row">
    <label for="disabledTextInput" class="col-sm-2 form-control-label">Sysno ou ID</label>
    <div class="col-sm-10">
    <input type="text" id="disabledTextInput" name="_id" class="form-control" placeholder="<?php echo "$_id";  ?>" value="<?php echo "$_id";  ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputTitle" class="col-sm-2 form-control-label">Título</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Título" name="title" value="<?php echo "$title";  ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputSubtitle" class="col-sm-2 form-control-label">Subtítulo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword3" placeholder="Subtítulo" name="subtitle" value="<?php echo "$subtitle";  ?>">
    </div>
  </div>
<?php
$author_count=0;
for ($author_count = 1; $author_count <= $count_authors; $author_count++) {
echo '<div class="form-group row">';
echo '<label for="inputAutor" class="col-sm-2 form-control-label">Autor</label>';
echo '<div class="col-sm-10">';
echo '<input type="text" class="form-control" id="inputPassword3" placeholder="Autor" name="authors[]" value="'.$cursor["authors"][$author_count-1].'">';
echo '</div></div>';
}

?>

<div class="form-group row">
  <label for="inputLocal" class="col-sm-2 form-control-label">Local</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="inputPassword3" placeholder="Local" name="local_de_publicacao" value="<?php echo "$local_de_publicacao";  ?>">
  </div>
</div>
<div class="form-group row">
  <label for="inputEditora" class="col-sm-2 form-control-label">Editora</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="inputPassword3" placeholder="Editora" name="editora" value="<?php echo "$editora";  ?>">
  </div>
</div>
<div class="form-group row">
  <label for="inputDatadePublicacao" class="col-sm-2 form-control-label">Data de publicação</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="inputPassword3" placeholder="Data de publicação" name="data_de_publicacao" value="<?php echo "$data_de_publicacao";  ?>">
  </div>
</div>


  <div class="form-group row">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-secondary">Salvar</button>
    </div>
  </div>
</form>


</div>
</div>

<?php
  include "inc/footer.php";
?>


</div>
</body>
</html>
