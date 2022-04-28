<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php $this->view('admin/vMenu'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h5><?php echo $title; ?></h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="nav-item"><?php echo $this->session->flashdata('alert') ?></li>
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active"><?php echo $subtitle; ?></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- main column -->

                        <div class="col-md-12">
                            <?php
                            $no = 1;
                            foreach ($dataTemplate as $d) : ?>
                                <!-- main column -->
                                <div class="col-sm-6">
                                    <div class="position-relative p-3 bg-white border mb-3" style="height: auto">
                                        <div class="ribbon-wrapper ribbon-lg">
                                            <div class="ribbon bg-primary text-lg"><?= 'Template ' . $no++ ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <a href="#">
                                                    <img src="<?= base_url('assets/home/img/template/' . $d->image); ?>" class="img-fluid" alt="Flyer Pelatihan">
                                                </a>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <?= ' <a href="#"><h4 class="mt-2" style="color:#000000">' . $d->title . '</h4></a>' ?>
                                                <?= 'Kategori ' . $d->subtitle . '<br>' ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </div>

                        <!--/.col (main) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <?php echo getVersion(); ?>
            </div>
            <strong><?php echo getCopyright(); ?></strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->