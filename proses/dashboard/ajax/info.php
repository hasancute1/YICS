<?php 
include("../../../config/config.php");
$id=$_POST['id'];

                            $isi_m = mysqli_query($link_yics ,"SELECT *
                            FROM proposal
                            JOIN depart ON proposal.id_dep = depart.id_dep
                            JOIN kategori_proposal  ON proposal.id_kat = kategori_proposal.id_kat
                            JOIN time_fiscal  ON proposal.id_fis = time_fiscal.id_fis                                
                            JOIN data_user  ON data_user.username = proposal.username 
                            JOIN area  ON data_user.id_area = area.id_area
                            WHERE proposal.id_prop='$id'")or die (mysqli_error($link_yics));
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
                            $hp=$isi_mo['hp'];
                            $npk=$isi_mo['username'];
                            $nama=$isi_mo['nama'];
                            $lampiran=$isi_mo['lampiran'];
                            $cost_m = number_format ($isi_mo['cost'],2,',','');
                          }            
                            ?>




<!-- Modal Edit Alokasi Budget -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <h3 class="modal-title">Data PIC Proposal</h3>
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
        <label class="col-md-2 col-form-label text-left" style="color:black;">Area</label>
        <div class="col-md-10">
            <input type="text" class="form-control text-uppercase" name="proposal_m" id="proposal"
                placeholder=" Judul Proposal..." autocomplete="off" value="<?= $area_m ?>" required readonly>

        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-left" style="color:black;">Nama</label>
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" class="form-control text-uppercase" readonly value="<?= $nama ?>">
            </div>
        </div>
        <label class="col-md-2 col-form-label text-left" style="color:black;">Npk</label>
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" class="form-control" readonly value="<?= $npk ?>">
            </div>
            </td>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label text-left" style="color:black;">No Hp</label>
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" class="form-control" readonly value="<?= $hp ?>">
            </div>
            </td>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label class="col-md-2 col-form-label text-left" style="color:black;">Category</label>
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" class="form-control" readonly value="<?= $kategori_m ?>">
            </div>
            </td>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label text-left" style="color:black;">Proposal</label>
        <div class="col-md-10">
            <div class="input-group">
                <input type="text" class="form-control text-uppercase" name="proposal_m" id="proposal"
                    placeholder=" Judul Proposal..." autocomplete="off" value="<?= $proposal_m ?>" required readonly>
                <div class="input-group-prepend ">
                    <a href="../image/uploads/<?= $lampiran; ?>" target="_blank" class="input-group-text bg-red-100">

                        <i class="icon  fa-file-archive-o " style="font-size:20px;"></i></a>
                </div>
            </div>

        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label" style="color:black;">Cost</label>
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">IDR</span>
                </div>
                <input required name="cost_m" id="cost" type="text" class="form-control bg-green-100" id="rupiah"
                    readonly value="<?= $cost_m ?>">
                <div class="input-group-prepend ">
                    <span class="input-group-text bg-yellow-100">MILLION</span>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="" class="btn btn-danger" id="resetmodal">Tutup</button>
</div>


<!-- End Edit Alokasi Budget -->