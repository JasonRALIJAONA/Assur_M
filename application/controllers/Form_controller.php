<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Utilisateur');
		$this->load->model('Vehicule');
		$this->session->set_userdata('utilisateur');
	}

	public function login(){
		$this->load->view("client/page_formulaire/login.php");
	}

	public function checkLogin(){
		$email = $this->input->post('login-mail');
		$mdp = $this->input->post('login-pass');
		try {
			$utilisateur = $this->Utilisateur->verifier_connexion($email, $mdp); 
			$this->session->set_userdata('utilisateur', $utilisateur);
			redirect('template_controller/accueil');
		} catch (Exception $e) {
			$data['erreur'] = $e->getMessage();
			$this->load->view('client/page_formulaire/login.php', $data);
		}


	}

	public function dashboard() {
        $utilisateur = $this->session->userdata('utilisateur');
        if (!$utilisateur) {
			$data['erreur'] = "y'a une erreur";
            $this->load->view('client/page_formulaire/login.php', $data);  // Redirection vers la page de login si l'utilisateur n'est pas connecté
        }

        $liste_vehicule = $this->Vehicule->liste_vehicules($utilisateur->id);
        $data['liste_vehicule'] = $liste_vehicule;
        $data["content"] = "page_affichage/acceuil";
        $this->load->view("client/template.php", $data);
    }


	public function check_inscription(){
		/* Gerance d'exception d'insertion  */
		/* Si ok , generer code validation */
		$exception = null;
		$new_user = array();
		$new_user["nom"] =  $this->input->post('nom');
		$new_user["prenoms"] = $this->input->post('prenoms');
		$new_user["adresse"] = $this->input->post('adresse');
		$new_user["date_naissance"] = $this->input->post('date_naissance');
		$new_user["num_tel"] = $this->input->post('num_tel');
		$new_user["email"] = $this->input->post('email');
		$new_user["mdp"] = $this->input->post('mdp');
		$new_user["confirm_mdp"] = $this->input->post('confirm_mdp');

		$this->Utilisateur->creer_profil($new_user);

		/* Manao gestion d'exception d retournena Ajax raha misy  */
		//$exception = "patrick exception";

		echo json_encode(['exception'=>$exception]);
	}
	
	public function getCodeValidation() {
		$this->load->model('utilitaire');
		$code = $this->utilitaire->generateCodeValidation(); 
		echo json_encode(['code'=>$code]);
	}

	public function confirm_inscription() {
		/* Confirmena ny inscription ( get_new_user atao anaty table) */
		/* Atao anaty session id an'ilay nouveau user raha vita  */
		/* $this->utilisateur->set_new_user(null); */ 
		redirect("template_controller/acceuil");
	}

	public function inscription_personne()
	{
		$this->load->view("client/page_formulaire/inscription_personne.php");
	}


	public function inscription_vehicule()
	{
		$data = [
			'liste_type' => $this->Vehicule->get_type_vehicule()

		];
		$this->load->view("client/page_formulaire/inscription_vehicule.php", $data);
	}		
	
}