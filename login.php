<?php
function login()
{
	if (isset($_POST["login"])) {
		$email = $_POST["email"];
		$password = hash("sha512", ($_POST["password"]));

		$sql = "SELECT username, password FROM users WHERE username = \"$email\";";
		$result = mysqli_query($GLOBALS["conn"], $sql);
		$row = mysqli_fetch_assoc($result);

		if ($_POST["email"] == "") {
			$_SESSION["log"] = false;
			return "missing email";
		} elseif ( $_POST["password"] == ""){
			$_SESSION["log"] = false;
			return "missing password";
		} elseif (is_null($row)) {
			$_SESSION["log"] = false;
			return "user not found";
		} elseif (!(in_array($password, $row))) {
			$_SESSION["log"] = false;
			return "password incorrect";
		} else {
			$_SESSION["log"] = true;
			return "logged as $email";
		}
	}
};
?>
