<?php
namespace views\status;
use core\Page;

require_once "../core/autoloader.php";



class Status extends Page {
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
           <h2> Ajouter un utilisateur </h2>
          
           <div class="page">
           <table >
                    <thead class="head">
                        <tr class="line">
                            <th class="identifiant">Numero</th>
                            <th class="longitude">Date & Heure</th>
                            <th class="latitude">Niveau</th>
                            <th class="latitude">Adresse</th>
                            <th class="supprimer"></th>
                        </tr>
                    </thead>

                    <tbody class="body ">
                       <?php  
                       $n=0;
                       foreach($this->_data as $key => $values){ $n++;
                         ?>
                         </tr>
                        
                        <td class="identifiant"><?php echo $n; ?></td>
                        <td class="longitude"><?php echo $values['_set_at']; ?></td>
                        <td class="latitude"><?php echo $values['_full_level']; ?></td>
                        <td class="latitude"><?php echo $values['_address']; ?></td>
                        <td class="deletebtn" ><a href="trashs?onmaps&id=<?php  echo $values['_id']; ?>"><i class="icofont-eye"></i></a></td>
                       


                    <?php 

                       }
                       
                       
                       
                       ?>
                       </tr>
                    </tbody>                   
                </table>
           </div>
        <?php
    }
}