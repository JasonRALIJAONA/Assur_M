<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pagination extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // POUR LES VEHICULE

    public function get_nombre_page() {
        $nombre = $this->db->count_all('info_facture');
        $nombre_page = ceil($nombre / 5);
        return $nombre_page;
    }

    public function get_page($offset) {
        // Convert offset to zero-based index for the first page
        $offset = $offset == 1 ? 0 : ($offset - 1) * 5;
    
        // Nombre de résultats par page
        $limit = 3;
    
        // Construire la requête avec les conditions de limite et de décalage
        $this->db->select('*');
        $this->db->from('info_facture');
        $this->db->where('id_utilisateur', $this->session->userdata('utilisateur')->id); // Exemple de condition, à modifier selon votre besoin
        $this->db->order_by('id', 'ASC');
        $this->db->limit($limit, $offset);
        
        // Exécuter la requête
        $query = $this->db->get();
        
        // Retourner les résultats
        return $query->result_array();
    }
}