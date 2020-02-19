<?php
require_once 'validateLogin.php';
function login()
{
	$email = $_POST["email"];
	$password = hash("sha512", ($_POST["password"]));
	if (validateLogin()) {
		$_SESSION["log"] = true;
		return true;
	} else {
		$_SESSION["log"] = false;
		return false;
	}

};
?>
