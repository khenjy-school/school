<div class="main">
<?= $this->session->flashdata('message');?>
    <div class="sect">
        <h4>Transaksi Masuk</h4>
        <a href="<?= base_url('index.php/Controller/v_input4')?>">Tambah Data <span class="fas fa-plus"></span></a>
    </div>
    <table>
        <tr>
            <th>No.</th>
            <th>ID Produk</th>
            <th>Nama Produk</th>
            <th>Tanggal</th>
            <th>Jumlah Barang</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($trm as $m) {?>
        <tr>
            <td headers="No."><?= ++$start ?></td>
            <td headers="ID"><?= $m->id_p ?></td>
            <td headers="Nama"><?= $m->nama_produk ?></td>
            <td headers="Tanggal"><?= $m->tanggal ?></td>
            <td headers="Jumlah"><?= $m->jumlah_barang ?></td>
            <td headers="Keterangan"><?= $m->keterangan ?></td>
            <td headers="Aksi">
                <a href="<?= base_url().'index.php/Controller/edit_trm/'.$m->id ?>"><i class="fas fa-pen edit"></i></a>
                <a href="<?= base_url().'index.php/Controller/delete_trm/'.$m->id ?>" onclick="return confirm('apakah yakin akan menghapus data ini??')"><i class="fas fa-times delete"></i></a>
            </td>
        </tr>
        <?php }?>
    </table>
    <?php echo $this->pagination->create_links(); ?>
    <script>
    var closebtns = document.getElementsByClassName("close");
    var i;

for (i = 0; i < closebtns.length; i++) {
  closebtns[i].addEventListener("click", function() {
    this.parentElement.style.display = 'none';
  });
}
</script>
<div class="row">
<div class="col">
    <form action="<?= base_url('index.php/Filter/filter')?>" method="POST" target="_blank">
    <h5>Berdasarkan Tanggal </h5>

    <input type="hidden" name="nilaifilter" value="1">

    <span>Tanggal awal</span> <br>
    <input type="date" name="tanggalawal" required=""><br>

    <span>Tanggal akhir</span><br>
    <input type="date" name="tanggalakhir" required=""><br>

    <input type="submit" value="Print">
    </form>
    </div>
    
    <div class="col">
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

    <div class="col">
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
</div>
    </div>
    <style>
        form{
        margin: 50px 10px 10px 0px;
        background: #fff;
        line-height: 25px;
        border-radius: 5px;
        box-shadow: 0px 2px 5px #C9CCD5;
        padding: 10px;
        width: 250px;
        height: 200px;
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
    </style>