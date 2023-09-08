<?php
class Pengaduan extends CI_Controller
{

    public function index()
    {
        $data = array(
            'title' => "Data Pengaduan",
            'konten' => "v_pengaduan",
            'pengaduan' => $this->msy->ambil($this->session->userdata("nik"), "pengaduan")->result()
        );
        $this->load->view("dashboard", $data);
    }

    public function tambah()
    {
        $config['upload_path'] = "./assets/upload/";
        $config['allowed_types'] = "jpg|jpeg|png|gif|svg|webp";

        //panggil fungsi untuk upload
        $this->load->library('upload', $config);

        //ambil into nama dan ukuran gambar
        $gambar = $_FILES['foto']['name'];
        $ukuran = $_FILES['foto']['size'];

        if ($gambar > 0) {
            $this->upload->do_upload("foto");
        }
        $data = array(
            'id_pengaduan' => "",
            'tgl_pengaduan' => date("Y-m-d"),
            'nik' => $this->session->userdata("nik"),
            'isi_laporan' => $this->input->post("laporan"),
            'foto' => $gambar,
            'status' => "proses"
        );
        $simpan = $this->msy->simpan($data, 'pengaduan');

        if ($simpan) {
            $this->session->set_flashdata('pesan', '<span class="text-success"><i class="far fa-check-square"></i> Pengaduan berhasil dilaporkan</span>');
            $this->session->set_flashdata('pangggil', '$(".toast").toast("show")');
        } else {
            $this->session->set_flashdata('pesan', 'Pengaduan gagal dilaporkan');
            $this->session->set_flashdata('pangil', '$(".toast").toast("show")');
        }

        redirect(site_url('Masyarakat'));
    }

    public function update()
    {
        //update pengaduan set $data from pengaduan where $where

        $where = array('nik' => $this->input->post('nik'));
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('uname'),
            'password' => $this->input->post('pass'),
            'telp' => $this->input->post('telp')
        );

        $simpan = $this->msy->ubah($data, $where);

        //notifikasi
        if ($simpan) {
            $this->session->set_flashdata('pesan', '<span class="text-success"><i class="far fa-check-square"></i> Data terubah</span>');
            $this->session->set_flashdata('panggil', '$(".toast").toast("show")');
        } else {
            $this->session->set_flashdata('pesan', 'Data gagal terupdate');
            $this->session->set_flashdata('panggil', '$(".toast").toast("show")');
        }

        redirect(site_url('Pengaduan'));
    }

    public function hapus($kd)
    {
        //delete from pengaduan $where
        $where = array("id_pengaduan" => $kd);

        $hapus = $this->msy->hapus($where);

        //notifikasi
        if ($hapus) {
            $this->session->set_flashdata('pesan', '<span class="text-success"><i class="far fa-check-square"></i> Data terhapus</span>');
            $this->session->set_flashdata('panggil', '$(".toast").toast("show")');
        } else {
            $this->session->set_flashdata('pesan', 'Data gagal terhapus');
            $this->session->set_flashdata('panggil', '$(".toast").toast("show")');
        }

        redirect(site_url('Masyarakat'));
    }
}
