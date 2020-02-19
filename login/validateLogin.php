<?php
function validateLogin() {
	$email = $_POST["email"];
	$password = hash("sha512", ($_POST["password"]));
	$sql = "SELECT username, password FROM users WHERE username = \"$email\";";
	$query = mysqli_query($GLOBALS["conn"], $sql);
	$row = mysqli_fetch_assoc($query);
	return ($email != "" && $password != "" && !is_null($row) && $row["password"] == $password) ? true : false;
}
?>
