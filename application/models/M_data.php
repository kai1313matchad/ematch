<?php
      class M_data extends CI_Model{
          function tampil_data($table){
          		$this->db->join('dept', 'dataproject.dept = dept.id_dept');
                  $this->db->order_by("id",'asc');
		           return $this->db->get($table);
          }
          
          function tampil_data2($table){
                   $this->db->order_by("id",'desc');
		           return $this->db->get($table);
          }
          
          function tampil_data_warning($where,$table){
                
                   $this->db->select("*");
                   $this->db->join('dept', 'dept.id_dept = dataproject.dept');
                   $this->db->where($where);
			       return $this->db->get($table);

			      
          }
          
          function tampil_data_warning2($dept,$table){
                   $this->db->select("*");
                   $this->db->from('dataproject');
					$this->db->join('dept', 'dept.id_dept = dataproject.dept');
                   // $this->db->where($where);
                   $this->db->where_in('dept',$dept);

			       return $this->db->get();
          }
          function tampil_data_dept($where,$table){
                   $this->db->select("*");
                   $this->db->join('dept', 'dataproject.dept = dept.id_dept');
                   $this->db->order_by("id",'desc');
                   $this->db->where_in('dept',$where);
			       return $this->db->get($table);
          }
          
          function input_data($data,$table){
	               $this->db->insert($table,$data);
	      }
	      
	      function update_data($where,$data,$table){
	               $this->db->where($where);
	               $this->db->update($table,$data);
	      }
	      
	      function search_data($table,$spe1,$spe2,$srch1=NULL,$srch2=NULL){
	               if($srch1 == "NULL") $srch1 = "";
	               if($srch2 == "NULL") $srch2 = "";
			       $sql = "SELECT * FROM ".$table." join dept on dataproject.dept = dept.id_dept WHERE ".$spe1."='".$srch1."' and ".$spe2."='".$srch2."'";
			       $query = $this->db->query($sql);
			       return $query->result();
	      }
	      
	  //     public function getUsrDt($id)
		 //  {
			// $query = $this->db->select('*')->where('id',$id)->get('users');
			// return $query->result();
		 //  }
		
	  //     public function getUsrUpDt($id)
		 //  {
			// $query=$this->db->get_where('users',array('id'=>$id));
			// return $query->row_array();
		 //  } 
		  
		 //  public function getDepartDt($id)
		 //  {
			// $res = $this->db->query('select dept from users where id ="'.$id.'" limit 1');
			// return $res->row();
		 //  }
		  
		  public function getMailDt($id)
		  {
			$res = $this->db->query('select * from users where id ="'.$id.'" limit 1');
			return $res->row();
		  }
		  
		  
		 //  public function getAccDt($id=FALSE)
		 //  {
			// if($id === FALSE)
			// {
			// 	$query=$this->db->query('select * from akses order by nama_akses desc');
			// 	return $query->result_array();
			// }
			// else
			// {
			// 	$query=$this->db->query('SELECT * FROM akses join users ON akses.id_akses = users.id_akses WHERE users.id = "'.$id.'"');
			// 	return $query->row_array();
			// }
		 //  }
		  
		 //  public function upd_Pass($id,$pass)
		 //  {
			// $data=array ("password"=>$pass);
			
			// $this->db->where('users.id',$id);
			// $this->db->update('users',$data);
			// if($this->db->affected_rows())
			// {
			// 	return '1';
			// }
			// else
			// {
			// 	return '0';
			// }
		 //  }
		  
		 //  public function delUsr($id)
		 //  {
			// $this->db->where('id',$id);
			// $this->db->delete('users');
		 //  }
		  
		  public function delPrj($id)
		  {
			$this->db->where('id',$id);
			$this->db->delete('dataproject');
		  }
      }
?>