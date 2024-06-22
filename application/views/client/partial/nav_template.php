<div id="nav-bar">
  <input id="nav-toggle" type="checkbox" />
  <div id="nav-header"><img src="<?php echo base_url(); ?>assets/img/logo.png" alt="" class="logo_sidebar">
    <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
    <hr />
  </div>
  <div id="nav-content">
    <div class="nav-button"><i class="fas fa-palette"></i><span> <a href="<?php echo base_url("template_controller/acceuil");  ?>"> Acceuil </a> </span></div>
    <div class="nav-button"><i class="fas fa-images"></i><span> <a href="<?php echo base_url("form_controller/inscription_vehicule"); ?>">Ajouter vehicule</a> </span></div>
    <div class="nav-button"><i class="fas fa-thumbtack"></i><span>Factures</span></div>
    <hr />
    <div id="nav-content-highlight"></div>
  </div>
  <input id="nav-footer-toggle" type="checkbox" />
  <div id="nav-footer">
    <div id="nav-footer-heading">
      <div id="nav-footer-avatar"><img src="https://gravatar.com/avatar/4474ca42d303761c2901fa819c4f2547" /></div>
      <div id="nav-footer-titlebox"><a id="nav-footer-title" href="https://codepen.io/uahnbu/pens/public" target="_blank"><?= $this->session->userdata('utilisateur')->nom ?></a><span id="nav-footer-subtitle"><?= $this->session->userdata('utilisateur')->prenom ?></span></div>
      <label for="nav-footer-toggle"><i class="fas fa-caret-up"></i></label>
    </div>
    <div id="nav-footer-content">
      <Lorem>ipsum dolor sit amet, consectetur adipiscing elit, sed do eiu smod tempor incididunt ut labore et dolore magna aliqua.</Lorem>
    </div>
  </div>
</div>