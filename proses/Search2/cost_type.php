<?php 
include("../../config/config.php");
include("../functions.php");
include("../services/notifications.php");

	$id_fis = $_GET['periode'];
	$depart = $_GET['depart'];
	$id_area = $_GET['area'];
     echo "<option value=''>Pilih Category</option>";
 
	 $query = "SELECT 
	 			kategori_proposal.kategori AS kategori,
	 			kategori_proposal.id_kat AS id_ket,
				plan_proposal.id_fis AS id_fis,
	 			depart.id_dep AS id_dep,
				 area.id_area AS id_area,
				area.area AS area
	 			FROM tracking_ia 
				JOIN ia ON ia.id_ia = tracking_ia.id_ia
				JOIN plan_proposal ON plan_proposal.id_prop = ia.id_prop
				join area on area.id_area = plan_proposal.id_area
    			join depart on area.id_dep = depart.id_dep
				JOIN kategori_proposal ON kategori_proposal.id_kat = plan_proposal.id_kat			
				JOIN time_fiscal ON plan_proposal.id_fis = time_fiscal.id_fis		
	 			WHERE depart.id_dep={$depart} AND plan_proposal.id_fis= {$id_fis} AND area.id_area= {$id_area}
				GROUP BY id_ket
				ORDER BY kategori ASC";

	//  $dewan1 = $link_yics->prepare($query);
	//  $dewan1->bind_param("i", $depart);
	//  $$kategori = query($query);dewan1->execute();

	 $kategori = query($query);
	 foreach($kategori as $row){
		echo "<option value='" . $row['id_ket'] . "'>" . $row['kategori'] . "</option>";
		
	 }

	
 ?>