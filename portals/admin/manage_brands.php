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
    eStartUp | Manage Brands
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
  		    <div class="col-md-5">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Add Brand</h5>
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
                        <label>Brand Title</label>
                        <input type="text" name="title_field" class="form-control" placeholder="enter brand title" required="true" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">                         
                        <label class="mb-3">Select Repair Types</label>
                        <div class="multiselect" style='overflow-y: scroll; height: 150px;'>
                          <?php
                            $repair_types=$obj->getAllActiveRepairTypes();

                            if(!empty($repair_types)){
                              foreach ($repair_types as $repair) {
                          ?>
                                <div>
                                  <label class="form-control">
                                    <input type="checkbox" name="repair_type[]" value="<?php echo $repair['repair_id']; ?>" />
                                    <strong class="ml-3"><?php echo $repair['repair_title']; ?></strong>
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
                      <button type="submit" name="add_brand_btn" class="btn btn-success btn-round">Create New Brand</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-7">
              <div class="card card-user">
                <div class="card-header">
                  <h5 class="card-title">All Brands</h5>
                  <hr>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                      <table class="table" id="employees">
                        <thead style="color: #51cbce;">
                          <th class="text-center">Brand ID</th>
                          <th class="text-center">Brand Title</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            <?php
                              $brands=$obj->getAllBrands();

                              if(!empty($brands)){
                                $no=0;
                                foreach ($brands as $brand) {
                                  $no++;
                            ?>

                                  <tr>
                                    <td class="text-center">
                                      <label><?php echo $brand['brand_id']; ?></label>
                                    </td>
                                    <td class="text-center">
                                      <label><?php echo $brand['brand_title']; ?></label>
                                    </td>
                                    <td class="text-center text-danger">
                                      <?php
                                        if($brand['brand_status']=='Active'){
                                      ?>
                                          <label class="text-success"><?php echo $brand['brand_status']; ?></label>
                                      <?php
                                        }
                                        if($brand['brand_status']=='In-Active'){
                                      ?>
                                          <label class="text-danger"><?php echo $brand['brand_status']; ?></label>
                                      <?php
                                        }
                                      ?>
                                    </td>
                                    <td class="text-center">
                                      <a  data-toggle="modal" data-target="<?php echo '#exampleModalCenter'.$brand['brand_id']; ?>" href="#" title="Edit Brand"><i class="fa fa-edit fa-2x text-info"></i></i></a>
                                      <?php
                                        if($brand['brand_status']=='Active'){
                                      ?>
                                          <a href="<?php echo 'ExeFile.php?brand_disbale_id='.$brand['brand_id']; ?>" title="Disable Brand"><i class="fa fa-ban fa-2x text-danger"></i></i></a>

                                      <?php
                                        }
                                        if($brand['brand_status']=='In-Active'){
                                      ?>
                                          <a href="<?php echo 'ExeFile.php?brand_enable_id='.$brand['brand_id']; ?>" title="Enable Brand"><i class="nc-icon nc-check-2 fa-2x text-success"></i></a>

                                      <?php
                                        }
                                      ?>
                                    </td>
                                  </tr>

                                  <!-- Modal -->
                                  <div class="modal fade" id="<?php echo 'exampleModalCenter'.$brand['brand_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Update Brand</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body" style='overflow-y: scroll; height: 550px;'>
                                            <?php
                                              $brand_data=$obj->getSingleBrand($brand['brand_id']);
                                            ?>
                                            <form action="ExeFile.php" method="post" enctype="multipart/form-data">
                                              <div class="row">
                                                  <div class="col-lg-3"></div>
                                                  <div class="col-lg-6">
                                                      <img src="<?php echo '../../uploads/'.$brand_data[0]['brand_pic'];?>" id="output_image1"  onclick="$(#file).click()" style=" height: 150px; width: 150px; border-radius: 10px;" onerror="this.src='../assets/img/camera.png';">
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
                                                    <label>Brand Title</label>
                                                    <input type="text" name="title_field" class="form-control" placeholder="enter brand title" required="true" value="<?php echo $brand_data[0]['brand_title']; ?>" >
                                                    <input type="hidden" name="id_field" value="<?php echo $brand_data[0]['brand_id']; ?>">
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="form-group">
                                                    <label>Brand Status</label>
                                                    <select class="form-control" style="height: 40px;" name="status_field">
                                                      <option <?php if($brand_data[0]['brand_status']=='Active'){echo 'selected';} ?> value="Active">
                                                        Active
                                                      </option>
                                                      <option <?php if($brand_data[0]['brand_status']=='In-Active'){echo 'selected';} ?> value="In-Active">
                                                        In-Active
                                                      </option>
                                                    </select>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="form-group">
                                                    <label class="mb-3">Select Repair Types</label>
                                                    <div class="multiselect" style='overflow-y: scroll; height: 150px;'>
                                                      <?php

                                                        $repair_types=$obj->getAllActiveRepairTypes();
                                                        
                                                        $brand=$obj->getSingleBrandRelationWithRepairTypes($brand['brand_id']);
                                                        $brands = array_column($brand, 'repair_id');

                                                        if(!empty($repair_types)){
                                                          foreach ($repair_types as $repair) {
                                                      ?>
                                                            <div>
                                                              <label class="form-control">
                                                                <input type="checkbox" name="repair_type[]" value="<?php echo $repair['repair_id']; ?>" <?php if(in_array($repair['repair_id'], $brands)) { echo 'checked="checked"'; }?> />
                                                                <strong class="ml-3"><?php echo $repair['repair_title']; ?></strong>
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
                                                  <button type="submit" name="update_brand_btn" class="btn btn-success btn-round">Update Brand</button>
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