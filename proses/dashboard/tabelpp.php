<?php
 //set zona waktu
date_default_timezone_set('Asia/Jakarta');
//Start session
session_start();

//koneski database yics
$dbhost_yics = "localhost";
$dbuser_yics = "root";
$dbpass_yics = "";
$dbname_yics ="yics_db";
$link_yics = mysqli_connect($dbhost_yics,$dbuser_yics,$dbpass_yics,$dbname_yics);
if (!$link_yics){
//jika
header("location: ../base/html/page/error-404.html");
}


    function query ($query) {
        global $link_yics;
        $result = mysqli_query ($link_yics,$query);
    $rows =[];
    while ($row  = mysqli_fetch_assoc ($result)) {
        $rows[]=$row;
    }
    return $rows;
    }
    $cari = $_GET["cari"];

    $query = "SELECT * FROM planning
    WHERE
    depart LIKE '%$cari%' OR 
    category LIKE '%$cari%' OR 
    proposal LIKE '%$cari%' 
    ";
    $planning = query($query);
    // var_dump($mahasiswa); 
        
?>

<table width="100%" class="table table-bordered table-hover table table-responsive  10px text-nowrap table-striped "  >
                        <thead class="text-center">
                          <tr class="bg-info align-" height="0px">
                            <th class="align-middle text-center" height="10px" rowspan="2">N0</th>
                            <th class="align-middle text-center" height="10px" rowspan="2">DEPART.</th>
                            <th class="align-middle text-center" height="10px" rowspan="2">CATEGORY</th>
                            <th class="align-middle text-center" height="10px" rowspan="2">PROPOSAL</th>
                            <th class="align-middle text-center" height="10px" colspan="5">STEP ASSIGNMENT</th>
                            <th class="align-middle text-center" height="10px" rowspan="2">PROGRESS</th>
                            <th class="align-middle text-center" height="10px" rowspan="2">ACTION</th>
                          </tr >
                            <tr class="bg-info font size = 20px" height="10px">
                              <td class="align-middle text-center" width="120px" height="10px">Quatation</td>
                              <td class="align-middle text-center" width="120px" height="10px">Assignment</td>
                              <td class="align-middle text-center" width="120px" height="10px">Request for Negoisasi</td>
                              <td class="align-middle text-center" width="120px" height="10px">Price Confirmation</td>
                              <td class="align-middle text-center" width="120px" height="10px">Budget Planning</td>
                            </tr>
                        </thead>
                        <tbody> 
                          <?php $i=1 ; ?>
                          <?php foreach ($planning as $plan) : ?>
                          <tr class="align-middle text-center" >
                            <td class="align-middle text-center" ><?php echo $i; ?></td>
                            <td class="align-middle text-center" ><?php echo $plan["depart"] ?></td>
                            <td class="align-middle text-center" ><?php echo $plan["category"] ?></td>
                            <td class="align-middle text-center" ><?php echo $plan["proposal"] ?></td>
                            <td class="align-middle text-center" > 
                              <a href="" data-toggle="tooltip" data-original-title="<?php echo $plan["time_quat"] ?>">                                     
                              <img <?php 
                                  if ($plan['quatation']==""){
                                      echo 'src=""';
                                  } else {
                                  if($plan['quatation']==1){
                                    echo 'src="../../image/ok.png"';
                                  } else if ($plan['quatation']==0){
                                    echo 'src="../../image/ng.png"';
                                  } 
                                    }
                                  ?> 
                                width="40px">  
                              </a>       
                            </td>
                            <td class="align-middle text-center" > 
                              <a href="" data-toggle="tooltip" data-original-title="<?php echo $plan["time_ass"] ?>">                                     
                              <img <?php 
                                  if ($plan['assignment']==""){
                                      echo 'src=""';
                                  } else {
                                  if($plan['assignment']==1){
                                    echo 'src="../../image/ok.png"';
                                  } else if ($plan['assignment']==0){
                                    echo 'src="../../image/ng.png"';
                                  } 
                                    }
                                  ?>   
                                  width="40px">     
                            </td>
                            <td class="align-middle text-center" >
                            <a href="" data-toggle="tooltip" data-original-title="<?php echo $plan["time_rfn"] ?>">
                            <img <?php 
                                  if ($plan['rfn']==""){
                                      echo 'src=""';
                                  } else {
                                  if($plan['rfn']==1){
                                    echo 'src="../../image/ok.png"';
                                  } else if ($plan['rfn']==0){
                                    echo 'src="../../image/ng.png"';
                                  } 
                                    }
                                  ?>  
                                  width="40px">  
                            </td>
                            <td class="align-middle text-center" >
                            <a href="" data-toggle="tooltip" data-original-title="<?php echo $plan["time_pc"] ?>">
                            <img <?php 
                                  if ($plan['pc']==""){
                                      echo 'src=""';
                                  } else {
                                  if($plan['pc']==1){
                                    echo 'src="../../image/ok.png"';
                                  } else if ($plan['pc']==0){
                                    echo 'src="../../image/ng.png"';
                                  } 
                                    }
                                  ?>  
                                  width="40px">  
                            </td>
                            <td class="align-middle text-center" >
                            <a href="" data-toggle="tooltip" data-original-title="<?php echo $plan["time_bp"] ?>">
                            <img <?php 
                                  if ($plan['bp']==""){
                                      echo 'src=""';
                                  } else {
                                  if($plan['bp']==1){
                                    echo 'src="../../image/ok.png"';
                                  } else if ($plan['bp']==0){
                                    echo 'src="../../image/ng.png"';
                                  } 
                                    }
                                  ?>  
                                  width="40px">  
                            </td>
                            <td class="align-middle text-center" >
                              <div class="progress mt-20">
                                <div class="progress-bar progress-bar-striped active" aria-valuenow="" aria-valuemin="0"
                                  aria-valuemax="100" style="width:
                                  <?php 
                                      echo (
                                              floatval($plan['quatation'])+
                                              floatval($plan['assignment'])+
                                              floatval($plan['rfn'])+
                                              floatval($plan['pc'])+
                                              floatval($plan['bp'])
                                            )/(5/100);
                                      echo "%";
                                  ?> 
                                  " role="progressbar">
                                  <?php 
                                      echo (
                                              floatval($plan['quatation'])+
                                              floatval($plan['assignment'])+
                                              floatval($plan['rfn'])+
                                              floatval($plan['pc'])+
                                              floatval($plan['bp'])
                                            )/(5/100);
                                      echo "%";
                                  ?> 
                                </div>
                              </div>
                            </td>
                            
                            <td class="align-middle text-center" >
                              <a data-toggle="tooltip" data-original-title="Edit">
                                <button type="button" class="btn btn-icon btn-success" data-toggle="modal" data-target="#EditPlaningProposal2">
                                  <i class="icon wb-edit" aria-hidden="true"></i>
                                </button>
                              </a>
                              <!-- Modal Edit plannning proposal 2 -->
                              <div class="modal fade modal-info " id="EditPlaningProposal2" aria-hidden="true" aria-labelledby="EditPlaningProposal2"
                                role="dialog" tabindex="-1">
                                  <div class="modal-dialog modal-simple modal-center modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">×</span>
                                        </button>
                                        <h3 class="modal-title">Edit Planning Proposal</h3>
                                      </div>
                                      <div class="row">
                                      </div>
                                      <div class="modal-body">
                                        <form>
                                          <div class="form-group row">
                                              <h4 class="col-md-12 modal-title text-left" style="color:black;">SUBJECT</h4>                                      
                                            </div>
                                          <div class="form-group row">
                                              <label class="col-md-2 col-form-label text-left" style="color:black;">Department</label>
                                              <div class="col-md-4">
                                              <input type="text" class="form-control bg-grey-200" name="depart" placeholder=" Judul Proposal" autocomplete="off" value="Body Plant 2">
                                                </div>
                                                <label class="col-md-2 col-form-label text-left" style="color:black;">Category</label>
                                                <div class="col-md-4">
                                                <input type="text" class="form-control bg-grey-200" name="category" placeholder=" Judul Proposal" autocomplete="off" value="Improvement">
                                                </div>
                                            </div>                                  
                                            <div class="form-group row">
                                              <label class="col-md-2 col-form-label text-left" style="color:black;">Proposal</label>
                                              <div class="col-md-10">
                                              <input type="text" class="form-control bg-grey-200" name="proposal" placeholder=" Judul Proposal" autocomplete="off" value="Making robot spot">
                                              </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                              <h4 class="col-md-12 modal-title text-left" style="color:black;">STEP ASSIGMENT</h4>                                      
                                            </div>
                                            <div class="form-group row text-left">
                                              <label class="col-md-2 col-form-label " style="color:black;">Step</label>
                                              <div class="col-md-4">                                      
                                              <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="1.Quatation">
                                              </div>
                                              <label class="col-md-2 col-form-label " style="color:black;">Date</label>
                                              <div class="col-md-4">                                      
                                              <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Tanggal" autocomplete="off" value="22 April 2022">
                                              </div>
                                            </div>
                                            <div class="form-group row text-left">
                                              <label class="col-md-2 col-form-label " style="color:black;"></label>
                                              <div class="col-md-4">                                      
                                              <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Judul Proposal" autocomplete="off" value="2.Assignment">
                                              </div>
                                              <label class="col-md-2 col-form-label " style="color:black;"></label>
                                              <div class="col-md-4">                                      
                                              <input type="text" class="form-control bg-grey-200" name="name" placeholder=" Tanggal" autocomplete="off" value="22 April 2022">
                                              </div>
                                            </div>
                                            
                                            <hr>
                                            <div class="form-group row text-left">
                                              <label class="col-md-2 col-form-label " style="color:black;"></label>
                                              <div class="col-md-4">                                      
                                                  <div class="form-group">
                                                    <select class="form-control">
                                                      <option>Pilih Step</option>                                                                                                                                        
                                                      <option>3.Request for Negoisasi</option>                                                                             
                                                      <option>4.Price Confirmation 	</option>                                                                             
                                                      <option>5.Budget Planning</option>                                                                             
                                                    </select>
                                                  </div>
                                              </div>
                                              <label class="col-md-2 col-form-label " style="color:black;"></label>
                                              <div class="col-md-4">                                      
                                              <input type="date" class="form-control" name="name" placeholder=" Tanggal" autocomplete="off">
                                              </div>
                                            </div>
                                        </form>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Reset</button>
                                        <button type="button" class="btn btn-primary">Save</button>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                            <!-- End Edit plannning proposal 2-->  
                              <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Hapus">
                                <button type="button" class="btn btn-icon btn-danger HapusData">
                                  <i class="icon oi-trashcan" aria-hidden="true"></i>
                                </button>
                              </a> 
                                </button>
                              </a> 
                            </td>
                          </tr>
                          <?php $i++; ?>
                          <?php endforeach ; ?>
                            
                        </tbody>
                      </table>