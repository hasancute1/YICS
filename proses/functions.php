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

function get_comsumtion_budget($id){

        $fis_aktif = single_query("SELECT id_fis FROM time_fiscal WHERE status='aktif'");

        // ambil dari table tracking_prop
        $query_akumulasi = query("SELECT 
        MONTH(tracking_prop.time) AS bulan, 
        SUM(proposal.cost) AS cost
        FROM tracking_prop 
        JOIN proposal on tracking_prop.id_prop = proposal.id_prop
        JOIN progress  ON tracking_prop.id_prog = progress.id_prog
        WHERE tracking_prop.id_approval  = '1' AND progress.step = '5'
        AND proposal.id_dep = ".$id."
        AND proposal.id_fis = '".$fis_aktif['id_fis']."'
        GROUP BY  bulan
        ");       

    foreach($query_akumulasi as $row){
        $query_akum_array[$row['bulan']] = $row['cost']; 
        // $list_bulan_aktif[] = $row['bulan']; 
    }

    $list_bulan = [4,5,6,7,8,9,10,11,12,1,2,3];
    // $last_data_query = end($query_akumulasi);
    // $bulan_terkahir = $last_data_query['bulan'];


    if(count($query_akumulasi)>0){
      

        foreach ($list_bulan as $key => $bulan) { 
            if(isset($query_akum_array[$bulan])){

                $data_comsumtion_budget[] = intval( $query_akum_array[$bulan] ); 

            }else{
                $data_comsumtion_budget[] = 0; 
            }
        }
    
        return $data_comsumtion_budget;
    }


}


function get_pluck($array,$item){

    $data = array();
    
    foreach($array as $row){

        $data[] = $row[$item];
        
    }

    return $data;
}


?>