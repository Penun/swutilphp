<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends MY_Controller {

	public function __construct() {
		parent::__construct();
        //$this->load->model('species_model');
	}

    public function index() {
        header('Location: '.$this->config->base_url().'index.php/species');
    }

	public function species() {
		$this->load->view('main/main');
	}
}
