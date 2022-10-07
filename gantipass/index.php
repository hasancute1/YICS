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

    $query_username = mysqli_query($link_yics, "SELECT * FROM data_user") or die (mysqli_error($link_yics));
    if(mysqli_num_rows($query_username)>0){
        while ($rows_username = mysqli_fetch_assoc($query_username)) {          
          $username = $rows_username['username'];
            // $pass =  $npk;   
            $pass =  "admbody";  
          // }
          $password = sha1($pass);
          mysqli_query($link_yics, "UPDATE  data_user SET pass = '$password' WHERE username = '$username' ") or die (mysqli_error($link_yics));
        }
      } 
     ?>

    
     <div>Password Selesai diganti</div>

<?php
  // echo  $_POST['pass'];
  // } 
?>