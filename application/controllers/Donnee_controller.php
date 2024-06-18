<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donnee_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Donnee');
    }

    public function get_annee_fabrication()
    {
        $id_assureur = $this->input->get('id_assureur');

        $liste = $this->Donnee->liste_annee_fabrication($id_assureur);

        echo json_encode(['liste_annee' => $liste]);
    }

}
