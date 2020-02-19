<?php
require_once 'validatePayment.php';
function isPaid() {
	$person = $_POST["person"];
	$month = $_POST["month"];
	if (validatePayment()) {
		$sql = "
			SELECT person, month
			FROM payments
			WHERE person = \"$person\" AND month = \"$month\";
		";
		$query = mysqli_query($GLOBALS["conn"], $sql);
		$arr = mysqli_fetch_assoc($query);
		return true;
	} else {
		return false;
	}
}

?>