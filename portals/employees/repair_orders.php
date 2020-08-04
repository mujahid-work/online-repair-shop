<?php
    include_once('EmployeeMethods.php');
    $obj=new EmployeeMethods();

    session_start();

    $_SESSION['active_tab']='Orders';

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
    eStartUp | Repair Orders
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
            <!-- Wizard container -->
              <div class="wizard-container">
                <div class="card wizard-card" data-color="red" id="wizard">
                  <div class="wizard-header"></div>
                  <div class="wizard-navigation" style="background-color: black;">
                      <ul>
                          <li><a href="#new" data-toggle="tab">New Orders</a></li>
                          <li><a href="#in-progress" data-toggle="tab">In-Progress Orders</a></li>
                          <li><a href="#completed" data-toggle="tab">Completed Orders</a></li>
                          <li><a href="#cancled" data-toggle="tab">Cancled Canceled</a></li>
                      </ul>
                  </div>                  
                  <div class="tab-content">
                      <div class="tab-pane" id="new">
                          <div class="row">
                              <div class="col-md-12">
                                <div class="card">
                                  <div class="card-header row">
                                    <div class="col-md-8">
                                      <h4 class="card-title">New Orders</h4>
                                    </div>                
                                  </div>
                                  <div class="card-body">
                                    <div class="table-responsive">
                                      <table class="table" id="new_project">
                                        <thead style="color: #51cbce;">
                                          <th class="text-center">Order ID</th>
                                          <th class="text-center">Customer Name</th>
                                          <th class="text-center">Contact</th>
                                          <th class="text-center">Repair Type</th>
                                          <th class="text-center">Grand Total</th>
                                          <th class="text-center">Placed On</th>
                                          <th class="text-center">Service Type</th>
                                          <th class="text-center">Action</th>
                                        </thead>
                                        <tbody>
                                          <?php
                                            $repair_orders=$obj->getAllNewRepairOrders();

                                            if(!empty($repair_orders)){
                                              foreach ($repair_orders as $order) {
                                          ?>
                                                <tr>
                                                  <td class="text-center"><?php echo $order['order_id']; ?></td>
                                                  <td class="text-center"><?php echo $order['client_name']; ?></td>
                                                  <td class="text-center"><?php echo $order['client_contact']; ?></td>
                                                  <td class="text-center"><?php echo $order['repair_type']; ?></td>
                                                  <td class="text-center">$<?php echo $order['grand_total']; ?></td>
                                                  <td class="text-center"><?php echo $order['order_date']; ?></td>
                                                  <td class="text-center"><?php echo $order['service_type']; ?></td>
                                                  <td class="text-center">
                                                    <a href="<?php echo 'view_order_details.php?order_id='.$order['order_id']; ?>" title="View Order Details"><i class="nc-icon nc-tap-01 fa-2x text-info"></i></a>
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
                      <div class="tab-pane" id="in-progress">
                          <div class="row">
                              <div class="col-md-12">
                                <div class="card ">
                                  <div class="card-header row">
                                    <div class="col-md-8">
                                      <h4 class="card-title"> In-Progress Orders</h4>
                                    </div>                
                                  </div>
                                  <div class="card-body">
                                    <div class="table-responsive">
                                      <table class="table" id="inprogress_project">
                                        <thead style="color: #51cbce;">
                                          <th class="text-center">Order ID</th>
                                          <th class="text-center">Customer Name</th>
                                          <th class="text-center">Contact</th>
                                          <th class="text-center">Repair Type</th>
                                          <th class="text-center">Grand Total</th>
                                          <th class="text-center">Placed On</th>
                                          <th class="text-center">Service Type</th>
                                          <th class="text-center">Action</th>
                                        </thead>
                                        <tbody>
                                          <?php
                                            $repair_orders=$obj->getAllInProgressRepairOrders();

                                            if(!empty($repair_orders)){
                                              foreach ($repair_orders as $order) {
                                          ?>
                                                <tr>
                                                  <td class="text-center"><?php echo $order['order_id']; ?></td>
                                                  <td class="text-center"><?php echo $order['client_name']; ?></td>
                                                  <td class="text-center"><?php echo $order['client_contact']; ?></td>
                                                  <td class="text-center"><?php echo $order['repair_type']; ?></td>
                                                  <td class="text-center">$<?php echo $order['grand_total']; ?></td>
                                                  <td class="text-center"><?php echo $order['order_date']; ?></td>
                                                  <td class="text-center"><?php echo $order['service_type']; ?></td>
                                                  <td class="text-center">
                                                    <a href="<?php echo 'view_order_details.php?order_id='.$order['order_id']; ?>" title="View Order Details"><i class="nc-icon nc-tap-01 fa-2x text-info"></i></a>
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
                      <div class="tab-pane" id="completed">
                          <div class="col-md-12">
                                <div class="card ">
                                  <div class="card-header row">
                                    <div class="col-md-8">
                                      <h4 class="card-title"> Completed Orders</h4>
                                    </div>                
                                  </div>
                                  <div class="card-body">
                                    <div class="table-responsive">
                                      <table class="table" id="completed_project">
                                        <thead style="color: #51cbce;">
                                          <th class="text-center">Order ID</th>
                                          <th class="text-center">Customer Name</th>
                                          <th class="text-center">Contact</th>
                                          <th class="text-center">Repair Type</th>
                                          <th class="text-center">Grand Total</th>
                                          <th class="text-center">Placed On</th>
                                          <th class="text-center">Service Type</th>
                                          <th class="text-center">Action</th>
                                        </thead>
                                        <tbody>
                                          <?php
                                            $repair_orders=$obj->getAllCompletedRepairOrders();

                                            if(!empty($repair_orders)){
                                              foreach ($repair_orders as $order) {
                                          ?>
                                                <tr>
                                                  <td class="text-center"><?php echo $order['order_id']; ?></td>
                                                  <td class="text-center"><?php echo $order['client_name']; ?></td>
                                                  <td class="text-center"><?php echo $order['client_contact']; ?></td>
                                                  <td class="text-center"><?php echo $order['repair_type']; ?></td>
                                                  <td class="text-center">$<?php echo $order['grand_total']; ?></td>
                                                  <td class="text-center"><?php echo $order['order_date']; ?></td>
                                                  <td class="text-center"><?php echo $order['service_type']; ?></td>
                                                  <td class="text-center">
                                                    <a href="<?php echo 'view_order_details.php?order_id='.$order['order_id']; ?>" title="View Order Details"><i class="nc-icon nc-tap-01 fa-2x text-info"></i></a>
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
                      <div class="tab-pane" id="cancled">
                          <div class="col-md-12">
                                <div class="card ">
                                  <div class="card-header row">
                                    <div class="col-md-8">
                                      <h4 class="card-title"> Cancelled Orders</h4>
                                    </div>                
                                  </div>
                                  <div class="card-body">
                                    <div class="table-responsive">
                                      <table class="table" id="cancled_project">
                                        <thead style="color: #51cbce;">
                                          <th class="text-center">Order ID</th>
                                          <th class="text-center">Customer Name</th>
                                          <th class="text-center">Contact</th>
                                          <th class="text-center">Repair Type</th>
                                          <th class="text-center">Grand Total</th>
                                          <th class="text-center">Placed On</th>
                                          <th class="text-center">Service Type</th>
                                          <th class="text-center">Action</th>
                                        </thead>
                                        <tbody>
                                          <?php
                                            $repair_orders=$obj->getAllCancelledRepairOrders();

                                            if(!empty($repair_orders)){
                                              foreach ($repair_orders as $order) {
                                          ?>
                                                <tr>
                                                  <td class="text-center"><?php echo $order['order_id']; ?></td>
                                                  <td class="text-center"><?php echo $order['client_name']; ?></td>
                                                  <td class="text-center"><?php echo $order['client_contact']; ?></td>
                                                  <td class="text-center"><?php echo $order['repair_type']; ?></td>
                                                  <td class="text-center">$<?php echo $order['grand_total']; ?></td>
                                                  <td class="text-center"><?php echo $order['order_date']; ?></td>
                                                  <td class="text-center"><?php echo $order['service_type']; ?></td>
                                                  <td class="text-center">
                                                    <a href="<?php echo 'view_order_details.php?order_id='.$order['order_id']; ?>" title="View Order Details"><i class="nc-icon nc-tap-01 fa-2x text-info"></i></a>
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
                </div>
              </div>
            <!-- wizard container -->
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
          $('#new_project').DataTable( {
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


    <script>
      $(document).ready(function() {
          $('#inprogress_project').DataTable( {
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


    <script>
      $(document).ready(function() {
          $('#completed_project').DataTable( {
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


    <script>
      $(document).ready(function() {
          $('#cancled_project').DataTable( {
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


    <script>
      $(document).ready(function() {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
      });
    </script>
</body>

</html>