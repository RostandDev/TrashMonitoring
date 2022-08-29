
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


if(isset($_SESSION['USER_UUID'])){
    //Afficher les poubrlles

    if(isset($_GET['trashs']) && $_SESSION['USER_SUPER']){

        if(isset($_GET['id'])){
            (new Trash())->html((new ModelsTrash())->_get()['data']);
        }
        else ((new Trash((new ModelsTrash())->_get()['data'],"")) )->html();

    }

    if(isset($_GET['onmaps'])){

        header('content-type: applicaton/json');
        
        
        echo json_encode((new ModelsTrash())->_get()['data'], JSON_PRETTY_PRINT) ;
    }


    // Executer l'ajout d'une poubelle

    if(isset($_POST['insert']) ){
    
    $insert =  (new ModelsTrash())->_insert([
            '_uuid' => (new Uuid())->_uuid(),
            '_longitude' => htmlspecialchars($_POST['_longitude']),
            '_latitude' => htmlspecialchars($_POST['_latitude']),
            '_address' => htmlspecialchars($_POST['_address']),
            '_author' => intval(htmlspecialchars($_SESSION['USER_ID']))
        ]);

        if($insert['status']== !0) {
            (new Trash((new ModelsTrash())->_get()['data'],"Donnée enregistré"))->html();
        }
        else (new Add([],"Echec d'enregistrer"))->html(); 


    }

    //Mettre à jour une poubelle

    if(isset($_POST['update'])){

  
    
        $insert =  (new ModelsTrash())->_update([
            '_uuid' => (new Uuid())->_uuid(),
            '_longitude' => htmlspecialchars($_POST['_longitude']),
            '_latitude' => htmlspecialchars($_POST['_latitude']),
            '_address' => htmlspecialchars($_POST['_address']),
            '_author' =>intval(htmlspecialchars($_SESSION['USER_ID'])),
            '_id' => htmlspecialchars($_POST['_id'])
        ]);
    
        if($insert['status']== !0) ((new Trash((new ModelsTrash())->_get()['data'],"Donnée Mise à jour")) )->html();
        else (new Update((new ModelsTrash())->_get_by_id(intval(htmlspecialchars($_POST['_id'])))['data'],'Echec d\enregistrer'))->html(); 
    
        
    
    }

    // Affichier le formulaire d'ajout d'une poubelle
    if(isset($_GET['add'])){
    
        (new Add())->html();
    }



    // Affichier le formulaire de mise à jour d'une poubelle
    if(isset($_GET['update'])){
        (new Update((new ModelsTrash())->_get_by_id(intval(htmlspecialchars($_GET['id'])))['data'], " "))->html();
    }

    //suppression d'une boubelle

    if(isset($_GET['delete'])){


    $delete = (new ModelsTrash())->_delete(intval(htmlspecialchars($_GET['id'])));

        if($delete['status'] == !1) ((new Trash((new ModelsTrash())->_get()['data'],"Donnée supprimée")) )->html();
        else  ((new Trash((new ModelsTrash())->_get()['data'],"Echec de  suppression")) )->html();


    }

    if(isset($_GET['status'])){
        if(isset($_GET['id'])){

            (new Status((new Trashstatus())->_get_by_id(intval(htmlspecialchars($_GET['id'])))['data']))->html();
        }
        else{
            (new Status((new Trashstatus())->_get()));
        }
    }

    if(isset($_GET['onmaps'])){
        if(isset($_GET['id'])){

            header("location:maps");
        }
    }

    if(isset($_GET['message'])){
        
    }

}
else{
    header("location:start");
}