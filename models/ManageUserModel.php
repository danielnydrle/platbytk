<?php
class ManageUserModel {

	public function isUser($username) {
		$row = Db::queryRow("SELECT username FROM users WHERE username = ?;", [$username]);
		return ($username != "" && $row != false) ? true : false;
	}

	public function addUser($username) {
		if (!$this->isUser($username)) {
			$password = hash("sha512", $username);
			$role = "u";
			$family = $_SESSION["family"];
			Db::input("INSERT INTO users (username, password, role, family) VALUES (?, ?, ?, ?);", [$username, $password, $role, $family]);
		}
	}

	public function deleteUser($username) {
		if ($this->isUser($username)) {
			Db::input("DELETE FROM users WHERE username = ?;", [$username]);
			Db::input("DELETE FROM payments WHERE username = ?;", [$username]);
			Db::input("DELETE FROM log WHERE username = ?;", [$username]);
		}
	}

	public function changePassword($password) {
		if ($password != "") {
			$username = $_SESSION["user"];
			Db::input("UPDATE users SET password = ? WHERE username = ?;", [$password, $username]);
		}
	}
}
?>
