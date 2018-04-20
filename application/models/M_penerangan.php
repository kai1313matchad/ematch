<?php

class M_penerangan extends CI_Model {

	var $table = 'penerangan';
	function __construct() {
        parent::__construct();
    }

    //fungsi insert ke database
    function get_insert($data){
       	$this->db->insert($this->table, $data);
      	return TRUE;
    }

    function get_update($key, $data){
    	$this->db->where("id_penerangan", $key);
       	$this->db->update($this->table, $data);
      	return TRUE;
    }

    function delete($key){
        $this->db->where('id_penerangan',$key);
        $this->db->delete($this->table);
    }   

    function getPosting(){
       	$this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array('id_status ' => '1' , 'id_kar' => $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_kar' => $this->session->userdata('id_karyawan'), 'id_status' => '0');
        

        $this->db->from('penerangan');
        // $this->db->join('foto_penerangan', 'foto_penerangan.id_posting = penerangan.id_penerangan');
        $this->db->where($tampilkan);
        $this->db->order_by("id_penerangan","desc");
        $query = $this->db->get();
    	return $query;
    }

    

    function getsemuaPosting(){
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array('id_status ' => '1' , 'id_kar' => $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_status' => '1');
        

        $this->db->from('penerangan');
        // $this->db->join('foto_penerangan', 'foto_penerangan.id_posting = penerangan.id_penerangan');
        $this->db->where($tampilkan);
        $this->db->order_by("id_penerangan","desc");
        $query = $this->db->get();
        return $query;
    }

    function getPostingtgl($tglstart, $tglend){
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array('id_status ' => '1' , 'id_kar' => $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_status' => '1');
        

        $this->db->from('penerangan');
        // $this->db->join('foto_penerangan', 'foto_penerangan.id_posting = penerangan.id_penerangan');
        $this->db->where($tampilkan);
        $this->db->where('tanggal >=', $tglstart);
        $this->db->where('tanggal <=', $tglend);   
        $this->db->order_by("id_penerangan","desc");
        $query = $this->db->get();
        return $query;
    }

    function getdetailPosting($id){
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array('id_status ' => '1' , 'id_kar' => $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_penerangan' => $id);
        

        $this->db->from('penerangan');
        // $this->db->join('foto_penerangan', 'foto_penerangan.id_posting = penerangan.id_penerangan');
        $this->db->where($tampilkan);
        $this->db->order_by("id_penerangan","desc");
        $query = $this->db->get();
        return $query;
    }

    function getPostingterkirim(){
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array('id_status ' => '1' , 'id_kar' => $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_kar' => $this->session->userdata('id_karyawan'), 'id_status' => '1');
        

        $this->db->from('penerangan');
        // $this->db->join('foto_penerangan', 'foto_penerangan.id_posting = penerangan.id_penerangan');
        $this->db->where($tampilkan);
        $this->db->order_by("id_penerangan","desc");
        $query = $this->db->get();
        return $query;
    }

    function getPostingtglterkirim($tglstart, $tglend){
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array('id_status ' => '1' , 'id_kar' => $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_status' => '1', 'id_kar' => $this->session->userdata('id_karyawan'));
        

        $this->db->from('penerangan');
        // $this->db->join('foto_penerangan', 'foto_penerangan.id_posting = penerangan.id_penerangan');
        $this->db->where($tampilkan);
        $this->db->where('tanggal >=', $tglstart);
        $this->db->where('tanggal <=', $tglend);   
        $this->db->order_by("id_penerangan","desc");
        $query = $this->db->get();
        return $query;
    }

    function updatestatus($key, $id, $data){
        $this->db->where("id_kar", $key);
        $this->db->where("id_penerangan", $id);
        $this->db->update($this->table, $data);
        return TRUE;
    }
    


}