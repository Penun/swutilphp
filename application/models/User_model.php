<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {

    var $user_table = 'user';

    public function __construct() {
        parent::__construct();
    }

    public function get_user($user) {
        $this->db->where('user', $user);
        $result = $this->db->get($this->user_table);
        if ($result->num_rows() > 0){
            return $result->row_array();
        } else {
            return FALSE;
        }
    }

    public function add_user($username, $password, $level = 1){
        $data = array(
            'user' => $username,
            'password' => $password,
            'level' => $level
        );
        return $this->db->insert('user', $data);
    }
}
