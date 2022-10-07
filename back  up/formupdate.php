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
      <div class="page-content container-fluid">
        <div class="row">
          <!-- Second Row -->
          <div class="col-lg-12 col-md-12">
            <div class="card card-shadow">
              <div class="card-header card-header-transparent bg-dark">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                      <div class="float-left">
                      <span class="font-size-20 bold">Form Update Progress</span>
                      </div>                    
                    </div>
                  </div>                                      
              </div>
              <div class="card-body bg-white">
                
              <?php 
                  //ambil data di url
                  $id=$_GET ["ubah"];
                  //query data mahasiswa berdasarkan id menghasilkan array numeric
                  $proposal = mysqli_query($link_yics ,"SELECT proposal.id_prop AS id_prop,
                  depart.depart AS depart,kategori_proposal.kategori AS kategori,time_fiscal.status,proposal.proposal AS proposal
                  FROM proposal 
                  LEFT JOIN depart ON proposal.id_dep = depart.id_dep
                  LEFT JOIN kategori_proposal  ON proposal.id_kat = kategori_proposal.id_kat
                  LEFT JOIN time_fiscal  ON proposal.id_fis = time_fiscal.id_fis  
                  WHERE id_prop = '$id'")or die (mysqli_error($link_yics));
                  $data = mysqli_fetch_assoc($proposal)
                ?>

              <form type="post" action="#">
                  <div class="form-group row">
                      <h4 class="col-md-12 modal-title text-left" style="color:black;">SUBJECT</h4>                                      
                    </div>
                  <div class="form-group row">
                      <label class="col-md-2 col-form-label text-left" style="color:black;">Department</label>
                      <div class="col-md-4">
					  <input readonly hidden type="text" class="form-control bg-grey-200" id="depart_edit" placeholder=" Judul Proposal" autocomplete="off" value="<?php echo $data['id_prop']; ?>">
                      <input readonly type="text" class="form-control bg-grey-200" id="depart_edit" placeholder=" Judul Proposal" autocomplete="off" value="<?php echo $data['depart']; ?>">
                        </div>
                        <label class="col-md-2 col-form-label text-left" style="color:black;">Category</label>
                        <div class="col-md-4">
                        <input readonly type="text" class="form-control bg-grey-200" id="category_edit" placeholder=" Judul Proposal" autocomplete="off" value="<?php echo $data['kategori']; ?>">
                        </div>
                    </div>                                  
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label text-left" style="color:black;">Proposal</label>
                      <div class="col-md-10">
                      <input readonly type="text" class="form-control bg-grey-200" id="proposal_edit" placeholder=" Judul Proposal" autocomplete="off" value="<?php echo $data['proposal']; ?>">
                      </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                      <h4 class="col-md-12 modal-title  text-left	" style="color:black;">STEP ASSIGMENT</h4>   
                      </div>                         
                                                       
                    </div>
                    <div class="form-group row text-center after-add-more" id="step1">  
						<div class="col-md-1">                                      
                        		<h5 >No</h5>
                      </div>  
                      <div class="col-md-3">                                      
                       		 <h5 >Step</h5>
                      </div>                                              
                      <div class="col-md-3">                                      
                        		<h5>Approval</h5>
                      </div>
					<div class="col-md-1">                                      
                        <h5></h5>
                      </div>                                                     
                      <div class="col-md-2">                                       
                        <h5>Date</h5>
                      </div>                                                                                                                                       
                      <div class="col-md-2">                                      
                       	 <h5>PIC</h5>
                      </div>                                                                                                                                       
                    </div>
						<?php 
							$progress = mysqli_query($link_yics,"SELECT nama_progress, id_prog FROM progress WHERE id_ket='1' ")or die(mysqli_error($link_yics)); 
							if(mysqli_num_rows($progress)>0){
							$no=1;
							while($rows_progress = mysqli_fetch_assoc($progress)){
								$muncul = 1;
								if($no == $muncul){
									$text_muncul = "";
									}else{
									$text_muncul = "d-none";
								}
								?>
								<div class="form-group row <?=$text_muncul?> " id="data<?=$no?>" >
									<div class="col-md-1 text-center">                                   
										<span><?= $no ?></span>
									</div>	
									<div class="col-md-3">                                      
										<input type="text" class="form-control bg-grey-200"  value="<?= $rows_progress['nama_progress'] ?>" disabled>
									</div>
									<div class="col-md-2">                                      
										<div class="custom-switches-stacked mt-2">
											<label class="custom-switch">
												<input id="reject_step<?=$no?>" data-id="<?=$no?>" type="checkbox" name="reject_step<?=$no?>"  value="0" 
													class="custom-switch-input reject" data-plugin="switchery" data-color="#17b3a3" >
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">Reject</span>
											</label>
										</div>   
									</div>
									<div class="col-md-2">                                      
										<div class="custom-switches-stacked mt-2">
											<label class="custom-switch">
												<input id="approve_step<?=$no?>" data-id="<?=$no?>" type="checkbox" name="approve_step<?=$no?>" value="1" 
													data-color="#17b3a3" class="custom-switch-input approve" data-plugin="switchery" >
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">Approve</span>
											</label>
										</div>   
									</div>
									<div class="col-md-2  ">
										<div class="input-group-prepend">
											<input type="date" class="form-control bg-grey-200"  value="" >
										</div>
									</div> 
									<div class="col-md-2 ">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="icon wb-user" aria-hidden="true"></i>
											</span>  
											<select name="depart" class="form-control bg-grey-200">
												<option value="">Pilih PIC</option> 
												<?php 
													$pic = mysqli_query($link_yics,"SELECT * FROM pic") or die (mysqli_error($link_yics));
													if(mysqli_num_rows($pic)>0){
													while( $rows_pic = mysqli_fetch_assoc($pic)){?>
													<option value="<?php echo $rows_pic['id_pic'] ?>"><?php echo $rows_pic['pic'] ?></option> 
													<?php 
												} 
											}
											?>                                         
											</select>
									</div>
								</div> 
							</div>
							<?php 
								$no++;
							} 
						}
						?> 
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Reset</button>
                      <button type="button" class="btn btn-primary">Save</button>
                     </div>      
                </form>  
                                          
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
<script >
	// Dokumen sudah ready maka jalankan function
		$(document).ready(function(){
			// jika class approve di klik maka
			$(".approve").click(function(){
				//attribut data-id ini masukkan ke variabel index
				var index = $(this).attr('data-id');
				// varibael index ditambah 1 lalu masukkan ke variabel next_index
        		var next_index = Number(index)+1;
				// jika di html ini ada  checked
				if($(this).is(':checked')){
									//maka  id data yang ditambah variabel next index hapus class d-none
								$('#data'+next_index).removeClass('d-none');
									//jika  id reject_step ditambah index ada checked
								if($('#reject_step'+index).is(':checked')){
									//maka id reject_step ditambah index ini diklik
									$('#reject_step'+index).click();
								}
								//melainkan bila tidak ada check
				}else{
								// maka id data yang ditambah next_index ditambah class d_none
									$('#data'+next_index).addClass('d-none');
								}
							});		

			// class reject di klik maka jalankan function
			$(".reject").click(function(){
				//  membuat var index yang hasilnya  dari attribut data ini
				var index = $(this).attr('data-id');
				// jika html ini ada checked 
					if($(this).is(':checked')){
						// maka cetak approve step variabel index
						console.log('approve_step'+index);
						// jika id approve step variable index ada checked
						if($('#approve_step'+index).is(':checked')){
							// maka id  apporove step  index di klik
							$('#approve_step'+index).click();
								}
								
							}
						});		
				});
	</script>
	
