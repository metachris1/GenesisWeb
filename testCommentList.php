<?php

/*






*/

require_once("php/classMain.php");

$commentData = [];
for($i = 1; $i <= 10; $i++) {
	$commentArrayElement = [];
	$commentArrayElement["commentId"] = $i;
	$commentArrayElement["commentMediaType"] = 1;
	$commentArrayElement["commentUserId"] = 1;
	$commentArrayElement["userName"] = "Daratrix";
	$commentArrayElement["userAvatar"] = "resources/DOGE.jpeg";
	$commentArrayElement["commentText"] = 0;
	$commentArrayElement["commentParentId"] = 0;
	$commentArrayElement["commentPublicationDate"] = 0;
	array_push($commentData, $commentArrayElement);
}

$commentArray = commentDataToArray($commentData);
$commentList = commentArrayToList($commentArray);

$guiCommentList = new GUI_CommentList($commentList);

$pageTitle = "Test comment";
$pageLink = "";
$pageMeta = "";

$pageHead = getHeadHTML($pageTitle, $pageLink, $pageMeta);

$pageContent = $guiShow->getHTML();

$pageBody = getBodyHTML($pageContent);

$pageHTML = getPageHTML($pageHead, $pageBody);

echo $pageHTML;

?>