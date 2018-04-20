<?php

class M_reportsub extends CI_Model {

	var $table = 'kpim_karyawan';
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

     public function getDept2($id) {
        $this->db->select("*");
        $this->db->from("dept");
        $this->db->where("id_dept", $id);

        $query = $this->db->get();

        return $query;
    }

    public function ambilkaryawanall(){
        $query = $this->db->get('karyawan');
         return $query;
    }

    public function getStatus($keystatus) {
        $this->db->select("*");
        $this->db->from("kpim_karyawan");
        $this->db->where("id_status", $keystatus);

        $query = $this->db->get();

        return $query;
    }

    function tampilkan($tampilkar){
        $this->db->select("*");
        $this->db->where("id_karyawan", $tampilkar);
        

        $this->db->from('kpim_karyawan');
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

    function ambilsemua($keyid, $tglstart, $tglend) {
        $this->db->select("*");
        $this->db->from('kpim_karyawan');
        $this->db->join('dept', 'dept.id_dept = kpim_karyawan.tgs_dept');
        $this->db->join('karyawan', 'karyawan.id_karyawan = kpim_karyawan.id_karyawan');
        $this->db->where('kpim_karyawan.id_karyawan', $keyid);
        $this->db->where('kpim_karyawan.tgl >=', $tglstart);
        $this->db->where('kpim_karyawan.tgl <=', $tglend);
        $this->db->where('kpim_karyawan.id_status', '2');
        $this->db->order_by('tgl', 'desc');
        $query = $this->db->get();
        return $query;
    }

    function getAll($keyid, $dept, $tglstart, $tglend) {
        //$this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        //$tampilkan = array('id_status ' => '2' , 'id_karyawan ' => $this->session->userdata('id_karyawan'));
        //$this->db->where($tampilkan);

       //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        $this->db->select("*");
        $this->db->from('kpim_karyawan');
        $this->db->join('dept', 'dept.id_dept = kpim_karyawan.tgs_dept');
        $this->db->join('karyawan', 'karyawan.id_karyawan = kpim_karyawan.id_karyawan');
        $this->db->where('status_nilai', '0');
        $this->db->where('kpim_karyawan.id_karyawan', $keyid);
        $this->db->where('kpim_karyawan.tgs_dept', $dept);
        $this->db->where('kpim_karyawan.tgl >=', $tglstart);
        $this->db->where('kpim_karyawan.tgl <=', $tglend);
        $this->db->where('kpim_karyawan.id_status', '2');
        $this->db->order_by('tgl', 'desc');
        $query = $this->db->get();
        return $query;

    	//$getb = $this->db->get($this->table);
    	//return $getb;
    }

    function getAllsudahnilai($keyid, $dept, $tglstart, $tglend) {
        //$this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        //$tampilkan = array('id_status ' => '2' , 'id_karyawan ' => $this->session->userdata('id_karyawan'));
        //$this->db->where($tampilkan);

       //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        $this->db->select("*");
        $this->db->from('kpim_karyawan');
        $this->db->join('dept', 'dept.id_dept = kpim_karyawan.tgs_dept');
        $this->db->join('karyawan', 'karyawan.id_karyawan = kpim_karyawan.id_karyawan');
        $this->db->where('status_nilai', '1');
        $this->db->where('kpim_karyawan.id_karyawan', $keyid);
        $this->db->where('kpim_karyawan.tgs_dept', $dept);
        $this->db->where('kpim_karyawan.tgl >=', $tglstart);
        $this->db->where('kpim_karyawan.tgl <=', $tglend);
        $this->db->where('kpim_karyawan.id_status', '2');
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

    function update_statusnilai($data, $key, $iddept, $tglstart, $tglend){
        $this->db->where("id_karyawan", $key);
        $this->db->where("tgs_dept", $iddept);
        $this->db->where('kpim_karyawan.tgl >=', $tglstart);
        $this->db->where('kpim_karyawan.tgl <=', $tglend);
        $this->db->update($this->table, $data);
        return TRUE;
    }

    function get_update($data, $key){
        $this->db->where("id", $key);
        $this->db->update($this->table, $data);
        return TRUE;
    }

    function get_updatestatus($data){
        $this->db->update($this->table, $data);
        return TRUE;
    }

    function getTot() {
        $this->db->select_sum('bobot');
        $this->db->select_sum('target');
        $this->db->select_sum('actual');
        $this->db->select_sum('score');
        $this->db->from('kpim_karyawan');
        $this->db->where('(id_status = 2) ');
        $this->db->where('(id_karyawan = 1) ');

        $query = $this->db->get();
        return $query;
    }

    public function tglAkhir($keyid, $tglstart, $tglend) {
        $this->db->select("*");
        $this->db->from('kpim_karyawan');
        $this->db->join('dept', 'dept.id_dept = kpim_karyawan.tgs_dept');
        $this->db->join('karyawan', 'karyawan.id_karyawan = kpim_karyawan.id_karyawan');
        $this->db->where('status_nilai', '0');
        $this->db->where('kpim_karyawan.id_karyawan', $keyid);
        $this->db->where('kpim_karyawan.tgl >=', $tglstart);
        $this->db->where('kpim_karyawan.tgl <=', $tglend);
        $this->db->where('kpim_karyawan.id_status', '2');
        $this->db->order_by("kpim_karyawan.id", "asc");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    } 

    public function tglAwal($keyid, $tglstart, $tglend) {
        $this->db->select("*");
        $this->db->from('kpim_karyawan');
        $this->db->join('dept', 'dept.id_dept = kpim_karyawan.tgs_dept');
        $this->db->join('karyawan', 'karyawan.id_karyawan = kpim_karyawan.id_karyawan');
        $this->db->where('status_nilai', '0');
        $this->db->where('kpim_karyawan.id_karyawan', $keyid);
        $this->db->where('kpim_karyawan.tgl >=', $tglstart);
        $this->db->where('kpim_karyawan.tgl <=', $tglend);
        $this->db->where('kpim_karyawan.id_status', '2');
        $this->db->order_by("kpim_karyawan.id", "desc");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    } 

    public function getDetailnilai(){
        $this->db->select('*');
        $this->db->from('detail_nilai');
        $query = $this->db->get();
        return $query;
    }
}
