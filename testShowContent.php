<?php

/*






*/

require_once("php/classMain.php");

$dataShow = new Show();
$dataShow->title = "Hello show";
$dataShow->description = "The best show you'll ever see!";
$dataShow->image = "resources/tempShowImage.jpg";
for($i = 1; $i <= 5; $i++) {
	$dataEpisode = new Episode();
	$dataEpisode->title = "Hello episode ".$i;
	$dataEpisode->description = "The best episode of the best show you've ever seen!";
	$dataEpisode->image = "resources/tempEpisodeImage.png";
	array_push($dataShow->episodeList, $dataEpisode);
}
$guiShow = new GUI_ShowContent($dataShow);

$pageTitle = "Test show";
$pageLink = "";
$pageMeta = "";

$pageHead = getHeadHTML($pageTitle, $pageLink, $pageMeta);

$pageContent = $guiShow->getHTML();

$pageBody = getBodyHTML($pageContent);

$pageHTML = getPageHTML($pageHead, $pageBody);

echo $pageHTML;

?>