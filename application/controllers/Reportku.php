<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reportku extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model(array('M_reportsub','M_kpimmingguan', 'app_model', 'M_pengumuman'));
        $this->load->library(array('session', 'form_validation', 'upload', 'user_agent', 'email'));
        $this->load->helper(array('url', 'form', 'text', 'html', 'security', 'file', 'directory', 'number', 'date', 'download', 'tgl_indo'));
	}

	public function index()
	{
        $this->app_model->getLogin();

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


        $this->load->view('tampil_pilihtglreport',$data);
	}

    public function tdkinput()
    {
        $this->app_model->getLogin();

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
            $data['isinamakaryawan'] = $kueri2;
        }
        $this->load->view('tampil_pilihtgltdkinput',$data);
    }

    function lihattdkinput(){

         $this->app_model->getLogin();

         if( $this->input->post('tglstart')==null ){
            redirect(base_url() . 'reportku/tdkinput', 'refresh');
         }
        
        $keyjabatan = $this->session->userdata('id_karyawan');
        $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        $data['jabatan'] = $this->M_reportsub->getJabatan($keyjabatan);

        $keydept = $this->session->userdata('id_karyawan');
        $data['dept'] = $this->M_reportsub->getDept($keydept);
        $data['ambilkaryawanall'] = $this->M_reportsub->ambilkaryawanall();
        
        $tglstart = $this->input->post('tglstart');
        $tglend = $this->input->post('tglend');
        $data['table'] = $this->M_reportsub->ambilsemua($keyjabatan, $tglstart, $tglend)->result(); 

        $data['harilibur'] = $this->M_pengumuman->ambil_libur()->result();

        // interval hari
        $data['daterange'] = date_range($tglstart, $tglend);    
        
        //untuk tampilan seleksi
        $data['idkar'] = $keyjabatan;
        $data['nama'] = $this->M_reportsub->tampilkannamakar($keyjabatan);
        $data['piltglstart'] = $this->input->post('tglstart');
        $data['piltglend'] = $this->input->post('tglend');
        $data['tot'] = $this->M_reportsub->getTot();
        $this->load->view('tampil_reporttdkinput',$data);
    }

    function detailtdkinput(){

         $this->app_model->getLogin();

         if( $this->input->post('tglstart')==null ){
            redirect(base_url() . 'reportku/tdkinput', 'refresh');
         }
        
        $idkar = $this->input->post('idkar');
        $dinokerjo = $this->input->post('harikerja');
        $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        $data['jabatan'] = $this->M_reportsub->getJabatan($idkar);

        $keydept = $this->session->userdata('id_karyawan');
        $data['dept'] = $this->M_reportsub->getDept($keydept);
        $data['ambilkaryawanall'] = $this->M_reportsub->ambilkaryawanall();
        
        $tglstart = $this->input->post('tglstart');
        $tglend = $this->input->post('tglend');
        $data['table'] = $this->M_reportsub->ambilsemua($idkar, $tglstart, $tglend)->result(); 

        $data['harilibur'] = $this->M_pengumuman->ambil_libur()->result();

        // interval hari
        $data['daterange'] = date_range($tglstart, $tglend);    
        
        //untuk tampilan seleksi
        $data['darireport'] = 'true';
        $data['idkar'] = $idkar;
        $data['dinokerjo'] = $dinokerjo;
        $data['nama'] = $this->M_reportsub->tampilkannamakar($idkar);
        $data['piltglstart'] = $this->input->post('tglstart');
        $data['piltglend'] = $this->input->post('tglend');
        $data['tot'] = $this->M_reportsub->getTot();
        $this->load->view('tampil_reporttdkinput',$data);
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
        $result = $this->M_pilihkaryawan->untukall($key, $idses, $hak_akses);
        return $result;
        




        //return $key; 
        //$key = 1;
        // $this->load->model('M_pilihkaryawan');
        // $result = $this->M_pilihkaryawan->get_kar($key, $idses, $idjab);
        // return $result;
    }

    function berinilai(){

         $this->app_model->getLogin();

         if( $this->input->post('tglstart')==null ){
            redirect(base_url() . 'reportku', 'refresh');
         }
        
        $keyjabatan = $this->session->userdata('id_karyawan');
        $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        $data['jabatan'] = $this->M_reportsub->getJabatan($keyjabatan);

        $keydept = $this->session->userdata('id_karyawan');
        $data['dept'] = $this->M_reportsub->getDept($keydept);
        $data['ambilkaryawanall'] = $this->M_reportsub->ambilkaryawanall();
        //print_r($username);
        //die();
        // $val_pilih = $this->input->post('pilihkar');
        $tglstart = $this->input->post('tglstart');
        $tglend = $this->input->post('tglend');
        $dept = $this->input->post('tgs_dept');
        $data['table'] = $this->M_reportsub->getAllsudahnilai($keyjabatan, $dept, $tglstart, $tglend)->result();    
        

        //if ($val_pilih) {
          //  $data['table'] = $this->M_reportsub->getAll($val_pilih)->result();    
        //}
        //untuk tampilan seleksi
        $data['idkar'] = $keyjabatan;
        $data['nama'] = $this->M_reportsub->tampilkannamakar($keyjabatan);
        $data['piltglstart'] = $this->input->post('tglstart');
        $data['piltglend'] = $this->input->post('tglend');
        $data['tot'] = $this->M_reportsub->getTot();
        $this->load->view('tampil_reportku',$data);
    }

    


    function berinilai2($key, $piltglstart, $piltglend){
         $this->app_model->getLogin();
        
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
            $data['table'] = $this->M_reportsub->getAll($val_pilih, $tglstart,$tglend)->result();    
        
        $data['nama'] = $this->M_reportsub->tampilkannamakar($key);
        $data['idkar'] = $key;
        $data['piltglstart'] = $piltglstart;
        $data['piltglend'] = $piltglend;
        $data['tot'] = $this->M_reportsub->getTot();
        $this->load->view('tampil_reportsub',$data);
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
                 $datanilai = array(
            'status_nilai' => '1',
        );

       
        $this->M_reportsub->get_insertnilai($data);
        $this->M_reportsub->update_statusnilai($datanilai);

        $this->berinilai2($key, $tglstart, $tglend);
    }

	public function create() {
        $this->app_model->getLogin();
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

        /*if($isi == null) {
            $this->session->set_flashdata('msg', 
                    '<div class="alert alert-danger">
                        <h4>Oppss</h4>
                        <p>Tidak ada kata dinput.</p>
                    </div>');    
                
        } else {    
            $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <h4>Berhasil </h4>
                        <p>Anda berhasil simpan nilai '.$nama.'<b>.</b></p>
                    </div>');    
             
        };*/

        //$input = $this->input->post('departemen');

        //print_r($input);

        //die();

        //$this->db->insert('dept', $data);
        $this->M_reportsub->get_insertnilai($data);

        $this->berinilai2($key, $tglstart, $tglend);
	}

    

	public function update(){
        $this->app_model->getLogin();
        $key=$this->input->post('id');
        $tglstart=$this->input->post('piltglstart');
        $tglend=$this->input->post('piltglend');
        $idkey=$this->uri->segment(3);

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
            'bobot' => $this->input->post('bobotedit'),
            'target' => $this->input->post('targetedit'),
            'actual' => $this->input->post('actualedit'),
            //'score' => $this->input->post('scoreedit'),

            
			);

//         if( isset( $completed->rate ) && $completed->rate != 0 ){
//     echo (($completed->rate / 100) * $completed->number_urls) + (($completed->rate / 100) * $completed->number_urls)/(4);    
// }else{
//     echo '0';
// // }
//         if( isset( $data['bobot'] ) && $data['actual'] && $data['target'] != 0 ){

       
//         } else {
            
//         }

         $data['score'] = $data['actual'] / $data['target'] * $data['bobot'];

        

		$this->M_reportsub->get_update($data, $idkey);

        $this->berinilai2($key, $tglstart, $tglend);

        //redirect(base_url() . 'Reportsub', 'refresh');
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
