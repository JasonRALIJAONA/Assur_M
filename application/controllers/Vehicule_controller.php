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
        echo $id_vehicule;
        $data = array();
        /* Avy any anaty base */
        $data["immatriculation"] = "immatriculation ".$id_vehicule;
        $data["id_vehicule"] = $id_vehicule;
        /*...*/
        $this->load->view("client/page_formulaire/payement_assurance.php",$data);
    }


}