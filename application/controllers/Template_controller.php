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
            try {
                $liste_vehicule = $this->Vehicule->liste_vehicules($this->session->userdata('utilisateur')->id);
                $data['liste_vehicule'] = $liste_vehicule;
                $data["content"] = "page_affichage/acceuil";
                $this->load->view("client/template.php",$data);
            } catch (Exception $e) {
                echo $e;
            }
        }else {
            echo 'session vide';
        }

        // echo $this->session->flashdata('utilisateur');
    }
    public function historique_facture () {
        // Maka ireo facture rehetra
        $data['liste_facture'] = $this->Vehicule->get_liste_facture($this->session->userdata('utilisateur')->id);
        $data["content"] = "page_affichage/historique_payement";
        $this->load->view("client/template.php",$data); 
    }
    public function profile_user(){
        $data = array();
        $data["content"] = "page_affichage/profil";
        
        $data["user"] = $this->session->userdata('utilisateur'); 
        $this->load->view("client/template.php",$data);
    }
    public function deconnecter() {
        /* vonoy ny session*/
        $this->load->view('client/index.php');
    }

}