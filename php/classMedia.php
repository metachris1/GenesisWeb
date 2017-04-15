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
	public $title;
	public $description;
	public $image;
	public $publicationDate;
	
	
}

class Show extends Media {
	
	
	
}

class Episode extends Media {
	
	
	
}

class Game extends Media {
	
	
	
}

?>