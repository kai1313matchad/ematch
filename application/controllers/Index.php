<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model(array('M_pengumuman', 'M_kpimmingguan', 'app_model'));
        $this->load->library(array('session', 'form_validation', 'upload', 'user_agent', 'email'));
        $this->load->helper(array('url', 'form', 'text', 'html', 'security', 'file', 'directory', 'number', 'date', 'download'));
	}
	public function index()
	{
		$this->app_model->getLogin();

		if ($this->session->userdata('status') == 'Blokir' ) {
            $this->session->set_flashdata('message_name', 'Mohon maaf, Pengguna telah diblokir');
            redirect(base_url() . 'login/logoutblok', 'refresh');

        }


        if ($this->session->userdata('id_dept') == 'f' ) {
            redirect(base_url() . 'qcindex', 'refresh');
        }

        if ($this->session->userdata('level') == '12' ) {
            redirect(base_url() . 'home', 'refresh');
        }
        $data['notif'] = $this->M_pengumuman->notif()->result();
		$data['table'] = $this->M_pengumuman->getSatu()->result();
		$this->load->view('index', $data);

	}
}
