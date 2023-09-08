<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_spp extends CI_Model {

  private $tabel = 'tb_spp';
	private $id = 'id_spp';

	public function ambildata()
	{
		return $this->db->get($this->tabel);
	}

	public function ambil($where)
	{
    $this->db->where($this->id, $where);
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
