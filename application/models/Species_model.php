<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Species_model extends CI_Model {

    var $species_table = 'species';
    var $speAtt_table = 'spe_attribute';

    public function __construct() {
        parent::__construct();
    }

    public function get_species() {
        $this->db->order_by('name', 'asc');
        $result = $this->db->get($this->species_table);
        if ($result->num_rows() > 0){
            return $result->result_array();
        } else {
            return FALSE;
        }
    }

    public function get_species_id($sp_id) {
        $this->db->where('id', $sp_id);
        $result = $this->db->get($this->species_table);
        if ($result->num_rows() > 0){
            return $result->row_array();
        } else {
            return FALSE;
        }
    }

    public function get_species_attributes($sp_id) {
        $this->db->where('species_id', $sp_id);
        $result = $this->db->get($this->speAtt_table);
        if ($result->num_rows() > 0){
            return $result->result_array();
        } else {
            return FALSE;
        }
    }
}
