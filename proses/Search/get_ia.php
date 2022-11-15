<?php 
include("../../config/config.php");
include("../functions.php");
include("../services/notifications.php");


/**
 * 1. ambil list proposal 
 * 2. ambil list ia
 */

$id_fis = $_GET['periode'];
$id_dep = $_GET['depart'];
$id_kat =  $_GET['cost_type'];
$id_prop =  $_GET['proposal'];

if($id_prop != 0){
    $where_prop = "AND ia.id_prop = {$id_prop}";
}else{
    $where_prop = "";
}


$list_ia = query("SELECT * FROM ia
              JOIN proposal on ia.id_prop = proposal.id_prop
              where id_fis = {$id_fis} AND
                    id_dep = {$id_dep} AND
                    id_kat = {$id_kat} {$where_prop}
");



echo "<option value=''>Pilih IA</option>";

foreach($list_ia as $row){
    echo "<option value='" . $row['id_ia'] . "'>" . $row['ia'] . "</option>";
    
 }
