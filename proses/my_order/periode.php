<?php 
include("../../config/config.php");
include("../functions.php");
include("../services/notifications.php");

echo "<option value=''>Pilih Periode</option>";
$list_periode = query("SELECT * FROM time_fiscal");




 foreach ($list_periode as $key => $row) { 
	
		echo "<option value='" . $row['id_fis'] . "' >" . $row['periode'] . "</option>";
		
	 }
		
 ?>