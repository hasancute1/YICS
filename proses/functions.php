<?php 

// simple query
function query($query){
    global $link_yics;

    $data_query = mysqli_query($link_yics, $query) or die(mysqli_error($link_yics));  

    while( $result = mysqli_fetch_assoc($data_query)){

        $data[] = $result;
    }

   return $data;
}


?>