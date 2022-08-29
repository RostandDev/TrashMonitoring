<?php

use models\Trashstatus;

require_once('../core/autoloader.php');

if(isset($_POST['message']) && isset($_POST['id'])){

    (new Trashstatus())->_insert([]);
}





?>