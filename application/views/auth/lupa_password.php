<div class="cover">
    <div class="register-box" >
        <div class="register-logo">
        <img src="<?= base_url('front-end/images/img-support/logo.png') ?>" style="width :120px; height:120px"></br>
            <a href="#"><b style="color:#00c9fff7;">Quz Resepsi</b></a>
            
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Ganti Kata Sandi</p>

                <form action="<?= base_url('auth/lupa_password') ?>" method="post">
                    
                    <input type="hidden" name="id_user" value="<?= $_GET['x'] ?>"> 
                    <?= form_error('password1', '<span class="text-danger">', '</span>'); ?>
                    <div class="input-group mb-3">
                        <input type="password" name="password1" class="form-control" placeholder="Kata Sandi Baru">
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
                            <button type="submit" class="btn btn-primary btn-block">Perbarui Kata Sandi</button>
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

<script>
    // Mengambil elemen input password
    var passwordInput = document.querySelector('input[type="password"]');

    // Mengambil elemen ikon fa-lock
    var lockIcon = document.querySelector('.fa-lock');

    // Ketika ikon fa-lock di klik
    lockIcon.addEventListener('click', function() {
        // Jika tipe input password adalah 'password'
        if (passwordInput.type === 'password') {
            // Ubah tipe input password menjadi 'text'
            passwordInput.type = 'text';
            // Ubah kelas ikon menjadi 'fa-lock-open'
            lockIcon.classList.replace('fa-lock', 'fa-lock-open');
        } else {
            // Jika tipe input password bukan 'password'
            // Ubah tipe input password menjadi 'password'
            passwordInput.type = 'password';
            // Ubah kelas ikon menjadi 'fa-lock'
            lockIcon.classList.replace('fa-lock-open', 'fa-lock');
        }
    });
</script>

