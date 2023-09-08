<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_lelang extends CI_Model
{
	// par1 berarti parameter 1
	private $tabel = 'tb_lelang';
	private $id = 'id_lelang';
	private $id2 = 'id_user';
	private $par1 = 'email';

	public function ambildata()
	{
		return $this->db->get($this->tabel);
	}

	public function ambil($where)
	{
		$this->db->where($this->id, $where);
		return $this->db->get($this->tabel);
	}

	public function ambil_id_user($where)
	{
		$this->db->where($this->id2, $where);
		return $this->db->get($this->tabel);
	}

	public function ambil_email($where)
	{
		$this->db->where($this->par1, $where);
		return $this->db->get($this->tabel);
	}

	public function cari($id_lelang, $email)
	{
		$this->db->where($this->id, $id_lelang);
		$this->db->where($this->par1, $email);
		return $this->db->get($this->tabel);
	}

	public function filter($min, $max)
	{
		$sql = "SELECT * FROM tb_lelang WHERE cek_in BETWEEN '" . $min . "' AND '" . $max . "'";
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
