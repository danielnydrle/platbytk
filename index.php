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
	require 'models/ConnectionModel.php';
	$conn = new ConnectionModel();
	$conn->connect();

	if (isset($_POST["add"])) {
		require_once 'controllers/PaymentController.php';
		$controller = new PaymentController();
		$controller->addPayment();
	}

	if (isset($_POST["login"])) {
		require_once 'controllers/LoginController.php';
		$controller = new LoginController();
		$controller->login();

	}

	if (isset($_POST["logout"])) {
		require_once 'controllers/LogoutController.php';
		$controller = new LogoutController();
		$controller->logout();
	}
	?>
	
	<?php
	require_once 'views/View.php';
	$view = new View();
	$view->show();
	?>
	
	<!-- SCRIPTS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="script.js"></script>
</body>
</html>
