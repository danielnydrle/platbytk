<?php
function validateLogin() {
	$user = $_POST["user"];
	$password = hash("sha512", ($_POST["password"]));
	$sql = "SELECT username, password FROM users WHERE username = ?;";
	$stmt = mysqli_stmt_init($GLOBALS["conn"]);
	mysqli_stmt_prepare($stmt, $sql);
	mysqli_stmt_bind_param($stmt, "s", $user);
	mysqli_stmt_execute($stmt);	
	$result = mysqli_stmt_get_result($stmt);
	$row = mysqli_fetch_assoc($result);
	return ($user != "" && $password != "" && !is_null($row) && $row["password"] == $password) ? true : false;
}
?>
