<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Utilisateur');
		$this->load->model('Vehicule');
		$this->load->model('Donnee');
		// $this->session->set_userdata('utilisateur');
		$this->load->model('Utilitaire');
	}

	public function login(){
		$this->load->view("client/page_formulaire/login.php");
		// $this->load->view("test.php");
	}

	public function checkLogin(){
		$email = $this->input->post('login-mail');
		$mdp = $this->input->post('login-pass');
		try {
			$utilisateur = $this->Utilisateur->verifier_connexion($email, $mdp); 
			$this->session->set_userdata('utilisateur', $utilisateur);
			redirect('template_controller/accueil');
		} catch (Exception $e) {
			$data['erreur'] = $e->getMessage();
			$this->load->view('client/page_formulaire/login.php', $data);
		}


	}

	public function dashboard() {
        $utilisateur = $this->session->userdata('utilisateur');
        if (!$utilisateur) {
			$data['erreur'] = "y'a une erreur";
            $this->load->view('client/page_formulaire/login.php', $data);  // Redirection vers la page de login si l'utilisateur n'est pas connecté
        }

        $liste_vehicule = $this->Vehicule->liste_vehicules($utilisateur->id);
        $data['liste_vehicule'] = $liste_vehicule;
        $data["content"] = "page_affichage/acceuil";
        $this->load->view("client/template.php", $data);
    }


	public function check_inscription(){
		/* Gerance d'exception d'insertion  */
		/* Si ok , generer code validation */
		$exception = null;
		$data = array();
		$data["nom"] =  $this->input->post('nom');
		$data["prenoms"] = $this->input->post('prenoms');
		$data["adresse"] = $this->input->post('adresse');
		$data["date_naissance"] = $this->input->post('date_naissance');
		$data["num_tel"] = $this->input->post('num_tel');
		$data["email"] = $this->input->post('email');
		$data["mdp"] = $this->input->post('mdp');
		$data["confirm_mdp"] = $this->input->post('confirm_mdp');

		try {
			$this->Utilisateur->verifier_donnee($data);
			$email = $data['email'];
			//code...
		} catch (Exception $e) {
			$exception = $e->getMessage();
		}

		/* Manao gestion d'exception d retournena Ajax raha misy  */
		// $exception = "patrick exception";

		echo json_encode(['exception'=>$exception]);
	}

	public function getText() {
        // Définir l'en-tête de contenu pour indiquer que la réponse est en texte brut
        header('Content-Type: text/plain');

        // Le texte à renvoyer
        $responseText = "Hello, this is a response text from CodeIgniter 3!";

        // Renvoyer le texte
        echo $responseText;
    }

	
	// GENERER LE CODE DE VALIDATION ET ENVOYER L'EMAIL ET CONNECTE L'UTILISATEUR
	public function getCodeValidation() {
		$this->load->model('Utilitaire');
		$code = $this->Utilitaire->generateCodeValidation(); 
		try {
			// Envoi de l'email
			$this->Utilitaire->envoyer_email($this->input->get('email'), $code);
			// Si l'email est envoyé avec succès
			$response['status'] = 'success';
			$response['code'] = $code;
		} catch (Exception $e) {
			// En cas d'exception, envoyer le message d'erreur
			$response['status'] = 'error';
			$response['message'] = $e->getMessage();
		}
	
		// Envoyer la réponse JSON
		echo json_encode($response);
	}



	public function enregistrer_utilisateur() {	
		$numero =  $this->input->post('num_tel');
        $suffix = substr($numero, 0, 3);
        $liste_operateur = $this->Utilisateur->get_operateur();
        $id_operateur = 0;
        if ($suffix == '033') {
            foreach ($liste_operateur as $row) {
                if (strcmp($row['nom'], 'Airtel') == 0) {
                    $id_operateur = $row['id'];
                    break;
                }
            }
        } else if ($suffix == '034' || $suffix == '038') {
            foreach ($liste_operateur as $row) {
                if (strcmp($row['nom'], 'Telma') == 0) {
                    $id_operateur = $row['id'];
                    break;
                }
            }
        } else if ($suffix == '032') {
            foreach ($liste_operateur as $row) {
                if (strcmp($row['nom'], 'Orange') == 0) {
                    $id_operateur = $row['id'];
                    break;
                }
            }
        }
		// CONNECTE L'UTILISATEUR
		$date = $this->input->post('date_naissance');
		DateTime::createFromFormat('Y-m-d', $date);
		$donnee = array(
			'nom' => $this->input->post('nom'),
			'prenom' => $this->input->post('prenoms'),
			'adresse' => $this->input->post('adresse'),
			'naissance' => $date,
			'telephone' => $this->input->post('num_tel'),
			'email' => $this->input->post('email'),
			'mdp' => $this->input->post('mdp'),
			'id_operateur' => $id_operateur
		);

		$id = $this->Utilisateur->save($donnee);
		$utilisateur = $this->Utilisateur->get_by_id($id);
		$this->session->set_userdata('utilisateur', $utilisateur);
		echo json_encode(['status' => 'success', 'id' => $id]);
	}

	public function confirm_inscription() {
		/* Confirmena ny inscription ( get_new_user atao anaty table) */
		/* Atao anaty session id an'ilay nouveau user raha vita  */
		/* $this->utilisateur->set_new_user(null); */ 
		redirect("template_controller/acceuil");
	}

	public function inscription_personne()
	{
		$this->load->view("client/page_formulaire/inscription_personne.php");
	}


	public function inscription_vehicule()
	{
		$data = [
			'liste_type' => $this->Vehicule->get_type_vehicule()

		];
		$this->load->view("client/page_formulaire/inscription_vehicule.php", $data);
	}	

	public function accueil() {
		redirect('template_controller/accueil');
	}

	public function insert_vehicule_2() {
		$this->load->view("client/page_formulaire/inscription_vehicule2.php");
	}
	
	public function inscription_vehicule_page1(){
		$exception = '';
		$data1 = array(
			'immatriculation' => $this->input->post('num_plaque'),
			'chevaux' => $this->input->post('puissance'),
			'place' => $this->input->post('place'),
			'marque' => $this->input->post('marque'),
			'id_type' => $this->input->post('type_vehicule')
		);

		try {
			$this->Donnee->verifier_donnee1($data1);
		} catch (Exception $e) {
			$exception = $e->getMessage();
		}

		$this->session->set_userdata('donnee_vehicule', $data1);

		echo json_encode(['exception' => $exception]);


		// $this->load->view("client/page_formulaire/inscription_vehicule2.php");
	}

	public function inscription_vehicule_page2() {
		$exception = '';
		$prix = 0;
		$data2 = array(
			'id_assureur' => $this->input->post('assureur'),
			'id_option' => $this->input->post('option'),
			'id_usage' => $this->input->post('mode_usage'),
			'id_annee_fabrication' => $this->input->post('annee_fabrication'),
			'id_carburant' => $this->input->post('type_moteur'),
		);

		$data = array_merge($this->session->userdata('donnee_vehicule'), $data2);

		try {
			
			$prix = $this->Vehicule->choix_assurance($data, $data['id_assureur']);
		} catch (Exception $e) {
			$exception = $e->getMessage();
		}

		echo json_encode(['prix' => $prix, 'exception' => $exception]);
		// echo json_encode($this->session->userdata('donnee_vehicule'));
	}	

	public function inscrire_vehicule() {
		$data1 = $this->session->userdata('donnee_vehicule');
		$data = array(
			'immatriculation' => $data1['immatriculation'],
			'puissance' => $data1['chevaux'],
			'marque' => $data1['marque'],
			'place' => $data1['place'],
			'id_type' => $data1['id_type'],
			'id_utilisateur' => $this->session->userdata('utilisateur')->id,
			'id_assureur' => $this->input->post('assureur'),
			'id_options' => $this->input->post('option'),
			'id_carburant' => $this->input->post('type_moteur'),
			'id_utilisation' => $this->input->post('mode_usage'),
			'id_annee_fabrication' => $this->input->post('annee_fabrication'),
			'a_payer' => $this->input->post('prix')
		);

		
		try {
			
			$this->Vehicule->inscription_vehicule($data);
		} catch (Exception $e) {
			$exception = $e->getMessage();
			echo $e;
		}

		$this->session->unset_userdata('donnee_vehicule');

		echo json_encode(['assureur' => $data['id_assureur']]);

		
	}

	public function verifier_donnee() {

	}


	
}