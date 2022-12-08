<!--header-->
<?php

include("../config/config.php");

// periksa apakah user sudah login, cek kehadiran session name
// jika tidak ada, redirect ke login.php
if (!isset($_SESSION['yics_user'])) {
  header('location: ../index.php');
}

// jika yang login general user


?>
<?php
include '../elemen/header.php';?>
<!-- end header -->

<body class="animsition">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">

        <!--navbaricon -->
        <?php include '../elemen/navbaricon.php';?>
        <!-- end navbaricon     -->

        <div class="navbar-container container-fluid">
            <!-- Navbar Collapse -->
            <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
                <!-- Navbar left -->
                <?php include '../elemen/navbarleft.php';?>
                <!-- End Navbar left -->

                <!-- Navbar Right -->
                <?php include '../elemen/navbarright.php';?>
                <!-- End Navbar Right -->
            </div>
            <!-- End Navbar Collapse -->

            <!-- Site Navbar Search -->
            <?php include '../elemen/navbarsearch.php';?>
            <!-- End Site Navbar Search -->
        </div>
    </nav>
    <div class="site-menubar">
        <!-- sidebar -->
        <div class="site-menubar-body">
            <div>
                <div><br><br>

                    <?php include '../elemen/sidebarleft.php';?>

                    <!-- Site Navbar Search -->
                    <?php include '../elemen/sidebar.php';?>
                    <!-- End Site Navbar Search -->
                    <!-- end sidebar -->

                    <!-- sidebar back -->
                    <?php include '../elemen/sidebarback.php';?>
                    <!-- end sidebar back -->

                    <!-- Page -->

                    <div class="page">
                        <div class="page-header">
                            <h1 class="page-title font-size-26 font-weight-600">My Orders</h1>
                        </div>
                        <div class="page-content container-fluid">
                            <div class="row">
                                <!-- First Row -->
                                <div class="col-lg-12 col-md-12">
                                    <div class="card card-shadow bg-white-100" style="border-radius: 10px;">
                                        <div class="card-body">
                                            <form autocomplete="off" method="get" action="" id="formulir">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2"><?php 
                                                    $fiscal_aktif = single_query("SELECT * from time_fiscal WHERE status = 'AKTIF'");
                                                    
                                                    $list_periode = query("SELECT * FROM time_fiscal
                                                   
                                                    ");

                                                    ?>

                                                        <div class=" form-group">
                                                            <select class="form-control" name="periode" id="periode">

                                                                <?php foreach ($list_periode as $key => $row) { ?>
                                                                <option value="<?= $row['id_fis'] ?>"
                                                                    <?= ($row['id_fis'] == $fiscal_aktif['id_fis'])?'selected':'' ?>>
                                                                    <?= $row['periode'] ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="data"></div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Third Right -->
                    <!-- End Third Row -->
                </div>
            </div>
        </div>
        <!-- End Page -->

        <!-- Footer -->
        <?php include '../elemen/footer.php';?>

        <script type="text/javascript">
        $(document).ready(function() {


            $("#periode").change(function() {
                tampilData()
            });
            tampilData()

            function tampilData() {
                var prde = $("#periode").val();
                console.log(periode);
                $.ajax({
                    type: 'GET',
                    url: "../proses/my_order/hasil.php",
                    data: {
                        periode: prde
                    },
                    cache: false,
                    success: function(msg) {
                        $(".data").html(msg);
                    }
                });
            }
        });
        </script>





        <!-- !-- < script type = "text/javascript" >
        $(document).ready(function() {
            $('.data').load("data.php");
            $("#periode").change(function() {
                var prde = $("#periode").val();
                $.ajax({
                    type: 'POST',
                    url: "../proses/my_order/periode.php",
                    data: {
                        periode: prde,
                    },
                    success: function(hasil) {
                        $('.data').html(hasil);
                    }
                });
            });
        });
    </> --> -->

        <!-- <script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            type: 'POST',
            url: "../proses/Search/depart.php",
            cache: false,
            success: function(msg) {
                $("#depart").html(msg);
            }
        });


        $("#depart").change(function() {
            var depart = $("#depart").val();
            console.log(depart);
            $.ajax({
                type: 'POST',
                url: "../proses/Search/cost_type.php",
                data: {
                    depart: depart
                },
                cache: false,
                success: function(msg) {
                    $("#cost_type").html(msg);
                }
            });
        });

        $("#cost_type").change(function() {
            var data_formulir = $('#formulir').serialize();

            $.ajax({
                type: 'GET',
                url: "../proses/Search/get_proposal.php",
                data: data_formulir,
                cache: false,
                success: function(msg) {
                    $("#proposal").html(msg);
                }
            });

            $.ajax({
                type: 'GET',
                url: "../proses/Search/get_ia.php",
                data: data_formulir,
                cache: false,
                success: function(msg) {
                    $("#ia_selected").html(msg);
                }
            });



        });


        $("#proposal").change(function() {

            var data_formulir = $('#formulir').serialize();

            $.ajax({
                type: 'GET',
                url: "../proses/Search/get_ia.php",
                data: data_formulir,
                cache: false,
                success: function(msg) {
                    $("#ia_selected").html(msg);
                }
            });



        });


        $('#search').click(function(event) {
            event.preventDefault();
            var ia_selected = $('#ia_selected').val();

            $.ajax({
                type: 'GET',
                url: "../proses/Search/tracking_ia.php",
                data: {
                    id_ia: ia_selected
                },
                cache: false,
                success: function(msg) {
                    $("#tracking-ia").html(msg);
                }
            });


        });


    });
    </script> -->