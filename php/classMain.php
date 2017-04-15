<?php
	session_start();
	require_once("functions.php");
	require_once("classBDD.php");
	require_once("classUser.php");
	require_once("classMedia.php");
	require_once("classGUI.php");
	
	
	function getPageHTML($head, $body) {
		$html = file_get_contents("template/page-html.html");
		$html = str_replace("[TEMPLATE:HEAD]", $head, $html);
		$html = str_replace("[TEMPLATE:BODY]", $body, $html);
		return $html;
	}
	
	function getHeadHTML($title, $link, $meta) {
		$html = file_get_contents("template/page-head.html");
		$html = str_replace("[HEAD:TITLE]", $title, $html);
		$html = str_replace("[HEAD:LINK]", $link, $html);
		$html = str_replace("[HEAD:META]", $meta, $html);
		return $html;
	}
	
	function getBodyHTML($content) {
		$html = file_get_contents("template/page-body.html");
		$html = str_replace("[BODY:CONTENT]", $content, $html);
		return $html;
	}
	
?>