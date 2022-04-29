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
                                <i class="fas fa-plus"></i> Template
                            </a>
                            <div class="row">
                                <?php
                                $no = 1;
                                foreach ($dataTemplate as $d) : ?>
                                    <!-- main column -->
                                    <div class="col-sm-6">
                                        <div class="position-relative p-3 bg-white border mb-3" style="height: auto">
                                            <div class="ribbon-wrapper ribbon-lg">
                                                <div class="ribbon bg-primary text-md"><?= 'Template ' . $no++ ?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <a href="#">
                                                        <img src="<?= base_url('assets/uploads/templates/' . $d->image); ?>" class="img-fluid" alt="Flyer Pelatihan">
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
                            <!-- /.row -->

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

                    <script>
                        function fileValidation() {
                            var fileInput = document.getElementById('file');
                            var filePath = fileInput.value;
                            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
                            if (!allowedExtensions.exec(filePath)) {
                                document.getElementById('alert').innerHTML = '<p class="text-danger">Silahkan upload file dengan ekstensi .jpeg/.jpg/.png</p>';
                                fileInput.value = '';
                                return false;
                            }
                            if ($('#file')[0].files[0].size > 500000) {
                                document.getElementById('alert').innerHTML = '<p class="text-danger">Maaf, File terlalu besar! Maksimal upload 500KB</p>';
                                return false;
                            } else {
                                //Image preview
                                if (fileInput.files && fileInput.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        document.getElementById('imagePreview1').innerHTML = '<img src="' + e.target.result + '" height="200px" width="auto"/>';
                                    };
                                    reader.readAsDataURL(fileInput.files[0]);
                                }
                            }
                        }
                    </script>

                    <form class="form-prevent" action="<?php echo base_url('userAdmin/tambahTemplateAksi') ?>" method="post" enctype="multipart/form-data">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Form Data</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="required" for="exampleInputEmail1">Nama Template</label>
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Tuliskan" required>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label class="required" for="exampleInputEmail1">Keterangan</label>
                                            <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Contoh : Template Gold" required>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label class="required" for="customFile">Thumbnail</label>
                                            <div id="alert"></div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file" name="file" onchange="return fileValidation()" required>
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            <p><small>Unggah file dengan ekstensi jpeg/jpg/png, maksimal ukuran adalah 500 KB</small></p>
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