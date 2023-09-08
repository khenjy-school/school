<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lelang extends CI_Controller
{
	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data Lelang',
			'judul' => 'Lelang',
			'head' => '_partials/head',
			'konten' => 'v_admin-lelang',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'lelang' => $this->llg->ambildata()->result(),
			'paket' => $this->pkt->ambildata()->result(),
			'member' => $this->mbr->ambildata()->result(),
		);

		$this->load->view('template', $data);
	}

	public function daftar($id = 1)
	{
		$where = $this->session->userdata('id_user');
		$data = array(
			'title' => 'Data Lelang',
			'head' => '_partials/head',
			'konten' => 'v_reservasi',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'lelang' => $this->llg->ambil_id_user($where)->result()
		);

		$this->load->view('template', $data);
	}

	public function cari($id = 1)
	{
		$id_transaksi = $this->input->get('id_transaksi');
		$email = $this->input->get('email');

		$data = array(
			'title' => 'Data Lelang',
			'head' => '_partials/head',
			'konten' => 'v_reservasi',
			'pengaturan' => $this->ptn->ambil($id)->result(),

			// mencari dan menampilkan id lelang berdasarkan id_transaksi yang telah diinput
			'lelang' => $this->llg->cari($id_transaksi, $email)->result()
		);

		$this->load->view('template', $data);
	}

	public function filter($id = 1)
	{
		// nilai min dan max sudah diinput sebelumnya
		$min = $this->input->get('min');
		$max = $this->input->get('max');

		$data = array(
			'title' => 'Data Lelang',
			'head' => '_partials/head',
			'konten' => 'v_admin-lelang',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'lelang' => $this->llg->filter($min, $max)->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'min' => $min,
			'max' => $max,
		);

		$this->load->view('template', $data);
	}

	// function tambah data repeater form ke database
	// http://iniilmu.com/2020/12/02/cara-menambahkan-data-array-dengan-php-dan-mysql/

	// yg tidak diinput
	// id_transaksi

	// yg diinput manual 
	// kode_invoice
	// id_member
	// tgl
	// batas_waktu (sementara)
	// tgl_bayar (sementara)
	// biaya_tambahan
	// diskon
	// pajak

	// yg pakai select dari tabel lain
	// id_member, tabel member

	// yg diinput oleh session
	// id_outlet
	// id_user

	// yg sdh ada nilai
	// status
	// dibayar

	public function tambah()
	{
		$jum = count($this->input->post('id_outlet'));
		for ($i = 0; $i < $jum; $i++) {
			$data = array(
				'id_transaksi' => '',
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

			// untuk fitur tambah lelang rencananya akan mengikuti tutorial dari internet
			// soalnya belum ada solusi untuk mendapatkan nilai id_transaksi pada tabel detail_pesanan untuk ditambah
			
			$simpan = $this->llg->simpan($data);
		}

		if ($simpan) {

			$this->session->set_flashdata('pesan', 'Semua lelang berhasil disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Lelang gagal disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		call_user_func('tambah_detail', $data);

		redirect(site_url('lelang'));
	}

	public function tambah_detail($data)
	{
		$detail = array(
			'id_detail' => '',
			'id_transaksi' => $data->id_transaksi,
			'id_paket' => $data->input,
			'qty' => $this->input->post('qty'),
			'keterangan' => $this->input->post('keterangan')
		);

		$simpan = $this->llg->simpan($detail);
	}

	public function konfirmasi($id = 1)
	{
		$where = $this->session->tempdata('email_pemesan');
		$data = array(
			'title' => 'Pemesanan Berhasil',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),

			// mengembalikan data baris terakhir/terbaru sesuai ketentuan dalam database untuk ditampilkan
			'lelang' => $this->llg->ambil_email($where)->last_row(),
		);

		$this->load->view('konfirmasi', $data);
	}

	public function update_status()
	{
		$where = $this->input->post('id_transaksi');
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

			$this->session->set_flashdata('pesan', 'Status lelang berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Status lelang gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('lelang'));
	}

	public function hapus($id_transaksi = null)
	{
		$hapus = $this->llg->hapus($id_transaksi);

		if ($hapus) {

			$this->session->set_flashdata('pesan', 'Lelang berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Lelang gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('lelang'));
	}

	public function print($id_transaksi = null, $id = 1)
	{
		$data = array(
			'title' => 'Bukti Reservasi',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'lelang' => $this->llg->ambil($id_transaksi)->result()
		);

		$this->load->view('print', $data);
	}
}
