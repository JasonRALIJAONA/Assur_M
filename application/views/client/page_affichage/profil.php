<div class="card">
  <img src="<?php echo base_url("assets/img/profil.png"); ?>" class="card-img-top card_img" alt="...">
  <div class="card-body card_profil">
    <h4 class="card-title profil_titre">Profil propriétaire</h4>
    <table class="table_profil">
        <tr>
            <td class="attribut" >Nom</td>
            <td class="valeur" >: <?php echo $user->nom; ?> </td>
        </tr>
        <tr>
            <td class="attribut" >Prénoms</td>
            <td class="valeur">: <?php echo $user->prenom;?></td>
        </tr>
        <tr>
            <td class="attribut" >Date de Naissance</td>
            <td class="valeur"> : <?php echo $user->naissance; ?> </td>
        </tr>
        <tr>
            <td class="attribut" >Adresse</td>
            <td class="valeur" >: <?php echo $user->adresse; ?></td>
        </tr>
        <tr>
            <td class="attribut" >Numéro</td>
            <td class="valeur" >: <?php echo $user->telephone; ?></td>
        </tr>
        <tr>
            <td class="attribut" >Email</td>
            <td class="valeur" >: <?php echo $user->email; ?></td>
        </tr>
    </table>
    
  </div>
</div>