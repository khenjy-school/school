<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<article>      

<div class="col-9" id="latar">          
  <div class="slide-con side_ats">
    <div class="caption-slide-con">
      <p id="caption"></p>
    </div>
    <?php $i = 1; $slider = $this->db->query("SELECT * FROM berita ORDER BY RAND() LIMIT 6;"); ?>
    <?php foreach ($slider->result_array() as $news_slider): ?>
    <div class="mySlides">
      <img src="<?php echo base_url('file/images/berita/'.$news_slider['image_path']);?>" style="width:100%">
    </div>
    <?php endforeach; ?>
      
    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>

    <div class="row">
      <?php foreach ($slider->result_array() as $news_slider): ?>
      <div class="column">
        <img class="demo cursor" src="<?php echo base_url('file/images/berita/thumb/'.$news_slider['image_path']);?>" style="width:100%" onclick="currentSlide(<?php  echo $i++; ?>)" alt="<?php echo $news_slider['title'];?>">
      </div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="clear"></div>
  <br>

  <div class="vw-title">Berita Terbaru</div>
  <?php $berita = $this->db->query("SELECT berita.*, user.fullname FROM berita LEFT JOIN user ON berita.user_id = user.id ORDER BY id desc LIMIT 2;"); ?>           
  <?php foreach ($berita->result_array() as $brt): ?> 
  <div class="ktk2 kiri">
    <div class="bingkai">
      <a href="<?php echo site_url('berita/'.$brt['id'].'/'.url_title($brt['title'],'dash', true).'/'); ?>">
      <div class="gambar" style="display:block;height:150px;width:150px; background:url(<?php echo base_url('file/images/berita/thumb/'.$brt['image_path']);?>);background-size: 150px 150px;"></div>
      </a>
      <div class="ktk-kanan">
        <a href="<?php echo site_url('berita/'.$brt['id'].'/'.url_title($brt['title'],'dash', true).'/'); ?>">
        <div class="judul" style="min-height: 34px"><?php echo substr($brt['title'], 0, 35); ?></div>
        </a>
        <div class="detil"><i class="fas fa-calendar-alt"></i> <?php echo date('d-m-Y', strtotime($brt['timestamp']));?> | <i class="fas fa-user"></i> by <?php echo $brt['fullname']; ?></div>
        <div class="tek-kecil"><?php echo substr($brt['tek'], 0, 149); ?></div>
      </div>
      <div class="tek-bawah">
        <div class="tek"> <i class="fas fa-folder-open"></i> <?php echo $brt['category']; ?></div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
  <div class="clear"></div>

  <div class="vw-title">Artikel Terbaru</div>
  <?php $artikel = $this->db->query("SELECT artikel.*, user.fullname FROM artikel LEFT JOIN user ON artikel.user_id = user.id ORDER BY id desc LIMIT 2;"); ?>           
  <?php foreach ($artikel->result_array() as $art): ?> 
  <div class="ktk2 kiri">
    <div class="bingkai">
      <a href="<?php echo site_url('artikel/'.$art['id'].'/'.url_title($art['title'],'dash', true).'/'); ?>">
      <div class="gambar" style="display:block;height:150px;width:150px; background:url(<?php echo base_url('file/images/artikel/thumb/'.$art['image_path']);?>);background-size: 150px 150px;"></div>
      </a>
      <div class="ktk-kanan">
        <a href="<?php echo site_url('artikel/'.$art['id'].'/'.url_title($art['title'],'dash', true).'/'); ?>">
        <div class="judul" style="min-height: 34px"><?php echo substr($art['title'], 0, 35); ?></div>
        </a>
        <div class="detil"><i class="fas fa-calendar-alt"></i> <?php echo date('d-m-Y', strtotime($art['timestamp']));?> | <i class="fas fa-user"></i> by <?php echo $art['fullname']; ?></div>
        <div class="tek-kecil"><?php echo substr($art['tek'], 0, 149); ?></div>
      </div>
      <div class="tek-bawah">
        <div class="tek"> <i class="fas fa-folder-open"></i> <?php echo $art['category']; ?></div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
  <div class="clear"></div>

  <div class="vw-title">Download file</div>
  <?php $download = $this->db->query("SELECT download.*, user.fullname FROM download LEFT JOIN user ON download.user_id = user.id ORDER BY id desc LIMIT 2;"); ?>           
  <?php foreach ($download->result_array() as $dnd): ?>                
  <div class="ktk2 kiri">
    <div class="bingkai">
      <div class="down">
        <div class="ats"><?php echo substr($dnd['ext'], 1, 5); ?></div>
        <div class="bwh"><?php echo $dnd['type']; ?></div>
      </div>
      <div class="ktk-kanan">
        <a href="<?php echo site_url('download/'.$dnd['id'].'/'.url_title($dnd['title'],'dash', true).'/'); ?>">
        <div class="judul" style="min-height: 34px"><?php echo substr($dnd['title'], 0, 38); ?></div>
        </a>
        <div class="detil"><i class="fas fa-calendar-alt"></i> <?php echo date('d-m-Y', strtotime($dnd['timestamp']));?> | <i class="fas fa-user"></i> by <?php echo $dnd['fullname']; ?></div>
        <div class="tek-kecil"><?php echo substr($dnd['tek'], 0, 149); ?></div>
      </div>
      <div class="tek-bawah">
        <div class="tek"> <i class="fas fa-folder-open"></i> <?php echo $dnd['category']; ?></div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
  <div class="clear"></div>

  <div class="vw-title">Agenda Kegiatan</div>
  <?php $agenda = $this->db->query("SELECT agenda.*, user.fullname FROM agenda LEFT JOIN user ON agenda.user_id = user.id ORDER BY id desc LIMIT 2;"); ?>           
  <?php foreach ($agenda->result_array() as $agd): ?>  
  <div class="ktk1">
    <div class="bingkai">
      <div class="agenda-cont">
        <div class="tgl-ats"><?php echo date('d', strtotime($agd['mulai']));?></div>
        <div class="tgl-bwh"><?php echo date('M', strtotime($agd['mulai']));?></div>
      </div>
      <div class="ktk-kanan">
        <a href="<?php echo site_url('agenda/'.$agd['id'].'/'.url_title($agd['title'],'dash', true).'/'); ?>">
        <div class="judul" style="min-height: 34px"><?php echo substr($agd['title'], 0, 55); ?></div>
        </a>
        <div class="detil"><i class="fas fa-calendar-alt"></i> <?php echo date('d-m-Y', strtotime($agd['timestamp']));?> | <i class="fas fa-user"></i> by <?php echo $agd['fullname']; ?></div>
        <div class="tek-kecil"><?php echo substr($agd['tek'], 0, 475); ?></div>
      </div>
      <div class="tek-kecil merah"><i class="fas fa-calendar-alt"></i> <?php echo date('d-m-Y', strtotime($agd['mulai']));?> s.d <?php echo date('d-m-Y', strtotime($agd['selesai']));?></div>
      <div class="tek-bawah">
        <div class="tek"> <i class="fas fa-location-arrow"></i> <?php echo $agd['lokasi']; ?></div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>

<article>            
        
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" aktif", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " aktif";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>