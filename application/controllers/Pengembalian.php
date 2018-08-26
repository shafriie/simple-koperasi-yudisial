<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pengembalian');
	}

	public function index()
	{
		redirect('app/pengembalian','refresh');
	}

	public function changeStatus($status_pengembalian, $id_pengembalian)
	{
		$query = $this->M_pengembalian->changeStatus($status_pengembalian, $id_pengembalian);
	}

	public function delete($id)
	{
		$query = $this->M_pengembalian->delete($id);
	}

	public function submit()
	{
		$bukti_transfer = '';

		$config['upload_path'] 	 = FCPATH . 'upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  	 = '1000000';
		$config['encrypt_name']	 = true;
		$config['overwrite']	 = true;
		
		//call to library upload
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file_buktitransfer')){
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}
		else{
			$bukti_transfer = $this->upload->data();
			$post = $this->input->post();
			$query = $this->M_pengembalian->submit($post, $bukti_transfer['file_name']);
		}
		
	}

}

/* End of file Pengembalian.php */
/* Location: ./application/controllers/Pengembalian.php */