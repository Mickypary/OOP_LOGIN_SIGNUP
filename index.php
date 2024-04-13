<?php

include 'init.php';

$user = new User();
if (!$answer = $user->is_logged_in()) {
	
	header("Location: login.php");
		die();
}
var_dump($answer);

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home Page</title>
</head>
<body>

	<center>Home Page</center>
	<header><a href="">Home</a> . <a href="">Shop</a> . <a href="logout.php">Logout</a> . <a href="login.php">Login</a> </header>


</body>
</html>