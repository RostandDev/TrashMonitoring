<?php

use models\Trashstatus;

require_once('../core/autoloader.php');

if(isset($_POST['status'])){
    header('content-type: applicaton/json');

    $status = (new Trashstatus())->_insert(        [
        '_full_level' => htmlspecialchars($_POST['_full_level']),
        '_trash' => htmlspecialchars($_POST['_trash'])
    ]);

    if($status['status'] == !0) {
        $data = [
            "status" => !0,
            "trash" => $status['_id']
        ];
    }

    else  $data = [
        "status" => !1,
        "error" => "DATA_ERROR",
        "trash" => $status['_id']
    ];

    print_r(json_encode($data) ) ;

}