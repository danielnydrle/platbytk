<?php
require_once 'validateLogin.php';
function login()
{
	$user = $_POST["user"];
	$password = hash("sha512", ($_POST["password"]));
	if (validateLogin()) {
		$_SESSION["log"] = true;
		$_SESSION["user"] = $user;
		$login = boolval(true);
		$success = boolval(true);
		$sql = "INSERT INTO log (username, login, success) VALUES (?, ?, ?);";
		$stmt = mysqli_stmt_init($GLOBALS["conn"]);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, "sii", $_SESSION["user"], $login, $success);
		mysqli_stmt_execute($stmt);
		return true;
	} else {
		$_SESSION["log"] = false;
		$login = boolval(true);
		$success = boolval(false);
		$sql = "INSERT INTO log (username, login, success) VALUES (?, ?, ?);";
		$stmt = mysqli_stmt_init($GLOBALS["conn"]);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, "sii", $_SESSION["user"], $login, $success);
		mysqli_stmt_execute($stmt);
		return false;
	}

}
?>
