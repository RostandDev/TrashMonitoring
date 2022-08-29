
<?php
session_start();
use core\Uuid;
use models\Trash as ModelsTrash;
use views\Trash;

require_once("../core/autoloader.php");

//Afficher les poubrlles

if(isset($_GET['trashs']) && $_SESSION['USER_SUPER']){

    if(isset($_GET['id'])){
        (new Trash())->html((new ModelsTrash())->_get()['data']);
    }
    else ((new Trash((new ModelsTrash())->_get()['data'],"")) )->html();



    /*(new Trash([
        0 =>[
            "_longitude" => '566865654',
            "_latitude" => '69875784385',
            "_uuid" => 'jiiomqsdfoqsdfi',
            "_id" => 1
        ],
        1 =>[
            "_longitude" => '566865654',
            "_latitude" => '69875784385',
            "_uuid" => 'jiiomqsdfoqsdfi',
            "_id" => 2
        ]
    ]))->html();*/
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
    else (new Trash())->add("Echec d'enregistrer"); 

   /* (new Trash([
        0 =>[
            "_longitude" => '566865654',
            "_latitude" => '69875784385',
            "_uuid" => 'jiiomqsdfoqsdfi',
            "_id" => 1
        ],
        1 =>[
            "_longitude" => '566865654',
            "_latitude" => '69875784385',
            "_uuid" => 'jiiomqsdfoqsdfi',
            "_id" => 1
        ]
    ]))->html();*/

}

//Mettre à jour une poubelle

if(isset($_POST['update'])){

    //$data = (new ModelsTrash())->_get_by_id(intval(htmlspecialchars($_POST['id'])));
   
     $insert =  (new ModelsTrash())->_update([
         '_uuid' => (new Uuid())->_uuid(),
         '_longitude' => htmlspecialchars($_POST['_longitude']),
         '_latitude' => htmlspecialchars($_POST['_latitude']),
         '_address' => htmlspecialchars($_POST['_address']),
         '_author' =>intval(htmlspecialchars($_SESSION['USER_ID'])),
         '_id' => htmlspecialchars($_POST['_id'])
     ]);
 
     if($insert['status']== !0) ((new Trash((new ModelsTrash())->_get()['data'],"Donnée Mise à jour")) )->html();
     else (new Trash())->update((new ModelsTrash())->_get_by_id(intval(htmlspecialchars($_POST['_id'])))['data'],'Echec d\enregistrer'); 
 
     
 
 }

 // Affichier le formulaire d'ajout d'une poubelle
if(isset($_GET['add'])){
 
    (new Trash())->add();
}



// Affichier le formulaire de mise à jour d'une poubelle
if(isset($_GET['update'])){
    (new Trash())->update((new ModelsTrash())->_get_by_id(intval(htmlspecialchars($_GET['id'])))['data'], " ");
}

//suppression d'une boubelle

if(isset($_GET['delete'])){


   $delete = (new ModelsTrash())->_delete(intval(htmlspecialchars($_GET['id'])));

    if($delete['status'] == !1) ((new Trash((new ModelsTrash())->_get()['data'],"Donnée supprimée")) )->html();
    else  ((new Trash((new ModelsTrash())->_get()['data'],"Echec de  suppression")) )->html();


}

if(isset($_GET['message'])){
    
}