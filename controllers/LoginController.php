<?php

class LoginController extends Controller {

	public function process($_params) {

		$this->data = [];
		$this->header["title"] = "Platby.tk přihlášení";
		$this->view = "login";

		if (isset($_POST["login"])) {
			if (LoginModel::login($_POST["login-username"], hash("sha512", $_POST["login-password"]))) {
				switch (LoginModel::role($_POST["login-username"])) {
					case 'a':
						$this->route("admin");
						break;
					case 'u':
						$this->route("user");
					default:
						break;
				}
				
			}

		}
		
	}

}

?>