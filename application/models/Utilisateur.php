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
    // public function set_new_user($nouveau_user) {
    //     $this->$new_user = $nouveau_user;
    // }
    public function get_new_user() {
        return $this->new_user;
    }

    // public function creer_profil($nom, $prenoms, $adresse, $date_naissance, $numero_telephone, $email, $mot_de_passe, $mot_de_passe2) 
    // {
    //     $this->db->where('email', $email);
    //     $requete = $this->db->get('utilisateur');

    //     if ($requete->num_rows() == 1) {
    //         $user = $requete->row();
    //         return password_verify($mot_de_passe, $user->mdp);
    //     }

    //     return false;
    // }

    public function verifier_connexion($email, $mdp)
    {
        $this->db->where('email', $email);
        $requete = $this->db->get('utilisateur');

        if ($requete->num_rows() == 1) {
            $user = $requete->row();
            if ($user->mdp != $mdp) {
                throw new Exception("Mot de passe ou email non invalide", 1);
                
            }else {
                return $user;
            }
        }else {
            throw new Exception("Mot de passe ou email non invalide", 1);
            
        }

        return null;
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

    public function get_by_id($id) {
        $this->db->where('id', $id);
        $requete = $this->db->get('utilisateur');

        if ($requete->num_rows() == 1) {
            $user = $requete->row();
            return $user;
        }

        return null;
    }

    public function verifier_donnee($data) {
        if ($data['nom'] == '') {
            throw new Exception("Veuillez saisir votre nom", 1);
            
        }
        if ($data['prenoms'] == '') {
            throw new Exception("Veuillez saisir votre prenom", 1);
            
        }
        if ($data['adresse'] == '') {
            throw new Exception("Le champ adresse est obligatoire", 1);
            
        }
        if ($data['date_naissance'] != '') {
            $date = new DateTime($data['date_naissance']);
            $formattedDate = $date->format('d-M-Y');
            // throw new Exception($formattedDate);
            // if ($formattedDate - date()) {
            //     throw new Exception('sdfskdj', 1);
            //     # code...
            // }
            
        } else {
            throw new Exception('Veuillez choisir une date de naissance', 1);
        }
        if ($data['num_tel'] == '') {
            throw new Exception("Le numero de telephone est obligatoire");
        }

        if ($data['mdp'] != $data['confirm_mdp']) {
            throw new Exception('Les mots de passe doivent etre identique', 1);
        }

    }

    public function enregistrer_utilisateur($data) {
        $this->db->insert('utilisateur', $data);
        $id = $this->db->insert_id('utilisateur_id_seq');
        return $id;
    }
}
?>
