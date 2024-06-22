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
    public function historique_facture () {
        // Maka ireo facture rehetra
        $data = array();
        $data["content"] = "page_affichage/historique_payement";
        $this->load->view("client/template.php",$data); 
    }
    public function profile_user(){
        $data = array();
        $data["content"] = "page_affichage/profil";
        
        $user = array();
        $user["nom"] = "Patrick";
        $user["prenoms"] = "Le grand";
        $user["date_naissance"] = "2004-02-23";
        $user["adresse"] = "Andoharanofotsy"; 
        $user['num_tel'] = "0345623578";
        
        $data["user"] = $user; 
        $this->load->view("client/template.php",$data);
    }
    public function deconnecter() {
        /* vonoy ny session*/
        $this->load->view('client/index.php');
    }

}