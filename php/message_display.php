<?php 

require("mysql_connect.php");

// Kick out anybody who is not logged in
if($_SESSION['logged_in'] == false)
{
	header("Location: index.php");
}

//access the messages database and for each result display the results
$msg_query = "SELECT * FROM messages ORDER BY created_at DESC";
$messages = fetch_all($msg_query);

foreach ($messages as $message) 
{
	//grab the user name for each message
	$user_query = "SELECT first_name, last_name FROM users WHERE id = '{$message['user_id']}'";
	$user_info = fetch_all($user_query);

	echo "<h4>{$user_info[0]['first_name']}" ." ". "{$user_info[0]['last_name']}</h4>";
	echo "<p>{$message['created_at']}</p>";
	echo "<p>{$message['message']}</p>";

	//grab the comments for each message
	$com_query = "SELECT * FROM comments WHERE message_id = {$message['id']} ORDER BY comments.created_at ASC"; 
	$comments = fetch_all($com_query);

	//start a div for the comments and comment form whose style has a large left margin to indent it.
	echo "<div class='my_comment_display_div'>";

	foreach ($comments as $comment) 
	{
		//oh yeah, we are now 3 deep.  grab the user data for each comment
		$com_user_query = "SELECT first_name, last_name FROM users WHERE id = '{$comment['user_id']}'";
		$com_user_info = fetch_all($com_user_query);

		echo "<h6>{$com_user_info[0]['first_name']}" ." ". "{$com_user_info[0]['last_name']}</h6>";

		echo "
			<p>{$comment['created_at']}</p>.
			<p>{$comment['comment']}</p>.
			";
	}
	echo
	"
		<div>
			<legend>Leave a Comment</legend>
			<form class='form-horizontal' action='php/process_wall.php' method='post'>
				<input type='hidden' name='action' value='{$message['id']}'>
				<div class='control-group'>
					<div>
						<textarea class='comment_text_box' name='comment'></textarea>
						<input class='btn btn-danger' type='submit' value='Go'>
					</div>
				</div>
			</form>
		</div>
	";
	echo "</div>"; //this is the div that encloses the comments and input comment form
}


?>