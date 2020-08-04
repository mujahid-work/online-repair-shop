<?php
    include_once('AdminMethods.php');
    $obj=new AdminMethods();

    session_start();

    $_SESSION['active_tab']='Stores';

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
    eStartUp | Manage Stores Admin
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
                <h5 class="card-title">Add New Store Admin</h5>
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
                        <label>Full Name</label>
                        <input type="text" name="name_field" class="form-control" placeholder="enter full name" required="true" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
            	  	<div class="col-md-12">
                    <div class="form-group">
                      <label>Select Store(s)</label>
                      <div class="multiselect" style='overflow-y: scroll; height: 150px;'>
              	  			<?php
              	  				$stores=$obj->getAllActiveStores();

              	  				if(!empty($stores)){
              	  					foreach ($stores as $store) {
              	  			?>
              	  						  <div>
                                  <label class="form-control">
                                    <input type="checkbox" name="store_field[]" value="<?php echo $store['store_id']; ?>" />
                                    <strong class="ml-3"><?php echo $store['store_title']; ?></strong>
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
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Admin Email</label>
                        <input type="email" name="email_field" class="form-control" placeholder="enter email address" required="true" >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Admin Contact</label>
                        <input type="text" name="contact_field" class="form-control" placeholder="enter contact number" required="true" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="text" name="password_field" class="form-control" placeholder="enter password" required="true" >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input id="confirm_password" type="text" name="confirm_password_field" class="form-control" placeholder="confirm password" required="true" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
            		<div class="col-lg-12">
            			<span id='message'></span>
            		</div>
            	  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" name="add_store_admin_btn" class="btn btn-success btn-round">Create New Store Admin</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-6">
              <div class="card card-user">
                <div class="card-header">
                  <h5 class="card-title">All Stores Admin</h5>
                  <hr>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                      <table class="table" id="employees">
                        <thead style="color: #51cbce;">
                          <th class="text-center">Store Admin ID</th>
                          <th class="text-center">Admin Name</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            <?php
                              $stores_admin=$obj->getAllStoresAdmin();

                              if(!empty($stores_admin)){
                                $no=0;
                                foreach ($stores_admin as $store) {
                                  $no++;
                            ?>

                                  <tr>
                                    <td class="text-center">
                                      <label><?php echo $store['store_admin_id']; ?></label>
                                    </td>
                                    <td class="text-center">
                                      <label><?php echo $store['store_admin_full_name']; ?></label>
                                    </td>
                                    <td class="text-center text-danger">
                                      <?php
                                        if($store['status']=='Active'){
                                      ?>
                                          <label class="text-success"><?php echo $store['status']; ?></label>
                                      <?php
                                        }
                                        if($store['status']=='In-Active'){
                                      ?>
                                          <label class="text-danger"><?php echo $store['status']; ?></label>
                                      <?php
                                        }
                                      ?>
                                    </td>
                                    <td class="text-center">
                                      <a  data-toggle="modal" data-target="<?php echo '#exampleModalCenter'.$store['store_admin_id']; ?>" href="#" title="Edit Store Admin"><i class="fa fa-edit fa-2x text-info"></i></i></a>
                                      <?php
                                        if($store['status']=='Active'){
                                      ?>
                                          <a href="<?php echo 'ExeFile.php?store_admin_disbale_id='.$store['store_admin_id']; ?>" title="Disable Store Admin"><i class="fa fa-ban fa-2x text-danger"></i></i></a>

                                      <?php
                                        }
                                        if($store['status']=='In-Active'){
                                      ?>
                                          <a href="<?php echo 'ExeFile.php?store_admin_enable_id='.$store['store_admin_id']; ?>" title="Enable Store Admin"><i class="nc-icon nc-check-2 fa-2x text-success"></i></a>

                                      <?php
                                        }
                                      ?>
                                    </td>
                                  </tr>

                                  <!-- Modal -->
                                  <div class="modal fade" id="<?php echo 'exampleModalCenter'.$store['store_admin_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Update Store Admin</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body" style='overflow-y: scroll; height: 550px;'>
                                            <?php
                                              $store_data=$obj->getSingleStoreAdmin($store['store_admin_id']);
                                            ?>
                                            <form action="ExeFile.php" method="POST" enctype="multipart/form-data">
                                              <div class="row">
                                                  <div class="col-lg-3"></div>
                                                  <div class="col-lg-6">
                                                      <img src="<?php echo '../../uploads/'.$store_data[0]['store_admin_pic'];?>" id="output_image1"  onclick="$(#file).click()" style=" height: 150px; width: 150px; border-radius: 10px;" onerror="this.src='../assets/img/camera.png';">
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
                                                    <label>Store Admin Name</label>
                                                    <input type="text" name="name_field" class="form-control" placeholder="enter store admin name" required="true" value="<?php echo $store_data[0]['store_admin_full_name']; ?>" >
                                                    <input type="hidden" name="id_field" value="<?php echo $store_data[0]['store_admin_id']; ?>">
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                							            	  	<div class="col-md-12">
                                                  <div class="form-group">
                                                    <label class="mb-3">Select Store(s)</label>
                                                    <div class="multiselect" style='overflow-y: scroll; height: 150px;'>
                                                      <?php

                                                        $stores=$obj->getAllActiveStores();
                                                        
                                                        $relation=$obj->getSingleStoreAdminRelationWithStores($store['store_admin_id']);
                                                        $relation = array_column($relation, 'store_id');

                                                        if(!empty($stores)){
                                                          foreach ($stores as $store) {
                                                      ?>
                                                            <div>
                                                              <label class="form-control">
                                                                <input type="checkbox" name="store_field[]" value="<?php echo $store['store_id']; ?>" <?php if(in_array($store['store_id'], $relation)) { echo 'checked="checked"'; }?> />
                                                                <strong class="ml-3"><?php echo $store['store_title']; ?></strong>
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
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                    <label>Admin Email</label>
                                                    <input type="email" name="email_field" class="form-control" placeholder="enter store admin email" required="true" value="<?php echo $store_data[0]['email']; ?>" >
                                                  </div>
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                    <label>Admin Contact</label>
                                                    <input type="text" name="contact_field" class="form-control" placeholder="enter store admin contact" required="true" value="<?php echo $store_data[0]['store_admin_mobile']; ?>" >
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                              	<div class="col-md-6">
                                                  <div class="form-group">
                                                    <label>Admin Password</label>
                                                    <input type="text" name="password_field" class="form-control" placeholder="enter store admin password" required="true" value="<?php echo $store_data[0]['password']; ?>" >
                                                  </div>
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                    <label>Store Status</label>
                                                    <select class="form-control" style="height: 40px;" name="status_field">
                                                      <option <?php if($store_data[0]['status']=='Active'){echo 'selected';} ?> value="Active">
                                                        Active
                                                      </option>
                                                      <option <?php if($store_data[0]['status']=='In-Active'){echo 'selected';} ?> value="In-Active">
                                                        In-Active
                                                      </option>
                                                    </select>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="update ml-auto mr-auto">
                                                  <button type="submit" name="update_store_admin_btn" class="btn btn-success btn-round">Update Store Admin</button>
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

  	<script type="text/javascript">
    	$('#password, #confirm_password').on('keyup', function () {
		  if ($('#password').val() == $('#confirm_password').val()) {
		    $('#message').html('').css('color', 'green');
		  } else 
		    $('#message').html('Password does not matched').css('color', 'red');
		});
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