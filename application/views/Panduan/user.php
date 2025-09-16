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
        background: rgb(49,47,84);
        background-color:#00a1805e;
        height:800px;
        
    } 
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-sm-6">
                    <h1 class="m-0">Panduan Pengguna</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url("user")?>" style="color:black;">Home</a></li>
                    <li class="breadcrumb-item"><a href="#"><?= $judul; ?></a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="row" style="margin-left: 10px; margin-right: 10px; margin-top: 40px;">
    <div class="col-md-12">
        <div class="card card-info collapsed-card">
        <div class="card-header">
            <h3 class="card-title">Panduan Pembuatan Acara :</h3>
            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" style="margin-top: 0px;">
            <i class="fas fa-plus"></i>
            </button>
            </div>
        </div>
        <div class="card-body">
            1. Setelah Berhasil Masuk Menggunakan Akun Utama, Silahkan Tekan Sub Menu Acara lalu lakukan Pembuatan Nama Acara Terlebih Dahulu.
            <br>
            2. Setelah Berhasil Membuat Acara, Maka Selanjutnya Silahkan Pilih Acara yang Akan Digunakan.
            <br>
            3. Lalu Pilih Info Mempelai Pada Bagian Sub Menu Lalu Isi Data Sesuai Dengan Data Acara Sekaligus Pengisian Untuk Undangan Digital Yang Akan Digunakan.
            <br>
            4. Setelah Selesai Melakukan Pengisian Data, Selanjutnya Lakukan Pembuatan Meja Untuk Tamu Dapat Menempati Meja Tersebut Berdasarkan Kategori Yang Dibuat Dengan Menekan Sub Menu Meja <i class="fas fa-arrow-right"></i> ( Lalu Tekan )  Tambah Meja <i class="fas fa-arrow-right"></i> ( Lalu silahkan Isi Informasi Meja Secara Lengkap ).
            <br>
            5. Setelah Selesai Membuat Daftar Meja Barulah Pengguna Dapat Melakukan Penambahan Tamu Dengan Cara Menekan Sub Menu Tamu, Lalu Pilih Tambah Tamu. Setelah Itu Silahkan Isi Nama Tamu Secara Lengkap dan lakukan Pemilihan Meja Dengan Memilih Kategori Meja Yang Telah Ditambahkan Sebelumnya Pada Pembuatan Daftar Meja & Jumlah Tamu Dalam Undangan, Lalu Pilih Meja Untuk Ditempati Oleh Tamu Tersebut.
            <br>
            6. Setelah Melakukan Pembuatan Daftar Meja dan Daftar Tamu Akan Muncul Daftar Meja Dan Tamu Yang Telah Dibuat.       
        </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card card-info collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Panduan Pengisian Data Peta Lokasi Acara Resepsi :</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" style="margin-top: 0px;">
                    <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                1. Buka Aplikasi Google Maps atau link ini : <a href="https://www.google.com/maps/" target="_blank"> Google Maps</a>.
                <br>
                2. Masukan Informasi Tempat Tujuan Pada Pencarian di Google Maps.
                <br>
                <img src="<?php echo base_url('front-end/images/img-support/Contoh Map 1.png'); ?>" style="width: 700px; height: 450px; align-item: center; margin-top: 10px; margin-bottom: 10px; margin-left: 15px; border: 1px solid black;" alt="Gambar">

                <br>
                3. Lalu Tekan Bagikan, Pilih Sematkan Peta Yang Berada Disebelah Kirim Link.
                <br>
                <img src="<?php echo base_url('front-end/images/img-support/Contoh Map 2.png'); ?>" style="width: 700px; height: 450px; align-item: center; margin-top: 10px; margin-bottom: 10px; margin-left: 15px; border: 1px solid black;" alt="Gambar">

                <br>
                4. Salin HTML, Lalu ambil text seperti ini untuk dimasukan kedalam Peta Lokasi Acara Resepsi : src="https://www.google.com/maps/**********************/".
                <br>
                5. Pastikan untuk memasukan informasi data yang dibutuhkan sesuai dan sama dengan contoh pada nomer 4.
                <br>
            </div>
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="card card-info collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Panduan Penggunaan Akun :</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" style="margin-top: 0px;">
                    <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                1. Akun Utama Merupakan Akun Yang Dibuat Ketika Mendaftar Pada Register.
                <br>
                2. Tiap Akun Utama Bisa Memiliki Banyak Acara Resepsi Yang DiAtur Dengan Menggunakan Akun Utama Untuk Login, Lalu Memilih Acara Yang Ingin Digunakan.
                <br>
                3. Terdapat Akun Tambahan Yang Dapat Digunakan Oleh Petugas Ketika Akun Utama Membuat Sebuah Acara Baru, Yang Dapat Dilihat Ketika Menekan Tulisan <u>Acara Resepsi</u>.
                <br>
                4. Akun Petugas Akan Memiliki Kata Sandi Awalan Yaitu <b>12345</b> 
                <br>
                5. Kata Sandi Petugas Dapat Diubah Dengan Cara Login Menggunakan Akun Utama <i class="fas fa-arrow-right"></i> Pilih Sub Menu Acara <i class="fas fa-arrow-right"></i> Tekan Tulisan <u>Acara Resepsi</u> Pada Acara Yang Ingin Diubah <i class="fas fa-arrow-right"></i> Lalu Tekan Edit <i class="fas fa-arrow-right"></i> Tekan Ganti Kata Sandi Petugas <i class="fas fa-arrow-right"></i> Lalu Masukan Kata Sandi Baru & Konfirmasi Ulang Kata Sandi <i class="fas fa-arrow-right"></i> Lalu Tekan Perbarui. Maka Kata Sandi Petugas Yang Terkait Telah Berhasil DiUbah
            </div>
        </div>
    </div>
    
    
    <div class="col-md-12">
        <div class="card card-warning collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Kebijakan Mengenai Tanggal Lahir Pasangan Mempelai :</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" style="margin-top: 0px;">
                    <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                Untuk Tanggal Lahir Pasangan Mempelai Menurut <b> <u>Undang-Undang Perkawinan Nomor 1 Tahun 1974 Yang Telah Diubah Dengan UU Nomor 16 Tahun 2019 </b></u> , Mengatur Usia Minimal Menikah Adalah 19 Tahun Baik Untuk Pria Maupun Wanita. Sehingga Sistem Memberikan Batasan Mengenai Umur Pada Tiap Pasangan Mempelai.
                
            </div>
        </div>
    </div>
    
    



</div>
