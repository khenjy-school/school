<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Level extends CI_Controller
{

	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data Level',
			'judul' => 'Level',
			'head' => '_partials/head',
			'konten' => 'v_admin-level',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'level' => $this->lvl->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$data = array(
			'id_level' => '',
			'tahun' => $this->input->post('tahun'),
			'nominal' => $this->input->post('nominal'),
		);

		$simpan = $this->lvl->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata('pesan', 'Level berhasil disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Level gagal disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('level'));
	}

	public function update()
	{
		$where = $this->input->post('id_level');
		$data = array(
			'id_outlet' => $this->input->post('id_outlet'),
			'tahun' => $this->input->post('tahun'),
			'nominal' => $this->input->post('nominal'),
		);

		$update = $this->lvl->update($data, $where);

		if ($update) {
			$this->session->set_flashdata('pesan', 'Level berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Level gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('level'));
	}

	public function hapus($id_level = null)
	{
		$hapus = $this->lvl->hapus($id_level);

		if ($hapus) {
			$this->session->set_flashdata('pesan', 'Level berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Level gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('level'));
	}
}
