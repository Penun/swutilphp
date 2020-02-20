<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Specialization_model extends CI_Model {

    var $spec_table = 'specialization';
    var $skill_table = 'skill';
    var $talent_table = 'talent';
    var $specSkill_table = 'spec_skill';
    var $specTale_table = 'spec_talent';

    public function __construct() {
        parent::__construct();
    }

    public function get_specialization($s_id) {
        $this->db->where('id', $s_id);
        $result = $this->db->get($this->spec_table);
        if ($result->num_rows() > 0){
            return $result->row_array();
        } else {
            return FALSE;
        }
    }

    public function get_specialization_skills($s_id){
        $this->db->select('*');
        $this->db->from($this->skill_table);
        $this->db->join($this->specSkill_table, $this->specSkill_table.'.skill_id = '.$this->skill_table.'.id');
        $this->db->where($this->specSkill_table.'.specialization_id', $s_id);
        $result = $this->db->get();

        if ($result->num_rows() > 0){
            return $result->result_array();
        } else {
            return FALSE;
        }
    }

    public function get_specialization_talents($s_id){
        $this->db->select($this->talent_table.'.id');
        $this->db->select($this->talent_table.'.name');
        $this->db->select($this->specTale_table.'.right');
        $this->db->select($this->specTale_table.'.down');
        $this->db->from($this->talent_table);
        $this->db->join($this->specTale_table, $this->specTale_table.'.talent_id = '.$this->talent_table.'.id');
        $this->db->where($this->specTale_table.'.specialization_id', $s_id);
        $result = $this->db->get();

        if ($result->num_rows() > 0){
            return $result->result_array();
        } else {
            return FALSE;
        }
    }
}
