<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Crud extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('projectreminder/M_data');
		}

		function tambah_schedule()
		{
			$tema = $this->input->post('tema');
			$dept = $this->input->post('kodedept');	
			$tgl = date('Y-m-d',strtotime($this->input->post('tanggal')));
			$jam = $this->input->post('jam');	
		    $info = $this->input->post('info');	
		    $data = array(
					'SCH_TITLE' => $tema,
					'SCH_DEPT' => $dept,
					'SCH_DATE' => $tgl,
					'SCH_TIME' => $jam,
					'SCH_INFO' => $info
					);
			    $table = 'schedule';
				$this->M_data->input_data($data,$table);
				redirect('Post/create');
		}	

		function update_schedule()
		{
			$id = $this->input->post('id');
			$tema = $this->input->post('tema');
			$dept = $this->input->post('kodedept');	
			$tgl = date('Y-m-d',strtotime($this->input->post('tanggal')));
			$jam = $this->input->post('jam');	
		    $info = $this->input->post('info');	
		    $status = $this->input->post('status');	
		    $where =  array('SCH_ID' => $id);
		    $data = array(
					'SCH_TITLE' => $tema,
					'SCH_DEPT' => $dept,
					'SCH_DATE' => $tgl,
					'SCH_TIME' => $jam,
					'SCH_INFO' => $info,
                    'STATUS' =>  $status
					);
			$table='schedule';
			$this->M_data->update_data($where,$data,$table);
			redirect('Post/edit');
		}	

		function update_notulen()
		{
			$id = $this->input->post('id');
		    $hasil = $this->input->post('hasil');
		    $where =  array('SCH_ID' => $id);
		    $data = array(
					'SCHDT_INFO' => $hasil,
					);
			$table='schedule';
			$this->M_data->update_data($where,$data,$table);
			redirect('Post/notulen');
		}

		function tambah_reminder()
		{
			$nama = $this->input->post('nama');
			$jenis = $this->input->post('jenis');	
			$info = $this->input->post('info');
			$tgl = date('Y-m-d',strtotime($this->input->post('tanggal')));
			$email = $this->input->post('email');	
			$dept = $this->input->post('dept');
		    $data = array(
					'nama_reminder' => $nama,
					'jenis_reminder' => $jenis,
					'info_reminder' => $info,
					'tanggal_batas' => $tgl,
					'email_atasan' => $email,
					'dept' => $dept
					);
			    $table = 'reminder';
				$this->M_data->input_data($data,$table);
				redirect('projectreminder/Reminder/create');
		}

		function ubah_reminder()
		{
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$jenis = $this->input->post('jenis');	
			$info = $this->input->post('info');
			$tgl = date('Y-m-d',strtotime($this->input->post('tanggal')));
			$email = $this->input->post('email');	
			$dept = $this->input->post('dept');
			$where=array('id' => $id);
		    $data = array(
					'nama_reminder' => $nama,
					'jenis_reminder' => $jenis,
					'info_reminder' => $info,
					'tanggal_batas' => $tgl,
					'email_atasan' => $email,
					'dept' => $dept
					);
			    $table = 'reminder';
				$this->M_data->update_data($where,$data,$table);
				redirect('projectreminder/Reminder/edit_reminder');
		}

		function tambah_jenis()
		{
			$nama = $this->input->post('nama');
			$keterangan = $this->input->post('keterangan');	
		    $data = array(
					'nama_jenis' => $nama,
					'keterangan' => $keterangan,
					);
			    $table = 'jenis_reminder';
				$this->M_data->input_data($data,$table);
				redirect('projectreminder/Reminder/create_jenis');
		}

		function ubah_jenis()
		{
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$keterangan = $this->input->post('keterangan');	
			$where=array('id' => $id);
		    $data = array(
					'nama_jenis' => $nama,
					'keterangan' => $keterangan,
					);
			    $table = 'jenis_reminder';
				$this->M_data->update_data($where,$data,$table);
				redirect('projectreminder/Reminder/edit_jenis_reminder');
		}
	}
?>