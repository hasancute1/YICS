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
         $data_ia = single_query("SELECT * FROM ia 
         join plan_proposal on ia.id_prop = plan_proposal.id_prop
         join area on plan_proposal.id_area = area.id_area     
         join data_user on data_user.id_area = area.id_area     
         join depart on depart.id_dep = area.id_dep
        
         WHERE id_ia={$id_ia}");
          $id_dept=$data_ia['id_dep'];
     //     var_dump($_POST['id_prog']);

         $id_pic = $_POST['pic']; //array
         $id_tgl = $_POST['tgl']; //aray
         $max = max($_POST['id_prog']);

     //     $insertTracking = "INSERT INTO tracking_ia (`id_ia`, `id_prog`, `approval`, `username`, `time`) VALUES ('$id_ia', '$prog', '1', '$pic', '$time' )"; 

         $max = 0;

         $notif = FALSE;
         $pesan_notif = '';
         $pic = '';

         foreach($_POST['id_prog'] AS $prog){
          $data_prog = single_query("SELECT * from progress where id_prog = {$prog}");

          $qry_cek = "SELECT id_ia FROM tracking_ia WHERE id_ia =  '$id_ia'  AND id_prog = '$prog'";  
          $sql_cek = mysqli_query($link_yics, $qry_cek)or die(mysqli_error($link_yics));
          $jml_data = mysqli_num_rows($sql_cek);
          
          // echo $jml_data;
          $pic = $_POST['pic'][$index];
          $time = $_POST['tgl'][$index];

          // var_dump($_POST['approve_step'.$i]);die();


          if(isset($_POST['approve_step'.$i])){
              $max +=1;
               if($jml_data > 0){
                   
                    $sql = mysqli_query($link_yics,"UPDATE tracking_ia SET approval = '1', username = '$pic', `time` = '$time'  WHERE `id_ia` =  '$id_ia' AND id_prog = '$prog' ");
                    // $delete = "DELETE FROM tracking_ia WHERE id_ia =  '$id_ia' AND id_prog >  '$max'";
                    // ECHO $delete."<br>";
                    // $hasil_delete = mysqli_query($link_yics, $delete)or die(mysqli_error($link_yics));
                    if(!$sql){
                         $_SESSION['info'] = "Gagal Disimpan";
                         $_SESSION['pesan'] = "Data Gagal Diupdate";
                         header('location: ../../page/controltabledep.php?dept='.$id_dept);
                    }else{
                         // kirim notifikasi ke pic
                         $notif = TRUE;
                         $pesan_notif = "Dengan No IA : " .$data_ia['ia']. " Telah Diupdate Ke Proses " . $data_prog['nama_progress'];
                    }
               }else{
                    $insertTracking = " INSERT INTO tracking_ia (`id_ia`, `id_prog`, `approval`,`username`,`time`) VALUES  ('$id_ia', '$prog', '1', '$pic', '$time' )";
                    $sql = mysqli_query($link_yics, $insertTracking)or die(mysqli_error($link_yics));                   


                    if(!$sql){
                         $_SESSION['info'] = "Gagal Disimpan";
                         $_SESSION['pesan'] = "Data Gagal Diupdate";
                         header('location: ../../page/controltabledep.php?dept='.$id_dept);
                    }else{
                         // kirim notifikasi ke pic
                         $notif = TRUE;
                         $pesan_notif = "Dengan No IA : " .$data_ia['ia']. " Telah Diupdate Ke Proses " . $data_prog['nama_progress'];
                    }
               }
               // echo  $_POST['id_ia'].$_POST['pic'][$index]." : ".$_POST['tgl'][$index]." : ".$_POST['approve_step'.$i]."<br>";
               //update
               //insert


          }else if(isset($_POST['reject_step'.$i])){
               $max +=1;
               if($jml_data > 0){
                   $saldo_berkurang =mysqli_query($link_yics,"UPDATE ia SET cost_ia = '0' WHERE `id_ia` =  '$id_ia'");
                    $sql = mysqli_query($link_yics,"UPDATE tracking_ia SET approval = '0', `time` = '$time' WHERE `id_ia` =  '$id_ia' AND id_prog = '$prog'");
                   
                    if(!$sql){
                         $_SESSION['info'] = "Gagal Disimpan";
                         $_SESSION['pesan'] = "Data Gagal Diupdate";
                         header('location: ../../page/controltabledep.php?dept='.$id_dept);
                    }else{

                         // lakukan pengecekan apakah ada id_prog yang lebih besar dari id_prog ini,
                         // jika ada hapus

                         $delete = "DELETE FROM tracking_ia WHERE id_ia = '$id_ia' AND id_prog >  '$prog'";                        
                         $hasil_delete = mysqli_query($link_yics, $delete)or die(mysqli_error($link_yics));

                         // kirim notifikasi ke pic
                         $notif = TRUE;
                         $pesan_notif = "Proposal Ditolak";

                    }
               }else{
                    $saldo_berkurang =mysqli_query($link_yics,"UPDATE ia SET cost_ia = '0' WHERE `id_ia` =  '$id_ia'");
                    $insertTracking = " INSERT INTO tracking_ia (`id_ia`, `id_prog`, `approval`,`username`,`time`) VALUES  ('$id_ia', '$prog', '0','$pic', '$time' )";
                    $sql = mysqli_query($link_yics, $insertTracking)or die(mysqli_error($link_yics));
                    if(!$sql){
                         $_SESSION['info'] = "Gagal Disimpan";
                         $_SESSION['pesan'] = "Data Gagal Diupdate";
                         header('location: ../../page/controltabledep.php?dept='.$id_dept);
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
   

     // $delete = "DELETE FROM tracking_ia WHERE id_ia =  '$id_ia' AND id_prog >  '$max'";
     // // // ECHO $delete."<br>";
     // $hasil_delete = mysqli_query($link_yics, $delete)or die(mysqli_error($link_yics));
     //     echo $insertTracking;  
     if($sql){
          $_SESSION['info'] = "Disimpan";
          $_SESSION['pesan'] = "Data Berhasil Diupdate";
          header('location: ../../page/controltabledep.php?dept='.$id_dept);
     }else{
          $_SESSION['info'] = "Gagal Disimpan";
          $_SESSION['pesan'] = "Data Gagal Diupdate";
          header('location: ../../page/controltabledep.php?dept='.$id_dept);
     }   
     
     /**
      * kirim notifikasi step aprove ke PIC
     */
     // $notif = TRUE;

     if($notif){

          kirim_notif([         
               'dest' => $data_ia['username'],
               'message' => $pesan_notif,
               'type' => "ia",
               'id_type' => $id_ia 
          ]);
     }

         
    } else {
      echo "data belum terkirim";
      }
     }