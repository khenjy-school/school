<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data Siswa',
			'judul' => 'Siswa',
			'head' => '_partials/head',
			'konten' => 'v_admin-siswa',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'siswa' => $this->mbr->ambildata()->result(),
		);

		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$data = array(
			'id_siswa' => '',
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tlp' => $this->input->post('tlp'),
		);

		$simpan = $this->mbr->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata('pesan', 'Fasilitas berhasil disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Fasilitas gagal disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('siswa'));
	}

	public function update()
	{
		$where = $this->input->post('id_siswa');
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tlp' => $this->input->post('tlp'),
		);

		$update = $this->mbr->update($data, $where);

		if ($update) {
			$this->session->set_flashdata('pesan', 'Fasilitas berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Fasilitas gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('siswa'));
	}

	public function hapus($id_siswa = null)
	{
		$hapus = $this->mbr->hapus($id_siswa);

		if ($hapus) {
			$this->session->set_flashdata('pesan', 'Fasilitas berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Fasilitas gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('siswa'));
	}
}
