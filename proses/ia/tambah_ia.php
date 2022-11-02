<?php 

include("../../config/config.php");
include("../functions.php");
include("../services/notifications.php");


$id_prop = $_POST['id_prop'];
$ia = $_POST['ia'];
$ia_desc = $_POST['ia_desc'];
$cost_ia = $_POST['cost_ia'];


mysqli_query($link_yics,"INSERT INTO ia 
                 (`id_prop`,`ia`,`deskripsi`,`cost_ia`) 
          VALUES ('$id_prop','$ia','$ia_desc','$cost_ia')");


echo json_encode("Ia telah berhasil ditambahkan");

