<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reportsub extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model(array('M_reportsub','M_kpimmingguan', 'M_karyawanku',  'app_model'));
        $this->load->library(array('session', 'form_validation', 'upload', 'user_agent', 'email'));
        $this->load->helper(array('url', 'form', 'text', 'html', 'security', 'file', 'directory', 'number', 'date', 'download', 'tgl_indo'));
	}

	public function index()
	{


        $this->app_model->getLogin();

        if (($this->session->userdata('level') == 2 AND $this->session->userdata('hak_akses') == 0) || $this->session->userdata('level') == 12 ) {
            $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman Report Sub');
            redirect(base_url() . 'Home', 'refresh');

        }

        $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();

        $keyjabatan = $this->session->userdata('id_karyawan');
        $data['jabatan'] = $this->M_reportsub->getJabatan($keyjabatan);

        $keydept = $this->session->userdata('id_karyawan');
        $data['dept'] = $this->M_reportsub->getDept($keydept);

        $this->load->model(array('M_pilihkaryawan', 'app_model'));

        $data['ambilkaryawanall'] = $this->M_reportsub->ambilkaryawanall();
       $data['isidept'] = $this->M_pilihkaryawan->ambilDept();

       //mulai dept

        $this->db->where('id_karyawan', $keydept);
        $query = $this->db->get('karyawan');
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row) {
            $dept = $row->dept;
            }
        }

        $id_dept = explode(',', $dept);
        $this->db->where_in('id_dept', $id_dept);
        $query2 = $this->db->get('dept');

        if($query2->num_rows()>0)
        {
            /*echo "<select>";;
            foreach ($query2->result() as $rows) 
            {
            echo "<option value'".$rows->$id_dept."'>".$rows->nama_dept."</option>";

            }
            echo "</select>";*/

            $data['isinamadept'] = $query2;
            

        }
        //selesai tampilkan dept

        //tampilkan nama karyawan
        $key = $this->input->post('id');

        $this->db->where('id_karyawan', $keydept);
        $kueri = $this->db->get('karyawan');
        if($kueri->num_rows()>0)
        {
            foreach ($query->result() as $row) {
            $hak = $row->hak_akses;
            }
        }

        $hak_akses = explode(',', $hak);
        $this->db->where_in('dept', $key);
        $this->db->where_in('id_jabatan', $hak_akses);
        $kueri2 = $this->db->get('karyawan');

        if($kueri2->num_rows()>0)
        {
            /*echo "<select>";;
            foreach ($query2->result() as $rows) 
            {
            echo "<option value'".$rows->$id_dept."'>".$rows->nama_dept."</option>";

            }
            echo "</select>";*/

            $data['isinamakaryawan'] = $kueri2;
            

        }

        $data['susunansub'] = $this->M_karyawanku->getsubordinate()->result();


        $this->load->view('tampil_pilihkaryawan',$data);



	}

    function berinilai(){

         $this->app_model->getLogin();

         if( $this->input->post('pilihkar')==null ){
            redirect(base_url() . 'Reportsub', 'refresh');
         }
        
        $keyjabatan = $this->session->userdata('id_karyawan');
        $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        $data['jabatan'] = $this->M_reportsub->getJabatan($keyjabatan);

        $keydept = $this->session->userdata('id_karyawan');
        $data['dept'] = $this->M_reportsub->getDept($keydept);
        $data['ambilkaryawanall'] = $this->M_reportsub->ambilkaryawanall();
        //print_r($username);
        //die();
        $val_pilih = $this->input->post('pilihkar');
        $dept = $this->input->post('pilihdept');
        $tglstart = $this->input->post('tglstart');
        $tglend = $this->input->post('tglend');

        $kpim = $data['table'] = $this->M_reportsub->getAll($val_pilih, $dept, $tglstart, $tglend)->result();

        $detail_nilai = $this->M_reportsub->getDetailnilai()->result();

        if ($this->session->userdata('level') != 1) {

            foreach ($kpim as $k) {
              
                $query = $this->db->get_where('detail_nilai', array('id_kpim' => $k->id, 'id_penilai' => $this->session->userdata('id_karyawan')));
                
                if ($query->num_rows() == 0) {
                    $input = array(
                        'id_kpim' => $k->id,
                        'id_penilai' => $this->session->userdata('id_karyawan'),
                        'nilai_actual' => $k->actual
                    );    
                    $this->db->insert('detail_nilai', $input);            
                }
            }

        }

         
        //untuk tampilan seleksi
        $data['idkar'] = $this->input->post('pilihkar');
        $data['iddept'] = $this->input->post('pilihdept');
        $data['nama'] = $this->M_reportsub->tampilkannamakar($this->input->post('pilihkar'));
        $data['piltglstart'] = $this->input->post('tglstart');
        $data['piltglend'] = $this->input->post('tglend');
        $data['tot'] = $this->M_reportsub->getTot();

        // get tanggal akhir from DB
        $data['tgl_akhir'] = $this->M_reportsub->tglAkhir($val_pilih, $tglstart, $tglend)->result();
        // get tanggal terkecil from DB
        $data['tgl_awal'] = $this->M_reportsub->tglAwal($val_pilih, $tglstart, $tglend)->result();
        $this->load->view('tampil_reportsub',$data);
    }
    


    function berinilai2($key, $iddept, $piltglstart, $piltglend){
         $this->app_model->getLogin();

        $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        
        $keyjabatan = $this->session->userdata('id_karyawan');
        $data['jabatan'] = $this->M_reportsub->getJabatan($keyjabatan);

        $keydept = $this->session->userdata('id_karyawan');
        $data['dept'] = $this->M_reportsub->getDept($keydept);
        $data['ambilkaryawanall'] = $this->M_reportsub->ambilkaryawanall();
        //print_r($username);
        //die();
        $val_pilih = $key;
        $tglstart = $piltglstart;
        $tglend = $piltglend;
        $data['table'] = $this->M_reportsub->getAll($val_pilih, $iddept, $tglstart,$tglend)->result();    
        
        $data['nama'] = $this->M_reportsub->tampilkannamakar($key);
        $data['iddept'] = $iddept;
        $data['idkar'] = $key;
        $data['piltglstart'] = $piltglstart;
        $data['piltglend'] = $piltglend;
        $data['tot'] = $this->M_reportsub->getTot();

         // get tanggal akhir from DB
        $data['tgl_akhir'] = $this->M_reportsub->tglAkhir($val_pilih, $tglstart, $tglend)->result();
        // get tanggal terkecil from DB
        $data['tgl_awal'] = $this->M_reportsub->tglAwal($val_pilih, $tglstart, $tglend)->result();
        $this->load->view('tampil_reportsub',$data);
    }

    function ambil_karyawan(){

        $key = $this->input->post('id');
        $idses = $this->input->post('idkar');
        $idjab = $this->input->post('jab');
        // $hak = $this->input->post('hak');

        $this->db->where('id_karyawan', $keydept);
        $kueri = $this->db->get('karyawan');
        if($kueri->num_rows()>0)
        {
            foreach ($query->result() as $row) {
            $hak = $row->hak_akses;
            }
        }

        $hak_akses = explode(',', $hak);
        $this->db->where_in('id_jabatan', $hak_akses);
        $kueri2 = $this->db->get('karyawan');

        if($kueri2->num_rows()>0)
        {
            /*echo "<select>";;
            foreach ($query2->result() as $rows) 
            {
            echo "<option value'".$rows->$id_dept."'>".$rows->nama_dept."</option>";

            }
            echo "</select>";*/

            $data['isinamakaryawan'] = $kueri2;
            

        }
        //selesai tampilkan dept


        $this->load->view('tampil_pilihkaryawan',$data);

    }

    function get_karyawan() {
        if('IS_AJAX') {
            //$key = $this->input->post('id');
        }   
        $key = $this->input->post('id');
        $idses = $this->input->post('idkar');
        $idjab = $this->input->post('jab');
        if($idjab == '5'){
            $this->load->model('M_pilihkaryawan');
        $result = $this->M_pilihkaryawan->untukbod($key, $idses);
        return $result;
        }

        if ($idjab == '4'){
            $this->load->model('M_pilihkaryawan');
        $result = $this->M_pilihkaryawan->untukmanager($key, $idses);
        return $result;
        }

         if ($idjab == '3'){
            $this->load->model('M_pilihkaryawan');
        $result = $this->M_pilihkaryawan->untukhead($key, $idses);
        return $result;
        }

        if ($idjab == '1'){
            $this->load->model('M_pilihkaryawan');
        $result = $this->M_pilihkaryawan->untukadmin($key, $idses);
        return $result;
        }

        else



        //return $key; 
        //$key = 1;
        $this->load->model('M_pilihkaryawan');
        $result = $this->M_pilihkaryawan->get_kar($key, $idses, $idjab);
        return $result;
    }

    function get_karyawan2() {
        if('IS_AJAX') {
            //$key = $this->input->post('id');
        }   
        $key = $this->input->post('id');
        // $namad = $this->db->query('SELECT nama_dept FROM `dept` WHERE id_dept = '.$key.'');
        $idses = $this->input->post('idkar');
        $idjab = $this->input->post('jab');
        $hak = $this->input->post('hak');
        $hak_akses = explode(',', $hak);

        // if($idjab == '5'){
        //     $this->load->model('M_pilihkaryawan');
        // $result = $this->M_pilihkaryawan->untukbod($key, $idses);
        // return $result;
        // }

        // if ($idjab == '4'){
        //     $this->load->model('M_pilihkaryawan');
        // $result = $this->M_pilihkaryawan->untukmanager($key, $idses);
        // return $result;
        // }

        //  if ($idjab == '3'){
        //     $this->load->model('M_pilihkaryawan');
        // $result = $this->M_pilihkaryawan->untukhead($key, $idses);
        // return $result;
        // }

        
        $this->load->model('M_pilihkaryawan');
        $result = $this->M_pilihkaryawan->untukall_($key, $idses, $hak_akses);
        return $result;
        




        //return $key; 
        //$key = 1;
        // $this->load->model('M_pilihkaryawan');
        // $result = $this->M_pilihkaryawan->get_kar($key, $idses, $idjab);
        // return $result;
    }

    function get_karyawanterbaru() {
        if('IS_AJAX') {
            //$key = $this->input->post('id');
        }   
        $iddept = $this->input->post('iddept');
        // $namad = $this->db->query('SELECT nama_dept FROM `dept` WHERE id_dept = '.$iddept.'');
        $idkar = $this->input->post('idkar');
        $idjab = $this->input->post('jab');
        $hak = $this->input->post('hak');
        $hak_akses = explode(',', $hak);

        $this->load->model('M_pilihkaryawan');
        $result = $this->M_pilihkaryawan->untukallterbaru_($iddept, $idkar, $hak_akses);
        return $result;
    }

    function get_karyawanpesan() {
        if('IS_AJAX') {
            //$key = $this->input->post('id');
        }   
        $key = $this->input->post('id');
        // $namad = $this->db->query('SELECT nama_dept FROM `dept` WHERE id_dept = '.$key.'');
        $idses = $this->input->post('idkar');
        $idjab = $this->input->post('jab');
        $hak = $this->input->post('hak');
        $hak_akses = explode(',', $hak);

      
        
        $this->load->model('M_pilihkaryawan');
        $result = $this->M_pilihkaryawan->untukpesan($key, $idses, $hak_akses);
        return $result;
        

    }

    function get_karyawanijin() {
        if('IS_AJAX') {
            //$key = $this->input->post('id');
        }   
        $key = $this->input->post('id');
        // $namad = $this->db->query('SELECT nama_dept FROM `dept` WHERE id_dept = '.$key.'');
        // $idses = $this->input->post('idkar');
        $idjab = $this->input->post('jab');
        $hak = $this->input->post('hak');
        $hak_akses = explode(',', $hak);

      
        
        $this->load->model('M_pilihkaryawan');
        $result = $this->M_pilihkaryawan->untukijin($key, $hak_akses);
        return $result;
        

    }

    



    function test() {
        $str = 'one,two,three,four,ss';

        $arr = explode(',', $str);
        // zero limit
       // print_r(explode(',',$str));

        print "<br>";

        echo "<select>";
        foreach ($arr as $key => $value) {
            //echo "key = " .$key. "<br>";
            //echo "value = " .$value. "<br>";
            
            echo "<option value='".$key."''>".$value."</option>";
            
        }
        echo "</select>";
    }

    public function tampilkan() {
        $pilihkar = $this->input->post('pilihkar');
        
        
        //var_dump($pilihkar);
        //die();

        $data['tampilkan'] = $this->M_reportsub->tampilkan($pilihkar);
        //var_dump( $data['tampilkan']);
        //die();
        $this->load->view('tampil_reportsub', $data);


    }

    public function test2($key){
    $this->db->where('id_karyawan',$key);
    $query = $this->db->get('karyawan');
    if($query->num_rows()>0)
    {
        foreach ($query->result() as $row) {
        $dept = $row->dept;
        }
    }

    $id_dept = explode(',', $dept);
    $this->db->where_in('id_dept', $id_dept);
    $query2 = $this->db->get('dept');

    if($query2->num_rows()>0)
    {
        echo "<select>";;
        foreach ($query2->result() as $rows) 
        {
        echo "<option value'".$rows->$id_dept."'>".$rows->nama_dept."</option>";

        }
        echo "</select>";
    }
    }

    public function createandupdate() {
        $this->app_model->getLogin();
        $nama=$this->input->post('nama');
        $key=$this->input->post('id');
        $iddept=$this->input->post('iddept');
        $tglstart=$this->input->post('piltglstart');
        $tglend=$this->input->post('piltglend');
        $idkey=$this->uri->segment(3);
        $isi=$this->input->post('tscore');
        $tanggal = $this->input->post('tanggal');
                $data = array(
            'id_kary' => $this->input->post('id'),
            'tgl_start' => $this->input->post('piltglstart'),
            'tgl_end' => $this->input->post('piltglend'),
            'tanggal' => $this->input->post('tanggal'),
            'tot_bobot' => $this->input->post('tbobot'),
            'tot_target' => $this->input->post('ttarget'),
            'tot_actual' => $this->input->post('tactual'),
            'tot_score' => $isi,
            'totalnilai' => $this->input->post('totalnilai'),
            'nilai_akhir' => $this->input->post('tnilai_akhir'),
        );


            $datanilai = array(
            'status_nilai' => '1',
        );

       
        $this->M_reportsub->get_insertnilai($data);
        $this->M_reportsub->update_statusnilai($datanilai, $key, $iddept, $tglstart, $tglend);

        $this->berinilai2($key, $iddept, $tglstart, $tglend);
    }

	public function create() {
        $this->app_model->getLogin();
        $iddept = $this->input->post('iddept');
        $nama=$this->input->post('nama');
        $key=$this->input->post('id');
        $tglstart=$this->input->post('piltglstart');
        $tglend=$this->input->post('piltglend');
        $idkey=$this->uri->segment(3);
        $isi=$this->input->post('tscore');
        $tanggal = $this->input->post('tanggal');
                $data = array(
            'id_kary' => $this->input->post('id'),
            'tgl_start' => $this->input->post('piltglstart'),
            'tgl_end' => $this->input->post('piltglend'),
            'tanggal' => $this->input->post('tanggal'),
            'tot_bobot' => $this->input->post('tbobot'),
            'tot_target' => $this->input->post('ttarget'),
            'tot_actual' => $this->input->post('tactual'),
            'tot_score' => $isi,
            'nilai_akhir' => $this->input->post('tnilai_akhir'),
        );

        
        $this->M_reportsub->get_insertnilai($data);

        $this->berinilai2($key, $iddept, $tglstart, $tglend);
	}

    

	public function update(){
        $this->app_model->getLogin();

        $iddept = $this->input->post('iddept');        
        $key=$this->input->post('id');
        $tglstart=$this->input->post('piltglstart');
        $tglend=$this->input->post('piltglend');
        $idkey=$this->uri->segment(3);

        $note=$this->input->post('noteedit');

        if ( $note== ''){
            $note ='0';
        }

        if($this->input->post('noteedit') != '0' and $this->input->post('noteedit') != ''){
            $notif = 1;
        }
        else {
            $notif = 0;
        }

		$data = array(
			//'nama_karyawan' => $this->input->post('nama'),
            //'jabatan' => $this->input->post('jabatan'),
            //'dept' => $this->input->post('dept'),
            'tgl' => $this->input->post('tgledit'),
            //'tgl_start' => $this->input->post('tgl1'),
            //'tgl_end' => $this->input->post('tgl2'),
            'nama_goals' => $this->input->post('goaledit'),
            'action' => $this->input->post('actionedit'),
            'kendala' => $this->input->post('kendalaedit'),
            'result' => $this->input->post('resultedit'),
            'deadline' => $this->input->post('deadlineedit'),
            'tgs_dept' => $this->input->post('tgs_dept'),
            // 'note' => $this->input->post('noteedit'),
            'note' => $note,
            'bobot' => $this->input->post('bobotedit'),
            'target' => $this->input->post('targetedit'),
            'actual' => $this->input->post('actualedit'),
            'notif_note' => $notif
            //'score' => $this->input->post('scoreedit'),

            
			);

        $data['score'] =  $data['bobot'] * $data['actual'];

         // $data['score'] = $data['actual'] / $data['target'] * $data['bobot']; yang lama

        

		$this->M_reportsub->get_update($data, $idkey);

        $this->berinilai2($key, $iddept, $tglstart, $tglend);



        
	}

    public function updatenilai($id){
        
        $iddept = $this->input->post('iddept');        
        $key=$this->input->post('id');
        $tglstart=$this->input->post('piltglstart');
        $tglend=$this->input->post('piltglend');
        $actual = $this->input->post('actualedit'); 

        $note = $this->input->post('noteedit');
        if ( $note== ''){
            $note ='0';
        }

        if($this->input->post('noteedit') != '0' and $this->input->post('noteedit') != ''){
            $notif = 1;
        }
        else {
            $notif = 0;
        }


        $data = array(
            'id_kpim' => $id,
            'id_penilai' => $this->session->userdata('id_karyawan'),
            'nilai_actual' => $this->input->post('actualedit'),
            'note' => $this->input->post('noteedit')            
        );
        $this->db->where('id_kpim', $id);
        $this->db->where('id_penilai', $this->session->userdata('id_karyawan'));
        $this->db->update('detail_nilai', $data);

        // mulai update nilai actual asli


        $this->db->select('*');
        $this->db->from('detail_nilai');
        $this->db->join('karyawan', 'karyawan.id_karyawan = detail_nilai.id_penilai');
        $this->db->where('id_kpim', $id);
        $query = $this->db->get();

        // $query = $this->db->get_where('detail_nilai', array('id_kpim' => $id));

        // total penilai
        $jml = $query->num_rows(); 

        foreach ($query->result() as $q) {
            $nilai_sub[] = $q->nilai_actual;
        }

        // menjumlahkan (sum) nilai masing leader
        $sumnilai = array_sum($nilai_sub);

        $nilai_actual = $sumnilai / $jml;


        // menambahkan note dan note
        $catatan = '' ;
        foreach ($query->result() as $q) {
            if ($q->note != null) {
                $catatan = $catatan . 'Dari '. $q->nama_karyawan .' : <br> <i>'. $q->note .'</i><br><br>';
            }
            
        }

        $gl = $this->input->post('goals');
        $gl2 = explode('pisah', $gl);
        $goals = $gl2[0];
        $bobot = (int)$gl2[1];



        $data2 = array(
            'nama_goals' => $goals,
            'bobot' => $bobot,
            'actual' => $nilai_actual,
            'score' => $bobot * $nilai_actual,
            'note' => $catatan,
            'notif_note' => $notif
        );

        $this->db->where('id', $id);
        $this->db->update('kpim_karyawan', $data2);

        // selesai update nilai actual asli

        $this->berinilai2($key, $iddept, $tglstart, $tglend);

    }

    public function updatestatus(){
        $this->app_model->getLogin();

        $data = array(
          
             'id_status' => $this->input->post('isistatus'),
            );
        $this->M_reportsub->get_updatestatus($data);

       redirect(base_url() . 'Reportsub', 'refresh');
    }

	public function hapus($key){
        $this->app_model->getLogin();
		$where = array('id' => $key);
		$this->M_reportsub->delete($key);
		redirect(base_url() . 'Reportsub', 'refresh');
	}
}
