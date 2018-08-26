<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

	public function getDataLaporan()
	{
		$this->db->select('pinjam.*, pengembalian.id_pengembalian, pengembalian.file_buktitransfer, pengembalian.status_pengembalian');
		$this->db->from('tbl_pinjaman as pinjam');
		$this->db->join('tbl_pengembalian as pengembalian', 'pinjam.id_pinjam = pengembalian.id_pinjam');
		$this->db->where('pengembalian.status_pengembalian', 1);
		$data = $this->db->get()->result();
		return $data;
	}	

}

/* End of file M_laporan.php */
/* Location: ./application/models/M_laporan.php */