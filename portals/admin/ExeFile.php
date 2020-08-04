<?php

	include_once('AdminMethods.php');
    $obj=new AdminMethods();




    if(isset($_POST['login_btn'])){

		$email=$_POST['email_field'];
		$password=$_POST['password_field'];

		$value=$obj->loginValidate($email,$password);

		if(!empty($value)){

			if($value['role']=='Admin'){

				$admin_id=$value['admin_id'];
				$admin_name=$value['admin_full_name'];
				$admin_email=$value['email'];
				$role=$value['role'];
				$admin_pic=$value['admin_pic'];

				session_start();

				$_SESSION['logged_in_id']=$admin_id;
				$_SESSION['logged_in_name']=$admin_name;
				$_SESSION['role']=$role;
				$_SESSION['logged_in_email']=$admin_email;
				$_SESSION['logged_in_pic']=$admin_pic;

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








	if(isset($_POST['update_customer_btn'])){

		$customer_id=$_POST['id_field'];
		$first_name=$_POST['fname_field'];
		$last_name=$_POST['lname_field'];
		$email=$_POST['email_field'];
		$password=$_POST['password_field'];
		$contact=$_POST['contact_field'];		
		$country=$_POST['country_field'];
		$address=$_POST['address_field'];
		$city=$_POST['city_field'];
		$zip=$_POST['zip_field'];
		$about=$_POST['about_field'];
	  	

	  	$value=$obj->updateCustomer($customer_id,$first_name,$last_name,$email,$password,$contact,$country,$address,$city,$zip,$about);

		if($value==true){

			header("Location:view_customer.php?customer_edit_id=".$customer_id);
	  	}
	  	else{

	  		header("Location:view_customer.php?customer_edit_id=".$customer_id);
	  	}		
	}


	if(isset($_GET['customer_disbale_id'])){

		$customer_id=$_GET['customer_disbale_id'];

		$value=$obj->disableCustomer($customer_id);

		if($value==true){

			header("Location:manage_customers.php");
	  	}
	  	else{

	  		header("Location:manage_customers.php");
	  	}
	}


	if(isset($_GET['customer_enable_id'])){

		$customer_id=$_GET['customer_enable_id'];

		$value=$obj->enableCustomer($customer_id);

		if($value==true){

			header("Location:manage_customers.php");
	  	}
	  	else{

	  		header("Location:manage_customers.php");
	  	}
	}










	if(isset($_POST['update_tech_btn'])){

		$tech_id=$_POST['id_field'];
		$first_name=$_POST['fname_field'];
		$last_name=$_POST['lname_field'];
		$email=$_POST['email_field'];
		$password=$_POST['password_field'];
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
	  	

	  	$value=$obj->updateTechnician($tech_id,$first_name,$last_name,$email,$password,$contact,$country,$city,$zip,$about,$address,$background_check,$age_check,$service,$experience);

		if($value==true){

			header("Location:view_employee.php?employee_edit_id=".$tech_id);
	  	}
	  	else{

	  		header("Location:view_employee.php?employee_edit_id=".$tech_id);
	  	}		
	}


	if(isset($_GET['employee_disbale_id'])){

		$tech_id=$_GET['employee_disbale_id'];

		$value=$obj->disableTechnician($tech_id);

		if($value==true){

			header("Location:manage_employees.php");
	  	}
	  	else{

	  		header("Location:manage_employees.php");
	  	}
	}


	if(isset($_GET['employee_enable_id'])){

		$tech_id=$_GET['employee_enable_id'];

		$value=$obj->enableTechnician($tech_id);

		if($value==true){

			header("Location:manage_employees.php");
	  	}
	  	else{

	  		header("Location:manage_employees.php");
	  	}
	}









	if(isset($_POST['add_store_admin_btn'])){

		$name=$_POST['name_field'];
		$store=$_POST['store_field'];
		$email=$_POST['email_field'];
		$contact=$_POST['contact_field'];
		$password=$_POST['password_field'];
		
		$pic=$_FILES['file_field']['name'];
		$temp_pic=$_FILES['file_field']['tmp_name'];

		$value=$obj->addStoreAdmin($name,$store,$email,$contact,$password,$pic,$temp_pic);

		if($value==true){

			header("Location:manage_stores_admin.php");
	  	}
	  	else{

	  		header("Location:manage_stores_admin.php");
	  	}		
	}


	if(isset($_POST['update_store_admin_btn'])){

		$store_admin_id=$_POST['id_field'];
		$name=$_POST['name_field'];
		$store=$_POST['store_field'];
		$email=$_POST['email_field'];
		$contact=$_POST['contact_field'];
		$password=$_POST['password_field'];
		$status=$_POST['status_field'];
		
		$pic=$_FILES['file_field']['name'];
		$temp_pic=$_FILES['file_field']['tmp_name'];

		$value=$obj->updateStoreAdmin($store_admin_id,$name,$store,$email,$contact,$password,$status,$pic,$temp_pic);

		if($value==true){

			header("Location:manage_stores_admin.php");
	  	}
	  	else{

	  		header("Location:manage_stores_admin.php");
	  	}		
	}










	if(isset($_POST['add_repair_btn'])){

		$title=$_POST['title_field'];
		
		$pic=$_FILES['file_field']['name'];
		$temp_pic=$_FILES['file_field']['tmp_name'];

		$value=$obj->addRepairType($title,$pic,$temp_pic);

		if($value==true){

			header("Location:manage_repair_types.php");
	  	}
	  	else{

	  		header("Location:manage_repair_types.php");
	  	}		
	}


	if(isset($_POST['update_repair_btn'])){

		$repair_id=$_POST['id_field'];
		$title=$_POST['title_field'];
		$status=$_POST['status_field'];
		
		$pic=$_FILES['file_field']['name'];
		$temp_pic=$_FILES['file_field']['tmp_name'];

		$value=$obj->updateRepairType($repair_id,$title,$status,$pic,$temp_pic);

		if($value==true){

			header("Location:manage_repair_types.php");
	  	}
	  	else{

	  		header("Location:manage_repair_types.php");
	  	}		
	}


	if(isset($_GET['repair_disbale_id'])){

		$repair_id=$_GET['repair_disbale_id'];

		$value=$obj->disableRepairType($repair_id);

		if($value==true){

			header("Location:manage_repair_types.php");
	  	}
	  	else{

	  		header("Location:manage_repair_types.php");
	  	}
	}


	if(isset($_GET['repair_enable_id'])){

		$repair_id=$_GET['repair_enable_id'];

		$value=$obj->enableRepairType($repair_id);

		if($value==true){

			header("Location:manage_repair_types.php");
	  	}
	  	else{

	  		header("Location:manage_repair_types.php");
	  	}
	}











	if(isset($_POST['add_brand_btn'])){

		$title=$_POST['title_field'];
		$repair_type=$_POST['repair_type'];
		
		$pic=$_FILES['file_field']['name'];
		$temp_pic=$_FILES['file_field']['tmp_name'];

		$value=$obj->addBrand($title,$repair_type,$pic,$temp_pic);

		if($value==true){

			header("Location:manage_brands.php");
	  	}
	  	else{

	  		header("Location:manage_brands.php");
	  	}		
	}


	if(isset($_POST['update_brand_btn'])){

		$brand_id=$_POST['id_field'];
		$title=$_POST['title_field'];
		$repair_type=$_POST['repair_type'];
		$status=$_POST['status_field'];
		
		$pic=$_FILES['file_field']['name'];
		$temp_pic=$_FILES['file_field']['tmp_name'];

		$value=$obj->updateBrand($brand_id,$title,$repair_type,$status,$pic,$temp_pic);

		if($value==true){

			header("Location:manage_brands.php");
	  	}
	  	else{

	  		header("Location:manage_brands.php");
	  	}		
	}


	if(isset($_GET['brand_disbale_id'])){

		$brand_id=$_GET['brand_disbale_id'];

		$value=$obj->disableBrand($brand_id);

		if($value==true){

			header("Location:manage_brands.php");
	  	}
	  	else{

	  		header("Location:manage_brands.php");
	  	}
	}


	if(isset($_GET['brand_enable_id'])){

		$brand_id=$_GET['brand_enable_id'];

		$value=$obj->enableBrand($brand_id);

		if($value==true){

			header("Location:manage_brands.php");
	  	}
	  	else{

	  		header("Location:manage_brands.php");
	  	}
	}









	if(isset($_POST['add_store_btn'])){

		$title=$_POST['title_field'];
		$address=$_POST['address_field'];
		$zip_codes=$_POST['zip_codes'];
		$models=$_POST['models'];
		
		$pic=$_FILES['file_field']['name'];
		$temp_pic=$_FILES['file_field']['tmp_name'];

		$value=$obj->addStore($title,$address,$zip_codes,$models,$pic,$temp_pic);

		if($value==true){

			header("Location:manage_stores.php");
	  	}
	  	else{

	  		header("Location:manage_stores.php");
	  	}		
	}


	if(isset($_POST['update_store_btn'])){

		$store_id=$_POST['id_field'];
		$title=$_POST['title_field'];
		$address=$_POST['address_field'];
		$zip_codes=$_POST['zip_codes'];
		$models=$_POST['models'];
		$status=$_POST['status_field'];
		
		$pic=$_FILES['file_field']['name'];
		$temp_pic=$_FILES['file_field']['tmp_name'];

		$value=$obj->updateStore($store_id,$title,$address,$zip_codes,$models,$status,$pic,$temp_pic);

		if($value==true){

			header("Location:manage_stores.php");
	  	}
	  	else{

	  		header("Location:manage_stores.php");
	  	}		
	}


	if(isset($_GET['store_disbale_id'])){

		$store_id=$_GET['store_disbale_id'];

		$value=$obj->disableStore($store_id);

		if($value==true){

			header("Location:manage_stores.php");
	  	}
	  	else{

	  		header("Location:manage_stores.php");
	  	}
	}


	if(isset($_GET['store_enable_id'])){

		$store_id=$_GET['store_enable_id'];

		$value=$obj->enableStore($store_id);

		if($value==true){

			header("Location:manage_stores.php");
	  	}
	  	else{

	  		header("Location:manage_stores.php");
	  	}
	}









	if(isset($_POST['add_model_btn'])){

		$title=$_POST['title_field'];
		$repair_type=$_POST['repair_type'];
		$brands=$_POST['brands'];
		
		$pic=$_FILES['file_field']['name'];
		$temp_pic=$_FILES['file_field']['tmp_name'];

		$value=$obj->addModel($title,$repair_type,$brands,$pic,$temp_pic);

		if($value==true){

			header("Location:manage_models.php");
	  	}
	  	else{

	  		header("Location:manage_models.php");
	  	}		
	}


	if(isset($_POST['update_model_btn'])){

		$model_id=$_POST['id_field'];
		$title=$_POST['title_field'];
		$repair_type=$_POST['repair_type'];
		$brands=$_POST['brands'];
		$status=$_POST['status_field'];
		
		$pic=$_FILES['file_field']['name'];
		$temp_pic=$_FILES['file_field']['tmp_name'];

		$value=$obj->updateModel($model_id,$title,$repair_type,$brands,$status,$pic,$temp_pic);

		if($value==true){

			header("Location:manage_models.php");
	  	}
	  	else{

	  		header("Location:manage_models.php");
	  	}		
	}


	if(isset($_GET['model_disbale_id'])){

		$model_id=$_GET['model_disbale_id'];

		$value=$obj->disableModel($model_id);

		if($value==true){

			header("Location:manage_models.php");
	  	}
	  	else{

	  		header("Location:manage_models.php");
	  	}
	}


	if(isset($_GET['model_enable_id'])){

		$model_id=$_GET['model_enable_id'];

		$value=$obj->enableModel($model_id);

		if($value==true){

			header("Location:manage_models.php");
	  	}
	  	else{

	  		header("Location:manage_models.php");
	  	}
	}









	if(isset($_POST['add_service_btn'])){

		$title=$_POST['title_field'];
		$repair_type=$_POST['repair_type'];
		$models=$_POST['models'];
		$prices=$_POST['prices'];
		$zip_codes=$_POST['zip_codes'];
		
		$pic=$_FILES['file_field']['name'];
		$temp_pic=$_FILES['file_field']['tmp_name'];
		

		$new_prices=array();

		for ($i=0; $i < sizeof($prices) ; $i++) { 
			if($prices[$i]!=""){
				$new_prices[]=$prices[$i];
			}
		}

		$value=$obj->addService($title,$repair_type,$models,$new_prices,$zip_codes,$pic,$temp_pic);

		if($value==true){

			header("Location:manage_services.php");
	  	}
	  	else{

	  		header("Location:manage_services.php");
	  	}		
	}


	if(isset($_POST['update_service_btn'])){

		$service_id=$_POST['id_field'];
		$title=$_POST['title_field'];
		$repair_type=$_POST['repair_type'];
		$models=$_POST['models'];
		$prices=$_POST['prices'];
		$status=$_POST['status_field'];
		
		$pic=$_FILES['file_field']['name'];
		$temp_pic=$_FILES['file_field']['tmp_name'];

		$new_prices=array();

		for ($i=0; $i < sizeof($prices) ; $i++) { 
			if($prices[$i]!=""){
				$new_prices[]=$prices[$i];
			}
		}

		$value=$obj->updateService($service_id,$title,$repair_type,$models,$new_prices,$status,$pic,$temp_pic);

		if($value==true){

			header("Location:manage_services.php");
	  	}
	  	else{

	  		header("Location:manage_services.php");
	  	}		
	}


	if(isset($_GET['service_disbale_id'])){

		$service_id=$_GET['service_disbale_id'];

		$value=$obj->disableService($service_id);

		if($value==true){

			header("Location:manage_services.php");
	  	}
	  	else{

	  		header("Location:manage_services.php");
	  	}
	}


	if(isset($_GET['service_enable_id'])){

		$service_id=$_GET['service_enable_id'];

		$value=$obj->enableService($service_id);

		if($value==true){

			header("Location:manage_services.php");
	  	}
	  	else{

	  		header("Location:manage_services.php");
	  	}
	}









	if(isset($_POST['add_zip_btn'])){

		$zip_code=$_POST['zip_field'];

		$value=$obj->addZipCode($zip_code);

		if($value==true){

			header("Location:manage_zip_codes.php");
	  	}
	  	else{

	  		header("Location:manage_zip_codes.php");
	  	}		
	}



	if(isset($_GET['zip_del_id'])){

		$zip_id=$_GET['zip_del_id'];

		$value=$obj->removeZipCode($zip_id);

		if($value==true){

			header("Location:manage_zip_codes.php");
	  	}
	  	else{

	  		header("Location:manage_zip_codes.php");
	  	}
	}









	if(isset($_POST['order_status_btn'])){

		$order_id=$_POST['order_id_field'];
		$tech_id=$_POST['tech_id_field'];
		$order_status=$_POST['status_field'];

		$value=$obj->updateOrderStatus($order_id,$tech_id,$order_status);

		if($value==true){

			header("Location:view_order_details.php?order_id=".$order_id);
	  	}
	  	else{

	  		header("Location:view_order_details.php?order_id=".$order_id);
	  	}		
	}



?>