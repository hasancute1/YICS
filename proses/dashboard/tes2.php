<?php 
include("../../config/config.php");

if (isset ($_SESSION['yics_user'])){
     
    if(isset($_POST['add'])){

     //     $totalData=$_POST['tgl'];
        
         $i = 1;
         $index = 0;
         $id_prop = $_POST['id_prop'];
         $id_pic = $_POST['pic']; //array
         $id_tgl = $_POST['tgl']; //aray
         $insertTracking = "INSERT INTO tracking_prop (`id_prop`, `id_prog`, `id_approval`, `username`, `time`) VALUES "; 
         foreach($_POST['id_prog'] AS $prog){
          $qry_cek = "SELECT id_prop FROM tracking_prop WHERE id_prop =  '$id_prop'  AND id_prog = '$prog'";
          $sql_cek = mysqli_query($link_yics, $qry_cek)or die(mysqli_error($link_yics));
          $jml_data = mysqli_num_rows($sql_cek);
          // echo $jml_data;
          $pic = $_POST['pic'][$index];
          $time = $_POST['tgl'][$index];
          if(isset($_POST['approve_step'.$i])){
              
               if($jml_data > 0){
                   
                    $sql = mysqli_query($link_yics,"UPDATE tracking_prop SET id_approval = '1', username = '$pic',  `time` = '$time'  WHERE `id_prop` =  '$id_prop' ");
                    if(!$sql){
                         $_SESSION['info'] = "Gagal Disimpan";
                         $_SESSION['pesan'] = "Data Gagal Diupdate";
                         header('location: ../../page/dashboard.php');
                    }
               }else{
                    $insertTracking = " INSERT INTO tracking_prop (`id_prop`, `id_prog`, `id_approval`, `username`, `time`) VALUES  ('$id_prop', '$prog', '1', '$pic', '$time' )";
                    $sql = mysqli_query($link_yics, $insertTracking)or die(mysqli_error($link_yics));
                    if(!$sql){
                         $_SESSION['info'] = "Gagal Disimpan";
                         $_SESSION['pesan'] = "Data Gagal Diupdate";
                         header('location: ../../page/dashboard.php');
                    }
               }
               // echo  $_POST['id_prop'].$_POST['pic'][$index]." : ".$_POST['tgl'][$index]." : ".$_POST['approve_step'.$i]."<br>";
               //update
               //insert
          }else if(isset($_POST['reject_step'.$i])){
               if($jml_data > 0){
                   
                    $sql = mysqli_query($link_yics,"UPDATE tracking_prop SET id_approval = '0', username = '$pic',  `time` = '$time' AND `id_prop` =  '$id_prop'");
                    if(!$sql){
                         $_SESSION['info'] = "Gagal Disimpan";
                         $_SESSION['pesan'] = "Data Gagal Diupdate";
                         header('location: ../../page/dashboard.php');
                    }
               }else{
                    $insertTracking = " INSERT INTO tracking_prop (`id_prop`, `id_prog`, `id_approval`, `username`, `time`) VALUES  ('$id_prop', '$prog', '0', '$pic', '$time' )";
                    $sql = mysqli_query($link_yics, $insertTracking)or die(mysqli_error($link_yics));
                    if(!$sql){
                         $_SESSION['info'] = "Gagal Disimpan";
                         $_SESSION['pesan'] = "Data Gagal Diupdate";
                         header('location: ../../page/dashboard.php');
                    }
               }
               // echo $_POST['id_prop'].$_POST['pic'][$index]." - ".$_POST['tgl'][$index]." : ".$_POST['reject_step'.$i]."<br>";
          }


          $i++;
          $index++;
         
     }
    
     //     echo $insertTracking;  
     if($sql){
          $_SESSION['info'] = "Disimpan";
          $_SESSION['pesan'] = "Data Berhasil Diupdate";
          header('location: ../../page/dashboard.php');
     }else{
          $_SESSION['info'] = "Gagal Disimpan";
          $_SESSION['pesan'] = "Data Gagal Diupdate";
          header('location: ../../page/dashboard.php');
     }   
     //     print_r($totalData);

    } else {
      echo "ksk";
      }
     }