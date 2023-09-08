<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$data = array(
			'title' => "Aplikasi pengaduan masyrakat",
			'konten' => "v_home"
		);
		$this->load->view('login', $data);
	}

	public function home()
	{
		$data = array(
			'title' => "Aplikasi pengaduan masyrakat",
			'konten' => "v_home"
		);
		$this->load->view('dashboard', $data);
	}

	public function ceklogin()
	{
		$username = $this->input->post('uname');
		$password = $this->input->post('pass');
		$login = $this->msy->ceklogin($username, $password, "petugas");
		$cekmsy = $this->msy->ceklogin($username, $password, "masyarakat");

		if ($login->num_rows() > 0) {
			$user = $login->result();

			//print_r($user);
			$nama = $user[0]->nama_petugas;
			$level = $user[0]->level;

			//buat session
			$this->session->set_userdata("nama", $nama);
			$this->session->set_userdata("akses", $level);

			$this->session->set_flashdata('pesan', '<span class="text-success"><i class="far fa-check-square"></i>Login Berhasil</span>');
			$this->session->set_flashdata('panggil', '$(".toast").toast("show")');

			redirect(site_url('Masyarakat'));
		} elseif ($cekmsy->num_rows() > 0) {
			$m = $cekmsy->result();

			//buat session
			$nama = $m[0]->nama;
			$level = "masyarakat";
			$nik = $m[0]->nik;

			$this->session->set_userdata("nama", $nama);
			$this->session->set_userdata("akses", $level);
			$this->session->set_userdata("nik", $nik);

			$this->session->set_flashdata('pesan', '<span class="text-success"><i class="far fa-check-square"></i>Login Berhasil</span>');
			$this->session->set_flashdata('panggil', '$(".toast").toast("show")');

			redirect(site_url('Pengaduan'));
		} else {
			$this->session->set_flashdata('pesan', '<span class="text-success"><i class="far fa-check-square"></i>Login Gagal</span>');
			$this->session->set_flashdata('panggil', '$(".toast").toast("show")');

			redirect(site_url('ceklogin'));
		}
	}

	public function logout()
	{
		session_destroy();

		//buat session
		$this->session->set_flashdata('pesan', '<span class="text-success"><i class="far fa-check-square"></i>Sesi anda telah berakhir</span>');
		$this->session->set_flashdata('panggil', '$(".toast").toast("show")');
		redirect(site_url("welcome"));
	}
}
