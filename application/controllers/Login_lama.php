<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library(array('session', 'form_validation', 'upload', 'user_agent', 'email'));
        $this->load->helper(array('url', 'form', 'text', 'html', 'security', 'file', 'directory', 'number', 'date', 'download'));
        $this->load->model(array('m_login', 'M_kpimmingguan', 'app_model'));
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