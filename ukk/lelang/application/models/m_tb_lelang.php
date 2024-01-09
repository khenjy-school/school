<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tb_lelang extends CI_Model
{
	private $tabel = 'tb_lelang';

	public function ambildata()
	{
		return $this->db->get($this->tabel);
	}

	public function ambil($where)
	{
		$this->db->where('id_lelang', $where);
		return $this->db->get($this->tabel);
	}

	public function ambil_nisn($where)
	{
		$this->db->where('id_user', $where);
		return $this->db->get($this->tabel);
	}

	public function ambil_id_petugas($where)
	{
		$this->db->where('id_petugas', $where);
		return $this->db->get($this->tabel);
	}

	public function ambil_email($where)
	{
		$this->db->where('email', $where);
		return $this->db->get($this->tabel);
	}

	public function cari($id_pembayaran, $email)
	{
		$this->db->where('id_lelang', $id_pembayaran);
		$this->db->where('email', $email);
		return $this->db->get($this->tabel);
	}

	public function filter($param1)
	{
		$filter = "SELECT * FROM tb_lelang WHERE 
		
		id_user LIKE '%" . $param1 . "%'";
		return $this->db->query($filter);
	}

	public function filter_masyarakat($param1, $where)
	{
		$filter = "SELECT * FROM tb_lelang WHERE 
		id_user IN ('" . $where . "') AND
		id_user LIKE  '%" . $param1 . "%'";
		return $this->db->query($filter);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	public function update($data, $where)
	{
		$this->db->where('id_pembayaran', $where);
		return $this->db->update($this->tabel, $data);
	}

	public function hapus($where)
	{
		$sql = "DELETE FROM " . $this->tabel . " WHERE id_pembayaran =  " . $where . ";";
		return $this->db->query($sql);
	}

	public function hapus_status($where)
	{

		$this->db->where('status', $where);
		return $this->db->delete($this->tabel);
	}
}
