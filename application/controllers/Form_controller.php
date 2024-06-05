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

	public function inscription_personne()
	{
		$this->load->view("client/page_formulaire/inscription_personne.php");
	}

	public function inscription_vehicule()
	{
		$this->load->view("client/page_formulaire/inscription_vehicule.php");
	}		
	
}