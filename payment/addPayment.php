<?php
require_once 'validatePayment.php';
function addPayment() {
	$person = $_POST["person"];
	$month = $_POST["month"];
	if (validatePayment()) {
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
?>
 