<?php

class PaymentModel {

	private static function isPayment($_userid, $_month, $_year) {
		return Db::queryRow("SELECT * FROM payments WHERE userid = ? AND month = ? AND year = ?;", [$_userid, $_month, $_year]);
	}

	public static function addPayment($_userid, $_month, $_year) {
		if (!self::isPayment($_userid, $_month, $_year)) {
			Db::input("INSERT INTO payments (userid, month, year) VALUES (?, ?, ?);", [$_userid, $_month, $_year]);
			return true;
		} else {
			return false;
		}
	}

	public static function showPayments($_userid) {
		return Db::queryAll("SELECT * FROM payments WHERE userid = ? ORDER BY year DESC, month DESC;", [$_userid]);
	}
}

?>