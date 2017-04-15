<?php

/*






*/

require_once("php/classMain.php");

$pageTitle = "Index";
$pageLink = "";
$pageMeta = "";

$pageHead = getHeadHTML($pageTitle, $pageLink, $pageMeta);

$pageContent = '<a href="testEpisode.php">testEpisode</a>';

$pageBody = getBodyHTML($pageContent);

$pageHTML = getPageHTML($pageHead, $pageBody);

echo $pageHTML;

?>