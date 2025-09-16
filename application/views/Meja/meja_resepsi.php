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
                background: transparent;
                font-family: Arial, Helvetica, sans-serif;
            } 
            

            .navbar a.active {
            background-color: #76D7C4;
            color: white;
            }

            .main {
            padding: 16px;
            margin-bottom: 30px;
            }
            
            .pindah{
                width:50%;
                max-width:200px;
                box-sizing: border-box;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                background-color: transparent;
                border: 2px solid #e74c3c;
                border-radius: 0.6em;
                color: #e74c3c;
                cursor: pointer;
                display: flex;
                align-self: center;
                font-size: 1rem;
                font-weight: 200;
                line-height: 1;
                margin-top: 20px;
                margin-bottom:20px;
                padding: 1.2em 2.8em;
                text-decoration: none;
                text-align: center;
                text-transform: uppercase;
                font-family: 'Montserrat', sans-serif;
                font-weight: 400;
            }
            .pindah:hover, .pindah:focus {
            color: #fff;
            outline: 0;
            }
            .pindah {
            border-color: #f1c40f;
            color: #fff;
            background-image: linear-gradient(45deg, #f1c40f 50%, transparent 50%);
            background-position: 100%;
            background-size: 400%;
            transition: background 300ms ease-in-out;
            }
            .pindah:hover {
            background-position: 0;
            }

            .card-top-meja{
                background-color: #85FFBD;
                background-image: green;
                border-radius:5px;
            }
            .sisa{
                text-align:left;
            }
            .list_meja{
              display: flex;
              justify-content: flex-end;
            }
            .underline-input {
            font-family: 'Montserrat', sans-serif;
            background-color: transparent;
            border: none;
            outline: none;
            width: 100%;
            font-size: 1em;
            box-sizing: border-box;
            padding-bottom: 5px;
            border-bottom: 2px solid #000000;
            }


          .combobox {
            display: flex;
            align-items: center;
          }

          .label {
            color: white;
            margin-right: 10px;
            font-weight: bold;
          }

          .select-wrapper {
            position: relative;
          }

          select {
            width: 150px;
            height: 30px;
            border: none;
            border-radius: 5px;
            padding: 5px;
            background-color: #f2f2f2;
            color: #333;
            font-size: 14px;
          }

          select:focus {
            outline: none;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
          }

          /* Styling the dropdown arrow */
          select::-ms-expand {
            display: none;
          }

          select option {
            color: #333;
          }

        </style>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400&display=swap" rel="stylesheet">
<div class="content-wrapper">
<body class="hold-transition sidebar-mini" style="background:url(<?php echo base_url('front-end/images/img-support/background_web_meja_fix.png');?>) center center/cover no-repeat fixed;">
        <!-- Content Header (Page header) -->

  <div class="main"> 
      <section class="content">
          <div class="card" >
              <div class="card-header" style="background-color: #44b09e;background-image: linear-gradient(315deg, #44b09e 0%, #e0d2c7 74%);color:black; font-family: 'Josefin Sans', sans-serif; font-size:30px; ">
              <center>Informasi Meja</center>
                <div class ="row mt-3">
                  <div class="col-md-6" style="font-size:16px;">
                    <?php if(isset($hasil)):?>
                      <?php if($hasil == 'tambah'):?>
                        <?php if($this->session->flashdata('pesan_meja')) : ?>
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data Meja <strong>berhasil</strong> <?= $this->session->flashdata('pesan_meja'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <?php endif;  ?>
                      <?php elseif($hasil == 'pindah'):?>
                        <?php if($this->session->flashdata('pesan_pindah')) : ?>
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Tamu <strong>berhasil</strong> <?= $this->session->flashdata('pesan_pindah'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <?php endif;?>
                      <?php elseif($hasil == 'update_meja'):?>
                      <?php if($this->session->flashdata('pesan_pembaruan')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          Meja <strong>berhasil</strong> <?= $this->session->flashdata('pesan_pembaruan'); ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <?php endif;?>
                      <?php endif;?>
                    <?php endif;?>
                  </div>
                </div>
              </div>
          </div>
          <button class="pindah" data-toggle="modal" data-target="#pindah_meja" style="display: none;">Pindah Tempat</button>
      </section>
      
      <div class="list_meja ml-auto mb-4">
      <div class="btn-group mr-auto">
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Menu
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="<?= base_url('meja/tambah_meja'); ?>">Tambah Meja</a>
          <a class="dropdown-item" data-toggle="modal" data-target="#ListMeja">Edit</a>
        </div>
      </div>
        <div class="isi_text" style="color:white; margin-right:10px;font-weight:bold; margin-top:3px;">Kategori Meja : </div> 
        <form action="<?= base_url('meja/meja_resepsi'); ?>" id="my_kategori" method="POST" enctype="multipart/form-data" >

          <select name="kategori_aja" id="kategori_aja">
            <option value="ALL">Semua Kategori</option>
            <?php foreach($kategori_list as $kl):?>
            <option value="<?= $kl['kategori_meja']?>" <?php if($_SESSION['meja_list'] == $kl['kategori_meja']){
              echo 'selected';}else{}?>><?= $kl['kategori_meja']?></option>
            <?php endforeach;?>
          </select>
        </form>
      </div>

      
          <div class="row">

              <?php foreach($all_meja as $am):?>
                  <div class="col-6 col-md-auto" style="width:300px;">
                      <div class="card collapsed-card" style="background-color:rgb(48, 206, 209);">
                          <div class="card-header">
                              <h3 class="card-title"><?= $am['nomer_urut']?>. <?=$am['nama_meja']; ?></h3>
                              <div class="card-tools mt-2">
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse" style="color:black;"><i class="fas fa-info"></i>
                                  </button>
                              </div>
                          </div>
                          <div class="card-body" style="background-color:rgb(48, 206, 209);">
                          <ul class="list-group">

                          <?php foreach ($slot_kursi as $sk){
                          if ($sk['id_detil_meja'] == $am['id_detil_meja']){ ?>
                          <li class ="list-group-item" style="font-size:15px; padding-left:0px; padding-bottom: 2px; border: 0px solid rgba(0, 0, 0, 0.125);background-color:rgb(48, 206, 209);">
                          <?php foreach($nama_tamu as $nama):?>
                          <?php if ($nama['id_tamu'] == $sk['id_tamu'] && $nama['status'] == '1'):?>    
                              <?php if($nama['id_detil_meja'] == $sk['id_detil_meja']):?>
                                  <?php echo $nama['nama_tamu'].'<input type="checkbox" class="btn btn-outline-info float-right" name="pilih" style="text-align:middle; margin-right: -29px; margin-top:-2px; width:20px;height:20px" value="'. $sk['id_kursi'].'|'. $nama['id_tamu'].'$'.$sk['id_detil_meja'].'">'; ?>
                                  <div class="garis-bawah" style ="border-bottom: 1px solid black; padding-bottom:3px; width:120%; margin-left:-10px; display:block;"></div>
                              <?php endif;?>
                          <?php elseif($nama['id_tamu'] == $sk['id_tamu'] && $nama['status'] == '0'):?>
                              <?php if($nama['id_detil_meja'] == $sk['id_detil_meja']):?>
                                  <?php echo '[Belum Hadir]';?>
                                  <div class="garis-bawah" style ="border-bottom: 1px solid black; padding-bottom:3px; width:120%; margin-left:-10px; display:block;"></div>
                              <?php endif;?>
                          <?php endif;?>
                      <?php endforeach;?>
                      <?php if($sk['id_tamu'] == ''):?>
                          <?php echo '[Belum Diisi]';?>
                          <div class="garis-bawah" style ="border-bottom: 1px solid black; padding-bottom:3px; width:120%; margin-left:-10px; display:block;"></div>
                      <?php endif;?>
                              </li>
                              <?php }}; ?>
                              
                          </ul>
                          </div>
                      </div>
                  </div>

              <?php endforeach; ?>
              
          </div>
  </div>
</div>


<!--
<script>
    $('input[name=pilih]').on('change', function() {
    $('input[name=pilih]').not(this).prop('checked', false);  
    });
  document.querySelectorAll('input[name="pilih"]').forEach(function(el) {
  el.addEventListener('change', function() {
    var selected = this.value;
    var allSelected = true;
    // Cek semua checkbox yang memenuhi syarat
    document.querySelectorAll('input[name="pilih"][value^="' + selected.split('$')[0] + '$"]').forEach(function(el) {
      if (!el.checked) {
        allSelected = false;
      }
    });
    // Tampilkan atau sembunyikan button
    if (allSelected) {
      document.querySelector('.pindah').style.display = 'block';
    } else {
      document.querySelector('.pindah').style.display = 'none';
    }
  });
});
</script>
-->
<script>
  
  // | pengecekan untuk nilai dengan awal an |(value) sama |

  const checkboxes = document.getElementsByName('pilih');
const button = document.querySelector('.pindah');

checkboxes.forEach(checkbox => {
  checkbox.addEventListener('change', () => {
    const selectedValue = checkbox.value.split('|')[1];
    
    checkboxes.forEach(otherCheckbox => {
      if (otherCheckbox !== checkbox) {
        const otherValue = otherCheckbox.value.split('|')[1];
        otherCheckbox.disabled = selectedValue !== otherValue;
      }
    });

    const isChecked = Array.from(checkboxes).some(cb => cb.checked);
    if (isChecked) {
      button.style.display = 'block'; // Menampilkan button jika ada checkbox yang terpilih
    } else {
      button.style.display = 'none'; // Menyembunyikan button jika tidak ada checkbox yang terpilih
      checkboxes.forEach(cb => {
        cb.disabled = false;
      });
    }
  });
});


    



</script>

<!-- Modal Perpindahaan Kursi -->
<div class="modal fade" id="pindah_meja" tabindex="-1" role="dialog" aria-labelledby="pindah_mejaTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pindah_mejaTitle">Pindah Meja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="Form_meja" action="<?= base_url('meja/ubah_meja') ?>" method="post">
          <input type="hidden" name="id_kursi" class="id_kursi" value="" style="width: 100px;">
          <input type="hidden" name="id_tamu" class="id_tamu" value="" style="width: 100px;">
          <input type="hidden" name="id_detil_meja" class="id_detil_meja" value="" style="width: 100px;">
          <input type="hidden" name="jumlah" class="jumlah" value="" style="width: 100px;">
          <div class="judul" style ="margin-top:10px; margin-bottom:10px;">
          Perpindahan Meja Sdr : <span id="nama_tamu" value=""></span>
          </div>
          <div class="row" id="result">
            
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan Perpindahan</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    $('input[name=pilih]').click(function() {
      var checkboxes = document.getElementsByName('pilih');
      var countChecked = 0;

      checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
          countChecked++;
        }
      });

      $('input[name=jumlah]').val(countChecked);
      $('input[name=jumlah]').val(countChecked).attr('value',countChecked);

      if ($(this).is(':checked')) {
        var value = $(this).val();
        var parts = value.split("|"); // memisahkan nilai menjadi dua bagian berdasarkan karakter "|"
        var part1 = parts[0]; // mengambil nilai pertama yaitu "A1"
        var part2 = parts[1].split("$"); // memisahkan nilai kedua menjadi dua bagian berdasarkan karakter "$"
        var part3 = part2[1]; // mengambil nilai ketiga yaitu "C3"
        part2 = part2[0]; // mengambil nilai kedua yaitu "B2"
        $('.id_kursi').val(part1);
        $('.id_tamu').val(part2);
        $('.id_detil_meja').val(part3);
        $('.id_kursi').val(part1).attr('value', part1);
        $('.id_tamu').val(part2).attr('value', part2);
        $('.id_detil_meja').val(part3).attr('value', part3);
        
      }
    });
  });
</script>

<script>
    $(document).ready(function() {
  $('.pindah').click(function() { // Ganti #modalButton dengan id button yang memanggil modal
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('meja/tamu'); ?>", // Ganti nama_controller dengan nama controller yang akan dijalankan
      data: {id_tamu: $('.id_tamu').val()},
      dataType: "JSON",
      success: function(data) {
        $('#nama_tamu').html(data.nama);
        $('#nama_tamu').val(data.nama).attr('value', data.nama);
      } 
    });
  });
});
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
  $('.pindah').click(function() {
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('meja/cek_meja'); ?>",
      data: {id_tamu: $('.id_tamu').val(),id_detil_meja: $('.id_detil_meja').val(),jumlah: $('.jumlah').val()},
      dataType: "JSON",
      success: function(data) {
        var html = ''; // Deklarasikan variabel html sebagai string kosong
        $.each(data, function(index, item) {
          
          html += '<div class="col-md-4" style="width:170px; margin-bottom:10px;">';
          html += '<div class="card-top-meja">';
          html += '<div class="card-header">';
          html += '<h3 class="card-title" name="id_meja" value="'+ data[index].id_meja +'"> '+ data[index].nomer_urut+'. ' +  data[index].nama_meja +' </h3>';
          html += '</br><div class="sisa">Sisa : '+ data[index].Kosong +'</div>';
          html += '<div class="card-tools mt-2">';
          html += '<input type="radio" style="transform: scale(1.5);" name="meja" id="meja" value="'+ data[index].id_detil_meja +'|'+ data[index].id_meja +'" class="cb-meja"/>';
          html += '</div></div></div></div>';
        });
        $('#result').html(html); // Tampilkan hasil dalam elemen HTML dengan id "result"
      }
    });
  });
});

</script>

<script>

document.getElementById("Form_meja").addEventListener("submit", function(event) {
    event.preventDefault(); // prevent default form submission behavior
    var selectedValue = document.querySelector('input[name="meja"]:checked').value;
    var actionUrl = this.action + "?selectedValue=" + encodeURIComponent(selectedValue);
    this.action = actionUrl;
    this.submit();
});

</script>

<!-- PEMBARUAN DATA MEJA-->
<div class="modal fade" id="ListMeja" tabindex="-1" role="dialog" aria-labelledby="ListMejaTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Data Meja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <div class="row">
            <?php foreach($list_meja as $lm):?>
              <div class="col-6" style="width:200px;">
                <div class="card collapsed-card" style="background-color: #ffffff; background-image: linear-gradient(315deg, #ffffff 0%, #5899e2 74%);">
                    <div class="card-header">
                        <h3 class="card-title"> <?=$lm['nama_meja'];?></h3>
                        <div class="card-tools mt-2">
                            <button type="button" id="hapus_button" class="btn btn-tool" value="<?=$lm['id_meja']?>" data-toggle="modal" data-target="#delete_meja" style="color:black; margin-right:5px;"><i class="fas fa-trash"></i>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" style="color:black;"><i class="fas fa-info"></i>
                            
                            </button>
                        </div>
                    </div>
                    <div class="card-body border-dark" style="background-color:whitesmoke">
                    <ul class="list-group">
                    <form id="update" action="<?= base_url('meja/pembaruan_meja')?>" method="POST">
                      <input type="hidden" id="id_meja" name="id_meja" value ='<?= $lm['id_meja']?>'/>
                      Nama Meja : <input type ="text" class="underline-input" id ="nama_meja" name="nama_meja" value='<?= $lm['nama_meja']?>'/>
                      Kategori Meja : <input type ="text" class="underline-input" id="kategori_meja" name="kategori_meja" value='<?= $lm['kategori_meja']?>'/>
                      Jumlah Meja : <input type ="number" class="underline-input" id="jumlah_meja" name="jumlah_meja" value='<?= $lm['jumlah_meja']?>'/>
                      Jumlah Orang : <input type ="number" class="underline-input" id="jumlah_orang" name="jumlah_orang" value='<?= $lm['jumlah_orang']?>'/></br>
                      
                      <button type="submit" class="btn btn-info" name="update_data" value="<?= $lm['id_meja']?>">Simpan</button>  
                      </form>
                    </ul>
                    </div>
                </div>
              </div>
            <?php endforeach;?>
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
      
    </div>
  </div>
</div>


<!-- DELETE MEJA -->
<div class="modal fade" id="delete_meja" tabindex="-1" role="dialog" aria-labelledby="delete_mejaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete_mejaLabel">Konfirmasi Hapus Meja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('meja/hapus_meja'); ?>" method="POST">
        Apa Anda Yakin Menghapus Meja <label class="nama_meja_hapus" id="nama_meja_hapus" name="nama_meja_hapus"></label>? 
        <input type="hidden" class="id_meja" id="id_meja" name="id_meja"/>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-primary">Ya</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- ngambil data yang ingin dihapus-->
<script>
  $(document).on("click", "#hapus_button", function () {
    var id_meja = $(this).val();
    $(".id_meja").val(id_meja);

    // Retrieve values from PHP and assign them to JavaScript variables
    var list_meja = <?php echo json_encode($list_meja); ?>;

    // Loop through the list_meja array in JavaScript
    for (var i = 0; i < list_meja.length; i++) {
      if (list_meja[i]['id_meja'] == id_meja) {
        $(".nama_meja_hapus").text(list_meja[i]['nama_meja']);
        break; // Exit the loop once a match is found
      }
    }
  });
</script>




<script>
 document.querySelectorAll('button[name="update_data"]').forEach(button => {
  button.addEventListener('click', function() {
    var id_meja = this.value;
    var card = this.closest('.card');
    var nama_meja = card.querySelector('#nama_meja').value;
    var kategori_meja = card.querySelector('#kategori_meja').value;
    var jumlah_meja = card.querySelector('#jumlah_meja').value;
    var jumlah_orang = card.querySelector('#jumlah_orang').value;

    // Setel nilai input dalam form
    var form = document.getElementById('updateForm');
    form.querySelector('#id_meja').value = id_meja;
    form.querySelector('#nama_meja').value = nama_meja;
    form.querySelector('#kategori_meja').value = kategori_meja;
    form.querySelector('#jumlah_meja').value = jumlah_meja;
    form.querySelector('#jumlah_orang').value = jumlah_orang;

    // Kirim form ke controller
    form.submit();
  });
});
</script>

<script>
  document.getElementById("kategori_aja").addEventListener("change", function() {
    document.getElementById("my_kategori").submit();
  });
</script>





</body>
</html>
