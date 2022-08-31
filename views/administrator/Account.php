<?php
namespace views\administrator;
use core\Page;

require_once "../core/autoloader.php";



class Account extends Page {
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


                <div>Vos informations</div>


                   <?php

                        foreach($this->_data as $key => $value){
                    ?>

                                <div>Nom : <?php echo $value['_last_name']; ?></div>
                                <div>Prenoms : <?php echo $value['_first_name']; ?></div>
                                <div>Email<?php echo $value['_email']; ?></div>
                                <div>Droit d'accès : <?php

                                    if($value['_access_level'] == "editor"){
                                        echo "Administrateur";
                                    }
                                    elseif($value['_access_level'] == "reader"){
                                        echo "Utilisateur"; ?>
                                </div>
                                <?php
                                }

                        }
                   ?>

           </div>

        <?php
    }
}