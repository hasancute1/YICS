<?php 
include("../../../config/config.php");

$id=$_GET['index'];


$sql = mysqli_query($link_yics,"DELETE FROM plan_proposal WHERE id_prop='$id'");
// $result = $mysqli->query($sql);
// echo json_encode([$_POST['user_id']], JSON_PRETTY_PRINT);
if($sql){
    ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: "Data ini akan dihapus selamanya!",
})
</script>
<?php
}else{?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Kesalahan',
    text: "Data gagal dihapus!"
})
</script>
<?php } ?>