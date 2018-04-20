<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportkaryawan extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model(array('M_chart','M_kpimmingguan', 'app_model'));
        $this->load->library(array('session', 'form_validation', 'upload', 'user_agent', 'email'));
        $this->load->helper(array('url', 'form', 'text', 'html', 'security', 'file', 'directory', 'number', 'date', 'download'));
	}


	
	public function index()
	{
		$this->app_model->getLogin();
    // if ($this->session->userdata('level') == 2 || $this->session->userdata('level') == 3 
    //   || $this->session->userdata('level') == 4 || $this->session->userdata('level') == 6) {
    //         $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman Report Karyawan');
    //         redirect(base_url() . 'Home', 'refresh');
    //     }
		if (($this->session->userdata('level') == 2 AND $this->session->userdata('hak_akses') == 0)  || $this->session->userdata('level') == 12 || $this->session->userdata('level') == 11) {
            $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman Report Karyawan');
            redirect(base_url() . 'Home', 'refresh');
        }

         $keyjabatan = $this->session->userdata('id_karyawan');
         $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        $data['jabatan'] = $this->M_chart->getJabatan($keyjabatan);

        $keydept = $this->session->userdata('id_karyawan');
        $data['dept'] = $this->M_chart->getDept($keydept);

       $this->load->model(array('M_pilihkaryawannext', 'app_model'));

        $data['ambilkaryawanall'] = $this->M_chart->ambilkaryawanall();
        $data['isidept'] = $this->M_pilihkaryawannext->ambilDept();

       //mulai dept

        $this->db->where('id_karyawan', $keydept);
        $query = $this->db->get('karyawan');
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row) {
            $dept = $row->dept;
            }
        }
        'end';

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
        'end';
        //selesai tampilkan dept


        $this->load->view('tampil_pilihchart',$data);
	}

  public function rata2()
  {
    $this->app_model->getLogin();
    
    if (($this->session->userdata('level') == 2 AND $this->session->userdata('hak_akses') == 0) ) {
            $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman Report Karyawan');
            redirect(base_url() . 'Home', 'refresh');
        }

         $keyjabatan = $this->session->userdata('id_karyawan');
         $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        $data['jabatan'] = $this->M_chart->getJabatan($keyjabatan);

        $keydept = $this->session->userdata('id_karyawan');
        $data['dept'] = $this->M_chart->getDept($keydept);

       $this->load->model(array('M_pilihkaryawannext', 'app_model'));

        $data['ambilkaryawanall'] = $this->M_chart->ambilkaryawanall();
        $data['isidept'] = $this->M_pilihkaryawannext->ambilDept();

       //mulai dept

        $this->db->where('id_karyawan', $keydept);
        $query = $this->db->get('karyawan');
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row) {
            $dept = $row->dept;
            }
        }
        'end';

        $id_dept = explode(',', $dept);
        $this->db->where_in('id_dept', $id_dept);
        $query2 = $this->db->get('dept');

        if($query2->num_rows()>0)
        {
          $data['isinamadept'] = $query2;
        }
        'end';
        //selesai tampilkan dept
        $this->load->view('tampil_pilihrata2',$data);
  }

	public function chart(){

		$this->app_model->getLogin();

        if( $this->input->post('pilihkar')==null ){
            redirect(base_url() . 'Reportkaryawan', 'refresh');
         }      


		if (($this->session->userdata('level') == 2 AND $this->session->userdata('hak_akses') == 0) ) {
            $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman Report Karyawan');
            redirect(base_url() . 'Home', 'refresh');
        }

        $keyjabatan = $this->session->userdata('id_karyawan');
        $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        $data['jabatan'] = $this->M_chart->getJabatan($keyjabatan);

        $keydept = $this->session->userdata('id_karyawan');
        $data['dept'] = $this->M_chart->getDept($keydept);

        $kar = $this->input->post('pilihkar');
        $thn = $this->input->post('pilih_thn');

        $data['thn'] = $thn;

        $data['tahunpilihan'] = $this->input->post('pilih_thn');

        

        $data['awaljanuari'] = $this->M_chart->awaljanuari($thn, $kar);        
        $data['akhirjanuari'] = $this->M_chart->akhirjanuari($thn, $kar);

        $data['awalfebruari'] = $this->M_chart->awalfebruari($thn, $kar);        
        $data['akhirfebruari'] = $this->M_chart->akhirfebruari($thn, $kar);

        $data['awalmaret'] = $this->M_chart->awalmaret($thn, $kar);        
        $data['akhirmaret'] = $this->M_chart->akhirmaret($thn, $kar);

        $data['awalapril'] = $this->M_chart->awalapril($thn, $kar);        
        $data['akhirapril'] = $this->M_chart->akhirapril($thn, $kar);

        $data['awalmei'] = $this->M_chart->awalmei($thn, $kar);        
        $data['akhirmei'] = $this->M_chart->akhirmei($thn, $kar);

        $data['awaljuni'] = $this->M_chart->awaljuni($thn, $kar);        
        $data['akhirjuni'] = $this->M_chart->akhirjuni($thn, $kar);

        $data['awaljuli'] = $this->M_chart->awaljuli($thn, $kar);        
        $data['akhirjuli'] = $this->M_chart->akhirjuli($thn, $kar);

        $data['awalagustus'] = $this->M_chart->awalagustus($thn, $kar);        
        $data['akhiragustus'] = $this->M_chart->akhiragustus($thn, $kar);

        $data['awalseptember'] = $this->M_chart->awalseptember($thn, $kar);        
        $data['akhirseptember'] = $this->M_chart->akhirseptember($thn, $kar);

        $data['awaloktober'] = $this->M_chart->awaloktober($thn, $kar);        
        $data['akhiroktober'] = $this->M_chart->akhiroktober($thn, $kar);

        $data['awalnovember'] = $this->M_chart->awalnovember($thn, $kar);        
        $data['akhirnovember'] = $this->M_chart->akhirnovember($thn, $kar);

        $data['awaldesember'] = $this->M_chart->awaldesember($thn, $kar);        
        $data['akhirdesember'] = $this->M_chart->akhirdesember($thn, $kar);

        $data['nama'] = $this->M_chart->tampilkannamakar($this->input->post('pilihkar'));
        // $data['deptnya'] = $this->M_chart->tampilkandeptnya($this->input->post('jabatan'));
        $data['deptnya'] = $this->M_chart->tampilkandeptnya($this->input->post('pilihkar'));
        

		foreach($this->M_chart->laporanTahunan($kar, $thn)->result_array() as $row)
		  {
		   $data['grafik'][]=(float)$row['Januari'];
		   $data['grafik'][]=(float)$row['Februari'];
		   $data['grafik'][]=(float)$row['Maret'];
		   $data['grafik'][]=(float)$row['April'];
		   $data['grafik'][]=(float)$row['Mei'];
		   $data['grafik'][]=(float)$row['Juni'];
		   $data['grafik'][]=(float)$row['Juli'];
		   $data['grafik'][]=(float)$row['Agustus'];
		   $data['grafik'][]=(float)$row['September'];
		   $data['grafik'][]=(float)$row['Oktober'];
		   $data['grafik'][]=(float)$row['November'];
		   $data['grafik'][]=(float)$row['Desember'];
		  }

          foreach($this->M_chart->laporanJanuari($kar, $thn)->result_array() as $row)
          {
           $data['Januari'][]=(float)$row['pekan1'];
           $data['Januari'][]=(float)$row['pekan2'];
           $data['Januari'][]=(float)$row['pekan3'];
           $data['Januari'][]=(float)$row['pekan4'];
           
          }


          foreach($this->M_chart->laporanFebruari($kar, $thn)->result_array() as $row)
          {
           $data['Februari'][]=(float)$row['pekan1'];
           $data['Februari'][]=(float)$row['pekan2'];
           $data['Februari'][]=(float)$row['pekan3'];
           $data['Februari'][]=(float)$row['pekan4'];
          }

          foreach($this->M_chart->laporanMaret($kar, $thn)->result_array() as $row)
          {
           $data['Maret'][]=(float)$row['pekan1'];
           $data['Maret'][]=(float)$row['pekan2'];
           $data['Maret'][]=(float)$row['pekan3'];
           $data['Maret'][]=(float)$row['pekan4'];
          }

          foreach($this->M_chart->laporanApril($kar, $thn)->result_array() as $row)
          {
           $data['April'][]=(float)$row['pekan1'];
           $data['April'][]=(float)$row['pekan2'];
           $data['April'][]=(float)$row['pekan3'];
           $data['April'][]=(float)$row['pekan4'];
          }

          foreach($this->M_chart->laporanMei($kar, $thn)->result_array() as $row)
          {
           $data['Mei'][]=(float)$row['pekan1'];
           $data['Mei'][]=(float)$row['pekan2'];
           $data['Mei'][]=(float)$row['pekan3'];
           $data['Mei'][]=(float)$row['pekan4'];
          }

          foreach($this->M_chart->laporanJuni($kar, $thn)->result_array() as $row)
          {
           $data['Juni'][]=(float)$row['pekan1'];
           $data['Juni'][]=(float)$row['pekan2'];
           $data['Juni'][]=(float)$row['pekan3'];
           $data['Juni'][]=(float)$row['pekan4'];
          }

          foreach($this->M_chart->laporanJuli($kar, $thn)->result_array() as $row)
          {
           $data['Juli'][]=(float)$row['pekan1'];
           $data['Juli'][]=(float)$row['pekan2'];
           $data['Juli'][]=(float)$row['pekan3'];
           $data['Juli'][]=(float)$row['pekan4'];
          }

          foreach($this->M_chart->laporanAgustus($kar, $thn)->result_array() as $row)
          {
           $data['Agustus'][]=(float)$row['pekan1'];
           $data['Agustus'][]=(float)$row['pekan2'];
           $data['Agustus'][]=(float)$row['pekan3'];
           $data['Agustus'][]=(float)$row['pekan4'];
          }

          foreach($this->M_chart->laporanSeptember($kar, $thn)->result_array() as $row)
          {
           $data['September'][]=(float)$row['pekan1'];
           $data['September'][]=(float)$row['pekan2'];
           $data['September'][]=(float)$row['pekan3'];
           $data['September'][]=(float)$row['pekan4'];
          }

          foreach($this->M_chart->laporanOktober($kar, $thn)->result_array() as $row)
          {
           $data['Oktober'][]=(float)$row['pekan1'];
           $data['Oktober'][]=(float)$row['pekan2'];
           $data['Oktober'][]=(float)$row['pekan3'];
           $data['Oktober'][]=(float)$row['pekan4'];
          }

          foreach($this->M_chart->laporanNovember($kar, $thn)->result_array() as $row)
          {
           $data['November'][]=(float)$row['pekan1'];
           $data['November'][]=(float)$row['pekan2'];
           $data['November'][]=(float)$row['pekan3'];
           $data['November'][]=(float)$row['pekan4'];
          }

          foreach($this->M_chart->laporanDesember($kar, $thn)->result_array() as $row)
          {
           $data['Desember'][]=(float)$row['pekan1'];
           $data['Desember'][]=(float)$row['pekan2'];
           $data['Desember'][]=(float)$row['pekan3'];
           $data['Desember'][]=(float)$row['pekan4'];
          }

        $this->load->view('tampil_laporan', $data);

        
	}


  public function chartrata2(){

    $this->app_model->getLogin();

        if( $this->input->post('pilih_thn')==null ){
            redirect(base_url() . 'Reportkaryawan/rata2', 'refresh');
         }      


    if ($this->session->userdata('level') == 2 ) {
            $this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman Report Karyawan');
            redirect(base_url() . 'Home', 'refresh');
        }

        $keyjabatan = $this->session->userdata('id_karyawan');
        $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        $data['jabatan'] = $this->M_chart->getJabatan($keyjabatan);

        $keydept = $this->session->userdata('id_karyawan');
        $data['dept'] = $this->M_chart->getDept($keydept);

        // $kar = $this->input->post('pilihkar');
        $thn = $this->input->post('pilih_thn');

        $data['thn'] = $thn;

        $data['tahunpilihan'] = $this->input->post('pilih_thn');

        

        $data['awaljanuari'] = $this->M_chart->awaljanuarirata($thn);        
        $data['akhirjanuari'] = $this->M_chart->akhirjanuarirata($thn);

        $data['awalfebruari'] = $this->M_chart->awalfebruarirata($thn);        
        $data['akhirfebruari'] = $this->M_chart->akhirfebruarirata($thn);

        $data['awalmaret'] = $this->M_chart->awalmaretrata($thn);        
        $data['akhirmaret'] = $this->M_chart->akhirmaretrata($thn);

        $data['awalapril'] = $this->M_chart->awalaprilrata($thn);        
        $data['akhirapril'] = $this->M_chart->akhiraprilrata($thn);

        $data['awalmei'] = $this->M_chart->awalmeirata($thn);        
        $data['akhirmei'] = $this->M_chart->akhirmeirata($thn);

        $data['awaljuni'] = $this->M_chart->awaljunirata($thn);        
        $data['akhirjuni'] = $this->M_chart->akhirjunirata($thn);

        $data['awaljuli'] = $this->M_chart->awaljulirata($thn);        
        $data['akhirjuli'] = $this->M_chart->akhirjulirata($thn);

        $data['awalagustus'] = $this->M_chart->awalagustusrata($thn);        
        $data['akhiragustus'] = $this->M_chart->akhiragustusrata($thn);

        $data['awalseptember'] = $this->M_chart->awalseptemberrata($thn);        
        $data['akhirseptember'] = $this->M_chart->akhirseptemberrata($thn);

        $data['awaloktober'] = $this->M_chart->awaloktoberrata($thn);        
        $data['akhiroktober'] = $this->M_chart->akhiroktoberrata($thn);

        $data['awalnovember'] = $this->M_chart->awalnovemberrata($thn);        
        $data['akhirnovember'] = $this->M_chart->akhirnovemberrata($thn);

        $data['awaldesember'] = $this->M_chart->awaldesemberrata($thn);        
        $data['akhirdesember'] = $this->M_chart->akhirdesemberrata($thn);

        $data['nama'] = $this->M_chart->tampilkannamakar($this->input->post('pilihkar'));
        // $data['deptnya'] = $this->M_chart->tampilkandeptnya($this->input->post('jabatan'));
        $data['deptnya'] = $this->M_chart->tampilkandeptnya($this->input->post('pilihkar'));
        

    foreach($this->M_chart->laporanTahunanrata($thn)->result_array() as $row)
      {
       $data['grafik'][]=(float)$row['Januari'];
       $data['grafik'][]=(float)$row['Februari'];
       $data['grafik'][]=(float)$row['Maret'];
       $data['grafik'][]=(float)$row['April'];
       $data['grafik'][]=(float)$row['Mei'];
       $data['grafik'][]=(float)$row['Juni'];
       $data['grafik'][]=(float)$row['Juli'];
       $data['grafik'][]=(float)$row['Agustus'];
       $data['grafik'][]=(float)$row['September'];
       $data['grafik'][]=(float)$row['Oktober'];
       $data['grafik'][]=(float)$row['November'];
       $data['grafik'][]=(float)$row['Desember'];
      }

          foreach($this->M_chart->laporanJanuarirata($thn)->result_array() as $row)
          {
           $data['Januari'][]=(float)$row['pekan1'];
           $data['Januari'][]=(float)$row['pekan2'];
           $data['Januari'][]=(float)$row['pekan3'];
           $data['Januari'][]=(float)$row['pekan4'];
           
          }


          foreach($this->M_chart->laporanFebruarirata($thn)->result_array() as $row)
          {
           $data['Februari'][]=(float)$row['pekan1'];
           $data['Februari'][]=(float)$row['pekan2'];
           $data['Februari'][]=(float)$row['pekan3'];
           $data['Februari'][]=(float)$row['pekan4'];
          }

          foreach($this->M_chart->laporanMaretrata($thn)->result_array() as $row)
          {
           $data['Maret'][]=(float)$row['pekan1'];
           $data['Maret'][]=(float)$row['pekan2'];
           $data['Maret'][]=(float)$row['pekan3'];
           $data['Maret'][]=(float)$row['pekan4'];
          }

          foreach($this->M_chart->laporanAprilrata($thn)->result_array() as $row)
          {
           $data['April'][]=(float)$row['pekan1'];
           $data['April'][]=(float)$row['pekan2'];
           $data['April'][]=(float)$row['pekan3'];
           $data['April'][]=(float)$row['pekan4'];
          }

          foreach($this->M_chart->laporanMeirata($thn)->result_array() as $row)
          {
           $data['Mei'][]=(float)$row['pekan1'];
           $data['Mei'][]=(float)$row['pekan2'];
           $data['Mei'][]=(float)$row['pekan3'];
           $data['Mei'][]=(float)$row['pekan4'];
          }

          foreach($this->M_chart->laporanJunirata($thn)->result_array() as $row)
          {
           $data['Juni'][]=(float)$row['pekan1'];
           $data['Juni'][]=(float)$row['pekan2'];
           $data['Juni'][]=(float)$row['pekan3'];
           $data['Juni'][]=(float)$row['pekan4'];
          }

          foreach($this->M_chart->laporanJulirata($thn)->result_array() as $row)
          {
           $data['Juli'][]=(float)$row['pekan1'];
           $data['Juli'][]=(float)$row['pekan2'];
           $data['Juli'][]=(float)$row['pekan3'];
           $data['Juli'][]=(float)$row['pekan4'];
          }

          foreach($this->M_chart->laporanAgustusrata($thn)->result_array() as $row)
          {
           $data['Agustus'][]=(float)$row['pekan1'];
           $data['Agustus'][]=(float)$row['pekan2'];
           $data['Agustus'][]=(float)$row['pekan3'];
           $data['Agustus'][]=(float)$row['pekan4'];
          }

          foreach($this->M_chart->laporanSeptemberrata($thn)->result_array() as $row)
          {
           $data['September'][]=(float)$row['pekan1'];
           $data['September'][]=(float)$row['pekan2'];
           $data['September'][]=(float)$row['pekan3'];
           $data['September'][]=(float)$row['pekan4'];
          }

          foreach($this->M_chart->laporanOktoberrata($thn)->result_array() as $row)
          {
           $data['Oktober'][]=(float)$row['pekan1'];
           $data['Oktober'][]=(float)$row['pekan2'];
           $data['Oktober'][]=(float)$row['pekan3'];
           $data['Oktober'][]=(float)$row['pekan4'];
          }

          foreach($this->M_chart->laporanNovemberrata($thn)->result_array() as $row)
          {
           $data['November'][]=(float)$row['pekan1'];
           $data['November'][]=(float)$row['pekan2'];
           $data['November'][]=(float)$row['pekan3'];
           $data['November'][]=(float)$row['pekan4'];
          }

          foreach($this->M_chart->laporanDesemberrata($thn)->result_array() as $row)
          {
           $data['Desember'][]=(float)$row['pekan1'];
           $data['Desember'][]=(float)$row['pekan2'];
           $data['Desember'][]=(float)$row['pekan3'];
           $data['Desember'][]=(float)$row['pekan4'];
          }

        $this->load->view('tampil_laporanrata', $data);

        
  }

}
