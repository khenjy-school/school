<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {
    
 public function __construct()
 {
    parent::__construct();
    $this->load->model('DownloadMdl'); 
    $this->load->helper(array('form', 'url'));
    $this->load->helper('download');
    $this->load->library(array('session', 'form_validation'));
    $this->load->library('pagination');
 }
    
 public function index()
 {
    $config = array();
    $config["base_url"] = base_url() . "download/index";
    $config["total_rows"] = $this->DownloadMdl->jmlh_download();
    $config["per_page"] = 6;
    $config["uri_segment"] = 3;

    $config['full_tag_open'] = "<ul class='nmr_style'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';

    $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';

    $config['next_link'] = '<i class="fa fa-angle-right"></i>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';

    $this->pagination->initialize($config);
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data["depan"] = $this->DownloadMdl->dri_download($config["per_page"], $page);
    $data["links"] = $this->pagination->create_links();

    $data['title'] = 'Download';
    $data['keyword'] = '';
    $data['description'] = '';

    $this->load->view('templates/header', $data);
    $this->load->view('download/index', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');
 }

 public function view($id = NULL)
 {
    $data['item'] = $this->DownloadMdl->get_download($id);
    if (empty($data['item']))
    {
        show_404();
    }

    $data['title'] = $data['item']['title'];
    $data['keyword'] = $data['item']['title'];
    $data['description'] = '';

    $this->load->view('templates/header', $data);
    $this->load->view('download/view', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');
            
 }
    
 public function tbh()
 {
    if (!$this->session->userdata('is_logged_in'))
    {
    redirect(site_url('user/login'));
    } 

    $this->load->library('form_validation');
    $this->form_validation->set_rules('title', 'title', 'required|max_length[225]');
    $this->form_validation->set_rules('tek', 'tek', 'required');
        
    if(!$this->form_validation->run() == FALSE)
    { 
        $this->DownloadMdl->save(); 
    }
        
    $data['title'] = 'Download';
    $data['keyword'] = 'Download';
    $data['description'] = '';

    $this->load->view('templates/header', $data);
    $this->load->view('download/tambah', array('error' => ' ' ));
    $this->load->view('templates/footer');
 }
    
 public function ubh($id)
 {
    $data['download'] = $this->DownloadMdl->get_id($id);
    if (!$this->session->userdata('is_logged_in'))
    {
        redirect(site_url('user/login'));
    }
    else if ($this->session->userdata('level')!='1')
    { 
        if ($this->session->userdata('user_id')!=$data['download']->user_id)
        { 
            $this->session->set_flashdata('msg_error',' Maaf! Akses terbatas');
            redirect('user/profil/');  
        }
    }

    $this->load->library('form_validation');
    $this->form_validation->set_rules('title', 'title', 'required|max_length[225]');
    $this->form_validation->set_rules('tek', 'tek', 'required');

    if($this->input->post('submit'))
    { 
        if(!$this->form_validation->run() == FALSE)
        { 
            $this->DownloadMdl->edit($id); 
            redirect('download/manage');
        }
    }
        
    $data['title'] = 'Ubah Download';
    $data['keyword'] = '';
    $data['description'] = '';

    $this->load->view('templates/header', $data);
    $this->load->view('download/ubah', $data);
    $this->load->view('templates/footer');        
 }
    
 public function hps($id)
 {
    $download = $this->DownloadMdl->get_id($id);
    if (!$this->session->userdata('is_logged_in'))
    {
        redirect(site_url('user/login'));
    }
    else if ($this->session->userdata('level')!='1')
    { 
        if ($this->session->userdata('user_id')!=$download->user_id)
        { 
            $this->session->set_flashdata('msg_error',' Maaf! Akses terbatas');
            redirect('user/profil/');  
        }
    }

    $this->DownloadMdl->delete($id); 
    $this->session->set_flashdata('msg_success',' Download berhasil dihapus !');
    redirect('download/manage');

 }

 public function manage()
 {
    if (!$this->session->userdata('is_logged_in'))
    {
        redirect(site_url('user/login'));
    }
 
    $config = array();
    $config["base_url"] = base_url() . "download/manage";
    $config["total_rows"] = $this->DownloadMdl->jmlh_download();
    $config["per_page"] = 5;
    $config["uri_segment"] = 3;

    $config['full_tag_open'] = "<ul class='nmr_style'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';

    $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';

    $config['next_link'] = '<i class="fa fa-angle-right"></i>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';

    $this->pagination->initialize($config);
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data["download"] = $this->DownloadMdl->dri_download($config["per_page"], $page);
    $data["links"] = $this->pagination->create_links();

    $data['title'] = 'Download';
    $data['keyword'] = '';
    $data['description'] = '';

    $this->load->view('templates/header', $data);
    $this->load->view('download/manage', $data);
    $this->load->view('templates/footer');
 }

}