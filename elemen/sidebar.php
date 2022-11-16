<?php

?>

<?php 
     ///  rows  proposal   yang aktif        
              $rows = mysqli_query($link_yics,"SELECT * FROM proposal
              JOIN time_fiscal ON proposal.id_fis = time_fiscal.id_fis
              WHERE status='aktif'")or die (mysqli_error($link_yics));
              
               if (empty (mysqli_num_rows($rows))){
                $rows_pro = 0;
               }else{
                $rows_pro=mysqli_num_rows($rows);

               }
        /// end rows  proposal   yang aktif   

              $kol=mysqli_query($link_yics ,"SELECT * FROM proposal 
                JOIN kategori_proposal ON proposal.id_kat = kategori_proposal.id_kat
                JOIN time_fiscal ON proposal.id_fis = time_fiscal.id_fis
                WHERE proposal.id_kat = '1'  AND status='aktif'")or die (mysqli_error($link_yics));
                
                if (empty (mysqli_num_rows($kol))){
                    $kolom_impr = 0;
                   }else{
                    $kolom_impr=mysqli_num_rows($kol);    
                   }

                   if($rows_pro == 0 or $kolom_impr == 0 ) {
                        $presentasi_imp = 0;
                  }else{
                    $presentasi_imp = ceil(($kolom_impr/ $rows_pro)*100);
                        }

              $kol_rep=mysqli_query($link_yics ,"SELECT * FROM proposal 
                JOIN kategori_proposal ON proposal.id_kat = kategori_proposal.id_kat
                JOIN time_fiscal ON proposal.id_fis = time_fiscal.id_fis
                WHERE proposal.id_kat = '2'  AND status='aktif'")or die (mysqli_error($link_yics));
              
                if (empty (mysqli_num_rows($kol_rep))){
                    $kolom_replac = 0;
                   }else{
                    $kolom_replac=mysqli_num_rows($kol_rep);    
                   }  

                   if($rows_pro == 0 or $kolom_impr == 0 )
                   {
                    $presentasi_rep =0;
                   }else{
                    $presentasi_rep = floor(($kolom_replac/ $rows_pro)*100);}

              $kol_ot=mysqli_query($link_yics ,"SELECT * FROM proposal 
                JOIN kategori_proposal ON proposal.id_kat = kategori_proposal.id_kat
                JOIN time_fiscal ON proposal.id_fis = time_fiscal.id_fis
                WHERE proposal.id_kat = '3'  AND status='aktif'")or die (mysqli_error($link_yics));
                
                if (empty (mysqli_num_rows($kol_ot))){
                    $kol_other = 0;
                   }else{
                    $kol_other=mysqli_num_rows($kol_ot);    
                   }  
                   
                   if($rows_pro == 0 or $kol_other == 0 )
                   {
                    $presentasi_other =0;
                   }else{
                    $presentasi_other = ceil(($kol_other/ $rows_pro)*100);
                }
               
            
?>
<div class="site-menubar-section">
    <h5>
        Improvement
        <span class="float-right"><?=  $presentasi_imp ?>%</span>
    </h5>
    <div class="progress progress-sm">
        <div class="progress-bar progress-bar-indicating active " style="width: <?=  $presentasi_imp ?>%;"
            role="progressbar"></div>
    </div>
    <h5>
        Replacement
        <span class="float-right"><?=  $presentasi_rep ?>%</span>
    </h5>
    <div class="progress progress-sm">
        <div class="progress-bar progress-bar-indicating active progress-bar-success"
            style="width: <?=  $presentasi_rep ?>%;" role="progressbar"></div>
    </div>
    <h5>
        Other
        <span class="float-right"><?=  $presentasi_other ?>%</span>
    </h5>
    <div class="progress progress-sm">
        <div class="progress-bar progress-bar-indicating active progress-bar-warning"
            style="width: <?=  $presentasi_other ?>%;" role="progressbar"></div>
    </div>
</div>
</div>
</div>
</div>