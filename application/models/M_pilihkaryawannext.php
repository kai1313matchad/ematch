<?php

class M_pilihkaryawannext extends CI_Model {

	var $table = 'kpim_next';
    var $tablenilai = 'tnilai';
	function __construct() {
        parent::__construct();
    }

    function ambilDept(){
        $query = $this->db->get('dept');
        return $query->result();
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



    function getAll($key) {
        //$this->db->select("*");
        //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        //$tampilkan = array('id_status ' => '2' , 'id_karyawan ' => $this->session->userdata('id_karyawan'));
        //$this->db->where($tampilkan);

       //$this->db->where("id_karyawan", $this->session->userdata('id_karyawan'));
        $this->db->select("*");
        $this->db->from('kpim_next');
        $this->db->join('dept', 'dept.id_dept = kpim_next.tgs_dept');
        $this->db->join('karyawan', 'karyawan.id_karyawan = kpim_next.id_karyawan');
        $this->db->where('kpim_next.id_karyawan', $key);
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
        $this->db->from('kpim_next');
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
        //$this->db->where("dept", $key);

        $query = $this->db->get();

        foreach ($query->result() as $row)
        {   
            echo "<option value=".$row->id_karyawan.">".$row->nama_karyawan."</option>";
        }

    }

    public function untukadmin($key, $idses){
        $this->db->select("*");
        $this->db->from("karyawan");
        $this->db->LIKE("dept", $key);
        $this->db->where_not_in('id_karyawan', $idses);
        $this->db->where_not_in('id_jabatan', '1');
        $this->db->where_not_in('id_jabatan', '5');
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

    public function untukbod2($key, $idses){
        $this->db->select("*");
        $this->db->from("karyawan");
        $this->db->LIKE("dept", $key);
        $this->db->where_not_in('id_karyawan', $idses);
        $this->db->where_not_in('id_jabatan', '1');
        $this->db->where_not_in('id_jabatan', '5');
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
