<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<article>        
  <div class="col-9" id="latar">
    <div class="vw-title"><?php echo $item['title']; ?></div>
    <div class="detil hijau"><i class="fa fa-calendar-alt"></i> <?php echo date('d-m-Y', strtotime($item['timestamp']));?> | <i class="fa fa-tags"></i> <?php echo $item['category']; ?>
    </div>
    <div class="ktk1">
        <div class="bingkai">
            <div class="agenda-cont">
                <div class="tgl-ats"><?php echo date('d', strtotime($item['mulai']));?></div>
                <div class="tgl-bwh"><?php echo date('M', strtotime($item['mulai']));?></div>
            </div>
            <div class="ktk-sb">
                <div class="ag-title"><i class="fa fa-calendar-alt"></i> <?php echo date('d-m-Y', strtotime($item['mulai']));?> s.d <?php echo date('d-m-Y', strtotime($item['selesai']));?></div>
                <div class="narasi"><?php echo $item['tek']; ?></div>
            </div>
            <div class="tek-bawah">
                <div class="tek"> <i class="fa fa-location-arrow"></i> <?php echo $item['lokasi']; ?></div>
            </div>
        </div>
    </div>
  </div>
<article> 