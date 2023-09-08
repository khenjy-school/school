<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$data = array(
			'title' => 'Website Laundry',
			'content' => 'v_home',
			'menu' => 'menu_',
		);
		$this->load->view('template', $data);
	}

	public function pesan()
	{
		$data = array(
			'title' => 'Website Laundry',
			'content' => 'v_home',
			'menu' => 'menu_',
		);
		$this->load->view('v_pesan', $data);
	}

	public function about()
	{
		$data = array(
			'title' => 'About Us',
			'content' => 'v_about',
			'menu' => 'menu_',
		);
		$this->load->view('template', $data);
	}


}
