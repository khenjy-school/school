<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Pengaturan_mdl extends CI_Model
{
	private $_table = 'pengaturan';

	public $id;
	public $judul;
	public $favicon;
	public $logo;
	public $alamat;
	public $email;
	public $telp;
	public $metadesc;
	public $fb;
	public $ig;

	//ambil satu data
	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id" => $id])->row();
	}

	//update data
	public function update($id, $input)
	{
		$this->db->where('id', $id);
		return $this->db->update('pengaturan', $input);
	}
}
