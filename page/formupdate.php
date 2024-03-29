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
                  //ambil data di url
                  $id=$_GET ["ubah"];
                  //query data loopingan tracking proposal base on id proposal
                  $proposal = mysqli_query($link_yics ,"SELECT 
                  proposal.id_prop AS id_prop,
                  proposal.cost AS cost,
                  depart.depart AS depart,
                  time_fiscal.awal AS awal,
                  time_fiscal.akhir AS akhir,
                  kategori_proposal.kategori AS kategori,                 
                  proposal.proposal AS proposal
                  FROM proposal 
                  LEFT JOIN depart ON proposal.id_dep = depart.id_dep
                  LEFT JOIN kategori_proposal  ON proposal.id_kat = kategori_proposal.id_kat
                  LEFT JOIN time_fiscal on proposal.id_fis = time_fiscal.id_fis
                  WHERE id_prop = '$id'")or die (mysqli_error($link_yics));
                  $data = mysqli_fetch_assoc($proposal);
                  $awal  = $data['awal'];
                  $akhir  = $data['akhir'];
                  $cost =    $data['cost'];
                ?>
                    <!-- Page -->
                    <div class="page">
                        <div class="page-header">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h1 class="page-title font-size-26 font-weight-600">TRACKING PLANNING PROPOSAL
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
                                    <div class="card card-shadow">
                                        <div class="card-header card-header-transparent ">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <table class=" table ">
                                                        <tr>
                                                            <td class="judul align-middle text-center " rowspan="3"
                                                                width="200px">
                                                                <img src="../base/assets/images/adm3.png"
                                                                    style="width:200px;">
                                                            </td>
                                                            <td class="judul align-middle text-center text-uppercase"
                                                                width="700px" rowspan="3">
                                                                <h4>NAMA PROPOSAL :</h4>
                                                                <h3> "<?= $data['proposal']; ?>"</h3>
                                                            </td>
                                                            <td class="text-left" style="color:black;">
                                                                Departement</td>
                                                            <td> &nbsp;:&nbsp;</td>
                                                            <td><?= $data['depart']; ?></td>
                                                        </tr>

                                                        <tr>

                                                            <td class="text-left" style="color:black;" width="200px">
                                                                Category
                                                            <td width="30px"> &nbsp;:&nbsp;</td>
                                                            <td><?= $data['kategori']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left" style="color:black;">Cost
                                                                Proposal</td>
                                                            <td> &nbsp;:&nbsp;</td>
                                                            <td><?= 'IDR'." ". number_format($cost, 2, ',', '.');?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan='5'></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body bg-white">



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
                                                            placeholder=" Judul Proposal" autocomplete="off"
                                                            value="<?php echo $data['id_prop']; ?>">
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
                                                <div class="form-group row">
                                                    <h4 class="col-md-12 modal-title text-left" style="color:black;">
                                                        STEP ASSIGMENT</h4>
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

                                                    // cari max step di tracking_prop
                                                    $query_max_step = "SELECT
                                                    max(step) as max_step from tracking_prop 
                                                    JOIN progress on tracking_prop.id_prog = progress.id_prog
                                                    WHERE tracking_prop.id_prop = '$id'
                                                    ";
                                                    $data_max_step = mysqli_query($link_yics, $query_max_step)or die (mysqli_error($link_yics));
                                                    $get_max_step = mysqli_fetch_assoc($data_max_step);                                                     

                                                    // cari Riject Step
                                                    $query_reject_step = "SELECT
                                                    max(step) as step from tracking_prop 
                                                    JOIN progress on tracking_prop.id_prog = progress.id_prog
                                                    WHERE tracking_prop.id_prop = '$id' and id_approval = 0
                                                    ";
                                                    $data_reject_step = mysqli_query($link_yics, $query_reject_step)or die (mysqli_error($link_yics));
                                                    $get_reject_step = mysqli_fetch_assoc($data_reject_step);

                                                    $max_step = intval($get_max_step['max_step']) + 1;
                                                    $reject_step = intval($get_reject_step['step']);
                                                     
													$progress = mysqli_query($link_yics,"SELECT nama_progress, id_prog , step FROM progress WHERE id_ket='1' ")or die(mysqli_error($link_yics));
													if(mysqli_num_rows($progress)>0){
													$no=1;
													while($rows_progress = mysqli_fetch_assoc($progress))
													{
														$qry = "SELECT
														tracking_prop.id_prog AS id_prog, 
														tracking_prop.id_approval AS id_approval,
														`time`,
														data_user.nama AS nama,
														data_user.username AS username
														FROM tracking_prop
														LEFT JOIN data_user	ON tracking_prop.username = data_user.username
														WHERE id_prop = '$id' AND id_prog = '$rows_progress[id_prog]' ";
														$sql = mysqli_query($link_yics, $qry)or die (mysqli_error($link_yics));
														if(mysqli_num_rows($sql)>0){
                                                            // jumlah baris data yang base on id_prop dan id prog
                                                            $total = mysqli_num_rows($sql);
                                                            //isi dari query $sql dinamakan $data_tracking
                                                            $data_tracking = mysqli_fetch_assoc($sql);
                                                            $approve = $data_tracking['id_approval'];
                                                            $time= $data_tracking['time']; 
                                                            $username= $data_tracking ['username'];
                                                            $chekapprove = ($approve == '1')?"checked":"";
                                                            $chekreject = ($approve == '0')?"checked":"";
                                                            //  jika ada datanya maka $id_prog_next sesuai $no dari 1
                                                            $id_prog_next = $no;
														}else {
                                                            $total = 0 ;
                                                            $approve = "";
                                                            $time= "";
                                                            $id_pic= "";
                                                            $username= "PILIH PIC";
                                                            $chekapprove = "";
                                                            $chekreject ="";
                                                              //  jika ada datanya maka $id_prog_next maka nilainya 0
                                                            $id_prog_next = 0;
														}


														if($id_prog_next > 0 && $total > 0 ){
                                                            if($approve == 1){
                                                                $max_muncul = $no+1;
                                                                
                                                            }else if($approve ==0){
                                                                $max_muncul = $no;
                                                                
                                                            }else{
                                                                $max_muncul = 1;
                                                            }
														}else{
                                                            
                                                                $max_muncul = 1;
                                                            }
														
														// if( $max_muncul>= $no){
														//     $text_muncul = "";
                                                        //     // JIKA NO NYA LEBIH DARI MAX MUNCUL MAKA YANG MUNCUL d-none 
														// }else{
														//     $text_muncul = "d-none";
														// }

                                                        if( $rows_progress['step'] > $max_step){

                                                            $text_muncul = "d-none";

                                                        }

                                                        if($reject_step){

                                                            if($rows_progress['step'] > $reject_step){
                                                                
                                                                $text_muncul = "d-none";
                                                            }
                                                        }


														?>

                                                        <?php 	
												// $muncul = 1;
												//   if($no == $muncul){
													// $text_muncul = "";
												//     }else{
												//     $text_muncul = "d-none";
												//     }  
												//     ?>
                                                        <tbody>
                                                            <tr class="<?=$text_muncul?>" id="data<?=$no?>">
                                                                <td hidden>
                                                                    <input hidden type="text"
                                                                        class="form-control bg-grey-200"
                                                                        name="id_prog[]"
                                                                        value="<?= $rows_progress['id_prog'] ?>">
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <input type="text" class="form-control bg-grey-200"
                                                                        value=" <?=$no?> <?= $rows_progress['nama_progress']; ?>"
                                                                        disabled>
                                                                </td>

                                                                <td class="align-middle text-center">
                                                                    <div class="custom-switches-stacked mt-2">
                                                                        <label class="custom-switch">
                                                                            <input id="reject_step<?=$no?>"
                                                                                data-id="<?=$no?>" type="checkbox"
                                                                                name="reject_step<?=$no?>"
                                                                                class="custom-switch-input reject"
                                                                                data-plugin="switchery"
                                                                                data-color="orange" value="0"
                                                                                <?=$chekreject?> autocomplete="off">
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
                                                                            <input id="approve_step<?=$no?>"
                                                                                data-id="<?=$no?>" type="checkbox"
                                                                                name="approve_step<?=$no?>" value="1"
                                                                                data-color="#17b3a3"
                                                                                class="custom-switch-input approve"
                                                                                autocomplete="off"
                                                                                data-plugin="switchery"
                                                                                <?=$chekapprove?>>
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
                                                                            min="<?= $awal ?>T00:00"
                                                                            max="<?= $akhir ?>T00:00"
                                                                            class="form-control bg-grey-200"
                                                                            id="tgl-<?=$no?>" value="<?= $time ?>"
                                                                            autocomplete="off">
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
                                                        </tbody>
                                                        <?php 
														$no++;
													} 
													}
													?>
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
                <div class="notifikasi_"></div>
            </div>
            <!-- End Page -->
            <!--############ modal edit ################# -->
            <form action="raeson.php" method="post" id="form-reason">
                <div class="modal fade modal-info " id="npk" aria-hidden="true" aria-labelledby="EditAlokasiBudget"
                    role="dialog" tabindex="-1">
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
                                        <input type="text" name="id_prop" class="form-control" value="<?= $id; ?>"
                                            hidden>
                                        <input type="text" name="reason" class="form-control " id="reason"
                                            placeholder="Alasan kenapa proposal dihentikan..." required
                                            style=”width:500%;”>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <input type="submit" id="konfir" class="btn btn-primary float-right" value="Konfirmasi">
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
                        url: "../proses/dashboard/ajax/post_insert.php",
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