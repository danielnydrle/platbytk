<?php
function validatePayment() {
	$person = $_POST["person"];
	$month = $_POST["month"];
	$sql = "
		SELECT person, month
		FROM payments
		WHERE person = ? AND month = ?;
	";
	$stmt = mysqli_stmt_init($GLOBALS["conn"]);
	mysqli_stmt_prepare($stmt, $sql);
	mysqli_stmt_bind_param($stmt, "ss", $person, $month);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	$arr = mysqli_fetch_assoc($result);
	return ($person != "" && $month != "" && is_null($arr)) ? true : false;
}
?>
