<?php

session_start();

use models\Trash;
use models\Trashstatus;
use views\Maps;

if(isset($_SESSION['USER_UUID'])){
    
    require_once('../core/autoloader.php');


    if(isset($_GET['maps']) && $_SESSION['USER_SUPER']){
        
        (new Maps((new Trashstatus())->_get()['data']))->html();
    }
}
else{
    header("location:start");
}



?>