<?php

	include_once('StoreAdminMethods.php');
    $obj=new StoreAdminMethods();




    if(isset($_POST['login_btn'])){

		$email=$_POST['email_field'];
		$password=$_POST['password_field'];

		$value=$obj->loginValidate($email,$password);

		if(!empty($value)){

			if($value['role']=='Store Admin'){



				$store_admin_id=$value['store_admin_id'];
				$store_admin_full_name=$value['store_admin_full_name'];
				$store_admin_email=$value['email'];
				$role=$value['role'];
				$store_admin_pic=$value['store_admin_pic'];

				$store_id=$obj->getSingleStoreAdminRelationWithStores($store_admin_id);
				$store_ids=array_column($store_id, 'store_id');

				session_start();

				$_SESSION['logged_in_id']=$store_admin_id;
				$_SESSION['logged_in_store_id']=$store_ids;
				$_SESSION['logged_in_name']=$store_admin_full_name;
				$_SESSION['role']=$role;
				$_SESSION['logged_in_email']=$store_admin_email;
				$_SESSION['logged_in_pic']=$store_admin_pic;

				header('Location:dashboard.php');
			}
			
		}
		else{

			header('Location:index.php');
			
		}		
	}


	if(isset($_POST['update_admin_profile_btn'])){

		$full_name=$_POST['name_field'];
		$mobile=$_POST['mobile_field'];
		$email=$_POST['email_field'];

		$pic=$_FILES['file_field']['name'];
		$temp_pic=$_FILES['file_field']['tmp_name'];
	  	

	  	$value=$obj->updateAdminData($full_name,$mobile,$email,$pic,$temp_pic);

		if($value==true){

			header("Location:account_settings.php");
	  	}
	  	else{

	  		header("Location:account_settings.php");
	  	}		
	}


	if(isset($_POST['update_pass_btn'])){

		$current_pass=$_POST['current_pass_field'];
		$new_pass=$_POST['new_pass_field'];
		$confirm_pass=$_POST['confirm_pass_field'];

		if($new_pass==$confirm_pass){

			$value=$obj->updateAdminPassword($current_pass,$new_pass);

				if($value==true){

					header("Location:logout.php");
			  	}
			  	else{

			  		header("Location:account_settings.php");
			  	}
		}
		else{
			echo 'Password does not matched';
		}		
	}


	if(isset($_POST['send_pin_btn'])){

		$email=$_POST['email_field'];

		$value=$obj->checkEmail($email);

		if($value==true){

			$result=$obj->sendVerificationCode($email);

			if($result==true){

				header("Location:forget2.php?pin_succ=1");
			}
			else{

				header("Location:forget1.php?pin_err=1");
			}
	  	}
	  	else{

	  		header("Location:forget1.php?email_err=1");
	  	}		
	}


	if(isset($_POST['pin_verify_btn'])){

		session_start();

		$pin=$_POST['pin_field'];

		if($pin==$_SESSION['pin']){

			header("Location:forget3.php");
		}
		else{

			header("Location:forget2.php?ver_err=1");
		}
	}


	if(isset($_POST['reset_pass_btn'])){

		session_start();

		$email=$_SESSION['email'];
		$new_pass=$_POST['new_pass_field'];
		$cpass=$_POST['cpass_field'];

		if($new_pass==$cpass){

			$value=$obj->resetPassword($email,$new_pass);
			if($value==true){

				unset($_SESSION['pin']);
				unset($_SESSION['email']);

				header("Location:index.php?reset_succ=1");
			}
			else{

				header("Location:forget3.php?reset_err=1");
			}			
		}
		else{

			header("Location:forget3.php?match_err=1");
		}
	}


	if(isset($_POST['update_tech_btn'])){

		echo $tech_id=$_POST['id_field'];
		$first_name=$_POST['fname_field'];
		$last_name=$_POST['lname_field'];
		$email=$_POST['email_field'];
		$password=$_POST['password_field'];
		$contact=$_POST['contact_field'];		
		$country=$_POST['country_field'];
		$city=$_POST['city_field'];		
		$about=$_POST['about_field'];
		$address=$_POST['address_field'];
		$store=$_POST['store_field'];
		$background_check=$_POST['background_field'];
		$age_check=$_POST['age_field'];		
		$experience=$_POST['experience_field'];

		$zip=$_POST['zip_codes'];
		$service=$_POST['models'];
	  	

	  	$value=$obj->updateTechnician($tech_id,$first_name,$last_name,$email,$password,$contact,$country,$city,$zip,$about,$address,$store,$background_check,$age_check,$service,$experience);

		if($value==true){

			header("Location:view_tech.php?employee_edit_id=".$tech_id);
	  	}
	  	else{

	  		header("Location:view_tech.php?employee_edit_id=".$tech_id);
	  	}		
	}


	if(isset($_POST['add_tech_btn'])){

		$first_name=$_POST['fname_field'];
		$last_name=$_POST['lname_field'];
		$email=$_POST['email_field'];
		$password=$_POST['password_field'];
		$contact=$_POST['contact_field'];		
		$country=$_POST['country_field'];
		$city=$_POST['city_field'];		
		$about=$_POST['about_field'];
		$address=$_POST['address_field'];
		$store=$_POST['store_field'];
		$background_check=$_POST['background_field'];
		$age_check=$_POST['age_field'];		
		$experience=$_POST['experience_field'];

		$zip=$_POST['zip_codes'];
		$service=$_POST['models'];

		$pic=$_FILES['file_field']['name'];
		$temp_pic=$_FILES['file_field']['tmp_name'];

	  	

	  	$value=$obj->addTechnician($first_name,$last_name,$email,$password,$contact,$country,$city,$zip,$about,$address,$store,$background_check,$age_check,$service,$experience,$pic,$temp_pic);

		if($value==true){

			header("Location:manage_tech.php");
	  	}
	  	else{

	  		header("Location:manage_tech.php");
	  	}		
	}


	if(isset($_GET['employee_disbale_id'])){

		$tech_id=$_GET['employee_disbale_id'];

		$value=$obj->disableTechnician($tech_id);

		if($value==true){

			header("Location:manage_tech.php");
	  	}
	  	else{

	  		header("Location:manage_tech.php");
	  	}
	}


	if(isset($_GET['employee_enable_id'])){

		$tech_id=$_GET['employee_enable_id'];

		$value=$obj->enableTechnician($tech_id);

		if($value==true){

			header("Location:manage_tech.php");
	  	}
	  	else{

	  		header("Location:manage_tech.php");
	  	}
	}


	if(isset($_POST['order_status_btn'])){

		$order_id=$_POST['order_id_field'];
		$order_status=$_POST['status_field'];
		$tech_id=$_POST['tech_id_field'];

		$value=$obj->updateOrderStatus($order_id,$order_status,$tech_id);

		if($value==true){

			header("Location:view_order_details.php?order_id=".$order_id);
	  	}
	  	else{

	  		header("Location:view_order_details.php?order_id=".$order_id);
	  	}		
	}


	if(isset($_POST['create_custom_order'])){

		$name=$_POST['name_field'];
		$email=$_POST['email_field'];
		$contact=$_POST['contact_field'];
		$zip=$_POST['zip_field'];
		$address=$_POST['address_field'];
		$repair_type=$_POST['repair_type_field'];
		$brand=$_POST['brand_field'];
		$model=$_POST['model_field'];
		$store=$_POST['store_field'];
		$time=$_POST['time_field'];
		$time_slot=$_POST['time'];
		$order_date=date("Y-m-d");
		$order_status='New';
		$service_type='Store Repair';

		$issues=$_POST['issues'];
		$prices=$_POST['prices'];

		$new_issues=array();
		$new_prices=array();

		for ($i=0; $i < sizeof($issues) ; $i++) { 
			if($issues[$i]!=""){
				$new_issues[]=$issues[$i];
			}
		}

		for ($i=0; $i < sizeof($prices) ; $i++) { 
			if($prices[$i]!=""){
				$new_prices[]=$prices[$i];
			}
		}

		$grand_total=array_sum($new_prices);

		$value=$obj->createCustomOrder($name,$email,$contact,$zip,$address,$repair_type,$brand,$model,$store,$time_slot,$time,$order_date,$order_status,$service_type,$grand_total,$new_issues,$new_prices);

		if($value==true){

			header("Location:repair_orders.php");
	  	}
	  	else{

	  		header("Location:custom_order.php");
	  	}		
	}


	if(isset($_POST['add_part_btn'])){

		$title=$_POST['title_field'];
		$price=$_POST['price_field'];
		$qty=$_POST['qty_field'];
		$min_qty=$_POST['min_qty_field'];
		$store=$_POST['store_field'];
		$description=$_POST['description_field'];

		$pic=$_FILES['file_field']['name'];
		$temp_pic=$_FILES['file_field']['tmp_name'];

	  	

	  	$value=$obj->addPart($title,$price,$qty,$min_qty,$store,$description,$pic,$temp_pic);

		if($value==true){

			header("Location:manage_inventory.php");
	  	}
	  	else{

	  		header("Location:manage_inventory.php");
	  	}		
	}


	if(isset($_POST['update_part_btn'])){

		$part_id=$_POST['id_field'];
		$title=$_POST['title_field'];
		$price=$_POST['price_field'];
		$qty=$_POST['qty_field'];
		$min_qty=$_POST['min_qty_field'];
		$store=$_POST['store_field'];
		$description=$_POST['description_field'];

		$pic=$_FILES['file_field']['name'];
		$temp_pic=$_FILES['file_field']['tmp_name'];

	  	

	  	$value=$obj->updatePart($part_id,$title,$price,$qty,$min_qty,$store,$description,$pic,$temp_pic);

		if($value==true){

			header("Location:manage_inventory.php");
	  	}
	  	else{

	  		header("Location:manage_inventory.php");
	  	}		
	}











	if(isset($_POST['add_job_btn'])){

		$title=$_POST['title_field'];
		$store=$_POST['store_field'];
		$about=$_POST['about_field'];
		$city=$_POST['city_field'];
		$state=$_POST['state_field'];
		$requirments=$_POST['requirments_field'];
		$benefit=$_POST['benefit_field'];
		$additional=$_POST['additional_field'];	  	

	  	$value=$obj->addJob($title,$store,$about,$city,$state,$requirments,$benefit,$additional);

		if($value==true){

			header("Location:manage_jobs.php");
	  	}
	  	else{

	  		header("Location:manage_jobs.php");
	  	}		
	}


	if(isset($_POST['update_job_btn'])){

		$job_id=$_POST['id_field'];
		$title=$_POST['title_field'];
		$store=$_POST['store_field'];
		$about=$_POST['about_field'];
		$city=$_POST['city_field'];
		$state=$_POST['state_field'];
		$requirments=$_POST['requirments_field'];
		$benefit=$_POST['benefit_field'];
		$additional=$_POST['additional_field'];	  	

	  	$value=$obj->updateJob($job_id,$title,$store,$about,$city,$state,$requirments,$benefit,$additional);

		if($value==true){

			header("Location:manage_jobs.php");
	  	}
	  	else{

	  		header("Location:manage_jobs.php");
	  	}		
	}


	if(isset($_GET['job_del_id'])){

		$job_id=$_GET['job_del_id'];	  	

	  	$value=$obj->deleteJob($job_id);

		if($value==true){

			header("Location:manage_jobs.php");
	  	}
	  	else{

	  		header("Location:manage_jobs.php");
	  	}		
	}