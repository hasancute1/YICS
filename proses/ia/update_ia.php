<?php 

include("../../config/config.php");
include("../functions.php");
include("../services/notifications.php");


$id_prop = $_POST['id_prop'];
$ia = $_POST['ia'];
$id_ia = $_POST['id_ia'];
$ia_desc = $_POST['ia_deskripsi'];
$cost_ia = $_POST['cost_ia'];
$cost_ia = str_replace(',' , '' , $cost_ia);


if( isset($_POST['submit']) ){

    // update data ia

    single_query("UPDATE ia SET ia='$ia' , deskripsi='$ia_desc' , cost_ia='$cost_ia' WHERE id_ia='$id_ia'");

    header('location: ../../page/formedit_ia.php?id_ia=' . $id_ia);

};