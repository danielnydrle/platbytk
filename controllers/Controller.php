<?php

abstract class Controller {

	protected $data = [];

	protected $view = "";

	protected $header = ["title" => "", "keywords" => "", "description" => ""];

	public function render() {
		if ($this->view) {
			extract($this->safe($this->data));
			extract($this->data, EXTR_PREFIX_ALL, "");
			require("views/" . $this->view . ".phtml");
		}
	}

	public function route($_url) {
		header("Location: /$_url");
		header("Connection: close");
		exit;
	}

	public function authenticate() {
		if (!Ssn::get("loggedUser")) {
			$this->route("login");
		}
	}

	private function safe($x = null)
	{
	    if (!isset($x))
	        return null;
	    elseif (is_string($x))
	        return htmlspecialchars($x, ENT_QUOTES);
	    elseif (is_array($x))
	    {
	        foreach($x as $k => $v)
	        {
	            $x[$k] = $this->safe($v);
	        }
	        return $x;
	    }
	    else
	        return $x;
	}

	abstract function process($_params);

}

?>