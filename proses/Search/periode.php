<?php 
include("../../config/config.php");
include("../functions.php");
include("../services/notifications.php");

	
echo "<option value=''>Pilih Periode</option>";
 
	 $query = "SELECT 	 			
	 			time_fiscal.periode AS periode
	 			time_fiscal.id_fis AS id_fis
	 			FROM tracking_ia 			
				JOIN proposal ON proposal.id_prop = ia.id_prop
				JOIN ia ON ia.id_ia = tracking_ia.id_ia
				JOIN depart ON depart.id_dep = proposal.id_dep
				JOIN time_fiscal ON proposal.id_fis = time_fiscal.id_fis"						
	 $dewan1 = $link_yics->prepare($query);	
	 $dewan1->execute();
	 $res1 = $dewan1->get_result();
	 while ($row = $res1->fetch_assoc()) {
		 echo "<option value='" . $row[' id_fis'] . "'>" . $row['periode'] . "</option>";
	 }
 ?>






?>