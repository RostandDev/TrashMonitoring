<?php
namespace views;

use core\Page;
use core\View;

require_once "../core/autoloader.php";

class Trash extends Page
{
    private $_data;
    private $_message;
    public function __construct($_data=[], $_message='') {
        parent::__construct($_data);

        $this->_message = $_message;
        $this->_data = $_data;
    }

    public function css()
    {
        parent::css();

        ?>
        
            <style>
                
         
            </style>        

        <?php

    }
    public function html()
    {
        parent::html()
        
    ?>

          <div>
                   <div class="add">
                   <a href="trashs?add">Adddd</a>
                   </div>

                   <div class="maps">
                   <a href="maps?maps">Voir sur la Carte</a>
                   </div>
                </div>
                <table class="trash">
                    <thead class="head">
                        <tr class="line">
                            <th class="identifiant">Identifiant</th>
                            <th class="longitude">Longitude</th>
                            <th class="latitude">Latitude</th>
                            <th class="latitude">Adress</th>
                            <th class="supprimer"><i class="icofont-trash"></i></th>
                        </tr>
                    </thead>

                    <tbody class="body ">
                       <?php  
                       foreach($this->_data as $key => $values){
                         ?>
                         </tr>
                        
                        <td class="identifiant"><?php echo $values['_uuid']; ?></td>
                        <td class="longitude"><?php echo $values['_longitude']; ?></td>
                        <td class="latitude"><?php echo $values['_latitude']; ?></td>
                        <td class="latitude"><?php echo $values['_address']; ?></td>
                        <td class="supprimer"><a href="trashs?delete&id=<?php echo $values['_id']; ?>"><i class="icofont-trash">Delete</i></a></td>
                        <td class="update" ><a href="trashs?update&id=<?php  echo $values['_id']; ?>">update</a></td>
                       


                    <?php 

                       }
                       
                        echo $this->_message;
                       
                       ?>
                       </tr>
                    </tbody>                   
                </table>
            </div>
        <?php
    }

    public function add($_msg = ""){
       


        ?>
          <div class="form">
        <form action="trashs" method="post">
            <h2>Add</h2>

            <div class="longitude ">
                <span>Longitude</span>
                <input type="text" name="_longitude" id="" placeholder="69565656f">
            </div>

            <div class="latitude ">
                <span>Latitude</span>
                <input type="text" name="_latitude" id="" placeholder="69565656f">
            </div>

            <div class="latitude ">
                <span>Addresse</span>
                <input type="text" name="_address" id="" placeholder="Adomi">
            </div>
                
            <div class="submit ">
                <input type="submit" name="insert" id="" value="Enregistrer">
            </div>
        </form>

        <?php 
        echo $_msg;
        ?>
     </div>


<?php
    }




    public function update($_data, $_msg = ""){
       


        ?>
          <div class="form">
        <form action="trashs" method="post">
            <h2>Add</h2>

            <div class="longitude "> 
                <span>Longitude</span>
                <input type="text" name="_longitude" id="" value="  <?php echo $_data[0]['_longitude'] ?> ">
            </div>

            

            <div class="latitude ">
                <span>Latitude</span>
                <input type="text" name="_latitude" id="" value="  <?php echo $_data[0]['_latitude'] ?> ">
                <input type="hidden" name="_id" value="  <?php echo $_data[0]['_id'] ?> ">
            </div>

            <div class="longitude "> 
                <span>Adresse</span>
                <input type="text" name="_address" id="" value="  <?php echo $_data[0]['_address'] ?> ">
            </div>

            <div class="submit ">
                <input type="submit" name="update" id="" value="Metre à jour">
            </div>
        </form>

        <?php 
        
        echo $_msg;
        ?>
     </div>


<?php
    }
}
 
