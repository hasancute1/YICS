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
                                                <div class="col-xl-12">
                                                    <!-- Example Tabs Left -->
                                                    <div class="example-wrap">
                                                        <div class="nav-tabs-vertical" data-plugin="tabs">
                                                            <ul class="nav nav-tabs mr-25 w-150" role="tablist">
                                                                <h4 class="pull-left">ROLE USER</h4>
                                                                <?php
                                $s_role = mysqli_query($link_yics, "SELECT * FROM user_role ORDER BY 'id_role' ASC") or die(mysqli_error($link_yics));
                                $i = 0;
                                while ($user_role = mysqli_fetch_assoc($s_role)) {
                                  //menampung id sebaga array tab
                                  $tab[$i] = $user_role['id_role'];
                                  $nama_role[$i] = $user_role['role_name'];
                                  //membuat tab active terbuka untuk pertama kali
                                  $setTab = (isset($_SESSION['tab'])) ? $_SESSION['tab'] : $tab[0];
                                  $tab_active = ($setTab == $tab[$i]) ? "active show" : "";
                                  $tab_select = ($setTab == $tab[$i]) ? "true" : "false";
                                ?>
                                                                <li class="nav-item" role="presentation">
                                                                    <a class="nav-link <?= $tab_active ?>"
                                                                        data-toggle="tab"
                                                                        href="#user<?= $user_role['id_role'] ?>"
                                                                        aria-controls="user<?= $user_role['id_role'] ?>"
                                                                        role="tab" aria-selected="<?= $tab_select ?>">
                                                                        <?= $user_role['role_name'] ?>
                                                                    </a>
                                                                </li>
                                                                <?php
                                  $i++;
                                }
                                ?>
                                                            </ul>
                                                            <form class="tab-content py-15" id="proses" name="proses">

                                                                <?php
                                                                $user = mysqli_query($link_yics, "SELECT * FROM user_role ORDER BY 'id_role' ASC") or die(mysqli_error($link_yics));
                                                                $x = 0;
                                                                while ($user_role = mysqli_fetch_assoc($user)) {
                                                                //menampung id sebaga array tab
                                                                $isi[$x] = $user_role['id_role'];
                                                                $nama_role[$x] = $user_role['role_name'];
                                                                //membuat isi active terbuka untuk pertama kali
                                                                $setisi = (isset($_SESSION['isi'])) ? $_SESSION['isi'] : $isi[0];
                                                                $isi_active = ($setisi == $isi[$x]) ? "active show" : "";
                                                                $isi_select = ($setisi == $isi[$x]) ? "true" : "false";
                                                                ?>
                                                                <div class="tab-pane <?= $isi_active ?>"
                                                                    id="user<?= $user_role['id_role'] ?>"
                                                                    role="tabpanel">
                                                                    <!-- Panel Basic -->
                                                                    <div class="panel">
                                                                        <header class="panel-heading">
                                                                            <div class="panel-actions"></div>
                                                                            <h3 class="panel-title">
                                                                                <?= $user_role['role_name'] ?></h3>
                                                                        </header>
                                                                        <div class="panel-body">

                                                                            <table
                                                                                class=" text-uppercase table table-hover  table-striped w-full db">
                                                                                <thead class="bg-info">
                                                                                    <tr>
                                                                                        <th style="color:white;">
                                                                                            NO</th>
                                                                                        <th style="color:white;">
                                                                                            USERNAME</th>
                                                                                        <th style="color:white;">
                                                                                            NAMA</th>
                                                                                        <th style="color:white;">AREA
                                                                                        </th>
                                                                                        <th style="color:white;">ROLE
                                                                                        </th>
                                                                                        <th style="color:white;">ACTION
                                                                                        </th>
                                                                                        <th><input type="checkbox"
                                                                                                id="checkAll"></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php
                                                                                            $name = $user_role['role_name'];
                                                                                            $ur = mysqli_query($link_yics, "SELECT * FROM data_user 
                                                                                            JOIN area on area.id_area =  data_user.id_area  
                                                                                            JOIN user_role on user_role.id_role =  data_user.id_level
                                                                                            WHERE user_role.role_name='$name'") or die(mysqli_error($link_yics));
                                                                                            $no = 1;
                                                                                            while ($data = mysqli_fetch_array($ur)) {


                                                                                                if ($data['username']==$_SESSION['yics_user']){
                                                                                                    $tombol_hidup="disabledlink";
                                                                                                    $unchek="disabled";
                                                                                                }else{
                                                                                                    $tombol_hidup=""; 
                                                                                                    $unchek="";
                                                                                                }
                                                                                            ?>
                                                                                    <tr>
                                                                                        <td><?= $no++; ?></td>
                                                                                        <td><?= $data['username']; ?>
                                                                                        </td>
                                                                                        <td style="width: 200px;">
                                                                                            <?= $data['nama']; ?>
                                                                                        </td>
                                                                                        <td style="width: 200px;">
                                                                                            <?= $data['area']; ?>
                                                                                        </td>
                                                                                        <td><?= $data['role_name']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <i href=""
                                                                                                data-toggle="tooltip"
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
                                                                                                    class="btn btn-icon btn-danger btn-icon btn-outline btn-xs HapusData <?= $tombol_hidup ?>">
                                                                                                    <i class="icon oi-trashcan"
                                                                                                        aria-hidden="true"></i>
                                                                                                </a>
                                                                                            </i>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input name="check[]"
                                                                                                value="<?= $data['username']; ?>"
                                                                                                type="checkbox"
                                                                                                <?= $unchek ?>
                                                                                                class="check">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <?php
                                                                                        } ?>
                                                                                </tbody>
                                                                            </table>
                                                                            <div class="row">
                                                                                <div class="col-lg-6">
                                                                                </div>
                                                                                <div
                                                                                    class="col-md-6 col-lg-6 text-right">
                                                                                    <button class="btn bg-yellow-700"
                                                                                        style="border-radius: 10px; color:white;"
                                                                                        data-toggle="modal"
                                                                                        data-target="#ModalResetPasswrod"><i
                                                                                            class="icon fa-undo"></i>reset
                                                                                        password</button>
                                                                                    <button
                                                                                        class="btn btn-md btn-danger HapusAll"
                                                                                        style="border-radius: 10px;"><i
                                                                                            class="icon fa-trash"></i>Hapus
                                                                                        data</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <!-- End Panel Basic -->
                                                                </div>
                                                                <?php
                                  $x++;
                                }
                                ?>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- End Example Tabs Left -->
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
        include '../elemen/footer.php'; ?>


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
                                        <label class="col-md-2 col-form-label" style="color:black;">USERNAME</label>
                                        <div class="col-md-10">
                                            <input id="bodydivision" type="number" class="form-control text-uppercase"
                                                name="user" placeholder="Silahkan isi npk" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" style="color:black;">NAMA</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control text-uppercase" name="nama"
                                                placeholder="Silahkan isi nama" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" style="color:black;">AREA</label>
                                        <div class="col-md-10">
                                            <select class="form-control text-uppercase" name="area" required>
                                                <option value="">Pilih area</option>
                                                <?php
                                                $area = mysqli_query($link_yics, "SELECT * FROM area") or die(mysqli_error($link_yics));
                                                if (mysqli_num_rows($area) > 0) {
                                                while ($rows_area = mysqli_fetch_assoc($area)) { ?>
                                                <option value="<?php echo $rows_area['id_area']; ?>">
                                                    <?php echo $rows_area['area']; ?></option>
                                                <?php
                                                        }
                                                        }
                                                        ?>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" style="color:black;">ROLE</label>
                                        <div class="col-md-10">
                                            <select class="form-control text-uppercase" name="role" required="">
                                                <option value="">Pilih role</option>
                                                <?php
                                                $role = mysqli_query($link_yics, "SELECT * FROM user_role") or die(mysqli_error($link_yics));
                                                if (mysqli_num_rows($role) > 0) {
                                                while ($rows_role = mysqli_fetch_assoc($role)) { ?>
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
                                        <label class="col-md-2 col-form-label" style="color:black;">PASSWORD</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control text-uppercase" name="password"
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
                            // console.log(getLink);
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
                                    // window.alert("ddd")

                                    document.proses.submit();
                                    // proses.proses.submit()
                                    // $('#proses').submit();
                                    // proses.submit();
                                    console.log(document.proses.action)
                                }
                            })
                        })
                    })
                    </script>
                    <!-- end query java script hapus data -->



                    <!-- <script>
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
                </script> -->

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
                    $(document).ready(function() {
                        var table = $('.db').DataTable({
                            "columnDefs": [{
                                "className": "dt-center",
                                "targets": "_all"
                            }],
                            ordering: false,
                        });
                    });
                    </script>