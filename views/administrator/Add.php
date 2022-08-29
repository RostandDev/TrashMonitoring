<?php
namespace views\administrator;
use core\Page;

require_once "../core/autoloader.php";



class Add extends Page {

    public function __construct($_data = [])
    {
        parent::__construct($_data);
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
            <form action="admins" method="post">
            <div> Nom </div>
            <input type="text" name="_last_name" id="" required>

            <div> Prenoms </div>
            <input type="text" name="_first_name" id="" required>

            <div> Email </div>
            <input type="email" name="_email" id="" required>
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
           </div>
        <?php
    }
}