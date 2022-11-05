<!--header-->
<?php

include("../config/config.php");
// periksa apakah user sudah login, cek kehadiran session name
  // jika tidak ada, redirect ke login.php
if (!isset($_SESSION['yics_user'])) {
  header('location: ../index.php');
}
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


                        <div class="page-content container-fluid">
                            <div class="row">
                                <!-- Second Row -->
                                <div class="col-lg-12 col-md-12">
                                    <div class="card card-shadow">
                                        <div class="card-header card-header-transparent bg-dark">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="float-left">
                                                        <span class="font-size-20 bold">Form ubah fiscal</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body bg-white">

                                            <?php 
                  //ambil data di url
                  $id=$_GET ["ubah"];
                  //query data mahasiswa berdasarkan id menghasilkan array numeric
                  $ubah = mysqli_query($link_yics ,"SELECT * FROM time_fiscal WHERE id_fis = '$id'")or die (mysqli_error($link_yics));
                  $data = mysqli_fetch_assoc($ubah);
                ?>

                                            <form action="../proses/usersetting/timefiscal.php" method="POST"
                                                class="needs-validation" novalidate="">
                                                <input type="hidden" name="ubah">
                                                <div class="form-group row">
                                                    <input type="hidden" class="form-control" name="id"
                                                        autocomplete="off" value="<?php echo $data['id_fis']; ?>"
                                                        required>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label"
                                                        style="color:black;">Periode</label>
                                                    <div class="col-md-10">
                                                        <input type="number" class="form-control" name="periode"
                                                            autocomplete="off" value="<?php echo $data['periode']; ?>"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label" style="color:black;">Start
                                                        Fiscal</label>
                                                    <div class="col-md-10">
                                                        <input type="date" class="form-control" name="awal"
                                                            autocomplete="off" value="<?php echo $data['awal']; ?>"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label" style="color:black;">End
                                                        Fiscal</label>
                                                    <div class="col-md-10">
                                                        <input type="date" class="form-control" name="akhir"
                                                            autocomplete="off" value="<?php echo $data['akhir']; ?>"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label"
                                                        style="color:black;">Status</label>
                                                    <div class="col-md-10">
                                                        <select name="status" class="form-control">
                                                            <option value="<?php echo $data['status']; ?>">
                                                                <?php echo $data['status']; ?></option>
                                                            <?php 
                              $status=mysqli_query($link_yics,"SELECT * FROM `status`") or die (mysqli_error($link_yics));
                              if (mysqli_num_rows($status)>0){
                                while($rows_status = mysqli_fetch_assoc($status)){ ?>
                                                            <option value="<?php echo $rows_status ['status'] ; ?> ">
                                                                <?php echo $rows_status ['status'] ; ?></option>
                                                            <?php  
                                  }
                              }
                               ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="../page/fiscalsetting.php" type="reset"
                                                        class="btn btn-danger">Kembali</a>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form><!-- end form-content--------- -->
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
            <?php
include '../elemen/footer.php';?>