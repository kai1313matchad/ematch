<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumentasi extends CI_Controller {

	var $table = 'dokumentasi';
	var $template = 'guide/template';
	var $destination;
	public function __construct() {
		parent::__construct();
        $this->load->model(array('app_model'));
       	$this->load->model('Doku/M_doku', 'doku');
        $this->load->library(array('session', 'form_validation', 'upload', 'user_agent', 'email'));
        $this->load->helper(array('url', 'form', 'text', 'html', 'security', 'file', 'directory', 'number', 'date', 'download', 'tgl_indo'));
        $this->destination = realpath(APPPATH. '../dokumentasi/');
	}
	public function index()
	{
		$this->app_model->getLogin();
		$data_page['tab_menu'] = $this->doku->getTabsMenu();
		$data_page['content_menu'] = $this->doku->getContentTabs();
		$data_page['content'] = 'guide/doc';
		$this->load->view($this->template, $data_page);
	}

	function mimin($param1 = '', $param2 = '', $param3 = '') {
		$this->app_model->getLogin();
		$this->app_model->getAccess();

		$tanggal = date('Y-m-d');
        if ($param1 == 'create') {
            $this->form_validation->set_rules('nama_dokumen', 'nama_dokumen', 'required');
            $this->form_validation->set_rules('jenis_file', 'jenis_file', 'required');

            $this->load->library('upload');

	        $config['upload_path'] = './dokumentasi/'; //path folder
	        $config['allowed_types'] = '*'; //type yang dapat diakses bisa anda sesuaikan
	        $config['max_size'] = 18000;
	        $config['file_name'] = $_FILES['nama_file']['name']; //$nmfile; //nama yang terupload nantinya
			
	        $this->upload->initialize($config);

	        // if ($this->upload->do_upload('nama_file')) {
	        // 	echo "sukses";
	        // } else {
	        // 	print_r( $this->upload->display_errors());
	        // }

	        // die();

            if ($this->upload->do_upload('nama_file'))
	        {
                $data = array(
                    'nama_dokumen' => $this->input->post('nama_dokumen'),
                    'jenis_file' => $this->input->post('jenis_file'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'nama_file' => $_FILES['nama_file']['name']
                );
	                
                $this->doku->get_insert($data); //akses model untuk menyimpan ke database
            	$this->session->set_flashdata('flash_message' , 'data added successfully');

            	redirect(base_url() . 'doku/Dokumentasi/mimin', 'refresh');
	        } else {
	            //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
	            $this->session->set_flashdata('flash_message_error' , 'data gagal disimpan');
	            redirect(base_url() . 'doku/Dokumentasi/mimin', 'refresh');
            }
        }
        if ($param1 == 'edit') {
            $this->form_validation->set_rules('nama_dokumen', 'nama_dokumen', 'required');
            $this->form_validation->set_rules('jenis_file', 'jenis_file', 'required');

            $this->load->library('upload');
	       
	        $config['upload_path'] = './dokumentasi/'; //path folder
	        $config['allowed_types'] = '*'; //type yang dapat diakses bisa anda sesuaikan
	        $config['file_name'] = $_FILES['nama_file']['name']; //$nmfile; //nama yang terupload nantinya
		
	        $this->upload->initialize($config);

            if ($this->form_validation->run() == TRUE) {

                if ($this->upload->do_upload('nama_file'))
	            {
	                $data = array(
	                    'nama_dokumen' => $this->input->post('nama_dokumen'),
	                    'jenis_file' => $this->input->post('jenis_file'),
	                    'deskripsi' => $this->input->post('deskripsi'),
	                    'updated_at' => date('Y-m-d H:i:s'),
	                    'nama_file' => $_FILES['nama_file']['name']
	                );
		                
	                $this->db->select('*');
					$this->db->where(array('id'=>$param2));
					$query = $this->db->get($this->table);
		            $result =  $query->first_row('array');
		            $nama = $result['nama_file'];
		            
		            //hapus file dari server
		               
		            // lokasi folder file
		            $map = $_SERVER['DOCUMENT_ROOT'];
		            $path = $this->destination . '/';
		            //lokasi gambar secara spesifik
		            $file = $path.$nama;
		            // var_dump($file);
		            // die();
		            //hapus image
		            unlink($file);

	                $this->doku->get_update($data,$param2);
                	$this->session->set_flashdata('flash_message' , 'data updated');
                	redirect(base_url() . 'doku/Dokumentasi/mimin', 'refresh');
                } else {
                	$data = array(
	                    'nama_dokumen' => $this->input->post('nama_dokumen'),
	                    'jenis_file' => $this->input->post('jenis_file'),
	                    'deskripsi' => $this->input->post('deskripsi'),
	                    'updated_at' => date('Y-m-d H:i:s')
	                );
	                $this->doku->get_update($data,$param2);
                	$this->session->set_flashdata('flash_message' , 'data updated');
                	redirect(base_url() . 'doku/Dokumentasi/mimin', 'refresh');
                }
                
            } else {

                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata('flash_message_error' , 'data gagal diupdate');
                redirect(base_url() . 'doku/Dokumentasi/mimin', 'refresh');
            }
        }
        if ($param1 == 'delete') {
        	// cek nama file di DB
        	$this->db->select('*');
			$this->db->where(array('id'=>$param2));
			$data =	 $this->db->get($this->table);
            $result =  $data->first_row('array');
            $nama = $result['nama_file'];

            // lokasi folder file
            $map = $_SERVER['DOCUMENT_ROOT'];
            $path = $this->destination . '/';
            //lokasi gambar secara spesifik
            $file = $path.$nama;
            //hapus image
            unlink($file);

            $this->doku->delete($param2);
            $this->session->set_flashdata('flash_message' , 'data deleted');
            redirect(base_url() . 'doku/Dokumentasi/mimin', 'refresh');
        }
        if ($this->app_model->getPass()) {
        	$countCat = $this->getCountCat();
        	for ($i=1; $i <= $countCat; $i++) { 
				$data_page['kategoris'.$i] = $this->doku->getListDoc($i);
			}
			$data_page['group'] = $countCat;
			$data_page['data_file'] = $this->doku->getDoku();
			$data_page['data_file2'] = $this->doku->getApps();        
			$data_page['page_name']  = 'dokumentasi';
	        $data_page['page_title'] = 'manage dokumentasi';
	        $data_page['content'] = 'guide/dokumentasi';
			$this->load->view($this->template, $data_page);	
		} else {
			// flashdata
			$this->session->set_flashdata('flash_message_error', 'Level Admin Only');
			redirect('doku/Dokumentasi','refresh');
		}	
	}

	function getCountCat() {
		$query = $this->db->get('kategori_doc');
		$jml = $query->num_rows();

		return $jml;
	}

	function category($param1 = '', $param2 = '', $param3 = '')
    {
        if ($param1 == 'create') {
            $this->form_validation->set_rules('nama_doc', 'nama_doc', 'required');

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                        'nama_doc' => $this->input->post('nama_doc'),
                        'date' => date('Y-m-d')
                    );
               
                $this->doku->get_cat_insert($data); //akses model untuk menyimpan ke database
                $this->session->set_flashdata('flash_message' , 'data added successfully');

                redirect(base_url() . 'doku/Dokumentasi/category', 'refresh');
            } else {
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata('flash_message_error' , 'data gagal disimpan');
                redirect(base_url() . 'doku/Dokumentasi/category', 'refresh');
            }
        }
        if ($param1 == 'edit') {
            $this->form_validation->set_rules('nama_doc', 'nama_doc', 'required');

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                        'nama_doc' => $this->input->post('nama_doc'),
                        'date' => date('Y-m-d')
                    );

                $this->doku->get_cat_update($data,$param2);
                $this->session->set_flashdata('flash_message' , 'data updated');
                redirect(base_url() . 'doku/Dokumentasi/category', 'refresh');
            } else {
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata('flash_message_error' , 'data gagal diupdate');
                redirect(base_url() . 'doku/Dokumentasi/category', 'refresh');
            }
        }
        if ($param1 == 'delete') {
            $this->doku->delete_category($param2);
            $this->session->set_flashdata('flash_message' , 'data deleted');
            redirect(base_url() . 'doku/Dokumentasi/category', 'refresh');
        }
		$data_page['data_kategori'] = $this->doku->getCategory();        
		$data_page['page_name']  = 'category';
		$data_page['category']  = 'active';
        $data_page['page_title'] = 'manage kategori';
	    $data_page['content'] = 'guide/kategori';
		$this->load->view($this->template, $data_page);
    }

	public function getFile($id) {
		header("Content-type:application/pdf");
		//cek nama image dari database
        $this->db->select('*');
        $this->db->where('id', $id);
		$data =	 $this->db->get($this->table);
        $result =  $data->first_row('array');
        $nama = $result['nama_file'];
        $path = $this->destination . '/';

		$name = $path.$nama;
		$data = file_get_contents($path.$nama);
		$this->load->helper('file');
	    $file_name = $nama;

	    // Load the download helper and send the file to your desktop
	    $this->load->helper('download');
	    force_download($file_name, $data);

	    //$this->load->library('zip');
	    //$this->zip->add_data($nama,$data);
	    //$this->zip->download('katalog.zip');
	}

	function viewFile($id) {
		$this->db->select('*');
        $this->db->where('id', $id);
		$data =	 $this->db->get($this->table);
        $result =  $data->first_row('array');
        $nama = $result['nama_file'];
        $path = $this->destination . '/';

		$name = $path.$nama;
		$data = file_get_contents($path.$nama);
		$this->load->helper('file');
	    $file_name = $nama;

		header("Content-Type: application/pdf");
		header("Content-Disposition: inline; filename='PostgreSQL.pdf'");

	}

}
