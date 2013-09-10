<?php 

require("mysql_connect.php");
session_start(); 

// Is the user logging out, posting a message or leaving a comment? Direct the code to the appropriate function.
if (isset($_POST['action']) and $_POST['action'] == "logout")
{
	logoutAction();
}
elseif (isset($_POST['action']) and $_POST['action'] == "message")
{
	messageAction();
}
//I used the message id for the value of the comment form action. These should be the only numeric actions coming in so use these numbers as a trigger for the comment action.
elseif (isset($_POST['action']) and is_numeric($_POST['action']))
{
	commentAction();
}
else
{
	session_destroy();
	header("Location: ../index.php");
}

function logoutAction()
{
	session_destroy();
	header("Location: ../index.php");
}

function messageAction()
{
	$slash_message = addslashes($_POST['message']);
	$query = "INSERT INTO messages (user_id, message, created_at) VALUES ('{$_SESSION['user']['id']}', '".mysql_real_escape_string($slash_message)."', NOW())";

	mysql_query($query);
	header("Location: ../wall.php");
}

function commentAction()
{
	$slash_message = addslashes($_POST['comment']);
	$query = "INSERT INTO comments (user_id, message_id, comment, created_at) VALUES ('{$_SESSION['user']['id']}' , '{$_POST['action']}' , '".mysql_real_escape_string($slash_message)."', NOW())";
	
	mysql_query($query);
	header("Location: ../wall.php");
}

?>