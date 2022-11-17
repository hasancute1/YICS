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
                    <!-- Site Navbar Utama -->
                    <?php include '../elemen/sidebarleft.php';?>
                    <!-- Site Navbar Search -->
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
                                                        <span class="font-size-20 bold">Form kurs mata uang asing</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body bg-white">

                                            <?php 
                
                  //query select konversi_matauang 
                  $id=$_GET ["ubah"];
                  $kurs = mysqli_query($link_yics ,"SELECT * FROM konversi_matauang WHERE id_matauang='$id'")or die (mysqli_error($link_yics));
                  $data = mysqli_fetch_assoc($kurs);
                ?>

                                            <form action="../proses/usersetting/uang_asing.php" method="POST"
                                                class="needs-validation" novalidate="">
                                                <input type="hidden" name="ubah">
                                                <div class="table table-responsive">
                                                    <table class="table display nowrap" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="align-middle text-center" hidden>id_matauang
                                                                </th>
                                                                <th class="align-middle text-center"></th>
                                                                <th class="align-middle text-center">
                                                                    MATA UANG ASING
                                                                </th>
                                                                <th class="align-middle text-center"></th>
                                                                <th class="align-middle text-center">
                                                                    <u>RUPIAH</u>
                                                                </th>

                                                            </tr>
                                                        <tbody>
                                                            <tr>
                                                                <td class="align-middle text-center" hidden>
                                                                    <input type=" number" name="id_matauang"
                                                                        placeholder="Nominal Rupiah"
                                                                        value="<?php echo $data['id_matauang']; ?>">
                                                                </td>
                                                                <td class=" align-middle text-center">YEN</td>
                                                                <td class="align-middle text-center">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">JPY</span>
                                                                        </div>
                                                                        <input type="number"
                                                                            class="form-control bg-red-100"
                                                                            placeholder="Nominal Yen" value="1"
                                                                            readonly>
                                                                    </div>
                                                                </td>
                                                                <td class=" align-middle text-center">
                                                                    <i class="icon wb-arrow-right font-size-30"
                                                                        aria-hidden="true"></i>
                                                                </td>
                                                                <td class=" align-middle text-center">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">RP</span>
                                                                        </div>
                                                                        <input type="text" name="yen"
                                                                            class="form-control bg-green-100 uang"
                                                                            placeholder="Nominal Rupiah"
                                                                            value="<?php echo number_format($data['yen']);?>">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="align-middle text-center" hidden>ID STEP</td>
                                                                <td class="align-middle text-center">DOLLAR</td>
                                                                <td class="align-middle text-center">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">&nbsp;
                                                                                $&nbsp;&nbsp; </span>
                                                                        </div>
                                                                        <input type="number"
                                                                            class="form-control bg-red-100"
                                                                            placeholder="Nominal Dollar" value="1"
                                                                            readonly>
                                                                    </div>
                                                                </td>
                                                                <td class=" align-middle text-center">
                                                                    <i class="icon wb-arrow-right font-size-30"
                                                                        aria-hidden="true"></i>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">RP</span>
                                                                        </div>

                                                                        <input type="text" name="dollar"
                                                                            class="form-control bg-green-100 uang"
                                                                            placeholder="Nominal Rupiah"
                                                                            value="<?php echo number_format($data['dollar']);?>">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        </thead>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-danger">Reset</button>
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