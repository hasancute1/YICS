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
    <style>
    #message {
        display: none;

        color: #000;

    }

    #message p {
        padding: 0px 35px;
        font-size: 18px;
    }

    .valid {
        color: green;
    }

    .valid:before {
        position: relative;
        left: -35px;
        content: "√";
    }

    .invalid {
        color: red;
    }

    .invalid:before {
        position: relative;
        left: -35px;
        content: "X";
    }
    </style>
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
                        <div class="page-header">
                            <h1 class="page-title font-size-26 font-weight-600">USER DATA MANAGEMENT</h1>
                        </div>

                        <div class="page-content container-fluid">
                            <div class="row">
                                <!-- Second Row -->
                                <div class="col-lg-12 col-md-12">
                                    <div class="card card-shadow">
                                        <div class="card-header card-header-transparent bg-dark">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="float-left">
                                                        <span class="font-size-20 bold">Form ubah data</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body bg-white">

                                            <?php 
                  //ambil data di url
                  $username=$_GET ["ubah"];
                  //query data mahasiswa berdasarkan id menghasilkan array numeric
                  $ubah = mysqli_query($link_yics ,"SELECT * FROM data_user JOIN area on area.id_area = data_user.id_area WHERE username = '$username'")or die (mysqli_error($link_yics));
                  $data = mysqli_fetch_assoc($ubah)
                ?>

                                            <form action="../proses/usersetting/user.php" method="POST" id="tambahdata"
                                                class="needs-validation" novalidate="">
                                                <input type="hidden" name="ubah">
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label"
                                                        style="color:black;">Username</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="user"
                                                            autocomplete="off" value="<?= $data['username']; ?>"
                                                            readonly required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label"
                                                        style="color:black;">Nama</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="nama"
                                                            autocomplete="off" value="<?= $data['nama']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label"
                                                        style="color:black;">Area</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control" name="area" required>
                                                            <?php 
                                                            $role = mysqli_query($link_yics, "SELECT * FROM area") or die (mysqli_error($link_yics));
                                                            if(mysqli_num_rows( $role)>0){
                                                                while( $rows_role = mysqli_fetch_assoc($role)){
                                                                if( $data['id_area'] == $rows_role['id_area']){
                                                                    $selected = "selected";
                                                                }else{
                                                                    $selected = "";
                                                                }
                                                                ?>
                                                            <option <?php echo $selected; ?>
                                                                value="<?php echo $rows_role['id_area']; ?>">
                                                                <?php echo $rows_role['area']; ?></option>
                                                            <?php
                            }
                          }                                                
                        ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label"
                                                        style="color:black;">Role</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control" id="dept_prop" name="role"
                                                            required>
                                                            <?php 
                          $role = mysqli_query($link_yics, "SELECT * FROM user_role") or die (mysqli_error($link_yics));
                          if(mysqli_num_rows( $role)>0){
                            while( $rows_role = mysqli_fetch_assoc($role)){
                              if( $data['id_level'] == $rows_role['id_role']){
                                $selected = "selected";
                              }else{
                                $selected = "";
                              }
                              ?>
                                                            <option <?php echo $selected; ?>
                                                                value="<?php echo $rows_role['id_role']; ?>">
                                                                <?php echo $rows_role['role_name']; ?></option>
                                                            <?php
                            }
                          }                                                
                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label" style="color:black;">Password
                                                        lama</label>
                                                    <div class="col-md-10">
                                                        <input type="password" class="form-control" autocomplete="off"
                                                            value="<?= $data["pass"]; ?>" readonly required>
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label" style="color:black;">Password
                                                        Baru</label>
                                                    <div class="col-md-10">
                                                        <input required type="password" required class="form-control"
                                                            name="password" id="psw" minlength="8" maxlength="8"
                                                            placeholder="Silahkan isi password baru" autocomplete="off"
                                                            pattern="(?=.*d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                                        <input type="checkbox" onclick="myFunction()">&nbsp; Tampilkan
                                                        Password
                                                        <br>

                                                        <div id="message">
                                                            <span>Harus berisi setidaknya satu
                                                                nomor dan satu
                                                                huruf besar dan kecil, dan minimal 8 atau lebih
                                                                karakter</span>
                                                            <h3>Password harus terdiri dari: </h3>
                                                            <p id="letter" class="invalid">Memiliki <b>huruf kecil</b>
                                                            </p>
                                                            <p id="capital" class="invalid">Memiliki <b>huruf besar</b>
                                                            </p>
                                                            <p id="number" class="invalid">Memiliki <b>nomor</b></p>
                                                            <p id="length" class="invalid">Minimal <b>8 karakter</b></p>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="../page/usersetting.php" type="reset"
                                                class="btn btn-danger">Kembali</a>
                                            <button type="submit" class="btn btn-primary" id="cek"
                                                disabled>Save</button>
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
        <script>
        function myFunction() {
            var x = document.getElementById("psw");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        </script>
        <script>
        var myInput = document.getElementById("psw");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");
        myInput.onfocus = function() {
            document.getElementById("message").style.display = "block";
        }
        myInput.onblur = function() {
            document.getElementById("message").style.display = "none";
        }
        myInput.onkeyup = function() {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if (myInput.value.match(lowerCaseLetters)) {
                var a = 1;
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                var a = 0;
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if (myInput.value.match(upperCaseLetters)) {
                var b = 1;
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                var b = 0;
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }
            // Validate numbers
            var numbers = /[0-9]/g;
            if (myInput.value.match(numbers)) {
                var c = 1;
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                var c = 0;
                number.classList.remove("valid");
                number.classList.add("invalid");
            }
            // Validate length
            if (myInput.value.length == 8) {
                var d = 1;
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                var d = 0;
                length.classList.remove("valid");
                length.classList.add("invalid");
            }
            if (a == 1 && b == 1 && c == 1 && d == 1) {
                $("#cek").prop("disabled", false);
            } else {
                $("#cek").prop("disabled", true);
            }
        }
        $(document).ready(function() {
            $("#psw").click(function() {
                $("#aturan").removeClass("d-none");
            });
        });
        </script>

        <!-- Footer -->
        <?php
include '../elemen/footer.php';?>