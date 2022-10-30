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
              
              <form autocomplete="off" method="get" action="">             
              <input type="hidden" name="id_ia" value="<?= $_GET['id_ia'] ?>">
              <div class="row card-body">
                  <div class="col-lg-2 col-md-2">
                    <h4>Department</h4>
                           
                          <?php $departement = query("SELECT * from depart"); ?>  
                        
                          <div class="form-group">
                            <select class="form-control" name="departement" id="departement">
                              <option >Pilih Department</option>
                              <?php foreach($departement as $row){ ?>
                                <option value="<?= $row['id_dep'] ?>"
                                <?php 
                                  if(isset($_GET['departement'])){ ?>
                                    <?= ($_GET['departement'] == $row['id_dep'])?"selected":"" ?>
                                <?php } ?> 


                                class="terpilih"
                                ><?= $row['depart'] ?></option>
                              <?php } ?>                                             
                            </select>                            
                          </div>                            
                                         
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <h4>Cost Type</h4>
                         
                        <?php $jenis_cost = query("SELECT * from kategori_proposal"); ?>           
                          <div class="form-group">
                            <select class="form-control" name="cost_type" id="cost_type">
                              <option>Pilih Cost Type</option>

                              <?php foreach($jenis_cost as $row){ ?>
                              <option value="<?= $row['id_kat'] ?>" 

                              <?= (isset($_GET['cost_type']) &&  $_GET['cost_type'] == $row['id_kat'])?"selected":"" ?>
                              class="terpilih"
                              ><?= $row['kategori'] ?></option>

                              <?php } ?>                                               
                            
                            </select>
                          </div>                            
                                           
                  </div>  
                 
                  <div class="col-lg-6 col-md-6">
                    <h4>NO. IA</h4>
                    <div class="row">
                        <div class="col-lg-8 col-md-8">

                            <?php $list_ia = query("SELECT * from ia"); ?>

                                <div class="form-group">
                                    <select class="form-control" name="ia_selected" id="ia_selected">
                                        <option>Kode Depart.</option>
                                        <?php foreach($list_ia as $row){ ?>
                                        
                                          <option value="<?= $row['id_ia'] ?>"
                                          
                                          <?= (isset($_GET['cost_type']) && $_GET['ia_selected'] == $row['id_ia'])?"selected":"" ?>
                                          class="terpilih"
                                          ><?= $row['ia'] ?></option>

                                        <?php } ?>
                                        
                                    </select>
                                </div>
                          
                        </div>
                        <div class="col-lg-1/2 col-md-1/2">
                          <span class="font-size-20">-</span>
                        </div> 
                        <div class="col">                          
                        
                            <div class="form-group " data-plugin="formMaterial">
                                <input type="text"class="form-control " name="angka_belakang"
                                    placeholder="5 Angka Belakang">
                            </div>                        
                                
                        </div> 
                      </div>   
                  </div>
                <div class="card-footer col-lg-12 col-md-12 text-md-right bg-blue-100">
                  <a href="" data-toggle="tooltip" data-original-title="Reset">
                          <button type="button" id="reset_form" class="btn btn-danger">
                            RESET
                          </button>
                          </a>
                      <a href="" data-toggle="tooltip" data-original-title="Search">
                        <button type="submit" class="btn btn-success btn-icon ">
                          <i class="icon wb-search" aria-hidden="true"></i>SEARCH
                        </button>
                      </a>
                </div>
                                                   
              </div>

              </form>  
                                 
            </div>
          </div>
            <!-- End first -->

            <?php 

            // data ia

            if( isset($_GET['ia_selected']) && $_GET['ia_selected'] != 0){
              $id_ia = $_GET['ia_selected'];
              
            }else{
              $id_ia = $_GET['id_ia'];
            }
            



            $data_ia = single_query("SELECT * FROM ia where id_ia='".$id_ia."'");           

            ?>

            <!-- Second Row -->          
          <div class="col-lg-12 col-md-12">
            <div class="card card-shadow" style="border-radius: 10px;">
              <div class="card-header card-header-transparent"> 
                <div class="row">
                  <div class="col-lg-4 col-md-4">
                    <div class="panel-heading">
                      <h4 class=" text-left"><?= $data_ia['ia'] ?></h4> <hr style="border-color:grey;">
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

                <?php 

                $tracking_ia_rss = query("SELECT * FROM tracking_ia
                JOIN progress ON tracking_ia.id_prog = progress.id_prog 
                WHERE tracking_ia.id_ia=".$id_ia."
                AND id_ket = 2");
                $id_prog_rss = get_pluck($tracking_ia_rss , 'id_prog');                     


                $tracking_ia_bp = query("SELECT * FROM tracking_ia
                JOIN progress ON tracking_ia.id_prog = progress.id_prog 
                WHERE tracking_ia.id_ia=".$id_ia."
                AND id_ket = 3");               

                $id_prog_bp = get_pluck($tracking_ia_bp , 'id_prog');

                $tracking_ia_pr = query("SELECT * FROM tracking_ia
                JOIN progress ON tracking_ia.id_prog = progress.id_prog 
                WHERE tracking_ia.id_ia=".$id_ia."
                AND id_ket = 4");
                $id_prog_pr = get_pluck($tracking_ia_pr , 'id_prog');

                $tracking_ia_gr = query("SELECT * FROM tracking_ia
                JOIN progress ON tracking_ia.id_prog = progress.id_prog 
                WHERE tracking_ia.id_ia=".$id_ia."
                AND id_ket = 5");
                $id_prog_gr = get_pluck($tracking_ia_gr , 'id_prog');


                // list Progress rss
                $progress_rss = query("SELECT * FROM progress WHERE id_ket=2");
                $progress_bp = query("SELECT * FROM progress WHERE id_ket=3");
                $progress_pr = query("SELECT * FROM progress WHERE id_ket=4");
                $progress_gr = query("SELECT * FROM progress WHERE id_ket=5");

                $status = FALSE;

                 // filter bp sesuai scope
                 $limit_progress_bp =  get_progress_bp($progress_bp , $data_ia['nominal']); 
               

                ?>
                
                   
                
                <div class="row py-20">
                  <div class="col-lg-12 col-md-12">
                      <div class="pearls row">
                        <div class="pearl current col-3">
                          <div class="pearl-icon"><i class="icon wb-user" aria-hidden="true"></i>
                          </div>
                            <h3 class="pearl-tittle">RSS/RFN</h3>
                            <br>
                            <div class="list-group bg-blue-grey-100 bg-inherit text-left w-250 ml-5">
                              <?php foreach($progress_rss as $row){
                              $status = in_array($row['id_prog'],$id_prog_rss);    
                              $tracking = get_item_trac_ia($tracking_ia_rss , $row['id_prog']);                                                          
                                ?>
                            
                              <div class="list-group-item bg-<?= ($status? "teal":"gray") ?>-300">          
                                  <?=($status)? '<i class="icon wb-check" aria-hidden="true"></i>':''?>
                                  <?= $row['nama_progress'] ?><br>

                                    <i class="icon oi-calendar" aria-hidden="true"></i>
                                    
                                    <?=($status)?$tracking['time'] . ' WIB':'-'?>
                                    
                                    <br>
                                    <i class="icon wb-user" aria-hidden="true"></i><?=($status)?'By Effendy':'-'?>
                                </div>       
                              <?php } ?>
                                                           
                            </div>  
                        </div>
                         
                          
                          <div class="pearl col-3">
                            <div class="pearl-icon"><i class="icon wb-pencil" aria-hidden="true"></i></div>
                            <h3 class="pearl-tittle">BP/BPE APPROVAL</h3>
                            <br>
                            <div class="list-group bg-blue-grey-100 bg-inherit text-left w-250 ml-3">
                              
                              <?php foreach($limit_progress_bp  as $row){
                                $status = in_array($row['id_prog'],$id_prog_bp);
                                $tracking = get_item_trac_ia($tracking_ia_bp , $row['id_prog']);
                                ?>
                                <div class="list-group-item bg-<?= (in_array($row['id_prog'] , $id_prog_bp)? "teal":"gray") ?>-300">                              
                                <?=($status)? '<i class="icon wb-check" aria-hidden="true"></i>':''?>
                                  <?= $row['nama_progress'] ?><br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>
                                    <?=($status)?$tracking['time'] . ' WIB':'-'?>
                                    <br>
                                    <i class="icon wb-user" aria-hidden="true"></i><?=($status)?'By Effendy':'-'?>
                                </div>    
                              <?php } ?>
                                                         
                            </div> 
                          </div>

                          <div class="pearl col-3">
                            <div class="pearl-icon"><i class="icon wb-payment" aria-hidden="true"></i></div>
                            <h3 class="pearl-tittle" data-toggle="dropdown">PR</h3>
                            <br>
                            <div class="list-group bg-blue-grey-100 bg-inherit text-left w-250 ml-10">
                           
                            <?php foreach($progress_pr as $row){ 
                              $status = in_array($row['id_prog'],$id_prog_pr);
                              $tracking = get_item_trac_ia($tracking_ia_pr , $row['id_prog']);
                              ?>
                            <div class="list-group-item bg-<?= (in_array($row['id_prog'] , $id_prog_pr)? "teal":"gray") ?>-300">                              
                                <?=($status)? '<i class="icon wb-check" aria-hidden="true"></i>':''?>
                                  <?= $row['nama_progress'] ?><br>
                                    <i class="icon oi-calendar" aria-hidden="true"></i>
                                    <?=($status)?$tracking['time'] . ' WIB':'-'?>
                                    <br>
                                    <i class="icon wb-user" aria-hidden="true"></i><?=($status)?'By Effendy':'-'?>
                                </div>                                
                            </div>   
                            <?php } ?>

                          </div>

                          <div class="pearl col-3">
                            <div class="pearl-icon"><i class="icon fa-shopping-cart" aria-hidden="true"></i></div>
                            <h3 class="pearl-tittle">GR</h3>
                            <br>
                            <div class="list-group bg-blue-grey-100 bg-inherit text-left w-250 ml-10">
                           
                              <?php foreach($progress_gr as $row){ 
                                $status = in_array($row['id_prog'],$id_prog_gr);
                                $tracking = get_item_trac_ia($tracking_ia_gr , $row['id_prog']);
                                ?>                            
                                  <div class="list-group-item bg-<?= (in_array($row['id_prog'] , $id_prog_gr)? "teal":"gray") ?>-300">                              
                                  <?=($status)? '<i class="icon wb-check" aria-hidden="true"></i>':''?>
                                    <?= $row['nama_progress'] ?><br>
                                      <i class="icon oi-calendar" aria-hidden="true"></i>
                                      <?=($status)?$tracking['time'] . ' WIB':'-'?>
                                      <br>
                                      <i class="icon wb-user" aria-hidden="true"></i><?=($status)?'By Effendy':'-'?>
                                  </div>                                                          
                              <?php } ?>

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


    <script>

      $('#reset_form').click(function(event){
        event.preventDefault();

        $(".terpilih").prop("selected", false);
        
      });
    </script>
    
    <!-- End Page -->

<!-- Footer -->
<?php
include '../elemen/footer.php';?>
