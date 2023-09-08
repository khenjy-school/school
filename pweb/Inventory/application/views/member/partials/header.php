<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?= base_url('assets/css/all.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/dash.css') ?>">    
        <?php foreach($set as $j) {?>
        <link rel="shortcut icon" href="<?= base_url().'img/favicon/'.$j->favicon?>">
        <meta name="description" content="<?= $j->description ?>">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <title>Inventory | Database</title>
    </head>
    <body>
    <div class="content">
        <div class="header">
            <div class="brand">
                <h4><?= $j->judul ?></h4>
                <?php }?>
                <label for="menu-toggle" class="bars">
                    <span class="fas fa-bars"></span>
                </label>
            </div>
            <div class="user">
                <img style="height: 30px; border-radius:50px; width:30px" src="<?= base_url().'img/user/'.$this->session->userdata("img"); ?>">
                <h4><?= $this->session->userdata("username");?></h4>
                </a>
                <a href="<?= base_url('index.php/Login/logout')?>" onclick="return confirm('Apakah Anda yakin ingin logout?')"><span class="fas fa-sign-out-alt"></span></a>
            </div>
        </div>
    </div>