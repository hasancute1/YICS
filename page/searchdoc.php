<?php
include("../config/config.php");

if (!isset($_SESSION['yics_user'])) {
  header('location: ../index.php');
}
?>
<!--header-->
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
                            <h1 class="page-title font-size-26 font-weight-600">Tracking Document</h1>
                        </div>


                        <div class="page-content container-fluid">
                            <div class="row">
                                <!-- First Row -->
                                <div class="col-lg-12 col-md-12">
                                    <div class="card card-shadow bg-blue-100" style="border-radius: 10px;">
                                        <form autocomplete="off" method="get" action="" id="formulir">
                                            <div class="row card-body">
                                                <div class="col-lg-2 col-md-2">
                                                    <?php 
                                                    $fiscal_aktif = single_query("SELECT * from time_fiscal WHERE status = 'AKTIF'");
                                                    
                                                    $list_periode = query("SELECT time_fiscal.id_fis , periode FROM tracking_ia
                                                    JOIN  ia on tracking_ia.id_ia = ia.id_ia
                                                    JOIN proposal on ia.id_prop = proposal.id_prop
                                                    JOIN time_fiscal on proposal.id_fis  = time_fiscal.id_fis
                                                    GROUP BY proposal.id_fis 
                                                    ");

                                                    ?>
                                                    <div class="form-group">
                                                        <label for="depart">
                                                            <h4>PERIODE</h4>
                                                        </label>
                                                        <select class="form-control" name="periode" id="periode">
                                                            <option>Pilih Periode</option>
                                                            <?php foreach ($list_periode as $key => $row) { ?>
                                                            <option value="<?= $row['id_fis'] ?>"
                                                                <?= ($row['id_fis'] == $fiscal_aktif['id_fis'])?'selected':'' ?>>
                                                                <?= $row['periode'] ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2">
                                                    <div class="form-group">
                                                        <label for="depart">
                                                            <h4>DEPARTMENT</h4>
                                                        </label>
                                                        <select class="form-control" name="depart" id="depart">
                                                            <option>Pilih Department</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2">

                                                    <div class="form-group">
                                                        <label for="cost_type">
                                                            <h4>COST TYPE</h4>
                                                        </label>
                                                        <select class="form-control" name="cost_type" id="cost_type">
                                                            <option>Pilih Cost Type</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="cost_type">
                                                            <h4>PROPOSAL</h4>
                                                        </label>
                                                        <select class="form-control" name="proposal" id="proposal">
                                                            <option value="0">Pilih Proposal</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-3">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="cost_type">
                                                                <h4>NO. IA</h4>
                                                            </label>
                                                            <select class="form-control" name="ia_selected"
                                                                id="ia_selected">
                                                                <option value="0">Pilih NO IA.</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer col-lg-12 col-md-12 text-md-right bg-blue-100">
                                                <a href="" data-toggle="tooltip" data-original-title="Reset">
                                                    <button type="button" id="reset_form" class="btn btn-danger">
                                                        RESET
                                                    </button>
                                                </a>
                                                <a href="" data-toggle="tooltip" data-original-title="Search">
                                                    <button type="submit" class="btn btn-success btn-icon " id="search">
                                                        <i class="icon wb-search" aria-hidden="true"></i>SEARCH
                                                    </button>
                                                </a>
                                            </div>
                                        </form>

                                    </div>
                                    <div id="tracking-ia">



                                        <!-- data tracking ia -->



                                        <!-- content ia di sini dari ajax -->

                                    </div>


                                </div>
                            </div>
                            <!-- End first -->
                            <script type="text/javascript">
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
                            </script>





                            <!-- Second Row -->


                        </div>

                    </div>
                </div>


                <script>
                $('#reset_form').click(function(event) {
                    event.preventDefault();

                    $(".terpilih").prop("selected", false);

                });
                </script>


                <!-- End Page -->

                <!-- Footer -->
                <?php
include '../elemen/footer.php';?>