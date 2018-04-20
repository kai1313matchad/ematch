<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Addvendor extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model(array('M_addkaryawan', 'app_model'));
        $this->load->library(array('session', 'form_validation', 'upload', 'user_agent', 'email'));
        $this->load->helper(array('url', 'form', 'text', 'html', 'security', 'file', 'directory', 'number', 'date', 'download'));
	}

	
	public function index()
	{
		$this->app_model->getLogin();

		$find   = 'e';
        $pos = strpos($this->session->userdata('id_dept'), $find);
        $find2   = 'd';
        $pos2 = strpos($this->session->userdata('id_dept'), $find2);
        $find3   = '7';
        $pos3 = strpos($this->session->userdata('id_dept'), $find3);
  //       if ( ($this->session->userdata('level') != 1 AND $this->session->userdata('level') != 2 AND $this->session->userdata('level') != 11 AND $this->session->userdata('level') != 12 AND $this->session->userdata('level') != 10 AND $this->session->userdata('level') != 5 AND ($pos !== false || $pos2 !== false)) OR 
  //           ($this->session->userdata('level') != 1 AND $this->session->userdata('level') != 11 AND $this->session->userdata('level') != 12 AND $this->session->userdata('level') != 10 AND $this->session->userdata('level') != 5 AND ($pos3 !== false))) {

		if (($this->session->userdata('level') != 12 || $this->session->userdata('level') != 11) AND ($pos !== false || $pos2 !== false || $pos3 !== false)  ) { 

        $keyjabatan = $this->session->userdata('id_karyawan');

        $data['isijabatan'] = $this->M_addkaryawan->getAll();

        $this->load->view('tampil_addvendor', $data); 
        }

        else{
            $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman tambah user vendor');
            redirect(base_url() . 'index', 'refresh');
        }
        
        

	}



	public function create() {
        $this->app_model->getLogin();

        if( $this->input->post('dept[]')==null ){
            redirect(base_url() . 'Addvendor', 'refresh');
         }

        $isi=$this->input->post('dept[]');
        $hak=$this->input->post('hak[]');

        if( $this->input->post('hak[]')==null ){
            $hak = array('0');
         }

         // $config['upload_path']   = './uploads/'; 
         // $config['allowed_types'] = 'gif|jpg|png'; 
         // $config['max_size']      = 100; 
         // $config['max_width']     = 1024; 
         // $config['max_height']    = 768;  
         // $this->load->library('upload', $config);

        $data = array(
            'username' => $this->input->post('username'),
            'nama_karyawan' => $this->input->post('nama'),
            'password' => md5($this->input->post('password')),
            'id_jabatan' => $this->input->post('pangkat'),
            'jabatannya' => $this->input->post('jabatannya'),
            'dept' => implode(",", $isi),
            'hak_akses' => implode(",", $hak)
            // 'img' =>         
        );

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
                        <p>Anda berhasil input data karyawan <b>'.$nama.'.</b></p>
                    </div>');    
            $this->load->view('tampil_addkaryawan');    
        };

        $this->M_addkaryawan->get_insert($data);

        redirect(base_url() . 'Addvendor', 'refresh');
	}

    public function insert(){
    
        $this->form_validation->set_rules('ft_profil', 'ft_profil', 'required');

        $this->load->library('upload');

        $nmfile =  $this->input->post('username') . ','. date("d-m-Y");//nama file saya beri nama langsung dan diikuti fungsi time
       
        $config['upload_path'] = './assets/ft_profil'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        // $config['max_width']  = '1288'; //lebar maksimum 1288 px
        // $config['max_height']  = '768'; //tinggi maksimu 768 px    
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
    
        $this->upload->initialize($config);    

        // if(!$this->upload->do_upload('ft_profil')){
        //     $this->session->set_flashdata('msg','<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><i class="icon-ok green"></i> Data gagal di Simpan. Masukan foto profil!</div>');

        //             redirect(base_url() . 'Addvendor', 'refresh');
        // }


        
        if ($_FILES['ft_profil']['name']) {
            if($_FILES['ft_profil']['name'])
            {
                if ($this->upload->do_upload('ft_profil'))
                {
                    $gbr = $this->upload->data();

                    $isi=$this->input->post('dept');

                    $data = array(
                       'username' => $this->input->post('username'),
                        'nama_karyawan' => $this->input->post('nama'),
                        'password' => md5($this->input->post('password')),
                        'id_jabatan' => $this->input->post('pangkat'),
                        'jabatannya' => $this->input->post('jabatannya'),
                        'dept' => $isi,
                        'img' =>$gbr['file_name'],
                        'harikerja' => $this->input->post('harikerja'),
                        'status' => 'Aktif',
                        'email' => $this->input->post('email'),
                    );
                        
                    
                    $this->M_addkaryawan->get_insert($data);
                    
                    $nama = $data['nama_karyawan'];

                    // if($isi == null) {
                    //     $this->session->set_flashdata('msg', 
                    //             '<div class="alert alert-danger">
                    //                 <h4>Oppss</h4>
                    //                 <p>Tidak ada kata dinput.</p>
                    //             </div>');    
                    //     $this->load->view('tampil_addvendor');      
                    // } else {    
                    //     $this->session->set_flashdata('msg', 
                    //             '<div class="alert alert-success alert-dismissable">
                    //                 <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    //                 <h4>Berhasil </h4>
                    //                 <p>Anda berhasil input data karyawan <b>'.$nama.'.</b></p>
                    //             </div>');    
                    //     $this->load->view('tampil_addvendor');    
                    // };

                    $this->M_addkaryawan->do_upload('name_field');

                    $this->session->set_flashdata('msg','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><i class="icon-ok green"></i> Anda berhasil input data karyawan  <b>'.$nama.'.</b>.</div>');
                    redirect(base_url() . 'Addvendor', 'refresh');


                }else{
                    //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                    $this->session->set_flashdata('msg','<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><i class="icon-ok green"></i> Data gagal di Simpan.</div>');

                    redirect(base_url() . 'Addvendor', 'refresh');
                }
            }
        } else {
            
                if ($this->form_validation->run() == FALSE)
                {
                    
                    $isi=$this->input->post('dept');

                    $data = array(
                       'username' => $this->input->post('username'),
                        'nama_karyawan' => $this->input->post('nama'),
                        'password' => md5($this->input->post('password')),
                        'id_jabatan' => $this->input->post('pangkat'),
                        'jabatannya' => $this->input->post('jabatannya'),
                        'dept' => $isi,
                        'harikerja' => $this->input->post('harikerja'),
                        'status' => 'Aktif',
                        'email' => $this->input->post('email')
                    );
                        
                    
                    $this->M_addkaryawan->get_insert($data);
                    
                    $nama = $data['nama_karyawan'];

                    // if($isi == null) {
                    //     $this->session->set_flashdata('msg', 
                    //             '<div class="alert alert-danger">
                    //                 <h4>Oppss</h4>
                    //                 <p>Tidak ada kata dinput.</p>
                    //             </div>');    
                    //     $this->load->view('tampil_addvendor');      
                    // } else {    
                    //     $this->session->set_flashdata('msg', 
                    //             '<div class="alert alert-success alert-dismissable">
                    //                 <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    //                 <h4>Berhasil </h4>
                    //                 <p>Anda berhasil input data karyawan <b>'.$nama.'.</b></p>
                    //             </div>');    
                    //     $this->load->view('tampil_addvendor');    
                    // };

                    $this->session->set_flashdata('msg','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><i class="icon-ok green"></i> Anda berhasil input data karyawan  <b>'.$nama.'.</b>.</div>');

                    redirect(base_url() . 'Addvendor', 'refresh');
                }else{
                    //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                    $this->session->set_flashdata('msg','<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><i class="icon-ok green"></i> Data gagal di Simpan.</div>');
                    redirect(base_url() . 'Addvendor', 'refresh');
                }
            //}
        }
        
    }
}


