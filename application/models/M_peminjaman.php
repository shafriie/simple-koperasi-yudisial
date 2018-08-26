<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_peminjaman extends CI_Model {

	public function getData()
	{
		$this->db->select('*');
		$this->db->from('tbl_pinjaman');
		$data = $this->db->get()->result();
		return $data;
	}	

	public function getDataWhereIdPinjam($id_pinjam)
	{
		$this->db->select('*');
		$this->db->from('tbl_pinjaman');
		$this->db->where('id_pinjam', $id_pinjam);
		$data = $this->db->get()->row();
		return $data;
	}

	public function accept($status, $id_pinjam)
	{
		if ($status == 0) {
			$this->session->set_flashdata('alert', 'alert alert-success');
			$this->session->set_flashdata('msg', 'Status pinjaman berhasil diganti menjadi accept!');
			$this->db->set('status_pinjam', 1);
		}
		else
		{
			$this->session->set_flashdata('alert', 'alert alert-danger');
			$this->session->set_flashdata('msg', 'Status pinjaman berhasil diganti menjadi not accept!');
			$this->db->set('status_pinjam', 0);
		}
		$this->db->where('id_pinjam', $id_pinjam);
		$this->db->update('tbl_pinjaman');
		
		redirect('app/peminjaman','refresh');
	}

	public function getDataWhere()
	{
		$nip = $this->session->userdata('nip');
		$this->db->select('*');
		$this->db->from('tbl_pinjaman');
		$this->db->where('nip', $nip);
		$data = $this->db->get()->result();
		return $data;
	}

	public function getDataWhereAccept()
	{
		$nip = $this->session->userdata('nip');
		$this->db->select('*');
		$this->db->from('tbl_pinjaman');
		$this->db->where('nip', $nip);
		$this->db->where('status_pinjam', 1);
		$data = $this->db->get()->result();
		return $data;
	}	

	public function delete($id)
	{
		$this->db->where('id_pinjam', $id);
		$this->db->delete('tbl_pinjaman');

		$this->session->set_flashdata('alert', 'alert alert-success');
		$this->session->set_flashdata('msg', 'Data Berhasil dihapus!');
		redirect('app/peminjaman','refresh');
	}

	public function submit($post, $file_ktp, $slip_gaji)
	{
		$object = array(
					'tanggal_pinjam' 	  => $post['tanggal_pinjam'], 
					'tanggal_jangkawaktu' => $post['tanggal_jangkawaktu'], 
					'nip' => $post['nip'], 
					'nama' => $post['nama'], 
					'alamat' => $post['alamat'], 
					'file_ktp' => $file_ktp,
					'file_slip_gaji' => $slip_gaji,
					'nominal' => $post['nominal'],
					'status_pinjam' => '0',
				);
		$this->db->insert('tbl_pinjaman', $object);
		$this->session->set_flashdata('alert', 'alert alert-success');
		$this->session->set_flashdata('msg', 'Berhasil memasukkan pinjaman!');
		redirect('app/peminjaman','refresh');
	}

}

/* End of file M_peminjaman.php */
/* Location: ./application/models/M_peminjaman.php */