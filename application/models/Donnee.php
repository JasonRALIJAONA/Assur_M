<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donnee extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function liste_annee_fabrication($id_assureur) {
        $this->db->where('id_assureur', $id_assureur);
        $query = $this->db->get('annee_fabrication');

        return $query->result_array();
    }

}