<?php 
include("../../config/config.php");
include("../functions.php");
include("../services/notifications.php");


if (isset ($_SESSION['yics_user'])){
     
    if(isset($_POST['add'])){

         //$totalData=$_POST['tgl'];        
         $i = 1;
         $index = 0;
         $id_ia = $_POST['id_ia'];
         //data proposal
         $data_ia = single_query("SELECT * FROM ia WHERE id_ia={$id_ia}");

         var_dump($data_ia); die();

         $id_pic = $_POST['pic']; //array
         $id_tgl = $_POST['tgl']; //aray
         $max = max($_POST['id_prog']);
         $insertTracking = "INSERT INTO tracking_ia (`id_ia`, `id_prog`, `approval`, `username`, `time`) VALUES "; 
         $max = 0;

         $notif = FALSE;
         $pesan_notif = '';
         $pic = '';

         foreach($_POST['id_prog'] AS $prog){
          $qry_cek = "SELECT id_ia FROM tracking_ia WHERE id_ia =  '$id_ia'  AND id_prog = '$prog'";
          $sql_cek = mysqli_query($link_yics, $qry_cek)or die(mysqli_error($link_yics));
          $jml_data = mysqli_num_rows($sql_cek);
          
          // echo $jml_data;
          $pic = $_POST['pic'][$index];
          $time = $_POST['tgl'][$index];
          if(isset($_POST['approve_step'.$i])){
              $max +=1;
               if($jml_data > 0){
                   
                    $sql = mysqli_query($link_yics,"UPDATE tracking_ia SET id_approval = '1', username = '$pic',  `time` = '$time'  WHERE `id_ia` =  '$id_ia' AND id_prog = '$prog' ");
                    // $delete = "DELETE FROM tracking_ia WHERE id_ia =  '$id_ia' AND id_prog >  '$max'";
                    // ECHO $delete."<br>";
                    // $hasil_delete = mysqli_query($link_yics, $delete)or die(mysqli_error($link_yics));
                    if(!$sql){
                         $_SESSION['info'] = "Gagal Disimpan";
                         $_SESSION['pesan'] = "Data Gagal Diupdate";
                         header('location: ../../page/dashboard.php');
                    }else{
                         // kirim notifikasi ke pic
                         $notif = TRUE;
                         $pesan_notif = "Proposal ada Perubahan Step";
                    }
               }else{
                    $insertTracking = " INSERT INTO tracking_ia (`id_ia`, `id_prog`, `id_approval`, `username`, `time`) VALUES  ('$id_ia', '$prog', '1', '$pic', '$time' )";
                    $sql = mysqli_query($link_yics, $insertTracking)or die(mysqli_error($link_yics));
                    if(!$sql){
                         $_SESSION['info'] = "Gagal Disimpan";
                         $_SESSION['pesan'] = "Data Gagal Diupdate";
                         header('location: ../../page/dashboard.php');
                    }else{
                         // kirim notifikasi ke pic
                         $notif = TRUE;
                         $pesan_notif = "Proposal Masuk Tahap " . $prog;
                    }
               }
               // echo  $_POST['id_ia'].$_POST['pic'][$index]." : ".$_POST['tgl'][$index]." : ".$_POST['approve_step'.$i]."<br>";
               //update
               //insert


          }else if(isset($_POST['reject_step'.$i])){
               $max +=1;
               if($jml_data > 0){
                   
                    $sql = mysqli_query($link_yics,"UPDATE tracking_ia SET id_approval = '0', username = '$pic',  `time` = '$time' WHERE `id_ia` =  '$id_ia' AND id_prog = '$prog'");
                   
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
                    $insertTracking = " INSERT INTO tracking_ia (`id_ia`, `id_prog`, `id_approval`, `username`, `time`) VALUES  ('$id_ia', '$prog', '0', '$pic', '$time' )";
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
               // echo $_POST['id_ia'].$_POST['pic'][$index]." - ".$_POST['tgl'][$index]." : ".$_POST['reject_step'.$i]."<br>";
          }
          


          $i++;
          $index++;
         
     }

     $delete = "DELETE FROM tracking_ia WHERE id_ia =  '$id_ia' AND id_prog >  '$max'";
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
               'id_type' => $id_ia 
          ]);
     }

         print_r($totalData);

    } else {
      echo "data belum terkirim";
      }
     }