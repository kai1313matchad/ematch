<?php

class M_kpimmingguan extends CI_Model {

	var $table = 'kpim_karyawan';
    var $plannext = 'kpim_next';
    var $pesan = 'pesan';
	function __construct() {
        parent::__construct();
    }

    public function getdataku() {
        $this->db->select("*");
        $this->db->from("karyawan");
        $this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));

        $query = $this->db->get();

        return $query;
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

    public function ambilDept($keydept) {
        $query = $this->db->query('SELECT *, group_concat(distinct nama_dept SEPARATOR ", ") as deptini FROM karyawan
     join dept on find_in_set(dept.id_dept, karyawan.dept) join akses on akses.id_akses = karyawan.id_jabatan
     where karyawan.id_karyawan = "'.$keydept.'"
     GROUP BY karyawan.id_karyawan');
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
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_status ' => '1' , 'id_karyawan ' => $this->session->userdata('id_karyawan'));
        

        $this->db->from('kpim_karyawan');
        $this->db->join('dept', 'dept.id_dept = kpim_karyawan.tgs_dept');
        $this->db->where($tampilkan);
        $this->db->order_by("tgl","asc");
        $this->db->order_by("id","desc");
        $query = $this->db->get();
       //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));

    	
    	return $query;
    }

    function getIjin() {
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        $tampilkan = array('nama_goals ' => 'Ijin');
        

        $this->db->from('kpim_karyawan');
        $this->db->join('karyawan', 'karyawan.id_karyawan = kpim_karyawan.id_karyawan');
        $this->db->join('dept', 'dept.id_dept = kpim_karyawan.tgs_dept');
        $this->db->where($tampilkan);
        $this->db->order_by("tgl","desc");
        $query = $this->db->get();
        
       

       //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));

        
        return $query;
    }

     function getpesanku() {
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        $tampilkan = array( 'pengirim ' => $this->session->userdata('id_karyawan'));
        

        $this->db->from('pesan');
        $this->db->join('dept', 'dept.id_dept = pesan.penerima_dept');
        $this->db->join('karyawan', 'karyawan.id_karyawan = pesan.penerima_user');
        $this->db->where($tampilkan);
        $this->db->order_by("tgl","desc");
        $query = $this->db->get();
        
       

       //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));

        
        return $query;
    }

    function getpesanmasuk() {
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        $tampilkan = array( 'penerima_user ' => $this->session->userdata('id_karyawan'));
        

        $this->db->from('pesan');
        $this->db->join('dept', 'dept.id_dept = pesan.penerima_dept');
        $this->db->join('karyawan', 'karyawan.id_karyawan = pesan.pengirim');
        $this->db->where($tampilkan);
        $this->db->order_by("tgl","desc");
        $query = $this->db->get();
        
       

       //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));

        
        return $query;
    }

    function getpesandept() {
        $deptku = $this->session->userdata('id_dept');
        $aku = $this->session->userdata('id_karyawan');
        // $this->db->select("*");
        // //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        // $tampilkan = array( 'penerima_dept ' => $this->session->userdata('id_dept'));
        

        // $this->db->from('pesan');
        // $this->db->join('dept', 'dept.id_dept = pesan.penerima_dept');
        // $this->db->join('karyawan', 'karyawan.id_karyawan = pesan.pengirim');

        // $this->db->where_in($tampilkan);
        // $this->db->order_by("tgl","desc");
        // $query = $this->db->get();

         $query = $this->db->query('SELECT *, j3.nama_dept as deptpenerima, j2.nama_karyawan as penerima , j1.nama_karyawan as pengirim FROM pesan as p
            inner join karyawan as j1 on j1.id_karyawan = p.pengirim 
            inner join karyawan as j2 on j2.id_karyawan = p.penerima_user 
            inner join dept as j3 on j3.id_dept = p.penerima_dept 

            WHERE p.penerima_dept IN ("'.$deptku.'")
            AND NOT p.pengirim = ('.$aku.')                    ');

        // WHERE p.penerima_dept IN ('.$deptku.')
       // AND NOT p.penerima_user = ('.$aku.') INI UNTUK PENGECUALIAN PESAN UNTUK KU
         // AND NOT p.pengirim = ('.$aku.')     

       //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));

        
        return $query;
    }

    function getnilaiku() {
        $this->db->select("*");        
        $tampilkan = array('id_kary ' => $this->session->userdata('id_karyawan'));
        

        $this->db->from('tnilai');
        // $this->db->join('dept', 'dept.id_dept = kpim_karyawan.tgs_dept');
        $this->db->where($tampilkan);
        $this->db->limit("1");
         $this->db->order_by("id","desc");
        $query = $this->db->get();
        
        return $query;
    }

    function inboxblmbaca() {
        $this->db->select("*");        
        $this->db->select("SUM(NOTIF) as jumlah");        
        $tampilkan = array('penerima_user ' => $this->session->userdata('id_karyawan'), 'notif ' => '1');
        

        $this->db->from('pesan');
        // $this->db->join('dept', 'dept.id_dept = kpim_karyawan.tgs_dept');
        $this->db->where($tampilkan);
        $query = $this->db->get();
        
        return $query;
    }

    function noteblmbaca() {
        $this->db->select("*");        
        $this->db->select("SUM(notif_note) as jumlah");        
        $tampilkan = array('id_karyawan ' => $this->session->userdata('id_karyawan'), 'notif_note' => '1');
        

        $this->db->from('kpim_karyawan');
        // $this->db->join('dept', 'dept.id_dept = kpim_karyawan.tgs_dept');
        $this->db->where($tampilkan);
        $query = $this->db->get();
        
        return $query;
    }

    function planblmbaca() {
        $this->db->select("*");        
        $this->db->select("SUM(notif_plan) as jumlah");        
        $tampilkan = array('id_karyawan ' => $this->session->userdata('id_karyawan'),
            'notif_plan' => '1');
        

        $this->db->from('kpim_next');
        // $this->db->join('dept', 'dept.id_dept = kpim_karyawan.tgs_dept');
        $this->db->where($tampilkan);
        $query = $this->db->get();
        
        return $query;
    }

    function noteplan() {
        $this->db->select("*");        
        $this->db->select("SUM(notif_note) as jumlah");        
        $tampilkan = array('id_karyawan ' => $this->session->userdata('id_karyawan'),
            'notif_note' => '1');
        

        $this->db->from('kpim_next');
        // $this->db->join('dept', 'dept.id_dept = kpim_karyawan.tgs_dept');
        $this->db->where($tampilkan);
        $query = $this->db->get();
        
        return $query;
    }

    function tdkinput() {
        // $tglstart = "2017-08-10";
        $saya = $this->session->userdata('id_karyawan');
       $query = $this->db->query('SELECT karyawan.*, kpim_karyawan.*, dept.*, akses.*, group_concat(distinct dept.nama_dept SEPARATOR ", ") as deptini, COUNT(DISTINCT tgl) as jumlah FROM kpim_karyawan
join karyawan on karyawan.id_karyawan = kpim_karyawan.id_karyawan join dept on find_in_set(dept.id_dept, karyawan.dept) join akses on akses.id_akses = karyawan.id_jabatan
where kpim_karyawan.id_karyawan = "'.$saya.'" and kpim_karyawan.sdh_send = 1

and kpim_karyawan.tgl BETWEEN DATE_FORMAT(CURRENT_DATE - INTERVAL 1 MONTH, "%Y-%m-26") and DATE_FORMAT(CURRENT_DATE - INTERVAL 2 DAY, "%Y-%m-%d")

GROUP BY kpim_karyawan.id_karyawan HAVING COUNT(*) >= 1');
        
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
        $this->db->where("tgl >= DATE_SUB(NOW(),INTERVAL 12 DAY)", NULL, FALSE);
        $this->db->order_by("tgl","desc");
        $query = $this->db->get();
        
       

       //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));

        
        return $query;
    }

    function getAllterkirim() {
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        $tampilkan = array('id_status ' => '2' , 'id_karyawan ' => $this->session->userdata('id_karyawan'));
        

        // $this->db
        //         ->query('SELECT * FROM posting WHERE tgl_post BETWEEN DATE_SUB(NOW(), INTERVAL 60 DAY) AND NOW() ORDER BY id_post DESC');
        $this->db->from('kpim_karyawan');
        $this->db->join('dept', 'dept.id_dept = kpim_karyawan.tgs_dept');
        $this->db->where($tampilkan);
        // $this->db->where_not_in('note', '0');
        // $this->db->where_not_in('note', '');
        $this->db->where("tgl >= DATE_SUB(NOW(),INTERVAL 30 DAY)", NULL, FALSE);
        $this->db->order_by("id","desc");
        $query = $this->db->get();


        
       

       //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));

        
        return $query;
    }

    function delete($key){
        $this->db->where('id',$key);
        $this->db->delete($this->table);
    }    

    //fungsi insert ke database
    function get_insert($data){
       	$this->db->insert($this->table, $data);
      	return TRUE;
    }

    function kirimpesan($data){
        $this->db->insert($this->pesan, $data);
        return TRUE;
    }

    function deletepesan($idpesan){
        $this->db->where('id_pesan',$idpesan);
        $this->db->delete($this->pesan);
    }

    function get_update($data, $key){
        $this->db->where("id", $key);
        $this->db->update($this->table, $data);
        return TRUE;
    }

    function notif_pesan($data, $key){
        $this->db->where("penerima_user", $key);
        $this->db->update($this->pesan, $data);
        return TRUE;
    }

    function notif_note($data, $key){
        $this->db->where("id_karyawan", $key);
        $this->db->update($this->table, $data);
        return TRUE;
    }

    function notif_plan($data, $key){
        $this->db->where("id_karyawan", $key);
        $this->db->update($this->plannext, $data);
        return TRUE;
    }



    function get_updatestatus($key, $data){
        $hariini = date('Y-m-d');
        $this->db->where("id_karyawan", $key);
        $this->db->where("tgl <=", $hariini);
        $this->db->where("result !=", '');
        $this->db->update($this->table, $data);
        return TRUE;
    }

    function updateauto($data){
        date_default_timezone_set('Asia/Jakarta');
        $duaharilalu = date('Y-m-d', strtotime('yesterday') - 1);
        // $this->db->where("id_karyawan", $key);
        $this->db->where("tgl <=", $duaharilalu);
        $this->db->where("result !=", '');
        $this->db->update($this->table, $data);
        return TRUE;
    }

}
