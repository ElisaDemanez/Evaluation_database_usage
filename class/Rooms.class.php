<?php

class Rooms  {

    public static function get() {

        $stm = DB::connect()->prepare("SELECT `id`, `numero`, `nom`  from chambres");
        $stm->execute();
    return $stm->fetchAll();
    }


}