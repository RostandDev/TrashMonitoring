<?php
namespace views\administrator;
use core\Page;

require_once "../core/autoloader.php";



class Administrator extends Page {
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

           <div class="addbtn">
                <a href="admins?add">Ajouter</a>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>Num</th>
                        <th>Nom</th>
                        <th>Prenoms</th>
                        <th>Email</th>
                        <th>Droit</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                   $num = 0;
                        foreach($this->_data as $key => $value){
                           $num++; ?>
                            <tr>
                                <td><?php echo $num ;?></td>
                                <td><?php echo $value['_last_name']; ?></td>
                                <td><?php echo $value['_first_name']; ?></td>
                                <td><?php echo $value['_email']; ?></td>
                                <td><?php echo $value['_access_level']; ?></td>
                                <td class="deletebtn"><a href="admins?delete&id=<?php echo $value['_id']; ?>"><i class="icofont-trash"></i></a></td>
                                <?php

                                if($value['_access_level'] == "editor"){
                                    ?>
                                        <td class="updatebtn" ><a href="admins?disable&id=<?php  echo $value['_id']; ?>"><i class="icofont-ui-check"></i></a></td>
                                    <?php
                                }
                                elseif($value['_access_level'] == "reader"){?>
                                <td class="deletebtn" ><a href="admins?enable&id=<?php  echo $value['_id']; ?>"><i class="icofont-ui-close"></i></a></td>
                                <?php
                                }
                                ?>
                                

                            </tr>

                            <?php
                        }
                   ?>
                </tbody>
            </table>
           </div>
        <?php
    }
}