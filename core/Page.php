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
        ?>
        <script src="public/js/page.js"></script>
  
<?php
    }

    public function head()
    {
        ?>
        <head>
            <?php $this->css(); ?>  
            
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="public/css/header.css">
            <link rel="stylesheet" href="public/css/page.css">
            <link rel="stylesheet" href="public/media/fonts/icofont/icofont.css">
            <link rel="stylesheet" href="public/media/fonts/icofont/icofont.min.css">
            <title>Panel de controle</title>
            
        </head>
        <?php
    }

    public function body()
    {

        ?>
        <body>
            <div class="dash">                
                    <div class="onglet"></div>
                    <div class="onglet trash"><a href="trashs?trashs"> <i class="icofont-trash"></i>Poubelles</a></div>
                    <div class="onglet"><a href="maps" ><i class="icofont-ui-map"></i>Cartes</a></div>
                    <?php if($_SESSION['USER_SUPER']=='editor') {?> <div class="onglet"><a href="admins?admins">Utilisateurs</a></div> <?php } ?>               
                    <div class="onglet "><i class="icofont-user-alt-3"></i><?php  echo $_SESSION['USER_EMAIL'] ?></div>
                    <div class="onglet logout-btn"><a href="deconnecte"><i class="icofont-logout"></i>Se deconnecter</a></div>
                
            </div>
        

 <?php
    $this->js(); 
        
    }

    public function html()
    {
        ?>
            <!DOCTYPE html>
            <html lang="fr">
                <?php
                    $this->head();
                    ?>

                    
                    <?php
                    $this->body();
                ?>
                </body>
            </html>
        <?php
    }
}