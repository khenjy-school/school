<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $header = $this->db->query("SELECT privasi FROM tampilan LIMIT 1;"); $hdr = $header->result_array(); ?>
<article>        
  <div class="col-9" id="latar">
      <div class="vw-title" style="text-align: center;">Kabijakan Privasi</div>
    <div class="narasi"><?php echo  $hdr[0]['privasi']; ?>
    </div>
  </div>
<article>