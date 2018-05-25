<?php

class M_pengumuman extends CI_Model {

	var $table = 'posting';
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
        $this->db->select("*");
        $this->db->from("karyawan");
        $this->db->join("dept","karyawan.dept = dept.id_dept");
        $this->db->where("id_karyawan", $keydept);

        $query = $this->db->get();

        return $query;
    }

public function getStatus($keystatus) {
        $this->db->select("*");
        $this->db->from("kpim_karyawan");
        $this->db->where("id_status", $keystatus);

        $query = $this->db->get();

        return $query;
    }

    function getAll() {
        // $this->db->select("*");
        // $this->db->from('posting');
        // $this->db->join('dept', 'dept.id_dept = posting.tujuan_post');
        // $this->db->join('karyawan', 'karyawan.id_karyawan = posting.id_karyawan');
        // $query = $this->db->get();

        $query = $this->db->query('SELECT *, group_concat(distinct nama_dept SEPARATOR ", ") as deptini FROM posting
         join dept on find_in_set(dept.id_dept, posting.tujuan_post) join karyawan on karyawan.id_karyawan = posting.id_karyawan
         -- where not karyawan.id_jabatan = 1 and not karyawan.id_jabatan = 5
         -- where posting.tgl_post >= DATE_SUB(NOW(),INTERVAL 12 MONTH)
         GROUP BY posting.id_post
         ORDER BY posting.tgl_post DESC');
    	
    	return $query;
    }

    function getData() {
        $query = $this->db->query('SELECT *, group_concat(distinct nama_dept SEPARATOR ", ") as deptini FROM posting
        join dept on find_in_set(dept.id_d, posting.tujuan_post) join karyawan on karyawan.id_karyawan = posting.id_karyawan
         -- where not karyawan.id_jabatan = 1 and not karyawan.id_jabatan = 5
        GROUP BY posting.id_post
        ORDER BY posting.tgl_post DESC');
        
        return $query;
    }

    function getpengumumanku($idku) {
        $query = $this->db->query('SELECT *, group_concat(distinct nama_dept SEPARATOR ", ") as deptini FROM posting
        join dept on find_in_set(dept.id_d, posting.tujuan_post) join karyawan on karyawan.id_karyawan = posting.id_karyawan
         -- where not karyawan.id_jabatan = 1 and not karyawan.id_jabatan = 5
        where posting.id_karyawan = '.$idku.'
        GROUP BY posting.id_post
        ORDER BY posting.tgl_post DESC');
        
        return $query;
    }

    function getSatu() {

        $query = $this->db->query('SELECT *, group_concat(distinct nama_dept SEPARATOR ", ") as deptini FROM posting
         join dept on find_in_set(dept.id_d, posting.tujuan_post) join karyawan on karyawan.id_karyawan = posting.id_karyawan
         -- where not karyawan.id_jabatan = 1 and not karyawan.id_jabatan = 5
         -- where posting.tgl_post >= DATE_SUB(NOW(),INTERVAL 30 DAY)
         GROUP BY posting.id_post
         ORDER BY posting.tgl_post DESC limit 1');
        
        return $query;
    }

     function notif() {

        $query = $this->db->query('SELECT *, group_concat(distinct nama_dept SEPARATOR ", ") as deptini FROM posting
         join dept on find_in_set(dept.id_dept, posting.tujuan_post) join karyawan on karyawan.id_karyawan = posting.id_karyawan
         -- where not karyawan.id_jabatan = 1 and not karyawan.id_jabatan = 5
         where posting.tgl_post >= DATE_SUB(NOW(),INTERVAL 14 DAY)
         GROUP BY posting.id_post
         ORDER BY posting.tgl_post DESC limit 1');
        
        return $query;
    }

    function getAllreply() {
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_status ' => '2' , 'id_karyawan ' => $this->session->userdata('id_karyawan'));
        

        // $this->db
        //         ->query('SELECT * FROM posting WHERE tgl_post BETWEEN DATE_SUB(NOW(), INTERVAL 60 DAY) AND NOW() ORDER BY id_post DESC');
        $this->db->from('kpim_karyawan');
        $this->db->join('dept', 'dept.id_dept = kpim_karyawan.tgs_dept');
        $this->db->where($tampilkan);
        $this->db->where_not_in('note', '0');
        $this->db->where_not_in('note', '');
        $this->db->where("tgl >= DATE_SUB(NOW(),INTERVAL 30 DAY)", NULL, FALSE);
        $query = $this->db->get();
        
       

       //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));

        
        return $query;
    }

    function delete($idpost){
        $this->db->where('id_post',$idpost);
        $this->db->delete($this->table);
    }    

    //fungsi insert ke database
    function tambah_libur($data){
       	$this->db->insert('hari_libur', $data);
      	return TRUE;
    }

    function ambil_libur(){
        $this->db->select("*");
        $this->db->from('hari_libur');
        $this->db->order_by("tgl","desc");
        $query = $this->db->get();
        return $query;
    }

     function get_insert($data){
        $this->db->insert($this->table, $data);
        return TRUE;
    }

    function get_update($data, $key){
        $this->db->where("id_post", $key);
        $this->db->update($this->table, $data);
        return TRUE;
    }

    function get_updatestatus($key, $data){
        $this->db->where("id_karyawan", $key);
        $this->db->update($this->table, $data);
        return TRUE;
    }

}
