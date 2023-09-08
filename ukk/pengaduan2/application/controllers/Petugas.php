<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Petugas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Pengaturan_mdl');
		$this->load->model('Petugas_mdl');
		$this->load->helper('url');
	}

	//petugas list
	public function index($id = 0)
	{
		$data = array(
			'title' => 'Data Petugas',
			'header1' => 'Data Petugas',
			'pengaturan' => $this->Pengaturan_mdl->getById($id),
			'petugas' => $this->Petugas_mdl->getAll('petugas')->result(),
			'jlh_petugas' => $this->Petugas_mdl->countAll('petugas')
		);
		$this->load->view('admin/_partials/head.php', $data);
		$this->load->view('admin/petugas.php', $data);
	}

	public function profil($id_petugas = null, $id = 0)
	{
		$data = array(
			'title' => 'Profil',
			'header1' => 'Profil',
			'pengaturan' => $this->Pengaturan_mdl->getById($id),
			'petugas' => $this->db->get_where('petugas', 'id_petugas')->row_array()
		);
		$this->load->view('admin/_partials/head.php', $data);
		$this->load->view('admin/profil.php', $data);
	}

	//tambah petugas
	public function signup($id = 0)
	{
		if (isset($_POST['btnsignup'])) {
			$data = array(
				'id_petugas' => '',
				'nama_petugas' => $this->input->post('txtnama_petugas'),
				'username' => $this->input->post('txtusername'),
				'password' => $this->input->post('txtpassword'),
				'telp' => $this->input->post('txttelp'),
				'level' => $this->input->post('txtlevel')
			);
			$this->Petugas_mdl->save('petugas', $data);
			redirect('main/dashboard');
		} else {
			$data = array(
				'title' => 'Sign Up',
				'header1' => 'Sign Up',
				'pengaturan' => $this->Pengaturan_mdl->getById($id),
				'petugas' => $this->Petugas_mdl->getAll('petugas')->result()
			);
			$this->load->view('admin/_partials/head.php', $data);
			$this->load->view('admin/signup', $data);
		}
	}

	//login
	public function login($id = 0)
	{
		if (isset($_POST['btnlogin'])) {
			$kondisi = array(
				'username' => $this->input->post('txtusername'),
				'password' => $this->input->post('txtpassword')
			);
			$cek_data = $this->Petugas_mdl->cek_data('petugas', $kondisi);
			//numrows = cek data
			if ($cek_data > 0) {
				$login = array(
					'id_petugas' => $cek_data['id_petugas'],
					'nama_petugas' => $cek_data['nama_petugas'],
					'username' => $cek_data['username'],
					'password' => $cek_data['password'],
					'telp' => $cek_data['telp'],
					'level' => $cek_data['level'],
					'status' => 'active'
				);
				$this->session->set_userdata($login);
				if ($cek_data['level'] == 'admin') {
					redirect('main/dashboard');
				} else {
					redirect('pengaduan/index');
				}
				//$username = $this->session->userdata('petugas')($login);
				//$this->Petugas_mdl->ambil($username);
				session_start();
				echo '<script>alert("Berhasil Login!")</script>';
				redirect('main/dashboard');
			} else {
				echo '<script>alert("Akun tidak ditemukan!")</script>';
				redirect('petugas/login');
			}
		} else {
			$data = array(
				'title' => 'Login',
				'header1' => 'Login',
				'pengaturan' => $this->Pengaturan_mdl->getById($id),
				'petugas' => $this->Petugas_mdl->getAll('petugas')->result()
			);
			$this->load->view('admin/_partials/head.php', $data);
			$this->load->view('admin/login', $data);
		}
	}


	//Berfungsi untuk melakukan proses logout melalui halaman editor
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('petugas/login');
	}

	//tambah petugas
	public function tambah($id = 0)
	{
		if (isset($_POST['btnsimpan'])) {
			$data = array(
				'id_petugas' => '',
				'nama_petugas' => $this->input->post('txtnama_petugas'),
				'username' => $this->input->post('txtusername'),
				'password' => $this->input->post('txtpassword'),
				'telp' => $this->input->post('txttelp'),
				'level' => $this->input->post('txtlevel')
			);
			$this->Petugas_mdl->save('petugas', $data);
			redirect('petugas/index');
		} else {
			$data = array(
				'title' => 'Tambah Petugas',
				'header1' => 'Tambah Petugas',
				'pengaturan' => $this->Pengaturan_mdl->getById($id),
				'petugas' => $this->Petugas_mdl->getAll('petugas')->result()
			);
			$this->load->view('admin/_partials/head.php', $data);
			$this->load->view('admin/addpetugas', $data);
		}
	}

	//edit petugas
	public function edit($id_petugas = null, $id = 0)
	{
		if (isset($_POST['btnsimpan'])) {
			$data = array(
				'nama_petugas' => $this->input->post('txtnama_petugas'),
				'username' => $this->input->post('txtusername'),
				'password' => $this->input->post('txtpassword'),
				'telp' => $this->input->post('txttelp'),
				'level' => $this->input->post('txtlevel')
			);
			//update petugas
			$this->Petugas_mdl->update($id_petugas, $data);
			redirect('petugas/index');
		} else {
			$data = array(
				'title' => 'Edit Petugas',
				'header1' => 'Edit Petugas',
				'pengaturan' => $this->Pengaturan_mdl->getById($id),
				'petugas' => $this->Petugas_mdl->getById($id_petugas),
			);
			$this->load->view('admin/_partials/head.php', $data);
			$this->load->view('admin/editpetugas', $data);
		}
	}

	//hapus petugas
	public function delete($id_petugas)
	{
		$this->Petugas_mdl->delete($id_petugas);
		redirect('petugas/index');
	}
}
