<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicule_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('Vehicule');
        $this->load->model('Utilisateur');
	}

    public function detail($id_vehicule){
        echo $id_vehicule;
        /* Maka info vehicule avy any base */
        $donnee = $this->Vehicule->detail($id_vehicule);
        $data = array();
        $data['assurance'] = $donnee['nom_assurance'];
        $data['marque'] = $donnee['marque'];
        $data['puissance'] = $donnee['puissance'];
        $data['carburant'] = $donnee['nom_carburant'];
        $data['annee_fabrication'] = "2006-07-17";
        $data['type_usage'] = $donnee['nom_usage'];
        $data['formule'] = $donnee['nom_option'];
        $data['immatriculation'] = $donnee['immatriculation'];
        $data["date_expiration"] = $donnee['date_fin'];
        $this->load->view('client/page_affichage/detail.php',$data);

    }
    
    public function get_argent_a_payer(){
        $fq = $this->input->get('frequence');
        $id_vehicule = $this->input->get('id_vehicule');
        $this->input->get('numero_tel'); 
        $immatriculation = $this->input->get('immatriculation');

        /* Atao eto ilay calcul argent a payer */
        $somme_a_payer = $fq * $this->Vehicule->get_by_id($id_vehicule)['a_payer'];
        //

        $data = array(
            'somme' => $somme_a_payer,
            'immatriculation' => $immatriculation
        );
        
        $response = array('status'=>'success',
            'message'=>'Données envoyés avec success',
            'data'=>$data
        );

        $this->session->set_flashdata('somme', $somme_a_payer);

        echo json_encode($response);
    }
    public function confirmer_payement(){
        $exception = '';
        $somme = $this->session->flashdata('somme');
        try {
            $frequence = $this->input->get('frequence');
            $id_vehicule = $this->input->get('id_vehicule');
        
            // Date actuelle
            $date = new DateTime();
            $dateNow = $date->format('Y-m-d');
        
            // Date de fin calculée
            $dateFin = new DateTime();
            $dateFin->modify('+' . $frequence . ' months')->modify('-1 day');
            $dateFinFormatted = $dateFin->format('Y-m-d');
        
            $data_payement = array(
                'date_payement' => $dateNow,
                'valeur' => $somme,
                'frequence' => $frequence,
                'id_vehicule' => $id_vehicule,
                'id_utilisateur' => $this->session->userdata('utilisateur')->id
            );

            $data_facture = array(
                'date_debut' => $dateNow,
                'date_fin' => $dateFinFormatted,
                'id_assureur' => $this->Vehicule->get_by_id($id_vehicule)['id_assureur'],
                'id_vehicule' => $id_vehicule,
                'id_utilisateur' => $this->session->userdata('utilisateur')->id

            );
            $this->Vehicule->verifier_expiration($data_facture);
            $this->Utilisateur->verifier_solde($somme);
            $this->Vehicule->payment($data_payement);
            $this->Vehicule->facture_payment($data_facture);
            $this->Utilisateur->update_solde($somme);
        } catch (Exception $e) {
            $exception = $e->getMessage();
        }

        echo json_encode(['exception' => $exception]);

    }

    public function payement ($id_vehicule) {
        $data = array();
        /* Avy any anaty base */
        $data["immatriculation"] = "immatriculation ".$id_vehicule;
        $data["id_vehicule"] = $id_vehicule;
        $data = array(
            'vehicule' => $this->Vehicule->get_by_id($id_vehicule),
            'utilisateur' => $this->session->userdata('utilisateur'),
            'operateur' => $this->Utilisateur->get_operateur()
        );
        /*...*/
        $this->load->view("client/page_formulaire/payement_assurance.php",$data);
    }

    /* PDF */
    public function to_generate_pdf ($id_facture) {

        // RECUPERER TOUTES LES DONNEES

        //DONNEE UTILISATEUR
        $utilisateur = $this->session->userdata('utilisateur');

        // DONNEE FACTURE
        $facture = $this->Vehicule->get_facture_by_id($id_facture);
        

        $data = array();
        /* Mamorona fonction mamadika ireo date en lettre et en Malagasy*/
        $data['date_debut_malagasy'] = "23 Jiona 2023"; 
        $data['date_debut'] = $facture['date_debut']; 
        $data['date_fin_malagasy'] = "23 Juin 2023";
        $data['date_fin'] = $facture['date_fin'];
        $data['police_assurance'] = $facture['police_assurance'];
        $data['immatriculation'] = $facture['immatriculation'];
        $data['marque'] = $facture['marque'];
        $data['puissance'] = $facture['puissance'];
        $data['place'] = $facture['place'];

        $data['assureur'] = $facture['nom_assureur']; /* HAVANA na MAMA na ARO fa misy fiantraikany @ le sary */
        $data['nom_complet'] = $utilisateur->nom . " " . $utilisateur->prenom;
        $data['adresse'] = $utilisateur->adresse;        
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
        $criteria = array(
            'immatriculation' => $this->input->get('immatriculation'),
            'assurance' => $this->input->get('assurance'),
            'date_paye_min' => $this->input->get('date_paye_min'),
            'date_paye_max' => $this->input->get('date_paye_max'),
            'date_exp_min' => $this->input->get('date_exp_min'),
            'date_exp_max' => $this->input->get('date_exp_max')
        );
        $data['liste_facture'] = $this->Vehicule->search_facture($criteria);
        $data["content"] = "page_affichage/historique_payement";
        $this->load->view("client/template.php",$data);

        
    }

    

}