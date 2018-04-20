<?php

class M_visit extends CI_Model {

	var $table = 'visits';
	var $table2 = 'dept';
	var $table3 = 'karyawan';
    var $table4 = 'numbers';
	function __construct() {
        parent::__construct();
    }

    function getVisitDataBy($key) {
    	$this->db->select("visits.*, numbers.*, visits.id as visits_id");
        $this->db->from($this->table);
        $this->db->join($this->table4, "visits.id = numbers.id_visit");
    	$this->db->where('karyawan_id', $key);
        $this->db->order_by('visits.id', 'DESC');
		$query = $this->db->get();
    	return $query;
    }

    function getVisitDataByNow($key) {
        $this->db->select("*");
        $this->db->where('karyawan_id', $key);
        $this->db->where('visited_at', date('Y-m-d'));
        $this->db->order_by('id', 'DESC');
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query;
    }

    function getAllHistory($id, $start, $end) {
    	$this->db->select("visits.*, numbers.*, visits.id as visits_id");
        $this->db->from($this->table);
        $this->db->join($this->table4, "visits.id = numbers.id_visit");
    	$this->db->where('visits.karyawan_id', $id);
    	$this->db->where("visits.visited_at >=", $start);
        $this->db->where("visits.visited_at <=", $end);
        // $this->db->where("numbers.verified", 1);
        $this->db->order_by('visits.id', 'DESC');
        // $this->db->from($this->table);
		$query = $this->db->get();
    	return $query;
    }

    public function getAllHistory2($id, $start, $end) {
        date_default_timezone_set('Asia/Jakarta');
        error_reporting(-1);
        $this->db->select("*");
        $this->db->where('karyawan_id', $id);
        $this->db->where("visited_at >=", $start);
        $this->db->where("visited_at <=", $end);
        $this->db->order_by('id', 'DESC');
        $this->db->from($this->table);
        $query = $this->db->get();

        $no = 1;
        foreach ($query->result() as $row)
        {   
            $dateArr = explode(' ', $row->visited_at);
             $onlyDate = $dateArr[0];
            echo '<div class="nui-cards-listing post" id="listing">
                    <div class="nui-card has-tag-layer">
                        <div class="nui-card-content">
                            <div class="content-details">
                                <div class="details-col content-col-1 company">
                                    <h2 class="product-name text-sub-header" itemprop="name">
                                        '.$row->company.'   
                                    </h2>
                                    '.nama_hari($onlyDate).', '.tgl_indo($onlyDate).'<br>
                                    '.date('H:i A', strtotime($row->visited_at)).'
                                </div>
                                <div class="details-col content-col-2 lokasi rata">
                                    '.$row->lokasi.'
                                </div>
                                <div class="details-col content-col-2 tengah">
                                    <a href="#" class="btn btn-xs-full btn-track" data-lat="'.$row->lat.', '.$row->long.' data-toggle="modal" data-target="#myMapModal">
                                        VIEW
                                    </a>
                                </div>
                                <div class="details-col content-col-2 rata">
                                    '.$row->keterangan.'                                                     
                                </div>
                                <div class="details-col content-col-2 rata">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  
                                </div>
                            </div>
                            <div class="content-actions">
                                <div class="block-tombol">
                                    <a href="#" class="btn btn-action btn-xs-full btn-track edit-item lebar" data-toggle="modal" data-target="#edit-item" onclick="edit_book('.$row->id.')" style="width: 100%;">
                                        Beri Catatan
                                    </a>
                                </div>
                                <div class="block-tombol">
                                    <a href="#" class="btn btn-red btn-xs-full btn-track lebar" style="width: 100%;">
                                        Delete
                                    </a>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>';
        }
    }

    function getAllMarker($id, $start, $end) {
    	$this->db->select("*");
    	$this->db->where('karyawan_id', $id);
    	$this->db->where("visited_at >=", $start);
        $this->db->where("visited_at <=", $end);
        $this->db->from($this->table);
		$query = $this->db->get();
    	return $query;
    }

    function getNowHistory($id, $date) {
        $this->db->select("*");
        $this->db->where('karyawan_id', $id);
        $this->db->like('visited_at', $date);
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query;
    }

    function getAllMarkerNow($id, $date) {
        $this->db->select("*");
        $this->db->where('karyawan_id', $id);
        $this->db->like("visited_at", $date);
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query;
    }

    function getDeptById($key) {
    	$id_dept = explode(',', $key);

    	$this->db->select("*");
        $this->db->where_in('id_dept', $id_dept);
        $this->db->from($this->table2);
		$query = $this->db->get();

		$result = [];
		foreach ($query->result_array() as $row) {
			$result[] = $row['nama_dept'];
		}
    	return $result;
    }

    function getJabatanById($key) {
        $this->db->select("*");
        $this->db->where('id_karyawan', $key);
        $this->db->from($this->table3);
        $query = $this->db->get();

        $result = '';
        foreach ($query->result_array() as $row) {
            $result = $row['jabatannya'];
        }
        return $result;
    }

    function getFotoKaryawan($key) {
        $this->db->select("*");
        $this->db->where('id_karyawan', $key);
        $this->db->from($this->table3);
        $query = $this->db->get();

        $result = '';
        foreach ($query->result_array() as $row) {
            $result = $row['img'];
        }
        return $result;
    }

    function getDeptName($key) {
        $this->db->select("*");
        $this->db->where_in('id_dept', $key);
        $this->db->from($this->table2);
        $query = $this->db->get();

        $result = '';
        foreach ($query->result_array() as $row) {
            $result = $row['nama_dept'];
        }
        return $result;
    }

    function getNamaKaryawan($key) {
        $this->db->select("*");
        $this->db->where('id_karyawan', $key);
        $this->db->from($this->table3);
        $query = $this->db->get();

        $result = '';
        foreach ($query->result_array() as $row) {
            $result = $row['nama_karyawan'];
        }
        return $result;
    }

    function getDept() {
    	$this->db->select("*");
        $this->db->from($this->table2);
		$query = $this->db->get();
    	return $query;
    }

    function getNameById($id) {
        // $query = $this->db->query("SELECT * FROM karyawan WHERE '$id' IN (dept)");
        $this->db->select("*");
        $this->db->LIKE("dept", $id);
        $query = $this->db->get($this->table3);
        if ($query->num_rows() > 0) return $query->result_array();              
    }

    function getNameAccessById($id) {
        $keyId = $this->session->userdata('id_karyawan');
        // get akses
        $this->db->where('id_karyawan', $keyId);
        $query = $this->db->get('karyawan');
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row) {
                $hak = $row->hak_akses;
            }
        }

        $hak_akses = explode(',', $hak);

        // get nama
        //$this->db->where_in('dept', $id);
        $this->db->LIKE('dept', $id);
        // $this->db->where_in('id_jabatan', $hak_akses);
        $this->db->where_not_in('id_karyawan', $keyId);
        $this->db->where_not_in('id_jabatan', 1);
        $this->db->where_not_in('id_jabatan', 5);
        $this->db->where_not_in('status', 'Blokir');
        $result = $this->db->get('karyawan');
        if ($result->num_rows() > 0) return $result->result_array();
    }

    function update($id,$value,$modul){
		$this->db->where(array("id"=>$id));
		$this->db->update($this->table,array($modul=>$value));
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

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

    public function visits_update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

}
