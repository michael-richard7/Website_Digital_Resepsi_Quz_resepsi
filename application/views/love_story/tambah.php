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
    <div class = "container-fluid" >
        <div class ="card col-md-6">
            <form action="<?= base_url('love_story/tambah'); ?>" method="POST" enctype="multipart/form-data" >
                <div class="modal-body">
                
                <div class="form-group mb-3">            
                    <input type="text" class="form-control" id ="id_LS" name="id_LS" placeholder="Id Love Story" value="<?php echo
                    $auto_id_LS;?>" readonly>
                </div>
                <div class="form-group mb-3">
                    <div class="text-left">
                    <h6>Judul Cerita : </h6>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Cerita" required>
                    </div>
                <div class="form-group mb-3">
                    <h6>Tanggal Berlangsung :</h6>  
                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal Berlangsung" required>
                </div>
                <div class="form-group mb-3">
                    <div class="text-left">
                    <h6>Isi Cerita Cinta : </h6>
                    <textarea class="form-control mb-3" id="story" name="story" placeholder="Story" required> </textarea>
                </div>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" id="id_resepsi" name="id_resepsi" placeholder="Id Resepsi" value="R1">
                </div>
                <div class="form-group mb-3">
                    <input type="hidden" class="form-control" id="status" name="status" value="1">
                </div>
                <div class="form-group mb-3 mt-3">
                    <input type="file" class="form-control" id="gambar_story" name="gambar_story" placeholder="Gambar" required>
                </div>
                <div class="modal-footer">
                    <a href=<?= base_url('Love_story/view')?> class="btn btn-outline-warning" role="button" aria-pressed="true">Kembali</a>
                    <button type="submit" name ="tambah" class="btn btn-outline-success">Tambah</button>
                </div>
            </form> 
        </div>    
    </div>
</div>