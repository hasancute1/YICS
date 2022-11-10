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
                                        <div class="card-header card-header-transparent">
                                            <div class="panel-heading">
                                                <h3 class=" text-left">SUBJECT</h3>
                                                <hr style="border-color:grey;">
                                            </div>
                                        </div>

                                        <form autocomplete="off" method="get" action="">
                                            <input type="hidden" name="id_ia" value="<?= $_GET['id_ia'] ?>">
                                            <div class="row card-body">
                                                <div class="col-lg-2 col-md-2">
                                                    <h4>Department</h4>

                                                    <?php $departement = query("SELECT * from depart"); ?>

                                                    <div class="form-group">
                                                        <select class="form-control" name="departement"
                                                            id="departement">
                                                            <option>Pilih Department</option>
                                                            <?php foreach($departement as $row){ ?>
                                                            <option value="<?= $row['id_dep'] ?>" <?php 
                                  if(isset($_GET['departement'])){ ?>
                                                                <?= ($_GET['departement'] == $row['id_dep'])?"selected":"" ?>
                                                                <?php } ?> class="terpilih"><?= $row['depart'] ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-lg-3 col-md-3">
                                                    <h4>Cost Type</h4>

                                                    <?php $jenis_cost = query("SELECT * from kategori_proposal"); ?>
                                                    <div class="form-group">
                                                        <select class="form-control" name="cost_type" id="cost_type">
                                                            <option>Pilih Cost Type</option>

                                                            <?php foreach($jenis_cost as $row){ ?>
                                                            <option value="<?= $row['id_kat'] ?>"
                                                                <?= (isset($_GET['cost_type']) &&  $_GET['cost_type'] == $row['id_kat'])?"selected":"" ?>
                                                                class="terpilih"><?= $row['kategori'] ?></option>

                                                            <?php } ?>

                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <h4>NO. IA</h4>
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-8">

                                                            <?php $list_ia = query("SELECT * from ia"); ?>

                                                            <div class="form-group">
                                                                <select class="form-control" name="ia_selected"
                                                                    id="ia_selected">
                                                                    <option>Kode Depart.</option>
                                                                    <?php foreach($list_ia as $row){ ?>

                                                                    <option value="<?= $row['id_ia'] ?>"
                                                                        <?= (isset($_GET['cost_type']) && $_GET['ia_selected'] == $row['id_ia'])?"selected":"" ?>
                                                                        class="terpilih"><?= $row['ia'] ?></option>

                                                                    <?php } ?>

                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-1/2 col-md-1/2">
                                                            <span class="font-size-20">-</span>
                                                        </div>
                                                        <div class="col">

                                                            <div class="form-group " data-plugin="formMaterial">
                                                                <input type="text" class="form-control "
                                                                    name="angka_belakang"
                                                                    placeholder="5 Angka Belakang">
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
                                                        <button type="submit" class="btn btn-success btn-icon ">
                                                            <i class="icon wb-search" aria-hidden="true"></i>SEARCH
                                                        </button>
                                                    </a>
                                                </div>

                                            </div>

                                        </form>

                                    </div>
                                </div>
                                <!-- End first -->

                                <?php 
            $_GET['ia_selected']=8;
            // data ia

            if( isset($_GET['ia_selected']) && $_GET['ia_selected'] != 0){
              $id_ia = $_GET['ia_selected'];
              
            }else{
              $id_ia = $_GET['id_ia'];
            }
            



            $data_ia = single_query("SELECT * FROM ia where id_ia='".$id_ia."'");           

            ?>

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