<?php
namespace views\trash;
use core\View;

require_once "../core/autoloader.php";

class Trash extends View
{

    private $_data;
    public function __construct($_data=[]) {
        parent::__construct($_data);
        $this->_data =$_data ;

    }


    public function html()
    {
       
                 
    ?>


    <div class="page" id="trashs">



        <div class="header">
                       
            <div class="btns">
                <div onclick="openForm('trash');" ><a href="#" id="open"><i class="icofont-plus-circle"></i></a></div>
                <div><i class="icofont-trash"></i></div>
            </div>
            
        </div>

          <table >
                <thead class="head">
                  <tr class="line">
                      <th>Num</th>
                      <th>Nom</th>
                      <th class="longitude">Longitude</th>
                      <th class="latitude">Latitude</th>
                      <th class="latitude">Adress</th>
                      <th class="supprimer"></th>
                  </tr>
                </thead>

                <tbody class="body ">
                    <?php  
                    $n=0;
                    foreach($this->_data as $key => $values){
                        $n++;
                    ?>
                    </tr>
                        <td class="identifiant"><?php echo $n; ?></td>
                        <td><?php echo $values['_name']; ?></td>
                        <td class="longitude"><?php echo $values['_longitude']; ?></td>
                        <td class="latitude"><?php echo $values['_latitude']; ?></td>
                        <td class="latitude"><?php echo $values['_address']; ?></td>
                        <td class="deletebtn"><a href="trashs?delete&id=<?php echo $values['_id']; ?>" ><i class="icofont-trash"></i></a></td>
                        <td class="updatebtn" ><a href="trashs?update&id=<?php  echo $values['_id']; ?>"><i class="icofont-ui-edit"></i></a></td>
                        <td class="readbtn" ><a href="trashs?status&id=<?php  echo $values['_id']; ?>"><i class="icofont-eye"></i></a></td>
                    
                    </tr>
                    <?php } ?>
                </tbody>                   
            </table>

            <div class="form trashadd">
                <div class="close" onclick="closeForm('trash')">&times;</div>
            <?php

                $this->add();

            ?>
            </div>
        </div>

  <?php

   
    }


    public function add()
    {
        
    

        ?>
               
            <form action="trashs" method="post">
                <h2>Ajouter une nouvelle poubelle</h2>
                <div class="longitude ">
                    <div>Nom</div>
                    <input type="text" name="_name" id="" placeholder="69565656f" required>
                </div>
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
    }



    
}
 
