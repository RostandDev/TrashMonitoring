<?php
namespace views\administrator;
use core\Page;

require_once "../core/autoloader.php";



class Login  {

    public function css()
    {
       
        ?>
        <link rel="stylesheet" href="public/css/home.less">

    <?php       
    }

    public function js()
    {
        
    }

    public function html()
    {
        $this->body();
    }



    public function body()
    {
         ?>
           <h2> loging Page</h2>
          
           <div class="login">
            <form action="admins" method="post">
       
            <div class="identifier">
            <span>Email</span>
            <input type="email" name="_email" id="identifier" placeholder="email@gmail.com">
            
            </div>

            <div class="password">
            <span>Password</span>
            <input type="password" name="_password" id="password">
            
            </div>

            <div class="submit">
            
            <input type="submit" name="login" id="login" value="Connexion">
            
            </div>
            </form>
           </div>
        <?php
    }
}