<?php
// Start the session
session_start();

if(!empty($_GET[""]))
{

}
else
{
    "https://morning-bastion-33855.herokuapp.com/week7team/signin.php";
}
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>

	   <meta charset="utf-8">
	   <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <title>Welcome Page</title>

	</head>
	<body>

		Welcome  <?php echo $_POST["username"]; ?><br>

	</body>
</html>
