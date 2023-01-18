<?php
include("../config/config.php");
if (!isset($_SESSION['yics_user'])) {
  header('location: ../index.php');
}
?>
<!--header-->
<?php
include '../elemen/header.php';

$judul = [
    1 => "BODY PLANT 1",
    2 => "BODY PLANT 2",
    3 => "BQC"
];

$id_dept = $_GET['dept'];

?>
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
                    <!-- Site Navbar Search -->
                    <?php include '../elemen/sidebarleft.php';?>

                    <!-- Site Navbar Search -->
                    <?php include '../elemen/sidebar.php';?>
                    <!-- End Site Navbar Search -->
                    <!-- end sidebar -->

                    <!-- sidebar back -->
                    <?php include '../elemen/sidebarback.php';?>
                    <!-- end sidebar back -->
                    <!-- <script>
                    function printArea(area) {
                        var printPage = document.getElementById(area).innerHTML;
                        var oriPage = document.body.innerHTML;
                        document.body.innerHTML = printPage;
                        window.print();
                        document.body.innerHTML = oriPage;
                    }
                    <button onclick="return printArea('area')">PRINT</button>
                    </script> -->




                    <!-- Page -->
                    <div class="page">
                        <div class="page-header">
                            <h1 class="page-title font-size-26 font-weight-600">Control Table <?= $judul[$id_dept] ?> (x
                                Million)

                            </h1>
                        </div>
                        <!-- <table class="table ">
                            <tr>
                                <td>
                                    Print Area
                                </td>
                            </tr>
                            <td>

                                Print Area

                            </td>

                        </table> -->

                        <div class="page-content container-fluid">
                            <div class="row">
                                <div class="col-lg-6 col-md-6  mb-2">
                                    <?php 
                                    $alokasi = mysqli_query($link_yics, "SELECT * FROM time_fiscal WHERE status='aktif'") or die(mysqli_error($link_yics));
                                    if(mysqli_num_rows($alokasi)>0){                                    
                                    $data = mysqli_fetch_assoc($alokasi);
                                    $periode = $data['periode'];
                                    $awa = $data['awal'];
                                    $akhr = $data['akhir'];
                                    $awalf = date("d M Y", strtotime($data['awal']));
                                    $akhirf = date("d M Y", strtotime($data['akhir']));
                                    }else{
                                        $periode="Pilih periode aktif";
                                        $awalf="Pilih tahun aktif";
                                        $akhirf="Pilih tahun aktif";
                                        $awa="Pilih tahun aktif";
                                        $akhr="Pilih tahun aktif";
                                    }
                                        ?>

                                    <h6 class="font-size-18 font-weight-400">Periode ( <span
                                            style="color:red;"><?= $periode; ?> </span> ) :
                                        <span style="color:red;"><?= $awalf; ?></span>
                                        s.d
                                        <span style="color:red;"><?= $akhirf; ?>
                                        </span>
                                    </h6>

                                </div>
                                <div class="col-lg-6 col-md-6 mb-2">
                                    <form action="">
                                        <div class="row">
                                            <input type="hidden" name="dept" value="<?= $_GET['dept'] ?>">
                                            <div class="col-lg-5 col-md-5">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon wb-calendar" aria-hidden="true"></i>
                                                        </span>
                                                    </div>
                                                    <input type="date" name="start" id="start_date"
                                                        class="form-control bg-transparent datepicker"
                                                        min="<?= $awa; ?>" max="<?= $akhr; ?>"
                                                        value="<?= (isset($_GET['start']))? $_GET['start']:date('Y-m-d'); ?>">

                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">to</span>
                                                    </div>
                                                    <input type="date" name="end" id="end_date"
                                                        class="form-control bg-transparent datepicker"
                                                        min="<?= $awa; ?>" max="<?= $akhr; ?>"
                                                        value="<?= (isset($_GET['end']))? $_GET['end']:date('Y-m-d'); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-right">
                                                <a href="">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-floating btn-sm "><i
                                                            aria-hidden="true"></i>GO</button>
                                                </a>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="card card-transparent">
                                        <div class=" ">

                                            <div
                                                class="table-bordered table-responsive  text-center 10px table-striped text-nowrap">
                                                <table class=" table tableproposal table-hover " width="100%">
                                                    <thead class="table-info">
                                                        <tr>
                                                            <th class="judul align-middle text-center export-col"
                                                                colspan="4" style="color: white;">
                                                                INVESTMENT PLANNING CONTROL TABLE</th>

                                                            <th class="judul align-middle text-center export-col"
                                                                colspan="6" style="color: white;">
                                                                IMPLEMENTATION CONTROL TABLE</th>

                                                            <th class="judul align-middle text-center table-info noexportar"
                                                                rowspan="3" style="color: white;">
                                                                STATUS
                                                            </th>
                                                            <th class="judul align-middle text-center able-info noexportar"
                                                                rowspan="3" style="color: white;">
                                                                PROGRESS
                                                            </th>
                                                            <th class="judul align-middle text-center table-danger noexportar"
                                                                rowspan="3" style="color: white;">
                                                                ACTION
                                                            </th>

                                                        </tr>
                                                        <tr>
                                                            <th class="judul align-middle text-center" rowspan="2"
                                                                style="color: white;">NO
                                                            </th>
                                                            <th class="judul align-middle text-center" rowspan="2"
                                                                style="color: white;">
                                                                DEPEARTMENT</th>
                                                            <th class="judul align-middle text-center" rowspan="2"
                                                                style="color: white;">
                                                                CATEGORY</th>
                                                            <th class="judul align-middle text-center" rowspan="2"
                                                                style="color: white;">
                                                                DESCRIPTION</th>

                                                            <th class="judul align-middle text-center" rowspan="2"
                                                                style="color: white;">No
                                                            </th>
                                                            <th class="judul align-middle text-center" colspan="2"
                                                                style="color: white;">IA
                                                                No.</th>
                                                            <th class="judul align-middle text-center" rowspan="2"
                                                                style="color: white;">
                                                                DESCRIPTION</th>

                                                            <th class="judul align-middle text-center" rowspan="2"
                                                                style="color: white;">
                                                                Valid Until</th>
                                                            <th class="judul align-middle text-center"
                                                                style="color: white;">Remark</th>


                                                        </tr>
                                                        <tr>
                                                            <th class="align-middle text-center" style="color: white;">
                                                                Subject</th>
                                                            <th class="align-middle text-center" style="color: white;">
                                                                IO</th>

                                                            <th class="align-middle text-center" style="color: white;">
                                                                CT Updated</th>


                                                        </tr>

                                                    </thead>
                                                    <tbody>

                                                        <!-- query proposal control table -->
                                                        <?php 
$IDR = "IDR";

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
plan_proposal.id_prop AS id_prop,
depart.id_dep AS id_dep,
depart.depart AS depart,
kategori_proposal.kategori AS kategori,
time_fiscal.status AS `status`,
plan_proposal.proposal AS proposal,                                                          
plan_proposal.cost AS cost,
konversi_matauang.dollar AS dollar,
konversi_matauang.yen AS yen,
ia.id_ia AS id_ia,
ia.ia AS no_ia,
ia.deskripsi AS ia_deskripsi,
ia.cost_ia AS cost_ia,
data_user.nama AS pic_ia,

ia.time_ia AS time_ia

FROM plan_proposal   

LEFT JOIN ia ON plan_proposal.id_prop = ia.id_prop

LEFT JOIN kategori_proposal  ON plan_proposal.id_kat = kategori_proposal.id_kat
LEFT JOIN time_fiscal  ON plan_proposal.id_fis = time_fiscal.id_fis                                                               
LEFT JOIN konversi_matauang ON plan_proposal.id_matauang = konversi_matauang.id_matauang
LEFT JOIN data_user ON ia.pic_ia = data_user.username 
LEFT JOIN area ON area.id_area = plan_proposal.id_area 
                                LEFT JOIN depart ON depart.id_dep = area.id_dep



WHERE depart.id_dep='$id_dept'AND time_fiscal.status= 'aktif' {$query_start} {$query_end}   ORDER BY plan_proposal.proposal ASC   "
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
$cost_ia= $data['cost_ia'];                                   
// $n0_ia=$data['no_ia'];                                   

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
$remainIDR = number_format (($data['cost']-$data['cost_ia']),2,',','.'); 
}else if((isset($data['no_ia']) && $no_prop != 1)) {
$remainIDR = number_format ((0-$data['cost_ia']),2,',','.'); 
}else{ $remainIDR ="";}
// $id_before = $data['id_prop'];

if((isset($data['no_ia']) && $no_prop == 1)){
$remainyen = number_format ((($data['cost']-$data['cost_ia'])/$data['yen']),2,',','.'); 
}else if((isset($data['no_ia']) && $no_prop != 1)) {
$remainyen = number_format (((0-$data['cost_ia'])/$data['yen']),2,',','.'); 
}else{ $remainyen ="";}

if((isset($data['no_ia']) && $no_prop == 1)){
$remainIDRx = number_format (($data['cost']-$data['cost_ia']),2,'.',''); 
}else if((isset($data['no_ia']) && $no_prop != 1)) {
$remainIDRx = number_format ((0-$data['cost_ia']),2,'.',''); 
}else{ $remainIDRx ="0";}
// $id_before = $data['id_prop'];

if((isset($data['no_ia']) && $no_prop == 1)){
$remainyenx = number_format ((($data['cost']-$data['cost_ia'])/$data['yen']),2,'.',''); 
}else if((isset($data['no_ia']) && $no_prop != 1)) {
$remainyenx = number_format (((0-$data['cost_ia'])/$data['yen']),2,'.',''); 
}else{ $remainyenx ="0";}

if ($remainIDR<0){
$warnaremain="bg-red-100";
}else{
$warnaremain="";
}
?>

                                                        <tr
                                                            class="<?php if ($no%2==0){ echo "bg-blue-100"; } else{ echo ""; } ?> text-uppercase">
                                                            <td> <span class=""><?= $nomor_table ?></span>
                                                            </td>
                                                            <td>
                                                                <?= ($no_prop == 1)? $data['depart']:""; ?></td>
                                                            <td>
                                                                <?= ($no_prop == 1)? $data['kategori']:""; ?></td>

                                                            <td>
                                                                <?php if($_SESSION['yics_level'] != '2'){ ?>

                                                                <?= ($no_prop == 1)? $data['proposal']:""; ?>
                                                                <?php  }else{?>
                                                                <a
                                                                    href="formnambah_ia.php?add=<?php echo $data['id_prop']; ?>">
                                                                    <?= ($no_prop == 1)? $data['proposal']:""; ?></a>
                                                                <?php } ?>
                                                            </td>


                                                            <td class="<?= ($cost_ia == 0)? "coret":""; ?>">
                                                                <?= (isset($data['no_ia']))? $no_prop: ""; ?>
                                                            </td>
                                                            <td class="<?= ($cost_ia == 0)? "coret":""; ?>">
                                                                <?= $data['no_ia'] ?></td>
                                                            <td></td>
                                                            <td class="<?= ($cost_ia == 0)? "coret":""; ?>">
                                                                <?= $data['ia_deskripsi'] ?></td>

                                                            <td class="<?= ($cost_ia == 0)? "coret":""; ?>">
                                                                <?= (isset($data['no_ia']))?date("d M Y", strtotime( $akhirf)): "";  ?>
                                                            </td>
                                                            <td class="<?= ($cost_ia == 0)? "coret":""; ?>">
                                                                <?= (isset($data['no_ia']))?$data['pic_ia']: ""; ?>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <!-- query update progress -->
                                                                <?php  
    
    ///menghitung baris pada progress
$kol=mysqli_query($link_yics ,"SELECT id_prog FROM progress")or die (mysqli_error($link_yics));
$kolom=mysqli_num_rows($kol);                         

    $track_ia = mysqli_query($link_yics ,"SELECT
    tracking_ia.id_prog AS id_prog, 
    tracking_ia.approval AS id_approval,                                                                
    progress.step AS step,
    progress.nama_progress AS progress,
    approval.approval AS approval
    FROM tracking_ia   
    LEFT JOIN 
    
        ( SELECT  
        progress.step, 
        progress.id_prog,
         progress.nama_progress AS nama_progress 
        FROM progress 
        JOIN tracking_ia ON tracking_ia.id_prog = progress.id_prog 
        WHERE tracking_ia.id_ia = '$data[id_ia]'
        ORDER BY progress.step DESC) progress 
    ON tracking_ia.id_prog = progress.id_prog  
    LEFT JOIN approval ON tracking_ia.approval = approval.id_approval
    WHERE tracking_ia.id_ia = '$data[id_ia]' ORDER BY progress.step DESC LIMIT 6") or die (mysqli_error($link_yics));
    
    if(mysqli_num_rows($track_ia)>0){
        $data_track = mysqli_fetch_assoc($track_ia); 
        // mencatak angka persenan
        
        $persen = ($data_track['id_approval'] == 1 )?(ceil(($data_track['step']/$kolom)*100)):100;
        if($data_track['id_approval'] == 1 ){
            $text_progress = $persen."%";
            $color_progress = "progress-bar-info";
        }else{
            $text_progress = "STOP";
            $color_progress = "progress-bar-danger";
        }
        ?>
                                                                <span
                                                                    class=" badge badge-round badge-success badge-lg"><?=$data_track['progress']?></span>
                                                                <?php 
        }else{
            $persen = 0;
            $color_progress = "";
            $text_progress = "0%";
        }

          
    $alasan=mysqli_query($link_yics,"SELECT * FROM notif_ia_rjct 
    JOIN ia ON notif_ia_rjct.id_ia = ia.id_ia
    WHERE notif_ia_rjct.id_ia = '$data[id_ia]' AND notif_ia_rjct.id_prop = '$id'  ")or die (mysqli_error($link_yics)); 
    if(mysqli_num_rows($alasan)>0){     
    $d_alsn=mysqli_fetch_assoc($alasan);
    $no_iaf=$d_alsn['ia'];
    $rea=$d_alsn['reason'];                                                                
 }else{
     $no_iaf="no ia anda";
    $rea="ditolak";
    
 }
        
        ?>

                                                            </td>



                                                            <td class="align-middle text-center <?= ($text_progress == "STOP")? "reason":""; ?>"
                                                                data-reason="<?=$rea?> " data-noia="<?=$no_iaf?>">
                                                                <div class="progress mt-20 text-center ">
                                                                    <div class="progress-bar progress-bar-striped  <?=$color_progress?> active"
                                                                        aria-valuenow="" aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                        style="width: <?=$persen?>%;"
                                                                        aria-valuemax="100" role="progressbar">
                                                                        <?=$text_progress?>
                                                                    </div>
                                                                </div>
                                                            </td>


                                                            <td>
                                                                <a href="Tracking.php?id_ia=<?= $data['id_ia'] ?>"
                                                                    class="<?= $tombol_hidup ?> btn btn-icon btn-info">

                                                                    <i class="icon wb-eye" aria-hidden="true"></i>

                                                                </a>

                                                                <?php if( $_SESSION['yics_level'] != "1"){ ?>

                                                                <a href="formupdate_ia.php?id_ia=<?= $data['id_ia'] ?>"
                                                                    class="<?= $tombol_hidup ?> btn btn-icon btn-success">

                                                                    <i class="icon wb-upload" aria-hidden="true"></i>

                                                                </a>

                                                                <a href="formeditia_ctrl.php?id_ia=<?= $data['id_ia']?>"
                                                                    class="<?= $tombol_hidup ?> btn btn-icon btn-warning">

                                                                    <i class="icon wb-edit" aria-hidden="true"></i>

                                                                </a>
                                                                <a href="../proses/ia/hapus_ia.php?del=<?= $data['id_ia']?>&page=<?= $data['id_dep']?>"
                                                                    class="<?= $tombol_hidup ?> HapusData btn btn-icon btn-danger">

                                                                    <i class="icon oi-trashcan" aria-hidden="true"></i>

                                                                </a>

                                                                <?php } ?>

                                                            </td>
                                                        </tr>
                                                        <?php 

$id_before = $data['id_prop'];
$nomor_urut_before = $nomor_urut;

}
}
?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal Tammbah Data Control  Table Body 1-->
                <!-- End Page -->

                <!-- Footer -->
                <?php
                include '../elemen/footer.php';?>

                <script>
                $(document).ready(function() {

                    var table = $('.tableproposal').DataTable({

                        scrollX: true,
                        paging: true,
                        ordering: false,
                        info: true,
                    });

                });
                </script>
                <!-- query java script hapus data -->
                <script>
                $(document).ready(function() {
                    $('.HapusData').click(function(a) {
                        a.preventDefault()
                        var getLink = $(this).attr('href');
                        console.log(getLink);
                        Swal.fire({
                            title: 'Apakah yakin?',
                            text: "Data ini akan dihapus selamanya!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = getLink;
                            }
                        })
                    })


                    $('.reason').click(function() {
                        var reason = $(this).attr('data-reason');
                        var noia = $(this).attr('data-noia');
                        Swal.fire({
                            title: '<strong></strong>' + noia,
                            icon: 'info',
                            html: '' + reason,
                            showCloseButton: true,
                            focusConfirm: false,
                            confirmButtonText: '<i">Laporan Diterima !!</i>',
                            cancelButtonAriaLabel: 'Close'
                        })
                    })
                })
                </script>