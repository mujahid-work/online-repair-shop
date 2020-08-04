<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-info">
                <i class="nc-icon nc-ruler-pencil text-info"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                  <?php
                    $total_count=$obj->countAllNewOrders();
                  ?>
                <p class="card-category">New Repair Orders</p>
                <p class="card-title"><?php echo $total_count; ?><p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="nc-icon nc-ruler-pencil text-info"></i>
            <a href="repair_orders.php" style="color: grey;">View All Orders</a>
          </div>
        </div>
      </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-ruler-pencil text-warning"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                  <?php
                    $total_count=$obj->countAllInProgressOrders();
                  ?>
                <p class="card-category">In-Progress Repair Orders</p>
                <p class="card-title"><?php echo $total_count; ?><p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="nc-icon nc-ruler-pencil text-warning"></i>
            <a href="repair_orders.php" style="color: grey;">View All Orders</a>
          </div>
        </div>
      </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-success">
                <i class="nc-icon nc-ruler-pencil text-success"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                  <?php
                    $total_count=$obj->countAllCompletedOrders();
                  ?>
                <p class="card-category">Completed Repair Orders</p>
                <p class="card-title"><?php echo $total_count; ?><p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="nc-icon nc-ruler-pencil text-success"></i>
            <a href="repair_orders.php" style="color: grey;">View All Orders</a>
          </div>
        </div>
      </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-danger">
                <i class="nc-icon nc-ruler-pencil text-danger"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                  <?php
                    $total_count=$obj->countAllCancelledOrders();
                  ?>
                <p class="card-category">Cancelled Repair Orders</p>
                <p class="card-title"><?php echo $total_count; ?><p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="nc-icon nc-ruler-pencil text-danger"></i>
            <a href="repair_orders.php" style="color: grey;">View All Orders</a>
          </div>
        </div>
      </div>
  </div>
</div>