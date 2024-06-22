<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicule_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

    public function detail($id_vehicule){
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

    /* PDF */
    public function to_generate_pdf ($id_facture="") {

        $data = array();
        /* Mamorona fonction mamadika ireo date en lettre et en Malagasy*/
        $data['date_debut_malagasy'] = "23 Jiona 2023"; 
        $data['date_debut'] = "23 Juin 2023"; 
        $data['date_fin_malagasy'] = "06 Febroary 2023";
        $data['date_fin'] = "06 Fevrier 2023";
        $data['police_assurance'] = "01840/PSP/24";
        $data['immatriculation'] = "2777TBG";
        $data['marque'] = "BMW E30";
        $data['puissance'] = "120";
        $data['place'] = "6";

        $data['assureur'] = "MAMA"; /* HAVANA na MAMA na ARO fa misy fiantraikany @ le sary */
        $data['nom_complet'] = "FALIHERISON KANTO MIHAJA";
        $data['adresse'] = "LOT TIC 37 ANKADIVORIBE ANTANANARIVO";        
        $this->load->view('client/page_pdf/generate_pdf.php',$data);
    }
    public function to_generate_pdf_html () {
        $this->load->view('client/page_pdf/factureAro.php');
    }
    public function to_facture ($assurance="")  {
        if ($assurance==1) {
            $this->load->view('client/page_pdf/factureAro.php');
        }
        else if ($assurance==2) {
            $this->load->view('client/page_pdf/factureHavana.php');
        }
        else if ($assurance==3) {
            $this->load->view('client/page_pdf/factureMAMA.php');
        }
    }
    public function search_facture () {
        $this->input->get('immatriculation');
        $this->input->get('assurance');
        $this->input->get('date_paye_min');
        $this->input->get('date_paye_max');
        $this->input->get('date_exp_min');
        $this->input->get('date_exp_max');
        
    }
}