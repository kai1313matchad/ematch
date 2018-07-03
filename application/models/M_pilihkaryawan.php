<?php

class M_pilihkaryawan extends CI_Model {

	var $table = 'kpim_karyawan';
    var $tablenilai = 'tnilai';
	function __construct() {
        parent::__construct();
    }

    function ambilDept(){
        // $query = $this->db->get('dept');

        $this->db->select("*");
        $this->db->from("dept");
        $this->db->where_not_in('id_d', '15');
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
        $this->db->select("*");
        $this->db->from("karyawan");
        $this->db->join("dept","karyawan.dept = dept.id_dept");
        $this->db->where("id_karyawan", $keydept);

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



    function getAll($key) {
        //$this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        //$tampilkan = array('id_status ' => '2' , 'id_karyawan ' => $this->session->userdata('id_karyawan'));
        //$this->db->where($tampilkan);

       //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        $this->db->select("*");
        $this->db->from('kpim_karyawan');
        $this->db->join('dept', 'dept.id_dept = kpim_karyawan.tgs_dept');
        $this->db->join('karyawan', 'karyawan.id_karyawan = kpim_karyawan.id_karyawan');
        $this->db->where('kpim_karyawan.id_karyawan', $key);
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

    public function untukall($key, $idses, $hak_akses){
        $this->db->select("*");
        $this->db->from("karyawan");
        $this->db->LIKE("dept", $key);
        $this->db->where_in('id_jabatan', $hak_akses);
        $this->db->where_not_in('id_karyawan', $idses);
        $this->db->where_not_in('id_jabatan', '1');
        $this->db->where_not_in('id_jabatan', '5');
        $this->db->where_not_in('status', 'Blokir');
        //$this->db->where("dept", $key);

        $query = $this->db->get();

        foreach ($query->result() as $row)
        {   
            echo "<option value=".$row->id_karyawan.">".$row->nama_karyawan."</option>";
        }

    }

    public function untukall_($key, $idses, $hak_akses){
        $this->db->from('karyawan a');
        $this->db->join('dept b', 'FIND_IN_SET(b.id_dept, a.dept)');
        $this->db->where('CONCAT(",", a.dept, ",") REGEXP ",('.$key.'),"');
        $this->db->where_in('a.id_jabatan', $hak_akses);
        $this->db->where_not_in('a.id_karyawan', $idses);
        $this->db->where_not_in('a.id_jabatan', '1');
        $this->db->where_not_in('a.id_jabatan', '5');
        $this->db->where_not_in('a.status', 'Blokir');
        $this->db->group_by('a.id_karyawan');
        //$this->db->where("dept", $key);

        $query = $this->db->get();

        foreach ($query->result() as $row)
        {   
            echo "<option value=".$row->id_karyawan.">".$row->nama_karyawan."</option>";
        }

    }

    public function untukallterbaru($iddept, $idkar, $hak_akses){
        $this->db->select("*");
        $this->db->from("subordinate");
        $this->db->LIKE("b.dept", $iddept);
        // $this->db->where("b.dept", $iddept);
        // $this->db->where_in('id_jabatan', $hak_akses);
        // $this->db->where_not_in('id_karyawan', $idkar);
        // $this->db->where_not_in('id_jabatan', '1');
        // $this->db->where_not_in('id_jabatan', '5');
        // $this->db->where_not_in('status', 'Blokir');
         $this->db->join('karyawan a', 'a.id_karyawan = subordinate.id_penilai');
        $this->db->join('karyawan b', 'b.id_karyawan = subordinate.id_dinilai');
        $this->db->where("id_penilai", $idkar);

        $query = $this->db->get();

        foreach ($query->result() as $row)
        {   
            echo "<option value=".$row->id_karyawan.">".$row->nama_karyawan."</option>";
        }

    }

    public function untukallterbaru_($iddept, $idkar, $hak_akses){
        $this->db->from('karyawan a');
        $this->db->join('subordinate b', 'b.id_dinilai = a.id_karyawan');
        $this->db->join('dept c', 'FIND_IN_SET(c.id_dept, a.dept)');
        $this->db->where('CONCAT(",", a.dept, ",") REGEXP ",('.$iddept.'),"');
        $this->db->where('id_penilai', $idkar);
        $this->db->group_by('a.id_karyawan');

        $query = $this->db->get();

        foreach ($query->result() as $row)
        {   
            echo "<option value=".$row->id_karyawan.">".$row->nama_karyawan."</option>";
        }

    }

    public function untukpesan($key, $idses, $hak_akses){
        $this->db->select("*");
        $this->db->from("karyawan");
        $this->db->LIKE("dept", $key);
        // $this->db->where_in('id_jabatan', $hak_akses);
        $this->db->where_not_in('id_karyawan', $idses);
        $this->db->where_not_in('id_jabatan', '1');
        $this->db->where_not_in('id_jabatan', '5');
        $this->db->where_not_in('status', 'Blokir');
        //$this->db->where("dept", $key);

        $query = $this->db->get();

        foreach ($query->result() as $row)
        {   
            echo "<option value=".$row->id_karyawan.">".$row->nama_karyawan."</option>";
        }

    }

    public function untukijin($key, $hak_akses){
        $this->db->select("*");
        $this->db->from("karyawan");
        $this->db->LIKE("dept", $key);
        // $this->db->where_in('id_jabatan', $hak_akses);
        $this->db->where_not_in('id_jabatan', '1');
        $this->db->where_not_in('id_jabatan', '5');
        $this->db->where_not_in('status', 'Blokir');
        //$this->db->where("dept", $key);

        $query = $this->db->get();

        foreach ($query->result() as $row)
        {   
            echo "<option value=".$row->id_karyawan.">".$row->nama_karyawan."</option>";
        }

    }

    public function untuksubordinate($key, $hak_akses){
        $this->db->select("*");
        $this->db->from("karyawan");
        $this->db->LIKE("dept", $key);
        // $this->db->where_in('id_jabatan', $hak_akses);
        $this->db->where_not_in('id_jabatan', '1');
        // $this->db->where_not_in('id_jabatan', '5');
        $this->db->where_not_in('status', 'Blokir');
        //$this->db->where("dept", $key);

        $query = $this->db->get();

        foreach ($query->result() as $row)
        {   
            echo "<option value=".$row->id_karyawan.">".$row->nama_karyawan."</option>";
        }

    }

    public function ygdinilai($key, $hak_akses, $penilai){
        $this->db->select("*");
        $this->db->from("karyawan");
        $this->db->LIKE("dept", $key);
        // $this->db->where_in('id_jabatan', $hak_akses);
        $this->db->where_not_in('id_karyawan', $penilai);
        $this->db->where_not_in('id_jabatan', '1');
        $this->db->where_not_in('id_jabatan', '5');
        $this->db->where_not_in('status', 'Blokir');
        //$this->db->where("dept", $key);

        $query = $this->db->get();

        foreach ($query->result() as $row)
        {   
            echo "<option value=".$row->id_karyawan.">".$row->nama_karyawan."</option>";
        }

    }

    public function untukbod($key, $idses){
        $this->db->select("*");
        $this->db->from("karyawan");
        $this->db->LIKE("dept", $key);
        $this->db->where("id_jabatan", '4');
        $this->db->where_not_in('id_karyawan', $idses);
        //$this->db->where("dept", $key);

        $query = $this->db->get();

        foreach ($query->result() as $row)
        {   
            echo "<option value=".$row->id_karyawan.">".$row->nama_karyawan."</option>";
        }

    }

    public function untukmanager($key, $idses){
        $this->db->select("*");
        $this->db->from("karyawan");
        $this->db->LIKE("dept", $key);
        $this->db->where("id_jabatan", '3');
        $this->db->where_not_in('id_karyawan', $idses);
        //$this->db->where("dept", $key);

        $query = $this->db->get();

        foreach ($query->result() as $row)
        {   
            echo "<option value=".$row->id_karyawan.">".$row->nama_karyawan."</option>";
        }

    }

    public function untukhead($key, $idses){
        $this->db->select("*");
        $this->db->from("karyawan");
        $this->db->LIKE("dept", $key);
        $ini = array('2','6');
        $this->db->where_in("id_jabatan", $ini);
        $this->db->where_not_in('id_karyawan', $idses);
        //$this->db->where("dept", $key);

        $query = $this->db->get();

        foreach ($query->result() as $row)
        {   
            echo "<option value=".$row->id_karyawan.">".$row->nama_karyawan."</option>";
        }

    }

    public function get_kar($key, $idses) {

        $this->db->select("*");
        $this->db->from("karyawan");
        $this->db->LIKE("dept", $key);
        $this->db->where_not_in('id_karyawan', $idses);
        $this->db->where_not_in('id_jabatan', '5');

        //$this->db->where("dept", $key);

        $query = $this->db->get();

        foreach ($query->result() as $row)
        {   
            echo "<option value=".$row->id_karyawan.">".$row->nama_karyawan."</option>";
        }




    }
}
