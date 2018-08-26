<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_profile');
	}

	public function index()
	{
		redirect('app/profile','refresh');
	}

	public function submit()
	{
		$post = $this->input->post();
		$query = $this->M_profile->submit($post);
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */