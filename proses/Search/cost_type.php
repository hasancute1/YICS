<?php 
include("../../config/config.php");
include("../functions.php");
include("../services/notifications.php");

	$depart = $_POST['depart'];
     echo "<option value=''>Pilih Cost Type</option>";
 
	 $query = "SELECT 
	 			kategori_proposal.kategori AS kategori,
	 			kategori_proposal.id_kat AS id_ket,
	 			proposal.id_dep AS id_dep
	 			FROM tracking_ia 
				JOIN ia ON ia.id_ia = tracking_ia.id_ia
				JOIN proposal ON proposal.id_prop = ia.id_prop
				JOIN kategori_proposal ON kategori_proposal.id_kat = proposal.id_kat				
						
	 			WHERE proposal.id_dep={$depart}
				GROUP BY id_ket
				ORDER BY kategori ASC";

	//  $dewan1 = $link_yics->prepare($query);
	//  $dewan1->bind_param("i", $depart);
	//  $dewan1->execute();

	 $kategori = query($query);
	 foreach($kategori as $row){
		echo "<option value='" . $row['id_ket'] . "'>" . $row['kategori'] . "</option>";
		
	 }

	
 ?>


