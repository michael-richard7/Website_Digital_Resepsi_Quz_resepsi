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
                <a href="" class="btn btn-dark btn-sm mb-3" data-toggle="modal" data-target="#tambahheroModal"> Tambah Hero</a>
              </div>
              <div class="card-body">

              <div class="card card-success">
            <div class="card-body">
              <div class="row">
              <?php foreach ($hero as $h) :?>
                  <div class="col-md-12 col-lg-6 col-xl-4">
                      <div class="card mb-2 bg-gradient-dark">
                      <img class="card-img-top" src="<?= base_url('front-end/images/banner/') . $h['image']; ?>" alt="Dist Photo 1" height="400" width="auto">
                      <div class="card-img-overlay d-flex flex-column justify-content-end">
                          <h5 class="card-title text-primary text-white"> <?= $h['text']; ?></h5>
                          <a href="#" class="text-white">Hapus</a>
                      </div>
                      </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  Footer
              </div>
              <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<div class="modal fade" id="tambahheroModal" tabindex="-1" role="dialog" aria-labelledby="tambahheroModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahheroModalLabel">Tambah Hero</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?= base_url('admin_menu/hero_images'); ?>" method="POST" enctype="multipart/form-data" >
        <div class="modal-body">
          <div class="form-group mb-3">
            <input type="text" class="form-control" id="text" name="text" placeholder="Judul Gambar">
          </div>
          <div class="form-group mb-3">
            <input type="file" class="form-control" id="image" name="image" placeholder="Gambar">
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