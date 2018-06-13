<?php
class PageHandler
{  
    
   static function showPage($page) {

    
        if(!$page) {
       include 'controllers/reservations_show.php';
            
        }
        else {
       include 'controllers/'.$page .'.php';
        }
    }
}
