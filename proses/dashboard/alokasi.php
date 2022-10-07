<?php 
include("../../config/config.php");

if (isset ($_SESSION['yics_user'])){
    if(isset($_POST['add'])){
         // masukan data post ke variabel 
         $totalData=$_POST['totalData'];
         $id_fis=$_POST['id_fis'];
         $cekid = mysqli_query($link_yics, "SELECT id_fis FROM budget WHERE id_fis = '$id_fis' ")or die(mysqli_error($link_yics)); 
         if(mysqli_num_rows($cekid)>0){
            // $inputFiscal = "UPDATE budget SET id_fis=$id_fis,id_dept ='$id',budget ='$budget' where id_fis=$id_fis "; 
            // $inputFiscal = "UPDATE budget SET "; 
            for($index = 1 ; $index <= $totalData ; $index++){
               $budget=$_POST['budget'.$index];
               $id=$_POST['id_dept'.$index];
               $id_bud=$_POST['id_bud'.$index];
               $inputFiscal = "UPDATE budget SET id_fis='$id_fis',id_dep ='$id',budget ='$budget' WHERE id_bud='$id_bud' "; 
               $sql = mysqli_query($link_yics, $inputFiscal)or die(mysqli_error($link_yics));}
            }           
         else{
            $inputFiscal = "INSERT INTO budget (`id_fis`,`id_dep`,`budget`) VALUES "; 
            for($index = 1 ; $index <= $totalData ; $index++){
            $budget=$_POST['budget'.$index];    
            $id=$_POST['id_dept'.$index];  
            $inputFiscal .= "('$id_fis','$id','$budget'),";
         }
         $inputFiscal=substr($inputFiscal,0,-1);
         $sql = mysqli_query($link_yics, $inputFiscal)or die(mysqli_error($link_yics));

         }
         

        // cek username sudah ada apa blm?
      
   //  logika pakai session
        if($sql){
         $_SESSION['info'] = "Disimpan";
         $_SESSION['pesan'] = "Data Berhasil Disimpan";
         header('location: ../../page/dashboard.php');
        }else{
         $_SESSION['info'] = "Gagal Disimpan";
         $_SESSION['pesan'] = "Data User Sudah Ada di Database";
         header('location: ../../page/dashboard.php');
            
         }
         
        
    // end logika pakai session
    // query insert boleh ngacak sesuai intonya
            
        
    }else if(isset ($_GET['del'])){
        //query delete
        $id=$_GET['del'];
        $query = "DELETE FROM budget WHERE id_fis='$id'";
         $hasil_query = mysqli_query($link_yics, $query)or die(mysqli_error($link_yics));
         if($hasil_query){
            $_SESSION['info'] = "Dihapus";
            $_SESSION['pesan'] = "Data Berhasil Dihapus";
            header('location: ../../page/dashboard.php');
         }else{
            $_SESSION['info'] = "Gagal Dihapus";
            $_SESSION['pesan'] = "Data Gagal Dihapus";
            header('location: ../../page/dashboard.php');
         }
    }else if (isset($_POST['ubah'])){
        // masukan data post ke variabel 
        $totalData=$_POST['totalData'];
        $id_fis=$_POST['id_fis'];
        $cekid = mysqli_query($link_yics, "SELECT id_fis FROM budget WHERE id_fis = '$id_fis' ")or die(mysqli_error($link_yics)); 
        if(mysqli_num_rows($cekid)>0){
           // $inputFiscal = "UPDATE budget SET id_fis=$id_fis,id_dept ='$id',budget ='$budget' where id_fis=$id_fis "; 
           // $inputFiscal = "UPDATE budget SET "; 
           for($index = 1 ; $index <= $totalData ; $index++){
              $budget=$_POST['budget'.$index];
              $id=$_POST['id_dept'.$index];
              $id_bud=$_POST['id_bud'.$index];
              $inputFiscal = "UPDATE budget SET id_fis='$id_fis',id_dep ='$id',budget ='$budget' where id_bud='$id_bud' "; 
              $sql = mysqli_query($link_yics, $inputFiscal)or die(mysqli_error($link_yics));}
           }    
    // logika pakai session
       if(mysqli_num_rows($sql)>0){
        // echo "tes1";kategori_proposal
         $_SESSION['info'] = "Gagal Diubah";
         $_SESSION['pesan'] = "Data User Sudah Ada di Database";
         header('location: ../../page/dashboard.php');
       }else{
         $_SESSION['info'] = "Diubah";
         $_SESSION['pesan'] = "Data Berhasil Diubah";
         header('location: ../../page/dashboard.php');
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
   }     
   else {
   header("location: ../../index.php");
 }