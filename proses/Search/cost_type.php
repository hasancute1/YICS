<?php 
include("../../config/config.php");
include("../functions.php");
include("../services/notifications.php");

	$depart = $_POST['depart'];
     echo "<option value=''>Pilih Cost Type</option>";
 
	 $query = "SELECT 
	 			kategori.kategori_proposal AS kategori,
	 			id_ket.kategori_proposal AS id_ket,
	 			depart.id_dep AS id_dep
	 			FROM tracking_ia 
				JOIN kategori_proposal ON kategori_proposal.id_ket = proposal.id_ket
				JOIN proposal ON proposal.id_prop = ia.id_prop
				JOIN ia ON ia.id_ia = tracking_ia.id_ia
				JOIN depart ON depart.id_dep = proposal.id_dep
	 			WHERE id_dep=? 
				ORDER BY kategori ASC";
	 $dewan1 = $link_yics->prepare($query);
	 $dewan1->bind_param("i", $depart);
	 $dewan1->execute();
	 $res1 = $dewan1->get_result();
	 while ($row = $res1->fetch_assoc()) {
		 echo "<option value='" . $row[' id_ket'] . "'>" . $row['kategori'] . "</option>";
	 }
 ?>






?>