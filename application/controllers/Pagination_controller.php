<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagination_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
    public function display_page_vehicule($num_page=""){
        /* Maka an'ilay data rehetra */
        $data["content"] = "page_affichage/acceuil";
        $data['num_page_courant'] = $num_page;
        $this->load->view("client/template.php",$data);
    }
    public function display_page_facture($num_page=""){
        /* Maka an'ilay data rehetra */
        $data["content"] = "page_affichage/historique_payement";
        $data['num_page_courant'] = $num_page;
        $this->load->view("client/template.php",$data);
    }

}