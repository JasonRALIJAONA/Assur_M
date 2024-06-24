<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pagination extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // POUR LES VEHICULE

    public function get_nombre_facture() {
        $this->db->where('id_utilisateur', $this->session->userdata('utilisateur'));
        $nombre = $this->db->count_all('info_facture');
        return $nombre;
    }

    public function get_page($limit, $offset) {
        
        $this->db->where('id_utilisateur', $this->session->userdata('utilisateur')->id); // Exemple de condition, à modifier selon votre besoin
        $this->db->order_by('id', 'asc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('info_facture');
        
        // Retourner les résultats
        return $query->result_array();
    }
}