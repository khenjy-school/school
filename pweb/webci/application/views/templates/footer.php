</div>
    <footer>
      <?php $header = $this->db->query("SELECT hakcipta, telp FROM tampilan LIMIT 1;");
      $hdr = $header->result_array(); ?>
      <p>Copyright &copy; <a href="<?php echo base_url(); ?>"><?php echo $hdr[0]['hakcipta']; ?></a><br>
      <p><a href="<?php echo base_url(); ?>term/">Kebijakan layanan</a> | <a href="<?php echo base_url(); ?>privasi/">Kebijakan privasi</a> | Telp: <?php echo $hdr[0]['telp']; ?></p>
      </p>
    </footer>
  </div>
</body>

</html>