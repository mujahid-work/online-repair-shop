<div class="sidebar" data-color="white" data-active-color="danger">
  <div class="logo">
    <a href="http://www.creative-tim.com" class="simple-text logo-mini">
      <div class="logo-image-small">
        <img src="../assets/img/logo-small.png">
      </div>
    </a>
    <a href="#" class="simple-text logo-normal">
      Company Name
      <!-- <div class="logo-image-big">
        <img src="../assets/img/logo-big.png">
      </div> -->
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="<?php if($_SESSION['active_tab']=='Dashboard'){ echo 'active';} ?>">
        <a href="dashboard.php">
          <i class="fa fa-tachometer" aria-hidden="true"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="<?php if($_SESSION['active_tab']=='Orders'){ echo 'active';} ?>">
        <a href="repair_orders.php">
          <i class="nc-icon nc-ruler-pencil"></i>
          <p>Repair Orders</p>
        </a>
      </li>
      <li class="nav-item <?php if($_SESSION['active_tab']=='Services'){ echo 'active';} ?>">
        <a class="nav-link collapsed" href="#services" data-toggle="collapse" data-target="#services">
          <i class="nc-icon nc-diamond"></i>
          <p>Manange Services</p>
        </a>
          <div class="collapse" id="services" aria-expanded="false">
            <ul class="flex-column pl-2 nav">
              <li>
                <a href="manage_repair_types.php">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>Manage Repair Types</p>
                </a>
              </li>
              <li>
                <a href="manage_brands.php">
                  <i class="fa fa-tag" aria-hidden="true"></i>
                  <p>Manage Brands</p>
                </a>
              </li>
              <li>
                <a href="manage_models.php">
                  <i class="fa fa-tasks" aria-hidden="true"></i>
                  <p>Manage Models</p>
                </a>
              </li>
              <li>
                <a href="manage_services.php">
                  <i class="nc-icon nc-settings"></i>
                  <p>Manage Services</p>
                </a>
              </li>
              
            </ul>
          </div>
      </li>
      <li class="nav-item <?php if($_SESSION['active_tab']=='Zip Codes'){ echo 'active';} ?>">
        <a href="manage_zip_codes.php">
          <i class="fa fa-map-pin" aria-hidden="true"></i>
          <p>Manage Zip Codes</p>
        </a>
      </li>
      <li class="nav-item <?php if($_SESSION['active_tab']=='Stores'){ echo 'active';} ?>">
        <a class="nav-link collapsed" href="#stores" data-toggle="collapse" data-target="#stores">
          <i class="nc-icon nc-bank"></i>
          <p>Stores & Accounts</p>
        </a>
        <div class="collapse" id="stores" aria-expanded="false">
          <ul class="flex-column pl-2 nav">
            <li>
              <a href="manage_stores.php">
                <i class="nc-icon nc-bank"></i>
                <p>Manage Stores</p>
              </a>
            </li>
            <li>
              <a href="manage_stores_admin.php">
                <i class="fa fa-users"></i>
                <p>Manage Stores Admins</p>
              </a>
            </li>            
          </ul>
        </div>
      </li>
      <li class="<?php if($_SESSION['active_tab']=='Employees'){ echo 'active';} ?>">
        <a href="manage_employees.php">
          <i class="nc-icon nc-badge"></i>
          <p>Manage Employees</p>
        </a>
      </li>
      <li class="<?php if($_SESSION['active_tab']=='Customers'){ echo 'active';} ?>">
        <a href="manage_customers.php">
          <i class="nc-icon nc-single-02"></i>
          <p>Manage Customers</p>
        </a>
      </li>
      <!-- <li class="<?php if($_SESSION['active_tab']=='Invoice'){ echo 'active';} ?>">
        <a href="invoice.php">
          <i class="nc-icon nc-paper"></i>
          <p>Invoice Generation</p>
        </a>
      </li> -->
    </ul>
  </div>
</div>