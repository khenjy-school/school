<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Masyarakat_mdl extends CI_Model
{
	private $_table = 'masyarakat';

	public $nik;
	public $nama;
	public $username;
	public $password;
	public $telp;

	//cek login
	public function cek_data($_tabel, $kondisi)
	{
		return $this->db->get_where($_tabel, $kondisi);
	}

	//ambil satu data berdasarkan username
	public function ambil($_tabel, $nik)
	{
		return $this->db->get_where('masyarakat', array('username' => $nik));
	}

	//ambil semua data
	public function getAll($_table)
	{
		return $this->db->get($_table);
	}

	//ambil satu data
	public function getById($nik)
	{
		return $this->db->get_where($this->_table, ["nik" => $nik])->row();
	}

	//hitung semua
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
	public function update($nik, $data)
	{
		$this->db->where('nik', $nik);
		return $this->db->update('masyarakat', $data);
	}

	//hapus data
	public function delete($nik)
	{
		$this->db->where('nik', $nik);
		return $this->db->delete('masyarakat');
	}
}
