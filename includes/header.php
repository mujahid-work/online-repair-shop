<header id="header" class="header header-hide">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="index.php" class="scrollto"><span>e</span>Startup</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-has-children"><a href="">Our Services</a>
            <ul>
              <?php

                $repair_types=$obj->getAllRepairTypes();

                if(!empty($repair_types)){
                  foreach ($repair_types as $repair) {
              ?>
                    <li><a href="<?php echo 'ExeFile.php?repair_id='.$repair['repair_id'].'&&repair_title='.$repair['repair_title'].'&&repair_img='.$repair['repair_pic']; ?>"><?php echo $repair['repair_title']; ?></a></li>
              <?php
                  }
                }

              ?>
            </ul>
          </li>
          <li><a href="pricing.php">Pricing</a></li>
          <li><a href="faqs.php">FAQs</a></li>
          <li><a href="blog.php">Blog</a></li>
          <li><a href="index.php#about-us">About Us</a></li>
          <li><a href="index.php#contact">Contact Us</a></li>
          <li><a href="jobs.php">Jobs</a></li>
          <?php
            session_start();
            if(isset($_SESSION['logged_in_id']) && $_SESSION['logged_in_id']!="" && $_SESSION['role']=="Customer"){
          ?>
              <li class="menu-has-children">
                  <a href="#" style="color: #71c55d;">
                    <strong><?php echo $_SESSION['logged_in_name']; ?></strong>
                  </a>
                  <ul>
                    <li><a href="portals/clients/dashboard.php">My Account</a></li>
                    <li><a href="logout.php">Logout</a></li>
                  </ul>
              </li>
          <?php
            }
            else if(isset($_SESSION['logged_in_id']) && $_SESSION['logged_in_id']!="" && $_SESSION['role']=="Tech"){
          ?>
              <li class="menu-has-children">
                  <a href="#" style="color: #71c55d;">
                    <strong><?php echo $_SESSION['logged_in_name']; ?></strong>
                  </a>
                  <ul>
                    <li><a href="portals/employees/dashboard.php">My Account</a></li>
                    <li><a href="logout.php">Logout</a></li>
                  </ul>
              </li>
          <?php
            }
            else{
          ?>
              <li><a href="customer_login.php">Login as Customer</a></li>
              <li><a href="tech_login.php">Login as Tech</a></li>
          <?php
            }
          ?>          
          
          <!-- <li class="menu-has-children"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li> -->
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
</header>