<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

	public function numRowsAnggota()
	{
		$this->db->select('*');
		$this->db->from('tbl_anggota');
		$data = $this->db->get()->num_rows();
		return $data;
	}

	public function numRowsPinjaman($status)
	{
		$this->db->select('*');
		$this->db->from('tbl_pinjaman');
		$this->db->where('status_pinjam', $status);
		$data = $this->db->get()->num_rows();
		return $data;
	}
	
	public function numRowsPengembalian($status)
	{
		$this->db->select('*');
		$this->db->from('tbl_pengembalian');
		$this->db->where('status_pengembalian', $status);
		$data = $this->db->get()->num_rows();
		return $data;
	}

}

/* End of file M_dashboard.php */
/* Location: ./application/models/M_dashboard.php */