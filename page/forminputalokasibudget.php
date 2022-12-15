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
    </nav>
    <div class="site-menubar">
        <!-- sidebar -->
        <div class="site-menubar-body">
            <div>
                <div><br><br>
                    <!-- Site Navbar Utama -->
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
                                                        <span class="font-size-20 bold">Form input alokasi budget</span>
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
                                            <form action="../proses/dashboard/alokasi.php" method="POST" id="mainForm"
                                                class="needs-validation sum"></form>
                                            <input type="hidden" name="ubah">
                                            <div class="form-group row">
                                                <h4 class="col-md-12 modal-title text-left" style="color:black;">
                                                    Tahun Fiscal</h4>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" style="color:black;">Periode
                                                    tahun</label>
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
                                                        <input type="text" value="<?php echo $data['periode']; ?>"
                                                            class="form-control" readonly>
                                                        <input name="id_fis" type="text"
                                                            value="<?php echo $data['id_fis']; ?>" class="form-control"
                                                            readonly hidden>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <?php 
                        $depart = mysqli_query($link_yics, "SELECT * FROM depart") or die (mysqli_error($link_yics));                       
                        ?>
                                            <div class="form-group row">
                                                <h4 class="col-md-12 modal-title text-left" style="color:black;">
                                                    Budget Alokasi</h4>
                                            </div>
                                            <input name="totalData" type="text" value="<?=mysqli_num_rows( $depart)?>"
                                                hidden>
                                            <!-- .......................................................query depart..................................                                                -->
                                            <?php 
                        $i = 1;
                        if(mysqli_num_rows($depart)>0){                                                                                      
                        while($rows_depart = mysqli_fetch_assoc($depart)){  
                       
                        
                        ?>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label"
                                                    style="color:black;"><?php echo $rows_depart['depart']; ?></label>
                                                <div class="col-md-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Rp</span>
                                                        </div>
                                                        <input type="text" class="form-control prc"
                                                            placeholder="Isi Budget Dept...">

                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                            <form id="subForm<?= $i; ?>"
                                                action="../proses/dashboard/tambah_planning_proposal.php" method="post"
                                                enctype="multipart/form-data"></form>
                                            <input type="hidden" name="add" form="subForm<?= $i; ?>">
                                            <input name="depart" type="text"
                                                value="<?php echo $rows_depart['id_dep']; ?>" class="form-control"
                                                form="subForm<?= $i; ?>" hidden>
                                            <input name="mata_uang" type="text" value="1" class="form-control"
                                                form="subForm<?= $i; ?>" hidden>
                                            <input name="id_fis" type="text" value="<?php echo $id; ?>"
                                                class="form-control" readonly form="subForm<?= $i; ?>" hidden>
                                            <div class="table table-responsive">
                                                <table class="table display text-nowrap bg-blue-100" style="width:100%">
                                                    <thead>
                                                        <tr class="font-size-18">
                                                            <th class="align-middle text-center" width="220px">
                                                                Pic
                                                                Area</th>
                                                            <th class="align-middle text-center" width="180px">
                                                                Category</th>
                                                            <th class="align-middle text-center" width="480px">
                                                                Proposal</th>
                                                            <th class="align-middle text-center" width="120px">
                                                                Cost
                                                            </th>
                                                            <th class="align-middle text-center" width="20px">
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <select name="area" type="text" class="form-control"
                                                                    required form="subForm<?= $i; ?>">
                                                                    <option value="">Pilih Area</option>
                                                                    <?php 
                                                                            $area = mysqli_query($link_yics,"SELECT * FROM data_user WHERE id_dep = '$rows_depart[id_dep]'") or die (mysqli_error($link_yics));
                                                                            if(mysqli_num_rows($area)>0){
                                                                            while( $rows_area= mysqli_fetch_assoc($area)){?>
                                                                    <option value="<?php echo $rows_area['area'] ?>">
                                                                        <?php echo $rows_area['area'] ?>
                                                                    </option>
                                                                    <?php 
                                                                              
                                                                            } 
                                                                                }
                                                                                    ?>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select name="kategori" type="text" class="form-control"
                                                                    required form="subForm<?= $i; ?>">
                                                                    <option value="">Pilih Category</option>
                                                                    <?php 
                                                                                $kategori = mysqli_query($link_yics,"SELECT * FROM kategori_proposal") or die (mysqli_error($link_yics));
                                                                                if(mysqli_num_rows($kategori)>0){
                                                                                while( $rows_kategori= mysqli_fetch_assoc($kategori)){?>
                                                                    <option
                                                                        value="<?php echo $rows_kategori['id_kat'] ?>">
                                                                        <?php echo $rows_kategori['kategori'] ?>
                                                                    </option>
                                                                    <?php 
                                                                        } 
                                                                        }
                                                                            ?>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="proposal"
                                                                    placeholder=" Isi deskripsi proposal.."
                                                                    form="subForm<?= $i; ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="cost"
                                                                    placeholder=" Isi cost.." form="subForm<?= $i; ?>">
                                                            </td>
                                                            <td>
                                                                <button type="reset" class="btn btn-danger "
                                                                    form="subForm<?= $i; ?>">
                                                                    RESET
                                                                </button>
                                                                <button type="submit" class="btn btn-success btn-icon"
                                                                    form="subForm<?= $i; ?>">
                                                                    SUBMIT
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="table table-responsive">
                                                <table class="table display text-nowrap table-bordered"
                                                    style="width:100%">
                                                    <thead class="bg-brown-300">
                                                        <tr class="font-size-15 align-middle text-center">
                                                            <th width="10px">No</th>
                                                            <th width="200px">
                                                                Category</th>
                                                            <th>Proposal</th>
                                                            <th width="200px">
                                                                Cost
                                                            </th>
                                                            <th width="20px">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                    $isi = mysqli_query($link_yics ,"SELECT *
                            FROM plan_proposal 
                            JOIN depart ON plan_proposal.id_dep = depart.id_dep
                            JOIN kategori_proposal  ON plan_proposal.id_kat = kategori_proposal.id_kat
                            JOIN time_fiscal  ON plan_proposal.id_fis = time_fiscal.id_fis  
                            WHERE time_fiscal.id_fis= '$id' AND depart.id_dep='$rows_depart[id_dep]'")or die (mysqli_error($link_yics));
                            $no=1;                      
						  // untuk memvalidasi apakah ada datanya
                          if(mysqli_num_rows($isi)>0){
                           while($datad = mysqli_fetch_assoc($isi)){
                            $id_prop=$datad['id_prop'];
                            $kategori=$datad['kategori'];
                            $proposal=$datad['proposal'];
                            $cost=$datad['cost'];
                            ?>
                                                        <tr class="align-middle text-center">
                                                            <td class="align-middle text-center">
                                                                <?=$no; ?>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <?= $kategori; ?>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <?= $proposal; ?>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <?= $cost; ?>
                                                            </td>
                                                            <td>
                                                                <button type="submit" class="btn btn-danger btn-icon ">
                                                                    <i class="icon oi-trashcan"></i>
                                                                </button>
                                                                <button type="submit" class="btn btn-warning btn-icon ">
                                                                    <i class="icon wb-edit"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                                $no++;
                                                                }
                                                                } 
                                                                ?>
                                                    </tbody>
                                                </table>
                                            </div>




                                            <?php 
                                            
                                            $i++;}
                                                
                                            } ?>
                                            <!-- ................................................end query depart................................ -->
                                            <hr>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" style="color:black;">Total
                                                    Budget</label>
                                                <div class="col-md-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Rp</span>
                                                        </div>
                                                        <span type="text" class="form-control"
                                                            placeholder="Total Budget Dept.." value="" id="result"
                                                            readonly></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="dashboard.php" type="" id="reset"
                                                class="btn btn-danger">Kembali</a>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>

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

        <!--############ end jquery penjumlahan loopinng attribut classs ################# -->