<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    
</nav>

<style>
    .content-wrapper{
        background: #00a1805e;
        height:800px;
    } 
</style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-0">
                    <div class="col-sm-6">
                        <h1 class="m-0">Home</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="#">Home</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <hr class="sidebar-divider d-none d-md-block"></hr>
        <div class="container-fluid" style="margin-right:'100px'">
            <h1 class="h3 mb-4 text-gray-800">Hallo, Selamat Datang <?= $user['nama']; ?></h1>
            <div class="card" style="width: 300px;">
                <img src="<?= base_url('back-end/img/') . $user['gambar']; ?>" class="card-img-top" alt="...">
                    <?php $cek_id= $user['id']; ?>
                    <?php if(substr($cek_id, 0, 1) === 'A'):?>
                        <button type="button" class="btn btn-info position-absolute translate-middle" style="top:10px;left:250px;" data-toggle="modal" data-target="#info_petugas">
                        <i class="fas fa-user-friends"></i>
                        </button>
                    <?php elseif(substr($cek_id, 0, 1) === 'P'):?>

                    <?php endif;?>

                <div class="card-body">
                    <p class="card-text"><?= $user['nama']; ?></p>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text">Anda sudah terdaftar sejak :</p>
                    <p class="card-text"><?= date('d F Y', $user['date_created']); ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="info_petugas" tabindex="-1" role="dialog" aria-labelledby="info_petugasTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Akun Petugas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <label style="font-size: 18px; color:green; margin-bottom:25px;">Daftar Akun Petugas :</label>
        <?php foreach($akun_petugas as $ap):?>
            <input type ="hidden" name="id" id="id" value="<?= $ap['id']?>"/>
            </br><label>Email Petugas : </label> <?= $ap['email']?>
            </br><label>Tanggal Dibuat :</label> <?= date('d F Y', $ap['date_created']);?>
            <hr style="border: 1px solid black; background-color: black; margin-bottom:-5px;">
            
        <?php endforeach;?>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
        </div>
        </div>
    </div>
    </div>