<?php
$reservations = Reservations::get();
$tableInformations= '' ;
foreach ($reservations as $key => $reservation) {
    $dateEntree = new DateTime($reservation['dateEntree']);
    $dateEntree =$dateEntree->format("m/d/y");
    $dateSortie = new DateTime($reservation['dateSortie']);
    $dateSortie =$dateSortie->format("m/d/y");

   $tableInformations .= "<tr>
    <td>$reservation[id] </td>
    <td><span class='hide-on-med-and-down' > $reservation[prenom]  </span> $reservation[nom] </td>
    <td>$reservation[numero]</td>
    <td class='hide-on-med-and-up' >$dateEntree</td>
    <td class='hide-on-med-and-down' > Du $dateEntree au $dateSortie</td>
    <td class='hide-on-med-and-down' >$reservation[statut]</td>

    <td class='hide-on-med-and-down' > 
    <a class='waves-effect waves-light btn'href='?page=create&id=$reservation[id]'>Éditer</a>
    <a class='waves-effect waves-light btn' href='?page=delete&number=$reservation[id]'>Supprimer</a>
    </td>
    
    <td class='hide-on-med-and-up'> 
    <select onchange='location = this.value;'>
    <option value='?page=create&id=$reservation[id]'>Editer</option>
    <option value='?page=delete&number=$reservation[id]'>Supprimer</option>
    </select>
    </td>
    </tr>";
}

require_once('views/show.php')
?>
