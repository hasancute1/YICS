<?php
include("../config/config.php");
if(isset($_POST["image"])){
	$data = $_POST["image"];

	$image_array_1 = explode(";", $data);

	$image_array_2 = explode(",", $image_array_1[1]);

	$data = base64_decode($image_array_2[1]);

	$imageName = '../global/portraits/' . $_SESSION['yics_user'] . '.png';
	if( is_file( $imageName));
         unlink( $imageName);

	file_put_contents($imageName, $data);

	echo $imageName;
	// $_SESSION['info'] = "Diubah";
	// $_SESSION['pesan'] = "Data Berhasil Diubah";
	// header('location: ../../page/profile.php');
 }

?>