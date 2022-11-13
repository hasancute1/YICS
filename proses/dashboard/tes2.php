<?php 
include("../../config/config.php");
include("../functions.php");
include("../services/notifications.php");


if (isset ($_SESSION['yics_user'])){
     
    if(isset($_POST['add'])){

         //$totalData=$_POST['tgl'];        
         $i = 1;
         $index = 0;
         $id_prop = $_POST['id_prop'];
         //data proposal
          $proposal = single_query("SELECT * FROM proposal WHERE id_prop={$id_prop}");
        



         $id_pic = $_POST['pic']; //array
         $id_tgl = $_POST['tgl']; //aray
          $max = max($_POST['id_prog']);
         $insertTracking = "INSERT INTO tracking_prop (`id_prop`, `id_prog`, `id_approval`, `username`, `time`) VALUES "; 
         $max = 0;

         $notif = FALSE;
         $pesan_notif = '';
         $pic = '';

         foreach($_POST['id_prog'] AS $prog){
          $data_prog = single_query("SELECT * from progress where id_prog = {$prog}");

          $qry_cek = "SELECT id_prop FROM tracking_prop WHERE id_prop =  '$id_prop'  AND id_prog = '$prog'";
          $sql_cek = mysqli_query($link_yics, $qry_cek)or die(mysqli_error($link_yics));
          $jml_data = mysqli_num_rows($sql_cek);
          
          // echo $jml_data;
          $pic = $_POST['pic'][$index];
          $time = $_POST['tgl'][$index];
          if(isset($_POST['approve_step'.$i])){
              $max +=1;
               if($jml_data > 0){
                   
                    $sql = mysqli_query($link_yics,"UPDATE tracking_prop SET id_approval = '1', username = '$pic',  `time` = '$time'  WHERE `id_prop` =  '$id_prop' AND id_prog = '$prog' ");
                    // $delete = "DELETE FROM tracking_prop WHERE id_prop =  '$id_prop' AND id_prog >  '$max'";
                    // ECHO $delete."<br>";
                    // $hasil_delete = mysqli_query($link_yics, $delete)or die(mysqli_error($link_yics));
                    if(!$sql){
                         $_SESSION['info'] = "Gagal Disimpan";
                         $_SESSION['pesan'] = "Data Gagal Diupdate";
                         header('location: ../../page/dashboard.php');
                    }else{
                         // kirim notifikasi ke pic
                         $notif = TRUE;
                         $pesan_notif = "Telah Diupdate ke Proses " . $data_prog['nama_progress'];
                    }
               }else{
                    $insertTracking = " INSERT INTO tracking_prop (`id_prop`, `id_prog`, `id_approval`, `username`, `time`) VALUES  ('$id_prop', '$prog', '1', '$pic', '$time' )";
                    $sql = mysqli_query($link_yics, $insertTracking)or die(mysqli_error($link_yics));
                    if(!$sql){
                         $_SESSION['info'] = "Gagal Disimpan";
                         $_SESSION['pesan'] = "Data Gagal Diupdate";
                         header('location: ../../page/dashboard.php');
                    }else{
                         // kirim notifikasi ke pic
                         $notif = TRUE;
                         $pesan_notif = "Telah Diupdate ke Proses " . $data_prog['nama_progress'];
                    }
               }
               // echo  $_POST['id_prop'].$_POST['pic'][$index]." : ".$_POST['tgl'][$index]." : ".$_POST['approve_step'.$i]."<br>";
               //update
               //insert


          }else if(isset($_POST['reject_step'.$i])){
               $max +=1;
               if($jml_data > 0){
                   
                    $sql = mysqli_query($link_yics,"UPDATE tracking_prop SET id_approval = '0', username = '$pic',  `time` = '$time' WHERE `id_prop` =  '$id_prop' AND id_prog = '$prog'");
                   
                    if(!$sql){
                         $_SESSION['info'] = "Gagal Disimpan";
                         $_SESSION['pesan'] = "Data Gagal Diupdate";
                         header('location: ../../page/dashboard.php');
                    }else{

                         // kirim notifikasi ke pic
                         $notif = TRUE;
                         $pesan_notif = "Proposal Ditolak";

                    }
               }else{
                    $insertTracking = " INSERT INTO tracking_prop (`id_prop`, `id_prog`, `id_approval`, `username`, `time`) VALUES  ('$id_prop', '$prog', '0', '$pic', '$time' )";
                    $sql = mysqli_query($link_yics, $insertTracking)or die(mysqli_error($link_yics));
                    if(!$sql){
                         $_SESSION['info'] = "Gagal Disimpan";
                         $_SESSION['pesan'] = "Data Gagal Diupdate";
                         header('location: ../../page/dashboard.php');
                    }else{

                          // kirim notifikasi ke pic
                          $notif = TRUE;
                          $pesan_notif = "Proposal Ditolak";
                    }
               }
               // echo $_POST['id_prop'].$_POST['pic'][$index]." - ".$_POST['tgl'][$index]." : ".$_POST['reject_step'.$i]."<br>";
          }
          


          $i++;
          $index++;
         
     }

     $delete = "DELETE FROM tracking_prop WHERE id_prop =  '$id_prop' AND id_prog >  '$max'";
     // ECHO $delete."<br>";
     $hasil_delete = mysqli_query($link_yics, $delete)or die(mysqli_error($link_yics));
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
     
     /**
      * kirim notifikasi step aprove ke PIC
     */
     // $notif = TRUE;

     if($notif){

          kirim_notif([         
               'dest' => $proposal['username'],
               'message' => $pesan_notif,
               'type' => "proposal",
               'id_type' => $id_prop 
          ]);
     }

         print_r($totalData);

    } else {
      echo "data belum terkirim";
      }
     }