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
            
           
           
    
    <?php
        }

    public function head()
    {
        ?>
        <head>
            <?php $this->css(); ?>  
            
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="shortcut icon" href="public/media/images/logotidd.jpeg" type="image/x-icon">
            <link rel="stylesheet" href="public/css/header.css">
            <link rel="stylesheet" href="public/css/page.css">
            <link rel="stylesheet" href="public/media/fonts/icofont/icofont.css">
            <link rel="stylesheet" href="public/media/fonts/icofont/icofont.min.css">
            <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
            integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
            crossorigin=""></script>
            <title>Panel de controle</title>
            
        </head>
        <?php
    }

    public function body()
    {

        ?>
        <body>

        <div class="message">

        </div>
            
        <div class="main">
        <div class="dash"> 
                <div class=" part part1">
                   <div class="container1">
                        <!--div class=" logo" ><img src="public/media/images/logo.jpg" alt="" srcset="" ></div-->
                        <div class=" user"><?php echo $_SESSION['USER_LAST_NAME']." ".$_SESSION['USER_FIRST_NAME']; ?> </div>
                   </div>
                   <div class="container2">
                        <div class="drive logout-btn"><a href="deconnecte"><i class="icofont-ui-power"></i></a></div>
                   </div>
                </div> 
                
                <div class="part part2">
                    <div class="driver active" onclick="View_maps(event)"><a href="#maps" >Cartes</a></div>
                    <div class="driver  " onclick="View_trashs(event)"><a href="#poubelles">Poubelles</a></div>
                    <?php if($_SESSION['USER_SUPER']=='editor') {?> <div class="driver " onclick="View_users(event)"><a href="#utilisateurs">Utilisateurs</a></div> <?php } ?>
                    <div class="driver params "><a href="#parametre">Param??tre</a></div>
                </div>
                
                                                 
            </div>

            <div class="page">
               
            </div>
        </div>
        
        </body>

        
        <script src="public/js/page.js"></script>
        <script src="public/js/forms.js"></script>
        <script src="public/js/request.js"></script>
        <script src="public/js/map.js"></script>
        <script src="public/js/trash.js"></script>
        <script src="public/js/entries.js"></script>
        <script src="public/js/user.js"></script>
        <script src="public/js/main.js"></script>
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
                    $this->body();                  
                ?>

            </html>
        <?php
    }
}