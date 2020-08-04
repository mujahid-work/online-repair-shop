<?php
    include_once('StoreAdminMethods.php');
    $obj=new StoreAdminMethods();

    session_start();

    $_SESSION['active_tab']='Technicians';

    if(!isset($_SESSION['logged_in_id']) || $_SESSION['logged_in_id']=="" || $_SESSION['role'] != 'Store Admin'){
      header("Location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    eStartUp | Manage Technicians
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
  		    <div class="col-md-12">
              <div class="card">
                <div class="card-header row">
                  <div class="col-md-9">
                    <h4 class="card-title">Technicians Accounts</h4>
                  </div>
                  <div class="col-md-3">
                  	<a href="add_tech.php" class="btn btn-success">
                  		<i class="fa fa-plus"> </i> Add New Technician
                  	</a>
                  </div>               
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="employees">
                      <thead style="color: #51cbce;">
                        <th class="text-center">Tech ID</th>
                        <th class="text-center">Full Name</th>
                        <th class="text-center">Email Address</th>
                        <th class="text-center">Contact</th>
                        <th class="text-center">Store</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                      </thead>
                      <tbody>

                          <?php
                            $employees=$obj->getAllMyTechnicians();

                            if(!empty($employees)){
                              foreach ($employees as $employee) {
                          ?>

                                <tr>
                                  <td class="text-center">
                                    <label><?php echo $employee['tech_id']; ?></label>
                                  </td>
                                  <td class="text-center">
                                    <label><?php echo $employee['first_name'].' '.$employee['last_name']; ?></label>
                                  </td>
                                  <td class="text-center">
                                    <label><?php echo $employee['email']; ?></label>
                                  </td>
                                  <td class="text-center">
                                    <label><?php echo $employee['contact_number']; ?></label>
                                  </td>
                                  <td class="text-center">
                                    <label><?php echo $employee['store_title']; ?></label>
                                  </td>
                                  <td class="text-center text-danger">
                                    <?php
                                      if($employee['status']=='Active'){
                                    ?>
                                        <label class="text-success"><?php echo $employee['status']; ?></label>
                                    <?php
                                      }
                                      if($employee['status']=='In-Active'){
                                    ?>
                                        <label class="text-danger"><?php echo $employee['status']; ?></label>
                                    <?php
                                      }
                                    ?>
                                  </td>
                                  <td class="text-center">
                                    <a href="<?php echo 'view_tech.php?employee_edit_id='.$employee['tech_id']; ?>" title="Edit Employee"><i class="fa fa-edit fa-2x text-info"></i></i></a>
                                    <?php
                                      if($employee['status']=='Active'){
                                    ?>
                                        <a href="<?php echo 'ExeFile.php?employee_disbale_id='.$employee['tech_id']; ?>" title="Disable Employee"><i class="fa fa-ban fa-2x text-danger"></i></i></a>

                                    <?php
                                      }
                                      if($employee['status']=='In-Active'){
                                    ?>
                                        <a href="<?php echo 'ExeFile.php?employee_enable_id='.$employee['tech_id']; ?>" title="Enable Employee"><i class="nc-icon nc-check-2 fa-2x text-success"></i></a>

                                    <?php
                                      }
                                    ?>
                                  </td>
                                </tr>
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
</body>

</html>