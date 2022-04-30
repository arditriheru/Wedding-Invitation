 <!-- Preloader -->
 <?php $this->load->view('layout/preloader'); ?>

 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         </li>
         <li class="nav-item d-none d-sm-inline-block mt-2">
             <a href="https://arditriheru.com/" class="badge badge-success">ONLINE</a>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
             <a href="https://arditriheru.com/" class="nav-link"><?= $this->session->userdata('login_as') . ' - ' . ucwords(strtolower($this->session->userdata('notif'))); ?></a>
         </li>
     </ul>

     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
         <!-- Navbar alert -->
         <li class="nav-item">
             <?= $this->session->flashdata('alert'); ?>
         </li>
         <!-- login as -->
         <li class="nav-item">
             <a class="nav-link" href="https://arditriheru.com/" target="_blank">
                 <?= $this->session->userdata('login_as'); ?>
             </a>
         </li>
         <!-- expand fullscreen -->
         <li class="nav-item">
             <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                 <i class="fas fa-expand-arrows-alt"></i>
             </a>
         </li>
         <!-- Messages Dropdown Menu -->
         <li class="nav-item dropdown">
             <a class="nav-link" data-toggle="dropdown" href="#">
                 <i class="fas fa-chevron-down"></i>
             </a>
             <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                 <ul><a class="nav-link" href="<?= base_url(); ?>login/logout">
                         <i class="far fa-circle nav-icon"></i> Logout
                     </a></ul>
             </div>
         </li>
     </ul>
 </nav>
 <!-- /.navbar -->

 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="<?= base_url(); ?>magang/admin/userAdmin/index" class="brand-link">
         <span class="text-center brand-text font-weight-light"><?= getTitle(); ?></span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar mt-6">
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" id="myDIV" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href="<?= base_url(); ?>userAdmin/index?menuUtama=active" class="nav-link <?= $this->input->get('menuUtama'); ?>">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>Menu Utama</p>
                     </a>
                 </li>

                 <li class="nav-header">MASTER DATA</li>

                 <li class="nav-item">
                     <a href="<?= base_url(); ?>userAdmin/admin?menuAdmin=active" class="nav-link <?= $this->input->get('menuAdmin'); ?>">
                         <i class="nav-icon fas fa-user-lock"></i>
                         <p>Admin</p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="<?= base_url(); ?>userAdmin/template?menuTemplate=active" class="nav-link <?= $this->input->get('menuTemplate'); ?>">
                         <i class="nav-icon fas fa-layer-group"></i>
                         <p>Template</p>
                     </a>
                 </li>

             </ul>
             </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>