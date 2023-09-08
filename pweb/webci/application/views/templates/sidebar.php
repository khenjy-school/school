<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<aside>
 <div class="col-3 right" id="latar">

    <div class="tx-title">Berita Rekomendasi</div>
    <?php $berita = $this->db->query("SELECT berita.*, user.fullname FROM berita LEFT JOIN user ON berita.user_id = user.id ORDER BY RAND() LIMIT 1;"); ?>
    <?php foreach ($berita->result_array() as $brt): ?>               
    <div class="ktk1">
        <div class="bingkai">
            <a href="<?php echo site_url('berita/'.$brt['id'].'/'.url_title($brt['title'],'dash', true).'/'); ?>">
            <div class="gambar2" style="display:block;height:150px;width:200px; background:url(<?php echo base_url('file/images/berita/thumb/'.$brt['image_path']);?>);background-size: 200px 150px;"></div>
            </a>
            <div class="ktk-sb">
                <a href="<?php echo site_url('berita/'.$brt['id'].'/'.url_title($brt['title'],'dash', true).'/'); ?>">
                <div class="judul" style="min-height: 34px"><?php echo substr($brt['title'], 0, 38); ?></div>
                </a>
                <div class="detil"><i class="fas fa-calendar-alt"></i> <?php echo date('d-m-Y', strtotime($brt['timestamp']));?> | <i class="fas fa-user"></i> by <?php echo $brt['fullname']; ?></div>
                <div class="tek-kecil"><?php echo substr($brt['tek'], 0, 175); ?></div>
            </div>
            <div class="tek-bawah">
                <div class="tek"> <i class="fas fa-folder-open"></i> <?php echo $brt['category']; ?></div>
            </div>            
        </div>
    </div>
    <?php endforeach; ?>
    <div class="clear"></div>

    <div class="tx-title">Artikel Pilihan</div>
    <?php $artikel = $this->db->query("SELECT artikel.*, user.fullname FROM artikel LEFT JOIN user ON artikel.user_id = user.id ORDER BY RAND() LIMIT 1;"); ?>
    <?php foreach ($artikel->result_array() as $brt): ?>               
    <div class="ktk1">
        <div class="bingkai">
            <a href="<?php echo site_url('artikel/'.$brt['id'].'/'.url_title($brt['title'],'dash', true).'/'); ?>">
            <div class="gambar2" style="display:block;height:150px;width:200px; background:url(<?php echo base_url('file/images/artikel/thumb/'.$brt['image_path']);?>);background-size: 200px 150px;"></div>
            </a>
            <div class="ktk-sb">
                <a href="<?php echo site_url('artikel/'.$brt['id'].'/'.url_title($brt['title'],'dash', true).'/'); ?>">
                <div class="judul" style="min-height: 34px"><?php echo substr($brt['title'], 0, 38); ?></div>
                </a>
                <div class="detil"><i class="fas fa-calendar-alt"></i> <?php echo date('d-m-Y', strtotime($brt['timestamp']));?> | <i class="fas fa-user"></i> by <?php echo $brt['fullname']; ?></div>
                <div class="tek-kecil"><?php echo substr($brt['tek'], 0, 175); ?></div>
            </div>
            <div class="tek-bawah">
                <div class="tek"> <i class="fas fa-folder-open"></i> <?php echo $brt['category']; ?></div>
            </div>            
        </div>
    </div>
    <?php endforeach; ?>
    <div class="clear"></div>

    <div class="tx-title">Agenda Kegiatan</div>
    <?php $agenda = $this->db->query("SELECT agenda.*, user.fullname FROM agenda LEFT JOIN user ON agenda.user_id = user.id ORDER BY RAND() LIMIT 1;"); ?>
    <?php foreach ($agenda->result_array() as $agn): ?>                 
    <div class="ktk1">
        <div class="bingkai">
            <div class="agenda-cont" style="float: none;margin: auto;">
                <div class="tgl-ats"><?php echo date('d', strtotime($agn['mulai']));?></div>
                <div class="tgl-bwh"><?php echo date('M', strtotime($agn['mulai']));?></div>
            </div>
            <div class="ktk-kanan" style="height: auto;">
                <a href="<?php echo site_url('agenda/'.$agn['id'].'/'.url_title($agn['title'],'dash', true).'/'); ?>">
                <div class="judul" style="min-height: 34px"><?php echo substr($agn['title'], 0, 38); ?></div>
                </a>
                <div class="detil"><i class="fas fa-calendar-alt"></i> <?php echo date('d-m-Y', strtotime($agn['timestamp']));?> | <i class="fas fa-user"></i> by <?php echo $agn['fullname']; ?></div>
                <div class="tek-kecil"><?php echo substr($agn['tek'], 0, 150); ?></div>
            </div>
            <div class="tek-kecil merah"><i class="fas fa-calendar-alt"></i> <?php echo date('d-m-Y', strtotime($agn['mulai']));?> s.d <?php echo date('d-m-Y', strtotime($agn['selesai']));?></div>
            <div class="tek-bawah">
                <div class="tek" style="font-size: 12px"><i class="fas fa-location-arrow"></i>  <?php echo $agn['lokasi']; ?></div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <div class="clear"></div>

    <div class="vw-title">Download File</div>
    <?php $download = $this->db->query("SELECT download.*, user.fullname FROM download LEFT JOIN user ON download.user_id = user.id ORDER BY RAND() LIMIT 1;"); ?>           
    <?php foreach ($download->result_array() as $dnd): ?>          
    <div class="ktk1">
      <div class="bingkai">
        <div class="down-sb">
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

 </div>
</aside>