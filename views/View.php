<?php
class View {
	public function loginScreen() { ?>
		<div class="container">
			<div class="login">
				<form action="" method="post">
					Jméno: <input type="text" name="name"><br>
					Heslo: <input type="password" name="password"><br>
					<input type="submit" name="login" value="Přihlásit se">
				</form>
			</div>
		</div>
	<?php }

	public function adminScreen() {
		$rows = Db::queryAll("SELECT username FROM users WHERE family = ?;", [$_SESSION["family"]]) ?>
		<div class="container">
			<h1>Vložit platbu</h1>
			<br>
			<div class="row">
				<div class="col">
					<form action="" method="post">
						Jméno: <select autofocus name="person">
							<?php foreach ($rows as $user) {
								$user = $user["username"];
								if ($user != $_SESSION["user"]) {
									echo "<option value=\"$user\">$user</option>";
								}
							} ?>
							
						</select>
						<br>
						Měsíc: <input type="number" min="1" max="12" name="month">
						<br>
						Rok: <input type="number" min="2019" max="2035" name="year">
						<br>
						<input type="submit" name="addPayment" value="Přidat platbu">
						<br>
					</form>
				</div>
				<div class="col">
					<p>Přihlášen jako <?php echo $_SESSION["user"]?> (skupina <?php echo $_SESSION["family"] ?>)</p>
					<form action="" method="post">
						<input type="submit" name="logout" value="Odhlásit se">
					</form>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col">
					<h1>Přidat člena</h1>
				</div>
				<div class="col">
					<form action="" method="post">
						<input type="text" name="addUserName">
						<input type="submit" name="addUser" value="Přidat člena">
					</form>
				</div>
			</div>
			<hr>
			
			<div class="row">
				<div class="col">
					<h1>Odebrat člena</h1>
				</div>
				<div class="col">
					<form action="" method="post">
						<input type="text" name="deleteUserName">
						<input type="submit" name="deleteUser" value="Odebrat člena">
					</form>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col">
					<h3>Změna hesla</h3>
				</div>
				<div class="col">
					<form action="" method="post">
						<input type="text" name="newPassword">
						<input type="submit" name="changePassword" value="Změnit heslo">
					</form>
				</div>
			</div>
		</div>
	<?php }

	public function userScreen() {
		$rows = Db::queryAll("SELECT * FROM payments WHERE username = ? ORDER BY year DESC, month DESC;", [$_SESSION["user"]]);
		?>

		<div class="container">
			<div class="row">
				<div class="col">
					<h1>Platby</h1>
					<table>
						<tr>
							<th>Měsíc</th>
							<th>Rok</th>
						</tr>
						<?php
						foreach ($rows as $payment) {
							$month = $payment["month"];
							$year = $payment["year"];
							echo "<tr><td>$month</td><td>$year</td></tr>";
						}
						?>
					</table>
				</div>
				<div class="col">
					<p>Přihlášen jako <?php echo $_SESSION["user"]?> (skupina <?php echo $_SESSION["family"] ?>)</p>
					<form action="" method="post">
						<input type="submit" name="logout" value="Odhlásit se">
					</form>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col">
					<h3>Změna hesla</h3>
				</div>
				<div class="col">
					<form action="" method="post">
						<input type="password" name="newPassword">
						<input type="submit" name="changePassword" value="Změnit heslo">
					</form>
				</div>
			</div>
		</div>

	<?php }
	
	public function Show() {
		if (isset($_SESSION["log"]) && $_SESSION["log"] && isset($_SESSION["role"])) {
			if ($_SESSION["role"] == "a") {
				return $this->adminScreen();
			} else if ($_SESSION["role"] == "u") {
				return $this->userScreen();
			}
		} else {
			return $this->loginScreen();
		}
	}
}
?>
