<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= getTopTitle(); ?></title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/home/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url(); ?>assets/home/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>">UndanganKu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Order Now!</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php if (!empty($this->input->get('template'))) { ?>

        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><?= $title; ?></h2>
                    <h3 class="section-subheading text-muted"><?= $subtitle; ?></h3>
                </div>

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

                <form class="form-prevent" id="contactForm" action="<?php echo base_url('home/orderAksi/' . $this->input->get('template') . '/1'); ?>" method="post" enctype="multipart/form-data">
                    <div class="row align-items-stretch mb-5">
                        <h6 class="text-left text-white">Unggah Kontak Penerima</h6>
                        <div id="alert"></div>
                        <p class="text-left text-white">Silahkan upload file dengan ekstensi .xls/.xlsx maksimal 500KB</p>
                        <div class="form-group">
                            <input class="form-control" name="file_cp" type="file" onchange="return fileValidation()" required>
                        </div>
                        <!-- form group -->
                        <div class="col-md-6">
                            <h6 class="text-left text-white">Nama Mempelai Pria</h6>
                            <div class="form-group">
                                <input class="form-control" name="groom" type="text" placeholder="Tuliskan.." maxlength="45" maxlength="45" required>
                            </div>
                            <!-- form group -->
                            <h6 class="text-left text-white">Nama Panggilan Mempelai Pria</h6>
                            <div class="form-group">
                                <input class="form-control" name="groom_nickname" type="text" placeholder="Tuliskan.." maxlength="10" maxlength="45" required>
                            </div>
                            <!-- form group -->
                            <h6 class="text-left text-white">Nama ayah mempelai pria</h6>
                            <div class="form-group">
                                <input class="form-control" name="groom_father" type="text" placeholder="Tuliskan.." maxlength="45" required>
                            </div>
                            <!-- form group -->
                            <h6 class="text-left text-white">Nama ibu mempelai pria</h6>
                            <div class="form-group">
                                <input class="form-control" name="groom_mother" type="text" placeholder="Tuliskan.." maxlength="45" required>
                            </div>
                            <!-- form group -->
                            <h6 class="text-left text-white">Foto mempelai pria</h6>
                            <p class="text-left text-white">Silahkan upload file dengan ekstensi .jpg/.jpeg/.png maksimal 1MB</p>
                            <div class="form-group">
                                <input class="form-control" name="groom_pict" type="file" placeholder="Tuliskan.." maxlength="45" required>
                            </div>
                            <!-- form group -->
                            <h6 class="text-left text-white">Lokasi Akad</h6>
                            <p class="text-left text-white">Contoh : Gedung Grha Savina Vidi</p>
                            <div class="form-group">
                                <input class="form-control" name="akad_place" type="text" placeholder="Tuliskan.." maxlength="45" required>
                            </div>
                            <!-- form group -->
                            <h6 class="text-left text-white">Alamat Akad</h6>
                            <p class="text-left text-white">Contoh : Jalan Magelang KM19 Tempel, Sleman, Yk</p>
                            <div class="form-group">
                                <input class="form-control" name="akad_address" type="text" placeholder="Tuliskan.." maxlength="100" required>
                            </div>
                            <!-- form group -->
                            <h6 class="text-left text-white">Link GoogleMap Akad</h6>
                            <div class="form-group">
                                <input class="form-control" name="akad_map" type="text" placeholder="Tuliskan.." maxlength="500" required>
                            </div>
                            <!-- form group -->
                            <h6 class="text-left text-white">Tanggal Akad</h6>
                            <div class="form-group">
                                <input class="form-control" name="akad_date" type="date" placeholder="Tuliskan.." required>
                            </div>
                            <!-- form group -->
                            <h6 class="text-left text-white">Jam Akad</h6>
                            <p class="text-left text-white">Contoh : 08.00 - 09.00</p>
                            <div class="form-group">
                                <input class="form-control" name="akad_time" type="text" placeholder="Tuliskan.." maxlength="15" required>
                            </div>
                            <!-- form group -->
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-left text-white">Nama Mempelai Wanita</h6>
                            <div class="form-group">
                                <input class="form-control" name="bride" type="text" placeholder="Tuliskan.." maxlength="45" required>
                            </div>
                            <!-- form group -->
                            <h6 class="text-left text-white">Nama Panggilan Mempelai Wanita</h6>
                            <div class="form-group">
                                <input class="form-control" name="bride_nickname" type="text" placeholder="Tuliskan.." maxlength="10" required>
                            </div>
                            <!-- form group -->
                            <h6 class="text-left text-white">Nama ayah mempelai wanita</h6>
                            <div class="form-group">
                                <input class="form-control" name="bride_father" type="text" placeholder="Tuliskan.." maxlength="45" required>
                            </div>
                            <!-- form group -->
                            <h6 class="text-left text-white">Nama ibu mempelai wanita</h6>
                            <div class="form-group">
                                <input class="form-control" name="bride_mother" type="text" placeholder="Tuliskan.." maxlength="45" required>
                            </div>
                            <!-- form group -->
                            <h6 class="text-left text-white">Foto mempelai wanita</h6>
                            <p class="text-left text-white">Silahkan upload file dengan ekstensi .jpg/.jpeg/.png maksimal 1MB</p>
                            <div class="form-group">
                                <input class="form-control" name="bride_pict" type="file" placeholder="Tuliskan.." maxlength="45" required>
                            </div>
                            <!-- form group -->
                            <h6 class="text-left text-white">Lokasi Resepsi</h6>
                            <p class="text-left text-white">Contoh : Gedung Grha Savina Vidi</p>
                            <div class="form-group">
                                <input class="form-control" name="resepsi_place" type="text" placeholder="Tuliskan.." maxlength="45" required>
                            </div>
                            <!-- form group -->
                            <h6 class="text-left text-white">Alamat Resepsi</h6>
                            <p class="text-left text-white">Contoh : Jalan Magelang KM19 Tempel, Sleman, Yk</p>
                            <div class="form-group">
                                <input class="form-control" name="resepsi_address" type="text" placeholder="Tuliskan.." maxlength="100" required>
                            </div>
                            <!-- form group -->
                            <h6 class="text-left text-white">Link GoogleMap Resepsi</h6>
                            <div class="form-group">
                                <input class="form-control" name="resepsi_map" type="text" placeholder="Tuliskan.." maxlength="500" required>
                            </div>
                            <!-- form group -->
                            <h6 class="text-left text-white">Tanggal Resepsi</h6>
                            <div class="form-group">
                                <input class="form-control" name="resepsi_date" type="date" placeholder="Tuliskan.." required>
                            </div>
                            <!-- form group -->
                            <h6 class="text-left text-white">Jam Resepsi</h6>
                            <p class="text-left text-white">Contoh : 08.00 - 09.00</p>
                            <div class="form-group">
                                <input class="form-control" name="resepsi_time" type="text" placeholder="Tuliskan.." maxlength="15" required>
                            </div>
                            <!-- form group -->
                        </div>
                    </div>
                    <!-- Submit Button-->
                    <div class="text-center">
                        <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </section>

    <?php } elseif ($this->input->get('order') == 'sukses') { ?>

        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-heading text-uppercase">Sukses!</div>
                <div class="masthead-subheading">Pesanan berhasil terkirim</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="<?= base_url(); ?>">Back</a>
            </div>
        </header>

    <?php } else {
        redirect(base_url('#portfolio'));
    } ?>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?= base_url(); ?>assets/home/img/js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>