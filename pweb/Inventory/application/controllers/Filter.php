<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Filter extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Filter_Model');
        $this->load->model('CRUD');
    }

    public function main(){
        $data['set'] = $this->CRUD->settings('settings')->result();
        $data['date'] = $this->Filter_Model->gettahun();
        $data['date2'] = $this->Filter_Model->gettahun2();
        $this->load->view('member/partials/header',$data);		
		$this->load->view('member/partials/sidemenu');		
        $this->load->view('member/filter',$data);
    }

    public function filter(){
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $tahun2 = $this->input->post('tahun2');
        $nilaifilter = $this->input->post('nilaifilter');

        if ($nilaifilter == 1) {

            $data['head'] = "Laporan Masuk";
            $data['title'] = "Laporan Penjualan By Tanggal";
            $data['subtitle'] = "Dari Tanggal :".$tanggalawal.'Sampai Tanggal :'.$tanggalakhir;
            $data['datafilter'] = $this->Filter_Model->filterbytanggal($tanggalawal,$tanggalakhir);
            $data['join'] = $this->Filter_Model->join("transaksi_masuk")->result();

            $this->load->view('print_laporan', $data);  

        }elseif ($nilaifilter == 2) {

            $data['head'] = "Laporan Masuk";
            $data['title'] = "Laporan Penjualan By Bulan";
            $data['subtitle'] = "Dari Bulan :".$bulanawal.'Sampai Bulan :'.$bulanakhir.'Tahun :'.$tahun1;
            $data['datafilter'] = $this->Filter_Model->filterbybulan($tahun1,$bulanawal,$bulanakhir);
            $data['join'] = $this->Filter_Model->join("transaksi_masuk")->result();

            $this->load->view('print_laporan', $data);  

        }elseif ($nilaifilter == 3) {

            $data['head'] = "Laporan Masuk";
            $data['title'] = "Laporan Penjualan By Tahun";
            $data['subtitle'] = 'Tahun :'.$tahun2;
            $data['datafilter'] = $this->Filter_Model->filterbytahun($tahun2);
            $data['join'] = $this->Filter_Model->join("transaksi_masuk")->result();

            $this->load->view('print_laporan', $data);  

        }
    }

    public function main2(){
        $data['set'] = $this->CRUD->settings('settings')->result();
        $data['date2'] = $this->Filter_Model->gettahun();
        $this->load->view('member/partials/header',$data);		
		$this->load->view('member/partials/sidemenu');		
        $this->load->view('member/filter',$data);
    }
    public function filter2(){
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $tahun2 = $this->input->post('tahun2');
        $nilaifilter = $this->input->post('nilaifilter');

        if ($nilaifilter == 1) {

            $data['head'] = "Laporan Masuk";
            $data['title'] = "Laporan Penjualan By Tanggal";
            $data['subtitle'] = "Dari Tanggal :".$tanggalawal.'Sampai Tanggal :'.$tanggalakhir;
            $data['datafilter'] = $this->Filter_Model->filterbytanggal2($tanggalawal,$tanggalakhir);
            $data['join'] = $this->Filter_Model->join2("transaksi_keluar")->result();

            $this->load->view('print_laporan', $data);  

        }elseif ($nilaifilter == 2) {

            $data['head'] = "Laporan Masuk";
            $data['title'] = "Laporan Penjualan By Bulan";
            $data['subtitle'] = "Dari Bulan :".$bulanawal.'Sampai Bulan :'.$bulanakhir.'Tahun :'.$tahun1;
            $data['datafilter'] = $this->Filter_Model->filterbybulan2($tahun1,$bulanawal,$bulanakhir);
            $data['join'] = $this->Filter_Model->join2("transaksi_keluar")->result();

            $this->load->view('print_laporan', $data);  

        }elseif ($nilaifilter == 3) {

            $data['head'] = "Laporan Masuk";
            $data['title'] = "Laporan Penjualan By Tahun";
            $data['subtitle'] = 'Tahun :'.$tahun2;
            $data['datafilter'] = $this->Filter_Model->filterbytahun($tahun2);
            $data['join'] = $this->Filter_Model->join("transaksi_masuk")->result();

            $this->load->view('print_laporan', $data);  

        }
    }
}