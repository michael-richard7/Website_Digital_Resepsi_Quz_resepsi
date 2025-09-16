<!-- Start Navbar Area -->
<div class="navbar-area navbar-area-three">
    <!-- Menu For Mobile Device -->
    <?php foreach ($contact as $c) : ?>
        <div class="mobile-nav">
            <a href="index.html" class="logo">
                <img src="<?= base_url('front-end/assets/img/contact/') . $c['image']; ?>" alt="Logo">
            </a>
        </div>
    <?php endforeach; ?>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md">
                <?php foreach ($contact as $c) : ?>
                    <a class="navbar-brand" href="<?= base_url('home'); ?>">
                        <img src="<?= base_url('front-end/assets/img/contact/') . $c['image']; ?>" alt="Logo">
                    </a>
                <?php endforeach ?>

                <div class="collapse navbar-collapse mean-menu">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a href="<?= base_url('home'); ?>" class="nav-link active">
                                Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('home/about'); ?>" class="nav-link">About</a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Pages
                                <i class="bx bx-chevron-down"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Portfolio
                                        <i class='bx bx-chevron-right'></i>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="<?= base_url('home/portfolio') ?>" class="nav-link">Portfolio</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('home/team'); ?>" class="nav-link">Team</a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        User
                                        <i class='bx bx-chevron-right'></i>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="<?= base_url('auth/') ?>" class="nav-link">My Account</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= base_url('auth/') ?>" class="nav-link">Log In</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= base_url('auth/registrasi') ?>" class="nav-link">Sign In</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Blog
                                <i class="bx bx-chevron-down"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="<?= base_url('home/blog'); ?>" class="nav-link">Blog Grid</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('home/contact'); ?>" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->