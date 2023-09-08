<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spp extends CI_Controller
{

	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data Spp',
			'judul' => 'Spp',
			'head' => '_partials/head',
			'konten' => 'v_admin-spp',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'spp' => $this->sp->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$data = array(
			'id_spp' => '',
			'tahun' => $this->input->post('tahun'),
			'nominal' => $this->input->post('nominal'),
		);

		$simpan = $this->sp->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata('pesan', 'Spp berhasil disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Spp gagal disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('spp'));
	}

	public function update()
	{
		$where = $this->input->post('id_spp');
		$data = array(
			'id_outlet' => $this->input->post('id_outlet'),
			'tahun' => $this->input->post('tahun'),
			'nominal' => $this->input->post('nominal'),
		);

		$update = $this->sp->update($data, $where);

		if ($update) {
			$this->session->set_flashdata('pesan', 'Spp berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Spp gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('spp'));
	}

	public function hapus($id_spp = null)
	{
		$hapus = $this->sp->hapus($id_spp);

		if ($hapus) {
			$this->session->set_flashdata('pesan', 'Spp berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Spp gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('spp'));
	}
}
