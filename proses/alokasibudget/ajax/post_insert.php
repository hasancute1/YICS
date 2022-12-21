<?php 
include("../../../config/config.php");

        $depart=$_POST['depart']; 
        $kategori=$_POST['kategori'];
        $proposal=$_POST ['proposal'];                              
        $id_matauang=$_POST ['mata_uang'];              

        $cost_request=$_POST ['cost'];
        $cost = str_replace('.','' ,$cost_request); 

        $id_fis=$_POST ['id_fis']; 
        $area =$_POST ['area'];



        $sql =mysqli_query ($link_yics,"INSERT INTO plan_proposal (`area`,`id_dep`,`id_kat`,`proposal`,`cost`,`id_fis`,`id_matauang`) VALUES ('$area','$depart','$kategori','$proposal','$cost','$id_fis','$id_matauang')"); 
       
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