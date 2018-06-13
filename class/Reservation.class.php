<?php 

class Reservation {

    public $id;
    public $clientId;
    public $clientFirstName;
    public $clientLastName;
    public $chambreId;
    public $dateDebut;
    public $dateFin;
    public $statut;
    // public $dateModif;
    // $id = null, $clientId, $chambreID, $dateDebut,$dateFin,$status,$dateModif
    public function __construct( $id = null ) {

        $this->id =$id;
    }
    public function create (int $clientId, int $chambreId, $dateDebut, $dateFin, $statut ) {

            $this->clientId = $clientId;
            $this->chambreId = $chambreId;
            $this->dateDebut = $dateDebut . ' 00:00:00';
            $this->dateFin = $dateFin. ' 00:00:00';
            $this->statut = $statut;
    }
    
    public function fromDB ($id) {
        
        $stm = DB::connect()->prepare("SELECT reservations.id, 
        reservations.clientId, clients.nom, clients.prenom,
        reservations.chambreId, chambres.numero, reservations.dateEntree, reservations.dateSortie from reservations 
        join clients on reservations.clientId = clients.id 
         join chambres on reservations.chambreId = chambres.id 
         WHERE reservations.id = :id");
        $stm->execute(array(':id'=> $id));
        $reservation= $stm->fetch();

        $this->id = $reservation['id'];
        $this->clientId = $reservation['clientId'];
        $this->chambreId = $reservation['chambreId'];
        $this->clientFirstName = $reservation['prenom'];
        $this->clientLastName = $reservation['nom'];
        $this->roomNumber= $reservation['numero'];
        $this->dateDebut = $reservation['dateEntree'];
        $this->dateFin = $reservation['dateSortie'];
                
    }
    public function delete() {
        $id = $this->id;
      
        $stm = DB::connect()->prepare("DELETE FROM `reservations` WHERE reservations.id = :id ");
        $stm->execute(array( ':id' => $id));
    }
    
    public function setInDB() {
        $stm = DB::connect()->prepare("INSERT INTO `reservations` ( `clientId`, `chambreId`, `dateEntree`, `dateSortie`, `statut` ) VALUES (:clientId, :roomId, :dateEntree , :dateSortie, :statut)");
        $stm->execute(array(':clientId' => $this->clientId, ':roomId' => $this->chambreId, ':dateEntree'  => $this->dateDebut , ':dateSortie'  => $this->dateFin, ':statut' => $this->statut ));

    }
    public function updateInDB() {

       

        $stm = DB::connect()->prepare(
        "UPDATE reservations 
        SET `clientId` = :clientId , `chambreId` = :roomId, `dateEntree` = :dateEntree ,`dateSortie`= :dateSortie,`statut` = :statut 
        WHERE reservations.id = :id ");

        $stm->execute(array(':clientId' => $this->clientId, ':roomId' => $this->chambreId, ':dateEntree'  => $this->dateDebut , ':dateSortie'  => $this->dateFin, ':statut' => $this->statut, ':id' => $this->id ));

    }
}