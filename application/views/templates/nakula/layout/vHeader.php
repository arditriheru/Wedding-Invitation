<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Undangan Pernikahan <?php echo $mw . " & " . $mp; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Undangan Pernikahan <?php echo $mw . " & " . $mp; ?>" />
    <meta name="keywords" content="<?php echo $tgl_akad; ?>" />
    <meta property="og:title" content="UNDANGAN PERNIKAHAN <?php echo strtoupper($mw . " & " . $mp); ?>" />
    <meta property="og:description" content="<?php echo $tgl_akad; ?>" />
    <meta property="og:image" content="<?php echo base_url(); ?>assets/templates/nakula/images/thumbnail.jpg" />

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>assets/portfolio/img/favicon.png" rel="icon">
    <link href="<?php echo base_url(); ?>assets/portfolio/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/nakula/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/nakula/css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/nakula/css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/nakula/css/magnific-popup.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/nakula/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/nakula/css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/nakula/css/style.css">

    <!-- Modernizr JS -->
    <script src="<?php echo base_url(); ?>assets/templates/nakula/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
<script src="js/respond.min.js"></script>
<![endif]-->

    <audio id="myAudio">
        <source src="<?php echo base_url(); ?>assets/templates/nakula/images/backsound.mp3" type="audio/mp3">
    </audio>

    <script>
        function openButton() {
            var x = document.getElementById("myAudio");
            x.play();
            var x = document.getElementById("hidden");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function playAudio() {
            x.play();
        }

        function pauseAudio() {
            x.pause();
        }
    </script>

    <style>
        #scroll {
            width: 100%;
            height: 500px;
            overflow: scroll;
            padding: 10px;
            background: #fff;
        }
    </style>

</head>