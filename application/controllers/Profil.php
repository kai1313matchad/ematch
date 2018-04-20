<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profil extends CI_Controller {

    var $destination;
	public function __construct() {
		parent::__construct();
        $this->destination = realpath(APPPATH. '../assets/ft_profil/');
        $this->load->model(array('M_karyawanku', 'app_model'));
        $this->load->library(array('session', 'form_validation', 'upload', 'user_agent', 'email'));
        $this->load->helper(array('url', 'form', 'text', 'html', 'security', 'file', 'directory', 'number', 'date', 'download'));
	}

	public function index()
	{

        $idku = $this->session->userdata('id_karyawan');
        $this->app_model->getLogin();
        $data['table'] = $this->M_karyawanku->ambildataku($idku)->result();
        $this->load->view('tampil_profil',$data);
	}

    public function hapus($key){
        $this->app_model->getLogin();
        $where = array('id_karyawan' => $key);
        $this->M_karyawanku->delete($key);
        redirect(base_url() . 'Karyawan', 'refresh');
    }

    public function updateprofil($key) {
        $this->app_model->getLogin();


             $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            );
        
        $this->M_karyawanku->get_update($data, $key);

        redirect(base_url() . 'Login/logout', 'refresh');

    }

    public function update($key) {
        $this->app_model->getLogin();


        $datalama = $this->M_karyawanku->ambildataku($key)->row();
        $passwordlama = $datalama->password;

        $inputanpasslama = md5($this->input->post('passwordlama'));

        if ($passwordlama == $inputanpasslama) {

             $data = array(
            'password' => md5($this->input->post('password')),
            );
        
        $this->M_karyawanku->get_update($data, $key);

        redirect(base_url() . 'Login/logout', 'refresh');

        }

        else {
        $this->session->set_flashdata('message_name', 'Input password lama anda salah');
        redirect(base_url() . 'Profil', 'refresh');
        }

    }

    public function ganti($key){
        $this->form_validation->set_rules('ft_profil', 'ft_profil', 'required');

        $this->load->library('upload');

        $nmfile =  $this->session->userdata('nama_karyawan') . ','. date("d-m-Y");//nama file saya beri nama langsung dan diikuti fungsi time
       
        $config['upload_path'] = './assets/ft_profil'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        // $config['max_width']  = '1288'; //lebar maksimum 1288 px
        // $config['max_height']  = '768'; //tinggi maksimu 768 px    
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
    
        $this->upload->initialize($config);    
        
        if ($_FILES['ft_profil']['name']) {
            if($_FILES['ft_profil']['name'])
            {
                if ($this->upload->do_upload('ft_profil'))
                {
                    $gbr = $this->upload->data();

                    // watermark dari web orang
                    // $config["manipulation"]['source_image'] = $gbr['full_path'];
                    // $this->load->library('image_lib', $config["manipulation"]); 
                    // $config["manipulation"]['wm_text'] = 'Copyright 2015 - safril aulia rahman';
                    // $config["manipulation"]['wm_type'] = 'text';
                    // $config["manipulation"]['wm_font_size'] = '25';
                    // $config["manipulation"]['wm_font_color'] = '#ffffff';
                    // $this->image_lib->initialize($config["manipulation"]); 
                    // $this->image_lib->watermark(); 

                    // watermark dari web CI 
                    // $config['source_image'] = $gbr['full_path'];
                    // $config['wm_text'] = 'Copyright 2017 - Fadkhur Rachman Dzaky';
                    // $config['wm_type'] = 'text';
                    // $config['wm_font_path'] = './system/fonts/Exo2-Italic.ttf';
                    // $config['wm_font_size'] = '16';
                    // $config['wm_font_color'] = 'ffffff';
                    // $config['wm_vrt_alignment'] = 'bottom';
                    // $config['wm_hor_alignment'] = 'center';
                    // // $config['wm_padding'] = '300px';
                    // $this->image_lib->initialize($config);
                    // $this->image_lib->watermark();
                    // stop watermark CI

                    $data = array(
                        'img' =>$gbr['file_name']
                    );

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
                  

                    $this->M_karyawanku->do_upload('name_field');

                    redirect(base_url() . 'Profil', 'refresh');
                }else{
                    //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                    $this->session->set_flashdata('msg','<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><i class="icon-ok green"></i> Data gagal di Simpan.</div>');

                    redirect(base_url() . 'Profil', 'refresh');
                }
            }
        } else {
            
                
                    //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                    $this->session->set_flashdata('msg','<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><i class="icon-ok green"></i>Anda belum memilih foto</div>');
                    redirect(base_url() . 'Profil', 'refresh');
                
            //}
        }
    
    }

}
