<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visit extends CI_Controller {

	var $template = 'visit/template';
	var $table = 'visits';
	var $mailFrom = 'systemmatch@match-advertising.com';
	var $mailPass = 'Rahasia2017';
	
	public function __construct() {
		parent::__construct();
        $this->load->model(array('app_model'));
        $this->load->model('Mvisit/M_visit', 'visit');
        $this->load->library(array('session', 'form_validation', 'upload', 'user_agent', 'email', 'googlemaps'));
        $this->load->helper(array('url', 'form', 'text', 'html', 'security', 'file', 'directory', 'number', 'date', 'download', 'tgl_indo_helper'));
        date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$this->app_model->getLogin();
		$data['dept'] = implode(',', $this->visit->getDeptById($this->session->userdata('id_dept')));
		// $deptArray = explode(',', $this->session->userdata('id_dept'));
		// $deptString = $this->session->userdata('id_dept');
		// $getAllDept = implode(',', $data['dept']);
		// var_dump($data['dept']);
		// var_dump($getAllDept);
		// die();
		$this->load->view('visit/form_visit',$data);
	}

	function insert() {
		$this->form_validation->set_rules('log_lokasi', 'log_lokasi', 'required');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
                        'karyawan_id' => $this->session->userdata('id_karyawan'),
                        'visited_at' => date('Y-m-d H:i:s'),
                        'lokasi' => $this->input->post('log_lokasi'),
                        'lat' => $this->input->post('log_lat'),
                        'long' => $this->input->post('log_long'),
                        'company' => $this->input->post('company'),
                        'keterangan' => $this->input->post('keterangan'),
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
               
            $this->visit->get_insert($data);
            redirect(base_url() . 'Evisit/visit/show', 'refresh');

        } else {
        	redirect(base_url() . 'Evisit/visit', 'refresh');
        	// return 'error page';
        }
	} 

	function insertData($address, $lat, $long, $company, $pic, $no_telp, $ket) {

    	$data = array(
            'karyawan_id' => $this->session->userdata('id_karyawan'),
            'visited_at' => date('Y-m-d H:i:s'),
            'lokasi' => $address,
            'lat' => $lat,
            'long' => $long,
            'company' => $company,
            'pic' => $pic,
            'no_telp' => $no_telp,
            'keterangan' => $ket,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
           
        if ($this->visit->get_insert($data)) {
            return TRUE;
        } else {
        	return FALSE;
        }
	} 

	function show() {
		$this->app_model->getLogin();
		$data['visit'] = $this->visit->getVisitDataBy($this->session->userdata('id_karyawan'));
		// $data['visit'] = $this->M_visit->getVisitDataBy(80);
		$data['dept'] = implode(',', $this->visit->getDeptById($this->session->userdata('id_dept')));
		$data['jabatan'] = $this->getJabatan($this->session->userdata('id_karyawan'));
		$data['ago'] = $this->ago($this->session->userdata('id_karyawan'));
		$data['content'] = 'visit/list_visit';
		$this->load->view($this->template, $data);
	}

	function showNowVisit() {
		$this->app_model->getLogin();
		$data['visit'] = $this->visit->getVisitDataByNow($this->session->userdata('id_karyawan'));
		// $data['visit'] = $this->M_visit->getVisitDataBy(80);
		$data['dept'] = implode(',', $this->visit->getDeptById($this->session->userdata('id_dept')));
		$data['ago'] = $this->ago($this->session->userdata('id_karyawan'));
		$data['content'] = 'visit/list_visit';
		$this->load->view($this->template, $data);
	}

	function show_map($param1 = '', $param2 = '') {
		$this->app_model->getLogin();

		$data['lat'] = $param1;
		$data['long'] = $param2;
		$latlng = $param1.", ".$param2;
		// 
		// var_dump($latlng);
		// die();
		$config['center'] = $latlng;
		$config['zoom'] = 17; //'auto';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = $latlng;
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();

		$data['content'] = 'visit/map_visit2';
		$this->load->view($this->template, $data);
	}

	function history() {
		$this->app_model->getLogin();
		$this->app_model->getPass();
		$submit = $this->input->post('submit');

		// var_dump($submit);

		if ($submit == 'Tampil') {
			$this->form_validation->set_rules('nama_karyawan', 'nama_karyawan', 'required');

			if ($this->form_validation->run() == TRUE) {
				$name_id = $this->input->post('nama_karyawan');
				$id_dept = $this->input->post('kd_dept');
				$start = $this->input->post('mulai');
				$end = $this->input->post('selesai');

				$data_visitor = $this->visit->getAllHistory($name_id, $start, $end);
				$data['history_visit'] = $this->visit->getAllHistory($name_id, $start, $end);

				if ($data_visitor->num_rows() > 0) {
					$result = array();
					foreach ($data_visitor->result_array() as $row) {
						$result[] = 'lat: '.$row['lat'].', lng: '.$row['long'];
					};

					$multi_marker = $this->visit->getAllMarker($name_id, $start, $end);

					$result = array();
					foreach ($multi_marker->result_array() as $row) {
						$result[] = $row['lat'].', '.$row['long'];
					};

					if (count($result) > 0 ) {
						$config['center'] = $result[0];	
					} else {
						$config['center'] = '';
					}

					$config['zoom'] = 'auto';
					$this->googlemaps->initialize($config);

					foreach ($result as $key => $value) {
						$marker = array();
						$marker['position'] = $value;
						$this->googlemaps->add_marker($marker);
					}

					if (count($result) > 0 ) {
						$data['map'] = $this->googlemaps->create_map();
					} else {
						$data['map'] = array(
							'js' => '',
							'html' => ''
						);
					}
				}
				
				$data['visitor'] = $this->getNama($name_id);
				$data['departemen'] = $this->getDept($id_dept);
				$data['jabatan'] = $this->getJabatan($name_id);
				$data['foto'] = $this->getFoto($name_id);
				$data['ago'] = $this->ago($name_id);
				$data['id_dept'] = $id_dept;
				$data['id_name'] = $name_id;
				$data['tgl_awal'] = $start;
				$data['tgl_akhir'] = $end;
				$data['location'] = $this->getMultiMarker($name_id, $start, $end);
				$data['center'] = $this->getCenterMap($name_id, $start, $end);
				$data['dept'] = implode(',', $this->visit->getDeptById($this->session->userdata('id_dept')));
				$data['history_visit'] = $this->visit->getAllHistory($name_id, $start, $end);
			}
		}
		
		if ($this->app_model->getPass()) {
			$data['list_dept'] =  $this->visit->getDept();
			$data['content'] = 'visit/history_visit';
			$this->load->view($this->template, $data);	
		} else {
			// flashdata
			$this->session->set_flashdata('flashMessage', 'Mohon maaf anda tidak dapat masuk halaman History Visitor!');
			redirect('Evisit/visit/dashboard','refresh');
		}			
	}

	function delete() {
		$total = count($this->uri->segment_array());
		// for ($i=1; $i < $total; $i++) { 
			// echo 'segment'.$i .'= '.$this->uri->segment($i).'<br>';
		// }
		$id = $this->uri->segment(4);
		$id_karyawan = $this->uri->segment(5);
		$id_dept = $this->uri->segment(6);
		$start = $this->uri->segment(7);
		$end = $this->uri->segment(8);
		// var_dump($total);
		// die();
		$this->visit->delete($id);
		$this->reHistory($id_karyawan, $start, $end, $id_dept);
	}

	function edit_history() {
		$id_karyawan = $this->input->post('id_karyawan');
		$id_dept = $this->input->post('id_dept');
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		// var_dump($total);
		// die();
		$data = array(
			'note' => trim($this->input->post('note'))
		);
		$this->db->update($this->table, $data, array('id' => $this->input->post('id')));
		$this->reHistory($id_karyawan, $start, $end, $id_dept);
	}

	function reHistory($name_id, $start, $end, $id_dept) {
		$data['visitor'] = $this->getNama($name_id);
		$data['departemen'] = $this->getDept($id_dept);
		$data['jabatan'] = $this->getJabatan($name_id);
		$data['foto'] = $this->getFoto($name_id);
		$data['ago'] = $this->ago($name_id);
		$data['id_name'] = $name_id;
		$data['tgl_awal'] = $start;
		$data['tgl_akhir'] = $end;
		$data['id_dept'] = $id_dept;
		$data['location'] = $this->getMultiMarker($name_id, $start, $end);
		$data['center'] = $this->getCenterMap($name_id, $start, $end);
		$data['dept'] = implode(',', $this->visit->getDeptById($this->session->userdata('id_dept')));
		$data['history_visit'] = $this->visit->getAllHistory($name_id, $start, $end);
		if ($this->app_model->getPass()) {
			$data['list_dept'] =  $this->visit->getDept();
			$data['content'] = 'visit/history_visit';
			$this->load->view($this->template, $data);	
		} else {
			// flashdata
			$this->session->set_flashdata('flashMessage', 'Mohon maaf anda tidak dapat masuk halaman History Visitor!');
			redirect('Evisit/visit/dashboard','refresh');
		}	
	}

	function retrieveHistoryVisit() {
		if ('IS_AJAX') {
			$name_id = $this->input->post('id');
			$start = $this->input->post('start');
			$end = $this->input->post('end');	
		}

		$result = $this->visit->getAllHistory2($name_id, $start, $end);
        return $result;
	}

	function getNama($param = '') {
		$nama = $this->visit->getNamaKaryawan($param);
		return $nama;
	}

	function getDept($param = '') {
		$dept = $this->visit->getDeptName($param);
		return $dept;
	}

	function getJabatan($param = '') {
		$jabatan = $this->visit->getJabatanById($param);
		return $jabatan;
	}

	function getFoto($param = '') {
		$foto = $this->visit->getFotoKaryawan($param);
		return $foto;
	}

	public function get_name() {
		$dept_id = $this->input->post('dept_id');
		$tmp 	= '';
		// $data 	= $this->visit->getNameById($dept_id);
		$data 	= $this->visit->getNameAccessById($dept_id);
		if(!empty($data)) {
			$tmp .=	"<option value=''>Pilih Visitor</option>";	
			foreach($data as $row){	
			     $tmp .= "<option value='".$row['id_karyawan']."'>".$row['nama_karyawan']."</option>";
			}
		} else {
			$tmp .=	"<option value=''>Pilih Visitor</option>";	
		}
		die($tmp);
	}

	function getHistoryVisit() {
		$this->app_model->getLogin();

		$this->form_validation->set_rules('nama_karyawan', 'nama_karyawan', 'required');

		if ($this->form_validation->run() == TRUE) {
			$name_id = $this->input->post('nama_karyawan');
			$start = $this->input->post('mulai');
			$end = $this->input->post('selesai');

			$data_visitor = $this->visit->getAllHistory($name_id, $start, $end);
			$data['history_visit'] = $this->visit->getAllHistory($name_id, $start, $end);
			$result = array();
			foreach ($data_visitor->result_array() as $row) {
				$result[] = 'lat: '.$row['lat'].', lng: '.$row['long'];
			};

			$data['dept'] = implode(',', $this->visit->getDeptById($this->session->userdata('id_dept')));
			$data['history_visit'] = $this->visit->getAllHistory($name_id, $start, $end);

			$data['content'] = 'visit/history_visit_list';
			$this->load->view($this->template, $data);
		}		
	}

	function update(){
		$id= $this->input->post("id");
		$value= $this->input->post("value");
		$modul= $this->input->post("modul");
		$this->visit->update($id,$value,$modul);
		echo "{}";
	}

	function getMultiMarker($id, $start, $end) {
		// $id = 96;
		// $start = '2017-11-1';
		// $end = '2017-12-6';
		$data_visitor = $this->visit->getAllHistory($id, $start, $end);

		if ($data_visitor->num_rows() > 0) {

			$multi_marker = $this->visit->getAllMarker($id, $start, $end);

			$result = array();
			foreach ($multi_marker->result_array() as $row) {
				$result[] = "[".$row['lat'].', '.$row['long']."]";
			};

			return json_encode($result); 
			// var_dump($result);
		} 	

	}

	function getCenterMap($id = '', $start = '', $end = '') {
		$id = 96;
		$start = '2017-11-1';
		$end = '2017-12-22';
		$data_visitor = $this->visit->getAllHistory($id, $start, $end);

		if ($data_visitor->num_rows() > 0) {

			$multi_marker = $this->visit->getAllMarker($id, $start, $end);

			$result = array();
			foreach ($multi_marker->result_array() as $row) {
				$result[] = $row['lat'].', '.$row['long'];
			};
			$center = $result[0];

			return $center;
			// print_r($result[0]);
			// echo "<br>";
			//var_dump($center);
		}	
	}

	function getRouteMap() {
		$name_id = $this->input->post('id');
		$start = $this->input->post('tgl_awal');
		$end = $this->input->post('tgl_akhir');

		$data_visitor = $this->visit->getAllHistory($name_id, $start, $end);

		if ($data_visitor->num_rows() > 0) {
			$result = array();
			foreach ($data_visitor->result_array() as $row) {
				$result[] = 'lat: '.$row['lat'].', lng: '.$row['long'];
			};

			$multi_marker = $this->visit->getAllMarker($name_id, $start, $end);

			$result = array();
			foreach ($multi_marker->result_array() as $row) {
				$result[] = $row['lat'].', '.$row['long'];
			};

			if (count($result) > 0 ) {
				$config['center'] = $result[0];	
			} else {
				$config['center'] = '';
			}

			$config['zoom'] = 'auto';
			$this->googlemaps->initialize($config);

			foreach ($result as $key => $value) {
				$marker = array();
				$marker['position'] = $value;
				$this->googlemaps->add_marker($marker);
			}

			if (count($result) > 0 ) {
				$data['map'] = $this->googlemaps->create_map();
			} else {
				$data['map'] = array(
					'js' => '',
					'html' => ''
				);
			}
		}
		// }
		$data['content'] = 'visit/map_visit2';
		$this->load->view($this->template, $data);
	}

	function showUMap() {
		$this->app_model->getLogin();

		$date_now = date('Y-m-d');
		$name_id = $this->session->userdata('id_karyawan');
		$data_visitor = $this->visit->getNowHistory($name_id, $date_now);

		// echo $data_visitor->num_rows();
		// die();

		if ($data_visitor->num_rows() > 0) {
			$results = array();
			foreach ($data_visitor->result_array() as $row) {
				$results[] = 'lat: '.$row['lat'].', lng: '.$row['long'];
			};

			// var_dump($results);
			// die();

			$multi_marker = $this->visit->getAllMarkerNow($name_id, $date_now);

			$result = array();
			foreach ($multi_marker->result_array() as $row) {
				$result[] = $row['lat'].', '.$row['long'];
			};

			// var_dump($result);
			// die();

			if (count($result) > 0 ) {
				$config['center'] = $result[0];	
			} else {
				$config['center'] = '';
			}

			$config['zoom'] = 17;
			$this->googlemaps->initialize($config);

			foreach ($result as $key => $value) {
				$marker = array();
				$marker['position'] = $value;
				$this->googlemaps->add_marker($marker);
			}

			if (count($result) > 0 ) {
				$data['map'] = $this->googlemaps->create_map();
			} else {
				$data['map'] = array(
					'js' => '',
					'html' => ''
				);
			}
		}
		$data['content'] = 'visit/map_visit2';
		$this->load->view($this->template, $data);
	}

	function showUMarker() {
		$this->app_model->getLogin();

		$start = $this->input->post('mulai');
		$end = $this->input->post('selesai');
		$name_id = $this->session->userdata('id_karyawan');
		$data_visitor = $this->visit->getAllHistory($name_id, $start, $end);

		// echo $data_visitor->num_rows();
		// die();

		if ($data_visitor->num_rows() > 0) {
			$results = array();
			foreach ($data_visitor->result_array() as $row) {
				$results[] = 'lat: '.$row['lat'].', lng: '.$row['long'];
			};

			// var_dump($results);
			// die();

			$multi_marker = $this->visit->getAllMarker($name_id, $start, $end);

			$result = array();
			foreach ($multi_marker->result_array() as $row) {
				$result[] = $row['lat'].', '.$row['long'];
			};

			// var_dump($result);
			// die();

			if (count($result) > 0 ) {
				$config['center'] = $result[0];	
			} else {
				$config['center'] = '';
			}

			if (count($result) > 2) {
				$config['zoom'] = 14;
			} else {
				$config['zoom'] = 17;
			}
			
			$this->googlemaps->initialize($config);

			foreach ($result as $key => $value) {
				$marker = array();
				$marker['position'] = $value;
				$this->googlemaps->add_marker($marker);
			}

			if (count($result) > 0 ) {
				$data['map'] = $this->googlemaps->create_map();
			} else {
				$data['map'] = array(
					'js' => '',
					'html' => ''
				);
			}
		}
		$data['content'] = 'visit/map_visit2';
		$this->load->view($this->template, $data);
	}

	// function getRouteMap() {
	// 	if ('IS_AJAX') {
	// 		// $id = $this->input->post('id');
	// 		// $start = $this->input->post('tgl_awal');
	// 		// $end = $this->input->post('tgl_akhir');

	// 		$id = 96;
	// 		$start = '2017-11-1';
	// 		$end = '2017-12-6';

	// 		$multi_marker = $this->M_visit->getAllMarker($id, $start, $end);

	// 		$result = array();
	// 		foreach ($multi_marker->result_array() as $row) {
	// 			// $result[] = '[lat: '.$row['lat'].', lng: '.$row['long'].']';
	// 			$result[] = $row['lat'].', '.$row['long'];
	// 			$lok = $row['company'];
	// 			$lat = $row['lat'];
	// 			$long = $row['long'];
	// 		};

	// 		$getCenter = $result[0]; //explode(',', $result[5]);
	// 		// $getCenterLat = $result[0][0];
	// 		// $getCenterLong = $result[0][1];
	// 		// var_dump($result);
	// 		// die();

	// 		echo json_encode($result);
	// 		die();

	// 		$config['center'] = $getCenter;
	// 		$config['zoom'] = 16;
	// 		$this->googlemaps->initialize($config);

	// 		$polyline = array();
	// 		$polyline['points'] = $result;
	// 		$this->googlemaps->add_polyline($polyline);
	// 		$data['map'] = $this->googlemaps->create_map();

	// 		$this->load->view('visit/map_visit2', $data); 

	// 	}
	// }


	function marker() {
		$id = 96;
		$start = '2017-11-1';
		$end = '2017-12-6';

		$multi_marker = $this->visit->getAllMarker($id, $start, $end);

		$result = array();
		foreach ($multi_marker->result_array() as $row) {
			$result[] = $row['lat'].', '.$row['long'];
		};

		$config['center'] = '37.429, -122.1519';
		$config['zoom'] = 'auto';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = '37.429, -122.1519';
		$marker['infowindow_content'] = '1 - Hello World!';
		$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();

		$data['content'] = 'visit/map_visit2';
		$this->load->view($this->template, $data);
	}

	function dashboard() {
		$this->app_model->getLogin();

		$data['content'] = 'visit/dashboard';
		$this->load->view($this->template, $data);
	}

	public function ajax_edit($id) {
		$data = $this->visit->get_by_id($id);
		echo json_encode($data);
	}
 
	public function visits_update() {
		$data = array(
				'note' => $this->input->post('note')
			);
		$this->visit->visits_update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	function ago($param1 = '') {
		$mysql_akhir = "SELECT * FROM visits WHERE karyawan_id = $param1 ORDER BY id DESC LIMIT 1";
		$result = $this->db->query($mysql_akhir);

		if ($result->num_rows() > 0) {
			foreach ($result->result_array() as $row) {
				$tgl = date('Y-m-d H:i:s', strtotime($row['visited_at']));
				$waktu = $row['visited_at'];
			}
		} else {
			$waktu = ' ';
		}

		return timeago($waktu);
	}

	function printView() {
		$data['visit'] = $this->visit->getVisitDataBy($this->session->userdata('id_karyawan'));
		$data['dept'] = implode(',', $this->visit->getDeptById($this->session->userdata('id_dept')));
		$data['jabatan'] = $this->getJabatan($this->session->userdata('id_karyawan'));
		$data['ago'] = $this->ago($this->session->userdata('id_karyawan'));
		$data['content'] = 'visit/print';
		$this->load->view($this->template, $data);
	}

	function printViewBy() {
		$name_id = $this->input->post('id');
		$id_dept = $this->input->post('id_dept');
		$start = $this->input->post('tgl_awal');
		$end = $this->input->post('tgl_akhir');

		$data['visitor'] = $this->getNama($name_id);
		$data['dept'] = implode(',', $this->visit->getDeptById($id_dept));
		$data['jabatan'] = $this->getJabatan($name_id);
		$data['ago'] = $this->ago($name_id);
		$data['visit'] = $this->visit->getAllHistory($name_id, $start, $end);
		$data['content'] = 'visit/print';
		$this->load->view($this->template, $data);
	}

	function sendMail($mailTo = ' ', $locate = ' ', $client = ' ', $ket = ' ', $code = ' ') {

		$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    // 'smtp_user' => 'zamroni666@gmail.com',
		    // 'smtp_pass' => 'balongsari',
		    'smtp_user' => $this->mailFrom,
		    'smtp_pass' => $this->mailPass,
		    'mailtype'  => 'html', 
		    'charset'   => 'utf-8'
		);
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
	
		// $this->email->set_header('MIME-Version', '1.0; charset= utf-8');
		// $this->email->set_header('Content-type', 'text/html');
		$this->email->from($this->mailFrom, 'E-Visit');
		$this->email->to($mailTo);
		$this->email->subject('Verification Code e-Visit');
		
		$noVer = $code;
		$user = $this->session->userdata('nama_karyawan');

		$message = '<h2><strong>'.$locate.'</strong></h2>';
		$message .= '<p>Berikut ini hasil kunjungan Bapak/Ibu <b>'.$user.'</b> dengan Yth. Bapak/Ibu <b>'.$client.'</b> :</p>';
		$message .= '<p>'.$ket.'</p>';
		
		$message .= '<p>Terima kasih,<br>';
		$message .= '<strong>Match Advertising</strong></p>';
		$message .= '<p>Kode Verifikasi : </p>';

		$message .= '<div style="line-height:3px"><p>==============</p>';
		$message .= '<h1 style="letter-spacing:7px;"><strong><bold>'.$noVer.'</bold></strong></h1>';
		$message .= '<p>==============</p></div>';

    	$this->email->message($message);   

		//$this->email->message(strip_tags($message));
		if($this->email->send() == false){
			show_error($this->email->print_debugger());
		}else{
			return TRUE;
		}

	}

	function lastVisitId() {
		$this->db->select('*');
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('visits');
		if ($query->num_rows() > 0) {
			$id = array();
			foreach ($query->result_array() as $row) {
				$id = $row['id'];
			}
		}
		return $id;
		// echo $id;
	}

    function insertDB() {
    	$getCode = $this->generate_random_string(4);
    	$address = $this->input->post('address');
    	$lat = $this->input->post('latitude');
    	$long = $this->input->post('longitude');
    	$mailTo = $this->input->post('email_address');
    	$lokasi = $this->input->post('company');
    	$pic = $this->input->post('pic');
    	$no_telp = $this->input->post('no_telp');
    	$keterangan = $this->input->post('keterangan');
    	

    	$this->insertData($address, $lat, $long, $lokasi, $pic, $no_telp, $keterangan);

    	$this->sendMail($mailTo, $lokasi, $pic, $keterangan, $getCode);

    	$lastId = $this->lastVisitId();

    	$data = array(
    		'id_visit' => $lastId,
    		'email_address' => $mailTo,
    		'verification_code' => $getCode
    	);

    	if ($this->db->insert('numbers', $data)) {
    		$json = array();
    		$json["visit_id"] = $lastId;
	        $json["verification_code"] = $getCode;
	 
	        header('Content-type: application/json');
	        echo json_encode($json);
    	} else {
    		// return 'error';
    		$this->returnError('error');
    	}
    }

    function returnError($error) {
        $json = array();
        $json["errors"] = $error;
 
        header('Content-Type: application/json');
    	echo json_encode($json);
    }

    function generate_random_string($length) {
        $characters = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        // $length = 4;
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    function updateDB($mail, $code) {
    	// update db
		$this->db->where('email_address', $mail);
		$this->db->where('verification_code', $code);
		$this->db->update('numbers', array('verified' => 1));
		return TRUE;
    }

    function resend() {
    	$getCode = $this->generate_random_string(4);
    	$address = $this->input->post('address');
    	$lat = $this->input->post('latitude');
    	$long = $this->input->post('longitude');
    	$mailTo = $this->input->post('email_address');
    	$lokasi = $this->input->post('company');
    	$pic = $this->input->post('pic');
    	$keterangan = $this->input->post('keterangan');
    	$id_visit = $this->input->post('id_visit');

    	$this->sendMail($mailTo, $lokasi, $pic, $keterangan, $getCode);
    	if ($this->updateCode($id_visit, $mailTo, $getCode)) {
    		$json = array();
    		$json["visit_id"] = $id_visit;
	        $json["verification_code"] = $getCode;
	 
	        header('Content-type: application/json');
	        echo json_encode($json);	
    	} else {
    		$this->returnError('error');
    	}	
    	
    }

    function updateCode($id, $email, $code) {
    	$this->db->where('id_visit', $id);
    	$this->db->where('email_address', $email);
    	$this->db->update('numbers', array('verification_code' => $code));
    	return TRUE;
    }

    function matchVerificationCode() {
    	$mail = $this->input->post('email_address');
    	$code = trim(strtoupper($this->input->post('verification_code')));
    	$this->db->where('email_address', $mail);
    	$this->db->where('verification_code', $code);
    	$query = $this->db->get('numbers');
    	if ($query->num_rows() > 0) {
    		$this->updateDB($mail, $code);

    		// return 'cocok';
    		$json = array();
    		$json["status"] = 'verified';
	        $json["success"] = 'Thank you! Your email address has been verified!';
	 
	        header('Content-type: application/json');
	        echo json_encode($json);
    	} else {
    		// $this->returnError('Verification code incorrect, please try again.');
    		$json = array();
    		$json["status"] = 'unverified';
	        $json["errors"] = 'Verifikasi gagal, mohon coba kembali.';
	 
	        header('Content-type: application/json');
	        echo json_encode($json);
    	}
    }

    function statusIs() {
    	$mailAdd = $this->input->post('email_address');
    	$this->db->where('email_address', $mailAdd);
    	$query = $this->db->get('numbers');

    	if($query->num_rows() > 0) {
    		foreach ($query->result_array() as $row) {
    			if ($row['verified'] == 1) {
    				// return 'verified';
    				$json = array();
			        $json["status"] = 'verified';
			 
			        header('Content-type: application/json');
			        echo json_encode($json);
    			} else {
    				// return 'unverified';
    				$json = array();
			        $json["status"] = 'unverified';
			 
			        header('Content-type: application/json');
			        echo json_encode($json);
    			}
    		}
    	}
    }

    function insertSignature() {
    	$sign = $this->input->post('image');
		$id_visit = $this->input->post('id_visit');

		$data = array(
			'sign' => $sign
		);
		
		$this->db->where('id', $id_visit);
		$query = $this->db->update('visits', $data);
		// if ($this->db->insert('test', $data)) {
		if ($query) {	
			$json = array();
	        $json["success"] = 'sukses insert signature';
	 
	        header('Content-type: application/json');
	        echo json_encode($json);
		} else {
			$json = array();
	        $json["errors"] = 'error insert signature';
	 
	        header('Content-type: application/json');
	        echo json_encode($json);
		}
    }

    function insertSign() {
    	$sign = $this->input->post('hiddenSigData');
		$id_visit = $this->input->post('id_visit2');

		// var_dump($sign.' '.$id_visit);
		// die();

		$data = array(
			'sign' => $sign
		);
		
		$this->db->where('id', $id_visit);
		$query = $this->db->update($this->table, $data);
		if ($query) {	
			redirect(base_url() . 'Evisit/visit/show', 'refresh');
		} else {
			redirect(base_url() . 'Evisit/visit', 'refresh');
		}
    }


}
