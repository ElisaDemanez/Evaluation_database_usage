<?php



class Reservations {


    static public function get() {

        $stm = DB::connect()->prepare("SELECT * FROM `reservations`");
        $stm->execute();
       return $stm->fetchAll();
    
     }
    
}