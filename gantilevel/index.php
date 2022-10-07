<?php 
// KONEKSI
  // include("../CONFIG/config.php"); 

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "yics_db";
$link_yics = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);



  // $_POST['pass'] = 'npk ';

  // if(isset($_POST['pass'])!="" ){

    $query_npk = mysqli_query($link_yics, "SELECT * FROM data_user") or die (mysqli_error($link_yics));
    if(mysqli_num_rows($query_npk)>0){
        while ($rows_npk = mysqli_fetch_assoc($query_npk)) {          
          $npk = $rows_npk['npk'];
            // $pass =  $npk;   
            $pass =  "gu";  
          // }
          $password = $pass;
          mysqli_query($link_yics, "UPDATE  data_user SET level = '$password' WHERE npk = '$npk' ") or die (mysqli_error($link_yics));
        }
      } 
     ?>

    
     <div>Level Selesai diganti</div>

<?php
  // echo  $_POST['pass'];
  // } 
?>