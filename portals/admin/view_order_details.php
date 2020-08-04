<?php
    include_once('AdminMethods.php');
    $obj=new AdminMethods();

    session_start();

    $_SESSION['active_tab']='Orders';

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
    eStartUp | View Order Details
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
			            <?php
	                		if(isset($_GET['order_id'])){

	                			$order_id=$_GET['order_id'];

	                			$order_details=$obj->getSingleRepairOrders($order_id);
	                		}
	                	?>
                    	<div class="row">
	                    	<div class="col-md-8">
					            <div class="card card-user">
					                <div class="card-header">
					                	<div class="row">
						              		<div class="col-md-8">
						              			<h5 class="card-title">Order Details</h5>
						              		</div>
						              		<div class="col-md-4">
						              			<a href="<?php echo 'pdf_action.php?order_id='.$order_id; ?>" class="btn btn-success" style="margin-top: -2px;"><i class="fa fa-print"></i> Print Receipt</a>
						              		</div>
						              	</div>
					                </div>
					                <div class="card-body">
					                    <div class="row">
					                      	<div class="col-md-4">
					                        	<div class="form-group">
					                          		<label for="exampleInputEmail1"> Order ID</label>
					                          		<input type="text" class="form-control" disabled="true" value="<?php echo $order_details['order_id']; ?>">
					                        	</div>
					                      	</div>
					                      	<div class="col-md-8">
					                        	<div class="form-group">
					                          		<label>Order Placed On</label>
					                          		<input type="text" class="form-control" disabled="true" value="<?php echo $order_details['order_date']; ?>">
					                        	</div>
					                      	</div>
					                    </div>
					                    <div class="row">
					                      	<div class="col-md-4">
					                        	<div class="form-group">
					                          		<label>Repair Type</label>
					                          		<input type="text" class="form-control" disabled="true" value="<?php echo $order_details['repair_type']; ?>">
					                        	</div>
					                      	</div>
					                      	<div class="col-md-4">
					                        	<div class="form-group">
					                          		<label>Brand</label>
					                          		<input type="text" class="form-control" disabled="true" value="<?php echo $order_details['brand']; ?>">
					                        	</div>
					                      	</div>
					                      	<div class="col-md-4">
					                        	<div class="form-group">
					                          		<label>Model</label>
					                          		<input type="text" class="form-control" disabled="true" value="<?php echo $order_details['model']; ?>">
					                        	</div>
					                      	</div>
					                    </div>
					                    <div class="row">
						                    <div class="col-md-6">
						                        <div class="form-group">
						                          <label>Requested Time Slot</label>
						                          <input type="text" class="form-control" disabled="true" value="<?php echo $order_details['time_slot']; ?>">
						                        </div>
						                    </div>
						                    <div class="col-md-6">
						                        <div class="form-group">
						                          <label>Service Type</label>
						                          <input type="text" class="form-control" disabled="true" value="<?php echo $order_details['service_type']; ?>">
						                        </div>
						                    </div>
					                    </div>
					                    <div class="row">
					                      	<div class="col-md-4">
					                        	<div class="form-group">
					                          		<label>Client Name</label>
					                          		<input type="text" class="form-control" disabled="true" value="<?php echo $order_details['client_name']; ?>">
					                        	</div>
					                      	</div>
					                      	<div class="col-md-5">
					                        	<div class="form-group">
					                          		<label>Cllient Email</label>
					                          		<input type="text" class="form-control" disabled="true" value="<?php echo $order_details['client_email']; ?>">
					                        	</div>
					                      	</div>
					                      	<div class="col-md-3">
					                        	<div class="form-group">
					                          		<label>Client Contact</label>
					                          		<input type="text" class="form-control" disabled="true" value="<?php echo $order_details['client_contact']; ?>">
					                        	</div>
					                      	</div>
					                    </div>
					                    <div class="row">
					                      	<div class="col-md-4">
					                        	<div class="form-group">
					                          		<label>Client Zip Code</label>
					                          		<input type="text" class="form-control" disabled="true" value="<?php echo $order_details['client_zip_code']; ?>">
					                        	</div>
					                      	</div>
					                      	<div class="col-md-8">
					                        	<div class="form-group">
					                          		<label>Cllient Physical Address</label>
					                          		<textarea disabled="true" class="form-control"><?php echo $order_details['client_address']; ?></textarea>
					                        	</div>
					                      	</div>
					                    </div>
					                    <div class="row">
					                      	<div class="col-md-12">                        
					                        	<fieldset class="form-control">
					                        		<legend>Services Requested</legend>

					                        		<?php
			                                            $services_requested=$obj->getSingleRepairOrderIssues($order_id);

			                                            if(!empty($services_requested)){
			                                              foreach ($services_requested as $service) {
			                                        ?>
							                        		<div class="row">                        			
							                        			<div class="col-md-6">
							                        				<div class="form-group">
								                        				<label>Service Requested</label>
								                          				<input type="text" class="form-control" disabled="true" value="<?php echo $service['service']; ?>">
							                          				</div>
							                        			</div>
							                        			<div class="col-md-6">
							                        				<div class="form-group">
								                        				<label>Service Price</label>
								                          				<input type="text" class="form-control" disabled="true" value="$<?php echo $service['service_price']; ?>">
							                          				</div>
							                        			</div>	                        		
							                        		</div>
							                        <?php
										                  }
										                }
										            ?>
					                        	</fieldset>
					                      	</div>
					                    </div>
					                    <div class="row">
					                    	<div class="col-md-5"></div>
					                      	<div class="col-md-7">                        
					                        	<fieldset class="form-control">
					                        		<legend> Grand Total</legend>
					                        		<div class="row">                        			
					                        			<div class="col-md-12">
					                        				<div class="form-group">
						                          				<input type="text" class="form-control" disabled="true" value="$<?php echo $order_details['grand_total']; ?>">
					                          				</div>
					                        			</div>	                        		
					                        		</div>
					                        	</fieldset>
					                      	</div>
					                    </div>
					                </div>
					            </div>
				            </div>
				            <div class="col-md-4">
				            	<div class="row">
				            		<div class="col-md-12">
				            			<div class="card card-user"> 
							                <div class="card-body">
							                	<div class="row">
							                      	<div class="col-md-12">                        
							                        	<fieldset class="form-control">
							                        		<legend>Order Status</legend>
							                        		<form action="ExeFile.php" method="POST">
								                        		<div class="row">
								                        			<?php
								                        				if($order_details['service_type']=='Store Repair'){
								                        			?>
								                        					<div class="col-md-12">
															        			<input type="hidden" name="order_id_field" value="<?php echo $order_details['order_id']; ?>">
															        			<div class="form-group">
															                        <label for="exampleInputEmail1">Assigned Store</label>
															                        <select class="form-control" style="height: 50px;" name="tech_id_field">
															                        	<option value="">Not Yet Assigned</option>
															                        	<?php
																                            $stores=$obj->getAllStores();

																                            if(!empty($stores)){
																                              foreach ($stores as $store) {
																                        ?>
																                        		<option value="<?php echo $store['store_id'] ?>" <?php if(in_array($store['store_id'], $order_details)){ echo 'Selected';} ?>>
																                        				<?php echo $store['store_title']; ?>
																                        		</option>
																                        <?php
																                              }
																                            }
																                        ?>
															                        </select>
															                    </div>
															        		</div>
								                        			<?php
								                        				}
								                        				if($order_details['service_type']=='Mobile Repair'){
								                        			?>
								                        					<div class="col-md-12">
															        			<input type="hidden" name="order_id_field" value="<?php echo $order_details['order_id']; ?>">
															        			<div class="form-group">
															                        <label for="exampleInputEmail1">Assigned Technician</label>
															                        <select class="form-control" style="height: 50px;" name="tech_id_field">
															                        	<option value="">Not Yet Assigned</option>
															                        	<?php
																                            $employees=$obj->getAllActiveTechnicians();

																                            if(!empty($employees)){
																                              foreach ($employees as $employee) {
																                        ?>
																                        		<option value="<?php echo $employee['tech_id'] ?>" <?php if(in_array($employee['tech_id'], $order_details)){ echo 'Selected';} ?>>
																                        				<?php echo $employee['first_name'].' '.$employee['last_name']; ?>
																                        		</option>
																                        <?php
																                              }
																                            }
																                        ?>
															                        </select>
															                    </div>
															        		</div>
								                        			<?php
								                        				}
								                        			?>
													        		<div class="col-md-12">
													        			<div class="form-group">
													                        <label for="exampleInputEmail1">Order Status</label>
													                        <select class="form-control" style="height: 50px;" name="status_field">
													                        	<option value="">Please Select</option>
													                        	<option value="New" <?php if($order_details['order_status']=='New'){echo 'selected';} ?>>
													                        		New Order
													                        	</option>
													                        	<option value="In-Progress" <?php if($order_details['order_status']=='In-Progress'){echo 'selected';} ?>>
													                        		In-Progress
													                        	</option>
													                        	<option value="Completed" <?php if($order_details['order_status']=='Completed'){echo 'selected';} ?>>
													                        		Completed
													                        	</option>
													                        	<option value="Cancelled" <?php if($order_details['order_status']=='Cancelled'){echo 'selected';} ?>>
													                        		Cancelled
													                        	</option>
													                        </select>
													                    </div>
													        		</div>
													        		<div class="col-md-12">
													        			<div class="form-group">
													                        <input type="submit" name="order_status_btn" class="btn btn-success col-md-12" value="Update Order Status">
													                    </div>
													        		</div>
													        	</div>
													        </form>
							                        	</fieldset>
							                      	</div>
							                    </div>
							                </div>
							            </div>
				            		</div>
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