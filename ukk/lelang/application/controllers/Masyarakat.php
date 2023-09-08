<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masyarakat extends CI_Controller
{

	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data Masyarakat',
			'judul' => 'Masyarakat',
			'head' => '_partials/head',
			'konten' => 'v_admin-masyarakat',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'masyarakat' => $this->msy->ambildata()->result(),
		);

		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$data = array(
			'id_masyarakat' => '',
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tlp' => $this->input->post('tlp'),
		);

		$simpan = $this->msy->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata('pesan', 'Fasilitas berhasil disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Fasilitas gagal disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('masyarakat'));
	}

	public function update()
	{
		$where = $this->input->post('id_masyarakat');
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tlp' => $this->input->post('tlp'),
		);

		$update = $this->msy->update($data, $where);

		if ($update) {
			$this->session->set_flashdata('pesan', 'Fasilitas berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Fasilitas gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('masyarakat'));
	}

	public function hapus($id_masyarakat = null)
	{
		$hapus = $this->msy->hapus($id_masyarakat);

		if ($hapus) {
			$this->session->set_flashdata('pesan', 'Fasilitas berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Fasilitas gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('masyarakat'));
	}
}
