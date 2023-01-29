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
                    <?php
                    $name = $_SESSION['yics_user'];
                    $ur = mysqli_query($link_yics, "SELECT * FROM data_user 
                    JOIN area on area.id_area =  data_user.id_area  
                    JOIN depart on area.id_dep =  depart.id_dep  
                    JOIN division on depart.id_div =  division.id_div
                    JOIN user_role on user_role.id_role =  data_user.id_level
                    WHERE data_user.username='$name'") or die(mysqli_error($link_yics)); 
                    if(mysqli_num_rows($ur)>0){
                        $data = mysqli_fetch_array($ur);

                        $nama= $data['nama'];
                        $npk= $data['username'];
                        $role= $data['role_name'];
                        $area= $data['area'];
                        $depart= $data['depart'];
                        $divisi= $data['divisi'];
                        $pswrd_lama= $data['pass'];
                    }else{
                        $nama= 'data belum ada';
                        $npk= 'data belum ada';
                        $role= 'data belum ada';
                        $area= 'data belum ada';
                        $depart='data belum ada';
                        $divisi= 'data belum ada';
                        $pswrd_lama= 'data belum ada';
                    }               
                  
                   
                 
                    ?>
                    <div class="page">
                        <div class="page-header">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h1 class="page-title font-size-26 font-weight-600">MY PROFILE
                                        </h1>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <a href="dashboard.php" class="btn btn-icon btn-info">
                                            <span class="page-title font-size-20 font-weight-600">
                                                << BACK </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="page-content container-fluid">
                            <div class="row">
                                <!-- Second Row -->
                                <div class="col-lg-12 col-md-12">
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="card"
                                                style="border-radius: 10px;overflow: hidden; perspective: 1px;">
                                                <img class="card-img-top img-fluid w-full" style="height:181px;"
                                                    src="../global/portraits/back.jpg" alt="Card image cap">
                                                <div class="card-block">
                                                    <span class="text-center  text-uppercase ">
                                                        <img src="../global/portraits/unfoto.png" class="bg-green-300"
                                                            style="margin-top:-120px;width:150px;display:block;margin-left:auto;margin-right:auto;border-radius:50%;border: 2px solid #3e8ef7;"
                                                            alt="...">

                                                        <h4><?= $nama ?></h4>
                                                    </span>
                                                    <div class="">
                                                        <div class="row">
                                                            <div class="col-md-12 ">
                                                                <div class="form-group">
                                                                    <label>Npk</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i
                                                                                    class="icon wb-user"></i></span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            disabled="true" value="<?= $npk ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>User Level</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i
                                                                                    class="icon wb-user"></i></span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            disabled="true" value="<?= $role ?>">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Example Standard Card -->
                                        </div>
                                        <div class="col-md-8">

                                            <div class="card"
                                                style="border-radius: 10px;overflow: hidden; perspective: 1px;">

                                                <div class="card-body">

                                                    <form id="formpswrd">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Division</label>

                                                                    <input type="text" class="form-control"
                                                                        disabled="true" value="<?= $divisi ?> ">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 ">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Department</label>
                                                                    <input type="text" class="form-control"
                                                                        disabled="true" value="<?= $depart ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 ">
                                                                <div class="form-group">
                                                                    <label>Area</label>
                                                                    <input type="text" class="form-control"
                                                                        disabled="true" value="<?= $area ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <a class="btn btn-sm btn-info" data-toggle="collapse"
                                                                    href="#change_password" role="button"
                                                                    aria-expanded="true"
                                                                    aria-controls="collapseExample">Change
                                                                    Password</a>
                                                            </div>
                                                            <div class="collapse collapse-view col-md-12 "
                                                                id="change_password">



                                                                <label style="color:black;">
                                                                    <h5> Konfirmasi untuk
                                                                        mengubah
                                                                        password </h5>
                                                                </label>
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i
                                                                                class="icon wb-lock"></i></span>
                                                                    </div>
                                                                    <input type="password" id="old_pass"
                                                                        class="form-control"
                                                                        placeholder="Masukan password lama">
                                                                </div>
                                                                <p class="category pl-1"> <input type="checkbox"
                                                                        onclick="myFunction()"> &nbsp; Tampilkan
                                                                    password lama</p>
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i
                                                                                class="icon wb-lock"></i></span>
                                                                    </div>
                                                                    <input type="number" id="npk" required hidden
                                                                        class="form-control" value="<?= $npk ?>">
                                                                    <input type="password" id="new_pass"
                                                                        class="form-control"
                                                                        placeholder="Masukan password baru"
                                                                        autocomplete="off">
                                                                </div>

                                                                <p class="category pl-1"> <input type="checkbox"
                                                                        onclick="myFunctionw()"> &nbsp; Tampilkan
                                                                    password baru</p>

                                                                <div class="row">
                                                                    <div class="col-md-6 ">
                                                                        <button type="button"
                                                                            class="btn btn-sm  btn-outline btn-danger"
                                                                            data-toggle="collapse"
                                                                            href="#change_password" role="button"
                                                                            aria-expanded="true"
                                                                            aria-controls="collapseExample">cancel</button>
                                                                    </div>
                                                                    <div class="col-md-6 text-right">
                                                                        <button type="reset"
                                                                            class="btn btn-sm btn-warning">reset</button>
                                                                        <button type="submit" id="submit_account"
                                                                            class="btn btn-sm btn-primary">change</button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>


                                            </div>
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
        <div class="info_"></div>
        <!-- End Page -->

        <!-- Footer -->
        <?php
include '../elemen/footer.php';?>
        <script>
        function myFunction() {
            var x = document.getElementById("old_pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function myFunctionw() {
            var x = document.getElementById("new_pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        </script>
        <script>
        $(document).ready(function() {
            $('#submit_account').click(function(e) {
                e.preventDefault()
                var old_pass = $('#old_pass').val()
                var new_pass = $('#new_pass').val()
                var npk = $('#npk').val();
                console.log(npk);
                if (old_pass == '' || new_pass == '') {
                    Swal.fire({
                        title: '<strong>DATA BELUM LENGKAP</strong>',
                        icon: 'warning',
                        html: 'Silahkan isi  data password dengan lengkap',
                        timer: 1500,
                    })
                } else {
                    // console.log(old_pass)
                    $.ajax({
                        url: "../proses/profile/ajax/proses.php",
                        method: "GET",
                        data: {

                            old_pass: old_pass,
                            new_pass: new_pass,
                            npk: npk
                        },
                        success: function(html) {
                            $('.info_').html(html);
                            $('#formpswrd').trigger("reset");
                        }
                    })
                }
            })
        })
        </script>