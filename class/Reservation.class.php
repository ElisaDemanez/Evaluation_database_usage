<?php 

class Reservation {

    public $id;
    public $clientFirstName;
    public $clientLastName;
    public $chambreId;
    public $dateDebut;
    public $dateFin;
    // public $status;
    // public $dateModif;
    // $id = null, $clientId, $chambreID, $dateDebut,$dateFin,$status,$dateModif
    public function __construct ($id) {
        
        $stm = DB::connect()->prepare("SELECT reservations.id, clients.nom, clients.prenom, reservations.chambreId, reservations.dateEntree, reservations.dateSortie from reservations 
        join clients on reservations.clientId = clients.id WHERE reservations.id = $id");
        $stm->execute();
        $reservation= $stm->fetch();

        $this->id = $reservation['id'];
        $this->clientFirstName = $reservation['prenom'];
        $this->clientLastName = $reservation['nom'];
        $this->chambreId = $reservation['chambreId'];
        $this->dateDebut = $reservation['dateEntree'];
        $this->dateFin = $reservation['dateSortie'];
                
    }
    public function delete() {
        $id = $this->id;
        $stm = DB::connect()->prepare("DELETE FROM `reservations` WHERE reservations.id = $id ");
        $stm->execute();
        // $reservation= $stm->fetch();

    }
   

}