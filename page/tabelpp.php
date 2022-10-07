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
                <div id="wadahtabel" class="table table-bordered table table-responsive text-nowrap table-center">
                      <table class="table">
                        <thead class="text-center">
                          <tr class="bg-info align-" height="10px">
                            <th class="align-middle text-center" height="10px" rowspan="2">N0</th>
                            <th class="align-middle text-center" height="10px" rowspan="2">DEPART.</th>
                            <th class="align-middle text-center" height="10px" rowspan="2">CATEGORY</th>
                            <th class="align-middle text-center" height="10px" rowspan="2">PROPOSAL</th>
                            <th class="align-middle text-center" height="10px" colspan="5">STEP ASSIGNMENT</th>
                            <th class="align-middle text-center" height="10px" rowspan="2">PROGRESS</th>
                            <th class="align-middle text-center" height="10px" rowspan="2">ACTION</th>
                          </tr >
                            <tr>
                              <th class="align-middle text-center" width="120px" height="10px">Quatation</th>
                              <th class="align-middle text-center" width="120px" height="10px">Assignment</th>
                              <th class="align-middle text-center" width="120px" height="10px">Request for Negoisasi</th>
                              <th class="align-middle text-center" width="120px" height="10px">Price Confirmation</th>
                              <th class="align-middle text-center" width="120px" height="10px">Budget Planning</th>
                            </tr>
                        </thead>
                        <tbody>  
                          <?php $i=1 ; ?>
                          <?php foreach ($planning as $plan) : ?>
                          <tr class="align-middle text-center" id="<?php echo $plan["id"] ?>">
                            <td class="align-middle text-center" ><?php echo $i; ?></td>
                            <td class="align-middle text-center" ><?php $dep_q = mysqli_query($link_yics,"SELECT * FROM dept_account 
                            WHERE id_dept_account = '$plan[depart]'") or die (mysqli_error($link_yics)); foreach($dep_q as $dept_r) : 
                            echo $dept_r["department_account"]; endforeach;?>
                            </td>
                            <td class="align-middle text-center" ><?php echo $plan["category"] ?></td>
                            <td class="align-middle text-center" ><?php echo $plan["proposal"] ?></td>
                            <td class="align-middle text-center" >
                              <?php 
                              $quat=$plan["time_quat"];
                              $time_quat = date_create("$quat");
                               ?> 
                              <a href="" data-toggle="tooltip" data-original-title="<?php echo date_format($time_quat, "d M Y, H:i a"); ?>">                                     
                              <img <?php 
                                  if ($plan['quatation']==""){
                                      echo 'src=""';
                                  } else {
                                  if($plan['quatation']==1){
                                    echo 'src="../image/ok.png"';
                                  } else if ($plan['quatation']==0){
                                    echo 'src="../image/ng.png"';
                                  } 
                                    }
                                  ?> 
                                width="40px">  
                              </a>       
                            </td>
                            <td class="align-middle text-center" > 
                            <?php 
                              $ass=$plan["time_ass"];
                              $time_ass = date_create("$ass");
                               ?> 
                              <a href="" data-toggle="tooltip" data-original-title="<?php echo date_format($time_ass, "d M Y, H:i a"); ?>">                                     
                              <img <?php 
                                  if ($plan['assignment']==""){
                                      echo 'src=""';
                                  } else {
                                  if($plan['assignment']==1){
                                    echo 'src="../image/ok.png"';
                                  } else if ($plan['assignment']==0){
                                    echo 'src="../image/ng.png"';
                                  } 
                                    }
                                  ?>   
                                  width="40px">     
                            </td>
                            <td class="align-middle text-center" >
                            <?php 
                              $rfn=$plan["time_rfn"];
                              $time_rfn = date_create("$rfn");
                               ?> 
                              <a href="" data-toggle="tooltip" data-original-title="<?php echo date_format($time_rfn, "d M Y, H:i a"); ?>"> 
                            <img <?php 
                                  if ($plan['rfn']==""){
                                      echo 'src=""';
                                  } else {
                                  if($plan['rfn']==1){
                                    echo 'src="../image/ok.png"';
                                  } else if ($plan['rfn']==0){
                                    echo 'src="../image/ng.png"';
                                  } 
                                    }
                                  ?>  
                                  width="40px">  
                            </td>
                            <td class="align-middle text-center" >
                            <?php 
                              $pc=$plan["time_pc"];
                              $time_pc = date_create("$pc");
                               ?> 
                              <a href="" data-toggle="tooltip" data-original-title="<?php echo date_format($time_pc, "d M Y, H:i a"); ?>"> 
                            <img <?php 
                                  if ($plan['pc']==""){
                                      echo 'src=""';
                                  } else {
                                  if($plan['pc']==1){
                                    echo 'src="../image/ok.png"';
                                  } else if ($plan['pc']==0){
                                    echo 'src="../image/ng.png"';
                                  } 
                                    }
                                  ?>  
                                  width="40px">  
                            </td>
                            <td class="align-middle text-center" >
                            <?php 
                              $bp=$plan["time_bp"];
                              $time_bp = date_create("$bp");
                               ?> 
                              <a href="" data-toggle="tooltip" data-original-title="<?php echo date_format($time_bp, "d M Y, H:i a"); ?>"> 
                            <img <?php 
                                  if ($plan['bp']==""){
                                      echo 'src=""';
                                  } else {
                                  if($plan['bp']==1){
                                    echo 'src="../image/ok.png"';
                                  } else if ($plan['bp']==0){
                                    echo 'src="../image/ng.png"';
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
                                <button type="button" class="btn btn-icon btn-success  edit_proposal" data-toggle="modal" data-target="#EditPlaningProposal2">
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

                                        <form type="post" action="#">
                                          <div class="form-group row">
                                              <h4 class="col-md-12 modal-title text-left" style="color:black;">SUBJECT</h4>                                      
                                            </div>
                                          <div class="form-group row">
                                              <label class="col-md-2 col-form-label text-left" style="color:black;">Department</label>
                                              <div class="col-md-4">
                                              <input type="text" class="form-control bg-grey-200" id="depart_edit" placeholder=" Judul Proposal" autocomplete="off" value="Body Plant 2">
                                                </div>
                                                <label class="col-md-2 col-form-label text-left" style="color:black;">Category</label>
                                                <div class="col-md-4">
                                                <input type="text" class="form-control bg-grey-200" id="category_edit" placeholder=" Judul Proposal" autocomplete="off" value="Improvement">
                                                </div>
                                            </div>                                  
                                            <div class="form-group row">
                                              <label class="col-md-2 col-form-label text-left" style="color:black;">Proposal</label>
                                              <div class="col-md-10">
                                              <input type="text" class="form-control bg-grey-200" id="proposal_edit" placeholder=" Judul Proposal" autocomplete="off" value="Making robot spot">
                                              </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                              <h4 class="col-md-12 modal-title text-left" style="color:black;">STEP ASSIGMENT</h4>                                      
                                            </div>
                                            <div class="form-group row" id="step1">  
                                              <div class="col-md-4">                                      
                                               <h5>Step</h5>
                                              </div>                                              
                                              <div class="col-md-4">                                      
                                               <h5>Approval</h5>
                                              </div>                                              
                                              <div class="col-md-4">                                      
                                               <h5>Date</h5>
                                              </div>                                                                                                                                       
                                            </div>
                                            <!-- #1 -->
                                            <div class="form-group row" id="step1">
                                              <div class="col-md-4">                                      
                                                <input type="text" class="form-control bg-grey-200"  value="1. Quatation" disabled>
                                              </div>
                                              <div class="col-md-2">                                      
                                                <div class="custom-switches-stacked mt-2">
                                                  <label class="custom-switch">
                                                    <input id="reject_step1" type="checkbox" name="radio_step1"  value="0" 
                                                    class="custom-switch-input" data-plugin="switchery" data-color="#17b3a3" checked>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Reject</span>
                                                  </label>
                                                </div>   
                                              </div>
                                              <div class="col-md-2">                                      
                                                <div class="custom-switches-stacked mt-2">
                                                  <label class="custom-switch">
                                                    <input id="app_step1" type="checkbox" name="radio_step1" value="1" 
                                                    data-color="#17b3a3" class="custom-switch-input" data-plugin="switchery">
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Approve</span>
                                                  </label>
                                                </div>   
                                              </div>
                                              <div class="col-md-4 ">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="icon wb-calendar" aria-hidden="true"></i>
                                                </span>  
                                                <input type="text" class="form-control bg-grey-200"  value="22-july-2022" disabled>
                                                </div>
                                              </div> 
                                            </div>
                                            <!-- #2 -->
                                            <div class="form-group row" id="step2">
                                              <div class="col-md-4">                                      
                                                <input type="text" class="form-control bg-grey-200"  value="2. Assignment" disabled>
                                              </div>
                                              <div class="col-md-2">                                      
                                                <div class="custom-switches-stacked mt-2">
                                                  <label class="custom-switch">
                                                    <input id="reject_step2" type="checkbox" name="radio_step2"  value="0" 
                                                    class="custom-switch-input" data-plugin="switchery" data-color="#17b3a3" checked>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Reject</span>
                                                  </label>
                                                </div>   
                                              </div>
                                              <div class="col-md-2">                                      
                                                <div class="custom-switches-stacked mt-2">
                                                  <label class="custom-switch">
                                                    <input id="app_step2" type="checkbox" name="radio_step2" value="1" 
                                                    data-color="#17b3a3" class="custom-switch-input" data-plugin="switchery">
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Approve</span>
                                                  </label>
                                                </div>   
                                              </div>
                                              <div class="col-md-4 ">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="icon wb-calendar" aria-hidden="true"></i>
                                                </span>  
                                                <input type="text" class="form-control bg-grey-200"  value="22-july-2022" disabled>
                                                </div>
                                              </div> 
                                            </div>

                                            <!-- #3. Request for Negosiasi -->
                                            <div class="form-group row" id="step3">
                                              <div class="col-md-4">                                      
                                                <input type="text" class="form-control bg-grey-200"  value="3. Request for Negosiasi" disabled>
                                              </div>
                                              <div class="col-md-2">                                      
                                                <div class="custom-switches-stacked mt-2">
                                                  <label class="custom-switch">
                                                    <input id="reject_step3" type="checkbox" name="radio_step3"  value="0" 
                                                    class="custom-switch-input" data-plugin="switchery" data-color="#17b3a3" checked>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Reject</span>
                                                  </label>
                                                </div>   
                                              </div>
                                              <div class="col-md-2">                                      
                                                <div class="custom-switches-stacked mt-2">
                                                  <label class="custom-switch">
                                                    <input id="app_step3" type="checkbox" name="radio_step3" value="1" 
                                                    data-color="#17b3a3" class="custom-switch-input" data-plugin="switchery">
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Approve</span>
                                                  </label>
                                                </div>   
                                              </div>
                                              <div class="col-md-4 ">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="icon wb-calendar" aria-hidden="true"></i>
                                                </span>  
                                                <input type="text" class="form-control bg-grey-200"  value="22-july-2022" disabled>
                                                </div>
                                              </div> 
                                            </div>
                                            <!-- #4. Price Confirmation -->
                                            <div class="form-group row" id="step4">
                                              <div class="col-md-4">                                      
                                                <input type="text" class="form-control bg-grey-200"  value="4. Price Confirmation" disabled>
                                              </div>
                                              <div class="col-md-2">                                      
                                                <div class="custom-switches-stacked mt-2">
                                                  <label class="custom-switch">
                                                    <input id="reject_step4" type="checkbox" name="radio_step4"  value="0" 
                                                    class="custom-switch-input" data-plugin="switchery" data-color="#17b3a3" checked>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Reject</span>
                                                  </label>
                                                </div>   
                                              </div>
                                              <div class="col-md-2">                                      
                                                <div class="custom-switches-stacked mt-2">
                                                  <label class="custom-switch">
                                                    <input id="app_step4" type="checkbox" name="radio_step4" value="1" 
                                                    data-color="#17b3a3" class="custom-switch-input" data-plugin="switchery">
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Approve</span>
                                                  </label>
                                                </div>   
                                              </div>
                                              <div class="col-md-4 ">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="icon wb-calendar" aria-hidden="true"></i>
                                                </span>  
                                                <input type="text" class="form-control bg-grey-200"  value="22-july-2022" disabled>
                                                </div>
                                              </div> 
                                            </div>

                                            <!-- #5. Budget Planning -->
                                            <div class="form-group row" id="step4">
                                              <div class="col-md-4">                                      
                                                <input type="text" class="form-control bg-grey-200"  value="5. Budget Planning" disabled>
                                              </div>
                                              <div class="col-md-2">                                      
                                                <div class="custom-switches-stacked mt-2">
                                                  <label class="custom-switch">
                                                    <input id="reject_step5" type="checkbox" name="radio_step5"  value="0" 
                                                    class="custom-switch-input" data-plugin="switchery" data-color="#17b3a3" checked>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Reject</span>
                                                  </label>
                                                </div>   
                                              </div>
                                              <div class="col-md-2">                                      
                                                <div class="custom-switches-stacked mt-2">
                                                  <label class="custom-switch">
                                                    <input id="app_step5" type="checkbox" name="radio_step5" value="1" 
                                                    data-color="#17b3a3" class="custom-switch-input" data-plugin="switchery">
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Approve</span>
                                                  </label>
                                                </div>   
                                              </div>
                                              <div class="col-md-4 ">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="icon wb-calendar" aria-hidden="true"></i>
                                                </span>  
                                                <input type="text" class="form-control bg-grey-200"  value="22-july-2022" disabled>
                                                </div>
                                              </div> 
                                            </div>
                                            
                                            <hr>
                                            <div class="form-group row text-left">
                                              <label class="col-md-2 col-form-label " style="color:black;"></label>
                                              <div class="col-md-4">                                      
                                                    <div class="form-group">
                                                    <select class="form-control" id="pilih_step">
                                                      <option >Pilih Step</option>
                                                      <option id="option1">1.Quatation</option> 
                                                      <option id="option2">2.Assignment</option>                                                                                                                                          
                                                      <option id="option3">3.Request for Negoisasi</option>                                                                             
                                                      <option id="option4">4.Price Confirmation </option>                                                                             
                                                      <option id="option5">5.Budget Planning</option>                                                                             
                                                    </select>
                                                  </div>
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
                            </td>
                          </tr>
                          <?php $i++; ?>
                          <?php endforeach ; ?>   
                        </tbody>
                      </table>
                    </div>