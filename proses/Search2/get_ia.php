<?php 
include("../../config/config.php");
include("../functions.php");
include("../services/notifications.php");


/**
 * 1. ambil list plan_proposal 
 * 2. ambil list ia
 */


$id_prop =  $_GET['proposal'];
echo "<option value=''>Pilih NO IA.</option>";
if($id_prop != 0){
    $where_prop = "AND ia.id_prop = {$id_prop}";
}else{
    $where_prop = "";
}


$list_ia = query("SELECT * FROM ia
              JOIN plan_proposal on ia.id_prop = plan_proposal.id_prop
              where ia.id_prop = {$id_prop}
");





foreach($list_ia as $row){
    echo "<option value='" . $row['id_ia'] . "'>" . $row['ia'] . "</option>";
    
 }