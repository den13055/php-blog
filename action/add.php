<?php

/**
 * @var $mysqli
 */

$user = checkUser($mysqli);

if (count($_POST)) {
	$title = $_POST['title'] ?? null;
	$content = $_POST['content'] ?? null;

	$mysqli->query("INSERT INTO `article`(`userId`, `title`, `content`, createdAt) VALUES ('" . $user['id'] . "','$title','$content',NOW())");
	header("Location: /?act=articles");
	die();
}

require_once 'templates/add.php';
