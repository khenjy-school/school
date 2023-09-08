<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{

	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data Petugas',
			'judul' => 'Petugas',
			'head' => '_partials/head',
			'konten' => 'v_admin-petugas',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'petugas' => $this->usr->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function profil($id = 1)
	{
		$id_user = $this->session->userdata('id_user');
		$data = array(
			'title' => 'Profil',
			'head' => '_partials/head',
			'konten' => 'v_profil',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'petugas' => $this->usr->ambil($id_user)->result()
		);

		$this->load->view('template', $data);
	}

	public function login($id_outlet = null, $id = 1)
	{
		$this->session->set_userdata('id_outlet', $id_outlet);
		$data = array(
			'title' => 'Login',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'outlet' => $this->olt->ambildata()->result()
		);

		$this->load->view('login', $data);
	}

	public function tambah()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$id_outlet = $this->input->post('id_outlet');

		$cekusername = $this->usr->cekusername($username, $id_outlet);

		// mencari apakah jumlah data kurang dari 1
		if ($cekusername->num_rows() < 1) {

			// jika input konfirm sama dengan input password
			if ($this->input->post('konfirm') === $password) {
				$this->load->library('encryption');

				$data = array(
					'nama' => $this->input->post('nama'),
					'username' => $username,

					// mengubah password menjadi password berenkripsi
					'password' => password_hash($password, PASSWORD_DEFAULT),

					'role' => $this->input->post('role'),
					'id_outlet' => $this->input->post('id_outlet'),
				);

				$simpan = $this->usr->simpan($data);

				// mengarahkan pengguna ke halaman yang berbeda sesuai dengan session masing-masing
				if ($this->session->userdata('username')) {

					$this->session->set_flashdata('pesan', 'Tambah data berhasil!');
					redirect(site_url('petugas'));
				} else {

					redirect(site_url('petugas/login'));
				}

				// jika input konfirm tidak sama dengan input password
			} else {

				// menampilkan flashdata dalam bentuk teks
				$this->session->set_flashdata('pesan', 'Konfirmasi password salah!');

				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data lebih dari 1
		} else {

			$this->session->set_flashdata('pesan', 'Petugasname telah digunakan!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function update()
	{
		$where = $this->input->post('id_user');
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'role' => $this->input->post('role'),
		);

		$update = $this->usr->update($data, $where);

		if ($update) {

			$this->session->set_flashdata('pesan', 'Petugas berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Petugas gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		// kembali ke halaman sebelumnya
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_profil()
	{
		$where = $this->input->post('id_user');
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'id_outlet' => $this->input->post('id_outlet'),
		);

		$update = $this->usr->update($data, $where);

		if ($update) {

			$this->session->set_flashdata('pesan', 'Profil berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Profil gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		// mengambil data profil yang baru dirubah
		$petugas = $this->usr->ambil($where)->result();
		$nama = $petugas[0]->nama;
		$username = $petugas[0]->username;

		// membuat session baru berdasarkan data yang telah diupdate
		$this->session->set_userdata('nama', $nama);
		$this->session->set_userdata('username', $username);

		// kembali ke halaman sebelumnya sesuai dengan masing-masing petugas dengan akses yang berbeda
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_password()
	{
		$where = $this->input->post('id_user');

		$cek_id = $this->usr->ambil($where);

		// mencari apakah jumlah data lebih dari 0
		if ($cek_id->num_rows() > 0) {
			$petugas = $cek_id->result();
			$cekpass = $petugas[0]->password;

			$old_password = $this->input->post('old_password');

			// memverifikasi password lama dengan password di database
			if (password_verify($old_password, $cekpass)) {
				$password = $this->input->post('password');

				// jika konfirmasi password sama dengan password baru
				if ($this->input->post('konfirm') === $password) {
					$this->load->library('encryption');

					$data = array(

						// mengubah password menjadi password berenkripsi
						'password' => password_hash($password, PASSWORD_DEFAULT),
					);

					$update = $this->usr->update($data, $where);

					redirect($_SERVER['HTTP_REFERER']);

					// jika konfirmasi password tidak sama dengan password baru
				} else {

					$this->session->set_flashdata('pesan', 'Konfirmasi password tidak sesuai!');
					redirect($_SERVER['HTTP_REFERER']);
				}

				// jika password lama salah
			} else {

				$this->session->set_flashdata('pesan', 'Password lama salah!');
				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data kurang dari 0
		} else {

			$this->session->set_flashdata('pesan', 'Akun tidak tersedia!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function hapus($id_user = null)
	{
		$hapus = $this->usr->hapus($id_user);


		if ($hapus) {
			$this->session->set_flashdata('pesan', 'Petugas berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Petugas gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}


		redirect(site_url('petugas'));
	}

	public function ceklogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$id_outlet = $this->input->post('id_outlet');

		// $username akan menjadi $par1 dan $id_outlet akan menjadi $par3 di model
		$cekusername = $this->usr->cekusername($username, $id_outlet);

		// mencari apakah jumlah data kurang dari 0
		if ($cekusername->num_rows() > 0) {
			$petugas = $cekusername->result();
			$cekpass = $petugas[0]->password;

			// memverifikasi password dengan password di database
			if (password_verify($password, $cekpass)) {
				$id_user = $petugas[0]->id_user;
				$nama = $petugas[0]->nama;
				$username = $petugas[0]->username;
				$id_outlet = $petugas[0]->id_outlet;
				$role = $petugas[0]->role;

				$this->session->set_userdata('id_user', $id_user);
				$this->session->set_userdata('nama', $nama);
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('id_outlet', $id_outlet);
				$this->session->set_userdata('akses', $role);

				redirect(site_url('welcome'));

				// jika password salah
			} else {

				$this->session->set_flashdata('pesan', 'Password Salah!');
				redirect(site_url('petugas/login'));
			}

			// jika jumlah data lebih dari 0
		} else {

			$this->session->set_flashdata('pesan', 'Akun tidak tersedia!');
			redirect(site_url('petugas/login'));
		}
	}

	public function logout()
	{
		// menghapus session
		session_destroy();
		redirect(site_url('welcome'));
	}
}
