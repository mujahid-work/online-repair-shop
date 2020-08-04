
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
						<h2 style="color: #1A5276; text-align: center;">Forget Password (Step III)</h2>
						<br>
						<?php
							if(isset($_GET['match_err']) && $_GET['match_err']==1){
						?>
								<p style="color: red;">Oh Snap! New password does not matched. Please try again!</p>
						<?php
							}
						?>
						<?php
							if(isset($_GET['reset_err']) && $_GET['reset_err']==1){
						?>
								<p style="color: red;">Oh Snap! New password does not updated Successfully. Please try again!</p>
						<?php
							}
						?>
						<div class="lowin-group">
							<label style="color: #1A5276;">New Password</label>
							<input type="password" name="new_pass_field" class="lowin-input" placeholder="enter new password">
						</div>
						<div class="lowin-group">
							<label style="color: #1A5276;">Confirm New Password</label>
							<input type="password" name="cpass_field" class="lowin-input" placeholder="enter confirm new password">
						</div>
						<input type="submit" name="reset_pass_btn" value="Reset Password" class="lowin-btn login-btn" style="background-color: #1A5276;">
						<p><a href="index.php" style="text-decoration: underline;"> &nbsp;Login to Your Account Instead!</a></p>	
						<br>					
					</form>
				</div>
			</div>			
		</div>
	</div>
</body>
</html>