<?php

/*






*/

require_once("php/classMain.php");

$dataEpisode = new Episode();
$dataEpisode->title = "Hello episode";
$dataEpisode->description = "The best episode of the best show you've ever seen!";
$dataEpisode->image = "resources/tempEpisodeImage.png";

$guiEpisode = new GUI_EpisodeBig($dataEpisode);

$pageTitle = "Test episode";
$pageLink = "";
$pageMeta = "";

$pageHead = getHeadHTML($pageTitle, $pageLink, $pageMeta);

$pageContent = $guiEpisode->getHTML();

$pageBody = getBodyHTML($pageContent);

$pageHTML = getPageHTML($pageHead, $pageBody);

echo $pageHTML;

?>