<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function login(){
		$this->load->view("client/page_formulaire/login.php");
	}
	public function checkLogin(){
		/* Fonction mi cheque login dia tokony mankao anaty session */

		//Ito atao raha diso ny login
		//redirect("form_controller/login");

		// Rehefa vita ny validation dia izay vao 
        redirect("template_controller/acceuil");

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
		//$this->load->model('utilisateur');
		//$this->utilisateur->set_new_user($new_user);

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
		$this->load->view("client/page_formulaire/inscription_vehicule.php");
	}		
	
}