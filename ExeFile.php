<?php

	include_once('MethodsFile.php');
    $obj=new MethodsClass();


    if(isset($_POST['customer_signup_btn'])){

		$first_name=$_POST['fname_field'];
		$last_name=$_POST['lname_field'];
		$email=$_POST['email_field'];
		$password=$_POST['password_field'];
		$contact=$_POST['contact_field'];		
		$country=$_POST['country_field'];
		$address=$_POST['address_field'];
		$city=$_POST['city_field'];
		$zip=$_POST['zip_field'];
	  	

	  	$value=$obj->addCustomer($first_name,$last_name,$email,$password,$contact,$country,$address,$city,$zip);

		if($value==true){

			header("Location:customer_login.php");
	  	}
	  	else{

	  		header("Location:customer_signup.php");
	  	}		
	}


	if(isset($_POST['customer_login_btn'])){

		$email=$_POST['email_field'];
		$password=$_POST['password_field'];

		$value=$obj->loginValidate($email,$password);

		if(!empty($value)){

			if($value['role']=='Customer'){

				$customer_id=$value['customer_id'];
				$first_name=$value['first_name'];
				$last_name=$value['last_name'];
				$customer_email=$value['email'];
				$role=$value['role'];
				$customer_pic=$value['customer_pic'];
				$customer_address=$value['address'];
				$customer_contact=$value['contact_number'];

				session_start();

				$_SESSION['logged_in_id']=$customer_id;
				$_SESSION['logged_in_name']=$first_name.' '.$last_name;
				$_SESSION['role']=$role;
				$_SESSION['logged_in_email']=$customer_email;
				$_SESSION['logged_in_pic']=$customer_pic;
				$_SESSION['logged_in_address']=$customer_address;
				$_SESSION['logged_in_contact']=$customer_contact;

				if(isset($_SESSION['repair_id'])){
					header('Location:contact_details.php');
				}
				else{
					header('Location:index.php');
				}				
			}
			
		}
		else{

			header('Location:customer_login.php');
			
		}		
	}









	if(isset($_POST['tech_signup_btn'])){

		$first_name=$_POST['fname_field'];
		$last_name=$_POST['lname_field'];
		$email=$_POST['email_field'];
		$password=$_POST['password_field'];
		$contact=$_POST['contact_field'];		
		$country=$_POST['country_field'];
		$city=$_POST['city_field'];
		$zip=$_POST['zip_codes'];
		$service=$_POST['models'];
		$address=$_POST['address_field'];
		$background_check=$_POST['background_field'];
		$age_check=$_POST['age_field'];
		$experience=$_POST['experience_field'];

		$file=$_FILES['cv_field']['name'];
		$temp_file=$_FILES['cv_field']['tmp_name'];
	  	

	  	$value=$obj->addTechnician($first_name,$last_name,$email,$password,$contact,$country,$city,$zip,$address,$background_check,$age_check,$service,$experience,$file,$temp_file);

		if($value==true){

			header("Location:tech_login.php");
	  	}
	  	else{

	  		header("Location:tech_signup.php");
	  	}		
	}


	if(isset($_POST['tech_job_apply_btn'])){

		$job_id=$_POST['job_id_field'];
		$store_id=$_POST['store_id_field'];
		$first_name=$_POST['fname_field'];
		$last_name=$_POST['lname_field'];
		$email=$_POST['email_field'];
		$password=$_POST['password_field'];
		$contact=$_POST['contact_field'];		
		$country=$_POST['country_field'];
		$city=$_POST['city_field'];
		$zip=$_POST['zip_codes'];
		$service=$_POST['models'];
		$address=$_POST['address_field'];
		$background_check=$_POST['background_field'];
		$age_check=$_POST['age_field'];
		$experience=$_POST['experience_field'];

		$file=$_FILES['cv_field']['name'];
		$temp_file=$_FILES['cv_field']['tmp_name'];
	  	

	  	$value=$obj->applyForJob($store_id,$first_name,$last_name,$email,$password,$contact,$country,$city,$zip,$address,$background_check,$age_check,$service,$experience,$file,$temp_file);

		if($value==true){

			header("Location:jobs.php");
	  	}
	  	else{

	  		header("Location:job_details.php?job_id=".$job_id);
	  	}		
	}


	if(isset($_POST['tech_login_btn'])){

		$email=$_POST['email_field'];
		$password=$_POST['password_field'];

		$value=$obj->techLoginValidate($email,$password);

		if(!empty($value)){

			if($value['role']=='Tech'){

				$tech_id=$value['tech_id'];
				$store_id=$value['store_id'];
				$first_name=$value['first_name'];
				$last_name=$value['last_name'];
				$tech_email=$value['email'];
				$role=$value['role'];
				$tech_pic=$value['tech_pic'];

				session_start();

				$_SESSION['logged_in_id']=$tech_id;
				$_SESSION['tech_store_id']=$store_id;
				$_SESSION['logged_in_name']=$first_name.' '.$last_name;
				$_SESSION['role']=$role;
				$_SESSION['logged_in_email']=$tech_email;
				$_SESSION['logged_in_pic']=$tech_pic;

				header('Location:index.php');
			}
			
		}
		else{

			header('Location:tech_login.php');
			
		}		
	}









	if(isset($_GET['repair_id'])){ // step for selecting brand

		session_start();

		$repair_id=$_GET['repair_id'];
		$repair_title=$_GET['repair_title'];
		$repair_img=$_GET['repair_img'];

		$_SESSION['repair_title']=$repair_title;
		$_SESSION['repair_img']=$repair_img;
		$_SESSION['repair_id']=$repair_id;

		header("Location:select_brand.php?repair_id=".$repair_id);
	}


	if(isset($_GET['brand_id'])){ // step for selecting model

		session_start();

		$brand_id=$_GET['brand_id'];
		$brand_title=$_GET['brand_title'];
		$brand_pic=$_GET['brand_pic'];

		$_SESSION['brand_title']=$brand_title;
		$_SESSION['brand_pic']=$brand_pic;
		$_SESSION['brand_id']=$brand_id;


		header("Location:select_model.php?brand_id=".$brand_id);
	}


	if(isset($_GET['model_id'])){ // step for selecting services

		session_start();

		$model_id=$_GET['model_id'];
		$model_title=$_GET['model_title'];
		$model_pic=$_GET['model_pic'];

		$_SESSION['model_title']=$model_title;
		$_SESSION['model_pic']=$model_pic;
		$_SESSION['model_id']=$model_id;


		header("Location:select_services.php?model_id=".$model_id);
	}


	if(isset($_POST['services_btn'])){ // step for getting issues and prices

		session_start();

		$services_prices=$_POST['services'];

		$services=array();
		$service_prices=array();

		for ($i=0; $i < sizeof($services_prices) ; $i++) {

			list($a, $b) = explode(',',$services_prices[$i] );
			$services[]=$a;
			$service_prices[]=$b;
		}

		$_SESSION['services']=$services;
		$_SESSION['service_prices']=$service_prices;
		$_SESSION['grand_total']=array_sum($_SESSION['service_prices']);


		header("Location:zip_code.php");	
	}


	if(isset($_POST['zip_code_btn'])){ // step for checking zip code

		session_start();

		$zip_code=$_POST['zip_field'];


		$_SESSION['zip_code']=$zip_code;

		header("Location:select_service_type.php");


	}


	if(isset($_GET['service_type'])){ // step for selecting services

		session_start();

		$service_type=$_GET['service_type'];

		if($service_type=='Store Repair'){
			$service_type_pic='assets/img/store.png';
		}

		if($service_type=='Mobile Repair'){
			$service_type_pic='assets/img/mobile_repair.svg';
		}
		

		$_SESSION['service_type']=$service_type;
		$_SESSION['service_type_pic']=$service_type_pic;

		$zip_code=$_SESSION['zip_code'];



		if($_SESSION['service_type']=='Store Repair'){

			$value=$obj->checkStoreAvailabilty($zip_code,$_SESSION['model_id']);

			if($value==true){

				header("Location:select_store.php?zip_code=".$zip_code);				
			}
			else{

				$value=$obj->checkZipCode($zip_code,$_SESSION['repair_id'],$_SESSION['model_id']);

				if($value==true){

					header("Location:time_slot.php");
				}
				else{

					header("Location:no_services.php");					
				}
			}
		}

		if($_SESSION['service_type']=='Mobile Repair'){

			unset($_SESSION['store_id']);
			unset($_SESSION['store_title']);
			unset($_SESSION['store_pic']);

			$value=$obj->checkZipCode($zip_code,$_SESSION['repair_id'],$_SESSION['model_id']);

			if($value==true){

				header("Location:time_slot.php");
			}
			else{

				$value=$obj->checkStoreAvailabilty($zip_code,$_SESSION['model_id']);

				if($value==true){

					header("Location:select_store.php?zip_code=".$zip_code);
				}
				else{

					header("Location:no_services.php");					
				}				
			}
		}
	}


	if(isset($_GET['store_id'])){ // step for selecting store

		session_start();

		$store_id=$_GET['store_id'];
		$store_title=$_GET['store_title'];
		$store_pic=$_GET['store_pic'];
		

		$_SESSION['store_id']=$store_id;
		$_SESSION['store_title']=$store_title;
		$_SESSION['store_pic']=$store_pic;

		header("Location:time_slot.php");
	}


	if(isset($_POST['time_btn'])){ // step for getting time

		session_start();

		$time=$_POST['time_field'];
		$time_slot=$_POST['time'];

		$_SESSION['time']=$time;
		$_SESSION['time_slot']=$time_slot;


		if(isset($_SESSION['logged_in_id'])){
			header('Location:contact_details.php');
			
		}
		else{
			header('Location:customer_login.php');
		}	
	}


	if(isset($_POST['contact_btn'])){ // step for getting time

		session_start();

		$name=$_POST['name_field'];
		$address=$_POST['address_field'];
		$email=$_POST['email_field'];
		$contact=$_POST['contact_field'];

		$_SESSION['name']=$name;	
		$_SESSION['address']=$address;
		$_SESSION['email']=$email;
		$_SESSION['contact']=$contact;

		header("Location:preview_order.php");
	}


	if(isset($_POST['confirm_btn'])){ // final step
		
		session_start();

		$client_id=$_SESSION['logged_in_id'];
		$client_name=$_SESSION['name'];	
		$client_address=$_SESSION['address'];
		$client_email=$_SESSION['email'];
		$client_contact=$_SESSION['contact'];
		$client_zip_code=$_SESSION['zip_code'];

		$date=$_SESSION['time'];
		$time_slot=$_SESSION['time_slot'];
		$grand_total=$_SESSION['grand_total'];
		$order_date=date("Y-m-d");
		$order_status='New';
		$repair_type=$_SESSION['repair_title'];
		$brand=$_SESSION['brand_title'];
		$model=$_SESSION['model_title'];
		$service_type=$_SESSION['service_type'];
		$store_id=$_SESSION['store_id'];
		
		$services=$_SESSION['services'];
		$service_prices=$_SESSION['service_prices'];

		$value=$obj->insertOrderDetails($client_id,$client_name,$client_address,$client_email,$client_contact,$client_zip_code,$date,$time_slot,$grand_total,$order_date,$order_status,$repair_type,$brand,$model,$service_type,$store_id,$services,$service_prices);


		if($value==true){

			session_start();

			unset($_SESSION['name']);
			unset($_SESSION['address']);
			unset($_SESSION['email']);
			unset($_SESSION['contact']);
			unset($_SESSION['time']);
			unset($_SESSION['store_id']);
			unset($_SESSION['store_title']);
			unset($_SESSION['store_pic']);
			unset($_SESSION['service_type']);
			unset($_SESSION['service_type_pic']);
			unset($_SESSION['zip_code']);
			unset($_SESSION['services']);
			unset($_SESSION['service_prices']);
			unset($_SESSION['grand_total']);
			unset($_SESSION['model_title']);
			unset($_SESSION['model_pic']);
			unset($_SESSION['model_id']);
			unset($_SESSION['brand_title']);
			unset($_SESSION['brand_pic']);
			unset($_SESSION['brand_id']);
			unset($_SESSION['repair_title']);
			unset($_SESSION['repair_img']);
			unset($_SESSION['repair_id']);


			header('Location:order_submitted.php');
		}
		else{
			header("Location:preview_order.php");
		}			
	}


	if(isset($_GET['add'])){

		session_start();

		array_push($_SESSION['services'],$_GET['add']);
		array_push($_SESSION['service_prices'],$_GET['price']);

		$_SESSION['grand_total']=array_sum($_SESSION['service_prices']);

		header("Location:contact_details.php");
	}


	if(isset($_GET['remove'])){

		session_start();

		$key=array_search($_GET['remove'],$_SESSION['services']);

	    if($key!==false){

		    unset($_SESSION['services'][$key]);
		    $_SESSION["services"] = array_values($_SESSION["services"]);
		}


		$key=array_search($_GET['price'],$_SESSION['service_prices']);

	    if($key!==false){
	    	
		    unset($_SESSION['service_prices'][$key]);
		    $_SESSION["service_prices"] = array_values($_SESSION["service_prices"]);
		}

		$_SESSION['grand_total']=array_sum($_SESSION['service_prices']);

		header("Location:contact_details.php");
	}
	

?>