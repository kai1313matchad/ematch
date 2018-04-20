<?php

class M_addkaryawan extends CI_Model {

	var $table = 'karyawan';
    var $gallery_path;
    var $resized_path;

	function __construct() {
        parent::__construct();
        $this->resized_path = realpath(APPPATH. '../assets/ft_profil');
        $this->gallery_path = realpath(APPPATH . '../assets/ft_profil/');
        $this->load->library('image_lib');
    }

    function ambil_idterakhir(){
        $query = $this->db->select('id_karyawan')->order_by('id_karyawan','desc')->limit(1)->get('karyawan')->row('id_karyawan');
        return $query;
        
    }


    function get_insert($data){
       	$this->db->insert($this->table, $data);
      	return TRUE;
    }

    function getAll(){
    
    $query = $this->db->get('akses');
    //$query = $this->db->query('SELECT id_akses FROM akses');


        return $query->result();
    }

    function do_upload($nama_file) {

    
        $config2 = array(
            'allowed_types' => 'jpg|jpeg|gif|png',
            'upload_path' => $this->gallery_path,
            'max_size' => 20000
        );
        
        $this->load->library('upload', $config2);
        //$this->upload->do_upload($nama_file);
        $data = $this->upload->data($nama_file);
        $image_data = $this->upload->data();
        $nama_filenya = $image_data['file_name'];

        $config = array(
            'source_image'      => $image_data['full_path'], //path to the uploaded image
            'new_image'         => $this->resized_path . '/resized', //path to
            'maintain_ratio'    => true,
            'width'             => 300,
            'height'            => 300
        );

        $this->image_lib->initialize($config);
        $this->image_lib->resize();

        return $nama_filenya;
    }

}