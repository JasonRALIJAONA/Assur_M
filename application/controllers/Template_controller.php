<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('Vehicule');
        $this->load->model('Utilisateur');
        $this->load->model('Pagination');
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
    public function historique_facture ($page = 1) {
        $limit = 3;
        $offset = ($page - 1) * $limit;

        $total_facture = $this->Pagination->get_nombre_facture();

        $data['liste_facture'] = $this->Pagination->get_page($limit, $offset);
        $data['total_pages'] = ceil($total_facture / $limit);
        $data['current_page'] = $page;
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