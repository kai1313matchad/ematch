<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karyawan extends CI_Controller {

    var $destination;


	public function __construct() {
		parent::__construct();
        $this->destination = realpath(APPPATH. '../assets/ft_profil/');
        $this->load->model(array('M_karyawanku','M_addkaryawan' ,'app_model', 'M_kpimmingguan', 'M_reportsub', 'M_pilihkaryawan'));
        $this->load->library(array('session', 'form_validation', 'upload', 'user_agent', 'email'));
        $this->load->helper(array('url', 'form', 'text', 'html', 'security', 'file', 'directory', 'number', 'date', 'download', 'tgl_indo'));
	}

	public function index()
	{


        $this->app_model->getLogin();
        if ($this->session->userdata('level') == 2 || $this->session->userdata('level') == 6 || $this->session->userdata('level') == 3 || $this->session->userdata('level') == 4) {
            $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman Admin');
            redirect(base_url() . 'index', 'refresh');

        }

        $data['isijabatan'] = $this->M_addkaryawan->getAll();


        $data['table'] = $this->M_karyawanku->ambilsemua()->result();
        

        $this->load->view('tampil_karyawan',$data);
	}


    public function datasubordinate(){
        $data = $this->M_karyawanku->getsubordinate()->result();
        echo json_encode($data);

        return $data;
    }

    public function subordinate(){
        $this->app_model->getLogin();


        // if ($this->session->userdata('id_dept') != 2 & $this->session->userdata('level') != 1 ) {
        //     $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman Ijin Karyawan');
        //     redirect(base_url() . 'Home', 'refresh');

        // }
        $data['table'] = $this->M_karyawanku->getsubordinate()->result();
        // $data['pesanku'] = $this->M_kpimmingguan->getpesanku()->result();
        // $data['pesanmasuk'] = $this->M_kpimmingguan->getpesanmasuk()->result();
        // $data['pesandept'] = $this->M_kpimmingguan->getpesandept()->result();

        //  $data['inboxblmbaca'] = $this->M_kpimmingguan->inboxblmbaca()->result();
        // $data['noteblmbaca'] = $this->M_kpimmingguan->noteblmbaca()->result();
        // $data['planblmbaca'] = $this->M_kpimmingguan->planblmbaca()->result();
        // $data['noteplan'] = $this->M_kpimmingguan->noteplan()->result();

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
            /*echo "<select>";;
            foreach ($query2->result() as $rows) 
            {
            echo "<option value'".$rows->$id_dept."'>".$rows->nama_dept."</option>";

            }
            echo "</select>";*/

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
            /*echo "<select>";;
            foreach ($query2->result() as $rows) 
            {
            echo "<option value'".$rows->$id_dept."'>".$rows->nama_dept."</option>";

            }
            echo "</select>";*/

            $data['isinamakaryawan'] = $kueri2;
            

        }


        $this->load->view('tampil_subordinate',$data);
        
    }

    

    function get_karyawan() {
        if('IS_AJAX') {
            //$key = $this->input->post('id');
        }   
        $key = $this->input->post('id');
        // $namad = $this->db->query('SELECT nama_dept FROM `dept` WHERE id_dept = '.$key.'');
        // $idses = $this->input->post('idkar');
        $idjab = $this->input->post('jab');
        $hak = $this->input->post('hak');
        $hak_akses = explode(',', $hak);

        $this->load->model('M_pilihkaryawan');
        $result = $this->M_pilihkaryawan->untuksubordinate($key, $hak_akses);
        return $result;
    }

    function get_karyawanygdinilai() {
        if('IS_AJAX') {
            //$key = $this->input->post('id');
        }
        $penilai = $this->input->post('penilai');
        $key = $this->input->post('id');
        // $namad = $this->db->query('SELECT nama_dept FROM `dept` WHERE id_dept = '.$key.'');
        // $idses = $this->input->post('idkar');
        $idjab = $this->input->post('jab');
        $hak = $this->input->post('hak');
        $hak_akses = explode(',', $hak);

        $this->load->model('M_pilihkaryawan');
        $result = $this->M_pilihkaryawan->ygdinilai($key, $hak_akses, $penilai);
        return $result;
    }

    public function simpansubordinate(){
        $this->app_model->getLogin();
        $penilai = $this->input->post('pilihkar');
        $dinilai = $this->input->post('pilihkar2');

        foreach ($dinilai as $singdinilai){
            $data = array(
            'id_penilai' => $this->input->post('pilihkar'),
            'id_dinilai' => $singdinilai
            );        
            $this->M_karyawanku->simpansubordinate($data, $penilai, $singdinilai);

        }

        // $data = array(
        //     'id_penilai' => $this->input->post('pilihkar'),
        //     'id_dinilai' => $this->input->post('pilihkar2'),
        //     );        
        // $this->M_karyawanku->simpansubordinate($data);
        // redirect(base_url(). 'karyawan/subordinate' , 'refresh');
    }

    public function hapussubordinate($key){
        $this->app_model->getLogin();
        $this->db->delete('subordinate', array('id_penilai' => $key));
        redirect(base_url() . 'karyawan/subordinate', 'refresh');
    }

    public function pageupdate($id_penilai){
        $this->app_model->getLogin();
        $data['dinilai'] = $this->M_karyawanku->getsatusubordinate($id_penilai)->result();
        $data['penilai'] = $this->M_karyawanku->getsatusubordinate($id_penilai)->row();

        $data['table'] = $this->M_karyawanku->getsubordinate()->result();
       

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
        $this->load->view('tampil_pageupdatesub', $data);

    }

    public function updatesubordinate($key){
        $this->app_model->getLogin();
        $this->db->delete('subordinate', array('id_penilai' => $key));


        $id_dinilai = $this->input->post('id_dinilai[]');

        foreach($id_dinilai as $id){

            $data = array(
            'id_penilai' => $this->input->post('id_penilai'),
            'id_dinilai' => $id 
            );        
            $this->db->insert('subordinate', $data);

        }

        redirect(base_url() . 'karyawan/subordinate', 'refresh');
    }

    public function bobot(){
        $this->app_model->getLogin();

        if ($this->session->userdata('level') != 1 ) {
            $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman Master Bobot');
            redirect(base_url() . 'home', 'refresh');
        }
        

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
            /*echo "<select>";;
            foreach ($query2->result() as $rows) 
            {
            echo "<option value'".$rows->$id_dept."'>".$rows->nama_dept."</option>";

            }
            echo "</select>";*/

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
            /*echo "<select>";;
            foreach ($query2->result() as $rows) 
            {
            echo "<option value'".$rows->$id_dept."'>".$rows->nama_dept."</option>";

            }
            echo "</select>";*/

            $data['isinamakaryawan'] = $kueri2;
            

        }



        $data['table'] = $this->M_karyawanku->getbobotmaster($id_dept)->result();


        $this->load->view('tampil_m_bobot',$data);
        
    }

    public function tesmasterbobot()
    {
        $this->app_model->getLogin();
        if ($this->session->userdata('level') != 1 )
        {
            $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman Master Bobot');
            redirect(base_url() . 'home', 'refresh');
        }
        $data['profilku']=$this->M_kpimmingguan->getdataku()->result();
        $keyjabatan=$this->session->userdata('id_karyawan');
        $data['jabatan']=$this->M_reportsub->getJabatan($keyjabatan);
        $keydept=$this->session->userdata('id_karyawan');
        $data['dept']=$this->M_kpimmingguan->getDept($keydept);
        $data['isinamadept']=$this->db->get('dept');
        $this->load->view('tampil_m_bobot_new',$data);
    }

    public function ambildatabobot(){

        // $keydept = $this->session->userdata('id_karyawan');

        // $this->db->where('id_karyawan', $keydept);
        // $query = $this->db->get('karyawan');
        // if($query->num_rows()>0)
        // {
        //     foreach ($query->result() as $row) {
        //     $dept = $row->dept;
        //     }
        // }

        // $id_dept = explode(',', $dept);

        $ini_dept = $this->input->post('pilihdept');

        if ($ini_dept == 'all') {
            $data = $this->M_karyawanku->bobotsemua()->result();
        }

        else{
            $data = $this->M_karyawanku->getbobotmaster($ini_dept)->result();
        }

        echo json_encode($data);

        return $data;

    }

    public function ambildatabobotkpim(){

        $ini_dept = $this->input->post('pilihdept');

        if ($ini_dept == 'all') {
            $data = $this->M_karyawanku->bobotsemua()->result();
        }

        else{
            $data = $this->M_karyawanku->getbobot($ini_dept)->result();
        }

        echo json_encode($data);

        return $data;

    }

    public function getbobot_($id)
    {
        $data = ($id != 'all')?$this->db->get_where('master_bobot',array('id_dept'=>$id))->result():$this->db->get('master_bobot')->result();
        echo json_encode($data);
    }

    public function getbobot2_($id)
    {
        $data = $this->db->join('dept b','b.id_dept = a.id_dept')->get_where('master_bobot a',array('a.id_dept'=>$id))->result();
        echo json_encode($data);
    }

    public function getdl_($id)
    {
        $data = $this->db->get_where('master_bobot',array('id_bobot'=>$id))->row();
        echo json_encode($data);
    }

    public function ambildatabobot2(){

        $ini_dept = $this->input->post('pilihdept');

        $data['datagoal'] = $this->M_karyawanku->getbobot($ini_dept)->result();

        return $data;

    }

    public function ambilbobotsatu($id){

        $data = $this->M_karyawanku->getbobotsatu($id);

        echo json_encode($data);

        return $data;

    }

    public function simpanbobot(){
        $this->app_model->getLogin();
        date_default_timezone_set('Asia/Jakarta');
        $dept = $this->input->post('pilihdept');
        $nama_pekerjaan = $this->input->post('nama_pekerjaan');
        $nilai_bobot = $this->input->post('nilai_bobot');
        $level = $this->input->post('level[]');

        $data = array(
        'id_dept' => $dept,
        'nama' => $nama_pekerjaan,
        'bobot' => $nilai_bobot,
        'tgl_diinput' => date('Y-m-d H:i:s'),
        'id_levelakses' => implode(",", $level)
        );        
        $this->M_karyawanku->simpanbobot($data);
        redirect(base_url(). 'karyawan/bobot' , 'refresh');
    }

    public function simpan_bobot()
    {
        $this->app_model->getLogin();
        date_default_timezone_set('Asia/Jakarta');
        $dept = $this->input->post('pilihdept');
        $gls = $this->input->post('nama_pekerjaan');
        $vlu = $this->input->post('nilai_bobot');
        $lv = $this->input->post('level[]');
        $sts = $this->input->post('stsbobot');
        $fixdl = ($this->input->post('fixdldate') != '')?$this->input->post('fixdldate'):NULL;
        $custdl = ($this->input->post('custdltgl') != '')?$this->input->post('custdltgl'):NULL;
        $ins = array(
            'id_dept'=>$dept,
            'nama'=>$gls,
            'bobot'=>$vlu,
            'tgl_diinput'=>date('Y-m-d H:i:s'),
            'id_levelakses'=>implode(",", $lv),
            'sts_bobot'=>$sts,
            'fix_dl'=>$fixdl,
            'custom_dl'=>$custdl
        );
        $this->db->insert('master_bobot',$ins);
        $data['status'] = TRUE;
        echo json_encode($data);
    }

    public function hapusbobot($key){
        $this->app_model->getLogin();
        $this->db->delete('master_bobot', array('id_bobot' => $key));
        redirect(base_url() . 'karyawan/bobot', 'refresh');
    }

    public function updatebobot($key){
        $this->app_model->getLogin();
        date_default_timezone_set('Asia/Jakarta');
        $dept = $this->input->post('pilihdept');
        $nama_pekerjaan = $this->input->post('nama_pekerjaan');
        $nilai_bobot = $this->input->post('nilai_bobot');
        $level = $this->input->post('level[]');


        $data = array(
        'id_dept' => $dept,
        'nama' => $nama_pekerjaan,
        'bobot' => $nilai_bobot,
        'tgl_diinput' => date('Y-m-d H:i:s'),
        'id_levelakses' => implode(",", $level)

        );        

        $this->db->where('id_bobot', $key);
        $this->db->update('master_bobot', $data);
        // $this->db->update('master_bobot', array('id_bobot' => $key));
        redirect(base_url() . 'karyawan/bobot', 'refresh');
    }

    public function updatebobotajax($key){
        $this->app_model->getLogin();
        date_default_timezone_set('Asia/Jakarta');
        $dept = $this->input->post('pilihdept');
        $nama_pekerjaan = $this->input->post('nama_pekerjaan');
        $nilai_bobot = $this->input->post('nilai_bobot');
        $level = $this->input->post('level[]');

        $data = array(
        'id_dept' => $dept,
        'nama' => $nama_pekerjaan,
        'bobot' => $nilai_bobot,
        'tgl_diinput' => date('Y-m-d H:i:s'),
        'id_levelakses' => implode(",", $level)
        
        );        

        $this->db->where('id_bobot', $key);
        $this->db->update('master_bobot', $data);
        // $this->db->update('master_bobot', array('id_bobot' => $key));
        redirect(base_url() . 'karyawan/bobot', 'refresh');
    }

    public function vendor()
    {


        $this->app_model->getLogin();
        $find   = 'e';
        $pos = strpos($this->session->userdata('id_dept'), $find);
        $find2   = 'd';
        $pos2 = strpos($this->session->userdata('id_dept'), $find2);
        $find3   = '7';
        $pos3 = strpos($this->session->userdata('id_dept'), $find3);

        if (($this->session->userdata('level') != 12 || $this->session->userdata('level') != 11) AND ($pos !== false || $pos2 !== false || $pos3 !== false)  ) {

        $data['isijabatan'] = $this->M_addkaryawan->getAll();
        $data['table'] = $this->M_karyawanku->ambilsemuavendor()->result();
        $this->load->view('tampil_uservendor',$data); 
        }

        else{
            $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman tambah user vendor');
            redirect(base_url() . 'index', 'refresh');
        }

        // if ($this->session->userdata('level') == 2 || $this->session->userdata('level') == 12 || $this->session->userdata('level') == 11) {
        //     $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman tambah user vendor');
        //     redirect(base_url() . 'index', 'refresh');
        // }

        // $data['isijabatan'] = $this->M_addkaryawan->getAll();


        // $data['table'] = $this->M_karyawanku->ambilsemuavendor()->result();
        

        // $this->load->view('tampil_uservendor',$data);
    }

    public function hapus($key){
        $this->app_model->getLogin();
        $where = array('id_karyawan' => $key);
        $this->M_karyawanku->delete($key);
        redirect(base_url() . 'Karyawan', 'refresh');
    }

    public function hapusvendor($key){
        $this->app_model->getLogin();
        $where = array('id_karyawan' => $key);
        $this->M_karyawanku->delete($key);
        redirect(base_url() . 'Karyawan/vendor', 'refresh');
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

         if( $this->input->post('password')==null ){
            $data = array(
            'username' => $this->input->post('username'),
            'nama_karyawan' => $this->input->post('nama'),
            'id_jabatan' => $this->input->post('pangkat'),
            'jabatannya' => $this->input->post('jabatannya'),
            'dept' => implode(",", $isi),
            'hak_akses' => implode(",", $hak),
            'img' =>$gbr['file_name']

            );
         }

         else
         {
            $data = array(
            'username' => $this->input->post('username'),
            'nama_karyawan' => $this->input->post('nama'),
            'password' => md5($this->input->post('password')),
            'id_jabatan' => $this->input->post('pangkat'),
            'jabatannya' => $this->input->post('jabatannya'),
            'dept' => implode(",", $isi),
            'hak_akses' => implode(",", $hak),
            'img' =>$gbr['file_name']

            );

         }

        
        
        $this->M_karyawanku->get_update($data, $key);

        redirect(base_url() . 'Karyawan', 'refresh');

    }

    public function ganti($key){
        $this->form_validation->set_rules('ft_profil', 'ft_profil', 'required');

        $this->load->library('upload');

        $nmfile =  $this->input->post('username') . ','. date("d-m-Y");//nama file saya beri nama langsung dan diikuti fungsi time
       
        $config['upload_path'] = './assets/ft_profil'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        // $config['max_width']  = '1288'; //lebar maksimum 1288 px
        // $config['max_height']  = '768'; //tinggi maksimu 768 px    
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        // if($this->upload->do_upload('ft_profil') == null){
        //     $this->session->set_flashdata('msg','<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><i class="icon-ok green"></i> Data gagal di Simpan. Masukan foto profil!</div>');

        //             redirect(base_url() . 'Karyawan', 'refresh');
        // }
    
        $this->upload->initialize($config);    
        
        if ($_FILES['ft_profil']['name']) {
            if($_FILES['ft_profil']['name'])
            {
                if ($this->upload->do_upload('ft_profil'))
                {
                    $gbr = $this->upload->data();

                    $isi=$this->input->post('dept[]');
                    $hak=$this->input->post('hak[]');



                    if( $this->input->post('dept[]')==null ){
                        $isi = array('d');
                    }

                    if( $this->input->post('hak[]')==null ){
                        $hak = array('0');
                    }

                     if( $this->input->post('password')==null ){
                        $data = array(
                        'username' => $this->input->post('username'),
                        'nama_karyawan' => $this->input->post('nama'),
                        'id_jabatan' => $this->input->post('pangkat'),
                        'jabatannya' => $this->input->post('jabatannya'),
                        'harikerja' => $this->input->post('harikerja'),
                        'status' => $this->input->post('status'),
                        'email' => $this->input->post('email'),
                        'dept' => implode(",", $isi),
                        'hak_akses' => implode(",", $hak),
                        'img' =>$gbr['file_name']

                        );
                     }

                     else
                     {
                        $data = array(
                        'username' => $this->input->post('username'),
                        'nama_karyawan' => $this->input->post('nama'),
                        'password' => md5($this->input->post('password')),
                        'id_jabatan' => $this->input->post('pangkat'),
                        'jabatannya' => $this->input->post('jabatannya'),
                        'harikerja' => $this->input->post('harikerja'),
                        'status' => $this->input->post('status'),
                        'email' => $this->input->post('email'),
                        'dept' => implode(",", $isi),
                        'hak_akses' => implode(",", $hak),
                        'img' =>$gbr['file_name']

                        );

                     }

                        $this->db->select('*');
                        $this->db->where(array('id_karyawan'=> $key));
                        $query = $this->db->get('karyawan');
                        $result =  $query->first_row('array');
                        $nama = $result['img'];
                        
                        if($nama){


                      
                        //hapus image dari server
                           
                        // lokasi folder image
                        $map = $_SERVER['DOCUMENT_ROOT'];
                        $path = $this->destination . '/';//$map . '/ci_3_admin/assets/banner/';
                        $path2 = $this->destination . '/resized/';//$map . '/ci_3_admin/assets/banner/resized/';
                        //lokasi gambar secara spesifik
                        $image1 = $path.$nama;
                        $image2 = $path2.$nama;
                        //hapus image
                        unlink($image1);
                        unlink($image2);
                        }
                        
                    
                    $this->M_karyawanku->get_update($data, $key);
                    
                    $nama = $data['nama_karyawan'];

                    if($isi == null) {
                        $this->session->set_flashdata('msg', 
                                '<div class="alert alert-danger">
                                    <h4>Oppss</h4>
                                    <p>Tidak ada kata dinput.</p>
                                </div>');    
                        $this->load->view('tampil_addkaryawan');      
                    } else {    
                        $this->session->set_flashdata('msg', 
                                '<div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <h4>Berhasil </h4>
                                    <p>Anda berhasil edit data karyawan <b>'.$nama.'.</b></p>
                                </div>');    
                        $this->load->view('tampil_karyawan');    
                    };

                    $this->M_karyawanku->do_upload('name_field');

                    redirect(base_url() . 'Karyawan', 'refresh');
                }else{
                    //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                    $this->session->set_flashdata('msg','<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><i class="icon-ok green"></i> Data gagal di Simpan.</div>');

                    redirect(base_url() . 'Karyawan', 'refresh');
                }
            }
        } else {
            
                if ($this->form_validation->run() == FALSE)
                {
                    
                    $isi=$this->input->post('dept[]');
                    $hak=$this->input->post('hak[]');

                    if( $this->input->post('dept[]')==null ){
                        $isi = array('d');
                    }

                    if( $this->input->post('hak[]')==null ){
                        $hak = array('0');
                    }

                     if( $this->input->post('password')==null ){
                        $data = array(
                        'username' => $this->input->post('username'),
                        'nama_karyawan' => $this->input->post('nama'),
                        'id_jabatan' => $this->input->post('pangkat'),
                        'jabatannya' => $this->input->post('jabatannya'),
                        'harikerja' => $this->input->post('harikerja'),
                        'status' => $this->input->post('status'),
                        'email' => $this->input->post('email'),
                        'dept' => implode(",", $isi),
                        'hak_akses' => implode(",", $hak)

                        );
                     }

                     else
                     {
                        $data = array(
                        'username' => $this->input->post('username'),
                        'nama_karyawan' => $this->input->post('nama'),
                        'password' => md5($this->input->post('password')),
                        'id_jabatan' => $this->input->post('pangkat'),
                        'jabatannya' => $this->input->post('jabatannya'),
                        'harikerja' => $this->input->post('harikerja'),
                        'status' => $this->input->post('status'),
                        'email' => $this->input->post('email'),
                        'dept' => implode(",", $isi),
                        'hak_akses' => implode(",", $hak)

                        );

                     }
                        
                    
                    $this->M_karyawanku->get_update($data, $key);
                    
                    $nama = $data['nama_karyawan'];

                    if($isi == null) {
                        $this->session->set_flashdata('msg', 
                                '<div class="alert alert-danger">
                                    <h4>Oppss</h4>
                                    <p>Tidak ada kata dinput.</p>
                                </div>');    
                        $this->load->view('tampil_karyawan');      
                    } else {    
                        $this->session->set_flashdata('msg', 
                                '<div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <h4>Berhasil </h4>
                                    <p>Anda berhasil edit data karyawan <b>'.$nama.'.</b></p>
                                </div>');    
                        $this->load->view('tampil_karyawan');    
                    };

                    redirect(base_url() . 'Karyawan', 'refresh');
                }else{
                    //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                    $this->session->set_flashdata('msg','<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><i class="icon-ok green"></i> Data gagal di Simpan.</div>');
                    redirect(base_url() . 'Karyawan', 'refresh');
                }
            //}
        }
    
    }

    public function gantivendor($key){
        $this->form_validation->set_rules('ft_profil', 'ft_profil', 'required');

        $this->load->library('upload');

        $nmfile =  $this->input->post('username') . ','. date("d-m-Y");//nama file saya beri nama langsung dan diikuti fungsi time
       
        $config['upload_path'] = './assets/ft_profil'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        // $config['max_width']  = '1288'; //lebar maksimum 1288 px
        // $config['max_height']  = '768'; //tinggi maksimu 768 px    
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        // if($this->upload->do_upload('ft_profil') == null){
        //     $this->session->set_flashdata('msg','<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><i class="icon-ok green"></i> Data gagal di Simpan. Masukan foto profil!</div>');

        //             redirect(base_url() . 'Karyawan', 'refresh');
        // }
    
        $this->upload->initialize($config);    
        
        if ($_FILES['ft_profil']['name']) {
            if($_FILES['ft_profil']['name'])
            {
                if ($this->upload->do_upload('ft_profil'))
                {
                    $gbr = $this->upload->data();

                    $isi=$this->input->post('dept');
                    // $hak=$this->input->post('hak[]');

                    if( $this->input->post('hak[]')==null ){
                        $hak = array('0');
                    }

                     if( $this->input->post('password')==null ){
                        $data = array(
                        'username' => $this->input->post('username'),
                        'nama_karyawan' => $this->input->post('nama'),
                        'id_jabatan' => $this->input->post('pangkat'),
                        'jabatannya' => $this->input->post('jabatannya'),
                        'harikerja' => $this->input->post('harikerja'),
                        'status' => $this->input->post('status'),
                        'email' => $this->input->post('email'),
                        'dept' => $isi,
                        // 'hak_akses' => implode(",", $hak),
                        'img' =>$gbr['file_name']

                        );
                     }

                     else
                     {
                        $data = array(
                        'username' => $this->input->post('username'),
                        'nama_karyawan' => $this->input->post('nama'),
                        'password' => md5($this->input->post('password')),
                        'id_jabatan' => $this->input->post('pangkat'),
                        'jabatannya' => $this->input->post('jabatannya'),
                        'harikerja' => $this->input->post('harikerja'),
                        'status' => $this->input->post('status'),
                        'email' => $this->input->post('email'),
                        'dept' => $isi,
                        // 'hak_akses' => implode(",", $hak),
                        'img' =>$gbr['file_name']

                        );

                     }

                        $this->db->select('*');
                        $this->db->where(array('id_karyawan'=> $key));
                        $query = $this->db->get('karyawan');
                        $result =  $query->first_row('array');
                        $nama = $result['img'];
                        
                        if($nama){


                      
                        //hapus image dari server
                           
                        // lokasi folder image
                        $map = $_SERVER['DOCUMENT_ROOT'];
                        $path = $this->destination . '/';//$map . '/ci_3_admin/assets/banner/';
                        $path2 = $this->destination . '/resized/';//$map . '/ci_3_admin/assets/banner/resized/';
                        //lokasi gambar secara spesifik
                        $image1 = $path.$nama;
                        $image2 = $path2.$nama;
                        //hapus image
                        unlink($image1);
                        unlink($image2);
                        }
                        
                    
                    $this->M_karyawanku->get_update($data, $key);
                    
                    $nama = $data['nama_karyawan'];

                    if($isi == null) {
                        $this->session->set_flashdata('msg', 
                                '<div class="alert alert-danger">
                                    <h4>Oppss</h4>
                                    <p>Tidak ada kata dinput.</p>
                                </div>');    
                        $this->load->view('tampil_addkaryawan');      
                    } else {    
                        $this->session->set_flashdata('msg', 
                                '<div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <h4>Berhasil </h4>
                                    <p>Anda berhasil edit data karyawan <b>'.$nama.'.</b></p>
                                </div>');    
                        $this->load->view('tampil_karyawan');    
                    };

                    $this->M_karyawanku->do_upload('name_field');

                    redirect(base_url() . 'Karyawan/vendor', 'refresh');
                }else{
                    //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                    $this->session->set_flashdata('msg','<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><i class="icon-ok green"></i> Data gagal di Simpan.</div>');

                    redirect(base_url() . 'Karyawan/vendor', 'refresh');
                }
            }
        } else {
            
                if ($this->form_validation->run() == FALSE)
                {
                    
                    $isi=$this->input->post('dept');
                    // $hak=$this->input->post('hak[]');

                    // if( $this->input->post('hak[]')==null ){
                    //     $hak = array('0');
                    // }

                     if( $this->input->post('password')==null ){
                        $data = array(
                        'username' => $this->input->post('username'),
                        'nama_karyawan' => $this->input->post('nama'),
                        'id_jabatan' => $this->input->post('pangkat'),
                        'jabatannya' => $this->input->post('jabatannya'),
                        'harikerja' => $this->input->post('harikerja'),
                        'status' => $this->input->post('status'),
                        'email' => $this->input->post('email'),
                        'dept' => $isi,
                        // 'hak_akses' => implode(",", $hak)

                        );
                     }

                     else
                     {
                        $data = array(
                        'username' => $this->input->post('username'),
                        'nama_karyawan' => $this->input->post('nama'),
                        'password' => md5($this->input->post('password')),
                        'id_jabatan' => $this->input->post('pangkat'),
                        'jabatannya' => $this->input->post('jabatannya'),
                        'harikerja' => $this->input->post('harikerja'),
                        'status' => $this->input->post('status'),
                        'email' => $this->input->post('email'),
                        'dept' => $isi,
                        // 'hak_akses' => implode(",", $hak)

                        );

                     }
                        
                    
                    $this->M_karyawanku->get_update($data, $key);
                    
                    $nama = $data['nama_karyawan'];

                    if($isi == null) {
                        $this->session->set_flashdata('msg', 
                                '<div class="alert alert-danger">
                                    <h4>Oppss</h4>
                                    <p>Tidak ada kata dinput.</p>
                                </div>');    
                        $this->load->view('tampil_karyawan');      
                    } else {    
                        $this->session->set_flashdata('msg', 
                                '<div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <h4>Berhasil </h4>
                                    <p>Anda berhasil edit data karyawan <b>'.$nama.'.</b></p>
                                </div>');    
                        $this->load->view('tampil_karyawan');    
                    };

                    redirect(base_url() . 'Karyawan/vendor', 'refresh');
                }else{
                    //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                    $this->session->set_flashdata('msg','<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><i class="icon-ok green"></i> Data gagal di Simpan.</div>');
                    redirect(base_url() . 'Karyawan/vendor', 'refresh');
                }
            //}
        }
    
    }

}
