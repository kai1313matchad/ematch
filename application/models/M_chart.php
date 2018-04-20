<?php
class M_chart extends Ci_Model{

    var $pesan = 'karyawan';
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

      public function ambilkaryawanall(){
        $query = $this->db->get('karyawan');
         return $query;
    } 


// Mulai function bulanan rata2
                public function awaljanuarirata($thn){
                    $isi = '01';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function akhirjanuarirata($thn){
                    $isi = '01';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function awalfebruarirata($thn){
                    $isi = '02';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    // die($this->db->last_query());

                    return $query->row();
                }

                public function akhirfebruarirata($thn){
                    $isi = '02';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function awalmaretrata($thn){
                    $isi = '03';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function akhirmaretrata($thn){
                    $isi = '03';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function awalaprilrata($thn){
                    $isi = '04';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function akhiraprilrata($thn){
                    $isi = '04';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function awalmeirata($thn){
                    $isi = '05';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function akhirmeirata($thn){
                    $isi = '05';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function awaljunirata($thn){
                    $isi = '06';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function akhirjunirata($thn){
                    $isi = '06';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function awaljulirata($thn){
                    $isi = '07';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function akhirjulirata($thn){
                    $isi = '07';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function awalagustusrata($thn){
                    $isi = '08';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function akhiragustusrata($thn){
                    $isi = '08';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function awalseptemberrata($thn){
                    $isi = '09';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function akhirseptemberrata($thn){
                    $isi = '09';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function awaloktoberrata($thn){
                    $isi = '10';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function akhiroktoberrata($thn){
                    $isi = '10';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function awalnovemberrata($thn){
                    $isi = '11';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function akhirnovemberrata($thn){
                    $isi = '11';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function awaldesemberrata($thn){
                    $isi = '12';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function akhirdesemberrata($thn){
                    $isi = '12';
                    $this->db->select("*");
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

// Mulai function bulanan
                public function awaljanuari($thn, $kar){
                    $isi = '01';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function akhirjanuari($thn, $kar){
                    $isi = '01';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function awalfebruari($thn, $kar){
                    $isi = '02';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    // die($this->db->last_query());

                    return $query->row();
                }

                public function akhirfebruari($thn, $kar){
                    $isi = '02';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function awalmaret($thn, $kar){
                    $isi = '03';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function akhirmaret($thn, $kar){
                    $isi = '03';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function awalapril($thn, $kar){
                    $isi = '04';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function akhirapril($thn, $kar){
                    $isi = '04';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function awalmei($thn, $kar){
                    $isi = '05';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function akhirmei($thn, $kar){
                    $isi = '05';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function awaljuni($thn, $kar){
                    $isi = '06';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function akhirjuni($thn, $kar){
                    $isi = '06';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function awaljuli($thn, $kar){
                    $isi = '07';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function akhirjuli($thn, $kar){
                    $isi = '07';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function awalagustus($thn, $kar){
                    $isi = '08';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function akhiragustus($thn, $kar){
                    $isi = '08';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function awalseptember($thn, $kar){
                    $isi = '09';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function akhirseptember($thn, $kar){
                    $isi = '09';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function awaloktober($thn, $kar){
                    $isi = '10';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function akhiroktober($thn, $kar){
                    $isi = '10';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function awalnovember($thn, $kar){
                    $isi = '11';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function akhirnovember($thn, $kar){
                    $isi = '11';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function awaldesember($thn, $kar){
                    $isi = '12';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "asc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

                public function akhirdesember($thn, $kar){
                    $isi = '12';
                    $this->db->select("*");
                    $this->db->where("id_kary", $kar);
                    $this->db->where("DATE_FORMAT(tanggal,'%m')", $isi);
                    $this->db->where("DATE_FORMAT(tanggal,'%Y')", $thn);
                    $this->db->order_by("tanggal", "desc");
                    $this->db->from('tnilai');
                    $query = $this->db->get();
                    return $query->row();
                }

    function tampilkannamakar($tampilkar){
        $this->db->select("*");
        $this->db->where("id_karyawan", $tampilkar);
        // $this->db->join('dept', 'dept.id_dept = karyawan.dept');
        $this->db->join('akses', 'akses.id_akses = karyawan.id_jabatan');
        $this->db->from('karyawan');
        $query = $this->db->get();
        return $query->row();
    }

    function tampilkandeptnya($idkar){
        $query = $this->db->query('SELECT *, group_concat(distinct nama_dept SEPARATOR ", ") as deptini FROM karyawan
     join dept on find_in_set(dept.id_dept, karyawan.dept) join akses on akses.id_akses = karyawan.id_jabatan
     where karyawan.id_karyawan = "'.$idkar.'"
     GROUP BY karyawan.id_karyawan');
        return $query;
        

        // $this->db->select("*");
        // $this->db->where("id_dept", $deptnya);
        // $this->db->from('dept');
        // $query = $this->db->get();
        // return $query->row();
    }
  
   // function laporanTahunan($karyawan, $thn)
   // {


   //  $kar = $karyawan;
   //  $tahun = $thn;
   //  $bc = $this->db->query("
     
   //  select 
   //  ifnull((SELECT sum(nilai_akhir) FROM (tnilai)WHERE((Month(tanggal)=1)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `Januari`,
   //  ifnull((SELECT sum(nilai_akhir) FROM (tnilai)WHERE((Month(tanggal)=2)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `Februari`,
   //  ifnull((SELECT sum(nilai_akhir) FROM (tnilai)WHERE((Month(tanggal)=3)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `Maret`,
   //  ifnull((SELECT sum(nilai_akhir) FROM (tnilai)WHERE((Month(tanggal)=4)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `April`,
   //  ifnull((SELECT sum(nilai_akhir) FROM (tnilai)WHERE((Month(tanggal)=5)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `Mei`,
   //  ifnull((SELECT sum(nilai_akhir) FROM (tnilai)WHERE((Month(tanggal)=6)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `Juni`,
   //  ifnull((SELECT sum(nilai_akhir) FROM (tnilai)WHERE((Month(tanggal)=7)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `Juli`,
   //  ifnull((SELECT sum(nilai_akhir) FROM (tnilai)WHERE((Month(tanggal)=8)AND (YEAR(tanggal)=$tahun)AND id_kary=$kar)),0) AS `Agustus`,

   //  ifnull((SELECT sum(nilai_akhir) FROM (tnilai)WHERE((Month(tanggal)=9)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `September`,
   //  ifnull((SELECT sum(nilai_akhir) FROM (tnilai)WHERE((Month(tanggal)=10)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `Oktober`,
   //  ifnull((SELECT sum(nilai_akhir) FROM (tnilai)WHERE((Month(tanggal)=11)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `November`,
   //  ifnull((SELECT sum(nilai_akhir) FROM (tnilai)WHERE((Month(tanggal)=12)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `Desember`
   //  from tnilai GROUP BY 1 
     
   //  ");
   //  return $bc;
     
   // }

    // ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=2)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `Februari`,

   function laporanTahunan($karyawan, $thn)
   {


    $kar = $karyawan;
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=1)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `Januari`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=2)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `Februari`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=3)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `Maret`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=4)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `April`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=5)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `Mei`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=6)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `Juni`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=7)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `Juli`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=8)AND (YEAR(tanggal)=$tahun)AND id_kary=$kar)),0) AS `Agustus`,

    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=9)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `September`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=10)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `Oktober`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=11)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `November`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=12)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `Desember`
    from tnilai GROUP BY 1 
     
    ");
    return $bc;
     
   }

   // rumus lama
   // ifnull((SELECT sum(nilai_akhir)/count(nilai_akhir) FROM (tnilai)WHERE((Month(tanggal)=8)AND (YEAR(tanggal)=$tahun))),0) AS `Agustus`,

   function laporanJanuari($karyawan, $thn)
   {
    $kar = $karyawan;
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=1)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=1)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=1)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=1)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   function laporanFebruari($karyawan, $thn)
   {
    $kar = $karyawan;
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=2)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=2)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=2)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=2)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   function laporanMaret($karyawan, $thn)
   {
    $kar = $karyawan;
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=3)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=3)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=3)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=3)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   function laporanApril($karyawan, $thn)
   {
    $kar = $karyawan;
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=4)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=4)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=4)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=4)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   function laporanMei($karyawan, $thn)
   {
    $kar = $karyawan;
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=5)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=5)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=5)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=5)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   function laporanJuni($karyawan, $thn)
   {
    $kar = $karyawan;
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=6)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=6)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=6)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=6)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   function laporanJuli($karyawan, $thn)
   {
    $kar = $karyawan;
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=7)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=7)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=7)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=7)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   function laporanAgustus($karyawan, $thn)
   {
    $kar = $karyawan;
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=8)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=8)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=8)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=8)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   function laporanSeptember($karyawan, $thn)
   {
    $kar = $karyawan;
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=9)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=9)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=9)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=9)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   function laporanOktober($karyawan, $thn)
   {
    $kar = $karyawan;
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=10)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=10)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=10)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=10)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   function laporanNovember($karyawan, $thn)
   {
    $kar = $karyawan;
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=11)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=11)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=11)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=11)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   function laporanDesember($karyawan, $thn)
   {
    $kar = $karyawan;
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=12)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=12)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=12)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=12)AND (YEAR(tanggal)=$tahun) AND id_kary=$kar)),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }


   //mulai untuk rata2

   function laporanTahunanrata($thn)
   {


    
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=1)AND (YEAR(tanggal)=$tahun))),0) AS `Januari`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=2)AND (YEAR(tanggal)=$tahun))),0) AS `Februari`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=3)AND (YEAR(tanggal)=$tahun))),0) AS `Maret`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=4)AND (YEAR(tanggal)=$tahun))),0) AS `April`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=5)AND (YEAR(tanggal)=$tahun))),0) AS `Mei`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=6)AND (YEAR(tanggal)=$tahun))),0) AS `Juni`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=7)AND (YEAR(tanggal)=$tahun))),0) AS `Juli`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=8)AND (YEAR(tanggal)=$tahun))),0) AS `Agustus`,

    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=9)AND (YEAR(tanggal)=$tahun))),0) AS `September`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=10)AND (YEAR(tanggal)=$tahun))),0) AS `Oktober`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=11)AND (YEAR(tanggal)=$tahun))),0) AS `November`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=12)AND (YEAR(tanggal)=$tahun))),0) AS `Desember`
    from tnilai GROUP BY 1 
     
    ");
    return $bc;
     
   }
   // ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((Month(tanggal)=8)AND (YEAR(tanggal)=$tahun))),0) AS `Agustus`,

   function laporanJanuarirata($thn)
   {
    
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=1)AND (YEAR(tanggal)=$tahun))),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=1)AND (YEAR(tanggal)=$tahun))),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=1)AND (YEAR(tanggal)=$tahun))),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=1)AND (YEAR(tanggal)=$tahun))),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   function laporanFebruarirata($thn)
   {
    
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=2)AND (YEAR(tanggal)=$tahun))),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=2)AND (YEAR(tanggal)=$tahun))),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=2)AND (YEAR(tanggal)=$tahun))),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=2)AND (YEAR(tanggal)=$tahun))),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   function laporanMaretrata($thn)
   {
    
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=3)AND (YEAR(tanggal)=$tahun))),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=3)AND (YEAR(tanggal)=$tahun))),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=3)AND (YEAR(tanggal)=$tahun))),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=3)AND (YEAR(tanggal)=$tahun))),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   function laporanAprilrata($thn)
   {
    
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=4)AND (YEAR(tanggal)=$tahun))),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=4)AND (YEAR(tanggal)=$tahun))),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=4)AND (YEAR(tanggal)=$tahun))),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=4)AND (YEAR(tanggal)=$tahun))),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   function laporanMeirata($thn)
   {
    
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=5)AND (YEAR(tanggal)=$tahun))),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=5)AND (YEAR(tanggal)=$tahun))),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=5)AND (YEAR(tanggal)=$tahun))),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=5)AND (YEAR(tanggal)=$tahun))),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   function laporanJunirata($thn)
   {
    
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=6)AND (YEAR(tanggal)=$tahun))),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=6)AND (YEAR(tanggal)=$tahun))),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=6)AND (YEAR(tanggal)=$tahun))),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=6)AND (YEAR(tanggal)=$tahun))),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   function laporanJulirata($thn)
   {
    
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=7)AND (YEAR(tanggal)=$tahun))),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=7)AND (YEAR(tanggal)=$tahun))),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=7)AND (YEAR(tanggal)=$tahun))),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=7)AND (YEAR(tanggal)=$tahun))),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   function laporanAgustusrata($thn)
   {
    
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=8)AND (YEAR(tanggal)=$tahun))),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=8)AND (YEAR(tanggal)=$tahun))),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=8)AND (YEAR(tanggal)=$tahun))),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=8)AND (YEAR(tanggal)=$tahun))),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   function laporanSeptemberrata($thn)
   {
    
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=9)AND (YEAR(tanggal)=$tahun))),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=9)AND (YEAR(tanggal)=$tahun))),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=9)AND (YEAR(tanggal)=$tahun))),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=9)AND (YEAR(tanggal)=$tahun))),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   function laporanOktoberrata($thn)
   {
    
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=10)AND (YEAR(tanggal)=$tahun))),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=10)AND (YEAR(tanggal)=$tahun))),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=10)AND (YEAR(tanggal)=$tahun))),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=10)AND (YEAR(tanggal)=$tahun))),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   function laporanNovemberrata($thn)
   {
    
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=11)AND (YEAR(tanggal)=$tahun))),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=11)AND (YEAR(tanggal)=$tahun))),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=11)AND (YEAR(tanggal)=$tahun))),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=11)AND (YEAR(tanggal)=$tahun))),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   function laporanDesemberrata($thn)
   {
    
    $tahun = $thn;
    $bc = $this->db->query("
     
    select 
   
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 1 and 9)AND (Month(tanggal)=12)AND (YEAR(tanggal)=$tahun))),0) AS `pekan1`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 10 and 16)AND (Month(tanggal)=12)AND (YEAR(tanggal)=$tahun))),0) AS `pekan2`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 17 and 23)AND (Month(tanggal)=12)AND (YEAR(tanggal)=$tahun))),0) AS `pekan3`,
    ifnull((SELECT (sum(totalnilai) / count(totalnilai)) * 75/100 FROM (tnilai)WHERE((DAY(tanggal)BETWEEN 24 and 31)AND (Month(tanggal)=12)AND (YEAR(tanggal)=$tahun))),0) AS `pekan4`
    from tnilai GROUP BY 1 
    ");
    return $bc;
   }

   // sum(tot_score)/sum(tot_bobot)*100 *75/100 yang lama
  
  
}
?>