<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utilisateur_controlleur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Utilisateur');
        $this->load->library('session');
    }

    public function inscription()
    {
        $nom = $this->input->post('nom');
        $prenoms = $this->input->post('prenoms');
        $adresse = $this->input->post('adresse');
        $date_naissance = $this->input->post('date_naissance');
        $numero_telephone = $this->input->post('numero_telephone');
        $email = $this->input->post('email');
        $mot_de_passe = $this->input->post('mot_de_passe');
        $mot_de_passe2 = $this->input->post('mot_de_passe2');

        try {
            if (!$this->Utilisateur->verifier_numero_telephone($numero_telephone)) {
                throw new Exception("Le numéro de téléphone est invalide.");
            }

            $code_confirmation = $this->Utilisateur->generer_code_confirmation();
            $this->Utilisateur->envoyer_code_confirmation($email, $code_confirmation);

            $this->Utilisateur->creer_profil($nom, $prenoms, $adresse, $date_naissance, $numero_telephone, $email, $mot_de_passe, $mot_de_passe2);
            echo "Profil créé avec succès. Un code de confirmation a été envoyé à votre adresse e-mail.";
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function connexion()
    {
        $email = $this->input->post('email');
        $mdp = $this->input->post('mot_de_passe');

        if ($this->Utilisateur->verifier_connexion($email, $mdp)) {
            echo "Connexion réussie.";
        } else {
            echo "Échec de la connexion.";
        }
    }

    public function modifier()
    {
        $id_utilisateur = $this->session->userdata('id_utilisateur');
        $nom = $this->input->post('nom');
        $prenoms = $this->input->post('prenoms');
        $adresse = $this->input->post('adresse');
        $date_naissance = $this->input->post('date_naissance');
        $numero_telephone = $this->input->post('numero_telephone');
        $email = $this->input->post('email');
        $mot_de_passe = $this->input->post('mot_de_passe');

        try {
            if (!$this->Utilisateur->verifier_numero_telephone($numero_telephone)) {
                throw new Exception("Le numéro de téléphone est invalide.");
            }

            $this->Utilisateur->modifier_profil($id_utilisateur, $nom, $prenoms, $adresse, $date_naissance, $numero_telephone, $email, $mot_de_passe);
            echo "Profil modifié avec succès.";
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function supprimer($id_utilisateur)
    {
        try {
            $this->Utilisateur->supprimer_profil($id_utilisateur);
            echo "Profil supprimé avec succès.";
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}
?>
