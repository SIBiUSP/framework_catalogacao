<html>
<head>
<title>Framework de Catalogação SIBiUSP - Resultado da busca</title>

<?php
  include "inc/meta_header.php";
  include "inc/config.php";
?>

</head>
<body>
  <div class="container-fluid">
  <?php
    include "inc/header.php";
  ?>
  <div class="row">
  <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
  <div class="col-xs-12 col-sm-6 col-md-8">


<?php

/* Pegar a URL atual */
$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
$pattern = '/page=\d/i';
$url_sem_page = preg_replace($pattern,'',$escaped_url);

/* Pagination variables */
$page  = isset($_POST['page']) ? (int) $_POST['page'] : 1;
$limit = 12;
$skip  = ($page - 1) * $limit;
$next  = ($page + 1);
$prev  = ($page - 1);
$sort  = array('title' => -1);

$query = array("sysno" => "002687592");
$cursor = $c->find()->skip($skip)->limit($limit)->sort($sort);;
$total= $cursor->count();



print_r("<div class=\"page-header\"><h3>Resultado da busca <small>($total)</small></h3></div>");

/* Pagination - Start */

echo '<nav>';
echo '<ul class="pager">';
if($page > 1){
  echo '<form method="post" action="'.$escaped_url.'">';
  echo '<input type="hidden" name="extra_submit_param" value="extra_submit_value">';
  echo '<li><button type="submit" name="page" class="btn btn-primary-outline" value="'.$prev.'">Anterior</button></li>';
  if($page * $limit < $total) {
    echo '<li><button type="submit" name="page" value="'.$next.'" class="btn btn-primary-outline">Próximo</button></li>';
  }
  else {
    echo '<li><button class="btn btn-secondary" disabled>Próximo</button></li>';
  }
  echo '</form>';
} else {
    if($page * $limit < $total) {
      echo '<form method="post" action="'.$escaped_url.'">';
      echo '<input type="hidden" name="extra_submit_param" value="extra_submit_value">';
      echo '<li><button class="btn btn-secondary" disabled>Anterior</button></li>';
      echo '<li><button type="submit" name="page" value="'.$next.'" class="btn btn-primary-outline">Próximo</button></li>';
      echo '</form>';
    }
}
echo '</ul>';
echo '</nav>';

/* Pagination - End */



foreach ($cursor as $r) {
echo '_id:'.$r["_id"].'<br/>';

if (!empty($r["subtitle"])) {
  echo '<a href="single.php?idx=_id&q='.$r["_id"].'">'.$r["title"].':'.$r["subtitle"].'</a><br/>';
}
else
{
  echo '<a href="single.php?idx=_id&q='.$r["_id"].'">'.$r["title"].'</a><br/>';
}

if (!empty($r["authors"])) {
  foreach ($r["authors"] as $at) {
    echo 'Autores:'.$at.'<br/>';
  }
}
echo 'Sysno:'.$r["sysno"].'<br/>';
echo '<br/><br/>';

} /* END - foreach - cursor */
?>



</div>
</div>
</div>
</body>
</html>
