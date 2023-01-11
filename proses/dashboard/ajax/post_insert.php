<?php 
include("../../../config/config.php");

        $reason=$_POST['reason']; 
        $id_prop=$_POST['id_prop']; 
       
   // cek id ia sudah ada apa blm?
$qry = mysqli_query($link_yics, "SELECT id_prop FROM notif_prop_rjct WHERE id_prop = '$id_prop' ")or die(mysqli_error($link_yics));
$kolom=mysqli_num_rows($qry);      
// logika pakai session
if($kolom>0){
    $sql = mysqli_query($link_yics,"UPDATE notif_prop_rjct SET id_prop='$id_prop',reason='$reason'WHERE id_prop = '$id_prop'");  
}else{
    $sql =mysqli_query ($link_yics,"INSERT INTO notif_prop_rjct (`reason`,`id_prop`) VALUES ('$reason','$id_prop')");          
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