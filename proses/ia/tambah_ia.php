<?php 
include("../../config/config.php");
include("../functions.php");
include("../services/notifications.php");

if (isset ($_SESSION['yics_user'])){
    if(isset($_POST['add'])){ 

$id_prop = $_POST['id_prop'];
$ia = $_POST['ia'];
$ia_desc = $_POST['ia_desc'];
$cost_ia = $_POST['cost_ia'];
$cost_ia = str_replace(',' , '' , $cost_ia);
$time_ia = $_POST['time_ia'];
$pic_ia = $_POST['pic_ia'];


// cek username sudah ada apa blm?
$qry = mysqli_query($link_yics, "SELECT ia FROM ia WHERE ia = '$ia' ")or die(mysqli_error($link_yics));
      
// logika pakai session
    if(mysqli_num_rows($qry)>0){
        $_SESSION['info'] = "Gagal Disimpan";
        $_SESSION['pesan'] = "Data User Sudah Ada di Database";
        header('location: ../../page/formnambah_ia.php?add='.$id_prop);
    }else{
        $_SESSION['info'] = "Disimpan";
        $_SESSION['pesan'] = "Data Berhasil Disimpan";
        header('location: ../../page/formnambah_ia.php?add='.$id_prop);
    }

          $inputproposal = "INSERT INTO ia (`id_prop`,`ia`,`deskripsi`,`cost_ia`,`time_ia`,`pic_ia`) VALUES ('$id_prop','$ia','$ia_desc','$cost_ia','$time_ia','$pic_ia')"; 
          $sql = mysqli_query($link_yics, $inputproposal)or die(mysqli_error($link_yics));

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