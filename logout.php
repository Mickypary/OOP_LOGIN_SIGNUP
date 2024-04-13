<?php

include 'init.php';

if (isset($_SESSION['USER'])) {
	unset($_SESSION['USER']);
}

// if (isset($_SESSION['username'])) {
// 	unset($_SESSION['username']);
// }

// if (isset($_SESSION['logged_in'])) {
// 	unset($_SESSION['logged_in']);
// }


// $_SESSION['username'];
// $_SESSION['email'];
// $_SESSION['logged_in'];

// session_destroy();

header("Location: login.php");
		die();


