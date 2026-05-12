<?php
function checkUser($mysqli): array
{
	if (empty($_SESSION['userId'])) {
		header("Location: /?act=login");
		die();
	}

	$userId = (int)$_SESSION['userId'];
	$result = $mysqli->query("SELECT * FROM `user` WHERE userId = '$userId' LIMIT 1");
	$user = $result->fetch_assoc();
	if (!$user) {
		header("Location: /?act=login");
		die();
	}

	return $user;
}
