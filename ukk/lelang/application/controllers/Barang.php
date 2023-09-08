<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data Barang',
			'judul' => 'Barang',
			'head' => '_partials/head',
			'konten' => 'v_admin-barang',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'barang' => $this->brg->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$data = array(
			'id_barang' => '',
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'tlp' => $this->input->post('tlp'),
		);

		$simpan = $this->brg->simpan($data);

		// menampilkan toast jika operasi berhasil
		if ($simpan) {
			$this->session->set_flashdata('pesan', 'Barang berhasil disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Barang gagal disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('barang'));
	}

	public function update()
	{
		$where = $this->input->post('id_barang');
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'tlp' => $this->input->post('tlp'),
		);

		$update = $this->brg->update($data, $where);

		// menampilkan toast jika operasi berhasil
		if ($update) {
			$this->session->set_flashdata('pesan', 'Barang berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Barang gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('barang'));
	}

	// $id_barang akan menjadi $where di model
	public function hapus($id_barang = null)
	{
		$hapus = $this->brg->hapus($id_barang);
		
		// menampilkan toast jika operasi berhasil
		if ($hapus) {
			$this->session->set_flashdata('pesan', 'Barang berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Barang gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('barang'));
	}
}
