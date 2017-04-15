<?php

/*






*/

require_once("php/classMain.php");

$pageTitle = "Index";
$pageLink = "";
$pageMeta = "";

$pageHead = getHeadHTML($pageTitle, $pageLink, $pageMeta);

<<<<<<< HEAD
$pageContent = '<a href="testEpisodeListItem.php">testEpisodeListItem</a><br /><a href="testEpisodeContent.php">testEpisodeContent</a>';
=======
$pageContent = '<a href="testEpisode.php">testEpisode</a>';
>>>>>>> e89ea0ce4b59fb0bb4b0c6a07f20a8e386471982

$pageBody = getBodyHTML($pageContent);

$pageHTML = getPageHTML($pageHead, $pageBody);

echo $pageHTML;

?>