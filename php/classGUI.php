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

class GUI_Media extends GUI {
	
	public function __construct($data) {
		parent::__construct($data);
	}
	
	public function buildHTML() {
		$title = $this->data->title;
		$description = $this->data->description;
		$this->html = str_replace("[DATA:TITLE]", $title, $this->html);
		$this->html = str_replace("[DATA:DESCRIPTION]", $description, $this->html);
	}
}

class GUI_Show extends GUI_Media {
	
	public function __construct($data) {
		parent::__construct($data);
	}
	
	public function buildHTML() {
		parent::buildHTML();
	}
	
}

class GUI_ShowContent extends GUI_Show {
	
	public function __construct($data) {
		$this->html = file_get_contents("template/showContent.html");
		parent::__construct($data);
	}
	
	public function buildHTML() {
		parent::buildHTML();
		$image = $this->data->image;
		$this->html = str_replace("[DATA:IMAGE]", $image, $this->html);
		$episodeList = "";
		if(count($this->data->episodeList) == 0) {
			$episodeList = "<span style='font-style:italic;'>No episode for this show yet.</span>";
		} else {
			foreach($this->data->episodeList as $episode) {
				if($episode !== null) {
					$episodeGui = new GUI_EpisodeListItem($episode);
					$episodeList = $episodeList.$episodeGui->getHTML();
				}
			}
		}
		$this->html = str_replace("[DATA:EPISODE_LIST]", $episodeList, $this->html);
	}
}

class GUI_ShowListItem extends GUI_Show {
	
	public function __construct($data) {
		$this->html = file_get_contents("template/showListItem.html");
		parent::__construct($data);
	}
	
	public function buildHTML() {
		parent::buildHTML();
		$image = $this->data->image;
		$count = count($this->data->episodeList)." episode(s).";
		$this->html = str_replace("[DATA:IMAGE]", $image, $this->html);
		$this->html = str_replace("[DATA:EPISODE_COUNT]", $count, $this->html);
	}
}

class GUI_Episode extends GUI_Media {
	
	public function __construct($data) {
		parent::__construct($data);
	}
	
	public function buildHTML() {
		parent::buildHTML();
	}
	
}

class GUI_EpisodeContent extends GUI_Episode {
	
	public function __construct($data) {
		$this->html = file_get_contents("template/episodeContent.html");
		parent::__construct($data);
	}
	
	public function buildHTML() {
		parent::buildHTML();
		$video = $this->data->video;
		$this->html = str_replace("[DATA:VIDEO]", $video, $this->html);
	}
}

class GUI_EpisodeListItem extends GUI_Episode {
	
	public function __construct($data) {
		$this->html = file_get_contents("template/episodeListItem.html");
		parent::__construct($data);
	}
	
	public function buildHTML() {
		parent::buildHTML();
		$image = $this->data->image;
		$this->html = str_replace("[DATA:IMAGE]", $image, $this->html);
	}
}

?>
