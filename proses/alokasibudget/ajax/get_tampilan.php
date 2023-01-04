<?php 
include("../../../config/config.php");
$dep=$_GET['idDept'];
$id=$_GET['id_fis'];
$index=$_GET['ind'];
// $id_pro=$_GET['id_pro'];

?>
<?php 
                           $bdget_a = mysqli_query($link_yics ,"SELECT sum(cost) AS cost_dep
                            FROM plan_proposal 
                            JOIN depart ON plan_proposal.id_dep = depart.id_dep                           
                            JOIN time_fiscal  ON plan_proposal.id_fis = time_fiscal.id_fis  
                            WHERE time_fiscal.id_fis= '$id'")or die (mysqli_error($link_yics));
                                           
						  // untuk memvalidasi apakah ada datanya
                          if(mysqli_num_rows($bdget_a)>0){
                           $bdget_all = mysqli_fetch_assoc($bdget_a);                          
                           $sum_all = number_format ($bdget_all['cost_dep'],2,',','.');    
                          }else{
                            $sum_all = 0;
                          }
                            
                           
                          $bdget_d = mysqli_query($link_yics ,"SELECT sum(cost) AS cost_dep
                           FROM plan_proposal 
                           JOIN depart ON plan_proposal.id_dep = depart.id_dep                           
                           JOIN time_fiscal  ON plan_proposal.id_fis = time_fiscal.id_fis  
                           WHERE time_fiscal.id_fis= '$id' AND depart.id_dep='$dep'")or die (mysqli_error($link_yics));
                                          
                         // untuk memvalidasi apakah ada datanya
                         if(mysqli_num_rows($bdget_d)>0){
                          $bdget_dep = mysqli_fetch_assoc($bdget_d);                          
                          $sum_dep = number_format ($bdget_dep['cost_dep'],2,',','.');    
                         }else{
                           $sum_dep = 0;
                         }
                           ?>


<div hidden>
    <input class="align-middle text-center ai<?=$dep ?>" type="text" value="<?= (isset($sum_all))? $sum_all: "0"; ?>">
    <input class="align-middle text-center oi<?=$dep ?>" type="text" value="<?= (isset($sum_dep))? $sum_dep: "0"; ?>">
</div>

<div class="table table-responsive">
    <table class="table text-nowrap table-bordered text-uppercase edit1" style="width:100%">
        <thead class="bg-brown-300">
            <tr class="font-size-15 align-middle text-center">
                <th width="10px">No</th>
                <th width="200px">
                    Category</th>
                <th width="200px">
                    Area</th>
                <th>Proposal</th>
                <th width="200px">
                    Cost
                </th>
                <th width="20px">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php  
                            $isi = mysqli_query($link_yics ,"SELECT *
                            FROM plan_proposal
                            JOIN depart ON plan_proposal.id_dep = depart.id_dep
                            JOIN kategori_proposal  ON plan_proposal.id_kat = kategori_proposal.id_kat
                            JOIN time_fiscal  ON plan_proposal.id_fis = time_fiscal.id_fis  
                            WHERE time_fiscal.id_fis= '$id' AND depart.id_dep='$dep' ORDER BY plan_proposal.proposal ASC")or die (mysqli_error($link_yics));
                            $no=1;                      
						  // untuk memvalidasi apakah ada datanya
                          if(mysqli_num_rows($isi)>0){
                           while($datad = mysqli_fetch_assoc($isi)){
                            $id_prop=$datad['id_prop'];
                            $area=$datad['area'];
                            $kategori=$datad['kategori'];
                            $id_kat=$datad['id_kat'];
                            $depart=$datad['depart'];
                            $periode=$datad['periode'];
                            $proposal=$datad['proposal'];
                            $cost = number_format ($datad['cost'],2,',','.');
                                      
                            ?>
            <tr class="align-middle text-center">
                <td class="align-middle text-center">
                    <?=$no; ?>
                </td>
                <td class="align-middle text-center">
                    <?= $kategori; ?>
                </td>
                <td class="align-middle text-center">
                    <?= $area; ?>
                </td>
                <td class="align-middle text-center">
                    <?= $proposal; ?>
                </td>
                <td class="align-middle text-center">
                    <?= $cost; ?>
                </td>
                <td>
                    <button type=" button" class="btn btn-outline btn-icon btn-danger hapus" data-id="<?= $id_prop ?>"
                        data-dept="<?=$dep?>" data-in="<?=$index?>">
                        <i class="icon oi-trashcan" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btn btn-outline btn-icon btn-info edit" data-toggle="modal" id="edit"
                        data-target="#EditAlokasiBudget" data-id="<?= $id_prop ?>" data-dept="<?=$dep?>"
                        data-in="<?=$index?>">
                        <i class="icon wb-edit" aria-hidden="true"></i>
                    </button>


                </td>
            </tr>

            <?php
                                                                $no++;
                                                                }          
                                                                }else{?>
            <tr>
                <td class="align-middle text-center" colspan="7">
                    " BELUM ADA DATA PLANNING PROPOSAL "
                </td>
                <?php } ?>
            </tr>
        </tbody>
</div>