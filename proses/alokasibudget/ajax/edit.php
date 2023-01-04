<?php 
include("../../../config/config.php");
$id=$_POST['id'];
$idDept=$_POST['idDept'];
$ind=$_POST['ind'];
                            $isi_m = mysqli_query($link_yics ,"SELECT *
                            FROM plan_proposal
                            JOIN depart ON plan_proposal.id_dep = depart.id_dep
                            JOIN kategori_proposal  ON plan_proposal.id_kat = kategori_proposal.id_kat
                            JOIN time_fiscal  ON plan_proposal.id_fis = time_fiscal.id_fis  
                            WHERE plan_proposal.id_prop='$id'")or die (mysqli_error($link_yics));
                            $no=1;                      
						  // untuk data modal
                          if(mysqli_num_rows($isi_m)>0){
                            $isi_mo = mysqli_fetch_assoc($isi_m);
                            $id_fis_m=$isi_mo['id_fis'];
                            $periode_m=$isi_mo['periode'];
                            $id_prop_m=$isi_mo['id_prop'];
                            $depart_m=$isi_mo['depart'];
                            $id_dep_m=$isi_mo['id_dep'];
                            $area_m=$isi_mo['area'];
                            $kategori_m=$isi_mo['kategori'];
                            $id_kat_m=$isi_mo['id_kat'];
                            $proposal_m=$isi_mo['proposal'];
                            $cost_m = number_format ($isi_mo['cost'],2,',','');
                          }            
                            ?>




<!-- Modal Edit Alokasi Budget -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <h3 class="modal-title">Edit Data Planning Proposal</h3>
</div>
<div class="row"></div>
<div class="modal-body" class="text-uppercase">
    <input name="add" id="idDept" value="<?= $idDept ?>" hidden>
    <input name="add" id="ind" value="<?= $ind ?>" hidden>
    <input name="mata_uang" type="number" value="1" class="form-control" hidden>
    <div class="form-group row">
        <h4 class="col-md-10 modal-title text-left" style="color:black;">SUBJECT</h4>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label" style="color:black;">Periode tahun</label>
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" name="periode" id="periode" class="form-control" readonly value="<?= $periode_m ?>">
                <input name="id_fis" id="id_fis" type="text" class="form-control" value="<?= $id_fis_m ?>" readonly
                    hidden>
            </div>
        </div>
        <label class="col-md-2 col-form-label" style="color:black;">Department</label>
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" class="form-control" form-control" readonly id="depart" value="<?= $depart_m ?>">
                <input name="dep" id="dep" type="text" class="form-control" value="<?= $id_dep_m ?>" readonly hidden>
            </div>
        </div>

    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label text-left" style="color:black;">Pic Area</label>
        <div class="col-md-4">
            <div class="form-group">
                <select type="text" name="area_m" id="area" class="form-control">
                    <?php  
                                           $area = mysqli_query($link_yics,"SELECT * FROM data_user WHERE id_dep = '$id_dep_m'") or die (mysqli_error($link_yics));                                       
                                            foreach ($area AS $are){
                                            $areab= $are['area'];   
                                             // logic yang terpilih  
                                          if($area_m== $areab){
                                            $select_a ="selected";
                                          }else{
                                            $select_a="";  
                                          }
                                           // end logic yang terpilih                                                                                  
                                            ?>
                    <option <?= $select_a ?> value="<?= $areab ?>"><?= $areab ?></option>
                    <?php
                                            }
                                            ?>
                </select>
                <span class="pesan-area" style="display:none;color:red;">Sahabat
                    harus mengisi area</span>
            </div>
        </div>
        <label class="col-md-2 col-form-label text-left" style="color:black;">Category</label>
        <div class="col-md-4">
            <div class="form-group">
                <select name="id_ket_m" id="katgr" class="form-control" required>
                    <?php  
                                            $kategori = mysqli_query($link_yics,"SELECT * FROM kategori_proposal")or die (mysqli_error($link_yics)); ;                                       
                                            foreach ($kategori AS $kat){
                                            $id_kat = $kat['id_kat'];
                                            $kate = $kat['kategori'];    

                                          // logic yang terpilih  
                                          if($id_kat_m== $id_kat){
                                            $select ="selected";
                                          }else{
                                            $select="";  
                                          }
                                           // end logic yang terpilih  
                                          ?>
                    <option <?=$select?> value="<?= $id_kat ?>"><?= $kate ?></option>
                    <?php
                                            }
                                            ?>
                </select>
                <span class="pesan-kategori" style="display:none;color:red;">Sahabat
                    harus mengisi kategori</span>
            </div>

            </td>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label text-left" style="color:black;">Proposal</label>
        <div class="col-md-10">
            <input type="text" class="form-control text-uppercase" name="proposal_m" id="proposal"
                placeholder=" Judul Proposal..." autocomplete="off" value="<?= $proposal_m ?>" required>
            <span class="pesan-proposal" style="display:none;color:red;">Sahabat
                harus mengisi proposal</span>
            <input type="text" class="form-control text-uppercase" name="id_pro_m" id="id_pro_m"
                placeholder=" Judul Proposal..." autocomplete="off" value="<?= $id ?>" hidden>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label" style="color:black;">Cost</label>
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">IDR</span>
                </div>
                <input required name="cost_m" id="cost" type="text" class="form-control" id="rupiah"
                    placeholder="Isi Cost Proposal..." value="<?= $cost_m ?>">
                <div class="input-group-prepend ">
                    <span class="input-group-text bg-yellow-100">MILLION</span>
                </div>

            </div>
            <span class="pesan-cost" style="display:none;color:red;">
                Isi cost...</span>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="reset" class="btn btn-danger" id="resetmodal">Reset</button>
    <button type="submit" class="btn btn-primary ubah1">Ubah</button>
</div>


<!-- End Edit Alokasi Budget -->