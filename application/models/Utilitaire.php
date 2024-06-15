<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utilitaire extends CI_Model
{
    public function __construct() {
        $this->load->library('email');
        // $this->load->config('email');
    }
    public function generateCodeValidation()
    {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        $longueur = 7;
        for ($i = 0; $i < $longueur; $i++) {
            $code .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }
        return $code;
    }

    public function envoyer_email($email, $code)
    {
        // echo $email, $code;
		
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_user' => 'assuremassurem@gmail.com',  // Remplacez par votre adresse email
            'smtp_pass' => 'ptlimfezurdjdzjv',  // Remplacez par votre mot de passe
            'smtp_crypto' => 'tls',  // Ajoutez cette ligne pour STARTTLS
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE,
            'newline' => "\r\n"  // Assurez-vous d'utiliser des sauts de ligne corrects
        );
        $this->email->initialize($config);

        // Configurer et envoyer l'email
        $this->email->from('assuremassurem@gmail.com', 'Assur M');
        $this->email->to($email);
        $this->email->subject('Code de validation');
        $this->email->message($code);
        $this->email->send();
        // if ($this->email->send()) {
        //     echo 'Email sent.';
        // } else {
        //     echo 'Email failed to send.';
        //     show_error($this->email->print_debugger());
        // }
    }
}
