<?php
class LoginModel {
	
	public function validateLogin($username, $password) {
		$row = Db::queryRow("SELECT username, password, role, family FROM users WHERE username = ?;", [$username]);
		if ($username != "" && $password != "" && !is_null($row) && $row["password"] == $password) {
			$_SESSION["role"] = $row["role"];
			$_SESSION["family"] = $row["family"];
			return true;
		} else {
			return false;
		}
	}

	public function log($username, $password) {
		if ($this->validateLogin($username, $password)) {
			$_SESSION["user"] = $username;
			$_SESSION["log"] = true;
			$login = boolval(true);
			$success = boolval(true);
			$timedate = date_timestamp_get(date_create());
			Db::input("INSERT INTO log (username, login, success, timedate) VALUES (?, ?, ?, ?);", [$username, $login, $success, $timedate]);
			return true;
		} else {
			$_SESSION["log"] = false;
			$login = boolval(true);
			$success = boolval(false);
			$timedate = date_timestamp_get(date_create());
			Db::input("INSERT INTO log (username, login, success, timedate) VALUES (?, ?, ?, ?);", [$username, $login, $success, $timedate]);
			return false;
		}
	}

}
?>
