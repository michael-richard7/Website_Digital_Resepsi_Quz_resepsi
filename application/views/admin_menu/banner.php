<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $judul; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
        <div class="card-header">
              <?= $this->session->flashdata('pesan'); ?>
              <a href="" class="btn btn-dark btn-sm mb-3" data-toggle="modal" data-target="#tambahbannerModal"> Tambah Banner</a>
            </div>
            <?php foreach ($banner as $b): ?>
                <div class="card-body">
                    <div class="col-md-12">
                        <!-- Widget: user widget style 1 -->
                        <div class="card card-widget widget-user shadow">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-info">
                                <h5 class="widget-user-desc"><?= $b['nama_lk']; ?> & <?= $b['nama_pr']; ?></h5>
                                <h3 class="widget-user-username"><?= date("d-m-Y",strtotime($b['tgl'])); ?></h3>
                            </div>
                        </div>
                        <!-- /.widget-user -->
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="tambahbannerModal" tabindex="-1" role="dialog" aria-labelledby="tambahbannerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahbannerModalLabel">Tambah Banner</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?= base_url('admin_menu/banner'); ?>" method="POST" enctype="multipart/form-data" >
        <div class="modal-body">
          <div class="form-group mb-3">
            <input type="text" class="form-control" id="nama_lk" name="nama_lk" placeholder="Nama Pengantin Pria">
          </div>
          <div class="form-group mb-3">
            <input type="text" class="form-control" id="nama_pr" name="nama_pr" placeholder="Nama Pengantin Wanita">
          </div>
          <div class="form-group mb-3">
            <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Tanggal Pernikahan">
          </div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>