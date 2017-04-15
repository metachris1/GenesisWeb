<?php

/*






*/

require_once("php/classMain.php");

$pageTitle = "User profile";
$pageLink = "";
$pageMeta = "";

$pageHead = getHeadHTML($pageTitle, $pageLink, $pageMeta);

$user = new User();

$pageContent = "<div style='display: inline-block; text-align: justify;'>"
	.arrayToString($user->connect("zeratul_du_38@hotmail.fr", "5tr0ngP455w0rd"))
	."<br/>"
	.arrayToString($user->getInfo(1))
	."</div>";

$pageBody = getBodyHTML($pageContent);

$pageHTML = getPageHTML($pageHead, $pageBody);



echo $pageHTML;

?>