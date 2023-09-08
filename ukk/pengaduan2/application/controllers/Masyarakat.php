<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Masyarakat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Pengaturan_mdl');
		$this->load->model('Masyarakat_mdl');
		$this->load->helper('url');
	}

	//masyarakat list
	public function index($id = 0)
	{
		$data = array(
			'title' => 'Data Masyarakat',
			'header1' => 'Data Masyarakat',
			'pengaturan' => $this->Pengaturan_mdl->getById($id),
			'masyarakat' => $this->Masyarakat_mdl->getAll('masyarakat')->result(),
			'jlh_masyarakat' => $this->Masyarakat_mdl->countAll('masyarakat')
		);
		$this->load->view('admin/_partials/head.php', $data);
		$this->load->view('admin/masyarakat.php', $data);
	}

	//tambah masyarakat
	public function signup($id = 0)
	{
		if (isset($_POST['btnsignup'])) {
			$data = array(
				'nik' => $this->input->post('txtnik'),
				'nama' => $this->input->post('txtnama'),
				'username' => $this->input->post('txtusername'),
				'password' => $this->input->post('txtpassword'),
				'telp' => $this->input->post('txttelp')
			);
			$this->Masyarakat_mdl->save('masyarakat', $data);
			redirect('masyarakat/login');
		} else {
			$data = array(
				'title' => 'Sign Up',
				'header1' => 'Sign Up',
				'pengaturan' => $this->Pengaturan_mdl->getById($id),
				'masyarakat' => $this->Masyarakat_mdl->getAll('masyarakat')->result()
			);
			$this->load->view('admin/_partials/head.php', $data);
			$this->load->view('public/signup', $data);
		}
	}

	//login
	public function login($id = 0)
	{
		if (isset($_POST['btnlogin'])) {
			$nik = $this->input->post('txtnik');
			$password = $this->input->post('txtpassword');
			$kondisi = array(
				'nik' => $nik,
				'password' => $password
			);

			$cek_data = $this->Masyarakat_mdl->cek_data('masyarakat', $kondisi);
			//numrows = cek data
			if ($cek_data->num_rows() > 0) {
				$data = $cek_data->result();
				$login = array(
					'nik' => $nik,
					'status' => 'active'
				);

				$this->session->set_userdata($login);
				//$username = $this->session->userdata('petugas')($login);
				//$this->Petugas_mdl->ambil($username);
				session_start();
				echo '<script>alert("Berhasil Login!")</script>';
				redirect('main/pengaduan');
			} else {
				echo '<script>alert("Akun tidak ditemukan!")</script>';
				redirect('masyarakat/login');
			}
		} else {
			$data = array(
				'title' => 'Login',
				'header1' => 'Login Sebagai Masyarakat',
				'pengaturan' => $this->Pengaturan_mdl->getById($id),
				'petugas' => $this->Masyarakat_mdl->getAll('masyarakat')->result()
			);
			$this->load->view('admin/_partials/head.php', $data);
			$this->load->view('public/login', $data);
		}
	}

	//tambah masyarakat
	public function tambah($id = 0)
	{
		if (isset($_POST['btnsimpan'])) {
			$data = array(
				'nik' => $this->input->post('txtnik'),
				'nama' => $this->input->post('txtnama'),
				'username' => $this->input->post('txtusername'),
				'password' => $this->input->post('txtpassword'),
				'telp' => $this->input->post('txttelp')
			);
			$this->Masyarakat_mdl->save('masyarakat', $data);
			return ('masyarakat/index');
		} else {
			$data = array(
				'title' => 'Tambah Masyarakat',
				'header1' => 'Tambah Masyarakat',
				'pengaturan' => $this->Pengaturan_mdl->getById($id),
				'masyarakat' => $this->Masyarakat_mdl->getAll('masyarakat')->result()
			);
			$this->load->view('admin/_partials/head.php', $data);
			$this->load->view('admin/addmasyarakat', $data);
		}
	}

	//edit masyarakat
	public function edit($nik = null, $id = 0)
	{
		if (isset($_POST['btnsimpan'])) {
			$data = array(
				'nama' => $this->input->post('txtnama'),
				'username' => $this->input->post('txtusername'),
				'password' => $this->input->post('txtpassword'),
				'telp' => $this->input->post('txttelp')
			);
			//update masyarakat
			$this->Masyarakat_mdl->update($nik, $data);
			return ('masyarakat/index');
		} else {
			$data = array(
				'title' => 'Edit Masyarakat',
				'header1' => 'Edit Masyarakat',
				'pengaturan' => $this->Pengaturan_mdl->getById($id),
				'masyarakat' => $this->Masyarakat_mdl->getById($nik),
			);
			$this->load->view('admin/_partials/head.php', $data);
			$this->load->view('admin/editmasyarakat', $data);
		}
	}

	//hapus masyarakat
	public function delete($nik)
	{
		$this->Masyarakat_mdl->delete($nik);
		return ('masyarakat/index');
	}
}
