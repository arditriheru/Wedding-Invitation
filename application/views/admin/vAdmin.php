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
                            <a class="btn btn-success btn-xs mb-3" data-toggle="modal" data-target="#modalTambah">
                                <i class="fas fa-plus"></i> Administrator
                            </a>
                            <table id="dataTablesDesc1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Administrator</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($dataAdmin as $d) : ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <td class="text-left"><?php echo $d->nama . '</strong>'; ?></td>
                                            <td class="text-center"><?php echo $d->username . '</strong>'; ?></td>
                                            <td class="text-center">
                                                <a data-toggle="modal" data-target="#modalEdit<?php echo $d->id_admin; ?>" class="btn btn-primary btn-xs mb-3">
                                                    <i class="fas fa-lock"></i> Ubah Password
                                                </a>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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

    <!-- modal tambah template -->
    <div class="modal fade" id="modalTambah">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Template</h4><br>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="form-prevent" action="<?php echo base_url('userAdmin/tambahAdminAksi') ?>" method="post" enctype="multipart/form-data">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Form Data</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="required" for="exampleInputEmail1">Nama Admin</label>
                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Tuliskan" required>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label class="required" for="exampleInputEmail1">Username</label>
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Tuliskan" required>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label class="required" for="exampleInputEmail1">Passwword</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Tuliskan" required>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                </div>
                                <button class="btn btn-info button-prevent mt-3 mb-3" type="submit">
                                    <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                    <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Submit </div>
                                    <div class="hide-text">Submit</div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->