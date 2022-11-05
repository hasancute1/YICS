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

                    <!-- Page -->
                    <div class="page">
                        <div class="page-header">
                            <h1 class="page-title font-size-26 font-weight-600">Control Table <?= $judul[$id_dept] ?> (x
                                Million)
                            </h1>
                        </div>

                        <div class="page-content container-fluid">
                            <div class="row">
                                <div class="col-lg-6 col-md-6  mb-2">
                                    <?php 
           $alokasi = mysqli_query($link_yics, "SELECT * FROM time_fiscal WHERE status='aktif'") or die(mysqli_error($link_yics));
           $data = mysqli_fetch_assoc($alokasi);
           $_SESSION["periode"] =  $data["periode"];
            ?>
                                    <h6 class="font-size-18 font-weight-400">Periode ( <span
                                            style="color:red;"><?php echo $data['periode']; ?> </span> ) :
                                        <span style="color:red;"><?php echo date("d M Y", strtotime($data['awal'])); ?>
                                        </span>
                                        s.d
                                        <span style="color:red;"><?php echo date("d M Y", strtotime($data['akhir'])); ?>
                                        </span>

                                </div>
                                <div class="col-lg-6 col-md-6 mb-2">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon wb-calendar" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                                <input type="date" name="start" id="start_date"
                                                    class="form-control bg-transparent datepicker" value="">

                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-5">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">to</span>
                                                </div>
                                                <input type="date" name="start" id="start_date"
                                                    class="form-control bg-transparent datepicker" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-2 text-right">
                                            <a href="">
                                                <button type="submit" class="btn btn-primary btn-floating btn-sm "><i
                                                        aria-hidden="true"></i>GO</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="card card-shadow">
                                        <div class="card-header ">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="row">
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class=" card-body card-shadow table table-responsive table-bordered text-center 10px table-striped text-nowrap">
                                                <table class="table tableproposal table-hover">
                                                    <thead class="table-info">
                                                        <tr>
                                                            <th class="judul align-middle text-center export-col"
                                                                colspan="6">
                                                                INVESTMENT PLANNING CONTROL TABLE</th>

                                                            <th class="judul align-middle text-center export-col"
                                                                colspan="13">
                                                                IMPLEMENTATION CONTROL TABLE</th>
                                                            <th class="judul align-middle text-center table-danger noexportar"
                                                                rowspan="3">
                                                                ACTION
                                                            </th>

                                                        </tr>
                                                        <tr>
                                                            <th class="judul align-middle text-center" rowspan="2">NO
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
                                                            <th class="judul align-middle text-center" rowspan="2">
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
                                                    <tbody>

                                                        <!-- query proposal control table -->
                                                        <?php 

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
                                WHERE tracking_prop.id_approval  = '1' AND progress.step = '5' AND depart.id_dep='$id_dept'AND time_fiscal.status= 'aktif' "
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
                                    

                                    if($id_before == $data['id_prop']){
                                        $no_prop += 1;     
                                        $sembunyikan_nomor = "d-none";                                   
                                    }else{
                                        $no_prop = 1;
                                        $no++;
                                        $nomor_urut += 1;
                                        $sembunyikan_nomor = ""; 
                                        
                                    }

                                    // $id_before = $data['id_prop'];
                                    
                                    ?>

                                                        <tr
                                                            class="<?php if ($no%2==0){ echo "bg-blue-100"; } else{ echo ""; } ?> text-uppercase">
                                                            <td> <span class="<?= $sembunyikan_nomor ?>"><?= $nomor_urut ?></span> </td>
                                                            <td>
                                                                <?= ($no_prop == 1)? $data['depart']:""; ?></td>
                                                            <td>
                                                                <?= ($no_prop == 1)? $data['kategori']:""; ?></td>

                                                            <td><a
                                                                    href="formnambah_ia.php?add=<?php echo $data['id_prop']; ?>">
                                                                    <?= ($no_prop == 1)? $data['proposal']:""; ?></a>

                                                            </td>

                                                            <td>
                                                                <?php  $yen="¥"; ?>
                                                                <?= ($no_prop == 1)? $yen." ".number_format($data['cost']/$data['yen'], 2, ',', '.'):""; ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                  $Rp="Rp"; ?>

                                                                <?=($no_prop == 1)? $Rp." ".number_format ($data['cost'],0,',','.'): ""; ?>
                                                            </td>
                                                            <td><?= (isset($data['no_ia']))? $no_prop: ""; ?></td>
                                                            <td><?= $data['no_ia'] ?></td>
                                                            <td></td>
                                                            <td><?= $data['ia_deskripsi'] ?></td>
                                                            <td></td>
                                                            <td><?= (isset($data['no_ia']))?$Rp." ".number_format ($data['cost_ia'],0,',','.'): ""; ?>
                                                            </td>
                                                            <td></td>
                                                            <td><?= (isset($data['no_ia']))? $yen." ".number_format($data['cost_ia']/$data['yen'], 2, ',', '.'): ""; ?>
                                                            </td>
                                                            <td><?= (isset($data['no_ia']))? $Rp." ".number_format ($data['cost_ia'],0,',','.'): ""; ?>
                                                            </td>
                                                            <td><?= (isset($data['no_ia']))? $yen." ".number_format(($data['cost']/$data['yen'])-($data['cost_ia']/$data['yen']), 2, ',', '.'): ""; ?>
                                                            </td>
                                                            <td><?= (isset($data['no_ia']))? $Rp." ".number_format (($data['cost']-$data['cost_ia']),0,',','.'): ""; ?>
                                                            </td>

                                                            <td><?= (isset($data['no_ia']))?date("d M Y", strtotime($data['time_ia'])): "";  ?>
                                                            </td>
                                                            <td><?= (isset($data['no_ia']))?$data['pic_ia']: ""; ?></td>
                                                            <td>

                                                                <a href="Tracking.php?id_ia=<?= $data['id_ia'] ?>">
                                                                    <button type="button"
                                                                        class="btn btn-icon btn-info  ">
                                                                        <i class="icon wb-eye" aria-hidden="true"></i>
                                                                    </button>
                                                                </a>
                                                                <a href="formupdate_ia.php?id_ia=<?= $data['id_ia'] ?>">
                                                                    <button type="button"
                                                                        class="btn btn-icon btn-success">
                                                                        <i class="icon wb-upload"
                                                                            aria-hidden="true"></i>
                                                                    </button>
                                                                </a>

                                                                <a href="formedit_ia.php?id_ia=<?= $data['id_ia']?>">
                                                                    <button type="button"
                                                                        class="btn btn-icon btn-warning">
                                                                        <i class="icon wb-edit" aria-hidden="true"></i>
                                                                    </button>
                                                                </a>
                                                                <a href="../proses/dashboard/tambahplanning.php?del="
                                                                    data-toggle="tooltip" data-original-title="Hapus">
                                                                    <button type="button"
                                                                        class="btn btn-icon btn-danger">
                                                                        <i class="icon oi-trashcan"
                                                                            aria-hidden="true"></i>
                                                                    </button>
                                                                </a>
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
                        dom: 'Bfrtip',
                        buttons: [{
                                extend: 'excel',
                                title: 'CONTROL TABLE <?= $judul[$id_dept] ?> (x Million) PERIODE <?php echo $_SESSION["periode"]; ?>-<?php echo $_SESSION["periode"]+1; ?> ',
                                text: 'Excel',
                                orientation: 'landscape',
                                pageSize: 'LEGAL',
                                download: 'open',
                                exportOptions: {
                                    columns: ':not(.noexportar)'
                                },
                                customize: function(xlsx) {

                                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                                    $('row:first c', sheet).attr('s', '2');
                                    $('*c', sheet).attr('s', '25');

                                }
                            },
                            {
                                extend: "print",
                                exportOptions: {
                                    columns: ':not(.noexportar)',


                                },
                                title: 'CONTROL TABLE <?= $judul[$id_dept] ?> (x Million) PERIODE <?php echo $_SESSION["periode"]; ?>-<?php echo $_SESSION["periode"]+1; ?> ',
                                customize: function(win) {

                                    var last = null;
                                    var current = null;
                                    var bod = [];

                                    var css = '@page { size: landscape; }',
                                        head = win.document.head || win.document
                                        .getElementsByTagName('head')[0],
                                        style = win.document.createElement('style');

                                    style.type = 'text/css';
                                    style.media = 'print';

                                    if (style.styleSheet) {
                                        style.styleSheet.cssText = css;
                                    } else {
                                        style.appendChild(win.document.createTextNode(css));
                                    }

                                    head.appendChild(style);
                                }
                            },
                            {
                                extend: 'pdf',
                                title: 'CONTROL TABLE <?= $judul[$id_dept] ?> (x Million) PERIODE <?php echo $_SESSION["periode"]; ?>-<?php echo $_SESSION["periode"]+1; ?> ',
                                text: 'Pdf',
                                orientation: 'landscape',
                                pageSize: 'LEGAL',
                                download: 'open',
                                alignment: "center",
                                exportOptions: {
                                    columns: ':not(.noexportar)',
                                    orthogonal: "PDF",
                                    modifier: {
                                        order: 'index',
                                        page: 'current'
                                    }
                                },
                                customize: function(doc) {

                                    doc.styles.tableBodyEven.alignment = "center";
                                    doc.styles.tableBodyOdd.alignment = "center";
                                    doc.styles.tableFooter.alignment = "center";
                                    doc.styles.tableHeader.alignment = "center";
                                }
                            }
                        ],

                        scrollX: true
                    });

                });
                </script>