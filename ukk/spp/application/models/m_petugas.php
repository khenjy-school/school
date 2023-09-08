<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_petugas extends CI_Model
{

	private $tabel = 'tb_petugas';
	private $id = 'id_petugas';
	public $par1 = 'username';
	private $par2 = 'password';
	private $par3 = 'id_kelas';

	public function ambildata()
	{
		return $this->db->get($this->tabel);
	}

	public function ambil($where)
	{
		$this->db->where($this->id, $where);
		return $this->db->get($this->tabel);
	}

	public function cekusername($par1, $par3)
	{
		$this->db->where($this->par1, $par1);
		$this->db->where($this->par3, $par3);
		return $this->db->get($this->tabel);
	}

	public function ceklogin($par1, $par2, $par3)
	{
		$this->db->where($this->par1, $par1);
		$this->db->where($this->par2, $par2);
		$this->db->where($this->par3, $par3);
		return $this->db->get($this->tabel);
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
