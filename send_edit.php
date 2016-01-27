<?php
$id = '52d68c93cf5dc944128b4567';
$posts->update(
        array('_id'     => new MongoId($id)),
    array('$set'    => array('title'   => 'What is phalcon'))
    );

?>
