<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class M_data extends CI_Model {

		function __construct()
		{
			parent::__construct();
		}

		function input_data($data,$table){
	               $this->db->insert($table,$data);
	      }
	      
	      function tampil_data()
	      {
	      	     //   $this->db->order_by("SCH_ID",'desc');
		           // return $this->db->get($table);

	      		$query = $this->db->query('SELECT *, group_concat(distinct nama_dept SEPARATOR ", ") as deptini FROM schedule
     join dept on find_in_set(dept.id_dept, schedule.SCH_DEPT)
     -- where karyawan.id_jabatan = 1 
     GROUP BY schedule.SCH_ID
     order by schedule.SCH_ID desc
     ');
    	return $query;
	      }

	      function tampil_data2($id)
	      {
	      	     //   $this->db->order_by("SCH_ID",'desc');
		           // return $this->db->get($table);

	      		$query = $this->db->query('SELECT *, group_concat(distinct nama_dept SEPARATOR ", ") as deptini FROM schedule
     join dept on find_in_set(dept.id_dept, schedule.SCH_DEPT)
     where schedule.SCH_ID = '.$id.'
     GROUP BY schedule.SCH_ID
     order by schedule.SCH_ID desc
     ');
    	return $query;
	      }

	      function tampil_data3($tgl1,$tgl2)
	      {
	      	     //   $this->db->order_by("SCH_ID",'desc');
		           // return $this->db->get($table);

	      		$query = $this->db->query('SELECT *, group_concat(distinct nama_dept SEPARATOR ", ") as deptini FROM schedule
     join dept on find_in_set(dept.id_dept, schedule.SCH_DEPT)
     where schedule.SCH_DATE between "'.$tgl1.'" and "'.$tgl2.'"
     GROUP BY schedule.SCH_ID
     order by schedule.SCH_ID desc
     ');
    	return $query;
	      }

	      function tampil_data4($tgl1,$tgl2,$dept)
	      {
	      	     //   $this->db->order_by("SCH_ID",'desc');
		           // return $this->db->get($table);

	      		$query = $this->db->query('SELECT *, group_concat(distinct nama_dept SEPARATOR ", ") as deptini FROM schedule
     join dept on find_in_set(dept.id_dept, schedule.SCH_DEPT)
     where schedule.SCH_DEPT like "%'.$dept.'%" and schedule.SCH_DATE between "'.$tgl1.'" and "'.$tgl2.'"
     GROUP BY schedule.SCH_ID
     order by schedule.SCH_ID desc
     ');
    	return $query;
	      }

          function tampil_karyawan($dept)
	      {
	      	     //   $this->db->order_by("SCH_ID",'desc');
		           // return $this->db->get($table);

	      		$query = $this->db->query('SELECT *, group_concat(distinct nama_dept SEPARATOR ", ") as deptini FROM karyawan
     join dept on find_in_set(dept.id_dept, karyawan.dept)
     where  karyawan.dept REGEXP "['.$dept.']"
     GROUP BY karyawan.id_karyawan
     order by karyawan.id_karyawan desc
     ');
    	        return $query->result();
	      }

	      function update_data($where,$data,$table){
	               $this->db->where($where);
	               $this->db->update($table,$data);
	      }

	      function delete_data($where,$table){
	               $this->db->where($where);
	               $this->db->delete($table);
	      }

	      function delete_semua_data($table){
	               $this->db->empty_table($table);
	      }
	      
	      function search_data($table,$spe1,$spe2,$srch1=NULL,$srch2=NULL){
	               if($srch1 == "NULL") $srch1 = "";
	               if($srch2 == "NULL") $srch2 = "";
			       $sql = "SELECT * FROM ".$table." WHERE ".$spe1."='".$srch1."' and ".$spe2."='".$srch2."'";
			       $query = $this->db->query($sql);
			       return $query->result();
	      }

	      function tampil_jenis_reminder()
	      {
            $this->db->select("*");
            $this->db->from("jenis_reminder");
            $query=$this->db->get();
	      	return $query;
	      }

	       function tampil_dept()
	      {
            $this->db->select("*");
            $this->db->from("dept");
            $this->db->where_in('id_dept', array('3', '5', '6', '9'));
            $query=$this->db->get();
	      	return $query;
	      }

	      function tampil_data_reminder()
	      {
	      	     //   $this->db->order_by("SCH_ID",'desc');
		           // return $this->db->get($table);

	      		$query = $this->db->query('SELECT *, reminder.id as idr, group_concat(distinct nama_dept SEPARATOR ", ") as deptini, jenis_reminder.nama_jenis as jenis FROM reminder
     join dept on find_in_set(dept.id_dept, reminder.dept)
     join jenis_reminder on jenis_reminder.id = reminder.jenis_reminder 
     GROUP BY reminder.id 
     order by reminder.id desc
     ');
    	return $query;
	      }

	      function tampil_data2_reminder($id)
	      {
	      	     //   $this->db->order_by("SCH_ID",'desc');
		           // return $this->db->get($table);

	      		$query = $this->db->query('SELECT *, reminder.id as idr, group_concat(distinct nama_dept SEPARATOR ", ") as deptini, jenis_reminder.nama_jenis as jenis FROM reminder
     join dept on find_in_set(dept.id_dept, reminder.dept)
     join jenis_reminder on jenis_reminder.id = reminder.jenis_reminder
     where reminder.id = '.$id.'
     GROUP BY reminder.id
     order by reminder.id desc
     ');
    	return $query;
	      }

	      function tampil_data3_reminder($tgl1,$tgl2)
	      {
	      	     //   $this->db->order_by("SCH_ID",'desc');
		           // return $this->db->get($table);

	      		$query = $this->db->query('SELECT *, reminder.id as idr, group_concat(distinct nama_dept SEPARATOR ", ") as deptini, jenis_reminder.nama_jenis as jenis FROM reminder
     join dept on find_in_set(dept.id_dept, reminder.dept)
     join jenis_reminder on jenis_reminder.id = reminder.jenis_reminder
     where reminder.tanggal_batas between "'.$tgl1.'" and "'.$tgl2.'"
     GROUP BY reminder.id
     order by reminder.id desc
     ');
    	return $query;
	      }

	      function tampil_data4_reminder($tgl1,$tgl2,$dept)
	      {
	      	     //   $this->db->order_by("SCH_ID",'desc');
		           // return $this->db->get($table);

	      		$query = $this->db->query('SELECT *, reminder.id as idr, group_concat(distinct nama_dept SEPARATOR ", ") as deptini, jenis_reminder.nama_jenis as jenis FROM reminder
     join dept on find_in_set(dept.id_dept, reminder.dept)
     join jenis_reminder on jenis_reminder.id = reminder.jenis_reminder
     where reminder.dept like "%'.$dept.'%" and reminder.tanggal_batas between "'.$tgl1.'" and "'.$tgl2.'"
     GROUP BY reminder.id
     order by reminder.id desc
     ');
    	return $query;
	      }

	      function tampil_data_jenis_reminder($id)
	      {
	      	     //   $this->db->order_by("SCH_ID",'desc');
		           // return $this->db->get($table);

	      		$query = $this->db->query('SELECT * FROM jenis_reminder
	      			                       where id = "'.$id.'"');
    	return $query;
	      }
	 }
?>