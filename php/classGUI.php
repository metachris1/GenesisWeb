<?php

/*






*/

class GUI {
	
	public $data = null;
	public $html = "";
	
	public function __construct($data) {
		$this->data = $data;
		$this->buildHTML();
	}
	
	public function buildHTML() {
	}
	
	public function getHTML() {
		return $this->html;
	}
}

class GUI_Show extends GUI {
	
	public function __construct($data) {
		parent::__construct($data);
	}
	
	public function buildHTML() {
		$title = $this->data->title;
		$description = $this->data->description;
		$image = $this->data->image;
		$this->html = str_replace("[DATA:TITLE]", $title, $this->html);
		$this->html = str_replace("[DATA:DESCRIPTION]", $description, $this->html);
		$this->html = str_replace("[DATA:IMAGE]", $image, $this->html);
	}
	
}

class GUI_ShowBig extends GUI_Show {
	
	public function __construct($data) {
		$this->html = file_get_contents("template/show-content.html");
		parent::__construct($data);
	}
}

class GUI_ShowSmall extends GUI_Show {
	
	public function __construct($data) {
		$this->html = file_get_contents("template/show-small.html");
		parent::__construct($data);
	}
}

class GUI_Episode extends GUI {
	
	public function __construct($data) {
		parent::__construct($data);
	}
	
	public function buildHTML() {
		$title = $this->data->title;
		$description = $this->data->description;
		$image = $this->data->image;
		$video = $this->data->video;
		$this->html = str_replace("[DATA:TITLE]", $title, $this->html);
		$this->html = str_replace("[DATA:DESCRIPTION]", $description, $this->html);
		$this->html = str_replace("[DATA:IMAGE]", $image, $this->html);
		$this->html = str_replace("[DATA:VIDEO]", $video, $this->html);
	}
	
}

class GUI_EpisodeBig extends GUI_Episode {
	
	public function __construct($data) {
		$this->html = file_get_contents("template/episode-big.html");
		parent::__construct($data);
	}
}

class GUI_EpisodeSmall extends GUI_Episode {
	
	public function __construct($data) {
		$this->html = file_get_contents("template/episode-small.html");
		parent::__construct($data);
	}
}

?>
