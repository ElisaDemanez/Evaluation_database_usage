<?php
$reservations = Reservations::get();
$tableInformations= '' ;
foreach ($reservations as $key => $reservation) {
    $dateEntree = new DateTime($reservation['dateEntree']);
    $dateEntree =$dateEntree->format("m/d/y");
    $dateSortie = new DateTime($reservation['dateSortie']);
    $dateSortie =$dateSortie->format("m/d/y");
    
    // var_dump($reservation);
   $tableInformations .= "<tr>
    <td>$reservation[id] </td>
    <td><span class='hide-on-med-and-down' > $reservation[prenom]  </span> $reservation[nom] </td>
    <td>$reservation[chambreId]</td>
    <td class='hide-on-med-and-up' >$dateEntree</td>
    <td class='hide-on-med-and-down' > Du $dateEntree au $dateSortie</td>
    <td class='hide-on-med-and-down' >$reservation[statut]</td>
    <td> 
    <a class='waves-effect waves-light btn'>Éditer</a>
    <a class='waves-effect waves-light btn' href='?page=delete&number=$reservation[id]'>Supprimer</a></td>
    </tr>";
}

require_once('views/show.php')
?>
