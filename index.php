<?php session_start();  ?>

<html>
	<head>
		<title>Login or Register</title>
		<?php include("php/header.php"); ?>
	</head>
	<body>
		<div id="my_container">
			<div id="wall_header">
				<img src="img/the_wall.png" alt="title graphic">
			</div>
<!-- start the login form -->
			<div class="my_form" id="my_login">
				<?php include('php/errors_login.php'); ?>
				<legend>Login</legend>
				<form class="form-horizontal" action="php/process.php" method="post">
					<input type="hidden" name="action" value="login">
					<div class="control-group">
						<label class="control-label" for="username">Email Address:</label>
						<div class="controls">
							<input type="text" name="email" placeholder="Email Address"></br>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="password">Password:</label>
						<div class="controls">
							<input type="password" name="password" placeholder="Password"></br>
						</div>
					</div>
					<div class="control-group">	
						<div class="controls">
							<input class="btn btn-danger" type="submit" value="Login">
						</div>
					</div>
				</form>
			</div>
<!-- Start the registration form -->
			<div class="my_form" id="my_registration">
				<legend>Register</legend>
				<?php include('php/errors_reg.php'); ?>
				<form class="form-horizontal" action="php/process.php" method="post">
					<input type="hidden" name="action" value="register">
					<div class="control-group">
						<label class="control-label" for="email">Email:</label>
						<div class="controls">
							<input id="email" type="text" name="email" placeholder="email address"></br>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="first_name">First Name:</label>
						<div class="controls">
							<input id="first_name" type="text" name="first_name" placeholder="First Name"></br>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="last_name">Last Name:</label>
						<div class="controls">
							<input id="last_name" type="text" name="last_name" placeholder="Last Name"></br>
						</div>
					</div>
					<div class="control-group">	
						<label class="control-label" for="password1">Password:</label>
						<div class="controls">
							<input id="password1" type="password" name="password1" placeholder="password"></br>
						</div>
					</div>
					<div class="control-group">	
						<label class="control-label" for="password2">Confirm Password:</label>
						<div class="controls">
							<input id="password2" type="password" name="password2" placeholder="password"></br>
						</div>
					</div>
					<div class="control-group">	
						<div class="controls">
							<input class="btn btn-danger" type="submit" value="Register">
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>