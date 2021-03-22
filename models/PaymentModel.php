<?php

class PaymentModel {

	public static function isPayment($_userid, $_month, $_year) {
		return Db::queryRow("SELECT * FROM payments WHERE userid = ? AND month = ? AND year = ?;", [$_userid, $_month, $_year]);
	}

	public static function addPayment($_userid, $_month, $_year) {
		$_month = $_month == "" ? date("m") : $_month;
		$_year = $_year == "" ? "20".date("y") : $_year;
		if (!self::isPayment($_userid, $_month, $_year)) {
			$_username = Db::queryRow("SELECT username FROM users WHERE userid = ?;", [$_userid])["username"];
			mail("platbytk@gmail.com", "Payment added for: (User: $_username, Month: $_month, Year: $_year).", "");
			Db::input("INSERT INTO payments (userid, month, year) VALUES (?, ?, ?);", [$_userid, $_month, $_year]);
			return true;
		} else {
			return false;
		}
	}

	public static function deletePayment($_userid, $_month, $_year) {
		if (self::isPayment($_userid, $_month, $_year))  {
			$_username = Db::queryRow("SELECT username FROM users WHERE userid = ?;", [$_userid])["username"];
			mail("platbytk@gmail.com", "Payment deleted for: (User: $_username, Month: $_month, Year: $_year).", "");
			Db::input("DELETE FROM payments WHERE userid = ? AND month = ? AND year = ?;", [$_userid, $_month, $_year]);
			return true;
		} else {
			return false;
		}
		
	}

	public static function showPayments($_userid) {
		return Db::queryAll("SELECT * FROM payments WHERE userid = ? ORDER BY year DESC, month DESC;", [$_userid]);
	}

	public static function qrData($_userid) {
		$_familyid = Db::queryRow("SELECT familyid FROM users WHERE userid = ?;", [$_userid])["familyid"];
		return Db::queryRow("SELECT accountNumber, bankCode, amount FROM users WHERE familyid = ? AND userrole = \"a\";", [$_familyid]);
	}
}

?>