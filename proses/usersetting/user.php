<?php 
include("../../config/config.php");

if (isset ($_SESSION['yics_user'])){
    if(isset($_POST['add'])){
         // masukan data post ke variabel 
        $nama=$_POST['nama'];
        $user=$_POST ['user'];
        $area=$_POST ['area'];
        $role=$_POST ['role'];
        $password=SHA1($_POST ['password']);

        // cek username sudah ada apa blm?
        $qry = mysqli_query($link_yics, "SELECT username FROM data_user WHERE username = '$user' ")or die(mysqli_error($link_yics));
      
    // logika pakai session
        if(mysqli_num_rows($qry)>0){
            $_SESSION['info'] = "Gagal Disimpan";
            $_SESSION['pesan'] = "Data User Sudah Ada di Database";
            header('location: ../../page/usersetting.php');
        }else{
            $_SESSION['info'] = "Disimpan";
            $_SESSION['pesan'] = "Data Berhasil Disimpan";
            header('location: ../../page/usersetting.php');
         }
         $inputUser = "INSERT INTO data_user (`nama`,`username`,`area`,`pass`, `id_level`) VALUES ('$nama','$user','$area','$password','$role')"; 
         $sql = mysqli_query($link_yics, $inputUser)or die(mysqli_error($link_yics));
    // end logika pakai session
    // query insert boleh ngacak sesuai intonya
            
        
    }else if(isset ($_GET['del'])){
        //query delete
        $user=$_GET['del'];
        $query = "DELETE FROM data_user WHERE username='$user'";
         $hasil_query = mysqli_query($link_yics, $query)or die(mysqli_error($link_yics));
         if($hasil_query){
            $_SESSION['info'] = "Dihapus";
            $_SESSION['pesan'] = "Data Berhasil Dihapus";
            header('location: ../../page/usersetting.php');
         }else{
            $_SESSION['info'] = "Gagal Dihapus";
            $_SESSION['pesan'] = "Data Gagal Dihapus";
            header('location: ../../page/usersetting.php');
         }
    }else if (isset($_POST['ubah'])){
        // masukan data post ke variabel 
       $nama=$_POST ['nama'];
       $user=$_POST ['user'];
       $area=$_POST ['area'];
       $role=$_POST ['role'];
       $password=SHA1($_POST ['password']);
       $UbahUser = "UPDATE data_user SET nama='$nama',username='$user',area='$area',pass='$password',id_level='$role' WHERE username = '$user'"; 
       echo $UbahUser;
       $sql = mysqli_query($link_yics, $UbahUser)or die(mysqli_error($link_yics));
    // logika pakai session
       if(mysqli_num_rows($sql)>0){
        // echo "tes1";
         $_SESSION['info'] = "Gagal Diubah";
         $_SESSION['pesan'] = "Data User Sudah Ada di Database";
         header('location: ../../page/usersetting.php');
       }else{
         $_SESSION['info'] = "Diubah";
         $_SESSION['pesan'] = "Data Berhasil Diubah";
         header('location: ../../page/usersetting.php');
        }
      }else if (isset($_POST['reset'])){
         // masukan data post ke variabel 
        $password=SHA1($_POST ['password']);
        $resetPassword = "UPDATE data_user SET pass='$password'"; 
        echo $UbahUser;
        $reset = mysqli_query($link_yics, $resetPassword)or die(mysqli_error($link_yics));
     // logika pakai session
        if(mysqli_num_rows($reset)>0){
         // echo "tes1";
          $_SESSION['info'] = "Gagal Diubah";
          $_SESSION['pesan'] = "Data User Sudah Ada di Database";
          header('location: ../../page/usersetting.php');
        }else{
          $_SESSION['info'] = "Diubah";
          $_SESSION['pesan'] = "Data Berhasil Diubah";
          header('location: ../../page/usersetting.php');
         }
      }else if(isset ($_GET['proses'])){
      
         foreach($_POST['check']as $username){
            $deleteAll = "DELETE FROM data_user WHERE username='$username'";    
            $hasil_delete = mysqli_query($link_yics, $deleteAll)or die(mysqli_error($link_yics));
            } 
            if($hasil_delete){
               $_SESSION['info'] = "Dihapus";
               $_SESSION['pesan'] = "Data Berhasil Dihapus";
               header('location: ../../page/usersetting.php');
            }else{ 
               $_SESSION['info'] = "Gagal Dihapus";
               $_SESSION['pesan'] = "Data Gagal Dihapus";
               header('location: ../../page/usersetting.php');
         } 
    }     
}else {
   header("location: ../../index.php");
 }