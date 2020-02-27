<?php
require 'models/LoginModel.php';

class LoginController {

	public $name;
	public $password;
	public $model;

	public function __construct() {
		$this->name = $_POST["name"];
		$this->password = hash("sha512", $_POST["password"]);
		$this->model = new LoginModel();
	}

	public function login() {
		$this->model->log($this->name, $this->password);
	}
}
?>
