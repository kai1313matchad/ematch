<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qcindex extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model(array('M_qcindex', 'app_model'));
        $this->load->library(array('session', 'form_validation', 'upload', 'user_agent', 'email'));
        $this->load->helper(array('url', 'form', 'text', 'html', 'security', 'file', 'directory', 'number', 'date', 'download'));
	}
	public function index()
	{
		$this->app_model->getLogin();
		$data['recovering'] = $this->M_qcindex->getrecovering()->result();
		$data['pondasi'] = $this->M_qcindex->getpondasi()->result();
		$data['tiang'] = $this->M_qcindex->gettiang()->result();
		$data['konstruksi'] = $this->M_qcindex->getkonstruksi()->result();
		$data['penerangan'] = $this->M_qcindex->getpenerangan()->result();
		$this->load->view('t_index', $data);
	}
}
