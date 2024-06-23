<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css_client/style_detail.css">
    <link rel="shortcut icon" href=" <?php echo base_url(); ?>assets/img/logo2.png" >
    <title>Assur_M</title>
</head>
<body class="body_welcome" >
    <section class="super_container row">
        <div class="col-md-6 container_img">
            <div class="div_logo2">
                <img src="<?php echo base_url("assets/img/logo2.png"); ?>" alt="" class="logo2" >
            </div>
            <div class="div_mama" >
                <img src="<?php echo base_url("assets/img/MAMA.png"); ?>" alt="" class="mama" >

            </div>
            <div class="div_aro"  >
                <img src="<?php echo base_url("assets/img/ARO.png"); ?>" alt="" class="aro" >
            </div>
            <div class="div_havana" >
                <img src="<?php echo base_url("assets/img/HAVANA.png"); ?>" alt="" class="havana" >

            </div>
            
        </div>
        <div class="col-md-5 droite">
            <h1> PAYEMENT D'ASSURANCE EN LIGNE </h1>
            <div class="div_btn">
                <a href="<?php echo base_url("form_controller/inscription_vehicule"); ?>"> <input type="button" class="btn btn_simuler" value="SIMULER"  > </a> 
            </div>
            <div class="div_btn" >
                <a href="<?php echo base_url("welcome/to_login"); ?>"> <input type="button" class="btn btn_connecter" value="Se connecter"> </a> 
            </div>
        </div>
        <footer>
            <div>
                Copyright©
            </div>
             
        </footer>
    </section>
</body>
</html>