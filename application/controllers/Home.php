<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model(array('M_kpimmingguan', 'app_model'));
        $this->load->library(array('session', 'form_validation', 'upload', 'user_agent', 'email'));
        $this->load->helper(array('url', 'form', 'text', 'html', 'security', 'file', 'directory', 'number', 'date', 'download'));
	}
	public function index()
	{
		 if ($this->session->userdata('id_dept') == 'f' ) {
            redirect(base_url() . 'recovering', 'refresh');
        }
		$this->app_model->getLogin();
		$data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
		$this->load->view('home_kpim', $data);
	}
}
