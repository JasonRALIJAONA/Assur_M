<h1 class="titre_vehicule"> Liste des vehicules </h1>

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
                    <td>: ARO </td>
                </tr>
                <tr>
                    <td>Date expiration</td>
                    <td>: 16/06/2024 </td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>: Voiture </td>
                </tr>
                <tr>
                    <td>Marque</td>
                    <td>: Crafter </td>
                </tr>
            </table>
        </div>

        <div class="bouton_redirection">
            <a href="<?php echo base_url("vehicule_controller/detail/1"); ?>"><button class="btn btn-primary"> Detail </button></a>
            <a href="<?php echo base_url("vehicule_controller/payement/1"); ?>"><button class="btn btn-primary"> Payer </button> </a>
        </div>

    </div><!-- Fait div panel_vehicule1-->

<?php
}
?>