<h1 class="titre_vehicule"> Historique des factures <img src="<?php echo base_url("assets/img/calendrier.png"); ?>" alt="" class="logo_facture"> </h1>
<?php
foreach ($liste_facture as $row) {
?>

    <div class="panel_vehicule">
        <div class="image">
            <img src="<?php echo base_url("assets/img/image_assureur/". $row['id_assureur'] .".png"); ?>" alt="" style="width:102px;">
        </div>
        <div class="information">
            <table>
                <tr>
                    <td>Immatriculation</td>
                    <td>: <?= $row['immatriculation'] ?> </td>
                </tr>
                <tr>
                    <td>Assurance </td>
                    <td>: <?= $row['nom_assureur'] ?> </td>
                </tr>
                <tr>
                    <td>Date payement</td>
                    <td>: <?= $row['date_debut'] ?> </td>
                </tr>
                <tr>
                    <td>Date expiration</td>
                    <td>: <?= $row['date_fin'] ?> </td>
                </tr>
                <tr>
                    <td>Police d'assurance</td>
                    <td>: <?= $row['police_assurance'] ?> </td>
                </tr>
            </table>
        </div>

        <div class="bouton_redirection">
            <a href="<?php echo base_url("vehicule_controller/detail/1"); ?>"><button class="btn btn-primary"> Voir facture </button></a>
        </div>

    </div><!-- Fait div panel_vehicule1-->
<?php
}
?>

