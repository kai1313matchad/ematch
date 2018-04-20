<?php

class M_karyawanku extends CI_Model {

	var $table = 'karyawan';
    var $gallery_path;
    var $resized_path;

    	function __construct() {
            parent::__construct();
            $this->resized_path = realpath(APPPATH. '../assets/ft_profil');
        $this->gallery_path = realpath(APPPATH . '../assets/ft_profil/');
        $this->load->library('image_lib');
        }


    function delete($key){
        $this->db->where('id_karyawan',$key);
        $this->db->delete($this->table);
    }    

    function get_update($data, $key){
            $this->db->where("id_karyawan", $key);
            $this->db->update($this->table, $data);
            return TRUE;
        }


    function ambilsemua(){
    	// $this->db->select("*");
     //    $this->db->from('karyawan');
     //    $this->db->join('dept', 'dept.id_dept = karyawan.dept');
     //    $this->db->join('akses', 'akses.id_akses = karyawan.id_jabatan');
     //    $query = $this->db->get();

        $query = $this->db->query('SELECT *, group_concat(distinct nama_dept SEPARATOR ", ") as deptini FROM karyawan
     join dept on find_in_set(dept.id_dept, karyawan.dept) join akses on akses.id_akses = karyawan.id_jabatan
     -- where not karyawan.id_jabatan = 1 and not karyawan.id_jabatan = 5
     GROUP BY karyawan.id_karyawan
     order by karyawan.id_karyawan desc
     ');
    	return $query;
            
    }

    function ambilsemuavendor(){
        // $this->db->select("*");
     //    $this->db->from('karyawan');
     //    $this->db->join('dept', 'dept.id_dept = karyawan.dept');
     //    $this->db->join('akses', 'akses.id_akses = karyawan.id_jabatan');
     //    $query = $this->db->get();

        $query = $this->db->query('SELECT *, group_concat(distinct nama_dept SEPARATOR ", ") as deptini FROM karyawan
     join dept on find_in_set(dept.id_dept, karyawan.dept) join akses on akses.id_akses = karyawan.id_jabatan
     where karyawan.dept = "f"
     GROUP BY karyawan.id_karyawan
     order by karyawan.id_karyawan desc
     ');
        return $query;
            
    }

    function ambildataku($idku){
        $query = $this->db->query('SELECT *, group_concat(distinct nama_dept SEPARATOR ", ") as deptini FROM karyawan
     join dept on find_in_set(dept.id_dept, karyawan.dept) join akses on akses.id_akses = karyawan.id_jabatan
        where karyawan.id_karyawan = '.$idku.'
     GROUP BY karyawan.id_karyawan');
        return $query;
            
    }

    function do_upload($nama_file) {

    
        $config2 = array(
            'allowed_types' => 'jpg|jpeg|gif|png',
            'upload_path' => $this->gallery_path,
            'max_size' => 20000
        );
        
        $this->load->library('upload', $config2);
        //$this->upload->do_upload($nama_file);
        $data = $this->upload->data($nama_file);
        $image_data = $this->upload->data();
        $nama_filenya = $image_data['file_name'];

        $config = array(
            'source_image'      => $image_data['full_path'], //path to the uploaded image
            'new_image'         => $this->resized_path . '/resized', //path to
            'maintain_ratio'    => true,
            'width'             => 300,
            'height'            => 300
        );

        $this->image_lib->initialize($config);
        $this->image_lib->resize();

        return $nama_filenya;
    }

    public function simpansubordinate($data, $penilai, $dinilai){

        $this->db->where('id_penilai', $penilai);
        $this->db->where('id_dinilai', $dinilai);
        $q = $this->db->get('subordinate');

           if ( $q->num_rows() > 0 ) 
           {
              $this->db->where('id_penilai',$penilai);
              $this->db->where('id_dinilai', $dinilai);
              $this->db->update('subordinate',$data);
           } else {
            
              $this->db->insert('subordinate', $data);
           }


        // $this->db->insert('subordinate', $data);
        return TRUE;

    }

    public function getsubordinate() {
        $this->db->select("subordinate.id_penilai as idsub, a.nama_karyawan AS namapenilai, GROUP_CONCAT(b.nama_karyawan SEPARATOR '</li><li>') AS subnya");
        $this->db->from('subordinate');
        $this->db->join('karyawan a', 'a.id_karyawan = subordinate.id_penilai');
        $this->db->join('karyawan b', 'b.id_karyawan = subordinate.id_dinilai');
        $this->db->group_by("id_penilai");
        $this->db->order_by("id","desc");
        $query = $this->db->get();        
        return $query;
    }

    public function getsatusubordinate($id_penilai){
      // $query = $this->db->query('SELECT * FROM `subordinate` join WHERE id_penilai = 70 ORDER BY `id`  DESC');
        $this->db->select("*, a.nama_karyawan as namapenilai, b.nama_karyawan as namaygdinilai");
        $this->db->from('subordinate');
        $this->db->join('karyawan a', 'a.id_karyawan = subordinate.id_penilai');
        $this->db->join('karyawan b', 'b.id_karyawan = subordinate.id_dinilai');
        $this->db->where('id_penilai', $id_penilai);
        
        $query = $this->db->get();     
        return $query;

    }

    public function getbobotmaster($id_dept) {
        $this->db->select("*");
        $this->db->from('master_bobot');
        $this->db->join('dept', 'dept.id_dept = master_bobot.id_dept');
        $this->db->where_in('master_bobot.id_dept', $id_dept);
        // $this->db->group_by("master_bobot.id_dept");
        $this->db->order_by("master_bobot.id_bobot","asc");
        $query = $this->db->get();        
        return $query;
    }

    public function getbobot($id_dept){
      $level = $this->session->userdata('level');

      $query = $this->db->query('SELECT * FROM master_bobot a JOIN dept b ON FIND_IN_SET(b.id_dept, a.id_dept)
      WHERE a.id_dept = "'.$id_dept.'" AND CONCAT(",", a.id_levelakses, ",") REGEXP ",('.$level.'),"
      GROUP BY a.id_bobot');
      return $query;
    }




    public function bobotsemua() {
        $this->db->select("*");
        $this->db->from('master_bobot');
        $this->db->join('dept', 'dept.id_dept = master_bobot.id_dept');
        // $this->db->where_in('master_bobot.id_dept', $id_dept);
        // $this->db->group_by("master_bobot.id_dept");
        $this->db->order_by("master_bobot.id_bobot","asc");
        $query = $this->db->get();        
        return $query;
    }

    public function getbobotsatu($id) {
        $this->db->select("*");
        $this->db->from('master_bobot');
        $this->db->join('dept', 'dept.id_dept = master_bobot.id_dept');
        $this->db->where_in('master_bobot.id_bobot', $id);
        // $this->db->group_by("master_bobot.id_dept");
        $this->db->order_by("master_bobot.id_dept","asc");
        $query = $this->db->get();        
        return $query->row();
    }

    public function simpanbobot($data){
        $this->db->insert('master_bobot', $data);
        return TRUE;
    }


}
