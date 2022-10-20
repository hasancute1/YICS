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
include '../elemen/header.php'; ?>
<!-- end header -->

<body class="animsition">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">

        <!--navbaricon -->
        <?php include '../elemen/navbaricon.php'; ?>
        <!-- end navbaricon     -->

        <div class="navbar-container container-fluid">
            <!-- Navbar Collapse -->
            <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
                <!-- Navbar left -->
                <?php include '../elemen/navbarleft.php'; ?>
                <!-- End Navbar left -->

                <!-- Navbar Right -->
                <?php include '../elemen/navbarright.php'; ?>
                <!-- End Navbar Right -->
            </div>
            <!-- End Navbar Collapse -->

            <!-- Site Navbar Search -->
            <?php include '../elemen/navbarsearch.php'; ?>
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
                    <?php include '../elemen/sidebar.php'; ?>
                    <!-- End Site Navbar Search -->
                    <!-- end sidebar -->

                    <!-- sidebar back -->
                    <?php include '../elemen/sidebarback.php'; ?>
                    <!-- end sidebar back -->

                    <!-- Page -->
                    <div class="page">
                        <div class="page-header">
                            <h1 class="page-title font-size-26 font-weight-600">UPDATE PROGRESS</h1>
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
                                                        <span class="font-size-20 bold">Form Update Progress</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body bg-white">

                                            <?php
                      //ambil data di url
                      $id = $_GET["ubah"];
                      //query data mahasiswa berdasarkan id menghasilkan array numeric
                      $proposal = mysqli_query($link_yics, "SELECT proposal.id_prop AS id_prop,
                  depart.depart AS depart,kategori_proposal.kategori AS kategori,time_fiscal.status AS status_fis,proposal.proposal AS proposal, status.id AS status_id
                  FROM proposal 
                  LEFT JOIN depart ON proposal.id_dep = depart.id_dep
                  LEFT JOIN kategori_proposal  ON proposal.id_kat = kategori_proposal.id_kat
                  LEFT JOIN time_fiscal  ON proposal.id_fis = time_fiscal.id_fis  
                  LEFT JOIN status ON proposal.status = status.id 
                  WHERE id_prop = '$id'") or die(mysqli_error($link_yics));
                      $data = mysqli_fetch_assoc($proposal);
                      // var_dump($data);
                      ?>

                                            <form action="../proses/dashboard/update_progress.php" method="post"
                                                enctype="multipart/form-data">
                                                <div class="form-group row">
                                                    <h4 class="col-md-12 modal-title text-left" style="color:black;">
                                                        SUBJECT</h4>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label text-left"
                                                        style="color:black;">Department</label>
                                                    <div class="col-md-4">
                                                        <input readonly type="text" class="form-control bg-grey-200"
                                                            id="depart_edit" placeholder=" Judul Proposal"
                                                            autocomplete="off" value="<?php echo $data['depart']; ?>">
                                                    </div>
                                                    <label class="col-md-2 col-form-label text-left"
                                                        style="color:black;">Category</label>
                                                    <div class="col-md-4">
                                                        <input readonly type="text" class="form-control bg-grey-200"
                                                            id="category_edit" placeholder=" Judul Proposal"
                                                            autocomplete="off" value="<?php echo $data['kategori']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label text-left"
                                                        style="color:black;">Proposal</label>
                                                    <div class="col-md-10">
                                                        <input readonly type="text" class="form-control bg-grey-200"
                                                            id="proposal_edit" placeholder=" Judul Proposal"
                                                            autocomplete="off" value="<?php echo $data['proposal']; ?>">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group row text-center" id="step1">
                                                    <div class="col-md-3">
                                                        <h5>Step</h5>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h5>Approval</h5>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h5>Date</h5>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <h5>PIC</h5>
                                                    </div>
                                                </div>

                                                <!-- step 1 -->
                                                <?php
                        $step1 = mysqli_query($link_yics, "SELECT histori.*, data_user.nama FROM histori LEFT JOIN data_user ON histori.user = data_user.id WHERE id_proposal = '$id' AND status = 1") or die(mysqli_error($link_yics));
                        $s1 = mysqli_fetch_assoc($step1);
                        // var_dump($s1);
                        if (!empty($s1['id'])) {
                          if ($s1['approval'] == 1) {
                            $app1 = 'checked';
                          } else {
                            $rej1 = 'checked';
                          }
                          $tgl1 = $s1['tgl'];
                          $tgldis1 = 'disabled';
                          $pic1 = $s1['nama'];
                        } else {
                          $app1 = '';
                          $rej1 = '';
                          $tgl1 = '';
                          $tgldis1 = '';
                          $pic1 = $_SESSION['yics_nama'];
                        }
                        ?>
                                                <div class="form-group row" id="step1">
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control bg-grey-200"
                                                            value="1. Quatation" disabled>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="custom-switches-stacked mt-2 text-center">
                                                            <label class="custom-switch">
                                                                <input id="rej1" type="checkbox" name="rej1"
                                                                    class="custom-switch-input" data-plugin="switchery"
                                                                    data-color="#eb6709" <?= $rej1; ?>>
                                                                <span class="custom-switch-indicator"></span>
                                                                <span class="custom-switch-description">Reject</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="custom-switches-stacked mt-2 text-center">
                                                            <label class="custom-switch">
                                                                <input id="app1" type="checkbox" name="app1"
                                                                    class="custom-switch-input app"
                                                                    data-plugin="switchery" data-color="#17b3a3"
                                                                    <?= $app1; ?>>
                                                                <span class="custom-switch-indicator"></span>
                                                                <span class="custom-switch-description">Approve</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon wb-calendar" aria-hidden="true"></i>
                                                            </span>
                                                            <input type="datetime-local" id="tgl1" name="tgl1"
                                                                class="form-control bg-grey-200" value="<?= $tgl1; ?>"
                                                                <?= $tgldis1; ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon wb-user" aria-hidden="true"></i>
                                                            </span>

                                                            <select name="pic1" class="form-control bg-grey-200">
                                                                <option value="<?= $_SESSION['yics_id'] ?>"><?= $pic1 ?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- step 2 -->
                                                <?php
                        $step2 = mysqli_query($link_yics, "SELECT histori.*, data_user.nama FROM histori LEFT JOIN data_user ON histori.user = data_user.id WHERE id_proposal = '$id' AND status = 2") or die(mysqli_error($link_yics));
                        $s2 = mysqli_fetch_assoc($step2);
                        if (!empty($s2['id'])) {
                          if ($s2['approval'] == 1) {
                            $app2 = 'checked';
                          } else {
                            $rej2 = 'checked';
                          }
                          $tgl2 = $s2['tgl'];
                          $tgldis2 = 'disabled';
                          $pic2 = $s2['nama'];
                        } else {
                          $app2 = '';
                          $rej2 = '';
                          $tgl2 = '';
                          $tgldis2 = '';
                          $pic2 = $_SESSION['yics_nama'];
                        }
                        ?>
                                                <div class="form-group row" id="step2" style="display: 
                                                    <?php 
                                                    if (($s1['status'] >= 1) and ($s1['approval'] == 1)) {
                                                       echo '';
                                                       } else {
                                                       echo 'none';
                                                        } ?>">
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control bg-grey-200"
                                                            value="2. Assignment" disabled>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="custom-switches-stacked mt-2 text-center">
                                                            <label class="custom-switch">
                                                                <input id="rej2" type="checkbox" name="rej2"
                                                                    class="custom-switch-input" data-plugin="switchery"
                                                                    data-color="#eb6709" <?= $rej2; ?>>
                                                                <span class="custom-switch-indicator"></span>
                                                                <span class="custom-switch-description">Reject</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="custom-switches-stacked mt-2 text-center">
                                                            <label class="custom-switch">
                                                                <input id="app2" type="checkbox" name="app2"
                                                                    class="custom-switch-input app"
                                                                    data-plugin="switchery" data-color="#17b3a3"
                                                                    <?= $app2; ?>>
                                                                <span class="custom-switch-indicator"></span>
                                                                <span class="custom-switch-description">Approve</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon wb-calendar" aria-hidden="true"></i>
                                                            </span>
                                                            <input type="datetime-local" name="tgl2"
                                                                value="<?= $tgl2; ?>" class="form-control bg-grey-200"
                                                                <?= $tgldis2; ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon wb-user" aria-hidden="true"></i>
                                                            </span>

                                                            <select name="pic2" class="form-control bg-grey-200">
                                                                <option value="<?= $_SESSION['yics_id'] ?>"><?= $pic2 ?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- step 3 -->
                                                <?php
                        $step3 = mysqli_query($link_yics, "SELECT histori.*, data_user.nama FROM histori LEFT JOIN data_user ON histori.user = data_user.id WHERE id_proposal = '$id' AND status = 3") or die(mysqli_error($link_yics));
                        $s3 = mysqli_fetch_assoc($step3);
                        if (!empty($s3['id'])) {
                          if ($s3['approval'] == 1) {
                            $app3 = 'checked';
                          } else {
                            $rej3 = 'checked';
                          }
                          $tgl3 = $s3['tgl'];
                          $tgldis3 = 'disabled';
                          $pic3 = $s3['nama'];
                        } else {
                          $app3 = '';
                          $rej3 = '';
                          $tgl3 = '';
                          $tgldis3 = '';
                          $pic3 = $_SESSION['yics_nama'];
                        }
                        ?>
                                                <div class="form-group row" id="step3" style="display: <?php if (($s2['status'] >= 2) and ($s2['approval'] == 1)) {
                                                                                  echo '';
                                                                                } else {
                                                                                  echo 'none';
                                                                                } ?>">
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control bg-grey-200"
                                                            value="3. Request for Negosiasi" disabled>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="custom-switches-stacked mt-2 text-center">
                                                            <label class="custom-switch">
                                                                <input id="rej3" type="checkbox" name="rej3"
                                                                    class="custom-switch-input" data-plugin="switchery"
                                                                    data-color="#eb6709" <?= $rej3; ?>>
                                                                <span class="custom-switch-indicator"></span>
                                                                <span class="custom-switch-description">Reject</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="custom-switches-stacked mt-2 text-center">
                                                            <label class="custom-switch">
                                                                <input id="app3" type="checkbox" name="app3"
                                                                    class="custom-switch-input app"
                                                                    data-plugin="switchery" data-color="#17b3a3"
                                                                    <?= $app3; ?>>
                                                                <span class="custom-switch-indicator"></span>
                                                                <span class="custom-switch-description">Approve</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon wb-calendar" aria-hidden="true"></i>
                                                            </span>
                                                            <input type="datetime-local" name="tgl3"
                                                                value="<?= $tgl3; ?>" class="form-control bg-grey-200"
                                                                <?= $tgldis3; ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon wb-user" aria-hidden="true"></i>
                                                            </span>

                                                            <select name="pic3" class="form-control bg-grey-200">
                                                                <option value="<?= $_SESSION['yics_id'] ?>"><?= $pic3 ?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- step 4 -->
                                                <?php
                        $step4 = mysqli_query($link_yics, "SELECT histori.*, data_user.nama FROM histori LEFT JOIN data_user ON histori.user = data_user.id WHERE id_proposal = '$id' AND status = 4") or die(mysqli_error($link_yics));
                        $s4 = mysqli_fetch_assoc($step4);
                        if (!empty($s4['id'])) {
                          if ($s4['approval'] == 1) {
                            $app4 = 'checked';
                          } else {
                            $rej4 = 'checked';
                          }
                          $tgl4 = $s4['tgl'];
                          $tgldis4 = 'disabled';
                          $pic4 = $s4['nama'];
                        } else {
                          $app4 = '';
                          $rej4 = '';
                          $tgl4 = '';
                          $tgldis4 = '';
                          $pic4 = $_SESSION['yics_nama'];
                        }
                        ?>
                                                <div class="form-group row" id="step4" style="display:  <?php if (($s3['status'] >= 3) and ($s3['approval'] == 1)) {
                                                                                  echo '';
                                                                                } else {
                                                                                  echo 'none';
                                                                                } ?>">
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control bg-grey-200"
                                                            value="4. Price Confirmation" disabled>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="custom-switches-stacked mt-2 text-center">
                                                            <label class="custom-switch">
                                                                <input id="rej4" type="checkbox" name="rej4"
                                                                    class="custom-switch-input" data-plugin="switchery"
                                                                    data-color="#eb6709" <?= $rej4; ?>>
                                                                <span class="custom-switch-indicator"></span>
                                                                <span class="custom-switch-description">Reject</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="custom-switches-stacked mt-2 text-center">
                                                            <label class="custom-switch">
                                                                <input id="app4" type="checkbox" name="app4"
                                                                    class="custom-switch-input app"
                                                                    data-plugin="switchery" data-color="#17b3a3"
                                                                    <?= $app4; ?>>
                                                                <span class="custom-switch-indicator"></span>
                                                                <span class="custom-switch-description">Approve</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon wb-calendar" aria-hidden="true"></i>
                                                            </span>
                                                            <input type="datetime-local" name="tgl4"
                                                                value="<?= $tgl4; ?>" class="form-control bg-grey-200"
                                                                <?= $tgldis4; ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon wb-user" aria-hidden="true"></i>
                                                            </span>

                                                            <select name="pic4" class="form-control bg-grey-200">
                                                                <option value="<?= $_SESSION['yics_id'] ?>"><?= $pic4 ?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- step 5 -->
                                                <?php
                        $step5 = mysqli_query($link_yics, "SELECT histori.*, data_user.nama FROM histori LEFT JOIN data_user ON histori.user = data_user.id WHERE id_proposal = '$id' AND status = 5") or die(mysqli_error($link_yics));
                        $s5 = mysqli_fetch_assoc($step5);
                        if (!empty($s5['id'])) {
                          if ($s5['approval'] == 1) {
                            $app5 = 'checked';
                          } else {
                            $rej5 = 'checked';
                          }
                          $tgl5 = $s5['tgl'];
                          $tgldis5 = 'disabled';
                          $pic5 = $s5['nama'];
                        } else {
                          $app5 = '';
                          $rej5 = '';
                          $tgl5 = '';
                          $tgldis5 = '';
                          $pic5 = $_SESSION['yics_nama'];
                        }
                        ?>
                                                <div class="form-group row" id="step5" style="display: <?php if (($s4['status'] >= 4) and ($s4['approval'] == 1)) {
                                                                                  echo '';
                                                                                } else {
                                                                                  echo 'none';
                                                                                } ?>">
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control bg-grey-200"
                                                            value="5. Price Confirmation" disabled>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="custom-switches-stacked mt-2 text-center">
                                                            <label class="custom-switch">
                                                                <input id="rej5" type="checkbox" name="rej5"
                                                                    class="custom-switch-input" data-plugin="switchery"
                                                                    data-color="#eb6709" <?= $rej5; ?>>
                                                                <span class="custom-switch-indicator"></span>
                                                                <span class="custom-switch-description">Reject</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="custom-switches-stacked mt-2 text-center">
                                                            <label class="custom-switch">
                                                                <input id="app5" type="checkbox" name="app5"
                                                                    class="custom-switch-input app"
                                                                    data-plugin="switchery" data-color="#17b3a3"
                                                                    <?= $app5; ?>>
                                                                <span class="custom-switch-indicator"></span>
                                                                <span class="custom-switch-description">Approve</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon wb-calendar" aria-hidden="true"></i>
                                                            </span>
                                                            <input type="datetime-local" name="tgl5"
                                                                value="<?= $tgl5; ?>" class="form-control bg-grey-200"
                                                                <?= $tgldis5; ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon wb-user" aria-hidden="true"></i>
                                                            </span>

                                                            <select name="pic5" class="form-control bg-grey-200">
                                                                <option value="<?= $_SESSION['yics_id'] ?>"><?= $pic5 ?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <script type="text/javascript">
                                                $(function() {
                                                    $("#app1").click(function() {
                                                        if ($(this).is(":checked")) {
                                                            $("#step2").show();
                                                            if ($('#rej1').is(':checked')) {
                                                                // maka id  apporove step  index di klik
                                                                $('#rej1').click();
                                                            }
                                                        } else {
                                                            $("#step2").hide();
                                                        }
                                                    });
                                                    $("#rej1").click(function() {
                                                        if ($(this).is(":checked")) {
                                                            $("#step2").hide();
                                                            $("#step3").hide();
                                                            $("#step4").hide();
                                                            $("#step5").hide();
                                                            if ($('#app1').is(':checked')) {
                                                                // maka id  apporove step  index di klik
                                                                $('#app1').click();
                                                            }
                                                        }
                                                    });
                                                    $("#app2").click(function() {
                                                        if ($(this).is(":checked")) {
                                                            $("#step3").show();
                                                            if ($('#rej2').is(':checked')) {
                                                                // maka id  apporove step  index di klik
                                                                $('#rej2').click();
                                                            }
                                                        } else {
                                                            $("#step3").hide();
                                                        }
                                                    });
                                                    $("#rej2").click(function() {
                                                        if ($(this).is(":checked")) {
                                                            $("#step3").hide();
                                                            $("#step4").hide();
                                                            $("#step5").hide();
                                                            if ($('#app2').is(':checked')) {
                                                                // maka id  apporove step  index di klik
                                                                $('#app2').click();
                                                            }
                                                        }
                                                    });
                                                    $("#app3").click(function() {
                                                        if ($(this).is(":checked")) {
                                                            $("#step4").show();
                                                            if ($('#rej3').is(':checked')) {
                                                                // maka id  apporove step  index di klik
                                                                $('#rej3').click();
                                                            }
                                                        } else {
                                                            $("#step4").hide();
                                                        }
                                                    });
                                                    $("#rej3").click(function() {
                                                        if ($(this).is(":checked")) {
                                                            $("#step4").hide();
                                                            $("#step5").hide();
                                                            if ($('#app3').is(':checked')) {
                                                                // maka id  apporove step  index di klik
                                                                $('#app3').click();
                                                            }
                                                        }
                                                    });
                                                    $("#app4").click(function() {
                                                        if ($(this).is(":checked")) {
                                                            $("#step5").show();
                                                            if ($('#rej4').is(':checked')) {
                                                                // maka id  apporove step  index di klik
                                                                $('#rej4').click();
                                                            }
                                                        } else {
                                                            $("#step5").hide();
                                                        }
                                                    });
                                                    $("#rej4").click(function() {
                                                        if ($(this).is(":checked")) {
                                                            $("#step5").hide();
                                                            if ($('#app4').is(':checked')) {
                                                                // maka id  apporove step  index di klik
                                                                $('#app4').click();
                                                            }
                                                        }
                                                    });
                                                    $("#app5").click(function() {
                                                        if ($(this).is(":checked")) {
                                                            if ($('#rej5').is(':checked')) {
                                                                // maka id  apporove step  index di klik
                                                                $('#rej5').click();
                                                            }
                                                        }
                                                    });
                                                    $("#rej5").click(function() {
                                                        if ($(this).is(":checked")) {
                                                            if ($('#app5').is(':checked')) {
                                                                // maka id  apporove step  index di klik
                                                                $('#app5').click();
                                                            }
                                                        }
                                                    });
                                                });
                                                </script>

                                                <div class="modal-footer">
                                                    <input type="hidden" name="id_pro" value="<?= $id ?>">
                                                    <?php if ($data['status_id'] < 5) { ?>
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Reset</button>
                                                    <button type="submit" name="simpan"
                                                        class="btn btn-primary">Save</button>
                                                    <?php } ?>
                                                </div>
                                            </form>

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
      include '../elemen/footer.php'; ?>