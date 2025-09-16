<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div class="login-page" >
    <div class="login-logo">
    <img src="<?= base_url('front-end/images/img-support/logo.png') ?>" style="width :120px; height:120px; margin-top:20px;"></br>
        <a href="#"><b style="color:#00c9fff7;">Quz Resepsi</b></a>
        
    </div>
    <!-- /.login-logo -->
 
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Silahkan Lakukan Login Untuk Memulai Acara </p>
            <?= $this->session->flashdata('pesan'); ?>

            <form action="<?= base_url('auth'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="email" class="form-control" placeholder="Alamat E-mail" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Kata Sandi" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center mb-3">
                <p>- ATAU -</p>
                <a href="<?= base_url('auth/registrasi'); ?>" class="btn btn-block btn-primary"> Daftar Akun Baru
                </a>
            </div>
            
             <div class="social-auth-links text-center mb-3">
            <a href="<?= base_url('auth/konfirmasi_email'); ?>" class="btn btn-block btn-primary"><i class="fas fa-key" style="padding-right:7px;"></i> Lupa Kata Sandi
                </a>
            </div>
            
            <!-- /.social-auth-links -->

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->