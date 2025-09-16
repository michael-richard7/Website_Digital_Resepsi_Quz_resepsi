
<div class="cover">
    <div class="register-box" >
        <div class="register-logo">
        <img src="<?= base_url('front-end/images/img-support/logo.png') ?>" style="width :120px; height:120px"></br>
            <a href="#"><b style="color:#00c9fff7;">Quz Resepsi</b></a>
            
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Daftar Akun Baru</p>

                <form action="<?= base_url('auth/registrasi') ?>" method="post">
                    <?php if ($this->session->flashdata('pesan_buat-email')): ?>
                    <?php echo $this->session->flashdata('pesan_buat-email'); ?>
                    <?php endif; ?>
                    <?= form_error('nama', '<span class="text-danger">', '</span>'); ?>
                    <div class="input-group mb-3">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>

                    </div>
                    <?= form_error('email', '<span class="text-danger">', '</span>'); ?>
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control" placeholder="Alamat E-mail">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                    </div>
                    <?= form_error('password1', '<span class="text-danger">', '</span>'); ?>
                    <div class="input-group mb-3">
                        <input type="password" name="password1" class="form-control" placeholder="Kata Sandi">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password2" class="form-control" placeholder="Masukan Ulang Kata Sandi">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Buat Akun</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p>- ATAU -</p>
                    <a href="<?= base_url('auth'); ?>" class="btn btn-block btn-primary">
                        Masuk
                    </a>
                </div>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
</div>
<!--cover-->