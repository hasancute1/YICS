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
$cost_ia = str_replace('.' , '' , $cost_ia);
$time_ia = $_POST['time_ia'];

$pic_ia = $_POST['pic_ia'];
$GLOBALS['id_prop'];
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

    }else if(isset($_GET['del'])){
    $id=$_GET['del'];
    $id_page=$_GET['page'];
    $query = "DELETE FROM ia WHERE id_ia='$id'";
    $hasil_query = mysqli_query($link_yics, $query)or die(mysqli_error($link_yics));
    if($hasil_query){
        $_SESSION['info'] = "Dihapus";
        $_SESSION['pesan'] = "Data Berhasil Dihapus";
        header('location: ../../page/formnambah_ia.php?add='.$id_page);
     }else{
        $_SESSION['info'] = "Gagal Dihapus";
        $_SESSION['pesan'] = "Data Gagal Dihapus";
        header('location: ../../page/formnambah_ia.php?add='.$id_page);
     }
    }else if (isset($_POST['ubah'])){
        //masukan data ke variabel
        $id_prop = $_POST['id_prop'];
        $id_dept = $_POST['id_dept'];
        $ia = $_POST['ia'];
        $id_ia = $_POST['id_ia'];
        $ia_desc = $_POST['ia_deskripsi'];
        $pic_ia = $_POST['pic_ia'];
        $time_ia = $_POST['time_ia'];
        $cost_ia = $_POST['cost_ia'];
        $cost_ia = str_replace('.' , '' , $cost_ia);

    $UbahIa = "UPDATE ia SET id_prop='$id_prop',ia ='$ia',id_ia ='$id_ia',deskripsi ='$ia_desc',pic_ia ='$pic_ia',time_ia ='$time_ia',cost_ia ='$cost_ia' WHERE id_ia = '$id_ia'"; 
       $sql = mysqli_query($link_yics, $UbahIa)or die(mysqli_error($link_yics));
 // logika pakai session
 if(mysqli_num_rows($sql)>0){
    // echo "tes1";kategori_proposal
   
     $_SESSION['info'] = "Gagal Diubah";
     $_SESSION['pesan'] = "Data User Sudah Ada di Database";
     header('location: ../../page/formnambah_ia.php?add='.$id_prop);
   }else{
     $_SESSION['info'] = "Diubah";
     $_SESSION['pesan'] = "Data Berhasil Diubah";
     header('location: ../../page/formnambah_ia.php?add='.$id_prop);
    }
}
}