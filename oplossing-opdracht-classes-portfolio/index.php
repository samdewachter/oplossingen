<?php

	function __autoload($classname) {
		require_once("classes/" . $classname . ".php");
	}

	$htmlBuilder = new HTMLBuilder("header", "body", "footer");

	$htmlBuilder->buildHeader();
	$htmlBuilder->buildBody();
	$htmlBuilder->buildFooter();
?>