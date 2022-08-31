<?php
namespace views;

use core\Page;


require_once "../core/Page.php";

class Maps  extends Page
{
    private $_data;
    public function __construct($_data=[]) {
        parent::__construct($_data);
        $this->_data = ($_data);
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
    <link rel="stylesheet" href="public/css/map.css">
   

    <?php       
    }

    public function js()
    {
       
        parent::js();
        ?>
        
       
        <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
   integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
   crossorigin=""></script>

   <script>
   
       
        var map = L.map('map').setView([6.2079449,1.1731463], 13);

              L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: 'tiddTrashs'
        }).addTo(map);

        long = 1.1731463;
        lat = 6.2079449
        var marker2 = L.marker([lat,long]).addTo(map);

        marker2.bindPopup("<b>TIDD</b>").openPopup();




        

    </script>
    <?php
        foreach($this->_data as $key => $values){

                if($values['_full_level'] <= 50){
                    ?>
                        <script>
                            var Icon = L.icon({
                                iconUrl: 'public/media/fonts/icons/blueTrash.jpeg',
                                iconSize:     [18,18], // size of the icon
                                
                                iconAnchor:   [0, 0], // point of the icon which will correspond to marker's location
                                shadowAnchor: [4, 62],  // the same for the shadow
                                popupAnchor:  [0, 0] // point from which the popup should open relative to the iconAnchor
                            });
                        </script>
                    <?php
                }
                elseif($values['_full_level'] <95 && $values['_full_level']>=80){
                    ?>
                        <script>
                            var Icon = L.icon({
                                iconUrl: 'public/media/fonts/icons/yellowTrash.jpeg',
                                iconSize:     [18,18], // size of the icon
                                
                                iconAnchor:   [0, 0], // point of the icon which will correspond to marker's location
                                shadowAnchor: [4, 62],  // the same for the shadow
                                popupAnchor:  [0, 0] // point from which the popup should open relative to the iconAnchor
                            });
                        </script>
                    <?php
                }

                else{
                    ?>
                        <script>
                            var Icon = L.icon({
                                iconUrl: 'public/media/fonts/icons/redTrash.jpeg',
                                iconSize:     [18,18], // size of the icon
                                
                                iconAnchor:   [0, 0], // point of the icon which will correspond to marker's location
                                shadowAnchor: [0, 0],  // the same for the shadow
                            });
                        </script>
                    <?php
                }
            ?>

            <?php
            ?>
                <script>
                        long = <?php echo $values['_longitude']?>;
                        lat = <?php echo $values['_latitude']; ?>;

                    
                    
                    var marker2 = L.marker([lat, long], {icon: Icon}).addTo(map); /*L.marker([lat,long]).addTo(map)*/;

                    marker2.bindPopup("<b><?php echo $values['_address']." niveau : ".$values['_full_level']; ?>%</b>").openPopup();


                </script>
            <?php
        }
    ?>
    <script>



    function onMapClick(e) {
        alert("You clicked the map at " + e.latlng);
    }

    map.on('click', onMapClick);
   </script>

        <?php


        
    }

    

    public function body()
    {
      parent::body(); 
      
      ?>
       
           <div class="page">
                <div id="map"></div>
           </div>
        <?php

        $this->js();
    }
}
 
