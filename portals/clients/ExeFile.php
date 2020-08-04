<?php

	include_once('ClientMethods.php');
    $obj=new ClientMethods();


	if(isset($_POST['update_pass_btn'])){

		$current_pass=$_POST['current_pass_field'];
		$new_pass=$_POST['new_pass_field'];
		$confirm_pass=$_POST['confirm_pass_field'];

		if($new_pass==$confirm_pass){

			$value=$obj->updateCustomerPassword($current_pass,$new_pass);

				if($value==true){

					header("Location:../../logout.php");
			  	}
			  	else{

			  		header("Location:account_settings.php");
			  	}
		}
		else{
			echo 'Password does not matched';
		}		
	}


	if(isset($_POST['update_customer_btn'])){

		$first_name=$_POST['fname_field'];
		$last_name=$_POST['lname_field'];
		$email=$_POST['email_field'];
		$contact=$_POST['contact_field'];		
		$country=$_POST['country_field'];
		$address=$_POST['address_field'];
		$city=$_POST['city_field'];
		$zip=$_POST['zip_field'];
		$about=$_POST['about_field'];

		$pic=$_FILES['file_field']['name'];
		$temp_pic=$_FILES['file_field']['tmp_name'];
	  	

	  	$value=$obj->updateCustomer($first_name,$last_name,$email,$contact,$country,$address,$city,$zip,$about,$pic,$temp_pic);

		if($value==true){

			header("Location:account_settings.php");
	  	}
	  	else{

	  		header("Location:account_settings.php");
	  	}		
	}


	if(isset($_GET['order_status'])){

		if($_GET['order_status']==1){

			$order_id=$_GET['order_id'];
			$order_status='Cancelled';

			$value=$obj->updateOrderStatus($order_id,$order_status);

			if($value==true){

				header("Location:view_order_details.php?order_id=".$order_id);
		  	}
		  	else{

		  		header("Location:view_order_details.php?order_id=".$order_id);
		  	}
		}		
	}