<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir_m extends CI_Model
{
    public $tabel = "menu";

    public function simpan_data($tabel, $data)
    {
        return $this->db->insert($tabel, $data);
    }

    public function tampil_data($tabel)
    {
        return $this->db->get($tabel);
    }

    public function tampil_kondisi($tabel, $where)
    {
        return $this->db->get_where($tabel, $where);
    }

    public function update_data($tabel, $where, $data)
    {
        $this->db->where($where);
        return $this->db->update($tabel, $data);
    }

    public function hapus_data($tabel, $where)
    {
        $this->db->delete($tabel, $where);
    }
}
