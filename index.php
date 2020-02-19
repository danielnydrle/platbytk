<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php
	session_start();
	require_once 'conn.php';
	?>
	
	<?php
	if (isset($_POST["add"])) {
		require_once 'addPayment.php';
		addPayment();
	}
	?>

	<?php
	# login (podívat se na to, dvojitá podmínka)
	if (isset($_POST["login"]) && $_POST["email"] != "" && $_POST["password"] != "") {
		require_once 'login.php';
		login();
	}

	#logout
	if (isset($_POST["logout"])) {
		require_once 'logout.php';
		logout();
	}

	# initial
	if (isset($_SESSION["log"]) && $_SESSION["log"] == true) {
		require_once 'entryWin.php';
		require_once 'login.php';
		entryWin();
		echo login();
	} else {
		require_once 'loginWin.php';
		require_once 'login.php';
		loginWin();
		echo login();
	}
	?>
	
	<!-- SCRIPTS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="script.js"></script>
</body>
</html>