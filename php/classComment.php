<?php

/*

TABLE comment (
	commentId(int),
	commentMediaType(int),
	commentUserId(int),
	commentText(str),
	commentParentId(int), // for answers
	commentPublicationDate(date)
)

*/


class Comment {
	public $commentId = 0;
	public $commentMediaType = 0;
	public $commentUserId = 0;
	public $userName = 0;
	public $userAvatar = 0;
	public $commentText = "";
	public $commentParentId = 0;
	public $commentPublicationDate = 0;
	public $nestedLevel = 0;
	public $children = [];
	public $commentParent = null;
}

function commentDataToArray($data) {
	$array = [];
	foreach($data as $line) {
		$comment = new Comment();
		$comment->commentId = $line["commentId"];
		$comment->commentMediaType = $line["commentMediaType"];
		$comment->commentUserId = $line["commentUserId"];
		$comment->userName = $line["userName"];
		$comment->userAvatar = $line["userAvatar"];
		$comment->commentText = "commentText";
		$comment->commentParentId = $line["commentParentId"];
		$comment->commentPublicationDate = $line["commentPublicationDate"];
		array_push($array, $comment);
	}
	return $array;
}

function commentArrayToMap($array) {
	$map = [];
	foreach($array as $comment) {
		$map[$comment->commentId] = $comment;
	}
	return $map;
}

function computeCommentNestedLevel($commentArray) {
	foreach($commentArray as $comment) {
		if($comment->commentParent !== null) {
			$comment->nestedLevel = $comment->commentParent->nestedLevel + 1;
			$comment->children = computeCommentNestedLevel($comment->children);
		}
	}
	return $commentArray;
}

function commentArrayToList($commentArray) {
	$commentMap = commentArrayToMap($commentArray);
	$commentList = [];
	foreach($commentArray as $comment) {
		if($comment->commentParentId === 0) {
			array_push($commentList, $comment);
		} else {
			array_push($commentMap[$comment->commentParentId]->children, $comment);
			$comment->commentParent = $commentList;
		}
	}
	return computeCommentNestedLevel($commentArray);
}

?>