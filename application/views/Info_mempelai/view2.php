
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

    
<!-- Gambar Cover -->
<style media="screen">
  .upload1{
    width: ;
    position: relative;
    margin: auto;
    text-align: center;
  }
  .upload1 img{
    border-radius: 5%;
    border: 3px solid #DCDCDC;

  }
  .upload1 .rightRound1{
    position: absolute;
    bottom: 0;
    right: 0;
    background: #00B4FF;
    width: 32px;
    height: 32px;
    line-height: 33px;
    text-align: center;
    border-radius: 50%;
    overflow: hidden;
    cursor: pointer;
  }
  .upload1 .leftRound1{
    position: absolute;
    bottom: 0;
    left: 0;
    background: red;
    width: 32px;
    height: 32px;
    line-height: 33px;
    text-align: center;
    border-radius: 30%;
    overflow: hidden;
    cursor: pointer;
  }
  .upload1 .fa{
    color: white;
  }
  .upload1 input{
    position: absolute;
    transform: scale(2);
    opacity: 0;
  }
  .upload1 input::-webkit-file-upload-button, .upload1 input[type=submit1]{
    cursor: pointer;
  }

  .colom{
  content: "";
  display: table;
  clear: both;
  }
</style>
<!-- Foto Pria -->
<style media="screen">
    .upload_pria{
      width: 200px;
      position: relative;
      margin: auto;
      text-align: center;
    }
    .upload_pria img{
      border-radius: 50%;
      border: 8px solid #DCDCDC;
      width: 225px;
      height: 225px;
    }
    .upload_pria .rightRound_pria{
      position: absolute;
      bottom: 0;
      right: 0;
      background: #00B4FF;
      width: 32px;
      height: 32px;
      line-height: 33px;
      text-align: center;
      border-radius: 50%;
      overflow: hidden;
      cursor: pointer;
    }
    .upload_pria .leftRound_pria{
      position: absolute;
      bottom: 0;
      left: 0;
      background: red;
      width: 32px;
      height: 32px;
      line-height: 33px;
      text-align: center;
      border-radius: 50%;
      overflow: hidden;
      cursor: pointer;
    }
    .upload_pria .fa{
      color: white;
    }
    .upload_pria input{
      position: absolute;
      transform: scale(2);
      opacity: 0;
    }
    .upload_pria input::-webkit-file-upload-button, .upload_pria input[type=submit-pria]{
      cursor: pointer;
    }
  </style>

<!-- Foto Wanita-->
<style media="screen">
    .upload_wanita{
      width: 200px;
      position: relative;
      margin: auto;
      text-align: center;
    }
    .upload_wanita img{
      border-radius: 50%;
      border: 8px solid #DCDCDC;
      width: 225px;
      height: 225px;
    }
    .upload_wanita .rightRound_wanita{
      position: absolute;
      bottom: 0;
      right: 0;
      background: #00B4FF;
      width: 32px;
      height: 32px;
      line-height: 33px;
      text-align: center;
      border-radius: 50%;
      overflow: hidden;
      cursor: pointer;
    }
    .upload_wanita .leftRound_wanita{
      position: absolute;
      bottom: 0;
      left: 0;
      background: red;
      width: 32px;
      height: 32px;
      line-height: 33px;
      text-align: center;
      border-radius: 50%;
      overflow: hidden;
      cursor: pointer;
    }
    .upload_wanita .fa{
      color: white;
    }
    .upload_wanita input{
      position: absolute;
      transform: scale(2);
      opacity: 0;
    }
    .upload_wanita input::-webkit-file-upload-button, .upload_wanita input[type=submit-wanita]{
      cursor: pointer;
    }
</style>
  <!-- MAIN -->
  <!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
                <?php if($this->session->flashdata('pesan_info_mempelai')) : ?> 
                <div class ="row mt-3">
                    <div class="col-md-6">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Informasi <strong>berhasil</strong> <?= $this->session->flashdata('pesan_info_mempelai'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    </div>
                </div>
                <?php endif;  ?>
    <div class="row justify-content-center mt-0">
        <div class="col-12 col-sm-9 col-md-7 col-lg-8 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Data Undangan</strong></h2>
                <p>Wedding : </p>
                <div class="row">
                    <div class="col-md-12 mx-0">
   
                        <form id="msform" action="<?= base_url('Info_mempelai/tambah_data'); ?>" method="POST" enctype="multipart/form-data" role="form" >
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Cover</strong></li>
                                <li id="informasi-mempelai"><strong>Informasi Mempelai</strong></li>
                                <li id="event"><strong>Event</strong></li>
                                <li id="cerita-cinta"><strong>Cerita Cinta</strong></li>
                                <li id="galeri"><strong>Wedding Galeri</strong></li>
                                <li id="template"><strong>Template</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                            </ul>
                            <!-- fieldsets -->

                             <!-- Page 1 'Cover'-->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title"><u>Informasi Cover Undangan </u></h2>
                                    <!-- Input Image -->

                                    <h6 class="d-flex justify-content-center" style="margin-top:30px">Gambar Cover Undangan</h6>
                                    <div class="container-fluid" style="margin-bottom:20px;" >
                                        <div class="row">
                                            <div class="col-md-8 mx-auto">
                                                <div class="upload1"  >
                                                  <?php if($cek == 'ada'):?>
                                                    <?php foreach($undangan as $u):?>
                                                      <img src="<?= base_url('front-end/images/gambar_cover/'.$u['gambar_cover']) ?>" class="img-fluid" style="height:300px; width:100%" id="image1">
                                                    <?php endforeach;?>
                                                  <?php elseif($cek == 'tidak_ada'):?>
                                                    <img src="<?= base_url('front-end/images/img-support/profile_kosong.jpg')?>" class="img-fluid" style="height:300px; width:100%"  id = "image1">    
                                                  <?php endif;?>
                                                  
                                                  <div class="rightRound1" id = "upload1">
                                                    <input type="file" name="cover_img" id = "cover_img" accept=".jpg, .jpeg, .png">
                                                    <i class = "fa fa-camera"></i>
                                                    </div>
                                                    <div class="leftRound1" id = "cancel1" style = "display: none;">
                                                    <i class = "fa fa-times"></i>
                                                    </div>
                                                    <div class="rightRound1" id = "confirm1" style = "display: none;">
                                                    <input type="submit1">
                                                    <i class = "fa fa-check"></i>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="info-cover d-flex justify-content-center" style="margin-bottom:20px;"><u>Disarankan Minimal File Berukuran 2 Mb</u></div>
                                    <h7>Nama Panggilan :</h7>
                                    <input type="text"  name="nm_cover_pria" id="nm_cover_pria" placeholder="Contoh : Romeo" title="Nama mempelai pria untuk cover undangan " required 
                                    <?php foreach($undangan as $u):?>
                                      <?php if($cek == 'ada'):?>
                                        value = "<?=$u['nama_pria']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?>>
                                    <input type="text" name="nm_cover_wanita" id="nm_cover_wanita" placeholder="Contoh : Juliet" title="Nama pendek mempelai wanita untuk cover undangan" required 
                                    <?php foreach($undangan as $u):?>
                                      <?php if($cek == 'ada'):?>
                                        value = "<?=$u['nama_wanita']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?>>
                                </div>
                                <input type="button" name="next" id="tombol" class="next action-button"  value="Next Step"/>
                            </fieldset>

                             <!-- Page 2 'Informasi Mempelai' -->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title"><center><u>Data Mempelai Pria</u></center></h2>
                               
                                    <div class="container" style="margin-bottom:40px">
                                        <div class="upload_pria">
                                            <?php if($cek == 'ada'):?>
                                              <?php foreach($pria as $p):?>
                                                <img src="<?= base_url('front-end/images/foto_pria/'.$p['foto'])?>" class ="img-fluid" id = "base-img-pria">
                                              <?php endforeach;?>
                                            <?php elseif($cek == 'tidak_ada'):?>
                                              <img src="<?= base_url('front-end/images/img-support/profile_kosong.jpg')?>" class ="img-fluid" id = "base-img-pria">
                                            <?php endif;?>
                                            <div class="rightRound_pria" id = "upload-pria">
                                            <input type="file" name="foto_pria" id = "foto_pria" accept=".jpg, .jpeg, .png">
                                            <i class = "fa fa-camera"></i>
                                            </div>

                                            <div class="leftRound_pria" id = "cancel-pria" style = "display: none;">
                                            <i class = "fa fa-times"></i>
                                            </div>
                                            <div class="rightRound_pria" id = "confirm-pria" style = "display: none;">
                                            <input type="submit-pria">
                                            <i class = "fa fa-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="info-foto_pria d-flex justify-content-center" style="margin-bottom:20px;"><u>Disarankan Minimal File Berukuran 2 Mb</u></div>
                                    <h7>Nama Lengkap :</h7>
                                    <input type="text" name="mempelai_pria_nama" id="mempelai_pria_nama" placeholder="Nama Lengkap" 
                                    <?php foreach($pria as $p):?>
                                      <?php if($cek == 'ada'):?>
                                        value = "<?=$p['nama_lengkap']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?>/>
                                    <h7>Tanggal Lahir :</h7>
                                    <input type="date" name="mempelai_pria_tgl_lahir" id="mempelai_pria_tgl_lahir" placeholder="Tanggal Lahir" 
                                    <?php foreach($pria as $p):?>
                                      <?php if($cek == 'ada'):?>
                                        value = "<?=$p['tanggal_lahir']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?>/>
                                    <h7>Anak Ke :</h7>
                                    <input type="text" name="mempelai_pria_anak_ke" id="nm_mempelai_pria_anak_ke" placeholder="Contoh : Pertama, Kedua, Ketiga dst."
                                    <?php foreach($pria as $p):?>
                                      <?php if($cek == 'ada'):?>
                                        value = "<?=$p['anak_ke']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?>/>
                                    <h7>Nama Ayah :</h7>
                                    <input type="text" name="mempelai_pria_nama_ayah" id="mempelai_pria_nama_ayah" placeholder="Nama Ayah" 
                                    <?php foreach($pria as $p):?>
                                      <?php if($cek == 'ada'):?>
                                        value = "<?=$p['ayah']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?>/>
                                    <h7>Nama Ibu :</h7>
                                    <input type="text" name="mempelai_pria_nama_ibu" id="mempelai_pria_nama_ibu" placeholder="Nama Ibu" 
                                    <?php foreach($pria as $p):?>
                                      <?php if($cek == 'ada'):?>
                                        value = "<?=$p['ibu']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?>/>
                                    <h7>Nomer Telepon :</h7>
                                    <input type="number"  class="no-arrow" name="mempelai_pria_telepon" id="mempelai_pria_telepon"  placeholder="Contoh : 081234567890" maxlength="15"
                                    <?php foreach($pria as $p):?>
                                      <?php if($cek == 'ada'):?>
                                        value = "<?=$p['nomer_telp']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?> onkeypress="return cek_input_number(event)"/>
                                    Bio :
                                    <div class="shadow p-3 mb-5 bg-white rounded">
                                        <textarea class="form-control" name="bio_pria" id="bio_pria" cols="30" rows="2">
                                          <?php foreach($pria as $p):?>
                                            <?php if($cek == 'ada'):?>
                                              <?=$p['bio']?>
                                            <?php elseif($cek == 'tidak_ada'):?>
                                              
                                            <?php endif;?>
                                          <?php endforeach;?>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-card">
                                    
                                    <div class="container" style="margin-bottom:40px">
                                    <h2 class="fs-title"><center><u>Data Mempelai Wanita</u></center></h2>
                                      <div class="container" style="margin-bottom:40px">
                                          <div class="upload_wanita">
                                          <?php if($cek == 'ada'):?>
                                            <?php foreach($wanita as $w):?>
                                            <img src="<?= base_url('front-end/images/foto_wanita/'.$w['foto'])?>" class ="img-fluid" id = "base-img-wanita">
                                          <?php endforeach;?>
                                          <?php elseif($cek == 'tidak_ada'):?>
                                              <img src="<?= base_url('front-end/images/img-support/profile_kosong.jpg')?>" class ="img-fluid" id = "base-img-wanita">
                                            <?php endif;?>
                                      
                                            <div class="rightRound_wanita" id = "upload-wanita">
                                            <input type="file" name="foto_wanita" id = "foto_wanita" accept=".jpg, .jpeg, .png">
                                            <i class = "fa fa-camera"></i>
                                            </div>

                                            <div class="leftRound_wanita" id = "cancel-wanita" style = "display: none;">
                                            <i class = "fa fa-times"></i>
                                            </div>
                                            <div class="rightRound_wanita" id = "confirm-wanita" style = "display: none;">
                                            <input type="submit-wanita">
                                            <i class = "fa fa-check"></i>
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="info-foto_wanita d-flex justify-content-center" style="margin-bottom:20px;"><u>Disarankan Minimal File Berukuran 2 Mb</u></div>

                                    <h7>Nama Lengkap :</h7>
                                    <input type="text" name="mempelai_wanita_nama" id="mempelai_wanita_nama" placeholder="Nama Lengkap" 
                                    <?php foreach($wanita as $w):?>
                                      <?php if($cek == 'ada'):?>
                                        value = "<?=$w['nama_lengkap']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?>/>
                                    <h7>Tanggal Lahir :</h7>
                                    <input type="date" name="mempelai_wanita_tgl_lahir" id="mempelai_wanita_tgl_lahir" placeholder="Tanggal Lahir"
                                    <?php foreach($wanita as $w):?>
                                      <?php if($cek == 'ada'):?>
                                        value = "<?=$w['tanggal_lahir']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?>/>
                                    <h7>Anak Ke :</h7>
                                    <input type="text" name="mempelai_wanita_anak_ke" id="mempelai_wanita_anak_ke" placeholder="Contoh : Pertama, Kedua, Ketiga dst." 
                                    <?php foreach($wanita as $w):?>
                                      <?php if($cek == 'ada'):?>
                                        value = "<?=$w['anak_ke']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?>/>
                                    <h7>Nama Ayah :</h7>
                                    <input type="text" name="mempelai_wanita_nama_ayah" id="mempelai_wanita_nama_ayah" placeholder="Nama Ayah" 
                                    <?php foreach($wanita as $w):?>
                                      <?php if($cek == 'ada'):?>
                                        value = "<?=$w['ayah']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?>/>
                                    <h7>Nama Ibu :</h7>
                                    <input type="text" name="mempelai_wanita_nama_ibu" id="mempelai_wanita_nama_ibu" placeholder="Nama Ibu" 
                                    <?php foreach($wanita as $w):?>
                                      <?php if($cek == 'ada'):?>
                                        value = "<?=$w['ibu']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?>/>
                                    <h7>Nomer Telepon :</h7>
                                    <input type="number" class="no-arrow" name="mempelai_wanita_telepon" id="mempelai_wanita_telepon"  placeholder="Contoh : 081234567890" maxlength="15"
                                    <?php foreach($wanita as $w):?>
                                      <?php if($cek == 'ada'):?>
                                        value = "<?=$w['nomer_telp']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?> onkeypress="return cek_input_number(event)"/>
                                    Bio :
                                    <div class="shadow p-3 mb-5 bg-white rounded">
                                    <textarea class="form-control" name="bio_wanita" id="bio_wanita" cols="30" rows="2">
                                          <?php foreach($wanita as $w):?>
                                            <?php if($cek == 'ada'):?>
                                              <?=$w['bio']?>
                                            <?php elseif($cek == 'tidak_ada'):?>
                                              
                                            <?php endif;?>
                                          <?php endforeach;?>
                                        </textarea>
                                    </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="button" name="next" class="next action-button" value="Next Step"/>
                            </fieldset>
                            
                            <!-- Page 3 'Event' -->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title" style="margin-bottom:20px"><u>Event</u></h2>
                                    Tanggal Akad / Pemberkatan Pernikahan :
                                    <input type="date" class="form-control" id="tanggal_akad" name="tanggal_akad" required 
                                    <?php foreach($undangan as $u):?>
                                      <?php if($cek == 'ada'):?>
                                        value ="<?=$u['tanggal_akad']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?>>

                                  <script>
                                    var today = new Date().toLocaleDateString('en-CA');
                                    todayaja = new Date(today).toISOString().split('T')[0];
                                    document.getElementById("tanggal_akad").setAttribute("min", todayaja);
                                  </script>

                                    Jam Akad / Pemberkatan Pernikahan :
                                    <input type="time" class="form-control" id="jam_akad" name="jam_akad" required 
                                    <?php foreach($undangan as $u):?>
                                      <?php if($cek == 'ada'):?>
                                        value="<?=$u['jam_akad']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?>>

                                    Tanggal Resepsi :
                                    <input type="date" class="form-control" id="tanggal_resepsi" name="tanggal_resepsi" required 
                                    <?php foreach($undangan as $u):?>
                                      <?php if($cek == 'ada'):?>
                                        value="<?=$u['tanggal_resepsi']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?>>

                                  <script>
                                    var today = new Date().toLocaleDateString('en-CA');
                                    todayaja = new Date(today).toISOString().split('T')[0];
                                    document.getElementById("tanggal_resepsi").setAttribute("min", todayaja);
                                  </script>
                                  
                                    Jam Resepsi :
                                    <input type="time" class="form-control" id="jam_resepsi" name="jam_resepsi" required 
                                    <?php foreach($undangan as $u):?>
                                      <?php if($cek == 'ada'):?>
                                        value="<?=$u['jam_resepsi']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?>>
                                    Alamat Acara Resepsi :
                                    <input type="text" class="form-control" id="alamat_resepsi" name="alamat_resepsi" placeholder="Contoh : Jl. Mawar Blok 10J No.7 Surabaya" required 
                                    <?php foreach($undangan as $u):?>
                                      <?php if($cek == 'ada'):?>
                                        value="<?=$u['alamat_resepsi']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?>>
                                    Peta Lokasi Acara Resepsi :
                                    <input type="text" class="form-control" id="lokasi_gmap" name="lokasi_gmap" required 
                                    <?php foreach($undangan as $u):?>
                                      <?php if($cek == 'ada'):?>
                                        value='<?=$u['peta_lokasi']?>'
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?>>

                                    <h2 class="fs-title" style="margin-bottom:20px"><u>Wedding Gift</u></h2>
                                    <h5><strong><br>Pilihan Salah Satu, Untuk Gift Non-Fisik : </br></strong></h5>
                                    <h6><strong><br>Transfer : </br></strong></h6>
                                    <div class="radio-group" method="POST">
                                    
                                      <div class = "radio mr-3">
                                        <label>
                                          <input type="radio"  name="opsi_gift" value="BCA" 
                                          <?php foreach($undangan as $u):?>
                                            <?php if($cek == 'ada'):?>
                                              <?php if($u['gift_non_fisik'] == "BCA"){
                                                echo 'checked';
                                                }?>
                                            <?php elseif($cek == 'tidak_ada'):?>
                                              
                                            <?php endif;?>
                                          <?php endforeach;?>>
                                          <img src="<?= base_url('front-end/images/img-support/BCA.png')?>" width="200px" height="100px">
                                        </label>
                                      </div>
                                      <div class = "radio mr-3">
                                        <label>
                                          <input type="radio"  name="opsi_gift" value="Mandiri" 
                                          <?php foreach($undangan as $u):?>
                                            <?php if($cek == 'ada'):?>
                                              <?php if($u['gift_non_fisik'] == "Madiri"){
                                                echo 'checked';
                                                }?>
                                            <?php elseif($cek == 'tidak_ada'):?>
                                              
                                            <?php endif;?>
                                          <?php endforeach;?>>
                                          <img src="<?= base_url('front-end/images/img-support/Mandiri.png')?>" width="200px" height="100px">
                                        </label>
                                      </div>
                                      <div class = "radio mr-3">
                                        <label>
                                          <input type="radio"  name="opsi_gift" value="BRI" 
                                          <?php foreach($undangan as $u):?>
                                            <?php if($cek == 'ada'):?>
                                              <?php if($u['gift_non_fisik'] == "BRI"){
                                                echo 'checked';
                                                }?>
                                            <?php elseif($cek == 'tidak_ada'):?>
                                              
                                            <?php endif;?>
                                          <?php endforeach;?>>
                                          <img src="<?= base_url('front-end/images/img-support/Bank_BRI.png')?>" width="200px" height="100px">
                                        </label>
                                      </div>
                                      <div class = "radio mr-3">
                                        <label>
                                          <input type="radio"  name="opsi_gift" value="BNI" 
                                          <?php foreach($undangan as $u):?>
                                            <?php if($cek == 'ada'):?>
                                              <?php if($u['gift_non_fisik'] == "BNI"){
                                                echo 'checked';
                                                }?>
                                            <?php elseif($cek == 'tidak_ada'):?>
                                              
                                            <?php endif;?>
                                          <?php endforeach;?>>
                                          <img src="<?= base_url('front-end/images/img-support/BNI.png')?>" width="200px" height="100px">
                                        </label>
                                      </div>
                                      <div class = "radio mr-3">
                                        <label>
                                            <input type="radio"  name="opsi_gift" value="Jenius" 
                                            <?php foreach($undangan as $u):?>
                                            <?php if($cek == 'ada'):?>
                                              <?php if($u['gift_non_fisik'] == "Jenius"){
                                                echo 'checked';
                                                }?>
                                            <?php elseif($cek == 'tidak_ada'):?>
                                              
                                            <?php endif;?>
                                          <?php endforeach;?>>
                                            <img src="<?= base_url('front-end/images/img-support/jenius.png')?>" width="200px" height="100px"></div>
                                        </label>
                                      </div>
                                      <h6><strong><br> E-Wallet : </br></strong></h6>   
                                      <div class = "radio mr-3">
                                        <label>
                                          <input type="radio"  name="opsi_gift" value="ShopeePay" 
                                          <?php foreach($undangan as $u):?>
                                            <?php if($cek == 'ada'):?>
                                              <?php if($u['gift_non_fisik'] == "ShopeePay"){
                                                echo 'checked';
                                                }?>
                                            <?php elseif($cek == 'tidak_ada'):?>
                                              
                                            <?php endif;?>
                                          <?php endforeach;?>>
                                          <img src="<?= base_url('front-end/images/img-support/ShopeePay.png')?>" width="200px" height="100px">
                                        </label>
                                      </div>
                                      <div class = "radio mr-3">
                                        <label>
                                          <input type="radio"  name="opsi_gift" value="GoPay" 
                                          <?php foreach($undangan as $u):?>
                                            <?php if($cek == 'ada'):?>
                                              <?php if($u['gift_non_fisik'] == "GoPay"){
                                                echo 'checked';
                                                }?>
                                            <?php elseif($cek == 'tidak_ada'):?>
                                              
                                            <?php endif;?>
                                          <?php endforeach;?>>
                                          <img src="<?= base_url('front-end/images/img-support/Go_Pay.png')?>" width="200px" height="100px">
                                        </label>
                                      </div>
                                      <div class = "radio mr-3">
                                        <label>
                                          <input type="radio"  name="opsi_gift" value="Ovo" 
                                          <?php foreach($undangan as $u):?>
                                            <?php if($cek == 'ada'):?>
                                              <?php if($u['gift_non_fisik'] == "Ovo"){
                                                echo 'checked';
                                                }?>
                                            <?php elseif($cek == 'tidak_ada'):?>
                                              
                                            <?php endif;?>
                                          <?php endforeach;?>>
                                          <img src="<?= base_url('front-end/images/img-support/Ovo.png')?>" width="200px" height="100px">
                                        </label>
                                      </div>
                                      <div class = "radio mr-3">
                                        <label>
                                          <input type="radio"  name="opsi_gift" value="Dana" 
                                          <?php foreach($undangan as $u):?>
                                            <?php if($cek == 'ada'):?>
                                              <?php if($u['gift_non_fisik'] == "Dana"){
                                                echo 'checked';
                                                }?>
                                            <?php elseif($cek == 'tidak_ada'):?>
                                              
                                            <?php endif;?>
                                          <?php endforeach;?>>
                                          <img src="<?= base_url('front-end/images/img-support/Dana.png')?>" width="200px" height="100px">
                                        </label>
                                      </div>


                                        
                                        
                                         <br>
                                    Nomer Tujuan :
                                    <input type="number" class="no-arrow" id="nomer_tujuan" name="nomer_tujuan" placeholder="Contoh : Nomer Rekening Bank / Nomer Handphone Terkait Dengan Pilihan Diatas"  required 
                                    <?php foreach($undangan as $u):?>
                                      <?php if($cek == 'ada'):?>
                                        value="<?=$u['no_tujuan']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?>>
                                    <h5><strong><br>Alamat Tujuan Kiriman Untuk Gift Fisik : </br></strong></h5>
                                    Alamat Tujuan :
                                    <input type="text" id="alamat_wedding_gift" name="alamat_wedding_gift" placeholder="Contoh : Jl. Mawar Blok 10J No.7 Surabaya" required 
                                    <?php foreach($undangan as $u):?>
                                      <?php if($cek == 'ada'):?>
                                        value="<?=$u['alamat_gift_fisik']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?>>
                                    Nomer WhatsApp untuk konfirmasi :
                                    <input type="number" class="no-arrow" id="nomer_wa" name="nomer_wa" placeholder="Contoh : 081234567890" maxlength="15" required 
                                    <?php foreach($undangan as $u):?>
                                      <?php if($cek == 'ada'):?>
                                        value="<?=$u['tlp_gift_fisik']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?>>
                                    
                                    
                                    <h2 class="fs-title" style="margin-bottom:20px"><u>Musik</u></h2>
                                    <input type="file" class="form-control" id="musik_cover" name="musik_cover" placeholder="File Music" 
                                    <?php foreach($undangan as $u):?>
                                      <?php if($cek == 'ada'):?>
                                        value="<?=$u['musik']?>"
                                      <?php elseif($cek == 'tidak_ada'):?>
                                        
                                      <?php endif;?>
                                    <?php endforeach;?> accept=".mp3">
                                  </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="button" name="next" class="next action-button" value="Next Step"/>
                            </fieldset>
                            
                            <!-- Page 4 'Cerita Cinta' -->
                            <fieldset>
                              <div class="field_wrapper">
                                <div class = "container" style="max-width: 80%; margin-left:auto; margin-right:auto; margin-bottom:30px">
                                  <div class="shadow lg p-2 mb-8 bg-white rounded" style="max-width: 80%; margin-left:auto; margin-right:auto; margin-bottom:30px">
                                    <h7>Tanggal Kisah :</h7></br>
                                    <input type="date" name="field_date[]" style="width:30%;"/>
                                    <input type="text" name="field_judul[]" placeholder="Tema" style="width:70%;"/>
                                    <input type="text" name="field_cerita[]" placeholder="Isi Cerita" style="width:70%;"/>
                                    <a href="javascript:void(0);" class="add_button" title="Add field"><img src="<?= base_url('front-end/images/img-support/icon-plus.png')?>"/></a>
                                  </div>
                                </div>
                              </div>
                            
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="button" name="next" class="next action-button" value="Next Step"/>
                            </fieldset>

                             <!-- Page 5 'Wedding Galeri'--> 
                            <fieldset>
                              <div class= "container card col-md-10">
                                <div class="container">
                                  <div class="upload__box">
                                    <div class="upload__btn-box">
                                      <label class="upload__btn">
                                        <p>Pilih Gambar</p>
                                        <input type="file" name ="galeri_nikah[]" multiple="" data-max_length="20" class="upload__inputfile">
                                      </label>
                                    </div>
                                    <div class="upload__img-wrap">
                                    </div>
                                  </div>
                                </div>
                              </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <?php if($cek == 'ada'){
                                  echo '<input type="button" name="next" class="next action-button" value="Pilih Template"></button>';
                                
                                }elseif($cek == 'tidak_ada'){
                                  echo '<button type="submit" name="tambahdata" class="next action-button">Simpan Data</button>';
                                } 
                                ?>
                                
                            </fieldset>

                            <!-- Page 6 'Template' -->
                            <fieldset>
                              
                              <div class="form-card">
                                <div class="card-body" style="margin-left=auto;margin-right=auto;">
                                  <div class="radio-buttons" method="POST">
                                    <?php foreach($template as $t):?>
                                      <label class="custom-radio">
                                        <input type="radio" name="template_id" value="<?= $t['id_template']?>"/>
                                        <span class="radio-btn">
                                          <i class="las la-check"></i>
                                          <div class="hobbies-icon">
                                            <img src="<?= base_url('front-end/images/template_undangan/'). $t['gambar'] ?>">
                                            <!--<a href ="../application/controllers/Home.php?id_template=<?= $t['nama_template']?>" target="_blank" class="pilih_button btn btn-outline-info" value="">View</button></a>
                                            -->
                                            <a href="javascript:void(0);" onclick="window.open('<?php echo base_url();?><?= $t['nama_template']?>?s=<?php echo $session_value;?>', '_blank');" class="pilih_button btn btn-outline-info">View</a>
                                        </div>
                                        </span>
                                      </label>
                                    <?php endforeach; ?>
                                  </div>
                                </div>
                              </div>
                              
                              <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                              <button type="submit" name="simpan" class="next action-button" onclick="submitForm()" value="Confirm">Gunakan Template</button>
                            </fieldset>

                            <!-- Page 6 'Konfirmasi' -->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center">Success !</h2>
                                    <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image">
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>Berhasil Ditambahkan</h5>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>


<!--Actin with ajax -->
<script>
function submitForm() {
  // Get the value of the selected radio button
  var template_id = $("input[name='template_id']:checked").val();

  // Pass the selected value to the controller using AJAX
  $.ajax({
    url: "<?php echo base_url('Info_mempelai/update_template'); ?>",
    type: "POST",
    data: { template_id: template_id },
    success: function(data) {
      // Handle the response from the server
      console.log(data);
    },
    error: function(xhr, status, error) {
      console.error(error);
    }
  });
}

</script>
<!-- add more than 1 image-->
<script>
const munculkanInputBaru = () => {
  let input = document.createElement('input');
  input.setAttribute('type', 'file');
  input.setAttribute('name', 'galeri_nikah[]');
  input.setAttribute('onchange', 'munculkanInputBaru()');
  document.querySelector("#inputArea").appendChild(input);
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Tambah Konten -->
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper

    
    var fieldHTML = '<div class="shadow lg p-2 mb-8 bg-white rounded" style="max-width: 63%; margin-left:auto; margin-right:auto; margin-bottom:30px"><h7>Tanggal Kisah :</h7></br><input type="date" name="field_date[]" style="width:30%;"/></br><input type="text" name="field_judul[]" placeholder="Tema" style="width:70%;"/><input type="text" name="field_cerita[]" placeholder="Isi Cerita" style="width:70%;"/><a href="javascript:void(0);" class="remove_button"><img src="<?= base_url('front-end/images/img-support/icon-delete.png')?>"/></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>


<!-- Gambar Cover --> 
<script type="text/javascript">
      document.getElementById("cover_img").onchange = function(){
        document.getElementById("image1").src = URL.createObjectURL(cover_img.files[0]); // Preview new image

        document.getElementById("cancel1").style.display = "block";
        //document.getElementById("confirm1").style.display = "block";

        document.getElementById("upload1").style.display = "none";
      }

      var userImage_cover = document.getElementById('image1').src;
      document.getElementById("cancel1").onclick = function(){
        document.getElementById("image1").src = userImage_cover; // Back to previous image

        document.getElementById("cancel1").style.display = "none";
        //document.getElementById("confirm1").style.display = "none";

        document.getElementById("upload1").style.display = "block";
      }
    </script>

<!-- Foto Pria -->

<script type="text/javascript">
  document.getElementById("foto_pria").onchange = function(){
    document.getElementById("base-img-pria").src = URL.createObjectURL(foto_pria.files[0]); // Preview new base-img-pria

    document.getElementById("cancel-pria").style.display = "block";
    //document.getElementById("confirm-pria").style.display = "block";

    document.getElementById("upload-pria").style.display = "none";
  }

  var userImage_pria = document.getElementById('base-img-pria').src;
  document.getElementById("cancel-pria").onclick = function(){
    document.getElementById("base-img-pria").src = userImage_pria; // Back to previous image

    document.getElementById("cancel-pria").style.display = "none";
    //document.getElementById("confirm-pria").style.display = "none";

    document.getElementById("upload-pria").style.display = "block";
  }
</script>

    

<!-- Foto Wanita -->
<script type="text/javascript">
  document.getElementById("foto_wanita").onchange = function(){
    document.getElementById("base-img-wanita").src = URL.createObjectURL(foto_wanita.files[0]); // Preview new base-img-wanita

    document.getElementById("cancel-wanita").style.display = "block";
    //document.getElementById("confirm-wanita").style.display = "block";

    document.getElementById("upload-wanita").style.display = "none";
  }

  var userImage_wanita = document.getElementById('base-img-wanita').src;
  document.getElementById("cancel-wanita").onclick = function(){
    document.getElementById("base-img-wanita").src = userImage_wanita; // Back to previous image

    document.getElementById("cancel-wanita").style.display = "none";
    //document.getElementById("confirm-wanita").style.display = "none";

    document.getElementById("upload-wanita").style.display = "block";
  }
</script>

<!-- Input Number Telp -->
<script>
//number phone
function hanyaAngka(event) {
        var no-arrow = (event.which) ? event.which : event.keyCode
        if (no-arrow != 46 && no-arrow > 31 && (no-arrow < 48 || no-arrow > 57))
          return false;
        return true;
      }
</script>

<script>
//maximum input length
var inputQuantity = [];
    $(function() {     
      $(".no-arrow").on("keyup", function (e) {
        var $field = $(this),
            val=this.value,
            $thisIndex=parseInt($field.data("idx"),10); 
        if (this.validity && this.validity.badInput || isNaN(val) || $field.is(":invalid") ) {
            this.value = inputQuantity[$thisIndex];
            return;
        } 
        if (val.length > Number($field.attr("maxlength"))) {
          val=val.slice(0, 15);
          $field.val(val);
        }
        inputQuantity[$thisIndex]=val;
      });      
    });
</script>