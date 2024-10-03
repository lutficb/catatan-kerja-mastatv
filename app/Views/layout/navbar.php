 <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
     <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
         <a class="navbar-brand brand-logo" href="<?= base_url(); ?>">
             <img src="<?= base_url(); ?>img/logo-mastatv-light.svg" alt="logo" class="logo-dark" />
         </a>
         <a class="navbar-brand brand-logo-mini" href="<?= base_url(); ?>"><img src="<?= base_url(); ?>img/logo-mastatv-light.svg" alt="logo" /></a>
         <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
             <span class="icon-menu"></span>
         </button>
     </div>
     <div class="navbar-menu-wrapper d-flex align-items-center">
         <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Ahlan wa sahlan, <?= auth()->user()->name; ?></h5>
         <ul class="navbar-nav navbar-nav-right">
             <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
                 <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                     <img class="img-xs rounded-circle ms-2" src="<?= base_url(); ?>img/<?= auth()->user()->photo; ?>" alt="Profile image"> <span class="font-weight-normal"><?= auth()->user()->name; ?></span></a>
                 <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                     <div class="dropdown-header text-center">
                         <img class="img-md img-fluid rounded-circle" src="<?= base_url(); ?>img/<?= auth()->user()->photo; ?>" alt="Profile image">
                         <p class="mb-1 mt-3"><?= auth()->user()->username; ?></p>
                         <p class="font-weight-light text-muted mb-0"><?= auth()->user()->email; ?></p>
                     </div>
                     <a class="dropdown-item"><i class="dropdown-item-icon icon-user text-success"></i> My Profile</a>
                     <a href="<?= base_url('logout') ?>" class="dropdown-item"><i class="dropdown-item-icon icon-power text-success"></i>Sign Out</a>
                 </div>
             </li>
         </ul>
         <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
             <span class="icon-menu"></span>
         </button>
     </div>
 </nav>