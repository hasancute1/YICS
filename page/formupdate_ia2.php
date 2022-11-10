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

                                            $data= mysqli_query($link_yics ,"SELECT* FROM ia 
                                                JOIN proposal on ia.id_prop = proposal.id_prop
                                                JOIN depart on proposal.id_dep = depart.id_dep
                                                JOIN kategori_proposal on proposal.id_kat = kategori_proposal.id_kat
                                                
                                                WHERE id_ia = '$id_ia'")or die (mysqli_error($link_yics));
                                                $data_ia = mysqli_fetch_assoc($data);
                                            
                                                $cost_ia=$data_ia['cost_ia'];
                                            
    
                                                // var_dump($limit_progress_bp);
                                          

                                            // filter bp sesuai scope
                                         

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
                                            $cost_i=48;
                                            if ($cost_i<=49){
                                                $step=[6,7,8,9,10,11,12,13,14,15,20,21,22,23,24,25,26,27,28,29,30];
                                            }else if($cost_i>=49 && $cost_i<=500){
                                                $step=[6,7,8,9,10,11,12,13,14,15,16,17,20,21,22,23,24,25,26,27,28,29,30];
                                            }else{
                                                $step=[6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30];
                                            }
                                            $si =count($step);
//////////////////////////////
                                            echo"ini memakai foreach =" ;
                                            foreach($step as $s)
                                            {
                                                echo "$s ";
                                            }
                                           //////////
                                           print("<br>");
                                           echo"ini memakai while ="; 
                                            $i = 0;
                                            while ($i < $si)
                                            {
                                                echo $step[$i] ."&nbsp";
                                                $i++;
                                            } 
                                            
                                        ?>



                                            <form method="POST" action="../proses/ia/update_progress.php">
                                                <input type="hidden" name="add">
                                                <input type="hidden" name="id_ia" value="<?= $id_ia ?>">
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
                                                            placeholder="Diisi No. IA" autocomplete="off"
                                                            value="<?= $data_ia['ia'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label text-left"
                                                        style="color:black;">Description</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control bg-grey-100" name="name"
                                                            placeholder="Diisi Deskripsi" autocomplete="off"
                                                            value="<?= $data_ia['deskripsi'] ?>">
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
                                                                placeholder="Nominal Rupiah"
                                                                value="<?= $data_ia['cost_ia'] ?>">
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
													while($rows_bp = mysqli_fetch_assoc($progress)){
                                                        // ................logika sesuai cost ia
                                                        if ($data_ia['cost_ia']<=49){
                                                            if( $rows_bp['nama_progress']=="DIR (I)" or $rows_bp['nama_progress']=="DIR (J)" or $rows_bp['nama_progress']=="FIN (I)" or $rows_bp['nama_progress']=="FIN (J)" ){
                                                                // echo "bn";
                                                                $hilang='d-none';
                                                            }else{
                                                                // echo "sl";
                                                                $hilang="";
                                                            }
                                                         }else if($data_ia['cost_ia']>= 50 && $data_ia['cost_ia'] <= 500){
                                                            if( $rows_bp['nama_progress']=="FIN (I)" or $rows_bp['nama_progress']=="FIN (J)" ){
                                                                $hilang='d-none';
                                                                }else{
                                                                    $hilang="";
                                                                }                
                                                         }else {$hilang="";}
                                                        
                                                         // ................ end logika sesuai cost ia
                                                         $qry = "SELECT
                                                         tracking_ia.id_prog AS id_prog, 
                                                         tracking_ia.approval AS id_approval,
                                                         tracking_ia.time AS `time_ia`                                                      
                                                         FROM tracking_ia                                                        
                                                         WHERE id_ia = '$id_ia' AND id_prog = '$rows_bp[id_prog]' ";
                                                         $sql = mysqli_query($link_yics, $qry)or die (mysqli_error($link_yics));
                                                         if(mysqli_num_rows($sql)>0){
                                                        // jumlah baris data yang base on id_prop dan id prog
                                                        $total = mysqli_num_rows($sql);
                                                        //isi dari query $sql dinamakan $data_tracking
                                                        $data_tracking = mysqli_fetch_assoc($sql);
                                                        $approve = $data_tracking['id_approval'];
                                                        $time= $data_tracking['time_ia']; 
                                                       
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
                                                        }if($id_prog_next > 0 && $total > 0 ){
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

                                                        if( $rows_bp['step'] > $max_step){

                                                            $text_muncul = "d-none";

                                                        }

                                                        if($reject_step){

                                                            if($rows_bp['step'] > $reject_step){
                                                                
                                                                $text_muncul = "d-none";
                                                            }
                                                        }


														?>



                                                        <tbody>
                                                            <tr class="<?=$hilang?>" id="data<?=$rows_bp['id_prog']?>">
                                                                <td hidden>
                                                                    <input hidden type="text"
                                                                        class="form-control bg-grey-200"
                                                                        name="id_prog[]"
                                                                        value="<?= $rows_bp['id_prog'] ?>">
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <input type="text" class="form-control bg-grey-200"
                                                                        value="<?=$no?>.<?= $rows_bp['nama_progress']; ?>"
                                                                        disabled>
                                                                </td>

                                                                <td class="align-middle text-center">
                                                                    <div class="custom-switches-stacked mt-2">
                                                                        <label class="custom-switch">
                                                                            <input
                                                                                id="reject_step<?= $rows_bp['id_prog']?>"
                                                                                type="checkbox"
                                                                                name="reject_step<?= $rows_bp['id_prog']?>"
                                                                                class="custom-switch-input reject"
                                                                                data-plugin="switchery"
                                                                                data-color="orange" value="0"
                                                                                autocomplete="off"
                                                                                data-id="<?=$rows_bp['id_prog']?>" <?php
                                                                                if(isset($data_tracking['id_approval'])){
                                                                                    if($data_tracking['id_approval'] == 0){
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
                                                                            <input
                                                                                id="approve_step<?= $rows_bp['id_prog']?>"
                                                                                type="checkbox"
                                                                                name="approve_step<?= $rows_bp['id_prog']  ?>"
                                                                                value="1" data-color="#17b3a3"
                                                                                class="custom-switch-input approve"
                                                                                autocomplete="off"
                                                                                data-plugin="switchery"
                                                                                data-id="<?=$rows_bp['id_prog']?>" <?php
                                                                                if(isset($data_tracking['id_approval'])){
                                                                                    if($data_tracking['id_approval'] == 1){
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
                                                                        <input type="datetime-local" name="tgl[]"
                                                                            class="form-control bg-grey-200"
                                                                            id="tgl-<?=$rows_bp['id_prog']?>" value="<?php
                                                                                if(isset($time)){
                                                                                    echo $time;                                                                                                                                                                     
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