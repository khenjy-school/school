<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	// fungsi pertama yang akan diload oleh website
	public function index($id = 1)
	{
		// mengarahkan pengguna ke halaman masing-masing sesuai akses
		if ($this->session->userdata('akses') === "admin") {

			$this->session->set_flashdata('pesan', 'Selamat datang admin ' . $this->session->userdata('nama') . '!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');

			redirect(site_url('welcome/dashboard'));
		} elseif ($this->session->userdata('akses') === 'kasir') {

			$this->session->set_flashdata('pesan', 'Selamat datang kasir ' . $this->session->userdata('nama') . '!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');

			redirect(site_url('welcome/dashboard'));
		} else {
			$data = array(
				'title' => 'Selamat Datang Di MyLaundry',
				'konten' => 'v_home',
				'head' => '_partials/head',
				'pengaturan' => $this->ptn->ambil($id)->result(),
			);

			$this->load->view('template', $data);
		}
	}

	public function pemesanan($id = 1)
	{
		$data = array(
			'title' => 'Pesan Laundry',
			'konten' => 'v_pemesanan',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			// 'paket' => $this->pkt->ambildata()->result(),
		);

		$this->load->view('template', $data);
	}

	public function paket($id = 1)
	{
		$data = array(
			'title' => 'Daftar Paket',
			'konten' => 'v_kamar',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'paket' => $this->pkt->ambildata()->result(),
			'outlet' => $this->olt->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function fasilitas($id = 1)
	{
		$data = array(
			'title' => 'Daftar Fasilitas',
			'konten' => 'v_fasilitas',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'member' => $this->mbr->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function dashboard($id = 1)
	{
		$data = array(
			'title' => 'Dashboard',
			'head' => '_partials/head',
			'konten' => 'v_admin-dashboard',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'tabel1' => 'Member',
			'tabel2' => 'Outlet',
			'tabel3' => 'Paket',
			'tabel4' => 'User',
			'tabel5' => 'Transaksi',
			'member' => $this->mbr->ambildata()->num_rows(),
			'outlet' => $this->olt->ambildata()->num_rows(),
			'paket' => $this->pkt->ambildata()->num_rows(),
			'transaksi' => $this->trs->ambildata()->num_rows(),
			'user' => $this->usr->ambildata()->num_rows()
		);

		$this->load->view('template', $data);
	}

	// fungsi ketika pengguna mengunjungi halaman yang tidak sesuai dengan akses
	public function no_akses($id = 1)
	{
		$data = array(
			'title' => 'Anda tidak Memiliki Akses',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
		);

		$this->load->view('no-akses', $data);
	}
}
