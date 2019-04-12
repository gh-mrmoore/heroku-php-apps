<?
//set my global alphabet variable for use elsewhere

$alphabet = 'abcdefghijklmnopqrstuvwxyz';

//make sure that something has been entered in the form and return a message to the user

if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$UserMsg = "<p>Thanks! Please see your output below:</p>";
		$user_rotation = $_POST["rotation"];
		$rotation_int = (int)$user_rotation;
		$unencrypted_message = $_POST["message"];
	}
else
	{	
		$UserMsg = "<p>Please enter your message and your offset in the form to the left.</p>";
	}

//build my functions to generate the encrypted message

function getAlphaPos($character)
	{
		$lower_character = strtolower($character);
		$index = strpos($GLOBALS['alphabet'], $lower_character);
		return $index;
	}

function NewCharacterPosition($rotation, $character)
	{
		$new_character_position = (int)$rotation + (int)getAlphaPos($character);
		if ($new_character_position >= 25)
		{
			$new_character_position = $new_character_position % 26;
		}
		else
		{
			$new_character_position = $new_character_position;
		}
		return $new_character_position;
	}

function EncryptString($unencrypted_message, $rotate)
	{
		$this_new_message = '';
		$new_character = '';

		for($i=0;$i<strlen($unencrypted_message);$i++)
			{
				if(ord($unencrypted_message[$i]) >= 65 && ord($unencrypted_message[$i]) <= 90)   //uppercase letters
					{
						$new_character = strtoupper($GLOBALS['alphabet'][NewCharacterPosition($rotate, $unencrypted_message[$i])]);
						$this_new_message .= $new_character;
					}
				elseif(ord($unencrypted_message[$i]) >= 97 && ord($unencrypted_message[$i]) <= 122)   //lowercase letters
					{
						$new_character = $GLOBALS['alphabet'][NewCharacterPosition($rotate, $unencrypted_message[$i])];
						$this_new_message .= $new_character;
					}
				else
					{
						$this_new_message .= $unencrypted_message[$i];
					}
			}
		return $this_new_message;
	}
?>
<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/includes/css_index.css" />
    <title>PHP String Encryption || Matthew Moore</title>
</head>

<body>
<div class="header">PHP // matthewmoore.pro</div>

	<div class="content">

		<div class="left">
			<?php include '../includes/nav_site.php';?>
			<hr />
			<?php include '../includes/nav_projects.php';?>
			<hr />
		</div>

		<div class="main">
			<h1>Forms!</h1>
			<p>Encrypt a string and see what you get.</p>
			<hr />
			<?php
			if($_SERVER["REQUEST_METHOD"] == "GET") {
				echo "<h2>Encrypt a message</h2>";

				echo "<form method='post' action='/encrypt/index.php'>";
				echo "<div>";
				echo "<label for='rotation'>Rotation amount:</label><br />";
				echo "<input type='text' name='rotation' id='rotation' />";
				echo "</div><div>";
				echo "<label for='message'>Your message:</label><br />";
				echo "<textarea name='message' id='message' rows='5' columns='45'></textarea>";
				echo "</div><div>";
				echo "<input type='submit' name='submit' value='Encrypt!' />";
				echo "</div></form>";
			}
			else {
				echo "<h2>Encrypted message:</h2>";
				echo "<p>" . EncryptString($unencrypted_message, $rotation_int) . "</p>";
			}
			?>
		</div>

		<div class="right">
			<?php include '../includes/nav_useful.php';?>
		</div>

	</div>

	<div class="footer">&copy; Matthew Moore, 2019</div>
</body>

</html>