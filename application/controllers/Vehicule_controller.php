<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicule_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('Vehicule');
		$this->load->library('session');

	}

    public function detail($id_vehicule){
        echo $id_vehicule;
    }
    public function payement ($id_vehicule) {
        // echo $id_vehicule;
        $data = array();
        /* Avy any anaty base */
        $data["immatriculation"] = "immatriculation ".$id_vehicule;
        $data["id_vehicule"] = $id_vehicule;
        $data['content'] = 'page_formulaire/payment_assurance.php';
        /*...*/
        $this->load->view("client/page_formulaire/payement_assurance.php",$data);
        // $this->load->view("client/template.php",$data);
    }
    // something

    public function enregistrer_vehicule() {
        $type = $this->input->post('type_vehicule');
        $numero = $this->input->post('num_plaque');
        $marque = $this->input->post('marque');
        $marque = $this->input->post('marque');
        $place = $this->input->post('nombre_place');
        $puissance = $this->input->post('puissance');
        $user = $this->session->userdata('utilisateur');
        echo $user;

        try {
            // $this->Vehicule->inscription_vehicule($numero, $puissance, $marque, $place, $type, $user->id);
            echo "succes";
        } catch (Exception $e) {
            echo $e->getMessage();  
        }

    }

}