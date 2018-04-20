<?php

class M_kpimmingguannext extends CI_Model {

    var $table = 'kpim_next';
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
        $this->db->where($tampilkan);

       //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));


        $this->db->from('kpim_next');
        $this->db->join('dept', 'dept.id_dept = kpim_next.tgs_dept');
        $this->db->where($tampilkan);
        $this->db->order_by("tgl","desc");
        $query = $this->db->get();
        return $query;
    }

    function getAllreplykpimnext() {
        $this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        $tampilkan = array('
            id_status ' => '2' ,
            'id_karyawan ' => $this->session->userdata('id_karyawan')
            );
        

       //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        $this->db->from('kpim_next');
        $this->db->join('dept', 'dept.id_dept = kpim_next.tgs_dept');
        $this->db->where($tampilkan);
        $this->db->where("tgl >= DATE_SUB(NOW(),INTERVAL 7 DAY)", NULL, FALSE);
        $this->db->order_by("id","desc");
        $query = $this->db->get();
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

    function get_update($data, $key){
        $this->db->where("id", $key);
        $this->db->update($this->table, $data);
        return TRUE;
    }

    function get_updatestatus($data, $key){
        $this->db->where("id_karyawan", $key);
        $this->db->update($this->table, $data);
        return TRUE;
    }

    function updateautoplan($data){
        date_default_timezone_set('Asia/Jakarta');
        $hariini = date('Y-m-d');
        // $this->db->where("id_karyawan", $key);
        $this->db->where("tgl <=", $hariini);
        $this->db->update($this->table, $data);
        return TRUE;
    }

}
