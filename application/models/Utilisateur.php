<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utilisateur extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); 
    }

    public function creer_profil($nom, $prenoms, $adresse, $date_naissance, $numero_telephone, $email, $mot_de_passe, $mot_de_passe2) 
    {
        if ($mot_de_passe !== $mot_de_passe2) {
            throw new Exception("Les mots de passe ne correspondent pas.");
        }

        $data = array(
            'nom' => $nom,
            'prenom' => $prenoms,
            'adresse' => $adresse,
            'naissance' => $date_naissance,
            'telephone' => $numero_telephone,
            'email' => $email,
            'mdp' => password_hash($mot_de_passe, PASSWORD_BCRYPT) // Hachage du mot de passe
        );

        return $this->db->insert('utilisateur', $data); // Insertion des données dans la table 'utilisateur'
    }

    public function recuperer_utilisateur($id_utilisateur) 
    {
        $query = $this->db->get_where('utilisateur', array('id' => $id_utilisateur));
        return $query->row();
    }

    public function modifier_profil($id_utilisateur, $nom, $prenoms, $adresse, $date_naissance, $numero_telephone, $email, $mot_de_passe) 
    {
        $data = array(
            'nom' => $nom,
            'prenom' => $prenoms,
            'adresse' => $adresse,
            'naissance' => $date_naissance,
            'telephone' => $numero_telephone,
            'email' => $email
        );

        if (!empty($mot_de_passe)) {
            $data['mdp'] = password_hash($mot_de_passe, PASSWORD_BCRYPT); // Hachage du nouveau mot de passe si fourni
        }

        $this->db->where('id', $id_utilisateur);
        return $this->db->update('utilisateur', $data); // Mise à jour des données dans la table 'utilisateur'
    }

    public function supprimer_profil($id_utilisateur) 
    {
        $this->db->where('id', $id_utilisateur);
        return $this->db->delete('utilisateur'); // Suppression du profil de la table 'utilisateur'
    }

    public function generer_code_confirmation()
    {
        return str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);   
    }
    // public function envoyer_code_confirmation($email, $code_confirmation)
    // {}
    // public function valider_code_confirmation($code_saisi)
    // {}
}
?>
