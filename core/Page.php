<?php
namespace core;

require_once "View.php";

class Page extends View
{
    public function __construct($_data = [])
    {
        parent::__construct($_data);
    }

    public function css()
    {

    }

    public function js()
    {
        
    }

    public function head()
    {
        ?>
        <head>
            <?php $this->css(); ?>  
            
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Panel de controle</title>
        </head>
        <?php
    }

    public function body()
    {
        
    }

    public function html()
    {
        ?>
            <!DOCTYPE html>
            <html lang="fr">
                <?php
                    $this->head();
                    ?>

                           <div class="head">
                            <div class="user"><?php  echo $_SESSION['USER_UUID'];?></div>
                            <div class="disc-btn"><a href="deconnecte">Se deconnecter</a></div>
                           </div>
                            <h3></h3>
                            <h3><a href="trashs?trashs">Tableau de trash</a></h3>
                    <?php
                    $this->body();
                ?>
            </html>
        <?php
    }
}