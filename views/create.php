
<div class="row">
    <div class="col s3 padd-0">
        <img class="logo" src="http://via.placeholder.com/150x100">
    </div>
    <div class="col s9">  
        <h2 class="responsive_title">Nouvelle réservation </h2>
    </div>
  
</div>

<div class="container">

<?= $pageInformation ?>


<form action="" method="post">
<div class="row" >
    <label for="client"></label>
    <div class="input-field col s12 m6  push-m3">
        <select name ="client" required>
            <option value="" disabled selected>Selectionnez le client</option>
            <?=$clientsOptions ?>
        </select>
        <label>Client : </label>
    </div>
</div>  
<div class="row">
    <div class="input-field col s12 m6 push-m3">
        <select name ="chambre"required>
            <option value="" disabled selected>Selectionnez la chambre</option>
            <?=$roomsOptions ?>

        </select>
        <label>Chambre :</label>
    </div>
</div>  
 <div class="row">
     <div class="input-field col s12 m6 push-m3">
         <input type="date" name="dateEntree" id="dateEntree" required > 
         <label > Date d'entrée :</label>
    </div>
</div>  
 <div class="row">
    <div class="input-field col s12 m6 push-m3">
        <input type="date" name="dateSortie" id="dateSortie" required>
        <label > Date de sortie :</label>
    </div>
</div>
<div class="row">
    <div class="input-field col s12 m6 push-m3" required>
        <select name ="statut">
            <option value="attente">En attente</option>
            <option value="valide">Validée</option>
            <option value="refus">Refusée</option>
        </select>
        <label>Chambre :</label>
    </div>
</div>  
 <div class="row">
    <div class="input-field col s12 m6 push-m3 center-align">
        <button class='btn waves-effect waves-light' type='submit' name='submit'>
            Valider    
        </button>
    </div>
</div>
     <div class="row">
    <div class="input-field col s12 m6 push-m3 center-align">
        <a href='/'>retour <a>
    </div>
</div>
</div>
<!-- center-align -->
</form>

</div>
