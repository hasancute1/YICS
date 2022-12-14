<?php
include("../config/config.php");
include("../proses/functions.php");
if (!isset($_SESSION['yics_user'])) {
  header('location: ../index.php');
}


$id_dept = $_GET['dep'];
$judul = [
    1 => "BODY 1",
    2 => "BODY 2",
    3 => "BQC"
    ];
    
    $id_dept = $_GET['dep'];
    
?>
<?php 
                                    $alokasi = mysqli_query($link_yics, "SELECT * FROM time_fiscal WHERE status='aktif'") or die(mysqli_error($link_yics));
                                    if(mysqli_num_rows($alokasi)>0){                                    
                                    $data = mysqli_fetch_assoc($alokasi);
                                    $periode = $data['periode'];
                                    $awalf = date("d M Y", strtotime($data['awal']));
                                    $akhirf = date("d M Y", strtotime($data['akhir']));
                                    }else{
                                        $periode="Pilih periode aktif";
                                        $awalf="Pilih tahun aktif";
                                        $akhirf="Pilih tahun aktif";
                                    }
                                        ?>



<!-- end header -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">

    <title>YICS</title>
    <style type="text/css">
    .warnadep1 {
        background-color: #ffcd17;
    }

    .warnadep2 {
        background-color: #f2353c;
    }

    .warnadep3 {
        background-color: #7231f5;
    }

    .warnadep4 {
        background-color: #17b3a3;
    }

    .warnadep5 {
        background-color: #11c26d;
    }

    .warnadep6 {
        background-color: #997b71;
    }

    /* CSS used here will be applied after bootstrap.css */
    .modal-dialog {
        overflow-y: initial !important
    }

    .modal-body {

        overflow-y: auto;
    }

    a.disabledlink {
        pointer-events: none;
        cursor: default;
    }

    .card {
        border-radius: 10px;
    }

    .btn {
        border-radius: 10px;
    }

    td {
        color: black;
    }

    th {
        color: black;
    }

    body {
        margin: 0;
        padding: 0;
    }

    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    </style>



    <style mmedia="print" type="text/css">
    @page {
        size: portrait;
        margin: 1;
    }

    @media print {
        .col-print-1 {
            flex: 0 0 8.33333%;
            max-width: 8.33333%;
        }
    }

    @media print {
        .col-print-2 {
            flex: 0 0 16.66667%;
            max-width: 16.66667%;
        }
    }



    body {
        -webkit-print-color-adjust: exact !important;

    }




    }

    @media print {
        .col-print-3 {
            flex: 0 0 25%;
            max-width: 25%;
        }
    }

    @media print {
        .bt {
            padding-top: 150px;


        }
    }



    @media print {
        .col-print-4 {
            flex: 0 0 33.33333%;
            max-width: 33.33333%;
        }
    }

    @media print {
        .col-print-5 {
            flex: 0 0 41.66667%;
            max-width: 41.66667%;
        }
    }

    @media print {
        .col-print-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }

    @media print {
        .col-print-7 {
            flex: 0 0 58.33333%;
            max-width: 58.33333%;
        }
    }

    @media print {
        .col-print-8 {
            flex: 0 0 66.66667%;
            max-width: 66.66667%;
        }
    }

    @media print {
        .col-print-9 {
            flex: 0 0 75%;
            max-width: 75%;
        }
    }

    @media print {
        .col-print-10 {
            flex: 0 0 83.33333%;
            max-width: 83.33333%;
        }
    }

    @media print {
        .col-print-11 {
            flex: 0 0 91.66667%;
            max-width: 91.66667%;
        }
    }

    @media print {
        .col-print-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }

    }

    @media print {

        /* All your print styles go here */
        .progress {
            background-color: #f5f5f5 !important;
            border-radius: 4px !important;
            -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1) !important;
        }

        .progress-bar {
            background-color: #428bca !important;
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15) !important;
        }
    }



    @media print {

        .col-sm-1,
        .col-sm-2,
        .col-sm-3,
        .col-sm-4,
        .col-sm-5,
        .col-sm-6,
        .col-sm-7,
        .col-sm-8,
        .col-sm-9,
        .col-sm-10,
        .col-sm-11,
        .col-sm-12 {
            float: left;
        }

        .col-sm-12 {
            width: 100%;
        }

        .col-sm-11 {
            width: 91.66666667%;
        }

        .col-sm-10 {
            width: 83.33333333%;
        }

        .col-sm-9 {
            width: 75%;
        }

        .col-sm-8 {
            width: 66.66666667%;
        }

        .col-sm-7 {
            width: 58.33333333%;
        }

        .col-sm-6 {
            width: 50%;
        }

        .col-sm-5 {
            width: 41.66666667%;
        }

        .col-sm-4 {
            width: 33.33333333%;
        }

        .col-sm-3 {
            width: 25%;
        }

        .col-sm-2 {
            width: 16.66666667%;
        }

        .col-sm-1 {
            width: 8.33333333%;
        }

        .col-sm-pull-12 {
            right: 100%;
        }

        .col-sm-pull-11 {
            right: 91.66666667%;
        }

        .col-sm-pull-10 {
            right: 83.33333333%;
        }

        .col-sm-pull-9 {
            right: 75%;
        }

        .col-sm-pull-8 {
            right: 66.66666667%;
        }

        .col-sm-pull-7 {
            right: 58.33333333%;
        }

        .col-sm-pull-6 {
            right: 50%;
        }

        .col-sm-pull-5 {
            right: 41.66666667%;
        }

        .col-sm-pull-4 {
            right: 33.33333333%;
        }

        .col-sm-pull-3 {
            right: 25%;
        }

        .col-sm-pull-2 {
            right: 16.66666667%;
        }

        .col-sm-pull-1 {
            right: 8.33333333%;
        }

        .col-sm-pull-0 {
            right: auto;
        }

        .col-sm-push-12 {
            left: 100%;
        }

        .col-sm-push-11 {
            left: 91.66666667%;
        }

        .col-sm-push-10 {
            left: 83.33333333%;
        }

        .col-sm-push-9 {
            left: 75%;
        }

        .col-sm-push-8 {
            left: 66.66666667%;
        }

        .col-sm-push-7 {
            left: 58.33333333%;
        }

        .col-sm-push-6 {
            left: 50%;
        }

        .col-sm-push-5 {
            left: 41.66666667%;
        }

        .col-sm-push-4 {
            left: 33.33333333%;
        }

        .col-sm-push-3 {
            left: 25%;
        }

        .col-sm-push-2 {
            left: 16.66666667%;
        }

        .col-sm-push-1 {
            left: 8.33333333%;
        }

        .col-sm-push-0 {
            left: auto;
        }

        .col-sm-offset-12 {
            margin-left: 100%;
        }

        .col-sm-offset-11 {
            margin-left: 91.66666667%;
        }

        .col-sm-offset-10 {
            margin-left: 83.33333333%;
        }

        .col-sm-offset-9 {
            margin-left: 75%;
        }

        .col-sm-offset-8 {
            margin-left: 66.66666667%;
        }

        .col-sm-offset-7 {
            margin-left: 58.33333333%;
        }

        .col-sm-offset-6 {
            margin-left: 50%;
        }

        .col-sm-offset-5 {
            margin-left: 41.66666667%;
        }

        .col-sm-offset-4 {
            margin-left: 33.33333333%;
        }

        .col-sm-offset-3 {
            margin-left: 25%;
        }

        .col-sm-offset-2 {
            margin-left: 16.66666667%;
        }

        .col-sm-offset-1 {
            margin-left: 8.33333333%;
        }

        .col-sm-offset-0 {
            margin-left: 0%;
        }

        .visible-xs {
            display: none !important;
        }

        .hidden-xs {
            display: block !important;
        }

        table.hidden-xs {
            display: table;
        }

        tr.hidden-xs {
            display: table-row !important;
        }

        th.hidden-xs,
        td.hidden-xs {
            display: table-cell !important;
        }

        .hidden-xs.hidden-print {
            display: none !important;
        }

        .hidden-sm {
            display: none !important;
        }

        .visible-sm {
            display: block !important;
        }

        table.visible-sm {
            display: table;
        }

        tr.visible-sm {
            display: table-row !important;
        }

        th.visible-sm,
        td.visible-sm {
            display: table-cell !important;
        }
    }
    </style>


    <link rel="apple-touch-icon" href="../base/assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="../base/assets/images/favicon.ico">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../global/css/bootstrap.min.css">
    <link rel="stylesheet" href="../global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="../base/assets/css/site.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <!-- Plugins -->
    <link rel="stylesheet" href="../global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="../global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="../global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="../global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="../global/vendor/slidepanel/slidePanelS.css">
    <link rel="stylesheet" href="../global/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="../base/assets/examples/css/charts/chartjs.css">
    <link rel="stylesheet" href="../global/vendor/webui-popover/webui-popover.css">
    <link rel="stylesheet" href="../global/vendor/toolbar/toolbar.css">
    <link rel="stylesheet" href="../global/vendor/bootstrap-sweetalert/sweetalert.css">
    <link rel="stylesheet" href="../global/vendor/toastr/toastr.css">
    <link rel="stylesheet" href="../base/assets/examples/css/advanced/scrollable.css">
    <link rel="stylesheet" href="../base/assets/examples/css/uikit/modals.css">
    <link rel="stylesheet" href="../base/assets/examples/css/forms/layouts.css">
    <link rel="stylesheet" href="../global/vendor/aspieprogress/asPieProgress.css">
    <link rel="stylesheet" href="../base/assets/examples/css/charts/pie-progress.css">
    <link rel="stylesheet" href="../base/assets/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../base/assets/examples/css/structure/pagination.css">

    <!-- data table for export -->
    <link rel="stylesheet" href="../base/assets/datatable/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../base/assets/datatable/buttons.dataTables.min.css">
    <!-- data table for export -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css"> -->







    <!-- <script src="assetmoris/datadonutmoris/grafikmoris.js"></script>  -->
    <!-- <link rel="stylesheet" href="../global/vendor/morris/morris.css"> -->
    <!-- datatabble -->
    <link rel="stylesheet" href="../global/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- <link rel="stylesheet" href="../global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css">
        <link rel="stylesheet" href="../global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css">
        <link rel="stylesheet" href="../global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css">
        <link rel="stylesheet" href="../global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css">
        <link rel="stylesheet" href="../global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css">
        <link rel="stylesheet" href="../global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css">
        <link rel="stylesheet" href="../global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css">
        <link rel="stylesheet" href="../base/assets/examples/css/tables/datatable.css"> -->

    <!-- Fonts -->
    <link rel="stylesheet" href="../global/fonts/font-awesome/font-awesome.css">
    <link rel="stylesheet" href="../global/fonts/7-stroke/7-stroke.css">
    <link rel="stylesheet" href="../global/fonts/ionicons/ionicons.css">
    <link rel="stylesheet" href="../global/fonts/material-design/material-design.css">
    <link rel="stylesheet" href="../global/fonts/mfglabs/mfglabs.css">
    <link rel="stylesheet" href="../global/fonts/open-iconic/open-iconic.css">
    <link rel="stylesheet" href="../global/fonts/themify/themify.css">
    <link rel="stylesheet" href="../global/fonts/weather-icons/weather-icons.css">
    <link rel="stylesheet" href="../global/fonts/glyphicons/glyphicons.css">
    <link rel="stylesheet" href="../global/fonts/octicons/octicons.css">
    <link rel="stylesheet" href="../global/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="../global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='../base/assets/datatable/css.css'>
    <link rel="stylesheet" href="../global/vendor/nprogress/nprogress.css">

    <!-- <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'> -->

    <!--[if lt IE 9]>
    <script src="../global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

    <!--[if lt IE 10]>
    <script src="../global/vendor/media-match/media.match.min.js"></script>
    <script src="../global/vendor/respond/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <script src="../global/vendor/breakpoints/breakpoints.js"></script>
    <script>
    Breakpoints();
    </script>
    <script src="../global/vendor/jquery/jquery.js"></script>

    <script src="../base/assets/datatable/jquery.min.js"></script>
</head>
<!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
<?php
                                                            
                                                            $alokasi = mysqli_query($link_yics, "SELECT * FROM time_fiscal WHERE status='aktif'") or die(mysqli_error($link_yics));
                                                            $data = mysqli_fetch_assoc($alokasi);
                                                           
                                                            $awal = date_create($data['awal']);
                                                            $now=date_create();
                                                            $akhir =  date_create($data['akhir']);
                                                            $diffawal=date_diff($awal,$now);
                                                            $diffakhir=date_diff($akhir,$now);
                                                           
                                                          $awalfis= $diffawal->m +1;
                                                          $thfis =$diffawal->y;
                                                          $bulanfis="";
                                                          if ($thfis == 0){
                                                            $bulanfis = $awalfis;
                                                          }else if($thfis !==0) {
                                                            $bulanfis = 12;
                                                          }

                                                            
                                                           

                 
                    $id_dep = $_GET['dep'];
                    $data_fiscal = single_query("SELECT * from time_fiscal where status='aktif'");
                    $id_fis = $data_fiscal['id_fis'];
                    $awal_fiscal = $data_fiscal['awal'];
                    $akhir_fiscal = $data_fiscal['akhir'];

                    $list_bulan = [
                        4 => 1,
                        5 => 2,
                        6 => 3,
                        7 => 4,
                        8 => 5,
                        9 => 6,
                        10 => 7,
                        11 => 8,
                        12 => 9,
                        1 => 10,
                        2 => 11,
                        3 => 12
                    ];


                    if(isset($_GET['start']) || isset($_GET['end']) ){

                        $where_time = "AND time_ia > '{$_GET['start']}' AND time_ia <= '{$_GET['end']}' ";

                     }else{

                        $where_time = "";
                     }

                   
                    
                    // $get_data_budget = single_query("SELECT * FROM budget JOIN depart on budget.id_dep = depart.id_dep where budget.id_dep={$id_dep} and id_fis={$id_fis}");
                    
                    $get_data_budget1 = mysqli_query($link_yics ,"SELECT * FROM budget JOIN depart on budget.id_dep = depart.id_dep where budget.id_dep={$id_dep} and id_fis={$id_fis}")
                    or die (mysqli_error($link_yics));                 
                    if(mysqli_num_rows($get_data_budget1)>0){
                        $get_data_budget = mysqli_fetch_assoc($get_data_budget1);
                     } 
                    $consumtion_budget = single_query("SELECT sum(cost_ia) as cost , count(*) as qty , max(ia.time_ia) as last_month FROM ia
                        join proposal on ia.id_prop = proposal.id_prop
                        join depart on proposal.id_dep = depart.id_dep
                        where proposal.id_dep = {$id_dep} and proposal.id_fis={$id_fis} {$where_time}
                    ");  

                    // bulan terakhir consumtion budget
                    $last_month = $consumtion_budget['last_month'];
                    $last_month = date('m' , strtotime($last_month));
                    
                    $consumtion_budget_data = query("SELECT MONTH(ia.time_ia) AS bulan, sum(ia.cost_ia) as cost FROM ia
                    join proposal on ia.id_prop = proposal.id_prop
                    join depart on proposal.id_dep = depart.id_dep
                    where proposal.id_dep = {$id_dep} and proposal.id_fis={$id_fis} {$where_time}
                    GROUP BY bulan
                    ");  

                    foreach ($list_bulan as $bulan => $key) {

                        foreach($consumtion_budget_data as $row){
                            if($row['bulan'] == $bulan){
                                $isi_budget_bulan[$bulan] = $row['cost'];
                            }
                        }


                    }                    
                         
                    
                                                                
                    ///menghitung baris pada tabel progress
                    $kol=mysqli_query($link_yics ,"SELECT id_prog FROM progress")or die (mysqli_error($link_yics));
                    $kolom=mysqli_num_rows($kol);   
                    //query tabel closed
                    $data_ia = query("SELECT * from tracking_ia
                        join ia on tracking_ia.id_ia = ia.id_ia
                        join proposal on ia.id_prop = proposal.id_prop
                        join depart on proposal.id_dep = depart.id_dep
                        join kategori_proposal on proposal.id_kat = kategori_proposal.id_kat                      
                        where proposal.id_dep = {$id_dep} and proposal.id_fis={$id_fis}
                        and id_prog = 25 {$where_time} and approval = '1'
                    ");              

                   

                    // net budget departemen ============
                    foreach ($list_bulan as $fow => $key) {
                        $net_budget[] = $get_data_budget['budget'];
                    }
                    $net_budget = json_encode($net_budget);   
                    
                    // comsumtion budget from ia
                    foreach($list_bulan as $row => $key){

                        if(isset($isi_budget_bulan[$row])){
                            $data_grafik_con_budget[] = $isi_budget_bulan[$row];
                        }else{
                            $data_grafik_con_budget[] = 0;
                        }
                       
                    }
                    $data_grafik_con_budget = json_encode($data_grafik_con_budget);
                    
                    ?>
<div class="">
    <div class="">

    </div>

    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-lg-10 col-md-10 ">
                <h1 class="page-title font-size-26 font-weight-600">Budget
                    <?= $get_data_budget['depart']?>
                    Overview (x Million)
                </h1>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-print-6  mb-2">
                <?php 
                                    $alokasi = mysqli_query($link_yics, "SELECT * FROM time_fiscal WHERE status='aktif'") or die(mysqli_error($link_yics));
                                    if(mysqli_num_rows($alokasi)>0){                                    
                                    $data = mysqli_fetch_assoc($alokasi);
                                    $periode = $data['periode'];
                                    $awalf = date("d M Y", strtotime($data['awal']));
                                    $akhirf = date("d M Y", strtotime($data['akhir']));
                                    $awa = $data['awal'];
                                    $akhr = $data['akhir'];
                                    }else{
                                        $periode="Pilih periode aktif";
                                        $awalf="Pilih tahun aktif";
                                        $akhirf="Pilih tahun aktif";
                                        $awa="Pilih tahun aktif";
                                        $akhr="Pilih tahun aktif";
                                    }
                                        ?>

                <h6 class="font-size-18 font-weight-400">Periode ( <span style="color:red;"><?= $periode; ?> </span> ) :
                    <span style="color:red;"><?= $awalf; ?></span>
                    s.d
                    <span style="color:red;"><?= $akhirf; ?>
                    </span>
                </h6>
            </div>

            <!-- First Row -->



            <!-- End First Row -->
            <!-- Second Row -->
            <div class="col-lg-12 col-md-6 col-print-12">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-print-4 info-panel">
                        <div class="card card-shadow" style="border-radius: 15px;height:200px;">
                            <div class="card-block warnadep<?=$id_dep?>" style="border-radius: 15px;height:200px;">
                                <button type="button" class="btn btn-floating btn-md btn-success">
                                    <i class="icon fa-dollar"></i>
                                </button>
                                <span class="white font-weight-400 font-size-20"><?= $get_data_budget['depart']?></span>
                                <div class="content-text text-center mb-0">

                                    <?php                                                          
                                                            $total_budget = $get_data_budget['budget'];
                                                            $consumtion_budget_cost = $consumtion_budget['cost'];

                                                            $sisa_budget = $total_budget - $consumtion_budget_cost;

                                                        ?>

                                    <span>
                                        <P class="white font-size-30 font-weight-100 mt-20">
                                            IDR
                                            <?= number_format($sisa_budget,0,',','.')." "."Million" ?>
                                        </P>

                                        <p class="white font-weight-100 font-size-20 mt-10">
                                            "Budget IDR
                                            <?= number_format($get_data_budget['budget'],0,',','.')." "."Million"  ?>"
                                        </p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-print-4  info-panel">
                        <div class="card card-shadow bg-brown-100" style="border-radius: 15px;height:200px;">
                            <div class="ml-20 mr-20 py-15 " style="line-height: 20px;">
                                <h4>Transactions:</h4>
                                <p style="font-size: 20px;"> <span
                                        style="font-size: 25px; font-weight: bold;color:black;">
                                        <?= number_format($consumtion_budget['qty'],0,',','.') ?>
                                    </span> x orders</p>
                                <?php 
                                                        // $index_bulan_terakhir = $list_bulan[$last_month];
                                                    ?>
                                <h4>Month / left:</h4>
                                <p style="font-size: 20px;"> <span
                                        style="font-size: 25px; font-weight: bold;color:black;">
                                        <?= $bulanfis ?>
                                    </span> / 12 months</p>
                                <div class="progress">

                                    <?php 

                                                        $persentase = number_format( $bulanfis / 12 * 100 ,0 );

                                                        ?>
                                    <div class="progress-bar progress-bar-striped active" aria-valuenow="90"
                                        aria-valuemin="0" aria-valuemax="100" style="width: <?= $persentase ?>%"
                                        role="progressbar">
                                        <span><?= $persentase ?>% </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-3 col-print-4  info-panel">
                        <div class="card card-shadow bg-brown-100" style="border-radius: 15px;height:200px;">
                            <div class="row">
                                <div class="col-lg-6 col-md-7 col-print-6  py-4">
                                    <div class="text-left">

                                        <?php 
if( $sisa_budget>0){
    $sisa=$sisa_budget;
}else{
    $sisa=0;
}



                                                                $persentase_budget =ceil( $sisa / $total_budget * 100);
                                                                if ( $id_dep ==1){
                                                                    $warna = 'yellow';
                                                                }
                                                                else if ( $id_dep ==2){
                                                                    $warna = 'red';
                                                                }
                                                                else if ( $id_dep ==3){
                                                                    $warna = 'purple';
                                                                }else {
                                                                    $warna = '';
                                                                }
                                                            ?>

                                        <div class="pie-progress bt " data-plugin="pieProgress"
                                            data-barcolor="<?= $warna ?>" data-size="100" data-barsize="8"
                                            data-goal="40" aria-valuenow=" <?= $persentase_budget ?>"
                                            role="progressbar">
                                            <div class="pie-progress-content ">
                                                <div class="pie-progress-number">
                                                    <?= $persentase_budget ?>%</div>
                                                <div class="pie-progress-label">Available</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-5 mt-30 col-print-6" style="line-height: 15px;">
                                    <h4>e-Wallet:</h4>
                                    <p style="font-size: 20px; color:green;font-weight: bold;">IDR
                                        <?= number_format($get_data_budget['budget'],0,',','.')?>
                                    </p>
                                    <h4>Consummed:</h4>
                                    <p style="font-size: 20px; color:blue;font-weight: bold;">IDR
                                        <?= number_format($consumtion_budget['cost'] ,0, ',','.')?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-print-12">
                <div class="card card-shadow">
                    <div class="card-header card-header-transparent bg-dark">

                        <div class="float-left">
                            <span class="font-size-20 bold">Transaction History</span>
                        </div>

                    </div>
                    <div class="card-body">
                        <canvas id="myBar4" class="col-print-12" style="height:300px !important;
"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-print-12">
                <table class=" table table-striped table-bordered ">
                    <thead class="text-center">
                        <tr class="bg-info align-">
                            <th class="align-middle text-center" rowspan="2">
                                N0</th>
                            <th class="align-middle text-center" rowspan="2">
                                CATEGORY</th>
                            <th class="align-middle text-center" width="300px" rowspan="2">
                                NO. IA</th>
                            <th class="align-middle text-center" rowspan="2">
                                DESCRIPTION</th>
                            <th class="align-middle text-center" width="300px" rowspan="2">
                                BENEFIT</th>
                            <th class="align-middle text-center lebar" width="120px" rowspan="2">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DATE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </th>
                            <th class="align-middle text-center" width="130px" rowspan="2">
                                TOTAL TRANSC</th>
                            <th class="align-middle text-center" rowspan="2">
                                STATUS </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i=1; ?>

                        <?php foreach ($data_ia as $row) { ?>
                        <tr class="text-wrap">
                            <td class="align-middle text-center"><?= $i ?></td>
                            <td class="align-middle text-center"><?= $row['kategori'] ?>
                            </td>
                            <td class="align-middle text-center"><?= $row['ia'] ?></td>
                            <td class="align-middle text-center"><?= $row['deskripsi'] ?>
                            </td>
                            <td class="align-middle text-center"><?= $row['benefit'] ?></td>
                            <td class="align-middle text-center">
                                <?= date('d M Y' , strtotime($row['time_ia']))  ?></td>
                            <td class="align-middle text-center">IDR
                                <?= number_format($row['cost_ia'],0,',','.') ?></td>
                            <td class="align-middle text-center">Closed</td>
                        </tr>

                        <?php $i++; } ?>


                    </tbody>
                </table>
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

<!-- endFooter -->
<!-- Core  -->
<script src="../global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
<script src="../global/vendor/jquery/jquery.js"></script>
<script src="../global/vendor/popper-js/umd/popper.min.js"></script>
<script src="../global/vendor/bootstrap/bootstrap.js"></script>
<script src="../global/vendor/animsition/animsition.js"></script>
<script src="../global/vendor/mousewheel/jquery.mousewheel.js"></script>
<script src="../global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
<script src="../global/vendor/asscrollable/jquery-asScrollable.js"></script>
<script src="../global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>

<!-- Plugins -->
<script src="../global/vendor/switchery/switchery.js"></script>
<script src="../global/vendor/intro-js/intro.js"></script>
<script src="../global/vendor/screenfull/screenfull.js"></script>
<script src="../global/vendor/slidepanel/jquery-slidePanel.js"></script>
<script src="../global/vendor/chart-js/Chart.js"></script>
<script src="../global/vendor/webui-popover/jquery.webui-popover.min.js"></script>
<script src="../global/vendor/toolbar/jquery.toolbar.js"></script>
<script src="../global/vendor/bootbox/bootbox.js"></script>
<script src="../global/vendor/bootstrap-sweetalert/sweetalert.js"></script>
<script src="../global/vendor/toastr/toastr.js"></script>
<script src="../global/js/Plugin/asscrollable.js"></script>
<script src="../global/vendor/jquery-placeholder/jquery.placeholder.js"></script>
<script src="../global/vendor/aspieprogress/jquery-asPieProgress.js"></script>
<script src="../global/js/Plugin/jquery-appear.js"></script>
<script src="../global/js/Plugin/nprogress.js"></script>

<script src="../base/assets/examples/js/advanced/animation.js"></script> <!-- navbar -->
<script src="../global/js/Plugin/responsive-tabs.js"></script>
<script src="../global/js/Plugin/closeable-tabs.js"></script>
<script src="../global/js/Plugin/tabs.js"></script>
<script src="../global/vendor/matchheight/jquery.matchHeight-min.js"></script>



<!-- data  table -->
<script src="../global/vendor/datatables/jquery.dataTables.min.js"></script>
<!-- <script src="../global/vendor/datatables.net/jquery.dataTables.js"></script> -->
<script src="../global/vendor/datatables.net-bs4/dataTables.bootstrap4.min.js"></script>
<script src="../global/vendor/datatables.net-responsive/dataTables.responsive.min.js"></script>
<script src="../global/vendor/datatables.net-responsive-bs4/responsive.bootstrap4.min.js">
</script>
<script src="../global/vendor/aspaginator/jquery-asPaginator.min.js"></script>

<script>
$(function() {
    $('.example0').DataTable({
        scrollX: true,
    });
});
</script>




<!-- Scripts -->
<script src="../global/js/Component.js"></script>
<script src="../global/js/Plugin.js"></script>
<script src="../global/js/Base.js"></script>
<script src="../global/js/Config.js"></script>

<script src="../base/assets/js/Section/Menubar.js"></script>
<script src="../base/assets/js/Section/GridMenu.js"></script>
<script src="../base/assets/js/Section/Sidebar.js"></script>
<script src="../base/assets/js/Section/PageAside.js"></script>
<script src="../base/assets/js/Plugin/menu.js"></script>


<script src="../global/js/config/colors.js"></script>
<script src="../base/assets/js/config/tour.js"></script>
<script>
Config.set('assets', '../base/assets');
</script>

<!-- Page -->
<script src="../base/assets/js/Site.js"></script>
<script src="../global/js/Plugin/asscrollable.js"></script>
<script src="../global/js/Plugin/slidepanel.js"></script>
<script src="../global/js/Plugin/switchery.js"></script>
<!-- <script src="grafikbar.js"></script> -->
<script src="modal.js"></script>
<script src="../global/js/Plugin/jquery-placeholder.js"></script>
<script src="../global/js/Plugin/material.js"></script>
<script src="../global/js/Plugin/jquery-placeholder.js"></script>
<script src="../global/vendor/moment/moment.min.js"></script>
<script src="../global/vendor/footable/footable.min.js"></script>


<!-- <script src="../base/assets/examples/js/charts/chartjs.js"></script> -->
<script src="../base/assets/examples/js/dashboard/ecommerce.js"></script>
<script src="../global/js/Plugin/aspieprogress.js"></script>
<script src="../global/js/Plugin/webui-popover.js"></script>
<script src="../global/js/Plugin/toolbar.js"></script>
<script src="../base/assets/examples/js/uikit/tooltip-popover.js"></script>
<script src="../base/assets/examples/css/charts/chartjs.css"></script>
<script src="../base/assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="../base/js/controltable.js"></script>
<script src="../global/js/Plugin/datatables.js"></script>

<script src="../base/assets/examples/js/tables/datatable.js"></script>

<!-- for export datatable -->
<script src="../base/assets/datatable/jszip.min.js"></script>
<script src="../base/assets/datatable/dataTables.buttons.min.js"></script>
<script src="../base/assets/datatable/pdfmake.min.js"></script>
<script src="../base/assets/datatable/vfs_fonts.js"></script>
<script src="../base/assets/datatable/buttons.html5.min.js"></script>
<script src="../base/assets/datatable/buttons.print.min.js"></script>

<script>
var css = '@page { size: portrait; }',
    head = document.head || document.getElementsByTagName('head')[0],
    style = document.createElement('style');

style.type = 'text/css';
style.media = 'print';

if (style.styleSheet) {
    style.styleSheet.cssText = css;
} else {
    style.appendChild(document.createTextNode(css));
}

head.appendChild(style);
document.title = 'CONTROL TABLE YINV <?= $judul[$id_dep]; ?>.pdf';
window.print();
</script>
</body>

</html>
<script>
var ctx = document.getElementById("myBar4").getContext('2d');
var myBar4 = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Aprl", "Mei", "Jun", "July", "Agst", "Sept", "Oct", "Nov", "Dec", "Jan",
            "Feb", "March"
        ],
        datasets: [

            {
                type: 'line',
                label: "BUDGET  <?= $get_data_budget['depart']?>",
                borderColor: Config.colors("grey", 800),
                data: <?= $net_budget ?>,
                order: 1,
            },
            {
                label: "CONSUMTION <?= $get_data_budget['depart']?>",
                backgroundColor: Config.colors("<?= $warna ?>", 100),
                borderColor: Config.colors("<?= $warna ?>", 800),
                hoverBackgroundColor: Config.colors("<?= $warna ?>", 100),
                borderWidth: 2,
                data: <?=$data_grafik_con_budget?>
            },


        ]
    },
    options: {
        scales: {
            yAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'Million'
                },
                ticks: {
                    beginAtZero: true
                },
                stacked: false
            }],
            xAxes: [{


                scaleLabel: {
                    display: true,
                    labelString: 'Bulan'
                },
                stacked: false
            }]
        },
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>
<script>
var css = '@page { size: landscape }',
    head = document.head || document.getElementsByTagName('head')[0],
    style = document.createElement('style');

style.type = 'text/css';
style.media = 'print';

if (style.styleSheet) {
    style.styleSheet.cssText = css;
} else {
    style.appendChild(document.createTextNode(css));
}

head.appendChild(style);
document.title = 'BUDGET YINV <?= $judul[$id_dept]; ?>.pdf';
window.print();
</script>