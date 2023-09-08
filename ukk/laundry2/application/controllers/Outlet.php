<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data Outlet',
			'content' => 'v_outlet',
			'pengaturan' => $this->db->get('tb_pengaturan')->result(),
		);
		$this->load->view('template', $data);
	}

	public function tambah($id = 1)
	{
		$data = array(
			'title' => 'Website Laundry',
			'content' => 'v_home',
			'menu' => 'menu_',
		);
		redirect('Outlet');
	}

	public function update() {
		$data = array(
			'title' => 'Website Laundry',
			'content' => 'v_home',
			'menu' => 'menu_',
		);
		redirect('Outlet');
	}

	public function hapus(){
		$data = array(
			'title' => 'Website Laundry',
			'content' => 'v_home',
			'menu' => 'menu_',
		);
		redirect('Outlet');
	}

	public function about($id = 1)
	{
		$data = array(
			'title' => 'About Us',
			'content' => 'v_about',
			'menu' => 'menu_',
		);
		$this->load->view('template', $data);
	}
}
