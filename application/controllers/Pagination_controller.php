<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagination_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('Pagination');
        $this->load->model('Vehicule');
        $this->load->library('pagination');
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

    public function pagination_facture($page = 1) {
        // Configurer la pagination
        $config['base_url'] = site_url('pagination_controller/pagination_facture');
        $config['total_rows'] = $this->pagination->get_nombre_page() * 5;
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        
        $this->pagination->initialize($config);

        // Récupérer les données pour la page courante
        $data['results'] = $this->Pagination->get_page($page);

        echo json_encode($data['results']);

        // Charger la vue avec les résultats
        // $this->load->view('vehicule_view', $data);
    }

}