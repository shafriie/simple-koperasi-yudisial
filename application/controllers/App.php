<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_anggota');
		$this->load->model('M_profile');
		$this->load->model('M_peminjaman');
		$this->load->model('M_pengembalian');
		$this->load->model('M_laporan');
		$this->load->model('M_dashboard');
		if (!$this->session->userdata('isLoggedTrue')) {
			$this->session->set_flashdata('alert','alert alert-danger');
			$this->session->set_flashdata('msg','Silahkan login terlebih dahulu!');
			redirect('login','refresh');
		}
	}

	public function dashboard()
	{
		$status = $this->session->userdata('status');
		if ($status == 2) {
			redirect('app/peminjaman','refresh');
		}
		else
		{
			$data['header'] = $this->load->view('Layout/header');
			$data['footer'] = $this->load->view('Layout/footer');
			$data['anggota'] = $this->M_dashboard->numRowsAnggota();
			$data['pinjamanACC'] = $this->M_dashboard->numRowsPinjaman(1);
			$data['pinjamanNotACC'] = $this->M_dashboard->numRowsPinjaman(0);
			$data['pengembalianACC'] = $this->M_dashboard->numRowsPengembalian(1);
			$data['pengembalianNotACC'] = $this->M_dashboard->numRowsPengembalian(0);
			$this->load->view('Dashboard/dashboard',$data);	
		}
		
	}

	public function anggota()
	{
		$data['header'] = $this->load->view('Layout/header');
		$data['footer'] = $this->load->view('Layout/footer');
		$data['anggota'] = $this->M_anggota->getData();
		$this->load->view('Anggota/anggota',$data);
	}

	public function peminjaman()
	{
		$status = $this->session->userdata('status');
		if ($status == 2) {
			$data['header'] = $this->load->view('Layout/header');
			$data['footer'] = $this->load->view('Layout/footer');
			$data['pinjam'] = $this->M_peminjaman->getDataWhere();
			$data['profile'] = $this->M_profile->getDataProfile();
			$this->load->view('Peminjaman/form_pinjam',$data);	
		}
		else
		{
			$data['header'] = $this->load->view('Layout/header');
			$data['footer'] = $this->load->view('Layout/footer');
			$data['pinjam'] = $this->M_peminjaman->getData();
			$this->load->view('Peminjaman/peminjaman',$data);	
		}
		
	}

	public function pengembalian()
	{
		$status = $this->session->userdata('status');
		if ($status == 2) {
			$data['header'] = $this->load->view('Layout/header');
			$data['footer'] = $this->load->view('Layout/footer');
			$data['profile'] = $this->M_profile->getDataProfile();
			$data['pinjam'] = $this->M_peminjaman->getDataWhereAccept();
			$data['pengembalian'] = $this->M_pengembalian->getDataPengembalianWhere();
			$this->load->view('Pengembalian/form_pengembalian',$data);		
		}
		else
		{
			$data['header'] = $this->load->view('Layout/header');
			$data['footer'] = $this->load->view('Layout/footer');
			$data['pengembalian'] = $this->M_pengembalian->AllGetDataPengembalian();
			$this->load->view('Pengembalian/pengembalian',$data);	
		}
		
	}

	public function profile()
	{
		$data['header'] = $this->load->view('Layout/header');
		$data['footer'] = $this->load->view('Layout/footer');
		$data['profile'] = $this->M_profile->getDataProfile();
		$this->load->view('Profile/profile',$data);
	}

	public function laporan()
	{
		$data['header'] = $this->load->view('Layout/header');
		$data['footer'] = $this->load->view('Layout/footer');
		$data['laporan'] = $this->M_laporan->getDataLaporan();
		$this->load->view('Laporan/laporan',$data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */