<?php foreach ($pengaturan as $p) : ?>
  <img src="img/<?= $p->foto ?>" class="img-fluid rounded">
<?php endforeach; ?>


<?php foreach ($pengaturan as $p) : ?>
  <h1 class="text-center">Tentang Kami</h1>
  <hr>
  <div class="row">
    <div class="col-md-6">
      <p><?= $p->metadesc ?></p>
    </div>

    <div class="col-md-6">
      <img class="img-fit rounded" src="img/wish.png">
    </div>
  </div>
<?php endforeach ?>