<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Pengaduan_mdl extends CI_Model
{
	private $_table = 'pengaduan';

	public $id_pengaduan;
	public $tgl_pengaduan;
	public $nik;
	public $isi_laporan;
	public $foto;
	public $status;

	//cek data
	public function cek_data($_tabel)
	{
		return $this->db->get_where($_tabel);
	}

	//ambil semua data
	public function getAll($_table)
	{
		return $this->db->get($_table);
	}

	//ambil satu data
	public function getById($id_pengaduan)
	{
		return $this->db->get_where($this->_table, ["id_pengaduan" => $id_pengaduan])->row();
	}

	//hitung data
	public function countAll($_table)
	{
		return $this->db->count_all_results($_table);
	}

	//simpan data
	public function save($_table, $data)
	{
		return $this->db->insert($_table, $data);
	}

	//update data
	public function update($id_pengaduan, $data)
	{
		$this->db->where('id_pengaduan', $id_pengaduan);
		return $this->db->update('pengaduan', $data);
	}

	//hapus data
	public function delete($id_pengaduan)
	{
		$this->db->where('id_pengaduan', $id_pengaduan);
		return $this->db->delete('pengaduan');
	}
}
