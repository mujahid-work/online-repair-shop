<?php
    include_once('AdminMethods.php');
    $obj=new AdminMethods();

    session_start();

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
    eStartUp | Employee Profile
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
            <div class="col-md-8">
              <div class="card card-user">
                <div class="card-header">
                  <h5 class="card-title">Profile Settings</h5>
                  <hr>
                </div>
                <?php

                	$my_profile=$obj->fetchMyProfile();

                ?>
                <div class="card-body">
                  <form action="Exefile.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                    	<div class="col-md-4"></div>
	                    <div class="col-md-4">
	                        <div class="form-group">
	                          <img style=" width: 200px; height: 200px;" class="" src="<?php echo '../../uploads/'.$my_profile['admin_pic'];?>" onerror="this.src='../assets/img/logo-small.png';">
	                        </div>
	                    </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-3"></div>
	                    <div class="col-md-6">
	                        <div class="form-group">
	                         	<input type="file" name="file_field" class="form-control" style="display: block; opacity: 20; position: relative;">
	                        </div>
	                    </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Full Name</label>
                          <input type="text" class="form-control" name="name_field" placeholder="enter full name" value="<?php echo $my_profile['admin_full_name']; ?>" required="true">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Email Address</label>
                          <input type="email" class="form-control" name="email_field" placeholder="enter email address" value="<?php echo $my_profile['email']; ?>" required="true">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Contact Number</label>
                          <input type="text" class="form-control" name="mobile_field" placeholder="enter contact number" value="<?php echo $my_profile['admin_mobile']; ?>" required="true">
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-success btn-round" name="update_admin_profile_btn">Update Profile</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
				<div class="card">
				    <div class="card-header">
				        <strong class="card-title mb-3">Update Password</strong>
				    </div>
				    <div class="card-body">
				    	<form action="ExeFile.php" method="post" enctype="multipart/form-data">
					        <div class="mx-auto d-block">
					            <div class="row">
					            	<div class="col-md-12">
  						            	<div class="form-group">
  	                            <label for="company" class=" form-control-label">Current Password</label>
  	                            <input type="password" class="form-control" name="current_pass_field" placeholder="enter current password" required="true">
  	                        </div>
  	                    </div>
					            </div>
					            <div class="row">
					            	<div class="col-md-12">
  						            	<div class="form-group">
  	                            <label for="company" class=" form-control-label">New Password</label>
  	                            <input type="password" class="form-control" name="new_pass_field" placeholder="enter new password" required="true">
  	                        </div>
  	                    </div>
					            </div>
					            <div class="row">
					            	<div class="col-md-12">
  						            	<div class="form-group">
  	                            <label for="company" class=" form-control-label">Confirm Password</label>
  	                            <input type="password" class="form-control" name="confirm_pass_field" placeholder="confirm new password" required="true">
  	                        </div>
  	                    </div>
					            </div>
					        </div>
					        <hr>
					        <div class="card-text text-sm-center">
					            <input type="submit" name="update_pass_btn" value="Update Password" class="btn btn-success btn-round">
					        </div>
					    </form>
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
</body>

</html>