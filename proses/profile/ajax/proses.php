<?php

//////////////////////////////////////////////////////////////////////
include("../../../config/config.php");


//redirect ke halaman dashboard index jika sudah ada session
if(isset($_SESSION['yics_user'])){
    
        $npkUser = $_GET['npk'];
        $query_akun = mysqli_query($link_yics, "SELECT * FROM data_user WHERE username = '$npkUser' ")or die(mysqli_error($link_yics));
		$data_akun = mysqli_fetch_assoc($query_akun);
        $pass = sha1($_GET['old_pass'] );
		
		// $data_userLevel = mysqli_fetch_assoc($user_levQuery);
        $new_pass = sha1($_GET['new_pass']);
        
        $pass_before = $data_akun['pass']; //password lama
        $cekPass = mysqli_num_rows($user_levQuery);
        if($pass == $data_akun['pass']){
            
            mysqli_query($link_yics, "UPDATE data_user SET pass = '$new_pass' WHERE username = '$npkUser' ");
            ?>
<script>
Swal.fire({
    title: 'Sukses',
    text: 'Password sudah diganti',
    timer: 2000,

    icon: 'success',
    showCancelButton: false,
    showConfirmButton: false,
    confirmButtonColor: '#00B9FF',
    cancelButtonColor: '#B2BABB',

})
</script>
<?php
        }else{
            ?>
<script>
Swal.fire({
    title: 'Password Salah',
    text: 'Pastikan password lama anda sudah benar',
    // timer: 2000,

    icon: 'warning',
    showCancelButton: false,
    showConfirmButton: false,
    confirmButtonColor: '#00B9FF',
    cancelButtonColor: '#B2BABB',

})
<?php
        }
    }else{
        
    }
            ?>
</script>