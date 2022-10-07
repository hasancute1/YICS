<?php
include("../config/config.php");
if (!isset($_SESSION['yics_user'])) {
  header('location: ../index.php');
}
?>
<!--header-->
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
    </nav>    <div class="site-menubar">
<!-- sidebar -->
<div class="site-menubar-body" >
<div>
  <div><br><br>
    <ul class="site-menu" data-plugin="menu"> 
      <li class="site-menu-item has-sub ">
        <a href="dashboard.php" class="animsition-link">
                    <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                    <span class="site-menu-title">DASHBOARD</span>
                </a> 
      </li>              
      <li class="site-menu-item has-sub">
        <a href="javascript:void(0)">
                <i class="site-menu-icon wb-table" aria-hidden="true"></i>
                <span class="site-menu-title">CONTROL TABLES</span>
                        <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
          <li class="site-menu-item">
            <a class="animsition-link" href="controltabledep1.php">
              <span class="site-menu-title">Body Plant 1</span>
            </a>
          </li>
          <li class="site-menu-item">
            <a class="animsition-link" href="controltabledep2.php">
              <span class="site-menu-title">Body Plant 2</span>
            </a>
          </li>
          <li class="site-menu-item">
            <a class="animsition-link" href="controltabledep3.php">
              <span class="site-menu-title">BQC</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="site-menu-item has-sub">
        <a href="tracking.php">
                <i class="site-menu-icon wb-shopping-cart" aria-hidden="true"></i>
                <span class="site-menu-title">TRACKING DOCUMENT</span>
                        <span class="site-menu-tittle"></span>
            </a>
      </li>
      <li class="site-menu-item has-sub active open ">
        <a href="javascript:void(0)">
                <i class="site-menu-icon fa-database" aria-hidden="true"></i>
                <span class="site-menu-title">BUDGET</span>
                      <span class="site-menu-arrow"></span>                        
            </a>
        <ul class="site-menu-sub">
          <li class="site-menu-item ">
            <a class="animsition-link" href="budgetdep1.php">
              <span class="site-menu-title">Body Plant 1</span>
            </a>
          </li>
          <li class="site-menu-item active open">
            <a class="animsition-link" href="budgetdep2.php">
              <span class="site-menu-title">Body Plant 2</span>
            </a>
          </li>
          <li class="site-menu-item">
            <a class="animsition-link" href="budgetdep3.php">
              <span class="site-menu-title">BQC</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="site-menu-item has-sub">
        <a href="javascript:void(0)">
                <i class="site-menu-icon wb-user" aria-hidden="true"></i>
                <span class="site-menu-title">ADMINISTRATOR</span>
                        <span class="site-menu-arrow"></span>
            </a>
        <ul class="site-menu-sub">
          <li class="site-menu-item">
            <a class="animsition-link" href="usersetting.php">
              <span class="site-menu-title">User Setting</span>
            </a>
          </li>
          <li class="site-menu-item" >  
            <a class="animsition-link" href="categorysetting.php">
              <span class="site-menu-title">Category Setting</span>
            </a>
          </li>
          <li class="site-menu-item" >  
            <a class="animsition-link" href="fiscalsetting.php">
              <span class="site-menu-title">Time Fiscal Setting</span>
            </a>
        </li>  
      </ul>
    </li>                            
  </ul>
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
        <h1 class="page-title font-size-26 font-weight-600">Budget Body Plant 2  Overview (x Million)</h1>
      </div>

      <div class="page-content container-fluid">
      <div class="row">
        <div class="col-lg-6 col-md-6  mb-2">
        <?php 
           $alokasi = mysqli_query($link_yics, "SELECT * FROM time_fiscal WHERE status='aktif'") or die(mysqli_error($link_yics));
           $data = mysqli_fetch_assoc($alokasi);
            ?>
        <h6 class="font-size-18 font-weight-400">Periode ( <span style="color:red;"><?php echo $data['periode']; ?> </span>  ) :
        <span style="color:red;"><?php echo date("d M Y", strtotime($data['awal'])); ?> </span> 
        s.d 
        <span style="color:red;"><?php echo date("d M Y", strtotime($data['akhir'])); ?> </span>
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
             <input type="date" name="start" id="start_date" class="form-control bg-transparent datepicker"  value="">
           
        </div>
      </div>
        <div class="col-lg-5 col-md-5">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">to</span>
            </div>
            <input type="date" name="start" id="start_date" class="form-control bg-transparent datepicker"  value="">
          </div>
        </div>
          <div class="col-md-2 text-right">
          <button type="submit" class="btn btn-primary btn-floating btn-sm "><i aria-hidden="true"></i>GO</button>
          </div>
      </div>
    </div>  
          <!-- First Row -->
          
             
              
          <!-- End First Row -->
          <!-- Second Row -->
          <div class="col-lg-12 col-md-6">
          <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="card card-shadow" style="border-radius: 15px;height:200px;">
              <div class="card-block bg-red-800 p-20" style="border-radius: 15px;height:200px;">
                <button type="button" class="btn btn-floating btn-sm btn-success">
                  <i class="icon fa-dollar"></i>
                </button>
                <span class="white font-weight-400 font-size-20">BODY PLANT 2</span>
                <div class="content-text text-center mb-0">
                 
                  <span class="white font-size-60 font-weight-100">Rp 1.628</span>
                  <br>
                  <p class="white font-weight-100 m-0 font-size-20">"Budget Rp 4.000"</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 info-panel">
            <div class="card card-shadow bg-brown-100" style="border-radius: 15px;height:200px;">
              <div class="ml-20 mr-20 py-15 " style="line-height: 20px;">
                <h4>Transactions:</h4>
                <p style="font-size: 20px;"> <span style="font-size: 25px; font-weight: bold;color:black;"> 4  </span> x orders</p>
                <h4>Month / left:</h4>
                <p style="font-size: 20px;"> <span style="font-size: 25px; font-weight: bold;color:black;"> 4  </span> / 12 months</p>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped active" aria-valuenow="90" aria-valuemin="0"
                    aria-valuemax="100" style="width: 40%" role="progressbar">
                    <span >40% </span>
                  </div>
                </div>
              </div>
            </div>  
          </div>
          <div class="col-lg-4 col-md-3 info-panel">
            <div class="card card-shadow bg-brown-100" style="border-radius: 15px;height:200px;">
              <div class="row">
                <div class="col-lg-6 col-md-7 py-20 ">
                  <div class="text-left">
                    
                    <div class="pie-progress " data-plugin="pieProgress" data-barcolor="#E62020"
                      data-size="100" data-barsize="8" data-goal="40" aria-valuenow="40"
                      role="progressbar">
                      <div class="pie-progress-content">
                        <div class="pie-progress-number">40%</div>
                        <div class="pie-progress-label">Available</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-5 mt-30" style="line-height: 15px;">
                    <h4>e-Wallet:</h4>
                    <p style="font-size: 20px; color:green;font-weight: bold;">Rp 4.000</p>
                    <h4>Consummed:</h4>
                    <p style="font-size: 20px; color:blue;font-weight: bold;">Rp 2.372</p>
                  </div>
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
                        <i href=""  data-toggle="tooltip" data-original-title="Tambah Data">
                            <button type="button" class="btn btn-icon btn-outline btn-info btn-xs" data-toggle="modal" data-target="#TambahPlaningProposal">
                              <i class="icon wb-plus" aria-hidden="true"></i>
                            </button>
                          </i> 
                      </div>                    
                    </div>
                  </div>                                      
              </div>
              <div class="col-lg-12 col-md-12">
              <canvas id="myBar5" height="46" width="100%"></canvas>
                                  
              </div>
                                                      
     
              
                <div class="table table-responsive table-bordered 10px text-nowrap" > 
                  <table width="100%" class="table-striped">
                    <thead class="text-center">
                      <tr class="bg-info align-" height="10px">
                        <th class="align-middle text-center" height="10px" rowspan="2">N0</th>
                        <th class="align-middle text-center" height="10px" rowspan="2">CATEGORY</th>
                        <th class="align-middle text-center" height="10px" rowspan="2">NO. IA</th>
                        <th class="align-middle text-center" height="10px" rowspan="2">DESCRIPTION</th>
                        <th class="align-middle text-center" height="10px" rowspan="2">BENEFIT</th>
                        <th class="align-middle text-center" height="10px" rowspan="2">DATE</th>
                        <th class="align-middle text-center" height="10px" rowspan="2">TOTAL TRANSC</th>
                        <th class="align-middle text-center" height="10px" rowspan="2">STATUS</th>
                      </tr >
                    </thead>
                    <tbody>
                      <tr class="text-wrap">
                        <td class="align-middle text-center">1</td>
                        <td class="align-middle text-center" >Improvement</td>
                        <td class="align-middle text-center" >P4/BDY/IP/07/21/I.4 .04.C-00005</td>
                        <td class="align-middle text-center" >Digitalization fitting</td>
                        <td class="align-middle text-center" >Reduce 1 MP</td>
                        <td class="align-middle text-center" >28 Mei 2022</td>
                        <td class="align-middle text-center" >Rp 500</td>
                        <td class="align-middle text-center" >Closed</td>
                      </tr>
                      <tr class="text-wrap">
                        <td class="align-middle text-center">2</td>
                        <td class="align-middle text-center" >Replacement</td>
                        <td class="align-middle text-center" >P4/BDY/IP/07/21/I.4 .04.C-00005</td>
                        <td class="align-middle text-center" >Digitalization fitting</td>
                        <td class="align-middle text-center" >-</td>
                        <td class="align-middle text-center" >28 Mei 2022</td>
                        <td class="align-middle text-center" >Rp 500</td>
                        <td class="align-middle text-center" >Closed</td>
                      </tr>
                      <tr class="text-wrap">
                        <td class="align-middle text-center">3</td>
                        <td class="align-middle text-center" >Other</td>
                        <td class="align-middle text-center" >P4/BDY/IP/07/21/I.4 .04.C-00005</td>
                        <td class="align-middle text-center" >hp laptop</td>
                        <td class="align-middle text-center" >-</td>
                        <td class="align-middle text-center" >28 Mei 2022</td>
                        <td class="align-middle text-center" >Rp 500</td>
                        <td class="align-middle text-center" >Closed</td>
                      </tr>
                      <tr class="text-wrap">
                        <td class="align-middle text-center">4</td>
                        <td class="align-middle text-center" >Improvement</td>
                        <td class="align-middle text-center" >P4/BDY/IP/07/21/I.4 .04.C-00005</td>
                        <td class="align-middle text-center" >Digitalization fitting</td>
                        <td class="align-middle text-center" >Reduce 1 MP</td>
                        <td class="align-middle text-center" >28 Mei 2022</td>
                        <td class="align-middle text-center" >Rp 500</td>
                        <td class="align-middle text-center" >Closed</td>
                      </tr>
                      <tr class="text-wrap">
                        <td class="align-middle text-center">5</td>
                        <td class="align-middle text-center" >Improvement</td>
                        <td class="align-middle text-center" >P4/BDY/IP/07/21/I.4 .04.C-00005</td>
                        <td class="align-middle text-center" >Digitalization fitting</td>
                        <td class="align-middle text-center" >Reduce 1 MP</td>
                        <td class="align-middle text-center" >28 Mei 2022</td>
                        <td class="align-middle text-center" >Rp 500</td>
                        <td class="align-middle text-center" >Closed</td>
                      </tr>
                      
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
  var ctx = document.getElementById("myBar5").getContext('2d');
		var myBar5 = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Aprl", "Mei", "Jun", "July", "Agst", "Sept", "Oct","Nov","Dec","Jan","Feb","March"],
				datasets: [
                  
                  {
                    type : 'line',
                    label: "BUDGET  BODY PLANT 2",                    
                    borderColor: Config.colors("grey", 800),                                      
                    data: [4000, 4000, 4000, 4000,4000, 4000, 4000, 4000, 4000,4000,4000,4000],
                    order:1,
                  },
                  {
                    label: "CONSUMTION BODY PLANT 2",
                    backgroundColor: Config.colors("red", 200),
                    borderColor: Config.colors("red", 800),
                    hoverBackgroundColor: "rgba(255, 206, 86, 0.2)",
                    borderWidth: 2,
                    data: [650, 450, 750, 500, 600, 450, 550]
                  }, 
                  
                 
                ]
			},
			options: {
				scales: {
					yAxes: [{	ticks: { beginAtZero:true	},stacked: false}],
          xAxes :[{ stacked :false }]
				}
			}
		});
</script>