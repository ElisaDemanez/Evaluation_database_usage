<?php
$reservations = Reservations::get();
?>

<h2>Gestion des réservations</h2>
<!-- responsive-table -->
<div class="container">
<table class ="stripped highlight centered ">
    <thead>
        <tr>
            <th>Id</th>
            <th>Id Client</th>
            <th>N° Chambre</th>
            <th class="hide-on-med-and-up">Date</th>
            <th class="hide-on-med-and-down">Dates</th>             
            <th class="hide-on-med-and-down">Statut</th>
            <th>Actions</th>


        </tr>
    </thead>

<tbody>



<?php

foreach ($reservations as $key => $reservation) {
    $dateEntree = new DateTime($reservation['dateEntree']);
    $dateEntree =$dateEntree->format("m/d/y");
    $dateSortie = new DateTime($reservation['dateSortie']);
    $dateSortie =$dateSortie->format("m/d/y");
    
    // var_dump($reservation);
    echo ("<tr>
    <td>$reservation[id] </td>
    <td>$reservation[clientId]</td>
    <td>$reservation[chambreId]</td>
    <td class='hide-on-med-and-up' >$dateEntree</td>
    <td class='hide-on-med-and-down' > Du $dateEntree au $dateSortie</td>
    <td class='hide-on-med-and-down' >$reservation[statut]</td>
    <td> button button</td>
    
    
    </tr>");
}
?>
    </tbody>
</table>
</div>