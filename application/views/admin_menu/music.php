<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Menu Music</h1>

        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <?= $this->session->flashdata('pesan'); ?>
              <a href="" class="btn btn-dark btn-sm mb-3" data-toggle="modal" data-target="#tambahmusicModal"> Tambah Music</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Nama Music</th>
                    <th>Music</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php foreach ($music as $m) : ?>
                  <tbody>
                    <tr>
                      <td><?= $m['nama']; ?></td>
                      <td><audio src="<?= base_url('/front-end/music/'). $m['file']; ?>" controls></audio></td>
                      <td>
                        <a class="btn btn-warning btn-sm" href="<?= base_url('admin_menu/edit/') . $m['id']; ?>" data-toggle="modal" data-target="#editmenuModal">Edit</a>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus ini?');" href="<?= base_url('admin_menu/hapus/') . $m['id']; ?>">Hapus</a>
                      </td>
                    </tr>
                  </tbody>
                <?php endforeach; ?>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="tambahmusicModal" tabindex="-1" role="dialog" aria-labelledby="tambahmusicModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahmusicModalLabel">Tambah Music</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?= base_url('admin_menu/music'); ?>" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group mb-3">
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Music">
          </div>
          <div class="form-group mb-3">
            <input type="file" class="form-control" id="file_music" name="file_music" placeholder="File Music">
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

