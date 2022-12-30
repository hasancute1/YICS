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
                           $sum_all = number_format ($bdget_all['cost_dep'],0,',','.');    
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
                          $sum_dep = number_format ($bdget_dep['cost_dep'],0,',','.');    
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
                            WHERE time_fiscal.id_fis= '$id' AND depart.id_dep='$dep'")or die (mysqli_error($link_yics));
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
                    <button type=" button" class="btn btn-outline btn-icon btn-danger hapus" data-id="<?= $id_prop ?>"
                        data-dept="<?=$dep?>" data-in="<?=$index?>">
                        <i class="icon oi-trashcan" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btn btn-outline btn-icon btn-info edit" data-toggle="modal"
                        data-target="#EditAlokasiBudget" data-id="<?= $id_prop ?>" data-dept="<?=$dep?>"
                        data-in="<?=$index?>" data-pro="<?= $id_prop ?>" data-ktr="<?= $id_kat ?>"
                        data-cst="<?= $cost ?>" data-dpt="<?= $depart ?>" data-psl="<?= $proposal ?>"
                        data-are="<?= $area ?>" data-prd="<?= $periode ?>">
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

        <?php  
                        //     $isi_m = mysqli_query($link_yics ,"SELECT *
                        //     FROM plan_proposal
                        //     JOIN depart ON plan_proposal.id_dep = depart.id_dep
                        //     JOIN kategori_proposal  ON plan_proposal.id_kat = kategori_proposal.id_kat
                        //     JOIN time_fiscal  ON plan_proposal.id_fis = time_fiscal.id_fis  
                        //     WHERE plan_proposal.id_prop='$id_prop'")or die (mysqli_error($link_yics));
                        //     $no=1;                      
						//   // untuk data modal
                        //   if(mysqli_num_rows($isi_m)>0){
                        //     $isi_mo = mysqli_fetch_assoc($isi_m);
                        //     $id_fis_m=$isi_mo['id_fis'];
                        //     $periode_m=$isi_mo['periode'];
                        //     $id_prop_m=$isi_mo['id_prop'];
                        //     $depart_m=$isi_mo['depart'];
                        //     $area_m=$isi_mo['area'];
                        //     $kategori_m=$isi_mo['kategori'];
                        //     $proposal_m=$isi_mo['proposal'];
                        //     $cost_m = number_format ($isi_mo['cost'],0,',','.');
                        //   }            
                            ?>
        <!-- Modal Edit Alokasi Budget -->

        <div class="modal fade modal-info " id="EditAlokasiBudget" aria-hidden="true"
            aria-labelledby="EditAlokasiBudget" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-simple modal-center modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h3 class="modal-title">Edit Data Planning Proposal</h3>
                    </div>
                    <div class="row">
                    </div>

                    <div class="modal-body" class="text-uppercase">
                        <form action="../proses/dashboard/tambahplanning.php" method="post">
                            <input type="hidden" name="add">
                            <input name="mata_uang" type="number" value="1" class="form-control" hidden>
                            <div class="form-group row">
                                <h4 class="col-md-10 modal-title text-left" style="color:black;">SUBJECT</h4>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" style="color:black;">Periode tahun</label>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="periode" id="periode" class="form-control" readonly
                                            value="">
                                        <input name="id_fis" id="id_fis" type="text" class="form-control" readonly
                                            hidden>
                                    </div>
                                </div>
                                <label class="col-md-2 col-form-label" style="color:black;">Department</label>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" form-control" readonly id="depart">
                                        <input name="dep" id="dep" type="text" class="form-control" readonly hidden>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-left" style="color:black;">Pic Area</label>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select type="text" name="area" id="area" class="form-control">
                                            <?php  
                                           $area = mysqli_query($link_yics,"SELECT * FROM data_user WHERE id_dep = '$dep'") or die (mysqli_error($link_yics));                                       
                                            foreach ($area AS $are){
                                            $areab= $are['area'];                                                                                   
                                            ?>
                                            <option value="<?= $areab ?>"><?= $areab ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <label class="col-md-2 col-form-label text-left" style="color:black;">Category</label>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="katgr" id="katgr" class="form-control" required>
                                            <?php  
                                            $kategori = mysqli_query($link_yics,"SELECT * FROM kategori_proposal");                                       
                                            foreach ($kategori AS $kat){
                                            $id_kat = $kat['id_kat'];
                                            $kate = $kat['kategori'];                                           
                                            ?>
                                            <option value="<?= $id_kat ?>"><?= $kate ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-left" style="color:black;">Proposal</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control text-uppercase" name="proposal" id="proposal"
                                        placeholder=" Judul Proposal..." autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" style="color:black;">Cost</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">IDR</span>
                                        </div>

                                        <input required name="cost" id="cost" type="text" class="form-control"
                                            id="rupiah" placeholder="Isi Cost Proposal..." value="<?= $cost_m ?>">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text bg-yellow-100">MILLION</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
</div>
<!-- End Edit Alokasi Budget -->




<!-- cara mas ana..... -->
<script>
$(".edit1").on("click", ".edit", function() {
    var data = this;
    var data1 = $(this).data("pro");
    var data2 = $(this).data("ktr");
    var data3 = $(this).data("cst");
    var data4 = $(this).data("dpt");
    var data5 = $(this).data("psl");
    var data6 = $(this).data("are");
    var data7 = $(this).data("prd");

    $("#periode").val(data1);
    $("#katgr").val(data2);
    $("#cost").val(data3);
    $("#depart").val(data4);
    $("#proposal").val(data5);
    $("#area").val(data6);
    $("#periode").val(data7);
})
</script>