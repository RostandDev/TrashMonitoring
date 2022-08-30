<?php

use models\Trashstatus;

require_once('../core/autoloader.php');

if(isset($_POST['status'])){
    $status = (new Trashstatus())->_insert(        [
        '_full_level' => htmlspecialchars($_POST['_full_level']),
        '_trash' => htmlspecialchars($_POST['_trash'])
    ]);


}