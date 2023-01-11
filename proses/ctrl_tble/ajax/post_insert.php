<?php 
include("../../../config/config.php");

        $reason=$_POST['reason']; 
        $id_prop=$_POST['id_prop']; 
        $id_ia=$_POST['id_ia'];
        
// cek id ia sudah ada apa blm?
$qry = mysqli_query($link_yics, "SELECT id_ia FROM notif_ia_rjct WHERE id_ia = '$id_ia' ")or die(mysqli_error($link_yics));
$kolom=mysqli_num_rows($qry); 
// logika pakai session
    if($kolom>0){
        $sql = mysqli_query($link_yics,"UPDATE notif_ia_rjct SET id_ia='$id_ia',reason='$reason',id_prop='$id_prop'WHERE id_ia = '$id_ia'");  
    }else{
        $sql =mysqli_query ($link_yics,"INSERT INTO notif_ia_rjct (`id_ia`,`reason`,`id_prop`) VALUES ('$id_ia','$reason','$id_prop')");             
      } 
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