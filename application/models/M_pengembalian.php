<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengembalian extends CI_Model {

	public function getData()
	{
		$this->db->select('*');
		$this->db->from('tbl_pengembalian');
		$data = $this->db->get()->result();
		return $data;
	}	

	public function changeStatus($status_pengembalian, $id_pengembalian)
	{
		if ($status_pengembalian) {
			$this->db->set('status_pengembalian', 0);
		}
		else
		{
			$this->db->set('status_pengembalian', 1);	
		}
		$this->db->where('id_pengembalian', $id_pengembalian);
		$this->db->update('tbl_pengembalian');

		$this->session->set_flashdata('alert', 'alert alert-success');
		$this->session->set_flashdata('msg', 'Status berhasil dirubah!');
		redirect('app/pengembalian','refresh');
	}

	public function AllGetDataPengembalian()
	{
		$this->db->select('pinjam.*, pengembalian.id_pengembalian, pengembalian.file_buktitransfer, pengembalian.status_pengembalian');
		$this->db->from('tbl_pinjaman as pinjam');
		$this->db->join('tbl_pengembalian as pengembalian', 'pinjam.id_pinjam = pengembalian.id_pinjam');
		$data = $this->db->get()->result();
		return $data;
	}

	public function getDataPengembalianWhere()
	{
		$nip = $this->session->userdata('nip');
		$this->db->select('pinjam.*, pengembalian.id_pengembalian, pengembalian.file_buktitransfer, pengembalian.status_pengembalian');
		$this->db->from('tbl_pinjaman as pinjam');
		$this->db->join('tbl_pengembalian as pengembalian', 'pinjam.id_pinjam = pengembalian.id_pinjam');
		$this->db->where('pinjam.nip', $nip);
		$data = $this->db->get()->result();
		return $data;
	}

	public function delete($id)
	{
		$this->db->where('id_pengembalian', $id);
		$this->db->delete('tbl_pengembalian');

		$this->session->set_flashdata('alert', 'alert alert-success');
		$this->session->set_flashdata('msg', 'Data Berhasil dihapus!');
		redirect('app/pengembalian','refresh');
	}

	public function submit($post, $bukti_transfer)
	{
		$object = array(
					'id_pinjam' => $post['id_pinjam'], 
					'nominal' => $post['nominal'], 
					'file_buktitransfer' => $bukti_transfer, 
					'status_pengembalian' => '0',
				);
		$this->db->insert('tbl_pengembalian', $object);
		$this->session->set_flashdata('alert', 'alert alert-success');
		$this->session->set_flashdata('msg', 'Data Berhasil dimasukkan!');
		redirect('app/pengembalian','refresh');
	}

}

/* End of file M_pengembalian.php */
/* Location: ./application/models/M_pengembalian.php */