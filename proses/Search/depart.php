<?php 
include("../../config/config.php");
include("../functions.php");
include("../services/notifications.php");

	
     echo "<option value=''>Pilih Department</option>";
 
	$query = "SELECT * FROM depart ORDER BY depart ASC";
	$dewan1 = $link_yics->prepare($query);
	$dewan1->execute();
	$res1 = $dewan1->get_result();
	while ($row = $res1->fetch_assoc()) {
		echo "<option value='" . $row['id_dep'] . "'>" . $row['depart'] . "</option>";
	}






?>