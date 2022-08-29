<?php

session_start();

use models\Trash;
use views\Maps;

if(isset($_SESSION['USER_UUID'])){
    
    require_once('../core/autoloader.php');


    if(isset($_GET['maps']) && $_SESSION['USER_SUPER']){
        
        (new Maps((new Trash())->_get()['data']))->html();
    }
}
else{
    header("location:start");
}



?>