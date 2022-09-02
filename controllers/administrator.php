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
   
    
    use core\Password;
    use core\Uuid ;
    use models\Administrator as Admin;
    use models\Administrator;
    use views\administrator\Account;
    use views\administrator\Add;
    use views\administrator\Administrator as AdministratorAdministrator;
    use views\administrator\Login;

    

if(isset($_SESSION['USER_UUID'])){

    if(isset($_GET['admins'])   ){
        
        if($_SESSION['USER_SUPER'] == true){
           
            if(isset($_GET['id'])) {
                $data = [
                    "status" => !0,
                    "message" => "USERS",
                    "data" => (new Administrator())->_get_by_id(intval(htmlspecialchars($_GET['id'])))['data']
                ];
            }
            
         
            else{
                $data = [
                    "status" => !0,
                    "message" => "USERS",
                    "data" => (new Administrator())->_get()['data']
                ];
        
                
            }

            print_r(json_encode($data) ) ;

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
                    header('content-type: applicaton/json');
        

                    $data = [
                        "status" => !0,
                        "succes" => "SUCCESS",
                        "data" => (new Admin())->_get()['data']
                    ];
            
                    print_r(json_encode($data) ) ;
                } 
                else{
                    header('content-type: applicaton/json');
        

                    $data = [
                        "status" => !1,
                        "error" => "DATA_ERROR",
                        "data" => (new Admin())->_get()['data']
                    ];
            
                    print_r(json_encode($data) ) ;
                }

            }else{
                header('content-type: applicaton/json');
        

                $data = [
                    "status" => !1,
                    "error" => "EMAIL_ERROR",
                    "data" => (new Admin())->_get()['data']
                ];
        
                print_r(json_encode($data) ) ;
            }
        }
        else {
            header('content-type: applicaton/json');
        

            $data = [
                "status" => !1,
                "error" => "SESSION_EXPIRE",
                "data" => (new Admin())->_get()['data']
            ];
    
            print_r(json_encode($data) ) ;
        }

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
    
            if( $admin['status'] == !0) header("location:home"); 
            else   header("location:home"); 
    
    
        }
        else (new Login())->html();


    }

    if(isset($_GET['delete'])){
        if($_SESSION['USER_SUPER'] == true){

            $admin = (new Admin())->_delete([ 
                "_id" => intval($_GET['id']),
            ]);
    
             if($admin['status'] == !0) header("location:home"); 
             else header("location:home"); 

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
                header("location:home"); 
            }
            else{
                header("location:home"); 
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
                
                header("location:home");                
            }
            else{
                header("location:home"); 
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
            header("location:home"); 
        }
        elseif($admin['user']['_access_level'] == "reader"){
            $_SESSION['USER_SUPER'] = "reader";

           header("location:home");
        }
        else header("location:start");

    }
    else{
        header("location:start");
    }

    
}