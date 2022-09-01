<?php
    /*
    * Stagaires TIDD 2022
    * Auteur : ABOTCHI Kodjo Mawugno
    * Syteme de monotoring des poubelles 
    * Fichier 
    * date : 2022-08-24
    *
    */
    namespace  models;
    require_once("../core/autoloader.php");

    use \core\DB;
    use core\Password;

    class Administrator extends DB {

        public function __construct(){

            parent::__construct();
            
        }

        public function _insert($_data){
                                 
            $insert = $this-> _execute("INSERT INTO t_administrators(_uuid, _last_name, _first_name, _email, _identifier, _password) VALUES ( :_uuid, :_last_name, :_first_name, :_email, :_identifier, :_password )", 
            [
                ':_uuid' => $_data['_uuid'],
                ':_last_name' => $_data['_last_name'],
                ':_first_name' => $_data['_first_name'],
                ':_email' => $_data['_email'],
                ':_identifier' => $_data['_identifier'],
                ':_password' => $_data['_password']

            ]);
            
            if($insert){
                return [
                    'status' => !0,
                    'id' => $this-> _get_id($_data['_uuid'])['id']
                ];
            }
            else{
                return [
                    'status' => !1,                  
                ];
            }
        }

        public function _get(){
        
            $data = $this -> _query(" SELECT * FROM t_administrators ");
    
            if($data['status'] == !0){
                return [
                    'status' => !0,
                    'data' => $data['data']
                ];
            }
        }

        public function _update( array $_data){

            $updated = $this-> _execute("UPDATE  t_administrators SET  _last_name = :_last_name, _first_name = :_first_name , _email = :_email, _identifier  = :_identifier, _password = :_password WHERE _id = :_id", 
            [
                ":_id" => $_data['_id'],
                ':_last_name' => $_data['_last_name'],
                ':_first_name' => $_data['_first_name'],
                ':_email' => $_data['_email'],
                ':_identifier' => $_data['_identifier'],
                ':_password' => $_data['_password']

            ]);
            
            if($updated){
                return [
                    'status' => !0,
                    'id' =>$_data['_id']
                ];
            }
            else{
                return [
                    'status' => !1,                  
                ];
            }
        }

        public function _delete(array $_data){
            $updated = $this-> _execute("DELETE FROM t_administrators WHERE _id = :_id", 
            [
                ":_id" => $_data['_id'],
                
            ]);
            
            if($updated){
                return [
                    'status' => !0,
                    'id' => $_data['_id']
                ];
            }
            else{
                return [
                    'status' => !1,                  
                ];
            }
        }

        public function _get_by_id($_id){

            $data = $this->_query("SELECT * FROM t_administrators WHERE _id = $_id");

            if($data['status'] == !0){

                return [
                    'status' => !0,
                    'data' => $data['data']
                ];
            }
            else{
                return [
                    'status' => !1
                ]; 
            }
        }

        public function _get_by_mail($_email){

            $data = $this->_query("SELECT * FROM t_administrators WHERE _email = '$_email'");

            return $data['data'];
        }
        
        public function _chek_email($_email){

            $data = $this -> _query(" SELECT _id, _password  FROM t_administrators WHERE _email = '$_email' ");

            if($data['status'] == !0){

                return [
                    'status' => !0,
                    'id' => $data['data'][0]["_id"],
                    'password' => $data['data'][0]["_password"]
                ];
            }
            else{
                return !1;
            }

            
        }

                
        public function _chek_identifier($_identifier){

            $data = $this -> _query(" SELECT _id ,_password FROM t_administrators WHERE _identifier = '$_identifier' ");

            if($data['status'] == !0){

                return [
                    'status' => !0,
                    'id' => $data['data'][0]["id"],
                    'password' => $data['data'][0]["_password"]
                ];
            }
            else{
                return !1;
            }

            
        }

        public function _get_pass_by_identifier($_identitifier){
            $data = $this -> _query(" SELECT password FROM t_administrators WHERE _identifier = '$_identitifier' ");

            if(count($data['data']) == 1){

                return [
                    'status' => !0,
                    'password' => $data['data'][0]["_password"]
                ];
            }
            else{
                return ['status'=> !1];
            }
        }

        public function _connexion($_data){

            $email =  $this ->_chek_email($_data['_email']);

            if($email['status'] == !0){
                if((new Password())->_verify($_data['_password'], $email['password'])) {

                    $data = $this->_get_by_mail($_data['_email']);

                    return [
                        'status' => !0,
                        'user' => [
                            '_uuid' => $data[0]['_uuid'],
                            '_last_name' => $data[0]['_last_name'],
                            '_first_name' => $data[0]['_first_name'],
                            '_email' => $data[0]['_email'],
                            '_access_level' => $data[0]['_access_level'],
                            '_id' => $data[0]['_id'],
                        ]
                    ];
                }
                else return [ 'status' => !1] ;
            }
            else return [ 'status' => !1] ; 
        }


        public function _get_id( $_uuid ){
        
            $data = $this -> _query(" SELECT _id FROM t_administrators WHERE _uuid = '$_uuid' ");

            if($data['status'] == !0){
                return [
                    'status' => !0,
                    'id' => $data['data'][0]["_id"]
                ];
            }
        }

        public function _enable_admin( $_data ){
        
            $data = $this -> _execute("UPDATE  t_administrators SET _access_level = 'editor' WHERE _id = :_id ", [
                ":_id" => $_data['_id'],
                
            ]);

            if($data['status'] == !0){
                return [
                    'status' => !0,
                    'id' =>  $_data['_id']
                ];
            }
            else{
                return [
                    'status' => !1
                ];
            }
        }

        public function _disable_admin( $_data ){
        
            $data = $this -> _execute("UPDATE  t_administrators SET _access_level = 'reader' WHERE _id = :_id ", [
                ":_id" => $_data['_id'],
                
            ]);

            if($data['status'] == !0){
                return [
                    'status' => !0,
                    'id' => $_data['_id']
                ];
            }
        }
    }
