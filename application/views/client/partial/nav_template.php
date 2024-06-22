
<div id="nav-bar">
  <input id="nav-toggle" type="checkbox"/>
  <div id="nav-header"><img src="<?php echo base_url(); ?>assets/img/logo.png" alt="" class="logo_sidebar" >
    <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
    <hr/>
  </div>
  <div id="nav-content">
    <div class="nav-button"><i class="fas fa-palette"></i><span> <a href="<?php echo base_url("template_controller/acceuil");  ?>"> Acceuil </a> </span></div>
    <div class="nav-button"><i class="fas fa-images"></i><span> <a href="<?php echo base_url("form_controller/inscription_vehicule"); ?>">Ajouter vehicule</a> </span></div>
    <div class="nav-button"><i class="fas fa-thumbtack"></i><span> <img src="<?php echo base_url("assets/img/calendrier.png"); ?>" alt=""> <a href="<?php echo base_url("template_controller/historique_facture");  ?>"> Historique </a>  </span></div>
    <hr/>
    <div class="nav-button"><i class="fas fa-heart"></i><span><a href="<?php echo base_url("template_controller/profile_user");  ?>"> Profil </a></span></div>
    
    <hr/>
    
    <div id="nav-content-highlight"></div>
  </div>
  <input id="nav-footer-toggle" type="checkbox"/>
  <div id="nav-footer">
    <div id="nav-footer-heading">
    <div class="nav-button"><i class="fas fa-heart"></i><span><a href="<?php echo base_url("/");  ?>"> Deconnecter </a></span></div>
      <label for="nav-footer-toggle"><i class="fas fa-caret-up"></i></label>
    </div>
    
  </div>
</div>