<?php 
namespace models;

use core\DB;

require_once('../core/autoloader.php');


class Trash extends DB{
    public function __construct()
    {
        parent::__construct();
    }

    public function _insert($_data){
        
        $insert = $this-> _execute("INSERT INTO t_trashs(_uuid, _longitude, _latitude,_address, _author,_name) VALUES ( :_uuid, :_longitude, :_latitude, :_address , :_author,:_name)", 
        [
            ':_uuid' => $_data['_uuid'],
            ':_longitude' => $_data['_longitude'],
            ':_name' => $_data['_name'],
            ':_latitude' => $_data['_latitude'],
            ':_author' => $_data['_author'],
            ':_address' => $_data['_address']
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


    public function _update($_data){
                                 
        $insert = $this-> _execute("UPDATE   t_trashs SET _uuid = :_uuid, _longitude = :_longitude, _latitude = :_latitude, _address = :_address, _author = :_author, _name = :_name WHERE _id = :_id", 
        [
            ':_uuid' => $_data['_uuid'],
            ':_longitude' => $_data['_longitude'],
            ':_latitude' => $_data['_latitude'],
            ':_name' => $_data['_name'],
            ':_address' => $_data['_address'],
            ':_author' => $_data['_author'],
            ':_id' => $_data['_id']
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


    
    public function _delete($_id){
        
        $status = $this -> _query(" SELECT COUNT(_id) AS _count FROM t_trashStatus WHERE _trash = $_id ");

        if(count($status['data'][0]['_count']) > 0) $this -> _query(" DELETE FROM t_trashStatus WHERE _trash = $_id ");
        
        $data = $this -> _query(" DELETE FROM t_trashs WHERE _id = $_id ");

        if($data){
            return [
                'status' => !0,
                'id' => $_id
            ];
            
        }
        else return ['status' => !1];
    }


    public function _get(){
        
        $data = $this -> _query(" SELECT * FROM t_trashs ORDER BY _name ");

        if($data['status'] == !0){
            return [
                'status' => !0,
                'data' => $data['data']
            ];
        }
    }


    public function _get_id( $_uuid ){
        
        $data = $this -> _query(" SELECT _id FROM t_trashs WHERE _uuid = '$_uuid' ");

        if($data['status'] == !0){
            return [
                'status' => !0,
                'id' => $data['data'][0]["_id"]
            ];
        }
    }

    public function _get_by_id($_id){
        
        $data = $this -> _query(" SELECT * FROM t_trashs WHERE _id = $_id ");

        if($data['status'] == !0){
            return [
                'status' => !0,
                'data' => $data['data']
            ];
        }
    }

}




?>