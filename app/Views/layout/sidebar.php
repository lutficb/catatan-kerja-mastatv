<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item navbar-brand-mini-wrapper">
            <a class="nav-link navbar-brand brand-logo-mini" href="#"><img src="<?= base_url(); ?>img/logo-mastatv-light.svg" alt="logo" /></a>
        </li>
        <!-- Admin sidebar. Only user as admin can access this menu -->
        <?php if (auth()->user()->inGroup('admin')): ?>
            <li class="nav-item nav-category">
                <span class="nav-link">Administrator</span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>admin/users">
                    <span class="menu-title">Users</span>
                    <i class="icon-people menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>admin/jobdes">
                    <span class="menu-title">Jobdes</span>
                    <i class="icon-organization menu-icon"></i>
                </a>
            </li>
        <?php endif; ?>

        <!-- Verificator sidebar. Only user as admin and verificator can access this menu -->
        <?php if (auth()->user()->inGroup('admin') || auth()->user()->inGroup('verificator')): ?>
            <li class="nav-item nav-category">
                <span class="nav-link">Verificator</span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>verificator">
                    <span class="menu-title">Catatan Kerja Anggota</span>
                    <i class="icon-notebook menu-icon"></i>
                </a>
            </li>
        <?php endif; ?>

        <!-- Anggota sidebar. Only user as Anggota can access this menu -->
        <?php if (auth()->user()->inGroup('anggota')): ?>
            <li class="nav-item nav-category">
                <span class="nav-link">Anggota</span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>anggota">
                    <span class="menu-title">Catatan Kerja Saya</span>
                    <i class="icon-book-open menu-icon"></i>
                </a>
            </li>
        <?php endif; ?>

        <!-- My Profil menu to edit profil and detail user -->
        <li class="nav-item nav-category">
            <span class="nav-link">Profil</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>profil">
                <span class="menu-title">Profil Saya</span>
                <i class="icon-user-following menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>