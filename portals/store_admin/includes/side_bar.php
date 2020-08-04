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
      <li class="<?php if($_SESSION['active_tab']=='Custom Orders'){ echo 'active';} ?>">
        <a href="custom_order.php">
          <i class="nc-icon nc-ruler-pencil"></i>
          <p>Create Custom Order</p>
        </a>
      </li>
      <li class="<?php if($_SESSION['active_tab']=='Technicians'){ echo 'active';} ?>">
        <a href="manage_tech.php">
          <i class="fa fa-users" aria-hidden="true"></i>
          <p>Manage Technicians</p>
        </a>
      </li>
      <li class="<?php if($_SESSION['active_tab']=='Inventory'){ echo 'active';} ?>">
        <a href="manage_inventory.php">
          <i class="fa fa-houzz" aria-hidden="true"></i>
          <p>Manage Inventory</p>
        </a>
      </li>
      <li class="<?php if($_SESSION['active_tab']=='Jobs'){ echo 'active';} ?>">
        <a href="manage_jobs.php">
          <i class="fa fa-briefcase" aria-hidden="true"></i>
          <p>Manage Jobs</p>
        </a>
      </li>
      <li class="<?php if($_SESSION['active_tab']=='Account Settings'){ echo 'active';} ?>">
        <a href="account_settings.php">
          <i class="fa fa-cogs"></i>
          <p>Account Settings</p>
        </a>
      </li>
      <li>
        <a href="logout.php">
          <i class="fa fa-sign-out"></i>
          <p>Logout</p>
        </a>
      </li>
    </ul>
  </div>
</div>