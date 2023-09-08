<?php
class Filter_Model extends CI_Model{

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