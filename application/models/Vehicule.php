<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vehicule extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function verifier_donnee($data)
    {
        if (empty($data['immatriculation'])) {
            throw new Exception("Le numero d'immatriculation ne peut pas être nul", 1);
        }

        if (!preg_match('/^\d{4}[A-Z]{3}$/', $data['immatriculation'])) {
            throw new Exception("Le numero d'immatriculation est invalide", 1);
        }

        if (!is_numeric($data['puissance']) || $data['puissance'] <= 0) {
            throw new Exception("La puissance doit être un nombre positif", 1);
        }

        if (empty($data['marque'])) {
            throw new Exception("La marque ne peut pas être vide", 1004);
        }

        if (!is_numeric($data['place']) || $data['place'] <= 0) {
            throw new Exception("Le nombre de places doit être un entier positif ", 1005);
        }

        if (!is_numeric($data['id_type']) || $data['id_type'] <= 0) {
            throw new Exception("L'ID du type de véhicule est invalide", 1006);
        }
    }

    public function inscription_vehicule($data)
    {

        if (empty($data['immatriculation'])) {
            throw new Exception("Le numero d'immatriculation ne peut pas être nul", 1);
        }

        if (!preg_match('/^\d{4}[A-Z]{3}$/', $data['immatriculation'])) {
            throw new Exception("Le numero d'immatriculation est invalide", 1);
        }

        if (!is_numeric($data['puissance']) || $data['puissance'] <= 0) {
            throw new Exception("La puissance doit être un nombre positif", 1);
        }

        if (empty($data['marque'])) {
            throw new Exception("La marque ne peut pas être vide", 1004);
        }

        if (!is_numeric($data['place']) || $data['place'] <= 0) {
            throw new Exception("Le nombre de places doit être un entier positif ", 1005);
        }

        if (!is_numeric($data['id_type']) || $data['id_type'] <= 0) {
            throw new Exception("L'ID du type de véhicule est invalide", 1006);
        }

        if (!is_numeric($data['id_utilisateur']) || $data['id_utilisateur'] <= 0) {
            throw new Exception("L'ID de l'utilisateur est invalide", 1007);
        }

        // $data = array(
        //     'immatriculation' => $immatriculation,
        //     'puissance' => $puissance,
        //     'marque' => $marque,
        //     'place' => $place,
        //     'id_type' => $id_type,
        //     'id_utilisateur' => $id_utilisateur
        // );

        try {
            $this->db->insert('vehicule', $data);
        } catch (\PDOException $e) {
            throw new Exception("Erreur lors de l'insertion dans la base de donnee: " . $e->getMessage(), 2);
        } catch (\Throwable $th) {
            throw new Exception("Erreur inattendue: " . $th->getMessage(), 2);
        }
    }

    public function liste_vehicules($id_utilisateur)
    {
        try {
            $this->db->where('id_utilisateur', $id_utilisateur);
            $query = $this->db->get('info_vehicule');

            $liste = $query->result_array();

            $date1 = new DateTime('now');
            $i = 0;
            foreach ($liste as $row) {
                if (isset($row['date_fin']) && !empty($row['date_fin'])) {
                    $date2 = new DateTime($row['date_fin']);
                    $interval = $date1->diff($date2);

                    $days = $interval->days;

                    if ($interval->invert) {
                        $liste[$i]['id_css'] = 'expirer';
                    } else if ($days <= 10) {
                        $liste[$i]['id_css'] = 'presque_expirer';
                    } else {
                        $liste[$i]['id_css'] = 'huhu';
                    }
                } else {
                    $liste[$i]['id_css'] = 'expirer';
                }
                $i++;
            }

            return $liste;
        } catch (\PDOException $e) {

            throw new Exception("Erreur lors de la recuperation des vehicules: " . $e->getMessage(), 1);
        } catch (\Throwable $ex) {

            throw new Exception("Erreur inattendue lors de la recuperation des vehicules: " . $ex->getMessage(), 1);
        }
    }

    public function etat_assurance($id_vehicule)
    {

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


    public function get_type_vehicule()
    {
        $query = $this->db->get('type_vehicule');
        return $query->result_array();
    }


    // ///////////////////////////////////////////////////////////////////////////////////////////////


    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('vehicule');
        return $query->row_array();
    }

    public function update_vehicule($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('vehicule', $data);
    }

    public function delete_vehicule($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('vehicule');
    }

    ////////////////////////////////////////////////////////////////////////////////////////////
    public function information_recu_pdf($id_vehicule)
    {
        try {
            $this->db->select('f.*, a.nom nom_assurance');
            $this->db->from('facture f');
            $this->db->join('assurance a', 'f.id_assurance = a.id');
            $this->db->where('f.id_vehicule', $id_vehicule);
            $query = $this->db->get();
            if (!$query) {
                throw new Exception("Erreur lors de la récupération des informations de la facture");
            }
            return $query->row_array();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    public function notifications($id_utilisateur)
    {
        try {
            $sql = "SELECT v.id AS id_vehicule, v.immatriculation, f.date_fin
                    FROM facture f
                    INNER JOIN vehicule v ON f.id_vehicule = v.id
                    WHERE v.id_utilisateur = ?
                    AND (DATE_PART('year', f.date_fin) - DATE_PART('year', CURRENT_DATE)) * 365 
                        + (DATE_PART('month', f.date_fin) - DATE_PART('month', CURRENT_DATE)) * 30 
                        + DATE_PART('day', f.date_fin) - DATE_PART('day', CURRENT_DATE) <= 3";

            $query = $this->db->query($sql, array($id_utilisateur));
            if (!$query) {
                throw new Exception("Erreur lors de la récupération des notifications");
            }
            return $query->result();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    /* Carburant */
    public function get_carburant()
    {
        try {
            $query = $this->db->get('carburant');
            if (!$query) {
                throw new Exception("Erreur lors de la récupération des carburants");
            }
            return $query->result();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    public function get_carburant_by_id($id_carburant)
    {
        try {
            $query = $this->db->get_where('carburant', array('id' => $id_carburant));
            if (!$query) {
                throw new Exception("Erreur lors de la récupération du carburant");
            }
            return $query->row_array();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    public function get_prix_carburant($id_carburant, $id_assureur)
    {
        try {
            $query = $this->db->get_where('carburant', array('id' => $id_carburant));
            if (!$query) {
                throw new Exception("Erreur lors de la récupération du prix du carburant");
            }
            return $query->row_array();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    /* Annee de Fabrication */
    public function get_annee_fabrication()
    {
        try {
            $query = $this->db->get('annee_fabrication');
            if (!$query) {
                throw new Exception("Erreur lors de la récupération des années de fabrication");
            }
            return $query->result();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    public function get_annee_fabrication_by_id($id_annee_fabrication)
    {
        try {
            $query = $this->db->get_where('annee_fabrication', array('id' => $id_annee_fabrication));
            if (!$query) {
                throw new Exception("Erreur lors de la récupération de l'année de fabrication");
            }
            return $query->row_array();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    public function get_prix_par_annee_fabrication($id_annee_fabrication, $id_assureur)
    {
        try {
            $this->db->where("id_assureur", $id_assureur);
            $this->db->where("id", $id_annee_fabrication);
            $query = $this->db->get('annee_fabrication');
            if (!$query) {
                throw new Exception("Erreur lors de la récupération du prix par année de fabrication");
            }
            return $query->row_array();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    /* Puissance */
    public function get_puissance()
    {
        try {
            $query = $this->db->get('puissance');
            if (!$query) {
                throw new Exception("Erreur lors de la récupération des puissances");
            }
            return $query->result();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    public function get_puissance_by_id($id_puissance)
    {
        try {
            $query = $this->db->get_where('puissance', array('id' => $id_puissance));
            if (!$query) {
                throw new Exception("Erreur lors de la récupération de la puissance");
            }
            return $query->row_array();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    public function get_prix_par_puissance($id_assureur)
    {
        try {
            $query = $this->db->get_where('puissance', array('id_assureur' => $id_assureur));
            if (!$query) {
                throw new Exception("Erreur lors de la récupération du prix par puissance");
            }
            return $query->row_array();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    /* Usage */
    public function get_usage()
    {
        try {
            $query = $this->db->get('usage');
            if (!$query) {
                throw new Exception("Erreur lors de la récupération des usages");
            }
            return $query->result();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    public function get_usage_by_id($id_usage)
    {
        try {
            $query = $this->db->get_where('usage', array('id' => $id_usage));
            if (!$query) {
                throw new Exception("Erreur lors de la récupération de l'usage");
            }
            return $query->row_array();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    public function get_prix_par_usage($id_usage, $id_assureur)
    {
        try {
            $query = $this->db->get_where('usage', array('id_assureur' => $id_assureur, 'id' => $id_usage));
            if (!$query) {
                throw new Exception("Erreur lors de la récupération du prix par usage");
            }
            return $query->row_array();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    /* Etat */
    public function get_etat()
    {
        try {
            $query = $this->db->get('etat');
            if (!$query) {
                throw new Exception("Erreur lors de la récupération des états");
            }
            return $query->result();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    public function get_etat_by_id($id_etat)
    {
        try {
            $query = $this->db->get_where('etat', array('id' => $id_etat));
            if (!$query) {
                throw new Exception("Erreur lors de la récupération de l'état");
            }
            return $query->row_array();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    public function get_prix_par_etat($id_etat, $id_assureur)
    {
        try {
            $query = $this->db->get_where('etat', array('id_assureur' => $id_assureur, 'id' => $id_etat));
            if (!$query) {
                throw new Exception("Erreur lors de la récupération du prix par état");
            }
            return $query->row_array();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    /* Options */
    public function get_options()
    {
        try {
            $query = $this->db->get('options');
            if (!$query) {
                throw new Exception("Erreur lors de la récupération des options");
            }
            return $query->result();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    public function get_option_by_id($id_option)
    {
        try {
            $query = $this->db->get_where('options', array('id' => $id_option));
            if (!$query) {
                throw new Exception("Erreur lors de la récupération de l'option");
            }
            return $query->row_array();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    public function get_prix_par_option($id_option, $id_assureur)
    {
        try {
            $query = $this->db->get_where('options', array('id_assureur' => $id_assureur, 'id' => $id_option));
            if (!$query) {
                throw new Exception("Erreur lors de la récupération du prix par option");
            }
            return $query->row_array();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    /* Calul des simulations par assureur */
    public function choix_assurance($data, $i) // $i eto ny id an'ilay assurance
    {
        try {
            $somme = 0;
            // boucler pour chaque assureur
            $facteur = array();
            if ($data['id_option'] != '') {
                $facteur[] = $this->get_prix_par_option($data['id_option'], $i)['valeur'];
            }
            if ($data['id_usage'] != '') {
                $facteur[] = $this->get_prix_par_usage($data['id_usage'], $i)['valeur'];
            }
            if ($data['id_carburant'] == '') {
                throw new Exception("Vous devez choisir le carburant", 1);
            }
            if ($data['id_annee_fabrication'] == '') {
                throw new Exception("Vous devez choisir l'annee de fabrication", 1);
            }



            $facteur[] = $this->get_prix_carburant($data['id_carburant'], $i)['prix'];
            $facteur[] = $this->get_prix_par_annee_fabrication($data['id_annee_fabrication'], $i)['prix'];
            $facteur[] = $this->get_prix_par_puissance($i)['prix_chevaux'] * $data['chevaux'];
            // $facteur[] = $this->get_prix_par_etat($data['id_etat'], $i)['valeur'];

            // sommer facteur
            foreach ($facteur as $f) {
                if ($f === null) {
                    throw new Exception("Erreur lors du calcul des facteurs de prix");
                }
                $somme += $f;
            }
            return $somme;
        } catch (Exception $e) {
            // return array('error' => $e->getMessage());
            throw $e;
        }
    }

    public function payment($data)
    {
        $this->db->insert('payement', $data);
    }

    function generatePolicyNumber() {
        $prefix = 'PA';
        $randomNumber = mt_rand(100000000, 999999999); // Génère un nombre aléatoire de 9 chiffres
        return $prefix . $randomNumber;
    }

    function verifier_police($police) {
        $this->db->where('police_assurance', $police);
        $query = $this->db->get('facture');
        $result = $query->row_array();
        return $result ? true : false; 
    }

    public function facture_payment($data)
    {
        // Generer la police d'assurance
        $police = null;

        // Verifier si ce nombre existe deja
        do {
            $police = $this->generatePolicyNumber();
        } while ($this->verifier_police($police));

        $data['police_assurance'] = $police;

        $this->db->insert('facture', $data);
    }

    public function verifier_expiration($data)
    {

        $this->db->select('*');
        $this->db->from('facture');
        $this->db->where('date_fin <=', "(SELECT MAX(date_fin) FROM facture)", false); // Utilisation d'une sous-requête
        $this->db->where('id_vehicule', $data['id_vehicule']);
        $query = $this->db->get();

        $result = $query->row_array();

        if ($result) {
            if ($data['date_debut'] < $result['date_fin']) {
                throw new Exception("Votre assurance est à jour!");
            }
        }
    }

    public function detail($id_vehicule)
    {
        $this->db->where('id', $id_vehicule);
        $query = $this->db->get('detail');
        return $query->row_array();
    }

    public function get_liste_facture($id_utilisateur) {
        $this->db->where('id_utilisateur', $id_utilisateur);
        $query = $this->db->get('info_facture');

        return $query->result_array();
    }

    public function search_by_immatriculation($immatriculation) {
        $this->db->select('*');
        $this->db->from('info_vehicule');
        $this->db->like('immatriculation', $immatriculation);
        $query = $this->db->get();
        $liste = $query->result_array();
        
        $date1 = new DateTime('now');
            $i = 0;
            foreach ($liste as $row) {
                if (isset($row['date_fin']) && !empty($row['date_fin'])) {
                    $date2 = new DateTime($row['date_fin']);
                    $interval = $date1->diff($date2);

                    $days = $interval->days;

                    if ($interval->invert) {
                        $liste[$i]['id_css'] = 'expirer';
                    } else if ($days <= 10) {
                        $liste[$i]['id_css'] = 'presque_expirer';
                    } else {
                        $liste[$i]['id_css'] = 'huhu';
                    }
                } else {
                    $liste[$i]['id_css'] = 'expirer';
                }
                $i++;
            }
        return $liste;
    }

    public function search_facture($criteria) {
        $this->db->select('*');
        $this->db->from('info_facture');

        if (!empty($criteria['immatriculation'])) {
            $this->db->like('immatriculation', $criteria['immatriculation']);
        }
        if (!empty($criteria['assurance'])) {
            $this->db->where('id_assureur', $criteria['assurance']);
        }
        if (!empty($criteria['date_paye_min'])) {
            $this->db->where('date_debut >=', $criteria['date_paye_min']);
        }
        if (!empty($criteria['date_paye_max'])) {
            $this->db->where('date_debut <=', $criteria['date_paye_max']);
        }
        if (!empty($criteria['date_exp_min'])) {
            $this->db->where('date_fin >=', $criteria['date_exp_min']);
        }
        if (!empty($criteria['date_exp_max'])) {
            $this->db->where('date_fin <=', $criteria['date_exp_max']);
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_facture_by_id($id_facture) {
        $this->db->where('id', $id_facture);
        $query = $this->db->get('info_pdf');
        return $query->row_array();
    }
}
