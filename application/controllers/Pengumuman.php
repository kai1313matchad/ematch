<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model(array('M_pengumuman', 'app_model', 'M_kpimmingguan', 'M_reportsub'));
        $this->load->library(array('session', 'form_validation', 'upload', 'user_agent', 'email','pagination'));
        $this->load->helper(array('url', 'form', 'text', 'html', 'security', 'file', 'directory', 'number', 'date', 'download', 'tgl_indo'));
	}
	public function index()
	{
		$this->app_model->getLogin();

		$data['table'] = $this->M_pengumuman->getAll()->result();
		$data['ambilsatu'] = $this->M_pengumuman->getSatu()->result();
		$this->load->view('tampil_pengumuman', $data);
	}


	public function datapengumuman()
	{

		$this->app_model->getLogin();
        if ($this->session->userdata('level') == 2 || $this->session->userdata('level') == 6 || $this->session->userdata('level') == 3 || $this->session->userdata('level') == 4) {
            // $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman Admin');
            redirect(base_url() . 'Pengumuman', 'refresh');

        }

		$this->app_model->getLogin();
		$data['table'] = $this->M_pengumuman->getData()->result();
		$this->load->view('tampil_datapengumuman', $data);
	}

	public function pengumumanku()
	{

		$this->app_model->getLogin();
        if ($this->session->userdata('level') == 2 || $this->session->userdata('level') == 10 || $this->session->userdata('level') == 11) {
            $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman Admin');
            redirect(base_url() . 'index', 'refresh');

        }
        $idku = $this->session->userdata('id_karyawan');
		$this->app_model->getLogin();
		$data['table'] = $this->M_pengumuman->getpengumumanku($idku)->result();
		$this->load->view('tampil_datapengumumanku', $data);
	}

	public function Addpengumuman(){
	$this->app_model->getLogin();

	$utkdept=$this->input->post('dept[]');
	if( $this->input->post('dept[]')==null ){
       $utkdept=array('15');
    }
    
    $tgl_post=date('Y-m-d H:i:s');
	$data = array(
	        'id_karyawan' => $this->session->userdata('id_karyawan'),
	        'judul_post' => $this->input->post('judul_pengumuman'),
	        'tgl_post' => $tgl_post,
	        'tujuan_post' => implode(",", $utkdept),
	        'isi_post' => $this->input->post('isi_pengumuman')
	    );

	    $this->M_pengumuman->get_insert($data);

	    redirect(base_url() . 'Pengumuman', 'refresh');


	}

	public function Editpengumuman($idpost){
	$this->app_model->getLogin();
	if( $this->input->post('dept[]')==null ){
		 $this->session->set_flashdata('message_name', 'Mohon Masukkan Tujuan Departement');
        redirect(base_url() . 'Pengumuman/datapengumuman', 'refresh');
    }

    $utkdept=$this->input->post('dept[]');
    $tgl_post=date('Y-m-d H:i:s');
	$data = array(
	        'id_karyawan' => $this->session->userdata('id_karyawan'),
	        'judul_post' => $this->input->post('judul_pengumuman'),
	        // 'tgl_post' => $tgl_post,
	        'tujuan_post' => implode(",", $utkdept),
	        'isi_post' => $this->input->post('isi_pengumuman')
	    );

	    $this->M_pengumuman->get_update($data, $idpost);

	    redirect(base_url() . 'Pengumuman/datapengumuman', 'refresh');


	}

	public function Editpengumumanku($idpost){
	$this->app_model->getLogin();
	if( $this->input->post('dept[]')==null ){
		 $this->session->set_flashdata('message_name', 'Mohon Masukkan Tujuan Departement');
        redirect(base_url() . 'Pengumuman/datapengumuman', 'refresh');
    }

    $utkdept=$this->input->post('dept[]');
    $tgl_post=date('Y-m-d H:i:s');
	$data = array(
	        'id_karyawan' => $this->session->userdata('id_karyawan'),
	        'judul_post' => $this->input->post('judul_pengumuman'),
	        // 'tgl_post' => $tgl_post,
	        'tujuan_post' => implode(",", $utkdept),
	        'isi_post' => $this->input->post('isi_pengumuman')
	    );

	    $this->M_pengumuman->get_update($data, $idpost);

	    redirect(base_url() . 'Pengumuman/pengumumanku', 'refresh');


	}

	public function hapus($idpost){
        $this->app_model->getLogin();
        $where = array('id_post' => $idpost);
        $this->M_pengumuman->delete($idpost);
        redirect(base_url() . 'Pengumuman/datapengumuman', 'refresh');
    }

    public function libur()
    {
        $this->app_model->getLogin();

        if ($this->session->userdata('id_dept') != 2 & $this->session->userdata('level') != 1 ) {
            $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman Ijin Karyawan');
            redirect(base_url() . 'Home', 'refresh');

        }
        $data['table'] = $this->M_pengumuman->ambil_libur()->result();
        $data['pesanku'] = $this->M_kpimmingguan->getpesanku()->result();
        $data['pesanmasuk'] = $this->M_kpimmingguan->getpesanmasuk()->result();
        $data['pesandept'] = $this->M_kpimmingguan->getpesandept()->result();

        $data['inboxblmbaca'] = $this->M_kpimmingguan->inboxblmbaca()->result();
        $data['noteblmbaca'] = $this->M_kpimmingguan->noteblmbaca()->result();
        $data['planblmbaca'] = $this->M_kpimmingguan->planblmbaca()->result();
        $data['noteplan'] = $this->M_kpimmingguan->noteplan()->result();

        $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();

        $keyjabatan = $this->session->userdata('id_karyawan');
        $data['jabatan'] = $this->M_reportsub->getJabatan($keyjabatan);

        $keydept = $this->session->userdata('id_karyawan');
        $data['dept'] = $this->M_kpimmingguan->getDept($keydept);

        $this->load->model(array('M_pilihkaryawan', 'app_model'));

        $data['ambilkaryawanall'] = $this->M_reportsub->ambilkaryawanall();
       $data['isidept'] = $this->M_pilihkaryawan->ambilDept();

       $gantinotif = array(
            
            'notif' => '0',
            
            );

        $this->M_kpimmingguan->notif_pesan($gantinotif, $keydept);

       //mulai dept

        $this->db->where('id_karyawan', $keydept);
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

        //tampilkan nama karyawan
        $key = $this->input->post('id');

        $this->db->where('id_karyawan', $keydept);
        $kueri = $this->db->get('karyawan');
        if($kueri->num_rows()>0)
        {
            foreach ($query->result() as $row) {
            $hak = $row->hak_akses;
            }
        }

        $hak_akses = explode(',', $hak);
        $this->db->where_in('dept', $key);
        $this->db->where_in('id_jabatan', $hak_akses);
        $kueri2 = $this->db->get('karyawan');

        if($kueri2->num_rows()>0)
        {
            

            $data['isinamakaryawan'] = $kueri2;
            

        }


        $this->load->view('tampil_libur',$data);

    }

    public function simpanlibur() {
        $this->app_model->getLogin();
        /*$this->form_validation->set_rules('tgl1', 'tgl1', 'required');
        $this->form_validation->set_rules('tgl2', 'tgl2', 'required');
        $this->form_validation->set_rules('tgl', 'tgl', 'required');
        $this->form_validation->set_rules('goals', 'goals', 'required');
        $this->form_validation->set_rules('action', 'action', 'required');
        $this->form_validation->set_rules('result', 'result', 'required');
        $this->form_validation->set_rules('deadline', 'deadline', 'required');*/

        // $tgl = $this->input->post('tgl');\
            date_default_timezone_set('Asia/Jakarta');
            $tgl = date("y-m-d");

            $start = $this->input->post('tglstart');
            $end = $this->input->post('tglend');

            // loop date
            $startDate = DateTime::createFromFormat("Y/m/d", date("Y/m/d", strtotime($start)));
            $endDate = DateTime::createFromFormat("Y/m/d", date("Y/m/d", strtotime($end)));

            $periodInterval = new DateInterval( "P1D" ); // 1-day, though can be more sophisticated rule
            $endDate->add( $periodInterval );
            $period = new DatePeriod( $startDate, $periodInterval, $endDate );


            foreach($period as $date){
               // echo $date->format("Y-m-d") , PHP_EOL;

                $data = array(
           
            'tgl' => $date->format("Y-m-d"),
            'kategori' => $this->input->post('status_libur'),
            'ket' => $this->input->post('keterangan'),
            );

        
            $this->M_pengumuman->tambah_libur($data);
           }
            // loop date       

        redirect(base_url() . 'pengumuman/libur', 'refresh');
    }

    public function hapuslibur($id_libur){
    	$this->app_model->getLogin();
    	$this->db->where('id_libur',$id_libur);
    	$this->db->delete('hari_libur');
    	redirect(base_url() . 'pengumuman/libur', 'refresh');
    }

    public function editlibur($id_libur){
    	$data = array(
        'tgl' => $this->input->post('tgl'),
        'kategori' => $this->input->post('status_libur'),
        'ket' => $this->input->post('keterangan')
		);

		$this->db->where('id_libur', $id_libur);
		$this->db->update('hari_libur', $data);
		redirect(base_url() . 'pengumuman/libur', 'refresh');
    }
}
