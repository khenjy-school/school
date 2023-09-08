<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_transaksi extends Transaksi
{

	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data Transaksi',
			'judul' => 'Detail Transaksi',
			'head' => '_partials/head',
			'konten' => 'v_admin-detail_transaksi',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'detail_transaksi' => $this->trs->ambildata()->result(),
			'detail' => $this->dtl->ambildata()->result(),
			'member' => $this->mbr->ambildata()->result(),
		);

		$this->load->view('template', $data);
	}

	public function daftar($id = 1)
	{
		$where = $this->session->userdata('id_user');
		$data = array(
			'title' => 'Data Detail Transaksi',
			'head' => '_partials/head',
			'konten' => 'v_reservasi',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'detail_transaksi' => $this->trs->ambil_id_user($where)->result()
		);

		$this->load->view('template', $data);
	}

	public function cari($id = 1)
	{
		$id_detail = $this->input->get('id_detail');
		$email = $this->input->get('email');

		$data = array(
			'title' => 'Data Transaksi',
			'head' => '_partials/head',
			'konten' => 'v_reservasi',
			'pengaturan' => $this->ptn->ambil($id)->result(),

			// mencari dan menampilkan id detail_transaksi berdasarkan id_detail yang telah diinput
			'detail_transaksi' => $this->trs->cari($id_detail, $email)->result()
		);

		$this->load->view('template', $data);
	}

	public function filter($id = 1)
	{
		// nilai min dan max sudah diinput sebelumnya
		$min = $this->input->get('min');
		$max = $this->input->get('max');

		$data = array(
			'title' => 'Data Transaksi',
			'head' => '_partials/head',
			'konten' => 'v_admin-detail_transaksi',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'detail_transaksi' => $this->trs->filter($min, $max)->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'min' => $min,
			'max' => $max,
		);

		$this->load->view('template', $data);
	}

	public function tambahku($id_transaksi)
	{
		$data = array(
			'id_detail' => '',
			'id_transaksi' => '',
			'id_paket' => $this->input->post('id_paket'),
			'qty' => $this->input->post('qty'),
			'keterangan' => $this->input->post('keterangan')
		);

		$simpan = $this->trs->simpan($data);

		if ($simpan) {

			$this->session->set_flashdata('pesan', 'Detail_transaksi berhasil disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Detail_transaksi gagal disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('detail_transaksi'));
	}

	public function konfirmasi($id = 1)
	{
		$where = $this->session->tempdata('email_pemesan');
		$data = array(
			'title' => 'Pemesanan Berhasil',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),

			// mengembalikan data baris terakhir/terbaru sesuai ketentuan dalam database untuk ditampilkan
			'detail_transaksi' => $this->trs->ambil_email($where)->last_row(),
		);

		$this->load->view('konfirmasi', $data);
	}

	public function update_status()
	{
		$where = $this->input->post('id_detail');
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

			$this->session->set_flashdata('pesan', 'Status detail_transaksi berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Status detail_transaksi gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('detail_transaksi'));
	}

	public function hapus($id_detail = null)
	{
		$hapus = $this->trs->hapus($id_detail);

		if ($hapus) {

			$this->session->set_flashdata('pesan', 'Detail_transaksi berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Detail_transaksi gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('detail_transaksi'));
	}

	public function print($id_detail = null, $id = 1)
	{
		$data = array(
			'title' => 'Bukti Reservasi',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'detail_transaksi' => $this->trs->ambil($id_detail)->result()
		);

		$this->load->view('print', $data);
	}
}
