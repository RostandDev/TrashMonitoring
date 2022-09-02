<?php

session_start();

use models\Trash;
use models\Trashstatus;
use views\maps\Maps;

if(isset($_SESSION['USER_UUID'])){
    
    require_once('../core/autoloader.php');


    if(isset($_GET['maps']) && $_SESSION['USER_SUPER']){
        
        header('content-type: applicaton/json');
        

        $data = [
            "status" => !0,
            "data" => (new Trashstatus())->_get()['data']
        ];

        //echo json_encode($data) ;

        print_r(json_encode($data) ) ;
    }
}
else{
    header('content-type: applicaton/json');
        

    $data = [
        "stutus" => !0,
        "data" => (new Trashstatus())->_get()['data']
    ];

    //echo json_encode($data) ;

    print_r(json_encode($data) ) ;
}



?>