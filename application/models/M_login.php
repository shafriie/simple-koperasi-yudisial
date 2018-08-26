<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function submit($nip, $password)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('nip', $nip);
		$num_rows = $this->db->get()->num_rows();
		if ($num_rows > 0) {
			$this->db->select('*');
			$this->db->from('tbl_user');
			$this->db->where('nip', $nip);
			$this->db->where('password', $password);
			$data = $this->db->get()->row();
			$count = count($data);
			if ($count > 0) {
				$session = array(
					'isLoggedTrue' => true,
					'nip' 		   => $data->nip,
					'status' 	   => $data->status,
					'ket_status'   => $data->ket_status,
				);
				
				$this->session->set_userdata( $session );
				redirect('app/dashboard','refresh');
			}
			else
			{
				$this->session->set_flashdata('alert','alert alert-danger');
				$this->session->set_flashdata('msg','Password yang anda masukkan salah!');
				redirect('login','refresh');
			}
		}
		else
		{
			$this->session->set_flashdata('alert','alert alert-danger');
			$this->session->set_flashdata('msg','NIP yang anda masukkan salah!');
			redirect('login','refresh');
		}
	}	

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */