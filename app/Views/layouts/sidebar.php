<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Logo -->
    <a href="<?= base_url('dashboard') ?>" class="brand-link">
        <span class="brand-text font-weight-light">
            <strong>Media Asset Manager</strong>
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <nav class="mt-3">

            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>"
                        class="nav-link <?= uri_string() == 'dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Media Assets -->
                <li class="nav-item">
                    <a href="<?= base_url('media-assets') ?>"
                        class="nav-link <?= uri_string() == 'assets' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-photo-video"></i>
                        <p>Media Assets</p>
                    </a>
                </li>

                <!-- Categories -->
                <li class="nav-item">
                    <a href="<?= base_url('categories') ?>"
                        class="nav-link <?= uri_string() == 'categories' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Categories</p>
                    </a>
                </li>

                <!-- Activity Log -->
                <li class="nav-item">
                    <a href="<?= base_url('activity-log') ?>"
                        class="nav-link <?= uri_string() == 'activity-log' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-history"></i>
                        <p>Activity Log</p>
                    </a>
                </li>

                <!-- Users -->
                <li class="nav-item">
                    <a href="<?= base_url('users') ?>"
                        class="nav-link <?= uri_string() == 'users' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>

                <!-- Settings -->
                <li class="nav-item">
                    <a href="<?= base_url('settings') ?>"
                        class="nav-link <?= uri_string() == 'settings' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Settings</p>
                    </a>
                </li>

            </ul>

        </nav>

    </div>

</aside>