<?php
// on submit
if(isset($_POST['submit'])) {
    // if update : 
    $reservation = isset($_GET['id']) ?
    new Reservation($_GET['id']) 
    : new Reservation; 

    $reservation->create($_POST['client'], $_POST['chambre'], $_POST['dateEntree'], $_POST['dateSortie'], $_POST['statut']);

    // if update : 
    $reservation->id ? 
    $reservation->updateInDB()
    : $reservation->setInDB();


    header('Location: /');

   
}


// if is an update
else if(isset($_GET['id'])) {

 $reservation =new Reservation;
 $reservation->fromDB($_GET['id']);

    if(!$reservation->id) {

        $pageInformation.= $error;
        require_once('views/create.php');
        return;
    }

}


$pageInformation = '';
$clientsOptions ='';
$roomsOptions ='';

foreach (Clients::get() as $key => $client) {
   
   if(isset($reservation->clientId))
    $isSelected =  $reservation->clientId === $client['id'] ? 'selected' : null; 
    else $isSelected = null;

    $clientsOptions .= " <option value='$client[id]'$isSelected > $client[prenom] $client[nom] </option>";
};


foreach (Rooms::get() as $key => $room) {

    if(isset($reservation->chambreId))
    $isSelected =  $reservation->chambreId === $room['id'] ? 'selected' : null; 
    else $isSelected = null;

    $roomsOptions .= " <option value='$room[id]' $isSelected> N°$room[numero]: $room[nom] </option>";
};

require_once('views/create.php');

// prefill datepickers
if(isset($reservation->id)) :
?>
 
    <script>

        var dateEntree = '<?= $reservation->dateDebut ?>'
        var dateSortie = '<?= $reservation->dateFin ?>'
        console.log(dateEntree)
        document.getElementById('dateEntree').value = dateEntree.split(' ')[0]
        document.getElementById('dateSortie').value = dateSortie.split(' ')[0]
    </script>


<?php
endif
?>