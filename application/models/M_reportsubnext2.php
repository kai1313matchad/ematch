<?php

class M_reportsubnext2 extends CI_Model {

	var $table = 'kpim_next';
    var $tablenilai = 'tnilai';
	function __construct() {
        parent::__construct();
    }

    public function getJabatan($keyjabatan) {
        $this->db->select("*");
        $this->db->from("karyawan");
        $this->db->join("akses","karyawan.id_jabatan = akses.id_akses");
        $this->db->where("id_karyawan", $keyjabatan);

        $query = $this->db->get();

        return $query;
    }

    public function getDept($keydept) {
        $query = $this->db->query('SELECT *, group_concat(distinct nama_dept SEPARATOR ", ") as deptini FROM karyawan
     join dept on find_in_set(dept.id_dept, karyawan.dept) join akses on akses.id_akses = karyawan.id_jabatan
     where karyawan.id_karyawan = "'.$keydept.'"
     GROUP BY karyawan.id_karyawan');
        return $query;
        // $this->db->select("*");
        // $this->db->from("karyawan");
        // $this->db->join("dept","karyawan.dept = dept.id_dept");
        // $this->db->where("id_karyawan", $keydept);

        // $query = $this->db->get();

        // return $query;
    }

    public function ambilkaryawanall(){
        $query = $this->db->get('karyawan');
         return $query;
    }

    public function getStatus($keystatus) {
        $this->db->select("*");
        $this->db->from("kpim_next");
        $this->db->where("id_status", $keystatus);

        $query = $this->db->get();

        return $query;
    }

    function tampilkan($tampilkar){
        $this->db->select("*");
        $this->db->where("id_karyawan", $tampilkar);
        

        $this->db->from('kpim_next');
        $query = $this->db->get();
        return $query;
    }

    function tampilkannamakar($tampilkar){
        $this->db->select("*");
        $this->db->where("id_karyawan", $tampilkar);
        $this->db->from('karyawan');
        $query = $this->db->get();
        return $query->row();
    }

    function getAll($keyid, $tglstart, $tglend) {
        //$this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        //$tampilkan = array('id_status ' => '2' , 'id_karyawan ' => $this->session->userdata('id_karyawan'));
        //$this->db->where($tampilkan);

       //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        $this->db->select("*");
        $this->db->from('kpim_next');
        $this->db->join('dept', 'dept.id_dept = kpim_next.tgs_dept');
        $this->db->join('karyawan', 'karyawan.id_karyawan = kpim_next.id_karyawan');
        $this->db->where('kpim_next.id_karyawan', $keyid);
        $this->db->where('kpim_next.tgl >=', $tglstart);
        $this->db->where('kpim_next.tgl <=', $tglend);
        $this->db->where('kpim_next.id_status', '2');
        $this->db->order_by('tgl', 'asc');
        $query = $this->db->get();
        return $query;

    	//$getb = $this->db->get($this->table);
    	//return $getb;
    }

    function delete($key){
        $this->db->where('id',$key);
        $this->db->delete($this->table);
    }    

    //fungsi insert ke database
    function get_insertnilai($data){
       	$this->db->insert($this->tablenilai, $data);
      	return TRUE;
    }

    function get_update($data, $key){
        $this->db->where("id", $key);
        $this->db->update($this->table, $data);
        return TRUE;
    }

    function get_updateapprove($data, $key){
        $this->db->where("id", $key);
        $this->db->update($this->table, $data);
        return TRUE;
    }

   
}
