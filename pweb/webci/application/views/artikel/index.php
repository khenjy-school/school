<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<article>        
  <div class="col-9" id="latar">
    <?php  
        if ($this->session->userdata('is_logged_in'))
        {   echo  '<a href="'.base_url("artikel/manage").'""><div class="button_utm" style="margin-right: 0px; margin-left: auto">Manage</div></a>';
        } 
    ?>
    <?php foreach ($depan as $item): ?>                
    <div class="ktk2 kiri">
        <div class="bingkai">
            <a href="<?php echo site_url('artikel/'.$item['id'].'/'.url_title($item['title'],'dash', true).'/'); ?>">
            <div class="gambar" style="display:block;height:150px;width:150px; background:url(<?php echo base_url('file/images/artikel/thumb/'.$item['image_path']);?>);background-size: 150px 150px;"></div>
            </a>
            <div class="ktk-kanan">
                <a href="<?php echo site_url('artikel/'.$item['id'].'/'.url_title($item['title'],'dash', true).'/'); ?>">
                <div class="judul" style="min-height: 34px"><?php echo substr($item['title'], 0, 38); ?></div>
                </a>
                <div class="detil"><i class="fa fa-calendar-alt"></i> <?php echo date('d-m-Y', strtotime($item['timestamp']));?> | <i class="fa fa-user"></i> by <?php echo $item['fullname']; ?></div>
                <div class="tek-kecil"><?php echo substr($item['tek'], 0, 149); ?></div>
            </div>

            <div class="tek-bawah">
                <div class="tek"> <i class="fa fa-folder-open"></i> <?php echo $item['category']; ?></div>
            </div>
            
        </div>
    </div>
    <?php endforeach; ?>
    <div class="clear"></div>
    <div class="nmr_style"><?php echo $links; ?></div> 
  </div>
<article>