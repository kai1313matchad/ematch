<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerangan extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->database();
        $this->load->model(array('M_kpimmingguan', 'M_penerangan', 'app_model'));
        $this->load->library(array('session', 'form_validation', 'user_agent', 'email'));
        // $this->load->library(array('session', 'form_validation', 'upload', 'user_agent', 'email'));
        // !!   library upload masukan satu2 pada tiap function
        $this->load->helper(array('url', 'form', 'text', 'html', 'security', 'file', 'directory', 'number', 'date', 'download', 'tgl_indo'));
	}

	

	public function index()
	{
		$this->app_model->getLogin();
		// $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        $data['table'] = $this->M_penerangan->getPosting()->result();
		$this->load->view('t_penerangan', $data);
        // $this->load->view('t_recor', $data);
        // $this->load->view('upload_view');
	}

    public function laporan()
    {
        $this->app_model->getLogin();
        // $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        $data['semua'] = $this->M_penerangan->getsemuaPosting()->result();
        $this->load->view('t_penerangan_lap', $data);
        // $this->load->view('t_recor', $data);
        // $this->load->view('upload_view');
    }

    public function laporantgl()
    {
        $this->app_model->getLogin();
         if( $this->input->post('tglstart')==null  & $this->input->post('tglend')==null){
            redirect(base_url() . 'penerangan/laporan', 'refresh');
         }
        // $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        $tglstart = $this->input->post('tglstart');
        $tglend = $this->input->post('tglend');
        $data['start'] = $tglstart;
        $data['end'] =$tglend;
        $data['semua'] = $this->M_penerangan->getPostingtgl($tglstart, $tglend)->result();
        $this->load->view('t_penerangan_lap', $data);
        // $this->load->view('t_recor', $data);
        // $this->load->view('upload_view');
    }

    public function detail($id)
    {
        $this->app_model->getLogin();
        if( $id==null){
            redirect(base_url() . 'penerangan/laporan', 'refresh');
         }
        // $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        // $id = $this->input->post('id_penerangan');
        $data['table'] = $this->M_penerangan->getdetailPosting($id)->result();
        $this->load->view('t_penerangan_detail', $data);
        // $this->load->view('t_recor', $data);
        // $this->load->view('upload_view');
    }

    

    public function terkirim()
    {
        $this->app_model->getLogin();
        // $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        $data['semua'] = $this->M_penerangan->getPostingterkirim()->result();
        $this->load->view('t_penerangan_terkirim', $data);
        // $this->load->view('t_recor', $data);
        // $this->load->view('upload_view');
    }

    public function detailterkirim($id )
    {
        $this->app_model->getLogin();
        if(empty($id)){
            redirect(base_url() . 'penerangan/laporan', 'refresh');
         }
        // $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        $data['table'] = $this->M_penerangan->getdetailPosting($id)->result();
        $this->load->view('t_penerangan_detailterkirim', $data);
        // $this->load->view('t_recor', $data);
        // $this->load->view('upload_view');
    }

    public function laporantglterkirim()
    {
        $this->app_model->getLogin();
         if( $this->input->post('tglstart')==null  & $this->input->post('tglend')==null){
            redirect(base_url() . 'penerangan/laporan', 'refresh');
         }
        // $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        $tglstart = $this->input->post('tglstart');
        $tglend = $this->input->post('tglend');
        $data['start'] = $tglstart;
        $data['end'] =$tglend;
        $data['semua'] = $this->M_penerangan->getPostingtglterkirim($tglstart, $tglend)->result();
        $this->load->view('t_penerangan_terkirim', $data);
        // $this->load->view('t_recor', $data);
        // $this->load->view('upload_view');
    }

    public function uploadft()
    {
        $this->app_model->getLogin();
        // $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        // $data['table'] = $this->M_penerangan->getPosting()->result();
        // $this->load->view('t_penerangan', $data);
        $this->load->view('upload_view');
    }


	function getaddress($lat,$lng)
	{
		if(!null == $lat && !null == $lng) {
			$url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
			$json = @file_get_contents($url);
			$data=json_decode($json);
			$status = $data->status;
			if($status=="OK") {
				return $data->results[0]->formatted_address;
			} else {
				return false;
			}
		}
	}

    public function hapus($key){
        $this->app_model->getLogin();
        // $where = array('id' => $key);

        // delete posting mulai
        $this->M_penerangan->delete($key);

        // delete foto mulai
        $foto=$this->db->get_where('foto_penerangan',array('id_posting'=>$key));
        if ($foto->num_rows() > 0) {
            foreach ($foto->result() as $row) {
                $n[] = $row->nama_foto;
            }

            foreach ($n as $nm_foto) {
                if(file_exists($file=FCPATH.'/assets/upload-foto/penerangan/'.$nm_foto)){
                unlink($file);
                }    
            }
            
            $this->db->delete('foto_penerangan',array('id_posting'=>$key));
        }

        // mulai delete foto asli

        $foto_asli=$this->db->get_where('foto_penerangan_asli',array('id_posting'=>$key));
        if ($foto_asli->num_rows() > 0) {
            foreach ($foto_asli->result() as $row_asli) {
                $n_asli[] = $row_asli->nama_foto;
            }

            foreach ($n_asli as $nm_foto_asli) {
                if(file_exists($file_asli=FCPATH.'/assets/upload-foto/penerangan/'.$nm_foto_asli)){
                unlink($file_asli);
                }    
            }
            
            $this->db->delete('foto_penerangan_asli',array('id_posting'=>$key));
        }

        redirect(base_url() . 'penerangan', 'refresh');
    }

    public function hapuslaporan($key){
        $this->app_model->getLogin();
        // $where = array('id' => $key);

        // delete posting mulai
        $this->M_penerangan->delete($key);

        // delete foto mulai
        $foto=$this->db->get_where('foto_penerangan',array('id_posting'=>$key));
        if ($foto->num_rows() > 0) {
            foreach ($foto->result() as $row) {
                $n[] = $row->nama_foto;
            }

            foreach ($n as $nm_foto) {
                if(file_exists($file=FCPATH.'/assets/upload-foto/penerangan/'.$nm_foto)){
                unlink($file);
                }    
            }
            
            $this->db->delete('foto_penerangan',array('id_posting'=>$key));
        }

        // mulai delete foto asli

        $foto_asli=$this->db->get_where('foto_penerangan_asli',array('id_posting'=>$key));
        if ($foto_asli->num_rows() > 0) {
            foreach ($foto_asli->result() as $row_asli) {
                $n_asli[] = $row_asli->nama_foto;
            }

            foreach ($n_asli as $nm_foto_asli) {
                if(file_exists($file_asli=FCPATH.'/assets/upload-foto/penerangan/'.$nm_foto_asli)){
                unlink($file_asli);
                }    
            }
            
            $this->db->delete('foto_penerangan_asli',array('id_posting'=>$key));
        }

        redirect(base_url() . 'penerangan/laporan', 'refresh');
    }

	public function create() {
        $this->app_model->getLogin();

        date_default_timezone_set('Asia/Jakarta');
    	$tgl = date("y-m-d H:i:s");


    	if($this->input->post('gps') == 'teks'){
    		$jalan = $this->input->post('alamatteks');
    		$kota = $this->input->post('kota');
    		$prov = $this->input->post('prov');
    		$alamat = $jalan . ", ". $kota . ", " . $prov;
    	}
    	else{
    		$alamat = $this->input->post('alamat');
    	}


    	// if(!null == $this->input->post('alamat')){
    	// 	$alamat = $this->input->post('alamat');
    	// }
    	// else{
    	// 	$jalan = $this->input->post('alamatteks');
    	// 	$kota = $this->input->post('kota');
    	// 	$prov = $this->input->post('prov');
    	// 	$alamat = $jalan . ", ". $kota . ", " . $prov;
    	// }
    	$data = array(
        	'tanggal' => $tgl,
        	'id_kar' => $this->session->userdata('id_karyawan'),
            'nama_karyawan' => $this->session->userdata('nama_karyawan'),
        	'perusahaan' => $this->input->post('perusahaan'),
        	'vendor' => $this->input->post('vendor'),
        	'status_foto' => $this->input->post('status_foto'),
        	'alamat' => $alamat,
        	'jenis_alamat' => $this->input->post('gps'),
        	'reklame' => $this->input->post('reklame'),
        	'ket' => $this->input->post('keterangan')
        	);
        $this->M_penerangan->get_insert($data);
        redirect(base_url() . 'penerangan', 'refresh' );
        
        // $this->M_kpimmingguan->get_insert($data);
        // redirect(base_url() . 'Kpimmingguan', 'refresh');
    }

    public function edit() {
        $this->app_model->getLogin();
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("y-m-d H:i:s");
        $key = $this->input->post('key');


        if($this->input->post('gpsedit')== 'teks'){
            $jenis_alamat = $this->input->post('gpsedit');
            $jalan = $this->input->post('alamatteks');
            $kota = $this->input->post('kota');
            $prov = $this->input->post('prov');
            $alamat = $jalan . ", ". $kota . ", " . $prov;
        }
        elseif($this->input->post('gpsedit')== 'alamatawal'){
            $jenis_alamat = $this->input->post('jenis_alamatawal');
            $alamat = $this->input->post('alamattetap');
        }
        else{
            $jenis_alamat = $this->input->post('gpsedit');
            $alamat = $this->input->post('alamat');
        }


        // if(!null == $this->input->post('alamat')){
        //  $alamat = $this->input->post('alamat');
        // }
        // else{
        //  $jalan = $this->input->post('alamatteks');
        //  $kota = $this->input->post('kota');
        //  $prov = $this->input->post('prov');
        //  $alamat = $jalan . ", ". $kota . ", " . $prov;
        // }
        $data = array(
            'id_kar' => $this->session->userdata('id_karyawan'),
            'nama_karyawan' => $this->session->userdata('nama_karyawan'),
            'perusahaan' => $this->input->post('perusahaan'),
            'vendor' => $this->input->post('vendor'),
            'status_foto' => $this->input->post('status_foto'),
            'alamat' => $alamat,
            'jenis_alamat' => $jenis_alamat,
            'reklame' => $this->input->post('reklame'),
            'ket' => $this->input->post('keterangan')
            );
        $this->M_penerangan->get_update($key, $data);
        redirect(base_url() . 'penerangan', 'refresh' );
        
        // $this->M_kpimmingguan->get_insert($data);
        // redirect(base_url() . 'Kpimmingguan', 'refresh');
    }

    /************************Dropzone*************************/
    // view ne nang upload_view.php

    /*
    gawe table jenenge foto
    colomn id, nama_foto, token

    */

    //Untuk proses upload foto
    function proses_upload($id_posting){

        $config['upload_path']   = './assets/upload-foto/penerangan/';
        $config['allowed_types'] = 'gif|jpg|png|ico|jpeg';
        $this->load->library('upload', $config);

        if($this->upload->do_upload('userfile')){
            $token=$this->input->post('token_foto');
            $nama=$this->upload->data('file_name');
            $iki=$this->upload->data('');
            $ygupload=$this->session->userdata('id_karyawan');
            $alamat=$this->input->post('alamat');
            $tgl = $this->input->post('tgl');
            $reklame = $this->input->post('reklame');
            date_default_timezone_set('Asia/Jakarta');
            $tglsekarang = "Pukul : " . date("H:i") . ", Tanggal : " . date("d-m-Y");
            $ket_alamat = 'Alamat via : ' . $this->input->post('ket_alamat');
            $perusahaan = $this->input->post('perusahaan');
            $jenis_foto = 'Jenis Foto : ' .  $this->input->post('jenis_foto');
            $jns_ft = $this->input->post('jenis_foto');
            $isi = "./assets/img/watermark.png";
            $bg =  "./assets/img/bgwatermark.png";

            if ($perusahaan == 'PT. Multi Artistikacithra Advertising') { $isi =  "./assets/img/watermark_match.png";
            } ;

            if ($perusahaan == 'PT. Wijaya Persada Indonesia') { $isi =  "./assets/img/watermark_wiper.png";
            } ;

            if ($perusahaan == 'Vendor') { $isi =  "./assets/img/watermark_vendor.png";
            } ;


            // watermark dari web orang
            $config["image"]['source_image'] = $iki['full_path'];
            $this->load->library('image_lib', $config["image"]);
            $config["image"]['wm_overlay_path'] = $isi;
            $config["image"]['wm_type'] = 'overlay';
            $config["image"]['width'] = '1000';
            // $config["image"]['wm_width'] = '3';
            $config["image"]['height'] = 'auto';
            // $config["image"]['wm_padding'] = '15';
            $config["image"]['wm_opacity'] = '70';
            $config["image"]['wm_vrt_alignment'] = 'top';
            $config["image"]['wm_hor_alignment'] = 'right';
            // $config["image"]['wm_vrt_offset'] = '10';
            $this->image_lib->initialize($config["image"]);
            $this->image_lib->resize();
            $this->image_lib->watermark();

            // watermark dari web orang (background)
            $config["bgwatermarkku"]['source_image'] = $iki['full_path'];
            $this->load->library('image_lib', $config["bgwatermarkku"]);
            $config["bgwatermarkku"]['wm_overlay_path'] = $bg;
            $config["bgwatermarkku"]['wm_type'] = 'overlay';
            $config["bgwatermarkku"]['width'] = '1000';
            // $config["image"]['wm_width'] = '3';
            $config["bgwatermarkku"]['height'] = 'auto';
            // $config["image"]['wm_padding'] = '15';
            $config["bgwatermarkku"]['wm_opacity'] = '70';
            $config["bgwatermarkku"]['wm_vrt_alignment'] = 'bottom';
            $config["bgwatermarkku"]['wm_hor_alignment'] = 'center';
            // $config["image"]['wm_vrt_offset'] = '10';
            $this->image_lib->initialize($config["bgwatermarkku"]);
            $this->image_lib->resize();
            $this->image_lib->watermark();


            $config["manipulation"]['source_image'] = $iki['full_path'];
            $this->load->library('image_lib', $config["manipulation"]); 
            $config["manipulation"]['wm_text'] =  $reklame; 
            $config["manipulation"]['wm_font_path'] = './system/fonts/Exo2-Italic.ttf';
            $config["manipulation"]['wm_type'] = 'text';
            $config["manipulation"]['wm_font_size'] = '18';
            $config["manipulation"]['wm_font_color'] = '#ffffff';
            $config["manipulation"]['wm_vrt_alignment'] = 'bottom';
            $config["manipulation"]['wm_vrt_offset'] = '-115';
            // $config["manipulation"]['wm_hor_offset'] = '10';
            // $config["manipulation"]['wm_padding'] = '10';
            $config["manipulation"]['wm_hor_alignment'] = 'center';
            $this->image_lib->initialize($config["manipulation"]); 
            $this->image_lib->watermark(); 

            $config["reklameku"]['source_image'] = $iki['full_path'];
            $this->load->library('image_lib', $config["reklameku"]); 
            $config["reklameku"]['wm_text'] = $alamat;
            $config["reklameku"]['wm_font_path'] = './system/fonts/Exo2-Italic.ttf';
            $config["reklameku"]['wm_type'] = 'text';
            $config["reklameku"]['wm_font_size'] = '18';
            $config["reklameku"]['wm_font_color'] = '#ffffff';
            $config["reklameku"]['wm_vrt_alignment'] = 'bottom';
            $config["reklameku"]['wm_padding'] = '10';
            $config["reklameku"]['wm_hor_alignment'] = 'center';
            $this->image_lib->initialize($config["reklameku"]); 
            $this->image_lib->watermark();

            $config["teks2"]['source_image'] = $iki['full_path'];
            $this->load->library('image_lib', $config["teks2"]); 
            $config["teks2"]['wm_text'] = $ket_alamat;
            $config["teks2"]['wm_font_path'] = './system/fonts/Exo2-Italic.ttf';
            $config["teks2"]['wm_type'] = 'text';
            $config["teks2"]['wm_font_size'] = '18';
            $config["teks2"]['wm_font_color'] = '#ffffff';
            $config["teks2"]['wm_vrt_alignment'] = 'bottom';
            $config["teks2"]['wm_padding'] = '20';
            $config["teks2"]['wm_hor_alignment'] = 'center';
            $this->image_lib->initialize($config["teks2"]); 
            $this->image_lib->watermark();

            $config["teks3"]['source_image'] = $iki['full_path'];
            $this->load->library('image_lib', $config["teks3"]); 
            $config["teks3"]['wm_text'] = $jenis_foto;
            $config["teks3"]['wm_font_path'] = './system/fonts/Exo2-Italic.ttf';
            $config["teks3"]['wm_type'] = 'text';
            $config["teks3"]['wm_font_size'] = '18';
            $config["teks3"]['wm_font_color'] = '#ffffff';
            $config["teks3"]['wm_vrt_alignment'] = 'bottom';
            $config["teks3"]['wm_padding'] = '30';
            $config["teks3"]['wm_hor_alignment'] = 'center';
            $this->image_lib->initialize($config["teks3"]); 
            $this->image_lib->watermark();

            $config["teks4"]['source_image'] = $iki['full_path'];
            $this->load->library('image_lib', $config["teks4"]); 
            $config["teks4"]['wm_text'] = $tglsekarang;
            $config["teks4"]['wm_font_path'] = './system/fonts/Exo2-Italic.ttf';
            $config["teks4"]['wm_type'] = 'text';
            $config["teks4"]['wm_font_size'] = '18';
            $config["teks4"]['wm_font_color'] = '#ffffff';
            $config["teks4"]['wm_vrt_alignment'] = 'bottom';
            $config["teks4"]['wm_padding'] = '40';
            $config["teks4"]['wm_hor_alignment'] = 'center';
            $this->image_lib->initialize($config["teks4"]); 
            $this->image_lib->watermark();

            



            
            // watermark selesai

            // watermark dari web CI 
            // $this->load->library('image_lib', $config); 
            // $config['source_image'] = $gbr['full_path'];
            // $config['wm_text'] = 'Copyright 2017 - Fadkhur Rachman Dzaky';
            // $config['wm_type'] = 'text';
            // $config['wm_font_path'] = './system/fonts/Exo2-Italic.ttf';
            // $config['wm_font_size'] = '16';
            // $config['wm_font_color'] = 'ffffff';
            // $config['wm_vrt_alignment'] = 'bottom';
            // $config['wm_hor_alignment'] = 'center';
            // // $config['wm_padding'] = '300px';
            // $this->load->library('image_lib', $config); 
            // $this->image_lib->initialize($config);
            // $this->image_lib->watermark();
            // stop watermark CI

            

            $this->db->insert('foto_penerangan',array('nama_foto'=>$nama, 'id_posting'=>$id_posting, 'id_kar_upload'=>$ygupload, 'jenis_foto'=>$jns_ft, 'token'=>$token));



        }

        $this->proses_upload_asli($id_posting);


    }

    function proses_upload_asli($id_posting){

        $config2['upload_path']   = './assets/x/';
        $config2['allowed_types'] = 'gif|jpg|png|ico|jpeg';
        $this->load->library('upload', $config2);

        if($this->upload->do_upload('userfile')){
            $token=$this->input->post('token_foto');
            $nama=$this->upload->data('file_name');
            $iki2=$this->upload->data('');
            $ygupload=$this->session->userdata('id_karyawan');
            $alamat=$this->input->post('alamat');
            $tgl = $this->input->post('tgl');
            $reklame = $this->input->post('reklame');
            date_default_timezone_set('Asia/Jakarta');
            $tglsekarang = "Pukul : " . date("H:i") . ", Tanggal : " . date("d-m-Y");
            $ket_alamat = 'Alamat via : ' . $this->input->post('ket_alamat');
            $perusahaan = $this->input->post('perusahaan');
            $jenis_foto = 'Jenis Foto : ' .  $this->input->post('jenis_foto') ;
            $jns_ft = $this->input->post('jenis_foto');
            $isi = "./assets/img/watermark.png";
            $bg =  "./assets/img/bgwatermark.png";

            if ($perusahaan == 'PT. Multi Artistikacithra Advertising') { $isi =  "./assets/img/watermark_match.png";
            } ;

            if ($perusahaan == 'PT. Wijaya Persada Indonesia') { $isi =  "./assets/img/watermark_wiper.png";
            } ;

            if ($perusahaan == 'Vendor') { $isi =  "./assets/img/watermark_vendor.png";
            } ;

            // watermark dari web orang (background)
            $config["bgwatermarkku"]['source_image'] = $iki2['full_path'];
            $this->load->library('image_lib', $config["bgwatermarkku"]);
            $config["bgwatermarkku"]['wm_overlay_path'] = $bg;
            $config["bgwatermarkku"]['wm_type'] = 'overlay';
            $config["bgwatermarkku"]['width'] = '1000';
            // $config["image"]['wm_width'] = '3';
            $config["bgwatermarkku"]['height'] = 'auto';
            $config["bgwatermarkku"]['wm_opacity'] = '70';
            $config["bgwatermarkku"]['wm_vrt_alignment'] = 'bottom';
            $config["bgwatermarkku"]['wm_hor_alignment'] = 'center';
            $config["bgwatermarkku"]['wm_hor_offset'] = '0';
            // $config["bgwatermarkku"]['wm_vrt_offset'] = '1';
            $config["bgwatermarkku"]['wm_padding'] = '-10';
            $this->image_lib->initialize($config["bgwatermarkku"]);
            $this->image_lib->resize();
            $this->image_lib->watermark();

            $config["manipulation"]['source_image'] = $iki2['full_path'];
            $this->load->library('image_lib', $config["manipulation"]); 
            $config["manipulation"]['wm_text'] =  $reklame; 
            $config["manipulation"]['wm_font_path'] = './system/fonts/Exo2-Italic.ttf';
            $config["manipulation"]['wm_type'] = 'text';
            $config["manipulation"]['wm_font_size'] = '18';
            $config["manipulation"]['wm_font_color'] = '#ffffff';
            $config["manipulation"]['wm_vrt_alignment'] = 'bottom';
            $config["manipulation"]['wm_vrt_offset'] = '-115';
            $config["manipulation"]['wm_hor_offset'] = '10';
            $config["manipulation"]['wm_padding'] = '0';
            $config["manipulation"]['wm_hor_alignment'] = 'center';
            $this->image_lib->initialize($config["manipulation"]); 
            $this->image_lib->watermark(); 

            $config["reklameku"]['source_image'] = $iki2['full_path'];
            $this->load->library('image_lib', $config["reklameku"]); 
            $config["reklameku"]['wm_text'] = $alamat;
            $config["reklameku"]['wm_font_path'] = './system/fonts/Exo2-Italic.ttf';
            $config["reklameku"]['wm_type'] = 'text';
            $config["reklameku"]['wm_font_size'] = '18';
            $config["reklameku"]['wm_font_color'] = '#ffffff';
            $config["reklameku"]['wm_vrt_alignment'] = 'bottom';
            $config["reklameku"]['wm_padding'] = '10';
            $config["reklameku"]['wm_hor_alignment'] = 'center';
            $this->image_lib->initialize($config["reklameku"]); 
            $this->image_lib->watermark();

            $config["teks2"]['source_image'] = $iki2['full_path'];
            $this->load->library('image_lib', $config["teks2"]); 
            $config["teks2"]['wm_text'] = $ket_alamat;
            $config["teks2"]['wm_font_path'] = './system/fonts/Exo2-Italic.ttf';
            $config["teks2"]['wm_type'] = 'text';
            $config["teks2"]['wm_font_size'] = '18';
            $config["teks2"]['wm_font_color'] = '#ffffff';
            $config["teks2"]['wm_vrt_alignment'] = 'bottom';
            $config["teks2"]['wm_padding'] = '20';
            $config["teks2"]['wm_hor_alignment'] = 'center';
            $this->image_lib->initialize($config["teks2"]); 
            $this->image_lib->watermark();

            $config["teks3"]['source_image'] = $iki2['full_path'];
            $this->load->library('image_lib', $config["teks3"]); 
            $config["teks3"]['wm_text'] = $jenis_foto;
            $config["teks3"]['wm_font_path'] = './system/fonts/Exo2-Italic.ttf';
            $config["teks3"]['wm_type'] = 'text';
            $config["teks3"]['wm_font_size'] = '18';
            $config["teks3"]['wm_font_color'] = '#ffffff';
            $config["teks3"]['wm_vrt_alignment'] = 'bottom';
            $config["teks3"]['wm_padding'] = '30';
            $config["teks3"]['wm_hor_alignment'] = 'center';
            $this->image_lib->initialize($config["teks3"]); 
            $this->image_lib->watermark();

            $config["teks4"]['source_image'] = $iki2['full_path'];
            $this->load->library('image_lib', $config["teks4"]); 
            $config["teks4"]['wm_text'] = $tglsekarang;
            $config["teks4"]['wm_font_path'] = './system/fonts/Exo2-Italic.ttf';
            $config["teks4"]['wm_type'] = 'text';
            $config["teks4"]['wm_font_size'] = '18';
            $config["teks4"]['wm_font_color'] = '#ffffff';
            $config["teks4"]['wm_vrt_alignment'] = 'bottom';
            $config["teks4"]['wm_padding'] = '40';
            $config["teks4"]['wm_hor_alignment'] = 'center';
            $this->image_lib->initialize($config["teks4"]); 
            $this->image_lib->watermark();              



            

            $this->db->insert('foto_penerangan_asli',array('nama_foto'=>$nama, 'id_posting'=>$id_posting, 'id_kar_upload'=>$ygupload, 'jenis_foto'=>$jns_ft, 'token'=>$token));


        }


    }

    public function lakukan_download($nama_foto){             
        force_download('./assets/upload-foto/penerangan/'.$nama_foto,NULL);
    }

    public function lakukan_download_asli($token){
        $data = $this->db->get_where('foto_penerangan_asli', array('token' => $token))->result();
        foreach ($data as $key) {
            force_download('./assets/upload-foto/penerangan/'.$key->nama_foto,NULL);
        }

        // force_download('./assets/upload-foto/recovering/'.$foto_asli,NULL);
    } 

    //Untuk menghapus foto
    function remove_foto(){

        //Ambil token foto
        $token=$this->input->post('token');

        
        $foto=$this->db->get_where('foto_penerangan',array('token'=>$token));


        if($foto->num_rows()>0){
            $hasil=$foto->row();
            $nama_foto=$hasil->nama_foto;
            if(file_exists($file=FCPATH.'/assets/upload-foto/penerangan/'.$nama_foto)){
                unlink($file);
            }
            $this->db->delete('foto_penerangan',array('token'=>$token));

        }


        echo "{}";

        $this->remove_foto_asli();
    }

    //Untuk menghapus foto
    function remove_foto_asli(){

        //Ambil token foto
        $token=$this->input->post('token');

        
        $foto=$this->db->get_where('foto_penerangan_asli',array('token'=>$token));


        if($foto->num_rows()>0){
            $hasil=$foto->row();
            $nama_foto=$hasil->nama_foto;
            if(file_exists($file=FCPATH.'/assets/upload-foto/penerangan/'.$nama_foto)){
                unlink($file);
            }
            $this->db->delete('foto_penerangan_asli',array('token'=>$token));

        }


        echo "{}";
    }

    function hapus_fotosatu($id){

        //Ambil token foto
        // $token=$this->input->post('token');

        
        $foto=$this->db->get_where('foto_penerangan',array('id'=>$id));


        if($foto->num_rows()>0){
            $hasil=$foto->row();
            $nama_foto=$hasil->nama_foto;
            $tokenku = $hasil->token;
            if(file_exists($file=FCPATH.'/assets/upload-foto/penerangan/'.$nama_foto)){
                unlink($file);
            }
            $this->db->delete('foto_penerangan',array('id'=>$id));

        }

        // $data_foto = $this->db->get_where('foto_penerangan', array('id_posting' => $posting->id_penerangan, 'jenis_foto' => '50'))->result();


        // echo "{}";
        // redirect(base_url() . 'penerangan', 'refresh');
        $this->hapus_fotosatu_asli($tokenku);
        
    }

    function hapus_fotosatu_asli($tokenku){

        //Ambil token foto
        // $token=$this->input->post('token');

        
        $foto=$this->db->get_where('foto_penerangan_asli',array('token'=>$tokenku));


        if($foto->num_rows()>0){
            $hasil=$foto->row();
            $nama_foto=$hasil->nama_foto;
            if(file_exists($file=FCPATH.'/assets/upload-foto/penerangan/'.$nama_foto)){
                unlink($file);
            }
            $this->db->delete('foto_penerangan_asli',array('token'=>$tokenku));

        }


        // echo "{}";
        redirect(base_url() . 'penerangan', 'refresh');
    }

    public function updatestatus(){
        $this->app_model->getLogin();
         $key = $this->session->userdata('id_karyawan');
         $id = $this->input->post('id');
        $data = array(
             'id_status' => $this->input->post('isistatus'),
             // id_status : jika 1 sudah send, jika 0 belum send
            );
        $this->M_penerangan->updatestatus($key, $id, $data);

       redirect(base_url() . 'penerangan', 'refresh');
    }

}
