<?php

/*






*/

require_once("php/classMain.php");

$pageTitle = "Index";
$pageLink = "<link rel='stylesheet' href='style/elements.css'>";
$pageMeta = "";

$pageHead = getHeadHTML($pageTitle, $pageLink, $pageMeta);

$pageContent = '<a href="testEpisodeListItem.php">testEpisodeListItem</a>'
	.'<br /><a href="testEpisodeContent.php">testEpisodeContent</a>'
	.'<br /><a href="testShowContent.php">testShowContent</a>'
	.'<br /><a href="testShowContentNoEpisode.php">testShowContentNoEpisode</a>'
	.'<br /><a class="button red" href="testUserProfil.php">testUserProfil</a>';

$pageBody = getBodyHTML($pageContent);

$pageHTML = getPageHTML($pageHead, $pageBody);

echo $pageHTML;

?>