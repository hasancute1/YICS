<!--header-->
<?php

include("../config/config.php");

// periksa apakah user sudah login, cek kehadiran session name
// jika tidak ada, redirect ke login.php
if (!isset($_SESSION['yics_user'])) {
  header('location: ../index.php');
}

// jika yang login general user
if ($_SESSION['yics_level'] == "1") {

    header('location: dashboard.php');

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

                    <?php include '../elemen/sidebarleft.php';?>

                    <!-- Site Navbar Search -->
                    <?php include '../elemen/sidebar.php';?>
                    <!-- End Site Navbar Search -->
                    <!-- end sidebar -->

                    <!-- sidebar back -->
                    <?php include '../elemen/sidebarback.php';?>
                    <!-- end sidebar back -->
                    <?php  
                    $id=$_GET ["add"];
                     //query data mahasiswa berdasarkan id menghasilkan array numeric
                    $proposal = mysqli_query($link_yics ,"SELECT 
                   
                    proposal.id_prop AS id_prop,
                    proposal.proposal AS proposal,
                    depart.depart AS depart,
                    kategori_proposal.kategori AS kategori,
                    proposal.cost AS cost,
                    konversi_matauang.yen AS yen
                   
                    FROM proposal 
                    LEFT JOIN depart ON proposal.id_dep = depart.id_dep
                    LEFT JOIN kategori_proposal  ON proposal.id_kat = kategori_proposal.id_kat
                    LEFT JOIN konversi_matauang ON proposal.id_matauang = konversi_matauang.id_matauang
                   
                    WHERE id_prop = '$id'")or die (mysqli_error($link_yics));
                    $data = mysqli_fetch_assoc($proposal);

                    $get_data_ia = single_query("SELECT sum(cost_ia) as cost_ia FROM ia where id_prop='$id'");
                    $consumtion_budget =  $get_data_ia['cost_ia'];
                   
                    $sisa_budget = $data['cost'] - $consumtion_budget;
                   


                      ?>
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
                                                        <span class="font-size-20 bold">Form Add No
                                                            IA</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body bg-white">

                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <form action="" method="POST" id="form_ia">
                                                    <input type="hidden" name="add">
                                                    <input type="hidden" class="form-control" name="id_prop" id="id_prop" autocomplete="off"
                                                        value="<?php echo $data['id_prop']; ?>" required>
                                                    <div class="form-group row">
                                                        <h4 class="col-md-12 modal-title text-left" style="color:black;">
                                                            SUBJECT
                                                        </h4>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label text-left"
                                                            style="color:black;">Department</label>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control bg-grey-200" readonly
                                                                    name="name" placeholder="Division Yourself"
                                                                    autocomplete="off"
                                                                    value="<?php echo $data['depart']; ?>">
                                                            </div>
                                                        </div>
                                                        <label class="col-md-2 col-form-label text-left"
                                                            style="color:black;">Category</label>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control bg-grey-200" readonly
                                                                    name="name" placeholder="Division Yourself"
                                                                    autocomplete="off"
                                                                    value="<?php echo $data['kategori']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label text-left"
                                                            style="color:black;">Proposal</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control  bg-grey-200" name="name"
                                                                placeholder="Division Yourself" autocomplete="off" readonly
                                                                value="<?php echo $data['proposal']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label text-left"
                                                            style="color:black;">Cost</label>
                                                        <div class="col-md-5">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">RP</span>
                                                                </div>
                                                                <input type="text" class="form-control bg-grey-200" readonly
                                                                    placeholder="Nominal Rupiah"
                                                                    value="<?= number_format($data['cost']);?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">JPY</span>
                                                                </div>
                                                                <input type="text" class="form-control bg-grey-200" readonly
                                                                    placeholder="Nominal Rupiah"
                                                                    value="<?= number_format($data['cost']/$data['yen'], 1, '.', ','); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="text-right">
                                                                <i data-toggle="tooltip"
                                                                    data-original-title="Tambah Kolom Ia">
                                                                    <button type="button"
                                                                        class="btn btn-icon btn-outline btn-info btn-xs add-more">
                                                                        <i class="icon wb-plus" aria-hidden="true"></i>
                                                                    </button>
                                                                </i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="control-group after-add-more">
                                                        <div class="form-group row">
                                                            <h4 class="col-md-12 modal-title text-left"
                                                                style="color:black;">IA
                                                                NO.
                                                            </h4>
                                                        </div>
                                                        <div class="form-group row ">
                                                            <label class="col-md-2 col-form-label text-left"
                                                                style="color:black;">IA
                                                                No.</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" name="ia"
                                                                    placeholder="Diisi No. IA" autocomplete="off" id="ia" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label text-left"
                                                                style="color:black;">Description</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" name="ia_desc" id="ia_desc"
                                                                    placeholder="Diisi Deskripsi" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row text-left">
                                                            <h4 class="col-md-12 modal-title text-left"
                                                                style="color:black;">
                                                                Original Currency</h4>
                                                        </div>
                                                        <div class="form-group row text-left">
                                                            <label class="col-md-2 col-form-label mt-4"
                                                                style="color:black;">In
                                                                RP</label>
                                                            <div class="col-md-4">
                                                                <span
                                                                    style="color:red;font-size: 13px;font-style: italic;">*(Sisa
                                                                    budget Rp <?= number_format($sisa_budget,0,',','.')  ?>)</span>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">RP</span>
                                                                    </div>
                                                                    <input type="text" class="form-control uang"
                                                                        placeholder="Nominal Rupiah" name="cost_ia" id="cost_ia" required>
                                                                </div>
                                                            </div>
                                                            <label class="col-md-2 col-form-label mt-4"
                                                                style="color:black;">In
                                                                JPY</label>
                                                            <div class="col-md-4">
                                                                <span
                                                                    style="color:red;font-size: 13px;font-style: italic;">*(Sisa
                                                                    budget YJP <?= number_format($sisa_budget / $data['yen'],1,'.',',')  ?>)</span>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">JPY</span>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Nominal Yen" id="yen">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="copy d-none control-group">
                                                        <div class="aa">
                                                            <hr>
                                                            <div class="form-group row ">
                                                                <h4 class="col-md-10 modal-title text-left"
                                                                    style="color:black;">IA
                                                                    NO.
                                                                </h4>
                                                            </div>
                                                            <div class="form-group row ">
                                                                <label class="col-md-2 col-form-label text-left"
                                                                    style="color:black;">IA
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
                                                                <h4 class="col-md-12 modal-title text-left"
                                                                    style="color:black;">
                                                                    Original Currency</h4>
                                                            </div>
                                                            <div class="form-group row text-left">
                                                                <label class="col-md-2 col-form-label mt-4"
                                                                    style="color:black;">In
                                                                    RP</label>
                                                                <div class="col-md-4">
                                                                    <span
                                                                        style="color:red;font-size: 13px;font-style: italic;">*(Sisa
                                                                        budget Rp 300)</span>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">RP</span>
                                                                        </div>
                                                                        <input type="text" class="form-control uang"
                                                                            placeholder="Nominal Rupiah">
                                                                    </div>
                                                                </div>
                                                                <label class="col-md-2 col-form-label mt-4"
                                                                    style="color:black;">In
                                                                    JPY</label>
                                                                <div class="col-md-4">
                                                                    <span
                                                                        style="color:red;font-size: 13px;font-style: italic;">*(Sisa
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
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="text-left">
                                                                        <i data-toggle="tooltip"
                                                                            data-original-title="Kurangi Kolom Ia">
                                                                            <button type="button"
                                                                                class="btn btn-icon  btn-danger btn-sm remove">
                                                                                <i class="icon oi-trashcan"
                                                                                    aria-hidden="true">
                                                                                </i><span>HAPUS FORM</span>

                                                                            </button>
                                                                        </i>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div> -->

                                                    <div class="modal-footer">
                                                        <button type="button" style="color:white;"
                                                            class="btn bg-blue-grey-800 btn-round"
                                                            data-dismiss="modal" id="reset">RESET</button>
                                                        <button type="submit" id="submit"
                                                            class="btn btn-primary btn-round">SUBMIT</button>
                                                </form>
                                                </div>
                                            </div>                                         


   

                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>


                        <div class="">
                            <div class="row">
                                <!-- Second Row -->
                                <div class="col-lg-12 col-md-12">
                                    <div class="card card-shadow">
                                        <div class="card-header card-header-transparent bg-dark">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="float-left">
                                                        <span class="font-size-20 bold">List IA</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body bg-white">  

                                            <?php 
                                                $list_ia = query("SELECT * from ia where id_prop = '".$id."'");                                              
                                            ?>

                                            <div class="table-responsive p-3">

                                                <table class="table table-striped table-hover table-bordered w-full display nowrap example0" id="list-ia">
                                                    <thead class="text-center">
                                                        <tr class="bg-info align-" height="10px">
                                                            <th>No</th>
                                                            <th>IA</th>
                                                            <th>Deskripsi</th>
                                                            <th>Cost IA</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php foreach($list_ia as $row){ ?>

                                                        <tr class="row-ia">
                                                            <td><?= $row['id_ia'] ?></td>
                                                            <td><?= $row['ia'] ?></td>
                                                            <td><?= $row['deskripsi'] ?></td>
                                                            <td><?= $row['cost_ia'] ?></td>
                                                            <td>

                                                            <button type="button"
                                                                class="btn btn-icon btn-warning  edit_ia"
                                                                data-toggle="modal" data-target="#">
                                                                <i class="icon wb-edit" aria-hidden="true"></i>
                                                            </button>

                                                            </td>
                                                        </tr>
                                                        
                                                        <?php } ?>
                                                    </tbody>

                                                </table>

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
            <?php include '../elemen/footer.php';?>

            <script type="text/javascript">
            $(document).ready(function() {
                $(".add-more").click(function() {
                    var html = $(".copy").html();
                    $(".after-add-more").after(html);
                });

                // saat tombol remove dklik control group akan dihapus 
                $("body").on("click", ".remove", function() {
                    $(this).parents(".aa").remove();
                });

                // Tambah Ia

                $("form").submit(function (event) {
                    event.preventDefault();
                    dataForm = $( "form" ).serialize();

                    $.ajax({
                        type: "POST",
                        url: "../proses/ia/tambah_ia.php",
                        data: dataForm,                    
                        success:function(result){
                            console.log(result);

                            Swal.fire({
                                icon: 'success',
                                title: 'Saved!',
                                text: "Data IA telah ditambah.",
                                showConfirmButton: false,
                                timer: 2000
                            });

                            resetForm();

                            location.reload();

                        }
                    
                    });

                    
                });

                function resetForm(){

                    $('#ia').val('');
                    $('#ia_desc').val('');
                    $('#cost_ia').val('');

                }


                var yen = <?= $data['yen'] ?>;

                $('#cost_ia').keyup(function(){
                   
                    var nominal = $(this).val();     
                    
                    var replaceNominal = nominal.replace(',' , '');

                    var conversi = replaceNominal / yen;

                    var number=  new Intl.NumberFormat().format(conversi);                  

                    $('#yen').val(number);
                });

                

            });
            </script>