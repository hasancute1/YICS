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
    }else{
        return "data kosong";
    }

   return $result;
}



// get notif
function getNotif(){

    $notif_proposal = query("SELECT notif.*, proposal.proposal as judul_prop, data_user.nama  FROM notifications as notif 
    join proposal on id_type = proposal.id_prop 
    join data_user on notif.sender = data_user.username
    WHERE dest='".$_SESSION['yics_user']."' and notif.type = 'proposal'    
    ORDER BY id_notif DESC limit 10");


    $notif_ia = query("SELECT notif.*, plan_proposal.proposal as judul_prop , data_user.nama FROM notifications as notif 
    join ia on id_type = ia.id_ia
    join plan_proposal on ia.id_prop = plan_proposal.id_prop 
    join data_user on notif.sender = data_user.username
    WHERE dest='".$_SESSION['yics_user']."' and notif.type = 'ia'    
    ORDER BY id_notif DESC limit 10");

    $data = array_merge($notif_proposal , $notif_ia);
    arsort($data);

    return $data;
}

// get notif
function get_notif_pending(){

    $notif_proposal = query("SELECT notif.*, proposal.proposal as judul_prop  FROM notifications as notif join proposal on id_type = proposal.id_prop WHERE dest='".$_SESSION['yics_user']."' and status='Pending' and type='proposal' ORDER BY id_notif DESC");

    $notif_ia = query("SELECT notif.*, plan_proposal.proposal as judul_prop  FROM notifications as notif
    join ia on id_type = ia.id_ia
    join plan_proposal on ia.id_prop = plan_proposal.id_prop 
    join data_user on data_user.id_area = plan_proposal.id_area
    WHERE dest='".$_SESSION['yics_user']."' and status='Pending' and type='ia' ORDER BY id_notif DESC");

    $data = array_merge($notif_proposal , $notif_ia);

    return $data;
}


// update query
function update($query){
    global $link_yics;  

    $data_query = mysqli_query($link_yics, $query) or die(mysqli_error($link_yics)); 

    return "Data berhasil di update";

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
        MONTH(ia.time_ia) AS bulan, 
        SUM(ia.cost_ia) AS cost
        FROM ia 
        JOIN plan_proposal on ia.id_prop = plan_proposal.id_prop    
        join area on area.id_area = plan_proposal.id_area
        join depart on area.id_dep = depart.id_dep   
        AND depart.id_dep = ".$id."
        AND plan_proposal.id_fis = '".$fis_aktif['id_fis']."'
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

function get_item_trac_ia($array , $id_prog){

    $data = array();

    foreach($array as $row){

        if($row['id_prog'] == $id_prog){
            $data[] = $row;
        }
    }

    if(isset($data[0])){
        return $data[0];
    }

    return $data;
}

function get_progress_bp($array , $nominal){
    
    $scope1 = [10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28]; // >500jt : 19 step
    $scope2 = [10,11,12,13,14,15,16,17,18,19,22,23,24,25,26,27,28]; // 49jt > 500jt hilangkan 20,21 : 17 step
    $scope3 = [10,11,12,13,14,15,22,23,24,25,26,27,28]; //  < 49 jt : 13 step

    if($nominal < 49){
        $progress = $scope3;

    }elseif( $nominal >= 49 && $nominal <= 500){

        $progress = $scope2;

    }else{      

        $progress = $scope1;

    }

    foreach ($array as $key => $value) {
        
        if(in_array($value['id_prog'] , $progress)){
            $data []  = $value;
        }
        
    }

    return $data;
}

function get_cons_budget($array , $id){

    foreach($array as $row){

       if($row['id_dep'] == $id){

        $data = $row['cost'];

       }else{
        $data = 0;
       }
    }

    return $data;
}


function get_last_progress_ia($id = NULL){
    if($id != NULL){

        $data = query("SELECT * FROM tracking_ia
        JOIN progress on tracking_ia.id_prog = progress.id_prog
         where id_ia = {$id} ORDER BY step DESC");
        if(isset($data[0])){

            return [
                "step" => count($data),
                "nama_progress" => $data[0]['nama_progress']
            ];

        }else{
            return [
                "step" => 5,
                "nama_progress" => "-"
            ];
        }
        

    }else{

        return "-";

    }


    
}


?>