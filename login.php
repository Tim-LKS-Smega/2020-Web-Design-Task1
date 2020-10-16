<?php
if (isset($_COOKIE['username'])) {
	session_start();
	$_SESSION['username'] = $_COOKIE['username'];
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		body,
		html {
			margin: 0;
			font-family: Arial, Helvetica, sans-serif;
			background-color: #fff;
		}

		.login {
			display: flex;
			justify-content: center;
			width: 100%;
		}

		.form-login {
			background-color: white;
			padding: 20px 40px 40px;
			width: 300px;
			border-radius: 10px;
			margin: 10% 0 0 0;
		}

		input[type=text],
		input[type=password] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			box-sizing: border-box;
		}

		input[type=submit] {
			padding: 12px 20px;
			margin: 8px 0;
			width: 100%;
		}
	</style>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>

<body>
	<div class="login">
		<div class="form-login">
			<form action="login.php" method="post">
				<h3 style="text-align: left;"><b>Login</b></h3>
				<input type="text" name="username" placeholder="Username">
				<input type="password" name="password" placeholder="Password">
				<input type="checkbox" name="remember" value="true">
				<label>Remember me</label><br><br>
				<input type="submit" name="login" value="Login">
			</form>
		</div>
	</div>
	<?php
	if (isset($_POST['login'])) {
		include 'config.php';

		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "select * from users where username = '$username'";
		$result = mysqli_query($conn, $sql);
		$numRows = mysqli_num_rows($result);

		if ($numRows == 1) {
			$row = mysqli_fetch_array($result);
			if (password_verify($password, $row['password'])) {
				session_start();
				$_SESSION['username'] = $username;
				if (isset($_POST['remember']) ? $_POST['remember'] : '') {
					setcookie("username", $username, time() + 120);
				}
				header("location:index.php");
			} else {
				header("location:login.php");
			}
		} else {
			header("location:login.php");
		}
	}
	?>
</body>

</html>