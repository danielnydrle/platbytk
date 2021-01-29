<?php

class AdminController extends Controller {

	public function process($_params) {

		$this->authenticate();

		if (Ssn::get("loggedUser")["userrole"] == "a") {
			$this->data = [];
			$this->view = "admin";
			$this->header["title"] = "Administrace Platby.tk (" . Ssn::get("loggedUser")["username"] . " – skupina " . Ssn::get("loggedUser")["familyid"] . ")";

			if (isset($_POST["admin-addpayment"])) {
				PaymentModel::addPayment(
					$_POST["admin-addpayment-user"],
					$_POST["admin-addpayment-month"],
					$_POST["admin-addpayment-year"]
				);
				$this->data["show-payments"] = PaymentModel::showPayments($_POST["admin-addpayment-user"]);
			}

			if (isset($_POST["admin-adduser"])) {
				$this->data["admin-adduser-username"] = $_POST["admin-manageuser-username"];
				ManageUserModel::addUser($this->data["admin-adduser-username"]);
			}

			if (isset($_POST["admin-deleteuser"])) {
				$this->data["admin-deleteuser-username"] = $_POST["admin-manageuser-username"];
				ManageUserModel::deleteUser($this->data["admin-deleteuser-username"]);
			}

			if (isset($_POST["changepassword"])) {
				$this->data["changepassword-password"] = $_POST["changepassword-password"];
				ManageUserModel::changePassword($this->data["changepassword-password"]);
			}

			if (isset($_POST["logout"])) {
				LoginModel::logout();
				$this->route("login");
			}

			if (isset($_POST["admin-showpayments"])) {
				$this->data["show-payments"] = PaymentModel::showPayments($_POST["admin-showpayments-user"]);
			}

			$this->data["familyUsers"] = ManageUserModel::FamilyUsers();

		}

		else if (Ssn::get("loggedUser")["userrole"] == "u") {
			$this->route("user");
		}

		else {
			$this->route("login");
		}

	}

}

?>