<?php 
	require("mysql_connect.php");
	session_start(); 

// Figure out if the user is logging in or registering by determining which button they pressed and send the $POST to the appropriate function.
if (isset($_POST['action']) and $_POST['action'] == "login")
{
	loginAction();
}
elseif (isset($_POST['action']) and $_POST['action'] == "register")
{
	registerAction();
}
else
{
	session_destroy();
	header("Location: ../index.php");
}

function loginAction()
{
	$errors = array();

	if(!(isset($_POST['email']) and filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)))
	{
		$errors[] = array("email", "Email is empty or invalid, please try again");
	}
	if(!(isset($_POST['password']) and strlen($_POST['password']) >= 6))
	{
		$errors[] = array("password", "Password is empty or fewer than 6 characters, please try again");
	}
	//see if any errors turned up and if so report them back via $_SESSION
	if(count($errors) > 0)
	{
		$_SESSION['login_error_messages'] = $errors;
		header('Location: ../index.php');
	}
	//see if the user name and password matches a database entry and log the user in if it doesn't.
	else
	{
		$post_email = $_POST['email'];
		$md5_password = md5($_POST['password']);

		$query = "SELECT * FROM users WHERE email = '{$post_email}' AND password = '{$md5_password}'";
		$users = fetch_all($query);

		//if the email and password matches a user, log them in.

		if(count($users) > 0 )
		{
			$_SESSION['logged_in'] = true;
			$_SESSION['user']['id'] = $users[0]['id'];
			$_SESSION['user']['first_name'] = $users[0]['first_name'];
			$_SESSION['user']['last_name'] = $users[0]['last_name'];
			$_SESSION['user']['email'] = $users[0]['email'];
			header('Location: ../wall.php');
		}
		//this runs if there is no user
		else
		{
			$errors[] = "No matching user and/or email. Try again or register.";
			$_SESSION['login_error_messages'] = $errors;
			header('Location: ../index.php');
		}
	}
}

function registerAction()
{
	//run the array through validations
	$errors = array();

	if ( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) 
	{
		$errors[] = array("email","Email not valid, please try again.");
	}
	if ( is_numeric($_POST['first_name'] ) == TRUE)	
	{
		$errors[] = array("first_name","Please remove the numbers from your first name.");
	}
	elseif ( empty ( $_POST['first_name'] ) ) 
	{
		$errors[] = array("first_name","Please enter a first name.");
	}
	if ( is_numeric($_POST['last_name'] ) == TRUE)	
	{
		$errors[] = array("last_name","Please remove the numbers from your last name.");
	}
	elseif ( empty ( $_POST['last_name'] ) ) 
	{
		$errors[] = array("last_name","Please enter a last name.");
	}
	if ( strlen($_POST['password1']) < 7 )	
	{
		$errors[] = array("password1","Password must have at least 6 characters");
	}
	elseif ( $_POST['password1'] != $_POST['password2'] ) 
	{
		$errors[] = array("password1","Passwords do not match. Make sure you confirm your password.");
	}
//If any of the above validations were added to the $errors array then send them back to index.php via $_SESSION which is used in the error.php file
	if( !empty($errors) )	
	{
		$_SESSION['reg_error_messages'] = $errors;
		header("Location: ../index.php");
	}
//If no error messages were added, see if the user already exists in the database using the email field.
	else 
	{
		$query = "SELECT email FROM users WHERE email = '{$_POST['email']}'";
		$users = fetch_all($query);

		//count the results. if the count is > 0 then send an error saying they already exist.
		if(count($users)>0)
		{
			$errors = "Somebody has that email address, try again";
			$_SESSION['reg_error_messages'] = $errors;
			header("Location: ../index.php");
		}
		//now for the moment we've been waiting for.  if we made this far then insert the new user into the database.
		else
		{
			$query = "INSERT INTO users (first_name, last_name, email, password, created_at) VALUES ('".mysql_real_escape_string($_POST['first_name'])."', '".mysql_real_escape_string($_POST['last_name'])."', '".mysql_real_escape_string($_POST['email'])."', '".md5($_POST['password1'])."', NOW())";
			mysql_query($query);
		
			$_SESSION['reg_success_message'] = "Success! Thank you for submitting your information. You may now log in";
			header("Location: ../index.php");
		}
	}
}

?>