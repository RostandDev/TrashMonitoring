<?php
session_start();
    /*
    * Stagaires TIDD 2022
    * Auteur : ABOTCHI Kodjo Mawugno
    * Site de TIDD  
    * Fichier : Controlleur de toutes les actions sur un administrateur
    * date : 2022-07-30
    *
    */

    require_once("../core/autoloader.php");
    require_once("../core/phpqrcode/qrlib.php");
    
    use core\Password;
    use core\Uuid ;
    use models\Administrator as Admin;
    use models\Administrator;
use views\administrator\Account;
use views\administrator\Add;
    use views\administrator\Administrator as AdministratorAdministrator;
    use views\administrator\Login;
    use views\Maps;

if(isset($_SESSION['USER_UUID'])){

    if(isset($_GET['admins'])   ){
        
        if($_SESSION['USER_SUPER'] == true){
            if(isset($_GET['id'])) (new AdministratorAdministrator((new Administrator())->_get_by_id(intval(htmlspecialchars($_GET['id'])))['data'],""))->html();
            else (new AdministratorAdministrator((new Administrator())->_get()['data'],""))->html();
        }
        else (new Login())->html();
    }

    if(isset($_GET['account'])   ){
        
            if(isset($_GET['id'])) (new Account((new Administrator())->_get_by_id(intval(htmlspecialchars($_GET['id'])))['data'],""))->html();
            else (new Login())->html();
    }



    if(isset($_GET['login'])) (new Login())->html();

    if(isset($_POST['insert'])){

        if($_SESSION['USER_SUPER'] == "editor"){
            $uuid = (new Uuid())->_uuid();
            $password = (new Password())->_hash(htmlspecialchars($_POST['_password']));
    
            $email = htmlspecialchars($_POST['_email']);
            if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",  $email))
            {
    
                $admin = (new Admin())->_insert([
                    '_uuid'=> $uuid,
                    '_last_name'=>htmlspecialchars($_POST['_last_name']),
                    '_first_name'=>htmlspecialchars($_POST['_first_name']),
                    '_email'=>$email, 
                    '_identifier' => htmlspecialchars($_POST['_identifier']), 
                    '_password'=> $password

                ]);
                
                if( $admin['status'] == !0){

                    $data="Mot de pass = ".htmlspecialchars($_POST['_password']).",email = ".htmlspecialchars($_POST['_email']); //données à contenir
                    $img = $uuid.".png"; // nom de l'image
                    
                    QRcode::png($data, "/../disk/qr/".$img); // On crée notre QR Code

                    header("location:admins?admins"); 
                } 
                else header("location:admins?admins"); ;

            }else{
                header("location:admins?add"); 
            }
        }
        else (new Login())->html();

    }



    if(isset($_POST['update'])){



        if($_SESSION['USER_SUPER'] == true){
            $password = (new Password())->_hash(htmlspecialchars($_POST['_password']));

            $email = htmlspecialchars($_POST['_email']);
        
    
            $admin = (new Admin())->_update([ 
                "_id" => intval($_POST['_id']),
                '_last_name'=>htmlspecialchars($_POST['_last_name']),
                '_first_name'=>htmlspecialchars($_POST['_first_name']),
                '_email'=>$email, 
                '_identifier' => htmlspecialchars($_POST['_identifier']), 
                '_password'=> $password
            ]);
    
            if( $admin['status'] == !0) (new AdministratorAdministrator([],"Donnée mise à jour avec succèss"));
            else   (new AdministratorAdministrator([],"Echec  inserée avec succèss") );
    
    
        }
        else (new Login())->html();


    }

    if(isset($_GET['delete'])){
        if($_SESSION['USER_SUPER'] == true){

            $admin = (new Admin())->_delete([ 
                "_id" => intval($_GET['id']),
            ]);
    
             if($admin['status'] == !0) (new AdministratorAdministrator((new Administrator())->_get()['data'],"Donnée supprimer "))->html();
             else (new AdministratorAdministrator((new Administrator())->_get()['data'],"Echéc de suppression"))->html();

        }
        else (new Login())->html();


    }



    if(isset($_GET['enable'])){

        if($_SESSION['USER_SUPER'] == 'editor'){
            echo 'ok';
            $enable = (new Administrator())->_enable_admin([
                "_id"=> htmlspecialchars($_GET['id'])
            ]);
    
            if($enable['status'] == !0){
                header("location:admins?admins");
            }
            else{
                header("location:admins?admins");
            }
        }
        else (new Login())->html();
        

       
    }
    

    if(isset($_GET['disable']) ){

        if($_SESSION['USER_SUPER'] == true){
            $disable = (new Administrator())->_disable_admin([
                "_id"=> htmlspecialchars($_GET['id'])
            ]);
    
            if($disable['status'] == !0){
                
                header("location:admins?admins");                
            }
            else{
                header("location:admins?admins");
            }
        }
        else (new Login())->html();

    }

    if(isset($_GET['add'])  ){
        if($_SESSION['USER_SUPER'] == "editor") (new Add())->html();
        else (new AdministratorAdministrator([],"Echec "))->html(); 
    }


    if(isset($_GET['disconnecte'])  ){

        session_destroy();

        (new Login())->html();

        
    }

}
else{

    session_destroy();

    (new Login())->html();

    
}


if(isset($_POST['login'])){

    $admin = (new Admin())->_connexion([ 
        '_email' => htmlspecialchars($_POST['_email']), 
        '_password'=> htmlspecialchars($_POST['_password'])
    ]);

    if($admin['status'] == !0){

        $_SESSION['USER_UUID'] = $admin['user']['_uuid'];
        $_SESSION['USER_LAST_NAME'] = $admin['user']['_last_name'];
        $_SESSION['USER_FIRST_NAME'] = $admin['user']['_first_name'];
        $_SESSION['USER_EMAIL'] = $admin['user']['_email'];
        $_SESSION['USER_ID'] = $admin['user']['_id'];
        


        if($admin['user']['_access_level'] == "editor") {
            $_SESSION['USER_SUPER'] = "editor";
            header("location:admins?admins"); 
        }
        elseif($admin['user']['_access_level'] == "reader"){
            $_SESSION['USER_SUPER'] = "reader";

           header("location:maps");
        }
        else header("location:start");

    }
    else{
        header("location:start");
    }

    
}