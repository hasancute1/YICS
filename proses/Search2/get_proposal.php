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
echo "<option value=''>Pilih Proposal</option>";

// $data = query("SELECT * FROM ia
//               JOIN proposal on ia.id_prop = proposal.id_prop
//               where id_fis = {$id_fis} AND
//                     id_dep = {$id_dep} AND
//                     id_kat = {$id_kat}
// ");

$list_proposal = query("SELECT * FROM proposal              
                WHERE id_fis = {$id_fis} AND
                    id_dep = {$id_dep} AND
                    id_kat = {$id_kat}
");



foreach($list_proposal as $row){
    echo "<option value='" . $row['id_prop'] . "'>" . $row['proposal'] . "</option>";
    
 }