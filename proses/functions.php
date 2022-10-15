<?php 

// simple query
function query($query){
    global $link_yics;

    $data_query = mysqli_query($link_yics, $query) or die(mysqli_error($link_yics));  
    
    $data = array();
    
    if(mysqli_num_rows($data_query)>0){

        while( $result = mysqli_fetch_assoc($data_query)){

            $data[] = $result;
        }
    }



   return $data;
}


// get notif
function getNotif(){

    $data = query("SELECT notif.*, proposal.proposal as judul_prop  FROM notifications as notif join proposal on id_type = proposal.id_prop WHERE dest='".$_SESSION['yics_user']."' ORDER BY id_notif DESC");

    return $data;
}


?>