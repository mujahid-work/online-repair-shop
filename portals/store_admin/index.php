
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
	<title>eStartUp | Employee Login</title>
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
						<p style="color: #1A5276;">Sign in to continue</p>
						<br>
						<?php
							if(isset($_GET['reset_succ']) && $_GET['reset_succ']==1){
						?>
								<p style="color: green;">Heads Up! Password reset successfull. Continue to sign in!</p>
						<?php
							}
						?>
						<div class="lowin-group">
							<label style="color: #1A5276;">Username</label>
							<input type="email" name="email_field" class="lowin-input" placeholder="enter your email address">
						</div>
						<div class="lowin-group password-group">
							<label style="color: #1A5276;">Password</label>
							<input type="password" name="password_field" class="lowin-input" placeholder="enter your password">
						</div>
						<input type="submit" name="login_btn" value="Sign In" class="lowin-btn login-btn" style="background-color: #1A5276;">
						<p>Forgot Your Password? <a href="forget1.php" style="text-decoration: underline;"> &nbsp;Reset Now!</a></p>	
						<br>					
					</form>
				</div>
			</div>			
		</div>
	</div>
</body>
</html>