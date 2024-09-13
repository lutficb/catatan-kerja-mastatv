<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item navbar-brand-mini-wrapper">
            <a class="nav-link navbar-brand brand-logo-mini" href="<?= base_url(); ?>/template/dist/index.html"><img src="img/logo-mastatv-light.svg" alt="logo" /></a>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Administrator</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="template/dist/index.html">
                <span class="menu-title">Users</span>
                <i class="icon-people menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="template/dist/index.html">
                <span class="menu-title">Jobdes</span>
                <i class="icon-folder menu-icon"></i>
            </a>
        </li>
        <li class="nav-item nav-category"><span class="nav-link">Verificator</span></li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Basic UI Elements</span>
                <i class="icon-layers menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>/template/dist/pages/ui-features/buttons.html">Buttons</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>/template/dist/pages/ui-features/dropdowns.html">Dropdowns</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>/template/dist/pages/ui-features/typography.html">Typography</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <span class="menu-title">Icons</span>
                <i class="icon-globe menu-icon"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>/template/dist/pages/icons/font-awesome.html">Font Awesome</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category"><span class="nav-link">Anggota</span></li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">User Pages</span>
                <i class="icon-disc menu-icon"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>/template/dist/pages/samples/blank-page.html"> Blank Page </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>/template/dist/pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>/template/dist/pages/samples/register.html"> Register </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>/template/dist/pages/samples/error-404.html"> 404 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>/template/dist/pages/samples/error-500.html"> 500 </a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>