
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
</nav>

        <style>
        body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        }

        

        .main {
        padding: 16px;
        margin-bottom: 30px;
        }
        
        .muncul_list {
        text-align: left;
        }
        input[type="checkbox"] {
        width: 20px;
        height: 20px;
        }
        .kategori_name{
            padding-top:10px;
        }

        .form-group2{
        display: flex;
        align-items: center;
        margin-top:10px;
        margin-bottom:10px;
        }
        .form-group-new_kategori{
        margin-top:10px;
        margin-bottom:10px;
        }
        .form-group-list_kategori{
        display: none;
        margin-top:10px;
        margin-bottom:10px;
        }

        .muncul_list {
        margin-right: 10px;
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
        width: 100%;
        height: 40px;
        border: none;
        border-radius: 5px;
        padding: 5px;
        background-color: #478d95;
        color: #fff;
        font-size: 16px;
        }

        select:focus {
        outline: none;
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
        }

        /* Styling the dropdown arrow */
        select::-ms-expand {
        display: none;
        }

        select option .kategori {
        color: #fff;
        }

    </style>
    
    <script>
    function toggleForm() {
      var checkbox = document.getElementById("muncul_list");
      var formGroup = document.getElementById("form-group-list_kategori");
      var formGroupNew = document.getElementById("form-group-new_kategori");

      if (checkbox.checked) {
        formGroup.style.display = "none";
        formGroupNew.style.display = "block";
        checkbox.value='1';
      } else {
        formGroup.style.display = "block";
        formGroupNew.style.display = "none";
        checkbox.value='0';
      }
    }
  </script>

<div class="content-wrapper" style="background-color: mediumspringgreen;">
<body>
<a href="<?= base_url('Meja/meja_resepsi'); ?>" class="btn btn-info" style="margin-top:10px;margin-left:10px;">Kembali</a>



<div class="main">  
    <div class="container col-10">
        <div class="card shadow p-3 mb-5 bg-white rounded">
        
            <div class="card-header">
                <h5>Tambah Meja</h5> 
            </div>
            <div class="card-body">
                <form action="<?= base_url('meja/tambah_meja'); ?>" method="POST" enctype="multipart/form-data" >
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_detil_meja" name="id_detil_meja" placeholder="Id Meja" value="<?=$auto_id_detil_meja; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_meja" name="id_meja" placeholder="Id Meja" value="<?=$auto_id_meja; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_kursi" name="id_kursi" placeholder="Id Kursi" value="<?=$auto_id_kursi; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_tamu" name="id_tamu" placeholder="Id tamu" value="" readonly>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="waktu" name="waktu" placeholder="waktu" value="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nama Meja</label>
                        <input type="text" class="form-control" id="nama_meja" name="nama_meja" placeholder="Nama Meja" required>
                    </div>
                    
                    <div class="form-group2">
                        <input type="checkbox" class="muncul_list" id="muncul_list" name="muncul_list" placeholder="Nama Meja" onchange="toggleForm()" value='1' checked>
                        <label class="kategori_name">Buat Kategori Baru</label>
                    </div>

                    <div id="form-group-list_kategori" class="form-group-list_kategori">
                    <label for="kategori_meja">Kategori Meja :</label>
                        <select name="kategori_aja" id="kategori_aja">
                        <?php foreach($kategori_list as $kl):?>
                            <option class="kategori" value="<?= $kl['kategori_meja']?>" <?php if($_SESSION['meja_list'] == $kl['kategori_meja']){ echo 'selected';}else{}?>><?= $kl['kategori_meja']?></option>
                        <?php endforeach;?>
                        </select>
                    </div>

                    <div id="form-group-new_kategori" class="form-group-new_kategori">
                        <label for="kategori_meja">Kategori Meja :</label>
                        <input type="text" class="form-control" id="kategori_meja" name="kategori_meja" placeholder="Kategori Meja">
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput2">Jumlah Meja</label>
                        <input type="number" class="form-control" id="jumlah_meja" name="jumlah_meja" placeholder="Jumlah Meja" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Jumlah Orang/Meja</label>
                        <select class="form-control" id="jumlah_orang" name="jumlah_orang">
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                            <option value='6'>6</option>
                            <option value='7'>7</option>
                            <option value='8'>8</option>
                            <option value='9'>9</option>
                            <option value='10'>10</option>
                        </select>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" name ="tambah_meja" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</div>
</html>
