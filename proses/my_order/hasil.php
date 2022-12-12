<?php 
include("../../config/config.php");
include("../functions.php");
include("../services/notifications.php");

if($_GET['periode'] != ''){
	$id_fis = $_GET['periode']; 
}else{
	$id_fis = ''; 
}

$fiscal_aktif = single_query("SELECT * from time_fiscal WHERE id_fis = '$id_fis'");
$awalf = date("d M Y", strtotime($fiscal_aktif['awal']));
$akhirf = date("d M Y", strtotime($fiscal_aktif['akhir']));


?>
<div class="row">
    <div class="col-lg-6 col-md-6">
        <h6 class="font-size-18 font-weight-400">Periode ( <span style="color:red;"><?= $fiscal_aktif['periode']; ?>
            </span>
            ) :
            <span style="color:red;"><?= $awalf; ?></span>
            s.d
            <span style="color:red;"><?= $akhirf; ?>
            </span>
        </h6>
    </div>
</div>
<?php 
$proposal = mysqli_query($link_yics ,"SELECT id_prop,
                            depart.id_dep AS id_dep,
                            depart.depart AS depart,
                            kategori_proposal.kategori AS kategori,
                            time_fiscal.status,
                            proposal.proposal AS proposal,
                            proposal.cost AS cost,
                            proposal.benefit AS benefit,
                            proposal.lampiran
                            FROM proposal 
                            LEFT JOIN depart ON proposal.id_dep = depart.id_dep
                            LEFT JOIN kategori_proposal  ON proposal.id_kat = kategori_proposal.id_kat
                            LEFT JOIN time_fiscal  ON proposal.id_fis = time_fiscal.id_fis  
                            

WHERE time_fiscal.id_fis = '$id_fis' AND proposal.username= {$_SESSION['yics_user']} GROUP BY proposal.proposal ASC")or die (mysqli_error($link_yics));
if(mysqli_num_rows($proposal)>0){
while($data = mysqli_fetch_assoc($proposal)){?>
<?php $id_prop=$data['id_prop']; ?>

<br>
<div class="garis">
    <div class="table-responsive">
        <table class="table  text-uppercase " style="border-spacing: 15px;">
            <tr>
                <td class="judul align-middle text-left " width="100px">
                    Departement
                </td>
                <td class="judul align-middle text-left " width="5px">
                    &nbsp;:&nbsp;
                </td>
                <td class="judul align-middle text-left " width="700px">
                    <?php echo $data['depart']; ?>
                </td>

                <td class="judul align-middle text-center bg-yellow-100" width="200px">
                    <!-- query update progress -->
                    <?php   
$track_prop = mysqli_query($link_yics ,"SELECT
tracking_prop.id_prog AS id_prog, 
tracking_prop.id_approval AS id_approval,
`time`,
progress.step AS step,
progress.nama_progress AS progress,
approval.approval AS approval
FROM tracking_prop   
LEFT JOIN 

( SELECT  progress.step, progress.id_prog, progress.nama_progress AS nama_progress 
FROM progress JOIN tracking_prop ON tracking_prop.id_prog = progress.id_prog 
WHERE tracking_prop.id_prop = '$data[id_prop]'
ORDER BY progress.step DESC) progress 
ON tracking_prop.id_prog = progress.id_prog  
LEFT JOIN approval ON tracking_prop.id_approval = approval.id_approval
WHERE tracking_prop.id_prop = '$data[id_prop]' ORDER BY progress.step DESC LIMIT 1") or die (mysqli_error($link_yics));

if(mysqli_num_rows($track_prop)>0){
$data_track = mysqli_fetch_assoc($track_prop); 
// mencatak angka persenan
$persen = ($data_track['id_approval'] == 1 )?(($data_track['step']/5)*100):100;
$lacak=$data_track['progress'];
if($data_track['id_approval'] == 1 ){
$text_progress = $persen."%";
$color_progress = "bg-green-100";
}else{
$text_progress = "STOP";
$color_progress = "bg-danger";
}
?>

                    <?php 
}else{
$persen = 0;
$color_progress = "bg-green-100";
$text_progress = "0%";
$lacak="Belum diproses";
}
?>
                    <?= $lacak;?>
                </td>



            </tr>
            <tr>
                <td class="judul align-middle text-left " width="100px">
                    Category
                </td>
                <td> &nbsp;:&nbsp;</td>
                <td class="judul align-middle text-left ">
                    <?php echo $data['kategori']; ?>

                </td>
                </td>
                <td class="judul align-middle text-center font-size-60 <?= $color_progress ?>" rowspan="3">
                    <?=  $text_progress; ?>
                </td>
            </tr>
            <tr>
                <td class="judul align-middle text-left " width="100px">
                    Proposal
                </td>
                <td> &nbsp;:&nbsp;</td>
                <td><?php echo $data['proposal']; ?> <a href="../image/uploads/<?= $data['lampiran'] ?>"
                        target="_blank">

                        <i class="icon fa-file-pdf-o font-size-25"></i></a>
                </td>

            </tr>

            <tr>
                <td class="text-left" style="color:black;" width="10px">
                    Cost</td>
                <td> &nbsp;:&nbsp;</td>
                <td class="judul align-middle text-left ">
                    Rp
                    <?= number_format ($data['cost'],0,',','.')." "."Million"; ?>
                </td>
            </tr>
            <tr>
                <td class="text-left" style="color:black;" width="10px">
                    Benefit</td>
                <td> &nbsp;:&nbsp;</td>
                <td class="judul align-middle text-left ">
                    <?= $data['benefit']; ?>
                </td>
                <td class="judul align-middle text-center bg-blue-100 "><a
                        href="viewplan.php?ubah=<?php echo $data['id_prop']; ?>">VIEW
                        >></a>

                </td>
            </tr>

            <tr>
                <td colspan="7">
                </td>
            </tr>
        </table>
    </div>
    <div class="row text-center">
        <div class="col-lg-12 col-md-12">
            <!-- <button type="button"
class="btn btn-outline btn-default icon ti-angle-double-down font-size-30  my--30 "
data-toggle="dropdown" aria-expanded="false">
</button> -->
            <div aria-labelledby="exampleBulletDropdown1">
                <div class="row text-left">
                    <div class="col-lg-6 col-md-6">
                        <h6 class="font-size-18 font-weight-400">List No IA.
                        </h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table
                        class="table table-striped table-hover table-bordered w-full display text-nowrap example0 text-uppercase"
                        id="list-ia">
                        <thead class="text-center">
                            <tr class="bg-info align-middle">
                                <th hidden>id ia</th>
                                <th class="align-middle text-center">NO</th>
                                <th class="align-middle text-center">NO IA
                                </th>
                                <th class="align-middle text-center">
                                    DESKRIPSI</th>
                                <th class="align-middle text-center">COST IA
                                </th>
                                <th class="align-middle text-center">VALID
                                    UNTIL
                                </th>
                                <th class="align-middle text-center">CT
                                    UPDATE</th>
                                <th class="align-middle text-center">
                                    STATUS</th>
                                <th class="align-middle text-center">
                                    PROGRESS</th>
                                <th class=" align-middle text-center">LACAK
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
$ia = mysqli_query($link_yics ,"SELECT *
FROM ia 
JOIN proposal ON proposal.id_prop = ia.id_prop
JOIN data_user ON data_user.username = ia.pic_ia

WHERE proposal.id_prop= '$id_prop' GROUP BY id_ia ")or die (mysqli_error($link_yics));
$no=1;
if(mysqli_num_rows($ia)>0){ 
while($data_ia = mysqli_fetch_assoc($ia)){?>


                            <tr>
                                <td class=" align-middle text-center" hidden>
                                    <?= $data_ia['id_ia'] ?>
                                </td>
                                <td class=" align-middle text-center">
                                    <?= $no; ?>
                                </td>
                                <td class=" align-middle text-center">
                                    <?= $data_ia['ia'] ?>
                                </td>
                                <td class=" align-middle text-center">

                                    <?= $data_ia['deskripsi'] ?>
                                </td>
                                <td class=" align-middle text-center">RP
                                    <?= number_format ($data_ia['cost_ia'],0,',','.')." "."Million"; ?>
                                </td>
                                <td class=" align-middle text-center">
                                    <?= date("d M Y", strtotime($data_ia['time_ia'])); ?>
                                </td>
                                <td class=" align-middle text-center">
                                    <?= $data_ia['nama']; ?>
                                </td>
                                <td class="align-middle text-center">
                                    <?php  
	
	///menghitung baris pada progress
$kol=mysqli_query($link_yics ,"SELECT id_prog FROM progress")or die (mysqli_error($link_yics));
$kolom=mysqli_num_rows($kol);                         

	$track_ia = mysqli_query($link_yics ,"SELECT
	tracking_ia.id_prog AS id_prog, 
	tracking_ia.approval AS id_approval,
	
	progress.step AS step,
	progress.nama_progress AS progress,
	approval.approval AS approval
	FROM tracking_ia   
	LEFT JOIN 
	
		( SELECT  progress.step, progress.id_prog, progress.nama_progress AS nama_progress 
		FROM progress JOIN tracking_ia ON tracking_ia.id_prog = progress.id_prog 
		WHERE tracking_ia.id_ia = '$data_ia[id_ia]'
		ORDER BY progress.step DESC) progress 
	ON tracking_ia.id_prog = progress.id_prog  
	LEFT JOIN approval ON tracking_ia.approval = approval.id_approval
	WHERE tracking_ia.id_ia = '$data_ia[id_ia]' ORDER BY progress.step DESC LIMIT 6") or die (mysqli_error($link_yics));
	
	if(mysqli_num_rows($track_ia)>0){
		$data_track = mysqli_fetch_assoc($track_ia); 
		// mencatak angka persenan
		
		$persen = ($data_track['id_approval'] == 1 )?(ceil(($data_track['step']/$kolom)*100)):100;
		if($data_track['id_approval'] == 1 ){
			$text_progress = $persen."%";
			$color_progress = "progress-bar-info";
		}else{
			$text_progress = "STOP";
			$color_progress = "progress-bar-danger";
		}
		?>
                                    <span
                                        class=" badge badge-round badge-success badge-lg"><?=$data_track['progress']?></span>
                                    <?php 
		}else{
			$persen = 0;
			$color_progress = "";
			$text_progress = "0%";
		}
		?>

                                </td>
                                <td class=" align-middle text-center">
                                    <div class="progress mt-20 text-center ">
                                        <div class="progress-bar progress-bar-striped  <?=$color_progress?> active"
                                            aria-valuenow="" aria-valuemin="0" aria-valuemax="100"
                                            style="width: <?=$persen?>%;" aria-valuemax="100" role="progressbar">
                                            <?=$text_progress?>
                                        </div>
                                    </div>
                                </td>

                                <td class=" align-middle text-center">
                                    <a href="Tracking.php?id_ia=<?= $data_ia['id_ia'] ?>" class="<?= $tombol_hidup ?>">
                                        <button type="button" class="btn btn-icon btn-info">
                                            <i class="icon wb-eye" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <?php 
			 $no++;
}
}
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
}
}else{
echo '<div class="alert alert-danger" role="alert">Tidak ada pengajuan proposal di periode ini...</div>';
}
?>

</div>
</div>
</div>