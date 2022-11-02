<?php 

include("../../config/config.php");
include("../functions.php");
include("../services/notifications.php");


$id_prop = $_POST['id_prop'];
$ia = $_POST['ia'];
$ia_desc = $_POST['ia_desc'];
$cost_ia = $_POST['cost_ia'];


$insert_query = mysqli_query($link_yics,"INSERT INTO ia 
                 (`id_prop`,`ia`,`deskripsi`,`cost_ia`) 
          VALUES ('$id_prop','$ia','$ia_desc','$cost_ia')");


if($insert_query){

    $status = "sukses";
}else{
    $status = "Data Gagal Ditambahkan";
}


echo json_encode([
    'status' => $status
]);

