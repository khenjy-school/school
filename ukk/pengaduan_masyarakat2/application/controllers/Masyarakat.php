<?php
class Masyarakat extends CI_Controller
{

	public function index()
	{
		$data = array(
			'title' => "Data Masyarakat",
			'konten' => "v_masyarakat",
			'masyarakat' => $this->msy->ambildata()->result()
		);
		$this->load->view('dashboard', $data);
	}

	public function tambah()
	{
		$data = array(
			'nik' => $this->input->post('nik'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('uname'),
			'password' => $this->input->post('pass'),
			'telp' => $this->input->post('telp')
		);
		$simpan = $this->msy->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata('pesan', '<span class="text-success"><i class="far fa-check-square"></i> Data tersimpans</span>');
			$this->session->set_flashdata('pangggil', '$(".toast").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Data gagal tersimpan');
			$this->session->set_flashdata('pangil', '$(".toast").toast("show")');
		}

		redirect(site_url('Masyarakat'));
	}

	public function update()
	{
		//update masyarakat set $data from masyarakat where $where

		$where = array('nik' => $this->input->post('nik'));
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('uname'),
			'password' => $this->input->post('pass'),
			'telp' => $this->input->post('telp')
		);

		$simpan = $this->msy->ubah($data, $where);

		//notifikasi
		if ($simpan) {
			$this->session->set_flashdata('pesan', '<span class="text-success"><i class="far fa-check-square"></i> Data terubah</span>');
			$this->session->set_flashdata('panggil', '$(".toast").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Data gagal terupdate');
			$this->session->set_flashdata('panggil', '$(".toast").toast("show")');
		}

		redirect(site_url('Masyarakat'));
	}

	public function hapus($kd)
	{
		//delete from masyarakat $where
		$where = array("nik" => $kd);

		$hapus = $this->msy->hapus($where);

		//notifikasi
		if ($hapus) {
			$this->session->set_flashdata('pesan', '<span class="text-success"><i class="far fa-check-square"></i> Data terhapus</span>');
			$this->session->set_flashdata('panggil', '$(".toast").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Data gagal terhapus');
			$this->session->set_flashdata('panggil', '$(".toast").toast("show")');
		}

		redirect(site_url('Masyarakat'));
	}

	public function logout()
	{
		session_destroy();
		redirect('Welcome');
	}
}
