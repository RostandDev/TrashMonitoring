<?php
    namespace views\trash;

use core\Page;

    require_once "../core/autoloader.php";

    class Update extends Page{
        private $_message;
        private $_data;
        public function __construct($_data = [], $_message = "")
        {
            parent::__construct($_data);

            $this->_message = $_message;
            $this->_data = $_data;
        }
    
        public function css()
        {
            parent::css();
            ?>
            <link rel="stylesheet" href="public/css/home.less">
    
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

            <div class="page">

           
           <div class="form">
        <form action="trashs" method="post">
            <h2>Modifier les informations de la poubelle : <?php echo $this->_data[0]['_uuid'] ?> </h2>

            <div class="longitude "> 
                <span>Longitude</span>
                <input type="text" name="_longitude" id="" value="  <?php echo $this->_data[0]['_longitude'] ?> ">
            </div>

            

            <div class="latitude ">
                <span>Latitude</span>
                <input type="text" name="_latitude" id="" value="  <?php echo $this->_data[0]['_latitude'] ?> ">
                <input type="hidden" name="_id" value="  <?php echo $this->_data[0]['_id'] ?> ">
            </div>

            <div class="longitude "> 
                <span>Adresse</span>
                <input type="text" name="_address" id="" value="  <?php echo $this->_data[0]['_address'] ?> ">
            </div>

            <div class="submit ">
                <input type="submit" name="update" id="" value="Metre à jour">
            </div>
        </form>

        <?php 
        
        echo $this->_message;
        ?>
     </div>
     </div>


        <?php
        }
    }




?>