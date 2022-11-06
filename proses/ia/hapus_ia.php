<?php 
include("../../config/config.php");
include("../functions.php");
include("../services/notifications.php");

if (isset ($_SESSION['yics_user'])){
    if(isset($_GET['del'])AND($_GET['page'])){ 
$id=$_GET['del'];
$id_page=$_GET['page'];
$query = "DELETE FROM ia WHERE id_ia='$id'";
 $hasil_query = mysqli_query($link_yics, $query)or die(mysqli_error($link_yics));
 if($hasil_query){
    $_SESSION['info'] = "Dihapus";
    $_SESSION['pesan'] = "Data Berhasil Dihapus";
    header('location: ../../page/controltabledep.php?dept='.$id_page);
 }else{
    $_SESSION['info'] = "Gagal Dihapus";
    $_SESSION['pesan'] = "Data Gagal Dihapus";
    header('location: ../../page/controltabledep.php?dept='.$id_page);
 }
}
}
// if($insert_query){

// $status = "sukses";
// }else{
// $status = "Data Gagal Ditambahkan";
// }


// echo json_encode([
// 'status' => $status
// ]);