<?php

/**
 * Class Autoloader
*/
spl_autoload_register('Autoloader::autoload');

class Autoloader{    

    static function autoload($class){

        $path = 'class/' . $class . '.class.php';

            if (file_exists($path)) {
                include "$path";

            } else {
                die("Class $class not found in $path");
              }


    }

}

?>