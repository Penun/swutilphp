<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Specializations extends MY_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('specialization_model');
        $this->load->model('talent_model');
	}

    public function index() {
        $this->load->view('main/main');
    }

    public function specialization() {
        $subm_data = json_decode(file_get_contents('php://input'), TRUE);
        $resp = $this->specialization_model->get_specialization($subm_data['id']);

        if ($resp === FALSE){
            $resp = [];
        }

        header('Content-Type: application/json');
        echo json_encode($resp);
    }

    public function skills() {
        $subm_data = json_decode(file_get_contents('php://input'), TRUE);
        $resp = $this->specialization_model->get_specialization_skills($subm_data['id']);

        if ($resp === FALSE){
            $resp = [];
        }

        header('Content-Type: application/json');
        echo json_encode($resp);
    }

    public function talents() {
        $subm_data = json_decode(file_get_contents('php://input'), TRUE);
        $resp = $this->specialization_model->get_specialization_talents($subm_data['id']);

        if ($resp === FALSE){
            $resp = [];
        }

        $talLen = count($resp);
        for ($i = 0; $i < $talLen; $i++){
            $resp[$i]['right'] = ($resp[$i]['right'] == "0") ? FALSE : TRUE;
            $resp[$i]['down'] = ($resp[$i]['down'] == "0") ? FALSE : TRUE;
        }

        header('Content-Type: application/json');
        echo json_encode($resp);
    }

    public function talent() {
        $subm_data = json_decode(file_get_contents('php://input'), TRUE);
        $resp = $this->talent_model->get_talent($subm_data['id']);

        if ($resp === FALSE){
            $resp = [];
        }

        $resp['ranked'] = ($resp['ranked'] == "0") ? FALSE : TRUE;

        header('Content-Type: application/json');
        echo json_encode($resp);
    }
}
