<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<article>        
  <div class="col-9" id="latar">
    <?php  
        if ($this->session->userdata('is_logged_in') && $this->session->userdata('level')==='1')
        {   echo  '<a href="'.base_url("agenda/manage").'""><div class="button_utm" style="margin-right: 0px; margin-left: auto">Manage</div></a>';
        } 
    ?>
    <?php foreach ($depan as $item): ?>                
    <div class="ktk1">
        <div class="bingkai">
            <div class="agenda-cont">
                <div class="tgl-ats"><?php echo date('d', strtotime($item['mulai']));?></div>
                <div class="tgl-bwh"><?php echo date('M', strtotime($item['mulai']));?></div>
            </div>

            <div class="ktk-kanan">
                <a href="<?php echo site_url('agenda/'.$item['id'].'/'.url_title($item['title'],'dash', true).'/'); ?>">
                <div class="judul" style="min-height: 34px"><?php echo substr($item['title'], 0, 55); ?></div>
                </a>
                <div class="detil"><i class="fa fa-calendar-alt"></i> <?php echo date('d-m-Y', strtotime($item['timestamp']));?> | <i class="fa fa-user"></i> by <?php echo $item['fullname']; ?></div>
                <div class="tek-kecil"><?php echo substr($item['tek'], 0, 475); ?></div>
            </div>

            <div class="tek-kecil merah"><i class="fa fa-calendar-alt"></i> <?php echo date('d-m-Y', strtotime($item['mulai']));?> s.d <?php echo date('d-m-Y', strtotime($item['selesai']));?></div>

            <div class="tek-bawah">
                <div class="tek"> <i class="fa fa-location-arrow"></i> <?php echo $item['lokasi']; ?></div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <div class="clear"></div>
    <div class="nmr_style"><?php echo $links; ?></div> 
  </div>
<article>            