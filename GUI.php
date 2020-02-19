<?php
function GUI() {
	if (isset($_SESSION["log"]) && $_SESSION["log"]) {
		echo"	
		<div class=\"container\">
			<div class=\"row\">
				<div class=\"col-11 entry\">
					<form action=\"\" method=\"post\">
						<select autofocus name=\"person\">
							<option value=\"Anezka\">Anezka</option>
							<option value=\"Ondra\">Ondra</option>
							<option value=\"Pavel\">Pavel</option>
							<option value=\"Petr\">Petr</option>
						</select>
						<br>
						<input type=\"number\" min=\"1\" max=\"12\" name=\"month\">
						<br>
						<input type=\"submit\" name=\"add\" value=\"Přidat platbu\">
						<br>
					</form>
				</div>
				<div class=\"col-1 logout\">
					<form action=\"\" method=\"post\">
						<input type=\"submit\" name=\"logout\" value=\"Odhlásit se\">
					</form>
				</div>
			</div>
		</div>
		";
	} else {
		echo "
		<div class=\"login\">
			<form action=\"\" method=\"post\">
				Email: <input type=\"text\" name=\"email\"><br>
				Password: <input type=\"password\" name=\"password\"><br>
				<input type=\"submit\" name=\"login\" value=\"Přihlásit se\">
			</form>
		</div>
		";
	}
};
?>
