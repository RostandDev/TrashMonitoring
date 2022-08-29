<?php
    namespace views\trash;

use core\Page;

    require_once "../core/autoloader.php";

    class Add extends Page{
        private $_message;
        private $_data;
        public function __construct($_data = [], $_message = "")
        {
            parent::__construct($_data);

            $this->_message = $_message;
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
                <h2>Ajouter une nouvelle poubelle</h2>

                <div class="longitude ">
                    <div>Longitude</div>
                    <input type="text" name="_longitude" id="" placeholder="69565656f" required>
                </div>

                <div class="latitude ">
                    <div>Latitude</div>
                    <input type="text" name="_latitude" id="" placeholder="69565656f" required>
                </div>

                <div class="latitude ">
                    <div>Addresse</div>
                    <input type="text" name="_address" id="" placeholder="Adomi" required >
                </div>
                    
                <div class="submit ">
                    <input type="submit" name="insert" id="" value="Enregistrer">
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