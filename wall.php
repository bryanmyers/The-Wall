<?php session_start();  ?>

<html>
	<head>
		<title>The Wall</title>
		<?php 
			if($_SESSION['logged_in'] == false)
			{
				header("Location: index.php");
			}
			include("php/header.php");
		?>
	</head>
	<body>
		<div id="my_container">
			<div id="wall_header">
				<img src="img/the_wall.png" alt="title graphic">
				<div id="my_login_info">
					<?php echo "<p>Logged in as: {$_SESSION['user']['first_name']} {$_SESSION['user']['last_name']} </p>";	?>
					<form action="php/process_wall.php" method="post">
						<input type="hidden" name="action" value="logout">
						<input class="btn btn-danger" id="logout" type="submit" value="Logout">
					</form>
				</div>
			</div>
<!-- start the post message form -->
			<div class="my_form" id="my_post_message">
				<legend>Post a Message</legend>
				<form class="form-horizontal" action="php/process_wall.php" method="post">
					<input type="hidden" name="action" value="message">
					<div class="control-group">
						<div>
							<textarea class="text_box" name="message"></textarea>
						</div>
					</div>
					<div class="control-group">	
						<div class="controls">
							<input class="btn btn-danger" type="submit" value="Go">
						</div>
					</div>
				</form>
			</div>
<!-- end post message form-->
			<div class="message_display">
				<?php include("php/message_display.php") ?>
			</div>
		</div>
	</body>
</html>