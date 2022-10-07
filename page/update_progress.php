<?php
include("../../config/config.php");
move_uploaded_file($file_tmp, 'file/' . $nama);
if (isset($_SESSION['yics_user'])) {
    if (isset($_POST['add'])) {
        $depart = $_POST['approval'];
        echo $depart;
    }
} else {
    header("location: ../../index.php");
}
