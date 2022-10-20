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
    </nav>
    <div class="site-menubar">
        <!-- sidebar -->
        <div class="site-menubar-body">
            <div>
                <div><br><br>
                    <!-- Site Navbar Search -->
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
                            <h1 class="page-title font-size-26 font-weight-600">Control Table Body Plant 1 (x Million)
                            </h1>
                        </div>

                        <div class="page-content container-fluid">
                            <div class="row">
                                <div class="col-lg-6 col-md-6  mb-2">
                                    <?php 
           $alokasi = mysqli_query($link_yics, "SELECT * FROM time_fiscal WHERE status='aktif'") or die(mysqli_error($link_yics));
           $data = mysqli_fetch_assoc($alokasi);
            ?>
                                    <h6 class="font-size-18 font-weight-400">Periode ( <span
                                            style="color:red;"><?php echo $data['periode']; ?> </span> ) :
                                        <span style="color:red;"><?php echo date("d M Y", strtotime($data['awal'])); ?>
                                        </span>
                                        s.d
                                        <span style="color:red;"><?php echo date("d M Y", strtotime($data['akhir'])); ?>
                                        </span>
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
                                                <input type="date" name="start" id="start_date"
                                                    class="form-control bg-transparent datepicker" value="">

                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-5">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">to</span>
                                                </div>
                                                <input type="date" name="start" id="start_date"
                                                    class="form-control bg-transparent datepicker" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-2 text-right">
                                            <button type="submit" class="btn btn-primary btn-floating btn-sm "><i
                                                    aria-hidden="true"></i>GO</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
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
                                                                            <button type="submit"
                                                                                class="btn btn-primary"><i
                                                                                    class="icon wb-search"
                                                                                    aria-hidden="true"></i></button>
                                                                        </span>
                                                                        <input type="text" class="form-control" name=""
                                                                            placeholder="Search...">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="float-right">
                                                                <a href="" data-toggle="tooltip"
                                                                    data-original-title="View">
                                                                    <button type="button"
                                                                        class="btn btn-success btn-icon btn-outline">
                                                                        <i class="icon wb-eye" aria-hidden="true"></i>
                                                                    </button>
                                                                </a>
                                                                <a href="javascript:void(0)" data-toggle="tooltip"
                                                                    data-original-title="Print">
                                                                    <!-- <button type="button"
                                                                        class="btn btn-icon btn-warning btn-outline">
                                                                        <i class="icon wb-print" aria-hidden="true"></i>
                                                                    </button> -->
                                                                    <a data-toggle="tooltip"
                                                                        data-original-title="Tambah Data">
                                                                        <button type="button"
                                                                            class="btn btn-icon btn-outline btn-info"
                                                                            data-toggle="modal"
                                                                            data-target="#TambahControlTableBody1">
                                                                            <i class="icon wb-plus"
                                                                                aria-hidden="true"></i>
                                                                        </button>
                                                                    </a>
                                                                    <!-- Modal Tammbah Data Control  Table Body 1 -->
                                                                    <div class="modal fade modal-info "
                                                                        id="TambahControlTableBody1" aria-hidden="true"
                                                                        aria-labelledby="TambahControlTableBody1"
                                                                        role="dialog" tabindex="-1">
                                                                        <div
                                                                            class="modal-dialog modal-simple modal-center modal-lg">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">×</span>
                                                                                    </button>
                                                                                    <h3 class="modal-title">Input
                                                                                        Investment Planning Control
                                                                                        Table</h3>
                                                                                </div>

                                                                                <div class="modal-body">
                                                                                    <form>
                                                                                        <div class="form-group row">
                                                                                            <h4 class="col-md-12 modal-title text-left"
                                                                                                style="color:black;">
                                                                                                SUBJECT</h4>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label
                                                                                                class="col-md-2 col-form-label text-left"
                                                                                                style="color:black;">Department</label>
                                                                                            <div class="col-md-4">
                                                                                                <div class="form-group">
                                                                                                    <select
                                                                                                        class="form-control">
                                                                                                        <option>Pilih
                                                                                                            Departement
                                                                                                        </option>
                                                                                                        <option>Body
                                                                                                            Plant 1
                                                                                                        </option>
                                                                                                        <option>Body
                                                                                                            Plant 2
                                                                                                        </option>
                                                                                                        <option>BQC
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <label
                                                                                                class="col-md-2 col-form-label text-left"
                                                                                                style="color:black;">Category</label>
                                                                                            <div class="col-md-4">
                                                                                                <div class="form-group">
                                                                                                    <select
                                                                                                        class="form-control">
                                                                                                        <option>Pilih
                                                                                                            Category
                                                                                                        </option>
                                                                                                        <option>
                                                                                                            Improvement
                                                                                                        </option>
                                                                                                        <option>
                                                                                                            Replacement
                                                                                                        </option>
                                                                                                        <option>Other
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label
                                                                                                class="col-md-2 col-form-label text-left"
                                                                                                style="color:black;">Proposal</label>
                                                                                            <div class="col-md-10">
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    name="name"
                                                                                                    placeholder=" Judul Proposal"
                                                                                                    autocomplete="off">
                                                                                            </div>
                                                                                        </div>
                                                                                        <hr>
                                                                                        <div class="form-group row">
                                                                                            <h4 class="col-md-12 modal-title text-left"
                                                                                                style="color:black;">
                                                                                                BUDGET</h4>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label
                                                                                                class="col-md-2 col-form-label mt-4"
                                                                                                style="color:black;">In
                                                                                                RP</label>
                                                                                            <div class="col-md-4">
                                                                                                <span
                                                                                                    style="color:red;font-size: 13px;font-style: italic;">*(Sisa
                                                                                                    budget Rp
                                                                                                    300)</span>
                                                                                                <div
                                                                                                    class="input-group">
                                                                                                    <div
                                                                                                        class="input-group-prepend">
                                                                                                        <span
                                                                                                            class="input-group-text">RP</span>
                                                                                                    </div>
                                                                                                    <input type="number"
                                                                                                        class="form-control"
                                                                                                        placeholder="Nominal Rupiah">
                                                                                                </div>
                                                                                            </div>
                                                                                            <label
                                                                                                class="col-md-2 col-form-label mt-4"
                                                                                                style="color:black;">In
                                                                                                JPY</label>
                                                                                            <div class="col-md-4">
                                                                                                <span
                                                                                                    style="color:red;font-size: 13px;font-style: italic;">*(Sisa
                                                                                                    budget YJP
                                                                                                    300)</span>
                                                                                                <div
                                                                                                    class="input-group">
                                                                                                    <div
                                                                                                        class="input-group-prepend">
                                                                                                        <span
                                                                                                            class="input-group-text">JPY</span>
                                                                                                    </div>
                                                                                                    <input type="number"
                                                                                                        class="form-control"
                                                                                                        placeholder="Nominal Yen">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-danger"
                                                                                        data-dismiss="modal">Reset</button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">Submit</button>
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
                                            <div
                                                class=" table table-responsive table-bordered text-center 10px table-striped text-nowrap">
                                                <table class="table" id="table-proposal">
                                                    <thead class="table-info">
                                                        <tr>
                                                            <th class="judul align-middle text-center" colspan="6">
                                                                INVESTMENT PLANNING CONTROL TABLE</th>
                                                            <th class="judul align-middle text-center" colspan="14">
                                                                IMPLEMENTATION CONTROL TABLE</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="judul align-middle text-center" rowspan="2"
                                                                style="width:200px;" colspan="1">NO</th>
                                                            <th class="judul align-middle text-center" rowspan="2"
                                                                style="width :500px;">DEPEARTMENT</th>
                                                            <th class="judul align-middle text-center" rowspan="2"
                                                                style="width :500px;">CATEGORY</th>
                                                            <th class="judul align-middle text-center" rowspan="2"
                                                                style="width :500px;">DESCRIPTION</th>
                                                            <th class="judul align-middle text-center" rowspan="2"
                                                                style="width: 300px;">TOTAL MILL JPY</th>
                                                            <th class="judul align-middle text-center" rowspan="2"
                                                                style="width: 300px;">TOTAL MILL IDR</th>
                                                            <th class="judul align-middle text-center" rowspan="2"
                                                                style="width:20px;">No</th>
                                                            <th class="judul align-middle text-center" colspan="2"
                                                                style="width:300px;">IA No.</th>
                                                            <th class="judul align-middle text-center" rowspan="2"
                                                                style="width:300px;">DESCRIPTION</th>
                                                            <th class="judul align-middle text-center" colspan="3"
                                                                style="width:300px;">Original Currency</th>
                                                            <th class="judul align-middle text-center" colspan="2"
                                                                style="width:300px;">Actual In</th>
                                                            <th class="judul align-middle text-center" colspan="2"
                                                                style="width:300px;">Remaining</th>
                                                            <th class="judul align-middle text-center" rowspan="2"
                                                                style="width: 200px;">Valid Until</th>
                                                            <th class="judul align-middle text-center">Remark</th>
                                                            <th class="judul align-middle text-center table-danger"
                                                                rowspan="2" style="width: 200px;">Action</th>

                                                        </tr>
                                                        <tr>
                                                            <th class="align-middle text-center" style="width: 400px;">
                                                                Subject</th>
                                                            <th class="align-middle text-center" style="width: 400px;">
                                                                IO</th>
                                                            <th class="align-middle text-center" style="width: 100px;">
                                                                JPY</th>
                                                            <th class="align-middle text-center" style="width: 100px;">
                                                                Rp</th>
                                                            <th class="align-middle text-center" style="width: 100px;">
                                                                1000USD</th>
                                                            <th class="align-middle text-center" style="width: 100px;">
                                                                JPY</th>
                                                            <th class="align-middle text-center" style="width: 100px;">
                                                                Rp</th>
                                                            <th class="align-middle text-center" style="width: 100px;">
                                                                JPY</th>
                                                            <th class="align-middle text-center" style="width: 100px;">
                                                                Rp</th>
                                                            <th class="align-middle text-center" style="width: 100 px">
                                                                CT Updated</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>

                                                        <!-- query proposal control table -->
                                                        <?php   
                              $proposal = mysqli_query($link_yics ,"SELECT
                                proposal.id_prop AS id_prop,
                                depart.id_dep AS id_dep,
                                depart.depart AS depart,
                                kategori_proposal.kategori AS kategori,
                                time_fiscal.status AS `status`,
                                proposal.proposal AS proposal,
                                tracking_prop.id_prog AS id_prog, 
                                tracking_prop.id_approval AS id_approval,
                                `time`,
                                progress.step AS step,
                                progress.nama_progress AS progress,
                                approval.approval AS approval,
                                proposal.cost AS cost
                                
                                FROM tracking_prop   
                                LEFT JOIN proposal  ON tracking_prop.id_prop = proposal.id_prop
                                LEFT JOIN depart ON proposal.id_dep = depart.id_dep
                                LEFT JOIN kategori_proposal  ON proposal.id_kat = kategori_proposal.id_kat
                                LEFT JOIN time_fiscal  ON proposal.id_fis = time_fiscal.id_fis
                                LEFT JOIN progress  ON tracking_prop.id_prog = progress.id_prog
                                
                               
                                LEFT JOIN approval ON tracking_prop.id_approval = approval.id_approval
                                WHERE tracking_prop.id_approval  = '1' AND progress.step = '5' AND depart.id_dep= '1'"
                                )
                                or die (mysqli_error($link_yics));
                                $no=1;
                                // untuk memvalidasi apakah ada datanya
                                if(mysqli_num_rows($proposal)>0){
                                while($data = mysqli_fetch_assoc($proposal)){?>

                                                        <tr
                                                            class="<?php if ($no%2==0){ echo "bg-blue-100"; } else{ echo ""; } ?> text-uppercase">
                                                            <td class="align-middle text-center"><?php echo $no; ?></td>
                                                            <td class="align-middle text-center">
                                                                <?php echo $data['depart']; ?></td>
                                                            <td class="align-middle text-center">
                                                                <?php echo $data['kategori']; ?></td>
                                                            <td class="align-middle text-center"
                                                                data-target="#EditControlTableBody1"
                                                                data-toggle="modal">
                                                                <?php echo $data['proposal']; ?>
                                                            </td>
                                                            <td class="align-middle text-center">¥
                                                                <?= round($data['cost']/105); ?></td>
                                                            <td class="align-middle text-center">Rp
                                                                <?php echo number_format ($data['cost'],0,',','.'); ?>
                                                            </td>
                                                            <td class="align-middle text-center"></td>
                                                            <td class="align-middle text-center"></td>
                                                            <td class="align-middle text-center"></td>
                                                            <td class="align-middle text-center"></td>
                                                            <td class="align-middle text-center"></td>
                                                            <td class="align-middle text-center"></td>
                                                            <td class="align-middle text-center"></td>
                                                            <td class="align-middle text-center"></td>
                                                            <td class="align-middle text-center"></td>
                                                            <td class="align-middle text-center"></td>
                                                            <td class="align-middle text-center"></td>
                                                            <td class="align-middle text-center"></td>
                                                            <td class="align-middle text-center"></td>
                                                            <td class="align-middle text-center">
                                                                <a data-toggle="tooltip" data-original-title="Edit">
                                                                    <button type="button"
                                                                        class="btn btn-icon btn-success"
                                                                        data-target="#EditControlTableBody1"
                                                                        data-toggle="modal">
                                                                        <i class="icon wb-edit" aria-hidden="true"></i>
                                                                    </button>
                                                                </a>
                                                                <a href="javascript:void(0)" data-toggle="tooltip"
                                                                    data-original-title="Hapus">
                                                                    <button type="button"
                                                                        class="btn btn-icon btn-danger HapusData">
                                                                        <i class="icon oi-trashcan"
                                                                            aria-hidden="true"></i>
                                                                    </button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php $no++;
                                                      }
                                                      }
                                                       ?>
                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Modal Tammbah Data Control  Table Body 1 -->
                        <div class="modal fade modal-info " id="EditControlTableBody1" aria-hidden="true"
                            aria-labelledby="EditControlTableBody1" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-simple modal-center modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <h3 class="modal-title">Input
                                            Implementation Control Table</h3>
                                    </div>

                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group row">
                                                <h4 class="col-md-12 modal-title text-left" style="color:black;">SUBJECT
                                                </h4>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label text-left"
                                                    style="color:black;">Department</label>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control  bg-grey-200" name="name"
                                                            placeholder="Division Yourself" autocomplete="off"
                                                            value="Body Plant 1">
                                                    </div>
                                                </div>
                                                <label class="col-md-2 col-form-label text-left"
                                                    style="color:black;">Category</label>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control  bg-grey-200" name="name"
                                                            placeholder="Division Yourself" autocomplete="off"
                                                            value="Improvement">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label text-left"
                                                    style="color:black;">Proposal</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control  bg-grey-200" name="name"
                                                        placeholder="Division Yourself" autocomplete="off"
                                                        value="Additional Acces Door Office CPM QRE">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <h4 class="col-md-12 modal-title text-left" style="color:black;">IA NO.
                                                </h4>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label text-left" style="color:black;">IA
                                                    No.</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="Diisi No. IA" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label text-left"
                                                    style="color:black;">Description</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="Diisi Deskripsi" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <h4 class="col-md-12 modal-title text-left" style="color:black;">
                                                    Original Currency</h4>
                                            </div>
                                            <div class="form-group row text-left">
                                                <label class="col-md-2 col-form-label mt-4" style="color:black;">In
                                                    RP</label>
                                                <div class="col-md-4">
                                                    <span style="color:red;font-size: 13px;font-style: italic;">*(Sisa
                                                        budget Rp 300)</span>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">RP</span>
                                                        </div>
                                                        <input type="number" class="form-control"
                                                            placeholder="Nominal Rupiah">
                                                    </div>
                                                </div>
                                                <label class="col-md-2 col-form-label mt-4" style="color:black;">In
                                                    JPY</label>
                                                <div class="col-md-4">
                                                    <span style="color:red;font-size: 13px;font-style: italic;">*(Sisa
                                                        budget YJP 300)</span>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">JPY</span>
                                                        </div>
                                                        <input type="number" class="form-control"
                                                            placeholder="Nominal Yen">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <h4 class="col-md-12 modal-title text-left" style="color:black;">Valid
                                                    Update</h4>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label text-left"
                                                    style="color:black;">Valid
                                                    Until </label>
                                                <div class="col-md-4">
                                                    <input type="date" class="form-control" name="name"
                                                        placeholder="Diisi tanggal updaate" autocomplete="off">
                                                </div>
                                                <label class="col-md-2 col-form-label text-left"
                                                    style="color:black;">Remark
                                                    Ct Update</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="Diisi PIC Update" autocomplete="off">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Reset</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Tammbah Data Control  Table Body 1-->
                    <!-- End Page -->

                    <!-- Footer -->
                    <?php
include '../elemen/footer.php';?>

<script>

$(document).ready(function() {
    $('#table-proposal').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print',
            
        ]
    } );
} );


</script>