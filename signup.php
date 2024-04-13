<?php

include 'init.php';

if (count($_POST) > 0) {
	
	$errors = User::action()->create($_POST);

	if (!is_array($errors)) {
		
		header("Location: login.php");
		die();
	}
}




?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
		
		form {
			
			margin: auto;
			margin-top: 20px;
			width: 100%;
			max-width: 300px;
			border-radius: 5px;
			border: solid thin #ccc;
			box-shadow: 0px 0px 10px #aaa;
			font-family: tahoma;
			padding: 10px;
			position: relative;
		}

		.input {
			position: relative;
			margin: auto;
			width: 100%;
			max-width: 280px;
			border-radius: 5px;
			border: solid thin #ccc;
			padding: 10px;
			margin-top: 5px;
		}

		.btn {
			padding: 10px;
			float: right;
			border: none;
			border-radius: 5px;
			background-color: #3487ea;
			color: #fff;
			cursor: pointer;
		}

	</style>

	<form method="POST">

		<h2>Signup</h2>
		<div style="color: red">
			<?php if (isset($errors) && is_array($errors)): ?>
				<?php foreach ($errors as $key => $error): ?>
					<?php echo $error . "<br>"; ?>
				<?php endforeach ?>
			<?php endif ?>
		</div>

		<input class="input" type="text" name="username" value="<?= isset($_POST['username']) ? $_POST['username'] : "" ?>" placeholder="Username"> <br>
		<input class="input" type="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : "" ?>" placeholder="Email"> <br>
		<input class="input" type="password" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : "" ?>" placeholder="Password"> <br>
		<select class="input" name="gender" style="max-width: 280px;">
			<option value="">--Select Gender--</option>
			<option value="Male" <?= isset($_POST['gender']) && $_POST['gender'] == "Male" ? "selected" : "" ?> >Male</option>
			<option value="Female" <?= isset($_POST['gender']) && $_POST['gender'] == "Female" ? "selected" : "" ?>>Female</option>
		</select> <br><br>
		<input class="btn" type="submit" name="" value="Signup"> <br style="clear: both;">
	</form>

</body>
</html>