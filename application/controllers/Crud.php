<?php 

    defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller{
	public function login_user()
	{
		//fungsi login
		$valid = $this->form_validation;
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$valid->set_rules('username','Username','required');
		$valid->set_rules('password','Password','required');
		if($valid->run())
		{
			$this->simple_login->login($username,$password);
		}
	}
	
	//logout disini
	public function logout()
	{
		$this->simple_login->logout();
	}

	public function __construct() {
        date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
        $this->load->model(array('M_data', 'M_kpimmingguan', 'M_pilihkaryawan', 'app_model'));
        $this->load->library(array('session', 'form_validation', 'upload', 'user_agent', 'email'));
        $this->load->helper(array('url', 'form', 'text', 'html', 'security', 'file', 'directory', 'number', 'date', 'download', 'tgl_indo'));
	}
    

	// function __construct(){
	// 	parent::__construct();		
	// 	$this->load->model('M_data');
 //                $this->load->helper('url');
 //                $this->load->library('email');
	// }
 
	public function index(){
	    $table='dataproject';
	    $where= '(((project_end <= DATE_ADD(NOW(), INTERVAL 14 DAY)) and (status="Belum Selesai")) or ((project_end <= DATE_ADD(NOW(), INTERVAL 14 DAY)) and (status="PENDING")))';
	    $data = array(
	              'ket' => 'OVERTIME'
	            );
	    $where1='((project_end > NOW()) and (status="Belum Selesai"))';
	    $this->M_data->update_data($where1,$data,$table);
		$data['dataproject'] = $this->M_data->tampil_data_warning($where,$table)->result();
		$this->load->view('tb_index',$data);
	}

	function home(){
		$this->app_model->getLogin();
		if ($this->session->userdata('level') == '5' ) {
            redirect(base_url() . 'crud/update', 'refresh');
        }
	    $table='dataproject';
	    // $id = $this->session->userdata('id_karyawan');
	    // $dep=$this->M_data->getDepartDt($id);
	    // $deptnya = $this->session->userdata('id_karyawan');

	    // $deptbaru = $this->M_kpimmingguan->ambilDept($id)->result();
		// foreach ($deptbaru->result() as $row) { 
		// $row->deptini;
		// }

		$id = $this->session->userdata('id_karyawan');
		$dept = $this->M_kpimmingguan->getDept($id);
		foreach ($dept->result() as $row) {
			$deptnya2 = $row->deptini;
		}
		$data['tiga'] = $deptnya2;
		$data['deptnya'] = $dept;
		
		// $data['deptku'] = $this->M_kpimmingguan->getDept($id);

		$deptnya = $this->session->userdata('id_dept');
		$depts=explode(",", $deptnya);
		$data['isidept'] = $deptnya;
		
	  
	    // $where= '(((project_end <= DATE_ADD(NOW(), INTERVAL 7 DAY) AND project_end >= NOW()) and (status="")) or ((project_end <= DATE_ADD(NOW(), INTERVAL 7 DAY) AND project_end >= NOW()) and (status="PENDING")) or ((project_end <= DATE_ADD(NOW(), INTERVAL 7 DAY) AND project_end >= NOW()) ))';
	    // $depts=explode(",", $deptbaru->deptini);
	    $data['dataproject'] = $this->M_data->tampil_data_warning2($depts, $table)->result();

		$this->load->view('tb_home',$data);
	}
	
	function login(){
	    $this->load->view('tb_login');
	}
	
	function tambah(){
		$this->app_model->getLogin();
		if ($this->session->userdata('level') == '5' ) {
            redirect(base_url() . 'crud/update', 'refresh');
        }
        if ($this->session->userdata('level') == '2' || $this->session->userdata('level') == '10' || $this->session->userdata('level') == '11' ) {
        	$this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat input project');
            redirect(base_url() . 'crud/home', 'refresh');
        }
	    $table='dataproject';
	    $deptnya = $this->session->userdata('id_dept');
		$depts=explode(",", $deptnya);
		$data['isidept'] = $this->M_pilihkaryawan->ambilDept();

		//mulai tampilkan dept
		$id = $this->session->userdata('id_karyawan');
        $this->db->where('id_karyawan', $id);
        $query = $this->db->get('karyawan');
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row) {
            $dept = $row->dept;
            }
        }

        $id_dept = explode(',', $dept);
        $this->db->where_in('id_dept', $id_dept);
        $query2 = $this->db->get('dept');

        if($query2->num_rows()>0)
        {
            $data['isinamadept'] = $query2;      
        }
        //selesai tampilkan dept

	    // $id= $this->session->userdata('id');
	    // $dep=$this->M_data->getDepartDt($id);
	    // $depts=explode(",", $dep->dept);
	    $data['dataproject'] = $this->M_data->tampil_data_dept($depts,$table)->result();
		$this->load->view('tb_transaksi',$data);
	}
	
	function tambah_aksi(){
		$this->app_model->getLogin();
		$project = $this->input->post('namaproject');
		$dept = $this->input->post('dept');
		$start = date('Y-m-d',strtotime($this->input->post('start')));
        $end = date('Y-m-d',strtotime($this->input->post('end')));
        $pic = $this->input->post('pic');
        $cab = $this->input->post('cabang');
        $progress = $this->input->post('progress');
        $statusku = 'Belum Selesai';
        //$email = $this->input->post('email');
        $id= $this->session->userdata('id');
        $email= $this->session->userdata('email');
		$data = array(
			'project' => $project,
			'dept' => $dept,
			'project_start' => $start,
			'project_end' => $end,
			'pic' => $pic,
			'progress' => $progress,
			'cabang' => $cab,
			'alamat_email'  => $email,
			'status' => $statusku
			);
	    $table = 'dataproject';
		$this->M_data->input_data($data,$table);
		redirect('Crud/tambah');
	}
	
	function update_aksi_project(){
		$id = $this->input->post('id');
	    $where =  array('id' => $id);
	    $project1 = $this->input->post('namaproject1');
		$dept1 = $this->input->post('dept1');
		$pic1 = $this->input->post('pic1');
        $cab1 = $this->input->post('cab1');
        $progress1 = $this->input->post('progress1');
        $data = array(
			'id' => $id,
			'project' => $project1,
			'dept' => $dept1,
			'pic' => $pic1,
			'cabang' => $cab1,
			'progress' => $progress1
			);
		$table = 'dataproject';
		$this->M_data->update_data($where,$data,$table);
		$this->session->set_flashdata('message_name', 'Data Berhasil diupdate');
	
		redirect('Crud/tambah');
	}
	
	function update(){
		$this->app_model->getLogin();
		if ($this->session->userdata('level') != 5 AND $this->session->userdata('level') != 1) {
			$this->session->set_flashdata('message_name', 'Mohon maaf Anda tidak dapat masuk halaman BOD');
            redirect(base_url() . 'crud/home', 'refresh');
        }

		$data['isidept'] = $this->M_pilihkaryawan->ambilDept();
	    $table='dataproject';
	    $data['dataproject'] = $this->M_data->tampil_data($table)->result();
		$this->load->view('tb_transaksi_direktur',$data);
	}
	
	function update_aksi(){
	    $id = $this->input->post('id');
	    $where =  array('id' => $id);
	    $peringatan = $this->input->post('peringatan');
	    $status = $this->input->post('status');
	    $reward = $this->input->post('reward');
	    date_default_timezone_set("Asia/Jakarta");
	    $tgl_acc = date('Y-m-d');

	    $dead = $this->input->post('tgl_end');

	    if ($dead < $tgl_acc ) {
	        $status_dead = 'OVERTIME';
	    }
	    elseif ($dead > $tgl_acc ) {
	        $status_dead = 'INTIME';   
	    }
	    elseif ($dead == $tgl_acc ) {
	        $status_dead = 'ONTIME';   
	    }

	    if($status == 'PENDING'){
	    	$status_dead = 'PENDING'; 
	    }

	    $data = array(
			'id' => $id,
			'status' => $status,
			'peringatan' => $peringatan,
			'reward' => $reward,
			'approved' =>1,
			'tgl_acc' => $tgl_acc,
			'ket' => $status_dead
			);
		$table = 'dataproject';
		$this->M_data->update_data($where,$data,$table);
		$this->session->set_flashdata('message_name', 'Data Project berhasil diAcc');
		redirect('Crud/update');
	}
	
	function update_project(){
	    $table='dataproject';
	    $data['dataproject'] = $this->M_data->tampil_data($table)->result();
		$this->load->view('tb_transaksi_update',$data);
	}
	
	function hapus_project(){
		$this->app_model->getLogin();
        if ($this->session->userdata('level') != 5 AND $this->session->userdata('level') != 1) {
			$this->session->set_flashdata('message_name', 'Mohon maaf Anda tidak dapat masuk halaman BOD');
            redirect(base_url() . 'crud/home', 'refresh');
        }
		$data['isidept'] = $this->M_pilihkaryawan->ambilDept();
	    $table='dataproject';
		$data['dataproject'] = $this->M_data->tampil_data($table)->result();
		$this->load->view('tb_hapus_project',$data);
	}
	
	function hapus_project_aksi(){
	     $id=$this->uri->segment(3);
	     $this->M_data->delPrj($id);
	     redirect ('Crud/hapus_project?sts=deletesukses');
	}
	
	function cari_data(){
		$this->app_model->getLogin();
		$data['isidept'] = $this->M_pilihkaryawan->ambilDept();
	    $table = 'dataproject';
	    $spe1  = 'dept';
	    $spe2  = 'cabang'; 
	    $search1 = $this->input->post('dept');
	    $search2 = $this->input->post('cabang');
	    $data['dataproject'] = $this->M_data->search_data($table,$spe1,$spe2,$search1,$search2);
		$this->load->view('tb_transaksi_direktur',$data);
	}
	
	
	
	function send_email($id) {
	    
	    $config = array();
        $config['protocol'] = 'smtp';
        //$config['smtp_host'] = 'ssl://e-matchad.com';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        //$config['smtp_user'] = 'timetable@e-matchad.com';
        $config['smtp_user'] = 'hrd@match-advertising.com';
        //$config['smtp_pass'] = 'Rahasia2017';
        $config['smtp_pass'] = 'rahasia2014';
        $config['smtp_port'] = 465;
        $this->email->initialize($config);
 
        $get = $this->db->get_where('dataproject', array('id' => $id))->result();
        foreach($get as $data) {
               if ($data->tgl_email <> date('Y-m-d')) {    
                   $this->email->set_newline("\r\n");
	               $this->email->to($data->alamat_email);
                   $this->email->from('timetable@e-matchad.com','New Time Table');
                   $this->email->subject('Peringatan Mendekati Akhir Jatuh Tempo Project');
                   $this->email->message('Harap segera melakukan acc Project Yang sudah selesai nama projectnya: ' . $data->project);
                   $this->email->send();
               }
         $where =  array('id' => $id);
         $data = array(
			           'id' => $id,
			           'tgl_email' => date('Y-m-d'),
			          );
		 $table = 'dataproject';
		 $this->M_data->update_data($where,$data,$table);	          
        }
 
        
	}
	function data_user(){
	    $table='users';
	    $data['dataproject'] = $this->M_data->tampil_data($table)->result();
		$this->load->view('tb_data_user',$data);
	}
	
	function tambah_user(){
	    $table='users';
	    $data['dataproject'] = $this->M_data->tampil_data($table)->result();
		$this->load->view('tb_tambah_user',$data);
	}
	
	function tambah_user_aksi(){
		$nama = $this->input->post('nama');
		$namauser = $this->input->post('username');
		$password = $this->input->post('pass');
		$mail = $this->input->post('mail');
		$dept = $this->input->post('dept[]');
		$hakakses = $this->input->post('hakakses');
        $status = $this->input->post('status');
		$data = array(
			'nama' => $nama,
			'username' => $namauser,
			'password' => $password,
			'mail' => $mail,
			'dept' => implode(",",$dept),
			'hakakses' => $hakakses,
			'status' => $status
			);
	    $table = 'users';
		$this->M_data->input_data($data,$table);
		redirect('Crud/tambah_user');
	}
	
	function ubah_user(){
	    $id=$this->uri->segment(3);
	    $data['usr']=$this->M_data->getUsrUpDt($id);
		$data['dep']=$this->M_data->getDepartDt($id);
		//$data['aks']=$this->M_data->getAccDt($id);
	    $table='users';
	    $data['dataproject'] = $this->M_data->tampil_data($table)->result();
		$this->load->view('tb_ubah_user',$data);
	}
	
	function ubah_user_aksi(){
	    $id= $this->input->post('id');
	    $where =  array('id' => $id);
	    $nama = $this->input->post('nama');
		$namauser = $this->input->post('username');
		$password = $this->input->post('pass');
		$mail = $this->input->post('mail');
		$dept = $this->input->post('dept[]');
		$hakakses = $this->input->post('hakakses');
        $status = $this->input->post('status');
		$data = array(
			'nama' => $nama,
			'username' => $namauser,
			'password' => $password,
			'mail' => $mail,
			'dept' => implode(",",$dept),
			'hakakses' => $hakakses,
			'status' => $status
			);
	    $table = 'users';
		$this->M_data->update_data($where,$data,$table);
		redirect('Crud/data_user');
	}
	
	function hapus_user(){
	     $id=$this->uri->segment(3);
	     $this->M_data->delUsr($id);
	     redirect ('Crud/data_user?sts=deletesukses');
	}
	
	public function menu_ChgPass()
	{
			$id=$this->session->userdata('id');
			$data['title']='Halaman Admin';
			$data['isi']='menu/admin/admChgPass_View';
			$data['usrdt']=$this->M_data->getUsrDt($id);
			$this->load->view('tb_ganti_pass',$data);
	}
		
	public function chgPass()
	{
			$id=$this->session->userdata('id');
			$this->form_validation->set_rules('passbaru','Password Baru','required');
			
			if($this->form_validation->run() === FALSE)
			{
				$this->menu_ChgPass();
			}
			else
			{
				$pass=$this->input->post('passbaru');
				$result=$this->M_data->upd_Pass($id,$pass);
				if($result == '0')
				{
					$data["msg"]='<div class="col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>Data Gagal Diubah</div></div>';
				}
				else
				{
					$data["msg"]='<div class="col-lg-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>Data Sukses Diubah</div></div>';
				}
				$this->load->vars($data);
				$this->menu_ChgPass();
			}
	}
}