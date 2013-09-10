<?php

	if(isset($_SESSION['login_error_messages']))
	{	
		echo "<div class='errors'>";

		foreach($_SESSION['login_error_messages'] as $message)
		{
			echo "<p>{$message}</p>";
		}
		foreach($_SESSION['login_error_messages'] as $target)
		{
			echo "<script type='text/javascript'>
					$(document).ready(function() {	
						$('#{$target[0]}').addClass('highlight');
					});
				  </script>";
		}
		unset($_SESSION['login_error_messages']);
		echo "</div>";
	}
	elseif (isset($_SESSION['login_success_message']))
	{
		echo "<div id='success'>{$_SESSION['success_message']}</div>";
		unset($_SESSION['login_success_message']);
	}
?>