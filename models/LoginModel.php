<?php

class LoginModel {

	private static function validate($_username, $_password) {
		return Db::queryRow("SELECT * FROM users WHERE username = ? AND password = ?;", [$_username, $_password]);
	}

	public static function login($_username, $_password) {
		$user = self::validate($_username, $_password);
		if ($user) {
			$userid = $user["userid"];
			Ssn::set("loggedUser", $user);
			self::log($user["userid"], 1);
			mail("platbytk@gmail.com", "Login: $_username at " . date("F j, Y, g:i a"), "");
			return true;
		} else {
			return false;
		}
	}
	
	public static function logout() {
		self::log(Ssn::get("loggedUser")["userid"], 0);
		Ssn::destroy();
	}	

	private static function log($_userid, $_login) {
		Db::input("INSERT INTO log (userid, login, dt) VALUES (?, ?, NOW());", [$_userid, $_login]);
	}

	public static function role($_username) {
		echo "ahoj";
		return Db::queryRow("SELECT userrole FROM users WHERE username = ?;", [$_username])["userrole"];
	}
}

?>