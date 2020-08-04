<?php
    include_once('AdminMethods.php');
    $obj=new AdminMethods();

    session_start();

    $_SESSION['active_tab']='Customers';

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
    eStartUp | Manage Customers
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
                    <div class="col-md-8">
                      <h4 class="card-title">Customer Accounts</h4>
                    </div>                
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table" id="employees">
                        <thead style="color: #51cbce;">
                          <th class="text-center">Customer ID</th>
                          <th class="text-center">Full Name</th>
                          <th class="text-center">Email Address</th>
                          <th class="text-center">Contact</th>
                          <th class="text-center">Zip</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                          <?php
                            $customers=$obj->getAllCustomers();

                            if(!empty($customers)){
                              foreach ($customers as $customer) {
                          ?>
                                <tr>
                                  <td class="text-center">
                                    <label><?php echo $customer['customer_id']; ?></label>
                                  </td>
                                  <td class="text-center">
                                    <label><?php echo $customer['first_name'].' '.$customer['last_name']; ?></label>
                                  </td>
                                  <td class="text-center">
                                    <label><?php echo $customer['email']; ?></label>
                                  </td>
                                  <td class="text-center">
                                    <label><?php echo $customer['contact_number']; ?></label>
                                  </td>
                                  <td class="text-center">
                                    <label><?php echo $customer['zip']; ?></label>
                                  </td>
                                  <td class="text-center text-danger">
                                    <?php
                                      if($customer['status']=='Active'){
                                    ?>
                                        <label class="text-success"><?php echo $customer['status']; ?></label>
                                    <?php
                                      }
                                      if($customer['status']=='In-Active'){
                                    ?>
                                        <label class="text-danger"><?php echo $customer['status']; ?></label>
                                    <?php
                                      }
                                    ?>
                                  </td>
                                  <td class="text-center">
                                    <a href="<?php echo 'view_customer.php?customer_edit_id='.$customer['customer_id']; ?>" title="Edit Customer"><i class="fa fa-edit fa-2x text-info"></i></i></a>
                                    <?php
                                      if($customer['status']=='Active'){
                                    ?>
                                        <a href="<?php echo 'ExeFile.php?customer_disbale_id='.$customer['customer_id']; ?>" title="Disable Customer"><i class="fa fa-ban fa-2x text-danger"></i></i></a>

                                    <?php
                                      }
                                      if($customer['status']=='In-Active'){
                                    ?>
                                        <a href="<?php echo 'ExeFile.php?customer_enable_id='.$customer['customer_id']; ?>" title="Enable Customer"><i class="nc-icon nc-check-2 fa-2x text-success"></i></a>

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