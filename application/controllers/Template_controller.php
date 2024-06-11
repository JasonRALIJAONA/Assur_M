<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('Vehicule');
        $this->load->model('Utilisateur');
	}

    public function accueil(){
        if ($this->session->has_userdata('utilisateur')) {
            $liste_vehicule = $this->Vehicule->liste_vehicules($this->session->userdata('utilisateur')->id);
            $data['liste_vehicule'] = $liste_vehicule;
            $data["content"] = "page_affichage/acceuil";
            $this->load->view("client/template.php",$data);
        }else {
            echo 'session vide';
        }

        // echo $this->session->flashdata('utilisateur');
    }

}