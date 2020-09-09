<?php
require 'models/PaymentModel.php';

class paymentController {

	public $person;
	public $month;
	public $year;
	public $model;

	public function __construct() {
		$this->person = $_POST["person"];
		$this->month = $_POST["month"];
		$this->year = $_POST["year"];
		$this->model = new paymentModel();
	}

	public function addPayment() {
		$this->model->addPayment($this->person, $this->month, $this->year);
	}
}
?>
