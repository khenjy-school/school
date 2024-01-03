<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pembayaran extends CI_Model
{
	private $tabel = 'pembayaran';

	public function ambildata()
	{
		return $this->db->get($this->tabel);
	}

	public function ambil($where)
	{
		$this->db->where('id_pembayaran', $where);
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
		$this->db->where('id_pembayaran', $id_pembayaran);
		$this->db->where('email', $email);
		return $this->db->get($this->tabel);
	}

	public function filter($cek_in_min, $cek_in_max, $cek_out_min, $cek_out_max)
	{
		$filter = "SELECT * FROM pembayaran WHERE 
		
		cek_in BETWEEN '" . $cek_in_min . "' AND '" . $cek_in_max . "'
		 OR 
		
		cek_out BETWEEN '" . $cek_out_min . "' AND '" . $cek_out_max . "'
		";
		return $this->db->query($filter);
	}

	public function filter_tamu($cek_in_min, $cek_in_max, $cek_out_min, $cek_out_max, $where)
	{
		$filter = "SELECT * FROM pembayaran WHERE 
		id_petugas IN ('" . $where . "') AND
		cek_in BETWEEN '" . $cek_in_min . "' AND '" . $cek_in_max . "'
		OR
		cek_out BETWEEN '" . $cek_out_min . "' AND '" . $cek_out_max . "'
		";
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
