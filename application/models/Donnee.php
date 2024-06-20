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

    public function liste_carburant($id_assureur) {
        $this->db->where('id_assureur', $id_assureur);
        $query = $this->db->get('carburant');
        return $query->result_array();

    }

    public function liste_usage($id_assureur) {
        $this->db->where('id_assureur', $id_assureur);
        $query = $this->db->get('usage');
        return $query->result_array();
    }
    public function liste_options($id_assureur) {
        $this->db->where('id_assureur', $id_assureur);
        $query = $this->db->get('options');
        return $query->result_array();
    }

    public function verifier_donnee1($data) {
        $this->db->where('immatriculation', $data['immatriculation']);
        $query = $this->db->get('liste_vehicule');

        $vrai = $query->row_array();

        if (!$vrai) {
            throw new Exception('Immatriculation non reconnu');
        }

        if ($data['chevaux'] != $vrai['puissance']) {
            throw new Exception("La valeur de la puissance n'est pas vraie");
        }
        if ($data['place'] != $vrai['place']) {
            throw new Exception("Le nombre de place que vous avez saisi n'est pas vrai");
        }

        $this->db->where('immatriculation', $data['immatriculation']);
        $query2 = $this->db->get('vehicule');

        $existe = $query2->row_array();

        if ($existe) {
            throw new Exception("Ce vehicule a déjà une assurance");
            
        }

        
    }


}