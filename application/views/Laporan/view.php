
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
</nav>

<div class="content-wrapper" style="background-color:#00a1805e; min-height:100%;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= $judul; ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url("user")?>" style="color:black;">Home</a></li>
                 <li class="breadcrumb-item"><a href="#"><?= $judul; ?></a></li>
                </ol>
            </div>
            </div>
        </div>
    </section>

<style>

.table-dark-bordered th,
.table-dark-bordered td {
    border: 1px solid #000;
}
</style>
    <div class="container-fluid">
            <div class="dropdown" style="margin-bottom:20px;">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Cetak Laporan
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?php echo base_url('Laporan/exportToExcel'); ?>">Excel</a>
                    <a class="dropdown-item" href="<?php echo base_url('Laporan/exportToPDF'); ?>">PDF</a>
                </div>

            </div>
            <div class="row justify-content-start mb-2">
                <div class="col-12">
                <table class="table table-dark-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Tamu</th>
                        <th scope="col">Nama Meja</th>
                        <th scope="col">Waktu Kehadiran</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                <?php $nomer=1;?>    
                    <?php foreach($daftar_tamu as $dt):?>
                        <?php foreach($keterangan as $k):?>
                            <?php if($dt['id_tamu'] == $k['id_tamu']):?>
                                <tr>
                                <th scope="row"><?= $nomer?></th>
                                <td><?= $dt['nama_tamu']?></td>
                                <td><?= $dt['nama_meja']?></td>
                                <td><?= $k['waktu']?></td>
                                <td><?=$k['keterangan']?></td>
                                </tr>
                                <?php $nomer++ ?>
                            <?php endif;?>
                        <?php endforeach;?>
                    <?php endforeach;?>
                </tbody>
                </table>
                </div>
            </div>
        
    </div>
</div>

<script>

</script>
