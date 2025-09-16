<?php

// Periksa apakah sesi 'id_acara', 'email', dan 'as_id' telah berakhir
if (!isset($_SESSION['email']) || !isset($_SESSION['as_id'])) {
    // Sesi telah berakhir, arahkan ke halaman menu utama
    header("Location: " . base_url("auth"));
    exit();
}

// Kode lainnya untuk halaman saat sesi masih berlangsung
?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin'); ?>" class="brand-link">
        <img src="<?= base_url('back-end/img/logo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">QuzResepsi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('back-end/dist/img/') . $user['gambar']; ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $user['nama']; ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="<?= base_url('back-end/'); ?>plugins/coba-aja/menu_active.min.css">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href= "<?= base_url('user')?>" class="nav-link active"
                    >
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                    
                </li>

                <li class="nav-header">MENU</li>

                <?php foreach ($user_use as $u) : ?>
                    <?php foreach ($user_menu as $um) : ?>
                        <?php if($u['as_id'] == 2 && isset($_SESSION['id_acara'])):?>
                            <li nav-link a>
                                <a href="<?= base_url($um['url'])?>" class="nav-link">
                                    <i class="<?= $um['icon']; ?>"></i>
                                        <p class ="ml-2"><?= $um['nama_menu']; ?>
                                    </p>
                                </a>
                            </li>
                        <?php elseif($u['as_id'] == 3 && isset($_SESSION['id_acara'])):?>
                            <?php if($um['nama_menu'] != 'Info Mempelai' && $um['nama_menu'] != 'Acara' && $um['nama_menu'] != 'Cetak Laporan' && $um['nama_menu'] != 'Tamu' ):?>
                                <li nav-link a>
                                    
                                    <a href="<?= base_url($um['url'])?>" class="nav-link">
                                        <i class="<?= $um['icon']; ?>"></i>
                                            <p class ="ml-2"><?= $um['nama_menu']; ?>
                                        </p>
                                    </a>
                                    
                                </li>
                            <?php endif;?>
                        <?php endif;?>
                        
                    <?php endforeach;?>
                    <?php if(empty($_SESSION['id_acara'])):?>
                        <a href="<?= base_url("Acara_resepsi/view")?>" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                                <p class ="ml-2">Acara
                            </p>
                        </a>
                        <a href="<?= base_url("Panduan/user")?>" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                                <p class ="ml-2">Panduan
                            </p>
                        </a>
                    <?php endif;?>
                <?php endforeach; ?>

                <li class="nav-header">LOGOUT</li>
                <li class="nav-item">
                    <a href="<?= base_url('auth/keluar'); ?>" class="nav-link">

                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Keluar
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
