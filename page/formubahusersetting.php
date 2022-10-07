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
      <li class="site-menu-item has-sub  ">
        <a href="javascript:void(0)">
                <i class="site-menu-icon fa-database" aria-hidden="true"></i>
                <span class="site-menu-title">BUDGET</span>
                      <span class="site-menu-arrow"></span>                        
            </a>
        <ul class="site-menu-sub">
          <li class="site-menu-item ">
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
      <li class="site-menu-item has-sub active open">
        <a href="javascript:void(0)">
                <i class="site-menu-icon wb-user" aria-hidden="true"></i>
                <span class="site-menu-title">ADMINISTRATOR</span>
                        <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub ">
          <li class="site-menu-item active open">
            <a class="animsition-link" href="usersetting.php">
              <span class="site-menu-title">User Setting</span>
            </a>
          </li>
          <li class="site-menu-item active open">
            <a class="animsition-link" href="">
              <span class="site-menu-title">Department Setting</span>
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
        <h1 class="page-title font-size-26 font-weight-600">USER DATA MANAGEMENT</h1>
      </div>

      <div class="page-content container-fluid">
        <div class="row">
          <!-- Second Row -->
          <div class="col-lg-12 col-md-12">
            <div class="card card-shadow">
              <div class="card-header card-header-transparent bg-dark">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                      <div class="float-left">
                      <span class="font-size-20 bold">Form ubah data</span>
                      </div>                    
                    </div>
                  </div>                                      
              </div>
              <div class="card-body bg-white">
                
              <?php 
                  //ambil data di url
                  $username=$_GET ["ubah"];
                  //query data mahasiswa berdasarkan id menghasilkan array numeric
                  $ubah = mysqli_query($link_yics ,"SELECT * FROM data_user WHERE username = '$username'")or die (mysqli_error($link_yics));
                  $data = mysqli_fetch_assoc($ubah)
                ?>

              <form action="../proses/usersetting/user.php" method="POST" id="tambahdata" class="needs-validation" novalidate="">
              <input type="hidden" name="ubah">
                  <div class="form-group row">
                        <label class="col-md-2 col-form-label" style="color:black;">Username</label>
                        <div class="col-md-10">
                        <input type="text" class="form-control" name="user" autocomplete="off" value="<?= $data['username']; ?>" readonly required>
                        </div>
                  </div>
                  <div class="form-group row">
                        <label class="col-md-2 col-form-label" style="color:black;">Nama</label>
                        <div class="col-md-10">
                          <input type="text" class="form-control" name="nama" autocomplete="off" value="<?= $data['nama']; ?>" required>
                        </div>
                  </div>
                  
                  <div class="form-group row">
                        <label class="col-md-2 col-form-label" style="color:black;">Role</label>
                        <div class="col-md-10">
                        <select class="form-control" id="dept_prop" name="role" required>
                        <?php 
                          $role = mysqli_query($link_yics, "SELECT * FROM user_role") or die (mysqli_error($link_yics));
                          if(mysqli_num_rows( $role)>0){
                            while( $rows_role = mysqli_fetch_assoc($role)){
                              if( $data['id_level'] == $rows_role['id_role']){
                                $selected = "selected";
                              }else{
                                $selected = "";
                              }
                              ?>
                              <option <?php echo $selected; ?> value="<?php echo $rows_role['id_role']; ?>"><?php echo $rows_role['role_name']; ?></option>
                              <?php
                            }
                          }                                                
                        ?>                                      
                        </select>
                        </div>
                  </div>
                  <div class="form-group row">
                        <label class="col-md-2 col-form-label" style="color:black;">Password lama</label>
                        <div class="col-md-4">
                        <input type="password" class="form-control" autocomplete="off" value="<?= $data["pass"]; ?>" readonly required>
                        </div>
                        <label class="col-md-2 col-form-label" style="color:black;">Password baru</label>
                        <div class="col-md-4">
                        <input required type="text" required class="form-control" required name="password" placeholder="Silahkan isi password baru" autocomplete="off" required  >
                        </div>
                  </div>
              </div>  
              <div class="modal-footer">
                <a href="../page/usersetting.php" type="reset"  class="btn btn-danger" >Kembali</a>
                <button type="submit" class="btn btn-primary" >Save</button>
              </div> 
            </form><!-- end form-content--------- -->                                    
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
