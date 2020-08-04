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
    eStartUp | Manage Repair Types
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
                <h5 class="card-title">Add Repair Type</h5>
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
                        <label>Repair Type Title</label>
                        <input type="text" name="title_field" class="form-control" placeholder="enter repair type title" required="true" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" name="add_repair_btn" class="btn btn-success btn-round">Create New Repair Type</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-7">
              <div class="card card-user">
                <div class="card-header">
                  <h5 class="card-title">All Repair Types</h5>
                  <hr>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                      <table class="table" id="employees">
                        <thead style="color: #51cbce;">
                          <th class="text-center">Repair ID</th>
                          <th class="text-center">Repair Title</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            <?php
                              $repair_types=$obj->getAllRepairTypes();

                              if(!empty($repair_types)){
                                $no=0;
                                foreach ($repair_types as $repair) {
                                  $no++;
                            ?>

                                  <tr>
                                    <td class="text-center">
                                      <label><?php echo $repair['repair_id']; ?></label>
                                    </td>
                                    <td class="text-center">
                                      <label><?php echo $repair['repair_title']; ?></label>
                                    </td>
                                    <td class="text-center text-danger">
                                      <?php
                                        if($repair['repair_status']=='Active'){
                                      ?>
                                          <label class="text-success"><?php echo $repair['repair_status']; ?></label>
                                      <?php
                                        }
                                        if($repair['repair_status']=='In-Active'){
                                      ?>
                                          <label class="text-danger"><?php echo $repair['repair_status']; ?></label>
                                      <?php
                                        }
                                      ?>
                                    </td>
                                    <td class="text-center">
                                      <a  data-toggle="modal" data-target="<?php echo '#exampleModalCenter'.$repair['repair_id']; ?>" href="#" title="Edit Repair Type"><i class="fa fa-edit fa-2x text-info"></i></i></a>
                                      <?php
                                        if($repair['repair_status']=='Active'){
                                      ?>
                                          <a href="<?php echo 'ExeFile.php?repair_disbale_id='.$repair['repair_id']; ?>" title="Disable Repair Type"><i class="fa fa-ban fa-2x text-danger"></i></i></a>

                                      <?php
                                        }
                                        if($repair['repair_status']=='In-Active'){
                                      ?>
                                          <a href="<?php echo 'ExeFile.php?repair_enable_id='.$repair['repair_id']; ?>" title="Enable Repair Type"><i class="nc-icon nc-check-2 fa-2x text-success"></i></a>

                                      <?php
                                        }
                                      ?>
                                    </td>
                                  </tr>

                                  <!-- Modal -->
                                  <div class="modal fade" id="<?php echo 'exampleModalCenter'.$repair['repair_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Update Repair Type</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                              $repair_data=$obj->getSingleRepairType($repair['repair_id']);
                                            ?>
                                            <form action="ExeFile.php" method="post" enctype="multipart/form-data">
                                              <div class="row">
                                                  <div class="col-lg-3"></div>
                                                  <div class="col-lg-6">
                                                      <img src="<?php echo '../../uploads/'.$repair_data['repair_pic'];?>" id="output_image1"  onclick="$(#file).click()" style=" height: 150px; width: 150px; border-radius: 10px;" onerror="this.src='../assets/img/camera.png';">
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
                                                    <label>Repair Type Title</label>
                                                    <input type="text" name="title_field" class="form-control" placeholder="enter repair type title" required="true" value="<?php echo $repair_data['repair_title']; ?>" >
                                                    <input type="hidden" name="id_field" value="<?php echo $repair_data['repair_id']; ?>">
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="form-group">
                                                    <label>Repair Type Status</label>
                                                    <select class="form-control" style="height: 40px;" name="status_field">
                                                      <option <?php if($repair_data['repair_status']=='Active'){echo 'selected';} ?> value="Active">
                                                        Active
                                                      </option>
                                                      <option <?php if($repair_data['repair_status']=='In-Active'){echo 'selected';} ?> value="In-Active">
                                                        In-Active
                                                      </option>
                                                    </select>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="update ml-auto mr-auto">
                                                  <button type="submit" name="update_repair_btn" class="btn btn-success btn-round">Update Repair Type</button>
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