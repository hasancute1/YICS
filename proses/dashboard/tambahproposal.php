<?php 
include("config/config.php");
if (!isset($_SESSION['yics_user'])) {
  header('location: index.php');
}
if (isset($_POST['category_prop'])!="" && isset($_POST['nama_proposal'])!="" &&isset($_POST['dept_prop'])!="" ){
  
    $category_prop = $_POST['category_prop'];
    $nama_proposal= $_POST['nama_proposal'];
    $dept_prop= $_POST['dept_prop'];

    
          // QUERY INSERT DATA
          mysqli_query($link_yics,"INSERT INTO planning (`depart`,`category`,`proposal`) 
          VALUES ('$dept_prop','$category_prop','$nama_proposal')");
          ?>

          <!-- notifikasi sukses -->
          <script>
            $('#TambahPlaningProposal').modal('hide');  
            Swal.fire({
                icon: 'success',
                title: 'Saved!',
                text: "Data propsal telah ditambah.",
                showConfirmButton: false,
                timer: 2000
            })

          </script> 


          <?php


  }
?>



