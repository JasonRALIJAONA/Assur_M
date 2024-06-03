<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utilisateur_controlleur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Utilisateur');
    }

    public function creer()
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
            $this->Utilisateur->supprimer_profil(1);
            echo "Profil supprimé avec succès.";
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}
?>
