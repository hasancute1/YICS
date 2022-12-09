<?php 

$uri = $_SERVER['REQUEST_URI'];
$uri = explode('/', $uri);
$uri = explode('.php' , $uri[3]);
$url_aktive = $uri[0];

$get_data_budget1 = mysqli_query($link_yics ,"SELECT * FROM budget JOIN depart on budget.id_dep = depart.id_dep
                                                                   JOIN time_fiscal on time_fiscal.id_fis = budget.id_fis            
                                                                    where `status`='aktif'") or die (mysqli_error($link_yics));                 
                    if(mysqli_num_rows($get_data_budget1)>0){
                        $get_data_budget = mysqli_fetch_assoc($get_data_budget1);
                        $tombol_hidup="";
                     }else{
                        $tombol_hidup="disabledlink"; 
                    }

?>
<ul class="site-menu" data-plugin="menu">
    <li class="site-menu-item has-sub <?= ($url_aktive == "my_order")? "active": ""; ?>">
        <a href="my_order.php" class="animsition-link">
            <i class="site-menu-icon wb-order" aria-hidden="true"></i>
            <span class="site-menu-title">MY ORDERS</span>
        </a>
    </li>
    <li class="site-menu-item has-sub <?= ($url_aktive == "dashboard")? "active": ""; ?>">
        <a href="dashboard.php" class="animsition-link">
            <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
            <span class="site-menu-title">DASHBOARD</span>
        </a>
    </li>
    <li class="site-menu-item has-sub open <?= ($url_aktive == "controltabledep")? "active": ""; ?>">
        <a href="javascript:void(0)">
            <i class="site-menu-icon wb-table" aria-hidden="true"></i>
            <span class="site-menu-title">CONTROL TABLES</span>
            <span class="site-menu-arrow"></span>
        </a>
        <ul class="site-menu-sub">
            <li
                class="site-menu-item open <?= ($url_aktive == "controltabledep" && $_GET['dept'] == 1)? "active": ""; ?>">
                <a class="animsition-link" href="controltabledep.php?dept=1">
                    <span class="site-menu-title">Body Plant 1</span>
                </a>
            </li>
            <li class="site-menu-item <?= ($url_aktive == "controltabledep" && $_GET['dept']==2)? "active": ""; ?>">
                <a class="animsition-link" href="controltabledep.php?dept=2">
                    <span class="site-menu-title">Body Plant 2</span>
                </a>
            </li>
            <li class="site-menu-item <?= ($url_aktive == "controltabledep" && $_GET['dept']==3)? "active": ""; ?>">
                <a class="animsition-link" href="controltabledep.php?dept=3">
                    <span class="site-menu-title">BQC</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="site-menu-item has-sub <?= ($url_aktive == "Tracking")? "active": ""; ?>">
        <a href="searchdoc2.php">
            <i class="site-menu-icon wb-shopping-cart" aria-hidden="true"></i>
            <span class="site-menu-title">TRACKING DOCUMENT</span>
            <span class="site-menu-tittle"></span>
        </a>
    <li class="site-menu-item has-sub open <?= (in_array($url_aktive , ["budgetdep"]) )? "active": ""; ?>">
        <a href="javascript:void(0)">
            <i class="site-menu-icon fa-database" aria-hidden="true"></i>
            <span class="site-menu-title">BUDGET</span>
            <span class="site-menu-arrow"></span>
        </a>
        <ul class="site-menu-sub">
            <li class="site-menu-item open <?= ($url_aktive == "budgetdep" && $_GET['dep']== 1)? "active": ""; ?>"">
                <a class=" animsition-link <?= $tombol_hidup ?>" href="budgetdep.php?dep=1">
                <span class="site-menu-title">Body Plant 1</span>
                </a>
            </li>
            <li class="site-menu-item <?= ($url_aktive == "budgetdep" && $_GET['dep']== 2)? "active": ""; ?>"">
                <a class=" animsition-link <?= $tombol_hidup ?>" href="budgetdep.php?dep=2">
                <span class="site-menu-title">Body Plant 2</span>
                </a>
            </li>
            <li class="site-menu-item <?= ($url_aktive == "budgetdep" && $_GET['dep']== 3)? "active": ""; ?>">
                <a class=" animsition-link <?= $tombol_hidup ?>" href="budgetdep.php?dep=3">
                    <span class="site-menu-title">BQC</span>
                </a>
            </li>
        </ul>
    </li>
    </li>
    <li class="site-menu-item has-sub <?= ($url_aktive == "MATERIAL")? "active": ""; ?>">
        <a href="dashboard.php" class="animsition-link">
            <i class="site-menu-icon wb-list-bulleted" aria-hidden="true"></i>
            <span class="site-menu-title">MASTER MATERIAL</span>
        </a>
    </li>
    <?php if( $_SESSION['yics_level'] != "1"){ ?>
    <li
        class="site-menu-item has-sub open <?= (in_array($url_aktive, ["usersetting","categorysetting","fiscalsetting","kurs_matauang"] ))? "active": ""; ?>">
        <a href="javascript:void(0)">
            <i class="site-menu-icon wb-user" aria-hidden="true"></i>
            <span class="site-menu-title">ADMINISTRATOR</span>
            <span class="site-menu-arrow"></span>
        </a>
        <ul class="site-menu-sub">
            <li class="site-menu-item <?= ($url_aktive == "usersetting")? "active": ""; ?>">
                <a class="animsition-link" href="usersetting.php">
                    <span class="site-menu-title">User Setting</span>
                </a>
            </li>
            <li class="site-menu-item <?= ($url_aktive == "categorysetting")? "active": ""; ?>">
                <a class="animsition-link" href="categorysetting.php">
                    <span class="site-menu-title">Category Setting</span>
                </a>
            </li>
            <li class="site-menu-item <?= ($url_aktive == "fiscalsetting")? "active": ""; ?>">
                <a class="animsition-link" href="fiscalsetting.php">
                    <span class="site-menu-title">Time Fiscal Setting</span>
                </a>
            </li>

            <li class="site-menu-item <?= ($url_aktive == "kurs_matauang")? "active": ""; ?>">
                <a class="animsition-link" href="kurs_matauang.php">
                    <span class="site-menu-title">Kurs Mata Uang Asing</span>
                </a>
            </li>

        </ul>
    </li>
    <?php } ?>
</ul>