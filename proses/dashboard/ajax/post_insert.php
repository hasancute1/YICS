<?php 
include("../../../config/config.php");

        $reason=$_POST['reason']; 
        $id_prop=$_POST['id_prop']; 
       
        



        $sql =mysqli_query ($link_yics,"INSERT INTO notif_prop_rjct (`reason`,`id_prop`) VALUES ('$reason','$id_prop')"); 
       
if($sql){
    ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: "Data ini sudah tersimpan!",
})
</script>
<?php
}else{?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Kesalahan',
    text: "Data gagal disimpan!"
})
</script>
<?php } ?>