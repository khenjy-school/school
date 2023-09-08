<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<article>        
  <div class="col-9" id="latar">
    <div class="vw-title"><?php echo $item['title']; ?></div>
    <div class="detil hijau"><i class="fa fa-calendar-alt"></i> <?php echo date('d-m-Y', strtotime($item['timestamp']));?> | <i class="fa fa-tags"></i> <?php echo $item['category']; ?> | <i class="fa fa-user"></i> by <?php echo $item['fullname']; ?>
    </div>
    <p><img src="<?php echo base_url('file/images/download/'.$item['image_path']);?>" alt="" class="res-lbr"></p>
    <div>
        <table border="1" cellpadding="7" style="max-width:500px; margin: auto;    border: 1px solid black;
            border-collapse: collapse;">
            <tbody>
                <tr>
                    <td>Kategori</td>
                    <td><?php echo $item['category'];?></td>
                </tr>
                <tr>
                    <td>Diupload</td>
                    <td><?php echo date('d-m-Y', strtotime($item['timestamp']));?></td>
                </tr>
                <tr>
                    <td>Ukuran</td>
                    <td><?php echo $item['size'];?> kb</td>
                </tr>
                <tr>
                    <td>Ekstensi</td>
                    <td><?php echo $item['ext'];?></td>
                </tr>
                <tr>
                    <td>Tipe</td>
                    <td><?php echo $item['type'];?></td>
                </tr>
            </tbody>
        </table>
        <div class="narasi"><?php echo $item['tek']; ?></div>
        <a href="<?php echo base_url('file/images/download/'.$item['image_path']);?>"><div style="height: 35px;line-height: 35px; width: 180px; background: RoyalBlue ; color: #fff; ; text-align: center;font-weight: bold; margin: 20px auto auto auto;"><i class="fa fa-download "></i> Download</div></a>
    </div>
  </div>
<article>