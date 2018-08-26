<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_register extends CI_Model {

	public function submit($nip, $password)
	{
		$object = array(
					'nip' 		 => $nip, 
					'password' 	 => $password, 
					'status'   	 => '2',
					'ket_status' => 'anggota'
				);
		$this->db->insert('tbl_user', $object);

		$array = array('nip' => $nip );
		$this->db->insert('tbl_anggota', $array);

		$this->session->set_flashdata('alert','alert alert-success');
		$this->session->set_flashdata('msg','Berhasil membuat akun sebagai anggota!');
		redirect('register','refresh');

	}	

}

/* End of file M_register.php */
/* Location: ./application/models/M_register.php */