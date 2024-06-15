<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Utilisateur');
		$this->load->model('Vehicule');
		// $this->session->set_userdata('utilisateur');
		$this->load->model('Utilitaire');
	}

	public function login(){
		$this->load->view("client/page_formulaire/login.php");
		// $this->load->view("test.php");
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
		$data = array();
		$data["nom"] =  $this->input->post('nom');
		$data["prenoms"] = $this->input->post('prenoms');
		$data["adresse"] = $this->input->post('adresse');
		$data["date_naissance"] = $this->input->post('date_naissance');
		$data["num_tel"] = $this->input->post('num_tel');
		$data["email"] = $this->input->post('email');
		$data["mdp"] = $this->input->post('mdp');
		$data["confirm_mdp"] = $this->input->post('confirm_mdp');

		try {
			$this->Utilisateur->verifier_donnee($data);
			$email = $data['email'];
			//code...
		} catch (Exception $e) {
			$exception = $e->getMessage();
		}

		/* Manao gestion d'exception d retournena Ajax raha misy  */
		// $exception = "patrick exception";

		echo json_encode(['exception'=>$exception]);
	}

	public function getText() {
        // Définir l'en-tête de contenu pour indiquer que la réponse est en texte brut
        header('Content-Type: text/plain');

        // Le texte à renvoyer
        $responseText = "Hello, this is a response text from CodeIgniter 3!";

        // Renvoyer le texte
        echo $responseText;
    }

	
	// GENERER LE CODE DE VALIDATION ET ENVOYER L'EMAIL ET CONNECTE L'UTILISATEUR
	public function getCodeValidation() {
		$this->load->model('Utilitaire');
		$code = $this->Utilitaire->generateCodeValidation(); 
		$exception = "";
		try {
			//code...
			$this->Utilitaire->envoyer_email($this->input->get('email'), $code);
		} catch (Exception $e) {
			$exception = $e->getMessage();
		}
		

		// RENVOIR LE CODE 
		echo json_encode(['code'=>$code]);
	}



	public function enregistrer_utilisateur() {	
		// CONNECTE L'UTILISATEUR
		$date = $this->input->post('date_naissance');
		DateTime::createFromFormat('Y-m-d', $date);
		$donnee = array(
			'nom' => $this->input->post('nom'),
			'prenom' => $this->input->post('prenoms'),
			'adresse' => $this->input->post('adresse'),
			'naissance' => $date,
			'telephone' => $this->input->post('num_tel'),
			'email' => $this->input->post('email'),
			'mdp' => $this->input->post('mdp')
		);

		
		$id = $this->Utilisateur->enregistrer_utilisateur($donnee);
		$utilisateur = $this->Utilisateur->get_by_id($id);
		$this->session->set_userdata('utilisateur', $utilisateur);
		echo json_encode(['status' => 'success', 'id' => $id]);
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

	public function accueil() {
		redirect('template_controller/accueil');
	}
	
	


	
}