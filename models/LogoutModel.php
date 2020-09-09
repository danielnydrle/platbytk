<?php
class LogoutModel {

	public function logout() {
		$_SESSION["log"] = false;
		$login = boolval(false);
		$success = boolval(true);
		$timedate = date_timestamp_get(date_create());
		Db::input("INSERT INTO log (username, login, success, timedate) VALUES (?, ?, ?, ?);", [$_SESSION["user"], $login, $success, $timedate]);
	}
}
?>
