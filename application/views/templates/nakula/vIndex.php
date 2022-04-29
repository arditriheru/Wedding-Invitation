<body oncopy="return false" oncut="return false" onpaste="return false">

    <div class="fh5co-loader"></div>

    <div id="page">
        <nav class="fh5co-nav" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <div id="fh5co-logo"><a href="<?php echo base_url(); ?>">Teknocraft<strong>.</strong>id</a></div>
                    </div>
                    <div class="col-xs-10 text-right menu-1">
                        <ul>
                            <li class="active"><a href="#fh5co-header" class="smooth-scroll">Home</a></li>
                            <li class="active"><a href="#fh5co-couple" class="smooth-scroll">Pasangan</a></li>
                            <li class="active"><a href="#fh5co-event" class="smooth-scroll">Acara</a></li>
                            <li class="active"><a href="#fh5co-gallery" class="smooth-scroll">Protokol</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>

        <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(<?php echo base_url(); ?>assets/templates/nakula/images/the-wedding-of.jpg); background-position: 50%;">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="display-t">
                            <div class="display-tc animate-box">
                                <h2>Undangan Pernikahan</h2>
                                <h1><?php echo $mw . " &amp; " . $mp ?></h1>
                                <h2>Kepada Bapak/Ibu/Sodara/i<br> <?php echo $yth; ?><br><small>Mohon maaf bila ada kesalahan penulisan nama/gelar</small></h2>
                                <p><a href="#fh5co-couple" class="btn btn-default btn-sm smooth-scroll" onclick="openButton();">Buka Undangan</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div style="display:none;" id="hidden">

            <div id="fh5co-couple">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                            <img src="<?php echo base_url(); ?>assets/templates/nakula/images/basmallah.png" alt="groom" class="img-fluid" width="40%" height="auto"><br><br>
                            <p><strong>Assalamualaikum Warahmatullahi Wabarakatuh</strong><br>Dengan memohon rahmat dan ridho Allah SWT kami kami bermaksud menyelenggarakan pernikahan putra putri kami:</p>
                            <!-- Maha suci Allah SWT yang telah menciptakan makhluk-NYA berpasang-pasangan. untuk mengikuti Sunnah Rasul-Mu dalam rangka membentuk keluarga yang sakinah, mawaddah, warahmah. Maka izinkan kami menikahkannya. -->
                        </div>
                    </div>
                    <div class="couple-wrap animate-box">
                        <div class="couple-half">
                            <div class="groom">
                                <img src="<?php echo base_url('assets/uploads/orders/' . $mp_pict); ?>" alt="groom" class="img-responsive">
                            </div>
                            <div class="desc-groom">
                                <h3><strong><?php echo $mpp; ?></strong></h3>
                                <h4>Putra dari:</h4>
                                <h4><?php echo $mp_ortu; ?></h4>
                            </div>
                        </div>
                        <p class="heart text-center"><i class="icon-heart2"></i></p>
                        <div class="couple-half">
                            <div class="bride">
                                <img src="<?php echo base_url('assets/uploads/orders/' . $mw_pict); ?>" alt="groom" class="img-responsive">
                            </div>
                            <div class="desc-bride">
                                <h3><strong><?php echo $mwp; ?></strong></h3>
                                <h4>Putri dari:</h4>
                                <h4><?php echo $mw_ortu; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="fh5co-countdown">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <div class="display-t">
                                <div class="display-tc animate-box">
                                    <div class="simply-countdown simply-countdown-one">
                                        <p>Menuju hari istimewa kami dan kami berharap Saudara/i menjadi bagian dari hari bahagia kami</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="fh5co-event" class="fh5co-bg" style="background-image:url(<?php echo base_url(); ?>assets/templates/nakula/images/bg-wedding-event.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                            <span>Our Special Events</span>
                            <h2>Acara Pernikahan</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="display-t">
                            <div class="display-tc">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="col-md-6 col-sm-6 text-center">
                                        <div class="event-wrap animate-box">
                                            <h3>Akad Nikah</h3>
                                            <div class="event-col">
                                                <i class="icon-calendar"></i>
                                                <span><?php echo $hari_akad; ?></span>
                                                <span><?php echo $tgl_akad; ?></span>
                                            </div>
                                            <div class="event-col">
                                                <i class="icon-clock"></i>
                                                <span><?php echo $jam_akad1; ?></span>
                                                <span><?php echo $jam_akad2; ?></span>
                                            </div>
                                            <h3><?php echo $tempat_akad; ?></h3>
                                            <p><?php echo $alamat_akad; ?></p>
                                            <p><a href="<?php echo $map_akad; ?>" class="btn btn-default btn-sm" target="_blank">Google Map</a></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 text-center">
                                        <div class="event-wrap animate-box">
                                            <h3>Resepsi</h3>
                                            <div class="event-col">
                                                <i class="icon-calendar"></i>
                                                <span><?php echo $hari_resepsi; ?></span>
                                                <span><?php echo $tgl_resepsi; ?></span>
                                            </div>
                                            <div class="event-col">
                                                <i class="icon-clock"></i>
                                                <span><?php echo $jam_resepsi1; ?></span>
                                                <span><?php echo $jam_resepsi2; ?></span>
                                            </div>
                                            <h3><?php echo $tempat_resepsi; ?></h3>
                                            <p class="text-center"><?php echo $alamat_resepsi; ?></p>
                                            <p><a href="<?php echo $map_resepsi; ?>" class="btn btn-default btn-sm" target="_blank">Google Map</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="fh5co-gallery" class="fh5co-section-gray">
                <div class="container">
                    <div class="row animate-box">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                            <h2>Protokol Kesehatan</h2>
                            <p>Dalam upaya mengurangi penyebaran Covid 19 pada masa pandemi, kami harapkan kedatangan para tamu undangan agar menjalankan protokol yang berlaku.</p>
                        </div>
                    </div>
                    <div class="row animate-box">
                        <div class="display-tc">
                            <div class="col-md-3 col-sm-6 animate-box">
                                <div class="feature-center">
                                    <span>
                                        <img src="<?php echo base_url(); ?>assets/templates/nakula/images/distance.png">
                                    </span><br>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 animate-box">
                                <div class="feature-center">
                                    <span>
                                        <img src="<?php echo base_url(); ?>assets/templates/nakula/images/masker.png">
                                    </span><br>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 animate-box">
                                <div class="feature-center">
                                    <span>
                                        <img src="<?php echo base_url(); ?>assets/templates/nakula/images/wash.png">
                                    </span><br>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 animate-box">
                                <div class="feature-center">
                                    <span>
                                        <img src="<?php echo base_url(); ?>assets/templates/nakula/images/namaste.png">
                                    </span><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="fh5co-message" class="fh5co-bg" style="background-image:url(<?php echo base_url(); ?>assets/templates/nakula/images/ayat-suci.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row animate-box">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                            <h2>Kirimkan Ucapan</h2>
                        </div>
                    </div>
                    <div class="row animate-box">
                        <div class="col-md-10 col-md-offset-1">
                            <form method="post" action="<?php echo base_url('u/tambahPesan') ?>" class="form-inline" role="form">
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="id_wedding" id="id_wedding" value="<?php echo $id_wedding; ?>">
                                        <!-- <input type="hidden" class="form-control" name="pengirim" id="pengirim" value="<?php echo $yth; ?>"> -->
                                        <label for="pengirim" class="sr-only">Nama Anda</label>
                                        <input type="text" class="form-control" name="pengirim" id="pengirim" placeholder="Nama Anda.." required="">
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <div class="form-group">
                                        <label for="pesan" class="sr-only">Ucapan Anda</label>
                                        <input type="text" class="form-control" name="pesan" id="pesan" placeholder="Silahkan tulis ucapan Anda.." required="">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <button type="submit" class="btn btn-default btn-block">Kirim</button>
                                </div>
                            </form><br>
                            <div id="scroll">

                                <?php foreach ($datapesan as $d) : ?>

                                    <p><?php echo '<b>' . $d->pengirim . '</b><br>' . $d->pesan . '<br><small><i>' . date("d/m/Y", strtotime($d->tanggal)) . '&nbsp;' . $d->jam . '</i></small>'; ?></p>

                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="fh5co-gallery" class="fh5co-section-gray">
                <div class="container">
                    <div class="row animate-box">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                            <div class="col-md-12 col-sm-12 text-center">
                                <div class="event-wrap animate-box">
                                    <h3>Cashless Gift</h3>
                                    <div class="event-col">
                                        <img src="<?php echo base_url(); ?>assets/templates/nakula/images/mandiri.png" width="100px">
                                    </div><br>
                                    <button type="button" class="btn btn-outline btn-sm" data-toggle="modal" data-target="#modalCashless">
                                        Transfer Sekarang
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer id=" fh5co-footer" class="footer-bs" role="contentinfo">
                <div class="container">

                    <div class="row copyright">
                        <div class="col-md-12 text-center">
                            <p><small>Dibuat sendiri oleh @arditriheru<br>
                                    Mau buat undangan seperti ini?<br><br>
                                    <a href="https://wa.me/6289674953617" class="btn btn-outline btn-sm" style="color:white;" target="_blank">Klik Disini Untuk Mulai</a></small></p>
                        </div>
                    </div>

                </div>
            </footer>


        </div>

    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalCashless" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Cashless Gift</h5>
                </div>
                <div class="modal-body">
                    <img src="<?php echo base_url(); ?>assets/templates/nakula/images/mandiri.png" width="100px"><br><br>
                    <p>No.Rek : 1370015808989<br>An : Diah Yuniarsih</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>