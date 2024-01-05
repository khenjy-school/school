<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Masih banyak fitur-fitur yang kurang pada fitur pembayaran seperti fitur cancel pembayaran.
// Dan juga seharusnya ketika user melakukan pembayaran seharusnya stok kelas tidak langsung berkurang
// // Melainkan harus menunggu petugas membooking kelas untuk customer terlebih dulu
// Saya baru berpikir untuk mengubah juga query sql pada trigger tambah kelas
// Yaitu untuk menambah stok kelas dan input ke history jika status pesannanya NOT IN (pending)
// Hal ini akan diperbaiki pada waktu-waktu mendatang. 

include 'Welcome.php';
session_write_close();
class Pembayaran extends Welcome
{
	// deklarasi variabel mvc
	// deklarasi variabel model
	private $tabel8_m = 'tl8';

	// deklarasi variabel views
	private $tabel8_v1;
	private $tabel8_v1_title;
	private $tabel8_v2;
	private $tabel8_v2_title;
	private $tabel8_v3;
	private $tabel8_v3_title;

	// deklarasi variabel controller
	private $tabel8_c1;
	private $tabel8_c2;
	private $tabel8_c3;
	private $tabel8_c4;
	private $tabel8_c5;
	private $tabel8_c6;
	private $tabel8_c7;
	private $tabel8_c8;
	private $tabel8_c9;
	private $tabel8_c10;
	private $tabel8_c11;
	private $tabel8_c12;
	private $tabel8_c13;
	private $tabel8_c14;
	private $tabel8_c15;
	// deklarasi variabel views
	private $tabel8_v_input1_post;
	private $tabel8_v_input1;
	private $tabel8_v_input1_alt;
	private $tabel8_v_input1_get;
	private $tabel8_v_input2_post;
	private $tabel8_v_input3_post;
	private $tabel8_v_input3_get;
	private $tabel8_v_input3;
	private $tabel8_v_input4_post;
	private $tabel8_v_input4_get;
	private $tabel8_v_input5_post;
	private $tabel8_v_input6_post;
	private $tabel8_v_input7_post;
	private $tabel8_v_input8_post;
	private $tabel8_v_flashdata1_msg_1;
	private $tabel8_v_flashdata1_msg_2;
	private $tabel8_v_flashdata1_msg_3;
	private $tabel8_v_flashdata1_msg_4;
	private $tabel8_v_flashdata1_msg_5;
	private $tabel8_v_flashdata1_msg_6;
	private $tabel8_v_flashdata1_msg_7;
	private $tabel8_v_flashdata1_msg_8;
	private $tabel8_v_flashdata3_msg_1;
	private $tabel8_v_flashdata4_msg_1;

	private $tabel8_userdata1;
	private $tabel8_userdata2;
	private $tabel8_userdata3;
	private $tabel8_userdata4;
	private $tabel8_userdata5;
	private $tabel8_userdata6;
	private $tabel8_userdata7;
	private $tabel8_userdata8;
	private $tabel8_userdata9;
	private $tabel8_userdata10;
	private $tabel8_userdata11;
	private $tabel8_userdata12;
	private $tabel9_userdata1;
	private $tabel9_tempdata1;
	private $tabel9_userdata2;
	private $tabel9_tempdata2;
	private $tabel9_userdata3;
	private $tabel9_tempdata3;
	private $tabel9_userdata4;
	private $tabel9_tempdata4;
	private $tabel9_userdata5;
	private $tabel9_tempdata5;
	private $tabel9_userdata6;
	private $tabel9_tempdata6;

	public function

	declare()
	{
		// deklarasi variabel mvc
		// deklarasi variabel model
		$this->tabel8_m = 'tl8';

		// deklarasi variabel views
		$this->tabel8_v1 = 'v_' . $this->tabel8;
		$this->tabel8_v1_title = 'Daftar ' . $this->tabel8_alias;
		$this->tabel8_v2 = 'v_admin-' . $this->tabel8;
		$this->tabel8_v2_title = 'Data ' . $this->tabel8_alias;
		$this->tabel8_v3 = '_laporan/laporan_' . $this->tabel8;
		$this->tabel8_v3_title = 'Laporan ' . $this->tabel8_alias;

		// deklarasi variabel controller
		$this->tabel8_c1 = $this->tabel8;
		$this->tabel8_c2 = $this->tabel8 . '/tambah';
		$this->tabel8_c3 = $this->tabel8 . '/update';
		$this->tabel8_c4 = $this->tabel8 . '/hapus';
		$this->tabel8_c5 = $this->tabel8 . '/laporan';
		$this->tabel8_c6 = $this->tabel8 . '/daftar';
		$this->tabel8_c7 = $this->tabel8 . '/cari';
		$this->tabel8_c8 = $this->tabel8 . '/update_status';
		$this->tabel8_c9 = $this->tabel8 . '/konfirmasi';
		$this->tabel8_c10 = $this->tabel8 . '/print';
		$this->tabel8_c11 = $this->tabel8 . '/filter';
		$this->tabel8_c12 = $this->tabel8 . '/filter_siswa';
		$this->tabel8_c13 = $this->tabel8 . '/book';


		// tabel bagian input
		$this->tabel8_v_input1_post = $this->input->post($this->tabel8_field1);
		$this->tabel8_v_input1_get = $this->input->get($this->tabel8_field1);
		$this->tabel8_v_input1_alt = '';
		$this->tabel8_v_input1 = $this->tabel8_field1;
		$this->tabel8_v_input2_post = $this->input->post($this->tabel8_field2);
		$this->tabel8_v_input3_post = $this->input->post($this->tabel8_field3);
		$this->tabel8_v_input3_get = $this->input->get($this->tabel8_field3);
		$this->tabel8_v_input3 = $this->tabel8_field3;
		$this->tabel8_v_input4_post = $this->input->post($this->tabel8_field4);
		$this->tabel8_v_input4_get = $this->input->get($this->tabel8_field4);
		$this->tabel8_v_input5_post = $this->input->post($this->tabel8_field5);
		$this->tabel8_v_input6_post = $this->input->post($this->tabel8_field6);
		$this->tabel8_v_input7_post = $this->input->post($this->tabel8_field7);
		$this->tabel8_v_input8_post = $this->input->post($this->tabel8_field8);


		// deklarasi variabel bagian v_flashdata
		$this->tabel8_v_flashdata1_msg_1 = 'Data ' . $this->tabel8_alias . ' berhasil disimpan!';
		$this->tabel8_v_flashdata1_msg_2 = 'Data ' . $this->tabel8_alias . ' gagal disimpan!';
		$this->tabel8_v_flashdata1_msg_3 = 'Data ' . $this->tabel8_alias . ' berhasil diubah!';
		$this->tabel8_v_flashdata1_msg_4 = 'Data ' . $this->tabel8_alias . ' gagal diubah!';
		$this->tabel8_v_flashdata1_msg_5 = 'Data ' . $this->tabel8_alias . ' berhasil dihapus!';
		$this->tabel8_v_flashdata1_msg_6 = 'Data ' . $this->tabel8_alias . ' gagal dihapus!';
		$this->tabel8_v_flashdata1_msg_7 = 'Status ' . $this->tabel8_alias . ' berhasil diubah!';
		$this->tabel8_v_flashdata1_msg_8 = 'Status ' . $this->tabel8_alias . ' gagal diubah!';

		// deklarasi menggunakan nilai tabel lain
		// deklarasi session
		$this->tabel8_userdata1 = $this->tabel8_v_input1_get;
		$this->tabel8_userdata3 = $this->tabel8_v_input3_get;

		// deklarasi session tabel 9
		$this->tabel9_userdata1 = $this->tabel9_field1;
		$this->tabel9_tempdata1 = $this->tabel9_field1;
		$this->tabel9_userdata2 = $this->tabel9_field2;
		$this->tabel9_tempdata2 = $this->tabel9_field2;
		$this->tabel9_userdata3 = $this->tabel9_field3;
		$this->tabel9_tempdata3 = $this->tabel9_field3 . '_' . $this->tabel8;
		$this->tabel9_userdata4 = $this->tabel9_field4;
		$this->tabel9_tempdata4 = $this->tabel9_field4;
		$this->tabel9_userdata5 = $this->tabel9_field5;
		$this->tabel9_tempdata5 = $this->tabel9_field5;
		$this->tabel9_userdata6 = $this->tabel9_field6;
		$this->tabel9_tempdata6 = $this->tabel9_field6;
	}



	public function index($tabel7_field1 = 1)
	{
		$this->declare();

		// nilai min dan max di sini belum ada
		$param1 = $this->tabel8_v_input3_get;

		$data1 = array(
			$this->v_part1 => $this->tabel8_v2_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->tabel8_v2,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel8' =>  $this->tl8->filter($param1)->result(),
			// 'tabel9' =>  $this->tl9->ambildata()->result(),  // session sudah cukup
			'tabel4' =>  $this->tl4->ambildata()->result(),
			'tabel6' =>  $this->tl6->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			$this->tabel8_v_input3 => $param1,
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	public function tambah()
	{
		$this->declare();
		$param4 = $this->tabel8_v_input4_post;
		$param8 = $this->tabel8_v_input8_post;

		$data = array(
			$this->tabel8_field1 => $this->tabel8_v_input1_alt,
			$this->tabel8_field2 => $this->tabel8_v_input2_post,
			$this->tabel8_field3 => $this->tabel8_v_input3_post,
			$this->tabel8_field4 => $param4,
			$this->tabel8_field5 => $this->tabel8_v_input5_post,
			$this->tabel8_field6 => $this->tabel8_v_input6_post,
			$this->tabel8_field7 => $this->tabel8_v_input7_post,
			$this->tabel8_field8 => $param8,

		);

		// membuat session supaya nilainya dapat digunakan selama waktu yang ditentukan dalam detik
		$this->session->set_tempdata($this->tabel9_tempdata3, $param4, 300);

		$simpan = $this->tl8->simpan($data);

		if ($simpan) {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel8_v_flashdata1_msg_1);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel8_v_flashdata1_msg_2);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel8_c9));
	}

	public function update()
	{
		// this function is not really reccessary since only status that can be changed
	}


	public function hapus($id_pembayaran = null)
	{
		$this->declare();
		$hapus = $this->tl8->hapus($id_pembayaran);

		if ($hapus) {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel8_v_flashdata1_msg_3);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		} else {

			$this->session->set_flashdata($this->v_flashdata1, $this->tabel8_v_flashdata1_msg_4);
			$this->session->set_flashdata($this->v_flashdata_a, $this->v_flashdata_a_func1);
		}

		redirect(site_url($this->tabel8_c1));
	}


	public function laporan($tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->tabel8_v3_title,
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel8' =>  $this->tl8->ambildata()->result(),
			'tabel6' =>  $this->tl6->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->tabel8_v3, $data);
	}


	public function daftar($tabel7_field1 = 1)
	{
		$this->declare();
		$where = $this->session->userdata($this->tabel9_userdata1);
		$data1 = array(
			$this->v_part1 => $this->v11_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->v11,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel8' =>  $this->tl8->ambil_id_petugas($where)->result(),
			'tabel6' =>  $this->tl6->ambildata()->result(),
			'tabel5' =>  $this->tl5->ambildata()->result(),

		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}

	// Di bawah ini adalah fitur yang ingin kutambahkan ketika ingin memasukkan fitur filter di halaman daftar
	// Jika user menggunakan tombol cari untuk mencari pembayaran, namun pada views masih menggunakan v_reservasi, 
	// maka fitur ini dibutuhkan untuk membedakan user mana yang sedang mencari daftar pembayaran/history/transaksi 
	// atau hanya membuka halaman saja
	// Namun fitur di bawah tidak akan berguna jika halaman yang digunakan untuk menampilkan hasil cari berbeda dan
	// bukan v_reservasi
	// if (!$this->session->userdata('id_pembayaran')) {}
	// 	} else {  -->
	// 	 }  -->

	public function cari($tabel7_field1 = 1)
	{
		$this->declare();
		$param1 = $this->tabel8_v_input1_get;
		$param4 = $this->tabel8_v_input4_get;

		$data1 = array(
			$this->v_part1 => $this->tabel8_v1_title,
			$this->v_part2 => $this->head,
			$this->v_part3 => $this->v11,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),

			// mencari dan menampilkan id pembayaran berdasarkan id_pembayaran yang telah diinput
			'tabel8' =>  $this->tl8->cari($param1, $param4)->result(),
			'tabel6' =>  $this->tl6->ambildata()->result(),

		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v7, $data);
	}


	public function print($id_pembayaran = null, $tabel7_field1 = 1)
	{
		$this->declare();
		$data1 = array(
			$this->v_part1 => $this->v4_title1,
			$this->v_part2 => $this->head,
			$this->v_part4 => $this->v_part4_msg1,
			'tabel7' => $this->tl7->ambil($tabel7_field1)->result(),
			'tabel8' =>  $this->tl8->ambil($id_pembayaran)->result(),
			'tabel6' =>  $this->tl6->ambildata()->result()
		);

		$this->declarew();
		$data = array_merge($data1, $this->aliases);

		$this->load->view($this->v4, $data);
	}
}
