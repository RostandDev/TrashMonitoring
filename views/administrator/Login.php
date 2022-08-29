<?php
namespace views\administrator;
use core\Page;

require_once "../core/autoloader.php";



class Login extends Page  {

    public function css()
    {
       
        ?>
        <link rel="stylesheet" href="public/css/login.css">

    <?php       
    }

    public function js()
    {
        
    }

    public function head()
    {
       
       
    ?>

   
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>

        <?php
        $this->css();
    }


    public function html()
    {
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <?php

        $this->head();
        $this->body();
        ?>
        </html>

<?php
    }



    public function body()
    {
         ?>
            <body>
            
           
           
          <div class="page">

          
           <div class="login">
            <form action="admins" method="post">
                <title>Login</title>
            <div class="part">
            <div class="title">Email</div>
            <div class="input">
                <input type="email" name="_email" id="identifier" placeholder="email@gmail.com">
            </div>
            
            </div>

            <div class="part">
            <div class="title">Mot de passe</div>
            <div class="input">
                <input type="password" name="_password" id="password">
            </div>
            
            </div>

            <div class="part">
                <div class="input">
                    <input type="submit" name="login" id="login" value="Connexion">
                </div>
            </div>
            </form>
           </div>
           </div>
        </body>  
        <?php
    }
}