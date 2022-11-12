<!--header-->
<?php
include("../config/config.php");
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
                    <!-- Site Navbar Utama -->
                    <?php include '../elemen/sidebarleft.php';?>
                    <!-- Site Navbar Search -->
                    <!-- Site Navbar Search -->
                    <?php include '../elemen/sidebar.php';?>
                    <!-- End Site Navbar Search -->
                    <!-- end sidebar -->

                    <!-- sidebar back -->
                    <?php include '../elemen/sidebarback.php';?>
                    <!-- end sidebar back -->

                    <!-- get data -->

                    <?php
                    $id_dep = $_GET['dep'];
                    $data_fiscal = single_query("SELECT id_fis from time_fiscal where status='aktif'");
                    $id_fis = $data_fiscal['id_fis'];

                    $list_bulan = [4,5,6,7,8,9,10,11,12,1,2,3];
                   

                    $get_data_budget = single_query("SELECT * FROM budget JOIN depart on budget.id_dep = depart.id_dep where budget.id_dep={$id_dep} and id_fis={$id_fis}");

                    $consumtion_budget = single_query("SELECT sum(cost_ia) as cost , count(*) as qty FROM ia
                        join proposal on ia.id_prop = proposal.id_prop
                        join depart on proposal.id_dep = depart.id_dep
                        where proposal.id_dep = {$id_dep} and proposal.id_fis={$id_fis}
                    ");  
                    
                    $consumtion_budget_data = query("SELECT MONTH(ia.time_ia) AS bulan, sum(ia.cost_ia) as cost FROM ia
                    join proposal on ia.id_prop = proposal.id_prop
                    join depart on proposal.id_dep = depart.id_dep
                    where proposal.id_dep = {$id_dep} and proposal.id_fis={$id_fis}
                    GROUP BY bulan
                    ");  

                    foreach ($list_bulan as $bulan) {

                        foreach($consumtion_budget_data as $row){
                            if($row['bulan'] == $bulan){
                                $isi_budget_bulan[$bulan] = $row['cost'];
                            }
                        }


                    }  
                         

                    $data_ia = query("SELECT * from tracking_ia
                        join ia on tracking_ia.id_ia = ia.id_ia
                        join proposal on ia.id_prop = proposal.id_prop
                        join depart on proposal.id_dep = depart.id_dep
                        join kategori_proposal on proposal.id_kat = kategori_proposal.id_kat                      
                        where proposal.id_dep = {$id_dep} and proposal.id_fis={$id_fis}
                        and id_prog = 30
                    ");              

                   

                    // net budget departemen ============
                    foreach ($list_bulan as $fow) {
                        $net_budget[] = $get_data_budget['budget'];
                    }
                    $net_budget = json_encode($net_budget);   
                    
                    // comsumtion budget from ia
                    foreach($list_bulan as $row){

                        if(isset($isi_budget_bulan[$row])){
                            $data_grafik_con_budget[] = $isi_budget_bulan[$row];
                        }else{
                            $data_grafik_con_budget[] = 0;
                        }
                       
                    }
                    $data_grafik_con_budget = json_encode($data_grafik_con_budget);
                    
                    ?>

                    <!-- Page -->
                    <div class="page">
                        <div class="page-header">
                            <h1 class="page-title font-size-26 font-weight-600">Budget <?= $get_data_budget['depart']?>
                                Overview (x Million)
                            </h1>
                        </div>

                        <div class="page-content container-fluid">
                            <div class="row">
                                <div class="col-lg-6 col-md-6  mb-2">
                                    <h6 class="font-size-18 font-weight-400">Periode ( <span
                                            style="color:red;"><?php echo  $_SESSION['periode']; ?> </span> ) :
                                        <span style="color:red;"><?php echo $_SESSION['awal']; ?></span>
                                        s.d
                                        <span style="color:red;"><?php echo $_SESSION['akhir']; ?>
                                        </span>
                                    </h6>
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
                                            <button type="submit" class="btn btn-primary btn-floating btn-sm "><i
                                                    aria-hidden="true"></i>GO</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- First Row -->



                                <!-- End First Row -->
                                <!-- Second Row -->
                                <div class="col-lg-12 col-md-6">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 info-panel">
                                            <div class="card card-shadow" style="border-radius: 15px;height:200px;">
                                                <div class="card-block warnadep<?=$id_dep?>"
                                                    style="border-radius: 15px;height:200px;">
                                                    <button type="button" class="btn btn-floating btn-sm btn-success">
                                                        <i class="icon fa-dollar"></i>
                                                    </button>
                                                    <span
                                                        class="white font-weight-400 font-size-20"><?= $get_data_budget['depart']?></span>
                                                    <div class="content-text text-center mb-0">

                                                        <?php                                                          
                                                            $total_budget = $get_data_budget['budget'];
                                                            $consumtion_budget_cost = $consumtion_budget['cost'];

                                                            $sisa_budget = $total_budget - $consumtion_budget_cost;

                                                        ?>

                                                        <span class="white font-size-60 font-weight-100">Rp
                                                            <?= number_format($sisa_budget,0,',','.') ?></span>
                                                        <br>
                                                        <p class="white font-weight-100 m-0 font-size-20">"Budget Rp
                                                            <?= number_format($get_data_budget['budget'],0,',','.')  ?>"
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 info-panel">
                                            <div class="card card-shadow bg-brown-100"
                                                style="border-radius: 15px;height:200px;">
                                                <div class="ml-20 mr-20 py-15 " style="line-height: 20px;">
                                                    <h4>Transactions:</h4>
                                                    <p style="font-size: 20px;"> <span
                                                            style="font-size: 25px; font-weight: bold;color:black;">
                                                            <?= number_format($consumtion_budget['qty'],0,',','.') ?>
                                                        </span> x orders</p>
                                                    <h4>Month / left:</h4>
                                                    <p style="font-size: 20px;"> <span
                                                            style="font-size: 25px; font-weight: bold;color:black;">
                                                            <?= (isset($isi_budget_bulan))? $jumlah_bulan = count($isi_budget_bulan):0 ?>
                                                        </span> / 12 months</p>
                                                    <div class="progress">

                                                        <?php 

                                                        $persentase = number_format( $jumlah_bulan / 12 * 100 ,0 );

                                                        ?>
                                                        <div class="progress-bar progress-bar-striped active"
                                                            aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"
                                                            style="width: <?= $persentase ?>%" role="progressbar">
                                                            <span><?= $persentase ?>% </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-3 info-panel">
                                            <div class="card card-shadow bg-brown-100"
                                                style="border-radius: 15px;height:200px;">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-7 py-20 ">
                                                        <div class="text-left">

                                                            <?php 
                                                                $persentase_budget = $sisa_budget / $total_budget * 100;
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

                                                            <div class="pie-progress " data-plugin="pieProgress"
                                                                data-barcolor="<?= $warna ?>" data-size="100"
                                                                data-barsize="8" data-goal="40"
                                                                aria-valuenow=" <?= $persentase_budget ?>"
                                                                role="progressbar">
                                                                <div class="pie-progress-content">
                                                                    <div class="pie-progress-number">
                                                                        <?= $persentase_budget ?>%</div>
                                                                    <div class="pie-progress-label">Available</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-5 mt-30" style="line-height: 15px;">
                                                        <h4>e-Wallet:</h4>
                                                        <p style="font-size: 20px; color:green;font-weight: bold;">Rp
                                                            <?= number_format($get_data_budget['budget'],0,',','.') ?>
                                                        </p>
                                                        <h4>Consummed:</h4>
                                                        <p style="font-size: 20px; color:blue;font-weight: bold;">Rp
                                                            <?= number_format($consumtion_budget['cost'] ,0, ',','.') ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12" id="ecommerceRecentOrder">
                                    <div class="card card-shadow">
                                        <div class="card-header card-header-transparent bg-dark">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="float-left">
                                                        <span class="font-size-20 bold">Transaction History</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="float-right">
                                                        <i href="" data-toggle="tooltip"
                                                            data-original-title="Tambah Data">
                                                            <button type="button"
                                                                class="btn btn-icon btn-outline btn-info btn-xs"
                                                                data-toggle="modal"
                                                                data-target="#TambahPlaningProposal">
                                                                <i class="icon wb-plus" aria-hidden="true"></i>
                                                            </button>
                                                        </i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <canvas id="myBar4" height="46" width="100%"></canvas>

                                        </div>



                                        <div class="table table-responsive table-bordered 10px text-nowrap">
                                            <table width="100%" class="table-striped">
                                                <thead class="text-center">
                                                    <tr class="bg-info align-" height="10px">
                                                        <th class="align-middle text-center" height="10px" rowspan="2">
                                                            N0</th>
                                                        <th class="align-middle text-center" height="10px" rowspan="2">
                                                            CATEGORY</th>
                                                        <th class="align-middle text-center" height="10px" rowspan="2">
                                                            NO. IA</th>
                                                        <th class="align-middle text-center" height="10px" rowspan="2">
                                                            DESCRIPTION</th>
                                                        <th class="align-middle text-center" height="10px" rowspan="2">
                                                            BENEFIT</th>
                                                        <th class="align-middle text-center" height="10px" rowspan="2">
                                                            DATE</th>
                                                        <th class="align-middle text-center" height="10px" rowspan="2">
                                                            TOTAL TRANSC</th>
                                                        <th class="align-middle text-center" height="10px" rowspan="2">
                                                            STATUS</th>
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
                                                        <td class="align-middle text-center"></td>
                                                        <td class="align-middle text-center">
                                                            <?= date('d M Y' , strtotime($row['time_ia']))  ?></td>
                                                        <td class="align-middle text-center">Rp
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

                <!-- Footer -->
                <?php
include '../elemen/footer.php';?>
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
                                ticks: {
                                    beginAtZero: true
                                },
                                stacked: false
                            }],
                            xAxes: [{
                                stacked: false
                            }]
                        }
                    }
                });
                </script>