<?php 
include("../../config/config.php");

include("../services/notifications.php");

if (isset ($_SESSION['yics_user'])){
    if(isset($_POST['add'])){     
         // masukan data post ke variabel 
        $depart=$_POST['depart']; 
        $kategori=$_POST['kategori'];
        $proposal=$_POST ['proposal'];                              
        $id_matauang=$_POST ['mata_uang'];              

        $cost_request=$_POST ['cost'];
        $cost = str_replace('.','' ,$cost_request); 

        $id_fis=$_POST ['id_fis']; 
        $area =$_POST ['area'];

      
     
        // cek username sudah ada apa blm?
        $qry = mysqli_query($link_yics, "SELECT proposal FROM plan_proposal WHERE proposal = '$proposal' ")or die(mysqli_error($link_yics));
      
    // logika pakai session
        if(mysqli_num_rows($qry)>0){
            $_SESSION['info'] = "Gagal Disimpan";
            $_SESSION['pesan'] = "Data User Sudah Ada di Database";
            header('location: ../../page/forminputalokasibudget.php?input='.$id_fis);
        }else{
            $_SESSION['info'] = "Disimpan";
            $_SESSION['pesan'] = "Data Berhasil Disimpan";
            header('location: ../../page/forminputalokasibudget.php?input='.$id_fis);
         }
         $inputproposal = "INSERT INTO plan_proposal (`area`,`id_dep`,`id_kat`,`proposal`,`cost`,`id_fis`,`id_matauang`) VALUES ('$area','$depart','$kategori','$proposal','$cost','$id_fis','$id_matauang')"; 
         echo " $inputproposal ";
         $sql = mysqli_query($link_yics, $inputproposal)or die(mysqli_error($link_yics));


      

   // $input_notif = "INSERT INTO notifications (`username_admin`,`username_pic`,`type`,`id_type`,`status`,`message`) VALUES ('Admin','priana','proposal',1,'Pending','Pesan')"; 

   // mysqli_query($link_yics, $input_notif)or die(mysqli_error($link_yics));  

     
        
    }else if(isset ($_GET['del'])){
        //query delete
        $id=$_GET['del'];
        //query fiscal
        $id_page=$_GET['page'];
        
        //// end qery hapus di direktori
        $query = "DELETE FROM plan_proposal WHERE id_prop='$id'";
         $hasil_query = mysqli_query($link_yics, $query)or die(mysqli_error($link_yics));
         if($hasil_query){
            $_SESSION['info'] = "Dihapus";
            $_SESSION['pesan'] = "Data Berhasil Dihapus";
            header('location: ../../page/forminputalokasibudget.php?input='.$id_page);
         }else{
            $_SESSION['info'] = "Gagal Dihapus";
            $_SESSION['pesan'] = "Data Gagal Dihapus";
            header('location: ../../page/forminputalokasibudget.php?input='.$id_page);
         }
    }else if (isset($_POST['edit'])){
        // masukan data post ke variabel
        $id=$_POST ['id']; 
        $depart=$_POST['depart'];
        $kategori=$_POST['kategori'];
        $proposal=$_POST['proposal'];
        $benefit=$_POST ['benefit'];   
       
        $cost_request=$_POST ['cost'];
        $cost = str_replace('.','' ,$cost_request);

      //   hapus file lama
         $file_dulu=$_POST ['file_dulu']; 
         $target_dir_file = "../../image/uploads/";          
         $target_file = $target_dir_file . $file_dulu;  
         if( is_file( $target_file));
         unlink( $target_file);
      // end hapus file lama

      $target_dir = "../../image/uploads/";   
      $file_name =  basename($_FILES["lampiran"]["name"]);

      $target_file = $target_dir . $file_name;       
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {       

         $_SESSION['info'] = "Gagal Disimpan";
         $_SESSION['pesan'] = "Lampiran tidak Sesuai";

      // if everything is ok, try to upload file
      } else { 

         move_uploaded_file($_FILES["lampiran"]["tmp_name"], $target_file);
      
      } 
        
       $UbahProposal = "UPDATE  proposal SET id_kat='$kategori',id_dep='$depart',proposal='$proposal',cost='$cost',lampiran='$file_name',benefit='$benefit' WHERE id_prop = '$id'"; 
       echo $UbahProposal;
       $sql = mysqli_query($link_yics, $UbahProposal)or die(mysqli_error($link_yics));
    // logika pakai session
       if(mysqli_num_rows($sql)>0){
        // echo "tes1";kategori_proposal
         $_SESSION['info'] = "Gagal Diubah";
         $_SESSION['pesan'] = "Data User Sudah Ada di Database";
         header('location: ../../page/forminputalokasibudget.php?input='.$id_fis);
       }else{
         $_SESSION['info'] = "Diubah";
         $_SESSION['pesan'] = "Data Berhasil Diubah";
         header('location: ../../page/forminputalokasibudget.php?input='.$id_fis);
        }
      }else if(isset ($_GET['proses'])){
      // print_r($_POST['check']);
         foreach($_POST['check']as $id){
            $deleteAll = "DELETE FROM kategori_proposal WHERE id='$id'";    
            $hasil_delete = mysqli_query($link_yics, $deleteAll)or die(mysqli_error($link_yics));
            } 
            if($hasil_delete){
               $_SESSION['info'] = "Dihapus";
               $_SESSION['pesan'] = "Data Berhasil Dihapus";
               header('location: ../../page/forminputalokasibudget.php?input='.$id_fis);
            }else{ 
               $_SESSION['info'] = "Gagal Dihapus";
               $_SESSION['pesan'] = "Data Gagal Dihapus";
               header('location: ../../page/forminputalokasibudget.php?input='.$id_fis);
         } 
    }     
}else {
   header("location: ../../index.php");
 }