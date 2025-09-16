<div class="cover">
    <div class="konfirmasi-box" >
        <div class="konfirmasi-logo">
        <img src="<?= base_url('front-end/images/img-support/logo.png') ?>" style="width :120px; height:120px; margin-top:40px;"></br>
            <a href="#"><b style="color:#00c9fff7;">Quz Resepsi</b></a>
            
        </div>

        <div class="card">
            <div class="card-body konfirmasi-card-body">
                <p class="konfirmasi-box-msg">Konfirmasi Penggantian Kata Sandi</p>
                <?= $this->session->flashdata('pesan_kirim_email'); ?>
                <form action="<?= base_url('auth/konfirmasi_email') ?>" method="post">
                    Silahkan Masukan E-mail :
                    </br>
                    <?= form_error('email', '<span class="text-danger">', '</span>'); ?>
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control" placeholder="E-mail">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                    </div>
                    
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Kirim E-mail Konfirmasi</button>
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
    <!-- /.konfirmasi-box -->
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

