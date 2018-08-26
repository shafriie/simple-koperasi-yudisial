<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_peminjaman');
	}

	public function index()
	{
		redirect('app/peminjaman','refresh');
	}

	public function getDataWhere()
	{
		$id_pinjam = $this->input->post('id_pinjam');
		$query = $this->M_peminjaman->getDataWhereIdPinjam($id_pinjam);
		echo json_encode($query);
	}

	public function delete($id)
	{
		$query = $this->M_peminjaman->delete($id);
	}

	public function accept($status, $id_pinjam)
	{
		$query = $this->M_peminjaman->accept($status, $id_pinjam);
	}

	public function submit()
	{
		$ktp = '';
		$slip_gaji = '';

		$config['upload_path'] 	 = FCPATH . 'upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  	 = '1000000';
		$config['encrypt_name']	 = true;
		$config['overwrite']	 = true;
		
		//call to library upload
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file_ktp')){
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}
		else{
			$ktp = $this->upload->data();
		}

		if ( ! $this->upload->do_upload('file_slip_gaji')){
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}
		else{
			$slip_gaji = $this->upload->data();
			$post = $this->input->post();
			$query = $this->M_peminjaman->submit($post, $ktp['file_name'], $slip_gaji['file_name']);
		}
		
	}

}

/* End of file Peminjaman.php */
/* Location: ./application/controllers/Peminjaman.php */