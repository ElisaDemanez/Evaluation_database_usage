<?php



class Reservations {


    static public function get() {

        $stm = DB::connect()->prepare("SELECT reservations.id, clients.nom, clients.prenom, reservations.chambreId, reservations.dateEntree, reservations.dateSortie, reservations.statut, reservations.dateModification  from reservations join clients on reservations.clientId = clients.id");
        $stm->execute();
       return $stm->fetchAll();
    
     }
    
}