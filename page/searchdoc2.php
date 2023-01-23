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
                                                    <div class="form-group">
                                                        <label for="periode">
                                                            <h4>PERIODE</h4>
                                                        </label>
                                                        <select class="form-control text-uppercase" name="periode"
                                                            id="periode">
                                                            <option>Pilih Periode</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2">
                                                    <div class="form-group text-uppercase">
                                                        <label for="depart">
                                                            <h4>DEPARTMENT</h4>
                                                        </label>
                                                        <select class="form-control text-uppercase" name="depart"
                                                            id="depart">
                                                            <option>Pilih Department</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="area">
                                                            <h4>AREA</h4>
                                                        </label>
                                                        <select class="form-control text-uppercase" name="area"
                                                            id="area">
                                                            <option>Pilih Area</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="cost_type">
                                                            <h4>Category</h4>
                                                        </label>
                                                        <select class="form-control text-uppercase" name="cost_type"
                                                            id="cost_type">
                                                            <option>Pilih Category</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label for="cost_type">
                                                            <h4>PROPOSAL</h4>
                                                        </label>
                                                        <select class="form-control text-uppercase" name="proposal"
                                                            id="proposal">
                                                            <option value="0">Pilih Proposal</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6">

                                                    <div class="form-group">
                                                        <label for="cost_type">
                                                            <h4>NO. IA</h4>
                                                        </label>
                                                        <select class="form-control text-uppercase" name="ia_selected"
                                                            id="ia_selected">
                                                            <option value="0">Pilih NO IA.</option>
                                                        </select>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="card-footer col-lg-12 col-md-12 text-md-right bg-blue-100">
                                                <a href="" data-toggle="tooltip" data-original-title="Reset">
                                                    <button type="submit" class="btn btn-danger">
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
                                    type: 'GET',
                                    url: "../proses/Search2/periode.php",
                                    cache: false,
                                    success: function(msg) {
                                        $("#periode").html(msg);
                                    }
                                });

                                function getDepart() {
                                    var data_formulir = $('#formulir').serialize();
                                    $.ajax({
                                        type: 'GET',
                                        url: "../proses/Search2/depart.php",
                                        data: data_formulir,
                                        cache: false,
                                        success: function(msg) {
                                            $("#depart").html(msg);
                                        }
                                    });
                                }

                                function getArea() {
                                    var data_formulir = $('#formulir').serialize();
                                    $.ajax({
                                        type: 'GET',
                                        url: "../proses/Search2/area.php",
                                        data: data_formulir,
                                        cache: false,
                                        success: function(msg) {
                                            $("#area").html(msg);
                                        }
                                    });
                                }

                                function getCostType() {
                                    var dept = $("#depart").val();
                                    var prd = $("#periode").val();
                                    var are = $("#area").val();
                                    // console.log(depart);
                                    $.ajax({
                                        type: 'GET',
                                        url: "../proses/Search2/cost_type.php",
                                        data: {
                                            depart: dept,
                                            periode: prd,
                                            area: are
                                        },
                                        cache: false,
                                        success: function(msg) {
                                            $("#cost_type").html(msg);
                                        }
                                    });
                                }

                                function getProp() {
                                    var are = $("#area").val();
                                    var prd = $("#periode").val();
                                    var cost = $("#cost_type").val();
                                    $.ajax({
                                        type: 'GET',
                                        url: "../proses/Search2/get_proposal.php",
                                        data: {
                                            area: are,
                                            periode: prd,
                                            cost_type: cost
                                        },
                                        cache: false,
                                        success: function(msg) {
                                            $("#proposal").html(msg);
                                        }
                                    });
                                }

                                function getIA() {
                                    var prop = $("#proposal").val();
                                    $.ajax({
                                        type: 'GET',
                                        url: "../proses/Search2/get_ia.php",
                                        data: {
                                            proposal: prop

                                        },
                                        cache: false,
                                        success: function(msg) {
                                            $("#ia_selected").html(msg);
                                        }
                                    });
                                }
                                $("#periode").change(function() {
                                    getDepart()
                                    getArea()
                                    getCostType()
                                    getProp()
                                    getIA()
                                });

                                $("#depart").change(function() {
                                    getArea()
                                    getCostType()
                                    getProp()
                                    getIA()
                                });

                                $("#area").change(function() {
                                    getCostType()
                                    getProp()
                                    getIA()
                                });

                                $("#cost_type").change(function() {
                                    getProp()
                                    getIA()
                                });
                                $("#proposal").change(function() {
                                    getIA()
                                });


                                $('#search').click(function(event) {
                                    event.preventDefault();
                                    var ia_selected = $('#ia_selected').val();
                                    $.ajax({
                                        type: 'GET',
                                        url: "../proses/Search2/tracking_ia.php",
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
                $(function() {
                    $('#reset_form').click(function() {
                        $(':input', '#formulir')
                            .not(':button, :submit, :reset, :hidden')
                            .val('')
                            .removeAttr('checked')
                            .removeAttr('selected');
                    });
                });
                </script>


                <!-- End Page -->

                <!-- Footer -->
                <?php
include '../elemen/footer.php';?>