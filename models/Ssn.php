<?php

class Ssn {

	public static function start() {
		session_start();
	}

	public static function destroy() {
		session_destroy();
	}

	public static function get($_key) {
		return $_SESSION[$_key];
	}

	public static function set($_key, $_value) {
		$_SESSION[$_key] = $_value;
	}

	public static function unset($_key) {
		unset($_SESSION[$_key]);
	}
}

?>