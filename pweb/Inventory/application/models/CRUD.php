<?php
class CRUD extends CI_Model{
    public function data($table,$perpage,$start){
        $this->db->order_by($table,'ASC');
        return $this->db->get($table,$perpage,$start);
    }

    public function data_u($table,$perpage,$start){
        return $this->db->get($table,$perpage,$start);
    }

    public function data2($table){
        return $this->db->get($table);
    }

    public function cek_login($username,$password){
        $sql = $this->db->query("SELECT * FROM users WHERE username = '$username' AND password = md5('$password') LIMIT 1");
        return $sql;
    }

    public function getDataById($id){
        return $this->db->get_where('produk',['id_p'=>$id])->row_array();
    }
    public function getDataById3($id){
        return $this->db->get_where('settings',['id'=>$id])->row_array();
    }

    public function getDataById2($id){
        return $this->db->get_where('users',['id'=>$id])->row_array();
    }

    public function baris($table){
        return $this->db->get($table)->num_rows();
    }

    public function produk($table,$perpage,$start){
        $this->db->order_by('nama_produk','ASC');
        $this->db->join('kategori','produk.id_kat=kategori.id_kat');
        $this->db->join('merek','produk.id_m=merek.id_m');
        return $this->db->get($table,$perpage,$start);
    }

    public function trm($table,$perpage,$start){
        $this->db->order_by('tanggal','ASC');
        $this->db->join('produk','transaksi_masuk.id_p=produk.id_p');
        return $this->db->get($table,$perpage,$start);
    }

    public function print_m($table){
        $this->db->join('produk','transaksi_masuk.id_p=produk.id_p');
        return $this->db->get($table);
    }

    public function print_k($table){
        $this->db->join('produk','transaksi_keluar.id_p=produk.id_p');
        return $this->db->get($table);
    }

    public function print_s($table){
        $this->db->join('kategori','produk.id_kat=kategori.id_kat');
        $this->db->join('merek','produk.id_m=merek.id_m');
        return $this->db->get($table);
    }

    public function trk($table,$perpage,$start){
        $this->db->order_by('tanggal','ASC');
        $this->db->join('produk','transaksi_keluar.id_p=produk.id_p');
        return $this->db->get($table,$perpage,$start);
    }

    public function save($table, $data){
        $this->db->insert($data, $table);
    }

    public function ambil_where($where,$table){
        return $this->db->get_where($table,$where);
    }

    public function update($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function delete($id){
        $this->db->delete('produk',['id_p'=>$id]);
        return $this->db->affected_rows();
    }

    public function delete2($id){
        $this->db->delete('users',['id'=>$id]);
        return $this->db->affected_rows();
    }

    public function delete_kat($table,$where){
        return $this->db->delete($table,$where);
    }

    function gettahun(){
        $query = $this->db->query("SELECT YEAR(tanggal) AS tahun FROM transaksi_masuk GROUP BY YEAR(tanggal) ORDER BY YEAR(tanggal) ASC");

        return $query->result();
    }

    function filterbytanggal($tanggalawal,$tanggalakhir){
        $query = $this->db->query("SELECT * FROM transaksi_masuk where tanggal between '$tanggalawal' and '$tanggalakhir' ORDER BY tanggal ASC");

        return $query->result();
    }

    function filterbybulan($tahun1,$bulanawal,$bulanakhir){
        $query = $this->db->query("SELECT * FROM transaksi_masuk where YEAR(tanggal) = '$tahun1' and MONTH(tanggal) between '$bulanawal' and '$bulanakhir' ORDER BY tanggal ASC");

        return $query->result();
    }

    function filterbytahun($tahun2){
        $query = $this->db->query("SELECT * FROM transaksi_masuk where YEAR(tanggal) = '$tahun2' ORDER BY tanggal ASC");

        return $query->result();
    }

    function gettahun2(){
        $query = $this->db->query("SELECT YEAR(tanggal) AS tahun FROM transaksi_keluar GROUP BY YEAR(tanggal) ORDER BY YEAR(tanggal) ASC");

        return $query->result();
    }

    function filterbytanggal2($tanggalawal,$tanggalakhir){
        $query = $this->db->query("SELECT * FROM transaksi_keluar where tanggal between '$tanggalawal' and '$tanggalakhir' ORDER BY tanggal ASC");

        return $query->result();
    }

    function filterbybulan2($tahun1,$bulanawal,$bulanakhir){
        $query = $this->db->query("SELECT * FROM transaksi_keluar where YEAR(tanggal) = '$tahun1' and MONTH(tanggal) between '$bulanawal' and '$bulanakhir' ORDER BY tanggal ASC");

        return $query->result();
    }

    function filterbytahun2($tahun2){
        $query = $this->db->query("SELECT * FROM transaksi_keluar where YEAR(tanggal) = '$tahun2' ORDER BY tanggal ASC");

        return $query->result();
    }

    public function join($table){
        $this->db->join('produk','transaksi_masuk.id_p=produk.id_p');
        return $this->db->get($table);
    }

    public function join2($table){
        $this->db->join('produk','transaksi_keluar.id_p=produk.id_p');
        return $this->db->get($table);
    }

    public function settings($table){
        return $this->db->get($table);
    }
}