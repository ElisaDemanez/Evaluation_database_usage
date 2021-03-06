<?php 

$pageInformation = '' ;
$error =  "<div class='center-align' > Erreur : Réservation innexistante </div>";

if(!isset($_GET['number'])) {

    $pageInformation.= $error;
    require_once('views/delete.php');
    return;
} 

else {
    $reservation = new Reservation;
    $reservation->fromDB($_GET['number']);


    if(!$reservation->id) {

        $pageInformation.= $error;
    }

    else if(isset($_POST['deletionConfirmation'])) {
        // var_dump($reservation);
        $reservation->delete();
   
        header('Location: /');
          // header("refresh:1, $_SERVER[HTTP_HOST]/");
  
    }

    else { 

        $dateEntree = new DateTime($reservation->dateDebut);
        $dateEntree =$dateEntree->format("m/d/y");
        $dateSortie = new DateTime($reservation->dateFin);
        $dateSortie =$dateSortie->format("m/d/y");
        
        $pageInformation.= "<div class= 'align-center'> Suppression effectuée ! </div>";
        $pageInformation.=  "<form class='center-align' method='post' action=''> Êtes-vous sûr-e de vouloir supprimer la réservation n° $reservation->id :
        
            <div>
            <strong> $reservation->clientFirstName $reservation->clientLastName / Chambre n°$reservation->roomNumber
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