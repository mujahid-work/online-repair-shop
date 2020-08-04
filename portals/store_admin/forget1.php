
<?php
    include_once('StoreAdminMethods.php');
    $obj=new StoreAdminMethods();

    session_start();

    if(isset($_SESSION['logged_in_id']) && $_SESSION['role'] == 'Store Admin'){
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
						<h2 style="color: #1A5276; text-align: center;">Forget Password (Step I)</h2>
						<br>
						<?php
							if(isset($_GET['email_err']) && $_GET['email_err']==1){
						?>
								<p style="color: red;">Oh Snap! Invalid email address. Please try again!</p>
						<?php
							}
						?>

						<?php
							if(isset($_GET['pin_err']) && $_GET['pin_err']==1){
						?>
								<p style="color: red;">Oh Snap! Pin does not sent successfully. Please try again!</p>
						<?php
							}
						?>
						<div class="lowin-group">
							<label style="color: #1A5276;">Please enter your registered email address</label>
							<input type="email" name="email_field" class="lowin-input" placeholder="example@mail.com">
						</div>
						<input type="submit" name="send_pin_btn" value="Send Verification Pin" class="lowin-btn login-btn" style="background-color: #1A5276;">
						<p><a href="index.php" style="text-decoration: underline;"> &nbsp;Login to Your Account Instead!</a></p>	
						<br>					
					</form>
				</div>
			</div>			
		</div>
	</div>
</body>
</html>