<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_register');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['header'] = $this->load->view('Layout/header');
		$data['footer'] = $this->load->view('Layout/footer');
		$this->load->view('Register/register',$data);
	}

	public function submit()
	{
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required|is_unique[tbl_user.nip]');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('alert','alert alert-danger');
			$this->session->set_flashdata('msg','NIP yang anda masukkan sudah ada!');
			redirect('register','refresh');
		} else {
			$nip = $this->input->post('nip', true);
			$password = $this->input->post('password', true);
			$query = $this->M_register->submit($nip, $password);
		}
		
	}

}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */