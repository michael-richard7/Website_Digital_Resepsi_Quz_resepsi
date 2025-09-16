<!-- Content Wrapper. Contains page content -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
</nav>
<div class="content-wrapper">
  
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
    </div>
  </section>
  
    <!-- Main content -->
    
    <section class="content">
      <div class="card">
        <div class="card-header"> 
        
        <?php if($this->session->flashdata('pesan_ls')) : ?> 
        <div class ="row mt-3">
          <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Data Cerita Cinta <strong>berhasil</strong> <?= $this->session->flashdata('pesan_ls'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
        <?php endif;  ?>

          <a href="<?= base_url(); ?>love_story/tambah" class="btn btn-dark btn-sm mb-3" > Tambah Love Story</a>
        </div>
          <div class="card-body">
            <div class="card card-success">
              <div class="card-body">
                  
                  <div class="row">
                    <?php foreach ($love_story as $ls) :?>
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header mt-10-p-0">
                            <h3 class="card-title p-2"><?php echo $ls['judul']; ?> </h3>
                            <div class="container">
                              <div class="row">
                                <div class="col-md-12 bg-light text-right">
                                  <a href ="<?= base_url(); ?>love_story/update/<?= $ls['id_LS']; ?>" class="btn btn-outline-warning mb-10 btn-md">Ubah</button></a>
                                  <a href ="<?= base_url(); ?>love_story/hapus/<?= $ls['id_LS']; ?>" class="btn btn-outline-danger btn-md" onclick="return confirm('yakin untuk menghapus data <?= $ls['judul'];?>?');">Hapus</button></a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-body">
                            <div class="container">
                              <div class="row">
                                <div class="col-md-12">
                                    <img style='float:left;width:200px;height:200px; margin-right:10px;' src="<?= base_url('front-end/images/love_story/'). $ls['gambar_story'] ?>" />
                                    <p><?php echo $ls['story']?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>    
                      </div>
                  <?php endforeach; ?>
                  </div>
          
              </div>
            </div>
          </div>
            
          
          <div class="card-footer">
            Footer
          </div>
      </div>
    </section>
</div>

