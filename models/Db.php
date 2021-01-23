<?php

class Db {
	private static $conn;

	public static $settings = [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
	    PDO::ATTR_EMULATE_PREPARES => false,
	];

	public static function open($host, $user, $pass, $db, $pdo_params = "") {
		if (!isset(self::$conn))
			self::$conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass, self::$settings);
	}

	public static function queryRow($query, $params = []) {
		$sql = self::$conn->prepare($query);
		$sql->execute($params);
		return $sql->fetch();
	}

	public static function queryAll($query, $params = []) {
		$sql = self::$conn->prepare($query);
		$sql->execute($params);
		return $sql->fetchAll();
	}

	public static function input($query, $params = []) {
		$sql = self::$conn->prepare($query);
		$sql->execute($params);
		return $sql->rowCount();
	}
}

?>
