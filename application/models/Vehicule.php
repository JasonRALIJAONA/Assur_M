<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vehicule extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function inscription_vehicule($immatriculation, $puissance, $marque, $place, $id_type, $id_utilisateur) {
        
        if (empty($immatriculation)) {
            throw new Exception("Le numero d'immatriculation ne peut pas être nul", 1);
            
        }

        if (!preg_match('/^\d{4}[A-Z]{3}$/', $immatriculation)) {
            throw new Exception("Le numero d'immatriculation est invalide", 1);
        }

        if (!is_numeric($puissance) || $puissance <= 0) {
            throw new Exception("La puissance doit être un nombre positif", 1);
        }

        if (empty($marque)) {
            throw new Exception("La marque ne peut pas être vide", 1004);
        }

        if (!is_int($place) || $place <= 0) {
            throw new Exception("Le nombre de places doit être un entier positif", 1005);
        }
    
        if (!is_int($id_type) || $id_type <= 0) {
            throw new Exception("L'ID du type de véhicule est invalide", 1006);
        }
    
        if (!is_int($id_utilisateur) || $id_utilisateur <= 0) {
            throw new Exception("L'ID de l'utilisateur est invalide", 1007);
        }

        $data = array(
            'immatriculation' => $immatriculation,
            'puissance' => $puissance,
            'marque' => $marque,
            'place' => $place,
            'id_type' => $id_type,
            'id_utilisateur' => $id_utilisateur
        );

        try {
            $this->db->insert('vehicule', $data);
        } catch (\PDOException $e) {
            throw new Exception("Erreur lors de l'insertion dans la base de donnee: " . $e->getMessage(), 2);
            
        } catch(\Throwable $th) {
            throw new Exception("Erreur inattendue: " . $th->getMessage(), 2);
        }
    }

    public function liste_vehicules($id_utilisateur) {
        try {
            $this->db->where('id_utilisateur', $id_utilisateur);
            $query = $this->db->get('info_vehicule');

            return $query->result_array();

        } catch (\PDOException $e) {

            throw new Exception("Erreur lors de la recuperation des vehicules: " . $e->getMessage(), 1);
        
        } catch(\Throwable $ex) {

            throw new Exception("Erreur inattendue lors de la recuperation des vehicules: " . $ex->getMessage(), 1);
            
        }
    }

    public function etat_assurance($id_vehicule) {
        
        $this->db->select('f.*, a.nom nom_assurance');
        $this->db->from('facture f');
        $this->db->join('assurance a', 'f.id_assurance = a.id');
        $this->db->where('f.id_vehicule', $id_vehicule);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null; 
        }
    }

    // C.R.U.D VEHICULE

    public function get_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('vehicule');
        return $query->row_array();
    }

    public function update_vehicule($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('vehicule', $data);
    }

    public function delete_vehicule($id) {
        $this->db->where('id', $id);
        return $this->db->delete('vehicule');
    }

    public function get_type_vehicule() {
        $query = $this->db->get('type_vehicule');
        return $query->result_array();
    }
}

