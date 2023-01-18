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
                                <?php 
                                            
                                            $id_ia = $_GET['id_ia'];
                                            
                                            $data_ia = single_query("SELECT * FROM ia 
                                            JOIN plan_proposal on ia.id_prop = plan_proposal.id_prop
                                            JOIN area on area.id_area = plan_proposal.id_area
                                            JOIN data_user on plan_proposal.id_area = area.id_area                                            
                                            JOIN depart on area.id_dep = depart.id_dep
                                            JOIN time_fiscal on plan_proposal.id_fis = time_fiscal.id_fis                                           
                                            JOIN kategori_proposal on plan_proposal.id_kat = kategori_proposal.id_kat
                                            where id_ia='".$id_ia."'");    
                                             $cost_ia  = $data_ia['cost_ia'];
                                             $depart  = $data_ia['depart'];
                                             $id_depback  = $data_ia['id_dep'];
                                             $awal  = $data_ia['awal'];
                                             $akhir  = $data_ia['akhir'];
                                            
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

                                            if($max_step == NULL){
                                                $max_step = 5;
                                            }

                                            $query_reject_step = single_query("SELECT
                                            max(step) as step from tracking_ia
                                            JOIN progress on tracking_ia.id_prog = progress.id_prog
                                            WHERE tracking_ia.id_ia = '$id_ia' and approval = 0
                                            ");

                                            $reject_step = $query_reject_step['step'];

                                        ?>


                                <div class="col-lg-12 col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h1 class="page-title font-size-26 font-weight-600">FORM UPDATE PROGRESS
                                            </h1>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <a href="controltabledep.php?dept=<?= $id_depback ?>"
                                                class="btn btn-icon btn-info">
                                                <span class="page-title font-size-20 font-weight-600">
                                                    << KEMBALI </span>
                                            </a>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="card card-shadow bg-blue-100" style="border-radius:10px;">
                                                <div class="card-body bg-white">


                                                    <div class="table">
                                                        <table class="table  w-full display  text-uppercase">

                                                            <tr>
                                                                <td class="judul align-middle text-center " rowspan="3"
                                                                    width="200px">
                                                                    <img src="../base/assets/images/adm3.png"
                                                                        style="width:200px;">
                                                                </td>
                                                                <td class="judul align-middle text-center text-uppercase"
                                                                    rowspan="3">

                                                                    <h3> " <?= $data_ia['ia']; ?> "</h3>
                                                                    <h6>(<?= $data_ia['deskripsi']; ?> ) </h6>
                                                                </td>
                                                                <td class="text-left" style="color:black;">
                                                                    Departement</td>
                                                                <td> &nbsp;:&nbsp;</td>
                                                                <td><?= $data_ia['depart']; ?></td>
                                                            </tr>

                                                            <tr>

                                                                <td class="text-left" style="color:black;"
                                                                    width="200px">
                                                                    Category
                                                                </td>
                                                                <td width="30px"> &nbsp;:&nbsp;</td>
                                                                <td><?php echo $data_ia['kategori']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left" style="color:black;">Cost
                                                                    IA</td>
                                                                <td> &nbsp;:&nbsp;</td>
                                                                <td><?= 'RP'." ". number_format($data_ia['cost_ia'], 0, ',', '.');?>
                                                                    MILLION
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="6"></td>
                                                            </tr>
                                                        </table>
                                                    </div>



                                                    <form method="POST" action="../proses/ia/update_progress.php"
                                                        id="formupdate">
                                                        <input type="hidden" name="add">
                                                        <input type="hidden" name="id_ia" value="<?= $id_ia ?>">

                                                        <div class="form-group row">
                                                            <h4 class="col-md-12 modal-title text-left"
                                                                style="color:black;">
                                                                STEP ASSIGMENT IA</h4>
                                                        </div>
                                                        <div class="table table-responsive">
                                                            <table class="table display nowrap" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="align-middle text-center" hidden>ID
                                                                            STEP</th>
                                                                        <th class="align-middle text-center">STEP</th>
                                                                        <th class="align-middle text-center"
                                                                            colspan="2">
                                                                            APPROVAL
                                                                        </th>
                                                                        <th class="align-middle text-center">DATE</th>
                                                                        <th class="align-middle text-center">PIC</th>

                                                                    </tr>
                                                                </thead>
                                                                <?php  
                                                          
                                                        $qProg = "SELECT nama_progress, id_prog , step FROM progress WHERE id_ket>='2'";
                                                        if($cost_ia < 50 ){
                                                            $exception = " AND (step <> '12' AND step <> '13' AND step <> '16'  AND step <> '17' AND step <> '18'  AND step <> '19') ";
                                                        }else if($cost_ia > 50 AND $cost_ia < 500){
                                                            $exception = " AND ( step <> '18'  AND step <> '19') ";
                                                        }else{
                                                            $exception = "";
                                                        }
                                                        $progress = mysqli_query($link_yics,$qProg.$exception)or die(mysqli_error($link_yics));
													if(mysqli_num_rows($progress)>0){
													$no=1;
													while($rows_progress = mysqli_fetch_assoc($progress))
													{
                                                        
                                                        
                                                        
                                                        
                                                        if( $rows_progress['step'] > $max_step + 1){

                                                            $text_muncul = "d-none";

                                                        }else{
                                                            $text_muncul = "";
                                                        }

                                                        if($reject_step){

                                                            if($rows_progress['step'] > $reject_step){
                                                                
                                                                $text_muncul = "d-none";
                                                            }else{
                                                                $text_muncul = "";
                                                            }
                                                        } 
                                                        

                                                        // query ke tracking ia
                                                        $data_tracking = single_query("SELECT * from tracking_ia                                                      
                                                        where id_ia = ".$id_ia." and id_prog = ".$rows_progress['id_prog']."
                                                        ");                                                       
                                                        
                                                        
                                                        ?>

                                                                <tbody>
                                                                    <tr class="<?=$text_muncul?>" id="data<?=$no?>">
                                                                        <td hidden>
                                                                            <input hidden type="text"
                                                                                class="form-control bg-grey-200"
                                                                                name="no[]" value="<?=$no?>">
                                                                            <input hidden type="text"
                                                                                class="form-control bg-grey-200"
                                                                                name="id_prog[]"
                                                                                value="<?= $rows_progress['id_prog'] ?>">
                                                                        </td>
                                                                        <td class="align-middle text-center">
                                                                            <input type="text"
                                                                                class="form-control bg-grey-200"
                                                                                value="<?=$no?>.<?= $rows_progress['nama_progress']; ?>"
                                                                                disabled>
                                                                        </td>

                                                                        <td class="align-middle text-center">
                                                                            <div class="custom-switches-stacked mt-2">
                                                                                <label class="custom-switch">
                                                                                    <input id="reject_step<?= $no ?>"
                                                                                        type="checkbox"
                                                                                        name="reject_step<?= $no ?>"
                                                                                        class="custom-switch-input reject"
                                                                                        data-plugin="switchery"
                                                                                        data-color="orange" value="0"
                                                                                        autocomplete="off"
                                                                                        data-id="<?= $no ?>" <?php
                                                                                if(isset($data_tracking['approval'])){
                                                                                    if($data_tracking['approval'] == 0){
                                                                                        echo 'checked';
                                                                                    }                                                                                    
                                                                                }
                                                                                ?>>
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
                                                                                    <input id="approve_step<?= $no ?>"
                                                                                        type="checkbox"
                                                                                        name="approve_step<?= $no ?>"
                                                                                        value="1" data-color="#17b3a3"
                                                                                        class="custom-switch-input approve"
                                                                                        autocomplete="off"
                                                                                        data-plugin="switchery"
                                                                                        data-id="<?= $no ?>" <?php
                                                                                if(isset($data_tracking['approval'])){
                                                                                    if($data_tracking['approval'] == 1){
                                                                                        echo 'checked';
                                                                                    }                                                                                    
                                                                                }
                                                                                ?>>
                                                                                    <span
                                                                                        class="custom-switch-indicator"></span>
                                                                                    <span
                                                                                        class="custom-switch-description">Approve</span>
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td class="align-middle text-center">
                                                                            <div class="input-group-prepend">
                                                                                <input type="datetime-local"
                                                                                    name="tgl[]"
                                                                                    min="<?= $awal ?>T00:00"
                                                                                    max="<?= $akhir ?>T00:00"
                                                                                    class="form-control bg-grey-200"
                                                                                    id="tgl-<?= $no ?>" value="<?php
                                                                                if(isset($data_tracking['time'])){
                                                                                    echo $data_tracking['time'];                                                                                                                                                                     
                                                                                }
                                                                                ?>" autocomplete="off">
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
                                                                                        <?= $_SESSION['yics_nama']; ?>
                                                                                    </option>
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
                                                                <button type="reset"
                                                                    class="btn btn-danger">Reset</button>
                                                                <input type="submit" class="btn btn-primary simpan"
                                                                    value="save" name='addd'>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="notifikasi_"></div>
                                </div>
                                <!-- End Third Right -->
                                <!-- End Third Row -->
                            </div>
                        </div>
                    </div>
                    <!-- End Page -->
                    <!--############ modal edit ################# -->
                    <form action="raeson.php" method="post" id="form-reason">
                        <div class="modal fade modal-info " id="npk" aria-hidden="true"
                            aria-labelledby="EditAlokasiBudget" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-simple modal-center modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <h3 class="modal-title">Cancel Reason</h3>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <br>
                                                <input type="text" name="id_prop" class="form-control"
                                                    value="<?= $data_ia['id_prop']; ?>" hidden>
                                                <input type="text" name="id_ia" class="form-control"
                                                    value="<?=  $id_ia ?>" hidden>
                                                <input type="text" name="reason" class="form-control " id="reason"
                                                    placeholder="Alasan kenapa no ia dihentikan..." required
                                                    style=”width:500%;”>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" id="konfir" class="btn btn-primary float-right"
                                            value="Konfirmasi">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--############ end modal edit ################# -->






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
                                $('#npk').modal('show');
                            }
                        });
                        $("#form-reason").on('click', '#konfir', function(a) {
                            a.preventDefault()
                            var reason = $('#reason').val();
                            var dataform = $("#form-reason").serialize();
                            $.ajax({
                                type: 'POST',
                                url: "../proses/ctrl_tble/ajax/post_insert.php",
                                data: dataform,
                                success: function(msg) {
                                    $('#npk').modal('hide');
                                    $(".notifikasi_").html(msg);
                                    // $('#subForm' + index).trigger("reset");
                                    // console.log(ind)

                                }
                            });
                        });
                    });
                    </script>



                    <!-- <script>
                    $(document).ready(function() {
                        $("#formupdate").on('click', '.simpan', function(a) {
                            a.preventDefault()
                            // var index = $(".reject").attr('data-id');
                            // $('#tgl-' + index).prop("required", true);
                            if ($(".reject").is(':checked')) {
                                $('#npk').modal('show');
                                var dataform = $("#formupdate").serialize();

                            } else {
                                $('#tgl-' + index).prop("required", true);
                                $("#formupdate").submit();
                                // $.ajax({
                                //     type: 'POST',
                                //     url: "../proses/ia/update_progress.php",
                                //     data: dataform,
                                //     success: function(msg) {
                                //         // $(".notifikasi_").html(msg);

                                //     }
                                // });
                            }
                        });
                    });
                    </script> -->