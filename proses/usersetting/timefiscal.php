<?php 
include("../../config/config.php");

if (isset ($_SESSION['yics_user'])){
    if(isset($_POST['add'])){
         // masukan data post ke variabel 
         $periode=$_POST['periode'];
         $awal=$_POST['awal'];
         $akhir=$_POST['akhir'];
         $status=$_POST['status'];   
        // cek username sudah ada apa blm?
        $qry = mysqli_query($link_yics, "SELECT awal FROM time_fiscal WHERE awal = '$awal' ")or die(mysqli_error($link_yics));
      
    // logika pakai session
        if(mysqli_num_rows($qry)>0){
            $_SESSION['info'] = "Gagal Disimpan";
            $_SESSION['pesan'] = "Data User Sudah Ada di Database";
            header('location: ../../page/fiscalsetting.php');
        }else{
            $_SESSION['info'] = "Disimpan";
            $_SESSION['pesan'] = "Data Berhasil Disimpan";
            header('location: ../../page/fiscalsetting.php');
         }
         $inputFiscal = "INSERT INTO time_fiscal (`periode`,`awal`,`akhir`,`status`) VALUES ('$periode','$awal','$akhir','$status')"; 
         $sql = mysqli_query($link_yics, $inputFiscal)or die(mysqli_error($link_yics));
    // end logika pakai session
    // query insert boleh ngacak sesuai intonya
            
        
    }else if(isset ($_GET['del'])){
        //query delete
        $id=$_GET['del'];
        $query = "DELETE FROM time_fiscal WHERE id_fis='$id'";
         $hasil_query = mysqli_query($link_yics, $query)or die(mysqli_error($link_yics));
         if($hasil_query){
            $_SESSION['info'] = "Dihapus";
            $_SESSION['pesan'] = "Data Berhasil Dihapus";
            header('location: ../../page/fiscalsetting.php');
         }else{
            $_SESSION['info'] = "Gagal Dihapus";
            $_SESSION['pesan'] = "Data Gagal Dihapus";
            header('location: ../../page/fiscalsetting.php');
         }
    }else if (isset($_POST['ubah'])){
        // masukan data post ke variabel 
      $id=$_POST['id'];
      $periode=$_POST['periode'];
      $awal=$_POST['awal'];
      $akhir=$_POST['akhir'];
      $status=$_POST['status'];     

       $UbahFiscal = "UPDATE time_fiscal SET periode=$periode,awal ='$awal',akhir ='$akhir',status ='$status' WHERE id_fis = '$id'"; 
       
       $sql = mysqli_query($link_yics, $UbahFiscal)or die(mysqli_error($link_yics));
    // logika pakai session
       if(mysqli_num_rows($sql)>0){
        // echo "tes1";kategori_proposal
         $_SESSION['info'] = "Gagal Diubah";
         $_SESSION['pesan'] = "Data User Sudah Ada di Database";
         header('location: ../../page/fiscalsetting.php');
       }else{
         $_SESSION['info'] = "Diubah";
         $_SESSION['pesan'] = "Data Berhasil Diubah";
         header('location: ../../page/fiscalsetting.php');
        }
      }else if(isset ($_GET['proses'])){
      // print_r($_POST['check']);
         foreach($_POST['check']as $id){
            $deleteAll = "DELETE FROM time_fiscal WHERE id_fis='$id'";    
            $hasil_delete = mysqli_query($link_yics, $deleteAll)or die(mysqli_error($link_yics));
            } 
            if($hasil_delete){
               $_SESSION['info'] = "Dihapus";
               $_SESSION['pesan'] = "Data Berhasil Dihapus";
               header('location: ../../page/fiscalsetting.php');
            }else{ 
               $_SESSION['info'] = "Gagal Dihapus";
               $_SESSION['pesan'] = "Data Gagal Dihapus";
               header('location: ../../page/fiscalsetting.php');
         } 
    }     
}else {
   header("location: ../../index.php");
 }