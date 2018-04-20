<?php

class M_nilai extends CI_Model {

	var $table = 'karyawan';
	function __construct() {
        parent::__construct();
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
	$this->db->select("*");
      

    $this->db->from('karyawan');
    $this->db->join('dept', 'dept.id_dept = karyawan.dept');
    $this->db->join('akses', 'akses.id_akses = karyawan.id_jabatan');
    $query = $this->db->get();
	return $query;
        
}

function ygdipilih($tglstart, $tglend){

    $query = $this->db->query('SELECT id_kary, nama_karyawan, nama_akses, nama_dept, jabatannya, group_concat(distinct dept.nama_dept SEPARATOR ", ") as deptini,  sum(nilai_akhir) / COUNT(nilai_akhir) AS jumlah, totalnilai as totalnilai  FROM `tnilai` JOIN karyawan ON karyawan.id_karyawan = tnilai.id_kary join dept on find_in_set(dept.id_dept, karyawan.dept) join akses on akses.id_akses = karyawan.id_jabatan
where NOT karyawan.id_jabatan = 1 and NOT karyawan.id_jabatan = 5 and NOT karyawan.status = "Blokir" and tnilai.tanggal between "'.$tglstart.'" and "'.$tglend.'"
GROUP BY id_kary ORDER BY `tanggal`DESC');

    return $query;
    }

function ambiluntuklaporan(){
    $query = $this->db->query('SELECT id_kary, nama_karyawan, nama_akses, nama_dept, jabatannya, group_concat(distinct dept.nama_dept SEPARATOR ", ") as deptini,  sum(nilai_akhir) / COUNT(nilai_akhir) AS jumlah, totalnilai as totalnilai  FROM `tnilai` JOIN karyawan ON karyawan.id_karyawan = tnilai.id_kary join dept on find_in_set(dept.id_dept, karyawan.dept) join akses on akses.id_akses = karyawan.id_jabatan
where NOT karyawan.id_jabatan = 1 and NOT karyawan.id_jabatan = 5 and NOT karyawan.status = "Blokir"
GROUP BY id_kary ORDER BY `tanggal`DESC');

    return $query;

//     $query = $this->db->query('SELECT karyawan.*, kpim_karyawan.*, dept.*, akses.*,  COUNT(DISTINCT tgl) as jumlah FROM
//     (SELECT DISTINCT  id, id_karyawan, tgl, tgl_start, tgl_end, nama_goals, action, kendala, result, deadline, tgs_dept, id_status, sdh_send, status_nilai, status_deadline, note, bobot, target, actual, score FROM kpim_karyawan) kpim_karyawan join karyawan on karyawan.id_karyawan = kpim_karyawan.id_karyawan join dept on dept.id_dept = karyawan.dept join akses on akses.id_akses = karyawan.id_jabatan
//     where kpim_karyawan.tgl = "0000-00-00" 
//  GROUP BY kpim_karyawan.id_karyawan
// HAVING COUNT(*) > 1');
//     return $query;

        
}

}
