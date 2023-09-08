<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{

	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data History',
			'judul' => 'Detail History',
			'head' => '_partials/head',
			'konten' => 'v_admin-history',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'history' => $this->hst->ambildata()->result(),
			'member' => $this->mbr->ambildata()->result(),
		);

		$this->load->view('template', $data);
	}

	public function daftar($id = 1)
	{
		$where = $this->session->userdata('id_user');
		$data = array(
			'title' => 'Data Detail History',
			'head' => '_partials/head',
			'konten' => 'v_reservasi',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'history' => $this->hst->ambil_id_user($where)->result()
		);

		$this->load->view('template', $data);
	}

	public function cari($id = 1)
	{
		$id_history = $this->input->get('id_history');
		$email = $this->input->get('email');

		$data = array(
			'title' => 'Data History',
			'head' => '_partials/head',
			'konten' => 'v_reservasi',
			'pengaturan' => $this->ptn->ambil($id)->result(),

			// mencari dan menampilkan id history berdasarkan id_history yang telah diinput
			'history' => $this->hst->cari($id_history, $email)->result()
		);

		$this->load->view('template', $data);
	}

	public function filter($id = 1)
	{
		// nilai min dan max sudah diinput sebelumnya
		$min = $this->input->get('min');
		$max = $this->input->get('max');

		$data = array(
			'title' => 'Data History',
			'head' => '_partials/head',
			'konten' => 'v_admin-history',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'history' => $this->hst->filter($min, $max)->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'min' => $min,
			'max' => $max,
		);

		$this->load->view('template', $data);
	}

	public function tambahku($id_transaksi)
	{
		$data = array(
			'id_history' => '',
			'id_transaksi' => '',
			'id_paket' => $this->input->post('id_paket'),
			'qty' => $this->input->post('qty'),
			'keterangan' => $this->input->post('keterangan')
		);

		$simpan = $this->hst->simpan($data);

		if ($simpan) {

			$this->session->set_flashdata('pesan', 'History berhasil disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'History gagal disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('history'));
	}

	public function konfirmasi($id = 1)
	{
		$where = $this->session->tempdata('email_pemesan');
		$data = array(
			'title' => 'Pemesanan Berhasil',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),

			// mengembalikan data baris terakhir/terbaru sesuai ketentuan dalam database untuk ditampilkan
			'history' => $this->hst->ambil_email($where)->last_row(),
		);

		$this->load->view('konfirmasi', $data);
	}

	public function update_status()
	{
		$where = $this->input->post('id_history');
		$data = array(
			'id_outlet' => $this->input->post('id_outlet'),
			'kode_invoice' => $this->input->post('kode_invoice'),
			'id_member' => $this->input->post('id_member'),
			'tgl' => $this->input->post('tgl'),
			'batas_waktu' => $this->input->post('batas_waktu'),
			'tgl_bayar' => $this->input->post('tgl_bayar'),
			'biaya_tambahan' => $this->input->post('biaya_tambahan'),
			'diskon' => $this->input->post('diskon'),
			'pajak' => $this->input->post('pajak'),
			'status' => $this->input->post('status'),
			'dibayar' => $this->input->post('dibayar'),
			'id_user' => $this->input->post('id_user'),
		);

		$update = $this->htr->update_transaksi($data, $where);

		if ($update) {

			$this->session->set_flashdata('pesan', 'Status history berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Status history gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('history'));
	}

	public function hapus($id_history = null)
	{
		$hapus = $this->hst->hapus($id_history);

		if ($hapus) {

			$this->session->set_flashdata('pesan', 'History berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'History gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('history'));
	}

	public function print($id_history = null, $id = 1)
	{
		$data = array(
			'title' => 'Bukti Reservasi',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'history' => $this->hst->ambil($id_history)->result()
		);

		$this->load->view('print', $data);
	}
}
