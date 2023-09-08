<div class="main">
    <?php foreach($set as $j) {?>
        <label for="">Judul</label><br>
        <input type="text" value="<?= $j->judul?>"><br><br>

        <label for="">Favicon</label><br>
        <img src="<?= base_url().'img/favicon/'.$j->favicon?>" width="50px" height="50px"><br><br>

        <label for="">Description</label><br>
        <input type="text" value="<?=$j->description?>"><br><br>
    <?php }?>

    <a href="<?= base_url().'index.php/Controller/edit3/'.$j->id ?>">Edit</i></a>
</div>