<?php
class Petugas extends CI_Controller
{

	public function index()
	{
		$data = array(
			'title' => "Data Petugas",
			'konten' => "v_petugas",
			'petugas' => $this->pts->ambildata()->result()
		);
		$this->load->view('dashboard', $data);
	}


	public function tambah()
	{
		$data = array(
			'id_petugas' => "",
			'nama_petugas' => $this->input->post('nama'),
			'username' => $this->input->post('uname'),
			'password' => $this->input->post('pass'),
			'telp' => $this->input->post('telp'),
			'level' => $this->input->post('level')
		);
		$simpan = $this->pts->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata('pesan', '<span class="text-success"><i class="far fa-check-square"></i> Data tersimpan</span>');
			$this->session->set_flashdata('pangggil', '$(".toast").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Data gagal tersimpan');
			$this->session->set_flashdata('pangil', '$(".toast").toast("show")');
		}

		redirect(site_url('Petugas'));
	}

	public function update()
	{
		//update petugas set $data from petugas where $where

		$where = array('id_petugas' => $this->input->post('id'));
		$data = array(
			'nama_petugas' => $this->input->post('nama'),
			'username' => $this->input->post('uname'),
			'password' => $this->input->post('pass'),
			'telp' => $this->input->post('telp'),
			'level' => $this->input->post('level')
		);

		$simpan = $this->pts->ubah($data, $where);

		//notifikasi
		if ($simpan) {
			$this->session->set_flashdata('pesan', '<span class="text-success"><i class="far fa-check-square"></i> Data terubah</span>');
			$this->session->set_flashdata('panggil', '$(".toast").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Data gagal terupdate');
			$this->session->set_flashdata('panggil', '$(".toast").toast("show")');
		}

		redirect(site_url('Petugas'));
	}

	public function hapus($kd)
	{
		//delete from petugas $where
		$where = array("id_petugas" => $kd);

		$hapus = $this->pts->hapus($where);

		//notifikasi
		if ($hapus) {
			$this->session->set_flashdata('pesan', '<span class="text-success"><i class="far fa-check-square"></i> Data terhapus</span>');
			$this->session->set_flashdata('panggil', '$(".toast").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Data gagal terhapus');
			$this->session->set_flashdata('panggil', '$(".toast").toast("show")');
		}

		redirect(site_url('Petugas'));
	}

	public function logout()
	{
		session_destroy();
		redirect('Welcome');
	}
}
