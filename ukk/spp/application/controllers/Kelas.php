<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data Kelas',
			'judul' => 'Kelas',
			'head' => '_partials/head',
			'konten' => 'v_admin-kelas',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'kelas' => $this->olt->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$data = array(
			'id_kelas' => '',
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'tlp' => $this->input->post('tlp'),
		);

		$simpan = $this->olt->simpan($data);

		// menampilkan toast jika operasi berhasil
		if ($simpan) {
			$this->session->set_flashdata('pesan', 'Kelas berhasil disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Kelas gagal disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('kelas'));
	}

	public function update()
	{
		$where = $this->input->post('id_kelas');
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'tlp' => $this->input->post('tlp'),
		);

		$update = $this->olt->update($data, $where);

		// menampilkan toast jika operasi berhasil
		if ($update) {
			$this->session->set_flashdata('pesan', 'Kelas berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Kelas gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('kelas'));
	}

	// $id_kelas akan menjadi $where di model
	public function hapus($id_kelas = null)
	{
		$hapus = $this->olt->hapus($id_kelas);
		
		// menampilkan toast jika operasi berhasil
		if ($hapus) {
			$this->session->set_flashdata('pesan', 'Kelas berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Kelas gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('kelas'));
	}
}
