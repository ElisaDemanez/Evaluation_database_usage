
<div class="row">
<div class="col s3 padd-0">
    <img class="logo" src="http://via.placeholder.com/150x100"></div>
<div class="col s9">  
    <h2 class="responsive_title">Gestion des réservations</h2>
</div>
  

</div>
<!-- responsive-table -->
<div class="container">
    <div>
        <a class='waves-effect waves-light btn' href='?page=create' >Ajouter/modifier réservation</a>
    </div>
    <table class ="stripped highlight centered ">
        <thead>
            <tr>
                <th>Id</th>
                <th>Client</th>
                <th>N° Chambre</th>
                <th class="hide-on-med-and-up">Date</th>
                <th class="hide-on-med-and-down">Dates</th>             
                <th class="hide-on-med-and-down">Statut</th>
                <th>Actions</th>


            </tr>
        </thead>

        <tbody>
              <?= $tableInformations ?>
        </tbody>
    </table>
</div>