<?php

/*

TABLE media (
	mediaId(int),
	mediaType(int),
	mediaTitle(str),
	mediaDescription(str),
	mediaPublicationDate(date),
	mediaData(str)
)

*/


class Media {
	public $title = "default title";
	public $description = "default description";
	public $publicationDate = "default date";
	
	
}

class Show extends Media {
	public $image = "NAN";
	public $episodeList = [];
	
	
}

class Episode extends Media {
	public $image = "NAN";
	public $video = "NAN";
	
	
}

class Game extends Media {
	public $image = "NAN";
	
	
	
}

?>