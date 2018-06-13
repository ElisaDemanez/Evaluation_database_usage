<?php
class PageHandler
{  
    
   static function showPage($page) {

    
        if(!$page) {
       include 'controllers/show.php';
            
        }
        else {
       include 'controllers/'.$page .'.php';
        }
    }
}
