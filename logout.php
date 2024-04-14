<?php

include 'init.php';

$sess = new Session();

if ($sess->exists('USER')) {
	$sess->remove('USER');
}


header("Location: login.php");
		die();


