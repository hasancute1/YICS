<!--header-->
<?php
include("../config/config.php");
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
                            <h1 class="page-title font-size-26 font-weight-600">TIME FISCAL SETTING</h1>
                        </div>
                        <div class="page-content container-fluid">
                            <div class="row">
                                <!-- First Row -->

                                <div class="col-lg-12">
                                    <div class="card card-shadow">
                                        <div class="card-header card-header-transparent bg-dark">
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8">
                                                    <div class="float-left">
                                                        <span class="font-size-20 bold">SET TIME FISCAL</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="text-right">
                                                        <!-- icon tambah data    -->
                                                        <i href="" data-toggle="tooltip"
                                                            data-original-title="Tambah Data" data-placement="left">
                                                            <button type="button" id="TambahAlokasiBudget"
                                                                class="btn btn-icon btn-outline btn-info btn-xs"
                                                                data-toggle="modal" data-target="#ModalAlokasiBudget">
                                                                <i class="icon wb-plus" aria-hidden="true"></i>
                                                            </button>
                                                        </i>
                                                        <!-- icon tambah data    -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                    $page = (isset($_GET['page'])>0)? $_GET['page'] : 1;
                                        
                    $limit = 5; // Jumlah data per halamannya
                    
                    // Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
                    $limit_start = ($page - 1 ) * $limit;
                    if(isset($_GET['cari']) && $_GET['cari'] != ''){
                      $cari = $_GET['cari'];
                      $filter_cari = " WHERE awal LIKE '%$cari%' OR  akhir  LIKE '%$cari%' OR  id_fis  LIKE '%$cari%' OR  periode  LIKE '%$cari%' OR  status  LIKE '$cari%' ";
                    }else{
                      $cari = '';
                      $filter_cari = '';
                    }
                    // Buat query untuk mengchek data  apakah ada data di tabel 
                    $query = "SELECT * FROM time_fiscal $filter_cari ";
                    $sql = mysqli_query($link_yics, $query )or die(mysqli_error($link_yics));

                    // echo mysqli_num_rows($sql);
                    $no = $limit_start + 1; // Untuk penomoran tabel

                    ?>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12">
                                                    <form action="" method="GET" class="row">
                                                        <h4 class="text-title col-md-8 content-title"></h4>
                                                        <div class="col-md-4 text-right">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <input style="background-color:#E4EAEC;" type="text"
                                                                        class="form-control" name="cari"
                                                                        placeholder="Search..." value="<?=$cari?>">
                                                                    <span class="input-group-append">
                                                                        <button type="submit" class="btn btn-primary"><i
                                                                                class="icon wb-search"
                                                                                aria-hidden="true"></i></button>
                                                                        <a href="fiscalsetting.php"
                                                                            class="btn btn-danger">Reset</a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <form id="wadahtabel" class="table table-bordered text-nowrap"
                                                        name="proses">
                                                        <table class=" w-full">
                                                            <thead class="text-center">
                                                                <tr class="bg-info align-">
                                                                    <th style="color:white;">
                                                                        NO</th>
                                                                    <th style="color:white;">
                                                                        PERIODE</th>
                                                                    <th style="color:white;">
                                                                        START FISCAL</th>
                                                                    <th style="color:white;">
                                                                        END FISCAL</th>
                                                                    <th style="color:white;">
                                                                        STATUS</th>
                                                                    <th style="color:white;">
                                                                        ACTION</th>
                                                                    <th style="color:white;">
                                                                        <input type="checkbox" id="checkAll">
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php 
                                // Cek apakah terdapat data page pada URL
                                      // buat logic data jika  ada data dan tidak  ada ada dengan parameter 0 
                                      if(mysqli_num_rows($sql)>0){
                                        $sql_data = mysqli_query($link_yics, $query." LIMIT $limit_start , $limit")or die(mysqli_error($link_yics));
                                        while($data = mysqli_fetch_array($sql_data)){?>
                                                                <tr>
                                                                    <td class="align-middle text-center">
                                                                        <?php echo $no; ?></td>
                                                                    <td class="align-middle text-center text-uppercase">
                                                                        <?php echo $data['periode']; ?></td>
                                                                    <td
                                                                        class="align-middle text-center text-uppercase ">
                                                                        <?php echo date("d M Y", strtotime($data['awal'])); ?>
                                                                    </td>
                                                                    <td class="align-middle text-center text-uppercase">
                                                                        <?php echo date("d M Y", strtotime($data['akhir'])); ?>
                                                                    </td>
                                                                    <td class="align-middle text-center text-uppercase">
                                                                        <?php echo $data['status']; ?></td>
                                                                    <td class="align-middle text-center">
                                                                        <i href="" data-toggle="tooltip"
                                                                            data-original-title="Edit"
                                                                            data-placement="left">
                                                                            <a href="formubahfiscalsetting.php?ubah=<?php echo $data['id_fis']; ?>"
                                                                                class="btn btn-success btn-icon btn-outline btn-xs">
                                                                                <i class="icon wb-edit"
                                                                                    aria-hidden="true"></i>
                                                                            </a>
                                                                        </i>
                                                                        <i href="javascript:void(0)"
                                                                            data-toggle="tooltip"
                                                                            data-original-title="Hapus"
                                                                            data-placement="left">
                                                                            <a href="../proses/usersetting/timefiscal.php?del=<?php echo $data['id_fis']; ?>"
                                                                                class="btn btn-icon btn-danger btn-icon btn-outline btn-xs HapusData">
                                                                                <i class="icon oi-trashcan"
                                                                                    aria-hidden="true"></i>
                                                                            </a>
                                                                        </i>
                                                                    </td>
                                                                    <td class="align-middle text-center" height="10px">
                                                                        <input name="check[]"
                                                                            value="<?php echo $data['id_fis']; ?>"
                                                                            type="checkbox" class="check">
                                                                    </td>
                                                                </tr>
                                                                <?php
                                          $no++; // Tambah 1 setiap kali looping
                                        }
                                      }else{
                                        ?>
                                                                <tr>
                                                                    <td colspan="6" class="text-center">Tidak Ada Data
                                                                        Ditemukan </td>
                                                                </tr>
                                                                <?php
                                      }
                                      ?>
                                                            </tbody>
                                                        </table>
                                                    </form>
                                                    <!--Buat Paginationnya--->
                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            <ul class="pagination">
                                                                <!-- LINK FIRST AND PREV -->
                                                                <?php
                                            if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
                                            ?>
                                                                <li class="disabled page-item"><a class="page-link"
                                                                        href="#">First</a></li>
                                                                <li class="disabled page-item"><a class="page-link"
                                                                        href="#">&laquo;</a></li>
                                                                <?php
                                            }else{ // Jika page bukan page ke 1
                                              $link_prev = ($page > 1)? $page - 1 : 1;
                                            ?>
                                                                <li class="page-item"><a class="page-link"
                                                                        href="fiscalsetting.php?page=1">First</a></li>
                                                                <li class="page-item"><a class="page-link"
                                                                        href="fiscalsetting.php?page=<?php echo $link_prev; ?>">&laquo;</a>
                                                                </li>
                                                                <?php
                                            }
                                            ?>

                                                                <!-- LINK NUMBER -->
                                                                <?php
                                            // Buat query untuk menghitung semua jumlah data
                                            $sql2 = mysqli_query($link_yics, "SELECT COUNT(*) AS jumlah FROM time_fiscal");
                                            $get_jumlah = mysqli_fetch_array($sql2);
                                            
                                            $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
                                            $jumlah_number = 1; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                                            $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
                                            $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
                                            
                                            for($i = $start_number; $i <= $end_number; $i++){
                                              $link_active = ($page == $i)? ' class="active page-item"' : '';
                                            ?>
                                                                <li<?php echo $link_active; ?>><a class="page-link"
                                                                        href="fiscalsetting.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                                                    </li>
                                                                    <?php
                                            }
                                            ?>

                                                                    <!-- LINK NEXT AND LAST -->
                                                                    <?php
                                            // Jika page sama dengan jumlah page, maka disable link NEXT nya
                                            // Artinya page tersebut adalah page terakhir 
                                            if($page == $jumlah_page){ // Jika page terakhir
                                            ?>
                                                                    <li class="page-item disabled"><a class="page-link"
                                                                            href="#">&raquo;</a></li>
                                                                    <li class="page-item disabled"><a class="page-link"
                                                                            href="#">Last</a></li>
                                                                    <?php
                                            }else{ // Jika Bukan page terakhir
                                              $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                                            ?>
                                                                    <li class="page-item"><a class="page-link"
                                                                            href="fiscalsetting.php?page=<?php echo $link_next; ?>">&raquo;</a>
                                                                    </li>
                                                                    <li class="page-item"><a class="page-link"
                                                                            href="fiscalsetting.php?page=<?php echo $jumlah_page; ?>">Last</a>
                                                                    </li>
                                                                    <?php
                                            }
                                            ?>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-4 col-lg-4 text-right">
                                                            <button class="btn btn-md btn-danger HapusAll"
                                                                style="border-radius: 10px;"><i
                                                                    class="icon fa-trash"></i>Hapus data</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">

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


                <!-- Modal tambah data fiscalsetting -->
                <div class="modal fade modal-info" id="ModalAlokasiBudget" aria-hidden="true"
                    aria-labelledby="TambahAlokasiBudget" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-simple modal-center ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- modal-header--------- -->
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h3 class="modal-title">ADD TIME FISCAL</h3>
                            </div><!-- end modal-header--------- -->
                            <div class="modal-body">
                                <form action="../proses/usersetting/timefiscal.php" method="POST"
                                    class="needs-validation">
                                    <input type="hidden" name="add">
                                    <br>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label" style="color:black;">PERIODE</label>
                                        <div class="col-md-8">
                                            <!-- <input  type="number" class="form-control" name="periode" 
                                                placeholder="Silahkan isi periode fiscal" autocomplete="off" required > -->
                                            <select name="periode" id="" class="form-control" required>
                                                <option value=""> Pilih periode fiscal..</option>
                                                <?php  
                                            for($i = 0 ; $i <= 4 ; $i++){?>
                                                <option value="<?php echo( date('Y')-1)+$i; ?>">
                                                    <?php echo date( date('Y')-1)+$i; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label" style="color:black;">START FISCAL</label>
                                        <div class="col-md-8">
                                            <input id="bodydivision" type="date" class="form-control" name="awal"
                                                placeholder="Silahkan isi start fiscal" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label" style="color:black;">END FISCAL</label>
                                        <div class="col-md-8">
                                            <input type="date" class="form-control" name="akhir"
                                                placeholder="Silahkan isi end fiscal" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label" style="color:black;">STATUS</label>
                                        <div class="col-md-8">
                                            <select name="status" class="form-control" required>
                                                <option value="">Pilih aktifasi data</option>
                                                <?php
                                                $status = mysqli_query($link_yics, "SELECT * FROM `status`") or die(mysqli_error($link_yics));
                                                if (mysqli_num_rows($status) > 0) {
                                                while ($rows_status = mysqli_fetch_assoc($status)) { ?>
                                                <option value="<?php echo $rows_status['status']; ?>">
                                                    <?php echo $rows_status['status']; ?></option>
                                                <?php
                                                        }
                                                        }
                                                        ?>
                                            </select>

                                            <!-- <input type="text" class="form-control" name="end" placeholder="Silahkan isi end fiscal" autocomplete="off" required > -->
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" id="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form><!-- end form-content--------- -->
                        </div><!-- end modal-content--------- -->
                    </div><!-- end modal-dialog--------- -->
                </div><!-- end fade modal-dialog--------- -->

                <!-- End Modal add user-->
                <!-- CHECK BOX -->

                <script>
                $(document).ready(function() {
                    $('.all').on('click', function() {
                        var tab = $(this).attr('id');
                        if (this.checked) {
                            $('.user' + tab).each(function() {
                                this.checked = true;
                            })
                        } else {
                            $('.user' + tab).each(function() {
                                this.checked = false;
                            })
                        }
                    });
                    $('.checkuser').on('click', function() {
                        var idTab = $(this).attr('data');
                        if ($('.user' + idTab + ':checked').length == $('.user' + idTab).length) {
                            $('.checkall' + idTab).prop('checked', true)
                        } else {
                            $('.checkall' + idTab).prop('checked', false)
                        }
                    })
                })
                </script>

                <!-- query java script hapus data -->
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

                <!-- sweetalert hapus all -->
                <script>
                $(document).ready(function() {
                    $('.HapusAll').click(function(a) {
                        a.preventDefault()
                        var getLink = '../proses/usersetting/timefiscal.php?proses='
                        document.proses.method = "POST";
                        document.proses.action = getLink;
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
                                document.proses.submit();
                            }
                        })
                    })
                })
                </script>
                <!-- end query java script hapus data -->


                <!-- CHECK BOX -->
                <script>
                $(document).ready(function() {
                    $(document).on('click', '#checkAll', function() {
                        if (this.checked) {
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
                        if ($('.check:checked').length == $('.check').length) {
                            $('#checkAll').prop('checked', true)
                        } else {
                            $('#checkAll').prop('checked', false)
                        }
                    })
                })
                </script>
                <script>
                $('#1').click(function() {
                    $(this).val('1');
                })
                </script>