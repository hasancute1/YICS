<?php 
include("../../config/config.php");
include("../functions.php");
include("../services/notifications.php");

	
echo "<option value=''>Pilih Periode</option>";
 
$list_periode = query("SELECT time_fiscal.id_fis , periode FROM tracking_ia
JOIN  ia on tracking_ia.id_ia = ia.id_ia
JOIN proposal on ia.id_prop = proposal.id_prop
JOIN time_fiscal on proposal.id_fis  = time_fiscal.id_fis
GROUP BY proposal.id_fis  ");	


 foreach ($list_periode as $key => $row) { 
	
		echo "<option value='" . $row['id_fis'] . "'>" . $row['periode'] . "</option>";
		
	 }
		
 ?>