<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $header = $this->db->query("SELECT namaweb FROM tampilan LIMIT 1;");
$hdr = $header->result_array(); ?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="id">

<head>
  <title><?php echo $title; ?></title>
  <meta name="robots" content="index,follow" />
  <meta name="description" content="<?php echo $description; ?>" />
  <meta name="keywords" content="<?php echo $keyword; ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>file/style/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>file/font-awesome/web-fonts-with-css/css/fontawesome-all.css">
  <script src="<?php echo base_url(); ?>file/style/js/menu.js"></script>
  <script src="<?php echo base_url(); ?>file/style/js/waktu.js"></script>
</head>

<body onload="startTime()">
  <header>
    <div class="nweb"><a href="<?php echo base_url(); ?>"><?php echo $hdr[0]['namaweb']; ?></a></div>
    <div class="login"><?php if ($this->session->userdata('is_logged_in')) {
                          echo "<a href=" . site_url('user/profil') . ">Profil</a> | <a href=" . site_url('user/logout') . ">Logout</a>";
                        } else { ?> <a href="<?php echo site_url('user/daftar'); ?>"><i class="fas fa-sign-in"></i> Daftar</a> | <a href="<?php echo site_url('user/login'); ?>"><i class="fas fa-key"></i> Login</a><?php } ?></div>
  </header>

  <nav>
    <div class="nvmenu" id="nav_atas">
      <a href="<?php echo site_url(); ?>"><i class="fas fa-home"></i> Home</a>
      <a href="<?php echo site_url(); ?>berita/"><i class="fas fa-newspaper"></i> Berita</a>
      <a href="<?php echo site_url(); ?>artikel/"><i class="fas fa-pencil-alt"></i> Artikel</a>
      <a href="<?php echo site_url(); ?>user/"><i class="fas fa-user-tie"></i> Profil Pengguna</a>
      <a href="<?php echo site_url(); ?>agenda/"><i class="fas fa-calendar-check"></i> Agenda Kegiatan</a>
      <a href="<?php echo site_url(); ?>term/"><i class="fas fa-laptop"></i> Kebijakan Layanan</a>
      <a href="<?php echo site_url(); ?>privasi/"><i class="fas fa-book"></i> Kebijakan Privasi</a>
      <a href="<?php echo site_url(); ?>download/"><i class="fas fa-cloud-download-alt"></i> Download</a>
      <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="menures()">
        <i class="fas fa-bars"></i></a>
    </div>
  </nav>

  <div class="con-luar">
    <div class="tanggal">
      <table>
        <tr>
          <td><?php echo ' ' . date("l") . ', ' . date("d/m/Y"); ?></td>
          <td> : </td>
          <td>
            <div id="jam"></div>
          </td>
        </tr>
      </table>
    </div>
    <div class="row">
    