<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utilisateur extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); 
        $this->load->library('email');
        $this->load->library('session');
    }

    public function verifier_connexion($email, $mdp)
    {
        $this->db->where('email', $email);
        $requete = $this->db->get('utilisateur');

        if ($requete->num_rows() == 1) {
            $user = $requete->row();
            if (password_verify($mdp, $user->mot_de_passe)) {
                $this->session->set_userdata('id_utilisateur', $user->id);
                return true;
            }
        }

        return false;
    }

    public function verifier_numero_telephone($numero_telephone)
    {
        return preg_match('/^(032|033|034|038)\d{7}$/', $numero_telephone);
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
    
    public function envoyer_code_confirmation($email, $code_confirmation)
    {
        $this->email->from('assur_m@gmail.com', 'Assur\'M Madagascar');
        $this->email->to($email);
        $this->email->subject('Code de confirmation');
        $this->email->message("Votre code de confirmation est : $code_confirmation");

        if (!$this->email->send()) {
            throw new Exception("Échec de l'envoi de l'email de confirmation.");
        }
    }

    // public function valider_code_confirmation($code_saisi)
    // {}
}
?>
