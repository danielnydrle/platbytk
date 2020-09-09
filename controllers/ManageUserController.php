<?php
require 'models/ManageUserModel.php';

class ManageUserController {

	public $username;
	public $model;
	public $password;

	public function __construct() {
		if (isset($_POST["addUser"])) {
			$this->username = $_POST["addUserName"];
		} else if (isset($_POST["deleteUser"])) {
			$this->username = $_POST["deleteUserName"];
		} else if (isset($_POST["changePassword"])) {
			$this->password = $_POST["newPassword"];
		}
		$this->model = new ManageUserModel();
	}

	public function addUser() {
		$this->model->addUser($this->username);
	}

	public function deleteUser() {
		$this->model->deleteUser($this->username);
	}

	public function changePassword() {
		$this->model->changePassword(hash("sha512", $this->password));
	}
}
?>
