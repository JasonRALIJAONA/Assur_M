<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vehicule extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function inscription_vehicule($id, $immatriculation, $puissance, $marque, $place, $id_type, $id_utilisateur) {
        
        if (empty($immatriculation)) {
            throw new Exception("Le numero d'immatriculation ne peut pas être nul", 1);
            
        }

        if (!preg_match('/^\d{4} [A-Z]{3}$/', $immatriculation)) {
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
            'id' => $id,
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
}

