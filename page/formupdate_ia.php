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
                                                        <span class="font-size-20 bold">Form Update Progress No
                                                            IA</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body bg-white">

                                        <?php 
                                            
                                            $id_ia = $_GET['id_ia'];
                                            
                                            $data_ia = single_query("SELECT * FROM ia 
                                            JOIN proposal on ia.id_prop = proposal.id_prop
                                            JOIN depart on proposal.id_dep = depart.id_dep
                                            JOIN kategori_proposal on proposal.id_kat = kategori_proposal.id_kat
                                            where id_ia='".$id_ia."'");    
                                            
                                            
                                            $progress_ia = query("SELECT * FROM progress where id_ket != 1");

                                            // filter bp sesuai scope
                                            $limit_progress_bp =  get_progress_bp($progress_ia , $data_ia['cost_ia']); 

                                            // var_dump($limit_progress_bp);


                                            $query_max_step = single_query("SELECT
                                                    max(step) as max_step from tracking_ia
                                                    JOIN progress on tracking_ia.id_prog = progress.id_prog
                                                    WHERE tracking_ia.id_ia = '$id_ia'
                                                    ");
                                            $max_step =  $query_max_step['max_step'];


                                            $query_reject_step = single_query("SELECT
                                            max(step) as step from tracking_ia
                                            JOIN progress on tracking_ia.id_prog = progress.id_prog
                                            WHERE tracking_ia.id_ia = '$id_ia' and approval = 0
                                            ");

                                            $reject_step = $query_reject_step['step'];

                                        ?>



                                            <form method="POST" action="../proses/dashboard/tes2.php">
                                                <input type="hidden" name="add">
                                                <div class="form-group row">
                                                    <h4 class="col-md-12 modal-title text-left" style="color:black;">
                                                        SUBJECT</h4>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label text-left"
                                                        style="color:black;">Department</label>
                                                    <div class="col-md-4">
                                                        <input readonly name="id_prop" hidden type="text"
                                                            class="form-control bg-grey-200" id="depart_edit"
                                                            placeholder=" Judul Proposal" autocomplete="off" value="">
                                                        <input readonly type="text" class="form-control bg-grey-100"
                                                            id="depart_edit" placeholder=" Judul Proposal"
                                                            autocomplete="off" value="<?= $data_ia['depart'] ?>">
                                                    </div>
                                                    <label class="col-md-2 col-form-label text-left"
                                                        style="color:black;">Category</label>
                                                    <div class="col-md-4">
                                                        <input readonly type="text" class="form-control bg-grey-100"
                                                            id="category_edit" placeholder=" Judul Proposal"
                                                            autocomplete="off" value="<?= $data_ia['kategori'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label text-left"
                                                        style="color:black;">Proposal</label>
                                                    <div class="col-md-10">
                                                        <input readonly type="text" class="form-control bg-grey-100"
                                                            id="proposal_edit" placeholder=" Judul Proposal"
                                                            autocomplete="off" value="<?= $data_ia['proposal'] ?>">
                                                    </div>
                                                </div>
                                                <hr>
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
                                                        <input type="text" class="form-control bg-grey-100" name="name"
                                                            placeholder="Diisi No. IA" autocomplete="off" value="<?= $data_ia['ia'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label text-left"
                                                        style="color:black;">Description</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control bg-grey-100" name="name"
                                                            placeholder="Diisi Deskripsi" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group row text-left">
                                                    <h4 class="col-md-12 modal-title text-left" style="color:black;">
                                                        Original Currency</h4>
                                                </div>
                                                <div class="form-group row text-left">
                                                    <label class="col-md-2 col-form-label" style="color:black;">In
                                                        RP</label>
                                                    <div class="col-md-4">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">RP</span>
                                                            </div>
                                                            <input type="number" class="form-control bg-grey-100"
                                                                placeholder="Nominal Rupiah" value="<?= $data_ia['cost_ia'] ?>">
                                                        </div>
                                                    </div>
                                                    <label class="col-md-2 col-form-label" style="color:black;">In
                                                        JPY</label>
                                                    <div class="col-md-4">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">JPY</span>
                                                            </div>
                                                            <input type="number" class="form-control bg-grey-100"
                                                                placeholder="Nominal Yen">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <h4 class="col-md-12 modal-title text-left" style="color:black;">
                                                        STEP ASSIGMENT IA</h4>
                                                </div>
                                                <div class="table table-responsive">
                                                    <table class="table display nowrap" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="align-middle text-center" hidden>ID STEP</th>
                                                                <th class="align-middle text-center">STEP</th>
                                                                <th class="align-middle text-center" colspan="2">
                                                                    APPROVAL
                                                                </th>
                                                                <th class="align-middle text-center">DATE</th>
                                                                <th class="align-middle text-center">PIC</th>

                                                            </tr>
                                                        </thead>
                                                        <?php  
                                                        $progress = mysqli_query($link_yics,"SELECT nama_progress, id_prog , step FROM progress WHERE id_ket>='2'")or die(mysqli_error($link_yics));
													if(mysqli_num_rows($progress)>0){
													$no=1;
													while($rows_progress = mysqli_fetch_assoc($progress))
													{
                                                        
                                                        
                                                        
                                                        
                                                        if( $rows_progress['step'] > $max_step){

                                                            $text_muncul = "d-none";

                                                        }

                                                        if($reject_step){

                                                            if($rows_progress['step'] > $reject_step){
                                                                
                                                                $text_muncul = "d-none";
                                                            }
                                                        } 
                                                        
                                                        
                                                        
                                                        ?>

                                                        <tbody>
                                                            <tr class="<?=$text_muncul?>">
                                                                <td hidden>
                                                                    <input hidden type="text"
                                                                        class="form-control bg-grey-200"
                                                                        name="id_prog[]" value="">
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <input type="text" class="form-control bg-grey-200"
                                                                        value="<?=$no?>.<?= $rows_progress['nama_progress']; ?>"
                                                                        disabled>
                                                                </td>

                                                                <td class="align-middle text-center">
                                                                    <div class="custom-switches-stacked mt-2">
                                                                        <label class="custom-switch">
                                                                            <input id="reject_step" data-id=""
                                                                                type="checkbox" name="reject_step"
                                                                                class="custom-switch-input reject"
                                                                                data-plugin="switchery"
                                                                                data-color="orange" value="0"
                                                                                autocomplete="off">
                                                                            <span
                                                                                class="custom-switch-indicator"></span>
                                                                            <span
                                                                                class="custom-switch-description">Reject</span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <div class="custom-switches-stacked mt-2">
                                                                        <label class="custom-switch">
                                                                            <input id="approve_step" data-id=""
                                                                                type="checkbox" name="approve_step"
                                                                                value="1" data-color="#17b3a3"
                                                                                class="custom-switch-input approve"
                                                                                autocomplete="off"
                                                                                data-plugin="switchery">
                                                                            <span
                                                                                class="custom-switch-indicator"></span>
                                                                            <span
                                                                                class="custom-switch-description">Approve</span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <div class="input-group-prepend">
                                                                        <input type="datetime-local" name="tgl[]"
                                                                            class="form-control bg-grey-200" id="tgl-"
                                                                            value="" autocomplete="off">
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="icon wb-user"
                                                                                aria-hidden="true"></i>
                                                                        </span>
                                                                        <select name="pic[]"
                                                                            class="form-control bg-grey-200"
                                                                            autocomplete="off">
                                                                            <option
                                                                                value="<?= $_SESSION['yics_user']; ?>">
                                                                                <?= $_SESSION['yics_nama']; ?></option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php 
														$no++;
													} 
													}
													?>
                                                        </tbody>


                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class=" col-md-12 text-right">
                                                        <button type="reset" class="btn btn-danger">Reset</button>
                                                        <input type="submit" class="btn btn-primary" value="save"
                                                            name='addd'>
                                                    </div>
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