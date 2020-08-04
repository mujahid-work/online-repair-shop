<?php
    include_once('AdminMethods.php');
    $obj=new AdminMethods();
?>


<link href="../assets/css/bootstrap.min.css" rel="stylesheet">

      
<div class="row">
    <div class="col-md-12">
    	<div class="">
			<div class="card">
				<div class="card-header">
					Order ID# &nbsp;&nbsp; <strong style="text-decoration: underline;"><?php echo $id; ?></strong>

				</div>

				<div class="card-body">
					<div class="row mb-4">
						<div class="col-md-4">
							<br><br><br>
							<h6 class="mb-3">To:</h6>
							<div><strong><?php echo $customer_data['client_name']; ?></strong></div>
							<div><?php echo $customer_data['client_address']; ?></div>
							<div>Email: <?php echo $customer_data['client_email']; ?></div>
							<div>Phone: <?php echo $customer_data['client_contact']; ?></div>
						</div>

						<div class="col-md-4" style="margin-left: 350px;">
							<br><br><br>
							<h6 class="mb-3">From:</h6>
							<div>
								<strong>

									<?php
										if($store_data['store_admin_full_name']!=""){

											echo $store_data['store_admin_full_name'];
										}
										else{

											echo 'Name: ---------------------------------';
										}
									?>									
								</strong>
							</div>
							<div>
								<?php
									if($store_data['store_address']!=""){

										echo $store_data['store_address'];
									}
									else{

										echo 'Address: ------------------------------';
									}
								?>
							</div>
							<div>
								<?php
									if($store_data['email']!=""){

										echo 'Email: '.$store_data['email'];
									}
									else{

										echo 'Email: ---------------------------------';
									}
								?>
							</div>
							<div>
								<?php
									if($store_data['store_admin_mobile']!=""){

										echo 'Phone: '.$store_data['store_admin_mobile'];
									}
									else{

										echo 'Phone: --------------------------------';
									}
								?>
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-4" style="margin-top: -210px;">
							<h6 class="mb-3"><strong>Order Details:</strong></h6>
							<div>Repair Type: &nbsp;<?php echo $order_data[0]['repair_type']; ?></div>
							<div>Device: &nbsp;<?php echo $order_data[0]['brand']; ?>- <?php echo $order_data[0]['model']; ?></div>
							<div>Order Date: &nbsp;<?php echo $order_data[0]['order_date']; ?></div>
						</div>						
					</div>
					<div class="table-responsive-sm">
						<table class="table table-striped" style="margin-top: -70px;">
							<thead>
								<tr>
									<th class="center">#</th>
									<th>Service Requested</th>
									<th class="right">Service Price</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if(!empty($order_data)){
										$no=0;
										foreach ($order_data as $order) {
											$no++;
								?>
											<tr>
												<td class="center"><?php echo $no; ?></td>
												<td class="left strong"><?php echo $order['service']; ?></td>
												<td class="right">$<?php echo $order['service_price']; ?></td>
											</tr>
								<?php
										}
									}
								?>
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-lg-4 col-sm-5"></div>
						<div class="col-lg-4 col-sm-5 ml-auto">
							<table class="table table-clear">
								<tbody>
									<tr>
										<td class="left"><strong>Grand Total</strong></td>
										<td class="right"><strong>$<?php echo $order_data[0]['grand_total']; ?></strong></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>