<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

    public function index(){
        $this->session->sess_destroy();
        $this->load->view('client/index.php');
    }
    public function to_login(){
        redirect("form_controller/login");
    }
}