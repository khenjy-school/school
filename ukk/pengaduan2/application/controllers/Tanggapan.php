<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Tanggapan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Pengaturan_mdl');
		$this->load->model('Tanggapan_mdl');
		$this->load->model('Pengaduan_mdl');
		$this->load->model('Petugas_mdl');
		$this->load->helper('url');
	}

	//tanggapan list
	public function index($id_tanggapan = null, $id = 0)
	{
		$data = array(
			'title' => 'List Tanggapan',
			'header1' => 'List Tanggapan',
			'pengaturan' => $this->Pengaturan_mdl->getById($id),
			'tanggapan' => $this->Tanggapan_mdl->getAll('tanggapan')->result(),
			'jlh_tanggapan' => $this->Tanggapan_mdl->countAll('tanggapan')
		);
		$this->load->view('admin/_partials/head.php', $data);
		$this->load->view('admin/tanggapan.php', $data);
	}

	//pilih id pengaduan
	public function pilih($id = 0)
	{
		$data = array(
			'title' => 'Pilih Id Pengaduan',
			'header1' => 'Pilih Id Pengaduan',
			'pengaturan' => $this->Pengaturan_mdl->getById($id),
			'pengaduan' => $this->Pengaduan_mdl->getAll('pengaduan')->result()
		);
		$this->load->view('admin/_partials/head.php', $data);
		$this->load->view('admin/pilihpengaduan', $data);
	}

	//tambah tanggapan
	public function tambah($id_pengaduan = null, $id = 0)
	{
		if (isset($_POST['btnsimpan'])) {
			$id_tanggapan = '';
			$id_pengaduan = $this->input->post('txtid_pengaduan');
			$tgl_tanggapan = $this->input->post('txttgl_tanggapan');
			$tanggapan = $this->input->post('txttanggapan');
			$id_petugas = $this->input->post('txtid_petugas');

			$data = array(
				'id_tanggapan' => $id_tanggapan,
				'id_pengaduan' => $id_pengaduan,
				'tgl_tanggapan' => $tgl_tanggapan,
				'tanggapan' => $tanggapan,
				'id_petugas' => $id_petugas
			);

			$this->Tanggapan_mdl->save('tanggapan', $data);
			redirect('tanggapan/index');
		} else {
			$data = array(
				'title' => 'Tambah Tanggapan',
				'header1' => 'Tambah Tanggapan',
				'pengaturan' => $this->Pengaturan_mdl->getById($id),
				'tanggapan' => $this->Tanggapan_mdl->getAll('tanggapan')->result(),
				'pengaduan' => $this->Pengaduan_mdl->getById($id_pengaduan),
				'petugas' => $this->Petugas_mdl->getAll('petugas')->result()
			);
			$this->load->view('admin/_partials/head.php', $data);
			$this->load->view('admin/addtanggapan', $data);
		}
	}

	//edit tanggapan
	public function edit($id_tanggapan = null, $id = 0)
	{
		if (isset($_POST['btnsimpan'])) {
			$data = array(
				'tgl_tanggapan' => $this->input->post('txttgl_tanggapan'),
				'tanggapan' => $this->input->post('txttanggapan'),
				'id_petugas' => $this->input->post('txtid_petugas')
			);
			//edit tanggapan
			$this->Tanggapan_mdl->update($id_tanggapan, $data);
			redirect('tanggapan/index');
		} else {
			$data = array(
				'title' => 'Edit Tanggapan',
				'header1' => 'Edit Tanggapan',
				'pengaturan' => $this->Pengaturan_mdl->getById($id),
				'tanggapan' => $this->Tanggapan_mdl->getById($id_tanggapan),
				'pengaduan' => $this->Pengaduan_mdl->getAll('pengaduan')->result(),
				'petugas' => $this->Petugas_mdl->getAll('petugas')->result()
			);
			$this->load->view('admin/_partials/head.php', $data);
			$this->load->view('admin/edittanggapan', $data);
		}
	}

	//hapus tanggapan
	public function delete($id_tanggapan)
	{
		$this->Tanggapan_mdl->delete($id_tanggapan);
		redirect('tanggapan/index');
	}
}
