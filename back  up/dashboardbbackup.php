<!--header-->
<?php
include("config/config.php");
if (!isset($_SESSION['yics_user'])) {
  header('location: index.php');
}
?>
<?php include 'elemen/header.php';  ?>
<!-- end header -->
<body class="animsition">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    
      <!--navbaricon -->
<?php include 'elemen/navbaricon.php';?>
<!-- end navbaricon     -->
    
      <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
         <!-- Navbar left -->
<?php include 'elemen/navbarleft.php';?>
<!-- End Navbar left -->
    
<!-- Navbar Right -->
<?php include 'elemen/navbarright.php';?>
 <!-- End Navbar Right -->
        </div>
        <!-- End Navbar Collapse -->
    
<!-- Site Navbar Search -->
<?php include 'elemen/navbarsearch.php';?>        
<!-- End Site Navbar Search -->
      </div>
    </nav>    <div class="site-menubar">
<!-- sidebar -->
<div class="site-menubar-body" >
<div>
  <div><br><br>
    <ul class="site-menu" data-plugin="menu"> 
      <li class="site-menu-item has-sub active open">
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
            <a class="animsition-link" href="controltablebody1.php">
              <span class="site-menu-title">Body Plant 1</span>
            </a>
          </li>
          <li class="site-menu-item">
            <a class="animsition-link" href="controltablebody2.php">
              <span class="site-menu-title">Body Plant 2</span>
            </a>
          </li>
          <li class="site-menu-item">
            <a class="animsition-link" href="controltablebqc.php">
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
      <li class="site-menu-item has-sub ">
        <a href="javascript:void(0)">
                <i class="site-menu-icon fa-database" aria-hidden="true"></i>
                <span class="site-menu-title">BUDGET</span>
                      <span class="site-menu-arrow"></span>                        
            </a>
        <ul class="site-menu-sub">
          <li class="site-menu-item">
            <a class="animsition-link" href="budgetb1.php">
              <span class="site-menu-title">Body Plant 1</span>
            </a>
          </li>
          <li class="site-menu-item">
            <a class="animsition-link" href="budgetb2.php">
              <span class="site-menu-title">Body Plant 2</span>
            </a>
          </li>
          <li class="site-menu-item">
            <a class="animsition-link" href="budgetbqc.php">
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
            <a class="animsition-link" href="../index.html">
              <span class="site-menu-title">User Setting</span>
            </a>
          </li>
        </ul>
      </li>                            
    </ul>
 <!-- Site Navbar Search -->
 <?php include 'elemen/sidebar.php';?>        
<!-- End Site Navbar Search -->
<!-- end sidebar -->   
    
 <!-- sidebar back -->
<?php include 'elemen/sidebarback.php';?>
<!-- end sidebar back -->   

    <!-- Page -->
    <div class="page">
      <div class="page-header">
        <h1 class="page-title font-size-26 font-weight-600">Budget Body Division Overview (x Million)</h1>
      </div>

      <div class="page-content container-fluid">
        <div class="row">
          <!-- First Row -->
          <div class="col-lg-4">
            <div class="card card-shadow" >
              <div class="card-header card-header-transparent bg-dark">
                <div class="row">
                  <div class="col-lg-8 col-md-8">
                    <div class="float-left">
                     <span class="font-size-20 bold">Allocation Budget</span>
                    </div>                    
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <div class="text-right">                  
                      <i href=""  data-toggle="tooltip" data-original-title="Tambah Data">
                          <button type="button" class="btn btn-icon btn-outline btn-info btn-xs" data-toggle="modal" data-target="#TambahAlokasiBudget">
                            <i class="icon wb-plus" aria-hidden="true"></i>
                          </button>
                        </i>
                        <!-- Modal tambah data Alokasi Budget -->
                            <div class="modal fade modal-info " id="TambahAlokasiBudget" aria-hidden="true" aria-labelledby="TambahAlokasiBudget"
                            role="dialog" tabindex="-1">
                              <div class="modal-dialog modal-simple modal-center modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                    <h3 class="modal-title">Input Alokasi Budget</h3>
                                  </div>
                                  <div class="row">
                                
                                  </div>
                                  <div class="modal-body">
                                  <form action="" method="post" id="tambahdata">
                                  <div class="form-group row">
                                      <h4 class="col-md-12 modal-title text-left" style="color:black;">Tahun Fiscal</h4>                                      
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-md-2 col-form-label" style="color:black;">Start Date</label>
                                      <div class="col-md-4">
                                        <select id="startfiscal" type="text" class="form-control">
                                          <option value="">Pilih...</option>
                                          <?php 
                                          $awal = date ('Y');
                                          $akhir = $awal + 4 ;
                                          for ($i= $awal;$i<=$akhir;$i++){
                                            echo '<option value="'.$i.'">Apr '.$i.'</option>';
                                          }
                                          ?>
                                        </select>
                                      </div>
                                      <label class="col-md-2 col-form-label" style="color:black;">End Date</label>
                                      <div class="col-md-4">
                                      <select id="endfiscal" type="text" class="form-control" >
                                          <option id="tahun_end" value="">Pilih...</option>                                          
                                        </select>
                                      </div>
                                      
                                    </div>  
                                    <hr>
                                    <div class="form-group row">
                                      <h4 class="col-md-12 modal-title text-left" style="color:black;">Subject</h4>                                      
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-md-2 col-form-label" style="color:black;">Division</label>
                                      <div class="col-md-4">
                                        <input id="bodydivision" type="text" class="form-control" name="name" placeholder="Division Yourself" autocomplete="off">
                                      </div>
                                      <label class="col-md-2 col-form-label" style="color:black;">Budget</label>
                                      <div class="col-md-4">
                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">Rp</span>
                                        </div>
                                        <input id="budget" type="number" class="form-control" placeholder="Budget Division">
                                        </div>
                                      </div>
                                    </div> 
                                    <hr>
                                    <div class="form-group row">
                                      <h4 class="col-md-12 modal-title text-left" style="color:black;">Budegt Alokasi</h4>                                      
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" style="color:black;">Body Plant 1</label>
                                      <div class="col-md-4">
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                          </div>
                                          <input id="body1" type="number" class="form-control" placeholder="Budget Body Plant 1">
                                        </div>
                                      </div>
                                      <label class="col-md-2 col-form-label" style="color:black;">BQC</label>
                                      <div class="col-md-4">
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                          </div>
                                          <input id="bqc" type="number" class="form-control" placeholder="BQC">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" style="color:black;">Body Plant 2</label>
                                      <div class="col-md-4">
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                          </div>
                                          <input id="body2" type="number" class="form-control" placeholder="Budget Body Plant 2">
                                        </div>
                                      </div>
                                    </div>
                                
                                  </div>
                                  <div class="modal-footer">
                                    <button type="reset" id="reset" class="btn btn-danger">Reset</button>
                                    <button type="submit" name="submit" class="btn btn-primary" >Save</button>
                                  </div>
                                  </form>
                                </div>
                              </div>
                          </div>
                        <!-- End Modal Tambah Alokasi Budget-->  
                      <i href="" data-toggle="tooltip" data-original-title="Edit">
                        <button type="button" class="btn btn-success btn-icon btn-outline btn-xs" data-toggle="modal" data-target="#EditAlokasiBudget">
                          <i class="icon wb-edit" aria-hidden="true"></i>
                        </button>
                      </i>
                       <!-- Modal edit data Alokasi Budget -->
                       <div class="modal fade modal-info " id="EditAlokasiBudget" aria-hidden="true" aria-labelledby="EditAlokasiBudget"
                            role="dialog" tabindex="-1">
                              <div class="modal-dialog modal-simple modal-center modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                    <h3 class="modal-title">Edit Alokasi Budget</h3>
                                  </div>
                                  <div class="row">
                                
                                  </div>
                                  <div class="modal-body">
                                  <form>
                                  <div class="form-group row">
                                      <h4 class="col-md-12 modal-title text-left" style="color:black;">Subject</h4>                                      
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-md-2 col-form-label" style="color:black;">Division</label>
                                      <div class="col-md-4">
                                        <input type="text" class="form-control bg-grey-200" name="name" placeholder="Division Yourself" autocomplete="off" value="Body Division">
                                      </div>
                                      <label class="col-md-2 col-form-label" style="color:black;">Budget</label>
                                      <div class="col-md-4">
                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" class="form-control bg-grey-200" placeholder="Budget Division" value="10.000">
                                        </div>
                                      </div>
                                    </div> 
                                    <hr>
                                    <div class="form-group row">
                                      <h4 class="col-md-12 modal-title text-left" style="color:black;">Budegt Alokasi</h4>                                      
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" style="color:black;">Body Plant 1</label>
                                      <div class="col-md-4">
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                          </div>
                                          <input type="number" class="form-control bg-grey-200" placeholder="Budget Body Plant 1" value="4.000">
                                        </div>
                                      </div>
                                      <label class="col-md-2 col-form-label" style="color:black;">BQC</label>
                                      <div class="col-md-4">
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                          </div>
                                          <input type="number" class="form-control bg-grey-200" placeholder="BQC" value="2.000">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" style="color:black;">Body Plant 2</label>
                                      <div class="col-md-4">
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                          </div>
                                          <input type="number" class="form-control bg-grey-200" placeholder="Budget Body Plant 2" value="3.000">
                                        </div>
                                      </div>
                                    </div>
                                </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Reset</button>
                                    <button type="button" class="btn btn-primary">Save</button>
                                  </div>
                                </div>
                              </div>
                          </div>
                        <!-- End Modal Tambah Alokasi Budget-->  
                      <i href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                        <button type="button" class="btn btn-icon btn-danger btn-icon btn-outline btn-xs HapusData">
                          <i class="icon oi-trashcan" aria-hidden="true"></i>
                        </button>
                      </i> 
                    </div>   
                  </div>
                </div>                          
              </div>
                <div class="card-body card-shadow"> 
                    <div id="graph" style="height: 350px;"></div>
                 </div> 
                 <!-- data donut    -->
                 <?php 
                 $morris = [];
                 $startfiscal = '2022-04';
                 $query=mysqli_query($link_yics,"SELECT * FROM alokasi_budget WHERE startfiscal='$startfiscal'") or die (mysqli_error($link_yics));
                if  (mysqli_num_rows($query)>0){
                  while($rows=mysqli_fetch_assoc($query)){
                    $body1 = $rows ['body1'];
                    $body2 = $rows ['body2'];
                    $bqc = $rows ['bqc'];                    
                  }
                  $morris[] = array('label' => 'body1', 'value' => $rows ['body1']);
                  $json_morris = json_encode($morris);
                }
                 ?>
                 <script>
                        $(function () {
                          Morris.Donut({
                            element: 'graph',
                            resize: true,
                            data:  <?php echo $json_morris ; ?>,
                            colors: [Config.colors("yellow", 500), Config.colors("red", 500), Config.colors("purple", 500)],
                            // formatter: function (x) { return x + "%"}
                            formatter: function (y, data) { return 'Rp ' + y },
                          }).on('click', function(i, row){
                            console.log(i, row);
                          });
                        });
                 </script>   
                  <!-- end data donut       -->
            </div>
          </div>
          <div class="col-lg-8 col-md-8">
            <div class="card card-shadow"><div class="card-header card-header-transparent bg-dark">
                <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="float-left">
                     <span class="font-size-20 bold">Consumtion Budget Yearly Investmment</span>
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
          <div class="col-lg-3 col-md-6 info-panel">
            <div class="card card-shadow">
              <div class="card-block bg-blue-800 p-20" style="border-radius: 15px;height:180px;">
                <button type="button" class="btn btn-floating btn-sm btn-success">
                  <i class="icon wb-payment"></i>
                </button>
                <span class="white font-weight-400">BODY DIVISION</span>
                <div class=" white content-text text-center mb-0">                 
                  <span class="font-size-40 font-weight-100">Rp 3.900</span>
                  <p class="white font-weight-100 m-0">"Budget Rp 10.000"</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 info-panel">
            <a href="budgetb1.php">
              <div class="card card-shadow">
                <div class="card-block bg-yellow-800" style="border-radius: 15px;height:180px;" >
                  <button type="button" class="btn btn-floating btn-sm btn-success">
                    <i class="icon fa-dollar"></i>
                  </button>
                  <span class="white font-weight-400">BODY PLANT 1</span>
                  <div class="content-text text-center mb-0">                    
                    <span class="white font-size-40 font-weight-100">Rp 1.628</span>
                    <p class="white font-weight-100 m-0 font-size-15">"Budget Rp 4.000"</p>
                    <p class="white font-weight-100 m-0"> Lihat  Detail >></p>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 info-panel">
            <a href="budgetb2.php">
              <div class="card card-shadow">
                <div class="card-block bg-red-800" style="border-radius: 15px;height:180px;" >
                  <button type="button" class="btn btn-floating btn-sm btn-success">
                    <i class="icon fa-dollar"></i>
                  </button>
                  <span class="white font-weight-400">BODY PLANT 2</span>
                  <div class="content-text text-center mb-0">                    
                    <span class="white font-size-40 font-weight-100">Rp 1.628</span>
                    <p class="white font-weight-100 m-0 font-size-15">"Budget Rp 4.000"</p>
                    <p class="white font-weight-100 m-0"> Lihat  Detail >></p>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 info-panel">
            <a href="budgetbqc.php">
              <div class="card card-shadow">
                <div class="card-block bg-purple-800" style="border-radius: 15px;height:180px;" >
                  <button type="button" class="btn btn-floating btn-sm btn-success">
                    <i class="icon fa-dollar"></i>
                  </button>
                  <span class="white font-weight-400">BQC</span>
                  <div class="content-text text-center mb-0">                     
                    <span class="white font-size-40 font-weight-100">Rp 1.628</span>
                    <p class="white font-weight-100 m-0 font-size-15">"Budget Rp 2.000"</p>
                    <p class="white font-weight-100 m-0"> Lihat  Detail >></p>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <!-- End Second Row -->
          <!-- Third Row -->

          
          <!-- Third Left -->
          <div class="col-lg-12 col-md-12" id="ecommerceRecentOrder">
            <div class="card card-shadow">
              <div class="card-header card-header-transparent bg-dark">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                      <div class="float-left">
                      <span class="font-size-20 bold">Planning Proposal</span>
                      </div>                    
                    </div>
                  </div>                                      
              </div>
                        <!-- Modal tambah plannning proposal -->
                            <div class="modal fade modal-info " id="TambahPlaningProposal" aria-hidden="true" aria-labelledby="TambahPlaningProposal"
                            role="dialog" tabindex="-1">
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
                                  <form>
                                  <div class="form-group row">
                                      <h4 class="col-md-12 modal-title text-left" style="color:black;">SUBJECT</h4>                                      
                                    </div>
                                  <div class="form-group row">
                                      <label class="col-md-2 col-form-label text-left" style="color:black;">Department</label>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <select class="form-control">
                                            <option>Pilih Departement</option>
                                            <option>Body Plant 1</option>
                                            <option>Body Plant 2</option>
                                            <option>BQC</option>                                         
                                          </select>
                                          </div>
                                        </div>
                                        <label class="col-md-2 col-form-label text-left" style="color:black;">Category</label>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <select class="form-control">
                                              <option>Pilih Category</option>
                                              <option>Improvement</option>
                                              <option>Replacement</option>
                                              <option>Other</option>                                         
                                            </select>
                                          </div>
                                        </div>
                                    </div>                                  
                                    <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-left" style="color:black;">Proposal</label>
                                      <div class="col-md-10">
                                        <input type="text" class="form-control" name="name" placeholder=" Judul Proposal" autocomplete="off">
                                      </div>
                                    </div>  
                                </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Reset</button>
                                    <button type="button" class="btn btn-primary">Save</button>
                                  </div>
                                </div>
                              </div>
                          </div>
                        <!-- End Modal Tambah Alokasi Budget--> 
                  <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="row"> 
                      <div class="col-lg-6 col-md-6 ">
                        <div class="text-left">
                           <div class="form-group mt-4 ml-1">
                              <button type="button" class="btn btn-icon btn-info" data-toggle="modal" data-target="#TambahPlaningProposal">
                                <i class="icon wb-plus" aria-hidden="true"></i> <span>Tambah Data</span>
                              </button>
                           </div>   
                        </div>                    
                      </div>
                      <div class="col-lg-6 col-md-6 ">
                        <div class="text-right">
                           <div class="form-group mt-4 ml-1">
                                <div class="input-group">                                 
                                  <input type="text" class="form-control" name="" placeholder="Search...">
                                  <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="icon wb-search" aria-hidden="true"></i></button>
                                  </span>
                                </div>
                              </div>   
                          </div>                    
                      </div>                                
                    </div>                       
                  </div>                    
                </div>
                <div class="table table-responsive table-bordered 10px text-nowrap" > 
                  <table width="100%" class="table table-bordered table-hover">
                    <thead class="text-center">
                      <tr class="bg-info align-" height="0px">
                        <th class="align-middle text-center" height="10px" rowspan="2">N0</th>
                        <th class="align-middle text-center" height="10px" rowspan="2">DEPART.</th>
                        <th class="align-middle text-center" height="10px" rowspan="2">CATEGORY</th>
                        <th class="align-middle text-center" height="10px" rowspan="2">PROPOSAL</th>
                        <th class="align-middle text-center" height="10px" colspan="5">STEP ASSIGNMENT</th>
                        <th class="align-middle text-center" height="10px" rowspan="2">PROGRESS</th>
                        <th class="align-middle text-center" height="10px" rowspan="2">ACTION</th>
                      </tr >
                        <tr class="bg-info font size = 20px" height="10px">
                          <td class="align-middle text-center" width="120px" height="10px">Quatation</td>
                          <td class="align-middle text-center" width="120px" height="10px">Assignment</td>
                          <td class="align-middle text-center" width="120px" height="10px">Request for Negoisasi</td>
                          <td class="align-middle text-center" width="120px" height="10px">Price Confirmation</td>
                          <td class="align-middle text-center" width="120px" height="10px">Budget  Planning</td>
                        </tr>
                    </thead>
                    <tbody>
                      <tr class="text-wrap">
                        <td class="align-middle text-center">1</td>
                        <td class="align-middle text-center" >Body Plant 1</td>
                        <td class="align-middle text-center" >Improvement</td>
                        <td class="align-middle text-center" >Digitalization fitting</td>
                        <td class="align-middle text-center" > 
                          <a href=""  data-toggle="tooltip" data-original-title="20 April 2022"> 
                            <img src="image/ok.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" width="40px">                                 
                          </a>       
                        </td>
                        <td class="align-middle text-center"> 
                          <a href="" data-toggle="tooltip" data-original-title="22 April 2022">                                     
                          <img src="image/ok.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" width="40px">   
                          </a>       
                        </td>
                        <td class="align-middle text-center"> 
                          <a href="" data-toggle="tooltip" data-original-title="25 April 2022">                                     
                          <img src="image/ok.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" width="40px">   
                          </a>       
                        </td>
                        <td class="align-middle text-center" > 
                          <a href="" data-toggle="tooltip" data-original-title="25 April 2022">                                     
                          <img src="image/ok.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" width="40px"> 
                          </a>       
                        </td>
                        <td class="align-middle text-center" ></td>
                        <td class="align-middle text-center" >
                          <div class="progress mt-20">
                            <div class="progress-bar progress-bar-striped active" aria-valuenow="80" aria-valuemin="0"
                              aria-valuemax="100" style="width: 80%" role="progressbar">
                              80%
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center"  >
                            <a  data-toggle="tooltip" data-original-title="Edit">
                              <button type="button" class="btn btn-icon btn-success" data-toggle="modal" data-target="#EditPlaningProposal1">
                                <i class="icon wb-edit" aria-hidden="true"></i>
                              </button>
                            </a>
                          <!-- Modal Edit plannning proposal -->
                          <div class="modal fade modal-info " id="EditPlaningProposal1" aria-hidden="true" aria-labelledby="EditPlaningProposal1"
                            role="dialog" tabindex="-1">
                              <div class="modal-dialog modal-simple modal-center modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                    <h3 class="modal-title">Edit Planning Proposal</h3>
                                  </div>
                                  <div class="row">
                                  </div>
                                  <div class="modal-body">
                                    <form>
                                      <div class="form-group row">
                                          <h4 class="col-md-12 modal-title text-left" style="color:black;">SUBJECT</h4>                                      
                                        </div>
                                      <div class="form-group row">
                                          <label class="col-md-2 col-form-label text-left" style="color:black;">Department</label>
                                          <div class="col-md-4">
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="Body Plant 1">
                                            </div>
                                            <label class="col-md-2 col-form-label text-left" style="color:black;">Category</label>
                                            <div class="col-md-4">
                                            <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="Improvement">
                                            </div>
                                        </div>                                  
                                        <div class="form-group row">
                                          <label class="col-md-2 col-form-label text-left" style="color:black;">Proposal</label>
                                          <div class="col-md-10">
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="Digitalization fitting">
                                          </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                          <h4 class="col-md-12 modal-title text-left" style="color:black;">STEP ASSIGMENT</h4>                                      
                                        </div>
                                        <div class="form-group row text-left">
                                          <label class="col-md-2 col-form-label " style="color:black;">Step</label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="1.Quatation">
                                          </div>
                                          <label class="col-md-2 col-form-label " style="color:black;">Date</label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Tanggal" autocomplete="off" value="20 April 2022">
                                          </div>
                                        </div>
                                        <div class="form-group row text-left">
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="2.Assignment">
                                          </div>
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Tanggal" autocomplete="off" value="22 April 2022">
                                          </div>
                                        </div>
                                        <div class="form-group row text-left">
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="3.Request for Negoisasi	">
                                          </div>
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Tanggal" autocomplete="off" value="25 April 2022">
                                          </div>
                                        </div>
                                        <div class="form-group row text-left">
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="4.Price Confirmation	">
                                          </div>
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Tanggal" autocomplete="off" value="25 April 2022">
                                          </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row text-left">
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                              <div class="form-group">
                                                <select class="form-control">
                                                  <option>Pilih Step</option>                                                                                                                                        
                                                  <option>5.Budget Planning</option>                                                                             
                                                </select>
                                              </div>
                                          </div>
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                          <input type="date" class="form-control" name="name" placeholder=" Tanggal" autocomplete="off">
                                          </div>
                                        </div>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Reset</button>
                                    <button type="button" class="btn btn-primary">Save</button>
                                  </div>
                                </div>
                              </div>
                          </div>
                        <!-- End Edit plannning proposal-->  
                            <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                              <button type="button" class="btn btn-icon btn-danger HapusData">
                                <i class="icon oi-trashcan" aria-hidden="true"></i>
                              </button>
                            </a> 
                          </td>
                      </tr>
                      <tr class="align-middle text-center" >
                      <td class="align-middle text-center" >2</td>
                        <td class="align-middle text-center" >Body Plant 2</td>
                        <td class="align-middle text-center" >Improvement</td>
                        <td class="align-middle text-center" >Making robot spot</td>
                        <td class="align-middle text-center" > 
                          <a href="" data-toggle="tooltip" data-original-title="22 April 2022">                                     
                          <img src="image/ok.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" width="40px">  
                          </a>       
                        </td>
                        <td class="align-middle text-center" > 
                          <a href="" data-toggle="tooltip" data-original-title="22 April 2022">                                     
                          <img src="image/ok.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" width="40px">  
                          </a>       
                        </td>
                        <td class="align-middle text-center" ></td>
                        <td class="align-middle text-center" ></td>
                        <td class="align-middle text-center" ></td>
                        <td class="align-middle text-center" >
                          <div class="progress mt-20">
                            <div class="progress-bar progress-bar-striped active" aria-valuenow="40" aria-valuemin="0"
                              aria-valuemax="100" style="width: 40%" role="progressbar">
                              40%
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center" >
                          <a data-toggle="tooltip" data-original-title="Edit">
                            <button type="button" class="btn btn-icon btn-success" data-toggle="modal" data-target="#EditPlaningProposal2">
                              <i class="icon wb-edit" aria-hidden="true"></i>
                            </button>
                          </a>
                          <!-- Modal Edit plannning proposal 2 -->
                          <div class="modal fade modal-info " id="EditPlaningProposal2" aria-hidden="true" aria-labelledby="EditPlaningProposal2"
                            role="dialog" tabindex="-1">
                              <div class="modal-dialog modal-simple modal-center modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                    <h3 class="modal-title">Edit Planning Proposal</h3>
                                  </div>
                                  <div class="row">
                                  </div>
                                  <div class="modal-body">
                                    <form>
                                      <div class="form-group row">
                                          <h4 class="col-md-12 modal-title text-left" style="color:black;">SUBJECT</h4>                                      
                                        </div>
                                      <div class="form-group row">
                                          <label class="col-md-2 col-form-label text-left" style="color:black;">Department</label>
                                          <div class="col-md-4">
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="Body Plant 2">
                                            </div>
                                            <label class="col-md-2 col-form-label text-left" style="color:black;">Category</label>
                                            <div class="col-md-4">
                                            <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="Improvement">
                                            </div>
                                        </div>                                  
                                        <div class="form-group row">
                                          <label class="col-md-2 col-form-label text-left" style="color:black;">Proposal</label>
                                          <div class="col-md-10">
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="Making robot spot">
                                          </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                          <h4 class="col-md-12 modal-title text-left" style="color:black;">STEP ASSIGMENT</h4>                                      
                                        </div>
                                        <div class="form-group row text-left">
                                          <label class="col-md-2 col-form-label " style="color:black;">Step</label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="1.Quatation">
                                          </div>
                                          <label class="col-md-2 col-form-label " style="color:black;">Date</label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Tanggal" autocomplete="off" value="22 April 2022">
                                          </div>
                                        </div>
                                        <div class="form-group row text-left">
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="2.Assignment">
                                          </div>
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Tanggal" autocomplete="off" value="22 April 2022">
                                          </div>
                                        </div>
                                        
                                        <hr>
                                        <div class="form-group row text-left">
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                              <div class="form-group">
                                                <select class="form-control">
                                                  <option>Pilih Step</option>                                                                                                                                        
                                                  <option>3.Request for Negoisasi</option>                                                                             
                                                  <option>4.Price Confirmation 	</option>                                                                             
                                                  <option>5.Budget Planning</option>                                                                             
                                                </select>
                                              </div>
                                          </div>
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                          <input type="date" class="form-control" name="name" placeholder=" Tanggal" autocomplete="off">
                                          </div>
                                        </div>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Reset</button>
                                    <button type="button" class="btn btn-primary">Save</button>
                                  </div>
                                </div>
                              </div>
                          </div>
                        <!-- End Edit plannning proposal 2-->  
                          <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                            <button type="button" class="btn btn-icon btn-danger HapusData">
                              <i class="icon oi-trashcan" aria-hidden="true"></i>
                            </button>
                          </a> 
                            </button>
                          </a> 
                        </td>
                      </tr>
                      <tr>
                      <td class="align-middle text-center" >3</td>
                        <td class="align-middle text-center" >BQC</td>
                        <td class="align-middle text-center" >Replacement</td>
                        <td class="align-middle text-center">Jig Under Body Pick</td>
                        <td class="align-middle text-center"> 
                          <a href="" data-toggle="tooltip" data-original-title="22 April 2022">                                     
                          <img src="image/ok.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" width="40px">  
                          </a>       
                        </td>
                        <td class="align-middle text-center"> 
                          <a href="" data-toggle="tooltip" data-original-title="22 April 2022">                                     
                          <img src="image/ok.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" width="40px">  
                          </a>       
                        </td>
                        <td class="align-middle text-center"> 
                          <a href="" data-toggle="tooltip" data-original-title="22 April 2022">                                     
                          <img src="image/ok.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" width="40px">  
                          </a>       
                        </td>
                        <td class="align-middle text-center"></td>
                        <td class="align-middle text-center"></td>
                        <td class="align-middle text-center">
                          <div class="progress mt-20">
                            <div class="progress-bar progress-bar-striped active" aria-valuenow="60" aria-valuemin="0"
                              aria-valuemax="100" style="width: 60%" role="progressbar">
                              60%
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center">
                          <a data-toggle="tooltip" data-original-title="Edit">
                            <button type="button" class="btn btn-icon btn-success" data-toggle="modal" data-target="#EditPlaningProposal3">
                              <i class="icon wb-edit" aria-hidden="true"></i>
                            </button>
                          </a>
                          <!-- Modal Edit plannning proposal 3 -->
                          <div class="modal fade modal-info " id="EditPlaningProposal3" aria-hidden="true" aria-labelledby="EditPlaningProposal3"
                            role="dialog" tabindex="-1">
                              <div class="modal-dialog modal-simple modal-center modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                    <h3 class="modal-title">Edit Planning Proposal</h3>
                                  </div>
                                  <div class="row">
                                  </div>
                                  <div class="modal-body">
                                    <form>
                                      <div class="form-group row">
                                          <h4 class="col-md-12 modal-title text-left" style="color:black;">SUBJECT</h4>                                      
                                        </div>
                                      <div class="form-group row">
                                          <label class="col-md-2 col-form-label text-left" style="color:black;">Department</label>
                                          <div class="col-md-4">
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="BQC">
                                            </div>
                                            <label class="col-md-2 col-form-label text-left" style="color:black;">Category</label>
                                            <div class="col-md-4">
                                            <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="Replacement">
                                            </div>
                                        </div>                                  
                                        <div class="form-group row">
                                          <label class="col-md-2 col-form-label text-left" style="color:black;">Proposal</label>
                                          <div class="col-md-10">
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="Jig Under Body Pick">
                                          </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                          <h4 class="col-md-12 modal-title text-left" style="color:black;">STEP ASSIGMENT</h4>                                      
                                        </div>
                                        <div class="form-group row text-left">
                                          <label class="col-md-2 col-form-label " style="color:black;">Step</label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="1.Quatation">
                                          </div>
                                          <label class="col-md-2 col-form-label " style="color:black;">Date</label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Tanggal" autocomplete="off" value="22 April 2022">
                                          </div>
                                        </div>
                                        <div class="form-group row text-left">
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="2.Assignment">
                                          </div>
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Tanggal" autocomplete="off" value="22 April 2022">
                                          </div>
                                        </div>
                                        <div class="form-group row text-left">
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="3.Request for Negoisasi">
                                          </div>
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Tanggal" autocomplete="off" value="22 April 2022">
                                          </div>
                                        </div>
                                        
                                        <hr>
                                        <div class="form-group row text-left">
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                              <div class="form-group">
                                                <select class="form-control">
                                                  <option>Pilih Step</option>                                                                                                                                        
                                                  <option>4.Price Confirmation</option>                                                                             
                                                  <option>5.Budget Planning</option>                                                                             
                                                </select>
                                              </div>
                                          </div>
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                          <input type="date" class="form-control" name="name" placeholder=" Tanggal" autocomplete="off">
                                          </div>
                                        </div>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Reset</button>
                                    <button type="button" class="btn btn-primary">Save</button>
                                  </div>
                                </div>
                              </div>
                          </div>
                        <!-- End Edit plannning proposal 3-->  
                          <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                            <button type="button" class="btn btn-icon btn-danger HapusData">
                              <i class="icon oi-trashcan" aria-hidden="true"></i>
                            </button>
                          </a> 
                            </button>
                          </a> 
                        </td>
                      </tr>
                      <tr>
                        <td class="align-middle text-center">4</td>
                        <td class="align-middle text-center">Body Plant 1</td>
                        <td class="align-middle text-center" >Other</td>
                        <td class="align-middle text-center">Laptop Hp</td>
                        <td class="align-middle text-center"> 
                          <a href="" data-toggle="tooltip" data-original-title="22 April 2022">                                     
                          <img src="image/ok.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" width="40px">  
                          </a>       
                        </td>
                        <td class="align-middle text-center"> 
                          <a href="" data-toggle="tooltip" data-original-title="22 April 2022">                                     
                          <img src="image/ok.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" width="40px">  
                          </a>       
                        </td>
                        <td class="align-middle text-center"> 
                          <a href="" data-toggle="tooltip" data-original-title="22 April 2022">                                     
                          <img src="image/ok.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" width="40px">  
                          </a>       
                        </td>
                        <td class="align-middle text-center"></td>
                        <td class="align-middle text-center"></td>
                        <td class="align-middle text-center">
                          <div class="progress mt-20">
                            <div class="progress-bar progress-bar-striped active" aria-valuenow="60" aria-valuemin="0"
                              aria-valuemax="100" style="width: 60%" role="progressbar">
                              60%
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center">
                          <a  data-toggle="tooltip" data-original-title="Edit">
                            <button type="button" class="btn btn-icon btn-success"  data-toggle="modal" data-target="#EditPlaningProposal4">
                              <i class="icon wb-edit" aria-hidden="true"></i>
                            </button>
                          </a>
                          <!-- Modal Edit plannning proposal 3 -->
                          <div class="modal fade modal-info " id="EditPlaningProposal4" aria-hidden="true" aria-labelledby="EditPlaningProposal4"
                            role="dialog" tabindex="-1">
                              <div class="modal-dialog modal-simple modal-center modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                    <h3 class="modal-title">Edit Planning Proposal</h3>
                                  </div>
                                  <div class="row">
                                  </div>
                                  <div class="modal-body">
                                    <form>
                                      <div class="form-group row">
                                          <h4 class="col-md-12 modal-title text-left" style="color:black;">SUBJECT</h4>                                      
                                        </div>
                                      <div class="form-group row">
                                          <label class="col-md-2 col-form-label text-left" style="color:black;">Department</label>
                                          <div class="col-md-4">
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="Body Plant 1">
                                            </div>
                                            <label class="col-md-2 col-form-label text-left" style="color:black;">Category</label>
                                            <div class="col-md-4">
                                            <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="Other">
                                            </div>
                                        </div>                                  
                                        <div class="form-group row">
                                          <label class="col-md-2 col-form-label text-left" style="color:black;">Proposal</label>
                                          <div class="col-md-10">
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="Laptop Hp">
                                          </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                          <h4 class="col-md-12 modal-title text-left" style="color:black;">STEP ASSIGMENT</h4>                                      
                                        </div>
                                        <div class="form-group row text-left">
                                          <label class="col-md-2 col-form-label " style="color:black;">Step</label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="1.Quatation">
                                          </div>
                                          <label class="col-md-2 col-form-label " style="color:black;">Date</label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Tanggal" autocomplete="off" value="22 April 2022">
                                          </div>
                                        </div>
                                        <div class="form-group row text-left">
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="2.Assignment">
                                          </div>
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Tanggal" autocomplete="off" value="22 April 2022">
                                          </div>
                                        </div>
                                        <div class="form-group row text-left">
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="3.Request for Negoisasi">
                                          </div>
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                          <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Tanggal" autocomplete="off" value="22 April 2022">
                                          </div>
                                        </div>
                                        
                                        <hr>
                                        <div class="form-group row text-left">
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                              <div class="form-group">
                                                <select class="form-control">
                                                  <option>Pilih Step</option>                                                                                                                                        
                                                  <option>4.Price Confirmation</option>                                                                             
                                                  <option>5.Budget Planning</option>                                                                             
                                                </select>
                                              </div>
                                          </div>
                                          <label class="col-md-2 col-form-label " style="color:black;"></label>
                                          <div class="col-md-4">                                      
                                          <input type="date" class="form-control" name="name" placeholder=" Tanggal" autocomplete="off">
                                          </div>
                                        </div>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Reset</button>
                                    <button type="button" class="btn btn-primary">Save</button>
                                  </div>
                                </div>
                              </div>
                          </div>
                        <!-- End Edit plannning proposal 3-->  
                          <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                            <button type="button" class="btn btn-icon btn-danger HapusData">
                              <i class="icon oi-trashcan" aria-hidden="true"></i>
                            </button>
                          </a> 
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
          <!-- End Third Right -->
          <!-- End Third Row -->
        </div>
      </div>
    </div>
    <!-- End Page -->
<div id="dataTabel"></div>
<!-- Footer -->
<?php
include 'elemen/footer.php';?>
<!-- #################################################################################### -->
<script>
  var ctx = document.getElementById("myBar2").getContext('2d');
		var myBar2 = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Aprl", "Mei", "Jun", "July", "Agst", "Sept", "Oct","Nov","Dec","Jan","Feb","March"],
				datasets: [
                  {
                    type : 'line',
                    label: "AKUMULASI KONSUMSI",                    
                    borderColor: Config.colors("green", 800), 
                    hoverBackgroundColor: Config.colors("green", 200),                                     
                    data: [1250,2000,2500,3000,3500,4000,4500,],
                    order:2,
                  },
                  {
                    type : 'line',
                    label: "BUDGET  BODY DIVISION",                    
                    borderColor: Config.colors("grey", 800),                                      
                    data: [10000, 10000, 10000, 10000,10000, 10000, 10000,10000, 10000, 10000,10000, 10000,],
                    order:1,
                  },
                  { 
                    label: "BODY PLANT 1",
                    backgroundColor: "rgba(255, 206, 86, 0.2)",
                    borderColor: Config.colors("yellow", 800),
                    hoverBackgroundColor: "rgba(255, 206, 86, 0.2)",
                    borderWidth: 2,
                    data: [650, 450, 750, 500, 600, 450, 550]
                  }, 
                  {
                    label: "BODY PLANT  2",
                    backgroundColor: "rgba(255, 99, 132, 0.2)",
                    borderColor: Config.colors("red", 800),
                    hoverBackgroundColor: "rgba(255, 99, 132, 0.2)",
                    borderWidth: 2,
                    data: [300, 200, 400, 250, 450, 350, 400]
                  },    
                  {
                    label: "BQC",
                    backgroundColor: "rgba(98, 168, 234, .2)",
                    borderColor: Config.colors("purple", 800),
                    hoverBackgroundColor: "rgba(98, 168, 234, .3)",
                    borderWidth: 2,
                    data: [300, 200, 400, 205, 450, 350, 400]
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

<script>
$('#tambahdata').on('submit',function(e){
  e.preventDefault ();
    var body1 = $('#body1').val();
    var body2 = $('#body2').val();
    var bqc = $('#bqc').val();
    var startfiscal = $ ('#startfiscal').val();
    console.log(startfiscal)
    $.ajax ({
      type : 'POST',
      url : "tambahdata.php",
      data : {
        body1 : body1,
        body2 : body2,
        bqc : bqc,
        startfiscal : startfiscal
      },
      success :  function (hasil){
       
        $('#dataTabel').html (hasil);
        
      }
    })
})
</script>

<script>
$(document).on('change', '#startfiscal',function(){
    var endfiscal = parseInt($(this).val())+1;
    $('#tahun_end').html ('<option id ="tahun_end" value="' + endfiscal + '" selected>Mar '+endfiscal+'</option>');
})
</>
<script>
 $(document).on('click', '#reset',function(){ 
  $('#tahun_end').html ('<option id ="tahun_end" value="" selected>Pilih...</option>');


})
</script>