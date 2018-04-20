<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model(array('M_laporan', 'M_kpimmingguan', 'app_model', 'M_pengumuman'));
        $this->load->library(array('session', 'form_validation', 'upload', 'user_agent', 'email'));
        $this->load->helper(array('url', 'form', 'text', 'html', 'security', 'file', 'directory', 'number', 'date', 'download', 'tgl_indo'));
	}

	public function index()
	{
   $this->app_model->getLogin();
        if ($this->session->userdata('level') == 2 || $this->session->userdata('level') == 6 || $this->session->userdata('level') == 3 || $this->session->userdata('level') == 4) {
            $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman Admin');
            redirect(base_url() . 'Home', 'refresh');

        }

        $batas = 5;
        $batas2 = 27;
        $sekarang = date('d');

        

        $batas = 5;
        $batas2 = 27;
        $sekarang = date('d');

        if($sekarang < $batas) { 
            // lama
            // $tglstart = date("Y-m-26", strtotime("-2 month", now()));
            // $tglend = date("Y-m-25", strtotime("-1 month", now()));

            // baru
            $tglstart = date('Y-m-d', strtotime(date('Y-m-26')." -2 month"));
            $tglend = date('Y-m-d', strtotime(date('Y-m-25')." -1 month"));
            $periode = "Laporan Periode Bulan Lalu :";
        }

        elseif ($sekarang >= $batas2) {
            // lama
            // $tglstart = date("Y-m-26", strtotime("-1 month", now()));
            // $tglend = date("Y-m-25", strtotime("today", now()));

            // baru
            $tglstart = date('Y-m-d', strtotime(date('Y-m-26')." -1 month"));
            $tglend = date('Y-m-d', strtotime(date('Y-m-25')." today"));

            $periode = "Laporan Periode Bulan ini :";
        }

        else {
            // lama
            // $tglstart = date("Y-m-26", strtotime("-1 month", now()));
            // $tglend = date("Y-m-d", strtotime("-2 day", now()));

            // baru
            $tglstart = date('Y-m-d', strtotime(date('Y-m-26')." -1 month"));
            $tglend = date('Y-m-d', strtotime(date('Y-m-d')." -2 day"));
            $periode = "Laporan Periode Bulan ini :";
        }

        $libur = $this->input->post('libur');


        $data['table'] = $this->M_laporan->ambilsemua()->result();
        $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        $data['semua'] = $this->M_laporan->ambiluntuklaporan($tglstart, $tglend)->result();

        $keyjabatan = $this->session->userdata('id_karyawan');
        $data['jabatan'] = $this->M_kpimmingguan->getJabatan($keyjabatan);

        $keydept = $this->session->userdata('id_karyawan');
        $data['dept'] = $this->M_kpimmingguan->getDept($keydept);

        $data['tglstart'] = $tglstart;
        $data['tglend'] = $tglend;
        $data['libur'] = $libur;
        

        $this->load->view('tampil_laporanentry',$data);
	}

    
    public function berinilai(){
        $this->app_model->getLogin();
        if ($this->session->userdata('level') == 2 || $this->session->userdata('level') == 6 || $this->session->userdata('level') == 3 || $this->session->userdata('level') == 4) {
            $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman Admin');
            redirect(base_url() . 'Home', 'refresh');

        }

         if( $this->input->post('tglstart')==null  & $this->input->post('tglend')==null){
            redirect(base_url() . 'Laporan', 'refresh');
         }

        $tglstart = $this->input->post('tglstart');
        $tglend = $this->input->post('tglend');
        $libur = $this->input->post('libur');
        

        $data['semua'] = $this->M_laporan->ygdipilih($tglstart, $tglend)->result();

        $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();

        $keyjabatan = $this->session->userdata('id_karyawan');
        $data['jabatan'] = $this->M_kpimmingguan->getJabatan($keyjabatan);

        $keydept = $this->session->userdata('id_karyawan');
        $data['dept'] = $this->M_kpimmingguan->getDept($keydept);

        $data['tglstart'] = $tglstart;
        $data['tglend'] = $tglend;
        $data['libur'] = $libur;
        

        $this->load->view('tampil_laporanentry',$data);

    }

    public function entry(){
        $this->app_model->getLogin();
       
        date_default_timezone_set('Asia/Jakarta');

       
        $batas = 5;
        $batas2 = 27;
        $sekarang = date('d');

        if($sekarang < $batas) { 
            // lama
            // $tglstart = date("Y-m-26", strtotime("-2 month", now()));
            // $tglend = date("Y-m-25", strtotime("-1 month", now()));

            // baru
            $tglstart = date('Y-m-d', strtotime(date('Y-m-26')." -2 month"));
            $tglend = date('Y-m-d', strtotime(date('Y-m-25')." -1 month"));
            $periode = "Laporan Periode Bulan Lalu :";
        }

        elseif ($sekarang >= $batas2) {
            // lama
            // $tglstart = date("Y-m-26", strtotime("-1 month", now()));
            // $tglend = date("Y-m-25", strtotime("today", now()));

            // baru
            $tglstart = date('Y-m-d', strtotime(date('Y-m-26')." -1 month"));
            $tglend = date('Y-m-d', strtotime(date('Y-m-25')." today"));

            $periode = "Laporan Periode Bulan ini :";
        }

        else {
            // lama
            // $tglstart = date("Y-m-26", strtotime("-1 month", now()));
            // $tglend = date("Y-m-d", strtotime("-2 day", now()));

            // baru
            $tglstart = date('Y-m-d', strtotime(date('Y-m-26')." -1 month"));
            $tglend = date('Y-m-d', strtotime(date('Y-m-d')." -2 day"));
            $periode = "Laporan Periode Bulan ini :";
        }

        
        $libur = $this->input->post('libur');


        $data['semua'] = $this->M_laporan->ygdipilih($tglstart, $tglend)->result();
        $data['semua6'] = $this->M_laporan->ygdipilih6hari($tglstart, $tglend)->result();

        $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();

        $keyjabatan = $this->session->userdata('id_karyawan');
        $data['jabatan'] = $this->M_kpimmingguan->getJabatan($keyjabatan);

        $keydept = $this->session->userdata('id_karyawan');
        $data['dept'] = $this->M_kpimmingguan->getDept($keydept);

        $data['tglstart'] = $tglstart;
        $data['tglend'] = $tglend;
        $data['libur'] = $libur;
        $data['periode'] = $periode;

        // interval hari
        // $interval = new DateInterval('P1D');

        $data['daterange'] = date_range($tglstart, $tglend); 
        
        $data['harilibur'] = $this->M_pengumuman->ambil_libur()->result();

        $this->load->view('tampil_laporanentrypublik',$data);
    }

    public function enamhari()
    {
   $this->app_model->getLogin();
        if ($this->session->userdata('level') == 2 || $this->session->userdata('level') == 6 || $this->session->userdata('level') == 3 || $this->session->userdata('level') == 4) {
            $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman Admin');
            redirect(base_url() . 'Home', 'refresh');

        }

        $batas = 5;
        $batas2 = 27;
        $sekarang = date('d');

        if($sekarang < $batas) { 
            // lama
            // $tglstart = date("Y-m-26", strtotime("-2 month", now()));
            // $tglend = date("Y-m-25", strtotime("-1 month", now()));

            // baru
            $tglstart = date('Y-m-d', strtotime(date('Y-m-26')." -2 month"));
            $tglend = date('Y-m-d', strtotime(date('Y-m-25')." -1 month"));
            $periode = "Laporan Periode Bulan Lalu :";
        }

        elseif ($sekarang >= $batas2) {
            // lama
            // $tglstart = date("Y-m-26", strtotime("-1 month", now()));
            // $tglend = date("Y-m-25", strtotime("today", now()));

            // baru
            $tglstart = date('Y-m-d', strtotime(date('Y-m-26')." -1 month"));
            $tglend = date('Y-m-d', strtotime(date('Y-m-25')." today"));

            $periode = "Laporan Periode Bulan ini :";
        }

        else {
            // lama
            // $tglstart = date("Y-m-26", strtotime("-1 month", now()));
            // $tglend = date("Y-m-d", strtotime("-2 day", now()));

            // baru
            $tglstart = date('Y-m-d', strtotime(date('Y-m-26')." -1 month"));
            $tglend = date('Y-m-d', strtotime(date('Y-m-d')." -2 day"));
            $periode = "Laporan Periode Bulan ini :";
        }

        $libur = $this->input->post('libur');


        $data['table'] = $this->M_laporan->ambilsemua()->result();
        $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        $data['semua'] = $this->M_laporan->ambiluntuklaporan($tglstart, $tglend)->result();

        $keyjabatan = $this->session->userdata('id_karyawan');
        $data['jabatan'] = $this->M_kpimmingguan->getJabatan($keyjabatan);

        $keydept = $this->session->userdata('id_karyawan');
        $data['dept'] = $this->M_kpimmingguan->getDept($keydept);

        $data['tglstart'] = $tglstart;
        $data['tglend'] = $tglend;
        $data['libur'] = $libur;
        

        $this->load->view('tampil_laporanentry6hari',$data);
    }

    public function hitung6hari(){
        $this->app_model->getLogin();
        if ($this->session->userdata('level') == 2 || $this->session->userdata('level') == 6 || $this->session->userdata('level') == 3 || $this->session->userdata('level') == 4) {
            $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman Admin');
            redirect(base_url() . 'Home', 'refresh');

        }

         if( $this->input->post('tglstart')==null  & $this->input->post('tglend')==null){
            redirect(base_url() . 'Laporan/enamhari', 'refresh');
         }

        $tglstart = $this->input->post('tglstart');
        $tglend = $this->input->post('tglend');
        $libur = $this->input->post('libur');
        

        $data['semua'] = $this->M_laporan->ygdipilih6hari($tglstart, $tglend)->result();

        $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();

        $keyjabatan = $this->session->userdata('id_karyawan');
        $data['jabatan'] = $this->M_kpimmingguan->getJabatan($keyjabatan);

        $keydept = $this->session->userdata('id_karyawan');
        $data['dept'] = $this->M_kpimmingguan->getDept($keydept);

        $data['tglstart'] = $tglstart;
        $data['tglend'] = $tglend;
        $data['libur'] = $libur;
        

        $this->load->view('tampil_laporanentry6hari',$data);

    }

    public function update($key) {
        $this->app_model->getLogin();

        if( $this->input->post('dept[]')==null ){
            redirect(base_url() . 'Karyawan', 'refresh');
         }

        $isi=$this->input->post('dept[]');
        $hak=$this->input->post('hak[]');

        if( $this->input->post('hak[]')==null ){
            $hak = array('0');
         }

        $data = array(
            'username' => $this->input->post('username'),
            'nama_karyawan' => $this->input->post('nama'),
            'password' => md5($this->input->post('password')),
            'id_jabatan' => $this->input->post('jabatan'),
            'dept' => implode(",", $isi),
            'hak_akses' => implode(",", $hak),
            );
        
        $this->M_laporan->get_update($data, $key);

        redirect(base_url() . 'Karyawan', 'refresh');

    }

}
