<?php

class ManageUserModel {

	private static function isUser($_username) {
		return Db::queryRow("SELECT username FROM users WHERE username = ?;", [$_username]);
	}

	public static function addUser($_username) {
		if (!self::isUser($_username)) {
			$password = hash("sha512", $_username);
			$familyid = Ssn::get("loggedUser")["familyid"];
			Db::input("INSERT INTO users (username, password, familyid, userrole) VALUES (?, ?, ?, 'u');", [$_username, $password, $familyid]);
		}
	}

	public static function deleteUser($_username) {
		if (self::isUser($_username)) {
			Db::input("DELETE FROM users WHERE username = ?;", [$_username]);
		}
	}

	public static function changePassword($_password) {
		$username = Ssn::get("loggedUser")["username"];
		Db::input("UPDATE users SET password = ? WHERE username = ?;", [hash("sha512", $_password), $username]);
	}

	public static function familyUsers() {
		return Db::queryAll("SELECT * FROM users WHERE familyid = ?", [Ssn::get("loggedUser")["familyid"]]);
	}

}

?>