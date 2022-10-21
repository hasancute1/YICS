<?php 
include("../../config/config.php");

if (isset ($_SESSION['yics_user'])){
   if(isset($_POST['ubah'])){
        // masukan data post ke variabel 
      $id_matauang=$_POST['id_matauang'];
      $yen=str_replace(",", "",$_POST['yen']);;
      $dollar=str_replace(",", "",$_POST['dollar']);
       $UbahKurs = "UPDATE konversi_matauang SET id_matauang='$id_matauang',yen ='$yen',dollar ='$dollar' WHERE id_matauang = '$id_matauang'"; 
      //  echo $UbahKurs;
       $sql = mysqli_query($link_yics, $UbahKurs)or die(mysqli_error($link_yics));
    // logika pakai session
       if(mysqli_num_rows($sql)>0){
        // echo "tes1";kategori_proposal
         $_SESSION['info'] = "Gagal Diubah";
         $_SESSION['pesan'] = "Data User Sudah Ada di Database";
         header('location: ../../page/kurs_matauang.php');
       }else{
         $_SESSION['info'] = "Diubah";
         $_SESSION['pesan'] = "Data Berhasil Diubah";
         header('location: ../../page/kurs_matauang.php');
        }
      }   
}else {
   header("location: ../../index.php");
 }