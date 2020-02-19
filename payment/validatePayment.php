<?php
function validatePayment() {
	$person = $_POST["person"];
	$month = $_POST["month"];
	$sql = "
		SELECT person, month
		FROM payments
		WHERE person = \"$person\" AND month = \"$month\";
	";
	$query = mysqli_query($GLOBALS["conn"], $sql);
	$arr = mysqli_fetch_assoc($query);
	return ($person != "" && $month != "" && is_null($arr)) ? true : false;
}
?>
