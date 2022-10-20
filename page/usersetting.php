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
                            <h1 class="page-title font-size-26 font-weight-600">USER DATA MANAGEMENT</h1>
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
                                                        <span class="font-size-20 bold">USER DATA SETTING</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="text-right">
                                                        <!-- icon tambah data    -->
                                                        <i href="" data-toggle="tooltip"
                                                            data-original-title="Tambah Data">
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
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2  ">
                                                    <div class="sticker">
                                                        <h4 class="pull-left">ROLE USER</h4>
                                                        <div class="nav-tabs-wrapper">
                                                            <ul id="tabs"
                                                                class="nav nav-tabs flex-column nav-stacked text-left"
                                                                role="tablist" style="line-height: 10%;">
                                                                <?php
                                    $s_role = mysqli_query($link_yics, "SELECT * FROM user_role ORDER BY `id_role` ASC")or die(mysqli_error($link_yics));
                                    $i = 0;
                                    while($user_role = mysqli_fetch_assoc($s_role)){
                                        //menampung id sebaga array tab
                                        $tab[$i] = $user_role['id_role'];
                                        $nama_role[$i] = $user_role['role_name'];
                                        //membuat tab active terbuka untuk pertama kali
                                        $setTab = (isset($_SESSION['tab']))? $_SESSION['tab'] : $tab[0];
                                        $tab_active = ($setTab == $tab[$i])? "active" :"";
                                    ?>
                                                                <li class="nav-item mt-2">
                                                                    <a class="btn btn-sm btn-link btn-info <?=$tab_active?> 
                                              tab-<?=$tab_active?> list-tab" href="#<?=$user_role['id_role']?>"
                                                                        id="<?=$user_role['id_role']?>"
                                                                        data-name="<?=$user_role['role_name']?>"
                                                                        role="tab" data-toggle="tab"
                                                                        style="border-radius: 10px;">
                                                                        <?=$user_role['role_name']?>
                                                                    </a>
                                                                </li>
                                                                <?php
                                        $i++;
                                    }
                                    ?>
                                                            </ul>
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
                      $filter_cari = " WHERE username LIKE '%$cari%' OR  nama  LIKE '%$cari%' OR  role_name  LIKE '%$cari%'  ";
                    }else{
                      $cari = '';
                      $filter_cari = '';
                    }
                    // Buat query untuk mengchek data  apakah ada data di tabel
                    $query = "SELECT * FROM view_data_user $filter_cari ";
                    $sql = mysqli_query($link_yics, $query )or die(mysqli_error($link_yics));

                    // echo mysqli_num_rows($sql);
                    $no = $limit_start + 1; // Untuk penomoran tabel

                    ?>
                                                <div class="col-md-10 border-left">
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
                                                                        <a href="usersetting.php"
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
                                                                <tr class="bg-info align-" height="10px">
                                                                    <th class="align-middle text-center" height="10px">
                                                                        NO</th>
                                                                    <th class="align-middle text-center" height="10px">
                                                                        USERNAME</th>
                                                                    <th class="align-middle text-center" height="10px">
                                                                        NAMA</th>
                                                                    <th class="align-middle text-center" height="10px">
                                                                        ROLE</th>
                                                                    <th class="align-middle text-center" height="10px">
                                                                        ACTION</th>
                                                                    <th class="align-middle text-center" height="10px">
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
                                        while($data = mysqli_fetch_array($sql_data)){ // Ambil semua data dari hasil eksekusi $sql
                                          ?>
                                                                <tr>
                                                                    <td class="align-middle text-center">
                                                                        <?php echo $no; ?></td>
                                                                    <td class="align-middle text-center">
                                                                        <?php echo $data['username']; ?></td>
                                                                    <td class="align-middle text-center">
                                                                        <?php echo $data['nama']; ?></td>
                                                                    <td class="align-middle text-center">
                                                                        <?php echo $data['role_name']; ?></td>
                                                                    <td class="align-middle text-center">
                                                                        <i href="" data-toggle="tooltip"
                                                                            data-original-title="Edit">
                                                                            <a href="formubahusersetting.php?ubah=<?php echo $data['username']; ?>"
                                                                                class="btn btn-success btn-icon btn-outline btn-xs">
                                                                                <i class="icon wb-edit"
                                                                                    aria-hidden="true"></i>
                                                                            </a>
                                                                        </i>
                                                                        <i href="javascript:void(0)"
                                                                            data-toggle="tooltip"
                                                                            data-original-title="Hapus">
                                                                            <a href="../proses/usersetting/user.php?del=<?php echo $data['username']; ?>"
                                                                                class="btn btn-icon btn-danger btn-icon btn-outline btn-xs HapusData">
                                                                                <i class="icon oi-trashcan"
                                                                                    aria-hidden="true"></i>
                                                                            </a>
                                                                        </i>
                                                                    </td>
                                                                    <td class="align-middle text-center" height="10px">
                                                                        <input name="check[]"
                                                                            value="<?php echo $data['username']; ?>"
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
                                                                        href="usersetting.php?page=1">First</a></li>
                                                                <li class="page-item"><a class="page-link"
                                                                        href="usersetting.php?page=<?php echo $link_prev; ?>">&laquo;</a>
                                                                </li>
                                                                <?php
                                            }
                                            ?>

                                                                <!-- LINK NUMBER -->
                                                                <?php
                                            // Buat query untuk menghitung semua jumlah data
                                            $sql2 = mysqli_query($link_yics, "SELECT COUNT(*) AS jumlah FROM data_user");
                                            $get_jumlah = mysqli_fetch_array($sql2);
                                            
                                            $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
                                            $jumlah_number = 1; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                                            $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
                                            $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
                                            
                                            for($i = $start_number; $i <= $end_number; $i++){
                                              $link_active = ($page == $i)? ' class="active page-item"' : '';
                                            ?>
                                                                <li<?php echo $link_active; ?>><a class="page-link"
                                                                        href="usersetting.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
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
                                                                            href="usersetting.php?page=<?php echo $link_next; ?>">&raquo;</a>
                                                                    </li>
                                                                    <li class="page-item"><a class="page-link"
                                                                            href="usersetting.php?page=<?php echo $jumlah_page; ?>">Last</a>
                                                                    </li>
                                                                    <?php
                                            }
                                            ?>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-4 col-lg-4 text-right">
                                                            <button class="btn bg-yellow-700"
                                                                style="border-radius: 10px; color:white;"
                                                                data-toggle="modal" data-target="#ModalResetPasswrod"><i
                                                                    class="icon fa-undo"></i>reset password</button>
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
                <script src="cariuser.js"> </script>

                <!-- Modal tambah data Alokasi Budget -->
                <div class="modal fade modal-info" id="ModalAlokasiBudget" aria-hidden="true"
                    aria-labelledby="TambahAlokasiBudget" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-simple modal-center modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- modal-header--------- -->
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h3 class="modal-title">Add User</h3>
                            </div><!-- end modal-header--------- -->
                            <div class="modal-body">
                                <form action="../proses/usersetting/user.php" method="POST" id="tambahdata"
                                    class="needs-validation">
                                    <input type="hidden" name="add">
                                    <br>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" style="color:black;">Username</label>
                                        <div class="col-md-10">
                                            <input id="bodydivision" type="text" class="form-control" name="user"
                                                placeholder="Silahkan isi username" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" style="color:black;">Nama</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="nama"
                                                placeholder="Silahkan isi nama" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" style="color:black;">Role</label>
                                        <div class="col-md-10">
                                            <select class="form-control" id="dept_prop" name="role" required="">
                                                <option value="">Pilih role</option>
                                                <?php 
                                                  $role = mysqli_query($link_yics, "SELECT * FROM user_role") or die (mysqli_error($link_yics));
                                                  if(mysqli_num_rows( $role)>0){
                                                    while( $rows_role = mysqli_fetch_assoc($role)){?>
                                                <option value="<?php echo $rows_role['id_role']; ?>">
                                                    <?php echo $rows_role['role_name']; ?></option>
                                                <?php
                                                    }
                                                  }                                                
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" style="color:black;">Password</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="password"
                                                placeholder="Silahkan isi password" autocomplete="off" required>
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

                <!-- ModalResetPasswrod -->
                <div class="modal fade modal-info" id="ModalResetPasswrod" aria-hidden="true"
                    aria-labelledby="ModalResetPasswrod" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-simple modal-center modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h3 class="modal-title">Reset Password All User</h3>
                            </div>
                            <div class="modal-body">
                                <form action="../proses/usersetting/user.php" method="POST" class="needs-validation"
                                    novalidate="">
                                    <input type="hidden" name="reset">
                                    <br>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" style="color:black;">Password</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="password" autocomplete="off"
                                                placeholder="Silahkan isi password default..." required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" id="reset" class="btn btn-danger">Reset</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- End Modal Tambah Alokasi Budget   -->
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
                            var getLink = '../proses/usersetting/user.php?proses='
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

                    <script>
                    $('.editall').on('click', function(e) {
                        e.preventDefault();
                        var getLink = 'mass_editMp.php';
                        document.prosesmp.action = getLink;
                        document.prosesmp.submit();
                    });
                    </script>

                    <script>
                    $(document).ready(function() {
                        function load_data(hal) {
                            var id = $('.tab-active').attr('id');
                            var name = $('.tab-active').attr('data-name');
                            var cari = $('.cari').val();
                            // console.log(name);
                            $('.content-title').text(name);
                            $.ajax({
                                url: 'ajax/index.php',
                                method: 'GET',
                                data: {
                                    page: hal,
                                    id: id,
                                    cari: cari
                                },
                                success: function(msg) {
                                    $('.data-view').fadeOut('fast', function() {
                                        $(this).html(msg).fadeIn('fast');

                                    });
                                }
                            });
                        }
                        load_data();
                        $('.cari').keyup(function() {
                            load_data();
                        })
                        $('.list-tab').click(function() {
                            var id = $(this).attr('id');
                            $('.list-tab').removeClass('tab-active');
                            $(this).addClass('tab-active');
                            load_data();
                        });
                        $(document).on('click', '.halaman', function() {
                            var hal = $(this).attr("id");
                            load_data(hal);
                        });
                        load_data();
                    })
                    </script>

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