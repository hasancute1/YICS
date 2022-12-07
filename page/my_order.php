<!--header-->
<?php

include("../config/config.php");

// periksa apakah user sudah login, cek kehadiran session name
// jika tidak ada, redirect ke login.php
if (!isset($_SESSION['yics_user'])) {
  header('location: ../index.php');
}

// jika yang login general user


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
                            <h1 class="page-title font-size-26 font-weight-600">My Ordering</h1>
                        </div>
                        <div class="page-content container-fluid">
                            <div class="row">
                                <!-- First Row -->
                                <div class="col-lg-12 col-md-12">
                                    <div class="card card-shadow bg-white-100" style="border-radius: 10px;">
                                        <div class="card-body">
                                            <form autocomplete="off" method="get" action="" id="formulir">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2">
                                                        <?php 
                                                            $fiscal_aktif = single_query("SELECT * from time_fiscal WHERE status = 'AKTIF'");
                                                            $awalf = date("d M Y", strtotime($fiscal_aktif['awal']));
                                                            $akhirf = date("d M Y", strtotime($fiscal_aktif['akhir']));

                                                            $list_periode = query("SELECT * FROM time_fiscal GROUP BY periode");
                                                            ?>
                                                        <div class=" form-group">
                                                            <select class="form-control" name="periode" id="periode">
                                                                <option>Pilih Periode</option>
                                                                <?php foreach ($list_periode as $key => $row) { ?>
                                                                <option value="<?= $row['id_fis'] ?>"
                                                                    <?= ($row['id_fis'] == $fiscal_aktif['id_fis'])?'selected':'' ?>>
                                                                    <?= $row['periode'] ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <h6 class="font-size-18 font-weight-400">Periode ( <span
                                                            style="color:red;"><?= $fiscal_aktif['periode']; ?> </span>
                                                        ) :
                                                        <span style="color:red;"><?= $awalf; ?></span>
                                                        s.d
                                                        <span style="color:red;"><?= $akhirf; ?>
                                                        </span>
                                                    </h6>
                                                </div>
                                            </div>
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
                            proposal.benefit AS benefit,
                            proposal.lampiran AS lampiran,
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
                            
                            WHERE time_fiscal.status= 'aktif' AND proposal.username= {$_SESSION['yics_user']} GROUP BY proposal.proposal ASC")or die (mysqli_error($link_yics));
                             $no=1;
                            if(mysqli_num_rows($proposal)>0){
                            while($data = mysqli_fetch_assoc($proposal)){?>

                                            <br>
                                            <div class="garis">
                                                <div class="table-responsive">
                                                    <table class="table  text-uppercase " style="border-spacing: 15px;">
                                                        <tr>
                                                            <td class="judul align-middle text-left " width="100px">
                                                                Departement
                                                            </td>
                                                            <td class="judul align-middle text-left " width="5px">
                                                                &nbsp;:&nbsp;
                                                            </td>
                                                            <td class="judul align-middle text-left " width="700px">
                                                                <?php echo $data['depart']; ?>
                                                            </td>

                                                            <td class="judul align-middle text-center bg-yellow-100"
                                                                width="200px">
                                                                <!-- query update progress -->
                                                                <?php   
                              $track_prop = mysqli_query($link_yics ,"SELECT
                              tracking_prop.id_prog AS id_prog, 
                              tracking_prop.id_approval AS id_approval,
                              `time`,
                              progress.step AS step,
                              progress.nama_progress AS progress,
                              approval.approval AS approval
                              FROM tracking_prop   
                              LEFT JOIN 
							  
								( SELECT  progress.step, progress.id_prog, progress.nama_progress AS nama_progress 
								FROM progress JOIN tracking_prop ON tracking_prop.id_prog = progress.id_prog 
								WHERE tracking_prop.id_prop = '$data[id_prop]'
								ORDER BY progress.step DESC) progress 
                              ON tracking_prop.id_prog = progress.id_prog  
                              LEFT JOIN approval ON tracking_prop.id_approval = approval.id_approval
                              WHERE tracking_prop.id_prop = '$data[id_prop]' ORDER BY progress.step DESC LIMIT 1") or die (mysqli_error($link_yics));
							  
                              if(mysqli_num_rows($track_prop)>0){
                                $data_track = mysqli_fetch_assoc($track_prop); 
                                  // mencatak angka persenan
                                  $persen = ($data_track['id_approval'] == 1 )?(($data_track['step']/5)*100):100;
                                  if($data_track['id_approval'] == 1 ){
                                    $text_progress = $persen."%";
                                    $color_progress = "progress-bar-info";
                                  }else{
                                    $text_progress = "STOP";
                                    $color_progress = "progress-bar-danger";
                                  }
                                ?>
                                                                <?=$data_track['progress']?>
                                                                <?php 
                              }else{
								$persen = 0;
								$color_progress = "";
								$text_progress = "0%";
							  }
                              ?>
                                                            </td>



                                                        </tr>
                                                        <tr>
                                                            <td class="judul align-middle text-left " width="100px">
                                                                Category
                                                            </td>
                                                            <td> &nbsp;:&nbsp;</td>
                                                            <td class="judul align-middle text-left ">
                                                                <?php echo $data['kategori']; ?>
                                                            </td>
                                                            </td>
                                                            <td class="judul align-middle text-center font-size-60 bg-green-100"
                                                                rowspan="3">
                                                                <?=  $text_progress; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="judul align-middle text-left " width="100px">
                                                                Proposal
                                                            </td>
                                                            <td> &nbsp;:&nbsp;</td>
                                                            <td><?php echo $data['proposal']; ?> <a
                                                                    href="../image/uploads/<?= $data['lampiran'] ?>"
                                                                    target="_blank">

                                                                    <i class="icon fa-file-pdf-o font-size-25"></i></a>
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td class="text-left" style="color:black;" width="10px">
                                                                Cost</td>
                                                            <td> &nbsp;:&nbsp;</td>
                                                            <td class="judul align-middle text-left ">
                                                                Rp
                                                                <?= number_format ($data['cost'],0,',','.')." "."Million"; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left" style="color:black;" width="10px">
                                                                Benefit</td>
                                                            <td> &nbsp;:&nbsp;</td>
                                                            <td class="judul align-middle text-left ">
                                                                <?= $data['benefit']; ?>
                                                            </td>
                                                            <td class="judul align-middle text-center bg-blue-100 "><a
                                                                    href="viewplan.php?ubah=<?php echo $data['id_prop']; ?>">VIEW
                                                                    >></a>

                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="7">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="row text-center">
                                                    <div class="col-lg-12 col-md-12">
                                                        <!-- <button type="button"
                                                        class="btn btn-outline btn-default icon ti-angle-double-down font-size-30  my--30 "
                                                        data-toggle="dropdown" aria-expanded="false">
                                                    </button> -->
                                                        <div aria-labelledby="exampleBulletDropdown1">
                                                            <div class="row text-left">
                                                                <div class="col-lg-6 col-md-6">
                                                                    <h6 class="font-size-18 font-weight-400">List No IA.
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            <div class="table-responsive">
                                                                <table
                                                                    class="table table-striped table-hover table-bordered w-full display text-nowrap example0 text-uppercase"
                                                                    id="list-ia">
                                                                    <thead class="text-center">
                                                                        <tr class="bg-info align-middle">
                                                                            <th hidden>id ia</th>
                                                                            <th class="align-middle text-center">NO</th>
                                                                            <th class="align-middle text-center">NO IA
                                                                            </th>
                                                                            <th class="align-middle text-center">
                                                                                DESKRIPSI</th>
                                                                            <th class="align-middle text-center">COST IA
                                                                            </th>
                                                                            <th class="align-middle text-center">VALID
                                                                                UNTIL
                                                                            </th>
                                                                            <th class="align-middle text-center">CT
                                                                                UPDATE</th>
                                                                            <th class="align-middle text-center">
                                                                                STATUS</th>
                                                                            <th class="align-middle text-center">
                                                                                PROGRESS</th>
                                                                            <th class=" align-middle text-center">LACAK
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>


                                                                        <tr>
                                                                            <td class=" align-middle text-center"
                                                                                hidden>
                                                                                <?= $data['id_ia'] ?>
                                                                            </td>
                                                                            <td class=" align-middle text-center">
                                                                                <?= $no; ?>
                                                                            </td>
                                                                            <td class=" align-middle text-center">
                                                                                <?= $data['no_ia'] ?>
                                                                            </td>
                                                                            <td class=" align-middle text-center">

                                                                                <?= $data['ia_deskripsi'] ?>
                                                                            </td>
                                                                            <td class=" align-middle text-center">RP
                                                                                <?= number_format ($data['cost_ia'],0,',','.')." "."Million"; ?>
                                                                            </td>
                                                                            <td class=" align-middle text-center">
                                                                                <?= date("d M Y", strtotime($data['time_ia'])); ?>
                                                                            </td>
                                                                            <td class=" align-middle text-center">
                                                                                <?= $data['pic_ia']; ?>
                                                                            </td>
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
                                                                
                                                                    ( SELECT  progress.step, progress.id_prog, progress.nama_progress AS nama_progress 
                                                                    FROM progress JOIN tracking_ia ON tracking_ia.id_prog = progress.id_prog 
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
                                                                    ?> <td>
                                                                                <span
                                                                                    class=" badge badge-round badge-success badge-lg"><?=$data_track['progress']?></span>
                                                                                <?php 
                                                                    }else{
                                                                        $persen = 0;
                                                                        $color_progress = "";
                                                                        $text_progress = "0%";
                                                                    }
                                                                    ?>

                                                                            </td>
                                                                            <td class=" align-middle text-center">
                                                                                <div
                                                                                    class="progress mt-20 text-center ">
                                                                                    <div class="progress-bar progress-bar-striped  <?=$color_progress?> active"
                                                                                        aria-valuenow=""
                                                                                        aria-valuemin="0"
                                                                                        aria-valuemax="100"
                                                                                        style="width: <?=$persen?>%;"
                                                                                        aria-valuemax="100"
                                                                                        role="progressbar">
                                                                                        <?=$text_progress?>
                                                                                    </div>
                                                                                </div>
                                                                            </td>

                                                                            <td class=" align-middle text-center">
                                                                                <a href="Tracking.php?id_ia=<?= $data['id_ia'] ?>"
                                                                                    class="<?= $tombol_hidup ?>">
                                                                                    <button type="button"
                                                                                        class="btn btn-icon btn-info">
                                                                                        <i class="icon wb-eye"
                                                                                            aria-hidden="true"></i>
                                                                                    </button>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php 
                                            }
                                        } 
                                        ?>

                                        </div>
                                    </div>
                                </div>
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
    <?php include '../elemen/footer.php';?>

    <script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            type: 'POST',
            url: "../proses/Search/depart.php",
            cache: false,
            success: function(msg) {
                $("#depart").html(msg);
            }
        });


        $("#depart").change(function() {
            var depart = $("#depart").val();
            console.log(depart);
            $.ajax({
                type: 'POST',
                url: "../proses/Search/cost_type.php",
                data: {
                    depart: depart
                },
                cache: false,
                success: function(msg) {
                    $("#cost_type").html(msg);
                }
            });
        });

        $("#cost_type").change(function() {
            var data_formulir = $('#formulir').serialize();

            $.ajax({
                type: 'GET',
                url: "../proses/Search/get_proposal.php",
                data: data_formulir,
                cache: false,
                success: function(msg) {
                    $("#proposal").html(msg);
                }
            });

            $.ajax({
                type: 'GET',
                url: "../proses/Search/get_ia.php",
                data: data_formulir,
                cache: false,
                success: function(msg) {
                    $("#ia_selected").html(msg);
                }
            });



        });


        $("#proposal").change(function() {

            var data_formulir = $('#formulir').serialize();

            $.ajax({
                type: 'GET',
                url: "../proses/Search/get_ia.php",
                data: data_formulir,
                cache: false,
                success: function(msg) {
                    $("#ia_selected").html(msg);
                }
            });



        });


        $('#search').click(function(event) {
            event.preventDefault();
            var ia_selected = $('#ia_selected').val();

            $.ajax({
                type: 'GET',
                url: "../proses/Search/tracking_ia.php",
                data: {
                    id_ia: ia_selected
                },
                cache: false,
                success: function(msg) {
                    $("#tracking-ia").html(msg);
                }
            });


        });


    });
    </script>