<?php
namespace views\administrator;
use core\Page;
use core\View;

require_once "../core/autoloader.php";



class Administrator extends View {
    private $_data;
  
    public function __construct($_data = [])
    {
        parent::__construct($_data);

        $this->_data = $_data;
        
    }




    public function html()
    {
        
         ?>
            
           <div class="page" id="users">

           <div class="header">
                       
                <div class="btns">
                        <div onclick="openForm('user');" ><a href="#" id="open"><i class="icofont-plus-circle"></i></a></div>
                        <div><i class="icofont-trash"></i></div>
                </div>
                       
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

            <div class="form useradd">
                <div class="close" onclick="closeForm('user')">&times;</div>
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
           <h2> Ajouter un utilisateur </h2>
          

            <form action="admins" method="post">
            <div> Nom </div>
            <input type="text" name="_last_name" id="" placeholder="nom" required>

            <div> Prenoms </div>
            <input type="text" name="_first_name" id="" placeholder="prenoms" required>

            <div> Email </div>
            <input type="email" name="_email" id="" placeholder="email@gmail.com" required>
            <div class="password">

            
            </div>
            <div class="identifier">
            <div>Identifiant</div>
            <input type="text" name="_identifier" id="identifier" placeholder="toto47d" required>
            
            </div>

            <div class="password">
            <div>Password</div>
            <input type="text" name="_password" id="password" required>
            
            </div>

            <div class="submit">
            
            <input type="submit" name="insert" id="login" value="Ajouter" >
            
            </div>



            </form>

        <?php
    }
}