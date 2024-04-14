<?php

include 'init.php';

$user = new User();
if (!$answer = $user->is_logged_in()) {
	
	header("Location: login.php");
		die();
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Shop Page</title>
</head>
<body>

	<center>Shop Page</center>
	<header><a href="index.php">Home</a> . <a href="shop.php">Shop</a> . <a href="logout.php">Logout</a> . <a href="login.php">Login</a> </header>


</body>
</html>