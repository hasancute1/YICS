<?php 
include("../../config/config.php");

if (isset ($_SESSION['yics_user'])){
    if(isset($_POST['add'])){
         // masukan data post ke variabel 
        $kategori=$_POST['kategori'];
        $id=$_POST ['id_kat'];
       

        // cek username sudah ada apa blm?
        $qry = mysqli_query($link_yics, "SELECT id_kat FROM kategori_proposal WHERE id_kat = '$id' ")or die(mysqli_error($link_yics));
      
    // logika pakai session
        if(mysqli_num_rows($qry)>0){
            $_SESSION['info'] = "Gagal Disimpan";
            $_SESSION['pesan'] = "Data User Sudah Ada di Database";
            header('location: ../../page/categorysetting.php');
        }else{
            $_SESSION['info'] = "Disimpan";
            $_SESSION['pesan'] = "Data Berhasil Disimpan";
            header('location: ../../page/categorysetting.php');
         }
         $inputKategori = "INSERT INTO kategori_proposal (`kategori`,`id_kat`) VALUES ('$kategori','$id')"; 
         $sql = mysqli_query($link_yics, $inputKategori)or die(mysqli_error($link_yics));
    // end logika pakai session
    // query insert boleh ngacak sesuai intonya
            
        
    }else if(isset ($_GET['del'])){
        //query delete
        $id=$_GET['del'];
        $query = "DELETE FROM kategori_proposal WHERE id_kat='$id'";
         $hasil_query = mysqli_query($link_yics, $query)or die(mysqli_error($link_yics));
         if($hasil_query){
            $_SESSION['info'] = "Dihapus";
            $_SESSION['pesan'] = "Data Berhasil Dihapus";
            header('location: ../../page/categorysetting.php');
         }else{
            $_SESSION['info'] = "Gagal Dihapus";
            $_SESSION['pesan'] = "Data Gagal Dihapus";
            header('location: ../../page/categorysetting.php');
         }
    }else if (isset($_POST['ubah'])){
        // masukan data post ke variabel 
        $kategori=$_POST['kategori'];
        $id=$_POST ['id_kat'];
       $UbahKategory = "UPDATE  kategori_proposal SET kategori='$kategori',id_kat='$id'WHERE id_kat = '$id'"; 
       echo $UbahKategory;
       $sql = mysqli_query($link_yics, $UbahKategory)or die(mysqli_error($link_yics));
    // logika pakai session
       if(mysqli_num_rows($sql)>0){
        // echo "tes1";kategori_proposal
         $_SESSION['info'] = "Gagal Diubah";
         $_SESSION['pesan'] = "Data User Sudah Ada di Database";
         header('location: ../../page/categorysetting.php');
       }else{
         $_SESSION['info'] = "Diubah";
         $_SESSION['pesan'] = "Data Berhasil Diubah";
         header('location: ../../page/categorysetting.php');
        }
      }else if(isset ($_GET['proses'])){
      // print_r($_POST['check']);
         foreach($_POST['check']as $id){
            $deleteAll = "DELETE FROM kategori_proposal WHERE id_kat='$id'";    
            $hasil_delete = mysqli_query($link_yics, $deleteAll)or die(mysqli_error($link_yics));
            } 
            if($hasil_delete){
               $_SESSION['info'] = "Dihapus";
               $_SESSION['pesan'] = "Data Berhasil Dihapus";
               header('location: ../../page/categorysetting.php');
            }else{ 
               $_SESSION['info'] = "Gagal Dihapus";
               $_SESSION['pesan'] = "Data Gagal Dihapus";
               header('location: ../../page/categorysetting.php');
         } 
    }     
}else {
   header("location: ../../index.php");
 }
