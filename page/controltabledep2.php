<?php
include("../config/config.php");
if (!isset($_SESSION['yics_user'])) {
  header('location: ../index.php');
}
$judul = [
    1 => "BODY PLANT 1",
    2 => "BODY PLANT 2",
    3 => "BQC"
];

$id_dept = $_GET['dept'];
$judul = [
    1 => "BODY PLANT 1",
    2 => "BODY PLANT 2",
    3 => "BQC"
    ];
    
    $id_dept = $_GET['dept'];
    
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
    <style>
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

    body {
        margin: 0;
        padding: 0;
    }

    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .page {
        width: 21cm;
        min-height: 29.7cm;
        padding: 2cm;
        margin: 1cm auto;
        border: none;
        background: #F4F3F1;
    }

    .page-inner {
        padding: 1cm;
        border: 2px solid black;
        height: 256mm;
        outline: 2cm #F4F3F1 solid;
    }

    @page {
        size: landscape;
        margin: 1;
    }

    @media print {
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }

        .coba {
            border: white;

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


<!-- Page -->
<?php $_GET['dept'] ?>

<div class="">
    <div class="">
        <table class=" table table-hover table-bordered text-center 10px page">
            <thead class="table-info" style="font-size:7px;">
                <tr class="bg-white text-left border-top-0 coba">
                    <th colspan="19" class="coba">
                        <h1 class="page-title font-size-20 font-weight-600">CONTROL TABLE <?= $judul[$id_dept] ?> (x
                            Million) PERIODE <?= $periode; ?>-<?= $periode+1; ?>
                        </h1>
                    </th>
                </tr>
                <tr>
                    <th class="judul align-middle text-center export-col" colspan="6">
                        INVESTMENT PLANNING CONTROL TABLE</th>

                    <th class="judul align-middle text-center export-col" colspan="13">
                        IMPLEMENTATION CONTROL TABLE</th>



                </tr>
                <tr>
                    <th class="judul align-middle text-center" rowspan="2" width="0.01em">NO
                    </th>
                    <th class="judul align-middle text-center" rowspan="2">
                        DEPEARTMENT</th>
                    <th class="judul align-middle text-center" rowspan="2">
                        CATEGORY</th>
                    <th class="judul align-middle text-center" rowspan="2">
                        DESCRIPTION</th>
                    <th class="judul align-middle text-center" rowspan="2">
                        TOTAL MILL JPY</th>
                    <th class="judul align-middle text-center" rowspan="2">
                        TOTAL MILL IDR</th>
                    <th class="judul align-middle text-center" rowspan="2">No
                    </th>
                    <th class="judul align-middle text-center" colspan="2">IA
                        No.</th>
                    <th class="judul align-middle text-center" rowspan="2">
                        DESCRIPTION</th>
                    <th class="judul align-middle text-center" colspan="3">
                        Original Currency</th>
                    <th class="judul align-middle text-center" colspan="2">
                        Actual In</th>
                    <th class="judul align-middle text-center" colspan="2">
                        Remaining</th>
                    <th class="judul align-middle text-center" rowspan="2" width="5%">
                        Valid Until</th>
                    <th class="judul align-middle text-center">Remark</th>


                </tr>
                <tr>
                    <th class="align-middle text-center">
                        Subject</th>
                    <th class="align-middle text-center">
                        IO</th>
                    <th class="align-middle text-center">
                        JPY</th>
                    <th class="align-middle text-center">
                        Rp</th>
                    <th class="align-middle text-center">
                        1000USD</th>
                    <th class="align-middle text-center">
                        JPY</th>
                    <th class="align-middle text-center">
                        Rp</th>
                    <th class="align-middle text-center">
                        JPY</th>
                    <th class="align-middle text-center">
                        Rp</th>
                    <th class="align-middle text-center">
                        CT Updated</th>


                </tr>

            </thead>
            <tbody style="font-size:5px;">

                <!-- query proposal control table -->
                <?php 
                                                        $Rp = "RP";

                             // where from request 

                             if(isset($_GET['start'])){

                                $query_start = "AND ia.time_ia >= '{$_GET['start']}'";

                             }else{
                                $query_start = "";
                             }


                             if(isset($_GET['end'])){

                                $query_end = "AND ia.time_ia <= '{$_GET['end']}'";

                             }else{
                                $query_end = "";
                             }


                             if( $_SESSION['yics_level'] == "1"){
                                $query_level = "AND proposal.username={$_SESSION['yics_user']}";
                             }else{
                                $query_level = "";
                             }


                              $proposal = mysqli_query($link_yics ,"SELECT
                                proposal.id_prop AS id_prop,
                                depart.id_dep AS id_dep,
                                depart.depart AS depart,
                                kategori_proposal.kategori AS kategori,
                                time_fiscal.status AS `status`,
                                proposal.proposal AS proposal,
                                tracking_prop.id_prog AS id_prog, 
                                tracking_prop.id_approval AS id_approval,
                                `time`,
                                progress.step AS step,
                                progress.nama_progress AS progress,
                                approval.approval AS approval,
                                proposal.cost AS cost,
                                konversi_matauang.dollar AS dollar,
                                konversi_matauang.yen AS yen,
                                ia.id_ia AS id_ia,
                                ia.ia AS no_ia,
                                ia.deskripsi AS ia_deskripsi,
                                ia.cost_ia AS cost_ia,
                                data_user.nama AS pic_ia,
                                ia.time_ia AS time_ia
                                
                                FROM tracking_prop   
                                LEFT JOIN proposal  ON tracking_prop.id_prop = proposal.id_prop
                                LEFT JOIN ia ON proposal.id_prop = ia.id_prop
                                LEFT JOIN depart ON proposal.id_dep = depart.id_dep
                                LEFT JOIN kategori_proposal  ON proposal.id_kat = kategori_proposal.id_kat
                                LEFT JOIN time_fiscal  ON proposal.id_fis = time_fiscal.id_fis
                                LEFT JOIN progress  ON tracking_prop.id_prog = progress.id_prog
                                LEFT JOIN konversi_matauang ON proposal.id_matauang = konversi_matauang.id_matauang
                                LEFT JOIN data_user ON ia.pic_ia = data_user.username 
                                
                               
                                LEFT JOIN approval ON tracking_prop.id_approval = approval.id_approval
                                WHERE tracking_prop.id_approval  = '1' AND progress.step = '5' 
                                AND depart.id_dep='$id_dept'AND time_fiscal.status= 'aktif' {$query_start} {$query_end} {$query_level}"
                                )
                                or die (mysqli_error($link_yics));
                                $no=0;
                                $nomor_urut=0;
                                $nomor_urut_before =0;
                                
                                $no_prop=0;
                                $id_before = '';

                                // untuk memvalidasi apakah ada datanya
                                if(mysqli_num_rows($proposal)>0){
                                while($data = mysqli_fetch_assoc($proposal)){                                   
                                    $id= $data['id_prop'];
                                    

                                    if($id_before == $data['id_prop']){
                                        $no_prop += 1;     
                                        $sembunyikan_nomor = "hidden";                                   
                                    }else{
                                        $no_prop = 1;
                                        $no++;
                                        $nomor_urut += 1;
                                        $sembunyikan_nomor = ""; 
                                        
                                    }

                                    if($id_before == $data['id_prop']){
                                        $nomor_table = "";
                                    }else{
                                       
                                        $nomor_table = $nomor_urut;
                                    }


                                    if ($data['id_ia']>0){
                                        $tombol_hidup="";
                                    }else{
                                        $tombol_hidup="disabledlink"; 
                                    }
                                    if((isset($data['no_ia']) && $no_prop == 1)){
                                        $remainrp = number_format (($data['cost']-$data['cost_ia']),0,',','.'); 
                                       }else if((isset($data['no_ia']) && $no_prop != 1)) {
                                        $remainrp = number_format ((0-$data['cost_ia']),0,',','.'); 
                                       }else{ $remainrp ="";}
                                    // $id_before = $data['id_prop'];

                                    if((isset($data['no_ia']) && $no_prop == 1)){
                                        $remainyen = number_format ((($data['cost']-$data['cost_ia'])/$data['yen']),2,',','.'); 
                                       }else if((isset($data['no_ia']) && $no_prop != 1)) {
                                        $remainyen = number_format (((0-$data['cost_ia'])/$data['yen']),2,',','.'); 
                                       }else{ $remainyen ="";}
                                    if ($remainrp<0){
                                        $warnaremain="bg-red-100";
                                    }else{
                                        $warnaremain="";
                                    }
                                    ?>

                <tr class="<?php if ($no%2==0){ echo "bg-blue-100"; } else{ echo ""; } ?> text-uppercase">
                    <td> <span class=""><?= $nomor_table ?></span>
                    </td>
                    <td>
                        <?= ($no_prop == 1)? $data['depart']:""; ?></td>
                    <td>
                        <?= ($no_prop == 1)? $data['kategori']:""; ?></td>

                    <td>
                        <?= ($no_prop == 1)? $data['proposal']:""; ?>

                    </td>

                    <td>
                        <?php  $yen="¥"; ?>
                        <?= ($no_prop == 1)? $yen." ".number_format($data['cost']/$data['yen'], 2, ',', '.')." "."Million":""; ?>
                    </td>
                    <td>
                        <?php
                                                                  $Rp="Rp"; ?>

                        <?=($no_prop == 1)? $Rp." ".number_format ($data['cost'],0,',','.')." "."Million": ""; ?>
                    </td>
                    <td> <?= (isset($data['no_ia']))? $no_prop: ""; ?>
                    </td>
                    <td><?= $data['no_ia'] ?></td>
                    <td></td>
                    <td><?= $data['ia_deskripsi'] ?></td>
                    <td></td>
                    <td><?= (isset($data['no_ia']))?$Rp." ".number_format ($data['cost_ia'],0,',','.')." "."Million": ""; ?>
                    </td>
                    <td></td>
                    <td><?= (isset($data['no_ia']))? $yen." ".number_format($data['cost_ia']/$data['yen'], 2, ',', '.')." "."Million": ""; ?>
                    </td>
                    <td><?= (isset($data['no_ia']))? $Rp." ".number_format ($data['cost_ia'],0,',','.')." "."Million": ""; ?>
                    </td>


                    <td class="<?=  (isset($data['no_ia']))?$warnaremain: ""; ?>">
                        <?= (isset($data['no_ia']))? $yen." ".$remainyen." "."Million": ""; ?>
                    </td>

                    <td class="<?=  (isset($data['no_ia']))?$warnaremain: ""; ?>">
                        <?= (isset($data['no_ia']))? $Rp." ".$remainrp." "."Million": ""; ?>
                    </td>
                    <td><?= (isset($data['no_ia']))?date("d M Y", strtotime($data['time_ia'])): "";  ?>
                    </td>
                    <td><?= (isset($data['no_ia']))?$data['pic_ia']: ""; ?></td>
                    <?php 

                                                        $id_before = $data['id_prop'];
                                                        $nomor_urut_before = $nomor_urut;
                                                        
                                                      }
                                                      }
                                                       ?>
                </tr>

            </tbody>
        </table>
    </div>
</div>







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
var css = '@page { size: landscape; }',
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

window.print();
</script>
</body>

</html>