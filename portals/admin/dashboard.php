<?php
    include_once('AdminMethods.php');
    $obj=new AdminMethods();

    session_start();

    $_SESSION['active_tab']='Dashboard';

    if(!isset($_SESSION['logged_in_id']) || $_SESSION['logged_in_id']=="" || $_SESSION['role'] != 'Admin'){
      header("Location:index.php");
    }

    $page = $_SERVER['PHP_SELF'];
    $sec = "60";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    eStartUp | Dashboard
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
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Repair Orders</h5>
              </div>
              <div class="card-body ">
                <canvas id=chartHours width="400" height="100"></canvas>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-history"></i> Updated 3 minutes ago
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-md-4">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Email Statistics</h5>
                <p class="card-category">Last Campaign Performance</p>
              </div>
              <div class="card-body ">
                <canvas id="chartEmail"></canvas>
              </div>
              <div class="card-footer ">
                <div class="legend">
                  <i class="fa fa-circle text-primary"></i> Opened
                  <i class="fa fa-circle text-warning"></i> Read
                  <i class="fa fa-circle text-danger"></i> Deleted
                  <i class="fa fa-circle text-gray"></i> Unopened
                </div>
                <hr>
                <div class="stats">
                  <i class="fa fa-calendar"></i> Number of emails sent
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">NASDAQ: AAPL</h5>
                <p class="card-category">Line Chart with Points</p>
              </div>
              <div class="card-body">
                <canvas id="speedChart" width="400" height="100"></canvas>
              </div>
              <div class="card-footer">
                <div class="chart-legend">
                  <i class="fa fa-circle text-info"></i> Tesla Model S
                  <i class="fa fa-circle text-warning"></i> BMW 5 Series
                </div>
                <hr/>
                <div class="card-stats">
                  <i class="fa fa-check"></i> Data information certified
                </div>
              </div>
            </div>
          </div>
        </div> -->
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
</body>

</html>