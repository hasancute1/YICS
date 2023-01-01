<!--header--    >
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
                  $id=$_GET ["input"];
                  //query data mahasiswa berdasarkan id menghasilkan array numeric
                  
                ?>
                                            <div class="sum">
                                                <form action="../proses/dashboard/alokasi.php" method="POST"
                                                    id="mainForm" class="needs-validation "></form>
                                                <input type="hidden" name="add" form="mainForm">
                                                <div class="form-group row">
                                                    <h4 class="col-md-12 modal-title text-left" style="color:black;">
                                                        Tahun Fiscal</h4>
                                                </div>
                                                <div class="form-group row ">
                                                    <label class="col-md-2 col-form-label   "
                                                        style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PERIODE
                                                        TAHUN
                                                    </label>
                                                    <div class="col-md-5">
                                                        <div class="input-group">
                                                            <?php 
                    $tambahalok = mysqli_query($link_yics ,"SELECT *                    
                    FROM time_fiscal                   
                    WHERE id_fis= '$id'")or die (mysqli_error($link_yics));
                    $data = mysqli_fetch_assoc($tambahalok)
                  ?>
                                                            &nbsp;&nbsp;&nbsp;&nbsp; <input type="text"
                                                                value="<?php echo $data['periode']; ?>"
                                                                class="form-control" readonly form="mainForm">
                                                            <input name="id_fis" type="text"
                                                                value="<?php echo $data['id_fis']; ?>"
                                                                class="form-control id_fis" readonly hidden
                                                                form="mainForm">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <?php 
            $id_budget = mysqli_query($link_yics, "SELECT id_bud FROM view_alokasi_budget WHERE status='aktif'") or die (mysqli_error($link_yics));
            if(mysqli_num_rows( $id_budget)>0){
              $i = 1;
              while( $rows_budget = mysqli_fetch_assoc($id_budget)){?>
                                                <input name="id_bud<?=$i?>" type="text" form="mainForm"
                                                    value="<?php echo $rows_budget['id_bud'] ?>" hidden>
                                                <?php  
                $i++;               
                    }
                      }                                                
                    ?>
                                                <?php 
                        $depart = mysqli_query($link_yics, "SELECT * FROM depart") or die (mysqli_error($link_yics));                       
                        ?>
                                                <div class="form-group row">
                                                    <h4 class="col-md-12 modal-title text-left" style="color:black;">
                                                        Budget Alokasi</h4>
                                                </div>
                                                <input name="totalData" type="text" form="mainForm"
                                                    value="<?=mysqli_num_rows( $depart)?>" hidden>
                                                <!-- .......................................................query depart..................................                                                -->
                                                <?php 
                        $i = 1;
                        if(mysqli_num_rows($depart)>0){                                                                                      
                        while($rows_depart = mysqli_fetch_assoc($depart)){  
                       
                        
                        ?>
                                                <div class="panel-group panel-group-continuous "
                                                    id="exampleAccordionContinuous" aria-multiselectable="true"
                                                    role="tablist">
                                                    <div class="panel">
                                                        <div class="panel-heading"
                                                            id="exampleHeadingContinuousOne<?= $i; ?>" role="tab">
                                                            <a class="panel-title showCollapse"
                                                                data-parent="#exampleAccordionContinuous"
                                                                data-toggle="collapse"
                                                                href="#exampleCollapseContinuousOne<?= $i; ?>"
                                                                aria-controls="exampleCollapseContinuousOne<?= $i; ?>"
                                                                aria-expanded="false" data-id="<?= $i; ?>"
                                                                data-dept="<?= $i; ?>">
                                                                <div class="form-group row">
                                                                    <label class="col-md-2 col-form-label"
                                                                        style="color:black;"><?php echo $rows_depart['depart']; ?></label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span
                                                                                    class="input-group-text">IDR</span>
                                                                            </div>
                                                                            <?php 
                                                                        $bdget_d = mysqli_query($link_yics ,"SELECT sum(cost) AS cost_dep
                            FROM plan_proposal 
                            JOIN depart ON plan_proposal.id_dep = depart.id_dep                           
                            JOIN time_fiscal  ON plan_proposal.id_fis = time_fiscal.id_fis  
                            WHERE time_fiscal.id_fis= '$id' AND depart.id_dep='$rows_depart[id_dep]'")or die (mysqli_error($link_yics));
                                           
						  // untuk memvalidasi apakah ada datanya
                          if(mysqli_num_rows($bdget_d)>0){
                           $bdget_dep = mysqli_fetch_assoc($bdget_d);                          
                           $sum_dep = number_format ($bdget_dep['cost_dep'],0,',','.');    
                          }else{
                            $sum_dep = 0;
                          }
                            ?>
                                                                            <input type="text"
                                                                                class="form-control department<?=$i?> bg-red-100  prc"
                                                                                name="budget<?=$i?>" form="mainForm"
                                                                                value="<?=  $sum_dep ?>">



                                                                            <input required name="id_dept<?=$i?>"
                                                                                value="<?= $rows_depart['id_dep']?>"
                                                                                type="text" class=" form-control"
                                                                                form="mainForm" hidden>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-1"></div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <hr />
                                                        <div class="panel-collapse collapse "
                                                            id="exampleCollapseContinuousOne<?= $i; ?>"
                                                            aria-labelledby="exampleHeadingContinuousOne<?= $i; ?>"
                                                            role="tabpanel">
                                                            <div class="panel-body">
                                                                <!-- --------------------------------------------------------------------------FORM INPUT.................................................................................................                                                                -->
                                                                <form id="subForm<?= $i; ?>" class="form-input"
                                                                    action="../proses/dashboard/tambah_planning_proposal.php"
                                                                    method="post" enctype="multipart/form-data"></form>
                                                                <input type="hidden" name="add"
                                                                    form="subForm<?= $i; ?>">
                                                                <input name="depart" type="text"
                                                                    value="<?= $rows_depart['id_dep']; ?>"
                                                                    class="form-control" form="subForm<?= $i; ?>"
                                                                    hidden>
                                                                <input name="mata_uang" type="text" value="1"
                                                                    class="form-control" form="subForm<?= $i; ?>"
                                                                    hidden>
                                                                <input name="id_fis" type="text"
                                                                    value="<?php echo $id; ?>" class="form-control"
                                                                    readonly form="subForm<?= $i; ?>" hidden>
                                                                <div class="table table-responsive">
                                                                    <table class="table display text-nowrap bg-blue-100"
                                                                        style="width:100%">
                                                                        <thead>
                                                                            <tr class="font-size-18">
                                                                                <th class="align-middle text-center"
                                                                                    width="220px">
                                                                                    Pic
                                                                                    Area</th>
                                                                                <th class="align-middle text-center"
                                                                                    width="180px">
                                                                                    Category</th>
                                                                                <th class="align-middle text-center"
                                                                                    width="480px">
                                                                                    Proposal</th>
                                                                                <th class="align-middle text-center"
                                                                                    width="120px">
                                                                                    Cost
                                                                                </th>
                                                                                <th class="align-middle text-center"
                                                                                    width="20px">
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>

                                                                                <td>
                                                                                    <select name="area" type="text"
                                                                                        class="form-control"
                                                                                        id="area<?= $i; ?>"
                                                                                        form="subForm<?= $i; ?>"
                                                                                        required>
                                                                                        <option value="">Pilih Area
                                                                                        </option>
                                                                                        <?php 
                                                                            $area = mysqli_query($link_yics,"SELECT * FROM data_user WHERE id_dep = '$rows_depart[id_dep]'") or die (mysqli_error($link_yics));
                                                                            if(mysqli_num_rows($area)>0){
                                                                            while( $rows_area= mysqli_fetch_assoc($area)){?>
                                                                                        <option
                                                                                            value="<?php echo $rows_area['area'] ?>">
                                                                                            <?php echo $rows_area['area'] ?>
                                                                                        </option>
                                                                                        <?php 
                                                                              
                                                                            } 
                                                                                }
                                                                                    ?>
                                                                                    </select>
                                                                                    <span class="pesan-area<?= $i; ?>"
                                                                                        style="display:none;color:red;">Sahabat
                                                                                        harus mengisi area</span>
                                                                                </td>
                                                                                <td>
                                                                                    <select name="kategori" type="text"
                                                                                        class="form-control"
                                                                                        id="kategori<?= $i; ?>"
                                                                                        form="subForm<?= $i; ?>"
                                                                                        required>
                                                                                        <option value="">Pilih Category
                                                                                        </option>
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
                                                                                    <span
                                                                                        class="pesan-kategori<?= $i; ?>"
                                                                                        style="display:none;color:red;">Sahabat
                                                                                        harus mengisi kategori</span>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text"
                                                                                        id="proposal<?= $i; ?>"
                                                                                        class="form-control"
                                                                                        name="proposal"
                                                                                        placeholder=" Isi deskripsi proposal.."
                                                                                        form="subForm<?= $i; ?>"
                                                                                        required>
                                                                                    <span
                                                                                        class="pesan-proposal<?= $i; ?>"
                                                                                        style="display:none;color:red;">Sahabat
                                                                                        harus mengisi proposal</span>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" required
                                                                                        class="form-control rupiah"
                                                                                        name="cost" id="cost<?= $i; ?>"
                                                                                        placeholder=" Isi cost.."
                                                                                        form="subForm<?= $i; ?>">
                                                                                    <span class="pesan-cost<?= $i; ?>"
                                                                                        style="display:none;color:red;">
                                                                                        Isi cost...</span>
                                                                                </td>
                                                                                <td>
                                                                                    <button type="reset"
                                                                                        class="btn btn-danger "
                                                                                        form="subForm<?= $i; ?>">
                                                                                        RESET
                                                                                    </button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-success btn-icon simpan"
                                                                                        form="subForm<?= $i; ?>"
                                                                                        data-id="<?= $i; ?>"
                                                                                        data-dept="<?=$rows_depart['id_dep'];?>"
                                                                                        data-in="<?=$i?>">
                                                                                        SUBMIT
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <!-- ----------------------------------------------------------------------end form----------------------------------------------------------------------------------                                                                     -->
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="data<?=$i?>"> </div>

                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php 
                                            
                                            $i++;}
                                                
                                            } ?>
                                                <!-- ................................................end query depart................................ -->

                                                <?php 
                                                                        $total_bdget = mysqli_query($link_yics ,"SELECT sum(cost) AS cost_all
                            FROM plan_proposal 
                            JOIN depart ON plan_proposal.id_dep = depart.id_dep                           
                            JOIN time_fiscal  ON plan_proposal.id_fis = time_fiscal.id_fis  
                            WHERE time_fiscal.id_fis= '$id'")or die (mysqli_error($link_yics));
                                           
						  // untuk memvalidasi apakah ada datanya
                          if(mysqli_num_rows($total_bdget)>0){
                           $total_bdg = mysqli_fetch_assoc($total_bdget);
                           $sum_all = number_format ($total_bdg['cost_all'],0,',','.');                          
                          }else{
                            $sum_all = 0;
                          }
                            ?>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label"
                                                        style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TOTAL
                                                        BUDGET</label>
                                                    <div class="col-md-5">
                                                        <div class="input-group">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="text"
                                                                class="form-control all1 all2 all3 bg-green-100"
                                                                id="result"
                                                                value="<?= (isset($sum_all))? $sum_all: "0"; ?>"
                                                                readonly>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="dashboard.php" type="" id="reset" class="btn btn-danger"
                                                    form="mainForm">Kembali</a>
                                                <button type="submit" class="btn btn-primary"
                                                    form="mainForm">Save</button>
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
        <div class="notifikasi_"></div>
        <!-- End Page -->

        <!-- Footer -->
        <?php
include '../elemen/footer.php';?>


        <!--############ modal edit ################# -->
        <form role="form" method="POST" id="form-edit">
            <div class="modal fade modal-info " id="modal-edit" aria-hidden="true" aria-labelledby="EditAlokasiBudget"
                role="dialog" tabindex="-1">
                <div class="modal-dialog modal-simple modal-center modal-lg">
                    <div class="modal-content">
                        <div id="data-edit"> </div>
                    </div>
                </div>
            </div>
        </form>
        <!--############ end modal edit ################# -->
        <!--############ jquery penjumlahan loopinng attribut classs ################# -->
        <!--############ jquery penjumlahan loopinng attribut classs ################# -->
        <script>
        $(document).ready(function() {

            $('.showCollapse').on('click', function() {
                var index = $(this).attr('data-id');
                var idDept = $(this).attr('data-dept');
                console.log(index + idDept)
                dataShow(idDept, index)
            })

            function dataShow(idDept, index) {
                var id_fis = $('.id_fis').val()
                $.ajax({
                    type: 'GET',
                    url: "../proses/alokasibudget/ajax/get_tampilan.php",
                    data: {
                        // nama : variabel
                        idDept: idDept,
                        id_fis: id_fis,
                        ind: index
                    },
                    cache: false,
                    success: function(msg) {
                        $(".data" + index).html(msg);
                        var oi = $(".oi" + idDept).val();
                        console.log(oi)
                        $(".department" + index).val(oi);
                        var ai = $(".ai" + idDept).val();
                        console.log(ai)
                        $(".all" + index).val(ai);


                    },

                });
            }
            $(document).on('click', '.hapus', function(a) {
                a.preventDefault()
                var index = $(this).attr('data-id');
                var idDept = $(this).attr('data-dept');
                var ind = $(this).attr('data-in');
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
                        $.ajax({
                            type: 'GET',
                            url: "../proses/alokasibudget/ajax/get_hapus.php",
                            data: {
                                index: index
                            },
                            success: function(msg) {
                                $(".notifikasi_").html(msg);
                                console.log(ind)
                                dataShow(idDept, ind)
                            }
                        });
                    }
                })
            });

            $(document).on('click', '.simpan', function(a) {
                a.preventDefault()
                var index = $(this).attr('data-id');
                var idDept = $(this).attr('data-dept');
                var ind = $(this).attr('data-in');
                var area = $('#area' + index).val();
                var kategori = $('#kategori' + index).val();
                var proposal = $('#proposal' + index).val();
                var cost = $('#cost' + index).val();
                var data = $('#subForm' + index).serialize();

                console.log(area);
                console.log(kategori);
                console.log(proposal);
                console.log(cost);

                if (area != "" && kategori != "" && proposal != "" && cost != "") {
                    $.ajax({
                        type: 'POST',
                        url: "../proses/alokasibudget/ajax/post_insert.php",
                        data: data,
                        success: function(msg) {
                            $(".notifikasi_").html(msg);
                            $('#subForm' + index).trigger("reset");
                            // console.log(ind)
                            dataShow(idDept, ind)
                        }
                    });
                } else {
                    if (area == "") {
                        $(".pesan-area" + index).css('display', 'block');
                    } else {

                    }
                    if (kategori == "") {
                        $(".pesan-kategori" + index).css('display', 'block');
                    } else {}
                    if (cost == "") {
                        $(".pesan-cost" + index).css('display', 'block');
                    } else {}
                    if (proposal == "") {
                        $(".pesan-proposal" + index).css('display', 'block');
                    } else {}
                }
                $("#area" + index).change(function() {
                    if ($(this).val() == "") {
                        $(".pesan-area" + index).css('display', 'color', 'red');
                    } else {
                        $(".pesan-area" + index).css('display', 'none');
                    }
                });
                $("#kategori" + index).change(function() {
                    if ($(this).val() == "") {
                        $(".pesan-kategori" + index).css('display', 'color', 'red');
                    } else {
                        $(".pesan-kategori" + index).css('display', 'none');
                    }
                });
                $("#cost" + index).change(function() {
                    if ($(this).val() == "") {
                        $(".pesan-cost" + index).css('display', 'color', 'red');
                    } else {
                        $(".pesan-cost" + index).css('display', 'none');
                    }
                });
                $("#proposal" + index).change(function() {
                    if ($(this).val() == "") {
                        $(".pesan-proposal" + index).css('display', 'color', 'red');
                    } else {
                        $(".pesan-proposal" + index).css('display', 'none');
                    }
                });
            })

            // ...............................................................................???????????

            $("#form-edit").on('click', '.ubah1', function(a) {
                a.preventDefault()
                var idDept = $('#idDept').val();
                var ind = $('#ind').val();
                var dataform = $("#form-edit").serialize();




                $.ajax({
                    type: 'POST',
                    url: "../proses/alokasibudget/ajax/post_update.php",
                    data: dataform,
                    success: function(msg) {
                        $('#modal-edit').modal('hide');
                        $(".notifikasi_").html(msg);
                        // $('#subForm' + index).trigger("reset");
                        // console.log(ind)
                        dataShow(idDept, ind)
                    }
                });
            });





            $(".sum").on('input', '.prc', function() {
                var calculated_total_sum = 0;
                $(".sum .prc").each(function() {
                    var get_textbox_value = $(this).val();
                    if ($.isNumeric(get_textbox_value)) {
                        calculated_total_sum += parseFloat(get_textbox_value);
                    }
                });
                $("#result").html(calculated_total_sum);
            });
            $('.rupiah').keyup(function(event) {
                // skip for arrow keys
                if (event.which >= 37 && event.which <= 40) return;

                // format number
                $(this).val(function(index, value) {
                    return value
                        .replace(/\D/g, "")
                        .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                });
            });



        });
        </script>
        <!--############ end jquery penjumlahan loopinng attribut classs ################# -->

        <script>
        $(document).ready(function() {

            $(document).on('click', '#edit', function(e) {
                e.preventDefault();
                $("#modal-edit").modal('show');
                $.post('../proses/alokasibudget/ajax/edit.php', {
                        id: $(this).attr('data-id'),
                        idDept: $(this).attr('data-dept'),
                        ind: $(this).attr('data-in')
                    },
                    function(html) {
                        $("#data-edit").html(html);
                    }
                );
            });


            // $("#form-edit").on('click', '.ubah1', function(e) {
            //     e.preventDefault();
            //     var idDept = $('#idDept').val();
            //     var ind = $('#ind').val();
            //     var dataform = $("#form-edit").serialize();
            //     $.ajax({
            //         type: 'POST',
            //         url: "../proses/alokasibudget/ajax/post_update.php",
            //         data: dataform,
            //         success: function(msg) {
            //             $('#modal-edit').modal('hide');
            //             $(".notifikasi_").html(msg);
            //             dataShow(idDept, ind)
            //         }
            //     });
            // });
        });
        </script>