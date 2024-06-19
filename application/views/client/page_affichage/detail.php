<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css_client/style_detail.css">
    
</head>
<body class="body_container" >
    <div class="container bloc_info">
    <h1 class="titre" > <img src="<?php echo base_url(); ?>assets/img/logo2.png" alt="" class="logo_petit" > Vehicule : <?php echo $immatriculation; ?></h1>
    <div class="row inner_bloc_info">
        <div class="col-md-6 colonne">
            <div> <img src="<?php echo base_url(); ?>assets/img/bouclier.png" alt=""> Assurance: <span> <?php echo $assurance; ?> </span>   </div>
            <div> <img src="<?php echo base_url(); ?>assets/img/marque.png" alt=""> Marque : <span> <?php echo $marque; ?> </span>  </div>
            <div> <img src="<?php echo base_url(); ?>assets/img/puissance.png" alt=""> Puissance : <span> <?php echo $puissance; ?> chevaux </span>  </div>
            <div>  <img src="<?php echo base_url(); ?>assets/img/moteur.png" alt=""> Carburant : <span> <?php echo $carburant; ?> </span>  </div>
        </div>
        <div class="col-md-6 colonne">
            <div> <img src="<?php echo base_url(); ?>assets/img/calendrier.png" alt=""> Annee de fabrication:  <span> <?php echo $annee_fabrication; ?>  </span>  </div>
            <div> <img src="<?php echo base_url(); ?>assets/img/usage.png" alt=""> Type d'usage  : <span> <?php echo $type_usage; ?> </span>  </div>
            <div> <img src="<?php echo base_url(); ?>assets/img/formule.png" alt=""> Formule : <span> <?php echo $formule; ?> </span>  </div>
        </div>
    </div>
    <p class="expiration" >  Date expiration assurance :   <span class="date_expiration" > <?php echo $date_expiration; ?> </span> </p>
    </div>
    
</body>
</html>