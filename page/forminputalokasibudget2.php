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
                                                <div class="col-lg-8 col-md-8">
                                                    <div class="float-left">
                                                        <span class="font-size-20 bold">Planning Proposal</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 ">
                                                    <div class="float-right">
                                                        <i href="" data-toggle="tooltip"
                                                            data-original-title="Tambah Data">
                                                            <button type="button"
                                                                class="btn btn-icon btn-info btn-xs btn-outline"
                                                                data-toggle="modal"
                                                                data-target="#TambahPlaningProposal">
                                                                <i class="icon wb-plus" aria-hidden="true"></i></button>
                                                        </i>
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
                                            <!-- Modal tambah plannning proposal -->
                                            <div class="modal fade modal-info " id="TambahPlaningProposal"
                                                aria-hidden="true" aria-labelledby="TambahPlaningProposal" role="dialog"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-simple modal-center modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            <h3 class="modal-title">Alokasi Planning Proposal</h3>
                                                        </div>
                                                        <div class="row">
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../proses/dashboard/tambahplanning.php"
                                                                method="post" enctype="multipart/form-data">

                                                                <input type="hidden" name="add">
                                                                <input name="mata_uang" type="number" value="1"
                                                                    class="form-control" hidden>
                                                                <div class="form-group row">
                                                                    <h4 class="col-md-12 modal-title text-left"
                                                                        style="color:black;">SUBJECT</h4>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-2 col-form-label"
                                                                        style="color:black;">Periode tahun</label>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <select name="id_fis" class="form-control"
                                                                                required>
                                                                                <option value="">Pilih Periode</option>
                                                                                <?php 
                                                $periode = mysqli_query($link_yics,"SELECT * FROM time_fiscal") or die (mysqli_error($link_yics));
                                                if(mysqli_num_rows($periode)>0){
                                                while( $rows_periode = mysqli_fetch_assoc($periode)){?>
                                                                                <option
                                                                                    value="<?php echo $rows_periode['id_fis'] ?>">
                                                                                    <?php echo $rows_periode['periode'] ?>
                                                                                </option>
                                                                                <?php 
                                              } 
                                              }
                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <label class="col-md-2 col-form-label text-left"
                                                                        style="color:black;">Pic Area</label>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <select name="depart" class="form-control"
                                                                                required>
                                                                                <option value="">Pilih Username
                                                                                </option>
                                                                                <?php 
                                                $depart = mysqli_query($link_yics,"SELECT * FROM depart") or die (mysqli_error($link_yics));
                                                if(mysqli_num_rows($depart)>0){
                                                while( $rows_depart = mysqli_fetch_assoc($depart)){?>
                                                                                <option
                                                                                    value="<?php echo $rows_depart['id_dep'] ?>">
                                                                                    <?php echo $rows_depart['depart'] ?>
                                                                                </option>
                                                                                <?php 
                                              } 
                                              }
                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-2 col-form-label text-left"
                                                                        style="color:black;">Department</label>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <select name="depart" class="form-control"
                                                                                required>
                                                                                <option value="">Pilih Departement
                                                                                </option>
                                                                                <?php 
                                                $depart = mysqli_query($link_yics,"SELECT * FROM depart") or die (mysqli_error($link_yics));
                                                if(mysqli_num_rows($depart)>0){
                                                while( $rows_depart = mysqli_fetch_assoc($depart)){?>
                                                                                <option
                                                                                    value="<?php echo $rows_depart['id_dep'] ?>">
                                                                                    <?php echo $rows_depart['depart'] ?>
                                                                                </option>
                                                                                <?php 
                                              } 
                                              }
                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <label class="col-md-2 col-form-label text-left"
                                                                        style="color:black;">Category</label>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <select name="kategori" type="text"
                                                                                class="form-control" required>
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
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-2 col-form-label text-left"
                                                                        style="color:black;">Proposal</label>
                                                                    <div class="col-md-10">
                                                                        <input type="text" class="form-control "
                                                                            name="proposal"
                                                                            placeholder=" Judul Proposal..."
                                                                            autocomplete="off" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-2 col-form-label"
                                                                        style="color:black;">Cost</label>
                                                                    <div class="col-md-6">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span
                                                                                    class="input-group-text">IDR</span>
                                                                            </div>

                                                                            <input required name="cost" type="text"
                                                                                class="form-control" id="rupiah"
                                                                                placeholder="Isi Cost Proposal...">
                                                                            <div class="input-group-prepend ">
                                                                                <span
                                                                                    class="input-group-text bg-yellow-100">MILLION</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-2 col-form-label"
                                                                        style="color:black;">Lampiran</label>

                                                                    <div class="col-md-10 input-group">
                                                                        <!-- <input class="form-control-file" type="file" name="lampiran" required> -->
                                                                        <div class="input-group input-group-file"
                                                                            data-plugin="inputGroupFile">
                                                                            <div class="input-group-append">
                                                                                <span class="btn btn-warning btn-file">
                                                                                    <i class="icon fa-file-pdf-o"
                                                                                        aria-hidden="true"></i>
                                                                                    <input type="file" name="lampiran"
                                                                                        multiple="">
                                                                                </span>
                                                                            </div>
                                                                            <input type="text" class="form-control"
                                                                                readonly=""
                                                                                placeholder="Upload Scan Proposal ekstensi Anda..">
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-2 col-form-label"
                                                                        style="color:black;">Keterangan</label>

                                                                    <div class="col-md-10 input-group">
                                                                        <textarea type="text" class="form-control"
                                                                            name="benefit" style=”height:100px;”
                                                                            placeholder="Deskripsikan secara singkat proposaL Anda.."
                                                                            autocomplete="off" value=""
                                                                            required></textarea>
                                                                    </div>

                                                                </div>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="reset" class="btn btn-danger">Reset</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <!-- End Modal Tambah Alokasi Budget-->




                                            <form action="../proses/dashboard/alokasi.php" method="POST" id="tambahdata"
                                                class="needs-validation sum">
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
                                                                value="<?php echo $data['id_fis']; ?>"
                                                                class="form-control" readonly hidden>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group row">
                                                    <h4 class="col-md-12 modal-title text-left" style="color:black;">
                                                        Budget Alokasi</h4>
                                                </div>
                                                <!-- .......................................................query depart..................................                                                -->
                                                <?php 
                        $depart = mysqli_query($link_yics, "SELECT * FROM depart") or die (mysqli_error($link_yics));
                        if(mysqli_num_rows($depart)>0){
                        ?>
                                                <input name="totalData" type="text"
                                                    value="<?=mysqli_num_rows( $depart)?>" hidden>

                                                <?php
                            $i = 1;
                            while($rows_depart = mysqli_fetch_assoc($depart)){  ?>


                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label"
                                                        style="color:black;"><?php echo $rows_depart['depart'] ?></label>
                                                    <div class="col-md-10">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Rp</span>
                                                            </div>
                                                            <input required type="text" class="form-control prc"
                                                                placeholder="Isi Budget Dept...">

                                                        </div>
                                                    </div>
                                                </div>
                                                <hr />

                                                <div class="table table-responsive">
                                                    <table class="table display text-nowrap table-bordered"
                                                        style="width:100%">
                                                        <thead class="bg-brown-300">
                                                            <tr class="font-size-15">
                                                                <th class="align-middle text-center">No</th>
                                                                <th class="align-middle text-center" width="200px">
                                                                    Category</th>
                                                                <th class="align-middle text-center">Proposal</th>
                                                                <th class="align-middle text-center" width="200px">Cost
                                                                </th>
                                                                <th class="align-middle text-center" width="20px">Action
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td width="10px" </td>
                                                                <td>

                                                                </td>
                                                                <td>

                                                                </td>
                                                                <td>

                                                                </td>
                                                                <td>
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-icon ">
                                                                        <i class="icon oi-trashcan"></i>
                                                                    </button>
                                                                    <button type="submit"
                                                                        class="btn btn-warning btn-icon " id="search">
                                                                        <i class="icon wb-edit"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>




                                                <?php }
                                                
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

        <!--############ jquery penjumlahan loopinng attribut classs ################# -->

        <!--############ end jquery penjumlahan loopinng attribut classs ################# -->