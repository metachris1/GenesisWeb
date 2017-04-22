<?php

/*






 */

require_once("php/classMain.php");

$commentData = [];
for ($i = 1; $i <= 100; $i++) {
    $commentArrayElement = [];
    $commentArrayElement["commentId"] = $i;
    $commentArrayElement["commentMediaType"] = 1;
    $commentArrayElement["userId"] = 1;
    $commentArrayElement["userName"] = "Daratrix";
    $commentArrayElement["userAvatar"] = "resources/DOGE.jpeg";
    $commentArrayElement["commentText"] = "I'm a random comment. But I'm not randomly generated. Akala miam miam! For Aïur! Lok'tar oghar!";
    $commentArrayElement["commentParentId"] = rand(0, $i) % $i;
    $commentArrayElement["commentPublicationDate"] = "2017-16-04";
    array_push($commentData, $commentArrayElement);
}

$commentArray = commentDataToArray($commentData);
$commentList = commentArrayToList($commentArray);

$guiCommentList = new GUI_CommentList($commentList);

$pageTitle = "Test comment";
$pageLink = "";
$pageMeta = "";

$pageHead = getHeadHTML($pageTitle, $pageLink, $pageMeta);

$pageContent = $guiCommentList->getHTML();

$pageBody = getBodyHTML($pageContent);

$pageHTML = getPageHTML($pageHead, $pageBody);

echo $pageHTML;
?>