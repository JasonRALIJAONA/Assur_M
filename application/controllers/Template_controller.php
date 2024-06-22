<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

    public function acceuil(){
        $data = array();
        $data["content"] = "page_affichage/acceuil";
        $this->load->view("client/template.php",$data);
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