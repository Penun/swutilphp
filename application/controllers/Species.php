<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Species extends MY_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('species_model');
	}

    public function index() {
		$resp = $this->species_model->get_species();

        if ($resp === FALSE){
            $resp = [];
        }

        header('Content-Type: application/json');
        echo json_encode($resp);
    }

	public function species_id() {
		$subm_data = json_decode(file_get_contents('php://input'), TRUE);
        $resp = $this->species_model->get_species_id($subm_data['id']);

        if ($resp === FALSE){
            $resp = [];
        }

        header('Content-Type: application/json');
        echo json_encode($resp);
	}

	public function attributes() {
		$subm_data = json_decode(file_get_contents('php://input'), TRUE);
        $resp = $this->species_model->get_species_attributes($subm_data['id']);

        if ($resp === FALSE){
            $resp = [];
        }

        header('Content-Type: application/json');
        echo json_encode($resp);
	}
}
