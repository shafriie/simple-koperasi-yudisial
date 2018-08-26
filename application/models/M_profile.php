<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profile extends CI_Model {

	public function submit($post)
	{	
		$nip = $this->session->userdata('nip');
		$dataUser = array('password' => $post['password'] );
		$this->db->where('nip', $nip);
		$this->db->update('tbl_user', $dataUser);

		//-----------------------------------------------------//
		
		$array = array(
					'nama' 		=> $post['nama'], 
					'alamat' 	=> $post['alamat'], 
					'tgl_lahir' => $post['tgl_lahir'], 
					'no_telp' 	=> $post['no_telp'], 
				);
		$status = $this->session->userdata('status');
		if ($status == 2) {
			$this->db->update('tbl_anggota', $array);	
		}
		else
		{
			$this->db->update('tbl_pegawai', $array);		
		}

		$this->session->set_flashdata('alert','alert alert-success');
		$this->session->set_flashdata('msg','Berhasil merubah data profile!');
		redirect('app/profile','refresh');
		
	}

	public function getDataProfile()
	{
		$status = $this->session->userdata('status');
		$nip = $this->session->userdata('nip');
		if ($status == 1 || $status == 3) {
			$this->db->select('user.nip, user.password, user.status, pegawai.nama, pegawai.alamat, pegawai.tgl_lahir, pegawai.no_telp');
			$this->db->from('tbl_user as user');
			$this->db->join('tbl_pegawai as pegawai', 'pegawai.nip = user.nip');
			$this->db->where('user.nip', $nip);
			$data = $this->db->get()->result();		

		}
		else
		{
			$this->db->select('user.nip, user.password, user.status, anggota.nama, anggota.alamat, anggota.tgl_lahir, anggota.no_telp');
			$this->db->from('tbl_user as user');
			$this->db->join('tbl_anggota as anggota', 'anggota.nip = user.nip');
			$this->db->where('user.nip', $nip);
			$data = $this->db->get()->result();	
		}
		
		return $data;
	}	

}

/* End of file M_profile.php */
/* Location: ./application/models/M_profile.php */