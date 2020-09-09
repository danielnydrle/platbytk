<?php
class paymentModel {

	public function validatePayment($username, $month, $year) {
		$row = Db::queryRow("SELECT username, month, year FROM payments WHERE username = ? AND month = ? AND year = ?;", [$username, $month, $year]);
		return ($username != "" && $month != "" && $year != "" && $row == false) ? true : false;
	}

	public function addPayment($username, $month, $year) {
		if ($this->validatePayment($username, $month, $year)) {
			Db::input("INSERT INTO payments (username, month, year) VALUES (?, ?, ?);", [$username, $month, $year]);
			return true;
		} else {
			return false;
		}
	}

}
?>
