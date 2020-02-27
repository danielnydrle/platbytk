<?php
class paymentModel {

	public function validatePayment($person, $month) {
		$sql = "
			SELECT person, month
			FROM payments
			WHERE person = ? AND month = ?;
		";
		$stmt = mysqli_stmt_init($GLOBALS["conn"]);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, "si", $person, $month);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$arr = mysqli_fetch_assoc($result);
		return ($person != "" && $month != "" && is_null($arr)) ? true : false;
	}

	public function addPayment($person, $month) {
		if ($this->validatePayment($person, $month)) {
			$sql = "
				INSERT INTO payments (person, month)
				VALUES (?, ?);
			";
			$stmt = mysqli_stmt_init($GLOBALS["conn"]);
			mysqli_stmt_prepare($stmt, $sql);
			mysqli_stmt_bind_param($stmt, "si", $person, $month);
			mysqli_stmt_execute($stmt);
			return true;
		} else {
			return false;
		}
	}

}
?>
