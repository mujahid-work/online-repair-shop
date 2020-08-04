
<?php
    include_once('EmployeeMethods.php');
    $obj=new EmployeeMethods();

    session_start();

    if(isset($_SESSION['logged_in_id']) && $_SESSION['role'] == 'Tech'){
      header("Location:dashboard.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>eStartUp | Admin Login</title>
	<link rel="stylesheet" href="../assets/css/auth.css">
</head>

<body style="background-color: #D0D3D4;">
	<div class="lowin" >
		<div class="lowin-brand">
			<img src="../assets/img/side_banner.png" alt="logo">
		</div>
		<div class="lowin-wrapper">
			<div class="lowin-box lowin-login">
				<div class="lowin-box-inner" style="background-color: #E5E7E9;">
					<form action="ExeFile.php" method="POST">
						<h2 style="color: #1A5276; text-align: center;">Forget Password (Step II)</h2>
						<br>
						<?php
							if(isset($_GET['pin_succ']) && $_GET['pin_succ']==1){
						?>
								<p style="color: green;">Heads Up! Verification 4 digit pin sent successfull. Please check your email!</p>
						<?php
							}
						?>

						<?php
							if(isset($_GET['ver_err']) && $_GET['ver_err']==1){
						?>
								<p style="color: red;">Oh Snap! Verification 4 digit pin does no matched. Please try again using valid pin!</p>
						<?php
							}
						?>
						<div class="lowin-group">
							<label style="color: #1A5276;">Please enter 4 digit verification pin</label>
							<input type="number" name="pin_field" class="lowin-input" placeholder="xxxx">
						</div>
						<input type="submit" name="pin_verify_btn" value="Verify Pin" class="lowin-btn login-btn" style="background-color: #1A5276;">
						<p><a href="index.php" style="text-decoration: underline;"> &nbsp;Login to Your Account Instead!</a></p>	
						<br>					
					</form>
				</div>
			</div>			
		</div>
	</div>
</body>
</html>