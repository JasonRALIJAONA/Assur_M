<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('Vehicule');
	}

    public function acceuil(){
        var_dump($this->session->userdata('utilisateur'));  
        if ($this->session->userdata('utilisateur') == null) {
            echo("null ehh");
        }else {

            $liste_vehicule = $this->Vehicule->liste_vehicules($this->session->userdata('utilisateur'));
            // $liste_vehicule = $this->Vehicule->liste_vehicules(1);
            $data['liste_vehicule'] = $liste_vehicule;
            $data["content"] = "page_affichage/acceuil";
            $this->load->view("client/template.php",$data);
        }
    }

}