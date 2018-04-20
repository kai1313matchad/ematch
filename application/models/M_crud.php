<?php

class M_crud extends CI_Model {

	var $table = 'dept';
	function __construct() {
        parent::__construct();
    }

    function getAll() {
    	$getb = $this->db->get($this->table);
    	return $getb;
    }

    function delete($key){
        $this->db->where('id_dept',$key);
        $this->db->delete($this->table);
    }    

    //fungsi insert ke database
    function get_insert($data){
       	$this->db->insert($this->table, $data);
      	return TRUE;
    }

    function get_update($data, $key){
        $this->db->where("id_dept", $key);
        $this->db->update($this->table, $data);
        return TRUE;
    }

}
