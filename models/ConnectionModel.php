<?php
class ConnectionModel {
	public function connect() {
		$GLOBALS["conn"] = mysqli_connect("localhost", "root", "pass", "spotify");
	}
}
?>
