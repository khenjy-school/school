<div class="main">
    <h4>Transaksi Masuk</h4>
    <div class="col-3">
    <form action="<?= base_url('index.php/Filter/filter')?>" method="POST" target="_blank">
    <h5>Berdasarkan Tanggal</h5>

    <input type="hidden" name="nilaifilter" value="1">

    <span>Tanggal awal</span> <br>
    <input type="date" name="tanggalawal" required=""><br>

    <span>Tanggal akhir</span><br>
    <input type="date" name="tanggalakhir" required=""><br>

    <input type="submit" value="Print">
    </form>
    </div>
    
    <div class="col-3">
    <form action="<?= base_url('index.php/Filter/filter')?>" method="POST" target="_blank">
    <h5>Berdasarkan Bulan</h5>
    <input type="hidden" name="nilaifilter" value="2">
    <span>Tahun</span><br>
    <select name="tahun1" required="">
    <option>Tahun</option>
        <?php foreach ($date as $row): ?>

        <option value="<?= $row->tahun ?>"><?= $row->tahun ?></option>

        <?php endforeach?>
    </select><br>

    <span>Bulan awal</span>
    <select name="bulanawal" required="">

        <option value="1">Januari</option>
        <option value="2">Februari</option>
        <option value="3">Maret</option>
        <option value="4">April</option>
        <option value="5">Mei</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">Agustus</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>

    </select><br>

    <span>Bulan akhir</span>
    <select name="bulanakhir" required="">

        <option value="1">Januari</option>
        <option value="2">Februari</option>
        <option value="3">Maret</option>
        <option value="4">April</option>
        <option value="5">Mei</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">Agustus</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>

    </select><br>

    <input type="submit" value="Print">

    </form>
    </div>

    <div class="col-3">
    <form action="<?= base_url('index.php/Filter/filter')?>" method="POST" target="_blank">
    <h5>Berdasarkan Tahun</h5>
    <input type="hidden" name="nilaifilter" value="3">

    Tahun <br>
    <select name="tahun2" required="">
    <option>Tahun</option>
        <?php foreach ($date as $row): ?>

        <option value="<?= $row->tahun ?>"><?= $row->tahun ?></option>

        <?php endforeach?>
    </select>

    <br>
    <input type="submit" value="Print">

    </form>
    </div>
    <h4>Transaksi Keluar</h4>
    <div class="col-3">
    <form action="<?= base_url('index.php/Filter/filter2')?>" method="POST" target="_blank">
    <h5>Berdasarkan Tanggal</h5>
    <input type="hidden" name="nilaifilter" value="1">

    <span>Tanggal awal</span> <br>
    <input type="date" name="tanggalawal" required=""><br>

    <span>Tanggal akhir</span><br>
    <input type="date" name="tanggalakhir" required=""><br>

    <input type="submit" value="Print">
    </form>
    </div>
   
    <div class="col-3">
    <form action="<?= base_url('index.php/Filter/filter2')?>" method="POST" target="_blank">
    <h5>Berdasarkan Bulan</h5>
    <input type="hidden" name="nilaifilter" value="2">
    <span>Tahun</span><br>
    <select name="tahun1" required="">
    <option>Tahun</option>
        <?php foreach ($date2 as $row): ?>

        <option value="<?= $row->tahun ?>"><?= $row->tahun ?></option>

        <?php endforeach?>
    </select><br>

    <span>Bulan awal</span>
    <select name="bulanawal" required="">

        <option value="1">Januari</option>
        <option value="2">Februari</option>
        <option value="3">Maret</option>
        <option value="4">April</option>
        <option value="5">Mei</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">Agustus</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>

    </select><br>

    <span>Bulan akhir</span>
    <select name="bulanakhir" required="">

        <option value="1">Januari</option>
        <option value="2">Februari</option>
        <option value="3">Maret</option>
        <option value="4">April</option>
        <option value="5">Mei</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">Agustus</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>

    </select><br>

    <input type="submit" value="Print">

    </form>
    </div>

    <div class="col-3">
    <form action="<?= base_url('index.php/Filter/filter2')?>" method="POST" target="_blank">
    <h5>Berdasarkan Tahun</h5>
    <input type="hidden" name="nilaifilter" value="3">

    Tahun <br>
    <select name="tahun2" required="">
        <option>Tahun</option>
        <?php foreach ($date2 as $row): ?>

        <option value="<?= $row->tahun ?>"><?= $row->tahun ?></option>

        <?php endforeach?>
    </select>

    <br>
    <input type="submit" value="Print">

    </form>
    </div>
</div>

<style>
    form{
        margin: 10px 10px 10px 0px;
        background: #fff;
        line-height: 25px;
        border-radius: 5px;
        box-shadow: 0px 2px 5px #C9CCD5;
        padding: 10px;
        width: 250px;
        height: 200px;
    }

    .col-3{
        display: inline-flex;
        margin-right: 5%;
        margin-left: 30px;
    }

    input,select{
        margin-bottom: 10px;
    }

    input[type="submit"]{
        width: 30%;
    }

    span{
        font-size: 15px;
    }

    h3{
        font-weight: 600;
    }
</style>