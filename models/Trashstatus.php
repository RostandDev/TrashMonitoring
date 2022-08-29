<?php 
namespace models;

use core\DB;

require_once('../core/autoloader.php');


class Trashstatus extends DB{
    public function __construct()
    {
        parent::__construct();
    }

    public function _insert($_data){
                                 
        $insert = $this-> _execute("INSERT INTO t_trashs_status (_uuid, _status, _full_level, _trash) VALUES ( :_uuid, :_status, :_full_level, :_trash )", 
        [
            ':_uuid' => $_data['_uuid'],
            ':_status' => $_data['_status'],
            ':_full_level' => $_data['_full_level'],
            ':_trash' => $_data['_trash']
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
        
        $data = $this -> _query(" SELECT * FROM t_trash_status ");

        if($data['status'] == !0){
            return [
                'status' => !0,
                'id' => $data['data']
            ];
        }
    }


    public function _get_id( $_uuid ){
        
        $data = $this -> _query(" SELECT id FROM t_trash_status WHERE _uuid = '$_uuid' ");

        if($data['status'] == !0){
            return [
                'status' => !0,
                'id' => $data['data'][0]["_id"]
            ];
        }
    }

    public function _delete( $_id ){
        
        $data = $this -> _query(" DELETE  FROM t_trashs WHERE _id = '$_id' ");

        if($data['status'] == !0){
            return [
                'status' => !0,
                'id' => $_id
            ];
        }
    }

    public function _get_by_id($_id){
        
        $data = $this -> _query(" SELECT * FROM t_trashs WHERE _id = $_id ");

        if($data['status'] == !0){
            return [
                'status' => !0,
                'id' => $data['data']
            ];
        }
    }


    public function _get_last_five($_id){
        
        $data = $this -> _query(" SELECT * FROM t_trashs  ORDER BY _sent_at DESC limit 5 WHERE _id = $_id ");

        if($data['status'] == !0){
            return [
                'status' => !0,
                'id' => $data['data']
            ];
        }
    }

}




?>