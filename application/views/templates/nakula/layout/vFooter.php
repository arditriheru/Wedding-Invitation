<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/templates/nakula/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="<?php echo base_url(); ?>assets/templates/nakula/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/templates/nakula/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="<?php echo base_url(); ?>assets/templates/nakula/js/jquery.waypoints.min.js"></script>
<!-- Carousel -->
<script src="<?php echo base_url(); ?>assets/templates/nakula/js/owl.carousel.min.js"></script>
<!-- countTo -->
<script src="<?php echo base_url(); ?>assets/templates/nakula/js/jquery.countTo.js"></script>

<!-- Stellar -->
<script src="<?php echo base_url(); ?>assets/templates/nakula/js/jquery.stellar.min.js"></script>
<!-- Magnific Popup -->
<script src="<?php echo base_url(); ?>assets/templates/nakula/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templates/nakula/js/magnific-popup-options.js"></script>

<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/templates/nakula/js/simplyCountdown.min.js"></script>
<!-- Main -->
<script src="<?php echo base_url(); ?>assets/templates/nakula/js/main.js"></script>

<script>
    simplyCountdown('.simply-countdown', {
        year: <?php echo $counter_thn . ",month:" . $counter_bln . ",day:" . $counter_tgl; ?>
    });
    var isNS = (navigator.appName == "Netscape") ? 1 : 0;
    if (navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN || Event.MOUSEUP);

    function mischandler() {
        return false;
    }

    function mousehandler(e) {
        var myevent = (isNS) ? e : event;
        var eventbutton = (isNS) ? myevent.which : myevent.button;
        if ((eventbutton == 2) || (eventbutton == 3)) return false;
    }
    document.oncontextmenu = mischandler;
    document.onmousedown = mousehandler;
    document.onmouseup = mousehandler;
</script>

</body>

</html>