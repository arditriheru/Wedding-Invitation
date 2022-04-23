<!-- Preloader -->
<?php $this->load->view('templates/preloader'); ?>

<nav class="navbar navbar-light" style="background-color: #f7d217;">
    <!-- Navbar content -->
</nav>
<nav class="navbar navbar-light sticky-top" style="background-color: #06337b;">
    <div class="container-fluid">
        <a href="<?= base_url('mhs/userMhs/index?menuUtama=active'); ?>">
            <img src="<?php echo base_url(); ?>assets/dist/img/HomeLogo.png" height="90px" alt="Main Logo" class="brand-image">
        </a>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo base_url('login/logout'); ?>">Logout</a>
            </li>
        </ul>
    </div>
</nav>