<?php

/*






*/

require_once("php/classMain.php");

$dataEpisode = new Episode();
$dataEpisode->title = "Hello episode";
$dataEpisode->description = "The best episode of the best show you've ever seen!";
$dataEpisode->image = "resources/tempEpisodeImage.png";

$guiEpisode = new GUI_EpisodeSmall($dataEpisode);



?>