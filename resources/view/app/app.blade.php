<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield("title")</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="<?=assets('img/favicon.ico')?>" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="<?php echo assets('lib/animate/animate.min.css')?>" rel="stylesheet">
    <link href="<?php echo assets('lib/flaticon/font/flaticon.css')?>" rel="stylesheet">
    <link href="<?php echo assets('lib/owlcarousel/assets/owl.carousel.min.css')?>" rel="stylesheet">
    <link href="<?php echo assets('lib/lightbox/css/lightbox.min.css')?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo assets('css/style.css')?>" rel="stylesheet">
</head>
<body>
    @include("layouts.header")
    @yield("content")
    @include("layouts.footer")
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo assets('lib/easing/easing.min.js')?>"></script>
    <script src="<?php echo assets('lib/wow/wow.min.js')?>"></script>
    <script src="<?php echo assets('lib/owlcarousel/owl.carousel.min.js')?>"></script>
    <script src="<?php echo assets('lib/isotope/isotope.pkgd.min.js')?>"></script>
    <script src="<?php echo assets('lib/lightbox/js/lightbox.min.js')?>"></script>
    <!-- Contact Javascript File -->
    <script src="<?php echo assets('mail/jqBootstrapValidation.min.js')?>"></script>
    <script src="<?php echo assets('mail/contact.js')?>"></script>
    <!-- Template Javascript -->
    <script src="<?php echo assets('js/main.js')?>"></script>
    @stack("js")
</body>
</html>