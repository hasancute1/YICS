<!--header-->
<?php

include("../config/config.php");

// periksa apakah user sudah login, cek kehadiran session name
// jika tidak ada, redirect ke login.php
if (!isset($_SESSION['yics_user'])) {
  header('location: ../index.php');
}

// jika yang login general user
if ($_SESSION['yics_level'] == "1") {

    header('location: dashboard.php');

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

                    
                    <?php                    

                    $id = $_GET['id_ia'];

                    // get data proposal & ia
                    
                    $data_ia = single_query("SELECT * FROM ia 
                    JOIN proposal ON ia.id_prop = proposal.id_prop 
                    JOIN depart ON proposal.id_dep = depart.id_dep
                    JOIN kategori_proposal  ON proposal.id_kat = kategori_proposal.id_kat
                    WHERE id_ia='$id'"); 


                    $consumtion_budget =  $data_ia['cost_ia'];
                                    
                    $sisa_budget = $data_ia['cost'] - $consumtion_budget;

                    ?>

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
                                                        <span class="font-size-20 bold">Form Edit No
                                                            IA</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body bg-white">



                                            <form method="post" action="../proses/ia/update_ia.php">
                                                <input type="hidden" name="id_prop" value="<?= $data_ia['id_prop'] ?>">
                                                <input type="hidden" name="id_ia" value="<?= $id ?>">

                                                <div class="form-group row">
                                                    <h4 class="col-md-12 modal-title text-left" style="color:black;">
                                                        SUBJECT
                                                    </h4>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label text-left"
                                                        style="color:black;">Department</label>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control  bg-grey-200"
                                                                name="name" placeholder="Division Yourself"
                                                                autocomplete="off" value="<?= $data_ia['depart'] ?>">
                                                        </div>
                                                    </div>
                                                    <label class="col-md-2 col-form-label text-left"
                                                        style="color:black;">Category</label>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control  bg-grey-200"
                                                                name="name" placeholder="Division Yourself"
                                                                autocomplete="off" value="<?= $data_ia['kategori'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label text-left"
                                                        style="color:black;">Proposal</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control  bg-grey-200" name="name"
                                                            placeholder="Division Yourself" autocomplete="off"
                                                            value="<?= $data_ia['proposal'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <h4 class="col-md-12 modal-title text-left" style="color:black;">IA
                                                        NO.
                                                    </h4>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label text-left"
                                                        style="color:black;">IA
                                                        No.</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="ia"
                                                            placeholder="Diisi No. IA" autocomplete="off" value="<?= $data_ia['ia'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label text-left"
                                                        style="color:black;">Description</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="ia_deskripsi"
                                                            placeholder="Diisi Deskripsi" autocomplete="off" value="<?= $data_ia['deskripsi'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row text-left">
                                                    <h4 class="col-md-12 modal-title text-left" style="color:black;">
                                                        Original Currency</h4>
                                                </div>
                                                <div class="form-group row text-left">
                                                    <label class="col-md-2 col-form-label mt-4" style="color:black;">In
                                                        RP</label>
                                                    <div class="col-md-4">
                                                        <span
                                                            style="color:red;font-size: 13px;font-style: italic;">*(Sisa
                                                            budget Rp <?= $sisa_budget ?>)</span>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">RP</span>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                placeholder="Nominal Rupiah" name="cost_ia" value="<?=$data_ia['cost_ia'] ?>">
                                                        </div>
                                                    </div>
                                                    <label class="col-md-2 col-form-label mt-4" style="color:black;">In
                                                        JPY</label>
                                                    <div class="col-md-4">
                                                        <span
                                                            style="color:red;font-size: 13px;font-style: italic;">*(Sisa
                                                            budget YJP 300)</span>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">JPY</span>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                placeholder="Nominal Yen">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <h4 class="col-md-12 modal-title text-left" style="color:black;">
                                                        Valid
                                                        Update</h4>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label text-left"
                                                        style="color:black;">Valid
                                                        Until </label>
                                                    <div class="col-md-4">
                                                        <input type="date" class="form-control" name="name"
                                                            placeholder="Diisi tanggal updaate" autocomplete="off">
                                                    </div>
                                                    <label class="col-md-2 col-form-label text-left"
                                                        style="color:black;">Remark
                                                        Ct Update</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Diisi PIC Update" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Reset</button>
                                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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
            <?php include '../elemen/footer.php';?>
            <script>
            // Dokumen sudah ready maka jalankan function
            $(document).ready(function() {
                // jika class approve di klik maka
                $(".approve").click(function() {

                    //attribut data-id ini masukkan ke variabel index
                    var index = $(this).attr('data-id');
                    var index2 = parseInt(index) + 1;

                    // Buat tanggal index ini required
                    $('#tgl-' + index).prop("required", true);

                    // varibael index ditambah 1 lalu masukkan ke variabel next_index
                    var next_index = Number(index) + 1;
                    // jika di html ini ada  checked
                    if ($(this).is(':checked')) {
                        //maka  id data yang ditambah variabel next index hapus class d-none
                        $('#data' + next_index).removeClass('d-none');
                        //jika  id reject_step ditambah index ada checked
                        if ($('#reject_step' + index).is(':checked')) {
                            //maka id reject_step ditambah index ini diklik
                            $('#reject_step' + index).click();
                        }
                        if ($('#reject_step' + next_index).is(':checked')) {
                            //maka id reject_step ditambah index ini diklik
                            $('#reject_step' + next_index).click();
                        }
                        //melainkan bila tidak ada check
                    } else {
                        if ($('#reject_step' + next_index).is(':checked')) {
                            //maka id reject_step ditambah index ini diklik
                            $('#reject_step' + next_index).click();
                        }
                        if ($('#approve_step' + next_index).is(':checked')) {
                            //maka id reject_step ditambah index ini diklik
                            $('#approve_step' + next_index).click();
                        }
                        // maka id data yang ditambah next_index ditambah class d_none
                        $('#data' + next_index).addClass('d-none');
                    }
                });

                // class reject di klik maka jalankan function
                $(".reject").click(function() {
                    //  membuat var index yang hasilnya  dari attribut data ini
                    var index = $(this).attr('data-id');
                    var next_index = Number(index) + 1;

                    // Buat tanggal index ini required
                    $('#tgl-' + index).prop("required", true);

                    // jika html ini ada checked 
                    if ($(this).is(':checked')) {
                        // maka cetak approve step variabel index
                        console.log('approve_step' + index);
                        // jika id approve step variable index ada checked
                        if ($('#approve_step' + index).is(':checked')) {
                            // maka id  apporove step  index di klik
                            $('#approve_step' + index).click();
                        }
                        if ($('#approve_step' + next_index).is(':checked')) {
                            // maka id  apporove step  index di klik
                            $('#approve_step' + next_index).click();
                        }
                        if ($('#reject_step' + next_index).is(':checked')) {
                            // maka id  apporove step  index di klik
                            $('#reject_step' + next_index).click();
                        }
                    }
                });
            });
            </script>