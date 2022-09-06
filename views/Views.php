<?php
namespace views;
use core\Page;
use views\administrator\Add;
use views\administrator\Administrator;
use views\maps\Maps;
use views\trash\Trash;

require_once "../core/autoloader.php";



class Views extends Page {
    private $_data;
    public function __construct($_data = [])
    {
        parent::__construct($_data);
        $this->_data = $_data;
        
    }

    public function css()
    {
        parent::css();
        ?>
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
                integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
                crossorigin="" >
            <link rel="stylesheet" href="public/css/map.css">

    <?php       
    }

    public function js()
    {
        parent::js();
    }

    public function body()
    {
        
        parent::body();

        ?>
            


        <?php


        
    }
}