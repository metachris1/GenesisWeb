<?php

/*






 */

require_once("php/classMain.php");

$pageTitle = "Index";
$pageLink = "";
$pageMeta = "";

$pageHead = getHeadHTML($pageTitle, $pageLink, $pageMeta);

$pageContent = '<a href="testEpisodeListItem.php">testEpisodeListItem</a>'
        . '<br /><a href="testEpisodeContent.php">testEpisodeContent</a>'
        . '<br /><a href="testShowContent.php">testShowContent</a>'
        . '<br /><a href="testShowContentNoEpisode.php">testShowContentNoEpisode</a>'
        . '<br /><a href="testShowListItem.php">testShowListItem</a>'
        . '<br /><a href="testUserProfil.php">testUserProfil</a>'
        . '<br /><a href="testCommentList.php">testCommentList</a>';

$pageBody = getBodyHTML($pageContent);

$pageHTML = getPageHTML($pageHead, $pageBody);

echo $pageHTML;
?>