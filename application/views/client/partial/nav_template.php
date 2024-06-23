
<div id="nav-bar">
  <input id="nav-toggle" type="checkbox"/>
  <div id="nav-header"><img src="<?php echo base_url(); ?>assets/img/logo.png" alt="" class="logo_sidebar" >
    <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
    <hr/>
  </div>
  <div id="nav-content">
    <div class="nav-button"><i class="fas fa-palette"></i><span>  <a href="<?php echo base_url("template_controller/accueil");  ?>"> <img src="<?php echo base_url("assets/img/home_png.png"); ?>" alt=""> Acceuil </a> </span></div>
    <div class="nav-button"><i class="fas fa-images"></i><span>  <a href="<?php echo base_url("form_controller/inscription_vehicule"); ?>"> <img src="<?php echo base_url("assets/img/icon_voiture.png"); ?>" alt=""> Ajouter vehicule</a> </span></div>
    <div class="nav-button"><i class="fas fa-thumbtack"></i><span>  <a href="<?php echo base_url("template_controller/historique_facture");  ?>"> <img src="<?php echo base_url("assets/img/calendrier_png.png"); ?>" alt=""> Historique </a>  </span></div>
    <hr/>
    <div class="nav-button"><i class="fas fa-heart"></i><span><a href="<?php echo base_url("template_controller/profile_user");  ?>"> <img src="<?php echo base_url("assets/img/profil_png.png"); ?>" alt=""> Profil </a></span></div>
    
    <hr/>
    
    <div id="nav-content-highlight"></div>
  </div>
  <input id="nav-footer-toggle" type="checkbox"/>
  <div id="nav-footer">
    <div id="nav-footer-heading">
    <div class="nav-button"><i class="fas fa-heart"></i><span><a href="<?php echo base_url("/");  ?>"> <img src="<?php echo base_url("assets/img/deconnecter.png"); ?>" style="width:40px;height:40px;" /> Deconnecter </a></span></div>
      <label for="nav-footer-toggle"><i class="fas fa-caret-up"></i></label>
    </div>
    
  </div>
</div>