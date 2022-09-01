<?php
session_start();

use models\Administrator;
use models\Trash;
use views\Views;

require_once('../core/autoloader.php');

    if(isset($_SESSION['USER_UUID'])){

        (new Views([
            "users" => (new Administrator())->_get()['data'],
            "trashs" => (new Trash())->_get()['data'],

        ]))->html();
    }
    else{
        
        header("location:start");
    }


?>