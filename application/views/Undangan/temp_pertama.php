
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from astheme.ourdreamit.com/sweetheart/p-s-t/grid-gallery/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Dec 2021 09:20:07 GMT -->
<head>
    
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="cache-control" content="no-cache">

    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,minimum-scale=1">
    <meta name="description" content="Sweetheart - Responsive Wedding Template">
    <meta name="keywords" content="wedding,events,ceremony,couple,pear,love">
    <meta name="author" content="AStheme">

    <!-- Page Title -->
    <title> Quz Resepsi || Template </title>

    <!-- Favicon and Touch Icons -->
    <link href="<?=base_url('front-end/')?>images/favicon.png" rel="shortcut icon" type="image/png">
    <link href="<?=base_url('front-end/')?>images/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="<?=base_url('front-end/')?>images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="<?=base_url('front-end/')?>images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
    <link href="<?=base_url('front-end/')?>images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <!-- Icon fonts -->
    <link href="<?=base_url('front-end/')?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url('front-end/')?>css/flaticon.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('front-end/')?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Plugins for this template -->
    <link href="<?=base_url('front-end/')?>css/animate.css" rel="stylesheet">
    <link href="<?=base_url('front-end/')?>css/owl.carousel.css" rel="stylesheet">
    <link href="<?=base_url('front-end/')?>css/owl.theme.css" rel="stylesheet">
    <link href="<?=base_url('front-end/')?>css/owl.transitions.css" rel="stylesheet">
    <link href="<?=base_url('front-end/')?>css/jquery.fancybox.css" rel="stylesheet">

    <!-- Custom styles for this template -->
   

    <!-- Custom cerita cinta-->
    
	<!-- Site CSS -->
    <link rel="stylesheet" href="<?= base_url('back-end/'); ?>plugins/source_template2/css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?= base_url('back-end/'); ?>plugins/source_template2/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('back-end/'); ?>plugins/source_template2/css/custom.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<link rel="stylesheet" href="<?= base_url('back-end/'); ?>plugins/template/css/temp1.min.css">



<div id="myModel" class="modal fade" role="dialog">
    
        <div class="background">               
                <?php foreach ($undangan as $m) : ?>
                    <audio id="song">
                        <source src="<?= base_url('/front-end/music/'). $m['musik']; ?>" type="audio/mp3">
                    </audio>
                <?php endforeach; ?>
            <div class="gambar_depan"><img src="<?=base_url('front-end/images/gambar_cover/cover_template1.jpg')?>" alt id="gambar_cover">
            </div>

            <div class="isi-cover">
                <div class="konsep3">You Are Invited!
                    <br>
                    The Wedding Of
                </div>
                <?php foreach($undangan as $b) :?>
                <div class="konsep4">
                    <a class="nav_pria" style="margin-top:10px;"><?=$b['nama_pria']?></br></a>
                    <div class="batas"> & </div>
                    <div class="nav_wanita"><?=$b['nama_wanita']?></div>
                </div>
                <?php endforeach; ?>
                <?php foreach($undangan as $b):?>
                <div class="konsep5">
                <a class="dav">Bapak/Ibu :
                
                <?php if(isset($tamu)){
                    foreach($tamu as $t){
                        echo $t['nama_tamu'];
                    };
                } else {
                    echo '[Nama Tamu]';
                }?>

                </a>
                </div>
                <?php endforeach; ?>
                <div class="openin">
                    <!--<button  type="button" class="btn btn-default" data-dismiss="modal">Open Invitation</button>-->
                    <button onclick="playAudio()" type="button" class="btn btn-default" data-dismiss="modal">Open Invitation</button>

                </div>
            </div>
            <script type="text/javascript">
                var el = document.getElementById("song");
                function playAudio()
                {
                    el.play();
                }
            </script> 
    </div> 
</div>
<body id="home">

    <!-- start page-wrapper -->
    <div class="page-wrapper">

    <!--Control Audio-->
    <!--<audio controls autoplay="true">-->
        <!--<?php foreach ($undangan as $m) : ?>
            <audio id="player" loop>
            <source src="<?= base_url('/front-end/music/'). $m['musik']; ?>" type="audio/mp3">
            </audio>
        <?php endforeach; ?>
        -->


    <!--</audio>-->
        <!-- Preloader -->
        <div class="preloader">
            <div class="middle">
                <i class="fa fa-heart"></i>
                <i class="fa fa-heart"></i>
                <i class="fa fa-heart"></i>
                <i class="fa fa-heart"></i>
            </div>
        </div>
        <!-- end preloader --> 


        <!-- Start header -->
        <header id="header">
            <nav class="navigation navbar navbar-default">
                <div class="container">
                    <?php foreach($undangan as $u) :?>
                    <div class="navbar-header">
                        <button type="button" class="open-btn">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><?=$u['nama_pria']?> &amp; <?=$u['nama_wanita']?></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse navbar-right">
                        <button class="close-navbar"><i class="fa fa-close"></i></button>
                        <ul class="nav navbar-nav">
                            <li class="mobile-menu-logo"><?=$u['nama_pria']?> <i class="fa fa-heart"></i> <?=$u['nama_wanita']?></li>
                            <li class="active"><a href="#home">Home</a></li>
                            <li><a href="#couple">Couple</a></li>
                            <li><a href="#story">Story</a></li>
                            <li><a href="#events">Events</a></li>
                            <li><a href="#gallery">Gallery</a></li>
                            <li><a href="#qr_code">QR Code</a></li>
                            <li><a href="#gift">Gift</a></li>
                        </ul>
                    </div><!-- end of nav-collapse -->
                    <?php endforeach; ?>
                </div><!-- end of container -->
            </nav>

            <div class="logo-bottom-shape-wrapper container">
                <?php foreach ($undangan as $u) : ?>
                    <div class="logo-bottom-shape wow fadeInDown" data-wow-delay="4s">
                    <span><?=substr($u['nama_pria'],0,1);?> <i class="fa fa-heart"></i> <?=substr($u['nama_wanita'],0,1);?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </header>
        <!-- end of header -->


        <!-- start of hero -->   
        <section class="hero hero-slider-wrapper">
            <div class="cover">
                <?php foreach ($undangan as $h) : ?>
                    <img src="<?=base_url('front-end/images/gambar_cover/').$h['gambar_cover']?>">
                <?php endforeach; ?>
            </div>
            <div class="announcement-wrapper">
                <div class="announcement">
                    <span class="married-text">
                        <span class=" wow fadeInUp" data-wow-delay="0.05s">W</span>
                        <span class=" wow fadeInUp" data-wow-delay="0.10s">e</span>
                        <span class=" wow fadeInUp" data-wow-delay="0.15s">'</span>
                        <span class=" wow fadeInUp" data-wow-delay="0.20s">r</span>
                        <span class=" wow fadeInUp" data-wow-delay="0.25s">e</span>
                        <span>&nbsp;</span>
                        <span class=" wow fadeInUp" data-wow-delay="0.30s">g</span>
                        <span class=" wow fadeInUp" data-wow-delay="0.35s">e</span>
                        <span class=" wow fadeInUp" data-wow-delay="0.40s">t</span>
                        <span class=" wow fadeInUp" data-wow-delay="0.45s">i</span>
                        <span class=" wow fadeInUp" data-wow-delay="0.50s">n</span>
                        <span class=" wow fadeInUp" data-wow-delay="0.55s">g</span>
                        <span>&nbsp;</span>
                        <span class=" wow fadeInUp" data-wow-delay="0.60s">m</span>
                        <span class=" wow fadeInUp" data-wow-delay="0.65s">a</span>
                        <span class=" wow fadeInUp" data-wow-delay="0.70s">r</span>
                        <span class=" wow fadeInUp" data-wow-delay="0.75s">r</span>
                        <span class=" wow fadeInUp" data-wow-delay="0.80s">i</span>
                        <span class=" wow fadeInUp" data-wow-delay="0.85s">e</span>
                        <span class=" wow fadeInUp" data-wow-delay="0.90s">d</span>
                    </span>

                    <?php foreach ($undangan as $b) : ?>
                        <div class="couple-name wow fadeInUp" data-wow-delay="2s">
                            <h1> <?= $b['nama_pria']; ?> &amp; <?= $b['nama_wanita']?></h1>
                        </div>
                        <span class="date wow fadeInUp" data-wow-delay="3s"><?= date("d-m-Y",strtotime($b['tanggal_resepsi'])); ?></span>
                        <span class="vector wow fadeInUp" data-wow-delay="3.5s"></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- end of hero slider -->


        <!-- start count-down -->
        <section class="count-down">
            <div class="container">
                <div class="row">
                    <div class="col col-md-4 hidden-sm hidden-xs">
                        <h2>Our Big Day</h2>
                    </div>
                    <div class="col col-md-8">
                        <div id="clock"></div>
    <script>
      // set waktu akhir countdown (YYYY, M-1, D, H, m, s)
      <?php foreach($undangan as $u):?>
        <?php 
        $tanggal = $u['tanggal_resepsi'];
        $tahun = substr($tanggal, 0, 4);
        $bulan = substr($tanggal, 5, 2);
        $hari = substr($tanggal, 8, 2);
        ?>
        var countdownDate = new Date(<?php echo $tahun ?>, (<?php echo $bulan ?> -1), <?php echo $hari ?>, 0, 0, 0).getTime();
      <?php endforeach;?>


      // update countdown setiap 1 detik
      var countdownInterval = setInterval(function() {

        // dapatkan waktu sekarang
        var now = new Date().getTime();

        // hitung selisih waktu antara sekarang dan waktu akhir countdown
        var timeRemaining = countdownDate - now;

        // hitung waktu dalam hari, jam, menit, dan detik
        var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
        var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

        // tampilkan waktu countdown dalam elemen HTML yang diinginkan
        document.getElementById("clock").innerHTML = "<span>" + days + "</br>" +"<p>"+ "Hari" +"</p>" + "</span>" + "<span>" + hours + "</br>" + "<p>" + "Jam" + "</p>"+  "</span>" + "<span>" + minutes + "</br>" +"<p>" + "Menit" + "</p>"+ "</span>" + "<span>" + seconds + "</br>" +"<p>" + "Detik" + "</p>"+ "</span>";
        

        // jika waktu countdown telah habis, hentikan interval
        if (timeRemaining < 0) {
          clearInterval(countdownInterval);
          document.getElementById("clock").innerHTML = "Waktu sudah habis!";
        }
      });
    </script>
                    </div>
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </section>
        <!-- end of count-down -->


        <!-- start couple -->
        
        <section class="couple section-padding parallax-flower" data-bg-image-top="<?=base_url('front-end/images/img-support/tb/')?>b3.jpg" id="couple" style ="background-size:cover">
            <div class="container">
                <div class="row section-title">
                    <div class="title-box">
                        <div class="double-line double-line-top">
                            <i class="fi flaticon-social"></i>
                            <i class="fi flaticon-social"></i>
                        </div>
                        <h2>Happy couple</h2>
                        <div class="double-line double-line-bottom"></div>
                    </div>
                </div>

                <?php foreach ($info_pria as $ip): ?> 
                    <div class="row groom">
                        <div class="col col-md-4 col-sm-5 wow fadeInLeftSlow" data-wow-duration="2s" data-wow-delay="0.5s">
                            <div class="pic">
                                <img src="<?= base_url('front-end/images/foto_pria/') . $ip['foto']; ?>" class="img img-responsive" alt>
                            </div>
                        </div>
                        <div class="col col-md-8 col-sm-7 wow fadeInLeftSlow" data-wow-duration="2s">
                            <div class="details">
                                <span>Pihak Laki-Laki</span>
                                <?php foreach($undangan as $u):?>
                                <h4> <?= $u['nama_pria'];?></h4>
                                <?php endforeach;?>
                                <div class="table-responsive">
                                    <table class="table">
                                        <colgroup>
                                            <col class="first-col">
                                            <col class="sec-col">
                                        </colgroup>
                                        <tr>
                                            <td>Nama</td>
                                            <td><?=$ip['nama_lengkap'];?> </td>
                                        </tr>
                                        <tr>
                                            <td>Merupakan Anak </td>
                                            <td><?=$ip['anak_ke'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Ayah</td>
                                            <td>Bpk. <?=$ip['ayah'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Ibu</td>
                                            <td>Ibu. <?=$ip['ibu'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Lahir</td>
                                            <td><?=date("d-m-Y",strtotime($ip['tanggal_lahir']));?>  </td>
                                        </tr>
                                        <tr>
                                            <td>Handphone</td>
                                            <td><?=$ip['nomer_telp'];?></td>
                                        </tr>
                                    </table>
                                </div>
                                <p><?=$ip['bio'];?></p>
                                
                            </div>
                        </div>
                    </div> 
                    <?php endforeach; ?>
                    <?php foreach($info_wanita as $iw):?>
                        <div class="row bride">
                    <div class="col col-md-4 col-md-push-8 col-sm-5 col-sm-push-7 wow fadeInRightSlow" data-wow-duration="2s" data-wow-delay="0.5s">
                        <div class="pic">
                            <img src="<?= base_url('front-end/images/foto_wanita/') . $iw['foto']; ?>" class="img img-responsive" alt>
                        </div>
                    </div>
                    
                    <div class="col col-md-8 col-md-pull-4 col-sm-7 col-sm-pull-5">
                        <div class="details wow fadeInRightSlow" data-wow-duration="2s">
                            <span>Pihak Perempuan</span>
                            <?php foreach($undangan as $u):?>
                                <h4> <?= $u['nama_wanita'];?></h4>
                                <?php endforeach;?>
                                <div class="table-responsive">
                                    <table class="table">
                                        <colgroup>
                                            <col class="first-col">
                                            <col class="sec-col">
                                        </colgroup>
                                        <tr>
                                            <td>Nama</td>
                                            <td><?=$iw['nama_lengkap'];?> </td>
                                        </tr>
                                        <tr>
                                            <td>Merupakan Anak </td>    
                                            <td><?=$iw['anak_ke'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Ayah</td>
                                            <td>Bpk. <?=$iw['ayah'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Ibu</td>
                                            <td>Ibu. <?=$iw['ibu'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Lahir</td>
                                            <td><?=date("d-m-Y",strtotime($iw['tanggal_lahir']));?>  </td>
                                        </tr>
                                        <tr>
                                            <td>Handphone</td>
                                            <td><?=$iw['nomer_telp'];?></td>
                                        </tr>
                                    </table>
                                </div>
                                <p><?=$iw['bio'];?></p>
                       
                        </div>
                    </div>
                </div> <!-- end of bride -->
                <?php endforeach; ?>
               
            </div> <!-- end of container -->
        </section>
        <!-- end of couple -->

        <!-- start of story -->
   

        <section class="gallery section-padding parallax-flower" data-bg-image-top="<?=base_url('front-end/images/img-support/tb/')?>b3.jpg" id="story" style ="background-size:cover">
                <!-- Start Story -->
                    <div id="story" class="story-box main-timeline-box">
                        <div class="container">
                            <div class="row section-title">
                                <div class="title-box">
                                        <div class="double-line double-line-top">
                                            <i class="fi flaticon-social"></i>
                                            <i class="fi flaticon-social"></i>
                                        </div>
                                    <h2>Sweet love story</h2>
                                    <div class="double-line double-line-bottom">
                                        
                                    </div>
                                </div>
                            </div>
                            <?php 
                            $opsi = 0;
                            $kiri = 0;
                            $kanan = 1;?>
                            <?php foreach($cerita_cinta as $c):?>
                                <?php 
                                
                                if($kiri == 0 && $opsi == 0){
                                    echo '<div class="row timeline-element separline">
                                    <div class="timeline-date-panel col-xs-12 col-md-6  align-left">         
                                        
                                    </div>
                                    <span class="iconBackground"></span>
                                    <div class="col-xs-12 col-md-6 align-left">
                                        <div class="timeline-text-content">
                                            
                                            <h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-font">'; 
                                            echo date("d F Y",strtotime($c['tanggal_cerita'])); 
                                            echo '</br>';echo$c['judul_cerita']; echo'</h4>
                                            <p class="mbr-timeline-text mbr-fonts-style display-7">';
                                            echo $c['isi_cerita']; 
                                            echo '</p>
                                        </div>
                                    </div>
                                </div>';
                                $kiri = 1;
                                $opsi = 1;
                                }
                                if($kanan == 0 && $opsi == 1 ){
                                    echo '<div class="row timeline-element reverse separline">
                                    <div class="timeline-date-panel col-xs-12 col-md-6  align-left">         
                                        
                                    </div>
                                    <span class="iconBackground"></span>
                                    <div class="col-xs-12 col-md-6 align-right">
                                        <div class="timeline-text-content">
                                            <h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-font">'; 
                                            echo date("d F Y",strtotime($c['tanggal_cerita'])); 
                                            echo '</br>';echo$c['judul_cerita']; echo'</h4>
                                            <p class="mbr-timeline-text mbr-fonts-style display-7">';
                                            echo $c['isi_cerita']; 
                                            echo '</p>
                                        </div>
                                    </div>
                                </div>';
                                $kanan = 1;
                                $opsi = 0;
                                }
                                if($kiri == 1 && $opsi == 1){
                                    $kanan = 0;
                                    $opsi = 1;
                                }elseif($kanan == 1 && $opsi == 0){
                                    $kiri = 0;
                                    $opsi = 0;
                                }
                                
                                ?>

                            <?php endforeach;?>
                            </div><!-- end of container -->
                    </div> 
            </section>
        <!-- end of story -->


        <!-- start events -->
        <section class="gallery section-padding parallax-flower" data-bg-image-top="<?=base_url('front-end/images/img-support/tb/')?>b3.jpg" id="events" style ="background-size:cover">
            <section class="events section-padding" id="events">
            
                <div class="container">
                    <div class="row section-title">
                        <div class="title-box">
                            <div class="double-line double-line-top">
                                <i class="fi flaticon-social"></i>
                                <i class="fi flaticon-social"></i>
                            </div>
                            <h2>The wedding</h2>
                            <div class="double-line double-line-bottom"></div>
                        </div>
                    </div> <!-- end of section-title -->

                    <div class="row content">
                        <div class="col col-md-6">
                            <div class="event-boxes">
                                <div class="left-half"></div>
                                <div class="right-half"></div>
                                <div class="clip"><i class="fi flaticon-clip-1"></i></div>
                                <div class="event-box-inner">
                                    <div class="main-ceromony">
                                        <h3>Acara Resepsi</h3>
                                        <ul><?php foreach($undangan as $u):?>
                                            <li><i class="fa fa-calendar"></i> <?=date("d-m-Y",strtotime($u['tanggal_resepsi']));?> (<?= $u['jam_resepsi']?>)</li>
                                            <li><i class="fa fa-location-arrow"></i><?= $u['alamat_resepsi']?></li>
                                            <?php endforeach;?>
                                        </ul>
                                    </div>
                                    <div class="reception">
                                        <h3>Akad Perkawinan</h3>
                                        <ul>
                                            <li><i class="fa fa-calendar"></i> <?=date("d-m-Y",strtotime($u['tanggal_akad']));?> (<?= $u['jam_akad']?>)</li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col col-md-4">
                            <div class="peta">
                                <?php foreach($undangan as $u):?>
                                <iframe <?= $u['peta_lokasi']?> style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div> <!-- end of container -->
            </section>
            <!-- end of events -->
        </section>


        <!-- start of bquotes -->
        <section class="bquotes">
            <h2 class="hidden">Wishes</h2>
            <div class="container">
                <div class="row">
                    <div class="col col-md-8 col-md-offset-2">
                        <div class="bquotes-slider">
                            <div class="item">
                            <div class="text">
                                    <p>"Pernikahan merupakan hidup bersama saling membangun bukan hanya menutupi kekurangan satu sama lain."</p>
                                </div>
                                <div class="footer">
                                    <p>- Quz -</p>
                                </div>
                                
                            </div>
                            <div class="item">
                            <div class="text">
                                    <p>"Sebab itu laki-laki akan meninggalkan ayah dan ibunya dan bersatu dengan isterinya, sehingga keduanya itu menjadi satu daging. Demikianlah mereka bukan lagi dua, melainkan satu. Karena itu, apa yang telah dipersatukan Allah, tidak boleh diceraikan manusia."</p>
                                </div>
                                <div class="footer">
                                    <p>Matius 19:5-6</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end of container -->
        </section>
        <!-- end of bquotes -->


        


        <!-- start gallery -->
        <section class="gallery section-padding parallax-flower" data-bg-image-top="<?=base_url('front-end/images/img-support/tb/')?>b3.jpg" id="gallery" style ="background-size:cover">
           <div class="container">
                <div class="row section-title">
                    <div class="title-box">
                        <div class="double-line double-line-top">
                            <i class="fi flaticon-social"></i>
                            <i class="fi flaticon-social"></i>
                        </div>
                        <h2>Photo gallery</h2>
                        <div class="double-line double-line-bottom"></div>
                    </div>
                </div> <!-- end of section-title -->

                <div class="row gallery-boxes">
                    <?php foreach($galeri as $g):?>
                        <div class="col col-md-3 col-xs-6 wow fadeIn" data-wow-delay='0.5'>
                            <div class="box">
                                <a href="<?=base_url('front-end/images/galeri_foto/').$g['foto']?>" class="fancybox" data-fancybox-group="gallery">
                                    <img src="<?=base_url('front-end/images/galeri_foto/').$g['foto']?>" style="width:250px; height:250px"  class="img img-responsive" alt>
                                    <div class="fade-icon">
                                        <span class="icon"><i class="fa fa-search"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach;?>
                    
                </div>
            </div> <!-- end of container -->
        </section>
        
        
        <!-- end of gallery -->

        
        <!-- start of QR-CODE -->
        <section class="gallery section-padding parallax-flower" data-bg-image-top="<?=base_url('front-end/images/img-support/tb/')?>b3.jpg"  id="qr_code" style ="background-size:cover">
        <div class="container">
            <div class="row section-title">
                <div class="title-box">
                    <div class="double-line double-line-top">
                        <i class="fi flaticon-social"></i>
                        <i class="fi flaticon-social"></i>
                    </div>
                    <h2>QR Code</h2>
                    <div class="double-line double-line-bottom"></div>
                    <div class="row ">
                        <div class="isi-qr" style="margin-top:40px;">
                            Silahkan Scan QR Code Dibawah Ini, Sebagai Absensi Kehadiran Anda. </br>
                        </div>
                            
                        <?php
                          $kode = '';
                          if(isset($tamu)){
                              foreach($tamu as $t){
                                  $kode .= $t['id_tamu'];
                              };
                          } else {
                              $kode = 'CobaAja';
                          }
                           
                        ?>
                        <img src="<?php echo base_url('Undangan/QRcode/'.$kode);?>" alt="" style="width:250px; height:250px; margin-top:50px">
                    
                      <div class="isi-bawah-qr" style="margin-top:40px;margin-left:20px;margin-right:20px;">
                            Lakukan Tangkap Layar Pada QR Code, Untuk Mempermudah Pendataan Absensi Kehadiran Tanpa Koneksi Internet. </br>
                        </div>
                    
                    </div>
                </div>
                
            
            </div> <!-- end of section-title -->
          
        </div> <!-- end of container -->
        </section>
        <!-- end of important-people -->


        <!-- start gift-registry -->
        <section class="gift-registry section-padding" id="gift" style="background-image:url(<?=base_url('front-end/images/img-support/tb/')?>b3.jpg); background-size:cover;">
            <div class="container">
                <div class="row section-title">
                    <div class="title-box">
                        <div class="double-line double-line-top">
                            <i class="fi flaticon-social"></i>
                            <i class="fi flaticon-social"></i>
                        </div>
                        <h2>Wedding Gift</h2>
                        <div class="double-line double-line-bottom"></div>
                    </div>
                </div> <!-- end of section-title -->

                <div class="row text">
                    <div class="col col-md-6 col-md-offset-3">
                        <p> Terima kasih atas kehadiran anda dihari berbahagia kami. terima kasih sudah menjadi bagian dari momen berharga dalam persatuan cinta kasih kami, Dan jika memberi merupakan tanda terima kasih serta dukungan Anda, maka Anda dapat memberikan kado secara cashless.</p>
                        <div class="cashless">
                            <?php foreach($undangan as $u):?>
                                <?php if($u['gift_non_fisik'] == 'BCA'):?>
                                <img src="<?= base_url('front-end/images/img-support/BCA.png')?>" width="200px" height="100px">
                                No rekening tujuan BCA </br>
                                <div class="nomer_tujuan" id="nomer_tf">
                                    <?= $u['no_tujuan']?> 
                                    </div>
                                    <button class="copy-btn" onclick="copyContent()">Copy No. Rekening</button>
                                    <div class="bawah-gift">
                                    Anda Juga Dapat Mengirimkan Kado Fisik Ke Alamat Berikut :</br>
                                    <?= $u['alamat_gift_fisik']?></br>
                                    <a href="https://api.whatsapp.com/send?phone=<?=$u['tlp_gift_fisik']?>&text=Selamat Berbahagia, Semoga Menjadi Keluarga Yang Baik Dan Harmonis, Sebagai Bentuk Dukungan Dan Ikut Bersyukur Atas Pernikahan Kalian, Saya Sedang Mengirimkan Kado ke Alamat Anda"  target="_blank" class="kirim-pesan" role="button"> Konfirmasi Via WhatsApp</a>
                                </div>

                                <?php elseif($u['gift_non_fisik'] == 'Mandiri'):?>
                                <img src="<?= base_url('front-end/images/img-support/Mandiri.png')?>" width="200px" height="100px">
                                No rekening tujuan Mandiri </br>
                                <div class="nomer_tujuan" id="nomer_tf">
                                    <?= $u['no_tujuan']?> 
                                    </div>
                                    <button class="copy-btn" onclick="copyContent()">Copy No. Rekening</button>
                                    <div class="bawah-gift">
                                    Anda Juga Dapat Mengirimkan Kado Fisik Ke Alamat Berikut :</br>
                                    <?= $u['alamat_gift_fisik']?></br>
                                    <a href="https://api.whatsapp.com/send?phone=<?=$u['tlp_gift_fisik']?>&text=Selamat Berbahagia, Semoga Menjadi Keluarga Yang Baik Dan Harmonis, Sebagai Bentuk Dukungan Dan Ikut Bersyukur Atas Pernikahan Kalian, Saya Sedang Mengirimkan Kado ke Alamat Anda"  target="_blank" class="kirim-pesan" role="button"> Konfirmasi Via WhatsApp</a>
                                </div>

                                <?php elseif($u['gift_non_fisik'] == 'BRI'):?>
                                <img src="<?= base_url('front-end/images/img-support/Bank_BRI.png')?>" width="200px" height="100px">
                                No rekening tujuan BRI </br>
                                <div class="nomer_tujuan" id="nomer_tf">
                                    <?= $u['no_tujuan']?> 
                                    </div>
                                    <button class="copy-btn" onclick="copyContent()">Copy No. Rekening</button>
                                    <div class="bawah-gift">
                                    Anda Juga Dapat Mengirimkan Kado Fisik Ke Alamat Berikut :</br>
                                    <?= $u['alamat_gift_fisik']?></br>
                                    <a href="https://api.whatsapp.com/send?phone=<?=$u['tlp_gift_fisik']?>&text=Selamat Berbahagia, Semoga Menjadi Keluarga Yang Baik Dan Harmonis, Sebagai Bentuk Dukungan Dan Ikut Bersyukur Atas Pernikahan Kalian, Saya Sedang Mengirimkan Kado ke Alamat Anda"  target="_blank" class="kirim-pesan" role="button"> Konfirmasi Via WhatsApp</a>
                                </div>

                                <?php elseif($u['gift_non_fisik'] == 'BNI'):?>
                                <img src="<?= base_url('front-end/images/img-support/BNI.png')?>" width="200px" height="100px">
                                No rekening tujuan BNI </br>
                                <div class="nomer_tujuan" id="nomer_tf">
                                    <?= $u['no_tujuan']?> 
                                    </div>
                                    <button class="copy-btn" onclick="copyContent()">Copy No. Rekening</button>
                                    <div class="bawah-gift">
                                    Anda Juga Dapat Mengirimkan Kado Fisik Ke Alamat Berikut :</br>
                                    <?= $u['alamat_gift_fisik']?></br>
                                    <a href="https://api.whatsapp.com/send?phone=<?=$u['tlp_gift_fisik']?>&text=Selamat Berbahagia, Semoga Menjadi Keluarga Yang Baik Dan Harmonis, Sebagai Bentuk Dukungan Dan Ikut Bersyukur Atas Pernikahan Kalian, Saya Sedang Mengirimkan Kado ke Alamat Anda"  target="_blank" class="kirim-pesan" role="button"> Konfirmasi Via WhatsApp</a>
                                </div>

                                <?php elseif($u['gift_non_fisik'] == 'Jenius'):?>
                                <img src="<?= base_url('front-end/images/img-support/jenius.png')?>" width="200px" height="100px">
                                No rekening tujuan Jenius </br>
                                <div class="nomer_tujuan" id="nomer_tf">
                                    <?= $u['no_tujuan']?> 
                                    </div>
                                    <button class="copy-btn" onclick="copyContent()">Copy No. Rekening</button>
                                    <div class="bawah-gift">
                                    Anda Juga Dapat Mengirimkan Kado Fisik Ke Alamat Berikut :</br>
                                    <?= $u['alamat_gift_fisik']?></br>
                                    <a href="https://api.whatsapp.com/send?phone=<?=$u['tlp_gift_fisik']?>&text=Selamat Berbahagia, Semoga Menjadi Keluarga Yang Baik Dan Harmonis, Sebagai Bentuk Dukungan Dan Ikut Bersyukur Atas Pernikahan Kalian, Saya Sedang Mengirimkan Kado ke Alamat Anda"  target="_blank" class="kirim-pesan" role="button"> Konfirmasi Via WhatsApp</a>
                                </div>

                                <?php elseif($u['gift_non_fisik'] == 'ShopeePay'):?>
                                <img src="<?= base_url('front-end/images/img-support/ShopeePay.png')?>" width="200px" height="100px">
                                Nomer tujuan ShopeePay </br>
                                <div class="nomer_tujuan" id="nomer_tf">
                                    <?= $u['no_tujuan']?> 
                                    </div>
                                    <button class="copy-btn" onclick="copyContent()">Copy Nomer Handphone</button>
                                    <div class="bawah-gift">
                                    Anda Juga Dapat Mengirimkan Kado Fisik Ke Alamat Berikut :</br>
                                    <?= $u['alamat_gift_fisik']?></br>
                                    <a href="https://api.whatsapp.com/send?phone=<?=$u['tlp_gift_fisik']?>&text=Selamat Berbahagia, Semoga Menjadi Keluarga Yang Baik Dan Harmonis, Sebagai Bentuk Dukungan Dan Ikut Bersyukur Atas Pernikahan Kalian, Saya Sedang Mengirimkan Kado ke Alamat Anda"  target="_blank" class="kirim-pesan" role="button"> Konfirmasi Via WhatsApp</a>
                                </div>

                                <?php elseif($u['gift_non_fisik'] == 'GoPay'):?>
                                <img src="<?= base_url('front-end/images/img-support/Go_Pay.png')?>" width="200px" height="100px">
                                Nomer tujuan GoPay </br>
                                <div class="nomer_tujuan" id="nomer_tf">
                                    <?= $u['no_tujuan']?> 
                                    </div>
                                    <button class="copy-btn" onclick="copyContent()">Copy Nomer Handphone</button>
                                    <div class="bawah-gift">
                                    Anda Juga Dapat Mengirimkan Kado Fisik Ke Alamat Berikut :</br>
                                    <?= $u['alamat_gift_fisik']?></br>
                                    <a href="https://api.whatsapp.com/send?phone=<?=$u['tlp_gift_fisik']?>&text=Selamat Berbahagia, Semoga Menjadi Keluarga Yang Baik Dan Harmonis, Sebagai Bentuk Dukungan Dan Ikut Bersyukur Atas Pernikahan Kalian, Saya Sedang Mengirimkan Kado ke Alamat Anda"  target="_blank" class="kirim-pesan" role="button"> Konfirmasi Via WhatsApp</a>
                                </div>

                                <?php elseif($u['gift_non_fisik'] == 'Ovo'):?>
                                <img src="<?= base_url('front-end/images/img-support/Ovo.png')?>" width="200px" height="100px">
                                Nomer tujuan Ovo </br>
                                <div class="nomer_tujuan" id="nomer_tf">
                                    <?= $u['no_tujuan']?> 
                                    </div>
                                    <button class="copy-btn" onclick="copyContent()">Copy Nomer Handphone</button>
                                    <div class="bawah-gift">
                                    Anda Juga Dapat Mengirimkan Kado Fisik Ke Alamat Berikut :</br>
                                    <?= $u['alamat_gift_fisik']?></br>
                                    <a href="https://api.whatsapp.com/send?phone=<?=$u['tlp_gift_fisik']?>&text=Selamat Berbahagia, Semoga Menjadi Keluarga Yang Baik Dan Harmonis, Sebagai Bentuk Dukungan Dan Ikut Bersyukur Atas Pernikahan Kalian, Saya Sedang Mengirimkan Kado ke Alamat Anda"  target="_blank" class="kirim-pesan" role="button"> Konfirmasi Via WhatsApp</a>
                                </div>

                                <?php elseif($u['gift_non_fisik'] == 'Dana'):?>
                                <img src="<?= base_url('front-end/images/img-support/Dana.png')?>" width="200px" height="100px">
                                Nomer tujuan Dana </br>
                                <div class="nomer_tujuan" id="nomer_tf">
                                    <?= $u['no_tujuan']?> 
                                    </div>
                                    <button class="copy-btn" onclick="copyContent()">Copy Nomer Handphone</button>
                                    <div class="bawah-gift">
                                    Anda Juga Dapat Mengirimkan Kado Fisik Ke Alamat Berikut :</br>
                                    <?= $u['alamat_gift_fisik']?></br>
                                    <a href="https://api.whatsapp.com/send?phone=<?=$u['tlp_gift_fisik']?>&text=Selamat Berbahagia, Semoga Menjadi Keluarga Yang Baik Dan Harmonis, Sebagai Bentuk Dukungan Dan Ikut Bersyukur Atas Pernikahan Kalian, Saya Sedang Mengirimkan Kado ke Alamat Anda"  target="_blank" class="kirim-pesan" role="button"> Konfirmasi Via WhatsApp</a>
                                </div>

                            <?php endif;?>
                            <?php endforeach;?>
                        </div>
                        
                    </div>
                </div>
            
<script>
    
    let text = document.getElementById('nomer_tf').innerHTML;
    const copyContent = async () => {
    try {
        await navigator.clipboard.writeText(text);
        console.log('Content copied to clipboard');
        alert("Berhasil disalin!");
    } catch (err) {
        console.error('Failed to copy: ', err);
    }
    }


</script>

            </div> <!-- end of container -->
        </section>
        <!-- end of gift-registry -->


        <!-- start rsvp -->
        <!--<section class="rsvp section-padding parallax" data-bg-image="<?=base_url('front-end/')?>images/rsvp-bg.jpg" id="rsvp">
            <div class="container">
                <div class="row section-title">
                    <div class="title-box">
                        <div class="double-line double-line-top">
                            <i class="fi flaticon-social"></i>
                            <i class="fi flaticon-social"></i>
                        </div>
                        <h2>Are you comming</h2>
                        <div class="double-line double-line-bottom"></div>
                    </div>
                </div>--> <!-- end of section-title -->
                

                <!--<div class="row content">
                    <div class="col col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="rsvp-form-wrapper">
                            <div class="border-box">
                                <i class="fi flaticon-clip-1 top-clip"></i>
                                <i class="fi flaticon-clip-1 bottom-clip"></i>
                                <div></div>
                            </div>
                            <h4>Please reserve <br>before December 16th, 2016</h4>
                            <form id="rsvp-form" class="form form-inline" method="post">
                                <div class="row">
                                    <div class="form-group col col-sm-6">
                                        <input type="text" class="form-control"  name="name" placeholder="Your Name" required>
                                    </div>
                                    <div class="form-group col col-sm-6">
                                        <input type="email" class="form-control"  name="email" placeholder="Your Email" required>
                                    </div>
                                    <div class="form-group col col-sm-6">
                                        <select name="guest" class="form-control">
                                            <option disabled="disabled" selected>Number of Guest</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                    <div class="form-group col col-sm-6">
                                        <select name="events" class="form-control">
                                            <option disabled="disabled" selected>I am attending</option>
                                            <option>Al events</option>
                                            <option>Wedding ceremony</option>
                                            <option>Reception party</option>
                                        </select>
                                    </div>      

                                    <div class="form-group col col-sm-12">
                                        <textarea name="notes" class="form-control" placeholder="Your Message" ></textarea>
                                    </div>      

                                    <div class="form-group col col-sm-12">
                                        <button type="submit" class="btn btn-default theme-btn">Send invitation</button>
                                        <span id="loader"><img src="images/rsvp-ajax-loader.gif" alt="Loader"></span>
                                    </div>      
                                    <div id="success">Thank you</div>
                                    <div id="error"> Error occurred while sending email. Try again later. </div>
                                </div>
                            </form> --><!-- end of form -->
                        <!--</div>
                    </div>
                </div>
            </div> --><!-- end of container -->
        <!--</section>-->
        <!-- end of rsvp -->


        

        <!-- start footer -->
        <footer class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-md-8 col-xs-10 col-md-offset-2 col-xs-offset-1">
                        <div class="box">
                            <!-- frame -->
                            <div class="left-top-border"></div> 
                            <div class="right-top-border"></div> 
                            <div class="bottom-right-border"></div> 
                            <div class="bottom-left-border"></div> 
                            <!-- frame -->
                            <?php foreach($undangan as $u):?>
                            <div class="love-birds wow fadeInSlow"><i class="fi flaticon-birds-in-love"></i></div>
                            <h2 class="wow fadeInSlow">We are getting married</h2>
                            <p class="wow fadeInSlow"><?= $u['nama_pria']?> &amp; <?= $u['nama_wanita']?></p>
                            <span class="wow fadeInSlow"><?= date("d F Y",strtotime($u['tanggal_resepsi']));?></span>
                            <?php endforeach;?>
                        </div>
                        <p class="copyright">&copy; Copyright 2023. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end of footer -->
    </div>
    <!-- end of page-wrapper -->



    <!-- All JavaScript files
    ================================================== -->
    <script src="<?=base_url('front-end/')?>js/jquery.min.js"></script>
    <script src="<?=base_url('front-end/')?>js/bootstrap.min.js"></script>

    <!-- Plugins for this template -->
    <script src="<?=base_url('front-end/')?>js/jquery-plugin-collection.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1cZtqidvg0m-f8Hd3S6RHx1mY-omuLS4"></script>

    <!-- Custom script for this template -->
    <script src="<?=base_url('front-end/')?>js/script.js"></script>
    <script>
        $('#myModel').modal('show');
    </script>
    
    <!-- QR CODE-->
    
</body>

<!-- Mirrored from astheme.ourdreamit.com/sweetheart/p-s-t/grid-gallery/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Dec 2021 09:26:23 GMT -->
</html>
