<?php 

$pageInformation = '' ;
$error =  "<div class='center-align' > Erreur : Réservation innexistante </div>";

if(!isset($_GET['number'])) {

    $pageInformation.= $error;
    require_once('views/delete.php');
    return;
} 

else {
    $reservation = new Reservation($_GET['number']);

    if(!$reservation->id) {

        $pageInformation.= $error;
    }

    else if(isset($_POST['deletionConfirmation'])) {

        $reservation->delete();
        header('/');
    }

    else { 

        $dateEntree = new DateTime($reservation->dateDebut);
        $dateEntree =$dateEntree->format("m/d/y");
        $dateSortie = new DateTime($reservation->dateFin);
        $dateSortie =$dateSortie->format("m/d/y");
        

        $pageInformation.=  "<form class='center-align' method='post'> Êtes-vous sûr-e de vouloir supprimer la réservation n° $reservation->id :
        
            <div>
            <strong> $reservation->clientFirstName $reservation->clientLastName / Chambre n°$reservation->chambreId 
            <span class='hide-on-med-and-down' >
                </br >
            </span>
            du $dateEntree 
            <span class='hide-on-med-and-down' >
                </br >
            </span>
            au $dateSortie</strong>
        
            </div>

            <a class='waves-effect waves-light btn'href='/'>Annuler</a>
            <button class='btn waves-effect waves-light' type='submit' name='deletionConfirmation' value='1'>
                Confirmer la suppression
            </button>
            </form>";
    }

   require_once('views/delete.php');
   return;
}

// function returnView() {
    // require_once('views/delete.php');
    // return;
// 
// }


?>