<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Post extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$data['title']='Meeting Scheduler - Halaman Utama';
			$data['menu']='dash_post';
			$data['content']='projectreminder/menu/content/post_dashboard';
			$this->load->view('projectreminder/menu/layout/wrapper',$data);
		}

		public function create()
		{
			$data['title']='Meeting Scheduler - Halaman Utama';
			$data['menu']='dash_post';
			$data['content']='projectreminder/menu/content/post_create';
			$this->load->view('projectreminder/menu/layout/wrapper',$data);
		}
	}
?>