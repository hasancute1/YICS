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
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
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

                        ?>

                        <a class="list-group-item dropdown-item <?= $bg_notif ?>"
                            <?php if ($_SESSION['yics_level'] == "1") { ?>

                            href="../page/viewplan.php?ubah=<?= $row['id_type'] ?>&notif=<?=$row['id_notif']?>"
                            
                            <?php }else{ ?>

                            href="../page/formupdate.php?ubah=<?= $row['id_type'] ?>&notif=<?=$row['id_notif']?>"
                            
                            <?php } ?>

                            role="menuitem">
                            <div class="media">
                                <div class="pr-10">
                                    <i class="icon wb-order bg-red-600 white icon-circle" aria-hidden="true"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading <?=$color_notif ?>"> <strong><?= ucwords($row['sender']) ?>
                                        </strong> <?= $row['message'] ?></h6>
                                    <h4 class="media-heading <?=$color_notif ?>"><?= strtoupper($row['judul_prop'])  ?>
                                    </h4>
                                    <time class="media-meta <?=$color_notif ?>" datetime="2018-06-12T20:50:48+08:00">5
                                        <?= $row['date'] ?></time>
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
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Messages" aria-expanded="false"
            data-animation="scale-up" role="button">
            <i class="icon fa-paper-plane"" aria-hidden=" true"></i>
            <span class="badge badge-pill badge-info up">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
            <div class="dropdown-menu-header" role="presentation">
                <h5>MESSAGES</h5>
                <span class="badge badge-round badge-info">New 3</span>
            </div>

            <div class="list-group" role="presentation">
                <div data-role="container">
                    <div data-role="content">
                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                            <div class="media">
                                <div class="pr-10">
                                    <span class="avatar avatar-sm avatar-online">
                                        <img src="../global/portraits/2.jpg" alt="..." />
                                        <i></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading">Mary Adams</h6>
                                    <div class="media-meta">
                                        <time datetime="2018-06-17T20:22:05+08:00">30 minutes ago</time>
                                    </div>
                                    <div class="media-detail">Anyways, i would like just do it</div>
                                </div>
                            </div>
                        </a>
                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                            <div class="media">
                                <div class="pr-10">
                                    <span class="avatar avatar-sm avatar-off">
                                        <img src="../global/portraits/3.jpg" alt="..." />
                                        <i></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading">Caleb Richards</h6>
                                    <div class="media-meta">
                                        <time datetime="2018-06-17T12:30:30+08:00">12 hours ago</time>
                                    </div>
                                    <div class="media-detail">I checheck the document. But there seems</div>
                                </div>
                            </div>
                        </a>
                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                            <div class="media">
                                <div class="pr-10">
                                    <span class="avatar avatar-sm avatar-busy">
                                        <img src="../global/portraits/4.jpg" alt="..." />
                                        <i></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading">June Lane</h6>
                                    <div class="media-meta">
                                        <time datetime="2018-06-16T18:38:40+08:00">2 days ago</time>
                                    </div>
                                    <div class="media-detail">Lorem ipsum Id consectetur et minim</div>
                                </div>
                            </div>
                        </a>
                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                            <div class="media">
                                <div class="pr-10">
                                    <span class="avatar avatar-sm avatar-away">
                                        <img src="../global/portraits/5.jpg" alt="..." />
                                        <i></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading">Edward Fletcher</h6>
                                    <div class="media-meta">
                                        <time datetime="2018-06-15T20:34:48+08:00">3 days ago</time>
                                    </div>
                                    <div class="media-detail">Dolor et irure cupidatat commodo nostrud nostrud.</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="dropdown-menu-footer" role="presentation">
                <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                    <i class="icon wb-settings" aria-hidden="true"></i>
                </a>
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                    See all messages
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