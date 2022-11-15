<?php 
include("../../config/config.php");
include("../functions.php");
include("../services/notifications.php");

	
     echo "<option value=''>Pilih Department</option>";
 
	$query = "SELECT depart.* FROM tracking_ia 
	JOIN  ia on tracking_ia.id_ia = ia.id_ia
    JOIN proposal on ia.id_prop = proposal.id_prop
	JOIN depart ON proposal.id_dep = depart.id_dep
	GROUP BY id_dep	
	ORDER BY depart ASC";


	$dewan1 = $link_yics->prepare($query);
	$dewan1->execute();
	$res1 = $dewan1->get_result();
	while ($row = $res1->fetch_assoc()) {
		echo "<option value='" . $row['id_dep'] . "'>" . $row['depart'] . "</option>";
	}






?>