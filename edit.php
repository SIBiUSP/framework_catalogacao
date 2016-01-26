<?php
  include ('inc/config.php');
  include ('inc/meta_header.php');
?>
<title>MetaBuscaCI - Detalhes do registro</title>
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
$query =  array(''.$_GET['idx'].'' => ''.$_GET['_id'].'');
$cursor = $c->findOne($query);


echo '_id:'.$cursor["_id"].'<br/>';

if (!empty($cursor["subtitle"])) {
  echo '<a href="single.php?idx=_id&q='.$cursor["_id"].'">'.$cursor["title"].':'.$cursor["subtitle"].'</a><br/>';
}
else
{
  echo '<a href="single.php?idx=_id&q='.$cursor["_id"].'">'.$cursor["title"].'</a><br/>';
}

if (!empty($cursor["authors"])) {
  foreach ($cursor["authors"] as $at) {
    echo 'Autores:'.$at.'<br/>';
  }
}
echo 'Sysno:'.$cursor["sysno"].'<br/>';
echo '<br/><br/>';




?>

</div>
</div>

<?php
  include "inc/footer.php";
?>


</div>
</body>
</html>
