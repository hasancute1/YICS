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
      <li class="site-menu-item has-sub active open">
        <a href="javascript:void(0)">
                <i class="site-menu-icon wb-table" aria-hidden="true"></i>
                <span class="site-menu-title">CONTROL TABLES</span>
                        <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
          <li class="site-menu-item ">
            <a class="animsition-link" href="controltabledep1.php">
              <span class="site-menu-title">Body Plant 1</span>
            </a>
          </li>
          <li class="site-menu-item">
            <a class="animsition-link" href="controltabledep2.php">
              <span class="site-menu-title">Body Plant 2</span>
            </a>
          </li>
          <li class="site-menu-item active open">
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
            <li class="site-menu-item has-sub ">
        <a href="javascript:void(0)">
                <i class="site-menu-icon fa-database" aria-hidden="true"></i>
                <span class="site-menu-title">BUDGET</span>
                      <span class="site-menu-arrow"></span>                        
            </a>
        <ul class="site-menu-sub">
          <li class="site-menu-item">
            <a class="animsition-link" href="budgetdep1.php">
              <span class="site-menu-title">Body Plant 1</span>
            </a>
          </li>
          <li class="site-menu-item">
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
        <h1 class="page-title font-size-26 font-weight-600">Control Table BQC (x Million)</h1>
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

      <div class="col-lg-12 col-md-12" id="ecommerceRecentOrder">
            <div class="card card-shadow">
              <div class="card-header card-header-transparent">                                   
                <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="row"> 
                      <div class="col-lg-6 col-md-6">
                        <div class="float-left">
                           <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="icon wb-search" aria-hidden="true"></i></button>
                                  </span>
                                  <input type="text" class="form-control" name="" placeholder="Search...">
                                </div>
                              </div>   
                          </div>                    
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="float-right">            
                          <a href="" data-toggle="tooltip" data-original-title="View">
                            <button type="button" class="btn btn-success btn-icon btn-outline">
                              <i class="icon wb-eye" aria-hidden="true"></i>
                            </button>
                          </a>
                          <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Print">
                            <button type="button" class="btn btn-icon btn-warning btn-outline">
                              <i class="icon wb-print" aria-hidden="true"></i>
                            </button>
                          <a data-toggle="tooltip" data-original-title="Tambah Data">
                            <button type="button" class="btn btn-icon btn-outline btn-info" data-toggle="modal" data-target="#TambahControlTableBody1">
                              <i class="icon wb-plus" aria-hidden="true"></i>
                            </button>
                          </a> 
                          <!-- Modal Tammbah Data Control  Table Body 1 -->
                          <div class="modal fade modal-info " id="TambahControlTableBody1" aria-hidden="true" aria-labelledby="TambahControlTableBody1"
                            role="dialog" tabindex="-1">
                              <div class="modal-dialog modal-simple modal-center modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                    <h3 class="modal-title">Input Investment Planning Control Table</h3>
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
                                    <hr>
                                    <div class="form-group row">
                                      <h4 class="col-md-12 modal-title text-left" style="color:black;">BUDGET</h4>                                      
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-md-2 col-form-label mt-4" style="color:black;">In RP</label>
                                      <div class="col-md-4">
                                      <span style="color:red;font-size: 13px;font-style: italic;">*(Sisa budget Rp 300)</span>
                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">RP</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Nominal Rupiah">
                                        </div>
                                      </div>
                                      <label class="col-md-2 col-form-label mt-4" style="color:black;">In JPY</label>
                                      <div class="col-md-4">
                                      <span style="color:red;font-size: 13px;font-style: italic;">*(Sisa budget YJP 300)</span>
                                      <div class="input-group">                                      
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">JPY</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Nominal Yen">
                                        </div>
                                      </div>
                                    </div>
                                </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Reset</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </div>
                                </div>
                              </div>
                          </div>
                        <!-- End Modal Tammbah Data Control  Table Body 1-->  
                        </div>   
                      </div>                                      
                    </div>                       
                  </div>                    
                </div>
                <div class="table-responsive table table-bordered text-center 10px table-striped text-nowrap">
                <table class="table">           
               <thead class="table-info">
                  <tr>                
                      <th class="judul align-middle text-center" colspan="6">INVESTMENT PLANNING CONTROL TABLE</th>
                      <th class="judul align-middle text-center" colspan="14">IMPLEMENTATION CONTROL TABLE</th>
                  </tr>
                  <tr>
                      <th class="judul align-middle text-center" rowspan="2" style="width:200px;" colspan="1">NO</th>
                      <th class="judul align-middle text-center" rowspan="2" style="width :500px;">DEPEARTMENT</th>
                      <th class="judul align-middle text-center" rowspan="2" style="width :500px;">CATEGORY</th>
                      <th class="judul align-middle text-center" rowspan="2" style="width :500px;">DESCRIPTION</th>
                      <th class="judul align-middle text-center" rowspan="2" style="width: 300px;">TOTAL MILL JPY</th>
                      <th class="judul align-middle text-center" rowspan="2" style="width: 300px;">TOTAL MILL IDR</th>
                      <th class="judul align-middle text-center" rowspan="2" style="width:20px;" >No</th>
                      <th class="judul align-middle text-center" colspan="2" style="width:300px;">IA No.</th>
                      <th class="judul align-middle text-center" rowspan="2" style="width:300px;">DESCRIPTION</th>
                      <th class="judul align-middle text-center" colspan="3" style="width:300px;">Original Currency</th>
                      <th class="judul align-middle text-center" colspan="2" style="width:300px;">Actual In</th>        
                      <th class="judul align-middle text-center" colspan="2" style="width:300px;">Remaining</th>
                      <th class="judul align-middle text-center" rowspan="2" style="width: 200px;" >Valid Until</th>
                      <th class="judul align-middle text-center">Remark</th>
                      <th class="judul align-middle text-center table-danger" rowspan="2" style="width: 200px;" >Action</th>

                  </tr>
                  <tr>
                      <th class="align-middle text-center" style="width: 400px;">Subject</th>
                      <th class="align-middle text-center" style="width: 400px;">IO</th>
                      <th class="align-middle text-center" style="width: 100px;">JPY</th>
                      <th class="align-middle text-center" style="width: 100px;">Rp</th>
                      <th class="align-middle text-center" style="width: 100px;">1000USD</th>
                      <th class="align-middle text-center" style="width: 100px;">JPY</th>
                      <th class="align-middle text-center" style="width: 100px;">Rp</th>
                      <th class="align-middle text-center" style="width: 100px;">JPY</th>
                      <th class="align-middle text-center" style="width: 100px;">Rp</th>
                      <th class="align-middle text-center" style="width: 100 px">CT Updated</th>           
                  </tr> 
                  
              </thead>
              <tbody>

                                
                  
                  <tr>
                      <td class="align-middle text-center">1</td>
                      <td class="align-middle text-center">BQC</td>
                      <td class="align-middle text-center">IMPROVEMENT</td>
                      <td class="align-middle text-center" data-target="#EditControlTableBody1" data-toggle="modal">ADDITIONAL ACCESS DOOR OFFICE CPM QRE</td>
                      <td class="align-middle text-center">1,7</td>
                      <td class="align-middle text-center">200</td>
                      <td class="align-middle text-center">1</td>
                      <td class="align-middle text-center">P4/BDY/IP/07/21/I.4 .04.C-00005</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">Procurement NB For Support Production</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">35,92</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">0,3</td>
                      <td class="align-middle text-center">35,92</td>
                      <td class="align-middle text-center">1,4</td>
                      <td class="align-middle text-center">164,08</td>
                      <td class="align-middle text-center">31-MAR-22</td>
                      <td class="align-middle text-center">M.Efendi</td>
                      <td class="align-middle text-center" >
                            <a data-toggle="tooltip" data-original-title="Edit">
                              <button type="button" class="btn btn-icon btn-success" data-target="#EditControlTableBody1" data-toggle="modal">
                                <i class="icon wb-edit" aria-hidden="true"></i>
                              </button> 
                            </a>
                            <!-- Modal Tammbah Data Control  Table Body 1 -->
                          <div class="modal fade modal-info " id="EditControlTableBody1" aria-hidden="true" aria-labelledby="EditControlTableBody1"
                            role="dialog" tabindex="-1">
                              <div class="modal-dialog modal-simple modal-center modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                    <h3 class="modal-title">Input Implementation Control Table</h3>
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
                                        <input type="text" class="form-control  bg-grey-200" name="name" placeholder="Division Yourself" autocomplete="off" value="BQC">
                                          </div>
                                        </div>
                                      <label class="col-md-2 col-form-label text-left" style="color:black;">Category</label>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                        <input type="text" class="form-control  bg-grey-200" name="name" placeholder="Division Yourself" autocomplete="off" value="Improvement">
                                          </div>
                                        </div>
                                    </div>                                    
                                    <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-left" style="color:black;">Proposal</label>
                                      <div class="col-md-10">
                                      <input type="text" class="form-control  bg-grey-200" name="name" placeholder="Division Yourself" autocomplete="off" value="Additional Acces Door Office CPM QRE">
                                      </div>
                                    </div> 
                                    <div class="form-group row">
                                      <h4 class="col-md-12 modal-title text-left" style="color:black;">IA NO.</h4>                                      
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-left" style="color:black;">IA No.</label>
                                      <div class="col-md-10">
                                      <input type="text" class="form-control" name="name" placeholder="Diisi No. IA" autocomplete="off" >
                                      </div>
                                    </div>  
                                    <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-left" style="color:black;">Description</label>
                                      <div class="col-md-10">
                                      <input type="text" class="form-control" name="name" placeholder="Diisi Deskripsi" autocomplete="off" >
                                      </div>
                                    </div>
                                    <div class="form-group row text-left">
                                      <h4 class="col-md-12 modal-title text-left" style="color:black;">Original Currency</h4>                                      
                                    </div>
                                    <div class="form-group row text-left">
                                      <label class="col-md-2 col-form-label mt-4" style="color:black;">In RP</label>
                                      <div class="col-md-4">
                                      <span style="color:red;font-size: 13px;font-style: italic;">*(Sisa budget Rp 300)</span>
                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">RP</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Nominal Rupiah">
                                        </div>
                                      </div>
                                      <label class="col-md-2 col-form-label mt-4" style="color:black;">In JPY</label>
                                      <div class="col-md-4">
                                      <span style="color:red;font-size: 13px;font-style: italic;">*(Sisa budget YJP 300)</span>
                                      <div class="input-group">                                      
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">JPY</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Nominal Yen">
                                        </div>
                                      </div>
                                    </div>   
                                    <div class="form-group row">
                                      <h4 class="col-md-12 modal-title text-left" style="color:black;">Valid Update</h4>                                      
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-left" style="color:black;">Valid Until </label>
                                      <div class="col-md-4">
                                      <input type="date" class="form-control" name="name" placeholder="Diisi tanggal updaate" autocomplete="off" >
                                      </div>
                                      <label class="col-md-2 col-form-label text-left" style="color:black;">Remark Ct Update</label>
                                      <div class="col-md-4">
                                      <input type="text" class="form-control" name="name" placeholder="Diisi PIC Update" autocomplete="off" >
                                      </div>
                                    </div>  
                                    
                                    
                                </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Reset</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </div>
                                </div>
                              </div>
                          </div>
                        <!-- End Modal Tammbah Data Control  Table Body 1-->  
                            <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                              <button type="button" class="btn btn-icon btn-danger HapusData">
                                <i class="icon oi-trashcan" aria-hidden="true"></i>
                              </button>
                            </a> 
                      </td>
                  </tr>
                  <tr style="text-align: center;">
                      <td class="align-middle text-center">2</td>
                      <td class="align-middle text-center">BQC</td>
                      <td class="align-middle text-center">IMPROVEMENT</td>
                      <td class="align-middle text-center">XVL SOFTWARE & HARDWARE CPM ( 1 Unit )</td>
                      <td class="align-middle text-center">1,7</td>
                      <td class="align-middle text-center">191</td>
                      <td class="align-middle text-center">1</td>
                      <td class="align-middle text-center">P4/BDY/IP/07/21/I.4 .04.C-00006</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">Procurement HP Zbook Fury I7 G7 Mobile Workstation</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">49,955</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">0,4</td>
                      <td class="align-middle text-center">49,96</td>
                      <td class="align-middle text-center">1,2</td>
                      <td class="align-middle text-center">141,05</td>
                      <td class="align-middle text-center">31-MAR-22</td>
                      <td class="align-middle text-center">M.Efendi</td>
                      <td class="align-middle text-center" >
                            <a href="" data-toggle="tooltip" data-original-title="Edit">
                              <button type="button" class="btn btn-icon btn-success">
                                <i class="icon wb-edit" aria-hidden="true"></i>
                              </button>
                            </a>
                            <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                              <button type="button" class="btn btn-icon btn-danger HapusData">
                                <i class="icon oi-trashcan" aria-hidden="true"></i>
                              </button>
                            </a> 
                      </td>
                  </tr>
                  <tr style="text-align: center;">
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">2</td>
                      <td class="align-middle text-center">P4/BDY/IP/01/22/I.4 .04.C-00012</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">Procurement XVL Software for Accuracy Check</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">115,096 </td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">1,0</td>
                      <td class="align-middle text-center">115,10</td>
                      <td class="align-middle text-center">(1,0)</td>
                      <td class="align-middle text-center">-115,0</td>
                      <td class="align-middle text-center">31-MAR-22</td>
                      <td class="align-middle text-center">M.Efendi</td>
                      <td class="align-middle text-center" >
                            <a href="" data-toggle="tooltip" data-original-title="Edit">
                              <button type="button" class="btn btn-icon btn-success">
                                <i class="icon wb-edit" aria-hidden="true"></i>
                              </button>
                            </a>
                            <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                              <button type="button" class="btn btn-icon btn-danger HapusData">
                                <i class="icon oi-trashcan" aria-hidden="true"></i>
                              </button>
                            </a> 
                      </td>
                  </tr>
                  <tr style="text-align: center;">
                      <td class="align-middle text-center">3</td>
                      <td class="align-middle text-center">BQC</td>
                      <td class="align-middle text-center">IMPROVEMENT</td>
                      <td class="align-middle text-center">SOLIDWORK SIMULATION STANDARD NETWORK & JIG SIMULATION WITH PLC SYSTEM</td>
                      <td class="align-middle text-center">1,3</td>
                      <td class="align-middle text-center">145</td>
                      <td class="align-middle text-center">1</td>
                      <td class="align-middle text-center">P4/BDY/IP/06/21/I.4 .04.C-00002</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">Procurement AC Daikin 2 PK</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">6,2</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">0,1</td>
                      <td class="align-middle text-center">6,20</td>
                      <td class="align-middle text-center">1,2</td>
                      <td class="align-middle text-center">138,80</td>
                      <td class="align-middle text-center">31-MAR-22</td>
                      <td class="align-middle text-center">M.Efendi</td>
                      <td class="align-middle text-center" >
                            <a href="" data-toggle="tooltip" data-original-title="Edit">
                              <button type="button" class="btn btn-icon btn-success">
                                <i class="icon wb-edit" aria-hidden="true"></i>
                              </button>
                            </a>
                            <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                              <button type="button" class="btn btn-icon btn-danger HapusData">
                                <i class="icon oi-trashcan" aria-hidden="true"></i>
                              </button>
                            </a> 
                      </td>
                  </tr>
                  <tr style="text-align: center;">
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">2</td>
                      <td class="align-middle text-center">P4/BDY/IP/09/21/I.4 .04.C-00010</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">Procurement SOLIDWORKS Simulation Standard Network</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">113,73</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">1,0</td>
                      <td class="align-middle text-center">113,73</td>
                      <td class="align-middle text-center">(1,0)</td>
                      <td class="align-middle text-center">-113,73</td>
                      <td class="align-middle text-center">31-MAR-22</td>
                      <td class="align-middle text-center">M.Efendi</td>
                      <td class="align-middle text-center" >
                            <a href="" data-toggle="tooltip" data-original-title="Edit">
                              <button type="button" class="btn btn-icon btn-success">
                                <i class="icon wb-edit" aria-hidden="true"></i>
                              </button>
                            </a>
                            <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                              <button type="button" class="btn btn-icon btn-danger HapusData">
                                <i class="icon oi-trashcan" aria-hidden="true"></i>
                              </button>
                            </a> 
                      </td>
                  </tr>
                  <tr style="text-align: center;">
                      <td class="align-middle text-center">4</td>
                      <td class="align-middle text-center">BQC</td>
                      <td class="align-middle text-center">IMPROVEMENT</td>
                      <td class="align-middle text-center">WIFI ACCESS POINT CPM QRE</td>
                      <td class="align-middle text-center">0,3</td>
                      <td class="align-middle text-center">30,0</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">0,0</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">0,3</td>
                      <td class="align-middle text-center">30,00</td>
                      <td class="align-middle text-center">31-MAR-22</td>
                      <td class="align-middle text-center">M.Efendi</td>
                      <td class="align-middle text-center" >
                            <a href="" data-toggle="tooltip" data-original-title="Edit">
                              <button type="button" class="btn btn-icon btn-success">
                                <i class="icon wb-edit" aria-hidden="true"></i>
                              </button>
                            </a>
                            <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                              <button type="button" class="btn btn-icon btn-danger HapusData">
                                <i class="icon oi-trashcan" aria-hidden="true"></i>
                              </button>
                            </a> 
                      </td>
                  </tr>
                  <tr style="text-align: center;">
                      <td class="align-middle text-center">5</td>
                      <td class="align-middle text-center">BQC</td>
                      <td class="align-middle text-center">IMPROVEMENT</td>
                      <td class="align-middle text-center">TEACHING PENDANT STN 21 SERIES</td>
                      <td class="align-middle text-center">0,1</td>
                      <td class="align-middle text-center">12,0</td>
                      <td class="align-middle text-center">1</td>
                      <td class="align-middle text-center">P4/BDY/IP/09/21/I.4 .04.C-00008</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">Procurement Teaching Pendant For Check Portable Spot Welding</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">65,807</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">0,6</td>
                      <td class="align-middle text-center">65,81</td>
                      <td class="align-middle text-center">(0,5)</td>
                      <td class="align-middle text-center">-53,81</td>
                      <td class="align-middle text-center">31-MAR-22</td>
                      <td class="align-middle text-center">M.Efendi</td>
                      <td class="align-middle text-center" >
                            <a href="" data-toggle="tooltip" data-original-title="Edit">
                              <button type="button" class="btn btn-icon btn-success">
                                <i class="icon wb-edit" aria-hidden="true"></i>
                              </button>
                            </a>
                            <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                              <button type="button" class="btn btn-icon btn-danger HapusData">
                                <i class="icon oi-trashcan" aria-hidden="true"></i>
                              </button>
                            </a> 
                      </td>
                  </tr>
                  <tr style="text-align: center;">
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">1</td>
                      <td class="align-middle text-center">P4/BDY/IP/07/21/I.4 .04.C-00004</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">Procurement Ms.Project Software</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">35,64</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">0,3</td>
                      <td class="align-middle text-center">35,64</td>
                      <td class="align-middle text-center">(0,3)</td>
                      <td class="align-middle text-center">-35,64</td>
                      <td class="align-middle text-center">31-MAR-22</td>
                      <td class="align-middle text-center">M.Efendi</td>
                      <td class="align-middle text-center" >
                            <a href="" data-toggle="tooltip" data-original-title="Edit">
                              <button type="button" class="btn btn-icon btn-success">
                                <i class="icon wb-edit" aria-hidden="true"></i>
                              </button>
                            </a>
                            <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                              <button type="button" class="btn btn-icon btn-danger HapusData">
                                <i class="icon oi-trashcan" aria-hidden="true"></i>
                              </button>
                            </a> 
                      </td>
                  </tr>
                  <tr style="text-align: center;">
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">2</td>
                      <td class="align-middle text-center">P4/BDY/IP/08/21/I.4 .04.C-00007</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">Procurement MESIN ROLLDOOR SHINSEISEIKI USA400G220V</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">14,70</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">0,1</td>
                      <td class="align-middle text-center">14,70</td>
                      <td class="align-middle text-center">(0,1)</td>
                      <td class="align-middle text-center">-14,70</td>
                      <td class="align-middle text-center">31-MAR-22</td>
                      <td class="align-middle text-center">M.Efendi</td>
                      <td class="align-middle text-center" >
                            <a href="" data-toggle="tooltip" data-original-title="Edit">
                              <button type="button" class="btn btn-icon btn-success">
                                <i class="icon wb-edit" aria-hidden="true"></i>
                              </button>
                            </a>
                            <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                              <button type="button" class="btn btn-icon btn-danger HapusData">
                                <i class="icon oi-trashcan" aria-hidden="true"></i>
                              </button>
                            </a> 
                      </td>
                  </tr>
                  <tr style="text-align: center;">
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">3</td>
                      <td class="align-middle text-center">P4/BDY/IP/11/21/I.4 .04.C-00011</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">Procurement Measuring Portable Arm</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">3.420,00</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">29,7</td>
                      <td class="align-middle text-center">3.420,00</td>
                      <td class="align-middle text-center">(29,7)</td>
                      <td class="align-middle text-center">-3.420,00</td>
                      <td class="align-middle text-center">31-MAR-22</td>
                      <td class="align-middle text-center">M.Efendi</td>
                      <td class="align-middle text-center" >
                            <a href="" data-toggle="tooltip" data-original-title="Edit">
                              <button type="button" class="btn btn-icon btn-success">
                                <i class="icon wb-edit" aria-hidden="true"></i>
                              </button>
                            </a>
                            <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                              <button type="button" class="btn btn-icon btn-danger HapusData">
                                <i class="icon oi-trashcan" aria-hidden="true"></i>
                              </button>
                            </a> 
                      </td>
                  </tr>
                  
                  <tr style="text-align: center;">
                      <td class="align-middle text-center">6</td>
                      <td class="align-middle text-center">BQC</td>
                      <td class="align-middle text-center">REPLACEMENT</td>
                      <td class="align-middle text-center">REPLACEMENT JIG S/A UNDER BODY D40D</td>
                      <td class="align-middle text-center">17,0</td>
                      <td class="align-middle text-center">1959,9</td>
                      <td class="align-middle text-center">1</td>
                      <td class="align-middle text-center">P4/BDY/IP/07/21/R.4 .04.C-00001</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">Procurement Jig D40D ( Renewall Jig )</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">394,80</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">3,4</td>
                      <td class="align-middle text-center">394,80</td>
                      <td class="align-middle text-center">13,6</td>
                      <td class="align-middle text-center">1.565,10</td>
                      <td class="align-middle text-center">31-MAR-22</td>
                      <td class="align-middle text-center">M.Efendi</td>
                      <td class="align-middle text-center" >
                            <a href="" data-toggle="tooltip" data-original-title="Edit">
                              <button type="button" class="btn btn-icon btn-success">
                                <i class="icon wb-edit" aria-hidden="true"></i>
                              </button>
                            </a>
                            <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                              <button type="button" class="btn btn-icon btn-danger HapusData">
                                <i class="icon oi-trashcan" aria-hidden="true"></i>
                              </button>
                            </a> 
                      </td>
                  </tr>
                  <tr style="text-align: center;">
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">1</td>
                      <td class="align-middle text-center">P4/BDY/IP/07/21/R.4 .04.C-00002</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">Procurement HP Zbook Fury 17 G7 Mobile Workstation</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">0,0</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">0,0</td>
                      <td class="align-middle text-center">0,0</td>
                      <td class="align-middle text-center">31-MAR-22</td>
                      <td class="align-middle text-center">M.Efendi</td>
                      <td class="align-middle text-center" >
                            <a href="" data-toggle="tooltip" data-original-title="Edit">
                              <button type="button" class="btn btn-icon btn-success">
                                <i class="icon wb-edit" aria-hidden="true"></i>
                              </button>
                            </a>
                            <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                              <button type="button" class="btn btn-icon btn-danger HapusData">
                                <i class="icon oi-trashcan" aria-hidden="true"></i>
                              </button>
                            </a> 
                      </td>
                  </tr>
                  <tr style="text-align: center;">
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">2</td>
                      <td class="align-middle text-center">P4/BDY/IP/08/21/R.4 .04.C-00003</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">Procurement Jig Renewall D40D</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">744,66</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">6,5</td>
                      <td class="align-middle text-center">744,66</td>
                      <td class="align-middle text-center">(6,5)</td>
                      <td class="align-middle text-center">-744,66</td>
                      <td class="align-middle text-center">31-MAR-22</td>
                      <td class="align-middle text-center">M.Efendi</td>
                      <td class="align-middle text-center" >
                            <a href="" data-toggle="tooltip" data-original-title="Edit">
                              <button type="button" class="btn btn-icon btn-success">
                                <i class="icon wb-edit" aria-hidden="true"></i>
                              </button>
                            </a>
                            <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                              <button type="button" class="btn btn-icon btn-danger HapusData">
                                <i class="icon oi-trashcan" aria-hidden="true"></i>
                              </button>
                            </a> 
                      </td>
                  </tr>
                  <tr style="text-align: center;">
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">3</td>
                      <td class="align-middle text-center">P4/BDY/IP/10/21/R.4 .04.C-00004</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">Procurement Accessorize Equipment Jig D40D Renewall</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">630,25</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">5,5</td>
                      <td class="align-middle text-center">630,25</td>
                      <td class="align-middle text-center">(5,5)</td>
                      <td class="align-middle text-center">-630,25</td>
                      <td class="align-middle text-center">31-MAR-22</td>
                      <td class="align-middle text-center">M.Efendi</td>
                      <td class="align-middle text-center" >
                            <a href="" data-toggle="tooltip" data-original-title="Edit">
                              <button type="button" class="btn btn-icon btn-success">
                                <i class="icon wb-edit" aria-hidden="true"></i>
                              </button>
                            </a>
                            <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                              <button type="button" class="btn btn-icon btn-danger HapusData">
                                <i class="icon oi-trashcan" aria-hidden="true"></i>
                              </button>
                            </a> 
                      </td>
                  </tr>
                  <tr style="text-align: center;">
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">4</td>
                      <td class="align-middle text-center">P4/BDY/IP/10/21/R.4 .04.C-00005</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">Procurement Equipment Jig D40D Renewal</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">138,94</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">1,2</td>
                      <td class="align-middle text-center">138,94</td>
                      <td class="align-middle text-center">(1,2)</td>
                      <td class="align-middle text-center">-138,94</td>
                      <td class="align-middle text-center">31-MAR-22</td>
                      <td class="align-middle text-center">M.Efendi</td>
                      <td class="align-middle text-center" >
                            <a href="" data-toggle="tooltip" data-original-title="Edit">
                              <button type="button" class="btn btn-icon btn-success">
                                <i class="icon wb-edit" aria-hidden="true"></i>
                              </button>
                            </a>
                            <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                              <button type="button" class="btn btn-icon btn-danger HapusData">
                                <i class="icon oi-trashcan" aria-hidden="true"></i>
                              </button>
                            </a> 
                      </td>
                  </tr>
                  <tr style="text-align: center;">
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">5</td>
                      <td class="align-middle text-center">P4/BDY/IP/10/21/R.4 .04.C-00006</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">Procurement Jig SA Ctr Body Pillar No.2 D40D</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">83,85</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">0,7</td>
                      <td class="align-middle text-center">83,85</td>
                      <td class="align-middle text-center">(0,7)</td>
                      <td class="align-middle text-center">-83,85</td>
                      <td class="align-middle text-center">31-MAR-22</td>
                      <td class="align-middle text-center">M.Efendi</td>
                      <td class="align-middle text-center" >
                            <a data-toggle="tooltip" data-original-title="Edit">
                              <button type="button" class="btn btn-icon btn-success" data-target="#EditControlTableBody7" data-toggle="modal">
                                <i class="icon wb-edit" aria-hidden="true"></i>
                              </button>
                            </a>
                            <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                              <button type="button" class="btn btn-icon btn-danger HapusData">
                                <i class="icon oi-trashcan" aria-hidden="true"></i>
                              </button>
                            </a> 
                      </td>
                  </tr>
                  
                  <tr >
                      <td class="align-middle text-center">7</td>
                      <td class="align-middle text-center">BQC</td>
                      <td class="align-middle text-center">OTHER</td>
                      <td class="align-middle text-center">Shifting budget From PE Admin</td>
                      <td class="align-middle text-center">29,7</td>
                      <td class="align-middle text-center">3.420</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">0,0</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">29,7</td>
                      <td class="align-middle text-center">3.420</td>
                      <td class="align-middle text-center"></td>   
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center" >
                            <a href="" data-toggle="tooltip" data-original-title="Edit">
                              <button type="button" class="btn btn-icon btn-success">
                                <i class="icon wb-edit" aria-hidden="true"></i>
                              </button>
                            </a>
                            <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                              <button type="button" class="btn btn-icon btn-danger HapusData">
                                <i class="icon oi-trashcan" aria-hidden="true"></i>
                              </button>
                            </a> 
                      </td>
                  </tr>
                 
                  <tr class="table-success">                    
                      <td class="align-middle text-center" colspan="4">TOTAL</td> 
                      <td class="align-middle text-center">51,81</td>
                      <td class="align-middle text-center">Rp 5.957,90</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center">50,87</td>
                      <td class="align-middle text-center">Rp 5.849,54</td>                   
                      <td class="align-middle text-center">0,94</td>
                      <td class="align-middle text-center">Rp 108,36</td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                      <td class="align-middle text-center"></td>
                  </tr>
              </tbody>
            </table>  

                </div>
             
                
              </div>                    
              </div>
              
            </div>
          </div>
      
      
    </div>
    <!-- End Page -->

<!-- Footer -->
<?php
include '../elemen/footer.php';?>