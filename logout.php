<?php
function logout() {
	if($_POST["logout"]) {
		$_SESSION["log"] = false;
	}
};
?>
