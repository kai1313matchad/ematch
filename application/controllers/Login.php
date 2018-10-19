<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library(array('session', 'form_validation', 'upload', 'user_agent', 'email'));
        $this->load->helper(array('url', 'form', 'text', 'html', 'security', 'file', 'directory', 'number', 'date', 'download'));
        $this->load->model(array('m_login', 'M_kpimmingguan', 'app_model', 'M_kpimmingguannext'));
        // $this->load->model('m_login', 'M_kpimmingguan');
	}

	public function index(){
		// $key = $this->session->userdata('id_karyawan');

        

		$logged_in = $this->session->userdata('logged_in');
        if($logged_in){
            redirect("index");
        }else{
        	//UNTUK UPDATE OTOMATIS
	        $updateauto = array(
	             'id_status' => 2,
	             'sdh_send' => 1,
	            );
	        $this->M_kpimmingguan->updateauto($updateauto);
	        //UNTUK UPDATE OTOMATIS end


	        // mulai fungsi entri ke kpim
	        // date_default_timezone_set('Asia/Jakarta');
	        // $data_entri = $this->db->get_where('kpim_next', array('tgl' => date('Y-m-d'), 'id_status' => '1'))->result();

	        // foreach ($data_entri as $entri) {
	            
	        //     $tgl = $entri->tgl;
	        //     $dead = $entri->deadline;

	        //     if ($dead < $tgl ) {
	        //         $status_dead = 3;
	        //     }
	        //     elseif ($dead > $tgl ) {
	        //         $status_dead = 1;   
	        //     }
	        //     elseif ($dead == $tgl ) {
	        //         $status_dead = 2;   
	        //     }


	        //     if ($entri->bobot == '') {
	        //         $bobot = '7';
	        //     }
	        //     else{
	        //         $bobot = $entri->bobot;
	        //     }


	        //     $isi = array(
	        //         'id_karyawan' => $entri->id_karyawan,
	        //         'tgl' => $entri->tgl,
	        //         'nama_goals' => $entri->nama_goals,
	        //         'action' => $entri->action,
	        //         'deadline' => $entri->deadline,
	        //         'tgs_dept' => $entri->tgs_dept,
	        //         'status_deadline' => $status_dead,
	        //         'bobot' => $bobot,
	        //         'id_status' => '1',
	        //         'target' => '10',
	        //         'usulnilai' => '0',
	        //     );
	        //     $this->M_kpimmingguan->get_insert($isi);
	        // }
	        // selesai fungsi entri ke kpim




	        // untuk plan otomatis
	        // $updateautoplan = array(
	        // 	'id_status' => 2
	        // );
	        // $this->M_kpimmingguannext->updateautoplan($updateautoplan);
	        // untuk plan

            $this->load->view('login');
        } 
        
		//$this->load->view('admin/v_login');
	}

	public function getLogin(){
		
		$this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
           	$u = $this->input->post('username');// menampung isian username dari view login
			$p = $this->input->post('password'); //menampung isian password dari view login
			$v = $this->input->post('visit');

			if ($v) {
				$user = $this->m_login->getLogin($u, $p, $v);
			}

			$user = $this->m_login->getLogin($u,$p);//mengakses file m_login dan memberikan nilai user dan password 
        }
        else {
        	redirect("login");
        }		
	}

	//fungsi buat logout aplikasi
	public function logoutblok()
	{
		// $this->session->sess_destroy('logged_in');
		$this->session->unset_userdata('logged_in');
		if ($this->session->userdata('status') == 'Blokir' ) {
            $this->session->set_flashdata('message_name', 'Mohon maaf, Pengguna telah diblokir');
            // redirect(base_url() . 'login/logout', 'refresh');

        }
		redirect('login');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	public function home()
	{
        $this->load->view('tampilan_login');
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */