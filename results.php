<html>
<head>
<title>Framework de Catalogação SIBiUSP - Resultado da busca</title>

<?php
  include "inc/meta_header.php";
  include "inc/config.php";

  /* Query */
  if(isset($_GET['full_text'])) {
    $query_array = array();
      foreach ($_GET as $key=>$value) {
        $query[$key] = $value;
    }

    $qstring = "?";
    foreach($_GET as $key => $val)
    {
        $qstring .= '"' . $val . '"&';
    }

    $query = array ('$text' => array('$search'=>''.$qstring.''));
  }
  else {
    $query_array = array();
      foreach ($_GET as $key=>$value) {
        $query[$key] = $value;
    }
  }


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

?>

</head>
<body>

  <?php
    include "inc/header.php";
  ?>
  <div class="ui two column stackable grid">
  <div class="four wide column">

<?php
    function generateFacet($url,$c,$query,$facet_name,$sort_name,$sort_value,$facet_display_name,$limit){
      $aggregate_facet=array(
        array(
          '$match'=>$query
        ),
        array(
          '$unwind'=>$facet_name
        ),
        array(
          '$group' => array(
            "_id"=>$facet_name,
            "count"=>array('$sum'=>1)
            )
        ),
        array(
          '$sort' => array($sort_name=>$sort_value)
        )
      );

    $facet = $c->aggregate($aggregate_facet);

    echo '<div class="item">';
    echo '<a class="active title"><i class="dropdown icon"></i>'.$facet_display_name.'</a>';
    echo '<div class="content">';
    echo '<div class="ui list">';
    $i = 0;
    foreach ($facet["result"] as $facets) {
    echo '<div class="item">';
    echo '<a href="'.$url.'&'.substr($facet_name, 1).'='.$facets["_id"].'">'.$facets["_id"].'</a><span> ('.$facets["count"].')</span>';
    echo '</div>';
    if(++$i > $limit) break;
    };
    echo   '</div>
          </div>
      </div>';
    }
?>
<div class="ui fluid vertical accordion menu">
  <?php
  generateFacet($url,$c,$query,"\$type_of_material","count",-1,"Tipo de material",20);
  generateFacet($url,$c,$query,"\$authors","count",-1,"Autores",20);
  ?>
</div>



</div>
<div class="ten wide column">


<?php
$cursor = $c->find($query)->skip($skip)->limit($limit)->sort($sort);;
$total= $cursor->count();
print_r("<div class=\"page-header\"><h3>Resultado da busca <small>($total)</small></h3></div>");
?>
<?php
/* Pagination - Start */
echo '<br/><div class="ui buttons">';
if($page > 1){
  echo '<form method="post" action="'.$escaped_url.'">';
  echo '<input type="hidden" name="extra_submit_param" value="extra_submit_value">';
  echo '<button type="submit" name="page" class="ui labeled icon button active" value="'.$prev.'"><i class="left chevron icon"></i>Anterior</button>';
  if($page * $limit < $total) {
    echo '<button type="submit" name="page" value="'.$next.'" class="ui right labeled icon button active">Próximo<i class="right chevron icon"></i></button>';
  }
  else {
    echo '<button class="ui right labeled icon button disabled">Próximo<i class="right chevron icon"></i></button>';
  }
  echo '</form>';
} else {
    if($page * $limit < $total) {
      echo '<form method="post" action="'.$escaped_url.'">';
      echo '<input type="hidden" name="extra_submit_param" value="extra_submit_value">';
      echo '<button class="ui labeled icon button disabled"><i class="left chevron icon"></i>Anterior</button>';
      echo '<button type="submit" name="page" value="'.$next.'" class="ui right labeled icon button active">Próximo<i class="right chevron icon"></i></button>';
      echo '</form>';
    }
}
echo '</div><br/><br/>';
/* Pagination - End */
?>
<?php
foreach ($cursor as $r) {
echo '_id:'.$r["_id"].'<br/>';

if (!empty($r["subtitle"])) {
  echo '<a href="single.php?_id='.$r["_id"].'">'.$r["title"].':'.$r["subtitle"].'</a><br/>';
}
else
{
  echo '<a href="single.php?_id='.$r["_id"].'">'.$r["title"].'</a><br/>';
}

if (!empty($r["authors"])) {
  foreach ($r["authors"] as $at) {
    echo 'Autores:'.$at.'<br/>';
  }
}

if (!empty($r["local_de_publicacao"])) {
  $local_de_publicacao=$r["local_de_publicacao"];
}
else {
  $local_de_publicacao="";
}

if (!empty($r["editora"])) {
  $editora=$r["editora"];
}
else {
  $editora="";
}


if (!empty($r["data_de_publicacao"])) {
  $data_de_publicacao=$r["data_de_publicacao"];
}
else {
  $data_de_publicacao="";
}

echo 'Imprenta:'.$local_de_publicacao.': '.$editora.', '.$data_de_publicacao.'<br/>';

echo 'Sysno:'.$r["sysno"].'<br/>';
echo '<br/><br/>';

} /* END - foreach - cursor */
?>



</div>
</div>
</div>
<script>
$('.ui.accordion')
  .accordion()
;
</script>
</body>
</html>
