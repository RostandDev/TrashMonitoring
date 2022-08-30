<?php
namespace views\trash;

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

                <div class="addbtn">
                    <a href="trashs?add">Ajouter</a>
                </div>
                </div>
                <table >
                    <thead class="head">
                        <tr class="line">
                            <th class="identifiant">Identifiant</th>
                            <th class="longitude">Longitude</th>
                            <th class="latitude">Latitude</th>
                            <th class="latitude">Adress</th>
                            <th class="supprimer"></th>
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
                        <td class="deletebtn"><a href="trashs?delete&id=<?php echo $values['_id']; ?>" ><i class="icofont-trash"></i></a></td>
                        <td class="updatebtn" ><a href="trashs?update&id=<?php  echo $values['_id']; ?>"><i class="icofont-ui-edit"></i></a></td>
                        <td class="readbtn" ><a href="trashs?status&id=<?php  echo $values['_id']; ?>"><i class="icofont-eye"></i></a></td>
                       


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

    
}
 
