<?php
if(isset($_POST['submit'])) {

    $reservation = new Reservation; 
    $reservation->create($_POST['client'], $_POST['chambre'], $_POST['dateEntree'], $_POST['dateSortie'], $_POST['statut']);
    $reservation->setInDB();
    header('Location: /');
}


$pageInformation = '';
$clientsOptions ='';
$roomsOptions ='';

foreach (Clients::get() as $key => $client) {
    $clientsOptions .= " <option value='$client[id]'> $client[prenom] $client[nom] </option>";
};
foreach (Rooms::get() as $key => $room) {
    $roomsOptions .= " <option value='$room[id]'> N°$room[numero]: $room[nom] </option>";
};


require_once('views/create.php');

