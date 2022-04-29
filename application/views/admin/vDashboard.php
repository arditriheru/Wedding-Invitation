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
                            <table id="dataTablesAsc1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Customer</th>
                                        <th class="text-center">Pernikahan</th>
                                        <!-- <th class="text-center">Akad</th>
                                        <th class="text-center">Resepsi</th>
                                        <th class="text-center">Template</th> -->
                                        <th class="text-center">Kontak</th>
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
                                            <!-- <td class="text-center"><?= '<strong>' . formatDateIndo($d->akad_date) . '</strong><br>' . $d->akad_time; ?></td>
                                            <td class="text-center"><?= '<strong>' . formatDateIndo($d->resepsi_date) . '</strong><br>' . $d->resepsi_time; ?></td>
                                            <td class="text-center"><?= $d->title; ?></td> -->
                                            <td class="text-left">

                                                <a href="<?= base_url('u/' . strtolower($d->title) . '/' . $d->id_pesan) . '?d=Nama%20Tamu' ?>" class="btn btn-warning btn-xs mb-3" target="_blank">
                                                    <i class="fas fa-upload"></i>Upload
                                                </a>

                                                <?php if (!empty($d->file_cp)) { ?>

                                                    <a href="<?= base_url('userAdmin/downloadFileCp/' . $d->file_cp) ?>" class="btn btn-success btn-xs mb-3">
                                                        <i class="fas fa-download"></i> Download
                                                    </a>

                                                <?php } ?>

                                            </td>
                                            <td class="text-center">

                                                <?php if ($d->valid == 0) { ?>

                                                    <a href="<?= base_url('userAdmin/validasiPesan/1/' . $d->id_pesan) ?>" class="btn btn-danger btn-xs mb-3" onclick="javascript: return confirm('Yakin validasi order?')">
                                                        <i class="fas fa-times"></i> Validasi
                                                    </a>

                                                <?php } else { ?>

                                                    <a href="<?= base_url('u/' . strtolower($d->title) . '/' . $d->id_pesan) . '?d=Nama%20Tamu' ?>" class="btn btn-primary btn-xs mb-3" target="_blank">
                                                        <i class="fas fa-eye"></i> Demo
                                                    </a>

                                                <?php } ?>

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