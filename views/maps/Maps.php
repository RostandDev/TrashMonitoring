<?php
namespace views\maps;

use core\Page;
use core\View;

require_once "../core/Page.php";

class Maps  extends View
{
    
    public function __construct($_data=[]) {
        parent::__construct($_data);
    }

    public function html()
    {
        ?>
       
        <div class="page activate" id="maps">
             <div id="map"></div>
        </div>

     <?php 
    }
}
 
