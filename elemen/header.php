<!-- <?php

// include("../config/config.php");
// // periksa apakah user sudah login, cek kehadiran session name
//   // jika tidak ada, redirect ke login.php
// if (!isset($_SESSION['yics_user'])) {
//   header('location: ../index.php');
// }
?> -->
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">

    <title>YICS</title>
    <style>
    .warnadep1 {
        background-color: #ffcd17;
    }

    .warnadep2 {
        background-color: #f2353c;
    }

    .warnadep3 {
        background-color: #7231f5;
    }

    .warnadep4 {
        background-color: #17b3a3;
    }

    .warnadep5 {
        background-color: #11c26d;
    }

    .warnadep6 {
        background-color: #997b71;
    }

    /* CSS used here will be applied after bootstrap.css */
    .modal-dialog {
        overflow-y: initial !important
    }

    .modal-body {

        overflow-y: auto;
    }

    a.disabledlink {
        pointer-events: none;
        cursor: default;
    }

    .card {
        border-radius: 10px;
    }

    .btn {
        border-radius: 10px;
    }

    td {
        color: black;
    }



    @keyframes mymove {
        from {
            left: 200px;
            transform: translate(100%, 0%);
        }

        to {
            left: 0px;

        }
    }

    .d {

        position: relative;
        animation: mymove 3s infinite;
        animation-iteration-count: 2;
    }

    .garis {


        outline: solid;
        outline-width: 2px;
        outline-offset: 7px;
    }

    .coret {
        text-decoration: line-through;
    }

    @media print {
        @page {
            size: landscape
        }
    }

    ;

    .pesan {
        display: none;
        color: white;
        margin: 10px;
    }

    th {
        color: white;
    }

    .dropdown-menu>a:hover,
    .dropdown-menu>a:focus {
        background-image: none !important;
    }

    .dropdown-menu>a:hover,
    .dropdown-menu>a:focus {
        color: white;
        background-color: #589FFC;
    }

    .image_area {
        position: relative;
    }

    img {
        display: block;
        max-width: 100%;
    }

    .preview {
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }

    .modal-lg {
        max-width: 1000px !important;
    }

    .overlaytext {
        position: absolute;
        bottom: 10px;
        left: 0;
        right: 0;
        background-color: rgba(255, 255, 255, 0.5);
        overflow: hidden;
        height: 0;
        transition: .5s ease;
        width: 100%;
    }

    .image_area:hover .overlaytext {
        height: 50%;
        cursor: pointer;
    }

    .textiam {
        color: #333;
        font-size: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
    }
    </style>




    <link rel="apple-touch-icon" href="../base/assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="../base/assets/images/favicon.ico">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../global/css/bootstrap.min.css">
    <link rel="stylesheet" href="../global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="../base/assets/css/site.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <!-- Plugins -->
    <link rel="stylesheet" href="../global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="../global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="../global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="../global/vendor/intro-js/introjs.css">

    <link rel="stylesheet" href="../global/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="../base/assets/examples/css/charts/chartjs.css">
    <link rel="stylesheet" href="../global/vendor/webui-popover/webui-popover.css">
    <link rel="stylesheet" href="../global/vendor/toolbar/toolbar.css">
    <link rel="stylesheet" href="../global/vendor/bootstrap-sweetalert/sweetalert.css">
    <link rel="stylesheet" href="../global/vendor/toastr/toastr.css">
    <link rel="stylesheet" href="../base/assets/examples/css/advanced/scrollable.css">
    <link rel="stylesheet" href="../base/assets/examples/css/uikit/modals.css">
    <link rel="stylesheet" href="../base/assets/examples/css/forms/layouts.css">
    <link rel="stylesheet" href="../global/vendor/aspieprogress/asPieProgress.css">
    <link rel="stylesheet" href="../base/assets/examples/css/charts/pie-progress.css">
    <link rel="stylesheet" href="../base/assets/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../base/assets/examples/css/structure/pagination.css">

    <!-- data table for export -->
    <link rel="stylesheet" href="../base/assets/datatable/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../base/assets/datatable/buttons.dataTables.min.css">
    <!-- data table for export -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css"> -->







    <!-- <script src="assetmoris/datadonutmoris/grafikmoris.js"></script>  -->
    <!-- <link rel="stylesheet" href="../global/vendor/morris/morris.css"> -->
    <!-- datatabble -->
    <link rel="stylesheet" href="../global/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- <link rel="stylesheet" href="../global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css">
        <link rel="stylesheet" href="../global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css">
        <link rel="stylesheet" href="../global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css">
        <link rel="stylesheet" href="../global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css">
        <link rel="stylesheet" href="../global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css">
        <link rel="stylesheet" href="../global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css">
        <link rel="stylesheet" href="../global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css">
        <link rel="stylesheet" href="../base/assets/examples/css/tables/datatable.css"> -->

    <!-- Fonts -->
    <link rel="stylesheet" href="../global/fonts/font-awesome/font-awesome.css">
    <link rel="stylesheet" href="../global/fonts/7-stroke/7-stroke.css">
    <link rel="stylesheet" href="../global/fonts/ionicons/ionicons.css">
    <link rel="stylesheet" href="../global/fonts/material-design/material-design.css">
    <link rel="stylesheet" href="../global/fonts/mfglabs/mfglabs.css">
    <link rel="stylesheet" href="../global/fonts/open-iconic/open-iconic.css">
    <link rel="stylesheet" href="../global/fonts/themify/themify.css">
    <link rel="stylesheet" href="../global/fonts/weather-icons/weather-icons.css">
    <link rel="stylesheet" href="../global/fonts/glyphicons/glyphicons.css">
    <link rel="stylesheet" href="../global/fonts/octicons/octicons.css">
    <link rel="stylesheet" href="../global/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="../global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='../base/assets/datatable/css.css'>
    <link rel="stylesheet" href="../global/vendor/nprogress/nprogress.css">
    <link rel="stylesheet" href="../base/assets/examples/css/advanced/animation.css">
    <link rel="stylesheet" href="../global/vendor/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="../global/vendor/slick-carousel/slick.css">
    <link rel="stylesheet" href="../base/assets/examples/css/uikit/carousel.css">



    <!-- <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'> -->

    <!--[if lt IE 9]>
    <script src="../global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

    <!--[if lt IE 10]>
    <script src="../global/vendor/media-match/media.match.min.js"></script>
    <script src="../global/vendor/respond/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <script src="../global/vendor/breakpoints/breakpoints.js"></script>
    <script>
    Breakpoints();
    </script>
    <script src="../global/vendor/jquery/jquery.js"></script>
    <script src="../global/vendor/morris/morris.min.js"></script>
    <script src="../global/vendor/raphael/raphael.min.js"></script>
    <script src="../base/assets/datatable/jquery.min.js"></script>
    <script src="../global/js/apex/apexcharts.js"></script>
    <link rel="stylesheet" href=../global/crop/dropzone.css" />
    <link rel="stylesheet" href="../global/crop/cropper.css" />

</head>