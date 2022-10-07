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
      <li class="site-menu-item has-sub active open">
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
        <h1 class="page-title font-size-26 font-weight-600">Tracking Document</h1>
      </div>

      
      <div class="page-content container-fluid">
        <div class="row">     
          <!-- First Row -->          
          <div class="col-lg-12 col-md-12">
            <div class="card card-shadow bg-blue-100" style="border-radius: 10px;">
              <div class="card-header card-header-transparent"> 
                <div class="panel-heading">
                  <h3 class=" text-left">SUBJECT</h3>
                  <hr style="border-color:grey;">
                </div>  
              </div>            
              <div class="row card-body">
                  <div class="col-lg-4 col-md-4">
                    <h4>Department</h4>
                        <form autocomplete="off">                      
                          <div class="form-group">
                            <select class="form-control">
                              <option>Pilih Department</option>
                              <option>BODY PLANT 1</option>
                              <option>BODY PLANT 2</option>
                              <option>BQC</option>                      
                            </select>                            
                          </div>                            
                      </form>                      
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <h4>Cost Type</h4>
                        <form autocomplete="off">                      
                          <div class="form-group">
                            <select class="form-control">
                              <option>Jenis Cost</option>
                              <option>Improvement</option>
                              <option>Yearly Investment</option>                      
                            </select>
                          </div>                            
                      </form>                      
                  </div>  
                 
                  <div class="col-lg-4 col-md-4">
                    <h4>NO. IA</h4>
                    <div class="row">
                        <div class="col-lg-5 col-md-5">
                            <form autocomplete="off">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Kode Depart.</option>
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-1 col-md-1">
                          <span class="font-size-20">-</span>
                        </div> 
                        <div class="col-lg-6 col-md-6">
                            <form autocomplete="off">
                                <div class="form-group " data-plugin="formMaterial">
                                    <input type="text"class="form-control " name="inputFloatingLarge"
                                        placeholder="5 Angka Belakang">
                                </div>
                              </form>
                        </div> 
                      </div>   
                  </div>
                <div class="card-footer col-lg-12 col-md-12 text-md-right bg-blue-100">
                  <a href="" data-toggle="tooltip" data-original-title="Reset">
                          <button type="button" class="btn btn-danger">
                            RESET
                          </button>
                          </a>
                      <a href="" data-toggle="tooltip" data-original-title="Search">
                        <button type="button" class="btn btn-success btn-icon ">
                          <i class="icon wb-search" aria-hidden="true"></i>SEARCH
                        </button>
                      </a>
                </div>
                                                   
              </div>
              
                                 
            </div>
          </div>
            <!-- End first -->

            <!-- Second Row -->          
          <div class="col-lg-12 col-md-12">
            <div class="card card-shadow" style="border-radius: 10px;">
              <div class="card-header card-header-transparent"> 
                <div class="row">
                  <div class="col-lg-4 col-md-4">
                    <div class="panel-heading">
                      <h4 class=" text-left">P4/BDY/IP/07/21/I.4 .04.C-00005</h4> <hr style="border-color:grey;">
                      <h5 class=" text-left">Procurement NB For Support Production</h5><hr style="border-color:grey;">
                    </div>                 
                  </div>
                  <div class="col-lg-8 col-md-8">
                    <div class="float-right">                  
                      <a href=""  data-toggle="tooltip" data-original-title="Tambah Data">
                          <button type="button" class="btn btn-icon btn-outline btn-info btn-xs">
                            <i class="icon wb-plus" aria-hidden="true"></i>
                          </button>
                      <a href="" data-toggle="tooltip" data-original-title="Edit">
                        <button type="button" class="btn btn-success btn-icon btn-outline btn-xs">
                          <i class="icon wb-edit" aria-hidden="true"></i>
                        </button>
                      </a>
                      <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                        <button type="button" class="btn btn-icon btn-danger btn-icon btn-outline btn-xs HapusData">
                          <i class="icon oi-trashcan" aria-hidden="true"></i>
                        </button>
                      </a> 
                    </div>   
                  </div>
                </div>   
                
                   
                
                <div class="row py-20">
                  <div class="col-lg-12 col-md-12">
                      <div class="pearls row">
                        <div class="pearl current col-3">
                          <div class="pearl-icon"><i class="icon wb-user" aria-hidden="true"></i></div>
                            <h3 class="pearl-tittle">RSS/RFN</h3>
                            <br>
                            <div class="list-group bg-blue-grey-100 bg-inherit text-left w-250 ml-5">
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                  PIC<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                  SECT.HEAD<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                  DEPT.HEAD<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                  DIV.HEAD<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                
                            </div>  
                        </div>
                         
                          
                          <div class="pearl col-3">
                            <div class="pearl-icon"><i class="icon wb-pencil" aria-hidden="true"></i></div>
                            <h3 class="pearl-tittle">BP/BPE APPROVAL</h3>
                            <br>
                            <div class="list-group bg-blue-grey-100 bg-inherit text-left w-250 ml-3">
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                    CREATE<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                 
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                  DEPT.HEAD<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                 
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                  TAGGING<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                 
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                  MAXIMO<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                 
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                  FAM<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                 
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                  DIV.HEAD<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                 
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                  DIR (I)<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                 
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                  DIR (J)<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                 
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                  FIN (I)<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                 
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                  FIN (J)<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                 
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                  VPD<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                 
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                  PD<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                 
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                  BUDGET (I)<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                 
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                  BUDGET (J)<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                 
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                  IO<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                 
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                  AMCF<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                 
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                  PR<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                 
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                  PO<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                 
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                  SEND PO<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                 
                            </div> 
                          </div>

                          <div class="pearl col-3">
                            <div class="pearl-icon"><i class="icon wb-payment" aria-hidden="true"></i></div>
                            <h3 class="pearl-tittle" data-toggle="dropdown">PR</h3>
                            <br>
                            <div class="list-group bg-blue-grey-100 bg-inherit text-left w-250 ml-10">
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                    PUD<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                
                            </div>                            
                          </div>

                          <div class="pearl col-3">
                            <div class="pearl-icon"><i class="icon fa-shopping-cart" aria-hidden="true"></i></div>
                            <h3 class="pearl-tittle">GR</h3>
                            <br>
                            <div class="list-group bg-blue-grey-100 bg-inherit text-left w-250 ml-10">
                              <div class="list-group-item blue-grey-500">                              
                                  <i class="icon wb-check" aria-hidden="true"></i>
                                    GOOD RECEIVE<br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>12 Juni 2022 | 17.30 wib <br>
                                    <i class="icon wb-user" aria-hidden="true"></i>by Effendi
                                </div>                                
                              
                            </div>       
                          </div>
                                            
                    </div>
                  </div>
                </div>
              </div>                    
            </div>
          </div>
          <!-- End second -->     
        </div>    
        
      </div>
    </div>
    
    <!-- End Page -->

<!-- Footer -->
<?php
include '../elemen/footer.php';?>