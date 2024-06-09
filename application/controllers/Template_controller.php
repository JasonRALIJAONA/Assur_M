<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('Vehicule');
        $this->load->library('session');
	}

    public function acceuil(){
        $liste_vehicule = $this->Vehicule->liste_vehicules($this->session->userdata('utilisateur'));
        $data['liste_vehicule'] = $liste_vehicule;
        $data["content"] = "page_affichage/acceuil";
        $this->load->view("client/template.php",$data);
    }

}