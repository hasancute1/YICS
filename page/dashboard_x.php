<!--header-->
<?php
include("../config/config.php");
if (!isset($_SESSION['yics_user'])) {
  header('location: ../index.php');
}
?>
<?php include '../elemen/header.php';  ?>

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
      <div class="page-header">
        <h1 class="page-title font-size-26 font-weight-600">Budget Body Division Overview (x Million)</h1>
      </div>

      <div class="page-content container-fluid">
      <div class="row">
        <div class="col-lg-6 col-md-6  mb-2">
        <?php 
           $alokasi = mysqli_query($link_yics, "SELECT * FROM time_fiscal WHERE status='aktif'") or die(mysqli_error($link_yics));
           $data = mysqli_fetch_assoc($alokasi);
            ?>
        <h6 class="font-size-18 font-weight-400">Periode ( <span style="color:red;"><?php echo $data['periode']; ?> </span>  ) :
        <span style="color:red;"><?php echo date("d M Y", strtotime($data['awal'])); ?></span> 
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
                          <button type="button" id="TambahAlokasiBudget" class="btn btn-icon btn-outline btn-info btn-xs" data-toggle="modal" data-target="#ModalAlokasiBudget">
                            <i class="icon wb-plus" aria-hidden="true"></i>
                          </button>
                        </i> 

                  <!--query edit data  -->
                  <?php 
                    $editalokasi = mysqli_query($link_yics, "SELECT * FROM time_fiscal WHERE status='aktif'") or die(mysqli_error($link_yics));
                    if(mysqli_num_rows($editalokasi)>0){$rows_editalokasi = mysqli_fetch_assoc($editalokasi)?>
                          <a href="formubahalokasibudget.php?ubah=<?php echo $rows_editalokasi['id_fis']; ?>" data-toggle="tooltip" data-original-title="Edit">
              <!-- end query edit data  -->
                        <button type="button" class="btn btn-success btn-icon btn-outline btn-xs" data-toggle="modal" data-target="#EditAlokasiBudget">
                          <i class="icon wb-edit" aria-hidden="true"></i>
                        </button>
                      </a>
                      <a href="../proses/dashboard/alokasi.php?del=<?php echo $rows_editalokasi['id_fis']; ?>"" data-toggle="tooltip" data-original-title="Hapus">
                      <?php } ?>
                        <button type="button" class="btn btn-icon btn-danger btn-icon btn-outline btn-xs HapusData">
                          <i class="icon oi-trashcan" aria-hidden="true"></i>
                        </button>
                      </a> 
                    </div>   
                  </div>
                </div>                          
              </div>
                <div class="card-body card-shadow"> 
                    <div id="graph" style="height: 350px;"></div>
                 </div> 
                 
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
                <?php 
                 $card1 = mysqli_query($link_yics, "SELECT * FROM division") or die (mysqli_error($link_yics));
                $row_card1 = mysqli_fetch_assoc($card1); ?>
                <span class="white font-weight-400"><?php echo $row_card1 ['divisi']; ?></span>
                <div class=" white content-text text-center mb-0">                 
                  <span class="font-size-40 font-weight-100">Rp 3.900</span>
                  <?php 
                    $card=mysqli_fetch_array(mysqli_query($link_yics,"SELECT sum(budget) 
                    AS total FROM view_alokasi_budget WHERE status='aktif'")) or die (mysqli_error($link_yics));;
                  ?>   
                  <p class="white font-weight-100 m-0 font-size-18"><u>"Budget Rp <?php echo number_format ($card['total'],0,',','.'); ?>"</u></p>
                </div>
              </div>
            </div>
          </div>
          <?php 
            $card = mysqli_query($link_yics, "SELECT * FROM view_alokasi_budget WHERE status= 'aktif'") or die (mysqli_error($link_yics));
            if(mysqli_num_rows( $card)>0){
              $i = 1;
              while( $row_card = mysqli_fetch_assoc($card)){?>
          <div class="col-lg-3 col-md-6 info-panel">
            <a href="budgetdep<?=$i?>.php">
              <div class="card card-shadow">
                <div class="card-block warnadep<?=$i?>" style="border-radius: 15px;height:180px;" >
                  <button type="button" class="btn btn-floating btn-sm btn-success">
                    <i class="icon fa-dollar"></i>
                  </button>
                  <span class="white font-weight-400 "><?php echo $row_card['depart']; ?></span>
                  <div class="content-text text-center mb-0">                    
                    <span class="white font-size-40 font-weight-100 mt-50">Rp 1.628</span>
                    <p class="white font-weight-100 m-0 font-size-18">"Budget Rp <?php echo number_format ($row_card['budget'],0,',','.'); ?>"</p>
                    <p class="white font-weight-100 m-0"> Lihat  Detail >></p>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <?php  $i++;}} ?>
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
                            <div class="float-right">
                                <i href=""  data-toggle="tooltip" data-original-title="Tambah Data">
                                  <button type="button" class="btn btn-icon btn-info btn-xs btn-outline" data-toggle="modal" data-target="#TambahPlaningProposal">
                                    <i class="icon wb-plus" aria-hidden="true"></i></button>
                                  </i>
                              </div>   
                            </div>                    
                          </div>                   
                      </div>                                      
                  </div>

                      <div class="row">
                      <div class="col-lg-12 col-md-12">
                        <div class="row"> 
                          <div class="col-md-2">
                              <div class="form-group">
                                  <select name="depart" class="form-control" style="background-color:#E4EAEC;">>
                                      <option value="">Pilih Departement</option> 
                                      <?php 
                                      $depart = mysqli_query($link_yics,"SELECT * FROM depart") or die (mysqli_error($link_yics));
                                      if(mysqli_num_rows($depart)>0){
                                      while( $rows_depart = mysqli_fetch_assoc($depart)){?>
                                      <option value="<?php echo $rows_depart['id_dep'] ?>"><?php echo $rows_depart['depart'] ?></option> 
                                      <?php 
                                    } 
                                    }
                                      ?>                                         
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group">
                                  <select name="kategori" type="text" class="form-control" id="category_prop" style="background-color:#E4EAEC;">
                                        <option value="">Pilih Category</option>
                                        <?php 
                                      $kategori = mysqli_query($link_yics,"SELECT * FROM kategori_proposal") or die (mysqli_error($link_yics));
                                      if(mysqli_num_rows($kategori)>0){
                                      while( $rows_kategori= mysqli_fetch_assoc($kategori)){?>
                                      <option  value="<?php echo $rows_kategori['id_kat'] ?>"><?php echo $rows_kategori['kategori'] ?></option> 
                                      <?php 
                                    } 
                                    }
                                      ?>                                                                
                                  </select>
                                </div>
                            </div>
                          <div class="col-lg-8 col-md-8 ">
                            <div class="float-right">
                                <form >
                                  <div class="input-search input-search-dark">
                                    <i class="input-search-icon wb-search" aria-hidden="true"></i>
                                    <input type="text" class="form-control" name="" placeholder="Search..." style="background-color:#E4EAEC;" id="cari">
                                    <!-- <button  class="input-search-close icon wb-close" 
                                    id="btnclear"></button> -->
                                    <!-- onclick="clearResult()" -->
                                  </div>
                                </form>
                              </div>                    
                          </div>                                
                        </div>                       
                      </div>                    
                    </div> 
                    
                    <div id="wadahtabel" class="table table-bordered table table-responsive text-nowrap table-center">
                      <table class="table">
                        <thead class="text-center">
                          <tr class="bg-info align-" height="10px">
                            <th class="align-middle text-center" height="10px" rowspan="2">N0</th>
                            <th class="align-middle text-center" height="10px" rowspan="2">DEPART.</th>
                            <th class="align-middle text-center" height="10px" rowspan="2">CATEGORY</th>
                            <th class="align-middle text-center" height="10px" rowspan="2">PROPOSAL</th>
                            <th class="align-middle text-center" height="10px" colspan="5">STEP ASSIGNMENT</th>
                            <th class="align-middle text-center" height="10px" rowspan="2">PROGRESS</th>
                            <th class="align-middle text-center" height="10px" rowspan="2">ACTION</th>
                            <th class="align-middle text-center" height="10px" rowspan="2"><input type="checkbox" id="checkAll"></th> 
                          </tr >
                            <tr>
                              <th class="align-middle text-center" width="120px" height="10px">Quatation</th>
                              <th class="align-middle text-center" width="120px" height="10px">Assignment</th>
                              <th class="align-middle text-center" width="120px" height="10px">Request for Negoisasi</th>
                              <th class="align-middle text-center" width="120px" height="10px">Price Confirmation</th>
                              <th class="align-middle text-center" width="120px" height="10px">Budget Planning</th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php 
                          $proposal = mysqli_query($link_yics ,"SELECT id_prop,
                          depart.depart AS depart,kategori_proposal.kategori AS kategori,time_fiscal.status,proposal.proposal AS proposal
                          FROM proposal 
                          LEFT JOIN depart ON proposal.id_dep = depart.id_dep
                          LEFT JOIN kategori_proposal  ON proposal.id_kat = kategori_proposal.id_kat
                          LEFT JOIN time_fiscal  ON proposal.id_fis = time_fiscal.id_fis  
                          WHERE time_fiscal.status= 'aktif'")or die (mysqli_error($link_yics));
                          $no=1;
                          if(mysqli_num_rows($proposal)>0){
                           while($data = mysqli_fetch_assoc($proposal)){?>  
                             <tr class="align-middle text-center">
                            <td class="align-middle text-center"><?php echo $no; ?></td>
                            <td class="align-middle text-center" hidden><?php echo $data['depart']; ?></td>
                            <td class="align-middle text-center"><?php echo $data['depart']; ?></td>
                            <td class="align-middle text-center"><?php echo $data['kategori']; ?></td>
                            <td class="align-middle text-center"><?php echo $data['proposal']; ?></td>
                            <td class="align-middle text-center" >
                            <td class="align-middle text-center" >
                            <td class="align-middle text-center" >
                            <td class="align-middle text-center" >
                            <td class="align-middle text-center" >    
                            <td class="align-middle text-center" >
                              <div class="progress mt-20">
                                <div class="progress-bar progress-bar-striped active" aria-valuenow="" aria-valuemin="0"
                                  aria-valuemax="100"  role="progressbar">
                                </div>
                              </div>
                            </td>
                      
                            <td class="align-middle text-center" >
                            <a href="formubahplanning.php?ubah=<?php echo $data['id_prop']; ?>" data-toggle="tooltip" data-original-title="Update Progress ">
                                <button type="button" class="btn btn-icon btn-success edit_proposal" data-toggle="modal" data-target="#EditPlaningProposal2">
                                  <i class="icon wb-upload" aria-hidden="true"></i>
                                </button>
                              </a> 
                              <a href="formubahplanning.php?ubah=<?php echo $data['id_prop']; ?>" data-toggle="tooltip" data-original-title="Edit">
                                <button type="button" class="btn btn-icon btn-warning  edit_proposal" data-toggle="modal" data-target="#EditPlaningProposal2">
                                  <i class="icon wb-edit" aria-hidden="true"></i>
                                </button>
                              </a> 
                              <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                                <button type="button" class="btn btn-icon btn-danger HapusData">
                                  <i class="icon oi-trashcan" aria-hidden="true"></i>
                                </button>
                              </a> 
                            </td>
                            <td class="align-middle text-center" height="10px"><input name="check[]" value="<?php echo $data['username']; ?>" type="checkbox" class="check"></td>
                            <?php $no++; }} ?>
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
<div id="dataTabel2"></div>
<div id="notifprop"></div>
<div id="notifedit"></div>

   
<!-- Footer -->
<?php
include '../elemen/footer.php';?>

<!-- #################################################################################### -->
<script src="caripp.js"> </script>




<!-- // javascript grfaik bar ########################-->
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
<!-- // javascript grfaik bar ########################-->

<!-- // query grfaik donut morris ########################-->  
<?php 
    // <!-- GRAFIK DONUT SHIFT ############################################################################## -->
    $query_id_dept = mysqli_query($link_yics, "SELECT * FROM view_alokasi_budget WHERE status='aktif'") or die(mysqli_error($link_yics));
    if(mysqli_num_rows($query_id_dept)>0){
        while($rows_id_dept = mysqli_fetch_assoc($query_id_dept)){              
            $array_donut_dept[] = array('label' => $rows_id_dept['depart'], 'value' => $rows_id_dept['budget']); 
        }    
        $json_morris = json_encode($array_donut_dept);
    }
  ?>

<!-- // javascript grfaik donut ########################-->                 
<script>
  var data_graph = <?php echo $json_morris ; ?>
//hharus ada spasi enter
  Morris.Donut({
  element:'graph',
  redraw: true,
  resize: true,
  data: data_graph,
  colors: [Config.colors("yellow", 500), Config.colors("red", 500), Config.colors("purple", 500)],
  // formatter: function (x) { return x + "%"}
  formatter: function (y, data) { return 'Rp ' + y },
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
            <div id = "warningdata" class="alert alert-danger  fade show text-center d-none" >
              <label for="aa" style="cursor: pointer;"><b>Silahkan Lengkapi Data Sahabat !</b></label>
              <button id="aa" name="aa" type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove"></i>
              </button>
        </div>
        <div class="row">
        </div>
        <div class="modal-body sum" >
        <form action="../proses/dashboard/alokasi.php" method="POST" id="tambahdata" class="needs-validation " >
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
              <input  type="text" value="<?php echo $data['periode']; ?>" class="form-control" readonly>  
              <input name="id_fis" type="text" value="<?php echo $data['id_fis']; ?>" class="form-control" readonly hidden>                                               
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
              while( $rows_depart = mysqli_fetch_assoc($depart)){?>
              <div class="form-group row">
                  <label class="col-md-2 col-form-label" style="color:black;"><?php echo $rows_depart['depart'] ?></label>
                  <div class="col-md-10">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input required name="budget<?=$i?>"  type="text"
                      id="<?php echo $rows_depart['depart']?>" class="form-control prc" placeholder="Isi Budget Dept...">

                      <input required name="id_dept<?=$i?>"  value="<?php echo $rows_depart['id_dep']?>" type="text" "
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
                      <span readonly  type="text"
                      id="result" class="form-control" placeholder="Total Budget Dept...">
                    </div>
                    </div>
                  </div>                    
        </div>
        <div class="modal-footer">
          <button type="reset" id="reset" class="btn btn-danger">Reset</button>
          <button type="submit" class="btn btn-primary" >Save</button>
        </div>
        </form>
      </div>
    </div>
</div>
<!-- End Modal tambah data Alokasi Budget -->

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
                                    <form action="../proses/dashboard/tambahplanning.php" method="post">
                                   
                                    <input type="hidden" name="add">
                                      <div class="form-group row">
                                          <h4 class="col-md-12 modal-title text-left" style="color:black;">SUBJECT</h4>                                      
                                        </div>
                                      <div class="form-group row">
                                          <label class="col-md-2 col-form-label text-left" style="color:black;">Department</label>
                                          <div class="col-md-4">
                                            <div class="form-group">
                                              <select name="depart" class="form-control">
                                                <option value="">Pilih Departement</option> 
                                                <?php 
                                                $depart = mysqli_query($link_yics,"SELECT * FROM depart") or die (mysqli_error($link_yics));
                                                if(mysqli_num_rows($depart)>0){
                                                while( $rows_depart = mysqli_fetch_assoc($depart)){?>
                                                <option value="<?php echo $rows_depart['id_dep'] ?>"><?php echo $rows_depart['depart'] ?></option> 
                                                <?php 
                                              } 
                                              }
                                                ?>                                         
                                              </select>
                                              </div>
                                            </div>
                                            <label class="col-md-2 col-form-label text-left" style="color:black;">Category</label>
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                <select name="kategori" type="text" class="form-control" id="category_prop">
                                                  <option value="">Pilih Category</option>
                                                  <?php 
                                                $kategori = mysqli_query($link_yics,"SELECT * FROM kategori_proposal") or die (mysqli_error($link_yics));
                                                if(mysqli_num_rows($kategori)>0){
                                                while( $rows_kategori= mysqli_fetch_assoc($kategori)){?>
                                                <option  value="<?php echo $rows_kategori['id_kat'] ?>"><?php echo $rows_kategori['kategori'] ?></option> 
                                                <?php 
                                              } 
                                              }
                                                ?>                                                                
                                                </select>
                                              </div>
                                            </div>
                                        </div>                                  
                                        <div class="form-group row">
                                        <label class="col-md-2 col-form-label text-left" style="color:black;">Proposal</label>
                                          <div class="col-md-10">
                                            <input type="text" class="form-control" name="proposal" placeholder=" Judul Proposal" autocomplete="off">
                                          </div>
                                        </div> 
                                        <div class="form-group row">
                                        <label class="col-md-2 col-form-label" style="color:black;">Cost</label>
                                            <div class="col-md-4">  
                                              <div class="input-group">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text">Rp</span>
                                                </div>
                                                <input required name="cost" type="number" 
                                                class="form-control" placeholder="Isi Cost Proposal...">
                                              </div>
                                              </div>
                                            <label class="col-md-2 col-form-label" style="color:black;">Periode tahun</label>
                                              <div class="col-md-4">
                                                <div class="input-group">  
                                                <input type="text" value="<?php echo $data['periode']; ?>" class="form-control" readonly>  
                                                <input name="id_fis" type="text" value="<?php echo $data['id_fis']; ?>" class="form-control" readonly hidden>
                                              </div>
                                            </div>
                                        </div>   
                                      </div>  
                                      <div class="modal-footer">
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <button type="submit"  class="btn btn-primary">Save</button>
                                      </div>
                                      </form>
                                    </div>
                                  </div>
                              </div>
                            <!-- End Modal Tambah Alokasi Budget--> 
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

                                        <form type="post" action="#">
                                          <div class="form-group row">
                                              <h4 class="col-md-12 modal-title text-left" style="color:black;">SUBJECT</h4>                                      
                                            </div>
                                          <div class="form-group row">
                                              <label class="col-md-2 col-form-label text-left" style="color:black;">Department</label>
                                              <div class="col-md-4">
                                              <input type="text" class="form-control bg-grey-200" id="depart_edit" placeholder=" Judul Proposal" autocomplete="off" value="Body Plant 2">
                                                </div>
                                                <label class="col-md-2 col-form-label text-left" style="color:black;">Category</label>
                                                <div class="col-md-4">
                                                <input type="text" class="form-control bg-grey-200" id="category_edit" placeholder=" Judul Proposal" autocomplete="off" value="Improvement">
                                                </div>
                                            </div>                                  
                                            <div class="form-group row">
                                              <label class="col-md-2 col-form-label text-left" style="color:black;">Proposal</label>
                                              <div class="col-md-10">
                                              <input type="text" class="form-control bg-grey-200" id="proposal_edit" placeholder=" Judul Proposal" autocomplete="off" value="Making robot spot">
                                              </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                              <h4 class="col-md-12 modal-title text-left" style="color:black;">STEP ASSIGMENT</h4>                                      
                                            </div>
                                            <div class="form-group row text-left">
                                              <div class="col-md-4">                                      
                                                    <div class="form-group">
                                                    <select class="form-control" id="pilih_step">
                                                      <option >Pilih Step</option>
                                                      <option id="option1">1.Quatation</option> 
                                                      <option id="option2">2.Assignment</option>                                                                                                                                          
                                                      <option id="option3">3.Request for Negoisasi</option>                                                                             
                                                      <option id="option4">4.Price Confirmation 	</option>                                                                             
                                                      <option id="option5">5.Budget Planning</option>                                                                             
                                                    </select>
                                                  </div>
                                              </div>       
                                            </div>
                                            <hr>
                                            <div class="form-group row text-center" id="step1">  
                                              <div class="col-md-4">                                      
                                               <h5 >Step</h5>
                                              </div>                                              
                                              <div class="col-md-4">                                      
                                               <h5>Approval</h5>
                                              </div>                                              
                                              <div class="col-md-4">                                      
                                               <h5>Date</h5>
                                              </div>                                                                                                                                       
                                            </div>
                                            <!-- #1 -->
                                            <div class="form-group row" id="step1">
                                              <div class="col-md-4">                                      
                                                <input type="text" class="form-control bg-grey-200"  value="1. Quatation" disabled>
                                              </div>
                                              <div class="col-md-2">                                      
                                                <div class="custom-switches-stacked mt-2">
                                                  <label class="custom-switch">
                                                    <input id="reject_step1" type="checkbox" name="radio_step1"  value="0" 
                                                    class="custom-switch-input" data-plugin="switchery" data-color="#17b3a3" checked>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Reject</span>
                                                  </label>
                                                </div>   
                                              </div>
                                              <div class="col-md-2">                                      
                                                <div class="custom-switches-stacked mt-2">
                                                  <label class="custom-switch">
                                                    <input id="app_step1" type="checkbox" name="radio_step1" value="1" 
                                                    data-color="#17b3a3" class="custom-switch-input" data-plugin="switchery">
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Approve</span>
                                                  </label>
                                                </div>   
                                              </div>
                                              <div class="col-md-4 ">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="icon wb-calendar" aria-hidden="true"></i>
                                                </span>  
                                                <input type="text" class="form-control bg-grey-200"  value="22-july-2022" disabled>
                                                </div>
                                              </div> 
                                            </div>
                                            <!-- #2 -->
                                            <div class="form-group row" id="step2">
                                              <div class="col-md-4">                                      
                                                <input type="text" class="form-control bg-grey-200"  value="2. Assignment" disabled>
                                              </div>
                                              <div class="col-md-2">                                      
                                                <div class="custom-switches-stacked mt-2">
                                                  <label class="custom-switch">
                                                    <input id="reject_step2" type="checkbox" name="radio_step2"  value="0" 
                                                    class="custom-switch-input" data-plugin="switchery" data-color="#17b3a3" checked>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Reject</span>
                                                  </label>
                                                </div>   
                                              </div>
                                              <div class="col-md-2">                                      
                                                <div class="custom-switches-stacked mt-2">
                                                  <label class="custom-switch">
                                                    <input id="app_step2" type="checkbox" name="radio_step2" value="1" 
                                                    data-color="#17b3a3" class="custom-switch-input" data-plugin="switchery">
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Approve</span>
                                                  </label>
                                                </div>   
                                              </div>
                                              <div class="col-md-4 ">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="icon wb-calendar" aria-hidden="true"></i>
                                                </span>  
                                                <input type="text" class="form-control bg-grey-200"  value="22-july-2022" disabled>
                                                </div>
                                              </div> 
                                            </div>

                                            <!-- #3. Request for Negosiasi -->
                                            <div class="form-group row" id="step3">
                                              <div class="col-md-4">                                      
                                                <input type="text" class="form-control bg-grey-200"  value="3. Request for Negosiasi" disabled>
                                              </div>
                                              <div class="col-md-2">                                      
                                                <div class="custom-switches-stacked mt-2">
                                                  <label class="custom-switch">
                                                    <input id="reject_step3" type="checkbox" name="radio_step3"  value="0" 
                                                    class="custom-switch-input" data-plugin="switchery" data-color="#17b3a3" checked>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Reject</span>
                                                  </label>
                                                </div>   
                                              </div>
                                              <div class="col-md-2">                                      
                                                <div class="custom-switches-stacked mt-2">
                                                  <label class="custom-switch">
                                                    <input id="app_step3" type="checkbox" name="radio_step3" value="1" 
                                                    data-color="#17b3a3" class="custom-switch-input" data-plugin="switchery">
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Approve</span>
                                                  </label>
                                                </div>   
                                              </div>
                                              <div class="col-md-4 ">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="icon wb-calendar" aria-hidden="true"></i>
                                                </span>  
                                                <input type="text" class="form-control bg-grey-200"  value="22-july-2022" disabled>
                                                </div>
                                              </div> 
                                            </div>
                                            <!-- #4. Price Confirmation -->
                                            <div class="form-group row" id="step4">
                                              <div class="col-md-4">                                      
                                                <input type="text" class="form-control bg-grey-200"  value="4. Price Confirmation" disabled>
                                              </div>
                                              <div class="col-md-2">                                      
                                                <div class="custom-switches-stacked mt-2">
                                                  <label class="custom-switch">
                                                    <input id="reject_step4" type="checkbox" name="radio_step4"  value="0" 
                                                    class="custom-switch-input" data-plugin="switchery" data-color="#17b3a3" checked>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Reject</span>
                                                  </label>
                                                </div>   
                                              </div>
                                              <div class="col-md-2">                                      
                                                <div class="custom-switches-stacked mt-2">
                                                  <label class="custom-switch">
                                                    <input id="app_step4" type="checkbox" name="radio_step4" value="1" 
                                                    data-color="#17b3a3" class="custom-switch-input" data-plugin="switchery">
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Approve</span>
                                                  </label>
                                                </div>   
                                              </div>
                                              <div class="col-md-4 ">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="icon wb-calendar" aria-hidden="true"></i>
                                                </span>  
                                                <input type="text" class="form-control bg-grey-200"  value="22-july-2022" disabled>
                                                </div>
                                              </div> 
                                            </div>

                                            <!-- #5. Budget Planning -->
                                            <div class="form-group row" id="step4">
                                              <div class="col-md-4">                                      
                                                <input type="text" class="form-control bg-grey-200"  value="5. Budget Planning" disabled>
                                              </div>
                                              <div class="col-md-2">                                      
                                                <div class="custom-switches-stacked mt-2">
                                                  <label class="custom-switch">
                                                    <input id="reject_step5" type="checkbox" name="radio_step5"  value="0" 
                                                    class="custom-switch-input" data-plugin="switchery" data-color="#17b3a3" checked>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Reject</span>
                                                  </label>
                                                </div>   
                                              </div>
                                              <div class="col-md-2">                                      
                                                <div class="custom-switches-stacked mt-2">
                                                  <label class="custom-switch">
                                                    <input id="app_step5" type="checkbox" name="radio_step5" value="1" 
                                                    data-color="#17b3a3" class="custom-switch-input" data-plugin="switchery">
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Approve</span>
                                                  </label>
                                                </div>   
                                              </div>
                                              <div class="col-md-4 ">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="icon wb-calendar" aria-hidden="true"></i>
                                                </span>  
                                                <input type="text" class="form-control bg-grey-200"  value="22-july-2022" disabled>
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
                            <!-- End Edit plannning proposal 2-->  


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
   <!-- CHECK BOX -->

   <script>
    $(document).ready(function(){
        $(document).on('click', '#checkAll', function() {
            if(this.checked){
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
                    if($('.check:checked').length == $('.check').length){
                        $('#checkAll').prop('checked', true)
                    } else {
                        $('#checkAll').prop('checked', false)
                    }
                })
    })
</script>

   




<!-- <script>
$(document).on('change', '#startfiscal',function(){
    var endfiscal = parseInt($(this).val())+1;        
    $('#tahun_end').html ('<option id ="tahun_end" value="' + endfiscal + '" selected>Mar '+endfiscal+'</option>');
})
</script>
<script>
 $(document).on('click', '#reset',function(){ 
  $('#tahun_end').html ('<option id ="tahun_end" value="" selected>Pilih...</option>');
})
</script>
<script>
 $(document).on('click', '#reset',function(){ 
  $('#cari').html ('<input type="text" class="form-control" name="" placeholder="Search..." style="background-color:#E4EAEC;" id="cari">');})
</script>
<script>
$(document).on('change', '#startfiscal1',function(){
    var endfiscal = parseInt($(this).val())+1;
    $('#tahun_end1').html ('<option id ="tahun_end1" value="' + endfiscal + '" selected>Mar '+endfiscal+'</option>');
})
</script> -->

<!-- <script>
$('#tambahplanning').on('submit', function (e){
  e.preventDefault
  var depart = $('#depart').val()
  var category = $('#category').val()
  var proposal = $('#proposal').val()
  $.ajax ({
            type : 'POST',
            url : "tambahplanning.php",
            data : {depart:depart,category:category,proposal:proposal}  ,
            success :  function (msg){            
              $('#dataTabel2').html (msg);        
            }
          })
  })
</script> -->
<!-- data donut    -->