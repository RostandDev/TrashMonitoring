
<?php
session_start();
use core\Uuid;
use models\Trash as ModelsTrash;
use models\Trashstatus;
use views\status\Status;
use views\trash\Add;
use views\trash\Trash;
use views\trash\Update;

require_once("../core/autoloader.php");


if(isset($_SESSION['USER_UUID']) && $_SESSION['USER_SUPER']){ // verification de la validité de la session d'utilisateur
    //Afficher les poubrlles
    header('content-type: applicaton/json');
    if(isset($_GET['trashs']) ){

        if(isset($_GET['id'])){

            $data = [
                "status" => !0,
                "message" => "les poubelles",
                "data" => (new ModelsTrash())->_get_by_id(intval(htmlspecialchars($_GET['id'])))['data']
            ];
    
            print_r(json_encode($data) ) ;
            
        }
        else{
          
        

            $data = [
                "status" => !0,
                "message" => "Les poubelles",
                "data" => (new ModelsTrash())->_get()['data']
            ];
    
            print_r(json_encode($data) ) ;
        } 

    }





    // Executer l'ajout d'une poubelle

    if(isset($_POST['insert']) ){
        
        header('content-type: applicaton/json');
        $insert =  (new ModelsTrash())->_insert([
            '_uuid' => (new Uuid())->_uuid(),
            '_longitude' => htmlspecialchars($_POST['_longitude']),
            '_latitude' => htmlspecialchars($_POST['_latitude']),
            '_name' => htmlspecialchars($_POST['_name']),
            '_address' => htmlspecialchars($_POST['_address']),
            '_author' => intval(htmlspecialchars($_SESSION['USER_ID']))
        ]);

        if( $insert['status'] == !0){
            header('content-type: applicaton/json');


            $data = [
                "status" => !0,
                "succes" => "SUCCESS",
                "data" => (new ModelsTrash())->_get()['data']
            ];
    
            print_r(json_encode($data) ) ;
        } 
        else{
            header('content-type: applicaton/json');


            $data = [
                "status" => !1,
                "error" => "DATA_ERROR",
                "data" => (new ModelsTrash())->_get()['data']
            ];
    
            print_r(json_encode($data) ) ;
        }


    }

    //Mettre à jour une poubelle

    if(isset($_POST['update'])){
    
        $update =  (new ModelsTrash())->_update([
            '_uuid' => (new Uuid())->_uuid(),
            '_longitude' => htmlspecialchars($_POST['_longitude']),
            '_latitude' => htmlspecialchars($_POST['_latitude']),
            '_address' => htmlspecialchars($_POST['_address']),
            '_name' => htmlspecialchars($_POST['_name']),
            '_author' =>intval(htmlspecialchars($_SESSION['USER_ID'])),
            '_id' => htmlspecialchars($_POST['_id'])
        ]);
    
        if($update['status']== !0) {
            $data = [
                "status" => !0,
                "data" => (new ModelsTrash())->_get()['data']
            ];

            print_r(json_encode($data) ) ;
    
           
        }
        elseif($update['status']== !1) {
            $data = [
                "status" => !1,
                "error" => "DATA_ERROR",
                "data" => (new ModelsTrash())->_get()['data']
            ];

            print_r(json_encode($data) ) ;
        } 
        else{
            
                $data = [
                    "status" => !1,
                    "error" => "INTERNAL_ERROR",
                ];
                print_r(json_encode($data) ) ;
             
        }

        
        
    
    } // fin update



    //suppression d'une boubelle

    if(isset($_GET['delete'])){

        header('content-type: applicaton/json');
        $delete = (new ModelsTrash())->_delete(intval(htmlspecialchars($_GET['id'])));

        if($delete['status'] == !0) {
            $data = [
                "status" => !0,
                "data" => (new ModelsTrash())->_get()['data']
            ];
            print_r(json_encode($data) ) ;
           
        }
        elseif($delete['status'] == !1) {
            $data = [
                "status" => !1,
                "error" =>"DATA_ERROR",
                "data" => (new ModelsTrash())->_get()['data']
            ];

            print_r(json_encode($data) ) ;
         } 
        else{
            $data = [
                "status" => !1,
                "error" =>"INTERNAL_ERROR",
                "data" => (new ModelsTrash())->_get()['data']
            ];
            print_r(json_encode($data) ) ;
        } 

        
    }

    if(isset($_GET['status'])){
        if(isset($_GET['id'])){


            (new Status((new Trashstatus())->_get_by_id(intval(htmlspecialchars($_GET['id'])))['data']))->html();
        }
        else{
            (new Status((new Trashstatus())->_get()));
        }
    }



    if(isset($_GET['fakers'])){
      
        for($i=0; $i<100; $i++){

        

            $insert =  (new ModelsTrash())->_insert([
                '_uuid' => (new Uuid())->_uuid(),
                '_longitude' => rand(1000,9000),
                '_latitude' => rand(1000,9000),
                '_name' => 'faker-tname',
                '_address' => 'faker-taddress',
                '_author' => intval(htmlspecialchars($_SESSION['USER_ID']))
            ]);
    
            if($insert['status']== !0) {
                $data = [
                    "status" => !0,
                    "data" => (new ModelsTrash())->_get()['data']
                ];
        
               
            }
            elseif($insert['status']== !1) {
                $data = [
                    "status" => !1,
                    "error" => "DATA_ERROR",
                    "data" => (new ModelsTrash())->_get()['data']
                ];
            } 
            else{
                
                    $data = [
                        "status" => !1,
                        "error" => "INTERNAL_ERROR",
                    ];
                 
            }

    
            print_r(json_encode($data) ) ;
    
       
        }
    } ///fin 



} //fin if
else{
    $data = [
        "status" => !1,
        "error" => "ACCESS_DENIED",
    ];

    print_r(json_encode($data) ) ;
}