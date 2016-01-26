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
$query =  array('_id' => ''.$_GET['_id'].'');
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

<form>
  <fieldset class="form-group">
    <label for="formGroupExampleInput">Título</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
  </fieldset>
  <fieldset class="form-group">
    <label for="formGroupExampleInput2">Subtítulo</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
  </fieldset>
</form>



<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $article = array();
    $article['title'] = $_POST['title'];
    $article['content'] = Markdown::defaultTransform($_POST['content']);
    $article['saved_at'] = new MongoDate();

    if (empty($article['title']) || empty($article['content'])) {
        $data['status'] = 'Please fill out both inputs.';
    } else {

// then create a new row in the collection posts
        $db->create('posts', $article);
        $data['status'] = 'Row has successfully been inserted.';
    }
}
$layout->view('admin/create', $data);
?>

<form action="" method="post">
    <div><label for="Title">Title</label>
        <input type="text" name="title" id="title" required="required"/>
    </div>
    <label for="content">Content</label>

    <p><textarea name="content" id="content" cols="40" rows="8" class="span10"></textarea></p>

    <div class="submit"><input type="submit" name="btn_submit" value="Save"/></div>
</form>



</div>
</div>

<?php
  include "inc/footer.php";
?>


</div>
</body>
</html>
