<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<article>        
  <div class="col-9" id="latar">
    <div class="vw-title"><?php echo $item['title']; ?></div>
    <div class="detil hijau"><i class="fa fa-calendar-alt"></i> <?php echo date('d-m-Y', strtotime($item['timestamp']));?> | <i class="fa fa-tags"></i> <?php echo $item['category']; ?> | <i class="fa fa-user"></i> by <?php echo $item['fullname']; ?>
    </div>
    <p><img src="<?php echo base_url('file/images/artikel/'.$item['image_path']);?>" alt="" class="res-lbr"></p>
    <div class="narasi"><?php echo $item['tek']; ?>
    </div>
  </div>
<article>