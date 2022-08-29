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
         ?>
           <h2>Admin</h2>

           <h3><a href="admins?admins">Utilisateurs</a></h3>
           <h3><a href="maps" >Cartes</a></h3>

           <div class="users">
            <table>
                <thead>
                    <tr>
                        <th>Num</th>
                        <th>Nom</th>
                        <th>Prenoms</th>
                        <th>Email</th>
                        <th>Droit</th>
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
                                <td class="supprimer"><a href="trashs?delete&id=<?php echo $value['_id']; ?>"><i class="icofont-trash">Delete</i></a></td>
                                <td class="update" ><a href="trashs?update&id=<?php  echo $value['_id']; ?>">update</a></td>

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