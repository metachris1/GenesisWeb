<?php

/*






*/

require_once("php/classMain.php");

$dataShow = new Show();
$dataShow->title = "Hello show";
$dataShow->description = "The best show you'll ever see!";
$dataShow->image = "resources/tempShowImage.jpg";
$guiShow = new GUI_ShowBig($dataShow);

$pageTitle = "Test show";
$pageLink = "";
$pageMeta = "";

$pageHead = getHeadHTML($pageTitle, $pageLink, $pageMeta);

$pageContent = $guiShow->getHTML();

$pageBody = getBodyHTML($pageContent);

$pageHTML = getPageHTML($pageHead, $pageBody);

echo $pageHTML;

?>