<?php
    include_once('AdminMethods.php');
    $obj=new AdminMethods();

    session_start();

    $_SESSION['active_tab']='Services';

    if(!isset($_SESSION['logged_in_id']) || $_SESSION['logged_in_id']=="" || $_SESSION['role'] != 'Admin'){
      header("Location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    eStartUp | Manage Services
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    

    <?php echo $obj->cssLinks(); ?>


</head>

<body class="">
  <div class="wrapper ">

      <!-- Sidebar -->
        <?php include_once('includes/side_bar.php'); ?>
      <!-- End Sidebar -->

    <div class="main-panel">

        <!-- Navbar -->
          <?php include_once('includes/nav_bar.php'); ?>
        <!-- End Navbar -->

      <div class="content">

          <!-- Navbar -->
            <?php include_once('includes/uper_bar.php'); ?>
          <!-- End Navbar -->
          
        <div class="row">
  		    <div class="col-md-6">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Add Service</h5>
                <hr>
              </div>
              <div class="card-body">
                <form action="ExeFile.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                      <div class="col-lg-3"></div>
                      <div class="col-lg-6">
                          <img src="" id="output_image"  onclick="$(#file).click()" style=" height: 150px; width: 150px; border-radius: 10px;" onerror="this.src='../assets/img/camera.png';">                            
                      </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="form-group">
                          <input type="file" name="file_field" class="form-control" id="file" accept="image/*" onchange="preview_image(event)" style="display: block; opacity: 20; position: relative;" required="true" >
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Service Title</label>
                        <input type="text" name="title_field" class="form-control" placeholder="enter service title" required="true" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">                         
                        <label class="mb-3">Select Repair Type</label>
                          <select class="form-control" name="repair_type" style="height: 50px;">
                            <?php
                              $repair_types=$obj->getAllActiveRepairTypes();

                              if(!empty($repair_types)){
                                foreach ($repair_types as $repair) {
                            ?>
                                  <option value="<?php echo $repair['repair_id']; ?>"><?php echo $repair['repair_title']; ?></option>
                            <?php
                                }
                              }
                            ?>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">                         
                        <label class="mb-3">Select Models & Service Prices</label>
                        <div class="multiselect" style='overflow-y: scroll; height: 150px;'>
                          <?php
                            $models=$obj->getAllActiveModels();

                            if(!empty($models)){
                              foreach ($models as $model) {
                          ?>
                                <div class="row">
                                  <div class="col-md-7">
                                    <label class="form-control">
                                      <input type="checkbox" name="models[]" value="<?php echo $model['model_id']; ?>" />
                                      <strong class="ml-3"><?php echo $model['model_title']; ?></strong>
                                    </label>
                                  </div>
                                  <div class="col-md-5">
                                      <input type="number" name="prices[]" class="form-control" placeholder="enter price">
                                  </div>
                                </div>
                          <?php
                              }
                            }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">                         
                        <label class="mb-3">Select Zip Codes</label>
                        <div class="multiselect" style='overflow-y: scroll; height: 150px;'>
                          <?php
                            $zip_codes=$obj->getAllZipCodes();

                            if(!empty($zip_codes)){
                              foreach ($zip_codes as $zip) {
                          ?>
                                <div class="">
                                  <label class="form-control">
                                    <input type="checkbox" name="zip_codes[]" value="<?php echo $zip['zip_id']; ?>" />
                                    <strong class="ml-3"><?php echo $zip['zip_code']; ?></strong>
                                  </label>
                                </div>
                          <?php
                              }
                            }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" name="add_service_btn" class="btn btn-success btn-round">Create New Service</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-6">
              <div class="card card-user">
                <div class="card-header">
                  <h5 class="card-title">All Services</h5>
                  <hr>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                      <table class="table" id="employees">
                        <thead style="color: #51cbce;">
                          <th class="text-center">Service ID</th>
                          <th class="text-center">Service Title</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            <?php
                              $services=$obj->getAllServices();

                              if(!empty($services)){
                                $no=0;
                                foreach ($services as $service) {
                                  $no++;
                            ?>

                                  <tr>
                                    <td class="text-center">
                                      <label><?php echo $service['service_id']; ?></label>
                                    </td>
                                    <td class="text-center">
                                      <label><?php echo $service['service_title']; ?></label>
                                    </td>
                                    <td class="text-center text-danger">
                                      <?php
                                        if($service['service_status']=='Active'){
                                      ?>
                                          <label class="text-success"><?php echo $service['service_status']; ?></label>
                                      <?php
                                        }
                                        if($service['service_status']=='In-Active'){
                                      ?>
                                          <label class="text-danger"><?php echo $service['service_status']; ?></label>
                                      <?php
                                        }
                                      ?>
                                    </td>
                                    <td class="text-center">
                                      <a  data-toggle="modal" data-target="<?php echo '#exampleModalCenter'.$service['service_id']; ?>" href="#" title="Edit Service"><i class="fa fa-edit fa-2x text-info"></i></i></a>
                                      <?php
                                        if($service['service_status']=='Active'){
                                      ?>
                                          <a href="<?php echo 'ExeFile.php?service_disbale_id='.$service['service_id']; ?>" title="Disable Service"><i class="fa fa-ban fa-2x text-danger"></i></i></a>

                                      <?php
                                        }
                                        if($service['service_status']=='In-Active'){
                                      ?>
                                          <a href="<?php echo 'ExeFile.php?service_enable_id='.$service['service_id']; ?>" title="Enable Service"><i class="nc-icon nc-check-2 fa-2x text-success"></i></a>

                                      <?php
                                        }
                                      ?>
                                    </td>
                                  </tr>

                                  <!-- Modal -->
                                  <div class="modal fade" id="<?php echo 'exampleModalCenter'.$service['service_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Update Service</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body" style='overflow-y: scroll; height: 550px;'>
                                            <?php
                                              $service_data=$obj->getSingleService($service['service_id']);
                                            ?>
                                            <form action="ExeFile.php" method="post" enctype="multipart/form-data">
                                              <div class="row">
                                                  <div class="col-lg-3"></div>
                                                  <div class="col-lg-6">
                                                      <img src="<?php echo '../../uploads/'.$service_data['service_pic'];?>" id="output_image1"  onclick="$(#file).click()" style=" height: 150px; width: 150px; border-radius: 10px;" onerror="this.src='../assets/img/camera.png';">
                                                    </div>
                                              </div>
                                              <br>
                                              <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                      <input type="file" name="file_field" class="form-control" id="file" accept="image/*" onchange="preview_image1(event)" style="display: block; opacity: 20; position: relative;">
                                                    </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="form-group">
                                                    <label>Model Title</label>
                                                    <input type="text" name="title_field" class="form-control" placeholder="enter brand title" required="true" value="<?php echo $service_data['service_title']; ?>" >
                                                    <input type="hidden" name="id_field" value="<?php echo $service_data['service_id']; ?>">
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="form-group">
                                                    <label>Model Status</label>
                                                    <select class="form-control" style="height: 40px;" name="status_field">
                                                      <option <?php if($service_data['service_status']=='Active'){echo 'selected';} ?> value="Active">
                                                        Active
                                                      </option>
                                                      <option <?php if($service_data['service_status']=='In-Active'){echo 'selected';} ?> value="In-Active">
                                                        In-Active
                                                      </option>
                                                    </select>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="form-group">                         
                                                    <label class="mb-3">Select Repair Type</label>
                                                      <select class="form-control" name="repair_type" style="height: 50px;">
                                                        <?php
                                                          $repair_types=$obj->getAllActiveRepairTypes();



                                                          if(!empty($repair_types)){
                                                            foreach ($repair_types as $repair) {
                                                        ?>
                                                              <option <?php if(in_array($repair['repair_id'], $service_data)){ echo 'selected';} ?> value="<?php echo $repair['repair_id']; ?>"><?php echo $repair['repair_title']; ?></option>
                                                        <?php
                                                            }
                                                          }
                                                        ?>
                                                      </select>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="form-group">
                                                    <label class="mb-3">Select Models</label>
                                                    <div class="multiselect" style='overflow-y: scroll; height: 150px;'>
                                                      <?php

                                                        $models=$obj->getAllActiveModels();
                                                        $active_model_ids=array_column($models, 'model_id');
                                                        $active_model_titles=array_column($models, 'model_title');
                                                        
                                                        $service=$obj->getSingleServiceRelationWithModels($service['service_id']);
                                                        $models_ids = array_column($service, 'model_id');
                                                        $prices = array_column($service, 'price');

                                                        
                                                        // print_r($active_model_ids); echo '<br>';
                                                        // print_r($models_ids); echo '<br>';
                                                        $model_prices_arr=array();

                                                        for ($i=0; $i < sizeof($models_ids) ; $i++) {

                                                          if(in_array($models_ids[$i], $active_model_ids)){
                                                            for ($j=0; $j < sizeof($active_model_ids) ; $j++) { 
                                                              if($models_ids[$i]==$active_model_ids[$j]){
                                                                  $model_prices_arr[]=array(
                                                                    'model_id' => $active_model_ids[$j],
                                                                    'model_title' => $active_model_titles[$j],
                                                                    'model_service_price' => $prices[$i]
                                                                  );
                                                              }
                                                              else{
                                                                $model_prices_arr[]=array(
                                                                  'model_id' => $active_model_ids[$j],
                                                                  'model_title' => $active_model_titles[$j],
                                                                  'model_service_price' => ""
                                                                );
                                                              }
                                                            }                                                            
                                                          }
                                                          // else{
                                                          //   echo 'empty price';
                                                          //   for ($j=0; $j < sizeof($active_model_ids) ; $j++) { 
                                                          //     if($models_ids[$i]==$active_model_ids[$j]){
                                                          //         $model_prices_arr[]=array(
                                                          //           'model_id' => $active_model_ids[$j],
                                                          //           'model_title' => $active_model_titles[$j],
                                                          //           'model_service_price' => ""
                                                          //         );
                                                          //     }
                                                          //   }
                                                          // }
                                                        }

                                                        echo '<pre>';
                                                        // print_r($model_prices_arr);
                                                        echo '</pre>';

                                                        echo '<br>';

                                                        
                                                        // $model_prices_arr = array_map("unserialize", array_unique(array_map("serialize", $model_prices_arr)));
                                                        $tempArr = array_unique(array_column($model_prices_arr, 'model_service_price'));
                                                        $model_prices_arr=array_intersect_key($model_prices_arr, $tempArr);
                                                        echo '<pre>';
                                                        // print_r($model_prices_arr);
                                                        echo '</pre>';
                                                        
                                                        if(!empty($model_prices_arr)){
                                                          foreach ($model_prices_arr as $model) {
                                                          // for ($i=0; $i < ; $i++) {
                                                      ?>
                                                            <div class="row">
                                                              <div class="col-md-6 ml-2">
                                                                <label class="form-control">
                                                                  <input type="checkbox" name="models[]" value="<?php echo $model['model_id']; ?>" <?php if(in_array($model['model_id'], $models_ids)) { echo 'checked="checked"'; }?> />
                                                                  <strong class="ml-3"><?php echo $model['model_title']; ?></strong>
                                                                </label>
                                                              </div>
                                                              <div class="col-md-5">
                                                                <input type="number" class="form-control" name="prices[]" value="<?php echo $model['model_service_price'];?>">
                                                              </div>
                                                            </div>
                                                      <?php
                                                          }
                                                        }
                                                      ?>
                                                    </div>
                                                    <!-- <div class="multiselect" style='overflow-y: scroll; height: 150px;'>
                                                      <?php

                                                        $models=$obj->getAllActiveModels();
                                                        
                                                        $service=$obj->getSingleServiceRelationWithModels($service['service_id']);
                                                        $models_ids = array_column($service, 'model_id');
                                                        $prices = array_column($service, 'price');
                                                        
                                                        if(!empty($models)){
                                                          $no=0;
                                                          foreach ($models as $model) {
                                                            
                                                      ?>
                                                            <div class="row">
                                                              <div class="col-lg-7">
                                                                <label class="form-control">
                                                                  <input type="checkbox" name="models[]" value="<?php echo $model['model_id']; ?>" <?php if(in_array($model['model_id'], $models_ids)) { echo 'checked="checked"'; $price=$prices[$no]; }else{$price='';}?> />
                                                                  <strong class="ml-3"><?php echo $model['model_title']; ?></strong>
                                                                </label>
                                                              </div>
                                                              <div class="col-lg-5">
                                                                <?php if(in_array($model['model_id'], $models_ids)) { echo 'checked="checked"'; $price=$prices[$no]; }else{$price='';}?>
                                                                <input type="number" name="prices[]" class="form-control" placeholder="enter price" value="<?php echo $price; ?>">
                                                              </div>
                                                            </div>
                                                      <?php
                                                            $no=$no+1;
                                                          }
                                                        }
                                                      ?>
                                                    </div> -->
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="update ml-auto mr-auto">
                                                  <button type="submit" name="update_service_btn" class="btn btn-success btn-round">Update Service</button>
                                                </div>
                                              </div>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            <?php
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
      </div>
        
        <!-- Navbar -->
          <?php include_once('includes/footer.php'); ?>
        <!-- End Navbar -->
    </div>
  </div>
  

    <?php echo $obj->jsLinks(); ?>

	  <script>
	    $(document).ready(function() {
	      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
	      demo.initChartsPages();
	    });
	  </script>

  	<script>
	  $(document).ready(function() {
	      $('#employees').DataTable( {
	          dom: 'Bfrtip',
	          buttons: [
	              'copyHtml5',
	              'excelHtml5',
	              'csvHtml5',
	              'pdfHtml5',
	              'print'
	          ]
	      } );
	  });
	</script>

  <script type='text/javascript'>

    function preview_image(event) {

      var reader = new FileReader();

      reader.onload = function() {

        var output = document.getElementById('output_image');
        output.src = reader.result;
      }

      reader.readAsDataURL(event.target.files[0]);
    }
  </script>


  <script type='text/javascript'>

    function preview_image1(event) {

      var reader = new FileReader();

      reader.onload = function() {

        var output = document.getElementById('output_image1');
        output.src = reader.result;
      }

      reader.readAsDataURL(event.target.files[0]);
    }
  </script>

</body>

</html>