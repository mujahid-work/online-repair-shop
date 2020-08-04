<?php

	include_once('EmployeeMethods.php');
    $obj=new EmployeeMethods();




    if(isset($_POST['login_btn'])){

		$email=$_POST['email_field'];
		$password=$_POST['password_field'];

		$value=$obj->loginValidate($email,$password);

		if(!empty($value)){

			if($value['role']=='Tech'){

				$tech_id=$value['tech_id'];
				$store_id=$value['store_id'];
				$tech_name=$value['first_name'].' '.$value['last_name'];
				$tech_email=$value['email'];
				$role=$value['role'];
				$tech_pic=$value['tech_pic'];

				session_start();

				$_SESSION['logged_in_id']=$tech_id;
				$_SESSION['tech_store_id']=$store_id;
				$_SESSION['logged_in_name']=$tech_name;
				$_SESSION['role']=$role;
				$_SESSION['logged_in_email']=$tech_email;
				$_SESSION['logged_in_pic']=$tech_pic;

				header('Location:dashboard.php');
			}
			
		}
		else{

			header('Location:index.php');
			
		}		
	}


	if(isset($_POST['update_tech_btn'])){

		$first_name=$_POST['fname_field'];
		$last_name=$_POST['lname_field'];
		$email=$_POST['email_field'];
		$contact=$_POST['contact_field'];		
		$country=$_POST['country_field'];
		$city=$_POST['city_field'];		
		$about=$_POST['about_field'];
		$address=$_POST['address_field'];
		$background_check=$_POST['background_field'];
		$age_check=$_POST['age_field'];		
		$experience=$_POST['experience_field'];

		$zip=$_POST['zip_codes'];
		$service=$_POST['models'];

		$pic=$_FILES['file_field']['name'];
		$temp_pic=$_FILES['file_field']['tmp_name'];

		// $cv=$_FILES['cv_field']['name'];
		// $temp_cv=$_FILES['cv_field']['tmp_name'];
	  	

	  	$value=$obj->updateTechnician($first_name,$last_name,$email,$contact,$country,$city,$zip,$about,$address,$background_check,$age_check,$service,$experience,$pic,$temp_pic);

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

			$value=$obj->updateTechPassword($current_pass,$new_pass);

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


	if(isset($_POST['order_status_btn'])){

		$order_id=$_POST['order_id_field'];
		$order_status=$_POST['status_field'];

		$value=$obj->updateOrderStatus($order_id,$order_status);

		if($value==true){

			header("Location:view_order_details.php?order_id=".$order_id);
	  	}
	  	else{

	  		header("Location:view_order_details.php?order_id=".$order_id);
	  	}		
	}


	if(isset($_POST['create_custom_order'])){

		session_start();

		$name=$_POST['name_field'];
		$email=$_POST['email_field'];
		$contact=$_POST['contact_field'];
		$zip=$_POST['zip_field'];
		$address=$_POST['address_field'];
		$repair_type=$_POST['repair_type_field'];
		$brand=$_POST['brand_field'];
		$model=$_POST['model_field'];
		$store=$_SESSION['tech_store_id'];
		$tech_id=$_SESSION['logged_in_id'];
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

		$value=$obj->createCustomOrder($name,$email,$contact,$zip,$address,$repair_type,$brand,$model,$store,$tech_id,$time_slot,$time,$order_date,$order_status,$service_type,$grand_total,$new_issues,$new_prices);

		if($value==true){

			header("Location:repair_orders.php");
	  	}
	  	else{

	  		header("Location:custom_order.php");
	  	}		
	}