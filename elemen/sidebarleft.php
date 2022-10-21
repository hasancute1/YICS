<?php 

$uri = $_SERVER['REQUEST_URI'];
$uri = explode('/', $uri);
$uri = explode('.php' , $uri[3]);
$url_aktive = $uri[0];

?>
<ul class="site-menu" data-plugin="menu">
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
            <li class="site-menu-item open <?= ($url_aktive == "controltabledep" && $_GET['dept'] == 1)? "active": ""; ?>">
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
        <a href="Tracking.php">
            <i class="site-menu-icon wb-shopping-cart" aria-hidden="true"></i>
            <span class="site-menu-title">TRACKING DOCUMENT</span>
            <span class="site-menu-tittle"></span>
        </a>
    <li class="site-menu-item has-sub <?= ($url_aktive == "budgetdep1")? "active": ""; ?>">
        <a href="javascript:void(0)">
            <i class="site-menu-icon fa-database" aria-hidden="true"></i>
            <span class="site-menu-title">BUDGET</span>
            <span class="site-menu-arrow"></span>
        </a>
        <ul class="site-menu-sub">
            <li class="site-menu-item <?= ($url_aktive == "budgetdep1")? "active": ""; ?>"">
                <a class="animsition-link" href="budgetdep1.php">
                    <span class="site-menu-title">Body Plant 1</span>
                </a>
            </li>
            <li class="site-menu-item <?= ($url_aktive == "budgetdep2")? "active": ""; ?>"">
                <a class="animsition-link" href="budgetdep2.php">
                    <span class="site-menu-title">Body Plant 2</span>
                </a>
            </li>
            <li class="site-menu-item <?= ($url_aktive == "budgetdep3")? "active": ""; ?>"">
                <a class="animsition-link" href="budgetdep3.php">
                    <span class="site-menu-title">BQC</span>
                </a>
            </li>
        </ul>
    </li>
    </li>
    <li class="site-menu-item has-sub">
        <a href="javascript:void(0)">
            <i class="site-menu-icon wb-user" aria-hidden="true"></i>
            <span class="site-menu-title">ADMINISTRATOR</span>
            <span class="site-menu-arrow"></span>
        </a>
        <ul class="site-menu-sub">
            <li class="site-menu-item">
                <a class="animsition-link" href="usersetting.php">
                    <span class="site-menu-title">User Setting</span>
                </a>
            </li>
            <li class="site-menu-item">
                <a class="animsition-link" href="categorysetting.php">
                    <span class="site-menu-title">Category Setting</span>
                </a>
            </li>
            <li class="site-menu-item">
                <a class="animsition-link" href="fiscalsetting.php">
                    <span class="site-menu-title">Time Fiscal Setting</span>
                </a>
            </li>
        </ul>
    </li>
</ul>