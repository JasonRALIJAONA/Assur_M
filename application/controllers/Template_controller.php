<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

    public function acceuil(){
        $data = array();
        $data["content"] = "page_affichage/acceuil";
        $this->load->view("client/template.php",$data);
    }

}