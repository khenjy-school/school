<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Tanggapan_mdl extends CI_Model
{
	private $_table = 'tanggapan';

	public $id_tanggapan;
	public $id_pengaduan;
	public $tgl_tanggapan;
	public $tanggapan;
	public $id_petugas;

	//ambil semua data
	public function getAll($_table)
	{
		return $this->db->get($_table);
	}

	//ambil satu data
	public function getById($id_tanggapan)
	{
		return $this->db->get_where($this->_table, ["id_tanggapan" => $id_tanggapan])->row();
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
	public function update($id_tanggapan, $data)
	{
		$this->db->where('id_tanggapan', $id_tanggapan);
		return $this->db->update('tanggapan', $data);
	}

	//hapus data
	public function delete($id_tanggapan)
	{
		$this->db->where('id_tanggapan', $id_tanggapan);
		return $this->db->delete('tanggapan');
	}
}
