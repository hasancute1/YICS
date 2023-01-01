<?php 
include("../../../config/config.php");

        
        $id=$_POST['id_pro_m'];
        $id_kateg=$_POST['id_ket_m'];
        $proposal=$_POST ['proposal_m'];                          
        $area =$_POST ['area_m'];

        $cost_request=$_POST ['cost_m'];
        $cost = str_replace('.','' ,$cost_request);     

        $sql = "UPDATE  plan_proposal SET area='$area',proposal='$proposal',cost='$cost',id_kat='$id_kateg' WHERE id_prop = '$id'"; 
        echo $sql;
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