<?php

class Connection{ 
	
	public function connect(){ 
		
		//$con = mysqli_connect("localhost","techoworld_community","Hello123*","techoworld_test_db");
		$con = mysqli_connect("localhost","root","","test_db");
		 
			if (mysqli_connect_errno()){
				
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			
		return $con;
	}
				
			   
	}  
?>