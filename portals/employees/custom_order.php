<?php
    include_once('EmployeeMethods.php');
    $obj=new EmployeeMethods();

    session_start();

    $_SESSION['active_tab']='Custom Orders';

    if(!isset($_SESSION['logged_in_id']) || $_SESSION['logged_in_id']=="" || $_SESSION['role'] != 'Tech'){
      header("Location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    eStartUp | Custom Order
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    

    <?php echo $obj->cssLinks(); ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css" />

    <style type="text/css">
	  	.ul {
		  list-style-type: none;
		}

		.li {
		  display: inline-block;
		}

		input[type="radio"][id^="id"] {
		  display: none;
		}

		.label {
		  border: 1px solid grey;
		  padding: 10px;
		  display: block;
		  position: relative;
		  margin: 10px;
		  cursor: pointer;
		}

		.label:before {
		  background-color: white;
		  color: white;
		  content: " ";
		  display: block;
		  border-radius: 50%;
		  border: 1px solid grey;
		  position: absolute;
		  top: -5px;
		  left: -5px;
		  width: 25px;
		  height: 25px;
		  text-align: center;
		  line-height: 28px;
		  transition-duration: 0.4s;
		  transform: scale(0);
		}

		.label img {
		  height: 100px;
		  width: 100px;
		  transition-duration: 0.2s;
		  transform-origin: 50% 50%;
		}

		:checked + label {
		  border-color: #ddd;
		}

		:checked + label:before {
		  content: "✓";
		  background-color: green;
		  transform: scale(1);
		}

		:checked + label img {
		  transform: scale(0.9);
		  /* box-shadow: 0 0 5px #333; */
		  z-index: -1;
		}
  	</style>


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
	            <div class="card card-user">
		            <div class="card-header">
		                <h5 class="card-title">Create In-House Order</h5>
		                <hr>
		            </div>
		            <div class="card-body">
		            	<form action="ExeFile.php" method="POST">
			            	<fieldset class="form-control">
			            		<legend>Customer Details</legend>
			            		<div class="row">
						    		<div class="col-md-6">
						    			<div class="form-group">
					                        <label>Full Name</label>
					                        <input type="text" class="form-control" name="name_field" required="true" placeholder="customer full name">
					                    </div>
						    		</div>
						    		<div class="col-md-6">
						    			<div class="form-group">
					                        <label>Email Address</label>
					                        <input type="email" class="form-control" name="email_field" required="true" placeholder="customer email address">
					                    </div>
						    		</div>
						    	</div>
						    	<div class="row">
						    		<div class="col-md-6">
						    			<div class="form-group">
					                        <label>Contact Number</label>
					                        <input type="text" class="form-control" name="contact_field" required="true" placeholder="customer contact number">
					                    </div>
						    		</div>
						    		<div class="col-md-6">
						    			<div class="form-group">
					                        <label>Zip Code</label>
					                        <input type="number" class="form-control" name="zip_field" required="true" placeholder="customer zip code">
					                    </div>
						    		</div>
						    	</div>
						    	<div class="row">
						    		<div class="col-md-7">
						    			<div class="form-group">
					                        <label>Physical Address</label>
					                        <textarea class="form-control" rows="5" name="address_field" required="true" placeholder="customer physical address"></textarea>
					                    </div>
						    		</div>
						    	</div>
			            	</fieldset>
			            	<fieldset class="form-control">
			            		<legend>Order Details</legend>
			            		<div class="row">
						    		<div class="col-md-4">
						    			<div class="form-group">
					                        <label>Select Repair Type</label>
					                        <input list="repair_types" name="repair_type_field" class="search_form_select form-control" placeholder="select repair type" required="true">
											<datalist id="repair_types">
												<?php
													$repair_types=$obj->getAllActiveRepairTypes();

													if(!empty($repair_types)){
														foreach ($repair_types as $repair_type) {
												?>
															<option value="<?php echo $repair_type['repair_title']; ?>"></option>
												<?php
														}
													}
												?>
											</datalist>
					                      </div>
						    		</div>
						    		<div class="col-md-4">
						    			<div class="form-group">
					                        <label>Select Device Brand</label>
					                        <input list="brands" name="brand_field" class="search_form_select form-control" placeholder="select device brand" required="true">
											<datalist id="brands">
												<?php
													$brands=$obj->getAllActiveBrands();

													if(!empty($brands)){
														foreach ($brands as $brand) {
												?>
															<option value="<?php echo $brand['brand_title']; ?>"></option>
												<?php
														}
													}
												?>
											</datalist>
					                      </div>
						    		</div>
						    		<div class="col-md-4">
						    			<div class="form-group">
					                        <label>Select Device Model</label>
					                        <input list="models" name="model_field" class="search_form_select form-control" placeholder="select device model" required="true">
											<datalist id="models">
												<?php
													$models=$obj->getAllActiveModels();

													if(!empty($models)){
														foreach ($models as $model) {
												?>
															<option value="<?php echo $model['model_title']; ?>"></option>
												<?php
														}
													}
												?>
											</datalist>
					                      </div>
						    		</div>
						    	</div>
						    	<div class="row">
						    		<!-- <div class="col-md-6">
						    			<div class="form-group">
					                        <label>Select Store</label>
											<select class="form-control" style="height: 45px;" name="store_field" required="true">
												<?php
													// $stores=$obj->getMyStores();

													if(!empty($stores)){
														foreach ($stores as $store) {
												?>
															<option value="<?php echo $store['store_id']; ?>">
																<?php echo $store['store_title']; ?>
															</option>
												<?php
														}
													}
												?>
											</select>
					                      </div>
						    		</div> -->
						    	</div>
						    	<br>

						    	<fieldset class="form-control">
						    		<legend>Select Time Slot</legend>

						    		<div class="row">

						            	<div class="col-md-6 ml-5">
							              <div class="form-group">
							              	<br>
							              	<input type="date" name="time_field" class="form-control">
							              </div>
							          	</div>
							        </div>
							        <div class="row">
							            <div class="col-md-12">
							              	<ul class="ul">
							              		<li title="" class="li" class="li">
				                                  <input type="radio" id="id1" name="time" value="08am-09am" />
				                                  <label class="label" for="id1">08am-09am</label>
				                                </li>
				                                <li title="" class="li">
				                                  <input type="radio" id="id2" name="time" value="09am-10am" />
				                                  <label class="label" for="id2">09am-10am</label>
				                                </li>
				                                <li title="" class="li">
				                                  <input type="radio" id="id3" name="time" value="10am-11am" />
				                                  <label class="label" for="id3">10am-11am</label>
				                                </li>
				                                <li title="" class="li">
				                                  <input type="radio" id="id4" name="time" value="11am-12pm" />
				                                  <label class="label" for="id4">11am-12pm</label>
				                                </li>
				                                <li title="" class="li">
				                                  <input type="radio" id="id5" name="time" value="12pm-01pm" />
				                                  <label class="label" for="id5">12pm-01pm</label>
				                                </li>
				                                <li title="" class="li">
				                                  <input type="radio" id="id6" name="time" value="01pm-02pm" />
				                                  <label class="label" for="id6">01pm-02pm</label>
				                                </li>
				                                <li title="" class="li">
				                                  <input type="radio" id="id7" name="time" value="02pm-03pm" />
				                                  <label class="label" for="id7">02pm-03pm</label>
				                                </li>
				                                <li title="" class="li">
				                                  <input type="radio" id="id8" name="time" value="03pm-04pm" />
				                                  <label class="label" for="id8">03pm-04pm</label>
				                                </li>
				                                <li title="" class="li">
				                                  <input type="radio" id="id9" name="time" value="04pm-05pm" />
				                                  <label class="label" for="id9">04pm-05pm</label>
				                                </li>
				                                <li title="" class="li">
				                                  <input type="radio" id="id10" name="time" value="05pm-06pm" />
				                                  <label class="label" for="id10">05pm-06pm</label>
				                                </li>
				                                <li title="" class="li">
				                                  <input type="radio" id="id11" name="time" value="06pm-07pm" />
				                                  <label class="label" for="id11">06pm-07pm</label>
				                                </li>
				                                <li title="" class="li">
				                                  <input type="radio" id="id12" name="time" value="07pm-08pm" />
				                                  <label class="label" for="id12">07pm-08pm</label>
				                                </li>
				                                <li title="" class="li">
				                                  <input type="radio" id="id13" name="time" value="08pm-09pm" />
				                                  <label class="label" for="id13">08pm-09pm</label>
				                                </li>
				                                <li title="" class="li">
				                                  <input type="radio" id="id14" name="time" value="09pm-10pm" />
				                                  <label class="label" for="id14">09pm-10pm</label>
				                                </li>
				      						</ul>
							            </div>
							        </div>
						    	</fieldset>
						    	<br><br>

						    	<fieldset class="form-control">
						    		<legend>Issues & Prices</legend>
						    		<div class="row">
						    			<div class="col-md-6">
							    			<div class="form-group">
						                        <label>Select Issue</label>
						                        <input list="issues" name="issues[]" class="search_form_select form-control" placeholder="select issue" required="true">
												<datalist id="issues">
													<?php
														$issues=$obj->getAllIssues();

														if(!empty($issues)){
															foreach ($issues as $issue) {
													?>
																<option value="<?php echo $issue['service_title']; ?>"></option>
													<?php
															}
														}
													?>
												</datalist>
						                      </div>
							    		</div>
							    		<div class="col-md-6">
							    			<div class="form-group">
						                        <label>Issue Price</label>
						                        <input type="number" class="form-control" name="prices[]" required="true" placeholder="enter issue price">
						                    </div>
							    		</div>
						    		</div>
						    		<div class="row">
						    			<div class="col-md-6">
							    			<div class="form-group">
						                        <label>Select Issue</label>
						                        <input list="issues" name="issues[]" class="search_form_select form-control" placeholder="select issue">
												<datalist id="issues">
													<?php
														$issues=$obj->getAllIssues();

														if(!empty($issues)){
															foreach ($issues as $issue) {
													?>
																<option value="<?php echo $issue['service_title']; ?>"></option>
													<?php
															}
														}
													?>
												</datalist>
						                      </div>
							    		</div>
							    		<div class="col-md-6">
							    			<div class="form-group">
						                        <label>Issue Price</label>
						                        <input type="number" class="form-control" name="prices[]" placeholder="enter issue price">
						                    </div>
							    		</div>
						    		</div>
						    		<div class="row">
						    			<div class="col-md-6">
							    			<div class="form-group">
						                        <label>Select Issue</label>
						                        <input list="issues" name="issues[]" class="search_form_select form-control" placeholder="select issue">
												<datalist id="issues">
													<?php
														$issues=$obj->getAllIssues();

														if(!empty($issues)){
															foreach ($issues as $issue) {
													?>
																<option value="<?php echo $issue['service_title']; ?>"></option>
													<?php
															}
														}
													?>
												</datalist>
						                      </div>
							    		</div>
							    		<div class="col-md-6">
							    			<div class="form-group">
						                        <label>Issue Price</label>
						                        <input type="number" class="form-control" name="prices[]" placeholder="enter issue price">
						                    </div>
							    		</div>
						    		</div>
						    		<div class="row">
						    			<div class="col-md-6">
							    			<div class="form-group">
						                        <label>Select Issue</label>
						                        <input list="issues" name="issues[]" class="search_form_select form-control" placeholder="select issue">
												<datalist id="issues">
													<?php
														$issues=$obj->getAllIssues();

														if(!empty($issues)){
															foreach ($issues as $issue) {
													?>
																<option value="<?php echo $issue['service_title']; ?>"></option>
													<?php
															}
														}
													?>
												</datalist>
						                      </div>
							    		</div>
							    		<div class="col-md-6">
							    			<div class="form-group">
						                        <label>Issue Price</label>
						                        <input type="number" class="form-control" name="prices[]" placeholder="enter issue price">
						                    </div>
							    		</div>
						    		</div>
						    		<div class="row">
						    			<div class="col-md-6">
							    			<div class="form-group">
						                        <label>Select Issue</label>
						                        <input list="issues" name="issues[]" class="search_form_select form-control" placeholder="select issue">
												<datalist id="issues">
													<?php
														$issues=$obj->getAllIssues();

														if(!empty($issues)){
															foreach ($issues as $issue) {
													?>
																<option value="<?php echo $issue['service_title']; ?>"></option>
													<?php
															}
														}
													?>
												</datalist>
						                      </div>
							    		</div>
							    		<div class="col-md-6">
							    			<div class="form-group">
						                        <label>Issue Price</label>
						                        <input type="number" class="form-control" name="prices[]" placeholder="enter issue price">
						                    </div>
							    		</div>
						    		</div>
						    	</fieldset>
						    	<br><br>
						    	<div class="row">
						    		<div class="col-md-4"></div>
						    		<div class="col-md-4 text-center">
						    			<input type="submit" name="create_custom_order" value="Create Custom Order" class="btn btn-success">
						    		</div>
						    	</div>
			            	</fieldset>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker();
        });
    </script>
</body>

</html>