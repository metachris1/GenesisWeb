<?php

function arrayToString($array) {
	$out = "Array {<br/>";
	foreach( $array as $key => $value) {
		$out=$out."    [".$key."] => ".$value."<br/>";
	}
	$out=$out."}<br/>";
	return $out;
}
	
?>