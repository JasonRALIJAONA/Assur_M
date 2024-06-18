<h1 class="titre_vehicule"> Liste des vehicules </h1>
<script>
</script>

<?php
foreach ($liste_vehicule as $row) {
?>
    <div class="panel_vehicule">
        <div class="image">
            <img src="<?php echo base_url("assets/img/icon_voiture.png"); ?>" alt="">
        </div>
        <div class="information">
            <table>
                <tr>
                    <td>Assurance </td>
                    <td>: <?= $row['nom_assurance'] ?> </td>
                </tr>
                <tr>
                    <td>Date expiration</td>
                    <td>: <?= $row['date_fin'] ?> </td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>: <?= $row['nom_type'] ?> </td>
                </tr>
                <tr>
                    <td>Immatriculation</td>
                    <td>: <?= $row['immatriculation'] ?> </td>
                </tr>
            </table>
        </div>

        <div class="bouton_redirection">
            <a href="<?php echo base_url("vehicule_controller/detail/1"); ?>"><button class="btn btn-primary"> Detail </button></a>
            <a href="<?php echo base_url("vehicule_controller/payement/"); ?>/<?= $row['id'] ?>"><button class="btn btn-primary"> Payer </button> </a>
        </div>

    </div><!-- Fait div panel_vehicule1-->

<?php
}
?>