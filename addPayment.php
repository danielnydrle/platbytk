<?php
require_once 'isPaid.php';
function addPayment() {
	$person = $_POST["person"];
	$month = $_POST["month"];
	if (isPaid()) {
		$sql = "
			INSERT INTO payments (person, month)
			VALUES (\"$person\", \"$month\");
		";
		mysqli_query($GLOBALS["conn"], $sql);
		return true;
	} else {
		return false;
	}
}
?>
 