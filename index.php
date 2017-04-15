<?php

/*






*/

require_once("php/classMain.php");

$pageTitle = "Index";
$pageLink = "";
$pageMeta = "";

$pageHead = getHeadHTML($pageTitle, $pageLink, $pageMeta);

$pageContent = '<a href="testEpisodeListItem.php">testEpisodeListItem</a><br /><a href="testEpisodeContent.php">testEpisodeContent</a>';

$pageBody = getBodyHTML($pageContent);

$pageHTML = getPageHTML($pageHead, $pageBody);

echo $pageHTML;

?>