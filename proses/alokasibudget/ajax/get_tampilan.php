<?php 
include("../../../config/config.php");
$dep=$_GET['idDept'];
$id=$_GET['id_fis'];
$index=$_GET['ind'];


?>

<div class="table table-responsive">
    <table class="table text-nowrap table-bordered text-uppercase" style="width:100%">
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
                            WHERE time_fiscal.id_fis= '$id' AND depart.id_dep='$dep'")or die (mysqli_error($link_yics));
                            $no=1;                      
						  // untuk memvalidasi apakah ada datanya
                          if(mysqli_num_rows($isi)>0){
                           while($datad = mysqli_fetch_assoc($isi)){
                            $id_prop=$datad['id_prop'];
                            $area=$datad['area'];
                            $kategori=$datad['kategori'];
                            $proposal=$datad['proposal'];
                            $cost = number_format ($datad['cost'],0,',','.');             
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
                    <button type=" button" class="btn btn-icon btn-danger hapus" data-id="<?= $id_prop ?>"
                        data-dept="<?=$dep?>" data-in="<?=$index?>">
                        <i class="icon oi-trashcan" aria-hidden="true"></i>
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