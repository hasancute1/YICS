<?php 
include("../../config/config.php");
include("../functions.php");
include("../services/notifications.php");

$id_fis = $_GET['periode'];

     echo "<option value=''>Pilih Department</option>"; 
	
	$list_depart = "SELECT 
	plan_proposal.id_fis AS id_fis,
	plan_proposal.id_dep AS id_dep,
	depart.depart AS depart
	FROM tracking_ia 
	JOIN  ia on tracking_ia.id_ia = ia.id_ia
    JOIN plan_proposal on ia.id_prop = plan_proposal.id_prop
	JOIN depart ON plan_proposal.id_dep = depart.id_dep
	JOIN time_fiscal ON plan_proposal.id_fis = time_fiscal.id_fis
	WHERE plan_proposal.id_fis= {$id_fis}
	GROUP BY id_dep	
	ORDER BY depart ASC
";
$kategori = query($list_depart);
foreach ($kategori as $key => $row) { 
	
		echo "<option value='" . $row['id_dep'] . "'>" . $row['depart'] . "</option>";
	}






?>