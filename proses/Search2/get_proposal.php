<?php 
include("../../config/config.php");
include("../functions.php");
include("../services/notifications.php");


/**
 * 1. ambil list proposal 
 * 2. ambil list ia
 */

$id_fis = $_GET['periode'];
$id_area = $_GET['area'];
$id_kat =  $_GET['cost_type'];
echo "<option value=''>Pilih Proposal</option>";

// $data = query("SELECT * FROM ia
//               JOIN proposal on ia.id_prop = proposal.id_prop
//               where id_fis = {$id_fis} AND
//                     id_dep = {$id_dep} AND
//                     id_kat = {$id_kat}
// ");

$list_proposal = query("SELECT * FROM plan_proposal              
                WHERE id_fis = {$id_fis} AND
                   
                    id_kat = {$id_kat}
");

$list = "SELECT *	
	FROM tracking_ia 
	JOIN  ia on tracking_ia.id_ia = ia.id_ia
    JOIN plan_proposal on ia.id_prop = plan_proposal.id_prop
    join area on area.id_area = plan_proposal.id_area
    join depart on area.id_dep = depart.id_dep
	JOIN time_fiscal ON plan_proposal.id_fis = time_fiscal.id_fis
	WHERE plan_proposal.id_fis= {$id_fis} AND area.id_area = {$id_area}
	GROUP BY plan_proposal.id_prop
";

$list_proposal = query($list);

foreach($list_proposal as $row){
    echo "<option value='" . $row['id_prop'] . "'>" . $row['proposal'] . "</option>";
    
 }