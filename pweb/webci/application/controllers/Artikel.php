<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {
    
 public function __construct()
 {
    parent::__construct();
    $this->load->model('ArtikelMdl'); 
    $this->load->helper(array('form', 'url'));
    $this->load->library(array('session', 'form_validation'));
    $this->load->library('pagination');
 }
    
 public function index()
 {
    $config = array();
    $config["base_url"] = base_url() . "artikel/index";
    $config["total_rows"] = $this->ArtikelMdl->jmlh_artikel();
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
    $data["depan"] = $this->ArtikelMdl->dri_artikel($config["per_page"], $page);
    $data["links"] = $this->pagination->create_links();

    $data['title'] = 'Artikel';
    $data['keyword'] = '';
    $data['description'] = '';

    $this->load->view('templates/header', $data);
    $this->load->view('artikel/index', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');
 }

 public function view($id = NULL)
 {
    $data['item'] = $this->ArtikelMdl->get_artikel($id);
    if (empty($data['item']))
    {
        show_404();
    }

    $data['title'] = $data['item']['title'];
    $data['keyword'] = $data['item']['title'];
    $data['description'] = '';

    $this->load->view('templates/header', $data);
    $this->load->view('artikel/view', $data);
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
        $this->ArtikelMdl->save(); 
    }
        
    $data['title'] = 'Artikel';
    $data['keyword'] = 'Artikel';
    $data['description'] = '';

    $this->load->view('templates/header', $data);
    $this->load->view('artikel/tambah', array('error' => ' ' ));
    $this->load->view('templates/footer');
 }
    
 public function ubh($id)
 {
    $data['artikel'] = $this->ArtikelMdl->get_id($id);
    if (!$this->session->userdata('is_logged_in'))
    {
        redirect(site_url('user/login'));
    }
    else if ($this->session->userdata('level')!='1')
    { 
        if ($this->session->userdata('user_id')!=$data['artikel']->user_id)
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
            $this->ArtikelMdl->edit($id); 
            redirect('artikel/manage');
        }
    }
        
    $data['title'] = 'Ubah Artikel';
    $data['keyword'] = '';
    $data['description'] = '';

    $this->load->view('templates/header', $data);
    $this->load->view('artikel/ubah', $data);
    $this->load->view('templates/footer');        
 }
    
 public function hps($id)
 {
    $artikel = $this->ArtikelMdl->get_id($id);
    if (!$this->session->userdata('is_logged_in'))
    {
        redirect(site_url('user/login'));
    }
    else if ($this->session->userdata('level')!='1')
    { 
        if ($this->session->userdata('user_id')!=$artikel->user_id)
        { 
            $this->session->set_flashdata('msg_error',' Maaf! Akses terbatas');
            redirect('user/profil/');  
        }
    }

    $this->ArtikelMdl->delete($id); 
    $this->session->set_flashdata('msg_success',' Artikel berhasil dihapus !');
    redirect('artikel/manage');

 }

 public function manage()
 {
    if (!$this->session->userdata('is_logged_in'))
    {
        redirect(site_url('user/login'));
    }
 
    $config = array();
    $config["base_url"] = base_url() . "artikel/manage";
    $config["total_rows"] = $this->ArtikelMdl->jmlh_artikel();
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
    $data["artikel"] = $this->ArtikelMdl->dri_artikel($config["per_page"], $page);
    $data["links"] = $this->pagination->create_links();

    $data['title'] = 'Artikel';
    $data['keyword'] = '';
    $data['description'] = '';

    $this->load->view('templates/header', $data);
    $this->load->view('artikel/manage', $data);
    $this->load->view('templates/footer');
 }

}