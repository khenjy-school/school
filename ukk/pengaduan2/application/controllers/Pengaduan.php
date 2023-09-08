<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Pengaduan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Pengaturan_mdl');
		$this->load->model('Pengaduan_mdl');
		$this->load->model('Masyarakat_mdl');
		$this->load->helper('url');
	}

	//pengaduan list
	public function index($id_pengaduan = null, $id = 0)
	{
		$data = array(
			'title' => 'List Pengaduan',
			'header1' => 'List Pengaduan',
			'pengaturan' => $this->Pengaturan_mdl->getById($id),
			'pengaduan' => $this->Pengaduan_mdl->getAll('pengaduan')->result(),
			'jlh_pengaduan' => $this->Pengaduan_mdl->countAll('pengaduan')
		);
		$this->load->view('admin/_partials/head.php', $data);
		$this->load->view('admin/pengaduan.php', $data);
	}

	//tambah pengaduan
	public function tambah($id = 0)
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
				redirect('pengaduan/index');
			};
		} else {
			$data = array(
				'title' => 'Tambah Pengaduan',
				'header1' => 'Tambah Pengaduan',
				'pengaturan' => $this->Pengaturan_mdl->getById($id),
				'pengaduan' => $this->Pengaduan_mdl->getAll('pengaduan')->result(),
				'masyarakat' => $this->Masyarakat_mdl->getAll('masyarakat')->result()
			);
			$this->load->view('admin/_partials/head.php', $data);
			$this->load->view('admin/addpengaduan', $data);
		}
	}

	//edit pengaduan
	public function edit($id_pengaduan = null, $id = 0)
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
				redirect('pengaduan/index');
			};
		} else {
			$data = array(
				'title' => 'Edit Pengaduan',
				'header1' => 'Edit Pengaduan',
				'pengaturan' => $this->Pengaturan_mdl->getById($id),
				'pengaduan' => $this->Pengaduan_mdl->getById($id_pengaduan),
				'masyarakat' => $this->Masyarakat_mdl->getAll('masyarakat')->result(),
			);
			$this->load->view('admin/_partials/head.php', $data);
			$this->load->view('admin/editpengaduan', $data);
		}
	}

	//hapus pengaduan
	public function delete($id_pengaduan)
	{
		delete_files('upload/pengaduan/', $id_pengaduan);
		$this->Pengaduan_mdl->delete($id_pengaduan);
		redirect('pengaduan/index');
	}
}
