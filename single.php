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
  ?>

  <div class="row">
    <div class="col-md-4"><h3>Exportar</h3></div>
    <div class="col-md-8">

<h3>Detalhes do registro</h3>
<?php
/*
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);
*/
$query =  array('_id' => ''.$_GET['_id'].'');
$cursor = $c->findOne($query);


echo '_id:'.$cursor["_id"].'<br/>';

if (!empty($cursor["subtitle"])) {
  echo '<a href="single.php?_id='.$cursor["_id"].'">'.$cursor["title"].':'.$cursor["subtitle"].'</a><br/>';
}
else
{
  echo '<a href="single.php?_id='.$cursor["_id"].'">'.$cursor["title"].'</a><br/>';
}

if (!empty($cursor["authors"])) {
  foreach ($cursor["authors"] as $at) {
    echo 'Autores:'.$at.'<br/>';
  }
}
echo 'Sysno:'.$cursor["sysno"].'<br/>';
echo '<br/><br/>';

echo '<form method="get" action="edit.php">';
echo '<input type="hidden">';
echo '<button type="submit" name="_id" class="btn btn-primary-outline" value="'.$cursor["_id"].'">Editar</button>';

?>

</div>
</div>

<?php
  include "inc/footer.php";
?>


</div>
</body>
</html>
