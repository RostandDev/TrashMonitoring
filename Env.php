<?php
   /*
    * Auteur : ABOTCHI Kodjo Mawugno
    * 
    * Fichier .
    * date : 2022-07-30
    *
    */
    session_start();
    class Env{
        
        protected $_db_name;
        protected $_db_user;
        protected $_db_password;


        public function __construct(

            //demarage de le session 

            
            // Le nom de la base de donnée
            $_db_name = "Trash",

            // L'utilisateur de la base de donnée
            $_db_user = "root",
            
            // Le mot de passe de la base de donnée
            $_db_password =  "root"
            
            
            ){
                
            session_start();
            $this->_db_name = $_db_name;
            $this->_db_user = $_db_user;
            $this->_db_password = $_db_password;
        }

        public function _db(){

            
            return [
                "db_name" => $this->_db_name,
                "db_user" => $this->_db_user,
                "db_password" => $this->_db_password
            ];


        }



       
    }

   


    

    
   
?>    
