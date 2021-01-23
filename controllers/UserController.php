<?php

class UserController extends Controller {

	public function process($_params) {

		$this->authenticate();

		if (Ssn::get("loggedUser")["userrole"] == "u") {

			$this->data = [];
			$this->view = "user";
			$this->header["title"] = "Administrace Platby.tk (" . Ssn::get("loggedUser")["username"] . " – skupina " . Ssn::get("loggedUser")["familyid"] . ")";


			if (isset($_POST["changepassword"])) {
				$this->data["changepassword-password"] = $_POST["changepassword-password"];
				ManageUserModel::changePassword($this->data["changepassword-password"]);
			}

			if (isset($_POST["logout"])) {
				LoginModel::logout();
				$this->route("login");
			}

			$this->data["payments"] = PaymentModel::showPayments(Ssn::get("loggedUser")["userid"]);

			$this->data["qrdata"] = PaymentModel::qrData(Ssn::get("loggedUser")["userid"]);

		}

		else if (Ssn::get("loggedUser")["userrole"] == "a") {
			$this->route("admin");
		}

		else {
			$this->route("login");
		}

	}

}

?>