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
                   
                   plan_proposal.id_prop AS id_prop,
                   plan_proposal.proposal AS proposal,
                    depart.depart AS depart,
                    kategori_proposal.kategori AS kategori,
                    plan_proposal.cost AS cost,
                    konversi_matauang.yen AS yen,
                    plan_proposal.id_fis,
                    time_fiscal.awal AS awal,
                    time_fiscal.akhir AS akhir,
                    budget.id_bud AS id_bud,
                    depart.id_dep AS id_dep
                   
                   
                    FROM plan_proposal 
                    LEFT JOIN area ON plan_proposal.id_area = area.id_area
                    LEFT JOIN depart ON area.id_dep = depart.id_dep
                    LEFT JOIN budget ON plan_proposal.id_fis = budget.id_fis
                    LEFT JOIN kategori_proposal  ON plan_proposal.id_kat = kategori_proposal.id_kat
                    LEFT JOIN konversi_matauang ON plan_proposal.id_matauang = konversi_matauang.id_matauang
                    LEFT JOIN time_fiscal ON plan_proposal.id_fis = time_fiscal.id_fis
                   
                    WHERE id_prop = '$id'")or die (mysqli_error($link_yics));
                    $data = mysqli_fetch_assoc($proposal);
                    $id_fis = $data['id_fis'];
                    $id_dep = $data['id_dep'];
                    $dep = $data['depart'];
                    $id_bud = $data['id_bud'];
                    $IDR="IDR";
                    $awal= $data['awal'];
                    $akhir= $data['akhir'];

// ------------------------------------------akumulasi budget yang direjecT PER DEPART----------------------------

$budget_reject = mysqli_query($link_yics ,"SELECT sum(ia.cost_ia) AS cost_rjct FROM tracking_ia
join ia on tracking_ia.id_ia = ia.id_ia
join plan_proposal on ia.id_prop = plan_proposal.id_prop
JOIN area ON plan_proposal.id_area = area.id_area
JOIN depart ON area.id_dep = depart.id_dep                                         
where depart.id_dep = {$id_dep} and plan_proposal.id_fis={$id_fis}
 and approval = '0' GROUP BY approval = '0'")
or die (mysqli_error($link_yics));                 
if(mysqli_num_rows($budget_reject)>0){
    $budget_reject1 = mysqli_fetch_assoc($budget_reject);
   $brjct =$budget_reject1['cost_rjct'];
 }else{
   $brjct=0;
 }
// ------------------------------------------akumulasi budget yang direjecT PER DEPART----------------------------



// ------------------------------------------akumulasi budget yang direjecT PER PROPOSAL----------------------------

// $ia_prop = mysqli_query($link_yics ,"SELECT sum(ia.cost_ia) AS cost_rjct FROM tracking_ia
// join ia on tracking_ia.id_ia = ia.id_ia
// join plan_proposal on ia.id_prop = plan_proposal.id_prop
// join depart on plan_proposal.id_dep = depart.id_dep                                           
// where ia.id_prop={$id}  and plan_proposal.id_dep = {$id_dep} and plan_proposal.id_fis={$id_fis}
//  and approval = '0' GROUP BY approval = '0'")
// or die (mysqli_error($link_yics));                 
// if(mysqli_num_rows($budget_reject)>0){
//     $ia_proprj = mysqli_fetch_assoc($ia_prop);
//     if(isset($ia_proprj['cost_rjct'])){
//         $ia_proprjct =$ia_proprj['cost_rjct'];
//     }else{
//         $ia_proprjct=0;
//       }   
//  }else{
//    $ia_proprjct=0;
//  }
// ------------------------------------------akumulasi budget yang direjecT PER PROPOSAL----------------------------


                    // $get_data_ia = single_query("SELECT sum(cost_ia) as cost_ia FROM ia 
                    // JOIN plan_proposal on ia.id_prop = plan_proposal.id_prop
                    // join depart on plan_proposal.id_dep = depart.id_dep                   
                    // where plan_proposal.id_dep = {$id_dep} and plan_proposal.id_fis={$id_fis}");
                    // $consumtion_budget = $get_data_ia['cost_ia']-$brjct;

                    $get_data_ia = single_query("SELECT sum(cost_ia) as cost_ia FROM ia 
                    JOIN plan_proposal on ia.id_prop = plan_proposal.id_prop
                    LEFT JOIN area ON plan_proposal.id_area = area.id_area
                    LEFT JOIN depart ON area.id_dep = depart.id_dep                   
                    where depart.id_dep = {$id_dep} and plan_proposal.id_fis={$id_fis}");
                    $consumtion_budget = $get_data_ia['cost_ia'];
                    
                    $get_data_budget1 = mysqli_query($link_yics ,"SELECT * FROM budget where id_dep='$id_dep' and id_fis='$id_fis'");
                    $get_data_budget = mysqli_fetch_assoc($get_data_budget1);
                    $sisa_budget = $get_data_budget['budget'] - $consumtion_budget;

                    ?>
                    <!-- Page -->


                    <div class="page">
                        <div class="page-content container-fluid">
                            <div class="row">
                                <!-- Second Row -->
                                <div class="col-lg-12 col-md-12">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="float-left">
                                                <h1 class="bold text-uppercase page-title">FORM
                                                    INPUT NO IA : <?= $dep ?></h1>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="card card-shadow bg-blue-100" style="border-radius:10px;">
                                                <div class="card-body">
                                                    <form action="../proses/ia/tambah_ia.php" method="POST">
                                                        <input type="hidden" name="add">
                                                        <input type="hidden" class="form-control" name="id_prop"
                                                            id="id_prop" autocomplete="off"
                                                            value="<?php echo $data['id_prop']; ?>" required>
                                                        <div class="form-group row">
                                                            <h4 class="col-md-2 modal-title text-left"
                                                                style="color:black;">IA
                                                                NO.
                                                            </h4>
                                                            <div class="col-md-10 text-right">
                                                                <a href="controltabledep.php?dept=<?= $id_dep ?>"
                                                                    class=" btn btn-icon btn-warning">
                                                                    <span>TUTUP FORM</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row ">
                                                            <label class="col-md-2 col-form-label text-left"
                                                                style="color:black;">IA
                                                                No.</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" name="ia"
                                                                    placeholder="Diisi No. IA" autocomplete="off"
                                                                    id="ia" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label text-left"
                                                                style="color:black;">Description</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" name="ia_desc"
                                                                    id="ia_desc" placeholder="Diisi Deskripsi"
                                                                    autocomplete="off">
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
                                                                IDR</label>
                                                            <div class="col-md-4">
                                                                <span
                                                                    style="color:red;font-size: 13px;font-style: italic;">*(Sisa
                                                                    budget <?= $dep ?> : IDR </span>
                                                                <span
                                                                    style="color:red;font-size: 13px;font-style: italic;"
                                                                    class="cek">
                                                                    <?= number_format($sisa_budget,2,',','')  ?></span>
                                                                <span
                                                                    style="color:red;font-size: 13px;font-style: italic;"
                                                                    class="cek2 d-none">
                                                                    <?= number_format($sisa_budget,2,',','.')  ?></span>

                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">IDR</span>
                                                                    </div>
                                                                    <input type="text" class="form-control uu"
                                                                        autocomplete="off" placeholder="Nominal Rupiah"
                                                                        name="cost_ia" id="cost_ia" required>
                                                                </div>
                                                            </div>
                                                            <label class="col-md-2 col-form-label mt-4"
                                                                style="color:black;">In
                                                                JPY</label>
                                                            <div class="col-md-4">
                                                                <span
                                                                    style="color:red;font-size: 13px;font-style: italic;">*(Sisa
                                                                    budget <?= $dep ?> : YJP
                                                                    <?= number_format($sisa_budget / $data['yen'],2,',','.')  ?>)</span>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">JPY</span>
                                                                    </div>
                                                                    <input type="text" class="form-control bg-green-100"
                                                                        readonly placeholder="Nominal Yen" id="yen">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <h4 class="col-md-12 modal-title text-left"
                                                                style="color:black;">
                                                                Valid
                                                                Update</h4>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label text-left"
                                                                style="color:black;">Valid
                                                                In </label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="icon wb-calendar"
                                                                                aria-hidden="true"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="date" id="time_ia"
                                                                        placeholder="Diisi tanggal updaate"
                                                                        name="time_ia" autocomplete="off"
                                                                        class="form-control datepicker"
                                                                        min="<?= $awal ?>" max="<?= $akhir?>" required>
                                                                </div>
                                                            </div>
                                                            <label class="col-md-2 col-form-label text-left"
                                                                style="color:black;">Valid
                                                                Until </label>
                                                            <div class="col-md-4">
                                                                <?php 
                                                                    $data_fiscal = single_query("SELECT id_fis,akhir from time_fiscal where status='aktif'");
                                                                    $id_fis = $data_fiscal['id_fis'];
                                                                    $akhir_fiscal = $data_fiscal['akhir'];
                                                                    
                                                                ?>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">to</span>
                                                                    </div>
                                                                    <input type="text" class="form-control bg-grey-200"
                                                                        placeholder="Diisi tanggal updaate"
                                                                        name="validuntil" autocomplete="off"
                                                                        min="<?= $awal ?>" value="<?= $akhir_fiscal ?>"
                                                                        max="<?= $akhir ?>" required readonly>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label text-left"
                                                                style="color:black;">Remark
                                                                Ct Update</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control bg-grey-200"
                                                                    autocomplete="off" name="pic_ia" hidden
                                                                    value="<?= $_SESSION['yics_user']; ?>">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i
                                                                                class="icon wb-user"></i></span>
                                                                    </div>
                                                                    <input type="text" id="pic_ia"
                                                                        class="form-control bg-grey-200"
                                                                        autocomplete="off"
                                                                        value="<?= $_SESSION['yics_nama']; ?>">
                                                                </div>

                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="card-footer text-right card-footer-transparent">
                                                    <button type="reset" style="color:white;border-radius:10px;"
                                                        class="btn bg-blue-grey-800 ">RESET</button>
                                                    <button type="submit " style="border-radius:10px;"
                                                        class="btn btn-primary validasi " disabled>SUBMIT</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Second Row -->
                                        <div class="col-lg-12 col-md-12">
                                            <div class="card card-shadow" style="border-radius:10px;">
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="table  ">
                                                                <table class=" table ">

                                                                    <tr>
                                                                        <td class="judul align-middle text-center "
                                                                            rowspan="3" width="200px">
                                                                            <img src="../base/assets/images/adm3.png"
                                                                                style="width:200px;">
                                                                        </td>
                                                                        <td class="judul align-middle text-center text-uppercase"
                                                                            width="700px" rowspan="3">
                                                                            <h4>LIST NO IA DARI PROPOSAL :</h4>
                                                                            <h3> "<?= $data['proposal']; ?>"</h3>
                                                                        </td>
                                                                        <td class="text-left" style="color:black;">
                                                                            Departement</td>
                                                                        <td> &nbsp;:&nbsp;</td>
                                                                        <td><?= $data['depart']; ?></td>
                                                                    </tr>

                                                                    <tr>

                                                                        <td class="text-left" style="color:black;"
                                                                            width="200px">Category
                                                                        <td width="30px"> &nbsp;:&nbsp;</td>
                                                                        <td><?php echo $data['kategori']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-left" style="color:black;">Cost
                                                                            Proposal</td>
                                                                        <td> &nbsp;:&nbsp;</td>
                                                                        <td><?= $IDR." ". number_format($data['cost'], 2, ',', '.');?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan='5'></td>
                                                                    </tr>
                                                                </table>
                                                            </div>

                                                            <div class="table-responsive">
                                                                <table
                                                                    class="table table-striped table-hover table-bordered w-full display nowrap example0 text-uppercase"
                                                                    id="list-ia">
                                                                    <thead class="text-center">
                                                                        <tr class="bg-info align-middle">
                                                                            <th hidden>id ia</th>
                                                                            <th class="align-middle text-center">NO</th>
                                                                            <th class="align-middle text-center">NO IA
                                                                            </th>
                                                                            <th class="align-middle text-center">
                                                                                DESKRIPSI</th>
                                                                            <th class="align-middle text-center">VALID
                                                                                UNTIL
                                                                            </th>
                                                                            <th class="align-middle text-center">CT
                                                                                UPDATE</th>
                                                                            <th class="align-middle text-center">COST IA
                                                                            </th>
                                                                            <th class=" align-middle text-center">ACTION
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php 
                                                        $no = 1 ;
                                                        
                                                        $list_ia = mysqli_query($link_yics,"SELECT 
                                                        id_ia,
                                                        deskripsi,
                                                        ia,
                                                        deskripsi,
                                                        id_prop,
                                                        cost_ia,
                                                        data_user.nama AS pic_ia,
                                                        time_ia
                                                        FROM ia 
                                                        LEFT JOIN data_user
                                                        ON ia.pic_ia = data_user.username 
                                                        WHERE id_prop = '$id'") or die(mysqli_error($link_yics));
                                                            if(mysqli_num_rows($list_ia)>0){
                                                              
                                                            while($row = mysqli_fetch_assoc($list_ia)){  

                                                               

                                                            
                                                                ?>


                                                                        <tr class="row-ia text-center">
                                                                            <td hidden><?= $row['id_ia']; ?></td>
                                                                            <td><?= $no; ?></td>
                                                                            <td><?= $row['ia']; ?></td>
                                                                            <td><?= $row['deskripsi']; ?></td>
                                                                            <?php $IDR="IDR"; ?>

                                                                            </td>

                                                                            <td><?= date("d M Y", strtotime($akhir_fiscal)); ?>
                                                                            </td>
                                                                            <td><?= $row['pic_ia']; ?></td>
                                                                            <td><?= $IDR." ".number_format($row['cost_ia'], 2, ',', '.');?>
                                                                            <td>
                                                                                <a href="formedit_ia.php?id_ia=<?= $row['id_ia']?>"
                                                                                    class="btn btn-icon btn-warning  edit_ia"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="left"
                                                                                    data-original-title="Edit">
                                                                                    <i class="icon wb-edit"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                                <a href="../proses/ia/tambah_ia.php?del=<?= $row['id_ia']?>&page=<?= $id?>"
                                                                                    class="HapusData"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="left"
                                                                                    data-original-title="Delete">
                                                                                    <button type="button"
                                                                                        class="btn btn-icon btn-danger">
                                                                                        <i class="icon oi-trashcan"
                                                                                            aria-hidden="true"></i>
                                                                                    </button>
                                                                                </a>
                                                                            </td>
                                                                        </tr>

                                                                        <?php 
                                                        $no++;
                                                            }
                                                        } 
                                                            ?>
                                                                    </tbody>

                                                                </table>
                                                                <table class=" table " width="200%">
                                                                    <tr>
                                                                        <td class="judul align-middle text-center "
                                                                            rowspan="4" width="100px">

                                                                        </td>
                                                                        <td class="judul align-middle text-center"
                                                                            width="700px" rowspan="4">
                                                                        </td>
                                                                        <td class="text-left" width="300px">Total Cost
                                                                            IA</td>
                                                                        <td> &nbsp;:&nbsp;</td>
                                                                        <?php 
                                                                                    $total_costia=mysqli_fetch_array(mysqli_query($link_yics,"SELECT sum(cost_ia) 
                                                                                    AS total FROM ia WHERE id_prop='$id'")) or die (mysqli_error($link_yics));;
                                                                                ?>
                                                                        <td class="bg-red-100" width="250px">
                                                                            <?= $IDR." ".number_format($total_costia['total'], 2, ',', '.');?>
                                                                        </td>
                                                                    </tr>



                                                                    <!-- <tr>
                                                                        <td class="text-left">Total Cost Ia Return
                                                                        </td>
                                                                        <td> &nbsp;:&nbsp;</td>
                                                                        <td>
                                                                        </td>
                                                                    </tr> -->
                                                                    <tr>
                                                                        <td class="text-left">Available Saldo Proposal
                                                                        </td>
                                                                        <td> &nbsp;:&nbsp;</td>
                                                                        <td><?= $IDR." ". number_format(($data['cost'])-($total_costia['total']), 2, ',', '.');?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-left">Available Saldo
                                                                            <?= $data['depart']; ?></td>
                                                                        <td> &nbsp;:&nbsp;</td>
                                                                        <td><?=$IDR." ".number_format($sisa_budget,2,',','.')  ?>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
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
    // Tambah Ia

    // $("form").submit(function(event) {
    //     event.preventDefault();
    //     dataForm = $("form").serialize();
    //     $.ajax({
    //         type: "POST",
    //         url: "../proses/ia/tambah_ia.php",
    //         data: dataForm,
    //         success: function(result) {
    //             console.log(result);

    //             Swal.fire({
    //                 icon: 'success',
    //                 title: 'Saved!',
    //                 text: "Data IA telah ditambah.",
    //                 showConfirmButton: false,
    //                 timer: 2000
    //             });

    //             resetForm();
    //             location.reload();



    //         }

    //     });


    // });

    // function resetForm() {

    //     $('#ia').val('');
    //     $('#ia_desc').val('');
    //     $('#cost_ia').val('');
    //     $('#time_ia').val('');
    //     $('#pic_ia').val('');

    // }


    var yen = <?= $data['yen'] ?>;

    $('#cost_ia').keyup(function() {

        var nominal = $(this).val();

        var replaceNominal = nominal.replace(',', '');

        var conversi = replaceNominal / yen;

        var number = new Intl.NumberFormat().format(conversi);

        $('#yen').val(number);
    });
    </script>
    <script>
    $(document).ready(function() {
        $('.HapusData').click(function(a) {
            a.preventDefault()
            var getLink = $(this).attr('href');
            console.log(getLink);
            Swal.fire({
                title: 'Apakah yakin?',
                text: "Data ini akan dihapus selamanya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = getLink;
                }
            })
        })
    })
    </script>
    <script>
    $(document).ready(function() {
        $('.uu').keyup(function() {
            $('.cek').addClass('d-none');
            $('.cek2').removeClass('d-none');
            var sum6 = $('.uu').val().replace(",", ".");
            var sumd6 = $('.cek').text().replace(",", ".");
            var iii = sumd6 - sum6
            ii = iii.toFixed(2) //agar yang di belakang koma hanya 2
            if (ii < 0) {
                Swal.fire({
                    title: '<strong> SISA SALDO TIDAK MENCUKUPI</strong>',
                    icon: 'warning',
                    html: 'IDR &nbsp' + ii,
                    showCloseButton: true,
                    focusConfirm: false,
                    confirmButtonText: '<i">Laporan Diterima !!</i>',
                    cancelButtonAriaLabel: 'Close'
                })
                $('.validasi').prop("disabled", true);
            } else {
                $('.validasi').prop("disabled", false);
            }
            $('.cek2').text(ii);
            // console.log(ii);
        });
    });
    </script>