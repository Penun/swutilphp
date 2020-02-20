<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Careers extends MY_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('career_model');
	}

    public function index() {
        $this->load->view('main/main');
    }

    public function list() {
        $resp = $this->career_model->get_careers();

        if ($resp === FALSE){
            $resp = [];
        }

        header('Content-Type: application/json');
        echo json_encode($resp);
    }

	public function career() {
		$subm_data = json_decode(file_get_contents('php://input'), TRUE);
        $resp = $this->career_model->get_career($subm_data['id']);

        if ($resp === FALSE){
            $resp = [];
        }

        header('Content-Type: application/json');
        echo json_encode($resp);
	}

    public function specializations() {
        $subm_data = json_decode(file_get_contents('php://input'), TRUE);
        $resp = $this->career_model->get_career_specializations($subm_data['id']);

        if ($resp === FALSE){
            $resp = [];
        }

        header('Content-Type: application/json');
        echo json_encode($resp);
    }

    public function skills() {
		$subm_data = json_decode(file_get_contents('php://input'), TRUE);
        $resp = $this->career_model->get_career_skills($subm_data['id']);

        if ($resp === FALSE){
            $resp = [];
        }

        header('Content-Type: application/json');
        echo json_encode($resp);
    }
}
