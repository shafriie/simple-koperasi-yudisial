<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_anggota');
	}

	public function index()
	{
		redirect('app/anggota','refresh');
	}

	public function delete($nip)
	{
		$query = $this->M_anggota->delete($nip);
	}

}

/* End of file Anggota.php */
/* Location: ./application/controllers/Anggota.php */