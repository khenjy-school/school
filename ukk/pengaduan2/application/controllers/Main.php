<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *	
 */
class Main extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Pengaduan_mdl');
		$this->load->model('Tanggapan_mdl');
		$this->load->model('Masyarakat_mdl');
		$this->load->model('Petugas_mdl');
		$this->load->model('Pengaturan_mdl');
		$this->load->helper('url');
	}

	//signup masyarakat
	public function signup($id = 0)
	{
		if (isset($_POST['btntambah'])) {
			$kondisi = array(
				'nik' => '',
				'nama' => $this->input->post('txtnama'),
				'username' => $this->input->post('txtusername'),
				'password' => $this->input->post('password'),
				'telp' => $this->input->post('txttelp')
			);
			$this->Masyarakat_mdl->save('masyarakat', $kondisi);
			redirect('main/index');
		} else {
			$data['title'] = 'Sign Up';
			$data['header1'] = 'Sign Up';
			$this->load->view('admin/_partials/head.php', $data);
			$this->load->view('admin/signup.php', $data);
		}
	}

	//home admin
	public function dashboard($id = 0)
	{
		if (isset($_POST['btnsimpan'])) {

			$config['upload_path'] = './assets/frontend/img/';
			$config['allowed_types'] = 'jpg|jpeg|png|webp|gif';
			$this->load->library('upload', $config);
			$upload_favicon = $_FILES['txtfavicon']['name'];
			$upload_logo = $_FILES['txtlogo']['name'];

			$this->upload->do_upload('txtlogo');
			$this->upload->do_upload('txtfavicon');
			$favicon = $this->upload->data('file_name');
			$logo = $this->upload->data('file_name');

			$input = array(
				'judul' => $this->input->post('txtjudul'),
				'favicon' => $upload_favicon,
				'logo' => $upload_logo,
				'alamat' => $this->input->post('txtalamat'),
				'email' => $this->input->post('txtemail'),
				'telp' => $this->input->post('txttelp'),
				'metadesc' => $this->input->post('txtmetadesc'),
				'fb' => $this->input->post('txtfb'),
				'ig' => $this->input->post('txtig')
			);
			//edit pengaturan
			$this->Pengaturan_mdl->update($id, $input);
			redirect('main/index');
		} else {
			$data = array(
				'title' =>  'Dashboard',
				'header1' =>  'Dashboard',
				'header2' =>  'Data Website',
				'pengaturan' => $this->Pengaturan_mdl->getById($id),
				'jlh_pengaduan' => $this->Pengaduan_mdl->countAll('pengaduan'),
				'jlh_tanggapan' => $this->Tanggapan_mdl->countAll('tanggapan'),
				'jlh_masyarakat' => $this->Masyarakat_mdl->countAll('masyarakat'),
				'jlh_petugas' => $this->Petugas_mdl->countAll('petugas')
			);
			$this->load->view('admin/_partials/head.php', $data);
			$this->load->view('admin/_partials/navbar.php', $data);
			$this->load->view('admin/index.php', $data);
		}
	}

	//index home
	public function index($id = 0)
	{
		$data = array(
			'title' => "Selamat Datang di KHENKOMINFO",
			'header1' => "Selamat Datang di KHENKOMINFO",
			'pengaturan' => $this->Pengaturan_mdl->getById($id)
		);
		$this->load->view('public/_partials/head.php', $data);
		$this->load->view('public/_partials/navbar.php', $data);
		$this->load->view('public/index.php', $data);
	}

	//index home
	public function help($id = 0)
	{
		$data = array(
			'title' => "Bantuan",
			'header1' => "Bantuan Website",
			'pengaturan' => $this->Pengaturan_mdl->getById($id)
		);
		$this->load->view('admin/_partials/head.php', $data);
		$this->load->view('admin/help.php', $data);
	}

	//about
	public function about($id = 0)
	{
		$data = array(
			'title' => 'About Us',
			'header1' => 'About Us',
			'pengaturan' => $this->Pengaturan_mdl->getById($id)
		);
		$this->load->view('public/_partials/head.php', $data);
		$this->load->view('public/_partials/navbar.php', $data);
		$this->load->view('public/about.php', $data);
	}

	//pengaduan
	public function pengaduan($id = 0)
	{
		$data = array(
			'title' => 'Pengaduan',
			'header1' => 'Pengaduan',
			'pengaturan' => $this->Pengaturan_mdl->getById($id),
			'pengaduan' => $this->Pengaduan_mdl->getAll('pengaduan')->result(),
			'masyarakat' => $this->Masyarakat_mdl->getAll('masyarakat')->result()
		);
		$this->load->view('public/_partials/head.php', $data);
		$this->load->view('public/_partials/navbar.php', $data);
		$this->load->view('public/pengaduan.php', $data);
	}

	//tambah pengaduan
	public function tambah_pengaduan($id = 0)
	{
		if (isset($_POST['btnsimpan'])) {
			$config['upload_path'] = './upload/pengaduan/';
			$config['allowed_types'] = 'jpg|jpeg|png|webp|gif';

			$this->load->library('upload', $config);
			$nama_gambar = $_FILES['txtfoto']['name'];

			if ($nama_gambar) {
				$this->upload->do_upload('txtfoto');
				$this->upload->data('file_name');

				$data = array(
					'id_pengaduan' => '',
					'tgl_pengaduan' => $this->input->post('txttgl_pengaduan'),
					'nik' => $this->input->post('txtnik'),
					'isi_laporan' => $this->input->post('txtisi_laporan'),
					'foto' => $nama_gambar,
					'status' => $this->input->post('txtstatus')
				);

				$this->Pengaduan_mdl->save('pengaduan', $data);
				redirect('main/pengaduan');
			};
		} else {
			$data = array(
				'title' => 'Tambah Pengaduan',
				'header1' => 'Tambah Pengaduan',
				'pengaturan' => $this->Pengaturan_mdl->getById($id),
				'pengaduan' => $this->Pengaduan_mdl->getAll('pengaduan')->result(),
				'masyarakat' => $this->Masyarakat_mdl->getAll('masyarakat')->result()
			);
			$this->load->view('public/_partials/head.php', $data);
			$this->load->view('public/_partials/navbar.php', $data);
			$this->load->view('public/addpengaduan', $data);
		}
	}

	//edit pengaduan
	public function edit_pengaduan($id_pengaduan = null, $id = 0)
	{
		if (isset($_POST['btnsimpan'])) {
			$config['upload_path'] = './upload/pengaduan/';
			$config['allowed_types'] = 'jpg|jpeg|png|webp|gif';
			$this->load->library('upload', $config);
			$nama_gambar = $_FILES['txtfoto']['name'];

			if ($nama_gambar) {
				$this->upload->do_upload('txtfoto');
				$foto = $this->upload->data('file_name');

				$data = array(
					'tgl_pengaduan' => $this->input->post('txttgl_pengaduan'),
					'nik' => $this->input->post('txtnik'),
					'isi_laporan' => $this->input->post('txtisi_laporan'),
					'foto' => $nama_gambar,
					'status' => $this->input->post('txtstatus')
				);
				//edit pengaduan
				$this->Pengaduan_mdl->update($id_pengaduan, $data);
				redirect('main/pengaduan');
			};
		} else {
			$data = array(
				'title' => 'Edit Pengaduan',
				'header1' => 'Edit Pengaduan',
				'pengaturan' => $this->Pengaturan_mdl->getById($id),
				'pengaduan' => $this->Pengaduan_mdl->getById($id_pengaduan),
				'masyarakat' => $this->Masyarakat_mdl->getAll('masyarakat')->result(),
			);
			$this->load->view('public/_partials/head.php', $data);
			$this->load->view('public/_partials/navbar.php', $data);
			$this->load->view('public/editpengaduan', $data);
		}
	}

	//hapus pengaduan
	public function delete($id_pengaduan)
	{
		delete_files('upload/pengaduan/', $id_pengaduan);
		$this->Pengaduan_mdl->delete($id_pengaduan);
		redirect('main/pengaduan');
	}

	public function pilihan($id = 0)
	{
		$data = array(
			'title' => 'Pilih Metode Login',
			'header1' => 'Pilih Metode Login',
			'pengaturan' => $this->Pengaturan_mdl->getById($id),
		);
		$this->load->view('admin/_partials/head.php', $data);
		$this->load->view('public/pilihan', $data);
	}

	public function latihan()
	{
		$this->load->view('admin/latihan.html');
	}

	public function latihan2($id = 0)
	{

		$data = array(
			'title' => 'Latihan',
			'header1' => 'Latihan',
			'pengaturan' => $this->Pengaturan_mdl->getById($id),
			'jlh_pengaduan' => $this->Pengaduan_mdl->countAll('pengaduan'),
			'jlh_tanggapan' => $this->Tanggapan_mdl->countAll('tanggapan'),
			'jlh_masyarakat' => $this->Masyarakat_mdl->countAll('masyarakat'),
			'jlh_petugas' => $this->Petugas_mdl->countAll('petugas')
		);
		$this->load->view('admin/latihan2', $data);
	}

	public function latihan3()
	{
		$this->load->view('admin/latihan3');
	}
}
