<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan_m extends CI_Model
{
    public function simpan_data($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function tampil_data($table)
    {
        return $this->db->get($table);
    }

    public function tampil_kondisi($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($table, $where, $data)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    public function hapus_data($table, $where)
    {
        $this->db->delete($table, $where);
    }
}
