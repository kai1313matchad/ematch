<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reportsubnext2 extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model(array('M_reportsubnext2', 'M_kpimmingguan', 'app_model'));
        $this->load->library(array('session', 'form_validation', 'upload', 'user_agent', 'email'));
        $this->load->helper(array('url', 'form', 'text', 'html', 'security', 'file', 'directory', 'number', 'date', 'download', 'tgl_indo'));
	}

	// public function index()
	// {
 //        $this->app_model->getLogin();

 //        if (($this->session->userdata('level') == 2 AND $this->session->userdata('hak_akses') == 0)  ) {
 //            $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman Report Sub');
 //            redirect(base_url() . 'Home', 'refresh');
 //        }
 //        $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();

 //        $keyjabatan = $this->session->userdata('id_karyawan');
 //        $data['jabatan'] = $this->M_reportsubnext2->getJabatan($keyjabatan);

 //        $keydept = $this->session->userdata('id_karyawan');
 //        $data['dept'] = $this->M_reportsubnext2->getDept($keydept);

 //        $this->load->model(array('M_pilihkaryawannext', 'app_model'));

 //        $data['ambilkaryawanall'] = $this->M_reportsubnext2->ambilkaryawanall();
 //        $data['isidept'] = $this->M_pilihkaryawannext->ambilDept();

 //       //mulai dept

 //        $this->db->where('id_karyawan', $keydept);
 //        $query = $this->db->get('karyawan');
 //        if($query->num_rows()>0)
 //        {
 //            foreach ($query->result() as $row) {
 //            $dept = $row->dept;
 //            }
 //        }

 //        $id_dept = explode(',', $dept);
 //        $this->db->where_in('id_dept', $id_dept);
 //        $query2 = $this->db->get('dept');

 //        if($query2->num_rows()>0)
 //        {
 //            /*echo "<select>";;
 //            foreach ($query2->result() as $rows) 
 //            {
 //            echo "<option value'".$rows->$id_dept."'>".$rows->nama_dept."</option>";

 //            }
 //            echo "</select>";*/

 //            $data['isinamadept'] = $query2;
            

 //        }
 //        //selesai tampilkan dept


 //        $this->load->view('tampil_pilihkaryawannext',$data);



	// }

    function index()
    {
        $this->app_model->getLogin();
        $key = $this->session->userdata('id_karyawan');
        if (($this->session->userdata('level') == 2 AND $this->session->userdata('hak_akses') == 0))
        {
            $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman Report Sub');
            redirect(base_url() . 'Home', 'refresh');
        }
        $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        $data['jabatan'] = $this->M_reportsubnext2->getJabatan($key)->result();
        $data['dept'] = $this->M_reportsubnext2->getDept($key)->result();
        $getDept = $this->db->get_where('karyawan',array('id_karyawan'=>$key))->row()->dept;
        $id_dept = explode(',', $getDept);
        $this->db->where_in('id_dept', $id_dept);
        $query2 = $this->db->get('dept');
        $data['isinamadept'] = $query2;

        $this->load->view('tampil_pilihkaryawannext_new',$data);
    }

    function test_()
    {
        $this->app_model->getLogin();

        if( $this->input->post('pilihkar')==null )
        {
            redirect(base_url() . 'Reportsubnext2', 'refresh');
        }
        
        $keyjabatan = $this->session->userdata('id_karyawan');
        $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        $data['jabatan'] = $this->M_reportsubnext2->getJabatan($keyjabatan);

        $keydept = $this->session->userdata('id_karyawan');
        $data['dept'] = $this->M_reportsubnext2->getDept($keydept);
        $data['ambilkaryawanall'] = $this->M_reportsubnext2->ambilkaryawanall();
        $val_pilih = $this->input->post('pilihkar');
        $tglstart = $this->input->post('tglstart');
        $tglend = $this->input->post('tglend');
        $data['table'] = $this->M_reportsubnext2->getAll($val_pilih, $tglstart, $tglend)->result();    
        
        $data['idkar'] = $this->input->post('pilihkar');
        $data['nama'] = $this->M_reportsubnext2->tampilkannamakar($this->input->post('pilihkar'));
        $data['piltglstart'] = $this->input->post('tglstart');
        $data['piltglend'] = $this->input->post('tglend');
        
        $this->load->view('tampil_reportsubnext2_new',$data);
    }

    function get_allplannext()
    {
        $this->app_model->getLogin();
        $key = $this->input->post('subordinat');
        $start = $this->input->post('tglstart');
        $end = $this->input->post('tglend');
        $data = $this->db->join('dept b','b.id_dept = a.tgs_dept')->join('karyawan c','c.id_karyawan = a.id_karyawan')->where('a.id_karyawan = "'.$key.'" AND a.id_status = "1" AND a.id_approve = "0" AND (tgl BETWEEN "'.$start.'" AND "'.$end.'")')->order_by('a.tgl','asc')->get('kpim_next a')->result();
        echo json_encode($data);
    }

    function get_plannext($id)
    {
        $this->app_model->getLogin();
        $data = $this->db->get_where('kpim_next',array('id'=>$id))->row();
        echo json_encode($data);
    }

    function up_notesplannext()
    {
        $this->app_model->getLogin();
        $key = $this->input->post('subid_notes');
        $notes = $this->input->post('notes');
        $upnote = array(
            'note'=>$notes,
            'notif_note'=>'1'
        );
        $this->db->update('kpim_next',$upnote,array('id'=>$key));
        $data['status'] = TRUE;
        echo json_encode($data);
    }

    function approve_plannext($id)
    {
        $this->app_model->getLogin();
        $upplan = array(
            'id_approve'=>'1'
        );
        $this->db->update('kpim_next',$upplan,array('id'=>$id));
        $data['status'] = TRUE;
        echo json_encode($data);
    }

    function get_karyawanterbaru()
    {
        $iddept = $this->input->post('iddept');
        $idkar = $this->input->post('idkar');
        $idjab = $this->input->post('jab');
        $hak = $this->input->post('hak');
        $hak_akses = explode(',', $hak);
        $this->load->model('M_pilihkaryawan');
        $result = $this->M_pilihkaryawan->untukallterbaru_($iddept, $idkar, $hak_akses);
        return $result;
    }

    function get_karyawan() {
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
        $result = $this->M_pilihkaryawan->untukall_($key, $idses, $hak_akses);
        return $result;
        
    }

    function get_karyawan2() {
        if('IS_AJAX') {
            //$key = $this->input->post('id');
        }   
        $key = $this->input->post('id');
        $idses = $this->input->post('idkar');
        $idjab = $this->input->post('jab');
        if($idjab == '5'){
            $this->load->model('M_pilihkaryawannext');
        $result = $this->M_pilihkaryawannext->untukbod2($key, $idses);
        return $result;
        }

        if ($idjab == '4'){
            $this->load->model('M_pilihkaryawannext');
        $result = $this->M_pilihkaryawannext->untukmanager($key, $idses);
        return $result;
        }

         if ($idjab == '3'){
            $this->load->model('M_pilihkaryawannext');
        $result = $this->M_pilihkaryawannext->untukhead($key, $idses);
        return $result;
        }

        if ($idjab == '1'){
            $this->load->model('M_pilihkaryawannext');
        $result = $this->M_pilihkaryawannext->untukadmin($key, $idses);
        return $result;
        }

        else



        //return $key; 
        //$key = 1;
        $this->load->model('M_pilihkaryawannext');
        $result = $this->M_pilihkaryawannext->get_kar($key, $idses, $idjab);
        return $result;
    }

    function berinilai()
    {
        $this->app_model->getLogin();

        if( $this->input->post('pilihkar')==null )
        {
            redirect(base_url() . 'Reportsubnext2', 'refresh');
        }
        
        $keyjabatan = $this->session->userdata('id_karyawan');
        $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        $data['jabatan'] = $this->M_reportsubnext2->getJabatan($keyjabatan);

        $keydept = $this->session->userdata('id_karyawan');
        $data['dept'] = $this->M_reportsubnext2->getDept($keydept);
        $data['ambilkaryawanall'] = $this->M_reportsubnext2->ambilkaryawanall();
        //print_r($username);
        //die();
        $val_pilih = $this->input->post('pilihkar');
        $tglstart = $this->input->post('tglstart');
        $tglend = $this->input->post('tglend');
        $data['table'] = $this->M_reportsubnext2->getAll($val_pilih, $tglstart, $tglend)->result();    
        

        //if ($val_pilih) {
          //  $data['table'] = $this->M_reportsub->getAll($val_pilih)->result();    
        //}
        //untuk tampilan seleksi
        $data['idkar'] = $this->input->post('pilihkar');
        $data['nama'] = $this->M_reportsubnext2->tampilkannamakar($this->input->post('pilihkar'));
        $data['piltglstart'] = $this->input->post('tglstart');
        $data['piltglend'] = $this->input->post('tglend');
        
        $this->load->view('tampil_reportsubnext2',$data);
    }


    function berinilai2($key, $piltglstart, $piltglend){
         $this->app_model->getLogin();
        
        $keyjabatan = $this->session->userdata('id_karyawan');
        $data['jabatan'] = $this->M_reportsubnext2->getJabatan($keyjabatan);

        $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();

        $keydept = $this->session->userdata('id_karyawan');
        $data['dept'] = $this->M_reportsubnext2->getDept($keydept);
        $data['ambilkaryawanall'] = $this->M_reportsubnext2->ambilkaryawanall();
        //print_r($username);
        //die();
        $val_pilih = $key;
        $tglstart = $piltglstart;
        $tglend = $piltglend;
            $data['table'] = $this->M_reportsubnext2->getAll($val_pilih, $tglstart,$tglend)->result();    
        
        $data['nama'] = $this->M_reportsubnext2->tampilkannamakar($key);
        $data['idkar'] = $key;
        $data['piltglstart'] = $piltglstart;
        $data['piltglend'] = $piltglend;
        // $data['tot'] = $this->M_reportsubnext2->getTot();
        $this->load->view('tampil_reportsubnext2',$data);
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

        $data['tampilkan'] = $this->M_reportsubnext2->tampilkan($pilihkar);
        //var_dump( $data['tampilkan']);
        //die();
        $this->load->view('tampil_reportsubnext2', $data);


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

	public function create() {
        $this->app_model->getLogin();
        $key=$this->input->post('id');
        $tglstart=$this->input->post('piltglstart');
        $tglend=$this->input->post('piltglend');
        $idkey=$this->uri->segment(3);
                $data = array(
            'id_kary' => $this->input->post('id'),
            'tgl_start' => $this->input->post('piltglstart'),
            'tgl_end' => $this->input->post('piltglend'),
            'tot_bobot' => $this->input->post('tbobot'),
            'tot_target' => $this->input->post('ttarget'),
            'tot_actual' => $this->input->post('tactual'),
            'tot_score' => $this->input->post('tscore'),
            'nilai_akhir' => $this->input->post('tnilai_akhir'),
        );

        //$input = $this->input->post('departemen');

        //print_r($input);

        //die();

        //$this->db->insert('dept', $data);
        $this->M_reportsubnext2->get_insertnilai($data);

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
        $data['score'] = $data['actual'] / $data['target'] * $data['bobot'];

		$this->M_reportsubnext2->get_update($data, $idkey);

        $this->berinilai2($key, $tglstart, $tglend);

        //redirect(base_url() . 'Reportsub', 'refresh');
	}

    public function updateapprove($ubah){
        $this->app_model->getLogin();
        $key=$this->input->post('id');
        $tglstart=$this->input->post('piltglstart');
        $tglend=$this->input->post('piltglend');
        $idkey=$this->uri->segment(3);

        if($this->input->post('approve') == 2){
            $notif = 1;
        }
        else {
            $notif = 0;
        }

        $data = array(
            'notif_plan' => $notif,
             'id_approve' => $this->input->post('approve'),
            );
        $this->M_reportsubnext2->get_updateapprove($data, $ubah);

       $this->berinilai2($key, $tglstart, $tglend);
    }

    public function updatenote($ubah){
        $this->app_model->getLogin();
        $key=$this->input->post('id');
        $tglstart=$this->input->post('piltglstart');
        $tglend=$this->input->post('piltglend');
        $idkey=$this->uri->segment(3);

        $note=$this->input->post('note');

        if ( $note== ''){
            $note ='0';
        }

        if($this->input->post('note') != '0' and $this->input->post('note') != ''){
            $notif = 1;
        }
        else {
            $notif = 0;
        }

        $data = array(
            'notif_note' => $notif,
             'note' => $this->input->post('note'),
            );
        $this->M_reportsubnext2->get_update($data, $ubah);

       $this->berinilai2($key, $tglstart, $tglend);
    }

	public function hapus($key){
        $this->app_model->getLogin();
		$where = array('id' => $key);
		$this->M_reportsubnext2->delete($key);
		redirect(base_url() . 'Reportsub', 'refresh');
	}
}
