<?php



class Reservations {


    static public function get() {

        $stm = DB::connect()->prepare("SELECT reservations.id, clients.nom, clients.prenom,  chambres.numero, reservations.dateEntree, reservations.dateSortie, reservations.statut, reservations.dateModification  from reservations 
        join clients on reservations.clientId = clients.id
        join chambres on reservations.chambreId = chambres.id ");
        $stm->execute();
       return $stm->fetchAll();
    
     }
    
}