<?php
function logout() {
	$_SESSION["log"] = false;
	$login = boolval(false);
	$success = boolval(true);
	$sql = "INSERT INTO log (username, login, success) VALUES (?, ?, ?);";
	$stmt = mysqli_stmt_init($GLOBALS["conn"]);
	mysqli_stmt_prepare($stmt, $sql);
	mysqli_stmt_bind_param($stmt, "sii", $_SESSION["user"], $login, $success);
	mysqli_stmt_execute($stmt);
}
?>
