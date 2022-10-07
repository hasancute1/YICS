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
      <li class="site-menu-item has-sub active open ">
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
      <li class="site-menu-item has-sub">
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
          <li class="site-menu-item " >  
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
        <h1 class="page-title font-size-26 font-weight-600">ALOKASI BUDGET</h1>
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
                      <span class="font-size-20 bold">Form alokasi budget</span>
                      </div>                    
                    </div>
                  </div>                                      
              </div>
              <div class="card-body bg-white">
                
              <?php 
                  //ambil data di url
                  $id=$_GET ["ubah"];
                  //query data mahasiswa berdasarkan id menghasilkan array numeric
                  
                ?>
            <form action="../proses/dashboard/alokasi.php" method="POST" id="tambahdata" class="needs-validation sum">
            <input type="hidden" name="ubah">
                <div class="form-group row">
                    <h4 class="col-md-12 modal-title text-left" style="color:black;">Tahun Fiscal</h4>                                      
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" style="color:black;">Periode tahun</label>
                    <div class="col-md-10">
                      <div class="input-group">
                    <?php 
                    $tambahalok = mysqli_query($link_yics ,"SELECT 
                    time_fiscal.periode,time_fiscal.id_fis AS id_fis 
                    FROM budget 
                    LEFT JOIN time_fiscal ON budget.id_fis = time_fiscal.id_fis
                    WHERE time_fiscal.id_fis= '$id'")or die (mysqli_error($link_yics));
                    $data = mysqli_fetch_assoc($tambahalok)
                  ?>
                      <input type="text" value="<?php echo $data['periode']; ?>" class="form-control" readonly>  
                      <input name="id_fis" type="text" value="<?php echo $data['id_fis']; ?>" class="form-control" readonly hidden>                                               
                        </div>
                    </div> 
                  </div>   
                  <hr>
                  <div class="form-group row">
                    <h4 class="col-md-12 modal-title text-left" style="color:black;">Budget Alokasi</h4>                                   
                  </div>
                  <?php 
                    $id_budget = mysqli_query($link_yics, "SELECT * FROM budget WHERE id_fis= '$id'") or die (mysqli_error($link_yics));
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
                    $depart = mysqli_query($link_yics, "SELECT * FROM budget") or die (mysqli_error($link_yics));
                    if(mysqli_num_rows( $depart)>0){
                      ?>
                      <input name="totalData" type="text" value="<?=mysqli_num_rows( $depart)?>" hidden>      
                      <?php } ?>

                    <?php 
                    $depart1 = mysqli_query($link_yics, "SELECT  
                    budget.id_bud,budget.id_dep,budget.budget,depart.depart,budget.id_fis AS id_fis
                    FROM budget 
                    LEFT JOIN depart ON budget.id_dep = depart.id_dep
                    WHERE budget.id_fis= '$id'")or die (mysqli_error($link_yics));
                    if(mysqli_num_rows( $depart1)>0){
                      $i = 1;
                      while( $rows_depart = mysqli_fetch_assoc($depart1)){?>
                      <div class="form-group row">
                          <label class="col-md-2 col-form-label" style="color:black;"><?php echo $rows_depart['depart'] ?></label>
                          <div class="col-md-10">  
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                              </div>
                              <input required name="budget<?=$i?>"  type="text" 
                               class="form-control prc" placeholder="Isi Budget Dept..." value="<?php echo $rows_depart['budget']?>">
                              <input required name="id_dept<?=$i?>"  value="<?php echo $rows_depart['id_dep']?>" type="text" onkeyup="sum();"
                                class="form-control" hidden>
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
                        <span class="input-group-text">Rp</span>
                      </div>
                      <span  type="text" class="form-control" placeholder="Total Budget Dept.." value="" id="result" readonly></span>
                      </div>
                    </div>
                  </div>                              
                </div>
                <div class="modal-footer">
                  <a href="dashboard.php" type="" id="reset" class="btn btn-danger">Kembali</a>
                  <button type="submit" class="btn btn-primary" >Save</button>
                </div>
                </form>   ]                                
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

<!--############ jquery penjumlahan loopinng attribut classs ################# -->
<script>
$(document).ready(function(){
$(".sum").on('input', '.prc', function () {
       var calculated_total_sum = 0;
       $(".sum .prc").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $("#result").html(calculated_total_sum);
       });
});
</script>
<!--############ end jquery penjumlahan loopinng attribut classs ################# -->