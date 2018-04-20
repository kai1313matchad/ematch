<?php

class M_konstruksi extends CI_Model {

	var $table = 'konstruksi';
	function __construct() {
        parent::__construct();
    }

    //fungsi insert ke database
    function get_insert($data){
       	$this->db->insert($this->table, $data);
      	return TRUE;
    }

    function get_update($key, $data){
    	$this->db->where("id_konstruksi", $key);
       	$this->db->update($this->table, $data);
      	return TRUE;
    }

    function delete($key){
        $this->db->where('id_konstruksi',$key);
        $this->db->delete($this->table);
    }   

    function getPosting(){
       	$this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array('id_status ' => '1' , 'id_kar' => $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_kar' => $this->session->userdata('id_karyawan'), 'id_status' => '0');
        

        $this->db->from('konstruksi');
        // $this->db->join('foto_konstruksi', 'foto_konstruksi.id_posting = konstruksi.id_konstruksi');
        $this->db->where($tampilkan);
        $this->db->order_by("id_konstruksi","desc");
        $query = $this->db->get();
    	return $query;
    }

    

    function getsemuaPosting(){
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array('id_status ' => '1' , 'id_kar' => $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_status' => '1');
        

        $this->db->from('konstruksi');
        // $this->db->join('foto_konstruksi', 'foto_konstruksi.id_posting = konstruksi.id_konstruksi');
        $this->db->where($tampilkan);
        $this->db->order_by("id_konstruksi","desc");
        $query = $this->db->get();
        return $query;
    }

    function getPostingtgl($tglstart, $tglend){
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array('id_status ' => '1' , 'id_kar' => $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_status' => '1');
        

        $this->db->from('konstruksi');
        // $this->db->join('foto_konstruksi', 'foto_konstruksi.id_posting = konstruksi.id_konstruksi');
        $this->db->where($tampilkan);
        $this->db->where('tanggal >=', $tglstart);
        $this->db->where('tanggal <=', $tglend);   
        $this->db->order_by("id_konstruksi","desc");
        $query = $this->db->get();
        return $query;
    }

    function getdetailPosting($id){
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array('id_status ' => '1' , 'id_kar' => $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_konstruksi' => $id);
        

        $this->db->from('konstruksi');
        // $this->db->join('foto_konstruksi', 'foto_konstruksi.id_posting = konstruksi.id_konstruksi');
        $this->db->where($tampilkan);
        $this->db->order_by("id_konstruksi","desc");
        $query = $this->db->get();
        return $query;
    }

    function getPostingterkirim(){
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array('id_status ' => '1' , 'id_kar' => $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_kar' => $this->session->userdata('id_karyawan'), 'id_status' => '1');
        

        $this->db->from('konstruksi');
        // $this->db->join('foto_konstruksi', 'foto_konstruksi.id_posting = konstruksi.id_konstruksi');
        $this->db->where($tampilkan);
        $this->db->order_by("id_konstruksi","desc");
        $query = $this->db->get();
        return $query;
    }

    function getPostingtglterkirim($tglstart, $tglend){
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array('id_status ' => '1' , 'id_kar' => $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_status' => '1', 'id_kar' => $this->session->userdata('id_karyawan'));
        

        $this->db->from('konstruksi');
        // $this->db->join('foto_konstruksi', 'foto_konstruksi.id_posting = konstruksi.id_konstruksi');
        $this->db->where($tampilkan);
        $this->db->where('tanggal >=', $tglstart);
        $this->db->where('tanggal <=', $tglend);   
        $this->db->order_by("id_konstruksi","desc");
        $query = $this->db->get();
        return $query;
    }

    function updatestatus($key, $id, $data){
        $this->db->where("id_kar", $key);
        $this->db->where("id_konstruksi", $id);
        $this->db->update($this->table, $data);
        return TRUE;
    }
    


}