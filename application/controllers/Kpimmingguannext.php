<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kpimmingguannext extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_kpimmingguannext', 'M_kpimmingguan' , 'app_model', 'M_pengumuman', 'M_karyawanku'));
        $this->load->library(array('session', 'form_validation', 'upload', 'user_agent', 'email'));
        $this->load->helper(array('url', 'form', 'text', 'html', 'security', 'file', 'directory', 'number', 'date', 'download', 'tgl_indo'));
    }

    // public function index()
    // {
    //     $this->app_model->getLogin();
        
    //     $keyjabatan = $this->session->userdata('id_karyawan');
    //     $data['jabatan'] = $this->M_kpimmingguannext->getJabatan($keyjabatan);

    //     $keydept = $this->session->userdata('id_karyawan');
    //     $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
    //     $data['dept'] = $this->M_kpimmingguannext->getDept($keydept);
    //     //print_r($username);
    //     //die();

    //     $data['table'] = $this->M_kpimmingguannext->getAll()->result();
    //      $data['inboxblmbaca'] = $this->M_kpimmingguan->inboxblmbaca()->result();
    //     $data['noteblmbaca'] = $this->M_kpimmingguan->noteblmbaca()->result();
    //     $data['planblmbaca'] = $this->M_kpimmingguan->planblmbaca()->result();
    //     $data['noteplan'] = $this->M_kpimmingguan->noteplan()->result();
    //     $data['harilibur'] = $this->M_pengumuman->ambil_libur()->result();


    //     $this->db->where('id_karyawan', $keydept);
    //     $query = $this->db->get('karyawan');
    //     if($query->num_rows()>0)
    //     {
    //         foreach ($query->result() as $row) {
    //         $dept = $row->dept;
    //         }
    //     }

    //     $id_dept = explode(',', $dept);
    //     $this->db->where_in('id_dept', $id_dept);
    //     $query2 = $this->db->get('dept');

    //     if($query2->num_rows()>0)
    //     {
    //         /*echo "<select>";;
    //         foreach ($query2->result() as $rows) 
    //         {
    //         echo "<option value'".$rows->$id_dept."'>".$rows->nama_dept."</option>";

    //         }
    //         echo "</select>";*/

    //         $data['isinamadept'] = $query2;
            

    //     }
    //     // $data['selectbobot'] = $this->M_karyawanku->getbobot($id_dept)->result();
    //     //selesai tampilkan dept
    //     $this->load->view('tampil_kpimnext',$data);
    // }

    
    public function index()
    {
        $this->app_model->getLogin();
        $data['inboxblmbaca'] = $this->M_kpimmingguan->inboxblmbaca()->result();
        $data['noteblmbaca'] = $this->M_kpimmingguan->noteblmbaca()->result();
        $data['planblmbaca'] = $this->M_kpimmingguan->planblmbaca()->result();
        $data['noteplan'] = $this->M_kpimmingguan->noteplan()->result();
        $data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        $key = $this->session->userdata('id_karyawan');
        $data['jabatan'] = $this->M_kpimmingguannext->getJabatan($key);
        $data['dept'] = $this->M_kpimmingguannext->getDept($key);

        $dept = $this->db->get_where('karyawan',array('id_karyawan'=>$key))->row()->dept;
        $id_dept = explode(',', $dept);
        $this->db->where_in('id_dept', $id_dept);
        $que = $this->db->get('dept');
        $data['isinamadept'] = $que;
        $this->load->view('tampil_kpimnext_new',$data);
    }

    public function create() {
        $this->app_model->getLogin();
        /*$this->form_validation->set_rules('tgl1', 'tgl1', 'required');
        $this->form_validation->set_rules('tgl2', 'tgl2', 'required');
        $this->form_validation->set_rules('tgl', 'tgl', 'required');
        $this->form_validation->set_rules('goals', 'goals', 'required');
        $this->form_validation->set_rules('action', 'action', 'required');
        $this->form_validation->set_rules('result', 'result', 'required');
        $this->form_validation->set_rules('deadline', 'deadline', 'required');*/

        $gl = $this->input->post('goals');
        $gl2 = explode('pisah', $gl);
        $goals = $gl2[0];
        $bobot = $gl2[1];


            $data = array(
            'id_karyawan' => $this->session->userdata('id_karyawan'),
            'tgl' => $this->input->post('tgl'),
            'tgl_start' => $this->input->post('tgl1'),
            'tgl_end' => $this->input->post('tgl2'),
            'nama_goals' => $goals,
            'action' => $this->input->post('action'),
            'bobot' => $bobot,
           
            'deadline' => $this->input->post('deadline'),
            'id_status' => '1',
            'tgs_dept' => $this->input->post('tgs_dept'),
            'id_approve' => '1',
        );

        //$input = $this->input->post('departemen');

        //print_r($input);

        //die();

        //$this->db->insert('dept', $data);

        $libur = $this->M_pengumuman->ambil_libur()->result();
        foreach ($libur as $hr) {
            if ($hr->tgl == $this->input->post('tgl')) {
                $this->session->set_flashdata('hari_libur', 'Mohon maaf, Hari/Tanggal : ' . nama_hari($hr->tgl). ', ' . tgl_indo($hr->tgl). ' itu hari ' .  $hr->kategori . ' (' . $hr->ket. ')');
                redirect(base_url() . 'kpimmingguannext', 'refresh');
            }
        }

        // untuk validasi tidak bisa input saat sabtu minggu mulai
        $tglinputnya = date('w', strtotime($this->input->post('tgl')));

        if ($this->session->userdata('harikerja') == 5) {

            if ($tglinputnya == 0 || $tglinputnya == 6 ) {
                $this->session->set_flashdata('hari_libur', 'Mohon maaf, hari ' . nama_hari($this->input->post('tgl')) . '  tanggal ' . date('d-m-Y', strtotime($this->input->post('tgl'))) . ' hari libur');
                    redirect(base_url() . 'kpimmingguannext', 'refresh');
            }
            
        }

        if ($this->session->userdata('harikerja') == 6) {

            if ($tglinputnya == 0 ) {
                $this->session->set_flashdata('hari_libur', 'Mohon maaf, hari ' . nama_hari($this->input->post('tgl')) . '  tanggal ' . date('d-m-Y', strtotime($this->input->post('tgl'))) . ' hari libur');
                    redirect(base_url() . 'kpimmingguannext', 'refresh');
            }
            
        }
        // untuk validasi tidak bisa input saat sabtu minggu selesai


        // validasi agar tidak bisa input tgl lalu
        $hariini = date('Y-m-d');
        if ($this->input->post('tgl') <= $hariini) {
            $this->session->set_flashdata('hari_libur', 'Mohon maaf, Anda tidak dapat menginputkan tanggal hari ini atau tanggal yang lalu');
                    redirect(base_url() . 'kpimmingguannext', 'refresh');            
        }
        // validasi agar tidak bisa input tgl lalu selesai


        

        $this->M_kpimmingguannext->get_insert($data);
        redirect(base_url() . 'Kpimmingguannext', 'refresh');
    }

    public function add_plannext()
    {
        $this->app_model->getLogin();
        // $gls = $this->input->post('goals');
        $gls = $this->input->post('goalsId');
        $get_glsdet = $this->db->get_where('master_bobot',array('id_bobot'=>$gls))->row();
        $ins = array(
            'id_karyawan'=>$this->session->userdata('id_karyawan'),
            'id_bobot'=>$gls,
            'tgl'=>$this->input->post('tgl'),
            'nama_goals'=>$get_glsdet->nama,
            'bobot'=>$get_glsdet->bobot,
            'action'=>$this->input->post('action'),
            'deadline'=>$this->input->post('deadline'),
            'tgs_dept'=>$this->input->post('tgs_dept'),
            'id_status'=>'1',
            'id_approve'=>'0'
        );

        $libur = $this->M_pengumuman->ambil_libur()->result();
        foreach ($libur as $hr)
        {
            if ($hr->tgl == $this->input->post('tgl'))
            {
                $data['lb_msg'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>Mohon maaf, Hari/Tanggal : ' . nama_hari($hr->tgl). ', ' . tgl_indo($hr->tgl). ' itu hari ' .  $hr->kategori . ' (' . $hr->ket. ')</div>';
                $data['status'] = FALSE;
                echo json_encode($data);
                exit();
            }
        }

        $tglinputnya = date('w', strtotime($this->input->post('tgl')));
        if ($this->session->userdata('harikerja') == 5)
        {
            if ($tglinputnya == 0 || $tglinputnya == 6 )
            {
                $data['lb_msg'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>Mohon maaf, hari ' . nama_hari($this->input->post('tgl')) . '  tanggal ' . date('d-m-Y', strtotime($this->input->post('tgl'))) . ' hari libur</div>';
                $data['status'] = FALSE;
                echo json_encode($data);
                exit();
            }
        }
        if ($this->session->userdata('harikerja') == 6)
        {
            if ($tglinputnya == 0 )
            {
                $data['lb_msg'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>Mohon maaf, hari ' . nama_hari($this->input->post('tgl')) . '  tanggal ' . date('d-m-Y', strtotime($this->input->post('tgl'))) . ' hari libur</div>';
                $data['status'] = FALSE;
                echo json_encode($data);
                exit();
            }
        }

        $hariini = date('Y-m-d');
        if ($this->input->post('tgl') <= $hariini)
        {
            $data['lb_msg'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>Mohon maaf, Anda tidak dapat menginputkan tanggal hari ini atau tanggal yang lalu</div>';
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }

        $this->db->insert('kpim_next',$ins);
        $data['status'] = TRUE;
        echo json_encode($data);
    }

    function upd_plannext()
    {
        $this->app_model->getLogin();
        $id = $this->input->post('id_plan');
        $gls = $this->input->post('goals_plan');
        $get_glsdet = $this->db->get_where('master_bobot',array('id_bobot'=>$gls))->row();
        $upd = array(
            'id_karyawan'=>$this->session->userdata('id_karyawan'),
            'id_bobot'=>$gls,
            'tgl'=>$this->input->post('tgl_plan'),
            'nama_goals'=>$get_glsdet->nama,
            'bobot'=>$get_glsdet->bobot,
            'action'=>$this->input->post('desc_plan'),
            'deadline'=>$this->input->post('dl_plan'),
            'tgs_dept'=>$this->input->post('tgs_dept_plan'),
            'id_status'=>'1',
            'id_approve'=>'0'
        );
        $this->db->update('kpim_next',$upd,array('id'=>$id));
        $data['status'] = TRUE;
        echo json_encode($data);
    }

    function del_plannext()
    {
        $this->app_model->getLogin();
        $id = $this->input->post('id_plan_hps');
        $this->db->where('id',$id);
        $this->db->delete('kpim_next');
        $data['status'] = TRUE;
        echo json_encode($data);
    }

    public function get_allplannext()
    {
        $data = $this->M_kpimmingguannext->getAll()->result();
        echo json_encode($data);
    }

    public function get_plannext($id)
    {
        $data = $this->db->join('dept b','b.id_dept = a.tgs_dept')->where('a.id',$id)->get('kpim_next a')->row();
        echo json_encode($data);
    }

    public function chk_planthisweek()
    {
        $this->app_model->getLogin();
        $key = $this->session->userdata('id_karyawan');
        $hr = $this->db->get_where('karyawan',array('id_karyawan'=>$key))->row()->harikerja;

        $gt_mon = strtotime('monday this week');
        $gt_sat = ($hr == '5')?strtotime('next friday',$gt_mon):strtotime('next saturday',$gt_mon);
        $interval = new DateInterval('P1D');
        $begin = new DateTime(date('Y-m-d',$gt_mon));
        $end = new DateTime(date('Y-m-d',$gt_sat));
        $end = $end->modify('+1 day');
        $gt_per = new DatePeriod($begin, $interval ,$end);
        $gt_perarr = array();
        foreach ($gt_per as $dt)
        {
            $gt_perarr[] = $dt->format('Y-m-d');
        }
        $getplan2 = $this->db->group_by('tgl')->order_by('tgl asc')->get_where('kpim_next','id_karyawan = "'.$key.'" AND id_status ="2" AND id_approve = "1" AND  (tgl BETWEEN "'.date('Y-m-d',$gt_mon).'" AND "'.date('Y-m-d',$gt_sat).'")')->result();
        $gt_perplan2 = array();
        foreach ($getplan2 as $gp)
        {
            $gt_perplan2[] = $gp->tgl;
        }
        $getplan = $this->db->group_by('tgl')->order_by('tgl asc')->get_where('kpim_next','id_karyawan = "'.$key.'" AND id_status ="1" AND id_approve = "1" AND (tgl BETWEEN "'.date('Y-m-d',$gt_mon).'" AND "'.date('Y-m-d',$gt_sat).'")')->result();
        $gt_perplan = array();
        foreach ($getplan as $gp)
        {
            $gt_perplan[] = $gp->tgl;
        }
        $gethol = $this->db->get_where('hari_libur','tgl BETWEEN "'.date('Y-m-d',$gt_mon).'" AND "'.date('Y-m-d',$gt_sat).'"')->result();
        $gt_hol = array();
        foreach ($gethol as $gh)
        {
            $gt_hol[] = $gh->tgl;
        }
        $gtpernew = array_diff($gt_perarr,$gt_hol);
        $gt_pernew = array();
        foreach ($gtpernew as $gn)
        {
            $gt_pernew[] = $gn;
        }
        $result = array_diff($gt_pernew, $gt_perplan2);
        $deci = (count($result)>0)?$data['status'] = FALSE:$data['status'] = TRUE;
        $data['perplan2'] = $gt_perplan2;
        $data['perplan'] = $gt_perplan;
        $data['hol'] = $gt_hol;
        $data['pernew'] = $gt_pernew;
        $data['res'] = implode(', ',$result);
        echo json_encode($data);
    }

    public function sendPlanAdd()
    {
        $this->app_model->getLogin();
        $key = $this->session->userdata('id_karyawan');
        $hr = $this->db->get_where('karyawan',array('id_karyawan'=>$key))->row()->harikerja;

        $gt_mon = strtotime('monday this week');
        $gt_sat = ($hr == '5')?strtotime('next friday',$gt_mon):strtotime('next saturday',$gt_mon);
        $interval = new DateInterval('P1D');
        $begin = new DateTime(date('Y-m-d',$gt_mon));
        $end = new DateTime(date('Y-m-d',$gt_sat));
        $end = $end->modify('+1 day');
        $gt_per = new DatePeriod($begin, $interval ,$end);
        $gt_perarr = array();
        foreach ($gt_per as $dt)
        {
            $gt_perarr[] = $dt->format('Y-m-d');
        }
        $getplan2 = $this->db->group_by('tgl')->order_by('tgl asc')->get_where('kpim_next','id_karyawan = "'.$key.'" AND id_status ="2" AND id_approve = "1" AND (tgl BETWEEN "'.date('Y-m-d',$gt_mon).'" AND "'.date('Y-m-d',$gt_sat).'")')->result();
        $gt_perplan2 = array();
        foreach ($getplan2 as $gp)
        {
            $gt_perplan2[] = $gp->tgl;
        }
        $getplan = $this->db->group_by('tgl')->order_by('tgl asc')->get_where('kpim_next','id_karyawan = "'.$key.'" AND id_status ="1" AND id_approve = "1" AND (tgl BETWEEN "'.date('Y-m-d',$gt_mon).'" AND "'.date('Y-m-d',$gt_sat).'")')->result();
        $gt_perplan = array();
        foreach ($getplan as $gp)
        {
            $gt_perplan[] = $gp->tgl;
        }
        $gethol = $this->db->get_where('hari_libur','tgl BETWEEN "'.date('Y-m-d',$gt_mon).'" AND "'.date('Y-m-d',$gt_sat).'"')->result();
        $gt_hol = array();
        foreach ($gethol as $gh)
        {
            $gt_hol[] = $gh->tgl;
        }
        $gtpernew = array_diff($gt_perarr,$gt_hol);
        $gt_pernew = array();
        foreach ($gtpernew as $gn)
        {
            $gt_pernew[] = $gn;
        }
        $result = array_diff($gt_pernew, $gt_perplan2);
        if(count($result)>0)
        {
            $data['res'] = implode(', ',$result);
            $data['status'] = FALSE;
        }
        else
        {
            //Update dan Kirim Ke KPIM Mingguan
            $getplanall = $this->db->order_by('tgl asc')->get_where('kpim_next','id_karyawan = "'.$key.'" AND id_status ="1" AND id_approve = "1" AND (tgl BETWEEN "'.date('Y-m-d',$gt_mon).'" AND "'.date('Y-m-d',$gt_sat).'")')->result();
            foreach ($getplanall as $entry)
            {
                date_default_timezone_set('Asia/Jakarta');
                $planid = $entry->id;
                $tgl_input = $entry->tgl;
                $dl = $entry->deadline;
                if ($dl < $tgl_input )
                {
                    $sts_dl = 3;
                }
                elseif ($dl > $tgl_input )
                {
                    $sts_dl = 1;   
                }
                elseif ($dl == $tgl_input )
                {
                    $sts_dl = 2;   
                }

                $bobot = ($entry->bobot != '')?$entry->bobot:'5';

                $isi = array(
                    'id_karyawan' => $key,
                    'tgl' => $tgl_input,
                    'nama_goals' => $entry->nama_goals,
                    'action' => $entry->action,
                    'deadline' => $dl,
                    'tgs_dept' => $entry->tgs_dept,
                    'status_deadline' => $sts_dl,
                    'bobot' => $bobot,
                    'id_status' => '1',
                    'target' => '10',
                    'usulnilai' => '0',
                );
                $this->M_kpimmingguan->get_insert($isi);
                //Update Status Plan
                $up = array('id_status'=>'2');
                $up_plan = $this->db->update('kpim_next',$up,array('id'=>$planid));
            }
            $data['status'] = TRUE;
        }
        echo json_encode($data);
    }

    public function getplantosend_()
    {
        $this->app_model->getLogin();
        $key = $this->session->userdata('id_karyawan');
        $hr = $this->db->get_where('karyawan',array('id_karyawan'=>$key))->row()->harikerja;

        $gt_today = strtotime('today');
        $gt_mon = strtotime('next monday',$gt_today);
        $gt_sat = ($hr == '5')?strtotime('next friday',$gt_mon):strtotime('next saturday',$gt_mon);
        $interval = new DateInterval('P1D');
        $begin = new DateTime(date('Y-m-d',$gt_mon));
        $end = new DateTime(date('Y-m-d',$gt_sat));
        $end = $end->modify('+1 day');
        $gt_per = new DatePeriod($begin, $interval ,$end);
        $gt_perarr = array();
        foreach ($gt_per as $dt)
        {
            $gt_perarr[] = $dt->format('Y-m-d');
        }
        $getplan = $this->db->group_by('tgl')->order_by('tgl asc')->get_where('kpim_next','id_karyawan = "'.$key.'" AND id_status ="1" AND id_approve = "1" AND (tgl BETWEEN "'.date('Y-m-d',$gt_mon).'" AND "'.date('Y-m-d',$gt_sat).'")')->result();
        $gt_perplan = array();
        foreach ($getplan as $gp)
        {
            $gt_perplan[] = $gp->tgl;
        }
        $gethol = $this->db->get_where('hari_libur','tgl BETWEEN "'.date('Y-m-d',$gt_mon).'" AND "'.date('Y-m-d',$gt_sat).'"')->result();
        $gt_hol = array();
        foreach ($gethol as $gh)
        {
            $gt_hol[] = $gh->tgl;
        }
        $gtpernew = array_diff($gt_perarr,$gt_hol);
        $gt_pernew = array();
        foreach ($gtpernew as $gn)
        {
            $gt_pernew[] = $gn;
        }
        $data['today'] = date('Y-m-d',$gt_today);;
        $data['monday'] = date('Y-m-d',$gt_mon);
        $data['saturday'] = date('Y-m-d',$gt_sat);
        $data['period'] = $gt_pernew;
        $data['perplan'] = $gt_perplan;
        $data['hol'] = $gt_hol;
        $data['pernew'] = $gt_pernew;
        echo json_encode($data);
    }

    public function sendPlan()
    {
        $this->app_model->getLogin();
        $key = $this->session->userdata('id_karyawan');
        $hr = $this->db->get_where('karyawan',array('id_karyawan'=>$key))->row()->harikerja;

        $gt_today = strtotime('today');
        $gt_mon = strtotime('next monday',$gt_today);
        $gt_sat = ($hr == '5')?strtotime('next friday',$gt_mon):strtotime('next saturday',$gt_mon);
        $interval = new DateInterval('P1D');
        $begin = new DateTime(date('Y-m-d',$gt_mon));
        $end = new DateTime(date('Y-m-d',$gt_sat));
        $end = $end->modify('+1 day');
        $gt_per = new DatePeriod($begin, $interval ,$end);
        $gt_perarr = array();
        foreach ($gt_per as $dt)
        {
            $gt_perarr[] = $dt->format('Y-m-d');
        }
        $getplan = $this->db->group_by('tgl')->order_by('tgl asc')->get_where('kpim_next','id_karyawan = "'.$key.'" AND id_status ="1" AND id_approve = "1" AND (tgl BETWEEN "'.date('Y-m-d',$gt_mon).'" AND "'.date('Y-m-d',$gt_sat).'")')->result();
        $gt_perplan = array();
        foreach ($getplan as $gp)
        {
            $gt_perplan[] = $gp->tgl;
        }
        $gethol = $this->db->get_where('hari_libur','tgl BETWEEN "'.date('Y-m-d',$gt_mon).'" AND "'.date('Y-m-d',$gt_sat).'"')->result();
        $gt_hol = array();
        foreach ($gethol as $gh)
        {
            $gt_hol[] = $gh->tgl;
        }
        $gtpernew = array_diff($gt_perarr,$gt_hol);
        $gt_pernew = array();
        foreach ($gtpernew as $gn)
        {
            $gt_pernew[] = $gn;
        }
        if(count($gt_pernew) != count($gt_perplan))
        {
            $data['new'] = count($gt_pernew);
            $data['plan'] = count($gt_perplan);
            $data['status'] = FALSE;
        }
        else
        {
            //Update dan Kirim Ke KPIM Mingguan
            $getplanall = $this->db->order_by('tgl asc')->get_where('kpim_next','id_karyawan = "'.$key.'" AND id_status ="1" AND id_approve = "1" AND (tgl BETWEEN "'.date('Y-m-d',$gt_mon).'" AND "'.date('Y-m-d',$gt_sat).'")')->result();
            foreach ($getplanall as $entry)
            {
                date_default_timezone_set('Asia/Jakarta');
                $planid = $entry->id;
                $tgl_input = $entry->tgl;
                $dl = $entry->deadline;
                if ($dl < $tgl_input )
                {
                    $sts_dl = 3;
                }
                elseif ($dl > $tgl_input )
                {
                    $sts_dl = 1;   
                }
                elseif ($dl == $tgl_input )
                {
                    $sts_dl = 2;   
                }

                $bobot = ($entry->bobot != '')?$entry->bobot:'5';

                $isi = array(
                    'id_karyawan' => $key,
                    'tgl' => $tgl_input,
                    'nama_goals' => $entry->nama_goals,
                    'action' => $entry->action,
                    'deadline' => $dl,
                    'tgs_dept' => $entry->tgs_dept,
                    'status_deadline' => $sts_dl,
                    'bobot' => $bobot,
                    'id_status' => '1',
                    'target' => '10',
                    'usulnilai' => '0',
                );
                $this->M_kpimmingguan->get_insert($isi);

                //Update Status Plan
                $up = array('id_status'=>'2');
                $up_plan = $this->db->update('kpim_next',$up,array('id'=>$planid));
            }

            $data['new'] = count($gt_pernew);
            $data['plan'] = count($gt_perplan);
            $data['status'] = TRUE;
        }
        echo json_encode($data);
    }

    public function update($key){
        $this->app_model->getLogin();

        $gl = $this->input->post('goaledit');
        $gl2 = explode('pisah', $gl);
        $goals = $gl2[0];
        $bobot = $gl2[1];

        $data = array(
            //'nama_karyawan' => $this->input->post('nama'),
            //'jabatan' => $this->input->post('jabatan'),
            //'dept' => $this->input->post('dept'),
            'tgl' => $this->input->post('tgledit'),
            // 'tgl_start' => $this->input->post('tgl1'),
            // 'tgl_end' => $this->input->post('tgl2'),
            'bobot' => $bobot,
            'nama_goals' => $goals,
            'action' => $this->input->post('actionedit'),
            'deadline' => $this->input->post('deadlineedit'),
            'tgs_dept' => $this->input->post('tgs_dept'),
            );

        $libur = $this->M_pengumuman->ambil_libur()->result();
        foreach ($libur as $hr) {
            if ($hr->tgl == $this->input->post('tgledit')) {
                $this->session->set_flashdata('hari_libur', 'Mohon maaf, Hari/Tanggal : ' . nama_hari($hr->tgl). ', ' . tgl_indo($hr->tgl). ' itu hari ' .  $hr->kategori . ' (' . $hr->ket. ')');
                redirect(base_url() . 'kpimmingguannext', 'refresh');
            }
        }

        // untuk validasi tidak bisa input saat sabtu minggu mulai
        $tglinputnya = date('w', strtotime($this->input->post('tgledit')));

        if ($this->session->userdata('harikerja') == 5) {

            if ($tglinputnya == 0 || $tglinputnya == 6 ) {
                $this->session->set_flashdata('hari_libur', 'Mohon maaf, hari ' . nama_hari($this->input->post('tgledit')) . '  tanggal ' . date('d-m-Y', strtotime($this->input->post('tgledit'))) . ' hari libur');
                    redirect(base_url() . 'kpimmingguannext', 'refresh');
            }
            
        }

        if ($this->session->userdata('harikerja') == 6) {

            if ($tglinputnya == 0 ) {
                $this->session->set_flashdata('hari_libur', 'Mohon maaf, hari ' . nama_hari($this->input->post('tgledit')) . '  tanggal ' . date('d-m-Y', strtotime($this->input->post('tgledit'))) . ' hari libur');
                    redirect(base_url() . 'kpimmingguannext', 'refresh');
            }
            
        }
        // untuk validasi tidak bisa input saat sabtu minggu selesai

        // validasi agar tidak bisa input tgl lalu
        $hariini = date('Y-m-d');
        if ($this->input->post('tgledit') <= $hariini) {
            $this->session->set_flashdata('hari_libur', 'Mohon maaf, Anda tidak dapat menginputkan tanggal hari ini atau tanggal yang lalu');
                    redirect(base_url() . 'kpimmingguannext', 'refresh');            
        }
        // validasi agar tidak bisa input tgl lalu selesai

        $this->M_kpimmingguannext->get_update($data, $key);

        redirect(base_url() . 'Kpimmingguannext', 'refresh');
    }

    public function updatestatus(){
        $this->app_model->getLogin();
        $key = $this->session->userdata('id_karyawan');

        // mulai fungsi entri ke kpim
        $data_entri = $this->db->get_where('kpim_next', array('id_karyawan' => $key, 'id_status' => '1'))->result();

        foreach ($data_entri as $entri) {
            date_default_timezone_set('Asia/Jakarta');
            $tgl = $entri->tgl;
            $dead = $entri->deadline;

            if ($dead < $tgl ) {
                $status_dead = 3;
            }
            elseif ($dead > $tgl ) {
                $status_dead = 1;   
            }
            elseif ($dead == $tgl ) {
                $status_dead = 2;   
            }



            if ($entri->bobot == '') {
                $bobot = '7';
            }
            else{
                $bobot = $entri->bobot;
            }


            $isi = array(
                'id_karyawan' => $key,
                'tgl' => $entri->tgl,
                'nama_goals' => $entri->nama_goals,
                'action' => $entri->action,
                'deadline' => $entri->deadline,
                'tgs_dept' => $entri->tgs_dept,
                'status_deadline' => $status_dead,
                'bobot' => $bobot,
                'id_status' => '1',
                'target' => '10',
                'usulnilai' => '0',
            );
            $this->M_kpimmingguan->get_insert($isi);
        }
        // selesai fungsi entri ke kpim

        $data = array(
          
             'id_status' => $this->input->post('isistatus'),
            ); //id status 2 berarti sudah send
        $this->M_kpimmingguannext->get_updatestatus($data, $key);

       redirect(base_url() . 'Kpimmingguannext', 'refresh');
    }

    public function hapus($key){
        $this->app_model->getLogin();
        $where = array('id' => $key);
        $this->M_kpimmingguannext->delete($key);
        redirect(base_url() . 'Kpimmingguannext', 'refresh');
    }

    // $d = strtotime("today");
    // $start_week = strtotime("last sunday midnight",$d);
    // $end_week = strtotime("next thursday",$d);
    // $start = date("Y-m-d",$start_week); 
    // $end = date("Y-m-d",$end_week);
    // $getsuns = strtotime("next monday",$d);
    // $getsun = date("Y-m-d",strtotime("next monday",$d));
    // $getnextsat = date("Y-m-d",strtotime("next saturday",$getsuns));

    // echo date("Y-m-d",$d);
    // echo "\n";
    // echo $start;
    // echo "\n";
    // echo $end;
    // echo "\n";
    // echo $getsun;
    // echo "\n";
    // echo $getnextsat;
    // echo "<br><br>";

    // $begin = new DateTime($getsun);
    // $end = new DateTime($getnextsat);
    // $end = $end->modify( '+1 day' );

    // $interval = new DateInterval('P1D');
    // $daterange = new DatePeriod($begin, $interval ,$end);

    // $datenw = array();
    // foreach ($daterange as $dt)
    // {
    //     $datenw[] = $dt->format("Y-m-d");
    // }
    // $datenw = array_diff($datenw,["2018-10-17"]);
    // foreach($datenw as $date)
    // {
    //     echo $date . "<br>";
    // }
}
