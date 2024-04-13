<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
		
		form{
			
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

		<input class="input" type="text" name="username" placeholder="Username"> <br>
		<input class="input" type="email" name="email" placeholder="Email"> <br>
		<input class="input" type="password" name="password" placeholder="Password"> <br>
		<select class="input" name="gender" style="max-width: 300px;">
			<option value="">--Select Gender--</option>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
		</select> <br><br>
		<input class="btn" type="submit" name="" value="Signup"> <br style="clear: both;">
	</form>

</body>
</html>