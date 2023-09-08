<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_history extends CI_Model
{
	// par1 berarti parameter 1
	private $tabel = 'history_lelang';
	private $id = 'id_history';

	public function ambildata()
	{
		return $this->db->get($this->tabel);
	}

	public function ambil($where)
	{
		$this->db->where($this->id, $where);
		return $this->db->get($this->tabel);
	}

	public function ambil_email($where)
	{
		$this->db->where($this->par1, $where);
		return $this->db->get($this->tabel);
	}

	public function cari($id_transaksi, $email)
	{
		$this->db->where($this->id, $id_transaksi);
		$this->db->where($this->par1, $email);
		return $this->db->get($this->tabel);
	}

	public function filter($min, $max)
	{
		$sql = "SELECT * FROM detail_transaksi WHERE cek_in BETWEEN '" . $min . "' AND '" . $max . "'";
		return $this->db->query($sql);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	public function update($data, $where)
	{
		$this->db->where($this->id, $where);
		return $this->db->update($this->tabel, $data);
	}

	public function hapus($where)
	{
		$this->db->where($this->id, $where);
		return $this->db->delete($this->tabel);
	}
}
