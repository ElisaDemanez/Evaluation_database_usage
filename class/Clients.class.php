<?php

class Clients  {

    public static function get() {

        $stm = DB::connect()->prepare("SELECT `id`,`prenom`,`nom`  from clients");
        $stm->execute();
    return $stm->fetchAll();
    }


}