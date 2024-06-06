<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utilitaire extends CI_Model
{
    public function generateCodeValidation()  {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$code = '';
        $longueur = 7;
    	for ($i = 0; $i < $longueur; $i++) {
        	$code .= $caracteres[rand(0, strlen($caracteres) - 1)];
    	}
        return $code;
    }
}