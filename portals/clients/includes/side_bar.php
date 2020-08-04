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
        <a href="my_orders.php">
          <i class="nc-icon nc-ruler-pencil"></i>
          <p>My Orders</p>
        </a>
      </li>
      <li class="<?php if($_SESSION['active_tab']=='Account Settings'){ echo 'active';} ?>">
        <a href="account_settings.php">
          <i class="fa fa-cogs"></i>
          <p>Account Settings</p>
        </a>
      </li>
      <li>
        <a href="../../logout.php">
          <i class="fa fa-sign-out"></i>
          <p>Logout</p>
        </a>
      </li>
    </ul>
  </div>
</div>