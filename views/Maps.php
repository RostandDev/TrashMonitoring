<?php
namespace views;

use core\Page;


require_once "../core/Page.php";

class Maps  extends Page
{
    private $_data;
    public function __construct($_data=[]) {
        parent::__construct($_data);
        $this->_data = json_encode($_data);
    }

    public function css()
    {
        parent::css();
        ?>
            <!--link rel="stylesheet" href="../public/bib/leaflet/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
   crossorigin="" -->
   
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
   integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
   crossorigin="" >
   <style>
        #map { 
            height: 800px; 
            width: 100%;
            text-align: center;
            margin: auto;
        }

    </style>
   

    <?php       
    }

    public function js()
    {
       
        parent::js();
        ?>
        
        <!--script src="../public/bib/leaflet/leaflet.js" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
   crossorigin="" --></script>
        <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
   integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
   crossorigin=""></script>

   <script>

        let data = [];
         var xhr = new XMLHttpRequest();
        xhr.open('GET',"http://localhost/tiddTrash/trashs?onmaps");
        xhr.onreadystatechange = function()
        {
            if(xhr.readyState == 4 && xhr.status == 200)
            {
                var _data = xhr.responseText;

                _data = JSON.parse(_data);

                for(var i in _data){
                    let values = [_data[i]['_longitude'], _data[i]['_latitude'],_data[i]['_address']];

                    data[i] = values;
                   
                    
                    
                }
            }
        }
        xhr.send(null);
        
        
       
        var map = L.map('map').setView([6.1504068, 1.2189674], 20);


        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: 'tiddTrashs'
        }).addTo(map);

        //console.log(data);

        for(var i=0 in data)
        {
            console.log(data[i]);

            for(var j=0; j<data[i].length; j++)
            {
                console.log(data[i]+" et "+ data[1])
                var marker2 = L.marker([data[i][0], data[i][1]]).addTo(map);

                marker2.bindPopup("<b>"+ data[i][2] + "</b>").openPopup();
            }
        }


    function onMapClick(e) {
        alert("You clicked the map at " + e.latlng);
    }

    map.on('click', onMapClick);
   </script>

        <?php


        
    }

    

    public function body()
    {
        ?>
       
           <div id="map"></div>
        <?php

        $this->js();
    }
}
 
