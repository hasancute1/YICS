<?php

include("../proses/functions.php");

// update notif
if(isset($_GET["notif"])){
   updateNotif($_GET["notif"]);
}
// ambil data notif
$data_notif = getNotif();
$notif_pending = get_notif_pending();

?>
<ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
    <li class="nav-item hidden-sm-down" id="toggleFullscreen">
        <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
            <span class="sr-only">Toggle fullscreen</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Notifications" aria-expanded="false"
            data-animation="scale-up" role="button">
            <i class="icon wb-bell" aria-hidden="true"></i>

            <?php if(count($notif_pending) > 0){ ?>
            <span class="badge badge-pill badge-danger up"><?=count($notif_pending); ?></span>
            <?php }?>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" style="width:800px;" role="menu">
            <div class="dropdown-menu-header">
                <h5>NOTIFICATIONS</h5>
                <?php if(count($notif_pending) > 0){ ?>
                <span class="badge badge-round badge-danger"><?= "New ". count($notif_pending); ?></span>
                <?php  }?>

            </div>

            <div class="list-group">
                <div data-role="container">
                    <div data-role="content">

                        <?php 
                        
                        if($data_notif){                          
                        
                        foreach($data_notif as $row) { 

                            
                            
                            if($row['status'] == 'Pending'){
                                $bg_notif = "bg-blue-400";
                                $color_notif = "white";
                            }else{
                                $bg_notif = "";
                                $color_notif = "";
                            }


                            if($row['type'] == 'proposal'){
                                
                                if($_SESSION['yics_level'] == "1"){
                                    $redirect_notif = "../page/viewplan.php?ubah=";
                                }else{
                                    $redirect_notif = "../page/formupdate.php?ubah=";
                                }

                            }else{

                                if($_SESSION['yics_level'] == "1"){
                                    $redirect_notif = "../page/Tracking.php?id_ia=";
                                }else{
                                    $redirect_notif = "../page/formupdate_ia.php?id_ia=";
                                }

                            }

                        ?>

                        <a class="list-group-item dropdown-item <?= $bg_notif ?>"
                            <?php if ($_SESSION['yics_level'] == "1") { ?>
                            href="<?= $redirect_notif .  $row['id_type'] ?>&notif=<?=$row['id_notif']?>" <?php }else{ ?>
                            href="<?= $redirect_notif . $row['id_type'] ?>&notif=<?=$row['id_notif']?>" <?php } ?>
                            role="menuitem">
                            <div class="media">
                                <div class="pr-10">
                                    <i class="icon wb-order bg-red-600 white icon-circle" aria-hidden="true"></i>
                                </div>
                                <div class="media-body ">
                                    <p class="media-heading <?=$color_notif ?>">
                                        <strong>Proposal "<?= strtoupper($row['judul_prop'])  ?>"
                                        </strong>
                                    </p>
                                    <p class="media-heading <?=$color_notif ?>"> <?= $row['message'] ?></p>
                                    <h4 class="media-heading <?=$color_notif ?>">
                                        Oleh
                                        <!-- <i class="icon wb-user" aria-hidden="true"></i>  -->
                                        <?= ucwords($row['nama']) ?>
                                    </h4>
                                    <time class="media-meta <?=$color_notif ?>" datetime="2018-06-12T20:50:48+08:00">
                                        <i class="icon oi-calendar"
                                            aria-hidden="true"></i><?= date("d M Y | H:i", strtotime($row['date'])); ?></time>

                                </div>
                            </div>
                        </a>

                        <?php 
                    
                            } // penutup foreach
                        } //penutup if ?>


                    </div>
                </div>
            </div>
            <div class="dropdown-menu-footer">
                <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                    <i class="icon wb-settings" aria-hidden="true"></i>
                </a>
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                    All notifications
                </a>
            </div>
        </div>
    </li>

    <li class="nav-link">
        <div style="width: 0px; height: 20px; border: 1px #000 solid;" class="bg-dark"></div>
    </li>
    <li class="nav-link">
        Hi, <?= $_SESSION['yics_nama']; ?>/ <?php echo $_SESSION ["yics_user"]; ?>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
            data-animation="scale-up" role="button">
            <span class="avatar avatar-online">
                <img src="../global/portraits/<?php echo $_SESSION ["yics_user"]; ?>.jpg" alt="...">
                <i></i>
            </span>
        </a>
        <div class="dropdown-menu" role="menu">
            <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-user"
                    aria-hidden="true"></i> My Profile</a>
            <div class="dropdown-divider" role="presentation"></div>
            <a class="dropdown-item" href="../logout.php" role="menuitem"><i class="icon wb-power"
                    aria-hidden="true"></i> Logout</a>
        </div>
    </li>

</ul>