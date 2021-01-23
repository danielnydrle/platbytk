<?php

class ErrorController extends Controller {

	public function process($_params) {

		header("HTTP/1.1 404 Not Found");
		$this->header["title"] = "Error 404";
		$this->view = "error";
		
	}
}

?>