<h1 class="titre_vehicule"> Liste des vehicules </h1>
<form class="recherche_vehicule" action="<?php echo site_url('form_controller/search_vehicule'); ?>" mathod="GET">
    <input type="text" class="form-control" placeholder="Immatriculation" name="immatriculation">
    <button type="submit" class="btn btn-primary btn_search">
        <img src="<?php echo base_url("assets/img/search.png"); ?>" alt="" width:> RECHERCHER
    </button>
</form>


<?php
foreach ($liste_vehicule as $row) {
?>
    <div class="panel_vehicule">
        <div class="image" id="<?= $row['id_css'] ?>">
            <img src="<?php echo base_url("assets/img/" . $row['nom_type'] . ".png"); ?>" alt="">
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
            <a href="<?php echo base_url("vehicule_controller/detail/"); ?>/<?= $row['id'] ?>"><button class="btn btn-primary"> Detail </button></a>
            <a href="<?php echo base_url("vehicule_controller/payement/"); ?>/<?= $row['id'] ?>"><button class="btn btn-primary"> Payer </button> </a>
        </div>

    </div><!-- Fait div panel_vehicule1-->

<?php
}
?>