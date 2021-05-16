<!-- Sidebar -->
<ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center " href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIK</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item -  -->
    <li class="nav-item <?php if ($head == 'Dashboard') echo 'active'; ?>">
        <a class="nav-link" href="<?= base_url('Dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>" target="_blank">
            <i class=" fas fa-fw fa-globe"></i>
            <span>Visit Site</span></a>
    </li>


    <?php if (session()->get('role') == 4) : ?>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Pegawai
        </div>


    <?php endif; ?>

    <?php if (session()->get('role') == 2 or session()->get('role') == 1) : ?>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Administration
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?php if ($head == 'Pegawai') echo 'active'; ?>">
            <a class=" nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-id-card-alt"></i>
                <span>Pegawai</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('Jabatan'); ?>">Jabatan</a>
                    <a class="collapse-item" href="<?= base_url('Pegawai'); ?>">Daftar Pegawai</a>
                </div>
            </div>
        </li>




    <?php endif; ?>
    <?php if (session()->get('role') == 3 or session()->get('role') == 1) : ?>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Content Management
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?php if ($head == 'Home') echo 'active'; ?>">
            <a class="nav-link" href="<?= base_url('Ahome'); ?>">
                <i class="fas fa-fw fa-home"></i>
                <span>Home</span></a>
        </li>

        <li class="nav-item <?php if ($head == 'Video') echo 'active'; ?>">
            <a class="nav-link" href="<?= base_url('Videos'); ?>">
                <i class="fas fa-fw fa-video"></i>
                <span>Videos</span></a>
        </li>

        <li class="nav-item <?php if ($head == 'Portofolio') echo 'active'; ?>">
            <a class="nav-link" href="<?= base_url('Portofolio'); ?>">
                <i class="fas fa-fw fa-paste"></i>
                <span>Portofolio</span></a>
        </li>

        <li class="nav-item <?php if ($head == 'News') echo 'active'; ?>">
            <a class="nav-link" href="<?= base_url('News'); ?>">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>News</span></a>
        </li>

    <?php endif; ?>
    <?php if (session()->get('role') == 1) : ?>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Web Configuration
        </div>

        <li class="nav-item <?php if ($head == 'Profile') echo 'active'; ?>">
            <a class="nav-link" href="<?= base_url('Konfigurasi'); ?>">
                <i class="fas fa-fw fa-cogs"></i>
                <span>Profiles</span></a>
        </li>

        <li class="nav-item <?php if ($head == 'User') echo 'active'; ?>">
            <a class="nav-link" href="<?= base_url('User'); ?>">
                <i class="fas fa-fw fa-user-cog"></i>
                <span>User</span></a>
        </li>
    <?php endif; ?>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->