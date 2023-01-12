<?php 
include("../../../config/config.php");

        $id_dep=$_POST['id_dep']; 
        $area=$_POST['area']; 
        
        
        $sql =mysqli_query ($link_yics,"INSERT INTO area (`id_dep`,`area`) VALUES ('$id_dep','$area')");  
                 
     
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