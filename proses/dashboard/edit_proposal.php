<?php 
include("config/config.php");
if (!isset($_SESSION['yics_user'])) {
  header('location: index.php');
}



if (isset($_POST['id_prop'])!="" ){
    
  
    $id_prop = $_POST['id_prop'];


         $query =  mysqli_query($link_yics,"SELECT * FROM planning WHERE id='$id_prop'");
         if(mysqli_num_rows($query)>0){
            while($rows = mysqli_fetch_assoc($query)){
                $query_dept =  mysqli_query($link_yics,"SELECT * FROM dept_account WHERE id_dept_account='$rows[depart]'");
                if(mysqli_num_rows($query_dept)>0){
                    while($rows_dept = mysqli_fetch_assoc($query_dept)){
                        ?>
                        <script>
                            $('#depart_edit').val('<?php echo  $rows_dept['department_account']; ?>')
                        </script>
                        <?php
                    }
                }

                
                ?>
                <script>
                    $('#proposal_edit').val('<?php echo $rows['proposal']; ?>')
                    $('#category_edit').val('<?php echo $rows['category']; ?>') 
                     
                    
                </script>
                <?php

                // HIDE STEP 5
                if($rows['bp']==""){?>
                    <script>
                        $('#step5').addClass('d-none')
                        $('#pilih_step').removeClass('d-none')
                    </script>                    
                <?php   
                } else {?>
                <script>
                    $('#step5').removeClass('d-none')
                    $('#option5').addClass('d-none')
                    $('#pilih_step').addClass('d-none')
                </script>    
                <?php  
                }


                // HIDE STEP 4
                if($rows['pc']==""){?>
                    <script>$('#step4').addClass('d-none')</script>                    
                <?php   
                } else {?>
                    <script>
                        $('#step4').removeClass('d-none')
                        $('#option4').addClass('d-none')
                    </script> 
                <?php   
                }

                // HIDE STEP 3
                if($rows['rfn']==""){?>
                    <script>$('#step3').addClass('d-none')</script>                    
                <?php   
                } else {?>
                    <script>
                        $('#step3').removeClass('d-none')
                        $('#option3').addClass('d-none')
                    </script> 
                <?php   
                }

                 // HIDE STEP 2
                 if($rows['assignment']==""){?>
                    <script>$('#step2').addClass('d-none')</script>                    
                <?php   
                } else {?>
                    <script>
                        $('#step2').removeClass('d-none')
                        $('#option2').addClass('d-none')
                    </script> 
                    
                <?php   
                }

                 // HIDE STEP 1
                 if($rows['quatation']==""){?>
                    <script>$('#step1').addClass('d-none')</script>                    
                <?php   
                } else {?>
                    <script>
                        $('#step1').removeClass('d-none')
                        $('#option1').addClass('d-none')
                    </script> 
                <?php   
                }


            }   
         }
  }
?>



