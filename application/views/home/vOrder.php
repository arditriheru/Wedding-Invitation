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
            <a class="navbar-brand" href="#page-top">UndanganKu</a>
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
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase"><?= $title; ?></h2>
                <h3 class="section-subheading text-muted"><?= $subtitle; ?></h3>
            </div>

            <form class="form-prevent" id="contactForm" action="<?php echo base_url('home/orderAksi/' . $this->input->get('template') . '/' . $this->session->userdata('id_customer')); ?>" method="post" enctype="multipart/form-data">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <h6 class="text-left text-white">Nama Mempelai pria</h6>
                        <div class="form-group">
                            <input class="form-control" name="groom" type="text" placeholder="Tuliskan.." maxlength="45" maxlength="45" required>
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
                        <h6 class="text-left text-white">Nama Mempelai wanita</h6>
                        <div class="form-group">
                            <input class="form-control" name="bride" type="text" placeholder="Tuliskan.." maxlength="45" required>
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