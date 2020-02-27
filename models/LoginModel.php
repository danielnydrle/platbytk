<?php
class LoginModel {
	
	public function validateLogin($name, $password) {
		$sql = "SELECT username, password FROM users WHERE username = ?;";
		$stmt = mysqli_stmt_init($GLOBALS["conn"]);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, "s", $name);
		mysqli_stmt_execute($stmt);	
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result);
		return ($name != "" && $password != "" && !is_null($row) && $row["password"] == $password) ? true : false;
	}

	public function log($name, $password) {
		if ($this->validateLogin($name, $password)) {
			$_SESSION["log"] = true;
			$login = boolval(true);
			$success = boolval(true);
			$sql = "INSERT INTO log (username, login, success) VALUES (?, ?, ?);";
			$stmt = mysqli_stmt_init($GLOBALS["conn"]);
			mysqli_stmt_prepare($stmt, $sql);
			mysqli_stmt_bind_param($stmt, "sii", $name, $login, $success);
			mysqli_stmt_execute($stmt);
			return true;
		} else {
			$_SESSION["log"] = false;
			$login = boolval(true);
			$success = boolval(false);
			$sql = "INSERT INTO log (username, login, success) VALUES (?, ?, ?);";
			$stmt = mysqli_stmt_init($GLOBALS["conn"]);
			mysqli_stmt_prepare($stmt, $sql);
			mysqli_stmt_bind_param($stmt, "sii", $name, $login, $success);
			mysqli_stmt_execute($stmt);
			return false;
		}
	}

}
?>
