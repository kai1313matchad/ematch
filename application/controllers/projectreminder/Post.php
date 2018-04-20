<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Post extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('projectreminder/M_data','M_data');
			$this->load->library('email');
		}

		public function index()
		{
			$data['title']='Meeting Scheduler - Halaman Utama';
			$data['menu']='dash_post';
			$data['content']='projectreminder/menu/content/post_dashboard';
			$this->load->view('projectreminder/menu/layout/wrapper',$data);
		}

		public function create()
		{
			$data['title']='Meeting Scheduler - Halaman Utama';
			$data['menu']='dash_post';
			$data['content']='projectreminder/menu/content/post_create';
			$this->load->view('projectreminder/menu/layout/wrapper',$data);
		}

		public function edit()
		{
			$data['title']='Meeting Scheduler - Halaman Utama';
			$data['menu']='dash_post';
			$data['content']='projectreminder/menu/content/post_edit';
			$table='schedule';
			$data['schedule'] = $this->M_data->tampil_data()->result();
			$this->load->view('projectreminder/menu/layout/wrapper',$data);
		}

		public function edit_aksi($id)
		{
			$query = $this->db->get_where('schedule',array('sch_id'=>$id));
			$data = $query->row();
			echo json_encode($data);
		}

		public function tes($id)
		{
			$query = $this->db->get_where('schedule', array('SCH_ID' => $id));
            $data1 = $query->row();
            $title = $data1->SCH_TITLE;
            $tgl = $data1->SCH_DATE;
            $jam = $data1->SCH_TIME;
            $dept = $data1->SCH_DEPT;
            $dpt = explode(',', $dept);
            $in = implode('', $dpt);

            echo json_encode(array("id"=>$id,"title"=>$title,"tgl"=> date('d - m - Y',strtotime($tgl)),"jam"=>$jam ));
		}

	    public function karyawan($id)
		{
			// $dpt = explode(',', $this->input->post('test'));
			// $dpt = explode(',','1,4');
			// $dpt = array ("1","4");
			// $in = implode('', $dpt);
            $query = $this->db->get_where('schedule', array('SCH_ID' => $id));
            $data1 = $query->row();
            $dept = $data1->SCH_DEPT;
            $tes = $data1->SCH_TITLE;
            $tgl = $data1->SCH_DATE;
            $jam = $data1->SCH_TIME;
            $dpt = explode(',', $dept);
            $in = implode('', $dpt);            
            $list = $this->M_data->tampil_karyawan($in);
			$data = array();
            $no = $_POST['start'];
            foreach ($list as $dat) {
            	$email = $dat->email;
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $dat->nama_karyawan;
                $row[] = $dat->email;
                $row[] = $dat->deptini;
                $row[] = '<input type="checkbox" onclick="email($(this))" name="pilih" value="'.$dat->id_karyawan.'" >';
                $data[] = $row;
            }
            // '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="email()"><span class="glyphicon glyphicon-import"></span>m </a>';
            // <form id="formku" action="send_email" method="POST">
            //     <input type="hidden" value="'.$tes.'" name="title">
            //     <input type="hidden" value="'.$tgl.'" name="tgl">
            //     <input type="hidden" value="'.$jam.'" name="jam">
            //     <input type="hidden" value="'.$dat->email.'" name="email">
            //     <input type="submit" name="input" class="btn btn-primary" value="kirim">
            //     </form>
            $output = array(
                            "draw" => $_POST['draw'],
                            // "recordsTotal" => $this->search_user->count_all(),
                            // "recordsFiltered" => $this->search_user->count_filtered(),
                            "data" => $data,
                            "test" => $tes
                    );            
            echo json_encode($output);
		}
 
        function simpan_email($id)
        {
          $query = $this->db->get_where('karyawan', array('id_karyawan' => $id));
          $data1 = $query->row();
          $id_karyawan = $id;
          $id_meeting = $this->input->post('id_meeting');
    //       $title = $this->input->post('title');
		  // $tgl = $this->input->post('tgl');
		  // $jam = $this->input->post('jam');
		  $email = $data1->email;
		  $data = array(
		  	'id_meeting' =>$id_meeting,
		  	'id_karyawan' => $id_karyawan,
			'email' => $email
			);
	        $table = 'kirim_email';
		    $this->M_data->input_data($data,$table);
        }

        function hapus_email($id)
        {
        	$id_karyawan = $id;
        	$id_meeting = $this->input->post('id_meeting');
            $where = array('id_karyawan'=>$id_karyawan, 'id_meeting'=>$id_meeting);
	        $table = 'kirim_email';
		    $this->M_data->delete_data($where,$table);
        }

		function send_email() {
		$id_meeting = $this->input->post('id_meeting');
		$title = $this->input->post('title');
		$tgl = $this->input->post('tgl');
		$jam = $this->input->post('jam');

	    $config = array();
        $config['protocol'] = 'smtp';
        //$config['smtp_host'] = 'ssl://e-matchad.com';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        //$config['smtp_user'] = 'timetable@e-matchad.com';
        $config['smtp_user'] = 'hrd@match-advertising.com';
        //$config['smtp_pass'] = 'Rahasia2017';
        $config['smtp_pass'] = 'rahasia2014';
        $config['smtp_port'] = 465;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $get = $this->db->get_where('kirim_email',array('id_meeting' => $id_meeting))->result();
        $message = '<table>
					  <tr>
					    <td>Tema</td>
					    <td>:</td>
					    <td>'.$title.'</td>
					  </tr>
					  <tr>
					    <td>Tanggal</td>
					    <td>:</td>
					    <td>'.$tgl.'</td>
					  </tr>
					  <tr>
					    <td>Jam</td>
					    <td>:</td>
					    <td>'.$jam.'</td>
					  </tr>
					</table>';
        foreach($get as $data) {
              $this->email->set_newline("\r\n");
	          $this->email->to($data->email);
              $this->email->from('Reminder@e-matchad.com','Remnder Meeting');
              $this->email->subject('Reminder Meeting');    
              $this->email->message($message);
              $this->email->send();
        }
        $table='kirim_email';
        $where = array('id_meeting'=>$id_meeting);
        $this->M_data->delete_data($where,$table);
        redirect(base_url(). 'Post/reminder', 'refresh');        
	    }

		public function notulen()
		{
			$data['title']='Meeting Scheduler - Halaman Utama';
			$data['menu']='dash_post';
			$data['content']='projectreminder/menu/content/post_notulen';
			$table='schedule';
			$data['schedule'] = $this->M_data->tampil_data()->result();
			$this->load->view('projectreminder/menu/layout/wrapper',$data);
		}

		public function notulen_aksi($id)
		{
			$query = $this->M_data->tampil_data2($id);
			$data = $query->row();
			echo json_encode($data);
		}

        public function reminder()
		{
			$data['title']='Meeting Scheduler - Halaman Utama';
			$data['menu']='dash_post';
			$data['content']='projectreminder/menu/content/post_reminder';
			$table='schedule';
			$data['schedule'] = $this->M_data->tampil_data()->result();
			// $data['karyawan'] = $this->M_data->tampil_karyawan()->result();
			$this->load->view('projectreminder/menu/layout/wrapper',$data);
		}

        public function data_karyawan()
		{
			$data['title']='Meeting Scheduler - Halaman Utama';
			$data['menu']='dash_post';
			$data['content']='projectreminder/menu/content/post_reminder';
			$table='schedule';
			$data['karyawan'] = $this->M_data->tampil_karyawan()->result();
			$this->load->view('projectreminder/menu/layout/wrapper',$data);
		}
  
        public function cetak()
		{
			$data['title']='Meeting Scheduler - Halaman Utama';
			$data['menu']='dash_post';
			$data['content']='projectreminder/menu/content/post_cetak';
			$table='schedule';
			$data['schedule'] = $this->M_data->tampil_data()->result();
			$this->load->view('projectreminder/menu/layout/wrapper',$data);
		}

		public function cetak_aksi()
		{
		   $id=$this->input->post("id");
		   $data['title']='Meeting Scheduler - Halaman Utama';
		   $data['menu']='dash_post';
		   $data['content']='projectreminder/menu/content/cetak_meeting';
		   $data['schedule']= $this->M_data->tampil_data2($id)->result();
           $this->load->view('projectreminder/menu/layout/wrapper',$data);
		}

		public function cetak_tertentu()
		{
		   $tgl1=$this->input->post("tanggal");
		   $tgl2=$this->input->post("tanggal2");
		   $dept=$this->input->post("dept");
		   $data['title']='Meeting Scheduler - Halaman Utama';
		   $data['menu']='dash_post';
		   $data['content']='projectreminder/menu/content/cetak_meeting_tanggal';
		   if ($dept==0){
		      $data['schedule']= $this->M_data->tampil_data3($tgl1,$tgl2)->result();
		   }else{
		      $data['schedule']= $this->M_data->tampil_data4($tgl1,$tgl2,$dept)->result();
		   }
           $this->load->view('projectreminder/menu/layout/wrapper',$data);
		}
	}
?>