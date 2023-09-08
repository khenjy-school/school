<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('CRUD');
		$this->load->model('Filter_Model');

		if($this->session->userdata('level')!='admin'){
			redirect('Login/index');
		}
	}
	
	public function index(){
		$data['row_p'] = $this->CRUD->data2('produk')->num_rows();
		$data['row_trm'] = $this->CRUD->data2('transaksi_masuk')->num_rows();
		$data['row_trk'] = $this->CRUD->data2('transaksi_keluar')->num_rows();
		$data['row_u'] = $this->CRUD->data2('users')->num_rows();
		$data['set'] = $this->CRUD->settings('settings')->result();
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');		
		$this->load->view('dashboard',$data);
	}

	public function menu2(){
		$data['set'] = $this->CRUD->settings('settings')->result();
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');		
		$this->load->view('data');
	}
	public function menu3(){
		$data['set'] = $this->CRUD->settings('settings')->result();
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');		
		$this->load->view('transaksi');
	}
	public function menu4(){
		$data['set'] = $this->CRUD->settings('settings')->result();
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');		
		$this->load->view('laporan');
	}

	//--------- data produk ---------//
    public function dt_p(){
		$row = $this->CRUD->baris('produk');
		
		$config['base_url'] = 'https://localhost/inventory/index.php/Controller/dt_p/';
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
        $data['produk'] = $this->CRUD->produk('produk',$config['per_page'],$data['start'])->result();
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');		
        $this->load->view('data_produk',$data);
    }
	
    public function v_input(){
		$data['set'] = $this->CRUD->settings('settings')->result();
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');		
		$this->load->view('input_data');
    }

    public function input_produk(){
		$nama = $this->input->post('nama_produk');
        $kategori = $this->input->post('kategori');
        $merek = $this->input->post('merek');
        $jumlah = $this->input->post('jumlah');
        $img = $_FILES['img']['name'];
        if($img=''){}else{
			$config['upload_path']='./img/';
			$config['allowed_types']='jpg|gif|png|jpeg';

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('img')){
				$data = array(
					'nama_produk' => $nama,
					'id_kat' => $kategori,
					'id_m' => $merek,
					'stok' => $jumlah
				);	
			}else{
				$img=$this->upload->data('file_name');
			}
            $data = array(
				'nama_produk' => $nama,
				'id_kat' => $kategori,
				'id_m' => $merek,
                'stok' => $jumlah,
				'img' => $img
			);
			
			$this->CRUD->save($data, 'produk');
			$this->session->set_flashdata('message','<div class="alert">Data Berhasil Ditambahkan<button type="button" class="close">&times;</button></div>');
			redirect('Controller/dt_p');
		}
    }

    public function edit($id){
		$where=array('id_p'=>$id);
		
		$data['set'] = $this->CRUD->settings('settings')->result();
		$data['produk']= $this->CRUD->ambil_where($where,'produk')->result();
		
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');		
		$this->load->view('edit_p',$data);
	}

    public function proses_edit(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama_produk');
        $kategori = $this->input->post('kategori');
        $merek = $this->input->post('merek');
        $jumlah = $this->input->post('jumlah');
        $img = $_FILES['img']['name'];
        if($img=''){}else{
            $config['upload_path']='./img/';
            $config['allowed_types']='jpg|gif|png|jpeg';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('img')){
                $data = array(
                    'nama_produk' => $nama,
                    'id_kat' => $kategori,
                    'id_m' => $merek,
                    'stok' => $jumlah
            );
            }else{
                $img=$this->upload->data('file_name');
				$old_image = $this->CRUD->getDataById($id);

				$path = "./img/".$old_image['img'];
				unlink($path);

                $data = array(
                    'nama_produk' => $nama,
                    'id_kat' => $kategori,
                    'id_m' => $merek,
                    'stok' => $jumlah,
                    'img' => $img
            );
            }
            
            $where = array('id_p'=>$id);
            $this->CRUD->update($where,$data,'produk');
            redirect('Controller/dt_p');            
        }
    }

	public function delete($id){
		$oldimage = $this->CRUD->getDataById($id);
		unlink('img/'.$oldimage['img']);
		if($this->CRUD->delete($id) > 0){
			$this->session->set_flashdata('status','Data berhasil dihapus');
			redirect('Controller/dt_p');
		} else {
			$this->session->set_flashdata('status','server gangguan, silahkan diulangi');
			redirect('Controller/dt_p');
		}
	}

    //--------- kategori ---------//
    public function kategori(){
        $row = $this->CRUD->baris('kategori');

		$config['base_url'] = 'https://localhost/inventory/index.php/Controller/kategori/';
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
        $data['kategori'] = $this->CRUD->data('kategori',$config['per_page'],$data['start'])->result();
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');		
        $this->load->view('kategori',$data);
    }

	public function v_input2(){
		$data['set'] = $this->CRUD->settings('settings')->result();
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');		
		$this->load->view('input_kat');
	}

	public function input_kat(){
		$kategori = $this->input->post('kategori');
		$data = array('kategori' => $kategori);

		$this->CRUD->save($data,'kategori');
		$this->session->set_flashdata('message','<div class="alert">Data Berhasil Ditambahkan<button type="button" class="close">&times;</button></div>');
		redirect('Controller/kategori');
	}

	public function edit_kat($id){
		$where=array('id_kat'=>$id);
		
		$data['set'] = $this->CRUD->settings('settings')->result();
		$data['kategori']= $this->CRUD->ambil_where($where,'kategori')->result();
		
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');		
		$this->load->view('edit_kat',$data);
	}

	public function proses_edit_kat(){
		$id = $this->input->post('id');
        $kategori = $this->input->post('kategori');
		$data = array('kategori' => $kategori);
			
		$where = array('id_kat'=>$id);
		$this->CRUD->update($where,$data,'kategori');
		redirect('Controller/kategori');			
	}

	public function delete_kat($id){
		$where=array('id_kat'=>$id);
		$this->CRUD->delete_kat('kategori', $where);
		redirect('Controller/kategori');
	}

	//--------- merek ---------//
    public function merek(){
        $row = $this->CRUD->baris('merek');

		$config['base_url'] = 'https://localhost/inventory/index.php/Controller/merek/';
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
		
		$config['cur_tag_open']= '<b>';
		$config['cur_tag_close']= '</b>';

		$config['num_tag_open']= '<li class="page-item">';
		$config['num_tag_close']= '</li>';

		$config['cur_tag_open']= '<li class="page-item"><a class="page-link active" href="#">';
		$config['cur_tag_close']= '</a></li>';

		$config['attributes'] = array('class' => 'page-link');

		$data['start'] = $this->uri->segment(3);
		$data['set'] = $this->CRUD->settings('settings')->result();
		
		$this->pagination->initialize($config);
        $data['merek'] = $this->CRUD->data('merek',$config['per_page'],$data['start'])->result();
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');		
        $this->load->view('merek',$data);
    }

	public function v_input3(){
		$data['set'] = $this->CRUD->settings('settings')->result();
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');		
		$this->load->view('input_merek');
	}

	public function input_merek(){
		$merek = $this->input->post('merek');
		$data = array('merek' => $merek);

		$this->CRUD->save($data,'merek');
		$this->session->set_flashdata('message','<div class="alert">Data Berhasil Ditambahkan<button type="button" class="close">&times;</button></div>');
		redirect('Controller/merek');
	}

	public function edit_merek($id){
		$where=array('id_m'=>$id);
		
		$data['set'] = $this->CRUD->settings('settings')->result();
		$data['merek']= $this->CRUD->ambil_where($where,'merek')->result();
		
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');		
		$this->load->view('edit_merek',$data);
	}

	public function proses_edit_merek(){
		$id = $this->input->post('id');
        $merek = $this->input->post('merek');
		$data = array('merek' => $merek);
			
		$where = array('id_m'=>$id);
		$this->CRUD->update($where,$data,'merek');
		redirect('Controller/merek');
	}

	public function delete_merek($id){
		$where=array('id_m'=>$id);
		$this->CRUD->delete_kat('merek', $where);
		redirect('Controller/merek');
	}

	//--------- transaksi masuk ---------//
    public function tr_m(){
		$row = $this->CRUD->baris('transaksi_masuk');

		$config['base_url'] = 'https://localhost/inventory/index.php/Controller/tr_m/';
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
		
		$data['trm'] = $this->CRUD->trm('transaksi_masuk',$config['per_page'],$data['start'])->result();
		$data['date'] = $this->CRUD->gettahun();
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');		
        $this->load->view('transaksi_masuk',$data);
    }

	public function main(){
        $data['date'] = $this->CRUD->gettahun();
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
            $data['datafilter'] = $this->CRUD->filterbytanggal($tanggalawal,$tanggalakhir);
            $data['join'] = $this->CRUD->join("transaksi_masuk")->result();

            $this->load->view('print_laporan', $data);  

        }elseif ($nilaifilter == 2) {

            $data['head'] = "Laporan Masuk";
            $data['title'] = "Laporan Penjualan By Bulan";
            $data['subtitle'] = "Dari Bulan :".$bulanawal.'Sampai Bulan :'.$bulanakhir.'Tahun :'.$tahun1;
            $data['datafilter'] = $this->CRUD->filterbybulan($tahun1,$bulanawal,$bulanakhir);
            $data['join'] = $this->CRUD->join("transaksi_masuk")->result();

            $this->load->view('print_laporan', $data);  

        }elseif ($nilaifilter == 3) {

            $data['head'] = "Laporan Masuk";
            $data['title'] = "Laporan Penjualan By Tahun";
            $data['subtitle'] = 'Tahun :'.$tahun2;
            $data['datafilter'] = $this->CRUD->filterbytahun($tahun2);
            $data['join'] = $this->CRUD->join("transaksi_masuk")->result();

            $this->load->view('print_laporan', $data);  
        }
    }

	public function v_input4(){
		$data['set'] = $this->CRUD->settings('settings')->result();
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');		
		$this->load->view('input_transaksi_m');
	}	

	public function input_trm(){
		$produk = $this->input->post('produk');
		$tanggal = $this->input->post('tanggal');
		$qty = $this->input->post('jumlah');
		$ket = $this->input->post('ket');
		$data = array(
			'id_p'=>$produk,
			'tanggal'=>$tanggal,
			'jumlah_barang'=>$qty,
			'keterangan'=>$ket
		);

		$this->CRUD->save($data,'transaksi_masuk');
		$this->session->set_flashdata('message','<div class="alert">Data Berhasil Ditambahkan<button type="button" class="close">&times;</button></div>');
		redirect('Controller/tr_m');
	}

	public function edit_trm($id){
		$where=array('id'=>$id);
		
		$data['set'] = $this->CRUD->settings('settings')->result();
		$data['trm']= $this->CRUD->ambil_where($where,'transaksi_masuk')->result();
		
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');		
		$this->load->view('edit_trm',$data);
	}

	public function proses_edit_trm(){
		$id = $this->input->post('id');
        $nama = $this->input->post('produk');
        $tanggal = $this->input->post('tanggal');
        $qty = $this->input->post('jumlah');
        $ket = $this->input->post('ket');
		$data = array(
			'id_p' => $nama,
			'tanggal' => $tanggal,
			'jumlah_barang' => $qty,
			'keterangan' => $ket
		);
			
		$where = array('id'=>$id);
		$this->CRUD->update($where,$data,'transaksi_masuk');
		redirect('Controller/tr_m');
	}	

	public function delete_trm($id){
		$where=array('id'=>$id);
		$this->CRUD->delete_kat('transaksi_masuk', $where);
		redirect('Controller/tr_m');
	}
	
	//--------- transaksi keluar ---------//
    public function tr_k(){
		$row = $this->CRUD->baris('transaksi_keluar');

		$config['base_url'] = 'https://localhost/inventory/index.php/Controller/tr_k/';
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
		
		$data['trk'] = $this->CRUD->trk('transaksi_keluar',$config['per_page'],$data['start'])->result();
		$data['date2'] = $this->CRUD->gettahun2();
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');		
        $this->load->view('transaksi_keluar',$data);
    }

	public function main2(){
        $data['set'] = $this->CRUD->settings('settings')->result();
        $data['date2'] = $this->Filter_Model->gettahun2();
        $this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');		
        $this->load->view('transaksi_keluar',$data);
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

            $data['head'] = "Laporan Keluar";
            $data['title'] = "Laporan Penjualan By Tanggal";
            $data['subtitle'] = "Dari Tanggal :".$tanggalawal.'Sampai Tanggal :'.$tanggalakhir;
            $data['datafilter'] = $this->CRUD->filterbytanggal2($tanggalawal,$tanggalakhir);
            $data['join'] = $this->CRUD->join2("transaksi_keluar")->result();

            $this->load->view('print_laporan', $data);  

        }elseif ($nilaifilter == 2) {

			$data['head'] = "Laporan Masuk";
            $data['title'] = "Laporan Penjualan By Bulan";
            $data['subtitle'] = "Dari Bulan :".$bulanawal.'Sampai Bulan :'.$bulanakhir.'Tahun :'.$tahun1;
            $data['datafilter'] = $this->CRUD->filterbybulan($tahun1,$bulanawal,$bulanakhir);
            $data['join'] = $this->CRUD->join("transaksi_masuk")->result();

            $this->load->view('print_laporan', $data);  

        }elseif ($nilaifilter == 3) {

            $data['head'] = "Laporan Keluar";
            $data['title'] = "Laporan Penjualan By Tahun";
            $data['subtitle'] = 'Tahun :'.$tahun2;
            $data['datafilter'] = $this->CRUD->filterbytahun($tahun2);
            $data['join'] = $this->CRUD->join2("transaksi_keluar")->result();

            $this->load->view('print_laporan', $data);  

        }
    }

	public function v_input5(){
		$data['set'] = $this->CRUD->settings('settings')->result();
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');		
		$this->load->view('input_transaksi_k');
	}

	public function input_trk(){
		$produk = $this->input->post('produk');
		$tanggal = $this->input->post('tanggal');
		$qty = $this->input->post('jumlah');
		$ket = $this->input->post('ket');
		$data = array(
			'id_p'=>$produk,
			'tanggal'=>$tanggal,
			'jumlah_barang'=>$qty,
			'keterangan' =>$ket
		);

		$this->CRUD->save($data,'transaksi_keluar');
		$this->session->set_flashdata('message','<div class="alert">Data Berhasil Ditambahkan<button type="button" class="close">&times;</button></div>');
		redirect('Controller/tr_k');
	}

	public function edit_trk($id){
		$where=array('id'=>$id);
		
		$data['set'] = $this->CRUD->settings('settings')->result();
		$data['trk']= $this->CRUD->ambil_where($where,'transaksi_keluar')->result();
		
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');		
		$this->load->view('edit_trk',$data);
	}

	public function proses_edit_trk(){
		$id = $this->input->post('id');
        $nama = $this->input->post('produk');
        $tanggal = $this->input->post('tanggal');
        $qty = $this->input->post('jumlah');
        $ket = $this->input->post('ket');
		$data = array(
			'id_p' => $nama,
			'tanggal' => $tanggal,
			'jumlah_barang' => $qty,
			'keterangan' =>$ket
		);
			
		$where = array('id'=>$id);
		$this->CRUD->update($where,$data,'transaksi_keluar');
		redirect('Controller/tr_k');
	}

	public function delete_trk($id){
		$where=array('id'=>$id);
		$this->CRUD->delete_kat('transaksi_keluar', $where);
		redirect('Controller/tr_k');
	}

	//--------- Stok ---------//
	public function stok(){
		$row = $this->CRUD->baris('produk');

		$config['base_url'] = 'https://localhost/inventory/index.php/Controller/stok/';
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
		
		$data['stok'] = $this->CRUD->produk('produk',$config['per_page'],$data['start'])->result();
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');	
		$this->load->view('stok_barang',$data);
	}

	public function print_stok(){
		$data['stok'] = $this->CRUD->print_s("produk")->result();
		$this->load->view('print_stok',$data);
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

	//--------- laporan masuk ---------//
    public function lp_m(){
		$row = $this->CRUD->baris('transaksi_masuk');

		$config['base_url'] = 'https://localhost/inventory/index.php/Controller/tr_m/';
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
		$data['trm'] = $this->CRUD->trm('transaksi_masuk',$config['per_page'],$data['start'])->result();
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');	
        $this->load->view('laporan_masuk',$data);
    }

	public function print_laporan_m(){
		$data['lp_m'] = $this->CRUD->print_m("transaksi_masuk")->result();
		$this->load->view('print_laporan_m',$data);
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

		$baris=2;
		$x=1;

		foreach ($data['lp_m'] as $data){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$baris, $x);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$baris, $data->id_p);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$baris, $data->nama_produk);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$baris, $data->tanggal);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$baris, $data->jumlah_barang);

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

	//--------- laporan keluar ---------//
    public function lp_k(){
		$row = $this->CRUD->baris('transaksi_keluar');

		$config['base_url'] = 'https://localhost/inventory/index.php/Controller/tr_k/';
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
        $data['trk'] = $this->CRUD->trk('transaksi_keluar',$config['per_page'],$data['start'])->result();
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');	
        $this->load->view('laporan_keluar',$data);
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

		$baris=2;
		$x=1;

		foreach ($data['lp_k'] as $data){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$baris, $x);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$baris, $data->id_p);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$baris, $data->nama_produk);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$baris, $data->tanggal);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$baris, $data->jumlah_barang);

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
		$this->load->view('print_laporan_k',$data);
	}

	//--------- Pengguna ---------//
    public function users(){
		$row = $this->CRUD->baris('users');

		$config['base_url'] = 'https://localhost/inventory/index.php/Controller/users/';
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
        $data['pengguna'] = $this->CRUD->data_u('users',$config['per_page'],$data['start'])->result();
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');	
        $this->load->view('pengguna',$data);
    }

	public function v_input6(){
		$data['set'] = $this->CRUD->settings('settings')->result();
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');	
		$this->load->view('input_pengguna');
	}

	public function input_u(){
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$level = $this->input->post('level');
		$img = $_FILES['img']['name'];
        if($img=''){}else{
			$config['upload_path']='./img/user/';
			$config['allowed_types']='jpg|gif|png|jpeg';

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('img')){
				$data = array(
					'nama' => $nama,
					'username' => $username,
					'alamat' => $alamat,
					'no_telp' => $telp,
					'password' => md5($password),
					'level' => $level
				);	
			}
			else{ $img=$this->upload->data('file_name');
				$data = array(
					'nama'=>$nama,
					'username'=>$username,
					'alamat' => $alamat,
					'no_telp' => $telp,
					'password'=>md5($password),
					'level'=>$level,
					'img'=>$img
				);
			}

		$this->CRUD->save($data,'users');
		$this->session->set_flashdata('message','<div class="alert">Data Berhasil Ditambahkan<button type="button" class="close">&times;</button></div>');
		redirect('Controller/users');
	}
	}

	public function edit_u($id){
		$where=array('id'=>$id);
		$data['set'] = $this->CRUD->settings('settings')->result();
		
		$data['user']= $this->CRUD->ambil_where($where,'users')->result();
		
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');	
		$this->load->view('edit_pengguna',$data);
	}

	public function proses_edit_user(){
		$id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
        $password = $this->input->post('password');
		$img = $_FILES['img']['name'];
        if($img=''){}else{
            $config['upload_path']='./img/user/';
            $config['allowed_types']='jpg|gif|png|jpeg';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('img')){
                $data = array(
                    'nama' => $nama,
					'username' => $username,
					'alamat' => $alamat,
					'no_telp' => $telp,
					'password' => md5($password)
            );
            }else{
                $img=$this->upload->data('file_name');
				$old_image = $this->CRUD->getDataById2($id);

				$path = "./img/user/".$old_image['img'];
				unlink($path);

                $data = array(
                    'nama' => $nama,
					'username' => $username,
					'alamat' => $alamat,
					'no_telp' => $telp,
					'password' => md5($password),
                    'img' => $img
            );
            }
			
		$where = array('id'=>$id);
		$this->CRUD->update($where,$data,'users');
		redirect('Controller/users');
	}}

	public function delete_u($id){
		$oldimage = $this->CRUD->getDataById2($id);
		unlink('img/user/'.$oldimage['img']);
		if($this->CRUD->delete2($id) > 0){
			$this->session->set_flashdata('status','Data berhasil dihapus');
			redirect('Controller/users');
		} else {
			$this->session->set_flashdata('status','server gangguan, silahkan diulangi');
			redirect('Controller/users');
		}
	}

	public function settings(){
		$data['set'] = $this->CRUD->settings('settings')->result();
		$this->load->view('partials/header',$data);	
		$this->load->view('partials/sidemenu');	
		$this->load->view('settings',$data);
	}

	public function edit3($id){
		$where=array('id'=>$id);
		
		$data['set'] = $this->CRUD->settings('settings')->result();
		$data['set']= $this->CRUD->ambil_where($where,'settings')->result();
		
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');		
		$this->load->view('edit_set',$data);
	}

	public function edit_settings(){
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $desc = $this->input->post('desc');
        $img = $_FILES['img']['name'];
        if($img=''){}else{
            $config['upload_path']='./img/favicon/';
            $config['allowed_types']='jpg|gif|png|jpeg|ico';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('img')){
                $data = array(
                    'judul' => $judul,
                    'description' => $desc
            );
            }else{
                $img=$this->upload->data('file_name');
				$old_image = $this->CRUD->getDataById3($id);

				$path = "./img/favicon/".$old_image['img'];
				unlink($path);

                $data = array(
                    'judul' => $judul,
                    'description' => $desc,
                    'favicon' => $img
            );
            }
            
            $where = array('id'=>$id);
            $this->CRUD->update($where,$data,'settings');
            redirect('Controller/settings');            
        }
    }
	
	public function show($id){
		$where=array('id'=>$id);
		$data['set'] = $this->CRUD->settings('settings')->result();
		
		$data['user']= $this->CRUD->ambil_where($where,'users')->result();
		
		$this->load->view('partials/header',$data);		
		$this->load->view('partials/sidemenu');	
		$this->load->view('show_profile',$data);
	}
}