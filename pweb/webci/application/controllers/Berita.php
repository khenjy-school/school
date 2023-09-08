<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('BeritaMdl');
    $this->load->helper(array('form', 'url'));
    $this->load->library(array('session', 'form_validation'));
    $this->load->library('pagination');
  }

  public function index()
  {
    $config = array();
    $config["base_url"] = base_url() . "berita/index";
    $config["total_rows"] = $this->BeritaMdl->jmlh_berita();
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
    $data["depan"] = $this->BeritaMdl->dri_berita($config["per_page"], $page);
    $data["links"] = $this->pagination->create_links();

    $data['title'] = 'Berita';
    $data['keyword'] = '';
    $data['description'] = '';

    $this->load->view('templates/header', $data);
    $this->load->view('berita/index', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');
  }

  public function view($id = NULL)
  {
    $data['item'] = $this->BeritaMdl->get_berita($id);
    if (empty($data['item'])) {
      show_404();
    }

    $data['title'] = $data['item']['title'];
    $data['keyword'] = $data['item']['title'];
    $data['description'] = '';

    $this->load->view('templates/header', $data);
    $this->load->view('berita/view', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');
  }

  public function tbh()
  {
    if (!$this->session->userdata('is_logged_in')) {
      redirect(site_url('user/login'));
    } else if ($this->session->userdata('level') != '1') {
      $this->session->set_flashdata('msg_error', ' Maaf! Akses terbatas');
      redirect('user/profil/');
    }

    $this->load->library('form_validation');
    $this->form_validation->set_rules('title', 'title', 'required|max_length[225]');
    $this->form_validation->set_rules('tek', 'tek', 'required');

    if (!$this->form_validation->run() == FALSE) {
      $this->BeritaMdl->save();
    }

    $data['title'] = 'Berita';
    $data['keyword'] = 'Berita';
    $data['description'] = '';

    $this->load->view('templates/header', $data);
    $this->load->view('berita/tambah', array('error' => ' '));
    $this->load->view('templates/footer');
  }

  public function ubh($id)
  {
    if (!$this->session->userdata('is_logged_in')) {
      redirect(site_url('user/login'));
    } else if ($this->session->userdata('level') != '1') {
      $this->session->set_flashdata('msg_error', ' Maaf! Akses terbatas');
      redirect('user/profil/');
    }

    $this->load->library('form_validation');
    $this->form_validation->set_rules('title', 'title', 'required|max_length[225]');
    $this->form_validation->set_rules('tek', 'tek', 'required');

    if ($this->input->post('submit')) {
      if (!$this->form_validation->run() == FALSE) {
        $this->BeritaMdl->edit($id);
        redirect('berita/manage');
      }
    }

    $data['berita'] = $this->BeritaMdl->get_id($id);
    $data['title'] = 'Ubah Berita';
    $data['keyword'] = '';
    $data['description'] = '';

    $this->load->view('templates/header', $data);
    $this->load->view('berita/ubah', $data);
    $this->load->view('templates/footer');
  }

  public function hps($id)
  {
    if (!$this->session->userdata('is_logged_in')) {
      redirect(site_url('user/login'));
    } else if ($this->session->userdata('level') != '1') {
      $this->session->set_flashdata('msg_error', ' Maaf! Akses terbatas');
      redirect('user/profil/');
    }

    $this->BeritaMdl->delete($id);
    redirect('berita/manage');
  }

  public function manage()
  {
    if (!$this->session->userdata('is_logged_in')) {
      redirect(site_url('user/login'));
    } else if ($this->session->userdata('level') != '1') {
      $this->session->set_flashdata('msg_error', ' Maaf! Akses terbatas');
      redirect('user/profil/');
    }

    $config = array();
    $config["base_url"] = base_url() . "berita/manage";
    $config["total_rows"] = $this->BeritaMdl->jmlh_berita();
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
    $data["berita"] = $this->BeritaMdl->dri_berita($config["per_page"], $page);
    $data["links"] = $this->pagination->create_links();

    $data['title'] = 'Berita';
    $data['keyword'] = '';
    $data['description'] = '';

    $this->load->view('templates/header', $data);
    $this->load->view('berita/manage', $data);
    $this->load->view('templates/footer');
  }
}
