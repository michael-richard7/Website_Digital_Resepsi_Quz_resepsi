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
             <li class="breadcrumb-item"><a href="<?= base_url("user")?>" style="color:black;">Home</a></li>
             <li class="breadcrumb-item"><a href="#"><?= $judul; ?></a></li>
          </ol>
        </div>
      </div>
    </div>
  </section>
<!-- Online Font -->
<link href="https://fonts.googleapis.com/css?family=Allura" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
<!-- End font-->
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js">
</script>
<style>

.container {
  display: flex;
  justify-content: center; 
  height: 10vh; 
}
#preview{
    max-width: 100%;
    max-height: 480;
    margin-bottom:10px;
    position: sticky;
    left:40%;
}

.card{
width: 100%;
height: 100%;
margin-left:20px;
margin-right:20px;
}

.nama_tamu {
  width: 100%;
  max-width: 300px; /* sesuaikan dengan lebar yang Anda inginkan */
  text-align: center; /* menempatkan teks di tengah secara horizontal */
  justify-content:center;
  background: transparent;
  color:white;
  border: none;
  border-bottom: 0; /* garis bawah input */
  outline: none;
  font-size: 16px;
  padding: 0px 0;
  margin-bottom:20px;
}
.Lnama_tamu{
  position: relative;
  justify-content: center;
  align-items:center;
  text-align: center;
  top: 10px;
}

.nama_meja{
  width: 100%;
  max-width: 300px;
  text-align: left;
  justify-content:center;
  background: transparent;
  color:white;
  border: none;
  border-bottom: 0;
  outline: none;
  font-size: 16px;
  padding: 5px 0px;

}
.Lnama_meja{
    margin-left:15%;
}

.jumlah_orang{
  width: 100%;
  max-width: 300px;
  text-align: center;
  justify-content:center;
  background: transparent;
  color:white;
  border: none;
  border-bottom: 0;
  outline: none;
  font-size: 16px;
  padding: 5px 0;
}
.Ljumlah_orang{
    position: relative;
    text-align: center;
    margin-left:65%;
    top :-68px;
}

.id_tamu{
  width: 100%;
  max-width: 300px;
  text-align: center;
  justify-content:center;
  background: transparent;
  color:white;
  border: none;
  border-bottom: 0;
  outline: none;
  font-size: 16px;
  padding: 5px 0;
}

</style>
<script type="text/javascript">
  function scan(){
    var nilai = document.getElementById("id_tamu").value;
    if(nilai.lenght > 1){
      console.log('Halo Cuy lebih dari satu neh');
      form.submit();
    }
  }

</script>
<?php 
if(isset($update_kehadiran)){
  if ($update_kehadiran == 'lama') {
    echo "<script>
    window.addEventListener('load', function() {
      $('#wellcome_modal').modal('show');
  });
    </script>";
  }
  elseif ($update_kehadiran == 'baru') {
    echo "<script>

    window.addEventListener('load', function() {
        $('#wellcome_modal').modal('show');
    });
    </script>";
  }
  elseif ($update_kehadiran == 'null value') {
    echo "<script>

    window.addEventListener('load', function() {
        $('#gagal_modal').modal('show');
    });
    </script>";
  }
}
?>
<center>
<video id="preview"></video>
</br>
<label for="mycamera" style>Pilih Kamera:</label>
<select id="mycamera">
  <option value="">--Pilih--</option>
</select>
</center>    
    <script type="text/javascript">
      var form = document.getElementById('cek_id');
      var scanner = null;

      function startScanner(cameraId) {
        if (scanner != null) {
          scanner.stop();
        }
        scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror: false });
        scanner.addListener('scan', function (content) {
          document.getElementById('id_tamu').value = content;
          form.submit();
          console.log(content);
        });
        Instascan.Camera.getCameras().then(function (cameras) {
          if (cameras.length > 0) {
            var selectedCamera = null;
            if (cameraId) {
              selectedCamera = cameras.find(function (camera) {
                return camera.id === cameraId;
              });
            }
            if (selectedCamera == null) {
              selectedCamera = cameras[0];
            }
            scanner.start(selectedCamera);
            document.getElementById('mycamera').value = selectedCamera.id;
          } else {
            console.error('No cameras found.');
          }
        }).catch(function (e) {
          console.error(e);
        });
      }

      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          for (var i = 0; i < cameras.length; i++) {
            var camera = cameras[i];
            var option = document.createElement('option');
            option.value = camera.id;
            option.text = camera.name || 'Kamera ' + (i + 1);
            document.getElementById('mycamera').appendChild(option);
          }
          startScanner(null);
          document.getElementById('mycamera').addEventListener('change', function () {
            startScanner(this.value);
          });
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>

<div class="container-fluid">
    <div class ="row">
    
    <div class="card bg-dark text-white">
            <div class="card-body">
                <h5><u>Informasi Undangan</u> </h5>
                <p>
                <form id="cek_id" action="<?= base_url('/scanQR/add_tamu'); ?>" method="POST">
                  <input type="hidden" class ="id_tamu" name="id_tamu" id="id_tamu" placeholder="[ID Tamu Yang Scan]" />
                  <button onclick="scan()" style="display:none;"> Scan Me </button>
                </form>

                <center><label class="Lnama_tamu">Atas Nama : </p>
                    <input type="text" class ="nama_tamu" name="nama" id="nama" placeholder="[Nama Tamu]"  
                    <?php if($cek == 'ada'):?>
                      value = "<?= $tamu->nama_tamu ?>"
                    <?php elseif($cek == 'tidak_ada'):?>
                                        
                    <?php endif;?>
                    readonly/>
                
                </label></center>
                </br>
                <label class="Lnama_meja">
                    Nama Meja :
                <input type="text" class ="nama_meja" name="nama_meja" id="meja" placeholder="[Nama Meja]" 
                <?php if($cek == 'ada'):?>
                  value = "<?= $tamu->nama_meja ?>"
                <?php elseif($cek == 'tidak_ada'):?>
                                        
                <?php endif;?>
                readonly/>
                </label>
                <label class="Ljumlah_orang">
                    Jumlah Orang :
                <input type="text" class ="jumlah_orang" name="jumlah_orang" id="jumlah" placeholder="[Jumlah Orang/Meja]" 
                <?php if($cek == 'ada'):?>
                  value = "<?= $tamu->jumlah ?>"
                <?php elseif($cek == 'tidak_ada'):?>
                                        
                <?php endif;?>readonly />
                </label>
              
            </div>
        </div>
        </div>
        
</div>
    
</div>
<body>
    

  
  



<script>
  // mengambil form dan input
  var form = document.getElementById('cek_id');
  var id_tamu = document.getElementById('id_tamu');
  var previousValue = "halo";

  // menambahkan event listener untuk input id_tamu
  id_tamu.addEventListener('input', function() {
    // memeriksa perubahan nilai pada input id_tamu
    if (previousValue !== id_tamu.value) {
      previousValue = id_tamu.value;
      form.submit();
    }
  });
</script>

<div class="modal fade" id="wellcome_modal" tabindex="-1" role="dialog" aria-labelledby="wellcome_modalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <center> 
      <div class="tamu_modal">Hi, <?= $tamu->nama_tamu?></div>
      <div class="wellcome">Wellcome</div> 
        TO THE WEDDING OF
        <div class="nama_pasangan">
        <?= $acara->nama_resepsi?>
        </div>
        </center>
        <div class="nama_tamu_modal">
         
        </div>
      </div>
      <button type="button" class="btn btn-secondary" style="border-radius:0px;"data-dismiss="modal">Tutup</button>
      
    </div>
  </div>
</div>

<div class="modal fade" id="gagal_modal" tabindex="-1" role="dialog" aria-labelledby="gagal_modalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-gagal-body">
      <center> 
        Data Tamu Tidak DiTemukan
        </center>
      </div>
      <button type="button" class="btn btn-secondary" style="border-radius:0px;"data-dismiss="modal">Tutup</button>
      
    </div>
  </div>
</div>

<style>

.wellcome{
  font-family: 'Allura', cursive;
  font-size:70px;
  font-style:bold;
}
.modal-body{
  font-family: 'Righteous';
  background-color:skyblue;
}
.tamu_modal{
  font-size:20px;
}

.modal-gagal-body{
  font-family: 'Righteous';
  background-color:Red;
  color:white;
  font-size:20px;
  padding:10px;
}
</style>

