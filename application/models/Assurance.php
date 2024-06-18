<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Assurance extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }                    

    public function get_by_id($id)
    {
        try {
            $query = $this->db->get_where('assurance', array('id' => $id));
            if (!$query) {
                throw new Exception("Erreur lors de la récupération de l'assurance");
            }
            return $query->row_array();
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }
}
