<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
</nav>
    <div class="content-wrapper" style="background-color:#00a1805e;height:auto;min-width: fit-content;">
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
    
    <style>
    html{
    width:auto;
    }
    th {
      text-align: center;
      vertical-align: middle;
    }
    tr{
      text-align: center;
      vertical-align: middle;
    }
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
    </style>
        
                <div class="row justify-content-end mb-2" style="margin-left:13px;">
                    <div class="col-12" >
                    <a href="<?= base_url("tamu/tambah_tamu")?>" class="btn btn-4 btn-sep icon-send"> 
                    <i class="fas fa-plus-circle"></i>Tambah Tamu</a>
                    </div>
                    
                </div>
                <?php if($pesan_muncul =='ok'):?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  Data Tamu <strong> berhasil</strong> <?= $this->session->flashdata('pesan_tamu'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif;?>
            <div class="row" style="margin-left:13px; margin-right:13px;">
                <div class="col col-md-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="display:none;">id_tamu</th>
                            <th scope="col">Nama Tamu</th>
                            <th scope="col">Nama Meja</th>
                            <th scope="col">Nomer Telp</th>
                            <th scope="col">Link Undangan</th>
                            <th scope="col">Jumlah Orang</th>
                            <th scope="col">Kirim Link Lewat WhatsApp</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $nomer='1'?>
                          <?php foreach($list_tamu as $lt):?>
                            <tr>
                            <th scope="row"><?= $nomer ?></th>
                            <td style="display:none;"><?= $lt['id_tamu']?></td>
                            <td><?= $lt['nama_tamu']?></td>
                            <td><?= $lt['nama_meja']?></td>
                            <td><?= $lt['nomer_telp']?></td>
                            <td>
                            
                            <?php foreach($link_undangan as $lu):?>
                              <?php foreach($undangan as $u):?>
                                <?php if($u['id_template'] == $lu['id_template']):?>
                                  <a href="javascript:void(0);" onclick="window.open('<?php echo base_url();?><?= $lu['nama_template']?>?s=<?php echo $session_value;?>|<?=$lt['id_tamu']?>', '_blank');"  class="btn btn-info" role="button">Lihat Link</a>
                                <?php endif;?>
                              <?php endforeach;?>
                            <?php endforeach;?>
                            </td>
                              <td><?= $lt['jumlah']?></td>
                              <td>
                              <?php foreach($link_undangan as $lu):?>
                                <?php foreach($undangan as $u):?>
                                  <?php if($u['id_template'] == $lu['id_template']):?>
                                <a href="https://api.whatsapp.com/send?phone=<?=$lt['nomer_telp']?>&text=Halo <?= $lt['nama_tamu']?>, Kami dari quzresepsi.com merupakan pihak penyelenggara dari acara pernikahan <?=$u['nama_pria']?> dan <?= $u['nama_wanita']?>. Kami mengundang anda untuk datang keacara penikahan <?=$u['nama_pria']?> dan <?= $u['nama_wanita']?>, untuk undangan dapat diliat dengan menekan link ini : <?php echo base_url();?><?= $lu['nama_template']?>?s=<?php echo $session_value?>|<?=$lt['id_tamu']?>" target="_blank" class="btn btn-5" role="button"><i class="fab fa-whatsapp"></i>Kirim Link</button></a>
                                </td>
                                  <?php endif;?>
                                <?php endforeach;?>
                              <?php endforeach;?>
                              
                              <td>
                              <a href="<?= base_url('tamu/edit/'.$lt['id_tamu']) ?>" class="btn btn-warning" style="width: 40px;">
                                  <i class="fas fa-pen"></i>
                              </a>
                              </td>
                              <td>
                                <button type="button" class="btn btn-danger" name='hapus' id="hapus" data-toggle="modal" data-target="#hapus_tamu" value='<?= $lt['id_tamu']?>'>
                                  <i class="fas fa-trash"></i>
                                </button>
                              </td>
                              </tr>
                              <?php $nomer++?>
                              
                          <?php endforeach;?>
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    
    
    
<!-- Modal -->
<div class="modal fade" id="hapus_tamu" tabindex="-1" role="dialog" aria-labelledby="Hapus_tamuLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Hapus_tamuLabel">Hapus Tamu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('tamu/delete'); ?>" method="POST">
        Apakah Anda Yakin Menghapus Data Tamu ini ? 
        <input type="hidden" id="id_tamu_hapus" name="id_tamu_hapus" value="">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Ya</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script>
  $(document).on("click", "#hapus", function () {
        var id_tamu = $(this).val();
        $(".id_tamu_hapus").val(id_tamu);
    });

    $(document).on("click", "#hapus", function () {
    var id_tamu = $(this).val();
    $("#id_tamu_hapus").val(id_tamu);
    
});
</script>
