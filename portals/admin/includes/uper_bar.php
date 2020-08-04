<div class="row">
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
                    $total_count=$obj->countAllOrders();
                  ?>
                <p class="card-category">Repair Orders</p>
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
              <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-money-coins text-success"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                  <?php
                    $grand_total=$obj->getTotalRevenue();

                    if($grand_total==""){
                      $grand_total=0;
                    }
                  ?>
                <p class="card-category">Revenue</p>
                <p class="card-title">$<?php echo $grand_total; ?> <p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="nc-icon nc-money-coins text-success"></i>
            <a href="#" style="color: grey;">View Reports</a>
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
                <i class="nc-icon nc-badge text-danger"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <?php
                  $employees=$obj->getAllTechnicians();
                ?>
                <p class="card-category">Employees</p>
                <p class="card-title"><?php echo sizeof($employees); ?><p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="nc-icon nc-badge text-danger"></i>
            <a href="manage_employees.php" style="color: grey;">View All Employees</a>
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
                <i class="nc-icon nc-single-02 text-primary"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <?php
                  $customers=$obj->getAllCustomers();
                ?>
                <p class="card-category">Customers</p>
                <p class="card-title"><?php echo sizeof($customers); ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="nc-icon nc-single-02 text-primary"></i>
            <a href="manage_customers.php" style="color: grey;">View All Customers</a>
          </div>
        </div>
      </div>
  </div>
</div>