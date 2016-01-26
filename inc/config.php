<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);
$m  = new MongoClient();
$d  = $m->sibiusp;
$c = $d->catalogacao;
?>
