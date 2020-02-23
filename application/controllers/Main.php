<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

    public function index() {
        header('Location: '.$this->config->item('base_url').'/index.php/species');
    }

	public function species() {
		$this->load->view('main/main');
	}
}
