<?php
function validatePayment() {
	$person = $_POST["person"];
	$month = $_POST["month"];
	if ($person != "" && $month != "") {
		return true;
	} else {
		return false;
	}
}
?>