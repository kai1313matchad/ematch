<?php

class M_tiang extends CI_Model {

	var $table = 'tiang';
	function __construct() {
        parent::__construct();
    }

    //fungsi insert ke database
    function get_insert($data){
       	$this->db->insert($this->table, $data);
      	return TRUE;
    }

    function get_update($key, $data){
    	$this->db->where("id_tiang", $key);
       	$this->db->update($this->table, $data);
      	return TRUE;
    }

    function delete($key){
        $this->db->where('id_tiang',$key);
        $this->db->delete($this->table);
    }   

    function getPosting(){
       	$this->db->select("*");
        $tampilkan = array('id_kar' => $this->session->userdata('id_karyawan'), 'id_status' => '0');
        $this->db->from('tiang');
        $this->db->where($tampilkan);
        $this->db->order_by("id_tiang","desc");
        $query = $this->db->get();
    	return $query;
    }

    

    function getsemuaPosting(){
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array('id_status ' => '1' , 'id_kar' => $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_status' => '1');
        

        $this->db->from('tiang');
        // $this->db->join('foto_tiang', 'foto_tiang.id_posting = tiang.id_tiang');
        $this->db->where($tampilkan);
        $this->db->order_by("id_tiang","desc");
        $query = $this->db->get();
        return $query;
    }

    function getPostingtgl($tglstart, $tglend){
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array('id_status ' => '1' , 'id_kar' => $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_status' => '1');
        

        $this->db->from('tiang');
        // $this->db->join('foto_tiang', 'foto_tiang.id_posting = tiang.id_tiang');
        $this->db->where($tampilkan);
        $this->db->where('tanggal >=', $tglstart);
        $this->db->where('tanggal <=', $tglend);   
        $this->db->order_by("id_tiang","desc");
        $query = $this->db->get();
        return $query;
    }

    function getdetailPosting($id){
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array('id_status ' => '1' , 'id_kar' => $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_tiang' => $id);
        

        $this->db->from('tiang');
        // $this->db->join('foto_tiang', 'foto_tiang.id_posting = tiang.id_tiang');
        $this->db->where($tampilkan);
        $this->db->order_by("id_tiang","desc");
        $query = $this->db->get();
        return $query;
    }

    function getPostingterkirim(){
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array('id_status ' => '1' , 'id_kar' => $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_kar' => $this->session->userdata('id_karyawan'), 'id_status' => '1');
        

        $this->db->from('tiang');
        // $this->db->join('foto_tiang', 'foto_tiang.id_posting = tiang.id_tiang');
        $this->db->where($tampilkan);
        $this->db->order_by("id_tiang","desc");
        $query = $this->db->get();
        return $query;
    }

    function getPostingtglterkirim($tglstart, $tglend){
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array('id_status ' => '1' , 'id_kar' => $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_status' => '1', 'id_kar' => $this->session->userdata('id_karyawan'));
        

        $this->db->from('tiang');
        // $this->db->join('foto_tiang', 'foto_tiang.id_posting = tiang.id_tiang');
        $this->db->where($tampilkan);
        $this->db->where('tanggal >=', $tglstart);
        $this->db->where('tanggal <=', $tglend);   
        $this->db->order_by("id_tiang","desc");
        $query = $this->db->get();
        return $query;
    }

    function updatestatus($key, $id, $data){
        $this->db->where("id_kar", $key);
        $this->db->where("id_tiang", $id);
        $this->db->update($this->table, $data);
        return TRUE;
    }
    


}