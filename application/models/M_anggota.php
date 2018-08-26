<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_anggota extends CI_Model {

	public function getData()
	{
		$this->db->select('user.nip, user.password, user.status, anggota.nama, anggota.alamat, anggota.tgl_lahir, anggota.no_telp');
		$this->db->from('tbl_user as user');
		$this->db->join('tbl_anggota as anggota', 'anggota.nip = user.nip');
		$this->db->where('user.status', 2);
		$data = $this->db->get()->result();
		return $data;
	}	

	public function delete($nip)
	{
		$this->db->where('nip', $nip);
		$this->db->delete('tbl_anggota');

		$this->db->where('nip', $nip);
		$this->db->delete('tbl_user');

		$this->session->set_flashdata('alert', 'alert alert-success');
		$this->session->set_flashdata('msg', 'Data Berhasil dihapus!');
		redirect('app/anggota','refresh');
	}

}

/* End of file M_anggota.php */
/* Location: ./application/models/M_anggota.php */