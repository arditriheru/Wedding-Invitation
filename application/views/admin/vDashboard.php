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
                            <h5><?= $title; ?></h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="nav-item"><?= $this->session->flashdata('alert') ?></li>
                                <li class="breadcrumb-item active"><?= $subtitle; ?></li>
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
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><?= $subtitle; ?></h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="dataTablesAsc1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Customer</th>
                                                <th class="text-center">Pernikahan</th>
                                                <th class="text-center">Akad</th>
                                                <th class="text-center">Resepsi</th>
                                                <th class="text-center">Template</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($dataPesan as $d) : ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++; ?></td>
                                                    <td class="text-left"><?= $d->email . '<br><strong>' . $d->name . '</strong>'; ?></td>
                                                    <td class="text-center"><?= $d->groom . ' & ' . $d->bride; ?></td>
                                                    <td class="text-center"><?= '<strong>' . formatDateIndo($d->akad_date) . '</strong><br>' . $d->akad_time; ?></td>
                                                    <td class="text-center"><?= '<strong>' . formatDateIndo($d->resepsi_date) . '</strong><br>' . $d->resepsi_time; ?></td>
                                                    <td class="text-center"><?= $d->title; ?></td>
                                                    <td class="text-center">
                                                        <a href="<?= base_url('admin/userAdmin/detailPesan/' . $d->id_pesan) ?>" class="btn btn-primary btn-xs mb-3">
                                                            <i class="fas fa-eye"></i> Detail
                                                        </a>
                                                    </td>
                                                </tr>

                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
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
                <?= getVersion(); ?>
            </div>
            <strong><?= getCopyright(); ?></strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->