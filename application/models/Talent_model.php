<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Talent_model extends CI_Model {

    var $talent_table = 'talent';

    public function __construct() {
        parent::__construct();
    }

    public function get_talent($t_id) {
        $this->db->where('id', $t_id);
        $result = $this->db->get($this->talent_table);
        if ($result->num_rows() > 0){
            return $result->row_array();
        } else {
            return FALSE;
        }
    }
}
