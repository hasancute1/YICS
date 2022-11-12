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

                    <?php include '../elemen/sidebarleft.php';?>

                    <!-- Site Navbar Search -->
                    <?php include '../elemen/sidebar.php';?>
                    <!-- End Site Navbar Search -->
                    <!-- end sidebar -->

                    <!-- sidebar back -->
                    <?php include '../elemen/sidebarback.php';?>
                    <!-- end sidebar back -->



                    <!-- query buat ngambil data di proposal....................................... -->
                    <?php  
                                        $id_ia=$_GET['id_ia'];
                                        $data =("SELECT * FROM ia
                                        JOIN proposal ON ia.id_prop = proposal.id_prop 
                                        JOIN depart ON proposal.id_dep = depart.id_dep
                                        JOIN kategori_proposal  ON proposal.id_kat = kategori_proposal.id_kat
                                        where id_ia='$id_ia'"); 
                                         $data = mysqli_query($link_yics, $data)or die (mysqli_error($link_yics));
                                        if(mysqli_num_rows($data)>0){
                                            $data_ia = mysqli_fetch_assoc($data);         
                                        }
// <!-- end dquery buat ngambil data di proposal....................................... -->

// <!-- query buat ngambil data di proposal....................................... -->        
                                        $data_2 =("SELECT * FROM keterangan_progress
                                        where id_ket='2'"); 
                                         $data_22 = mysqli_query($link_yics, $data_2)or die (mysqli_error($link_yics));
                                        if(mysqli_num_rows($data_22)>0){
                                            $data_222    = mysqli_fetch_assoc($data_22);         
                                        }
                                        $data_3 =("SELECT * FROM keterangan_progress
                                        where id_ket='3'"); 
                                         $data_33 = mysqli_query($link_yics, $data_3)or die (mysqli_error($link_yics));
                                        if(mysqli_num_rows($data_33)>0){
                                            $data_333 = mysqli_fetch_assoc($data_33);         
                                        }
                                        $data_4 =("SELECT * FROM keterangan_progress
                                        where id_ket='4'"); 
                                         $data_44 = mysqli_query($link_yics, $data_4)or die (mysqli_error($link_yics));
                                        if(mysqli_num_rows($data_44)>0){
                                            $data_444 = mysqli_fetch_assoc($data_44);         
                                        }
                                        $data_5 =("SELECT * FROM keterangan_progress
                                        where id_ket='5'"); 
                                         $data_55 = mysqli_query($link_yics, $data_5)or die (mysqli_error($link_yics));
                                        if(mysqli_num_rows($data_55)>0){
                                            $data_555 = mysqli_fetch_assoc($data_55);         
                                        }
                                        
// <!-- end dquery buat ngambil data di proposal....................................... -->


// <!-- query buat ngambil data id-pog di titik dimasing-masing  di tracking IA....................................... -->
                                        $tracking_rss = ("SELECT * FROM tracking_ia
                                        JOIN progress ON tracking_ia.id_prog = progress.id_prog 
                                        WHERE tracking_ia.id_ia='$id_ia' AND id_ket='2' ");
                                        $data_rss = mysqli_query($link_yics, $tracking_rss)or die (mysqli_error($link_yics));
                                        if(mysqli_num_rows($data_rss)>0){
                                            $id_prog_rss = mysqli_fetch_assoc($data_rss);         
                                        }
                                        $tracking_bp = ("SELECT * FROM tracking_ia
                                        JOIN progress ON tracking_ia.id_prog = progress.id_prog                                         
                                        WHERE tracking_ia.id_ia='$id_ia' AND id_ket='3'");
                                        $data_bp = mysqli_query($link_yics, $tracking_bp)or die (mysqli_error($link_yics));
                                        if(mysqli_num_rows($data_bp)>0){
                                            $id_prog_bp = mysqli_fetch_assoc($data_bp);         
                                        }
                                        $tracking_pr = ("SELECT * FROM tracking_ia
                                        JOIN progress ON tracking_ia.id_prog = progress.id_prog 
                                        WHERE tracking_ia.id_ia='$id_ia' AND id_ket='4'");
                                        $data_pr = mysqli_query($link_yics, $tracking_pr)or die (mysqli_error($link_yics));
                                        if(mysqli_num_rows($data_pr)>0){
                                            $id_prog_pr = mysqli_fetch_assoc($data_pr);         
                                        }
                                        $tracking_gr = ("SELECT * FROM tracking_ia
                                        JOIN progress ON tracking_ia.id_prog = progress.id_prog                                        
                                        WHERE tracking_ia.id_ia='$id_ia' AND id_ket='5'");
                                        $data_gr = mysqli_query($link_yics, $tracking_gr)or die (mysqli_error($link_yics));
                                        if(mysqli_num_rows($data_gr)>0){
                                            $id_prog_gr = mysqli_fetch_assoc($data_gr);         
                                        }            
                                        ?>
                    <!--end  query buat ngambil data id-pog di titik dimasing-masing  di tracking IA....................................... -->

                    <!-- Page -->
                    <div class="page">
                        <div class="page-header">
                            <h1 class="page-title font-size-26 font-weight-600">TRACKING DOCUMENT IA</h1>
                        </div>


                        <div class="page-content container-fluid">
                            <div class="row">
                                <!-- Second Row -->
                                <div class="col-lg-12 col-md-12">
                                    <div class="card card-shadow" style="border-radius: 10px;">
                                        <div class="card-header card-header-transparent">

                                            <div class="col-lg-12 col-md-12">
                                                <div class="table">
                                                    <table class="table  w-full display  text-uppercase">

                                                        <tr>
                                                            <td class="judul align-middle text-center " rowspan="3"
                                                                width="200px">
                                                                <img src="../base/assets/images/adm3.png"
                                                                    style="width:200px;">
                                                            </td>
                                                            <td class="judul align-middle text-center text-uppercase"
                                                                rowspan="3">

                                                                <h3> " <?= $data_ia['ia']; ?> "</h3>
                                                                <h6>(<?= $data_ia['deskripsi']; ?> ) </h6>
                                                            </td>
                                                            <td class="text-left" style="color:black;">
                                                                Departement</td>
                                                            <td> &nbsp;:&nbsp;</td>
                                                            <td><?= $data_ia['depart']; ?></td>
                                                        </tr>

                                                        <tr>

                                                            <td class="text-left" style="color:black;" width="200px">
                                                                Category
                                                            </td>
                                                            <td width="30px"> &nbsp;:&nbsp;</td>
                                                            <td><?php echo $data_ia['kategori']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left" style="color:black;">Cost
                                                                IA</td>
                                                            <td> &nbsp;:&nbsp;</td>
                                                            <td><?= 'RP'." ". number_format($data_ia['cost_ia'], 0, ',', '.');?>
                                                                MILLION
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>







                                        <div class="row py-20">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="pearls row">
                                                    <div
                                                        class="pearl <?= (count($id_prog_rss) > 0)?'current':'' ?> col-3">
                                                        <div class="pearl-icon"><i class="icon wb-user"
                                                                aria-hidden="true"></i>
                                                        </div>
                                                        <h3 class="pearl-tittle"><?php echo $data_222['keterangan'] ; ?>
                                                        </h3>
                                                        <br>
                                                        <div
                                                            class="list-group bg-blue-grey-100 bg-inherit text-left w-250 ml-3">

                                                            <?php 
                                                           $bp = mysqli_query ($link_yics,"SELECT * FROM progress WHERE id_ket='2'");
                                                           if(mysqli_num_rows($bp)>0){
                                                            while ($rows_bp = mysqli_fetch_assoc($bp)){
                                                                //  QUERY TRACKING_PROPOSAL................................
                                                                                $qry = "SELECT
                                                                                tracking_ia.id_prog AS id_prog, 
                                                                                tracking_ia.approval AS id_approval,
                                                                                `time`,
                                                                                data_user.nama AS pic
                                                                                FROM tracking_ia
                                                                                LEFT JOIN data_user
                                                                                ON tracking_ia.username = data_user.username
                                                                                WHERE id_ia = '$id_ia' AND id_prog = '$rows_bp[id_prog]' ";
                                                                            $sql = mysqli_query($link_yics, $qry)or die (mysqli_error($link_yics));
                                                                            
                                                                            if(mysqli_num_rows($sql)>0){
                                                                                $data_tracking = mysqli_fetch_assoc($sql);                
                                                                                $approve = $data_tracking['id_approval'];
                                                                                
                                                                                $time= date("d M Y | H:i", strtotime($data_tracking['time'])); 
                                                                                $id_pic= $data_tracking ['pic'];                                                                                
                                                                                $approve_clr = ($approve == '1')?"teal":(($approve == '0')?"red":"grey") ;
                                                                                $status = ($approve == '1')?"SUKSES":(($approve == '0')?"BERHENTI":"..") ;
                                                                                $icon = ($approve == '1')?"check":(($approve == '0')?"close":"..") ;
                                                                            }else {
                                                                                
                                                                                $approve = "...";
                                                                                $time= "...";
                                                                                $id_pic= "...";
                                                                                $approve_clr = ($approve == '1')?"teal":(($approve == '0')?"red":"grey") ;
                                                                                $status = ($approve == '1')?"SUKSES":(($approve == '0')?"BERHENTI":"..") ;
                                                                                $icon = ($approve == '1')?"check":(($approve == '0')?"close":"..") ;
                                                                            }	
                                                                            ?>





                                                            <div
                                                                class="list-group-item bg-<?= "$approve_clr" ?>-300 <?= "$hilang" ?>">
                                                                <ul>
                                                                    <li style="list-style-type: none;">
                                                                        <i class="icon wb-<?= "$icon" ?>"
                                                                            aria-hidden="true"></i>
                                                                        <?= $rows_bp['nama_progress'] ?>

                                                                    </li>


                                                                    <li style="list-style-type: none;">
                                                                        <i class="icon oi-calendar" aria-hidden="true">
                                                                            &nbsp;&nbsp; <?= "$time" ?></i>
                                                                    </li>

                                                                    <li style="list-style-type: none;">
                                                                        <i class="icon wb-user"
                                                                            aria-hidden="true">&nbsp;</i><?= "$id_pic" ?>
                                                                    </li>

                                                                </ul>
                                                                <hr>
                                                            </div>

                                                            <?php
                                                        
                                                        }
                                                        } 
                                                        
                                                        ?>

                                                        </div>
                                                    </div>


                                                    <div
                                                        class="pearl <?= (count($id_prog_bp) > 0)?'current':'' ?> col-3">
                                                        <div class="pearl-icon"><i class="icon wb-pencil"
                                                                aria-hidden="true"></i></div>
                                                        <h3 class="pearl-tittle"><?php echo $data_333['keterangan'] ; ?>
                                                        </h3>
                                                        <br>
                                                        <div
                                                            class="list-group bg-blue-grey-100 bg-inherit text-left w-250 ml-3">

                                                            <?php  
                                                          
                                                                $qProg = "SELECT nama_progress, id_prog , step FROM progress WHERE id_ket='3'";
                                                                if($data_ia['cost_ia'] < 50 ){
                                                                    $exception = " AND (step <> '16' AND step <> '17' AND step <> '18'  AND step <> '19') ";
                                                                }else if($data_ia['cost_ia'] > 50 AND $data_ia['cost_ia'] < 500){
                                                                    $exception = " AND ( step <> '18'  AND step <> '19') ";
                                                                }else{
                                                                    $exception = "";
                                                                }
                                                                $bp = mysqli_query($link_yics,$qProg.$exception)or die(mysqli_error($link_yics));
                                                            
                                                          
                                                           if(mysqli_num_rows($bp)>0){
                                                            while ($rows_bp = mysqli_fetch_assoc($bp)){
                                                                // echo $data_ia['cost_ia'];
                                                                

                                                                //  QUERY TRACKING_PROPOSAL................................
                                                                                $qry = "SELECT
                                                                                tracking_ia.id_prog AS id_prog, 
                                                                                tracking_ia.approval AS id_approval,
                                                                                `time`,
                                                                                data_user.nama AS pic
                                                                                FROM tracking_ia
                                                                                LEFT JOIN data_user
                                                                                ON tracking_ia.username = data_user.username
                                                                                WHERE id_ia = '$id_ia' AND id_prog = '$rows_bp[id_prog]' ";
                                                                            $sql = mysqli_query($link_yics, $qry)or die (mysqli_error($link_yics));
                                                                            
                                                                            if(mysqli_num_rows($sql)>0){
                                                                                $data_tracking = mysqli_fetch_assoc($sql);                
                                                                                $approve = $data_tracking['id_approval'];                                                                                
                                                                                $time= date("d M Y | H:i", strtotime($data_tracking['time'])); 
                                                                                $id_pic= $data_tracking ['pic'];                                                                                
                                                                                $approve_clr = ($approve == '1')?"teal":(($approve == '0')?"red":"grey") ;
                                                                                $status = ($approve == '1')?"SUKSES":(($approve == '0')?"BERHENTI":"..") ;
                                                                                $icon = ($approve == '1')?"check":(($approve == '0')?"close":"..") ;
                                                                            }else {
                                                                                
                                                                                $approve = "...";
                                                                                $time= "...";
                                                                                $id_pic= "...";
                                                                                $approve_clr = ($approve == '1')?"teal":(($approve == '0')?"red":"grey") ;
                                                                                $status = ($approve == '1')?"SUKSES":(($approve == '0')?"BERHENTI":"..") ;
                                                                                $icon = ($approve == '1')?"check":(($approve == '0')?"close":"..") ;
                                                                            }	
                                                                            ?>





                                                            <div
                                                                class="list-group-item bg-<?= "$approve_clr" ?>-300 <?= "$hilang" ?>">
                                                                <ul>
                                                                    <li style="list-style-type: none;">
                                                                        <i class="icon wb-<?= "$icon" ?>"
                                                                            aria-hidden="true"></i>
                                                                        <?= $rows_bp['nama_progress'] ?>

                                                                    </li>


                                                                    <li style="list-style-type: none;">
                                                                        <i class="icon oi-calendar" aria-hidden="true">
                                                                            &nbsp;&nbsp; <?= "$time" ?></i>
                                                                    </li>

                                                                    <li style="list-style-type: none;">
                                                                        <i class="icon wb-user"
                                                                            aria-hidden="true"></i>&nbsp;<?= "$id_pic" ?>
                                                                    </li>

                                                                </ul>
                                                                <hr>
                                                            </div>

                                                            <?php
                                                        
                                                        }
                                                        } 
                                                        
                                                        ?>

                                                        </div>
                                                        <div
                                                            class="list-group bg-blue-grey-100 bg-inherit text-left w-250 ml-3">


                                                        </div>
                                                    </div>

                                                    <div
                                                        class="pearl <?= (count($id_prog_gr) > 0)?'current':'' ?> col-3">
                                                        <div class="pearl-icon"><i class="icon wb-payment"
                                                                aria-hidden="true"></i></div>
                                                        <h3 class="pearl-tittle" data-toggle="dropdown">
                                                            <?php echo $data_444['keterangan'] ; ?></h3>
                                                        <br>
                                                        <div
                                                            class="list-group bg-blue-grey-100 bg-inherit text-left w-250 ml-10">

                                                            <?php 
                                                           $bp = mysqli_query ($link_yics,"SELECT * FROM progress WHERE id_ket='4'");
                                                           if(mysqli_num_rows($bp)>0){
                                                            while ($rows_bp = mysqli_fetch_assoc($bp)){                                                              

                                                                //  QUERY TRACKING_PROPOSAL................................
                                                                                $qry = "SELECT
                                                                                tracking_ia.id_prog AS id_prog, 
                                                                                tracking_ia.approval AS id_approval,
                                                                                `time`,
                                                                                data_user.nama AS pic
                                                                                FROM tracking_ia
                                                                                LEFT JOIN data_user
                                                                                ON tracking_ia.username = data_user.username
                                                                                WHERE id_ia = '$id_ia' AND id_prog = '$rows_bp[id_prog]' ";
                                                                            $sql = mysqli_query($link_yics, $qry)or die (mysqli_error($link_yics));
                                                                            
                                                                            if(mysqli_num_rows($sql)>0){
                                                                                $data_tracking = mysqli_fetch_assoc($sql);                
                                                                                $approve = $data_tracking['id_approval'];
                                                                                $id_prog_bp = $data_tracking['id_prog'];
                                                                                $time= date("d M Y | H:i", strtotime($data_tracking['time'])); 
                                                                                $id_pic= $data_tracking ['pic'];
                                                                                $clr_atas = ($id_prog_bp > '0')?"tail":("grey") ;
                                                                                $approve_clr = ($approve == '1')?"teal":(($approve == '0')?"red":"grey") ;
                                                                                $status = ($approve == '1')?"SUKSES":(($approve == '0')?"BERHENTI":"..") ;
                                                                                $icon = ($approve == '1')?"check":(($approve == '0')?"close":"..") ;
                                                                            }else {
                                                                                
                                                                                $approve = "...";
                                                                                $time= "...";
                                                                                $id_pic= "...";
                                                                                $approve_clr = ($approve == '1')?"teal":(($approve == '0')?"red":"grey") ;
                                                                                $status = ($approve == '1')?"SUKSES":(($approve == '0')?"BERHENTI":"..") ;
                                                                                $icon = ($approve == '1')?"check":(($approve == '0')?"close":"..") ;
                                                                            }	
                                                                            ?>





                                                            <div
                                                                class="list-group-item bg-<?= "$approve_clr" ?>-300 <?= "$hilang" ?>">
                                                                <ul>
                                                                    <li style="list-style-type: none;">
                                                                        <i class="icon wb-<?= "$icon" ?>"
                                                                            aria-hidden="true"></i>
                                                                        <?= $rows_bp['nama_progress'] ?>

                                                                    </li>


                                                                    <li style="list-style-type: none;">
                                                                        <i class="icon oi-calendar" aria-hidden="true">
                                                                            &nbsp;&nbsp; <?= "$time" ?></i>
                                                                    </li>

                                                                    <li style="list-style-type: none;">
                                                                        <i class="icon wb-user"
                                                                            aria-hidden="true"></i>&nbsp;<?= "$id_pic" ?>
                                                                    </li>

                                                                </ul>
                                                                <hr>
                                                            </div>

                                                            <?php
                                                        
                                                        }
                                                        } 
                                                        
                                                        ?>

                                                        </div>
                                                        <div
                                                            class="list-group bg-blue-grey-100 bg-inherit text-left w-250 ml-3">


                                                        </div>
                                                    </div>

                                                    <div
                                                        class="pearl <?= (count($id_prog_pr) > 0)?'current':'' ?> col-3">
                                                        <div class="pearl-icon"><i class="icon fa-shopping-cart"
                                                                aria-hidden="true"></i></div>
                                                        <h3 class="pearl-tittle" data-toggle="dropdown">
                                                            <?php echo $data_555['keterangan'] ; ?></h3>
                                                        <br>
                                                        <div
                                                            class="list-group bg-blue-grey-100 bg-inherit text-left w-250 ml-10">

                                                            <?php 
                                                           $bp = mysqli_query ($link_yics,"SELECT * FROM progress WHERE id_ket='5'");
                                                           if(mysqli_num_rows($bp)>0){
                                                            while ($rows_bp = mysqli_fetch_assoc($bp)){                                                              
                                                                //  QUERY TRACKING_PROPOSAL................................
                                                                                $qry = "SELECT
                                                                                tracking_ia.id_prog AS id_prog, 
                                                                                tracking_ia.approval AS id_approval,
                                                                                `time`,
                                                                                data_user.nama AS pic
                                                                                FROM tracking_ia
                                                                                LEFT JOIN data_user
                                                                                ON tracking_ia.username = data_user.username
                                                                                WHERE id_ia = '$id_ia' AND id_prog = '$rows_bp[id_prog]' ";
                                                                            $sql = mysqli_query($link_yics, $qry)or die (mysqli_error($link_yics));
                                                                            
                                                                            if(mysqli_num_rows($sql)>0){
                                                                                $data_tracking = mysqli_fetch_assoc($sql);                
                                                                                $approve = $data_tracking['id_approval'];
                                                                                $id_prog_bp = $data_tracking['id_prog'];
                                                                                $time= date("d M Y | H:i", strtotime($data_tracking['time'])); 
                                                                                $id_pic= $data_tracking ['pic'];
                                                                                $clr_atas = ($id_prog_bp > '0')?"tail":("grey") ;
                                                                                $approve_clr = ($approve == '1')?"teal":(($approve == '0')?"red":"grey") ;
                                                                                $status = ($approve == '1')?"SUKSES":(($approve == '0')?"BERHENTI":"..") ;
                                                                                $icon = ($approve == '1')?"check":(($approve == '0')?"close":"..") ;
                                                                            }else {
                                                                                
                                                                                $approve = "...";
                                                                                $time= "...";
                                                                                $id_pic= "...";
                                                                                $approve_clr = ($approve == '1')?"teal":(($approve == '0')?"red":"grey") ;
                                                                                $status = ($approve == '1')?"SUKSES":(($approve == '0')?"BERHENTI":"..") ;
                                                                                $icon = ($approve == '1')?"check":(($approve == '0')?"close":"..") ;
                                                                            }	
                                                                            ?>





                                                            <div
                                                                class="list-group-item bg-<?= "$approve_clr" ?>-300 <?= "$hilang" ?>">
                                                                <ul>
                                                                    <li style="list-style-type: none;">
                                                                        <i class="icon wb-<?= "$icon" ?>"
                                                                            aria-hidden="true"></i>
                                                                        <?= $rows_bp['nama_progress'] ?>

                                                                    </li>


                                                                    <li style="list-style-type: none;">
                                                                        <i class="icon oi-calendar" aria-hidden="true">
                                                                            &nbsp;&nbsp; <?= "$time" ?></i>
                                                                    </li>

                                                                    <li style="list-style-type: none;">
                                                                        <i class="icon wb-user"
                                                                            aria-hidden="true"></i>&nbsp;<?= "$id_pic" ?>
                                                                    </li>

                                                                </ul>
                                                                <hr>
                                                            </div>

                                                            <?php
                                                        
                                                        }
                                                        } 
                                                        
                                                        ?>

                                                        </div>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End second -->
                            </div>

                        </div>
                    </div>


                    <script>
                    $('#reset_form').click(function(event) {
                        event.preventDefault();

                        $(".terpilih").prop("selected", false);

                    });
                    </script>

                    <!-- End Page -->

                    <!-- Footer -->
                    <?php
include '../elemen/footer.php';?>