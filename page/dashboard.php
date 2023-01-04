<!--header-->
<?php
include("../config/config.php");

include("../proses/services/notifications.php");

if (!isset($_SESSION['yics_user'])) {
  header('location: ../index.php');
}
?>
<?php include '../elemen/header.php';?>



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
                <?php 
                include '../elemen/navbarleft.php';
                ?>
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
                        $data_fiscal = single_query("SELECT id_fis,awal from time_fiscal where status='aktif'");
                        $id_fis = $data_fiscal['id_fis'];
                        $awal_fiscal = $data_fiscal['awal'];
                    ?>

                    <!-- Page -->
                    <div class="page">
                        <div class="page-header">
                            <h1 class="page-title font-size-26 font-weight-600">Budget Body Division Overview (x
                                Million)</h1>
                        </div>

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
                                            <div class="col-lg-5 col-md-5">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon wb-calendar" aria-hidden="true"></i>
                                                        </span>
                                                    </div>
                                                    <input type="date" name="start" id="start_date"
                                                        class="form-control bg-transparent datepicker"
                                                        value="<?= (isset($_GET['start']))? $_GET['start']:date('Y-m-d' , strtotime($awal_fiscal)); ?>"
                                                        min="<?= $awa; ?>" max="<?= $akhr; ?>">

                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">to</span>
                                                    </div>
                                                    <input type="date" name="end" id="end_date"
                                                        class="form-control bg-transparent datepicker"
                                                        value="<?= (isset($_GET['end']))? $_GET['end']:date('Y-m-d'); ?>"
                                                        min="<?= $awa; ?>" max="<?= $akhr; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-right">
                                                <button type="submit" class="btn btn-primary btn-floating btn-sm "><i
                                                        aria-hidden="true"></i>GO</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                                <!-- First Row -->
                                <div class="col-lg-4">
                                    <div class="card card-shadow">
                                        <div class="card-header card-header-transparent bg-dark">
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8">
                                                    <div class="float-left">
                                                        <span class="font-size-20 bold">Allocation Budget</span>
                                                    </div>
                                                </div>
                                                <?php if($_SESSION['yics_level'] == '2'){ ?>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="text-right">
                                                        <!-- <i href="" data-toggle="tooltip"
                                                            data-original-title="Tambah Data">
                                                            <button type="button" id="TambahAlokasiBudget"
                                                                class="btn btn-icon btn-outline btn-info btn-xs"
                                                                data-toggle="modal" data-target="#ModalAlokasiBudget">
                                                                <i class="icon wb-plus" aria-hidden="true"></i>
                                                            </button>
                                                        </i> -->

                                                        <!--query edit data  -->
                                                        <?php 
                                                        $editalokasi = mysqli_query($link_yics, "SELECT * FROM time_fiscal WHERE status='aktif'") or die(mysqli_error($link_yics));
                                                        if(mysqli_num_rows($editalokasi)>0){$rows_editalokasi = mysqli_fetch_assoc($editalokasi)?>
                                                        <a href="forminputalokasibudget.php?input=<?php echo $rows_editalokasi['id_fis']; ?>"
                                                            data-toggle="tooltip" data-original-title="Edit">
                                                            <button type="button"
                                                                class="btn btn-info btn-icon btn-outline btn-xs">
                                                                <i class="icon wb-plus" aria-hidden="true"></i>
                                                            </button>
                                                        </a>
                                                        <!-- end query edit data  -->
                                                    </div>
                                                </div>
                                                <?php
                                                 }
                                            } ?>
                                            </div>
                                        </div>
                                        <div class="card-body card-shadow">
                                            <div id="graph" style="height: 350px;"></div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8">
                                    <div class="card card-shadow">
                                        <div class="card-header card-header-transparent bg-dark">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="float-left">
                                                        <span class="font-size-20 bold">Consumtion Budget Yearly
                                                            Investmment</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body  card-shadow">
                                            <canvas id="myBar2" height="47" width="100%"></canvas>
                                        </div>

                                    </div>

                                </div>
                                <!-- End First Row -->
                                <!-- Second Row -->

                                <?php 

                                     if(isset($_GET['start']) || isset($_GET['end']) ){

                                        $where_time = "AND time_ia > '{$_GET['start']}' AND time_ia <= '{$_GET['end']}' ";

                                     }else{

                                        $where_time = "";
                                     }

                                   

                                    // $depart = query("SELECT * FROM view_alokasi_budget WHERE status= 'aktif'");
                                    $depart = query("SELECT * FROM budget JOIN depart on budget.id_dep = depart.id_dep where id_fis={$id_fis}");        

                                    $consumtion_budget = query("SELECT depart.id_dep , sum(cost_ia) as cost FROM ia
                                        join plan_proposal on ia.id_prop = plan_proposal.id_prop
                                        join depart on plan_proposal.id_dep = depart.id_dep
                                        where plan_proposal.id_fis={$id_fis} {$where_time}
                                        group by depart
                                    ");  

                                    $total_consumtion_budget = 0;

                                    foreach($consumtion_budget as $row){

                                        $total_consumtion_budget += $row['cost'];
                                    }                                    

                                ?>

                                <div class="col-lg-3 col-md-6 info-panel">
                                    <div class="card card-shadow">
                                        <div class="card-block bg-blue-800 p-20"
                                            style="border-radius: 15px;height:180px;">
                                            <button type="button" class="btn btn-floating btn-sm btn-success">
                                                <i class="icon wb-payment"></i>
                                            </button>
                                            <?php 
                                                $card1 = mysqli_query($link_yics, "SELECT * FROM division") or die (mysqli_error($link_yics));
                                                $row_card1 = mysqli_fetch_assoc($card1);

                                                $card=mysqli_fetch_array(mysqli_query($link_yics,"SELECT sum(budget) 
                                                        AS total FROM view_alokasi_budget WHERE status='aktif'")) or die (mysqli_error($link_yics));
                                                

                                                // ------------------------------------------akumulasi budget yang direject----------------------------

$budget_reject = mysqli_query($link_yics ,"SELECT sum(ia.cost_ia) AS cost_rjct FROM tracking_ia
join ia on tracking_ia.id_ia = ia.id_ia
join plan_proposal on ia.id_prop = plan_proposal.id_prop
join depart on plan_proposal.id_dep = depart.id_dep                                           
where  plan_proposal.id_fis={$id_fis}
 and approval = '0' GROUP BY approval = '0'")
or die (mysqli_error($link_yics));                 
if(mysqli_num_rows($budget_reject)>0){
    $budget_reject1 = mysqli_fetch_assoc($budget_reject);
    if(isset($budget_reject1['cost_rjct'])){
       $brjct =$budget_reject1['cost_rjct'];
   }else{
       $brjct=0;
     }                       
 }else{
   $brjct=0;
 }



                                                ?>
                                            <span
                                                class="white font-weight-400"><?php echo $row_card1 ['divisi']; ?></span>
                                            <div class=" white content-text text-center mb-0">
                                                <span>
                                                    <p class="font-size-30 font-weight-100 mt-10"> IDR
                                                        <?= number_format(($card['total'] -  $total_consumtion_budget)+$brjct,2,',','.')." "."Million"; ?>
                                                    </p>
                                                    <p class="white font-weight-100 m-0 font-size-20"><u>"Budget IDR
                                                            <?php echo number_format ($card['total'],2,',','.')." "."Million";  ?>"</u>
                                                    </p>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php                
                      
                    
                    if(count( $depart)>0){
                        $i = 1;
                        foreach( $depart as $row_card){?>

                                <div class="col-lg-3 col-md-6 info-panel">
                                    <a href="budgetdep.php?dep=<?= $row_card['id_dep'] ?>">
                                        <div class="card card-shadow">
                                            <div class="card-block warnadep<?=$i?>"
                                                style="border-radius: 15px;height:180px;">
                                                <button type="button" class="btn btn-floating btn-sm btn-success">
                                                    <i class="icon fa-dollar"></i>
                                                </button>
                                                <span
                                                    class="white font-weight-400 "><?php echo $row_card['depart']; ?></span>
                                                <?php 

// ------------------------------------------akumulasi budget yang direject----------------------------

$budget_reject = mysqli_query($link_yics ,"SELECT sum(ia.cost_ia) AS cost_rjct FROM tracking_ia
join ia on tracking_ia.id_ia = ia.id_ia
join plan_proposal on ia.id_prop = plan_proposal.id_prop
join depart on plan_proposal.id_dep = depart.id_dep                                           
where plan_proposal.id_dep = {$row_card['id_dep']} and plan_proposal.id_fis={$id_fis}
 and approval = '0' GROUP BY approval = '0'")
or die (mysqli_error($link_yics));                 
if(mysqli_num_rows($budget_reject)>0){
    $budget_reject1 = mysqli_fetch_assoc($budget_reject);
    if(isset($budget_reject1['cost_rjct'])){
       $brjct =$budget_reject1['cost_rjct'];
   }else{
       $brjct=0;
     }                       
 }else{
   $brjct=0;
 }



                                                $consumtion_budget = single_query("SELECT sum(cost_ia) as cost , count(*) as qty FROM ia
                                                join plan_proposal on ia.id_prop = plan_proposal.id_prop
                                                join depart on plan_proposal.id_dep = depart.id_dep
                                                where plan_proposal.id_dep = {$row_card['id_dep']} and plan_proposal.id_fis={$id_fis} {$where_time}
                                                ");
                                                $sisa_budget = ($row_card['budget'] - $consumtion_budget['cost']    )+$brjct; ?>
                                                <div class="content-text text-center mb-0">
                                                    <span>
                                                        <p class="white font-size-30 font-weight-100 mt-10">
                                                            IDR <?= number_format($sisa_budget,2,',','.')." "; ?>Million
                                                        </p>
                                                        <p class="white font-weight-100 m-0 font-size-18">"Budget IDR
                                                            <?php echo number_format ($row_card['budget'],2,',','.')." "; ?>Million"
                                                        </p>
                                                        <p class="white font-weight-100 m-0"> Lihat Detail >></p>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php  
                            $i++;
                        }
                    } 
                ?>
                                <!-- End Second Row -->
                                <!-- Third Row -->
                                <!-- Third Left -->
                                <div class="col-lg-12 col-md-12">
                                    <div class="card card-shadow">
                                        <div class="card-header card-header-transparent bg-dark">
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8">
                                                    <div class="float-left">
                                                        <span class="font-size-20 bold">Planning Proposal</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 ">
                                                    <?php 
                                                    $SessionArea= $_SESSION['area'];
                                                    $proposal = mysqli_query($link_yics ,
                                                    "SELECT * FROM plan_proposal 
                                                    JOIN depart ON plan_proposal.id_dep = depart.id_dep
                                                    JOIN kategori_proposal  ON plan_proposal.id_kat = kategori_proposal.id_kat
                                                    JOIN time_fiscal  ON plan_proposal.id_fis = time_fiscal.id_fis                             
                                                    JOIN data_user  ON data_user.area = plan_proposal.area                          
                                                    WHERE time_fiscal.id_fis = '$id_fis' AND plan_proposal.area= '$SessionArea'")or die (mysqli_error($link_yics));
                                                    if(mysqli_num_rows($proposal)>0){?>
                                                    <div class="float-right">
                                                        <i href="" data-toggle="tooltip"
                                                            data-original-title="Tambah Data">
                                                            <button type="button"
                                                                class="btn btn-icon btn-info btn-xs btn-outline"
                                                                data-toggle="modal"
                                                                data-target="#TambahPlaningProposal">
                                                                <i class="icon wb-plus" aria-hidden="true"></i></button>
                                                        </i>
                                                    </div>
                                                    <?php 
                                                    } else{?>
                                                    <div class="float-right">
                                                        <button type="button" onclick="submitResult(event)"
                                                            class="btn btn-icon btn-info btn-xs btn-outline">
                                                            <i class="icon wb-plus" aria-hidden="true"></i></button>
                                                    </div>
                                                    <?php  }  ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="card-body card-shadow table-responsive table-hover table-bordered text-nowrap">
                                            <table class="table   w-full display  example0">
                                                <thead class="text-center">
                                                    <tr class="bg-info align-" height="10px">
                                                        <th class="align-middle text-center" hidden>ID DEP
                                                        </th>
                                                        <th class="align-middle text-center">N0
                                                        </th>
                                                        <th class="align-middle text-center">
                                                            DEPART.</th>
                                                        <th class="align-middle text-center">
                                                            CATEGORY</th>
                                                        <th class="align-middle text-center">
                                                            PROPOSAL</th>
                                                        <th class="align-middle text-center">
                                                            STATUS</th>
                                                        <th class="align-middle text-center">
                                                            PROGRESS</th>
                                                        <th class="align-middle text-center">
                                                            ACTION</th>

                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <!-- query untuk memunculkan kolom proposal -->
                                                    <?php 


                            // jika data di filter tanggal

                            // if(isset($_GET['start']) || isset($_GET['end']) ){

                            //     $where_time_prop = "AND time_ia > '{$_GET['start']}' AND time_ia <= '{$_GET['end']}' ";

                            //  }else{

                            //     $where_time_prop = "";
                            //  }


                         
                       
                            // jika yang login general admin
                            $proposal = mysqli_query($link_yics ,"SELECT id_prop,
                            depart.id_dep AS id_dep,
                            depart.depart AS depart,
                            kategori_proposal.kategori AS kategori,
                            time_fiscal.status,
                            proposal.proposal AS proposal,
                            proposal.lampiran
                            FROM proposal 
                            LEFT JOIN depart ON proposal.id_dep = depart.id_dep
                            LEFT JOIN kategori_proposal  ON proposal.id_kat = kategori_proposal.id_kat
                            LEFT JOIN time_fiscal  ON proposal.id_fis = time_fiscal.id_fis  
                            WHERE time_fiscal.status= 'aktif' ORDER BY depart.id_dep ASC")or die (mysqli_error($link_yics));
                            $no=1;

                         



						  // untuk memvalidasi apakah ada datanya
                          if(mysqli_num_rows($proposal)>0){
                           while($data = mysqli_fetch_assoc($proposal)){?>
                                                    <tr
                                                        class="align-middle text-center <?php if ($no%2==0){ echo "bg-blue-100"; } else{ echo ""; } ?>">

                                                        <td class="align-middle text-center" hidden>
                                                            <?php echo $data['id_dep']; ?></td>
                                                        <td class="align-middle text-center"><?php echo $no; ?></td>
                                                        <td class="align-middle text-center">
                                                            <?php echo $data['depart']; ?>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <?php echo $data['kategori']; ?></td>
                                                        <td class="align-middle text-center text-uppercase">
                                                            <?php if($data['lampiran']){ ?>
                                                            <a href="../image/uploads/<?= $data['lampiran'] ?>"
                                                                target="_blank">
                                                                <?php echo $data['proposal']; ?>
                                                            </a>

                                                            <?php

                                                             }else{ 
                                                                echo $data['proposal']; 
                                                            } 
                                                            
                                                            ?>

                                                        </td>
                                                        <td class="align-middle text-center">
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

                                                        <td class="align-middle text-center">

                                                            <div class="progress mt-20 text-center ">
                                                                <div class="progress-bar progress-bar-striped  <?=$color_progress?> active"
                                                                    aria-valuenow="" aria-valuemin="0"
                                                                    aria-valuemax="100" style="width: <?=$persen?>%;"
                                                                    aria-valuemax="100" role="progressbar">
                                                                    <?=$text_progress?>
                                                                </div>
                                                            </div>
                                                            <?php
							
							?>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <a href="viewplan.php?ubah=<?php echo $data['id_prop']; ?>">
                                                                <button type="button" class="btn btn-icon btn-info  ">
                                                                    <i class="icon wb-eye" aria-hidden="true"></i>
                                                                </button>
                                                            </a>
                                                            <?php if($_SESSION['yics_level'] == '2'){ ?>
                                                            <a
                                                                href="formupdate.php?ubah=<?php echo $data['id_prop']; ?>">
                                                                <button type="button"
                                                                    class="btn btn-icon btn-success edit_proposal"
                                                                    data-toggle="modal"
                                                                    data-target="#EditPlaningProposal2">
                                                                    <i class="icon wb-upload" aria-hidden="true"></i>
                                                                </button>
                                                            </a>

                                                            <a href="formedit.php?edit=<?php echo $data['id_prop']; ?>">
                                                                <button type="button"
                                                                    class="btn btn-icon btn-warning  edit_proposal"
                                                                    data-toggle="modal" data-target="#">
                                                                    <i class="icon wb-edit" aria-hidden="true"></i>
                                                                </button>
                                                            </a>

                                                            <a href="../proses/dashboard/tambahplanning.php?del=<?php echo $data['id_prop']; ?>"
                                                                class="HapusData1">
                                                                <button type="button" class="btn btn-icon btn-danger">
                                                                    <i class="icon oi-trashcan" aria-hidden="true"></i>
                                                                </button>
                                                            </a>
                                                            <?php } ?>

                                                        </td>


                                                        <?php $no++; }
                          } ?>
                                                    </tr>

                                                </tbody>
                                            </table>
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
    <div id="dataTabel"></div>
    <div id="dataTabel2"></div>
    <div id="notifprop"></div>
    <div id="notifedit"></div>


    <!-- Footer -->
    <?php
include '../elemen/footer.php';?>

    <!-- #################################################################################### -->
    <script src="caripp.js"> </script>



    <?php 
    // <!-- GRAFIK Consumtion Budget Yearly Investmment############################################################################## -->

    // alokasi budget
    $query_budget = mysqli_query($link_yics, "SELECT sum(budget) as budget FROM view_alokasi_budget WHERE status='aktif'") or die(mysqli_error($link_yics));

    $get_data_budget = mysqli_fetch_assoc($query_budget);
    $batas_bugdet_bulanan = $get_data_budget['budget'];     

    if(mysqli_num_rows($query_budget)>0){

        for ($i=0; $i <= 12; $i++) { 
            $array_alokasi_budget[] = intval( $batas_bugdet_bulanan); 
        }
       
        $alokasi_budget = json_encode($array_alokasi_budget);
    }

    $fis_aktif = single_query("SELECT id_fis FROM time_fiscal WHERE status='aktif'");

    // Grafik Akumulasi Budget
    // ambil dari table ia
    $query_akumulasi = query("SELECT 
        MONTH(ia.time_ia) AS bulan, 
        SUM(ia.cost_ia) AS cost,
        MAX(ia.time_ia) AS max_date
        FROM ia 
        JOIN plan_proposal on ia.id_prop = plan_proposal.id_prop 
        AND plan_proposal.id_fis = '".$fis_aktif['id_fis']."' 
        GROUP BY  bulan
        ");

    $query_bulan_terakhir = single_query("SELECT MAX(ia.time_ia) as max_date
    FROM ia 
    JOIN plan_proposal on ia.id_prop = plan_proposal.id_prop 
    AND plan_proposal.id_fis = '".$fis_aktif['id_fis']."'");

    if(isset($query_akumulasi[0])){        
        $max_month = date('m' , strtotime($query_bulan_terakhir['max_date']) );
    }else{
        $max_month = 4;
    }



    // var_dump($max_month);

 
    foreach($query_akumulasi as $row){
        $query_akum_array[$row['bulan']] = $row['cost']; 
        // $list_bulan_aktif[] = $row['bulan']; 
    }

    // $list_bulan = [4,5,6,7,8,9,10,11,12,1,2,3];

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


    // $last_data_query = end($query_akumulasi);
    // $bulan_terkahir = $last_data_query['bulan'];


    if(count($query_akumulasi)>0){

        $total = 0;

        foreach ($list_bulan as $bulan => $key) { 

            if(isset($query_akum_array[$bulan])){
                $total += $query_akum_array[$bulan];
            }else{
                $total += 0;
            }
            
            $data_comsumtion_budget[] = $total; 

            if($bulan == $max_month ){
                break;
            }
            
        }
    
        $comsumtion_budget = json_encode($data_comsumtion_budget);
    } 
    
  ?>


    <!-- // javascript grfaik bar ########################-->
    <script>
    var ctx = document.getElementById("myBar2").getContext('2d');
    var myBar2 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Aprl", "Mei", "Jun", "July", "Agst", "Sept", "Oct", "Nov", "Dec", "Jan", "Feb",
                "March"
            ],
            datasets: [{
                    type: 'line',
                    label: "AKUMULASI KONSUMSI",
                    borderColor: Config.colors("green", 800),
                    hoverBackgroundColor: Config.colors("green", 200),
                    data: <?php echo $comsumtion_budget; ?>,
                    order: 2,
                },
                {
                    type: 'line',
                    label: "BUDGET  BODY DIVISION",
                    borderColor: Config.colors("grey", 800),
                    data: <?= $alokasi_budget; ?>,
                    order: 1,
                },
                {
                    label: "BODY PLANT 1",
                    backgroundColor: "rgba(255, 206, 86, 0.2)",
                    borderColor: Config.colors("yellow", 800),
                    hoverBackgroundColor: "rgba(255, 206, 86, 0.2)",
                    borderWidth: 2,
                    data: <?= json_encode( get_comsumtion_budget(1) ) ?>
                },
                {
                    label: "BODY PLANT  2",
                    backgroundColor: "rgba(255, 99, 132, 0.2)",
                    borderColor: Config.colors("red", 800),
                    hoverBackgroundColor: "rgba(255, 99, 132, 0.2)",
                    borderWidth: 2,
                    data: <?= json_encode( get_comsumtion_budget(2) ) ?>
                },
                {
                    label: "BQC",
                    backgroundColor: "rgba(98, 168, 234, .2)",
                    borderColor: Config.colors("purple", 800),
                    hoverBackgroundColor: "rgba(98, 168, 234, .3)",
                    borderWidth: 2,
                    data: <?= json_encode( get_comsumtion_budget(3) ) ?>
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
            }
        }
    });
    </script>
    <!-- // javascript grfaik bar ########################-->

    <!-- // query grfaik donut morris ########################-->
    <?php 
    // <!-- GRAFIK DONUT SHIFT ############################################################################## -->
    $query_id_dept = mysqli_query($link_yics, "SELECT * FROM budget
    JOIN time_fiscal ON time_fiscal.id_fis = budget.id_fis
    JOIN depart ON depart.id_dep = budget.id_dep
     WHERE time_fiscal.status='aktif'") or die(mysqli_error($link_yics));
    if(mysqli_num_rows($query_id_dept)>0){
        while($rows_id_dept = mysqli_fetch_assoc($query_id_dept)){
            $bud_m=$rows_id_dept['budget'];
            $dep_m=$rows_id_dept['depart'];
            $array_donut_dept[] = array('label' => $dep_m, 'value' => $bud_m);             
        }
    }else{
        $bud_m=0;
        $dep_m="BUDGET";
        $array_donut_dept[] = array('label' => $dep_m, 'value' => $bud_m);  
    }

$json_morris = json_encode($array_donut_dept);
  ?>

    <!-- // javascript grfaik donut ########################-->
    <script>
    var data_graph = <?php echo $json_morris ; ?>
    //hharus ada spasi enter
    Morris.Donut({
        element: 'graph',
        redraw: true,
        resize: true,
        data: data_graph,
        colors: [Config.colors("yellow", 500), Config.colors("red", 500), Config.colors("purple", 500)],
        // formatter: function (x) { return x + "%"}
        formatter: function(y, data) {
            return 'IDR ' + y + ' Million'
        },
    })
    </script>

    <!-- Modal tambah data Alokasi Budget -->
    <div class="modal fade modal-info" id="ModalAlokasiBudget" aria-hidden="true" aria-labelledby="TambahAlokasiBudget"
        role="dialog" tabindex="-1">
        <div class="modal-dialog modal-simple modal-center modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h3 class="modal-title">Input Alokasi Budget</h3>
                </div>
                <div id="warningdata" class="alert alert-danger  fade show text-center d-none">
                    <label for="aa" style="cursor: pointer;"><b>Silahkan Lengkapi Data Sahabat !</b></label>
                    <button id="aa" name="aa" type="button" aria-hidden="true" class="close" data-dismiss="alert"
                        aria-label="Close">
                        <i class="nc-icon nc-simple-remove"></i>
                    </button>
                </div>
                <div class="row">
                </div>
                <div class="modal-body sum">
                    <form action="../proses/dashboard/alokasi.php" method="POST" id="tambahdata"
                        class="needs-validation ">
                        <input type="hidden" name="add">
                        <div class="form-group row">
                            <h4 class="col-md-12 modal-title text-left" style="color:black;">Tahun Fiscal</h4>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" style="color:black;">Periode tahun</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <?php 
                                                $tambahalok = mysqli_query($link_yics ,"SELECT id_fis,periode FROM time_fiscal WHERE status= 'aktif'")or die (mysqli_error($link_yics));
                                                $data = mysqli_fetch_assoc($tambahalok)
                                            ?>
                                    <input type="text" value="<?php echo $data['periode']; ?>" class="form-control"
                                        readonly>
                                    <input name="id_fis" type="text" value="<?php echo $data['id_fis']; ?>"
                                        class="form-control" readonly hidden>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <h4 class="col-md-12 modal-title text-left" style="color:black;">Budget Alokasi</h4>
                        </div>
                        <?php 
            $id_budget = mysqli_query($link_yics, "SELECT id_bud FROM view_alokasi_budget WHERE status='aktif'") or die (mysqli_error($link_yics));
            if(mysqli_num_rows( $id_budget)>0){
              $i = 1;
              while( $rows_budget = mysqli_fetch_assoc($id_budget)){?>
                        <input name="id_bud<?=$i?>" type="text" value="<?php echo $rows_budget['id_bud'] ?>" hidden>
                        <?php  
                $i++;               
                    }
                      }                                                
                    ?>
                        <?php 
            $depart = mysqli_query($link_yics, "SELECT * FROM depart") or die (mysqli_error($link_yics));
            if(mysqli_num_rows( $depart)>0){
              ?>
                        <input name="totalData" type="text" value="<?=mysqli_num_rows( $depart)?>" hidden>

                        <?php
              $i = 1;
              while( $rows_depart = mysqli_fetch_assoc($depart))
              {?>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label"
                                style="color:black;"><?php echo $rows_depart['depart'] ?></label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">IDR</span>
                                    </div>
                                    <input required name="budget<?=$i?>" type="text"
                                        id="<?php echo $rows_depart['depart']?>" class="form-control prc"
                                        placeholder="Isi Budget Dept...">

                                    <input required name="id_dept<?=$i?>" value="<?php echo $rows_depart['id_dep']?>"
                                        type="text" class=" form-control" hidden>
                                </div>
                            </div>
                        </div>
                        <?php
            $i++;
                }
            }                                                
     ?>
                        <hr>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" style="color:black;">Total Budget</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">IDR</span>
                                    </div>
                                    <span readonly type="text" id="result" class="form-control"
                                        placeholder="Total Budget Dept...">

                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" id="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal tambah data Alokasi Budget -->



    <?php 
$SessionArea= $_SESSION['area'];
$proposal = mysqli_query($link_yics ,
"SELECT * FROM plan_proposal 
JOIN depart ON plan_proposal.id_dep = depart.id_dep
JOIN kategori_proposal  ON plan_proposal.id_kat = kategori_proposal.id_kat
JOIN time_fiscal  ON plan_proposal.id_fis = time_fiscal.id_fis                             
JOIN data_user  ON data_user.area = plan_proposal.area                          
WHERE time_fiscal.id_fis = '$id_fis' AND plan_proposal.area= '$SessionArea'")or die (mysqli_error($link_yics));
if(mysqli_num_rows($proposal)>0){   
    } ?>


    <!-- Modal tambah plannning proposal -->
    <div class="modal fade modal-info " id="TambahPlaningProposal" aria-hidden="true"
        aria-labelledby="TambahPlaningProposal" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-simple modal-center modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h3 class="modal-title">Tambah Data Planning Proposal</h3>
                </div>
                <div class="row">
                </div>
                <div class="modal-body">
                    <form action="../proses/dashboard/tambahplanning.php" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="add">
                        <input name="mata_uang" type="number" value="1" class="form-control" hidden>
                        <div class="form-group row">
                            <h4 class="col-md-12 modal-title text-left" style="color:black;">SUBJECT</h4>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" style="color:black;">Periode tahun</label>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <select name="id_fis" class="form-control" required>
                                        <?php 
                                               foreach($proposal AS $a ){?>
                                        <option value="<?= $a['id_fis'] ?>"><?= $a['periode'] ?></option>)
                                        <?php }
                                                 ?>
                                    </select>
                                </div>




                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-left" style="color:black;">Department</label>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="depart" class="form-control" required>
                                        <option value="">Pilih Departement</option>
                                        <?php 
                                               foreach($proposal AS $a ){?>
                                        <option value="<?= $a['id_dep'] ?>"><?= $a['depart'] ?></option>)
                                        <?php }
                                                 ?>

                                    </select>
                                </div>
                            </div>
                            <label class="col-md-2 col-form-label text-left" style="color:black;">Category</label>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="kategori" type="text" class="form-control" required>
                                        <option value="">Pilih Category</option>
                                        <?php 
                                               foreach($proposal AS $a ){?>
                                        <option value="<?= $a['id_kat'] ?>"><?= $a['kategori'] ?></option>)
                                        <?php }
                                                 ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-left" style="color:black;">Proposal</label>
                            <div class="col-md-10">

                                <select type="text" class="form-control " name="proposal" required>
                                    <option value="">Pilih Proposal</option>
                                    <?php 
                                               foreach($proposal AS $a ){?>
                                    <option value="<?= $a['proposal'] ?>"><?= $a['proposal'] ?></option>)
                                    <?php }
                                                 ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" style="color:black;">Cost</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">IDR</span>
                                    </div>

                                    <input required name="cost" type="text" class="form-control" id="rupiah"
                                        placeholder="Isi Cost Proposal...">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text bg-yellow-100">MILLION</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" style="color:black;">Lampiran</label>

                            <div class="col-md-10 input-group">
                                <!-- <input class="form-control-file" type="file" name="lampiran" required> -->


                                <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                    <div class="input-group-append">
                                        <span class="btn btn-warning btn-file">
                                            <i class="icon fa-file-pdf-o" aria-hidden="true"></i>
                                            <input type="file" name="lampiran" multiple="" required>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" readonly=""
                                        placeholder="Upload Scan Proposal ekstensi Anda..">
                                </div>

                            </div>

                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" style="color:black;">Keterangan</label>

                            <div class="col-md-10 input-group">
                                <textarea type="text" class="form-control" name="benefit" style=”height:100px;”
                                    placeholder="Deskripsikan secara singkat proposaL Anda.." autocomplete="off"
                                    value="" required></textarea>
                            </div>

                        </div>
                </div>


                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    <!-- Modal end tambah plannning proposal -->






    <script>
    $(document).ready(function() {
        $(".sum").on('input', '.prc', function() {
            var calculated_total_sum = 0;

            $(".sum .prc").each(function() {
                var get_textbox_value = $(this).val();
                if ($.isNumeric(get_textbox_value)) {
                    calculated_total_sum += parseFloat(get_textbox_value);
                }
            });
            $("#result").html(calculated_total_sum);
        });

    });
    </script>
    <!-- CHECK BOX -->
    <script>
    $(document).ready(function() {
        $(document).on('click', '#checkAll', function() {
            if (this.checked) {
                $('.check').each(function() {
                    this.checked = true;
                })
            } else {
                $('.check').each(function() {
                    this.checked = false;
                })
            }

        });
        $(document).on('click', '.check', function() {
            // console.log($('.check').length)
            if ($('.check:checked').length == $('.check').length) {
                $('#checkAll').prop('checked', true)
            } else {
                $('#checkAll').prop('checked', false)
            }
        });

        // $('#rupiah').keyup(function(event) {

        //     // skip for arrow keys
        //     if (event.which >= 37 && event.which <= 40) return;

        //     // format number
        //     $(this).val(function(index, value) {
        //         return value
        //             .replace(/\D/g, "")
        //             .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        //     });
        // });



    })
    </script>
    <script>
    $(document).ready(function() {
        $('.HapusData1').click(function(a) {
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
    })
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
    })
    </script>
    <script>
    function submitResult(e) {
        Swal.fire({
            title: '<strong>MAAF !!! </strong>',
            icon: 'info',
            html: 'Sahabat belum mengajukan planning proposal ',
            showCloseButton: true,
            focusConfirm: false,
            confirmButtonText: '<i">Laporan Diterima !!</i>',
            cancelButtonAriaLabel: 'Close'
        })
    }
    </script>