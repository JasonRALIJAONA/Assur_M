<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicule_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

    public function detail($id_vehicule){
        echo $id_vehicule;
        /* Maka info vehicule avy any base */
        $data = array();
        $data['assurance'] = "ARO";
        $data['marque'] = "VOLSWAGEN";
        $data['puissance'] = 15500;
        $data['carburant'] = "Essence";
        $data['annee_fabrication'] = "2006-07-17";
        $data['type_usage'] = "Usage";
        $data['formule'] = "Incendie";
        $data['immatriculation'] = "2665TBG";
        $data["date_expiration"] = "2022-02-04";
        $this->load->view('client/page_affichage/detail.php',$data);

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
    public function get_argent_a_payer(){
        $this->input->get('frequence');
        $this->input->get('operateur');
        $this->input->get('numero_tel'); 
        $immatriculation = $this->input->get('immatriculation');
        /* Atao eto ilay calcul argent a payer */
        $somme_a_payer = 4900;
        //
        
        $data['somme']=$somme_a_payer;
        $data['immatriculation'] = $immatriculation;
        
        $response = array('status'=>'success',
            'message'=>'Données envoyés avec success',
            'data'=>$data
        );

        echo json_encode($response);
    }
    public function confirmer_payement(){
        // Apres mitsindry ok izy 
        $this->input->post('somme');
        $this->input->post('immatriculation');
    }

}