<?php

class RouterController extends Controller {

	protected $controller;

	private function underscoresToCamelCase($_text) {
		$sentence = str_replace("-", "", $_text);
		$sentence = ucwords($sentence);
		$sentence = str_replace(" ", "", $sentence);
		return $sentence;
	}

	private function parseURL($_url) {
		$parsedURL = parse_url($_url);
		$parsedURL["path"] = ltrim($parsedURL["path"], "/");
		$parsedURL["path"] = trim($parsedURL["path"]);
		$path = explode("/", $parsedURL["path"]);
		return $path;
	}

	public function process($_params) {
		$parsedURL = $this->parseURL($_params[0]);
		if (empty($parsedURL[0])) {
			Ssn::destroy();
			$this->route("login");
		}

		$controllerClass = $this->underscoresToCamelCase(array_shift($parsedURL) . "Controller");
		if (file_exists("controllers/" . $controllerClass . ".php"))
			$this->controller = new $controllerClass;
		else
			$this->route("error");
		
		$this->controller->process($parsedURL);

		$this->data["title"] = $this->controller->header["title"];
		$this->data["description"] = $this->controller->header["description"];
		$this->data["keywords"] = $this->controller->header["keywords"];

		$this->view = "layout";
	}

}

?>