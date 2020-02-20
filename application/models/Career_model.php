<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Career_model extends CI_Model {

    var $career_table = 'career';
    var $spec_table = 'specialization';
    var $skill_table = 'skill';
    var $carSpec_table = 'career_spec';
    var $carSkill_table = 'career_skill';

    public function __construct() {
        parent::__construct();
    }

    public function get_careers() {
        $result = $this->db->get($this->career_table);
        if ($result->num_rows() > 0){
            return $result->result_array();
        } else {
            return FALSE;
        }
    }

    public function get_career($C_id) {
        $this->db->where('id', $C_id);
        $result = $this->db->get($this->career_table);
        if ($result->num_rows() > 0){
            return $result->row_array();
        } else {
            return FALSE;
        }
    }

    public function get_career_specializations($car_id) {
        $this->db->select($this->spec_table.'.id');
        $this->db->select($this->spec_table.'.name');
        $this->db->select($this->spec_table.'.subtitle');
        $this->db->select($this->spec_table.'.skill_slots');
        $this->db->from($this->spec_table);
        $this->db->join($this->carSpec_table, $this->carSpec_table.'.specialization_id = '.$this->spec_table.'.id');
        $this->db->where($this->carSpec_table.'.career_id', $car_id);
        $result = $this->db->get();

        if ($result->num_rows() > 0){
            return $result->result_array();
        } else {
            return FALSE;
        }
    }

    public function get_career_skills($car_id) {
        $this->db->select('*');
        $this->db->from($this->skill_table);
        $this->db->join($this->carSkill_table, $this->carSkill_table.'.skill_id = '.$this->skill_table.'.id');
        $this->db->where($this->carSkill_table.'.career_id', $car_id);
        $result = $this->db->get();

        if ($result->num_rows() > 0){
            return $result->result_array();
        } else {
            return FALSE;
        }
    }
}
