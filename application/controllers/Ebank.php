<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Ebank extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('projectreminder/M_data','M_data');
			$this->load->library(array('session', 'form_validation', 'upload', 'user_agent', 'email'));
		}

		public function index()
		{
			$isiedept = $this->session->userdata('id_dept');
			$match = 'b';
			$kct = 'z';
			$wpi = 'o';

			$pos1 = strpos($isiedept, $match);
			$pos2 = strpos($isiedept, $kct);
			$pos3 = strpos($isiedept, $wpi);
			// $pos4 = strpos($isiedept, $finance);

			if ($pos1 === false AND $pos2 === false AND $pos3 === false) {

				$this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman E-Bank');
		        redirect(base_url().'index', 'refresh');

			} else {

				$data['dept'] = $this->session->userdata('id_dept');
				$data['title']='E-Filling - Halaman Utama';
				// $data['menu']='dash_reminder';
				// $data['content']='projectreminder/menu/content/reminder_dashboard';
				$this->load->view('home_ebank',$data);
			}   	
		}
	}
?>