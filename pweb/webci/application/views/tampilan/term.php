<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $header = $this->db->query("SELECT term FROM tampilan LIMIT 1;"); $hdr = $header->result_array(); ?>
<article>        
  <div class="col-9" id="latar">
      <div class="vw-title" style="text-align: center;">Kabijakan Layanan</div>
    <div class="narasi"><?php echo  $hdr[0]['term']; ?>
    </div>
  </div>
<article>