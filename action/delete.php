<?php

/**
 * @var $mysqli
 */

$user = checkUser($mysqli);

$id = $_GET['id'] ?? null;
if (!$id) {
	header("Location: /?act=articles");
	die();
}

$mysqli->query("DELETE FROM `article` WHERE id='$id' AND userId='" . $user['id'] . "'");

// $article = getUserArticle($mysqli, $id, $user['id']);

// @unlink($_SERVER['DOCUMENT_ROOT'] . "/images/" . $article['img']);

header('Location: /?act=articles');
