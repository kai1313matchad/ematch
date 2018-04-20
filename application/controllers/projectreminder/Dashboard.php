<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Dashboard extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$data['title']='Meeting Scheduler - Halaman Utama';			
			$data['menu']='dashboard';			
			$data['content']='projectreminder/menu/content/dashboard';
			$this->load->view('projectreminder/menu/layout/wrapper',$data);
		}

		public function resources()
		{
			$event = $this->db->get('schedule')->result();
			$data_events = array();
			foreach($event as $dt)
			{
				$data_events[] = array(
								"id" => $dt->SCH_ID,
								"title" => $dt->SCH_TITLE,
								"start" => $dt->SCH_DATE.'T'.$dt->SCH_TIME
				);
			}
	        echo json_encode(array("events"=>$data_events));
		}
	}
?>