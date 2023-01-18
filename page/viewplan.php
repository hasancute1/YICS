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
                        <?php 
                  //ambil data di url
                  $id=$_GET ["ubah"];
                  //query data mahasiswa berdasarkan id menghasilkan array numeric
                 
                   
                        $proposal = mysqli_query($link_yics,"SELECT * FROM proposal 
                        join kategori_proposal  ON proposal.id_kat = kategori_proposal.id_kat
                        join data_user  ON data_user.username = proposal.username 
                        join area  ON data_user.id_area = area.id_area                                               
                        join depart  ON depart.id_dep = area.id_dep
                         WHERE id_prop='$id'")or die(mysqli_error($link_yics)); 
                        $rows_proposal = mysqli_fetch_assoc($proposal);
                        $proposal =  $rows_proposal['proposal'];
                        $kategori =  $rows_proposal['kategori'];
                        $cost =  $rows_proposal['cost'];
                        $depart =  $rows_proposal['depart'];
                        $id_dep =  $rows_proposal['id_dep'];
                 
                ?>

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
                                                                <h3> "<?= $proposal; ?>"</h3>
                                                            </td>
                                                            <td class="text-left" style="color:black;">
                                                                Departement</td>
                                                            <td> &nbsp;:&nbsp;</td>
                                                            <td><?= $depart; ?></td>
                                                        </tr>

                                                        <tr>

                                                            <td class="text-left" style="color:black;" width="200px">
                                                                Category
                                                            <td width="30px"> &nbsp;:&nbsp;</td>
                                                            <td><?= $kategori; ?></td>
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
                                        <div class="card-body">

                                            <div class="">

                                                <!-- Timeline -->
                                                <ul class="timeline timeline-icon">
                                                    <!-- // QUERY PROGRESS............................................ -->
                                                    <?php 
          $track_prop = mysqli_query($link_yics,"SELECT nama_progress, id_prog FROM progress WHERE id_ket='1' ")or die(mysqli_error($link_yics)); 
          if (mysqli_num_rows($track_prop)>0){
          $no=1;
          $array_selamat = array();
          while ($rows_track = mysqli_fetch_assoc($track_prop)){
				//  QUERY TRACKING_PROPOSAL................................
				$qry = "SELECT
					tracking_prop.id_prog AS id_prog, 
					tracking_prop.id_approval AS id_approval,
					`time`,
					data_user.nama AS pic
					FROM tracking_prop
					LEFT JOIN data_user
					ON tracking_prop.username = data_user.username
					WHERE id_prop = '$id' AND id_prog = '$rows_track[id_prog]' ";
				  $sql = mysqli_query($link_yics, $qry)or die (mysqli_error($link_yics));
				
				if(mysqli_num_rows($sql)>0){
					$data_tracking = mysqli_fetch_assoc($sql);
					array_push($array_selamat,$data_tracking['id_prog']);
					$approve = $data_tracking['id_approval'];
					$time= date("d M Y | H:i", strtotime($data_tracking['time'])); 
					$id_pic= $data_tracking ['pic'];
					$approve_clr = ($approve == '1')?"teal":(($approve == '0')?"red":"grey") ;
					$status = ($approve == '1')?"SUKSES":(($approve == '0')?"BERHENTI":"..") ;
					$icon = ($approve == '1')?"check":(($approve == '0')?"close":"..") ;
				}else {
					array_push($array_selamat,0);
					$approve = "...";
					$time= "...";
					$id_pic= "...";
					$approve_clr = ($approve == '1')?"teal":(($approve == '0')?"red":"grey") ;
					$status = ($approve == '1')?"SUKSES":(($approve == '0')?"BERHENTI":"..") ;
					$icon = ($approve == '1')?"check":(($approve == '0')?"close":"..") ;
				}	
				?>
                                                    <li
                                                        class="timeline-item <?php if ($no%2==0){ echo "timeline-reverse"; } else{ echo ""; } ?>">
                                                        <div class="timeline-content text-center">
                                                            <div class="card-block bg-<?=$approve_clr?>-300 p-20"
                                                                style="border-radius: 15px;height:140px;">
                                                                <h4 class="card-title">
                                                                    <?php echo $rows_track['nama_progress']; ?></h4>
                                                                <p class="card-text mb-10000">
                                                                    <i class="icon oi-calendar" aria-hidden="true"></i>
                                                                    &nbsp; <?=$time?>&nbsp;wib <br>
                                                                    <i class="icon wb-user" aria-hidden="true"></i>
                                                                    &nbsp;by <?=$id_pic?><br>
                                                                    <i class="icon wb-<?=$icon?>"
                                                                        aria-hidden="true"></i> &nbsp; <?=$status?>
                                                                </p>

                                                            </div>
                                                            <div class="timeline-dot bg-<?=$approve_clr?>-500">
                                                                <i class="icon wb-file" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php 
              $no++;
            }
			// print_r($array_selamat);
			// echo max($array_selamat);
			if(max($array_selamat) == 5 && $approve == 1){
				?>
                                                    <li class="timeline-period card-block bg-orange-300 mb-30"
                                                        style="border-radius: 15px; height:120px; color:black;">
                                                        <p>Selamat proposal sedang pembuatan NO.IA</p>
                                                        <p style="font-size:12px;">silahkan cek di control
                                                            table department masing-masing <a
                                                                href="controltabledep.php?dept=<?= $id_dep ?>">klik
                                                                disini</a></p>
                                                    </li>
                                                    <li class="timeline-item">
                                                        <div class="timeline-dot bg-orange-500">
                                                            <i class="icon fa-flag-checkered" aria-hidden="true"></i>
                                                        </div>
                                                    </li>
                                                    <?php
			}
		}
            ?>
                                                </ul>
                                                <!-- End Timeline -->
                                            </div>

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
include '../elemen/footer.php';?>