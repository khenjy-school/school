<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CRUD');

        if($this->session->userdata('level')!='member'){
			redirect('Login/index');
		}
    }

    public function index(){
        $data['row_p'] = $this->CRUD->data2('produk')->num_rows();
		$data['row_trm'] = $this->CRUD->data2('transaksi_masuk')->num_rows();
		$data['row_trk'] = $this->CRUD->data2('transaksi_keluar')->num_rows();
		$data['row_u'] = $this->CRUD->data2('users')->num_rows();
		$data['set'] = $this->CRUD->settings('settings')->result();
		$this->load->view('member/partials/header',$data);		
		$this->load->view('member/partials/sidemenu');		
        $this->load->view('member/index',$data);
    }

    public function stok(){
		$row = $this->CRUD->baris('produk');

		$config['base_url'] = 'https://localhost/inventory/index.php/Member/stok/';
		$config['total_rows'] = $row;
		$config['per_page'] = 7;
		$config['full_tag_open']= '<ul class="pagination">';
		$config['full_tag_close']= '</ul>';

		$config['first_link']= 'First';
		$config['first_tag_open']= '<li class="page-item">';
		$config['first_tag_close']= '</li>';

		$config['last_link']= 'Last';
		$config['last_tag_open']= '<li class="page-item">';
		$config['last_tag_close']= '</li>';

		$config['next_link']= '&raquo';
		$config['next_tag_open']= '<li class="page-item">';
		$config['next_tag_close']= '</li>';

		$config['prev_link']= '&laquo';
		$config['prev_tag_open']= '<li class="page-item">';
		$config['prev_tag_close']= '</li>';
		
		$config['cur_tag_open']= '<li class="page-item active">';
		$config['cur_tag_close']= '</li>';

		$config['num_tag_open']= '<li class="page-item">';
		$config['num_tag_close']= '</li>';

		$config['cur_tag_open']= '<li class="page-item"><a class="page-link active" href="#">';
		$config['cur_tag_close']= '</a></li>';

		$config['attributes'] = array('class' => 'page-link');

		$data['start'] = $this->uri->segment(3);
		$data['set'] = $this->CRUD->settings('settings')->result();
		
		$this->pagination->initialize($config);

		$this->load->view('member/partials/header',$data);		
		$this->load->view('member/partials/sidemenu');		
		$data['stok'] = $this->CRUD->produk('produk',$config['per_page'],$data['start'])->result();
		$this->load->view('member/stok_barang',$data);
	}

	public function print_stok(){
		$data['stok'] = $this->CRUD->print_s("produk")->result();
		$this->load->view('member/print_stok',$data);
	}

    public function excel_stok(){
		$data['stok'] = $this->CRUD->print_s('produk')->result();

		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$objPHPExcel = new PHPExcel();

		$objPHPExcel->getProperties()->setCreator("Inventory System");
		$objPHPExcel->getProperties()->setLastModifiedBy("Inventory System");
		$objPHPExcel->getProperties()->setTitle("Laporan Stok Barang");
		$objPHPExcel->getProperties()->setSubject("");
		$objPHPExcel->getProperties()->setDescription("");

		$objPHPExcel->setActiveSheetIndex(0);

		$objPHPExcel->getActiveSheet()->setCellValue('A1','No');
		$objPHPExcel->getActiveSheet()->setCellValue('B1','ID Produk');
		$objPHPExcel->getActiveSheet()->setCellValue('C1','Nama Produk');
		$objPHPExcel->getActiveSheet()->setCellValue('D1','Kategori');
		$objPHPExcel->getActiveSheet()->setCellValue('E1','Merek');
		$objPHPExcel->getActiveSheet()->setCellValue('F1','Stok');

		$baris=2;
		$x=1;

		foreach ($data['stok'] as $data){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$baris, $x);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$baris, $data->id_p);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$baris, $data->nama_produk);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$baris, $data->kategori);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$baris, $data->merek);
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$baris, $data->stok);

			$x++;
			$baris++;
		}
		$filename="Laporan-Stok-Barang".date("d-m-Y-H-i-s").'.xlsx';

		$objPHPExcel->getActiveSheet()->setTitle("Laporan Stok Barang");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');

		$writer=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
		$writer->save('php://output');

		exit;
	}

    public function lp_m(){
		$row = $this->CRUD->baris('transaksi_masuk');

		$config['base_url'] = 'https://localhost/inventory/index.php/Member/tr_m/';
		$config['total_rows'] = $row;
		$config['per_page'] = 7;
		$config['full_tag_open']= '<ul class="pagination">';
		$config['full_tag_close']= '</ul>';

		$config['first_link']= 'First';
		$config['first_tag_open']= '<li class="page-item">';
		$config['first_tag_close']= '</li>';

		$config['last_link']= 'Last';
		$config['last_tag_open']= '<li class="page-item">';
		$config['last_tag_close']= '</li>';

		$config['next_link']= '&raquo';
		$config['next_tag_open']= '<li class="page-item">';
		$config['next_tag_close']= '</li>';

		$config['prev_link']= '&laquo';
		$config['prev_tag_open']= '<li class="page-item">';
		$config['prev_tag_close']= '</li>';
		
		$config['cur_tag_open']= '<li class="page-item active">';
		$config['cur_tag_close']= '</li>';

		$config['num_tag_open']= '<li class="page-item">';
		$config['num_tag_close']= '</li>';

		$config['cur_tag_open']= '<li class="page-item"><a class="page-link active" href="#">';
		$config['cur_tag_close']= '</a></li>';

		$config['attributes'] = array('class' => 'page-link');

		$data['start'] = $this->uri->segment(3);
		$data['set'] = $this->CRUD->settings('settings')->result();

		$this->load->view('member/partials/header',$data);		
		$this->load->view('member/partials/sidemenu');		
		$this->pagination->initialize($config);
		$data['trm'] = $this->CRUD->trm('transaksi_masuk',$config['per_page'],$data['start'])->result();
        $this->load->view('member/laporan_masuk',$data);
    }

	public function print_laporan_m(){
		$data['lp_m'] = $this->CRUD->print_m("transaksi_masuk")->result();
		$this->load->view('member/print_laporan_m',$data);
	}

	public function excel_laporan_m(){
		$data['lp_m'] = $this->CRUD->print_m('transaksi_masuk')->result();

		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$objPHPExcel = new PHPExcel();

		$objPHPExcel->getProperties()->setCreator("Inventory System");
		$objPHPExcel->getProperties()->setLastModifiedBy("Inventory System");
		$objPHPExcel->getProperties()->setTitle("Laporan Masuk");
		$objPHPExcel->getProperties()->setSubject("");
		$objPHPExcel->getProperties()->setDescription("");

		$objPHPExcel->setActiveSheetIndex(0);

		$objPHPExcel->getActiveSheet()->setCellValue('A1','No');
		$objPHPExcel->getActiveSheet()->setCellValue('B1','ID Produk');
		$objPHPExcel->getActiveSheet()->setCellValue('C1','Nama Produk');
		$objPHPExcel->getActiveSheet()->setCellValue('D1','Tanggal');
		$objPHPExcel->getActiveSheet()->setCellValue('E1','Jumlah Barang');
		$objPHPExcel->getActiveSheet()->setCellValue('F1','Keterangan');

		$baris=2;
		$x=1;

		foreach ($data['lp_m'] as $data){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$baris, $x);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$baris, $data->id_p);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$baris, $data->nama_produk);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$baris, $data->tanggal);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$baris, $data->jumlah_barang);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$baris, $data->keterangan);

			$x++;
			$baris++;
		}
		$filename="Laporan-Masuk".date("d-m-Y-H-i-s").'.xlsx';

		$objPHPExcel->getActiveSheet()->setTitle("Laporan Masuk");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');

		$writer=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
		$writer->save('php://output');

		exit;
	}

    public function lp_k(){
		$row = $this->CRUD->baris('transaksi_keluar');

		$config['base_url'] = 'https://localhost/inventory/index.php/Member/tr_k/';
		$config['total_rows'] = $row;
		$config['per_page'] = 7;
		$config['full_tag_open']= '<ul class="pagination">';
		$config['full_tag_close']= '</ul>';

		$config['first_link']= 'First';
		$config['first_tag_open']= '<li class="page-item">';
		$config['first_tag_close']= '</li>';

		$config['last_link']= 'Last';
		$config['last_tag_open']= '<li class="page-item">';
		$config['last_tag_close']= '</li>';

		$config['next_link']= '&raquo';
		$config['next_tag_open']= '<li class="page-item">';
		$config['next_tag_close']= '</li>';

		$config['prev_link']= '&laquo';
		$config['prev_tag_open']= '<li class="page-item">';
		$config['prev_tag_close']= '</li>';
		
		$config['cur_tag_open']= '<li class="page-item active">';
		$config['cur_tag_close']= '</li>';

		$config['num_tag_open']= '<li class="page-item">';
		$config['num_tag_close']= '</li>';

		$config['cur_tag_open']= '<li class="page-item"><a class="page-link active" href="#">';
		$config['cur_tag_close']= '</a></li>';

		$config['attributes'] = array('class' => 'page-link');

		$data['start'] = $this->uri->segment(3);
		$data['set'] = $this->CRUD->settings('settings')->result();
		
		$this->pagination->initialize($config);

		$this->load->view('member/partials/header',$data);		
		$this->load->view('member/partials/sidemenu');		
        $data['trk'] = $this->CRUD->trk('transaksi_keluar',$config['per_page'],$data['start'])->result();
        $this->load->view('member/laporan_keluar',$data);
    }

	public function excel_laporan_k(){
		$data['lp_k'] = $this->CRUD->print_k('transaksi_keluar')->result();

		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$objPHPExcel = new PHPExcel();

		$objPHPExcel->getProperties()->setCreator("Inventory System");
		$objPHPExcel->getProperties()->setLastModifiedBy("Inventory System");
		$objPHPExcel->getProperties()->setTitle("Laporan Keluar");
		$objPHPExcel->getProperties()->setSubject("");
		$objPHPExcel->getProperties()->setDescription("");

		$objPHPExcel->setActiveSheetIndex(0);

		$objPHPExcel->getActiveSheet()->setCellValue('A1','No');
		$objPHPExcel->getActiveSheet()->setCellValue('B1','ID Produk');
		$objPHPExcel->getActiveSheet()->setCellValue('C1','Nama Produk');
		$objPHPExcel->getActiveSheet()->setCellValue('D1','Tanggal');
		$objPHPExcel->getActiveSheet()->setCellValue('E1','Jumlah Barang');
		$objPHPExcel->getActiveSheet()->setCellValue('F1','Keterangan');

		$baris=2;
		$x=1;

		foreach ($data['lp_k'] as $data){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$baris, $x);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$baris, $data->id_p);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$baris, $data->nama_produk);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$baris, $data->tanggal);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$baris, $data->jumlah_barang);
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$baris, $data->keterangan);

			$x++;
			$baris++;
		}
		$filename="Laporan-Keluar".date("d-m-Y-H-i-s").'.xlsx';

		$objPHPExcel->getActiveSheet()->setTitle("Laporan Keluar");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');

		$writer=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
		$writer->save('php://output');

		exit;
	}

	public function print_laporan_k(){
		$data['lp_k'] = $this->CRUD->print_k("transaksi_keluar")->result();
		$this->load->view('member/print_laporan_k',$data);
	}
}