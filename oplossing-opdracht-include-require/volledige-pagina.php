<!DOCTYPE html>

<?php

	$individueelArtikel = false;

	$artikels = array(
		array(
			'title' => 'titel artikel 1',
			'text' => 'tekst artikel 1',
			'tags' => array('tag 1')),
		array(
			'title' => 'titel artikel 2',
			'text' => 'tekst artikel 2',
			'tags' => array('tag 2', 'tag 2')),
		array(
			'title' => 'titel artikel 3',
			'text' => 'tekst artikel 3',
			'tags' => array('tag 3', 'tag 3', 'tag 3'))
		);

	if (isset($_GET["id"])) {
		$id = $_GET["id"];

		if (array_key_exists($id, $artikels)) {
			$artikels = array($artikels[$id]);
			$individueelArtikel = true;
		}
	}

	include('view/header.html');

	include('view/artikels.html');

	include('view/footer.html');
?>