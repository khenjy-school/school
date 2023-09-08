<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Petugas_mdl extends CI_Model
{
	private $_table = 'petugas';

	public $id_petugas;
	public $nama_petugas;
	public $username;
	public $password;
	public $telp;
	public $level;

	//cek data
	public function cek_data($_tabel, $kondisi)
	{
		return $this->db->get_where($_tabel, $kondisi)->row_array();
	}

	//ambil satu data berdasarkan username
	public function ambil($_tabel, $username)
	{
		return $this->db->get_where('petugas', array('username' => $username));
	}

	//ambil semua data
	public function getAll($_table)
	{
		return $this->db->get($_table);
	}

	//ambil satu data
	public function getById($id_petugas)
	{
		return $this->db->get_where($this->_table, ["id_petugas" => $id_petugas])->row();
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
	public function update($id_petugas, $data)
	{
		$this->db->where('id_petugas', $id_petugas);
		return $this->db->update('petugas', $data);
	}

	//hapus data
	public function delete($id_petugas)
	{
		$this->db->where('id_petugas', $id_petugas);
		return $this->db->delete('petugas');
	}
}
