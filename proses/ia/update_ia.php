<?php 
include("../../config/config.php");
include("../functions.php");
include("../services/notifications.php");

if (isset ($_SESSION['yics_user'])){
    if (isset($_POST['ubah'])){
        //masukan data ke variabel
        $id_prop = $_POST['id_prop'];
        $id_dept = $_POST['id_dept'];
        $ia = $_POST['ia'];
        $id_ia = $_POST['id_ia'];
        $ia_desc = $_POST['ia_deskripsi'];
        $pic_ia = $_POST['pic_ia'];
        $time_ia = $_POST['time_ia'];
        $cost_ia = $_POST['cost_ia'];
        $cost_ia = str_replace(',' , '.' , $cost_ia);

    $UbahIa = "UPDATE ia SET id_prop='$id_prop',ia ='$ia',id_ia ='$id_ia',deskripsi ='$ia_desc',pic_ia ='$pic_ia',time_ia ='$time_ia',cost_ia ='$cost_ia' WHERE id_ia = '$id_ia'"; 
       $sql = mysqli_query($link_yics, $UbahIa)or die(mysqli_error($link_yics));
 // logika pakai session
 if(mysqli_num_rows($sql)>0){
    // echo "tes1";kategori_proposal
   
     $_SESSION['info'] = "Gagal Diubah";
     $_SESSION['pesan'] = "Data User Sudah Ada di Database";
     header('location: ../../page/controltabledep.php?dept='.$id_dept);
   }else{
     $_SESSION['info'] = "Diubah";
     $_SESSION['pesan'] = "Data Berhasil Diubah";
     header('location: ../../page/controltabledep.php?dept='.$id_dept);
    }
}
}