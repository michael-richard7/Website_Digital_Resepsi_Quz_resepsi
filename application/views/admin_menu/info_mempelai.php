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
              <a href="" class="btn btn-dark btn-sm mb-3" data-toggle="modal" data-target="#tambahmempelaiModal"> Tambah Mempelai</a>
            </div>
            <div class="card-body">
             <div class="card card-success">
              <div class="card-body">
                <div class="row">
                  <?php foreach ($info_mempelai as $im) :?>
                    <div class="col-md-6">
                     <!-- Box Comment -->
                     <div class="card card-widget">
                      <div class="card-header">
                       <div class="user-block">
                        <a href="#"> <?= $im['nama']?></a>
                    </div>
                    <!-- /.user-block -->
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" title="More Information" data-toggle="modal" data-target="#detailmempelaiModal<?= $im['id']; ?>">
                        <i class="far fa-circle"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                    <!-- modal detail -->
                    <div class="modal fade" id="detailmempelaiModal<?= $im['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailmempelaiModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="detailmempelaiModalLabel<?= $im['id']; ?>">Detail Mempelai</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                      
                          <div class="modal-body">
                            <div class="form-group mb-3">
                              <input type="text" class="form-control" value ="<?= $im['nama']; ?>" name="nama" placeholder="Nama Mempelai">
                            </div>
                            <div class="form-group mb-3">
                              <input type="text" class="form-control" value ="<?= $im['ayah']; ?>" id="ayah" name="ayah" placeholder="Ayah">
                            </div>
                            <div class="form-group mb-3">
                              <input type="text" class="form-control" value ="<?= $im['ibu']; ?>" id="ibu" name="ibu" placeholder="Ibu">
                            </div>
                            <div class="form-group mb-3">
                              <input type="date" class="form-control" value ="<?= $im['tgl_lahir']; ?>" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir">
                            </div>
                            <div class="form-group mb-3">
                              <input type="text" class="form-control" value ="<?= $im['nomer_handphone']; ?>" id="nomer_handphone" name="nomer_handphone" placeholder="Nomer Handphone">
                            </div>
                            <div class="form-group mb-3">
                              <textarea class="form-control" name="bio" id="bio" cols="30" rows="10"> <?= $im['bio']; ?></textarea>
                            </div>
                            <div class="form-group row mb-3">
                              <div class="col-sm">
                              <div class="row">
                                <div class="col-sm">
                                  <img src="<?= base_url('/front-end/images/info-mempelai/'). $im['image']; ?>" class="img-thumbnail" alt="">
                                </div>
                              </div>
                            </div>
                          </div>
                 
                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          </div>
                      </div>
                    </div>
                  </div>
                    <!-- /.card-tools -->
                </div>
                  </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <img class="img-fluid pad" src="<?= base_url('front-end/images/info-mempelai/') . $im['image']; ?>" alt="Photo" height="300" width="500">
                </div>
                
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
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

<div class="modal fade" id="tambahmempelaiModal" tabindex="-1" role="dialog" aria-labelledby="tambahmempelaiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahmempelaiModalLabel">Tambah Mempelai</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?= base_url('admin_menu/info_mempelai'); ?>" method="POST" enctype="multipart/form-data" >
        <div class="modal-body">
          <div class="form-group mb-3">
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Mempelai">
          </div>
          <div class="form-group mb-3">
            <input type="text" class="form-control" id="ayah" name="ayah" placeholder="Ayah">
          </div>
          <div class="form-group mb-3">
            <input type="text" class="form-control" id="ibu" name="ibu" placeholder="Ibu">
          </div>
          <div class="form-group mb-3">
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir">
          </div>
          <div class="form-group mb-3">
            <input type="text" class="form-control" id="nomer_handphone" name="nomer_handphone" placeholder="Nomer Handphone">
          </div>
          <div class="form-group mb-3">
            <textarea class="form-control" name="bio" id="bio" cols="30" rows="10"></textarea>
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

