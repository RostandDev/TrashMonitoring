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
         ?>
           <h2> Add user </h2>
          
           <div class="login">
            <form action="admins" method="post">
            <span> Nom </span>
            <input type="text" name="_last_name" id="">

            <span> Prenoms </span>
            <input type="text" name="_first_name" id="">

            <span> Email </span>
            <input type="email" name="_emil" id="">
            <div class="password">

            
            </div>
            <div class="identifier">
            <span>Identifiant</span>
            <input type="text" name="_identifier" id="identifier" placeholder="toto47d">
            
            </div>

            <div class="password">
            <span>Password</span>
            <input type="text" name="_password" id="password">
            
            </div>

            <div class="submit">
            
            <input type="submit" name="insert" id="login" value="Connexion">
            
            </div>



            </form>
           </div>
        <?php
    }
}