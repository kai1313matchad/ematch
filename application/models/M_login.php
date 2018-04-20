<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

	
	public function getLogin($u = '', $p = '', $v = null) //menampung nulai dari contoller login, jika di controller 2 variable d model juga harus 2
	{
		$pwd = md5($p);//password yg di encryp MD5
		$this->db->where('username',$u);// kondisi apakah username sama dengan isi dengan table
		$this->db->where('password',$pwd);//kondisi password yag sudang di encryp
		$q = $this->db->get('karyawan');//table yang di akses
		if($q->num_rows()>0) //apakah username dan password benar sesuai dengan data di table
		{
			//jika benar
			foreach($q->result() as $row) //isian dari table di tampung di variable $row
			{
				//membuat variable sess untuk menampung isi dari table agar dapat kita gunakan kembali di aplikasi

				if ($this->agent->is_browser())
		        {
		            $agent = $this->agent->browser().' '.$this->agent->version();
		        }
		        elseif ($this->agent->is_robot())
		        {
		            $agent = $this->agent->robot();
		        }
		        elseif ($this->agent->is_mobile())
		        {
		            $agent = $this->agent->mobile();
		        }
		        else
		        {
		            $agent = 'Unidentified User Agent';
		        }
		        
		        $sess = array(
					'username' => $row->username,
					'password' => $row->password,
					'nama_karyawan' =>$row->nama_karyawan,
					'level' => $row->id_jabatan,
					'jabatannya' => $row->jabatannya,
					'id_karyawan' => $row->id_karyawan,
					'id_dept' => $row->dept,
					'hak_akses' => $row->hak_akses,
					'id_status' => $row->id_status,	
					'harikerja' => $row->harikerja,
					'status' => $row->status,
					'email' => $row->email,
	                'platform' => $this->agent->platform(),
	                'browser' => $agent,
	                'foto' => $row->img,
	                'logged_in' => true,
				);

				$this->session->set_userdata($sess);
				//akan di arahkan ke controller home
				//$this->updateLastLogin($row->id_karyawan);

				if ($v != null) {
					redirect('Evisit/visit');
				}

				if ($this->session->userdata('level') == 1 ) {
                    redirect('index');
                } else {
                    redirect('index');
                }

				//redirect('admin/home');
			}
		}else{
			//jika username dan password salah
			$this->session->set_flashdata('info','Maaf username atau password salah');
			//di arahkan ke login
			redirect('login');
		}
	}

	function updateLastLogin($usr) {
		$data = array(
            'last_login' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_karyawan', $usr);
        $this->db->update('karyawan', $data);
        return TRUE;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */