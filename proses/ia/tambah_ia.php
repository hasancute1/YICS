<?php 
include("../../config/config.php");
include("../functions.php");
include("../services/notifications.php");

if (isset ($_SESSION['yics_user'])){
    if(isset($_POST['add'])){ 

$id_prop = $_POST['id_prop'];
$ia = $_POST['ia'];
$ia_desc = $_POST['ia_desc'];
$cost_ia = $_POST['cost_ia'];
$cost_ia = str_replace(',' , '.' , $cost_ia);
$time_ia = $_POST['time_ia'];
$validuntil = $_POST['validuntil'];

$data_prop = single_query("SELECT * from plan_proposal join data_user on data_user.id_area=plan_proposal.id_area where id_prop={$id_prop}");

$notif = FALSE;

$pic_ia = $_POST['pic_ia'];
$GLOBALS['id_prop'];
// cek username sudah ada apa blm?
$qry = mysqli_query($link_yics, "SELECT ia FROM ia WHERE ia = '$ia' ")or die(mysqli_error($link_yics));
// $qry = mysqli_query($link_yics, "SELECT sum(cost_ia) AS cost_dep JOIN FROM ia WHERE ia = '$ia' ")or die(mysqli_error($link_yics));     
// logika pakai session
    if(mysqli_num_rows($qry)>0){
        $_SESSION['info'] = "Gagal Disimpan";
        $_SESSION['pesan'] = "Data User Sudah Ada di Database";
        header('location: ../../page/formnambah_ia.php?add='.$id_prop);
    }else{
        $_SESSION['info'] = "Disimpan";
        $_SESSION['pesan'] = "Data Berhasil Disimpan";
        
        $inputproposal = "INSERT INTO ia (`id_prop`,`ia`,`deskripsi`,`cost_ia`,`time_ia`,`pic_ia`,`validuntil`) VALUES ('$id_prop','$ia','$ia_desc','$cost_ia','$time_ia','$pic_ia','$validuntil')"; 
        $sql = mysqli_query($link_yics, $inputproposal)or die(mysqli_error($link_yics));

        if($notif){

            kirim_notif([         
                 'dest' => $data_prop['username'],
                 'message' => $pesan_notif,
                 'type' => "proposal",
                 'id_type' => $id_prop
            ]);
       }


        // Notifikasi 
        $notif = TRUE;
        $pesan_notif = "IA dengan nomor : " .$ia. " Telah Ditambahkan";

        header('location: ../../page/formnambah_ia.php?add='.$id_prop);
    }


       


    }else if(isset($_GET['del'])){
    $id=$_GET['del'];
    $id_page=$_GET['page'];

    $get_data_ia = single_query("SELECT * from ia 
    join plan_proposal on ia.id_prop = plan_proposal.id_prop 
    join data_user on data_user.id_area= plan_proposal.id_area 
    where ia.id_ia = {$id}");


    $query = "DELETE FROM ia WHERE id_ia='$id'";
    $hasil_query = mysqli_query($link_yics, $query)or die(mysqli_error($link_yics));
    if($hasil_query){
        $_SESSION['info'] = "Dihapus";
        $_SESSION['pesan'] = "Data Berhasil Dihapus";

        $notif = TRUE;
        $pesan_notif = "IA dengan nomor : " .$get_data_ia['ia']. " Telah Dihapus";

        if($notif){

            kirim_notif([         
                 'dest' => $get_data_ia['username'],
                 'message' => $pesan_notif,
                 'type' => "proposal",
                 'id_type' => $get_data_ia['id_prop']
            ]);
       }


        header('location: ../../page/formnambah_ia.php?add='.$id_page);
     }else{
        $_SESSION['info'] = "Gagal Dihapus";
        $_SESSION['pesan'] = "Data Gagal Dihapus";
        header('location: ../../page/formnambah_ia.php?add='.$id_page);
     }
    }else if (isset($_POST['ubah'])){
        //masukan data ke variabel
        $id_prop = $_POST['id_prop'];
        $id_dept = $_POST['id_dept'];
        $ia = $_POST['ia'];
        $id_ia = $_POST['id_ia'];
        $ia_desc = $_POST['ia_deskripsi'];
        $pic_ia = $_POST['pic_ia'];
        $time_ia = $_POST['time_ia'];
        $cost_ia = $_POST['cost_ia'];
        $cost_ia = str_replace(',' , '.' , $cost_ia);

    $data_ia = single_query("SELECT * from ia join plan_proposal on ia.id_prop = plan_proposal.id_prop where id_ia={$id_ia}");

    $UbahIa = "UPDATE ia SET id_prop='$id_prop',ia ='$ia',id_ia ='$id_ia',deskripsi ='$ia_desc',pic_ia ='$pic_ia',time_ia ='$time_ia',cost_ia ='$cost_ia' WHERE id_ia = '$id_ia'"; 
       $sql = mysqli_query($link_yics, $UbahIa)or die(mysqli_error($link_yics));
 // logika pakai session
 if(mysqli_num_rows($sql)>0){
    // echo "tes1";kategori_proposal
   
     $_SESSION['info'] = "Gagal Diubah";
     $_SESSION['pesan'] = "Data User Sudah Ada di Database";
     header('location: ../../page/formnambah_ia.php?add='.$id_prop);
   }else{
     $_SESSION['info'] = "Diubah";
     $_SESSION['pesan'] = "Data Berhasil Diubah";


     $notif = TRUE;
     $pesan_notif = "IA dengan nomor : " .$data_ia['ia']. " Telah Diupdate";

     if($notif){

         kirim_notif([         
              'dest' => $data_ia['username'],
              'message' => $pesan_notif,
              'type' => "ia",
              'id_type' => $id_ia
         ]);
    }


     header('location: ../../page/formnambah_ia.php?add='.$id_prop);
    }
}
}