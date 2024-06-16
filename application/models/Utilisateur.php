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

    ////////////////////////////////////////////////////////////////////////////////////////////
    public function envoyer_message($data) 
    {
        try {
            if ($data['message'] == null) throw new Exception("Message vide");
            if ($data['id_envoyeur'] == null || $data['id_receveur'] == null) throw new Exception("Erreur: id_envoyeur ou id_receveur manquant");

            if (!$this->db->insert('message', $data)) {
                throw new Exception("Erreur lors de l'insertion du message");
            }
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function get_liste_message_non_lu($id_utilisateur)
    {
        try {
            $query = $this->db->get_where('message', array('id_receveur' => $id_utilisateur, 'vue' => false));
            if (!$query) {
                throw new Exception("Erreur lors de la récupération des messages non lus");
            }
            return $query->result();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    public function get_message_by_id($id_message)
    {
        try {
            $query = $this->db->get_where('message', array('id' => $id_message));
            if (!$query) {
                throw new Exception("Erreur lors de la récupération du message");
            }
            return $query->row_array();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    public function vue_message($id_message)
    {
        try {
            $message = $this->get_message_by_id($id_message);
            if (isset($message['error'])) {
                throw new Exception($message['error']);
            }

            $message['vue'] = true;
            $this->db->where('id', $id_message);
            if (!$this->db->update('message', $message)) {
                throw new Exception("Erreur lors de la mise à jour du message");
            }
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>
