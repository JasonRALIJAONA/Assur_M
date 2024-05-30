<?php
define('BASEPATH') or exit('No direct script access allowed');

class Utilisateur extends CI_Models
{
    public function _construct()
    {
        parent::_construct();
    }

    public function creer_profil($nom, $prenoms, $adresse, $date_naissance, $numero_telephone, $email, $mot_de_passe) 
    {

    }

    public function recuperer_utilisateur($id_utilisateur) 
    {

    }

    public function modifier_profil($id_utilisateur, $nom, $prenoms, $adresse, $date_naissance, $numero_telephone, $email, $mot_de_passe) 
    {

    }

    public function supprimer_profil($id_utilisateur) 
    {

    }
}
