<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	var $form_rules = array();

    public function __construct() {
        parent::__construct();
		$this->load->helper('form');
        $this->load->library('Auth');
		$this->_populate_form_rules();
    }

	public function index() {
        if ($this->auth->is_logged_in()){
           header('Location: '.$this->config->item('base_url').'/index.php/species');
			return;
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->form_rules['login']);
		$data['error'] = '';
        if ($this->form_validation->run() === FALSE){
			$this->load->view('login', $data);
		} else {
			$username = $this->input->post('user_name');
			$password = $this->input->post('password');
			$user = $this->auth->login($username, $password);
			if($user !== FALSE) {
				header('Location: '.$this->config->item('base_url').'/index.php/species');
            } else {
				$data['error'] = 'Incorrect login information.';
				$this->load->view('login', $data);
			}
        }
    }

	public function logout(){
		$this->auth->verify();
		if ($this->auth->is_logged_in()){
			$this->auth->logout();
			$resp['success'] = TRUE;
			$resp['error'] = '';
		}
	}

    private function _populate_form_rules() {
		$this->form_rules = array(
			'login'=>array(
				array(
					'field'=>'user_name',
					'label'=>'Username',
					'rules'=>'required|trim'
				),
				array(
					'field'=>'password',
					'label'=>'Password',
					'rules'=>'required|trim'
				)
			)
		);
	}
}
