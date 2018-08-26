<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		if ($this->session->userdata('isLoggedTrue')) {
			redirect('app/dashboard','refresh');
		}
	}

	public function index()
	{
		$data['header'] = $this->load->view('Layout/header');
		$data['footer'] = $this->load->view('Layout/footer');
		$this->load->view('Login/login',$data);
	}

	public function submit()
	{
		$nip = $this->input->post('nip', true);
		$password = $this->input->post('password', true);
		$query = $this->M_login->submit($nip, $password);
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */