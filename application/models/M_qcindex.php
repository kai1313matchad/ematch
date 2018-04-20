<?php

class M_qcindex extends CI_Model {

	var $table = 'pondasi';
	function __construct() {
        parent::__construct();
    }

    

    function getrecovering(){
       	$this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array('id_status ' => '1' , 'id_kar' => $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_status' => '1');
        

        $this->db->from('recovering');
        // $this->db->join('foto_pondasi', 'foto_pondasi.id_posting = pondasi.id_pondasi');
        $this->db->where($tampilkan);
        $this->db->order_by("id_recovering", "desc");
        $this->db->limit(1);
        $query = $this->db->get();
    	return $query;
    }

    function getpondasi(){
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array('id_status ' => '1' , 'id_kar' => $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_status' => '1');
        

        $this->db->from('pondasi');
        // $this->db->join('foto_pondasi', 'foto_pondasi.id_posting = pondasi.id_pondasi');
        $this->db->where($tampilkan);
        $this->db->order_by("id_pondasi", "desc");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }

    function gettiang(){
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array('id_status ' => '1' , 'id_kar' => $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_status' => '1');
        

        $this->db->from('tiang');
        // $this->db->join('foto_pondasi', 'foto_pondasi.id_posting = pondasi.id_pondasi');
        $this->db->where($tampilkan);
        $this->db->order_by("id_tiang", "desc");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }

    function getkonstruksi(){
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array('id_status ' => '1' , 'id_kar' => $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_status' => '1');
        

        $this->db->from('konstruksi');
        // $this->db->join('foto_pondasi', 'foto_pondasi.id_posting = pondasi.id_pondasi');
        $this->db->where($tampilkan);
        $this->db->order_by("id_konstruksi", "desc");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }

    function getpenerangan(){
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array('id_status ' => '1' , 'id_kar' => $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_status' => '1');
        

        $this->db->from('penerangan');
        // $this->db->join('foto_pondasi', 'foto_pondasi.id_posting = pondasi.id_pondasi');
        $this->db->where($tampilkan);
        $this->db->order_by("id_penerangan", "desc");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }

    

    


}