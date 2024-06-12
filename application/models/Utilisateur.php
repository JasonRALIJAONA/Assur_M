<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utilisateur extends CI_Model
{
    private $new_user = null; /* Rehefa confirmer le code dia miverina null ito */
    public function __construct()
    {
        parent::__construct();
        //$this->load->database(); 
    }

    /* @ la validation */ 
    public function set_new_user($nouveau_user) {
        $this->$new_user = $nouveau_user;
    }
    public function get_new_user() {
        return $this->new_user;
    }

    public function creer_profil($nom, $prenoms, $adresse, $date_naissance, $numero_telephone, $email, $mot_de_passe, $mot_de_passe2) 
    {
        $this->db->where('email', $email);
        $requete = $this->db->get('utilisateur');

        if ($requete->num_rows() == 1) {
            $user = $requete->row();
            return password_verify($mdp, $user->mdp);
        }

        return false;
    }

    public function verifier_connexion($email, $mdp)
    {
        $this->db->where('email', $email);
        $requete = $this->db->get('utilisateur');

        if ($requete->num_rows() == 1) {
            $user = $requete->row();
            return password_verify($mdp, $user->mdp);
        }

        return false;
    }

    public function get_user_id_by_email($email)
    {
        $this->db->where('email', $email);
        $requete = $this->db->get('utilisateur');

        if ($requete->num_rows() == 1) {
            $user = $requete->row();
            return $user;
        }

        return null;
    }

    public function creer_profil($data) 
    {
        // Vérifier la correspondance des mots de passe
        if ($data['mdp'] !== $data['confirm_mdp']) {
            throw new Exception("Les mots de passe ne correspondent pas.");
        }

        // Générer le code de confirmation
        $code_confirmation = $this->generer_code_confirmation();

        // Préparer les données pour l'insertion
        $profil_data = array(
            'nom' => $data['nom'],
            'prenom' => $data['prenoms'],
            'adresse' => $data['adresse'],
            'naissance' => $data['date_naissance'],
            'telephone' => $data['num_tel'],
            'email' => $data['email'],
            'mdp' => password_hash($data['mdp'], PASSWORD_BCRYPT),
            'code_confirmation' => $code_confirmation
        );

        // Insérer les données dans la table 'utilisateur_temp'
        $this->db->insert('utilisateur_temp', $profil_data);

        // Envoyer le code de confirmation par email
        // $this->envoyer_code_confirmation($data['email'], $code_confirmation);

        return true;
    }

    private function generer_code_confirmation()
    {
        return str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
    }
    public function payemment($numero_voiture, $frequence, $nom_Assurance)
    {
        $this->db->trans_start();
        $this->db->where('immatriculation', $numero_voiture);
        $vehicule_query = $this->db->get('vehicule');

        if ($vehicule_query->num_rows() != 1) {
            throw new Exception("Véhicule non trouvé.");
        }
        
        $vehicule = $vehicule_query->row();
        $this->db->where('nom', $nom_Assurance);
        $assurance_query = $this->db->get('assurance');

        if ($assurance_query->num_rows() != 1) {
            throw new Exception("Assurance non trouvée.");
        }

        $assurance = $assurance_query->row();

        $date_debut = date('Y-m-d');
        switch($frequence) {
            case '1':
                $date_fin = date('Y-m-d', strtotime('+1 month'));
                break;
            case '3':
                $date_fin = date('Y-m-d', strtotime('+3 month'));
                break;
            case '6':
                $date_fin = date('Y-m-d', strtotime('+6 month'));
                break;
            case '12':
                $date_fin = date('Y-m-d', strtotime('+1 year'));
                break;
            default:
                throw new Exception("Fréquence de paiement non valide.");
        }

        $police_assurance = strtoupper(substr(md5(time() . rand()), 0, 10));
        $facture_data = array(
            'date_debut' => $date_debut,
            'date_fin' => $date_fin,
            'police_assurance' => $police_assurance,
            'id_assurance' => $assurance->id,
            'id_vehicule' => $vehicule->id,
            'deleted' => FALSE
        );

        $this->db->insert('facture', $facture_data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            throw new Exception("Erreur lors de l'enregistrement du paiement.");
        }

        return true;
    }
}
?>
