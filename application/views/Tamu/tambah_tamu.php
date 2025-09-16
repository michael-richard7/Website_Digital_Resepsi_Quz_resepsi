<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
</nav>

<div class="content-wrapper" style="background-color:#00a1805e;">
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

<style>
.btn-4 {
	background: #34495e;
	color: #fff;
}

.btn-4:hover {
	background: #2c3e50;
    color:LightGreen;
}

.btn-4:active {
	background: #2c3e50;
	top: 2px;
    color:black;
}

.btn-4:before {
	position: absolute;
	height: 100%;
	left: 0%;
	top: 0;
	line-height: 4;
	font-size: 180%;
	width: 60px;
}

.btn-4 i{
    margin-right:10px;
    position: relative;
}
.btn-5{
    background: #50ff02;
    color: #000;
}
.btn-5 i{
    margin-right:10px;
    position: relative;
}
.isi_judul{
    text-align:Left;
    margin-top:20px;
    margin-bottom: 5px;
    margin-left:20px;
    font-size:20px;
    
}
.isi_form{
    text-align:Left;
    margin-top:20px;
    margin-bottom: 20px;
    margin-left:20px;
    font-size:17px;
}
.button_cek_meja{
    background: #12eb57;
    color: #000;
    padding: 2px;
    border-radius: 10px;
    margin-left:0px;
    margin-top:10px;
    padding:4px;
    border-radius:10px;
}
.button_cek_meja i{
    margin-right:10px;
    margin-left: 5px;
    position: relative;
}

.cb-meja{
    width: 20px;
    height: 20px;
    margin-top: 0px;
    position: absolute;
    margin-left: -20px;
    top:20%;
}
.card-top-meja{
    background-color: #85FFBD;
    background-image: linear-gradient(45deg, #85FFBD 0%, #FFFB7D 100%);
    border-radius:5px;
}
.sisa{
    margin-top:25px;
    text-align:left;

}

/* Only Number Format*/
#nomer_telp::-webkit-inner-spin-button {
  display: none;
}
#nomer_telp::-webkit-outer-spin-button,
#nomer_telp::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Kirim Button */



.button_neon {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  margin-top: 30px;
  color: #fff;
  border: none;
  background-color: transparent;
  cursor: pointer;
  text-transform: uppercase;
  font-size: 16px;
  overflow: hidden;
  z-index: 1;
}

.button_neon:before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 0;
  height: 100%;
  background-color: #fff;
  transition: width 0.3s cubic-bezier(0.17, 0.67, 0.52, 0.97);
  z-index: -1;
}

.button_neon:hover:before {
  width: 100%;
}

.button-1 {
  color: #fff;
}

.button-1:before {
  background-color: #ff4f4f;
}

</style>
    <div class="container-fluid">
            <div class="row justify-content-end ml-1 mb-2">
                <div class="col-12">
                    <a href="<?= base_url("tamu/daftar")?>" class="btn btn-4 btn-sep icon-send"> 
                    <i class="fas fa-chevron-circle-left"></i>Kembali</a>
                </div>
            </div>
        <div class="row ">
            <div class="col col-md-12">
               <div class="card mt-2 ml-2 mr-2">
                    <div class="isi_judul">
                    Pendataan Tamu Baru
                    </div>
                    <div class="isi_form">
                    
                    <form id="Form_tamu" action="<?= base_url('tamu/tambah_tamu') ?>" method="post">
                        <div class="form-group">
                            <label class="col-form-label">Nama Tamu :</label>
                            <input type="text" class="form-control" id="nama_tamu" name="nama_tamu" style="width:350px;" 
                            value="<?php if(isset($nama_tamu)){
                            echo $nama_tamu;
                            }else{
                                echo '';
                            }?>" required>
                        </div>
                        <div class="form-group">
                            <div class="info" style="color: #11da11; font-size: 16px;">Jika Nomer +62 Tidak Perlu Memasukan Tanda ' + ' </div>
                            <label class="col-form-label">Nomer Telepon : </label><label class="note_nomer" style="margin-left:10px; font-size:14px; color:red;">*akan sebagai nomer tujuan untuk kirim link undangan via whatapps</label>
                            <input type="number" class="form-control" id="nomer_telp" name="nomer_telp" style="width:350px;" maxlength="15" value="<?php if(isset($nomer_telp)){
                            echo $nomer_telp;
                            }else{
                                echo '';
                            }?>" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Kategori Tamu :</label>
                            <select class="form-control" id="input_kategori_tamu" name="input_kategori_tamu" style="width:350px;">
                                <option selected>Silahkan Pilih Kategori Meja</option>
                                <?php foreach ($list_kategori as $k):?>
                                    <?php if( $kategori_meja == $k['kategori_meja']):?>
                                    <option selected value='<?= $k['kategori_meja']?>'><?= $k['kategori_meja']?></option>
                                    <?php else:?>
                                    <option value='<?= $k['kategori_meja']?>'><?= $k['kategori_meja']?></option>
                                    <?php endif;?>
                                    
                                <?php endforeach;?>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_tamu" class="col-form-label" >Jumlah Orang Yang Diundang :</label>
                            <input type="number" class="form-control" id="jumlah_tamu" name="jumlah_tamu" style="width:200px;" min="1" max="10" value="<?php if(isset($jumlah_tamu)){
                            echo $jumlah_tamu;
                            }else{
                                echo '';
                            }?>" required>
                        </div>
                        <button type ="submit" id="submitBtn" name="submit_button" value="cari_meja" class="button_cek_meja"><i class="fas fa-user-check"></i>cek ketersediaan kursi</button>
                    
                    <?php if($tampilan_opsi == 'OK'):?>
                    <!-- ISI PENGECEKAN -->
                    
                    <div class="judul-aja" style="margin-top:50px;"><p>Meja yang tersedia :</p>
                    </div>
                    <div class="row" >
                      <?php foreach($data_meja as $am):?>
                          <?php if($am['Sisa'] == 'Ya'):?>
                              <div class="col-4 col-md-auto" style="width:200px; margin-bottom:10px;">
                                  <div class="card-top-meja">
                                      <div class="card-header">
                                          <h3 class="card-title" name="id_meja" value="<?= $am['id_meja']; ?>"> <?=$am['nama_meja']; ?> </h3> 
                                          <center><div class="sisa">Sisa : <?=$am['Kosong']?></div></center>
                                          <div class="card-tools mt-2">
                                              <input type="checkbox" name="meja" value="<?= $am['id_detil_meja']; ?>|<?= $am['id_meja']; ?>" class="cb-meja"/>
                                          </div>
                                      </div>
                                      
                                  </div>
                              </div>
                          <?php endif;?>
                      <?php endforeach; ?>
                    </div>
                    <button type="submit" name="submit_button" value="simpan_data" class="button_neon button-1"> Tambah Tamu</button>
                    
                    <?php endif;?>
                    </form>
                    

                    </div>
               </div>
            </div>
        </div>
    </div>
</div>


<script>
    $('input[name="meja"]').on('change', function() {
  $('input[name="meja"]').not(this).prop('checked', false);  
});
</script>


</body>
</html>
  </script>




<script>
//number phone
function hanyaAngka(event) {
        var nomer_telp = (event.which) ? event.which : event.keyCode
        if (nomer_telp != 46 && nomer_telp > 31 && (nomer_telp < 48 || nomer_telp > 57))
          return false;
        return true;
      }
</script>

<script>
//maximum input length
var inputQuantity = [];
    $(function() {     
      $("#nomer_telp").on("keyup", function (e) {
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
<script>
  $(document).ready(function() {
    $("#myForm").submit(function(event) {
      event.preventDefault(); // Mencegah form untuk melakukan submit secara default
      
      // Ambil data form
      var formData = $(this).serialize();
      
      // Kirim data ke server menggunakan AJAX
      $.ajax({
        url: "<?php echo base_url('tamu/tambah_tamu'); ?>",
        type: "POST",
        data: formData,
        dataType: "json",
        success: function(response) {
          // Handle respons dari server
          alert(response.message);
          // Lakukan sesuatu setelah data berhasil dikirim
        },
        error: function() {
          alert("Terjadi kesalahan saat mengirim data!");
        }
      });
    });
  });
</script>



<!--
<script>
  $(document).ready(function() {
    $("#Form_tamu").submit(function(event) {
      event.preventDefault(); // Mencegah form untuk melakukan submit secara default
      
      // Ambil data form
      var formData = $(this).serialize();
      var jumlah_tamu = $("#jumlah_tamu").val();
      // Kirim data ke server menggunakan AJAX
      $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: formData,
        success: function(response) {
          // Handle respons dari server
          alert("Data berhasil dikirim! Jumlah tamu: " + jumlah_tamu);
          // Lakukan sesuatu setelah data berhasil dikirim
        },
        error: function() {
          alert("Terjadi kesalahan saat mengirim data!");
        }
      });
    });
  });
</script>-->

