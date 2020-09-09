<?php
class Db {
	private static $conn;

	public static function open($host, $user, $pass, $db, $pdo_params = "") {
		self::$conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
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
	}
}
?>
