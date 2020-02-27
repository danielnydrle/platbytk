<?php
require 'models/LogoutModel.php';

class LogoutController {

	public $model;

	public function __construct() {
		$this->model = new LogoutModel();
	}

	public function logout() {
		$this->model->logout();
	}

}
?>
