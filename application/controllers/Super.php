<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Super extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model(array('M_kpimmingguannext', 'M_kpimmingguan' , 'app_model', 'M_pengumuman', 'M_karyawanku'));
        $this->load->library(array('session', 'form_validation', 'upload', 'user_agent', 'email'));
        $this->load->helper(array('url', 'form', 'text', 'html', 'security', 'file', 'directory', 'number', 'date', 'download', 'tgl_indo'));
	}
	public function index()
	{
		$this->app_model->getLogin();
		$key = $this->session->userdata('id_karyawan');
		$data['profilku'] = $this->M_kpimmingguan->getdataku()->result();
        $data['jabatan'] = $this->M_kpimmingguannext->getJabatan($key);
        $data['dept'] = $this->M_kpimmingguannext->getDept($key);
		$this->load->view('superview',$data);
	}

	public function getAllKry()
	{
		$data = $this->db->order_by('nama_karyawan')->get_where('karyawan','status = "Aktif" AND id_jabatan != "1"')->result();
		echo json_encode($data);
	}

	public function getPlanList()
	{
		$key = $this->input->post('karyawan');
		$tglstr = $this->input->post('tglstart');
		$tglend = $this->input->post('tglend');
		$data = $this->db->order_by('b.nama_karyawan, a.tgl')->join('karyawan b','b.id_karyawan = a.id_karyawan')->get_where('kpim_next a','a.id_karyawan = "'.$key.'" AND b.status = "Aktif" AND a.tgl BETWEEN "'.$tglstr.'" AND "'.$tglend.'"')->result();
		echo json_encode($data);
	}

	public function sendPlan($id)
	{
		$this->app_model->getLogin();
		$getDt = $this->db->get_where('kpim_next',array('id'=>$id))->row();
		$key = $getDt->id_karyawan;
		//Insert KPIM
		$tgl_input = $getDt->tgl;
        $dl = $getDt->deadline;
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
		$isi = array(
			'id_karyawan' => $key,
            'tgl' => $getDt->tgl,
            'nama_goals' => $getDt->nama_goals,
            'action' => $getDt->action,
            'deadline' => $getDt->deadline,
            'tgs_dept' => $getDt->tgs_dept,
            'status_deadline' => $sts_dl,
            'bobot' => $getDt->bobot,
            'id_status' => '1',
            'target' => '10',
            'usulnilai' => '0',
        );
        $this->M_kpimmingguan->get_insert($isi);
        //Update Status Plan
        $up = array('id_status'=>'2');
        $up_plan = $this->db->update('kpim_next',$up,array('id'=>$id));
        $data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
        echo json_encode($data);
	}
}