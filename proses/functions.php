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

// single query
function single_query($query){
    global $link_yics;

    $data_query = mysqli_query($link_yics, $query) or die(mysqli_error($link_yics));  
    
    $result = array();
    
    if(mysqli_num_rows($data_query)>0){

        $result = mysqli_fetch_assoc($data_query);
    }

   return $result;
}



// get notif
function getNotif(){

    $data = query("SELECT notif.*, proposal.proposal as judul_prop  FROM notifications as notif join proposal on id_type = proposal.id_prop WHERE dest='".$_SESSION['yics_user']."' ORDER BY id_notif DESC limit 10");

    return $data;
}

// get notif
function get_notif_pending(){

    $data = query("SELECT notif.*, proposal.proposal as judul_prop  FROM notifications as notif join proposal on id_type = proposal.id_prop WHERE dest='".$_SESSION['yics_user']."' and status='Pending' ORDER BY id_notif DESC");

    return $data;
}

// update notif
function updateNotif($id){
    global $link_yics;

   if($id != ''){

    $query = "UPDATE notifications SET status='Read' WHERE id_notif=$id";

    $data_query = mysqli_query($link_yics, $query) or die(mysqli_error($link_yics)); 

   }

   return "notif berhasil diupdate";

}


?>