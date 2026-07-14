<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Tombol Sidebar -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    <!-- Menu Kanan -->
    <ul class="navbar-nav ml-auto">

        <!-- Search -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-search"></i>
            </a>
        </li>

        <!-- User Dropdown -->
        <li class="nav-item dropdown">

            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user-circle"></i>
                <span class="ml-1"><?= session()->get('name'); ?></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">

                <span class="dropdown-item-text">
                    <strong><?= session()->get('name'); ?></strong><br>
                    <small><?= session()->get('email'); ?></small>
                </span>

                <div class="dropdown-divider"></div>

                <span class="dropdown-item">
                    <i class="fas fa-user-tag mr-2"></i>
                    <?= ucfirst(session()->get('role')); ?>
                </span>

                <div class="dropdown-divider"></div>

                <a href="<?= base_url('logout'); ?>" class="dropdown-item text-danger">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Logout
                </a>

            </div>

        </li>

    </ul>

</nav>