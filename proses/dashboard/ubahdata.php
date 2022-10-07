<?php 
include("../config/config.php");
if (!isset($_SESSION['yics_user'])) {
  header('location: ../index.php');
}


if (isset($_POST['startfiscal'])!==""  ){
  
  $startfiscal = $_POST['startfiscal'].'-04-01';
  $endfiscal = ($_POST['startfiscal']+1).'-03-31';


  $query_dept = mysqli_query($link_yics,"SELECT * FROM set_dept") or die (mysqli_error($link_yics));
  if (mysqli_num_rows($query_dept)>0){
    while ($rows_dept = mysqli_fetch_assoc($query_dept)){

      $str_id_dept = str_replace("-","_",$rows_dept['id_dept_account']);
      $id_dept =  "id_dept_".$str_id_dept;
      if(isset($_POST[$id_dept])!==""){
        $alokasi = $rows_dept['id_dept_account'];
        $budget = $_POST[$id_dept];
        $id = $alokasi.$id_dept;
        // QUERY INSERT DATA
        mysqli_query($link_yics,"REPLACE alokasi_budget (`id`, `startfiscal`,`endfiscal`,`alokasi`,`budget`) 
        VALUES ('$id','$startfiscal','$endfiscal','$alokasi','$budget')");
      }
    }
  }
?>
 <script>
   $('#TambahAlokasiBudget').modal('toggle');  
   Swal.fire({
  icon: 'success',
  title: 'Saved!',
  text: "Data sudah tersimpan.",
  showConfirmButton: false,
  timer: 1500
}).then(function() {
  location.reload();
})
</script>

  <!-- <script>
   $('#TambahAlokasiBudget').modal('toggle');  
   Swal.fire({
  title: 'Apakah Data Sudah Benar?',
  text: "Data akan diproses!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya,benar'
}).then((result) => {
  {
    Swal.fire(
      'Saved!',
      'Data sudah tersimpan di database.',
      'success'
    )
  }
}).then(function() {
  location.reload();
})
</script> -->


<?php
}
?>