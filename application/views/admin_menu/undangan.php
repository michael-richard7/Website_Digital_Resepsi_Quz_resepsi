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
              <a href="" class="btn btn-dark btn-sm mb-3" data-toggle="modal" data-target="#tambahundanganModal"> Tambah Template</a>
            </div>
            <div class="card-body">

            <div class="card card-success">
          <div class="card-body">
            <div class="row">
                  
            <?php foreach ($template_undangan as $tu) :?>
              
                <div class="col-md-12 col-lg-6 col-xl-4">
                <?php echo "<p><center>$tu->nama_template </center></p>"?>
                    <div class="card mb-0 bg-gradient-dark">
                    <img src="<?= base_url('front-end/images/template_undangan/'). $tu->gambar ?>" class ="card-img-top" height = 400 width = 200> 
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                   
                        <h5 class="card-title text-primary text-white"> </h5>
                    
                    </div>
                    </div>
                    <div class = "card text-white bg-dark mb-3">
                      <button type="button" class="btn btn-outline-success"> Lihat Undangan </button>
                    </div>
                    
                    
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
            </div>
            <!-- /.card-body -->
          
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="tambahundanganModal" tabindex="-1" role="dialog" aria-labelledby="tambahundanganModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahundanganModalLabel">Tambah Template</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
    
      <form action="<?= base_url('admin_menu/undangan'); ?>" method="POST" enctype="multipart/form-data" >
        <div class="modal-body">
        <div class="form-group mb-3">            
  
            <input type="text" class="form-control" id ="id_template" name="id_template" placeholder="Id Template" value="T<?php echo 
            $auto_id;?>" readonly>
   
          </div>
          <div>
          
            </div>
          <div class="form-group mb-3">
            <input type="text" class="form-control" id="nama_template" name="nama_template" placeholder="Judul Template">
          </div>
            <select class="form-select" id="status" name="status" required >
              <option selected>Pilih Status</option>
              <option  value="1">Active</option>
              <option  value="0">Non Active</option>
            </select>
          <div class="form-group mb-3 mt-3">
            <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Gambar">
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