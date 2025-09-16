
<!-- Content Wrapper. Contains page content -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <div class="col-auto ml-auto">
   <!-- <?php
    if(isset($_SESSION['id_acara'])){
    echo " Acara yang digunakan : ".$_SESSION['id_acara'];
    } else {
    echo "Belum ada acara yang dipilih.";
    }
    ?>-->
    </div>
    
</nav>
<div class="content-wrapper" >
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color:white;"><?= $judul; ?></h1>
        </div>
        <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url("user")?>" style="color:white;">Home</a></li>
             <li class="breadcrumb-item"><a href="#"><?= $judul; ?></a></li>
        </ol>
        </div>
      </div>
    </div>
  </section>

  <link href="<?=base_url('view/acara_resepsi/flip.min.css')?>" rel="stylesheet">
<style>
  .content-wrapper {
    background: url(<?php echo base_url('front-end/images/img-support/background_web_nologo.png');?>) center center/cover no-repeat fixed;
    background-size: cover;
    }
    
    .content-wrapper::before {
        content: "";
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.55); /* Tingkat transparansi 50% */
    }
    
    .flip-card {
        width: 300px;
        height: 200px;
        perspective: 1000px;
        margin: 10px;
    }

    .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        transition: transform 0.6s;
        transform-style: preserve-3d;
    }

    .flip-card-front,
    .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
    }

    .flip-card-front {
        background-color: rgb(10, 234, 159);
        border-radius: 10px;
        color: black;
        border: 2px solid;
    }

    .flip-card-back {
        align-items: center;
        border-radius: 10px;
        background-color:  rgb(10, 234, 159);;
        color: black;
        border: 2px solid;
        transform: rotateY(180deg);
    }
    #ubah_button {
        margin-top: 20px;
        margin-right: 20px;
        margin-left: 50px;
        border-radius: 5px;
        padding: 5px;
        color: white;
        background-color: rgb(4 71 88);
    }
    #hapus_button {
        margin-right: 50px;
        padding: 5px;
        border-radius: 5px;
        color: white;
        background-color: rgb(234 10 17);
    }
    .flip-card-flipped .flip-card-inner {
        transform: rotateY(180deg);
    }
    .flip-button {
        width: 100px;
    }
    #depan {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: 10%;
        font-size: 1.2rem;
        height: 50px;
        width: 200px;
    }
    #kembali_button {
        margin-top: 20px;
        border-radius: 5px;
        color: black;
        font-weight: bold;
        background-color: rgb(0 251 255);
    }


    #form-control {
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    #form-control:focus {
    border-color: #80bdff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    outline: none;
    }

    .email_petugas{
        margin-top:10px;
    }

</style>

    <!-- Main content -->
    <section class="content">
            <div class="card-header"> 
                <?php if($this->session->flashdata('pesan_acara_resepsi')) : ?> 
                <div class ="row mt-3">
                    <div class="col-md-6">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Acara Resepsi<strong>berhasil</strong> <?= $this->session->flashdata('pesan_acara_resepsi'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    </div>
                </div>
                <?php endif;  ?>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Tambah Acara Resepsi
                </button>
            </div>
    </section> 

    <div class = "row">
        <?php foreach($acara_list as $al):?>
            
                <div class="flip-card text-center ml-4 mt-4" style=" width: 18rem;">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="card-body">
                                <form action="<?= base_url('Acara_resepsi/ambil_id'); ?>" method="POST">    
                                    <h4 class="flip-button" id="depan"><u>Acara Resepsi</u></h4>
                                    <p class="card-text"><b><?= $al['nama_resepsi']?></b></p>
                                    <button name = "id_acara" id ="id_acara" class="btn btn-primary
                                        <?php 
                                        if(isset($_SESSION['id_acara'])){
                                            if($_SESSION['id_acara'] == $al['id_resepsi']){
                                                echo 'btn btn-primary active';
                                            }elseif($_SESSION['id_acara'] != $al['id_resepsi']){
                                                echo 'btn btn-primary'; 
                                        }}else{
                                            echo 'btn btn primary';
                                        }
                                        ?>" value="<?= $al['id_resepsi']?>">
                                        <?php 
                                        if(isset($_SESSION['id_acara'])){
                                        if($_SESSION['id_acara'] == $al['id_resepsi']){
                                            echo 'Sedang Digunakan';
                                        }elseif($_SESSION['id_acara'] != $al['id_resepsi']){
                                            echo 'Gunakan'; 
                                        }}else{
                                            echo 'Gunakan';
                                        }
                                        ?></a></button>
                                </form>
                            </div>
                        </div>
                   
                    <div class="flip-card-back">
                        <div class="email_petugas">
                            Akun Petugas : 
                            <div class="isi_email_petugas" value="<?php foreach ($get_email_petugas as $ep){
                                    $id_email_petugas = $ep['id'];
                                    $potong = explode("_", $id_email_petugas);
                                    $hasil_id = isset($potong[1]) ? $potong[1] : null;
                                    if($hasil_id !== null){
                                        if ($hasil_id == $al['id_resepsi']) {
                                        echo $ep['email'];
                                    }
                                    }else{
                                        
                                    }
                                    
                                } ?>">
                                <?php foreach ($get_email_petugas as $ep){
                                    $id_email_petugas = $ep['id'];
                                    $potong = explode("_", $id_email_petugas);
                                    $hasil_id = isset($potong[1]) ? $potong[1] : null;
                                    if($hasil_id !== null){
                                        if ($hasil_id == $al['id_resepsi']) {
                                        echo $ep['email'];
                                    }
                                    }else{
                                        
                                    }
                                    
                                } ?>
                            </div>
                        </div>
                        <button class="ubah-button" id="ubah_button" name="ubah_button" data-toggle="modal" data-target="#update_data" value="<?=$al['id_resepsi']?>"><i class="fas fa-edit"></i> Edit</button>
                        <button class="hapus-button" id="hapus_button" data-toggle="modal" data-target="#hapus_data" value="<?=$al['id_resepsi']?>"><i class="fas fa-trash-alt"></i> Hapus</button>
                        
                        <div class="kembali">
                            <button class="flip-button" id="kembali_button">Kembali</button> 
                        </div>
                    </div>
                

                </div>
            </div>
                
            
        <?php endforeach;?>
    </div>




<!-- Modal Tambah -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Acara Resepsi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <form action="<?= base_url('Acara_resepsi/tambah'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <h6>Nama Acara Resepsi : </h6>
                        <input type="text" class="form-control" id="nama_resepsi" name="nama_resepsi" placeholder="Nama Resepsi" required>
                    </div>
                    <div class="form-group" style="margin-top:10px">
                        <input type="hidden" class="form-control" id="id_user" name="id_user" placeholder="User Account" value="<?= $user['id'] ?>" required>
                    </div>
                    <div class="form-group">            
                        <input type="hidden" class="form-control" id ="id_resepsi" name="id_resepsi" placeholder="Id resepsi" value="<?php echo $auto_id_acara;?>" readonly>
                    </div>
                    <div class="form-group" style="margin-top:10px">
                        <input type="hidden" class="form-control" id="tanggal" name="tanggal" placeholder="tanggal" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('Y-m-d')?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="tambahdata" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Update -->
<div class="modal fade" id="update_data" tabindex="-1" role="dialog" aria-labelledby="update_dataCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="update_dataLongTitle">Perbarui Acara Resepsi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Acara_resepsi/update'); ?>" method="POST" name="update_form">
                <div class="modal-body">
                    <div class="form-group">
                        <h6>Nama Acara Resepsi : </h6>
                        <input type="text" class="nama_resepsi" id="form-control" name="nama_resepsi" placeholder="Nama Resepsi" required>
                    </div>
                    
                    <div class="form-group">
                        <h6>Email Petugas : </h6>
                        <input type="text" class="email_petugas_modal" id="form-control" name="email_petugas_modal" placeholder="Email Petugas" readonly>
                    </div>
                    
                    <button type ="button" onclick="showPasswordForm()" style="margin-bottom:13px;" id="button_form_password" class="btn btn-info" >Ganti Kata Sandi Petugas</button>
                    <div id="GantiPassword" style="display: none; margin-bottom:10px;">
                        <div class="form-group">
                            <h6>Ganti Kata Sandi Akun Petugas : </h6>
                            <span class="change-password-check" style="color: red; display: none; font-size:14px;" >*Konfirmasi ulang kata sandi tidak sesuai. Harap periksa kembali.</span>
                            <input type="password" class="password_1" id="form-control" name="password_1" style="margin-bottom:10px;" placeholder="Kata Sandi Baru" required>
                            <h6>Konfirmasi Ulang Kata Sandi Baru : </h6>
                            <span class="change-password-check" style="color: red; display: none; font-size:14px; " >*Konfirmasi ulang kata sandi tidak sesuai. Harap periksa kembali.</span>
                            <input type="password" class="password_2" id="form-control" name="password_2" placeholder="Konfirmasi Ulang Kata Sandi Baru" required>
                        </div>
                    </div>
                    
                    <div class="form-group">            
                        <input type="hidden" class="id_resepsi" id="form-control" name="id_resepsi" placeholder="Id resepsi" readonly>
                    </div>
                    <div class="form-group" style="margin-top:10px">
                        <input type="hidden" class="form-control" id="tanggal" name="tanggal" placeholder="tanggal" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('Y-m-d')?>" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="updateData" onclick="submitForm_cek()" class="btn btn-primary">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$('#update_data').on('show.bs.modal', function (e) {
    // Sembunyikan tampilan modal lama di sini
    document.getElementById("GantiPassword").style.display = "none";
    document.getElementById("button_form_password").style.display = "block";
});
</script>

<script>
function showPasswordForm() {
    document.getElementById("GantiPassword").style.display = "block";
    document.getElementById("button_form_password").style.display = "none";
}
</script>

<!-- pengecekan password-->
<script>
    function submitForm_cek(){
    var password1 = $(".password_1").val();
    var password2 = $(".password_2").val();

    if (password1 !== password2) {
        event.preventDefault();
        $(".change-password-check").show();
    } else {
        document.forms["update_form"].submit();
    }
}
</script>




<!-- Modal Delete -->
<div class="modal fade" id="hapus_data" tabindex="-1" role="dialog" aria-labelledby="hapus_dataLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapus_dataLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Acara_resepsi/hapus'); ?>" method="POST">
        <div class="modal-body">
            Apa anda yakin menghapus data ini <label class="nama_aja" id="nama_aja" name="nama_aja"></label>? 
            <div class="form-group">            
                <input type="hidden" class="id_resepsi" id="form-control" name="id_resepsi" placeholder="Id resepsi" readonly>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
$(document).on("click", ".ubah-button", function () {
    var id_resepsi = $(this).val();
    $(".id_resepsi").val(id_resepsi);
    $(".nama_resepsi").val("");
    var emailPetugas = $(this).closest('.flip-card-back').find('.isi_email_petugas').attr('value');
    $(".email_petugas_modal").val(emailPetugas);

    // loop through acara_list
    <?php foreach($acara_list as $al): ?>
        // check if id_resepsi matches
        if ("<?= $al['id_resepsi'] ?>" == id_resepsi) {
            // set value of nama_resepsi input
            $(".nama_resepsi").val("<?= $al['nama_resepsi'] ?>");
            
           
        }
    <?php endforeach; ?>
});

</script>

<script>
  $(document).on("click", ".hapus-button", function () {
        var id_resepsi = $(this).val();
        $(".id_resepsi").val(id_resepsi);
    });

    $(document).on("click", ".hapus-button", function () {
    var id_resepsi = $(this).val();
    $("#id_resepsi").val(id_resepsi);
    $(".nama_resepsi").val("");
    
    // loop through acara_list
    <?php foreach($acara_list as $al): ?>
        // check if id_resepsi matches
        if ("<?= $al['id_resepsi'] ?>" == id_resepsi) {
            // set value of nama_resepsi input
            $(".nama_aja").text("<?= $al['nama_resepsi'] ?>");
        }
    <?php endforeach; ?>
});
</script>

<script>
const flipButtons = document.querySelectorAll(".flip-button");

flipButtons.forEach((flipButton) => {
  flipButton.addEventListener("click", () => {
    const flipCard = flipButton.closest(".flip-card");
    flipCard.classList.toggle("flip-card-flipped");
  });
});

</script>

