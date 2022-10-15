<?php

// harus diletakan di bawah include config: include("../config/config.php");

// your code here

function kirim_notif($data){ 
    global $link_yics;    
    // include("../../config/config.php");   

    $input_notif = "INSERT INTO notifications (`sender`,`dest`,`type`,`id_type`,`status`,`message`) VALUES ('".$_SESSION['yics_user']."','".$data['dest']."','".$data['type']."',".$data['id_type'].",'Pending','".$data['message'] . "')"; 
    
     mysqli_query($link_yics, $input_notif)or die(mysqli_error($link_yics));   

}





?>